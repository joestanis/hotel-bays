<?php
require_once(getabspath("classes/cipherer.php"));
$tdataElectricity_Chart_by_Rent_Chart = array();
	$tdataElectricity_Chart_by_Rent_Chart[".ShortName"] = "Electricity_Chart_by_Rent_Chart";
	$tdataElectricity_Chart_by_Rent_Chart[".OwnerID"] = "";
	$tdataElectricity_Chart_by_Rent_Chart[".OriginalTable"] = "dbo.Electricity_Chart_by_Rent";

//	field labels
$fieldLabelsElectricity_Chart_by_Rent_Chart = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsElectricity_Chart_by_Rent_Chart["English"] = array();
	$fieldToolTipsElectricity_Chart_by_Rent_Chart["English"] = array();
	$fieldLabelsElectricity_Chart_by_Rent_Chart["English"]["Room"] = "Room";
	$fieldToolTipsElectricity_Chart_by_Rent_Chart["English"]["Room"] = "";
	$fieldLabelsElectricity_Chart_by_Rent_Chart["English"]["Count"] = "Count";
	$fieldToolTipsElectricity_Chart_by_Rent_Chart["English"]["Count"] = "";
	$fieldLabelsElectricity_Chart_by_Rent_Chart["English"]["Hours"] = "Hours";
	$fieldToolTipsElectricity_Chart_by_Rent_Chart["English"]["Hours"] = "";
	$fieldLabelsElectricity_Chart_by_Rent_Chart["English"]["Average"] = "Average";
	$fieldToolTipsElectricity_Chart_by_Rent_Chart["English"]["Average"] = "";
	$fieldLabelsElectricity_Chart_by_Rent_Chart["English"]["Time_In1"] = "Time In ";
	$fieldToolTipsElectricity_Chart_by_Rent_Chart["English"]["Time_In1"] = "";
	$fieldLabelsElectricity_Chart_by_Rent_Chart["English"][""] = "";
	$fieldToolTipsElectricity_Chart_by_Rent_Chart["English"][""] = "";
	$fieldLabelsElectricity_Chart_by_Rent_Chart["English"][""] = "Electricity Chart by Rent Chart";
	$fieldToolTipsElectricity_Chart_by_Rent_Chart["English"][""] = "";
	if (count($fieldToolTipsElectricity_Chart_by_Rent_Chart["English"]))
		$tdataElectricity_Chart_by_Rent_Chart[".isUseToolTips"] = true;
}
	
	
	$tdataElectricity_Chart_by_Rent_Chart[".NCSearch"] = true;

	$tdataElectricity_Chart_by_Rent_Chart[".ChartRefreshTime"] = 0;


$tdataElectricity_Chart_by_Rent_Chart[".shortTableName"] = "Electricity_Chart_by_Rent_Chart";
$tdataElectricity_Chart_by_Rent_Chart[".nSecOptions"] = 0;
$tdataElectricity_Chart_by_Rent_Chart[".recsPerRowList"] = 1;
$tdataElectricity_Chart_by_Rent_Chart[".mainTableOwnerID"] = "";
$tdataElectricity_Chart_by_Rent_Chart[".moveNext"] = 1;
$tdataElectricity_Chart_by_Rent_Chart[".nType"] = 3;

$tdataElectricity_Chart_by_Rent_Chart[".strOriginalTableName"] = "dbo.Electricity_Chart_by_Rent";




$tdataElectricity_Chart_by_Rent_Chart[".showAddInPopup"] = false;

$tdataElectricity_Chart_by_Rent_Chart[".showEditInPopup"] = false;

$tdataElectricity_Chart_by_Rent_Chart[".showViewInPopup"] = false;

$tdataElectricity_Chart_by_Rent_Chart[".fieldsForRegister"] = array();

$tdataElectricity_Chart_by_Rent_Chart[".listAjax"] = false;

	$tdataElectricity_Chart_by_Rent_Chart[".audit"] = false;

	$tdataElectricity_Chart_by_Rent_Chart[".locking"] = false;

$tdataElectricity_Chart_by_Rent_Chart[".listIcons"] = true;




$tdataElectricity_Chart_by_Rent_Chart[".showSimpleSearchOptions"] = false;

$tdataElectricity_Chart_by_Rent_Chart[".showSearchPanel"] = true;

