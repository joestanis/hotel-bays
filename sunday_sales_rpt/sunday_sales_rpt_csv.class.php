<?php

class sunday_sales_rpt_csv
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;

   var $arquivo;
   var $tit_doc;
   var $delim_dados;
   var $delim_line;
   var $delim_col;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function sunday_sales_rpt_csv()
   {
      $this->nm_data   = new nm_data("en_us");
   }

   //---- 
   function monta_csv()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      $this->monta_html();
   }

   //----- 
   function inicializa_vars()
   {
     global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "sunday_sales_rpt.php" ; 
      $this->arquivo     = "sc_csv";
      $this->arquivo    .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->arquivo    .= "_sunday_sales_rpt";
      $this->arquivo    .= ".csv";
      $this->tit_doc    = "sunday_sales_rpt.csv";
      $this->delim_dados = "\"";
      $this->delim_col   = ";";
      $this->delim_line  = "\r\n";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['sunday_sales_rpt']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['sunday_sales_rpt']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['sunday_sales_rpt']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['campos_busca']))
      { 
          $this->room = $_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['campos_busca']['room']; 
          $tmp_pos = strpos($this->room, "##@@");
          if ($tmp_pos !== false)
          {
              $this->room = substr($this->room, 0, $tmp_pos);
          }
          $this->time_in = $_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['campos_busca']['time_in']; 
          $tmp_pos = strpos($this->time_in, "##@@");
          if ($tmp_pos !== false)
          {
              $this->time_in = substr($this->time_in, 0, $tmp_pos);
          }
          $this->time_in_2 = $_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['campos_busca']['time_in_input_2']; 
          $this->time_out = $_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['campos_busca']['time_out']; 
          $tmp_pos = strpos($this->time_out, "##@@");
          if ($tmp_pos !== false)
          {
              $this->time_out = substr($this->time_out, 0, $tmp_pos);
          }
          $this->time_out_2 = $_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['campos_busca']['time_out_input_2']; 
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $_SESSION['scriptcase']['sunday_sales_rpt']['contr_erro'] = 'on';
if (!isset($_SESSION['val_4'])) {$_SESSION['val_4'] = "";}
if (!isset($this->sc_temp_val_4)) {$this->sc_temp_val_4 = (isset($_SESSION['val_4'])) ? $_SESSION['val_4'] : "";}
if (!isset($_SESSION['val_3'])) {$_SESSION['val_3'] = "";}
if (!isset($this->sc_temp_val_3)) {$this->sc_temp_val_3 = (isset($_SESSION['val_3'])) ? $_SESSION['val_3'] : "";}
if (!isset($_SESSION['val_2'])) {$_SESSION['val_2'] = "";}
if (!isset($this->sc_temp_val_2)) {$this->sc_temp_val_2 = (isset($_SESSION['val_2'])) ? $_SESSION['val_2'] : "";}
if (!isset($_SESSION['val_1'])) {$_SESSION['val_1'] = "";}
if (!isset($this->sc_temp_val_1)) {$this->sc_temp_val_1 = (isset($_SESSION['val_1'])) ? $_SESSION['val_1'] : "";}
 	
 if (isset($val_1)) {$this->sc_temp_val_1 = $val_1;}
;
 if (isset($val_2)) {$this->sc_temp_val_2 = $val_2;}
;
 if (isset($val_3)) {$this->sc_temp_val_3 = $val_3;}
;
 if (isset($val_4)) {$this->sc_temp_val_4 = $val_4;}
;


$check_sql = "SELECT start_time, end_time"
   . " FROM Motel_StartEnd_Times";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
   $this->sc_temp_val_1 = $start_time  = $this->rs[0][0];
   $this->sc_temp_val_2 = $end_time  = $this->rs[0][1];
}
		else     
{
	$start_time  = '';
    $end_time  = '';
}
$day = date('w');

