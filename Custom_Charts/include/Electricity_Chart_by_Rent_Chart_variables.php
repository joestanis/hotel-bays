<?php
$strTableName="Electricity Chart by Rent Chart";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="dbo.Electricity_Chart_by_Rent";

$gstrOrderBy="ORDER BY Average DESC";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

// alias for 'SQLQuery' object
$gSettings = new ProjectSettings("Electricity Chart by Rent Chart");
$gQuery = $gSettings->getSQLQuery();
$eventObj = &$tableEvents["Electricity Chart by Rent Chart"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = $gQuery->gSQLWhere("");

?>