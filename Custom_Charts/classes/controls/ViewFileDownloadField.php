<?php
include_once getabspath("classes/controls/ViewFileField.php");
class ViewFileDownloadField extends ViewFileField
{
	public $sizeUnits = array();
	
	/**
	 * addJSFiles
	 * Add control JS files to page object
	 */
	function ViewFileDownloadField($field, $container, $pageobject)
	{
		parent::ViewFileField($field, $container, $pageobject);
		$this->sizeUnits = array("KB", "MB", "GB", "TB");
	}
	function addJSFiles()
	{
		if($this->container->pSet->showThumbnail($this->field))
			$this->getContainer()->AddJSFile("include/zoombox/zoombox.js");
	}
	
	/**
	 * addCSSFiles
	 * Add control CSS files to page object
	 */ 
	function addCSSFiles()
	{
		if($this->container->pSet->showThumbnail($this->field))
			$this->getContainer()->AddCSSFile("include/zoombox/zoombox.css");
	}
	
	public function showDBValue(&$data, $keylink)
	{
		$value = "";
		$this->upload_handler->tkeys = $keylink;
		$filesArray = $this->getFilesArray($data[$this->field]);
		$showThumbnails = $this->container->pSet->showThumbnail($this->field);
		$isExport = $this->container->pageType == PAGE_EXPORT 
			|| $this->container->pageType == PAGE_REPORT && $this->container->forExport != ''; 
		if($showThumbnails)
			$zoomboxRand = rand(11111, 99999);
		foreach ($filesArray as $file)
		{
			$userFile = $this->upload_handler->buildUserFile($file);
			if(!$isExport)
			{
				if($showThumbnails && $userFile["thumbnail_url"] != "" && CheckImageExtension($file["name"])) 
				{
					$value .= ($value != "" ? "</br>" : "")
						."<a target=_blank href=\"".htmlspecialchars($userFile["url"])
						."\" class='zoombox zgallery".$zoomboxRand."'><img  border='0'";
					if($this->is508)
						$value .= " alt=\"".htmlspecialchars($userFile["name"])."\"";
					$value .= " src=\"".htmlspecialchars($userFile["thumbnail_url"])."\" /></a>";
				}
				else if($this->container->pSet->showIcon($this->field)) 
				{
					$value .= ($value != "" ? "</br>" : "")."<img src='images/icons/".$this->getFileIconByType($file["name"], $file["type"])."' />";
				}
			}
			
			if($this->container->pSet->showCustomExpr($this->field))
			{
				$value .= fileCustomExpression($file, $data, $this->field, $this->container->pageType);
			}
			else
			{
				if($isExport)
					$value .= ($value != "" ? ", " : "").$file["usrName"];
				else
					$value .= ($value != "" ? "<br />" : "")
						.'<a href="'.htmlspecialchars($userFile["url"]).'">'
						.htmlspecialchars($file["usrName"] != "" ? $file["usrName"] : $file["name"]).'</a>';
			}
			if($this->container->pSet->showFileSize($this->field))
			{
				$fileSizeAndUnit = $this->getFileSizeAndUnits($file["size"]);
				$value .= " ".str_format_number(round($fileSizeAndUnit["size"], 2))
					." ".$this->sizeUnits[$fileSizeAndUnit["unitIndex"]];
			}
		}
		return $value;
	}
	
	public function getFileSizeAndUnits($size, $deepLevel = 0)
	{
		$shrinkedSize = $size / 1024;
		if($shrinkedSize > 1024 && $deepLevel < count($this->sizeUnits) - 1)
			return $this->getFileSizeAndUnits($shrinkedSize, $deepLevel + 1);
		return array("size" => $shrinkedSize, "unitIndex" => $deepLevel);
	}
	
	public function getFileIconByType($file_name, $fileType)
	{
		$fileName = "no_image.gif";
		if($fileType == "")
		{
			$fileType = getContentTypeByExtension(substr($file_name, strrpos($file_name, '.')));
		}
		switch($fileType)
		{
			case "text/html":
				$fileName = "html.png";
				break;
			case "text/asp":
				$fileName = "code.png";
				break;
			case "application/msword":
			case "application/vnd.openxmlformats-officedocument.wordprocessingml.document":
				$fileName = "doc.png";
				break;
			case "application/vnd.ms-excel":
			case "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet":
				$fileName = "xls.png";
				break;
			case "application/rtf":
				$fileName = "rtf.png";
				break;
			case "image/png":
			case "image/x-png":
			case "image/gif":
			case "image/jpeg":
			case "image/pjpeg":
				$fileName = "jpg.png";
				break;
			case "audio/wav":
				$fileName = "wma.png";
				break;
			case "audio/mp3":
			case "audio/mpeg3":
			case "audio/mpeg":
				$fileName = "mp2.png";
				break;
			case "video/mpeg":
				$fileName = "mpeg.png";
				break;
			case "video/flv":
				$fileName = "flv.png";
				break;
			case "video/mp4":
				$fileName = "mp4.png";
				break;
			case "video/x-ms-asf":
				$fileName = "asf.png";
				break;
			case "video/webm":
			case "video/x-webm":
			case "video/avi":
				$fileName = "mpg.png";
				break;
			case "application/zip":
			case "application/x-zip-compressed":
				$fileName = "zip.png";
				break;
			default:
				$fileName = "text.png";
		}
		return $fileName;
	}
}
?>