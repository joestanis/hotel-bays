<?php

class POS_Items_Class_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function POS_Items_Class_total($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("en_us");
      if (isset($_SESSION['sc_session'][$this->sc_page]['POS_Items_Class']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['POS_Items_Class']['campos_busca']))
      { 
          $this->item_class = $_SESSION['sc_session'][$this->sc_page]['POS_Items_Class']['campos_busca']['item_class']; 
          $tmp_pos = strpos($this->item_class, "##@@");
          if ($tmp_pos !== false)
          {
              $this->item_class = substr($this->item_class, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral()
   {
      global $nada, $nm_lang ;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['POS_Items_Class']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['POS_Items_Class']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['POS_Items_Class']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['POS_Items_Class']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['POS_Items_Class']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['POS_Items_Class']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['POS_Items_Class']['contr_total_geral'] = "OK";
   } 

   //-----  item_class
   function quebra_item_class_groupby_1($item_class, $arg_sum_item_class) 
   {
      global $tot_item_class ;  
      $tot_item_class = array() ;  
      $tot_item_class[0] = $item_class ; 
   }

   //----- 
   function resumo_groupby_1($destino_resumo, &$array_total_item_class)
   {
      global $nada, $nm_lang;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['POS_Items_Class']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['POS_Items_Class']['campos_busca']))
   { 
       $this->item_class = $_SESSION['sc_session'][$this->Ini->sc_page]['POS_Items_Class']['campos_busca']['item_class']; 
       $tmp_pos = strpos($this->item_class, "##@@");
       if ($tmp_pos !== false)
       {
           $this->item_class = substr($this->item_class, 0, $tmp_pos);
       }
   } 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['POS_Items_Class']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['POS_Items_Class']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['POS_Items_Class']['where_pesq_filtro'];
   $nmgp_order_by = " order by Item_Class asc"; 
      $_SESSION['scriptcase']['POS_Items_Class']['contr_erro'] = 'on';
 $this->nmgp_botoes["new"] = "off";;
$this->nmgp_botoes["summary"] = "off";;
$_SESSION['scriptcase']['POS_Items_Class']['contr_erro'] = 'off'; 
      if (!empty($this->Ini->nm_order_dinamico)) 
      {
          foreach ($this->Ini->nm_order_dinamico as $nm_cada_col => $nm_nova_col)
          {
                   $nmgp_order_by = str_replace($nm_cada_col, $nm_nova_col, $nmgp_order_by); 
          }
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $comando  = "select count(*), Item_Class from " . $this->Ini->nm_tabela . " " .  $this->sc_where_atual . " group by Item_Class $nmgp_order_by";
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $comando  = "select count(*), Item_Class from " . $this->Ini->nm_tabela . " " .  $this->sc_where_atual . " group by Item_Class $nmgp_order_by";
      } 
      else 
      { 
         $comando  = "select count(*), Item_Class from " . $this->Ini->nm_tabela . " " . $this->sc_where_atual . " group by Item_Class $nmgp_order_by";
      } 
      if (!empty($this->Ini->nm_col_dinamica)) 
      {
          foreach ($this->Ini->nm_col_dinamica as $nm_cada_col => $nm_nova_col)
          {
                   $comando = str_replace($nm_cada_col, $nm_nova_col, $comando); 
          }
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
         $item_class      = $registro[1];
         $item_class_orig = $registro[1];
         $conteudo = $registro[1];
         $item_class = $conteudo;
         if (null === $item_class)
         {
             $item_class = '';
         }
         if (null === $item_class_orig)
         {
             $item_class_orig = '';
         }
         $val_grafico_item_class = $item_class;
         if (isset($item_class_orig))
         {
            //-----  item_class
            if (!isset($array_total_item_class[$item_class_orig]))
            {
               $array_total_item_class[$item_class_orig][0] = $registro[0];
               $array_total_item_class[$item_class_orig][1] = $val_grafico_item_class;
               $array_total_item_class[$item_class_orig][2] = $item_class_orig;
            }
            else
            {
               $array_total_item_class[$item_class_orig][0] += $registro[0];
            }
         } // isset
      }
   }
   //----- 
   function graficogroupby_1(&$array_label, &$array_label_orig, &$array_datay, $array_total_item_class)
   {
      $array_label         = array();
      $array_label_orig    = array();
      $array_label[0]      = array();
      $array_label_orig[0] = array();
      $array_datay    = array();
      $array_datay[0] = array();
      foreach ($array_total_item_class as $xcampo_item_class => $dados_item_class)
      {
         //-- Label
         $campo_item_class      = $dados_item_class[1];
         $campo_orig_item_class = $dados_item_class[2];
         if (!in_array($campo_item_class, $array_label[0]))
         {
            $array_label[0][]      = $campo_item_class;
            $array_label_orig[0][] = $campo_orig_item_class;
         }
         //-- Total NM_Count - C
         if (!isset($array_datay[0][0]))
         {
            $array_datay[0][0] = array();
         }
         $array_datay[0][0][] = $dados_item_class[0];
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
