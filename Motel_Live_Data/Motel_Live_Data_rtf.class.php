<?php

class Motel_Live_Data_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $texto_tag;
   var $arquivo;
   var $tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function Motel_Live_Data_rtf()
   {
      $this->nm_data   = new nm_data("en_us");
      $this->texto_tag = "";
   }

   //---- 
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      $this->monta_html();
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "Motel_Live_Data.php"; 
      $this->arquivo    = "sc_rtf";
      $this->arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->arquivo   .= "_Motel_Live_Data";
      $this->arquivo   .= ".rtf";
      $this->tit_doc    = "Motel_Live_Data.rtf";
   }

   //----- 
   function gera_texto_tag()
   {
     global $nm_lang;
      global
             $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['Motel_Live_Data']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['Motel_Live_Data']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['Motel_Live_Data']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['campos_busca']))
      { 
          $this->room = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['campos_busca']['room']; 
          $tmp_pos = strpos($this->room, "##@@");
          if ($tmp_pos !== false)
          {
              $this->room = substr($this->room, 0, $tmp_pos);
          }
          $this->prices = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['campos_busca']['prices']; 
          $tmp_pos = strpos($this->prices, "##@@");
          if ($tmp_pos !== false)
          {
              $this->prices = substr($this->prices, 0, $tmp_pos);
          }
          $this->time_in = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['campos_busca']['time_in']; 
          $tmp_pos = strpos($this->time_in, "##@@");
          if ($tmp_pos !== false)
          {
              $this->time_in = substr($this->time_in, 0, $tmp_pos);
          }
          $this->time_in_2 = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['campos_busca']['time_in_input_2']; 
          $this->time_out = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['campos_busca']['time_out']; 
          $tmp_pos = strpos($this->time_out, "##@@");
          if ($tmp_pos !== false)
          {
              $this->time_out = substr($this->time_out, 0, $tmp_pos);
          }
          $this->time_out_2 = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['campos_busca']['time_out_input_2']; 
          $this->start_shift = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['campos_busca']['start_shift']; 
          $tmp_pos = strpos($this->start_shift, "##@@");
          if ($tmp_pos !== false)
          {
              $this->start_shift = substr($this->start_shift, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['rtf_name']))
      {
          $this->arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['rtf_name'];
          $this->tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['rtf_name']);
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
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
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

      $this->texto_tag .= "<table>\r\n";
      $this->texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['room'])) ? $this->New_label['room'] : ""; 
          if ($Cada_col == "room" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['prices'])) ? $this->New_label['prices'] : ""; 
          if ($Cada_col == "prices" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['time_in'])) ? $this->New_label['time_in'] : "Time In"; 
          if ($Cada_col == "time_in" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['time_out'])) ? $this->New_label['time_out'] : "Time Out"; 
          if ($Cada_col == "time_out" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['elapsed'])) ? $this->New_label['elapsed'] : ""; 
          if ($Cada_col == "elapsed" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['overtime'])) ? $this->New_label['overtime'] : ""; 
          if ($Cada_col == "overtime" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['flag'])) ? $this->New_label['flag'] : "**"; 
          if ($Cada_col == "flag" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['plate'])) ? $this->New_label['plate'] : "Car Plate"; 
          if ($Cada_col == "plate" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['grandtotal'])) ? $this->New_label['grandtotal'] : "Grand Total"; 
          if ($Cada_col == "grandtotal" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['start_shift'])) ? $this->New_label['start_shift'] : "Shift"; 
          if ($Cada_col == "start_shift" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->texto_tag .= "</tr>\r\n";
      while (!$rs->EOF)
      {
         $this->texto_tag .= "<tr>\r\n";
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
         $_SESSION['scriptcase']['Motel_Live_Data']['contr_erro'] = 'on';
 if ($this->elapsed  >= 8)
$this->flag  = "<img src='../_lib/img/warning.gif'"."' />";
else
$this->flag  = "";


$this->grandtotal  = $this->prices +$this->total ;
	


$_SESSION['scriptcase']['Motel_Live_Data']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->texto_tag .= "</table>\r\n";

      $rs->Close();
   }
   //----- room
   function NM_export_room()
   {
         if (!NM_is_utf8($this->room))
         {
             $this->room = mb_convert_encoding($this->room, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->room = str_replace('<', '&lt;', $this->room);
          $this->room = str_replace('>', '&gt;', $this->room);
         $this->texto_tag .= "<td>" . $this->room . "</td>\r\n";
   }
   //----- prices
   function NM_export_prices()
   {
         nmgp_Form_Num_Val($this->prices, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if (!NM_is_utf8($this->prices))
         {
             $this->prices = mb_convert_encoding($this->prices, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->prices = str_replace('<', '&lt;', $this->prices);
          $this->prices = str_replace('>', '&gt;', $this->prices);
         $this->texto_tag .= "<td>" . $this->prices . "</td>\r\n";
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
         if (!NM_is_utf8($this->time_in))
         {
             $this->time_in = mb_convert_encoding($this->time_in, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->time_in = str_replace('<', '&lt;', $this->time_in);
          $this->time_in = str_replace('>', '&gt;', $this->time_in);
         $this->texto_tag .= "<td>" . $this->time_in . "</td>\r\n";
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
         if (!NM_is_utf8($this->time_out))
         {
             $this->time_out = mb_convert_encoding($this->time_out, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->time_out = str_replace('<', '&lt;', $this->time_out);
          $this->time_out = str_replace('>', '&gt;', $this->time_out);
         $this->texto_tag .= "<td>" . $this->time_out . "</td>\r\n";
   }
   //----- elapsed
   function NM_export_elapsed()
   {
         if (!NM_is_utf8($this->elapsed))
         {
             $this->elapsed = mb_convert_encoding($this->elapsed, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->elapsed = str_replace('<', '&lt;', $this->elapsed);
          $this->elapsed = str_replace('>', '&gt;', $this->elapsed);
         $this->texto_tag .= "<td>" . $this->elapsed . "</td>\r\n";
   }
   //----- overtime
   function NM_export_overtime()
   {
         if (!NM_is_utf8($this->overtime))
         {
             $this->overtime = mb_convert_encoding($this->overtime, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->overtime = str_replace('<', '&lt;', $this->overtime);
          $this->overtime = str_replace('>', '&gt;', $this->overtime);
         $this->texto_tag .= "<td>" . $this->overtime . "</td>\r\n";
   }
   //----- flag
   function NM_export_flag()
   {
         if (!NM_is_utf8($this->flag))
         {
             $this->flag = mb_convert_encoding($this->flag, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->flag = str_replace('<', '&lt;', $this->flag);
          $this->flag = str_replace('>', '&gt;', $this->flag);
         $this->texto_tag .= "<td>" . $this->flag . "</td>\r\n";
   }
   //----- plate
   function NM_export_plate()
   {
         if (!NM_is_utf8($this->plate))
         {
             $this->plate = mb_convert_encoding($this->plate, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->plate = str_replace('<', '&lt;', $this->plate);
          $this->plate = str_replace('>', '&gt;', $this->plate);
         $this->texto_tag .= "<td>" . $this->plate . "</td>\r\n";
   }
   //----- grandtotal
   function NM_export_grandtotal()
   {
         nmgp_Form_Num_Val($this->grandtotal, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "N", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->grandtotal))
         {
             $this->grandtotal = mb_convert_encoding($this->grandtotal, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->grandtotal = str_replace('<', '&lt;', $this->grandtotal);
          $this->grandtotal = str_replace('>', '&gt;', $this->grandtotal);
         $this->texto_tag .= "<td>" . $this->grandtotal . "</td>\r\n";
   }
   //----- start_shift
   function NM_export_start_shift()
   {
         if (!NM_is_utf8($this->start_shift))
         {
             $this->start_shift = mb_convert_encoding($this->start_shift, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          $this->start_shift = str_replace('<', '&lt;', $this->start_shift);
          $this->start_shift = str_replace('>', '&gt;', $this->start_shift);
         $this->texto_tag .= "<td>" . $this->start_shift . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $rtf_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo, "w");
      require_once($this->Ini->path_third      . "/rtf_new/document_generator/cl_xml2driver.php"); 
      $text_ok  =  "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n"; 
      $text_ok .=  "<DOC config_file=\"" . $this->Ini->path_third . "/rtf_new/doc_config.inc\" >\r\n"; 
      $text_ok .=  $this->texto_tag; 
      $text_ok .=  "</DOC>\r\n"; 
      $xml = new nDOCGEN($text_ok,"RTF"); 
      fwrite($rtf_f, $xml->get_result_file());
      fclose($rtf_f);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo;
      }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Motel Live Data :: RTF</TITLE>
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
   <td class="scExportTitle" style="height: 25px">RTF</td>
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
<form name="Fdown" method="get" action="Motel_Live_Data_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="nm_tit_doc" value="<?php echo NM_encode_input($this->tit_doc); ?>"> 
<input type="hidden" name="nm_name_doc" value="<?php echo NM_encode_input($this->Ini->path_imag_temp . "/" . $this->arquivo) ?>"> 
</form>
<FORM name="F0" method=post action="Motel_Live_Data.php"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
</FORM> 
</BODY>
</HTML>
<?php
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
