<?php
// Definicao do campo e valor
   $sField   = $_GET['field'];
   $sValue   = $_GET['value'];
   $sInter   = $_GET['inter'];
   $sWeekIni = $_GET['week_ini'];
// Definicao da data
   $iDay   = date('j');
   $iMonth = date('n');
   $iYear  = date('Y');
   if ('dates' == $sField)
   {
       $this->nm_data->SetaData($sValue, 'ddmmaaaa');
       $iDay   = ($this->nm_data->FormataSaida('j') > 0 && $this->nm_data->FormataSaida('j') < 32) ? $this->nm_data->FormataSaida('j') : $iDay;
       $iMonth = ($this->nm_data->FormataSaida('n') > 0 && $this->nm_data->FormataSaida('n') < 13) ? $this->nm_data->FormataSaida('n') : $iMonth;
       $iYear  = (is_numeric($this->nm_data->FormataSaida('Y')) && $this->nm_data->FormataSaida('Y') > 0) ? $this->nm_data->FormataSaida('Y') : $iYear;
   }
   if ('' == $sInter || 1 > $sInter)
   {
      $sInter = 10;
   }
   $aDays   = array($this->Ini->Nm_lang['lang_shrt_days_sund'], $this->Ini->Nm_lang['lang_shrt_days_mond'], $this->Ini->Nm_lang['lang_shrt_days_tued'], $this->Ini->Nm_lang['lang_shrt_days_wend'], $this->Ini->Nm_lang['lang_shrt_days_thud'], $this->Ini->Nm_lang['lang_shrt_days_frid'], $this->Ini->Nm_lang['lang_shrt_days_satd']);
   $aMonths = array($this->Ini->Nm_lang['lang_mnth_janu'], $this->Ini->Nm_lang['lang_mnth_febr'], $this->Ini->Nm_lang['lang_mnth_marc'], $this->Ini->Nm_lang['lang_mnth_apri'], $this->Ini->Nm_lang['lang_mnth_mayy'], $this->Ini->Nm_lang['lang_mnth_june'], $this->Ini->Nm_lang['lang_mnth_july'], $this->Ini->Nm_lang['lang_mnth_augu'], $this->Ini->Nm_lang['lang_mnth_sept'], $this->Ini->Nm_lang['lang_mnth_octo'], $this->Ini->Nm_lang['lang_mnth_nove'], $this->Ini->Nm_lang['lang_mnth_dece']);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
 <head>
  <title><?php echo $this->Ini->Nm_lang['lang_btns_cldr_hint'] ?></title>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_calendar.css" />
  <script type="text/javascript">
   var sCalIcoBack  = "<?php echo $this->Ini->path_icones . '/' . $this->Ini->Cal_ico_back; ?>";
   var sCalIcoFor   = "<?php echo $this->Ini->path_icones . '/' . $this->Ini->Cal_ico_for; ?>";
   var sCalIcoClose = "<?php echo $this->Ini->path_icones . '/' . $this->Ini->Cal_ico_close; ?>";
   var aDayName   = new Array("<?php echo implode('", "', $aDays) ?>");
   var aMonthName = new Array("<?php echo implode('", "', $aMonths) ?>");
   var fCallBack  = parent && parent.$ ? parent.calendar_<?php echo $sField; ?>_callback : opener.calendar_<?php echo $sField; ?>_callback;
  </script>
  <script type="text/javascript" src="<?php echo $this->Ini->path_js; ?>/calendar.js"></script>
  <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></script>
 </head>
 <body class="scCalendarPage">
 <table style="border-collapse: collapse; border-width: 0px" align="center"><tr><td style="padding: 0px">
  <div id="idCalendar">
   <script type="text/javascript">
    oCal = new nmCalendar(<?php echo $iDay; ?>, <?php echo $iMonth; ?>, <?php echo $iYear; ?>, '<?php echo $this->Ini->path_img_global; ?>', <?php echo $sInter; ?>, '<?php echo $sWeekIni; ?>');
   </script>
  </div>
 </td></tr></table>
 </body>
</html>