if (isMobile())
	$tdataElectricity_Chart_by_Rent_Chart[".isUseAjaxSuggest"] = false;
else 
	$tdataElectricity_Chart_by_Rent_Chart[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdataElectricity_Chart_by_Rent_Chart[".addPageEvents"] = false;

// use datepicker for search panel
$tdataElectricity_Chart_by_Rent_Chart[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdataElectricity_Chart_by_Rent_Chart[".isUseTimeForSearch"] = false;




$tdataElectricity_Chart_by_Rent_Chart[".allSearchFields"] = array();

$tdataElectricity_Chart_by_Rent_Chart[".allSearchFields"][] = "Average";
$tdataElectricity_Chart_by_Rent_Chart[".allSearchFields"][] = "Time_In1";

$tdataElectricity_Chart_by_Rent_Chart[".googleLikeFields"][] = "Time_In1";

$tdataElectricity_Chart_by_Rent_Chart[".panelSearchFields"][] = "Time_In1";

$tdataElectricity_Chart_by_Rent_Chart[".advSearchFields"][] = "Average";
$tdataElectricity_Chart_by_Rent_Chart[".advSearchFields"][] = "Time_In1";

$tdataElectricity_Chart_by_Rent_Chart[".isTableType"] = "chart";

	



// Access doesn't support subqueries from the same table as main



$tstrOrderBy = "ORDER BY Average DESC";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataElectricity_Chart_by_Rent_Chart[".strOrderBy"] = $tstrOrderBy;

$tdataElectricity_Chart_by_Rent_Chart[".orderindexes"] = array();

$tdataElectricity_Chart_by_Rent_Chart[".sqlHead"] = "SELECT Room,  [Count],  Hours,  Average,  Time_In1";
$tdataElectricity_Chart_by_Rent_Chart[".sqlFrom"] = "FROM dbo.Electricity_Chart_by_Rent";
$tdataElectricity_Chart_by_Rent_Chart[".sqlWhereExpr"] = "";
$tdataElectricity_Chart_by_Rent_Chart[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataElectricity_Chart_by_Rent_Chart[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataElectricity_Chart_by_Rent_Chart[".arrGroupsPerPage"] = $arrGPP;

$tableKeysElectricity_Chart_by_Rent_Chart = array();
$tdataElectricity_Chart_by_Rent_Chart[".Keys"] = $tableKeysElectricity_Chart_by_Rent_Chart;

$tdataElectricity_Chart_by_Rent_Chart[".listFields"] = array();
$tdataElectricity_Chart_by_Rent_Chart[".listFields"][] = "Room";
$tdataElectricity_Chart_by_Rent_Chart[".listFields"][] = "Count";
$tdataElectricity_Chart_by_Rent_Chart[".listFields"][] = "Hours";
$tdataElectricity_Chart_by_Rent_Chart[".listFields"][] = "Average";
$tdataElectricity_Chart_by_Rent_Chart[".listFields"][] = "Time_In1";

$tdataElectricity_Chart_by_Rent_Chart[".viewFields"] = array();
$tdataElectricity_Chart_by_Rent_Chart[".viewFields"][] = "Room";
$tdataElectricity_Chart_by_Rent_Chart[".viewFields"][] = "Count";
$tdataElectricity_Chart_by_Rent_Chart[".viewFields"][] = "Hours";
$tdataElectricity_Chart_by_Rent_Chart[".viewFields"][] = "Average";
$tdataElectricity_Chart_by_Rent_Chart[".viewFields"][] = "Time_In1";

$tdataElectricity_Chart_by_Rent_Chart[".addFields"] = array();
$tdataElectricity_Chart_by_Rent_Chart[".addFields"][] = "Room";
$tdataElectricity_Chart_by_Rent_Chart[".addFields"][] = "Count";
$tdataElectricity_Chart_by_Rent_Chart[".addFields"][] = "Hours";
$tdataElectricity_Chart_by_Rent_Chart[".addFields"][] = "Average";
$tdataElectricity_Chart_by_Rent_Chart[".addFields"][] = "Time_In1";

$tdataElectricity_Chart_by_Rent_Chart[".inlineAddFields"] = array();
$tdataElectricity_Chart_by_Rent_Chart[".inlineAddFields"][] = "Room";
$tdataElectricity_Chart_by_Rent_Chart[".inlineAddFields"][] = "Count";
$tdataElectricity_Chart_by_Rent_Chart[".inlineAddFields"][] = "Hours";
$tdataElectricity_Chart_by_Rent_Chart[".inlineAddFields"][] = "Average";
$tdataElectricity_Chart_by_Rent_Chart[".inlineAddFields"][] = "Time_In1";

$tdataElectricity_Chart_by_Rent_Chart[".editFields"] = array();
$tdataElectricity_Chart_by_Rent_Chart[".editFields"][] = "Room";
$tdataElectricity_Chart_by_Rent_Chart[".editFields"][] = "Count";
$tdataElectricity_Chart_by_Rent_Chart[".editFields"][] = "Hours";
$tdataElectricity_Chart_by_Rent_Chart[".editFields"][] = "Average";
$tdataElectricity_Chart_by_Rent_Chart[".editFields"][] = "Time_In1";

$tdataElectricity_Chart_by_Rent_Chart[".inlineEditFields"] = array();
$tdataElectricity_Chart_by_Rent_Chart[".inlineEditFields"][] = "Room";
$tdataElectricity_Chart_by_Rent_Chart[".inlineEditFields"][] = "Count";
$tdataElectricity_Chart_by_Rent_Chart[".inlineEditFields"][] = "Hours";
$tdataElectricity_Chart_by_Rent_Chart[".inlineEditFields"][] = "Average";
$tdataElectricity_Chart_by_Rent_Chart[".inlineEditFields"][] = "Time_In1";

$tdataElectricity_Chart_by_Rent_Chart[".exportFields"] = array();
$tdataElectricity_Chart_by_Rent_Chart[".exportFields"][] = "Room";
$tdataElectricity_Chart_by_Rent_Chart[".exportFields"][] = "Count";
$tdataElectricity_Chart_by_Rent_Chart[".exportFields"][] = "Hours";
$tdataElectricity_Chart_by_Rent_Chart[".exportFields"][] = "Average";
$tdataElectricity_Chart_by_Rent_Chart[".exportFields"][] = "Time_In1";

$tdataElectricity_Chart_by_Rent_Chart[".printFields"] = array();
$tdataElectricity_Chart_by_Rent_Chart[".printFields"][] = "Room";
$tdataElectricity_Chart_by_Rent_Chart[".printFields"][] = "Count";
$tdataElectricity_Chart_by_Rent_Chart[".printFields"][] = "Hours";
$tdataElectricity_Chart_by_Rent_Chart[".printFields"][] = "Average";
$tdataElectricity_Chart_by_Rent_Chart[".printFields"][] = "Time_In1";

//	Room
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "Room";
	$fdata["GoodName"] = "Room";
	$fdata["ownerTable"] = "dbo.Electricity_Chart_by_Rent";
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
	
		
		
	$tdataElectricity_Chart_by_Rent_Chart["Room"] = $fdata;
//	Count
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "Count";
	$fdata["GoodName"] = "Count";
	$fdata["ownerTable"] = "dbo.Electricity_Chart_by_Rent";
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
	
		
		
	$tdataElectricity_Chart_by_Rent_Chart["Count"] = $fdata;
//	Hours
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "Hours";
	$fdata["GoodName"] = "Hours";
	$fdata["ownerTable"] = "dbo.Electricity_Chart_by_Rent";
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
	
		
		
	$tdataElectricity_Chart_by_Rent_Chart["Hours"] = $fdata;
//	Average
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "Average";
	$fdata["GoodName"] = "Average";
	$fdata["ownerTable"] = "dbo.Electricity_Chart_by_Rent";
	$fdata["Label"] = "Average"; 
	$fdata["FieldType"] = 131;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Average"; 
		$fdata["FullName"] = "Average";
	
		
		
				$fdata["FieldPermissions"] = true;
	
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
	
		
		
	$tdataElectricity_Chart_by_Rent_Chart["Average"] = $fdata;
//	Time_In1
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "Time_In1";
	$fdata["GoodName"] = "Time_In1";
	$fdata["ownerTable"] = "dbo.Electricity_Chart_by_Rent";
	$fdata["Label"] = "Time In "; 
	$fdata["FieldType"] = 200;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Time_In1"; 
		$fdata["FullName"] = "Time_In1";
	
		
		
				$fdata["FieldPermissions"] = true;
	
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
		
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataElectricity_Chart_by_Rent_Chart["Time_In1"] = $fdata;

	$tdataElectricity_Chart_by_Rent_Chart[".chartXml"] = '<chart>
		<attr value="tables">
			<attr value="0">Electricity Chart by Rent Chart</attr>
		</attr>
		<attr value="chart_type">
			<attr value="type">2d_column</attr>
		</attr>
		
		<attr value="parameters">';
	$tdataElectricity_Chart_by_Rent_Chart[".chartXml"] .= '<attr value="0">
			<attr value="name">Count</attr>
			<attr value="currencyFormat">0</attr>
			<attr value="decimalFormat">0</attr>
			<attr value="customFormat">0</attr>
			<attr value="customFormatStr"></attr>';
	$tdataElectricity_Chart_by_Rent_Chart[".chartXml"] .= '</attr>';
	$tdataElectricity_Chart_by_Rent_Chart[".chartXml"] .= '<attr value="1">
			<attr value="name">Hours</attr>
			<attr value="currencyFormat">0</attr>
			<attr value="decimalFormat">0</attr>
			<attr value="customFormat">0</attr>
			<attr value="customFormatStr"></attr>';
	$tdataElectricity_Chart_by_Rent_Chart[".chartXml"] .= '</attr>';
	$tdataElectricity_Chart_by_Rent_Chart[".chartXml"] .= '<attr value="2">
			<attr value="name">Average</attr>
			<attr value="currencyFormat">0</attr>
			<attr value="decimalFormat">1</attr>
			<attr value="customFormat">0</attr>
			<attr value="customFormatStr"></attr>';
	$tdataElectricity_Chart_by_Rent_Chart[".chartXml"] .= '</attr>';
	$tdataElectricity_Chart_by_Rent_Chart[".chartXml"] .= '<attr value="3">
		<attr value="name">Room</attr>
	</attr>';
	$tdataElectricity_Chart_by_Rent_Chart[".chartXml"] .= '</attr>
			<attr value="appearance">';
	$tdataElectricity_Chart_by_Rent_Chart[".chartXml"] .= '<attr value="scolor11">FF0000</attr>
			<attr value="scolor12">FF0000</attr>';
	$tdataElectricity_Chart_by_Rent_Chart[".chartXml"] .= '<attr value="scolor21">008000</attr>
			<attr value="scolor22">008000</attr>';
	$tdataElectricity_Chart_by_Rent_Chart[".chartXml"] .= '<attr value="scolor31">0000FF</attr>
			<attr value="scolor32">0000FF</attr>';

	$tdataElectricity_Chart_by_Rent_Chart[".chartXml"] .= '<attr value="head">'.xmlencode("Electricity Chart by Rent Chart").'</attr>
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
<attr value="isstacked">1</attr>
<attr value="linestyle">0</attr>
<attr value="autoupdate">0</attr>
<attr value="autoupmin">5</attr>
<attr value="cscroll">true</attr>
<attr value="maxbarscroll">10</attr>';
$tdataElectricity_Chart_by_Rent_Chart[".chartXml"] .= '</attr>

<attr value="fields">';
	$tdataElectricity_Chart_by_Rent_Chart[".chartXml"] .= '<attr value="0">
		<attr value="name">Room</attr>
		<attr value="label">'.xmlencode("Room").'</attr>
		<attr value="search"></attr>
	</attr>';
	$tdataElectricity_Chart_by_Rent_Chart[".chartXml"] .= '<attr value="1">
		<attr value="name">Count</attr>
		<attr value="label">'.xmlencode("Count").'</attr>
		<attr value="search"></attr>
	</attr>';
	$tdataElectricity_Chart_by_Rent_Chart[".chartXml"] .= '<attr value="2">
		<attr value="name">Hours</attr>
		<attr value="label">'.xmlencode("Hours").'</attr>
		<attr value="search"></attr>
	</attr>';
	$tdataElectricity_Chart_by_Rent_Chart[".chartXml"] .= '<attr value="3">
		<attr value="name">Average</attr>
		<attr value="label">'.xmlencode("Average").'</attr>
		<attr value="search"></attr>
	</attr>';
	$tdataElectricity_Chart_by_Rent_Chart[".chartXml"] .= '<attr value="4">
		<attr value="name">Time_In1</attr>
		<attr value="label">'.xmlencode("Time In ").'</attr>
		<attr value="search"></attr>
	</attr>';
$tdataElectricity_Chart_by_Rent_Chart[".chartXml"] .= '</attr>


<attr value="settings">
<attr value="name">Electricity Chart by Rent Chart</attr>
<attr value="short_table_name">Electricity_Chart_by_Rent_Chart</attr>
</attr>

</chart>';
	
$tables_data["Electricity Chart by Rent Chart"]=&$tdataElectricity_Chart_by_Rent_Chart;
$field_labels["Electricity_Chart_by_Rent_Chart"] = &$fieldLabelsElectricity_Chart_by_Rent_Chart;
$fieldToolTips["Electricity Chart by Rent Chart"] = &$fieldToolTipsElectricity_Chart_by_Rent_Chart;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Electricity Chart by Rent Chart"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["Electricity Chart by Rent Chart"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_Electricity_Chart_by_Rent_Chart()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "Room,  [Count],  Hours,  Average,  Time_In1";
$proto0["m_strFrom"] = "FROM dbo.Electricity_Chart_by_Rent";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "ORDER BY Average DESC";
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
	"m_strTable" => "dbo.Electricity_Chart_by_Rent"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "Count",
	"m_strTable" => "dbo.Electricity_Chart_by_Rent"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "Hours",
	"m_strTable" => "dbo.Electricity_Chart_by_Rent"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "Average",
	"m_strTable" => "dbo.Electricity_Chart_by_Rent"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "Time_In1",
	"m_strTable" => "dbo.Electricity_Chart_by_Rent"
));

$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto15=array();
$proto15["m_link"] = "SQLL_MAIN";
			$proto16=array();
$proto16["m_strName"] = "dbo.Electricity_Chart_by_Rent";
$proto16["m_columns"] = array();
$proto16["m_columns"][] = "Room";
$proto16["m_columns"][] = "Count";
$proto16["m_columns"][] = "Hours";
$proto16["m_columns"][] = "Average";
$proto16["m_columns"][] = "Converted";
$proto16["m_columns"][] = "Time_In";
$proto16["m_columns"][] = "Time_In1";
$obj = new SQLTable($proto16);

$proto15["m_table"] = $obj;
$proto15["m_alias"] = "";
$proto17=array();
$proto17["m_sql"] = "";
$proto17["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto17["m_column"]=$obj;
$proto17["m_contained"] = array();
$proto17["m_strCase"] = "";
$proto17["m_havingmode"] = "0";
$proto17["m_inBrackets"] = "0";
$proto17["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto17);

$proto15["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto15);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
												$proto19=array();
						$obj = new SQLField(array(
	"m_strName" => "Average",
	"m_strTable" => "dbo.Electricity_Chart_by_Rent"
));

$proto19["m_column"]=$obj;
$proto19["m_bAsc"] = 0;
$proto19["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto19);

$proto0["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_Electricity_Chart_by_Rent_Chart = createSqlQuery_Electricity_Chart_by_Rent_Chart();
					$tdataElectricity_Chart_by_Rent_Chart[".sqlquery"] = $queryData_Electricity_Chart_by_Rent_Chart;
	
if(isset($tdataElectricity_Chart_by_Rent_Chart["field2"])){
	$tdataElectricity_Chart_by_Rent_Chart["field2"]["LookupTable"] = "carscars_view";
	$tdataElectricity_Chart_by_Rent_Chart["field2"]["LookupOrderBy"] = "name";
	$tdataElectricity_Chart_by_Rent_Chart["field2"]["LookupType"] = 4;
	$tdataElectricity_Chart_by_Rent_Chart["field2"]["LinkField"] = "email";
	$tdataElectricity_Chart_by_Rent_Chart["field2"]["DisplayField"] = "name";
	$tdataElectricity_Chart_by_Rent_Chart[".hasCustomViewField"] = true;
}

$tableEvents["Electricity Chart by Rent Chart"] = new eventsBase;
$tdataElectricity_Chart_by_Rent_Chart[".hasEvents"] = false;

$cipherer = new RunnerCipherer("Electricity Chart by Rent Chart");

?>