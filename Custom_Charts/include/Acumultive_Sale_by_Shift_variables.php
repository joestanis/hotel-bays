<?php
$strTableName="Acumultive Sale by Shift";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="dbo.Motel_Live_Data_Qry";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

// alias for 'SQLQuery' object
$gSettings = new ProjectSettings("Acumultive Sale by Shift");
$gQuery = $gSettings->getSQLQuery();
$eventObj = &$tableEvents["Acumultive Sale by Shift"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = $gQuery->gSQLWhere("");

?>