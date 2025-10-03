<?php
require_once(getabspath("classes/cipherer.php"));
$tdataAcumulative_Electricity_Average_Chart = array();
	$tdataAcumulative_Electricity_Average_Chart[".ShortName"] = "Acumulative_Electricity_Average_Chart";
	$tdataAcumulative_Electricity_Average_Chart[".OwnerID"] = "";
	$tdataAcumulative_Electricity_Average_Chart[".OriginalTable"] = "dbo.Motel_Electricity_Average";

//	field labels
$fieldLabelsAcumulative_Electricity_Average_Chart = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsAcumulative_Electricity_Average_Chart["English"] = array();
	$fieldToolTipsAcumulative_Electricity_Average_Chart["English"] = array();
	$fieldLabelsAcumulative_Electricity_Average_Chart["English"]["Room"] = "Room";
	$fieldToolTipsAcumulative_Electricity_Average_Chart["English"]["Room"] = "";
	$fieldLabelsAcumulative_Electricity_Average_Chart["English"]["Count"] = "Count";
	$fieldToolTipsAcumulative_Electricity_Average_Chart["English"]["Count"] = "";
	$fieldLabelsAcumulative_Electricity_Average_Chart["English"]["Hours"] = "Hours";
	$fieldToolTipsAcumulative_Electricity_Average_Chart["English"]["Hours"] = "";
	$fieldLabelsAcumulative_Electricity_Average_Chart["English"]["Converted"] = "Converted";
	$fieldToolTipsAcumulative_Electricity_Average_Chart["English"]["Converted"] = "";
	if (count($fieldToolTipsAcumulative_Electricity_Average_Chart["English"]))
		$tdataAcumulative_Electricity_Average_Chart[".isUseToolTips"] = true;
}
	
	
	$tdataAcumulative_Electricity_Average_Chart[".NCSearch"] = true;

	$tdataAcumulative_Electricity_Average_Chart[".ChartRefreshTime"] = 0;


$tdataAcumulative_Electricity_Average_Chart[".shortTableName"] = "Acumulative_Electricity_Average_Chart";
$tdataAcumulative_Electricity_Average_Chart[".nSecOptions"] = 0;
$tdataAcumulative_Electricity_Average_Chart[".recsPerRowList"] = 1;
$tdataAcumulative_Electricity_Average_Chart[".mainTableOwnerID"] = "";
$tdataAcumulative_Electricity_Average_Chart[".moveNext"] = 1;
$tdataAcumulative_Electricity_Average_Chart[".nType"] = 3;

$tdataAcumulative_Electricity_Average_Chart[".strOriginalTableName"] = "dbo.Motel_Electricity_Average";




$tdataAcumulative_Electricity_Average_Chart[".showAddInPopup"] = false;

$tdataAcumulative_Electricity_Average_Chart[".showEditInPopup"] = false;

$tdataAcumulative_Electricity_Average_Chart[".showViewInPopup"] = false;

$tdataAcumulative_Electricity_Average_Chart[".fieldsForRegister"] = array();

$tdataAcumulative_Electricity_Average_Chart[".listAjax"] = false;

	$tdataAcumulative_Electricity_Average_Chart[".audit"] = false;

	$tdataAcumulative_Electricity_Average_Chart[".locking"] = false;

$tdataAcumulative_Electricity_Average_Chart[".listIcons"] = true;




$tdataAcumulative_Electricity_Average_Chart[".showSimpleSearchOptions"] = false;

$tdataAcumulative_Electricity_Average_Chart[".showSearchPanel"] = true;

if (isMobile())
	$tdataAcumulative_Electricity_Average_Chart[".isUseAjaxSuggest"] = false;
