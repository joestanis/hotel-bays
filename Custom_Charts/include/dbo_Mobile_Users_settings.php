<?php
require_once(getabspath("classes/cipherer.php"));
$tdatadbo_Mobile_Users = array();
	$tdatadbo_Mobile_Users[".NumberOfChars"] = 80; 
	$tdatadbo_Mobile_Users[".ShortName"] = "dbo_Mobile_Users";
	$tdatadbo_Mobile_Users[".OwnerID"] = "";
	$tdatadbo_Mobile_Users[".OriginalTable"] = "dbo.Mobile_Users";

//	field labels
$fieldLabelsdbo_Mobile_Users = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsdbo_Mobile_Users["English"] = array();
	$fieldToolTipsdbo_Mobile_Users["English"] = array();
	$fieldLabelsdbo_Mobile_Users["English"]["Id"] = "Id";
	$fieldToolTipsdbo_Mobile_Users["English"]["Id"] = "";
	$fieldLabelsdbo_Mobile_Users["English"]["login"] = "Login";
	$fieldToolTipsdbo_Mobile_Users["English"]["login"] = "";
	$fieldLabelsdbo_Mobile_Users["English"]["password"] = "Password";
	$fieldToolTipsdbo_Mobile_Users["English"]["password"] = "";
	$fieldLabelsdbo_Mobile_Users["English"]["fullname"] = "Fullname";
	$fieldToolTipsdbo_Mobile_Users["English"]["fullname"] = "";
	if (count($fieldToolTipsdbo_Mobile_Users["English"]))
		$tdatadbo_Mobile_Users[".isUseToolTips"] = true;
}
	
	
	$tdatadbo_Mobile_Users[".NCSearch"] = true;



$tdatadbo_Mobile_Users[".shortTableName"] = "dbo_Mobile_Users";
$tdatadbo_Mobile_Users[".nSecOptions"] = 0;
$tdatadbo_Mobile_Users[".recsPerRowList"] = 1;
$tdatadbo_Mobile_Users[".mainTableOwnerID"] = "";
$tdatadbo_Mobile_Users[".moveNext"] = 1;
$tdatadbo_Mobile_Users[".nType"] = 0;

$tdatadbo_Mobile_Users[".strOriginalTableName"] = "dbo.Mobile_Users";




$tdatadbo_Mobile_Users[".showAddInPopup"] = false;

$tdatadbo_Mobile_Users[".showEditInPopup"] = false;

$tdatadbo_Mobile_Users[".showViewInPopup"] = false;

$tdatadbo_Mobile_Users[".fieldsForRegister"] = array();

$tdatadbo_Mobile_Users[".listAjax"] = false;

	$tdatadbo_Mobile_Users[".audit"] = false;

	$tdatadbo_Mobile_Users[".locking"] = false;

$tdatadbo_Mobile_Users[".listIcons"] = true;
$tdatadbo_Mobile_Users[".edit"] = true;
$tdatadbo_Mobile_Users[".inlineEdit"] = true;
$tdatadbo_Mobile_Users[".inlineAdd"] = true;
$tdatadbo_Mobile_Users[".view"] = true;

$tdatadbo_Mobile_Users[".exportTo"] = true;

$tdatadbo_Mobile_Users[".printFriendly"] = true;

$tdatadbo_Mobile_Users[".delete"] = true;

$tdatadbo_Mobile_Users[".showSimpleSearchOptions"] = false;

$tdatadbo_Mobile_Users[".showSearchPanel"] = true;

if (isMobile())
	$tdatadbo_Mobile_Users[".isUseAjaxSuggest"] = false;
else 
	$tdatadbo_Mobile_Users[".isUseAjaxSuggest"] = true;

$tdatadbo_Mobile_Users[".rowHighlite"] = true;

// button handlers file names

$tdatadbo_Mobile_Users[".addPageEvents"] = false;

// use datepicker for search panel
$tdatadbo_Mobile_Users[".isUseCalendarForSearch"] = false;

// use timepicker for search panel
$tdatadbo_Mobile_Users[".isUseTimeForSearch"] = false;




$tdatadbo_Mobile_Users[".allSearchFields"] = array();

