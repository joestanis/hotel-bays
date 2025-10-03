<?php
require_once(getabspath("classes/cipherer.php"));
$tdataTop_Electricity_Consumption_Rooms = array();
	$tdataTop_Electricity_Consumption_Rooms[".ShortName"] = "Top_Electricity_Consumption_Rooms";
	$tdataTop_Electricity_Consumption_Rooms[".OwnerID"] = "";
	$tdataTop_Electricity_Consumption_Rooms[".OriginalTable"] = "dbo.Motel_Electricity_Average";

//	field labels
$fieldLabelsTop_Electricity_Consumption_Rooms = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsTop_Electricity_Consumption_Rooms["English"] = array();
	$fieldToolTipsTop_Electricity_Consumption_Rooms["English"] = array();
	$fieldLabelsTop_Electricity_Consumption_Rooms["English"]["Room"] = "Room";
	$fieldToolTipsTop_Electricity_Consumption_Rooms["English"]["Room"] = "";
	$fieldLabelsTop_Electricity_Consumption_Rooms["English"]["Count"] = "Count";
	$fieldToolTipsTop_Electricity_Consumption_Rooms["English"]["Count"] = "";
	$fieldLabelsTop_Electricity_Consumption_Rooms["English"]["Hours"] = "Hours";
	$fieldToolTipsTop_Electricity_Consumption_Rooms["English"]["Hours"] = "";
	$fieldLabelsTop_Electricity_Consumption_Rooms["English"]["Converted"] = "Converted";
	$fieldToolTipsTop_Electricity_Consumption_Rooms["English"]["Converted"] = "";
	if (count($fieldToolTipsTop_Electricity_Consumption_Rooms["English"]))
		$tdataTop_Electricity_Consumption_Rooms[".isUseToolTips"] = true;
}
	
	
	$tdataTop_Electricity_Consumption_Rooms[".NCSearch"] = true;

	$tdataTop_Electricity_Consumption_Rooms[".ChartRefreshTime"] = 0;


$tdataTop_Electricity_Consumption_Rooms[".shortTableName"] = "Top_Electricity_Consumption_Rooms";
$tdataTop_Electricity_Consumption_Rooms[".nSecOptions"] = 0;
$tdataTop_Electricity_Consumption_Rooms[".recsPerRowList"] = 1;
$tdataTop_Electricity_Consumption_Rooms[".mainTableOwnerID"] = "";
$tdataTop_Electricity_Consumption_Rooms[".moveNext"] = 1;
$tdataTop_Electricity_Consumption_Rooms[".nType"] = 3;

$tdataTop_Electricity_Consumption_Rooms[".strOriginalTableName"] = "dbo.Motel_Electricity_Average";




$tdataTop_Electricity_Consumption_Rooms[".showAddInPopup"] = false;

$tdataTop_Electricity_Consumption_Rooms[".showEditInPopup"] = false;

$tdataTop_Electricity_Consumption_Rooms[".showViewInPopup"] = false;

$tdataTop_Electricity_Consumption_Rooms[".fieldsForRegister"] = array();

$tdataTop_Electricity_Consumption_Rooms[".listAjax"] = false;

	$tdataTop_Electricity_Consumption_Rooms[".audit"] = false;

	$tdataTop_Electricity_Consumption_Rooms[".locking"] = false;

$tdataTop_Electricity_Consumption_Rooms[".listIcons"] = true;




$tdataTop_Electricity_Consumption_Rooms[".showSimpleSearchOptions"] = false;

$tdataTop_Electricity_Consumption_Rooms[".showSearchPanel"] = true;

if (isMobile())
	$tdataTop_Electricity_Consumption_Rooms[".isUseAjaxSuggest"] = false;
