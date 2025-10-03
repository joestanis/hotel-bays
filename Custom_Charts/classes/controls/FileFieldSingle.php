<?php
class FileFieldSingle extends EditControl
{
	function FileFieldSingle($field, $pageObject, $id)
	{
		parent::EditControl($field, $pageObject, $id);
		$this->format = EDIT_FORMAT_FILE;
		
		global $conn;
		$this->conn = $conn;
	}
	
	/**
	 * addJSFiles
	 * Add control JS files to page object
	 */
	function addJSFiles()
	{
		$this->pageObject->AddJSFile("include/zoombox/zoombox.js");
	}
	
	/**
	 * addCSSFiles
	 * Add control CSS files to page object
	 */ 
	function addCSSFiles()
	{
		$this->pageObject->AddCSSFile("include/zoombox/zoombox.css");
	}
	
	function buildControl($value, $mode, $fieldNum = 0, $validate, $additionalCtrlParams, $data)
	{
		parent::buildControl($value, $mode, $fieldNum, $validate, $additionalCtrlParams, $data);
		if($this->pageObject->pageType == PAGE_SEARCH || $this->pageObject->pageType == PAGE_LIST)
		{
			echo '<input id="'.$this->cfield.'" '.$this->inputStyle.' type="text" '
				.($mode == MODE_SEARCH ? 'autocomplete="off" ' : '')
				.(($mode==MODE_INLINE_EDIT || $mode==MODE_INLINE_ADD) && $this->is508==true ? 'alt="'.$this->strLabel.'" ' : '')
				.'name="'.$this->cfield.'" '.$this->pageObject->pSetEdit->getEditParams($this->field).' value="'
				.htmlspecialchars($value).'">';	
			$this->buildControlEnd($validate);
			return;
		}	
			
		if($mode == MODE_SEARCH)
			$this->format = "";
		$disp = "";
		$strfilename = "";
		$function = "";
		if($mode == MODE_EDIT || $mode == MODE_INLINE_EDIT)
		{
//	show current file
			if($this->pageObject->pSet->getViewFormat($this->field) == FORMAT_FILE 
				|| $this->pageObject->pSet->getViewFormat($this->field) == FORMAT_FILE_IMAGE)
			{
				if(!CheckImageExtension($value))
					$disp =  "";
				else 
				{
					if($this->pageObject->pSet->showThumbnail($this->field))
					{
						$thumbprefix = $this->pageObject->pSet->getStrThumbnail($this->field);
					 	// show thumbnail
						$thumbname = $thumbprefix.$value;
						if(substr($this->pageObject->pSet->getLinkPrefix($this->field),0,7)!="http://" 
							&& !myfile_exists(getabspath($this->pageObject->pSet->getLinkPrefix($this->field).$thumbname)))
							$thumbname=$value;
						$linkPrefix = "<a target=_blank";
									
						$disp = $linkPrefix." href=\"".htmlspecialchars(AddLinkPrefix($this->pageObject->pSet, $this->field, $value))."\" class='zoombox'>";
						$disp.="<img";
						if(isEnableSection508())
							$disp.= " alt=\"".htmlspecialchars($value)."\"";
						$disp.=" border=0";
						$disp.=" src=\"".htmlspecialchars(AddLinkPrefix($this->pageObject->pSet, $this->field,$thumbname))."\"></a>";
					}
					else
						if(isEnableSection508())
							$disp='<img alt=\"".htmlspecialchars($data[$field])."\" src="'.AddLinkPrefix($this->pageObject->pSet, $this->field, $value).'" border=0>';
						else
							$disp='<img src="'.htmlspecialchars(AddLinkPrefix($this->pageObject->pSet, $this->field, $value)).'" border=0>';
				}
			}
			$filename = $value;
//	filename edit
			$filename_size = 30;
			if($this->pageObject->pSet->isUseTimestamp($this->field))
				$filename_size = 50;
			$strfilename = '<input type=hidden name="filenameHidden_'.$this->cfieldname.'" value="'.htmlspecialchars($filename).'"><br>'
				."Filename"
				.'&nbsp;&nbsp;<input type="text" style="background-color:gainsboro" disabled id="filename_'.$this->cfieldname
				.'" name="filename_'.$this->cfieldname.'" size="'.$filename_size.'" maxlength="100" value="'.htmlspecialchars($filename).'">';
			$strtype = '<br><input id="'.$this->ctype.'_keep" type="Radio" name="'.$this->ctype
					.'" value="upload0" checked class="runner-uploadtype">'."Keep";
			
			if((strlen($value) || $mode==MODE_INLINE_EDIT) && !$this->pageObject->pSet->isRequired($this->field))
			{
				$strtype .= '<input id="'.$this->ctype.'_delete" type="Radio" name="'.$this->ctype
					.'" value="upload1" class="runner-uploadtype">'."Delete";
			}
			$strtype .= '<input id="'.$this->ctype.'_update" type="Radio" name="'.$this->ctype
				.'" value="upload2" class="runner-uploadtype">'."Update";
		}
		else
		{
//	if Adding record
			$filename_size=30;
			if($this->pageObject->pSet->isUseTimestamp($this->field))
				$filename_size=50;
			$strtype='<input id="'.$this->ctype.'" type="hidden" name="'.$this->ctype.'" value="upload2">';
			$strfilename='<br>'."Filename"
				.'&nbsp;&nbsp;<input type="text" id="filename_'.$this->cfieldname.'" name="filename_'.$this->cfieldname.'" size="'
				.$filename_size.'" maxlength="100">';			
		}
		echo $disp.$strtype.$function;
		
		if ($mode==MODE_EDIT || $mode==MODE_INLINE_EDIT)
		{
			echo '<br>';
		}
		
		echo '<input type="File" id="'.$this->cfield.'" '.(($mode==MODE_INLINE_EDIT || $mode==MODE_INLINE_ADD) && $this->is508 == true 
			? 'alt="'.$this->strLabel.'" ' : '').' name="'.$this->cfield.'" >'.$strfilename;
		echo '<input type="Hidden" id="notempty_'.$this->cfieldname.'" value="'.(strlen($value)? 1 : 0).'">';
		$this->buildControlEnd($validate);
	}
	