switch ($day) {

case 1 : 	 
$this->sc_temp_val_3="'".date('Y-m-d', strtotime("-1 days")). " " .$this->sc_temp_val_1."'";
$this->sc_temp_val_4="'".date('Y-m-d'). " " .$this->sc_temp_val_2."'";
break;

case 2 :  
$this->sc_temp_val_3="'".date('Y-m-d', strtotime("-2 days")). " " .$this->sc_temp_val_1."'";
$this->sc_temp_val_4="'".date('Y-m-d', strtotime("-1 days")). " " .$this->sc_temp_val_2."'";
break;

case 3 : 
$this->sc_temp_val_3="'".date('Y-m-d', strtotime("-3 days")). " " .$this->sc_temp_val_1."'";
$this->sc_temp_val_4="'".date('Y-m-d', strtotime("-2 days")). " " .$this->sc_temp_val_2."'";
break;

case 4 : 
$this->sc_temp_val_3="'".date('Y-m-d', strtotime("-4 days")). " " .$this->sc_temp_val_1."'";
$this->sc_temp_val_4="'".date('Y-m-d', strtotime("-3 days")). " " .$this->sc_temp_val_2."'";
break;

case 5 :  
$this->sc_temp_val_3="'".date('Y-m-d', strtotime("-5 days")). " " .$this->sc_temp_val_1."'";
$this->sc_temp_val_4="'".date('Y-m-d', strtotime("-4 days")). " " .$this->sc_temp_val_2."'";
break;
	
}
if (isset($this->sc_temp_val_1)) {$_SESSION['val_1'] = $this->sc_temp_val_1;}
if (isset($this->sc_temp_val_2)) {$_SESSION['val_2'] = $this->sc_temp_val_2;}
if (isset($this->sc_temp_val_3)) {$_SESSION['val_3'] = $this->sc_temp_val_3;}
if (isset($this->sc_temp_val_4)) {$_SESSION['val_4'] = $this->sc_temp_val_4;}
$_SESSION['scriptcase']['sunday_sales_rpt']['contr_erro'] = 'off'; 
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['csv_name']))
      {
          $this->arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['csv_name'];
          $this->tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['csv_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['csv_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT Room, Prices, str_replace (convert(char(10),Time_In,102), '.', '-') + ' ' + convert(char(8),Time_In,20), str_replace (convert(char(10),Time_Out,102), '.', '-') + ' ' + convert(char(8),Time_Out,20), Elapsed, Overtime, Start_Shift, Total, ID from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT Room, Prices, Time_In, Time_Out, Elapsed, Overtime, Start_Shift, Total, ID from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT Room, Prices, convert(char(23),Time_In,121), convert(char(23),Time_Out,121), Elapsed, Overtime, Start_Shift, Total, ID from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT Room, Prices, Time_In, Time_Out, Elapsed, Overtime, Start_Shift, Total, ID from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT Room, Prices, EXTEND(Time_In, YEAR TO FRACTION), EXTEND(Time_Out, YEAR TO FRACTION), Elapsed, Overtime, Start_Shift, Total, ID from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT Room, Prices, Time_In, Time_Out, Elapsed, Overtime, Start_Shift, Total, ID from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      if (!empty($this->Ini->nm_col_dinamica)) 
      {
          foreach ($this->Ini->nm_col_dinamica as $nm_cada_col => $nm_nova_col)
          {
                   $nmgp_select = str_replace($nm_cada_col, $nm_nova_col, $nmgp_select); 
          }
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->New_label['room'] = "" . $this->Ini->Nm_lang['lang_dbo_Motel_Live_Data_Qry_fld_Room'] . "";
      $this->New_label['prices'] = "" . $this->Ini->Nm_lang['lang_dbo_Motel_Live_Data_Qry_fld_Prices'] . "";
      $this->New_label['elapsed'] = "" . $this->Ini->Nm_lang['lang_dbo_Motel_Live_Data_Qry_fld_Elapsed'] . "";
      $this->New_label['overtime'] = "" . $this->Ini->Nm_lang['lang_dbo_Motel_Live_Data_Qry_fld_Overtime'] . "";
      $this->New_label['clean_duration'] = "" . $this->Ini->Nm_lang['lang_dbo_Motel_Live_Data_Qry_fld_Clean_Duration'] . "";

      $csv_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo, "w");
      while (!$rs->EOF)
      {
         $this->csv_registro = "";
         $this->NM_prim_col  = 0;
         $this->room = $rs->fields[0] ;  
         $this->prices = $rs->fields[1] ;  
         $this->prices =  str_replace(",", ".", $this->prices);
         $this->prices = (strpos(strtolower($this->prices), "e")) ? (float)$this->prices : $this->prices; 
         $this->prices = (string)$this->prices;
         $this->time_in = $rs->fields[2] ;  
         $this->time_out = $rs->fields[3] ;  
         $this->elapsed = $rs->fields[4] ;  
         $this->overtime = $rs->fields[5] ;  
         $this->start_shift = $rs->fields[6] ;  
         $this->total = $rs->fields[7] ;  
         $this->total =  str_replace(",", ".", $this->total);
         $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
         $this->total = (string)$this->total;
         $this->id = $rs->fields[8] ;  
         $this->id = (string)$this->id;
         $this->sc_proc_grid = true; 
         //----- lookup - plate
         $this->Lookup->lookup_plate($this->plate, $this->id, $this->array_plate); 
         $this->plate = str_replace("<br>", " ", $this->plate); 
         $this->plate = ($this->plate == "&nbsp;") ? "" : $this->plate; 
         $_SESSION['scriptcase']['sunday_sales_rpt']['contr_erro'] = 'on';
 if ($this->elapsed  >= 8)
$this->flag  = "<img src='../_lib/img/warning.gif'"."' />";
else
$this->flag  = "";


$this->grandtotal  = $this->prices +$this->total ;
	


$_SESSION['scriptcase']['sunday_sales_rpt']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->csv_registro .= $this->delim_line;
         fwrite($csv_f, $this->csv_registro);
         $rs->MoveNext();
      }
      fclose($csv_f);

      $rs->Close();
   }
   //----- room
   function NM_export_room()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->delim_col : "";
      $conteudo = str_replace($this->delim_dados, $this->delim_dados . $this->delim_dados, $this->room);
      $this->csv_registro .= $col_sep . $this->delim_dados . $conteudo . $this->delim_dados;
      $this->NM_prim_col++;
   }
   //----- prices
   function NM_export_prices()
   {
         nmgp_Form_Num_Val($this->prices, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->delim_col : "";
      $conteudo = str_replace($this->delim_dados, $this->delim_dados . $this->delim_dados, $this->prices);
      $this->csv_registro .= $col_sep . $this->delim_dados . $conteudo . $this->delim_dados;
      $this->NM_prim_col++;
   }
   //----- time_in
   function NM_export_time_in()
   {
         if (substr($this->time_in, 10, 1) == "-") 
         { 
             $this->time_in = substr($this->time_in, 0, 10) . " " . substr($this->time_in, 11);
         } 
         if (substr($this->time_in, 13, 1) == ".") 
         { 
            $this->time_in = substr($this->time_in, 0, 13) . ":" . substr($this->time_in, 14, 2) . ":" . substr($this->time_in, 17);
         } 
         $this->nm_data->SetaData($this->time_in, "YYYY-MM-DD HH:II:SS");
         $this->time_in = $this->nm_data->FormataSaida("m/d/Y h:i:s a");
      $col_sep = ($this->NM_prim_col > 0) ? $this->delim_col : "";
      $conteudo = str_replace($this->delim_dados, $this->delim_dados . $this->delim_dados, $this->time_in);
      $this->csv_registro .= $col_sep . $this->delim_dados . $conteudo . $this->delim_dados;
      $this->NM_prim_col++;
   }
   //----- time_out
   function NM_export_time_out()
   {
         if (substr($this->time_out, 10, 1) == "-") 
         { 
             $this->time_out = substr($this->time_out, 0, 10) . " " . substr($this->time_out, 11);
         } 
         if (substr($this->time_out, 13, 1) == ".") 
         { 
            $this->time_out = substr($this->time_out, 0, 13) . ":" . substr($this->time_out, 14, 2) . ":" . substr($this->time_out, 17);
         } 
         $this->nm_data->SetaData($this->time_out, "YYYY-MM-DD HH:II:SS");
         $this->time_out = $this->nm_data->FormataSaida("m/d/Y h:i:s A");
      $col_sep = ($this->NM_prim_col > 0) ? $this->delim_col : "";
      $conteudo = str_replace($this->delim_dados, $this->delim_dados . $this->delim_dados, $this->time_out);
      $this->csv_registro .= $col_sep . $this->delim_dados . $conteudo . $this->delim_dados;
      $this->NM_prim_col++;
   }
   //----- elapsed
   function NM_export_elapsed()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->delim_col : "";
      $conteudo = str_replace($this->delim_dados, $this->delim_dados . $this->delim_dados, $this->elapsed);
      $this->csv_registro .= $col_sep . $this->delim_dados . $conteudo . $this->delim_dados;
      $this->NM_prim_col++;
   }
   //----- overtime
   function NM_export_overtime()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->delim_col : "";
      $conteudo = str_replace($this->delim_dados, $this->delim_dados . $this->delim_dados, $this->overtime);
      $this->csv_registro .= $col_sep . $this->delim_dados . $conteudo . $this->delim_dados;
      $this->NM_prim_col++;
   }
   //----- flag
   function NM_export_flag()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->delim_col : "";
      $conteudo = str_replace($this->delim_dados, $this->delim_dados . $this->delim_dados, $this->flag);
      $this->csv_registro .= $col_sep . $this->delim_dados . $conteudo . $this->delim_dados;
      $this->NM_prim_col++;
   }
   //----- plate
   function NM_export_plate()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->delim_col : "";
      $conteudo = str_replace($this->delim_dados, $this->delim_dados . $this->delim_dados, $this->plate);
      $this->csv_registro .= $col_sep . $this->delim_dados . $conteudo . $this->delim_dados;
      $this->NM_prim_col++;
   }
   //----- grandtotal
   function NM_export_grandtotal()
   {
         nmgp_Form_Num_Val($this->grandtotal, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->delim_col : "";
      $conteudo = str_replace($this->delim_dados, $this->delim_dados . $this->delim_dados, $this->grandtotal);
      $this->csv_registro .= $col_sep . $this->delim_dados . $conteudo . $this->delim_dados;
      $this->NM_prim_col++;
   }
   //----- start_shift
   function NM_export_start_shift()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->delim_col : "";
      $conteudo = str_replace($this->delim_dados, $this->delim_dados . $this->delim_dados, $this->start_shift);
      $this->csv_registro .= $col_sep . $this->delim_dados . $conteudo . $this->delim_dados;
      $this->NM_prim_col++;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['csv_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['sunday_sales_rpt']['csv_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo;
      }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Motel Live Data :: CSV</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?>" GMT">
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0">
 <META http-equiv="Pragma" content="no-cache">
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">CSV</td>
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
<form name="Fdown" method="get" action="sunday_sales_rpt_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="nm_tit_doc" value="<?php echo NM_encode_input($this->tit_doc); ?>"> 
<input type="hidden" name="nm_name_doc" value="<?php echo NM_encode_input($this->Ini->path_imag_temp . "/" . $this->arquivo) ?>"> 
</form>
<FORM name="F0" method=post action="sunday_sales_rpt.php"> 
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

 function Nm_date_format($Type, $Format)
 {
     $Form_base = str_replace("/", "", $Format);
     $Form_base = str_replace("-", "", $Form_base);
     $Form_base = str_replace(":", "", $Form_base);
     $Form_base = str_replace(";", "", $Form_base);
     $Form_base = str_replace(" ", "", $Form_base);
     $Form_base = str_replace("a", "Y", $Form_base);
     $Form_base = str_replace("y", "Y", $Form_base);
     $Form_base = str_replace("h", "H", $Form_base);
     $date_format_show = "";
     if ($Type == "DT" || $Type == "DH")
     {
         $Str_date = str_replace("a", "y", strtolower($_SESSION['scriptcase']['reg_conf']['date_format']));
         $Str_date = str_replace("y", "Y", $Str_date);
         $Str_date = str_replace("h", "H", $Str_date);
         $Lim   = strlen($Str_date);
         $Ult   = "";
         $Arr_D = array();
         for ($I = 0; $I < $Lim; $I++)
         {
              $Char = substr($Str_date, $I, 1);
              if ($Char != $Ult)
              {
                  $Arr_D[] = $Char;
              }
              $Ult = $Char;
         }
         $Prim = true;
         foreach ($Arr_D as $Cada_d)
         {
             if (strpos($Form_base, $Cada_d) !== false)
             {
                 $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
                 $date_format_show .= $Cada_d;
                 $Prim = false;
             }
         }
     }
     if ($Type == "DH" || $Type == "HH")
     {
         if ($Type == "DH")
         {
             $date_format_show .= " ";
         }
         $Str_time = strtolower($_SESSION['scriptcase']['reg_conf']['time_format']);
         $Str_time = str_replace("h", "H", $Str_time);
         $Lim   = strlen($Str_time);
         $Ult   = "";
         $Arr_T = array();
         for ($I = 0; $I < $Lim; $I++)
         {
              $Char = substr($Str_time, $I, 1);
              if ($Char != $Ult)
              {
                  $Arr_T[] = $Char;
              }
              $Ult = $Char;
         }
         $Prim = true;
         foreach ($Arr_T as $Cada_t)
         {
             if (strpos($Form_base, $Cada_t) !== false)
             {
                 $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['time_sep'] : "";
                 $date_format_show .= $Cada_t;
                 $Prim = false;
             }
         }
     }
     return $date_format_show;
 }

}

?>
