<?php
require_once(getabspath("classes/cipherer.php"));
$tdataTop_10_Rooms_Chart = array();
	$tdataTop_10_Rooms_Chart[".ShortName"] = "Top_10_Rooms_Chart";
	$tdataTop_10_Rooms_Chart[".OwnerID"] = "";
	$tdataTop_10_Rooms_Chart[".OriginalTable"] = "dbo.Motel_Top_Rooms";

//	field labels
$fieldLabelsTop_10_Rooms_Chart = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsTop_10_Rooms_Chart["English"] = array();
	$fieldToolTipsTop_10_Rooms_Chart["English"] = array();
	$fieldLabelsTop_10_Rooms_Chart["English"]["Room"] = "Room";
	$fieldToolTipsTop_10_Rooms_Chart["English"]["Room"] = "";
	$fieldLabelsTop_10_Rooms_Chart["English"]["Counter"] = "Counter";
	$fieldToolTipsTop_10_Rooms_Chart["English"]["Counter"] = "";
	$fieldLabelsTop_10_Rooms_Chart["English"]["Sum"] = "Sum";
	$fieldToolTipsTop_10_Rooms_Chart["English"]["Sum"] = "";
	$fieldLabelsTop_10_Rooms_Chart["English"]["Max"] = "Max";
	$fieldToolTipsTop_10_Rooms_Chart["English"]["Max"] = "";
	if (count($fieldToolTipsTop_10_Rooms_Chart["English"]))
		$tdataTop_10_Rooms_Chart[".isUseToolTips"] = true;
}
	
	
	$tdataTop_10_Rooms_Chart[".NCSearch"] = true;

	$tdataTop_10_Rooms_Chart[".ChartRefreshTime"] = 0;


$tdataTop_10_Rooms_Chart[".shortTableName"] = "Top_10_Rooms_Chart";
$tdataTop_10_Rooms_Chart[".nSecOptions"] = 0;
$tdataTop_10_Rooms_Chart[".recsPerRowList"] = 1;
$tdataTop_10_Rooms_Chart[".mainTableOwnerID"] = "";
$tdataTop_10_Rooms_Chart[".moveNext"] = 1;
$tdataTop_10_Rooms_Chart[".nType"] = 3;

$tdataTop_10_Rooms_Chart[".strOriginalTableName"] = "dbo.Motel_Top_Rooms";




$tdataTop_10_Rooms_Chart[".showAddInPopup"] = false;

$tdataTop_10_Rooms_Chart[".showEditInPopup"] = false;

$tdataTop_10_Rooms_Chart[".showViewInPopup"] = false;

$tdataTop_10_Rooms_Chart[".fieldsForRegister"] = array();

$tdataTop_10_Rooms_Chart[".listAjax"] = false;

	$tdataTop_10_Rooms_Chart[".audit"] = false;

	$tdataTop_10_Rooms_Chart[".locking"] = false;

$tdataTop_10_Rooms_Chart[".listIcons"] = true;




$tdataTop_10_Rooms_Chart[".showSimpleSearchOptions"] = false;

$tdataTop_10_Rooms_Chart[".showSearchPanel"] = true;

if (isMobile())
	$tdataTop_10_Rooms_Chart[".isUseAjaxSuggest"] = false;
