<?php
$strTableName="Acumulative Electricity Average Chart";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="dbo.Motel_Electricity_Average";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

// alias for 'SQLQuery' object
$gSettings = new ProjectSettings("Acumulative Electricity Average Chart");
$gQuery = $gSettings->getSQLQuery();
$eventObj = &$tableEvents["Acumulative Electricity Average Chart"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = $gQuery->gSQLWhere("");

?>