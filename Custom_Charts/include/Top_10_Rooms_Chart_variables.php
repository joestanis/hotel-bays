<?php
$strTableName="Top 10 Rooms Chart";
$_SESSION["OwnerID"] = $_SESSION["_".$strTableName."_OwnerID"];

$strOriginalTableName="dbo.Motel_Top_Rooms";

$gstrOrderBy="ORDER BY [Sum] DESC";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy="order by ".$gstrOrderBy;

// alias for 'SQLQuery' object
$gSettings = new ProjectSettings("Top 10 Rooms Chart");
$gQuery = $gSettings->getSQLQuery();
$eventObj = &$tableEvents["Top 10 Rooms Chart"];

$reportCaseSensitiveGroupFields = false;

$gstrSQL = $gQuery->gSQLWhere("");

?>