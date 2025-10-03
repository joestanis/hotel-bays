<?php
require_once(getabspath("classes/cipherer.php"));
$tdataAcumultive_Sale_by_Shift = array();
	$tdataAcumultive_Sale_by_Shift[".ShortName"] = "Acumultive_Sale_by_Shift";
	$tdataAcumultive_Sale_by_Shift[".OwnerID"] = "";
	$tdataAcumultive_Sale_by_Shift[".OriginalTable"] = "dbo.Motel_Live_Data_Qry";

//	field labels
$fieldLabelsAcumultive_Sale_by_Shift = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsAcumultive_Sale_by_Shift["English"] = array();
	$fieldToolTipsAcumultive_Sale_by_Shift["English"] = array();
	$fieldLabelsAcumultive_Sale_by_Shift["English"]["Room"] = "Room's Count";
	$fieldToolTipsAcumultive_Sale_by_Shift["English"]["Room"] = "";
	$fieldLabelsAcumultive_Sale_by_Shift["English"]["Total"] = "Total";
	$fieldToolTipsAcumultive_Sale_by_Shift["English"]["Total"] = "";
	$fieldLabelsAcumultive_Sale_by_Shift["English"]["Shift"] = "Shift";
	$fieldToolTipsAcumultive_Sale_by_Shift["English"]["Shift"] = "";
	if (count($fieldToolTipsAcumultive_Sale_by_Shift["English"]))
		$tdataAcumultive_Sale_by_Shift[".isUseToolTips"] = true;
}
	
	
	$tdataAcumultive_Sale_by_Shift[".NCSearch"] = true;

	$tdataAcumultive_Sale_by_Shift[".ChartRefreshTime"] = 0;


$tdataAcumultive_Sale_by_Shift[".shortTableName"] = "Acumultive_Sale_by_Shift";
$tdataAcumultive_Sale_by_Shift[".nSecOptions"] = 0;
$tdataAcumultive_Sale_by_Shift[".recsPerRowList"] = 1;
$tdataAcumultive_Sale_by_Shift[".mainTableOwnerID"] = "";
$tdataAcumultive_Sale_by_Shift[".moveNext"] = 1;
$tdataAcumultive_Sale_by_Shift[".nType"] = 3;

$tdataAcumultive_Sale_by_Shift[".strOriginalTableName"] = "dbo.Motel_Live_Data_Qry";




$tdataAcumultive_Sale_by_Shift[".showAddInPopup"] = false;

$tdataAcumultive_Sale_by_Shift[".showEditInPopup"] = false;

$tdataAcumultive_Sale_by_Shift[".showViewInPopup"] = false;

$tdataAcumultive_Sale_by_Shift[".fieldsForRegister"] = array();

$tdataAcumultive_Sale_by_Shift[".listAjax"] = false;

	$tdataAcumultive_Sale_by_Shift[".audit"] = false;

	$tdataAcumultive_Sale_by_Shift[".locking"] = false;

$tdataAcumultive_Sale_by_Shift[".listIcons"] = true;




$tdataAcumultive_Sale_by_Shift[".showSimpleSearchOptions"] = false;

$tdataAcumultive_Sale_by_Shift[".showSearchPanel"] = true;

if (isMobile())
	$tdataAcumultive_Sale_by_Shift[".isUseAjaxSuggest"] = false;
else 
	$tdataAcumultive_Sale_by_Shift[".isUseAjaxSuggest"] = true;


// button handlers file names

$tdataAcumultive_Sale_by_Shift[".addPageEvents"] = false;

// use timepicker for search panel
$tdataAcumultive_Sale_by_Shift[".isUseTimeForSearch"] = false;




$tdataAcumultive_Sale_by_Shift[".allSearchFields"] = array();


$tdataAcumultive_Sale_by_Shift[".googleLikeFields"][] = "Shift";
$tdataAcumultive_Sale_by_Shift[".googleLikeFields"][] = "Room";
$tdataAcumultive_Sale_by_Shift[".googleLikeFields"][] = "Total";



$tdataAcumultive_Sale_by_Shift[".isTableType"] = "chart";

	



