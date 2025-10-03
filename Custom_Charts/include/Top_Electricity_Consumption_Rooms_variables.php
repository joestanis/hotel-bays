<?php
$strTableName="Top Electricity Consumption Rooms";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="dbo.Motel_Electricity_Average";

$gstrOrderBy="";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

// alias for 'SQLQuery' object
$gSettings = new ProjectSettings("Top Electricity Consumption Rooms");
$gQuery = $gSettings->getSQLQuery();
$eventObj = &$tableEvents["Top Electricity Consumption Rooms"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = $gQuery->gSQLWhere("");

?>