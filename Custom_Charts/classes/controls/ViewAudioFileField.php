<?php
include_once getabspath("classes/controls/ViewFileField.php");
class ViewAudioFileField extends ViewFileField
{
	public function showDBValue(&$data, $keylink)
	{
		$value = "";
		$fileName = $data[$this->field];
		$fieldIsUrl = $this->container->pSet->isVideoUrlField($this->field);
		if (strlen($fileName)){
			if(!$fieldIsUrl){
				$this->upload_handler->tkeys = $keylink;
				$filesArray = $this->getFilesArray($fileName);
			}
			else 
				$filesArray = array($fileName);
			
			$title = "";
			$titleField = $this->container->pSet->getAudioTitleField($this->field);
			if ($titleField){
				$title = htmlspecialchars($data[$titleField]);
			}
			foreach ($filesArray as $file)
			{
				if($this->container->pageType == PAGE_EXPORT
					|| $this->container->pageType == PAGE_PRINT 
					|| $this->container->pageType == PAGE_REPORT && $this->container->forExport != '')
				{
					if($value != "")
						$value .= ", ";
					if ($fieldIsUrl)
						$value .= $file;
					else 
						$value .= $file["usrName"];
					continue;
				}
				// if file
				if(!$fieldIsUrl)
				{
					if(!file_exists($file["name"]))
						continue;
				}
				if ($fieldIsUrl){
					$href = $file;
				}else{
					$userFile = $this->upload_handler->buildUserFile($file);
					$href = htmlspecialchars($userFile["url"]);
					if(!$title)
						$title = $userFile["name"];
				}
				$value .= '<a class="htrack" type="audio/mpeg" title="'.$title.'" href="'.$href.'">'.$title.'</a>';
			}
		}
		return $value;
	}
}
?>