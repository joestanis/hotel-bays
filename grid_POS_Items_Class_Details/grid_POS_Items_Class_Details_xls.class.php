<?php

class grid_POS_Items_Class_Details_xls
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $xls_dados;
   var $xls_workbook;
   var $xls_col;
   var $xls_row;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();
   var $arquivo;
   var $tit_doc;
   //---- 
   function grid_POS_Items_Class_Details_xls()
   {
   }

   //---- 
   function monta_xls()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      $this->monta_html();
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $this->xls_row = 1;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "grid_POS_Items_Class_Details.php"; 
      set_include_path(get_include_path() . PATH_SEPARATOR . $this->Ini->path_third . '/phpexcel/');
      require_once $this->Ini->path_third . '/phpexcel/PHPExcel.php';
      require_once $this->Ini->path_third . '/phpexcel/PHPExcel/IOFactory.php';
      $this->xls_col    = 0;
      $this->nm_data    = new nm_data("en_us");
      $this->arquivo    = "sc_xls";
      $this->arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->arquivo   .= "_grid_POS_Items_Class_Details";
      $this->arquivo   .= ".xls";
      $this->tit_doc    = "grid_POS_Items_Class_Details.xls";
      $this->xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo;
      $this->xls_dados = new PHPExcel();
      $this->xls_dados->setActiveSheetIndex(0);
   }

   //----- 
   function grava_arquivo()
   {
      global $nm_lang;
      global
             $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_POS_Items_Class_Details']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_POS_Items_Class_Details']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_POS_Items_Class_Details']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_POS_Items_Class_Details']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_POS_Items_Class_Details']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_POS_Items_Class_Details']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_POS_Items_Class_Details']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_POS_Items_Class_Details']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_POS_Items_Class_Details']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_POS_Items_Class_Details']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_POS_Items_Class_Details']['campos_busca']))
      { 
          $this->upc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_POS_Items_Class_Details']['campos_busca']['upc']; 
          $tmp_pos = strpos($this->upc, "##@@");
          if ($tmp_pos !== false)
          {
              $this->upc = substr($this->upc, 0, $tmp_pos);
          }
          $this->items = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_POS_Items_Class_Details']['campos_busca']['items']; 
          $tmp_pos = strpos($this->items, "##@@");
          if ($tmp_pos !== false)
          {
              $this->items = substr($this->items, 0, $tmp_pos);
          }
          $this->prices = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_POS_Items_Class_Details']['campos_busca']['prices']; 
          $tmp_pos = strpos($this->prices, "##@@");
          if ($tmp_pos !== false)
          {
              $this->prices = substr($this->prices, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_POS_Items_Class_Details']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_POS_Items_Class_Details']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_POS_Items_Class_Details']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_POS_Items_Class_Details']['xls_name']))
      {
          $this->arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_POS_Items_Class_Details']['xls_name'];
          $this->tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_POS_Items_Class_Details']['xls_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_POS_Items_Class_Details']['xls_name']);
          $this->xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo;
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT Items, Prices, ID from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT Items, Prices, ID from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT Items, Prices, ID from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT Items, Prices, ID from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT Items, Prices, ID from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT Items, Prices, ID from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_POS_Items_Class_Details']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_POS_Items_Class_Details']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->New_label['items'] = "" . $this->Ini->Nm_lang['lang_dbo_POS_Items_Class_Details_fld_Items'] . "";
      $this->New_label['prices'] = "" . $this->Ini->Nm_lang['lang_dbo_POS_Items_Class_Details_fld_Prices'] . "";
      $this->New_label['id'] = "" . $this->Ini->Nm_lang['lang_dbo_POS_Items_Class_Details_fld_ID'] . "";
      $this->New_label['upc'] = "" . $this->Ini->Nm_lang['lang_dbo_POS_Items_Class_Details_fld_UPC'] . "";
      $this->New_label['list_price'] = "" . $this->Ini->Nm_lang['lang_dbo_POS_Items_Class_Details_fld_List_Price'] . "";
      $this->New_label['start_with'] = "" . $this->Ini->Nm_lang['lang_dbo_POS_Items_Class_Details_fld_Start_With'] . "";
      $this->New_label['additional'] = "" . $this->Ini->Nm_lang['lang_dbo_POS_Items_Class_Details_fld_Additional'] . "";
      $this->New_label['on_hand'] = "" . $this->Ini->Nm_lang['lang_dbo_POS_Items_Class_Details_fld_On_Hand'] . "";
      $this->New_label['minimum'] = "" . $this->Ini->Nm_lang['lang_dbo_POS_Items_Class_Details_fld_Minimum'] . "";
      $this->New_label['link_id'] = "" . $this->Ini->Nm_lang['lang_dbo_POS_Items_Class_Details_fld_link_id'] . "";
      $this->New_label['tax1'] = "" . $this->Ini->Nm_lang['lang_dbo_POS_Items_Class_Details_fld_Tax1'] . "";
      $this->New_label['tax2'] = "" . $this->Ini->Nm_lang['lang_dbo_POS_Items_Class_Details_fld_Tax2'] . "";
      $this->New_label['tax3'] = "" . $this->Ini->Nm_lang['lang_dbo_POS_Items_Class_Details_fld_Tax3'] . "";

      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_POS_Items_Class_Details']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['items'])) ? $this->New_label['items'] : ""; 
          if ($Cada_col == "items" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['prices'])) ? $this->New_label['prices'] : ""; 
          if ($Cada_col == "prices" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
              $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->xls_col++;
          }
      } 
      while (!$rs->EOF)
      {
         $this->xls_col = 0;
         $this->xls_row++;
         $this->items = $rs->fields[0] ;  
         $this->prices = $rs->fields[1] ;  
         $this->prices =  str_replace(",", ".", $this->prices);
         $this->prices = (strpos(strtolower($this->prices), "e")) ? (float)$this->prices : $this->prices; 
         $this->prices = (string)$this->prices;
         $this->id = $rs->fields[2] ;  
         $this->id = (string)$this->id;
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_POS_Items_Class_Details']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $rs->MoveNext();
      }
      $rs->Close();
      $objWriter = PHPExcel_IOFactory::createWriter($this->xls_dados, 'Excel5');
      $objWriter->save($this->xls_f);
   }
   //----- items
   function NM_export_items()
   {
         if (!NM_is_utf8($this->items))
         {
             $this->items = mb_convert_encoding($this->items, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->items);
         $this->xls_col++;
   }
   //----- prices
   function NM_export_prices()
   {
         if (!NM_is_utf8($this->prices))
         {
             $this->prices = mb_convert_encoding($this->prices, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
         if (is_numeric($this->prices))
         {
             $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getNumberFormat()->setFormatCode('#,##0.0000');
         }
         $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->prices);
         $this->xls_col++;
   }

   function calc_cell($col)
   {
       $arr_alfa = array("","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
       $val_ret = "";
       $result = $col + 1;
       while ($result > 26)
       {
           $cel      = $result % 26;
           $result   = $result / 26;
           if ($cel == 0)
           {
               $cel    = 26;
               $result--;
           }
           $val_ret = $arr_alfa[$cel] . $val_ret;
       }
       $val_ret = $arr_alfa[$result] . $val_ret;
       return $val_ret;
   }

   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out);
       return $dt_out;
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_POS_Items_Class_Details']['xls_file']);
      if (is_file($this->xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_POS_Items_Class_Details']['xls_file'] = $this->xls_f;
      }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>POS Items Class Details :: Excel</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">XLS</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_POS_Items_Class_Details_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="nm_tit_doc" value="<?php echo NM_encode_input($this->tit_doc); ?>"> 
<input type="hidden" name="nm_name_doc" value="<?php echo NM_encode_input($this->Ini->path_imag_temp . "/" . $this->arquivo) ?>"> 
</form>
<FORM name="F0" method=post action="grid_POS_Items_Class_Details.php"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
</FORM> 
</BODY>
</HTML>
<?php
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont2 >= $tam_campo)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
}

?>
