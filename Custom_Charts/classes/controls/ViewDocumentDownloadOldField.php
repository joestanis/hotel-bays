<?php
class ViewDocumentDownloadOldField extends ViewControl
{
	/**
	 * addJSFiles
	 * Add control JS files to page object
	 */
	function addJSFiles()
	{
		$this->getContainer()->AddJSFile("include/zoombox/zoombox.js");
	}
	
	/**
	 * addCSSFiles
	 * Add control CSS files to page object
	 */ 
	function addCSSFiles()
	{
		$this->getContainer()->AddCSSFile("include/zoombox/zoombox.css");
	}
	
	public function showDBValue(&$data, $keylink)
	{
		if($this->container->forExport && $this->container->forExport != "excel")
			return "LONG BINARY DATA - CANNOT BE DISPLAYED";
		$result = $data[$this->field];
		if(!CheckImageExtension($result))
			return "";
			
		if($this->container->forExport == "excel")
			return $result;
		if($this->container->pSet->showThumbnail($this->field))
		{
			$thumbprefix = $this->container->pSet->getStrThumbnail($this->field);
		 	// show thumbnail
			$thumbname = $thumbprefix.$result;
			if(substr($this->container->pSet->getLinkPrefix($this->field),0,7)!="http://" 
				&& !myfile_exists(getabspath($this->container->pSet->getLinkPrefix($this->field).$thumbname)))
				$thumbname = $result;
			$linkPrefix = "<a target=_blank";
						
			$result = $linkPrefix." href=\"".htmlspecialchars(AddLinkPrefix($this->container->pSet, $this->field, $result))."\" class='zoombox'>";
			$result.="<img";
			if($this->is508)
				$result.= " alt=\"".htmlspecialchars($data[$this->field])."\"";
			$result.=" border=0";
			$result.=" src=\"".htmlspecialchars(AddLinkPrefix($this->container->pSet, $this->field,$thumbname))."\"></a>";
		}
		else
			if($this->is508)
				$result='<img alt=\"".htmlspecialchars($data[$this->field])."\" src="'.AddLinkPrefix($this->container->pSet, $this->field, $result).'" border=0>';
			else
				$result='<img src="'.htmlspecialchars(AddLinkPrefix($this->container->pSet, $this->field, $result)).'" border=0>';
		return $result;
	}
}
?>