<?php
$strTableName="Acumulative Sales By Month";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="dbo.Month_Merge_Conversion";

$gstrOrderBy="ORDER BY Id";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

// alias for 'SQLQuery' object
$gSettings = new ProjectSettings("Acumulative Sales By Month");
$gQuery = $gSettings->getSQLQuery();
$eventObj = &$tableEvents["Acumulative Sales By Month"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = $gQuery->gSQLWhere("");

?>