else 
	$tdataAcumulative_Electricity_Average_Chart[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdataAcumulative_Electricity_Average_Chart[".addPageEvents"] = false;

// use datepicker for search panel
$tdataAcumulative_Electricity_Average_Chart[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataAcumulative_Electricity_Average_Chart[".isUseTimeForSearch"] = false;




$tdataAcumulative_Electricity_Average_Chart[".allSearchFields"] = array();


$tdataAcumulative_Electricity_Average_Chart[".googleLikeFields"][] = "Room";
$tdataAcumulative_Electricity_Average_Chart[".googleLikeFields"][] = "Count";
$tdataAcumulative_Electricity_Average_Chart[".googleLikeFields"][] = "Hours";
$tdataAcumulative_Electricity_Average_Chart[".googleLikeFields"][] = "Converted";



$tdataAcumulative_Electricity_Average_Chart[".isTableType"] = "chart";

	



// Access doesn't support subqueries from the same table as main



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataAcumulative_Electricity_Average_Chart[".strOrderBy"] = $tstrOrderBy;

$tdataAcumulative_Electricity_Average_Chart[".orderindexes"] = array();

$tdataAcumulative_Electricity_Average_Chart[".sqlHead"] = "SELECT Room,  [Count],  Hours,  Converted";
$tdataAcumulative_Electricity_Average_Chart[".sqlFrom"] = "FROM dbo.Motel_Electricity_Average";
$tdataAcumulative_Electricity_Average_Chart[".sqlWhereExpr"] = "";
$tdataAcumulative_Electricity_Average_Chart[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataAcumulative_Electricity_Average_Chart[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataAcumulative_Electricity_Average_Chart[".arrGroupsPerPage"] = $arrGPP;

$tableKeysAcumulative_Electricity_Average_Chart = array();
$tdataAcumulative_Electricity_Average_Chart[".Keys"] = $tableKeysAcumulative_Electricity_Average_Chart;

$tdataAcumulative_Electricity_Average_Chart[".listFields"] = array();
$tdataAcumulative_Electricity_Average_Chart[".listFields"][] = "Room";
$tdataAcumulative_Electricity_Average_Chart[".listFields"][] = "Count";
$tdataAcumulative_Electricity_Average_Chart[".listFields"][] = "Hours";
$tdataAcumulative_Electricity_Average_Chart[".listFields"][] = "Converted";

$tdataAcumulative_Electricity_Average_Chart[".viewFields"] = array();
$tdataAcumulative_Electricity_Average_Chart[".viewFields"][] = "Room";
$tdataAcumulative_Electricity_Average_Chart[".viewFields"][] = "Count";
$tdataAcumulative_Electricity_Average_Chart[".viewFields"][] = "Hours";
$tdataAcumulative_Electricity_Average_Chart[".viewFields"][] = "Converted";

$tdataAcumulative_Electricity_Average_Chart[".addFields"] = array();
$tdataAcumulative_Electricity_Average_Chart[".addFields"][] = "Room";
$tdataAcumulative_Electricity_Average_Chart[".addFields"][] = "Count";
$tdataAcumulative_Electricity_Average_Chart[".addFields"][] = "Hours";
$tdataAcumulative_Electricity_Average_Chart[".addFields"][] = "Converted";

$tdataAcumulative_Electricity_Average_Chart[".inlineAddFields"] = array();
$tdataAcumulative_Electricity_Average_Chart[".inlineAddFields"][] = "Room";
$tdataAcumulative_Electricity_Average_Chart[".inlineAddFields"][] = "Count";
$tdataAcumulative_Electricity_Average_Chart[".inlineAddFields"][] = "Hours";
$tdataAcumulative_Electricity_Average_Chart[".inlineAddFields"][] = "Converted";

$tdataAcumulative_Electricity_Average_Chart[".editFields"] = array();
$tdataAcumulative_Electricity_Average_Chart[".editFields"][] = "Room";
$tdataAcumulative_Electricity_Average_Chart[".editFields"][] = "Count";
$tdataAcumulative_Electricity_Average_Chart[".editFields"][] = "Hours";
$tdataAcumulative_Electricity_Average_Chart[".editFields"][] = "Converted";

$tdataAcumulative_Electricity_Average_Chart[".inlineEditFields"] = array();
$tdataAcumulative_Electricity_Average_Chart[".inlineEditFields"][] = "Room";
$tdataAcumulative_Electricity_Average_Chart[".inlineEditFields"][] = "Count";
$tdataAcumulative_Electricity_Average_Chart[".inlineEditFields"][] = "Hours";
$tdataAcumulative_Electricity_Average_Chart[".inlineEditFields"][] = "Converted";

$tdataAcumulative_Electricity_Average_Chart[".exportFields"] = array();
$tdataAcumulative_Electricity_Average_Chart[".exportFields"][] = "Room";
$tdataAcumulative_Electricity_Average_Chart[".exportFields"][] = "Count";
$tdataAcumulative_Electricity_Average_Chart[".exportFields"][] = "Hours";
$tdataAcumulative_Electricity_Average_Chart[".exportFields"][] = "Converted";

$tdataAcumulative_Electricity_Average_Chart[".printFields"] = array();
$tdataAcumulative_Electricity_Average_Chart[".printFields"][] = "Room";
$tdataAcumulative_Electricity_Average_Chart[".printFields"][] = "Count";
$tdataAcumulative_Electricity_Average_Chart[".printFields"][] = "Hours";
$tdataAcumulative_Electricity_Average_Chart[".printFields"][] = "Converted";

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
	
		
		
	$tdataAcumulative_Electricity_Average_Chart["Room"] = $fdata;
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
	
		
		
	$tdataAcumulative_Electricity_Average_Chart["Count"] = $fdata;
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
	
		
		
	$tdataAcumulative_Electricity_Average_Chart["Hours"] = $fdata;
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
	
		
		
	$tdataAcumulative_Electricity_Average_Chart["Converted"] = $fdata;

	$tdataAcumulative_Electricity_Average_Chart[".chartXml"] = '<chart>
		<attr value="tables">
			<attr value="0">Acumulative Electricity Average Chart</attr>
		</attr>
		<attr value="chart_type">
			<attr value="type">2d_column</attr>
		</attr>
		
		<attr value="parameters">';
	$tdataAcumulative_Electricity_Average_Chart[".chartXml"] .= '<attr value="0">
			<attr value="name">Count</attr>
			<attr value="currencyFormat">0</attr>
			<attr value="decimalFormat">0</attr>
			<attr value="customFormat">0</attr>
			<attr value="customFormatStr"></attr>';
	$tdataAcumulative_Electricity_Average_Chart[".chartXml"] .= '</attr>';
	$tdataAcumulative_Electricity_Average_Chart[".chartXml"] .= '<attr value="1">
			<attr value="name">Hours</attr>
			<attr value="currencyFormat">0</attr>
			<attr value="decimalFormat">0</attr>
			<attr value="customFormat">0</attr>
			<attr value="customFormatStr"></attr>';
	$tdataAcumulative_Electricity_Average_Chart[".chartXml"] .= '</attr>';
	$tdataAcumulative_Electricity_Average_Chart[".chartXml"] .= '<attr value="2">
			<attr value="name">Converted</attr>
			<attr value="currencyFormat">0</attr>
			<attr value="decimalFormat">0</attr>
			<attr value="customFormat">0</attr>
			<attr value="customFormatStr"></attr>';
	$tdataAcumulative_Electricity_Average_Chart[".chartXml"] .= '</attr>';
	$tdataAcumulative_Electricity_Average_Chart[".chartXml"] .= '<attr value="3">
		<attr value="name">Room</attr>
	</attr>';
	$tdataAcumulative_Electricity_Average_Chart[".chartXml"] .= '</attr>
			<attr value="appearance">';
	$tdataAcumulative_Electricity_Average_Chart[".chartXml"] .= '<attr value="scolor11">FF0000</attr>
			<attr value="scolor12">FF0000</attr>';
	$tdataAcumulative_Electricity_Average_Chart[".chartXml"] .= '<attr value="scolor21">008000</attr>
			<attr value="scolor22">008000</attr>';
	$tdataAcumulative_Electricity_Average_Chart[".chartXml"] .= '<attr value="scolor31">0000FF</attr>
			<attr value="scolor32">0000FF</attr>';

	$tdataAcumulative_Electricity_Average_Chart[".chartXml"] .= '<attr value="head">'.xmlencode("Acumulative Electricity Average Chart").'</attr>
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

<attr value="slegend">true</attr>
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
<attr value="isstacked">1</attr>
<attr value="linestyle">0</attr>
<attr value="autoupdate">0</attr>
<attr value="autoupmin">5</attr>
<attr value="cscroll">true</attr>
<attr value="maxbarscroll">10</attr>';
$tdataAcumulative_Electricity_Average_Chart[".chartXml"] .= '</attr>

<attr value="fields">';
	$tdataAcumulative_Electricity_Average_Chart[".chartXml"] .= '<attr value="0">
		<attr value="name">Room</attr>
		<attr value="label">'.xmlencode("Room").'</attr>
		<attr value="search"></attr>
	</attr>';
	$tdataAcumulative_Electricity_Average_Chart[".chartXml"] .= '<attr value="1">
		<attr value="name">Count</attr>
		<attr value="label">'.xmlencode("Count").'</attr>
		<attr value="search"></attr>
	</attr>';
	$tdataAcumulative_Electricity_Average_Chart[".chartXml"] .= '<attr value="2">
		<attr value="name">Hours</attr>
		<attr value="label">'.xmlencode("Hours").'</attr>
		<attr value="search"></attr>
	</attr>';
	$tdataAcumulative_Electricity_Average_Chart[".chartXml"] .= '<attr value="3">
		<attr value="name">Converted</attr>
		<attr value="label">'.xmlencode("Converted").'</attr>
		<attr value="search"></attr>
	</attr>';
$tdataAcumulative_Electricity_Average_Chart[".chartXml"] .= '</attr>


<attr value="settings">
<attr value="name">Acumulative Electricity Average Chart</attr>
<attr value="short_table_name">Acumulative_Electricity_Average_Chart</attr>
</attr>

</chart>';
	
$tables_data["Acumulative Electricity Average Chart"]=&$tdataAcumulative_Electricity_Average_Chart;
$field_labels["Acumulative_Electricity_Average_Chart"] = &$fieldLabelsAcumulative_Electricity_Average_Chart;
$fieldToolTips["Acumulative Electricity Average Chart"] = &$fieldToolTipsAcumulative_Electricity_Average_Chart;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Acumulative Electricity Average Chart"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["Acumulative Electricity Average Chart"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_Acumulative_Electricity_Average_Chart()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "Room,  [Count],  Hours,  Converted";
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
$queryData_Acumulative_Electricity_Average_Chart = createSqlQuery_Acumulative_Electricity_Average_Chart();
				$tdataAcumulative_Electricity_Average_Chart[".sqlquery"] = $queryData_Acumulative_Electricity_Average_Chart;
	
if(isset($tdataAcumulative_Electricity_Average_Chart["field2"])){
	$tdataAcumulative_Electricity_Average_Chart["field2"]["LookupTable"] = "carscars_view";
	$tdataAcumulative_Electricity_Average_Chart["field2"]["LookupOrderBy"] = "name";
	$tdataAcumulative_Electricity_Average_Chart["field2"]["LookupType"] = 4;
	$tdataAcumulative_Electricity_Average_Chart["field2"]["LinkField"] = "email";
	$tdataAcumulative_Electricity_Average_Chart["field2"]["DisplayField"] = "name";
	$tdataAcumulative_Electricity_Average_Chart[".hasCustomViewField"] = true;
}

$tableEvents["Acumulative Electricity Average Chart"] = new eventsBase;
$tdataAcumulative_Electricity_Average_Chart[".hasEvents"] = false;

$cipherer = new RunnerCipherer("Acumulative Electricity Average Chart");

?>