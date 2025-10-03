<?php

class Motel_Top_Hours_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function Motel_Top_Hours_total($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("en_us");
      if (isset($_SESSION['sc_session'][$this->sc_page]['Motel_Top_Hours']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['Motel_Top_Hours']['campos_busca']))
      { 
          $this->hours = $_SESSION['sc_session'][$this->sc_page]['Motel_Top_Hours']['campos_busca']['hours']; 
          $tmp_pos = strpos($this->hours, "##@@");
          if ($tmp_pos !== false)
          {
              $this->hours = substr($this->hours, 0, $tmp_pos);
          }
          $this->count_in = $_SESSION['sc_session'][$this->sc_page]['Motel_Top_Hours']['campos_busca']['count_in']; 
          $tmp_pos = strpos($this->count_in, "##@@");
          if ($tmp_pos !== false)
          {
              $this->count_in = substr($this->count_in, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral()
   {
      global $nada, $nm_lang ;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Top_Hours']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Top_Hours']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), avg(Count_In) as avg_count_in from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Top_Hours']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), avg(Count_In) as avg_count_in from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Top_Hours']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Top_Hours']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Top_Hours']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Top_Hours']['tot_geral'][2] = $rt->fields[1]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Top_Hours']['contr_total_geral'] = "OK";
   } 

   //-----  hours
   function quebra_hours_Hours($hours, $arg_sum_hours) 
   {
      global $tot_hours ;  
      $tot_hours = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), avg(Count_In) as avg_count_in from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Top_Hours']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), avg(Count_In) as avg_count_in from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Top_Hours']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Top_Hours']['where_pesq'])) 
      { 
         $nm_comando .= " where Hours" . $arg_sum_hours ; 
      } 
      else 
      { 
         $nm_comando .= " and Hours" . $arg_sum_hours ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_hours[0] = $hours ; 
      $tot_hours[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_hours[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
   } 


   //----- 
   function resumo_Hours($destino_resumo, &$array_total_hours)
   {
      global $nada, $nm_lang;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Top_Hours']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Top_Hours']['campos_busca']))
   { 
       $this->hours = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Top_Hours']['campos_busca']['hours']; 
       $tmp_pos = strpos($this->hours, "##@@");
       if ($tmp_pos !== false)
       {
           $this->hours = substr($this->hours, 0, $tmp_pos);
       }
       $this->count_in = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Top_Hours']['campos_busca']['count_in']; 
       $tmp_pos = strpos($this->count_in, "##@@");
       if ($tmp_pos !== false)
       {
           $this->count_in = substr($this->count_in, 0, $tmp_pos);
       }
   } 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Top_Hours']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Top_Hours']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Top_Hours']['where_pesq_filtro'];
   $nmgp_order_by = " order by Hours asc"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $comando  = "select count(*), avg(Count_In) as avg_count_in, Hours from " . $this->Ini->nm_tabela . " " .  $this->sc_where_atual . " group by Hours $nmgp_order_by";
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $comando  = "select count(*), avg(Count_In) as avg_count_in, Hours from " . $this->Ini->nm_tabela . " " .  $this->sc_where_atual . " group by Hours $nmgp_order_by";
      } 
      else 
      { 
         $comando  = "select count(*), avg(Count_In) as avg_count_in, Hours from " . $this->Ini->nm_tabela . " " . $this->sc_where_atual . " group by Hours $nmgp_order_by";
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
         $hours      = $registro[2];
         $hours_orig = $registro[2];
         $conteudo = $registro[2];
         $hours = $conteudo;
         if (null === $hours)
         {
             $hours = '';
         }
         if (null === $hours_orig)
         {
             $hours_orig = '';
         }
         $val_grafico_hours = $hours;
         $registro[1] = str_replace(",", ".", $registro[1]);
         $registro[1] = (strpos(strtolower($registro[1]), "e")) ? (float)$registro[1] : $registro[1]; 
         $registro[1] = (string)$registro[1];
         if ($registro[1] == "") 
         {
             $registro[1] = 0;
         }
         if (isset($hours_orig))
         {
            //-----  hours
            if (!isset($array_total_hours[$hours_orig]))
            {
               $array_total_hours[$hours_orig][0] = $registro[0];
               $array_total_hours[$hours_orig][1] = $registro[1];
               $array_total_hours[$hours_orig][2] = $val_grafico_hours;
               $array_total_hours[$hours_orig][3] = $hours_orig;;
            }
            else
            {
               $array_total_hours[$hours_orig][0] += $registro[0];
               $array_total_hours[$hours_orig][1] += $registro[1];
            }
         } // isset
      }
   }
   //----- 
   function graficoHours(&$array_label, &$array_label_orig, &$array_datay, $array_total_hours)
   {
      $array_label         = array();
      $array_label_orig    = array();
      $array_label[0]      = array();
      $array_label_orig[0] = array();
      $array_datay    = array();
      $array_datay[0] = array();
      foreach ($array_total_hours as $xcampo_hours => $dados_hours)
      {
         //-- Label
         $campo_hours      = $dados_hours[2];
         $campo_orig_hours = $dados_hours[3];
         if (!in_array($campo_hours, $array_label[0]))
         {
            $array_label[0][]      = $campo_hours;
            $array_label_orig[0][] = $campo_orig_hours;
         }
         //-- Total NM_Count - C
         if (!isset($array_datay[0][0]))
         {
            $array_datay[0][0] = array();
         }
         $array_datay[0][0][] = $dados_hours[0];
         //-- Total count_in - A
         if (!isset($array_datay[0][1]))
         {
            $array_datay[0][1] = array();
         }
         $array_datay[0][1][] = $dados_hours[1];
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
}

?>
