<?php

class Merge_In_Out_pesq
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $cmp_formatado;
   var $nm_data;
   var $Campos_Mens_erro;

   var $comando;
   var $comando_sum;
   var $comando_filtro;
   var $comando_ini;
   var $comando_fim;
   var $NM_operador;
   var $NM_data_qp;
   var $NM_path_filter;
   var $NM_curr_fil;
   var $nm_location;
   var $nmgp_botoes = array();
   var $NM_fil_ant = array();
   var $ajax_return_fields = array();

   /**
    * @access  public
    */
   function Merge_In_Out_pesq()
   {
   }

   /**
    * @access  public
    * @global  string  $bprocessa  
    */
   function monta_busca()
   {
      global $bprocessa;
      include("../_lib/css/" . $this->Ini->str_schema_filter . "_filter.php");
      $this->Ini->Str_btn_filter = trim($str_button) . "/" . trim($str_button) . ".php";
      $this->Str_btn_filter_css  = trim($str_button) . "/" . trim($str_button) . ".css";
      include($this->Ini->path_btn . $this->Ini->Str_btn_filter);
      $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['path_libs_php'] = $this->Ini->path_lib_php;
      $this->Img_sep_filter = "/" . trim($str_toolbar_separator);
      $this->Block_img_col  = trim($str_block_col);
      $this->Block_img_exp  = trim($str_block_exp);
      $this->Bubble_tail    = trim($str_bubble_tail);
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_config_btn.php", "F", "nmButtonOutput"); 
      if ($this->NM_ajax_flag)
      {
          ob_start();
          $this->processa_ajax();
          $this->Db->Close(); 
          $Temp = ob_get_clean();
          exit;
      }
      if (isset($bprocessa) && "pesq" == $bprocessa)
      {
         $this->processa_busca();
      }
      else
      {
         $this->monta_formulario();
      }
   }

   /**
    * @access  public
    */
   function monta_formulario()
   {
      $this->init();
      $this->monta_html_ini();
      $this->monta_cabecalho();
      $this->monta_form();
      $this->monta_html_fim();
   }

   /**
    * @access  public
    */
   function init()
   {
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                  $this->Ini->Nm_lang['lang_mnth_janu'],
                                  $this->Ini->Nm_lang['lang_mnth_febr'],
                                  $this->Ini->Nm_lang['lang_mnth_marc'],
                                  $this->Ini->Nm_lang['lang_mnth_apri'],
                                  $this->Ini->Nm_lang['lang_mnth_mayy'],
                                  $this->Ini->Nm_lang['lang_mnth_june'],
                                  $this->Ini->Nm_lang['lang_mnth_july'],
                                  $this->Ini->Nm_lang['lang_mnth_augu'],
                                  $this->Ini->Nm_lang['lang_mnth_sept'],
                                  $this->Ini->Nm_lang['lang_mnth_octo'],
                                  $this->Ini->Nm_lang['lang_mnth_nove'],
                                  $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                  $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                  $this->Ini->Nm_lang['lang_days_sund'],
                                  $this->Ini->Nm_lang['lang_days_mond'],
                                  $this->Ini->Nm_lang['lang_days_tued'],
                                  $this->Ini->Nm_lang['lang_days_wend'],
                                  $this->Ini->Nm_lang['lang_days_thud'],
                                  $this->Ini->Nm_lang['lang_days_frid'],
                                  $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                  $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                  $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                  $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                  $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                  $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                  $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                  $this->Ini->Nm_lang['lang_shrt_days_satd']);
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->nm_data = new nm_data("en_us");
      $pos_path = strrpos($this->Ini->path_prod, "/");
      $this->NM_path_filter = $this->Ini->root . substr($this->Ini->path_prod, 0, $pos_path) . "/conf/filters/";
      $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['opcao'] = "igual";
   }

   function processa_ajax()
   {
      global 
      $dates_cond, $dates,
      $NM_filters, $NM_filters_del, $nmgp_save_name, $NM_operador, $nmgp_save_option, $bprocessa, $Ajax_label, $Ajax_val, $Campo_bi, $Opc_bi;
      $this->init();
      if (isset($this->NM_ajax_info['param']['dates_cond']))
      {
          $dates_cond = $this->NM_ajax_info['param']['dates_cond'];
      }
      if (isset($this->NM_ajax_info['param']['dates']))
      {
          $dates = $this->NM_ajax_info['param']['dates'];
      }
      if (isset($this->NM_ajax_info['param']['NM_filters']))
      {
          $NM_filters = $this->NM_ajax_info['param']['NM_filters'];
      }
      if (isset($this->NM_ajax_info['param']['NM_filters_del']))
      {
          $NM_filters_del = $this->NM_ajax_info['param']['NM_filters_del'];
      }
      if (isset($this->NM_ajax_info['param']['nmgp_save_name']))
      {
          $nmgp_save_name = $this->NM_ajax_info['param']['nmgp_save_name'];
      }
      if (isset($this->NM_ajax_info['param']['NM_operador']))
      {
          $NM_operador = $this->NM_ajax_info['param']['NM_operador'];
      }
      if (isset($this->NM_ajax_info['param']['nmgp_save_option']))
      {
          $nmgp_save_option = $this->NM_ajax_info['param']['nmgp_save_option'];
      }
      if (isset($this->NM_ajax_info['param']['nmgp_refresh_fields']))
      {
          $nmgp_refresh_fields = $this->NM_ajax_info['param']['nmgp_refresh_fields'];
      }
      if (isset($this->NM_ajax_info['param']['bprocessa']))
      {
          $bprocessa = $this->NM_ajax_info['param']['bprocessa'];
      }
      if (isset($nmgp_refresh_fields))
      {
          $nmgp_refresh_fields = explode('_#fld#_', $nmgp_refresh_fields);
      }
      else
      {
          $nmgp_refresh_fields = array();
      }
//-- ajax metodos ---
      if (isset($bprocessa) && $bprocessa == "save_form")
      {
          $this->salva_filtro();
          $this->NM_fil_ant = $this->gera_array_filtros();
          $Nome_filter = "";
          $Opt_filter  = "<option value=\"\"></option>\r\n";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  $Opt_filter .= "<option value=\"\">" . Merge_In_Out_pack_protect_string($Nome_filter) . "</option>\r\n";
              }
              $Opt_filter .= "<option value=\"" . Merge_In_Out_pack_protect_string($Tipo_filter[0]) . "\">.." . Merge_In_Out_pack_protect_string($Cada_filter) .  "</option>\r\n";
          }
      }

      if (isset($bprocessa) && $bprocessa == "filter_delete")
      {
          $this->apaga_filtro();
          $this->NM_fil_ant = $this->gera_array_filtros();
          $Nome_filter = "";
          $Opt_filter  = "<option value=\"\"></option>\r\n";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter  = $Tipo_filter[1];
                  $Opt_filter .= "<option value=\"\">" .  Merge_In_Out_pack_protect_string($Nome_filter) . "</option>\r\n";
              }
              $Opt_filter .= "<option value=\"" . Merge_In_Out_pack_protect_string($Tipo_filter[0]) . "\">.." . Merge_In_Out_pack_protect_string($Cada_filter) .  "</option>\r\n";
          }
      }

      if (isset($bprocessa) && $bprocessa == "filter_save")
      {
          $this->recupera_filtro();
          foreach ($this->ajax_return_fields as $cada_cmp => $cada_opt)
          {
              $this->NM_ajax_info['fldList'][$cada_cmp] = array(
                         'type'    => $cada_opt['obj'],
                         'valList' => $cada_opt['vallist'],
                         );
          }
      }

      if (isset($bprocessa) && $bprocessa == "proc_bi")
      {
          $this->process_cond_bi($Opc_bi, $BI_data1, $BI_data2);
          $this->NM_ajax_info['fldList'][$Campo_bi . "_dia"] = array('type' => 'text', 'valList' => array(substr($BI_data1, 0, 2)));
          $this->NM_ajax_info['fldList'][$Campo_bi . "_mes"] = array('type' => 'text', 'valList' => array(substr($BI_data1, 2, 2)));
          $this->NM_ajax_info['fldList'][$Campo_bi . "_ano"] = array('type' => 'text', 'valList' => array(substr($BI_data1, 4)));
          $this->NM_ajax_info['fldList'][$Campo_bi . "_input_2_dia"] = array('type' => 'text', 'valList' => array(substr($BI_data2, 0, 2)));
          $this->NM_ajax_info['fldList'][$Campo_bi . "_input_2_mes"] = array('type' => 'text', 'valList' => array(substr($BI_data2, 2, 2)));
          $this->NM_ajax_info['fldList'][$Campo_bi . "_input_2_ano"] = array('type' => 'text', 'valList' => array(substr($BI_data2, 4)));
      }
      if (in_array("dates", $nmgp_refresh_fields) || $bprocessa == "filter_save")
      {
          $nmgp_def_dados = $this->lookup_ajax_dates();
          $this->NM_ajax_info['fldList']['dates'] = array(
                     'type'    => 'select',
                     'optList' => $nmgp_def_dados,
                     'valList' => $Ajax_val,
                     );
      }
   }
   function lookup_ajax_dates()
   {
      global $dates, $Ajax_label, $Ajax_val;
      $tmp_pos = strpos($dates, "##@@");
      if ($tmp_pos !== false)
      {
          $dates = substr($dates, 0, $tmp_pos);
      }
            $Ajax_val     = array(); 
      $Ajax_label   = array(); 
      $nmgp_def_dados = array(); 
      $nm_comando = "SELECT     TOP (100) PERCENT Dates FROM         dbo.Temp_Merge_In_Out GROUP BY Dates ORDER BY Dates DESC"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            if (trim($rs->fields[0]) == $dates)
            {
                $Ajax_val[]   = $cmp1 . "##@@" . $cmp1;
                $Ajax_label[] = $cmp1;
            }
            $cmp1 = Merge_In_Out_pack_protect_string($cmp1);
            $nmgp_def_dados[] = array($cmp1 . "##@@" . $cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      $sel_ret_ajax  = "      <SELECT " . $this->css_obj_select_ajax('dates') . " name=\"dates\" onChange=\"nm_refresh_form()\" size=\"1\">\r\n";
      foreach ($nmgp_def_dados as $NM_ind => $NM_opcoes)
      {
         foreach ($NM_opcoes as $NM_val => $NM_label)
         {
            $sel_ret_ajax .= "       <OPTION value=\"" .  $NM_val . "\">" . $NM_label . "</OPTION>\r\n";
         }
      }
      $sel_ret_ajax .= "      </SELECT>\r\n";
      
      return $sel_ret_ajax;
   }
   

   /**
    * @access  public
    */
   function processa_busca()
   {
      $this->inicializa_vars();
      $this->trata_campos();
      if (!empty($this->Campos_Mens_erro)) 
      {
          echo "<script type=\"text/javascript\">"; 
          echo "parent.NM_exibe_erro('" . $this->Campos_Mens_erro . "')";
          echo "</script>"; 
      }
      else
      {
          $this->finaliza_resultado();
      }
   }

   /**
    * @access  public
    */
   function and_or()
   {
      $posWhere = strpos(strtolower($this->comando), "where");
      if (FALSE === $posWhere)
      {
         $this->comando     .= " where ";
         $this->comando_sum .= " and ";
      }
      if ($this->comando_ini == "ini")
      {
          if (FALSE !== $posWhere)
          {
              $this->comando     .= " and ( ";
              $this->comando_sum .= " and ( ";
              $this->comando_fim  = " ) ";
          }
         $this->comando_ini  = "";
      }
      elseif ("or" == $this->NM_operador)
      {
         $this->comando        .= " or ";
         $this->comando_sum    .= " or ";
         $this->comando_filtro .= " or ";
      }
      else
      {
         $this->comando        .= " and ";
         $this->comando_sum    .= " and ";
         $this->comando_filtro .= " and ";
      }
   }

   /**
    * @access  public
    * @param  string  $nome  
    * @param  string  $condicao  
    * @param  mixed  $campo  
    * @param  mixed  $campo2  
    * @param  string  $nome_campo  
    * @param  string  $tp_campo  
    * @global  array  $nmgp_tab_label  
    */
   function monta_condicao($nome, $condicao, $campo, $campo2 = "", $nome_campo="", $tp_campo="")
   {
      global $nmgp_tab_label;
      $nm_aspas   = "'";
      $Nm_numeric = array();
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $Nm_numeric[] = "hours";$Nm_numeric[] = "count_in";$Nm_numeric[] = "count_out";
      $campo_join = strtolower(str_replace(".", "_", $nome));
      if (in_array($campo_join, $Nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['decimal_db'] == ".")
         {
            $nm_aspas = "";
         }
         if ($condicao != "in")
         {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['decimal_db'] == ".")
            {
               $campo  = str_replace(",", ".", $campo);
               $campo2 = str_replace(",", ".", $campo2);
            }
            if ($campo == "")
            {
               $campo = 0;
            }
            if ($campo2 == "")
            {
               $campo2 = 0;
            }
         }
      }
      if ($campo == "" && $condicao != "nu" && $condicao != "nn")
      {
         return;
      }
      else
      {
         $tmp_pos = strpos($campo, "##@@");
         if ($tmp_pos === false)
         {
             $res_lookup = $campo;
         }
         else
         {
             $res_lookup = substr($campo, $tmp_pos + 4);
             $campo = substr($campo, 0, $tmp_pos);
             if ($campo === "" && $condicao != "nu" && $condicao != "nn")
             {
                 return;
             }
         }
         $tmp_pos = strpos($this->cmp_formatado[$nome_campo], "##@@");
         if ($tmp_pos !== false)
         {
             $this->cmp_formatado[$nome_campo] = substr($this->cmp_formatado[$nome_campo], $tmp_pos + 4);
         }
         $this->and_or();
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         $campo2 = substr($this->Db->qstr($campo2), 1, -1);
         $nome_sum = "dbo.Temp_Merge_In_Out.$nome";
         if (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
         {
             $nome     = "str_replace (convert(char(10),$nome,102), '.', '-') + ' ' + convert(char(8),$nome,20)";
             $nome_sum = "str_replace (convert(char(10),$nome_sum,102), '.', '-') + ' ' + convert(char(8),$nome_sum,20)";
         }
         if (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
         {
             $nome     = "convert(char(23),$nome,121)";
             $nome_sum = "convert(char(23),$nome_sum,121)";
         }
         if (substr($tp_campo, 0, 5) == "TIMES" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
         {
             $nome     = "TO_DATE(TO_CHAR($nome, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
             $nome_sum = "TO_DATE(TO_CHAR($nome_sum, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
             $tp_campo = "DATE" . substr($tp_campo, 5);
         }
         if (substr($tp_campo, 0, 8) == "DATETIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
         {
             $nome     = "EXTEND($nome, YEAR TO FRACTION)";
             $nome_sum = "EXTEND($nome_sum, YEAR TO FRACTION)";
         }
         elseif (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
         {
             $nome     = "EXTEND($nome, YEAR TO DAY)";
             $nome_sum = "EXTEND($nome_sum, YEAR TO DAY)";
         }
         switch (strtoupper($condicao))
         {
            case "EQ":     // 
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " = " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower. " = " . $nm_aspas . $campo . $nm_aspas;
               $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "II":     // 
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " like '" . $campo . "%'";
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
               $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_strt'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "QP":     // 
               if (substr($tp_campo, 0, 4) == "DATE")
               {
                   $NM_cond    = "";
                   $NM_cmd     = "";
                   $NM_cmd_sum = "";
                   if ($this->NM_data_qp['ano'] != "____")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_andd'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_year'] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->NM_data_qp['ano'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : " and ";
                       $NM_cmd     .= "year($nome) = " . $this->NM_data_qp['ano'];
                       $NM_cmd_sum .= "year($nome_sum) = " . $this->NM_data_qp['ano'];
                   }
                   if ($this->NM_data_qp['mes'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_andd'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_mnth'] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->NM_data_qp['mes'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : " and ";
                       $NM_cmd     .= "month($nome) = " . $this->NM_data_qp['mes'];
                       $NM_cmd_sum .= "month($nome_sum) = " . $this->NM_data_qp['mes'];
                   }
                   if ($this->NM_data_qp['dia'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_andd'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_days'] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->NM_data_qp['dia'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : " and ";
                       $NM_cmd     .= "day($nome) = " . $this->NM_data_qp['dia'];
                       $NM_cmd_sum .= "day($nome_sum) = " . $this->NM_data_qp['dia'];
                   }
                   if (!empty($NM_cmd))
                   {
                       $NM_cmd     = " (" . $NM_cmd . ")";
                       $NM_cmd_sum = " (" . $NM_cmd_sum . ")";
                       $this->comando        .= $NM_cmd;
                       $this->comando_sum    .= $NM_cmd_sum;
                       $this->comando_filtro .= $NM_cmd;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $NM_cond . "##*@@";
                   }
               }
               else
               {
                   $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." like '%" . $campo . "%'";
                   $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " like '%" . $campo . "%'";
                   $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " like '%" . $campo . "%'";
                   $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               }
            break;
            case "DF":     // 
               if ($tp_campo == "DTDF" || $tp_campo == "DATEDF" || $tp_campo == "DATETIMEDF")
               {
                   $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " not like '%" . $campo . "%'";
                   $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " not like '%" . $campo . "%'";
                   $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " not like '%" . $campo . "%'";
               }
               else
               {
                   $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas;
                   $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas;
                   $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas;
               }
               $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_diff'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "GT":     // 
               $this->comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_sum    .= " $nome_sum > " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_filtro .= " $nome > " . $nm_aspas . $campo . $nm_aspas;
               $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $nmgp_lang['pesq_cond_maior'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "GE":     // 
               $this->comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_sum    .= " $nome_sum >= " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_filtro .= " $nome >= " . $nm_aspas . $campo . $nm_aspas;
               $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_grtr_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "LT":     // 
               $this->comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_sum    .= " $nome_sum < " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_filtro .= " $nome < " . $nm_aspas . $campo . $nm_aspas;
               $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_less'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "LE":     // 
               $this->comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_sum    .= " $nome_sum <= " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_filtro .= " $nome <= " . $nm_aspas . $campo . $nm_aspas;
               $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_less_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "BW":     // 
               if ($tp_campo == "DTDF" || $tp_campo == "DATEDF" || $tp_campo == "DATETIMEDF")
               {
                   $this->comando        .= " $nome not between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   $this->comando_sum    .= " $nome_sum not between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   $this->comando_filtro .= " $nome not between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_diff'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               }
               else
               {
                   $this->comando        .= " $nome between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   $this->comando_sum    .= " $nome_sum between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   $this->comando_filtro .= " $nome between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   if ($tp_campo == "DTEQ" || $tp_campo == "DATEEQ" || $tp_campo == "DATETIMEEQ")
                   {
                       $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
                   }
                   else
                   {
                       $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_betw'] . " " . $this->cmp_formatado[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_andd'] . " " . $this->cmp_formatado[$nome_campo . "_Input_2"] . "##*@@";
                   }
               }
            break;
            case "IN":     // 
               $nm_sc_valores = explode(",", $campo);
               $cond_str = "";
               $nm_cond  = "";
               if (!empty($nm_sc_valores))
               {
                   foreach ($nm_sc_valores as $nm_sc_valor)
                   {
                      if (in_array($campo_join, $Nm_numeric) && substr_count($nm_sc_valor, ".") > 1)
                      {
                         $nm_sc_valor = str_replace(".", "", $nm_sc_valor);
                      }
                      if ("" != $cond_str)
                      {
                         $cond_str .= ",";
                         $nm_cond  .= " " . $this->Ini->Nm_lang['lang_srch_orrr'] . " ";
                      }
                      $cond_str .= $nm_aspas . $nm_sc_valor . $nm_aspas;
                      $nm_cond  .= $nm_aspas . $nm_sc_valor . $nm_aspas;
                   }
               }
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $cond_str . ")";
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " in (" . $cond_str . ")";
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $cond_str . ")";
               $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $nm_cond . "##*@@";
            break;
            case "NU":     // 
               $this->comando        .= " $nome IS NULL ";
               $this->comando_sum    .= " $nome_sum IS NULL ";
               $this->comando_filtro .= " $nome IS NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_null'] ." " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "NN":     // 
               $this->comando        .= " $nome IS NOT NULL ";
               $this->comando_sum    .= " $nome_sum IS NOT NULL ";
               $this->comando_filtro .= " $nome IS NOT NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_nnul'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
         }
      }
   }

   /**
    * @access  public
    * @param  array  $data_arr  
    */
   function data_menor(&$data_arr)
   {
      $data_arr["ano"] = ("____" == $data_arr["ano"]) ? "0001" : $data_arr["ano"];
      $data_arr["mes"] = ("__" == $data_arr["mes"])   ? "01" : $data_arr["mes"];
      $data_arr["dia"] = ("__" == $data_arr["dia"])   ? "01" : $data_arr["dia"];
      $data_arr["hor"] = ("__" == $data_arr["hor"])   ? "00" : $data_arr["hor"];
      $data_arr["min"] = ("__" == $data_arr["min"])   ? "00" : $data_arr["min"];
      $data_arr["seg"] = ("__" == $data_arr["seg"])   ? "00" : $data_arr["seg"];
   }

   /**
    * @access  public
    * @param  array  $data_arr  
    */
   function data_maior(&$data_arr)
   {
      $data_arr["ano"] = ("____" == $data_arr["ano"]) ? "9999" : $data_arr["ano"];
      $data_arr["mes"] = ("__" == $data_arr["mes"])   ? "12" : $data_arr["mes"];
      $data_arr["hor"] = ("__" == $data_arr["hor"])   ? "23" : $data_arr["hor"];
      $data_arr["min"] = ("__" == $data_arr["min"])   ? "59" : $data_arr["min"];
      $data_arr["seg"] = ("__" == $data_arr["seg"])   ? "59" : $data_arr["seg"];
      if ("__" == $data_arr["dia"])
      {
          $data_arr["dia"] = "31";
          if ($data_arr["mes"] == "04" || $data_arr["mes"] == "06" || $data_arr["mes"] == "09" || $data_arr["mes"] == "11")
          {
              $data_arr["dia"] = 30;
          }
          elseif ($data_arr["mes"] == "02")
          { 
                  if  ($data_arr["ano"] % 4 == 0)
                  {
                       $data_arr["dia"] = 29;
                  }
                  else 
                  {
                       $data_arr["dia"] = 28;
                  }
          }
      }
   }

   /**
    * @access  public
    * @param  string  $nm_data_hora  
    */
   function limpa_dt_hor_pesq(&$nm_data_hora)
   {
      $nm_data_hora = str_replace("Y", "", $nm_data_hora); 
      $nm_data_hora = str_replace("M", "", $nm_data_hora); 
      $nm_data_hora = str_replace("D", "", $nm_data_hora); 
      $nm_data_hora = str_replace("H", "", $nm_data_hora); 
      $nm_data_hora = str_replace("I", "", $nm_data_hora); 
      $nm_data_hora = str_replace("S", "", $nm_data_hora); 
      $tmp_pos = strpos($nm_data_hora, "--");
      if ($tmp_pos !== FALSE)
      {
          $nm_data_hora = str_replace("--", "-", $nm_data_hora); 
      }
      $tmp_pos = strpos($nm_data_hora, "::");
      if ($tmp_pos !== FALSE)
      {
          $nm_data_hora = str_replace("::", ":", $nm_data_hora); 
      }
   }

   /**
    * @access  public
    */
   function retorna_pesq()
   {
      global $nm_apl_dependente;
   $NM_retorno = "Merge_In_Out.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML>
<HEAD>
 <TITLE>Time In & Time Out Counter</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
</HEAD>
<BODY class="scGridPage">
<FORM style="display:none;" name="form_ok" method="POST" action="<?php echo $NM_retorno; ?>" target="_self">
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="pesq"> 
</FORM>
<SCRIPT type="text/javascript">
 document.form_ok.submit();
</SCRIPT>
</BODY>
</HTML>
<?php
}

   /**
    * @access  public
    */
   function monta_html_ini()
   {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Time In & Time Out Counter</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_filter.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_error.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Str_btn_filter_css ?>" /> 
</HEAD>
<BODY class="scFilterPage">
<?php echo $this->Ini->Ajax_result_set ?>
<SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_js . "/browserSniffer.js" ?>"></SCRIPT>
<SCRIPT type="text/javascript" src="../_lib/js/tab_erro_<?php echo $this->Ini->str_lang; ?>.js"></SCRIPT>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery/js/jquery.js"></script>
 <script type="text/javascript" src="../_lib/lib/js/jquery.scInput.js"></script>
 <script type="text/javascript">var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';</script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
 <SCRIPT type="text/javascript">

var nmdg_Form = "F1";

 $(function() {

   SC_carga_evt_jquery();
   $('input:text.sc-js-input').listen();
 });
var NM_index = 0;
var NM_hidden = new Array();
var NM_IE = (navigator.userAgent.indexOf('MSIE') > -1) ? 1 : 0;
function NM_hitTest(o, l)
{
    function getOffset(o){
        for(var r = {l: o.offsetLeft, t: o.offsetTop, r: o.offsetWidth, b: o.offsetHeight};
            o = o.offsetParent; r.l += o.offsetLeft, r.t += o.offsetTop);
        return r.r += r.l, r.b += r.t, r;
    }
    for(var b, s, r = [], a = getOffset(o), j = isNaN(l.length), i = (j ? l = [l] : l).length; i;
        b = getOffset(l[--i]), (a.l == b.l || (a.l > b.l ? a.l <= b.r : b.l <= a.r))
        && (a.t == b.t || (a.t > b.t ? a.t <= b.b : b.t <= a.b)) && (r[r.length] = l[i]));
    return j ? !!r.length : r;
}
var tem_obj = false;
function NM_show_menu(nn)
{
    if (!NM_IE)
    {
         return;
    }
    x = document.getElementById(nn);
    x.style.display = "block";
    obj_sel = document.body;
    tem_obj = true;
    x.ieFix = NM_hitTest(x, obj_sel.getElementsByTagName("select"));
    for (i = 0; i <  x.ieFix.length; i++)
    {
      if (x.ieFix[i].style.visibility != "hidden")
      {
          x.ieFix[i].style.visibility = "hidden";
          NM_hidden[NM_index] = x.ieFix[i];
          NM_index++;
      }
    }
}
function NM_hide_menu()
{
    if (!NM_IE)
    {
         return;
    }
    obj_del = document.body;
    if (tem_obj && obj_del == obj_sel)
    {
        for(var i = NM_hidden.length; i; NM_hidden[--i].style.visibility = "visible");
    }
    NM_index = 0;
    NM_hidden = new Array();
}
 function nm_refresh_form()
 {
  document.F1.bprocessa.value = "recarga";
  document.F1.target = "_self";
  document.F1.submit();
 }
function nm_open_popup(parms)
{
    NovaJanela = window.open (parms, '', 'resizable, scrollbars');
}
 </SCRIPT>
<?php
include_once("Merge_In_Out_sajax_js.php");
?>
<script type="text/javascript">
 $(function() {
 });
</script>
 <FORM name="F1" action="Merge_In_Out.php" method="post" target="_self"> 
 <INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
 <INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
 <INPUT type="hidden" name="nmgp_opcao" value="busca"> 
 <INPUT type="image" id="SC_No_submit" src="<?php echo $this->Ini->path_imag_cab; ?>/scriptcase__NM__nm_transparent.gif" onClick="return false;" width="0" height="0"> 
 <div id="idJSSpecChar" style="display:none;"></div>
 <div id="id_div_process" style="display: none; position: absolute"><table class="scFilterTable"><tr><td class="scFilterLabelOdd"><?php echo $this->Ini->Nm_lang['lang_othr_prcs']; ?>...</td></tr></table></div>
 <div id="id_fatal_error" class="scFilterFieldOdd" style="display:none; position: absolute"></div>
<table width="100%" style="border-collapse: collapse"><tr><td style="padding: 0px">
 <div id="NM_mostra_erro" style="display:none;">
<TABLE class="scErrorTable" cellspacing="0" cellpadding="0" align="center">
 <TR>
  <TD class="scErrorTitle" align="left"><?php echo $this->Ini->Nm_lang["gr_erro"]; ?></TD>
 </TR>
 <TR>
  <TD class="scErrorMessage" align="center"><span id="NM_erro_crit"></span></TD>
 </TR>
</TABLE> </div>
  </td></tr><tr><td style="padding: 0px">
<script type="text/javascript">
function NM_exibe_erro(mens)
{
 document.getElementById('NM_mostra_erro').style.display='';
 document.getElementById('NM_erro_crit').innerHTML = mens;
}
function NM_apaga_erro()
{
 document.getElementById('NM_mostra_erro').style.display='none';
 document.getElementById('NM_erro_crit').innerHTML = '';
}
</script>
<table style="padding: 0px; spacing: 0px; border-width: 0px;" align="center" valign="top" width="100%"><tr><td style="padding: 0px">
<TABLE class="scFilterBorder" align="center" valign="top" >
<?php
   }

   /**
    * @access  public
    * @global  string  $bprocessa  
    */
   /**
    * @access  public
    */
   function monta_cabecalho()
   {
      $Str_date = strtolower($_SESSION['scriptcase']['reg_conf']['date_format']);
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
      $Str  = "";
      foreach ($Arr_D as $Cada_d)
      {
          $Str .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
          $Str .= $Cada_d;
          $Prim = false;
      }
      $Str = str_replace("a", "Y", $Str);
      $Str = str_replace("y", "Y", $Str);
      $nm_data_fixa = date($Str); 
?>
 <TR align="center">
  <TD class="scFilterTableTd">
   <TABLE width="100%">
    <TR align="center">
     <TD style="padding: 0px">
      <TABLE border="0" cellpadding="0" cellspacing="0" width="100%" >
       <TR valign="middle">
        <TD align="left" width="90%">&nbsp;</TD>
        <TD align="left" class="scFilterHeader" width="20"><IMG src="<?php echo $this->Ini->path_imag_cab; ?>/scriptcase__NM__HeaderThin20.gif" border="0"></TD>
        <TD nowrap align="right" class="scFilterHeader" >
        	<span style="padding-right:10px;" class="scFilterHeaderFont"><?php echo "Search Option" ?><span>
        </TD>
       </TR>

       <TR valign="middle">
        <TD colspan="3" align="left" class="scFilterHeader" height="2"></TD>
        </TR>
      </TABLE>
     </TD>
    </TR>
   </TABLE>  </TD>
 </TR>
<?php
   }

   /**
    * @access  public
    * @global  string  $nm_url_saida  $this->Ini->Nm_lang['pesq_global_nm_url_saida']
    * @global  integer  $nm_apl_dependente  $this->Ini->Nm_lang['pesq_global_nm_apl_dependente']
    * @global  string  $nmgp_parms  
    * @global  string  $bprocessa  $this->Ini->Nm_lang['pesq_global_bprocessa']
    */
   function monta_form()
   {
      global 
             $dates_cond, $dates,
             $nm_url_saida, $nm_apl_dependente, $nmgp_parms, $bprocessa, $nmgp_save_name, $NM_operador, $NM_filters, $nmgp_save_option, $NM_filters_del, $Script_BI;
      $Script_BI = "";
      $this->nmgp_botoes['clear'] = "on";
      $this->nmgp_botoes['save'] = "on";
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['Merge_In_Out']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['Merge_In_Out']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['Merge_In_Out']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("Merge_In_Out", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $nmgp_tab_label = "";
      $delimitador = "##@@";
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['campos_busca']) && $bprocessa != "recarga" && $bprocessa != "save_form" && $bprocessa != "filter_save" && $bprocessa != "filter_delete")
      { 
          $dates = $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['campos_busca']['dates']; 
          $dates_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['campos_busca']['dates_cond']; 
          $this->NM_operador = $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['campos_busca']['NM_operador']; 
      } 
      if (!isset($dates_cond) || empty($dates_cond))
      {
         $dates_cond = "eq";
      }
      if (!isset($hours_cond) || empty($hours_cond))
      {
         $hours_cond = "eq";
      }
      if (!isset($count_in_cond) || empty($count_in_cond))
      {
         $count_in_cond = "eq";
      }
      if (!isset($count_out_cond) || empty($count_out_cond))
      {
         $count_out_cond = "nn";
      }
      if (!isset($dates) || $dates == "")
      {
          $dates = "";
      }
      if (isset($dates) && !empty($dates))
      {
         $tmp_pos = strpos($dates, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $dates = substr($dates, 0, $tmp_pos);
         }
      }
?>
 <TR align="center">
  <TD class="scFilterTableTd">
   <table width="100%" class="scFilterToolbar"><tr>
    <td class="scFilterToolbarPadding" align="left" width="33%" nowrap>
    </td>
    <td class="scFilterToolbarPadding" align="center" width="33%" nowrap>
    </td>
    <td class="scFilterToolbarPadding" align="right" width="33%" nowrap>
<?php
      if ( isset($_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['sc_modal'])
   {
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.form_cancel.submit()", "document.form_cancel.submit()", "sc_b_cancel_", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
<?php
   }
?>
<?php
   if (is_file("Merge_In_Out_help.txt"))
   {
      $Arq_WebHelp = file("Merge_In_Out_help.txt"); 
      if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
      {
          $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
          $Tmp = explode(";", $Arq_WebHelp[0]); 
          foreach ($Tmp as $Cada_help)
          {
              $Tmp1 = explode(":", $Cada_help); 
              if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "fil" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
              {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "sc_b_help_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
<?php
              }
          }
      }
   }
?>
    </td>
   </tr></table>
  </TD>
 </TR>
 <TR align="center">
  <TD class="scFilterTableTd">
   <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
   <TR valign="top" >
  <TD width="100%" height="">
   <TABLE class="scFilterTable" id="hidden_bloco_0" valign="top" width="100%" style="height: 100%;">
   <tr>





      <TD class="scFilterLabelOdd"><?php echo (isset($this->New_label['dates'])) ? $this->New_label['dates'] : "Date"; ?></TD>
      
      <INPUT type="hidden" name="dates_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['dates'])) ? $this->New_label['dates'] : "Date";
 $nmgp_tab_label .= "dates?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>

<?php
      $nmgp_def_dados = "" ; 
      $nm_comando = "SELECT     TOP (100) PERCENT Dates FROM         dbo.Temp_Merge_In_Out GROUP BY Dates ORDER BY Dates DESC"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $nmgp_def_dados .= trim($rs->fields[0]) . "?#?" ; 
            $nmgp_def_dados .= trim($rs->fields[0]) . "?#?N?@?" ; 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
?>
   <span id="idAjaxSelect_dates">
      <SELECT class="scFilterObjectOdd" style="width:125px;" name="dates" onChange="nm_refresh_form()" size="1">
<?php
      $nm_opcoes = explode("?@?", $nmgp_def_dados);
      foreach ($nm_opcoes as $nm_opcao)
      {
         if (!empty($nm_opcao))
         {
            $temp_bug_list                                = explode("?#?", $nm_opcao);
            list($nm_opc_val, $nm_opc_cod, $nm_opc_sel) = $temp_bug_list;
            if ("" != $dates)
            {
                    $dates_sel = ($nm_opc_cod === $dates) ? "selected" : "";
            }
            else
            {
               $dates_sel = ("S" == $nm_opc_sel) ? "selected" : "";
            }
            $nm_sc_valor = $nm_opc_val;
            $nm_opc_val = $nm_sc_valor;
?>
       <OPTION value="<?php echo NM_encode_input($nm_opc_cod . $delimitador . $nm_opc_val); ?>" <?php echo $dates_sel; ?>><?php echo $nm_opc_val; ?></OPTION>
<?php
         }
      }
?>
      </SELECT>
   </span>
<?php
?>
        
        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr>
   </TABLE>
  </TD>
 </TR>
 </TABLE>
 </TD>
 </TR>
 <TR align="center">
  <TD class="scFilterTableTd">
<INPUT type="hidden" name="NM_operador" value="and">   <INPUT type="hidden" name="nmgp_tab_label" value="<?php echo NM_encode_input($nmgp_tab_label); ?>"> 
   <INPUT type="hidden" name="bprocessa" value="pesq"> 
  </TD>
 </TR>
 <TR align="center">
  <TD class="scFilterTableTd">
   <table width="100%" class="scFilterToolbar"><tr>
    <td class="scFilterToolbarPadding" align="left" width="33%" nowrap>
    </td>
    <td class="scFilterToolbarPadding" align="center" width="33%" nowrap>
    </td>
    <td class="scFilterToolbarPadding" align="right" width="33%" nowrap>
<?php
   if (is_file("Merge_In_Out_help.txt"))
   {
      $Arq_WebHelp = file("Merge_In_Out_help.txt"); 
      if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
      {
          $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
          $Tmp = explode(";", $Arq_WebHelp[0]); 
          foreach ($Tmp as $Cada_help)
          {
              $Tmp1 = explode(":", $Cada_help); 
              if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "fil" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
              {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "sc_b_help_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
<?php
              }
          }
      }
   }
?>
    </td>
   </tr></table>
  </TD>
 </TR>
<?php
   }

   function monta_html_fim()
   {
       global $bprocessa, $nm_url_saida, $Script_BI;
?>

</td></tr></table><tr><td>
<table align="center" valign="top" width="100%"><tr><td>
<?php
if (isset($bprocessa) && "recarga" == $bprocessa)
{ }
else
{
?>
<iframe id="nmsc_iframe_Merge_In_Out" frameborder="0" marginwidth="0px" marginheight="0px" topmargin="0px" leftmargin="0px" align="center" height="1500px" name="nm_iframe_Merge_In_Out" scrolling="auto" src="Merge_In_Out.php?nmgp_opcao=pesq&script_case_init=<?php echo NM_encode_input($this->Ini->sc_page) ?>&script_case_session=<?php echo session_id() ?>" width="100%"></iframe>
<?php
}
?>
</td></tr></table></td></tr>
</TABLE>
   <INPUT type="hidden" name="form_condicao" value="3">
</FORM> 
   <FORM style="display:none;" name="form_cancel"  method="POST" action="<?php echo $nm_url_saida; ?>" target="_self"> 
   <INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
   <INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<?php
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['orig_pesq'] == "grid")
   {
       $Ret_cancel_pesq = "volta_grid";
   }
   else
   {
       $Ret_cancel_pesq = "resumo";
   }
?>
   <INPUT type="hidden" name="nmgp_opcao" value="<?php echo $Ret_cancel_pesq; ?>"> 
   </FORM> 
<SCRIPT type="text/javascript">
 function nm_submit_form()
 {
    document.F1.target = "nm_iframe_Merge_In_Out";
    document.F1.submit();
 }
 function limpa_form()
 {
   document.F1.reset();
   NM_apaga_erro();
   document.F1.dates.value = "";
 }
function nm_tabula(obj, tam, cond)
{
   if (obj.value.length == tam)
   {
       for (i=0; i < document.F1.elements.length;i++)
       {
            if (document.F1.elements[i].name == obj.name)
            {
                i++;
                campo = document.F1.elements[i].name;
                campo2 = campo.lastIndexOf('_input_2');
                if (document.F1.elements[i].type == 'text' && (campo2 == -1 || cond == 'bw'))
                {
                    eval('document.F1.' + campo + '.focus()');
                }
                break;
            }
       }
   }
}
 function SC_carga_evt_jquery()
 {
 }
</SCRIPT>
</BODY>
</HTML>
<?php
   }

   /**
    * @access  public
    * @param  string  $NM_operador  $this->Ini->Nm_lang['pesq_global_NM_operador']
    * @param  array  $nmgp_tab_label  
    */
   function inicializa_vars()
   {
      global $NM_operador, $nmgp_tab_label;

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/");  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1);  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "Merge_In_Out.php";
      $this->Campos_Mens_erro = ""; 
      $this->nm_data = new nm_data("en_us");
      $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['cond_pesq'] = "";
      if (!empty($nmgp_tab_label))
      {
         $nm_tab_campos = explode("?@?", $nmgp_tab_label);
         $nmgp_tab_label = array();
         foreach ($nm_tab_campos as $cada_campo)
         {
             $parte_campo = explode("?#?", $cada_campo);
             $nmgp_tab_label[$parte_campo[0]] = $parte_campo[1];
         }
      }
      $this->comando        = $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['where_orig'];
      $this->comando_sum    = "";
      $this->comando_filtro = "";
      $this->comando_ini    = "ini";
      $this->comando_fim    = "";
      $this->NM_operador    = (isset($NM_operador) && ("and" == strtolower($NM_operador) || "or" == strtolower($NM_operador))) ? $NM_operador : "and";
   }

   /**
    * @access  public
    */
   function trata_campos()
   {
      global $dates_cond, $dates, $nmgp_tab_label;

      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $dates_cond_salva = $dates_cond; 
      if (!isset($dates_input_2) || $dates_input_2 == "")
      {
          $dates_input_2 = $dates;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['campos_busca']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['campos_busca']['dates'] = $dates; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['campos_busca']['dates_cond'] = $dates_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['campos_busca']['NM_operador'] = $this->NM_operador; 
      $Conteudo = $dates;
      if (strpos($Conteudo, "##@@") !== false)
      {
          $Conteudo = substr($Conteudo, strpos($Conteudo, "##@@") + 4);
      }
      $this->cmp_formatado['dates'] = $Conteudo;

      //----- $dates
      if (isset($dates))
      {
         $this->monta_condicao("Dates", $dates_cond, $dates, "", "dates");
      }
   }

   /**
    * @access  public
    */
   function finaliza_resultado()
   {

      $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['where_pesq_lookup']  = $this->comando_sum . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['where_pesq']         = $this->comando . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['opcao']              = "pesq";
      $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['prim_vez']           = "N";
      if ("" == $this->comando_filtro)
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['where_pesq_filtro'] = "";
      }
      else
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['where_pesq_filtro'] = " (" . $this->comando_filtro . ")";
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['where_pesq'] != $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['where_pesq_ant'])
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['cond_pesq'] .= $this->NM_operador;
         $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['contr_array_resumo'] = "NAO";
         $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['contr_total_geral']  = "NAO";
         unset($_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['tot_geral']);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['where_pesq_ant'] = $this->comando . $this->comando_fim;
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['Merge_In_Out']['fast_search']);

      echo "<script type=\"text/javascript\">"; 
      echo "parent.NM_apaga_erro()";
      echo "</script>"; 
      $this->retorna_pesq();
   }
   
   function css_obj_select_ajax($Obj)
   {
      switch ($Obj)
      {
         case "dates" : return ('class="scFilterObjectOdd" style="width:125px;"'); break;
         default       : return ("");
      }
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
}

?>