else 
	$tdataTop_Electricity_Consumption_Rooms[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdataTop_Electricity_Consumption_Rooms[".addPageEvents"] = false;

// use timepicker for search panel
$tdataTop_Electricity_Consumption_Rooms[".isUseTimeForSearch"] = false;




$tdataTop_Electricity_Consumption_Rooms[".allSearchFields"] = array();


$tdataTop_Electricity_Consumption_Rooms[".googleLikeFields"][] = "Room";
$tdataTop_Electricity_Consumption_Rooms[".googleLikeFields"][] = "Count";
$tdataTop_Electricity_Consumption_Rooms[".googleLikeFields"][] = "Hours";
$tdataTop_Electricity_Consumption_Rooms[".googleLikeFields"][] = "Converted";



$tdataTop_Electricity_Consumption_Rooms[".isTableType"] = "chart";

	



// Access doesn't support subqueries from the same table as main



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataTop_Electricity_Consumption_Rooms[".strOrderBy"] = $tstrOrderBy;

$tdataTop_Electricity_Consumption_Rooms[".orderindexes"] = array();

$tdataTop_Electricity_Consumption_Rooms[".sqlHead"] = "SELECT Room,   [Count],   Hours,   Converted";
$tdataTop_Electricity_Consumption_Rooms[".sqlFrom"] = "FROM dbo.Motel_Electricity_Average";
$tdataTop_Electricity_Consumption_Rooms[".sqlWhereExpr"] = "";
$tdataTop_Electricity_Consumption_Rooms[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataTop_Electricity_Consumption_Rooms[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataTop_Electricity_Consumption_Rooms[".arrGroupsPerPage"] = $arrGPP;

$tableKeysTop_Electricity_Consumption_Rooms = array();
$tdataTop_Electricity_Consumption_Rooms[".Keys"] = $tableKeysTop_Electricity_Consumption_Rooms;

$tdataTop_Electricity_Consumption_Rooms[".listFields"] = array();
$tdataTop_Electricity_Consumption_Rooms[".listFields"][] = "Room";
$tdataTop_Electricity_Consumption_Rooms[".listFields"][] = "Count";
$tdataTop_Electricity_Consumption_Rooms[".listFields"][] = "Hours";
$tdataTop_Electricity_Consumption_Rooms[".listFields"][] = "Converted";

$tdataTop_Electricity_Consumption_Rooms[".viewFields"] = array();
$tdataTop_Electricity_Consumption_Rooms[".viewFields"][] = "Room";
$tdataTop_Electricity_Consumption_Rooms[".viewFields"][] = "Count";
$tdataTop_Electricity_Consumption_Rooms[".viewFields"][] = "Hours";
$tdataTop_Electricity_Consumption_Rooms[".viewFields"][] = "Converted";

$tdataTop_Electricity_Consumption_Rooms[".addFields"] = array();
$tdataTop_Electricity_Consumption_Rooms[".addFields"][] = "Room";
$tdataTop_Electricity_Consumption_Rooms[".addFields"][] = "Count";
$tdataTop_Electricity_Consumption_Rooms[".addFields"][] = "Hours";
$tdataTop_Electricity_Consumption_Rooms[".addFields"][] = "Converted";

$tdataTop_Electricity_Consumption_Rooms[".inlineAddFields"] = array();
$tdataTop_Electricity_Consumption_Rooms[".inlineAddFields"][] = "Room";
$tdataTop_Electricity_Consumption_Rooms[".inlineAddFields"][] = "Count";
$tdataTop_Electricity_Consumption_Rooms[".inlineAddFields"][] = "Hours";
$tdataTop_Electricity_Consumption_Rooms[".inlineAddFields"][] = "Converted";

$tdataTop_Electricity_Consumption_Rooms[".editFields"] = array();
$tdataTop_Electricity_Consumption_Rooms[".editFields"][] = "Room";
$tdataTop_Electricity_Consumption_Rooms[".editFields"][] = "Count";
$tdataTop_Electricity_Consumption_Rooms[".editFields"][] = "Hours";
$tdataTop_Electricity_Consumption_Rooms[".editFields"][] = "Converted";

$tdataTop_Electricity_Consumption_Rooms[".inlineEditFields"] = array();
$tdataTop_Electricity_Consumption_Rooms[".inlineEditFields"][] = "Room";
$tdataTop_Electricity_Consumption_Rooms[".inlineEditFields"][] = "Count";
$tdataTop_Electricity_Consumption_Rooms[".inlineEditFields"][] = "Hours";
$tdataTop_Electricity_Consumption_Rooms[".inlineEditFields"][] = "Converted";

$tdataTop_Electricity_Consumption_Rooms[".exportFields"] = array();
$tdataTop_Electricity_Consumption_Rooms[".exportFields"][] = "Room";
$tdataTop_Electricity_Consumption_Rooms[".exportFields"][] = "Count";
$tdataTop_Electricity_Consumption_Rooms[".exportFields"][] = "Hours";
$tdataTop_Electricity_Consumption_Rooms[".exportFields"][] = "Converted";

$tdataTop_Electricity_Consumption_Rooms[".printFields"] = array();
$tdataTop_Electricity_Consumption_Rooms[".printFields"][] = "Room";
$tdataTop_Electricity_Consumption_Rooms[".printFields"][] = "Count";
$tdataTop_Electricity_Consumption_Rooms[".printFields"][] = "Hours";
$tdataTop_Electricity_Consumption_Rooms[".printFields"][] = "Converted";

//	Room
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "Room";
	$fdata["GoodName"] = "Room";
	$fdata["ownerTable"] = "dbo.Motel_Electricity_Average";
	$fdata["Label"] = "Room"; 
	$fdata["FieldType"] = 202;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Room"; 
		$fdata["FullName"] = "Room";
	
		
		
				
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["chart"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=10";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataTop_Electricity_Consumption_Rooms["Room"] = $fdata;
//	Count
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "Count";
	$fdata["GoodName"] = "Count";
	$fdata["ownerTable"] = "dbo.Motel_Electricity_Average";
	$fdata["Label"] = "Count"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Count"; 
		$fdata["FullName"] = "[Count]";
	
		
		
				
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["chart"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataTop_Electricity_Consumption_Rooms["Count"] = $fdata;
//	Hours
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "Hours";
	$fdata["GoodName"] = "Hours";
	$fdata["ownerTable"] = "dbo.Motel_Electricity_Average";
	$fdata["Label"] = "Hours"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Hours"; 
		$fdata["FullName"] = "Hours";
	
		
		
				
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["chart"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataTop_Electricity_Consumption_Rooms["Hours"] = $fdata;
//	Converted
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "Converted";
	$fdata["GoodName"] = "Converted";
	$fdata["ownerTable"] = "dbo.Motel_Electricity_Average";
	$fdata["Label"] = "Converted"; 
	$fdata["FieldType"] = 131;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Converted"; 
		$fdata["FullName"] = "Converted";
	
		
		
				
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Number");
	
		
		
		
			
		
		$vdata["DecimalDigits"] = 2;
	
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["chart"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataTop_Electricity_Consumption_Rooms["Converted"] = $fdata;

	$tdataTop_Electricity_Consumption_Rooms[".chartXml"] = '<chart>
		<attr value="tables">
			<attr value="0">Top Electricity Consumption Rooms</attr>
		</attr>
		<attr value="chart_type">
			<attr value="type">combined</attr>
		</attr>
		
		<attr value="parameters">';
	$tdataTop_Electricity_Consumption_Rooms[".chartXml"] .= '<attr value="0">
			<attr value="name">Hours</attr>
			<attr value="currencyFormat">0</attr>
			<attr value="decimalFormat">0</attr>
			<attr value="customFormat">0</attr>
			<attr value="customFormatStr"></attr>';
	$tdataTop_Electricity_Consumption_Rooms[".chartXml"] .= '</attr>';
	$tdataTop_Electricity_Consumption_Rooms[".chartXml"] .= '<attr value="1">
			<attr value="name">Count</attr>
			<attr value="currencyFormat">0</attr>
			<attr value="decimalFormat">0</attr>
			<attr value="customFormat">0</attr>
			<attr value="customFormatStr"></attr>';
	$tdataTop_Electricity_Consumption_Rooms[".chartXml"] .= '</attr>';
	$tdataTop_Electricity_Consumption_Rooms[".chartXml"] .= '<attr value="2">
		<attr value="name">Room</attr>
	</attr>';
	$tdataTop_Electricity_Consumption_Rooms[".chartXml"] .= '</attr>
			<attr value="appearance">';
	$tdataTop_Electricity_Consumption_Rooms[".chartXml"] .= '<attr value="scolor11">FF0000</attr>
			<attr value="scolor12">FF0000</attr>';
	$tdataTop_Electricity_Consumption_Rooms[".chartXml"] .= '<attr value="scolor21">008000</attr>
			<attr value="scolor22">008000</attr>';

	$tdataTop_Electricity_Consumption_Rooms[".chartXml"] .= '<attr value="head">'.xmlencode("Top Electricity Consumption Rooms").'</attr>
<attr value="foot">'.xmlencode("Legend Title").'</attr>
<attr value="y_axis_label">'.xmlencode("Count").'</attr>

<attr value="color51">49563A</attr>
<attr value="color52">49563A</attr>
<attr value="color61">49563A</attr>
<attr value="color62">49563A</attr>
<attr value="color71">C7CDC1</attr>
<attr value="color72">C7CDC1</attr>
<attr value="color81">ECF0E8</attr>
<attr value="color82">ECF0E8</attr>
<attr value="color91">68838B</attr>
<attr value="color92">68838B</attr>
<attr value="color101">48505A</attr>
<attr value="color102">48505A</attr>
<attr value="color111">45595F</attr>
<attr value="color112">45595F</attr>
<attr value="color121"></attr>
<attr value="color122"></attr>
<attr value="color131">000000</attr>
<attr value="color132">000000</attr>
<attr value="color141">000000</attr>
<attr value="color142">000000</attr>

<attr value="slegend">false</attr>
<attr value="sgrid">false</attr>
<attr value="sname">true</attr>
<attr value="sval">true</attr>
<attr value="sanim">true</attr>
<attr value="sstacked">false</attr>
<attr value="saxes">false</attr>
<attr value="slog">false</attr>
<attr value="aqua">0</attr>
<attr value="cview">0</attr>
<attr value="is3d">0</attr>
<attr value="isstacked">0</attr>
<attr value="linestyle">0</attr>
<attr value="autoupdate">0</attr>
<attr value="autoupmin">5</attr>
<attr value="cscroll">true</attr>
<attr value="maxbarscroll">10</attr>';
$tdataTop_Electricity_Consumption_Rooms[".chartXml"] .= '</attr>

<attr value="fields">';
	$tdataTop_Electricity_Consumption_Rooms[".chartXml"] .= '<attr value="0">
		<attr value="name">Room</attr>
		<attr value="label">'.xmlencode("Room").'</attr>
		<attr value="search"></attr>
	</attr>';
	$tdataTop_Electricity_Consumption_Rooms[".chartXml"] .= '<attr value="1">
		<attr value="name">Count</attr>
		<attr value="label">'.xmlencode("Count").'</attr>
		<attr value="search"></attr>
	</attr>';
	$tdataTop_Electricity_Consumption_Rooms[".chartXml"] .= '<attr value="2">
		<attr value="name">Hours</attr>
		<attr value="label">'.xmlencode("Hours").'</attr>
		<attr value="search"></attr>
	</attr>';
	$tdataTop_Electricity_Consumption_Rooms[".chartXml"] .= '<attr value="3">
		<attr value="name">Converted</attr>
		<attr value="label">'.xmlencode("Converted").'</attr>
		<attr value="search"></attr>
	</attr>';
$tdataTop_Electricity_Consumption_Rooms[".chartXml"] .= '</attr>


<attr value="settings">
<attr value="name">Top Electricity Consumption Rooms</attr>
<attr value="short_table_name">Top_Electricity_Consumption_Rooms</attr>
</attr>

</chart>';
	
$tables_data["Top Electricity Consumption Rooms"]=&$tdataTop_Electricity_Consumption_Rooms;
$field_labels["Top_Electricity_Consumption_Rooms"] = &$fieldLabelsTop_Electricity_Consumption_Rooms;
$fieldToolTips["Top Electricity Consumption Rooms"] = &$fieldToolTipsTop_Electricity_Consumption_Rooms;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Top Electricity Consumption Rooms"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["Top Electricity Consumption Rooms"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_Top_Electricity_Consumption_Rooms()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "Room,   [Count],   Hours,   Converted";
$proto0["m_strFrom"] = "FROM dbo.Motel_Electricity_Average";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "";
$proto0["m_strTail"] = "";
$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "";
$proto1["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
$proto1["m_strCase"] = "";
$proto1["m_havingmode"] = "0";
$proto1["m_inBrackets"] = "0";
$proto1["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto1);

$proto0["m_where"] = $obj;
$proto3=array();
$proto3["m_sql"] = "";
$proto3["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3["m_column"]=$obj;
$proto3["m_contained"] = array();
$proto3["m_strCase"] = "";
$proto3["m_havingmode"] = "0";
$proto3["m_inBrackets"] = "0";
$proto3["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto3);

$proto0["m_having"] = $obj;
$proto0["m_fieldlist"] = array();
						$proto5=array();
			$obj = new SQLField(array(
	"m_strName" => "Room",
	"m_strTable" => "dbo.Motel_Electricity_Average"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "Count",
	"m_strTable" => "dbo.Motel_Electricity_Average"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "Hours",
	"m_strTable" => "dbo.Motel_Electricity_Average"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "Converted",
	"m_strTable" => "dbo.Motel_Electricity_Average"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto13=array();
$proto13["m_link"] = "SQLL_MAIN";
			$proto14=array();
$proto14["m_strName"] = "dbo.Motel_Electricity_Average";
$proto14["m_columns"] = array();
$proto14["m_columns"][] = "Room";
$proto14["m_columns"][] = "Count";
$proto14["m_columns"][] = "Hours";
$proto14["m_columns"][] = "Converted";
$obj = new SQLTable($proto14);

$proto13["m_table"] = $obj;
$proto13["m_alias"] = "";
$proto15=array();
$proto15["m_sql"] = "";
$proto15["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto15["m_column"]=$obj;
$proto15["m_contained"] = array();
$proto15["m_strCase"] = "";
$proto15["m_havingmode"] = "0";
$proto15["m_inBrackets"] = "0";
$proto15["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto15);

$proto13["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto13);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_Top_Electricity_Consumption_Rooms = createSqlQuery_Top_Electricity_Consumption_Rooms();
				$tdataTop_Electricity_Consumption_Rooms[".sqlquery"] = $queryData_Top_Electricity_Consumption_Rooms;

$tableEvents["Top Electricity Consumption Rooms"] = new eventsBase;
$tdataTop_Electricity_Consumption_Rooms[".hasEvents"] = false;

$cipherer = new RunnerCipherer("Top Electricity Consumption Rooms");

?>