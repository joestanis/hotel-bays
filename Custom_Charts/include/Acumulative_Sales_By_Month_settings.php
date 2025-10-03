<?php
require_once(getabspath("classes/cipherer.php"));
$tdataAcumulative_Sales_By_Month = array();
	$tdataAcumulative_Sales_By_Month[".ShortName"] = "Acumulative_Sales_By_Month";
	$tdataAcumulative_Sales_By_Month[".OwnerID"] = "";
	$tdataAcumulative_Sales_By_Month[".OriginalTable"] = "dbo.Month_Merge_Conversion";

//	field labels
$fieldLabelsAcumulative_Sales_By_Month = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsAcumulative_Sales_By_Month["English"] = array();
	$fieldToolTipsAcumulative_Sales_By_Month["English"] = array();
	$fieldLabelsAcumulative_Sales_By_Month["English"]["Id"] = "Id";
	$fieldToolTipsAcumulative_Sales_By_Month["English"]["Id"] = "";
	$fieldLabelsAcumulative_Sales_By_Month["English"]["Month"] = "Month";
	$fieldToolTipsAcumulative_Sales_By_Month["English"]["Month"] = "";
	$fieldLabelsAcumulative_Sales_By_Month["English"]["Prices"] = "Total";
	$fieldToolTipsAcumulative_Sales_By_Month["English"]["Prices"] = "";
	$fieldLabelsAcumulative_Sales_By_Month["English"]["Room"] = "Room's Count";
	$fieldToolTipsAcumulative_Sales_By_Month["English"]["Room"] = "";
	if (count($fieldToolTipsAcumulative_Sales_By_Month["English"]))
		$tdataAcumulative_Sales_By_Month[".isUseToolTips"] = true;
}
	
	
	$tdataAcumulative_Sales_By_Month[".NCSearch"] = true;

	$tdataAcumulative_Sales_By_Month[".ChartRefreshTime"] = 0;


$tdataAcumulative_Sales_By_Month[".shortTableName"] = "Acumulative_Sales_By_Month";
$tdataAcumulative_Sales_By_Month[".nSecOptions"] = 0;
$tdataAcumulative_Sales_By_Month[".recsPerRowList"] = 1;
$tdataAcumulative_Sales_By_Month[".mainTableOwnerID"] = "";
$tdataAcumulative_Sales_By_Month[".moveNext"] = 1;
$tdataAcumulative_Sales_By_Month[".nType"] = 3;

$tdataAcumulative_Sales_By_Month[".strOriginalTableName"] = "dbo.Month_Merge_Conversion";




$tdataAcumulative_Sales_By_Month[".showAddInPopup"] = false;

$tdataAcumulative_Sales_By_Month[".showEditInPopup"] = false;

$tdataAcumulative_Sales_By_Month[".showViewInPopup"] = false;

$tdataAcumulative_Sales_By_Month[".fieldsForRegister"] = array();

$tdataAcumulative_Sales_By_Month[".listAjax"] = false;

	$tdataAcumulative_Sales_By_Month[".audit"] = false;

	$tdataAcumulative_Sales_By_Month[".locking"] = false;

$tdataAcumulative_Sales_By_Month[".listIcons"] = true;




$tdataAcumulative_Sales_By_Month[".showSimpleSearchOptions"] = false;

$tdataAcumulative_Sales_By_Month[".showSearchPanel"] = true;

if (isMobile())
	$tdataAcumulative_Sales_By_Month[".isUseAjaxSuggest"] = false;