	function readWebValue(&$avalues, &$blobfields, $strWhereClause, $oldValuesRead, &$filename_values = null)
	{
		$this->getPostValueAndType();
		if (FieldSubmitted($this->goodFieldName."_".$this->id))
		{
			$fileNameForPrepareFunc = securityCheckFileName(postvalue("filename_".$this->goodFieldName."_".$this->id));
			if($this->pageObject->pageType != PAGE_EDIT)
			{
				$this->webValue = prepare_upload($this->field, "upload2", $fileNameForPrepareFunc, $fileNameForPrepareFunc, ""
					, $this->id, $this->pageObject);
			}
			else
			{
				if(substr($this->webType, 0, 4) == "file")
				{
					$prepearedFile = prepare_file($this->webValue, $this->field, $this->webType, $fileNameForPrepareFunc, $this->id);
					if($prepearedFile !== false)
					{
						$this->webValue = $prepearedFile["value"];
						$filename = $prepearedFile["filename"];
					}
					else 
					$this->webValue = false;
				}
				else if(substr($this->webType, 0, 6) == "upload")
				{
					if($fileNameForPrepareFunc)
						$this->webValue = $fileNameForPrepareFunc;
					if($this->webType == "upload1")
					{
						// file deletion, read filename from the database
						if(!$oldValuesRead)
						{
							$rsold = db_query($this->pageObject->gQuery->gSQLWhere($strWhereClause), $this->conn);
							$dataold = db_fetch_array($rsold);
							$oldValuesRead = true;
						}
						$fileNameForPrepareFunc = $dataold[$this->field];
					}
					$this->webValue = prepare_upload($this->field, $this->webType, $fileNameForPrepareFunc, $this->webValue, "", $this->id, $this->pageObject);
				}
			}
		}
		else
			$this->webValue = false;
		
		if(!($this->webValue === false))
		{
			if($this->webValue)
			{
				if($this->pageObject->pSet->getResizeOnUpload($this->field) 
					|| $this->pageObject->pSet->getCreateThumbnail($this->field))
					$contents = GetUploadedFileContents("value_".$this->goodFieldName."_".$this->id);
			
				if($this->webValue && $this->pageObject->pSet->getCreateThumbnail($this->field))
				{
					$ext = CheckImageExtension(GetUploadedFileName("value_".$this->goodFieldName."_".$this->id));
					$thumb = CreateThumbnail($contents, $this->pageObject->pSet->getThumbnailSize($this->field), $ext);
					$this->pageObject->filesToSave[] = new SaveFile($thumb, $this->pageObject->pSet->GetStrThumbnail($this->goodFieldName)
						.$this->webValue, $this->pageObject->pSet->getUploadFolder($this->field), $this->pageObject->pSet->isAbsolute($this->field));
				}
				$avalues[$this->field] = $this->webValue;
			}
		}
	}
}
?>