$tdatadbo_Mobile_Users[".allSearchFields"][] = "Id";
$tdatadbo_Mobile_Users[".allSearchFields"][] = "login";
$tdatadbo_Mobile_Users[".allSearchFields"][] = "password";
$tdatadbo_Mobile_Users[".allSearchFields"][] = "fullname";

$tdatadbo_Mobile_Users[".googleLikeFields"][] = "Id";
$tdatadbo_Mobile_Users[".googleLikeFields"][] = "login";
$tdatadbo_Mobile_Users[".googleLikeFields"][] = "password";
$tdatadbo_Mobile_Users[".googleLikeFields"][] = "fullname";


$tdatadbo_Mobile_Users[".advSearchFields"][] = "Id";
$tdatadbo_Mobile_Users[".advSearchFields"][] = "login";
$tdatadbo_Mobile_Users[".advSearchFields"][] = "password";
$tdatadbo_Mobile_Users[".advSearchFields"][] = "fullname";

$tdatadbo_Mobile_Users[".isTableType"] = "list";

	



// Access doesn't support subqueries from the same table as main



$tdatadbo_Mobile_Users[".pageSize"] = 20;

$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatadbo_Mobile_Users[".strOrderBy"] = $tstrOrderBy;

$tdatadbo_Mobile_Users[".orderindexes"] = array();

$tdatadbo_Mobile_Users[".sqlHead"] = "SELECT Id,   login,   password,   fullname";
$tdatadbo_Mobile_Users[".sqlFrom"] = "FROM dbo.Mobile_Users";
$tdatadbo_Mobile_Users[".sqlWhereExpr"] = "";
$tdatadbo_Mobile_Users[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatadbo_Mobile_Users[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatadbo_Mobile_Users[".arrGroupsPerPage"] = $arrGPP;

$tableKeysdbo_Mobile_Users = array();
$tableKeysdbo_Mobile_Users[] = "Id";
$tdatadbo_Mobile_Users[".Keys"] = $tableKeysdbo_Mobile_Users;

$tdatadbo_Mobile_Users[".listFields"] = array();
$tdatadbo_Mobile_Users[".listFields"][] = "Id";
$tdatadbo_Mobile_Users[".listFields"][] = "login";
$tdatadbo_Mobile_Users[".listFields"][] = "password";
$tdatadbo_Mobile_Users[".listFields"][] = "fullname";

$tdatadbo_Mobile_Users[".viewFields"] = array();
$tdatadbo_Mobile_Users[".viewFields"][] = "Id";
$tdatadbo_Mobile_Users[".viewFields"][] = "login";
$tdatadbo_Mobile_Users[".viewFields"][] = "password";
$tdatadbo_Mobile_Users[".viewFields"][] = "fullname";

$tdatadbo_Mobile_Users[".addFields"] = array();
$tdatadbo_Mobile_Users[".addFields"][] = "login";
$tdatadbo_Mobile_Users[".addFields"][] = "password";
$tdatadbo_Mobile_Users[".addFields"][] = "fullname";

$tdatadbo_Mobile_Users[".inlineAddFields"] = array();
$tdatadbo_Mobile_Users[".inlineAddFields"][] = "login";
$tdatadbo_Mobile_Users[".inlineAddFields"][] = "password";
$tdatadbo_Mobile_Users[".inlineAddFields"][] = "fullname";

$tdatadbo_Mobile_Users[".editFields"] = array();
$tdatadbo_Mobile_Users[".editFields"][] = "login";
$tdatadbo_Mobile_Users[".editFields"][] = "password";
$tdatadbo_Mobile_Users[".editFields"][] = "fullname";

$tdatadbo_Mobile_Users[".inlineEditFields"] = array();
$tdatadbo_Mobile_Users[".inlineEditFields"][] = "login";
$tdatadbo_Mobile_Users[".inlineEditFields"][] = "password";
$tdatadbo_Mobile_Users[".inlineEditFields"][] = "fullname";

$tdatadbo_Mobile_Users[".exportFields"] = array();
$tdatadbo_Mobile_Users[".exportFields"][] = "Id";
$tdatadbo_Mobile_Users[".exportFields"][] = "login";
$tdatadbo_Mobile_Users[".exportFields"][] = "password";
$tdatadbo_Mobile_Users[".exportFields"][] = "fullname";

$tdatadbo_Mobile_Users[".printFields"] = array();
$tdatadbo_Mobile_Users[".printFields"][] = "Id";
$tdatadbo_Mobile_Users[".printFields"][] = "login";
$tdatadbo_Mobile_Users[".printFields"][] = "password";
$tdatadbo_Mobile_Users[".printFields"][] = "fullname";

//	Id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "Id";
	$fdata["GoodName"] = "Id";
	$fdata["ownerTable"] = "dbo.Mobile_Users";
	$fdata["Label"] = "Id"; 
	$fdata["FieldType"] = 3;
	
		$fdata["AutoInc"] = true;
	
		
		$fdata["bListPage"] = true; 
	
		
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "Id"; 
		$fdata["FullName"] = "Id";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
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
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatadbo_Mobile_Users["Id"] = $fdata;
//	login
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "login";
	$fdata["GoodName"] = "login";
	$fdata["ownerTable"] = "dbo.Mobile_Users";
	$fdata["Label"] = "Login"; 
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
	
		$fdata["strField"] = "login"; 
		$fdata["FullName"] = "login";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatadbo_Mobile_Users["login"] = $fdata;
//	password
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "password";
	$fdata["GoodName"] = "password";
	$fdata["ownerTable"] = "dbo.Mobile_Users";
	$fdata["Label"] = "Password"; 
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
	
		$fdata["strField"] = "password"; 
		$fdata["FullName"] = "password";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatadbo_Mobile_Users["password"] = $fdata;
//	fullname
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "fullname";
	$fdata["GoodName"] = "fullname";
	$fdata["ownerTable"] = "dbo.Mobile_Users";
	$fdata["Label"] = "Fullname"; 
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
	
		$fdata["strField"] = "fullname"; 
		$fdata["FullName"] = "fullname";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
			
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
		
		
	
//	Begin Lookup settings
	//	End Lookup Settings

		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=50";
	
		
//	Begin validation
	$edata["validateAs"] = array();
		
	//	End validation
	
		
				
		$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
		$fdata["isSeparate"] = false;
	
		
		
	$tdatadbo_Mobile_Users["fullname"] = $fdata;

	
$tables_data["dbo.Mobile_Users"]=&$tdatadbo_Mobile_Users;
$field_labels["dbo_Mobile_Users"] = &$fieldLabelsdbo_Mobile_Users;
$fieldToolTips["dbo.Mobile_Users"] = &$fieldToolTipsdbo_Mobile_Users;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["dbo.Mobile_Users"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["dbo.Mobile_Users"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_dbo_Mobile_Users()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "Id,   login,   password,   fullname";
$proto0["m_strFrom"] = "FROM dbo.Mobile_Users";
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
	"m_strName" => "Id",
	"m_strTable" => "dbo.Mobile_Users"
));

$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "login",
	"m_strTable" => "dbo.Mobile_Users"
));

