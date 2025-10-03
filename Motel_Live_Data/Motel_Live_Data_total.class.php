<?php

class Motel_Live_Data_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function Motel_Live_Data_total($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("en_us");
      if (isset($_SESSION['sc_session'][$this->sc_page]['Motel_Live_Data']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['Motel_Live_Data']['campos_busca']))
      { 
          $this->room = $_SESSION['sc_session'][$this->sc_page]['Motel_Live_Data']['campos_busca']['room']; 
          $tmp_pos = strpos($this->room, "##@@");
          if ($tmp_pos !== false)
          {
              $this->room = substr($this->room, 0, $tmp_pos);
          }
          $this->prices = $_SESSION['sc_session'][$this->sc_page]['Motel_Live_Data']['campos_busca']['prices']; 
          $tmp_pos = strpos($this->prices, "##@@");
          if ($tmp_pos !== false)
          {
              $this->prices = substr($this->prices, 0, $tmp_pos);
          }
          $this->time_in = $_SESSION['sc_session'][$this->sc_page]['Motel_Live_Data']['campos_busca']['time_in']; 
          $tmp_pos = strpos($this->time_in, "##@@");
          if ($tmp_pos !== false)
          {
              $this->time_in = substr($this->time_in, 0, $tmp_pos);
          }
          $time_in_2 = $_SESSION['sc_session'][$this->sc_page]['Motel_Live_Data']['campos_busca']['time_in_input_2']; 
          $this->time_in_2 = $_SESSION['sc_session'][$this->sc_page]['Motel_Live_Data']['campos_busca']['time_in_input_2']; 
          $this->time_out = $_SESSION['sc_session'][$this->sc_page]['Motel_Live_Data']['campos_busca']['time_out']; 
          $tmp_pos = strpos($this->time_out, "##@@");
          if ($tmp_pos !== false)
          {
              $this->time_out = substr($this->time_out, 0, $tmp_pos);
          }
          $time_out_2 = $_SESSION['sc_session'][$this->sc_page]['Motel_Live_Data']['campos_busca']['time_out_input_2']; 
          $this->time_out_2 = $_SESSION['sc_session'][$this->sc_page]['Motel_Live_Data']['campos_busca']['time_out_input_2']; 
          $this->start_shift = $_SESSION['sc_session'][$this->sc_page]['Motel_Live_Data']['campos_busca']['start_shift']; 
          $tmp_pos = strpos($this->start_shift, "##@@");
          if ($tmp_pos !== false)
          {
              $this->start_shift = substr($this->start_shift, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral()
   {
      global $nada, $nm_lang , $id;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(Prices) as sum_prices, 0 as S_grandtotal from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(Prices) as sum_prices, 0 as S_grandtotal from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['tot_geral'][2] = $rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $rt->fields[2] = (string)$rt->fields[2]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['tot_geral'][3] = $rt->fields[2]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['contr_total_geral'] = "OK";
   } 

   //-----  start_shift
   function quebra_start_shift_Shift($start_shift, $arg_sum_start_shift) 
   {
      global $tot_start_shift , $id;  
      $tot_start_shift = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(Prices) as sum_prices, 0 as S_grandtotal from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(Prices) as sum_prices, 0 as S_grandtotal from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_pesq'])) 
      { 
         $nm_comando .= " where Start_Shift" . $arg_sum_start_shift ; 
      } 
      else 
      { 
         $nm_comando .= " and Start_Shift" . $arg_sum_start_shift ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_start_shift[0] = $start_shift ; 
      $tot_start_shift[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_start_shift[2] = (string)$rt->fields[1]; 
      $rt->fields[2] = str_replace(",", ".", $rt->fields[2]);
      $tot_start_shift[3] = (string)$rt->fields[2]; 
      $rt->Close(); 
   } 


   //----- 
   function resumo_Shift($destino_resumo, &$array_total_start_shift)
   {
      global $nada, $nm_lang, $flag, $plate, $grandtotal, $postotal, $id;
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
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_pesq_filtro'];
   $nmgp_order_by = " order by Start_Shift asc"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $comando  = "select count(*), sum(Prices) as sum_prices, 0 as S_grandtotal, Start_Shift from " . $this->Ini->nm_tabela . " " .  $this->sc_where_atual . " group by Start_Shift $nmgp_order_by";
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $comando  = "select count(*), sum(Prices) as sum_prices, 0 as S_grandtotal, Start_Shift from " . $this->Ini->nm_tabela . " " .  $this->sc_where_atual . " group by Start_Shift $nmgp_order_by";
      } 
      else 
      { 
         $comando  = "select count(*), sum(Prices) as sum_prices, 0 as S_grandtotal, Start_Shift from " . $this->Ini->nm_tabela . " " . $this->sc_where_atual . " group by Start_Shift $nmgp_order_by";
      } 
      if ($destino_resumo != "gra") 
      {
          $comando = str_replace("avg(", "sum(", $comando); 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $array_db_total = $this->get_array($rt);
      $rt->Close();
      foreach ($array_db_total as $registro)
      {
         $start_shift      = $registro[3];
         $start_shift_orig = $registro[3];
         $conteudo = $registro[3];
         $start_shift = $conteudo;
         if (null === $start_shift)
         {
             $start_shift = '';
         }
         if (null === $start_shift_orig)
         {
             $start_shift_orig = '';
         }
         $val_grafico_start_shift = $start_shift;
         $registro[1] = str_replace(",", ".", $registro[1]);
         $registro[1] = (strpos(strtolower($registro[1]), "e")) ? (float)$registro[1] : $registro[1]; 
         $registro[1] = (string)$registro[1];
         if ($registro[1] == "") 
         {
             $registro[1] = 0;
         }
         $registro[2] = str_replace(",", ".", $registro[2]);
         $registro[2] = (strpos(strtolower($registro[2]), "e")) ? (float)$registro[2] : $registro[2]; 
         $registro[2] = (string)$registro[2];
         if ($registro[2] == "") 
         {
             $registro[2] = 0;
         }
         if (isset($start_shift_orig))
         {
            //-----  start_shift
            if (!isset($array_total_start_shift[$start_shift_orig]))
            {
               $array_total_start_shift[$start_shift_orig][0] = $registro[0];
               $array_total_start_shift[$start_shift_orig][1] = $registro[1];
               $array_total_start_shift[$start_shift_orig][3] = $registro[2];
               $array_total_start_shift[$start_shift_orig][2] = $registro[3];
               $array_total_start_shift[$start_shift_orig][4] = $val_grafico_start_shift;
               $array_total_start_shift[$start_shift_orig][5] = $start_shift_orig;
            }
            else
            {
               $array_total_start_shift[$start_shift_orig][0] += $registro[0];
               $array_total_start_shift[$start_shift_orig][1] += $registro[1];
               $array_total_start_shift[$start_shift_orig][3] += $registro[2];
               $array_total_start_shift[$start_shift_orig][2] += $registro[3];
            }
         } // isset
      }
   }
   //----- 
   function graficoShift(&$array_label, &$array_label_orig, &$array_datay, $array_total_start_shift)
   {
      $array_label         = array();
      $array_label_orig    = array();
      $array_label[0]      = array();
      $array_label_orig[0] = array();
      $array_datay    = array();
      $array_datay[0] = array();
      foreach ($array_total_start_shift as $xcampo_start_shift => $dados_start_shift)
      {
         //-- Label
         $campo_start_shift      = $dados_start_shift[4];
         $campo_orig_start_shift = $dados_start_shift[5];
         if (!in_array($campo_start_shift, $array_label[0]))
         {
            $array_label[0][]      = $campo_start_shift;
            $array_label_orig[0][] = $campo_orig_start_shift;
         }
         //-- Total NM_Count - C
         if (!isset($array_datay[0][0]))
         {
            $array_datay[0][0] = array();
         }
         $array_datay[0][0][] = $dados_start_shift[0];
         //-- Total prices - S
         if (!isset($array_datay[0][1]))
         {
            $array_datay[0][1] = array();
         }
         $array_datay[0][1][] = $dados_start_shift[1];
         //-- Total postotal - S
         if (!isset($array_datay[0][3]))
         {
            $array_datay[0][3] = array();
         }
         $array_datay[0][3][] = $dados_start_shift[3];
         //-- Total grandtotal - S
         if (!isset($array_datay[0][2]))
         {
            $array_datay[0][2] = array();
         }
         $array_datay[0][2][] = $dados_start_shift[2];
      }
   }

   //-----
   function get_array($rs)
   {
       if ('ado_mssql' != $this->Ini->nm_tpbanco)
       {
           return $rs->GetArray();
       }

       $array_db_total = array();
       while (!$rs->EOF)
       {
           $arr_row = array();
           foreach ($rs->fields as $k => $v)
           {
               $arr_row[$k] = $v . '';
           }
           $array_db_total[] = $arr_row;
           $rs->MoveNext();
       }
       return $array_db_total;
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