// Access doesn't support subqueries from the same table as main



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataAcumultive_Sale_by_Shift[".strOrderBy"] = $tstrOrderBy;

$tdataAcumultive_Sale_by_Shift[".orderindexes"] = array();

$tdataAcumultive_Sale_by_Shift[".sqlHead"] = "SELECT Start_Shift AS Shift,  COUNT(Room) AS Room,  SUM(Prices) AS Total";
$tdataAcumultive_Sale_by_Shift[".sqlFrom"] = "FROM dbo.Motel_Live_Data_Qry";
$tdataAcumultive_Sale_by_Shift[".sqlWhereExpr"] = "(Prices >1)";
$tdataAcumultive_Sale_by_Shift[".sqlTail"] = "GROUP BY Start_Shift";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataAcumultive_Sale_by_Shift[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataAcumultive_Sale_by_Shift[".arrGroupsPerPage"] = $arrGPP;

$tableKeysAcumultive_Sale_by_Shift = array();
$tdataAcumultive_Sale_by_Shift[".Keys"] = $tableKeysAcumultive_Sale_by_Shift;

$tdataAcumultive_Sale_by_Shift[".listFields"] = array();
$tdataAcumultive_Sale_by_Shift[".listFields"][] = "Shift";
$tdataAcumultive_Sale_by_Shift[".listFields"][] = "Room";
$tdataAcumultive_Sale_by_Shift[".listFields"][] = "Total";

$tdataAcumultive_Sale_by_Shift[".viewFields"] = array();
$tdataAcumultive_Sale_by_Shift[".viewFields"][] = "Shift";
$tdataAcumultive_Sale_by_Shift[".viewFields"][] = "Room";
$tdataAcumultive_Sale_by_Shift[".viewFields"][] = "Total";

$tdataAcumultive_Sale_by_Shift[".addFields"] = array();
$tdataAcumultive_Sale_by_Shift[".addFields"][] = "Room";
$tdataAcumultive_Sale_by_Shift[".addFields"][] = "Total";

$tdataAcumultive_Sale_by_Shift[".inlineAddFields"] = array();
$tdataAcumultive_Sale_by_Shift[".inlineAddFields"][] = "Shift";
$tdataAcumultive_Sale_by_Shift[".inlineAddFields"][] = "Room";
$tdataAcumultive_Sale_by_Shift[".inlineAddFields"][] = "Total";

$tdataAcumultive_Sale_by_Shift[".editFields"] = array();
$tdataAcumultive_Sale_by_Shift[".editFields"][] = "Room";
$tdataAcumultive_Sale_by_Shift[".editFields"][] = "Total";

$tdataAcumultive_Sale_by_Shift[".inlineEditFields"] = array();
$tdataAcumultive_Sale_by_Shift[".inlineEditFields"][] = "Shift";
$tdataAcumultive_Sale_by_Shift[".inlineEditFields"][] = "Room";
$tdataAcumultive_Sale_by_Shift[".inlineEditFields"][] = "Total";

$tdataAcumultive_Sale_by_Shift[".exportFields"] = array();
$tdataAcumultive_Sale_by_Shift[".exportFields"][] = "Shift";
$tdataAcumultive_Sale_by_Shift[".exportFields"][] = "Room";
$tdataAcumultive_Sale_by_Shift[".exportFields"][] = "Total";

$tdataAcumultive_Sale_by_Shift[".printFields"] = array();
$tdataAcumultive_Sale_by_Shift[".printFields"][] = "Shift";
$tdataAcumultive_Sale_by_Shift[".printFields"][] = "Room";
$tdataAcumultive_Sale_by_Shift[".printFields"][] = "Total";

//	Shift
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "Shift";
	$fdata["GoodName"] = "Shift";
	$fdata["ownerTable"] = "dbo.Motel_Live_Data_Qry";
	$fdata["Label"] = "Shift"; 
	$fdata["FieldType"] = 202;
	
		
		
		$fdata["bListPage"] = true; 
	
		
		$fdata["bInlineAdd"] = true; 
	
		
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Start_Shift"; 
		$fdata["FullName"] = "Start_Shift";
	
		
		
				
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
	
		
		
	$tdataAcumultive_Sale_by_Shift["Shift"] = $fdata;
//	Room
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "Room";
	$fdata["GoodName"] = "Room";
	$fdata["ownerTable"] = "";
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
		$fdata["FullName"] = "COUNT(Room)";
	
		
		
				
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
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						
	//	End validation
	
		
		
		$fdata["EditFormats"]["search"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdataAcumultive_Sale_by_Shift["Room"] = $fdata;
//	Total
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "Total";
	$fdata["GoodName"] = "Total";
	$fdata["ownerTable"] = "";
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
	
		$fdata["strField"] = "Total"; 
		$fdata["FullName"] = "SUM(Prices)";
	
		
		
				
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
	
		
		
	$tdataAcumultive_Sale_by_Shift["Total"] = $fdata;

	$tdataAcumultive_Sale_by_Shift[".chartXml"] = '<chart>
		<attr value="tables">
			<attr value="0">Acumultive Sale by Shift</attr>
		</attr>
		<attr value="chart_type">
			<attr value="type">2d_column</attr>
		</attr>
		
		<attr value="parameters">';
	$tdataAcumultive_Sale_by_Shift[".chartXml"] .= '<attr value="0">
			<attr value="name">Room</attr>
			<attr value="currencyFormat">0</attr>
			<attr value="decimalFormat">0</attr>
			<attr value="customFormat">0</attr>
			<attr value="customFormatStr"></attr>';
	$tdataAcumultive_Sale_by_Shift[".chartXml"] .= '</attr>';
	$tdataAcumultive_Sale_by_Shift[".chartXml"] .= '<attr value="1">
			<attr value="name">Total</attr>
			<attr value="currencyFormat">0</attr>
			<attr value="decimalFormat">0</attr>
			<attr value="customFormat">0</attr>
			<attr value="customFormatStr"></attr>';
	$tdataAcumultive_Sale_by_Shift[".chartXml"] .= '</attr>';
	$tdataAcumultive_Sale_by_Shift[".chartXml"] .= '<attr value="2">
		<attr value="name">Shift</attr>
	</attr>';
	$tdataAcumultive_Sale_by_Shift[".chartXml"] .= '</attr>
			<attr value="appearance">';
	$tdataAcumultive_Sale_by_Shift[".chartXml"] .= '<attr value="scolor11">FF0000</attr>
			<attr value="scolor12">FF0000</attr>';
	$tdataAcumultive_Sale_by_Shift[".chartXml"] .= '<attr value="scolor21">008000</attr>
			<attr value="scolor22">008000</attr>';

	$tdataAcumultive_Sale_by_Shift[".chartXml"] .= '<attr value="head">'.xmlencode("Acumultive Sales by Shift").'</attr>
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
<attr value="isstacked">0</attr>
<attr value="linestyle">0</attr>
<attr value="autoupdate">0</attr>
<attr value="autoupmin">5</attr>
<attr value="cscroll">true</attr>
<attr value="maxbarscroll">10</attr>';
$tdataAcumultive_Sale_by_Shift[".chartXml"] .= '</attr>

<attr value="fields">';
	$tdataAcumultive_Sale_by_Shift[".chartXml"] .= '<attr value="0">
		<attr value="name">Shift</attr>
		<attr value="label">'.xmlencode("Shift").'</attr>
		<attr value="search"></attr>
	</attr>';
	$tdataAcumultive_Sale_by_Shift[".chartXml"] .= '<attr value="1">
		<attr value="name">Room</attr>
		<attr value="label">'.xmlencode("Room's Count").'</attr>
		<attr value="search"></attr>
	</attr>';
	$tdataAcumultive_Sale_by_Shift[".chartXml"] .= '<attr value="2">
		<attr value="name">Total</attr>
		<attr value="label">'.xmlencode("Total").'</attr>
		<attr value="search"></attr>
	</attr>';
$tdataAcumultive_Sale_by_Shift[".chartXml"] .= '</attr>


<attr value="settings">
<attr value="name">Acumultive Sale by Shift</attr>
<attr value="short_table_name">Acumultive_Sale_by_Shift</attr>
</attr>

</chart>';
	
$tables_data["Acumultive Sale by Shift"]=&$tdataAcumultive_Sale_by_Shift;
$field_labels["Acumultive_Sale_by_Shift"] = &$fieldLabelsAcumultive_Sale_by_Shift;
$fieldToolTips["Acumultive Sale by Shift"] = &$fieldToolTipsAcumultive_Sale_by_Shift;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["Acumultive Sale by Shift"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["Acumultive Sale by Shift"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_Acumultive_Sale_by_Shift()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "Start_Shift AS Shift,  COUNT(Room) AS Room,  SUM(Prices) AS Total";
$proto0["m_strFrom"] = "FROM dbo.Motel_Live_Data_Qry";
$proto0["m_strWhere"] = "(Prices >1)";
$proto0["m_strOrderBy"] = "";
$proto0["m_strTail"] = "GROUP BY Start_Shift";
$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "Prices >1";
$proto1["m_uniontype"] = "SQLL_UNKNOWN";
						$obj = new SQLField(array(
	"m_strName" => "Prices",
	"m_strTable" => "dbo.Motel_Live_Data_Qry"
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
	"m_strName" => "Start_Shift",
	"m_strTable" => "dbo.Motel_Live_Data_Qry"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "Shift";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$proto8=array();
$proto8["m_functiontype"] = "SQLF_COUNT";
$proto8["m_arguments"] = array();
						$obj = new SQLField(array(
	"m_strName" => "Room",
	"m_strTable" => "dbo.Motel_Live_Data_Qry"
));

$proto8["m_arguments"][]=$obj;
$proto8["m_strFunctionName"] = "COUNT";
$obj = new SQLFunctionCall($proto8);

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "Room";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto10=array();
			$proto11=array();
$proto11["m_functiontype"] = "SQLF_SUM";
$proto11["m_arguments"] = array();
						$obj = new SQLField(array(
	"m_strName" => "Prices",
	"m_strTable" => "dbo.Motel_Live_Data_Qry"
));

$proto11["m_arguments"][]=$obj;
$proto11["m_strFunctionName"] = "SUM";
$obj = new SQLFunctionCall($proto11);

$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "Total";
$obj = new SQLFieldListItem($proto10);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto13=array();
$proto13["m_link"] = "SQLL_MAIN";
			$proto14=array();
$proto14["m_strName"] = "dbo.Motel_Live_Data_Qry";
$proto14["m_columns"] = array();
$proto14["m_columns"][] = "ID";
$proto14["m_columns"][] = "Room";
$proto14["m_columns"][] = "Time_In";
$proto14["m_columns"][] = "Time_Out";
$proto14["m_columns"][] = "Elapsed";
$proto14["m_columns"][] = "Overtime";
$proto14["m_columns"][] = "Clean_Duration";
$proto14["m_columns"][] = "Image";
$proto14["m_columns"][] = "Min";
$proto14["m_columns"][] = "Prices";
$proto14["m_columns"][] = "Start_Shift";
$proto14["m_columns"][] = "Total";
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
												$proto17=array();
						$obj = new SQLField(array(
	"m_strName" => "Start_Shift",
	"m_strTable" => "dbo.Motel_Live_Data_Qry"
));

$proto17["m_column"]=$obj;
$obj = new SQLGroupByItem($proto17);

$proto0["m_groupby"][]=$obj;
$proto0["m_orderby"] = array();
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_Acumultive_Sale_by_Shift = createSqlQuery_Acumultive_Sale_by_Shift();
			$tdataAcumultive_Sale_by_Shift[".sqlquery"] = $queryData_Acumultive_Sale_by_Shift;

$tableEvents["Acumultive Sale by Shift"] = new eventsBase;
$tdataAcumultive_Sale_by_Shift[".hasEvents"] = false;

$cipherer = new RunnerCipherer("Acumultive Sale by Shift");

?>