else 
	$tdataAcumulative_Sales_By_Month[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdataAcumulative_Sales_By_Month[".addPageEvents"] = false;

// use timepicker for search panel
$tdataAcumulative_Sales_By_Month[".isUseTimeForSearch"] = false;




$tdataAcumulative_Sales_By_Month[".allSearchFields"] = array();


$tdataAcumulative_Sales_By_Month[".googleLikeFields"][] = "Id";
$tdataAcumulative_Sales_By_Month[".googleLikeFields"][] = "Month";
$tdataAcumulative_Sales_By_Month[".googleLikeFields"][] = "Prices";
$tdataAcumulative_Sales_By_Month[".googleLikeFields"][] = "Room";



$tdataAcumulative_Sales_By_Month[".isTableType"] = "chart";

	



// Access doesn't support subqueries from the same table as main



$tstrOrderBy = "ORDER BY Id";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataAcumulative_Sales_By_Month[".strOrderBy"] = $tstrOrderBy;

$tdataAcumulative_Sales_By_Month[".orderindexes"] = array();

$tdataAcumulative_Sales_By_Month[".sqlHead"] = "SELECT Id,  [Month],  Prices,  Room";
$tdataAcumulative_Sales_By_Month[".sqlFrom"] = "FROM dbo.Month_Merge_Conversion";
$tdataAcumulative_Sales_By_Month[".sqlWhereExpr"] = "(Prices >1)";
$tdataAcumulative_Sales_By_Month[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataAcumulative_Sales_By_Month[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataAcumulative_Sales_By_Month[".arrGroupsPerPage"] = $arrGPP;

$tableKeysAcumulative_Sales_By_Month = array();
$tdataAcumulative_Sales_By_Month[".Keys"] = $tableKeysAcumulative_Sales_By_Month;

$tdataAcumulative_Sales_By_Month[".listFields"] = array();
$tdataAcumulative_Sales_By_Month[".listFields"][] = "Id";
$tdataAcumulative_Sales_By_Month[".listFields"][] = "Month";
$tdataAcumulative_Sales_By_Month[".listFields"][] = "Prices";
$tdataAcumulative_Sales_By_Month[".listFields"][] = "Room";

$tdataAcumulative_Sales_By_Month[".viewFields"] = array();
$tdataAcumulative_Sales_By_Month[".viewFields"][] = "Id";
$tdataAcumulative_Sales_By_Month[".viewFields"][] = "Month";
$tdataAcumulative_Sales_By_Month[".viewFields"][] = "Prices";
$tdataAcumulative_Sales_By_Month[".viewFields"][] = "Room";

$tdataAcumulative_Sales_By_Month[".addFields"] = array();
$tdataAcumulative_Sales_By_Month[".addFields"][] = "Id";
$tdataAcumulative_Sales_By_Month[".addFields"][] = "Month";
$tdataAcumulative_Sales_By_Month[".addFields"][] = "Prices";
$tdataAcumulative_Sales_By_Month[".addFields"][] = "Room";

$tdataAcumulative_Sales_By_Month[".inlineAddFields"] = array();
$tdataAcumulative_Sales_By_Month[".inlineAddFields"][] = "Id";
$tdataAcumulative_Sales_By_Month[".inlineAddFields"][] = "Month";
$tdataAcumulative_Sales_By_Month[".inlineAddFields"][] = "Prices";
$tdataAcumulative_Sales_By_Month[".inlineAddFields"][] = "Room";

$tdataAcumulative_Sales_By_Month[".editFields"] = array();
$tdataAcumulative_Sales_By_Month[".editFields"][] = "Id";
$tdataAcumulative_Sales_By_Month[".editFields"][] = "Month";
$tdataAcumulative_Sales_By_Month[".editFields"][] = "Prices";
$tdataAcumulative_Sales_By_Month[".editFields"][] = "Room";

$tdataAcumulative_Sales_By_Month[".inlineEditFields"] = array();
$tdataAcumulative_Sales_By_Month[".inlineEditFields"][] = "Id";
$tdataAcumulative_Sales_By_Month[".inlineEditFields"][] = "Month";
$tdataAcumulative_Sales_By_Month[".inlineEditFields"][] = "Prices";
$tdataAcumulative_Sales_By_Month[".inlineEditFields"][] = "Room";

$tdataAcumulative_Sales_By_Month[".exportFields"] = array();
$tdataAcumulative_Sales_By_Month[".exportFields"][] = "Id";
$tdataAcumulative_Sales_By_Month[".exportFields"][] = "Month";
$tdataAcumulative_Sales_By_Month[".exportFields"][] = "Prices";
$tdataAcumulative_Sales_By_Month[".exportFields"][] = "Room";

$tdataAcumulative_Sales_By_Month[".printFields"] = array();
$tdataAcumulative_Sales_By_Month[".printFields"][] = "Id";
$tdataAcumulative_Sales_By_Month[".printFields"][] = "Month";
$tdataAcumulative_Sales_By_Month[".printFields"][] = "Prices";
$tdataAcumulative_Sales_By_Month[".printFields"][] = "Room";

//	Id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "Id";
	$fdata["GoodName"] = "Id";
	$fdata["ownerTable"] = "dbo.Month_Merge_Conversion";
	$fdata["Label"] = "Id"; 
	$fdata["FieldType"] = 3;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Id"; 
		$fdata["FullName"] = "Id";
	
		
		
				
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

		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
	
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataAcumulative_Sales_By_Month["Id"] = $fdata;
//	Month
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "Month";
	$fdata["GoodName"] = "Month";
	$fdata["ownerTable"] = "dbo.Month_Merge_Conversion";
	$fdata["Label"] = "Month"; 
	$fdata["FieldType"] = 130;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Month"; 
		$fdata["FullName"] = "[Month]";
	
		
		
				
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
	
		
		
	$tdataAcumulative_Sales_By_Month["Month"] = $fdata;
//	Prices
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "Prices";
	$fdata["GoodName"] = "Prices";
	$fdata["ownerTable"] = "dbo.Month_Merge_Conversion";
	$fdata["Label"] = "Total"; 
	$fdata["FieldType"] = 131;
	
		
		
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Prices"; 
		$fdata["FullName"] = "Prices";
	
		
		
				
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
	
		
		
	$tdataAcumulative_Sales_By_Month["Prices"] = $fdata;
//	Room
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "Room";
	$fdata["GoodName"] = "Room";
	$fdata["ownerTable"] = "dbo.Month_Merge_Conversion";
	$fdata["Label"] = "Room's Count"; 
	$fdata["FieldType"] = 3;
	
		
		
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
			
		
//	Begin validation
	$edata["validateAs"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataAcumulative_Sales_By_Month["Room"] = $fdata;

	$tdataAcumulative_Sales_By_Month[".chartXml"] = '<chart>
		<attr value="tables">
			<attr value="0">Acumulative Sales By Month</attr>
		</attr>
		<attr value="chart_type">
			<attr value="type">2d_column</attr>
		</attr>
		
		<attr value="parameters">';
	$tdataAcumulative_Sales_By_Month[".chartXml"] .= '<attr value="0">
			<attr value="name">Prices</attr>
			<attr value="currencyFormat">0</attr>
			<attr value="decimalFormat">0</attr>
			<attr value="customFormat">0</attr>
			<attr value="customFormatStr"></attr>';
	$tdataAcumulative_Sales_By_Month[".chartXml"] .= '</attr>';
	$tdataAcumulative_Sales_By_Month[".chartXml"] .= '<attr value="1">
			<attr value="name">Room</attr>
			<attr value="currencyFormat">0</attr>
			<attr value="decimalFormat">0</attr>
			<attr value="customFormat">0</attr>
			<attr value="customFormatStr"></attr>';
	$tdataAcumulative_Sales_By_Month[".chartXml"] .= '</attr>';
	$tdataAcumulative_Sales_By_Month[".chartXml"] .= '<attr value="2">
		<attr value="name">Month</attr>
	</attr>';
	$tdataAcumulative_Sales_By_Month[".chartXml"] .= '</attr>
			<attr value="appearance">';
	$tdataAcumulative_Sales_By_Month[".chartXml"] .= '<attr value="scolor11">FF0000</attr>
			<attr value="scolor12">FF0000</attr>';
	$tdataAcumulative_Sales_By_Month[".chartXml"] .= '<attr value="scolor21">008000</attr>
			<attr value="scolor22">008000</attr>';

	$tdataAcumulative_Sales_By_Month[".chartXml"] .= '<attr value="head">'.xmlencode("Acumulative Sales By Month").'</attr>
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
<attr value="color131">C0C0C0</attr>
<attr value="color132">C0C0C0</attr>
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
<attr value="maxbarscroll">100</attr>';
$tdataAcumulative_Sales_By_Month[".chartXml"] .= '</attr>

<attr value="fields">';
	$tdataAcumulative_Sales_By_Month[".chartXml"] .= '<attr value="0">
		<attr value="name">Id</attr>
		<attr value="label">'.xmlencode("Id").'</attr>
		<attr value="search"></attr>
	</attr>';
	$tdataAcumulative_Sales_By_Month[".chartXml"] .= '<attr value="1">
		<attr value="name">Month</attr>
		<attr value="label">'.xmlencode("Month").'</attr>
		<attr value="search"></attr>
	</attr>';
	$tdataAcumulative_Sales_By_Month[".chartXml"] .= '<attr value="2">
		<attr value="name">Prices</attr>
		<attr value="label">'.xmlencode("Total").'</attr>
		<attr value="search"></attr>
	</attr>';
	$tdataAcumulative_Sales_By_Month[".chartXml"] .= '<attr value="3">
		<attr value="name">Room</attr>
		<attr value="label">'.xmlencode("Room's Count").'</attr>
		<attr value="search"></attr>
	</attr>';
$tdataAcumulative_Sales_By_Month[".chartXml"] .= '</attr>


<attr value="settings">
<attr value="name">Acumulative Sales By Month</attr>
<attr value="short_table_name">Acumulative_Sales_By_Month</attr>
</attr>

</chart>';
	
$tables_data["Acumulative Sales By Month"]=&$tdataAcumulative_Sales_By_Month;
$field_labels["Acumulative_Sales_By_Month"] = &$fieldLabelsAcumulative_Sales_By_Month;
$fieldToolTips["Acumulative Sales By Month"] = &$fieldToolTipsAcumulative_Sales_By_Month;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Acumulative Sales By Month"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["Acumulative Sales By Month"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_Acumulative_Sales_By_Month()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "Id,  [Month],  Prices,  Room";
$proto0["m_strFrom"] = "FROM dbo.Month_Merge_Conversion";
$proto0["m_strWhere"] = "(Prices >1)";
$proto0["m_strOrderBy"] = "ORDER BY Id";
$proto0["m_strTail"] = "";
$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "Prices >1";
$proto1["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Prices",
	"m_strTable" => "dbo.Month_Merge_Conversion"
));

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
$proto1["m_strCase"] = ">1";
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
	"m_strName" => "Id",
	"m_strTable" => "dbo.Month_Merge_Conversion"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "Month",
	"m_strTable" => "dbo.Month_Merge_Conversion"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "Prices",
	"m_strTable" => "dbo.Month_Merge_Conversion"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "Room",
	"m_strTable" => "dbo.Month_Merge_Conversion"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto13=array();
$proto13["m_link"] = "SQLL_MAIN";
			$proto14=array();
$proto14["m_strName"] = "dbo.Month_Merge_Conversion";
$proto14["m_columns"] = array();
$proto14["m_columns"][] = "Id";
$proto14["m_columns"][] = "Month";
$proto14["m_columns"][] = "Prices";
$proto14["m_columns"][] = "Room";
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
	"m_strName" => "Id",
	"m_strTable" => "dbo.Month_Merge_Conversion"
));

$proto17["m_column"]=$obj;
$proto17["m_bAsc"] = 1;
$proto17["m_nColumn"] = 0;
$obj = new SQLOrderByItem($proto17);

$proto0["m_orderby"][]=$obj;					
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_Acumulative_Sales_By_Month = createSqlQuery_Acumulative_Sales_By_Month();
				$tdataAcumulative_Sales_By_Month[".sqlquery"] = $queryData_Acumulative_Sales_By_Month;

$tableEvents["Acumulative Sales By Month"] = new eventsBase;
$tdataAcumulative_Sales_By_Month[".hasEvents"] = false;

$cipherer = new RunnerCipherer("Acumulative Sales By Month");

?>