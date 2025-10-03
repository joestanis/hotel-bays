<?php
class ViewLookupWizardField extends ViewControl
{
	public $nLookupType;
	public $lookupTable;
	public $displayFieldName;
	public $linkFieldName;
	public $linkAndDisplaySame;
	public $lookupPSet;
	public $cipherer; 
	public $lookupQueryObj;
	public $displayFieldIndex;
	public $LookupSQL;
	
	public $localControlsContainer;
		
	public function ViewLookupWizardField($field, $container, $pageObject)
	{
		parent::ViewControl($field, $container, $pageObject);
		
		$this->nLookupType = null;
		$this->lookupTable = "";
		$this->displayFieldName = "";
		$this->linkFieldName = "";
		$this->linkAndDisplaySame = false;
		$this->lookupPSet = null;
		$this->cipherer = null; 
		$this->lookupQueryObj = null;
		$this->displayFieldIndex = 0;
		$this->LookupSQL = "";
		
		$this->nLookupType = $this->container->pSet->getLookupType($this->field);
		$this->lookupTable = $this->container->pSet->getLookupTable($this->field);
		$this->displayFieldName = $this->container->pSet->getDisplayField($this->field);
		$this->linkFieldName = $this->container->pSet->getLinkField($this->field);
		$this->linkAndDisplaySame = $this->displayFieldName == $this->linkFieldName;
		if($this->nLookupType == LT_QUERY){
			$this->lookupPSet = new ProjectSettings($this->lookupTable, $this->container->pageType);
			$this->cipherer = new RunnerCipherer($this->lookupTable);
			if($this->container->pSet->getCustomDisplay($this->field))
				$this->lookupPSet->getSQLQuery()->AddCustomExpression($this->displayFieldName, $this->lookupPSet, $this->container->pSet->_table, $this->field);
			$this->lookupQueryObj = $this->lookupPSet->getSQLQuery()->CloneObject();
			$this->lookupQueryObj->ReplaceFieldsWithDummies($this->lookupPSet->getBinaryFieldsIndices());
			$lookupIndexes = GetLookupFieldsIndexes($this->container->pSet, $this->field);
			$this->displayFieldIndex = $lookupIndexes["displayFieldIndex"];			
		}else{
			$this->cipherer = new RunnerCipherer($this->container->pSet->_table);
			$this->LookupSQL = "SELECT ";
			$this->LookupSQL.= $this->container->pSet->getLWDisplayField($this->field);
			$this->LookupSQL.= " FROM ".AddTableWrappers($this->container->pSet->getLookupTable($this->field))." WHERE ";
		}
		
		$this->localControlsContainer = new ViewControlsContainer($this->container->pSet, $this->container->pageType, $pageObject);
		$this->localControlsContainer->isLocal = true;
	}
	
	public function showDBValue(&$data, $keylink)
	{
		global $conn, $strTableName;
		$value = $data[$this->field];
		if(!strlen($value))
			return "";
		
		$where = "";
		$out = "";
		$lookupvalue = $value;
		$iquery = "field=".htmlspecialchars(rawurlencode($this->field)).$keylink; 
		
		$where = GetLWWhere($this->field, $this->container->pageType);
		if($this->container->pSet->multiSelect($this->field))
		{
			$arr = splitvalues($value);
			$numeric = true;
			$type = $this->container->pSet->getLWLinkFieldType($this->field);
			if(!$type)
			{
				foreach($arr as $val)
					if(strlen($val) && !is_numeric($val))
					{
						$numeric=false;
						break;
					}
			}
			else
				$numeric = !NeedQuotes($type);
			$in = "";
			foreach($arr as $val)
			{
				if($numeric && !strlen($val))
					continue;
				if(strlen($in))
					$in.= ",";
				if($numeric)
					$in.= ($val+0);
				else
					$in.= db_prepare_string($this->cipherer->EncryptField($this->nLookupType == LT_QUERY ? $this->linkFieldName : $this->field, $val));
			}
			if(strlen($in))
			{
				if($this->nLookupType == LT_QUERY){
					$inWhere = GetFullFieldName($this->linkFieldName, $this->lookupTable, false)." in (".$in.")";
					if(strlen($where))
						$inWhere.=" and (".$where.")";
					$LookupSQL = $this->lookupQueryObj->toSql(whereAdd($this->lookupQueryObj->m_where->toSql($this->lookupQueryObj), $inWhere));
				}else{
					$LookupSQL = $this->LookupSQL.$this->container->pSet->getLWLinkField($this->field)." in (".$in.")";
					if(strlen($where))
						$LookupSQL.=" and (".$where.")";
				}
				LogInfo($LookupSQL);
				$rsLookup = db_query($LookupSQL,$conn);
				$found = false;
				$lookupArrTmp = array(); 
				$lookupArr = array(); 
				while($lookuprow=db_fetch_numarray($rsLookup))
				{
					$lookupArrTmp[] = $lookuprow[$this->displayFieldIndex];
				}
				$lookupArr = array_unique($lookupArrTmp);
				$localData = $data;				
				foreach($lookupArr as $lookupvalue)
				{
					if($found)
						$out.= ",";
					$found = true;
					$localData[$this->field] = $lookupvalue;
					$outVal = $this->localControlsContainer->showDBValue($this->field, $localData, $keylink);
					$out.= $this->nLookupType == LT_QUERY || $this->linkAndDisplaySame ? 
						$this->cipherer->DecryptField($this->nLookupType == LT_QUERY ? $this->displayFieldName : $this->field, $outVal) : $outVal;
				}
				return $out;
			}
		}
		else
		{
			$found = false;
			$strdata = $this->cipherer->MakeDBValue($this->nLookupType == LT_QUERY ? $this->linkFieldName : $this->field, $value, "", "", true);
			if($this->nLookupType == LT_QUERY){
				$strWhere = GetFullFieldName($this->linkFieldName, $this->lookupTable, false)." = " . $strdata;
				if(strlen($where))
					$strWhere.= " and (".$where.")";
				$LookupSQL = $this->lookupQueryObj->toSql(whereAdd($this->lookupQueryObj->m_where->toSql($this->lookupQueryObj), $strWhere));
			}else{
				$strWhere = $this->container->pSet->getLWLinkField($this->field)." = " . $strdata;
				if(strlen($where))
					$strWhere.= " and (".$where.")";
				$LookupSQL = $this->LookupSQL.$strWhere;
			}
			LogInfo($LookupSQL);
			$rsLookup = db_query($LookupSQL,$conn);
			if($lookuprow = db_fetch_numarray($rsLookup)){
				$lookupvalue = $lookuprow[$this->displayFieldIndex];
				$found = true;
			}
		}
		if(!$out){
			if($found && ($this->nLookupType == LT_QUERY || $this->linkAndDisplaySame)){
				$lookupvalue = $this->cipherer->DecryptField($this->nLookupType == LT_QUERY ? $this->displayFieldName : $this->field, $lookupvalue);
			}
			$localData = $data;
			$localData[$this->field] = $lookupvalue;
			$out = $this->localControlsContainer->showDBValue($this->field, $localData, $keylink);
		}
		return $out;
	}
}
?>