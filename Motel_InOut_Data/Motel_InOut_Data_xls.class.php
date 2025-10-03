<?php

class Motel_InOut_Data_xls
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
   function Motel_InOut_Data_xls()
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
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "Motel_InOut_Data.php"; 
      set_include_path(get_include_path() . PATH_SEPARATOR . $this->Ini->path_third . '/phpexcel/');
      require_once $this->Ini->path_third . '/phpexcel/PHPExcel.php';
      require_once $this->Ini->path_third . '/phpexcel/PHPExcel/IOFactory.php';
      $this->xls_col    = 0;
      $this->nm_data    = new nm_data("en_us");
      $this->arquivo    = "sc_xls";
      $this->arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->arquivo   .= "_Motel_InOut_Data";
      $this->arquivo   .= ".xls";
      $this->tit_doc    = "Motel_InOut_Data.xls";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['Motel_InOut_Data']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['Motel_InOut_Data']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['Motel_InOut_Data']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['campos_busca']))
      { 
          $this->date = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['campos_busca']['date']; 
          $tmp_pos = strpos($this->date, "##@@");
          if ($tmp_pos !== false)
          {
              $this->date = substr($this->date, 0, $tmp_pos);
          }
          $this->date_2 = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['campos_busca']['date_input_2']; 
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $_SESSION['scriptcase']['Motel_InOut_Data']['contr_erro'] = 'on';
 
     $nm_select = "inout"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
$_SESSION['scriptcase']['Motel_InOut_Data']['contr_erro'] = 'off'; 
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['xls_name']))
      {
          $this->arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['xls_name'];
          $this->tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['xls_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['xls_name']);
          $this->xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo;
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT date, [1] + N' - ' + [2] as sc_field_0, [3] + N' - ' + [4] as sc_field_1, [5] + N' - ' + [6] as sc_field_2, [6] + N' - ' + [7] as sc_field_3, [7] + N' - ' + [8] as sc_field_4, [9] + N' - ' + [10] as sc_field_5, [10] + N' - ' + [11] as sc_field_6, [11] + N' - ' + [12] as sc_field_7, [13] + N' - ' + [14] as sc_field_8, [15] + N' - ' + [16] as sc_field_9, [16] + N' - ' + [17] as sc_field_10, [18] + N' - ' + [19] as sc_field_11, [20] + N' - ' + [21] as sc_field_12, [22] + N' - ' + [23] as sc_field_13, [24] + N' - ' + [25] as sc_field_14, [26] + N' - ' + [27] as sc_field_15, [28] + N' - ' + [29] as sc_field_16, [30] + N' - ' + [31] as sc_field_17, [31] + N' - ' + [32] as sc_field_18, [33] + N' - ' + [34] as sc_field_19, [35] + N' - ' + [36] as sc_field_20, [37] + N' - ' + [38] as sc_field_21, [38] + N' - ' + [39] as sc_field_22, [40] + N' - ' + [41] as sc_field_23 from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT date, [1] + N' - ' + [2] as sc_field_0, [3] + N' - ' + [4] as sc_field_1, [5] + N' - ' + [6] as sc_field_2, [6] + N' - ' + [7] as sc_field_3, [7] + N' - ' + [8] as sc_field_4, [9] + N' - ' + [10] as sc_field_5, [10] + N' - ' + [11] as sc_field_6, [11] + N' - ' + [12] as sc_field_7, [13] + N' - ' + [14] as sc_field_8, [15] + N' - ' + [16] as sc_field_9, [16] + N' - ' + [17] as sc_field_10, [18] + N' - ' + [19] as sc_field_11, [20] + N' - ' + [21] as sc_field_12, [22] + N' - ' + [23] as sc_field_13, [24] + N' - ' + [25] as sc_field_14, [26] + N' - ' + [27] as sc_field_15, [28] + N' - ' + [29] as sc_field_16, [30] + N' - ' + [31] as sc_field_17, [31] + N' - ' + [32] as sc_field_18, [33] + N' - ' + [34] as sc_field_19, [35] + N' - ' + [36] as sc_field_20, [37] + N' - ' + [38] as sc_field_21, [38] + N' - ' + [39] as sc_field_22, [40] + N' - ' + [41] as sc_field_23 from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT date, [1] + N' - ' + [2] as sc_field_0, [3] + N' - ' + [4] as sc_field_1, [5] + N' - ' + [6] as sc_field_2, [6] + N' - ' + [7] as sc_field_3, [7] + N' - ' + [8] as sc_field_4, [9] + N' - ' + [10] as sc_field_5, [10] + N' - ' + [11] as sc_field_6, [11] + N' - ' + [12] as sc_field_7, [13] + N' - ' + [14] as sc_field_8, [15] + N' - ' + [16] as sc_field_9, [16] + N' - ' + [17] as sc_field_10, [18] + N' - ' + [19] as sc_field_11, [20] + N' - ' + [21] as sc_field_12, [22] + N' - ' + [23] as sc_field_13, [24] + N' - ' + [25] as sc_field_14, [26] + N' - ' + [27] as sc_field_15, [28] + N' - ' + [29] as sc_field_16, [30] + N' - ' + [31] as sc_field_17, [31] + N' - ' + [32] as sc_field_18, [33] + N' - ' + [34] as sc_field_19, [35] + N' - ' + [36] as sc_field_20, [37] + N' - ' + [38] as sc_field_21, [38] + N' - ' + [39] as sc_field_22, [40] + N' - ' + [41] as sc_field_23 from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT date, [1] + N' - ' + [2] as sc_field_0, [3] + N' - ' + [4] as sc_field_1, [5] + N' - ' + [6] as sc_field_2, [6] + N' - ' + [7] as sc_field_3, [7] + N' - ' + [8] as sc_field_4, [9] + N' - ' + [10] as sc_field_5, [10] + N' - ' + [11] as sc_field_6, [11] + N' - ' + [12] as sc_field_7, [13] + N' - ' + [14] as sc_field_8, [15] + N' - ' + [16] as sc_field_9, [16] + N' - ' + [17] as sc_field_10, [18] + N' - ' + [19] as sc_field_11, [20] + N' - ' + [21] as sc_field_12, [22] + N' - ' + [23] as sc_field_13, [24] + N' - ' + [25] as sc_field_14, [26] + N' - ' + [27] as sc_field_15, [28] + N' - ' + [29] as sc_field_16, [30] + N' - ' + [31] as sc_field_17, [31] + N' - ' + [32] as sc_field_18, [33] + N' - ' + [34] as sc_field_19, [35] + N' - ' + [36] as sc_field_20, [37] + N' - ' + [38] as sc_field_21, [38] + N' - ' + [39] as sc_field_22, [40] + N' - ' + [41] as sc_field_23 from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT date, [1] + N' - ' + [2] as sc_field_0, [3] + N' - ' + [4] as sc_field_1, [5] + N' - ' + [6] as sc_field_2, [6] + N' - ' + [7] as sc_field_3, [7] + N' - ' + [8] as sc_field_4, [9] + N' - ' + [10] as sc_field_5, [10] + N' - ' + [11] as sc_field_6, [11] + N' - ' + [12] as sc_field_7, [13] + N' - ' + [14] as sc_field_8, [15] + N' - ' + [16] as sc_field_9, [16] + N' - ' + [17] as sc_field_10, [18] + N' - ' + [19] as sc_field_11, [20] + N' - ' + [21] as sc_field_12, [22] + N' - ' + [23] as sc_field_13, [24] + N' - ' + [25] as sc_field_14, [26] + N' - ' + [27] as sc_field_15, [28] + N' - ' + [29] as sc_field_16, [30] + N' - ' + [31] as sc_field_17, [31] + N' - ' + [32] as sc_field_18, [33] + N' - ' + [34] as sc_field_19, [35] + N' - ' + [36] as sc_field_20, [37] + N' - ' + [38] as sc_field_21, [38] + N' - ' + [39] as sc_field_22, [40] + N' - ' + [41] as sc_field_23 from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT date, [1] + N' - ' + [2] as sc_field_0, [3] + N' - ' + [4] as sc_field_1, [5] + N' - ' + [6] as sc_field_2, [6] + N' - ' + [7] as sc_field_3, [7] + N' - ' + [8] as sc_field_4, [9] + N' - ' + [10] as sc_field_5, [10] + N' - ' + [11] as sc_field_6, [11] + N' - ' + [12] as sc_field_7, [13] + N' - ' + [14] as sc_field_8, [15] + N' - ' + [16] as sc_field_9, [16] + N' - ' + [17] as sc_field_10, [18] + N' - ' + [19] as sc_field_11, [20] + N' - ' + [21] as sc_field_12, [22] + N' - ' + [23] as sc_field_13, [24] + N' - ' + [25] as sc_field_14, [26] + N' - ' + [27] as sc_field_15, [28] + N' - ' + [29] as sc_field_16, [30] + N' - ' + [31] as sc_field_17, [31] + N' - ' + [32] as sc_field_18, [33] + N' - ' + [34] as sc_field_19, [35] + N' - ' + [36] as sc_field_20, [37] + N' - ' + [38] as sc_field_21, [38] + N' - ' + [39] as sc_field_22, [40] + N' - ' + [41] as sc_field_23 from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }

      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['date'])) ? $this->New_label['date'] : "Date"; 
          if ($Cada_col == "date" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['sc_field_0'])) ? $this->New_label['sc_field_0'] : "07-08 Am"; 
          if ($Cada_col == "sc_field_0" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['sc_field_1'])) ? $this->New_label['sc_field_1'] : "08-09 Am"; 
          if ($Cada_col == "sc_field_1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['sc_field_2'])) ? $this->New_label['sc_field_2'] : "09-10 Am"; 
          if ($Cada_col == "sc_field_2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['sc_field_3'])) ? $this->New_label['sc_field_3'] : "10-11 Am"; 
          if ($Cada_col == "sc_field_3" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['sc_field_4'])) ? $this->New_label['sc_field_4'] : "11-12 Am"; 
          if ($Cada_col == "sc_field_4" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['sc_field_5'])) ? $this->New_label['sc_field_5'] : "12-01 Pm"; 
          if ($Cada_col == "sc_field_5" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['sc_field_6'])) ? $this->New_label['sc_field_6'] : "01-02 Pm"; 
          if ($Cada_col == "sc_field_6" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['sc_field_7'])) ? $this->New_label['sc_field_7'] : "02-03 Pm"; 
          if ($Cada_col == "sc_field_7" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['sc_field_8'])) ? $this->New_label['sc_field_8'] : "03-04 Pm"; 
          if ($Cada_col == "sc_field_8" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['sc_field_9'])) ? $this->New_label['sc_field_9'] : "04-05 Pm"; 
          if ($Cada_col == "sc_field_9" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['sc_field_10'])) ? $this->New_label['sc_field_10'] : "05-06 Pm"; 
          if ($Cada_col == "sc_field_10" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['sc_field_11'])) ? $this->New_label['sc_field_11'] : "06-07 Pm"; 
          if ($Cada_col == "sc_field_11" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['sc_field_12'])) ? $this->New_label['sc_field_12'] : "07-08 Pm"; 
          if ($Cada_col == "sc_field_12" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['sc_field_13'])) ? $this->New_label['sc_field_13'] : "08-09 Pm"; 
          if ($Cada_col == "sc_field_13" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['sc_field_14'])) ? $this->New_label['sc_field_14'] : "09-10 Pm"; 
          if ($Cada_col == "sc_field_14" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['sc_field_15'])) ? $this->New_label['sc_field_15'] : "10-11 Pm"; 
          if ($Cada_col == "sc_field_15" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['sc_field_16'])) ? $this->New_label['sc_field_16'] : "11-12 Pm"; 
          if ($Cada_col == "sc_field_16" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['sc_field_17'])) ? $this->New_label['sc_field_17'] : "12-01 Am"; 
          if ($Cada_col == "sc_field_17" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['sc_field_18'])) ? $this->New_label['sc_field_18'] : "01-02 Am"; 
          if ($Cada_col == "sc_field_18" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['sc_field_19'])) ? $this->New_label['sc_field_19'] : "02-03 Am"; 
          if ($Cada_col == "sc_field_19" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['sc_field_20'])) ? $this->New_label['sc_field_20'] : "03-04 Am"; 
          if ($Cada_col == "sc_field_20" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['sc_field_21'])) ? $this->New_label['sc_field_21'] : "04-05 Am"; 
          if ($Cada_col == "sc_field_21" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['sc_field_22'])) ? $this->New_label['sc_field_22'] : "05-06 Am"; 
          if ($Cada_col == "sc_field_22" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['sc_field_23'])) ? $this->New_label['sc_field_23'] : "06-07 Am"; 
          if ($Cada_col == "sc_field_23" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->xls_col++;
          }
      } 
      while (!$rs->EOF)
      {
         $this->xls_col = 0;
         $this->xls_row++;
         $this->date = $rs->fields[0] ;  
         $this->sc_field_0 = $rs->fields[1] ;  
         $this->sc_field_1 = $rs->fields[2] ;  
         $this->sc_field_2 = $rs->fields[3] ;  
         $this->sc_field_3 = $rs->fields[4] ;  
         $this->sc_field_4 = $rs->fields[5] ;  
         $this->sc_field_5 = $rs->fields[6] ;  
         $this->sc_field_6 = $rs->fields[7] ;  
         $this->sc_field_7 = $rs->fields[8] ;  
         $this->sc_field_8 = $rs->fields[9] ;  
         $this->sc_field_9 = $rs->fields[10] ;  
         $this->sc_field_10 = $rs->fields[11] ;  
         $this->sc_field_11 = $rs->fields[12] ;  
         $this->sc_field_12 = $rs->fields[13] ;  
         $this->sc_field_13 = $rs->fields[14] ;  
         $this->sc_field_14 = $rs->fields[15] ;  
         $this->sc_field_15 = $rs->fields[16] ;  
         $this->sc_field_16 = $rs->fields[17] ;  
         $this->sc_field_17 = $rs->fields[18] ;  
         $this->sc_field_18 = $rs->fields[19] ;  
         $this->sc_field_19 = $rs->fields[20] ;  
         $this->sc_field_20 = $rs->fields[21] ;  
         $this->sc_field_21 = $rs->fields[22] ;  
         $this->sc_field_22 = $rs->fields[23] ;  
         $this->sc_field_23 = $rs->fields[24] ;  
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['Motel_InOut_Data']['contr_erro'] = 'on';
 $this->date  = $this->nm_conv_data_db($this->date , "db_format", "mm/dd/aaaa");
$_SESSION['scriptcase']['Motel_InOut_Data']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['field_order'] as $Cada_col)
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
   //----- date
   function NM_export_date()
   {
         $conteudo_x =  $this->date;
         nm_conv_limpa_dado($conteudo_x, "");
         if (is_numeric($conteudo_x) && $conteudo_x > 0) 
         { 
             $this->nm_data->SetaData($this->date, "");
             $this->date = $this->nm_data->FormataSaida("");
         } 
         if (!NM_is_utf8($this->date))
         {
             $this->date = mb_convert_encoding($this->date, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->date);
         $this->xls_col++;
   }
   //----- sc_field_0
   function NM_export_sc_field_0()
   {
         if (!NM_is_utf8($this->sc_field_0))
         {
             $this->sc_field_0 = mb_convert_encoding($this->sc_field_0, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->sc_field_0);
         $this->xls_col++;
   }
   //----- sc_field_1
   function NM_export_sc_field_1()
   {
         if (!NM_is_utf8($this->sc_field_1))
         {
             $this->sc_field_1 = mb_convert_encoding($this->sc_field_1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->sc_field_1);
         $this->xls_col++;
   }
   //----- sc_field_2
   function NM_export_sc_field_2()
   {
         if (!NM_is_utf8($this->sc_field_2))
         {
             $this->sc_field_2 = mb_convert_encoding($this->sc_field_2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->sc_field_2);
         $this->xls_col++;
   }
   //----- sc_field_3
   function NM_export_sc_field_3()
   {
         if (!NM_is_utf8($this->sc_field_3))
         {
             $this->sc_field_3 = mb_convert_encoding($this->sc_field_3, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->sc_field_3);
         $this->xls_col++;
   }
   //----- sc_field_4
   function NM_export_sc_field_4()
   {
         if (!NM_is_utf8($this->sc_field_4))
         {
             $this->sc_field_4 = mb_convert_encoding($this->sc_field_4, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->sc_field_4);
         $this->xls_col++;
   }
   //----- sc_field_5
   function NM_export_sc_field_5()
   {
         if (!NM_is_utf8($this->sc_field_5))
         {
             $this->sc_field_5 = mb_convert_encoding($this->sc_field_5, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->sc_field_5);
         $this->xls_col++;
   }
   //----- sc_field_6
   function NM_export_sc_field_6()
   {
         if (!NM_is_utf8($this->sc_field_6))
         {
             $this->sc_field_6 = mb_convert_encoding($this->sc_field_6, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->sc_field_6);
         $this->xls_col++;
   }
   //----- sc_field_7
   function NM_export_sc_field_7()
   {
         if (!NM_is_utf8($this->sc_field_7))
         {
             $this->sc_field_7 = mb_convert_encoding($this->sc_field_7, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->sc_field_7);
         $this->xls_col++;
   }
   //----- sc_field_8
   function NM_export_sc_field_8()
   {
         if (!NM_is_utf8($this->sc_field_8))
         {
             $this->sc_field_8 = mb_convert_encoding($this->sc_field_8, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->sc_field_8);
         $this->xls_col++;
   }
   //----- sc_field_9
   function NM_export_sc_field_9()
   {
         if (!NM_is_utf8($this->sc_field_9))
         {
             $this->sc_field_9 = mb_convert_encoding($this->sc_field_9, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->sc_field_9);
         $this->xls_col++;
   }
   //----- sc_field_10
   function NM_export_sc_field_10()
   {
         if (!NM_is_utf8($this->sc_field_10))
         {
             $this->sc_field_10 = mb_convert_encoding($this->sc_field_10, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->sc_field_10);
         $this->xls_col++;
   }
   //----- sc_field_11
   function NM_export_sc_field_11()
   {
         if (!NM_is_utf8($this->sc_field_11))
         {
             $this->sc_field_11 = mb_convert_encoding($this->sc_field_11, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->sc_field_11);
         $this->xls_col++;
   }
   //----- sc_field_12
   function NM_export_sc_field_12()
   {
         if (!NM_is_utf8($this->sc_field_12))
         {
             $this->sc_field_12 = mb_convert_encoding($this->sc_field_12, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->sc_field_12);
         $this->xls_col++;
   }
   //----- sc_field_13
   function NM_export_sc_field_13()
   {
         if (!NM_is_utf8($this->sc_field_13))
         {
             $this->sc_field_13 = mb_convert_encoding($this->sc_field_13, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->sc_field_13);
         $this->xls_col++;
   }
   //----- sc_field_14
   function NM_export_sc_field_14()
   {
         if (!NM_is_utf8($this->sc_field_14))
         {
             $this->sc_field_14 = mb_convert_encoding($this->sc_field_14, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->sc_field_14);
         $this->xls_col++;
   }
   //----- sc_field_15
   function NM_export_sc_field_15()
   {
         if (!NM_is_utf8($this->sc_field_15))
         {
             $this->sc_field_15 = mb_convert_encoding($this->sc_field_15, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->sc_field_15);
         $this->xls_col++;
   }
   //----- sc_field_16
   function NM_export_sc_field_16()
   {
         if (!NM_is_utf8($this->sc_field_16))
         {
             $this->sc_field_16 = mb_convert_encoding($this->sc_field_16, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->sc_field_16);
         $this->xls_col++;
   }
   //----- sc_field_17
   function NM_export_sc_field_17()
   {
         if (!NM_is_utf8($this->sc_field_17))
         {
             $this->sc_field_17 = mb_convert_encoding($this->sc_field_17, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->sc_field_17);
         $this->xls_col++;
   }
   //----- sc_field_18
   function NM_export_sc_field_18()
   {
         if (!NM_is_utf8($this->sc_field_18))
         {
             $this->sc_field_18 = mb_convert_encoding($this->sc_field_18, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->sc_field_18);
         $this->xls_col++;
   }
   //----- sc_field_19
   function NM_export_sc_field_19()
   {
         if (!NM_is_utf8($this->sc_field_19))
         {
             $this->sc_field_19 = mb_convert_encoding($this->sc_field_19, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->sc_field_19);
         $this->xls_col++;
   }
   //----- sc_field_20
   function NM_export_sc_field_20()
   {
         if (!NM_is_utf8($this->sc_field_20))
         {
             $this->sc_field_20 = mb_convert_encoding($this->sc_field_20, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->sc_field_20);
         $this->xls_col++;
   }
   //----- sc_field_21
   function NM_export_sc_field_21()
   {
         if (!NM_is_utf8($this->sc_field_21))
         {
             $this->sc_field_21 = mb_convert_encoding($this->sc_field_21, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->sc_field_21);
         $this->xls_col++;
   }
   //----- sc_field_22
   function NM_export_sc_field_22()
   {
         if (!NM_is_utf8($this->sc_field_22))
         {
             $this->sc_field_22 = mb_convert_encoding($this->sc_field_22, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->sc_field_22);
         $this->xls_col++;
   }
   //----- sc_field_23
   function NM_export_sc_field_23()
   {
         if (!NM_is_utf8($this->sc_field_23))
         {
             $this->sc_field_23 = mb_convert_encoding($this->sc_field_23, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->xls_dados->getActiveSheet()->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->xls_dados->getActiveSheet()->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->sc_field_23);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['xls_file']);
      if (is_file($this->xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['xls_file'] = $this->xls_f;
      }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Motel In Out Data :: Excel</TITLE>
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
<form name="Fdown" method="get" action="Motel_InOut_Data_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="nm_tit_doc" value="<?php echo NM_encode_input($this->tit_doc); ?>"> 
<input type="hidden" name="nm_name_doc" value="<?php echo NM_encode_input($this->Ini->path_imag_temp . "/" . $this->arquivo) ?>"> 
</form>
<FORM name="F0" method=post action="Motel_InOut_Data.php"> 
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