else 
	$tdataTop_10_Rooms_Chart[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdataTop_10_Rooms_Chart[".addPageEvents"] = false;

// use timepicker for search panel
$tdataTop_10_Rooms_Chart[".isUseTimeForSearch"] = false;




$tdataTop_10_Rooms_Chart[".allSearchFields"] = array();


$tdataTop_10_Rooms_Chart[".googleLikeFields"][] = "Room";
$tdataTop_10_Rooms_Chart[".googleLikeFields"][] = "Counter";
$tdataTop_10_Rooms_Chart[".googleLikeFields"][] = "Sum";
$tdataTop_10_Rooms_Chart[".googleLikeFields"][] = "Max";



$tdataTop_10_Rooms_Chart[".isTableType"] = "chart";

	



// Access doesn't support subqueries from the same table as main



$tstrOrderBy = "ORDER BY [Sum] DESC";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataTop_10_Rooms_Chart[".strOrderBy"] = $tstrOrderBy;

$tdataTop_10_Rooms_Chart[".orderindexes"] = array();

$tdataTop_10_Rooms_Chart[".sqlHead"] = "SELECT Room,  Counter,  [Sum],  [Max]";
$tdataTop_10_Rooms_Chart[".sqlFrom"] = "FROM dbo.Motel_Top_Rooms";
$tdataTop_10_Rooms_Chart[".sqlWhereExpr"] = "";
$tdataTop_10_Rooms_Chart[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataTop_10_Rooms_Chart[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataTop_10_Rooms_Chart[".arrGroupsPerPage"] = $arrGPP;

$tableKeysTop_10_Rooms_Chart = array();
$tdataTop_10_Rooms_Chart[".Keys"] = $tableKeysTop_10_Rooms_Chart;

$tdataTop_10_Rooms_Chart[".listFields"] = array();
$tdataTop_10_Rooms_Chart[".listFields"][] = "Room";
$tdataTop_10_Rooms_Chart[".listFields"][] = "Counter";
$tdataTop_10_Rooms_Chart[".listFields"][] = "Sum";
$tdataTop_10_Rooms_Chart[".listFields"][] = "Max";

$tdataTop_10_Rooms_Chart[".viewFields"] = array();
$tdataTop_10_Rooms_Chart[".viewFields"][] = "Room";
$tdataTop_10_Rooms_Chart[".viewFields"][] = "Counter";
$tdataTop_10_Rooms_Chart[".viewFields"][] = "Sum";
$tdataTop_10_Rooms_Chart[".viewFields"][] = "Max";

$tdataTop_10_Rooms_Chart[".addFields"] = array();
$tdataTop_10_Rooms_Chart[".addFields"][] = "Room";
$tdataTop_10_Rooms_Chart[".addFields"][] = "Counter";
$tdataTop_10_Rooms_Chart[".addFields"][] = "Sum";
$tdataTop_10_Rooms_Chart[".addFields"][] = "Max";

$tdataTop_10_Rooms_Chart[".inlineAddFields"] = array();
$tdataTop_10_Rooms_Chart[".inlineAddFields"][] = "Room";
$tdataTop_10_Rooms_Chart[".inlineAddFields"][] = "Counter";
$tdataTop_10_Rooms_Chart[".inlineAddFields"][] = "Sum";
$tdataTop_10_Rooms_Chart[".inlineAddFields"][] = "Max";

$tdataTop_10_Rooms_Chart[".editFields"] = array();
$tdataTop_10_Rooms_Chart[".editFields"][] = "Room";
$tdataTop_10_Rooms_Chart[".editFields"][] = "Counter";
$tdataTop_10_Rooms_Chart[".editFields"][] = "Sum";
$tdataTop_10_Rooms_Chart[".editFields"][] = "Max";

$tdataTop_10_Rooms_Chart[".inlineEditFields"] = array();
$tdataTop_10_Rooms_Chart[".inlineEditFields"][] = "Room";
$tdataTop_10_Rooms_Chart[".inlineEditFields"][] = "Counter";
$tdataTop_10_Rooms_Chart[".inlineEditFields"][] = "Sum";
$tdataTop_10_Rooms_Chart[".inlineEditFields"][] = "Max";

$tdataTop_10_Rooms_Chart[".exportFields"] = array();
$tdataTop_10_Rooms_Chart[".exportFields"][] = "Room";
$tdataTop_10_Rooms_Chart[".exportFields"][] = "Counter";
$tdataTop_10_Rooms_Chart[".exportFields"][] = "Sum";
$tdataTop_10_Rooms_Chart[".exportFields"][] = "Max";

$tdataTop_10_Rooms_Chart[".printFields"] = array();
$tdataTop_10_Rooms_Chart[".printFields"][] = "Room";
$tdataTop_10_Rooms_Chart[".printFields"][] = "Counter";
$tdataTop_10_Rooms_Chart[".printFields"][] = "Sum";
$tdataTop_10_Rooms_Chart[".printFields"][] = "Max";

//	Room
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "Room";
	$fdata["GoodName"] = "Room";
	$fdata["ownerTable"] = "dbo.Motel_Top_Rooms";
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
	
		
		
	$tdataTop_10_Rooms_Chart["Room"] = $fdata;
//	Counter
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "Counter";
	$fdata["GoodName"] = "Counter";
	$fdata["ownerTable"] = "dbo.Motel_Top_Rooms";
	$fdata["Label"] = "Counter"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Counter"; 
		$fdata["FullName"] = "Counter";
	
		
		
				
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
	
		
		
	$tdataTop_10_Rooms_Chart["Counter"] = $fdata;
//	Sum
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "Sum";
	$fdata["GoodName"] = "Sum";
	$fdata["ownerTable"] = "dbo.Motel_Top_Rooms";
	$fdata["Label"] = "Sum"; 
	$fdata["FieldType"] = 131;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Sum"; 
		$fdata["FullName"] = "[Sum]";
	
		
		
				
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
	
		
		
	$tdataTop_10_Rooms_Chart["Sum"] = $fdata;
//	Max
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "Max";
	$fdata["GoodName"] = "Max";
	$fdata["ownerTable"] = "dbo.Motel_Top_Rooms";
	$fdata["Label"] = "Max"; 
	$fdata["FieldType"] = 131;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Max"; 
		$fdata["FullName"] = "[Max]";
	
		
		
				
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
	
		
		
	$tdataTop_10_Rooms_Chart["Max"] = $fdata;

	$tdataTop_10_Rooms_Chart[".chartXml"] = '<chart>
		<attr value="tables">
			<attr value="0">Top 10 Rooms Chart</attr>
		</attr>
		<attr value="chart_type">
			<attr value="type">2d_column</attr>
		</attr>
		
		<attr value="parameters">';
	$tdataTop_10_Rooms_Chart[".chartXml"] .= '<attr value="0">
			<attr value="name">Sum</attr>
			<attr value="currencyFormat">0</attr>
			<attr value="decimalFormat">0</attr>
			<attr value="customFormat">0</attr>
			<attr value="customFormatStr"></attr>';
	$tdataTop_10_Rooms_Chart[".chartXml"] .= '</attr>';
	$tdataTop_10_Rooms_Chart[".chartXml"] .= '<attr value="1">
			<attr value="name">Counter</attr>
			<attr value="currencyFormat">0</attr>
			<attr value="decimalFormat">0</attr>
			<attr value="customFormat">0</attr>
			<attr value="customFormatStr"></attr>';
	$tdataTop_10_Rooms_Chart[".chartXml"] .= '</attr>';
	$tdataTop_10_Rooms_Chart[".chartXml"] .= '<attr value="2">
		<attr value="name">Room</attr>
	</attr>';
	$tdataTop_10_Rooms_Chart[".chartXml"] .= '</attr>
			<attr value="appearance">';
	$tdataTop_10_Rooms_Chart[".chartXml"] .= '<attr value="scolor11">40E0D0</attr>
			<attr value="scolor12">40E0D0</attr>';
	$tdataTop_10_Rooms_Chart[".chartXml"] .= '<attr value="scolor21">FF0000</attr>
			<attr value="scolor22">FF0000</attr>';

	$tdataTop_10_Rooms_Chart[".chartXml"] .= '<attr value="head">'.xmlencode("Acumulative Top 10  Room Sales").'</attr>
<attr value="foot">'.xmlencode("Legend Title").'</attr>
<attr value="y_axis_label">'.xmlencode("").'</attr>

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
<attr value="sgrid">true</attr>
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
<attr value="maxbarscroll">12</attr>';
$tdataTop_10_Rooms_Chart[".chartXml"] .= '</attr>

<attr value="fields">';
	$tdataTop_10_Rooms_Chart[".chartXml"] .= '<attr value="0">
		<attr value="name">Room</attr>
		<attr value="label">'.xmlencode("Room").'</attr>
		<attr value="search"></attr>
	</attr>';
	$tdataTop_10_Rooms_Chart[".chartXml"] .= '<attr value="1">
		<attr value="name">Counter</attr>
		<attr value="label">'.xmlencode("Counter").'</attr>
		<attr value="search"></attr>
	</attr>';
	$tdataTop_10_Rooms_Chart[".chartXml"] .= '<attr value="2">
		<attr value="name">Sum</attr>
		<attr value="label">'.xmlencode("Sum").'</attr>
		<attr value="search"></attr>
	</attr>';
	$tdataTop_10_Rooms_Chart[".chartXml"] .= '<attr value="3">
		<attr value="name">Max</attr>
		<attr value="label">'.xmlencode("Max").'</attr>
		<attr value="search"></attr>
	</attr>';
$tdataTop_10_Rooms_Chart[".chartXml"] .= '</attr>


<attr value="settings">
<attr value="name">Top 10 Rooms Chart</attr>
<attr value="short_table_name">Top_10_Rooms_Chart</attr>
</attr>

</chart>';
	
$tables_data["Top 10 Rooms Chart"]=&$tdataTop_10_Rooms_Chart;
$field_labels["Top_10_Rooms_Chart"] = &$fieldLabelsTop_10_Rooms_Chart;
$fieldToolTips["Top 10 Rooms Chart"] = &$fieldToolTipsTop_10_Rooms_Chart;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Top 10 Rooms Chart"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["Top 10 Rooms Chart"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_Top_10_Rooms_Chart()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "Room,  Counter,  [Sum],  [Max]";
$proto0["m_strFrom"] = "FROM dbo.Motel_Top_Rooms";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "ORDER BY [Sum] DESC";
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
	"m_strTable" => "dbo.Motel_Top_Rooms"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "Counter",
	"m_strTable" => "dbo.Motel_Top_Rooms"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "Sum",
	"m_strTable" => "dbo.Motel_Top_Rooms"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "Max",
	"m_strTable" => "dbo.Motel_Top_Rooms"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto13=array();
$proto13["m_link"] = "SQLL_MAIN";
			$proto14=array();
$proto14["m_strName"] = "dbo.Motel_Top_Rooms";
$proto14["m_columns"] = array();
$proto14["m_columns"][] = "Room";
$proto14["m_columns"][] = "Counter";
$proto14["m_columns"][] = "Sum";
$proto14["m_columns"][] = "Max";
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
												$proto17=array();
						$obj = new SQLField(array(
	"m_strName" => "Sum",
	"m_strTable" => "dbo.Motel_Top_Rooms"
));

$proto17["m_column"]=$obj;
$proto17["m_bAsc"] = 0;
$proto17["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto17);

$proto0["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_Top_10_Rooms_Chart = createSqlQuery_Top_10_Rooms_Chart();
				$tdataTop_10_Rooms_Chart[".sqlquery"] = $queryData_Top_10_Rooms_Chart;

$tableEvents["Top 10 Rooms Chart"] = new eventsBase;
$tdataTop_10_Rooms_Chart[".hasEvents"] = false;

$cipherer = new RunnerCipherer("Top 10 Rooms Chart");

?>