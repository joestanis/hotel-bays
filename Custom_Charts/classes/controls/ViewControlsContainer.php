<?php
class ViewControlsContainer
{
	public $viewControls = array();
	public $pSet = null;
	public $pageType = "";
	/**
	 * Reference to RunnerPage (or its descendant) instance 
	 */
	public $pageObject = null;
	public $forExport = "";
	/**
	 * A flag indicating whether this container is an internal object of ViewControl (for LookupWizard fields only)
	 * @var {bool}
	 */
	public $isLocal = false;
	
	public $recId = 0;
	
	/**
	 *	The list of including js files 
	 */	  
	var $includes_js = array();
	/**
	 *	The list of including js files 
	 */
	var $includes_jsreq = array();
	/**
	 *	The list of including css files
	 */
	var $includes_css = array();
	
	public function ViewControlsContainer($pSet, $pageType, $pageObject = null)
	{
		$this->pSet = $pSet;
		$this->pageType = $pageType;
		$this->pageObject = $pageObject;
	}
	
	function setForExportVar($forExport)
	{
		$this->forExport = $forExport;
	}
	
	/**
	  * Add js files for page
	  */
	function AddJSFile($file,$req1="",$req2="",$req3="")
	{
		$this->includes_js[] = $file;
		if($req1!="")
			$this->includes_jsreq[$file] = array($req1);
		if($req2!="")
			$this->includes_jsreq[$file][] = $req2;
		if($req3!="")
			$this->includes_jsreq[$file][] = $req3;
	}
	
	/**
	  * Add css files for page
	  */	
	function AddCSSFile($file)
	{
		$this->includes_css[] = $file;
	}
	
	function addControlsJSAndCSS()
	{
		$pageTypes = array();
		switch ($this->pageType)
		{
			case PAGE_VIEW:
				$pageTypeStr = "View";
				break;
			case PAGE_PRINT:
			case PAGE_RPRINT:
				$pageTypeStr = "Printer";
				break;
			case PAGE_LIST:
			case PAGE_SEARCH:
			case PAGE_REPORT:
			case PAGE_CHART:
				$pageTypeStr = "List";
				break;
			default:
				return;
		}
		$getFieldsFunc = "get".$pageTypeStr."Fields";
		$appearOnPageFunc = "appearOn".$pageTypeStr."Page";
		$fields = $this->pSet->$getFieldsFunc();
		for($i = 0; $i < count($fields); $i++)
		{
			if($this->pSet->$appearOnPageFunc($fields[$i]))
			{
				$this->getControl($fields[$i])->addJSFiles();
				$this->getControl($fields[$i])->addCSSFiles();
			}
		}
	}
	
	/**
	 * Create new control (if needed) for view field, and return it
	 * @param {string} field name
	 * @param {string} predefined view format 
	 */
	public function getControl($field, $format = null)
	{
		// if conrol does not created previously  
		if(!array_key_exists($field, $this->viewControls))
		{
			include_once(getabspath("classes/controls/ViewControl.php"));
			$vcTypes = new ViewControlTypes();
			$editFormat = $this->pSet->getEditFormat($field);
			if(is_null($format)){
				if(!$this->isLocal
					&&($editFormat == EDIT_FORMAT_LOOKUP_WIZARD || $editFormat == EDIT_FORMAT_RADIO) 
					&& ($this->pSet->getLookupType($field) == LT_LOOKUPTABLE
						|| $this->pSet->getLookupType($field) == LT_QUERY) 
					&& $this->pSet->getLWLinkField($field) != $this->pSet->getLWDisplayField($field))
				{
					$viewFormat = FORMAT_LOOKUP_WIZARD;
				}else
					$viewFormat = $this->pSet->getViewFormat($field);
			}else 
				$viewFormat = $format;
				
			if($viewFormat == FORMAT_FILE_IMAGE && $this->pSet->isCompatibilityMode($field))
				$viewFormat = FORMAT_FILE_IMAGE_OLD;
				
			$className = $vcTypes->viewTypes[$viewFormat];
			if($className == "" && $viewFormat != "")
			{
				$className = "View".$viewFormat;
				$isUserControl = true;
				include_once(getabspath("classes/controls/ViewUserControl.php"));
			}
		
			if($className != "")
			{
				include_once(getabspath("classes/controls/".$className.".php"));
				$this->viewControls[$field] = new $className($field, $this, $this->pageObject);
			}
			else
				$this->viewControls[$field] = new ViewControl($field, $this, $this->pageObject);
			
			if($isUserControl)
			{
				$this->viewControls[$field]->viewFormat = $className;
				$this->viewControls[$field]->initUserControl();
				$this->viewControls[$field]->init();
			}
		}
		return $this->viewControls[$field];
	}
	
	/**
	 * showDBValue
	 * Wrapper for ViewControl creation and showDBValue call on it
	 * @param {string} field name
	 * @param {array} associative array with record data
	 * @param {string} string with record keys and values
	 */
	function showDBValue($field, &$data, $keylink = "")
	{
		return $this->getControl($field)->showDBValue($data, $keylink);
	}
}
?>