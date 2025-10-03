<?php
include_once getabspath("classes/controls/ViewFileField.php");
class ViewImageDownloadField extends ViewFileField
{
	/**
	 * addJSFiles
	 * Add control JS files to page object
	 */
	function addJSFiles()
	{
		$this->getContainer()->AddJSFile("include/sudo/jquery.sudoSlider.js");
		$this->getContainer()->AddJSFile("include/zoombox/zoombox.js");
	}
	
	/**
	 * addCSSFiles
	 * Add control CSS files to page object
	 */ 
	function addCSSFiles()
	{
		$this->getContainer()->AddCSSFile("include/sudo/style.css");
		$this->getContainer()->AddCSSFile("include/zoombox/zoombox.css");
	}
	
	public function showDBValue(&$data, $keylink)
	{
		$this->upload_handler->tkeys = $keylink;
		$filesArray = $this->getFilesArray($data[$this->field]);
		$resultValues = array();
		$zoomboxRand = rand(11111, 99999);
		foreach ($filesArray as $imageFile)
		{
			$userFile = $this->upload_handler->buildUserFile($imageFile);
			if($this->container->pageType == PAGE_EXPORT || $this->container->pageType == PAGE_REPORT && $this->container->forExport != '')
			{
				$resultValues[] = $userFile["name"];
				continue;
			}
			if(CheckImageExtension($imageFile["name"])) 
			{
				$userFile["url"] .= "&nodisp=1";
				if($userFile["thumbnail_url"] != "")
					$userFile["thumbnail_url"] .= "&nodisp=1";
				$imageValue = "";
				if($this->container->pSet->showThumbnail($this->field)) 
				{
					$imageValue .= "<a target=_blank";
					
					$imageValue .= " href=\"".htmlspecialchars($userFile["url"])."\" class='zoombox zgallery".$zoomboxRand."'>";
					$imageValue .= "<img";
					
					$imageValue .= " border='0'";
					if($this->is508)
						$imageValue .= " alt=\"".htmlspecialchars($userFile["name"])."\"";
					$imageValue .= " src=\"".htmlspecialchars($userFile["thumbnail_url"] != "" ? $userFile["thumbnail_url"] :
						$userFile["url"])."\" /></a>";
				} 
				else 
				{
					$imageValue .= "<img";
					
					$imgWidth = $this->container->pSet->getImageWidth($this->field);
					$imageValue.=($imgWidth ? " width=".$imgWidth : "");
					
					$imgHeight = $this->container->pSet->getImageHeight($this->field);
					$imageValue .=($imgHeight ? " height=".$imgHeight : "");
					
					$imageValue .= " border=0";
					if($this->is508)
						$imageValue.= " alt=\"".htmlspecialchars($userFile["name"])."\"";
					$imageValue .= " src=\"".htmlspecialchars($userFile["url"])."\">";
				}
				$resultValues[] = $imageValue;
			}
			else 
				$resultValues[] = '<a href="'.htmlspecialchars($userFile["url"]).'">'.$userFile["name"].'</a>';
		}
		if(count($resultValues) > 1)
		{
			if($this->container->pageType == PAGE_EXPORT)
				return implode(', ', $resultValues);

			if($this->container->pageType == PAGE_PRINT)
				return implode('<br />', $resultValues);
				
			for($i = 0; $i < count($resultValues); $i++)
				$resultValues[$i] = '<li>'.$resultValues[$i].'</li>';
			return '<div style="position:relative;"><div class="presudoslider"><ul style="list-style: none;">'.implode("",$resultValues).'</ul></div></div>';
		}
		else if(count($resultValues) == 1)
			return $resultValues[0];
		return "";
	}
}
?>