$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "password",
	"m_strTable" => "dbo.Mobile_Users"
));

$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "fullname",
	"m_strTable" => "dbo.Mobile_Users"
));

$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto13=array();
$proto13["m_link"] = "SQLL_MAIN";
			$proto14=array();
$proto14["m_strName"] = "dbo.Mobile_Users";
$proto14["m_columns"] = array();
$proto14["m_columns"][] = "Id";
$proto14["m_columns"][] = "login";
$proto14["m_columns"][] = "password";
$proto14["m_columns"][] = "fullname";
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
$queryData_dbo_Mobile_Users = createSqlQuery_dbo_Mobile_Users();
				$tdatadbo_Mobile_Users[".sqlquery"] = $queryData_dbo_Mobile_Users;
	
if(isset($tdatadbo_Mobile_Users["field2"])){
	$tdatadbo_Mobile_Users["field2"]["LookupTable"] = "carscars_view";
	$tdatadbo_Mobile_Users["field2"]["LookupOrderBy"] = "name";
	$tdatadbo_Mobile_Users["field2"]["LookupType"] = 4;
	$tdatadbo_Mobile_Users["field2"]["LinkField"] = "email";
	$tdatadbo_Mobile_Users["field2"]["DisplayField"] = "name";
	$tdatadbo_Mobile_Users[".hasCustomViewField"] = true;
}

$tableEvents["dbo.Mobile_Users"] = new eventsBase;
$tdatadbo_Mobile_Users[".hasEvents"] = false;

$cipherer = new RunnerCipherer("dbo.Mobile_Users");

?>