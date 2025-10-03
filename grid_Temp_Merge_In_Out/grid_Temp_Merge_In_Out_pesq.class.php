<?php

class grid_Temp_Merge_In_Out_pesq
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
   function grid_Temp_Merge_In_Out_pesq()
   {
      $this->dates_opc_bi[] = "TP";
      $this->dates_opc_bi[] = "HJ";
      $this->dates_opc_bi[] = "OT";
      $this->dates_opc_bi[] = "U7";
      $this->dates_opc_bi[] = "SP";
      $this->dates_opc_bi[] = "US";
      $this->dates_opc_bi[] = "MM";
      $this->dates_opc_bi[] = "UM";
      $this->dates_opc_bi[] = "AM";
      $this->dates_opc_bi[] = "PS";
      $this->dates_opc_bi[] = "SS";
      $this->dates_opc_bi[] = "P3";
      $this->dates_opc_bi[] = "PM";
      $this->dates_opc_bi[] = "P7";
      $this->dates_opc_bi[] = "CY";
      $this->dates_opc_bi[] = "LY";
      $this->dates_opc_bi[] = "M24";
      $this->dates_opc_bi[] = "M18";
      $this->dates_opc_bi[] = "YY";
      $this->dates_opc_bi[] = "M6";
      $this->dates_opc_bi[] = "M3";
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['path_libs_php'] = $this->Ini->path_lib_php;
      $this->Img_sep_filter = "/" . trim($str_toolbar_separator);
      $this->Block_img_col  = trim($str_block_col);
      $this->Block_img_exp  = trim($str_block_exp);
      $this->Bubble_tail    = trim($str_bubble_tail);
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_config_btn.php", "F", "nmButtonOutput"); 
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['param']['buffer_output'] = true;
          ob_start();
          $this->processa_ajax();
          $this->Db->Close(); 
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['opcao'] = "igual";
   }

   function processa_ajax()
   {
      global 
      $hours_cond, $hours,
             $count_in_cond, $count_in,
             $count_out_cond, $count_out,
             $dates_cond, $dates, $dates_dia, $dates_mes, $dates_ano, $dates_input_2_dia, $dates_input_2_mes, $dates_input_2_ano,
      $NM_filters, $NM_filters_del, $nmgp_save_name, $NM_operador, $nmgp_save_option, $bprocessa, $Ajax_label, $Ajax_val, $Campo_bi, $Opc_bi;
      $this->init();
      if (isset($this->NM_ajax_info['param']['hours_cond']))
      {
          $hours_cond = $this->NM_ajax_info['param']['hours_cond'];
      }
      if (isset($this->NM_ajax_info['param']['hours']))
      {
          $hours = $this->NM_ajax_info['param']['hours'];
      }
      if (isset($this->NM_ajax_info['param']['count_in_cond']))
      {
          $count_in_cond = $this->NM_ajax_info['param']['count_in_cond'];
      }
      if (isset($this->NM_ajax_info['param']['count_in']))
      {
          $count_in = $this->NM_ajax_info['param']['count_in'];
      }
      if (isset($this->NM_ajax_info['param']['count_out_cond']))
      {
          $count_out_cond = $this->NM_ajax_info['param']['count_out_cond'];
      }
      if (isset($this->NM_ajax_info['param']['count_out']))
      {
          $count_out = $this->NM_ajax_info['param']['count_out'];
      }
      if (isset($this->NM_ajax_info['param']['dates_cond']))
      {
          $dates_cond = $this->NM_ajax_info['param']['dates_cond'];
      }
      if (isset($this->NM_ajax_info['param']['dates']))
      {
          $dates = $this->NM_ajax_info['param']['dates'];
      }
      if (isset($this->NM_ajax_info['param']['dates_dia']))
      {
          $dates_dia = $this->NM_ajax_info['param']['dates_dia'];
      }
      if (isset($this->NM_ajax_info['param']['dates_mes']))
      {
          $dates_mes = $this->NM_ajax_info['param']['dates_mes'];
      }
      if (isset($this->NM_ajax_info['param']['dates_ano']))
      {
          $dates_ano = $this->NM_ajax_info['param']['dates_ano'];
      }
      if (isset($this->NM_ajax_info['param']['dates_input_2_dia']))
      {
          $dates_input_2_dia = $this->NM_ajax_info['param']['dates_input_2_dia'];
      }
      if (isset($this->NM_ajax_info['param']['dates_input_2_mes']))
      {
          $dates_input_2_mes = $this->NM_ajax_info['param']['dates_input_2_mes'];
      }
      if (isset($this->NM_ajax_info['param']['dates_input_2_ano']))
      {
          $dates_input_2_ano = $this->NM_ajax_info['param']['dates_input_2_ano'];
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
                  $Opt_filter .= "<option value=\"\">" . grid_Temp_Merge_In_Out_pack_protect_string($Nome_filter) . "</option>\r\n";
              }
              $Opt_filter .= "<option value=\"" . grid_Temp_Merge_In_Out_pack_protect_string($Tipo_filter[0]) . "\">.." . grid_Temp_Merge_In_Out_pack_protect_string($Cada_filter) .  "</option>\r\n";
          }
          $Ajax_select = "<SELECT id=\"sel_recup_filters_bot\" name=\"NM_filters_bot\" onChange=\"nm_submit_filter(this, 'bot')\" size=\"1\">\r\n";
          $this->NM_ajax_info['fldList']['NM_filters_bot'] = array(
                     'type'    => "select",
                     'optList' => $Ajax_select . $Opt_filter . "</SELECT>\r\n",
                     );
          $Ajax_select = "<SELECT id=\"sel_filters_del_bot\" name=\"NM_filters_del_bot\" size=\"1\">\r\n";
          $this->NM_ajax_info['fldList']['NM_filters_del_bot'] = array(
                     'type'    => "select",
                     'optList' => $Ajax_select . $Opt_filter . "</SELECT>\r\n",
                     );
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
                  $Opt_filter .= "<option value=\"\">" .  grid_Temp_Merge_In_Out_pack_protect_string($Nome_filter) . "</option>\r\n";
              }
              $Opt_filter .= "<option value=\"" . grid_Temp_Merge_In_Out_pack_protect_string($Tipo_filter[0]) . "\">.." . grid_Temp_Merge_In_Out_pack_protect_string($Cada_filter) .  "</option>\r\n";
          }
          $Ajax_select = "<SELECT id=\"sel_recup_filters_bot\" name=\"NM_filters_bot\" onChange=\"nm_submit_filter(this, 'bot')\" size=\"1\">\r\n";
          $this->NM_ajax_info['fldList']['NM_filters_bot'] = array(
                     'type'    => "select",
                     'optList' => $Ajax_select . $Opt_filter . "</SELECT>\r\n",
                     );
          $Ajax_select = "<SELECT id=\"sel_filters_del_bot\" name=\"NM_filters_del_bot\" size=\"1\">\r\n";
          $this->NM_ajax_info['fldList']['NM_filters_del_bot'] = array(
                     'type'    => "select",
                     'optList' => $Ajax_select . $Opt_filter . "</SELECT>\r\n",
                     );
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
          scriptcase_error_display($this->Campos_Mens_erro, ""); 
          $this->monta_formulario();
      }
      else
      {
          $this->finaliza_resultado();
      }
   }

   /**
    * @access  public
    */
   function testa_browser()
   {
      $valido = FALSE;
      if (FALSE !== strpos($_SERVER['HTTP_USER_AGENT'], "MSIE 5.5"))
      {
         $valido = TRUE;
      }
      elseif (FALSE !== strpos($_SERVER['HTTP_USER_AGENT'], "MSIE 6"))
      {
         $valido = TRUE;
      }
      elseif (FALSE !== strpos($_SERVER['HTTP_USER_AGENT'], "Mozilla"))
      {
         $valido = TRUE;
      }
      return ($valido);
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
      $Nm_numeric[] = "count_in";$Nm_numeric[] = "count_out";$Nm_numeric[] = "link";
      $campo_join = strtolower(str_replace(".", "_", $nome));
      if (in_array($campo_join, $Nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['decimal_db'] == ".")
         {
            $nm_aspas = "";
         }
         if ($condicao != "in")
         {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['decimal_db'] == ".")
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
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "II":     // 
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " like '" . $campo . "%'";
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_strt'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
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
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $NM_cond . "##*@@";
                   }
               }
               else
               {
                   $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." like '%" . $campo . "%'";
                   $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " like '%" . $campo . "%'";
                   $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " like '%" . $campo . "%'";
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
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
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_diff'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "GT":     // 
               $this->comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_sum    .= " $nome_sum > " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_filtro .= " $nome > " . $nm_aspas . $campo . $nm_aspas;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $nmgp_lang['pesq_cond_maior'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "GE":     // 
               $this->comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_sum    .= " $nome_sum >= " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_filtro .= " $nome >= " . $nm_aspas . $campo . $nm_aspas;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_grtr_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "LT":     // 
               $this->comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_sum    .= " $nome_sum < " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_filtro .= " $nome < " . $nm_aspas . $campo . $nm_aspas;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_less'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "LE":     // 
               $this->comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_sum    .= " $nome_sum <= " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_filtro .= " $nome <= " . $nm_aspas . $campo . $nm_aspas;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_less_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "BW":     // 
               if ($tp_campo == "DTDF" || $tp_campo == "DATEDF" || $tp_campo == "DATETIMEDF")
               {
                   $this->comando        .= " $nome not between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   $this->comando_sum    .= " $nome_sum not between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   $this->comando_filtro .= " $nome not between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_diff'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               }
               else
               {
                   $this->comando        .= " $nome between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   $this->comando_sum    .= " $nome_sum between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   $this->comando_filtro .= " $nome between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   if ($tp_campo == "DTEQ" || $tp_campo == "DATEEQ" || $tp_campo == "DATETIMEEQ")
                   {
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
                   }
                   else
                   {
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_betw'] . " " . $this->cmp_formatado[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_andd'] . " " . $this->cmp_formatado[$nome_campo . "_Input_2"] . "##*@@";
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
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $nm_cond . "##*@@";
            break;
            case "NU":     // 
               $this->comando        .= " $nome IS NULL ";
               $this->comando_sum    .= " $nome_sum IS NULL ";
               $this->comando_filtro .= " $nome IS NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_null'] ." " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "NN":     // 
               $this->comando        .= " $nome IS NOT NULL ";
               $this->comando_sum    .= " $nome_sum IS NOT NULL ";
               $this->comando_filtro .= " $nome IS NOT NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_nnul'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
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
   $NM_retorno = "grid_Temp_Merge_In_Out.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_srch_titl'] ?> - dbo.Temp_Merge_In_Out</TITLE>
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
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_srch_titl'] ?> - dbo.Temp_Merge_In_Out</TITLE>
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
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_form.css" /> 
</HEAD>
<BODY class="scFilterPage">
<?php echo $this->Ini->Ajax_result_set ?>
<SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_js . "/browserSniffer.js" ?>"></SCRIPT>
<SCRIPT type="text/javascript" src="../_lib/js/tab_erro_<?php echo $this->Ini->str_lang; ?>.js"></SCRIPT>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery/js/jquery.js"></script>
 <script type="text/javascript" src="../_lib/lib/js/jquery.scInput.js"></script>
 <script type="text/javascript">var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';</script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
<?php
$Cod_Btn = nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo $Cod_Btn ?>&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>
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
 function nm_campos_between(nm_campo, nm_cond, nm_nome_obj)
 {
  opc = nm_cond.value;
  if (opc == "TP" || opc == "HJ" || opc == "OT" || opc == "U7" || opc == "SP" || opc == "US" || opc == "MM" || opc == "UM" || opc == "AM" || opc == "PS" || opc == "SS" || opc == "P3" || opc == "PM" || opc == "P7" || opc == "CY" || opc == "LY" || opc == "YY" || opc == "M6" || opc == "M3" || opc == "M18" || opc == "M24")
  {
      xx = eval("document.getElementById('opc_bi_TP_" + nm_nome_obj + "').style.display = 'none'");
      grid_Temp_Merge_In_Out_do_ajax_proc_bi(nm_nome_obj, nm_cond.value);
  }
  else
  {
      if (nm_nome_obj == "dates")
      {
          xx = eval("document.getElementById('Nm_bi_dados_" + nm_nome_obj + "').style.display = 'none'");
          xx = eval("document.getElementById('opc_bi_TP_" + nm_nome_obj + "').style.display = ''");
      }
  }
  if (nm_cond.value == "bw")
  {
   nm_campo.style.display = "";
  }
  else
  {
    if (nm_campo)
    {
      nm_campo.style.display = "none";
    }
  }
 }
 function nm_save_form(pos)
 {
  if (pos == 'top' && document.F1.nmgp_save_name_top.value == '')
  {
      return;
  }
  if (pos == 'bot' && document.F1.nmgp_save_name_bot.value == '')
  {
      return;
  }
  document.F1.bprocessa.value = "save_form";
  grid_Temp_Merge_In_Out_do_ajax_save_filter(pos);
 }
 function nm_submit_filter(obj_sel, pos)
 {
  index   = obj_sel.selectedIndex;
  if (obj_sel.options[index].value == "") 
  {
      return false;
  }
  document.F1.bprocessa.value = "filter_save";
  grid_Temp_Merge_In_Out_do_ajax_change_filter(pos);
 }
 function nm_submit_filter_del(pos)
 {
  if (pos == 'top')
  {
      obj_sel = document.F1.elements['NM_filters_del_top'];
  }
  if (pos == 'bot')
  {
      obj_sel = document.F1.elements['NM_filters_del_bot'];
  }
  index   = obj_sel.selectedIndex;
  if (obj_sel.options[index].value == "") 
  {
      return false;
  }
  document.F1.bprocessa.value = "filter_delete";
  grid_Temp_Merge_In_Out_do_ajax_delete_filter(pos);
 }
function nm_open_popup(parms)
{
    NovaJanela = window.open (parms, '', 'resizable, scrollbars');
}
 </SCRIPT>
<?php
include_once("grid_Temp_Merge_In_Out_sajax_js.php");
?>
<script type="text/javascript">
 $(function() {
 });
</script>
 <FORM name="F1" action="grid_Temp_Merge_In_Out.php" method="post" target="_self"> 
 <INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
 <INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
 <INPUT type="hidden" name="nmgp_opcao" value="busca"> 
 <INPUT type="image" id="SC_No_submit" src="<?php echo $this->Ini->path_imag_cab; ?>/scriptcase__NM__nm_transparent.gif" onClick="return false;" width="0" height="0"> 
 <div id="idJSSpecChar" style="display:none;"></div>
 <div id="id_div_process" style="display: none; position: absolute"><table class="scFilterTable"><tr><td class="scFilterLabelOdd"><?php echo $this->Ini->Nm_lang['lang_othr_prcs']; ?>...</td></tr></table></div>
 <div id="id_fatal_error" class="scFilterFieldOdd" style="display:none; position: absolute"></div>
<TABLE id="main_table" class="scFilterBorder" align="center" valign="top" >
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
<style>
#lin1_col1 { padding-left:9px; padding-top:7px;  height:27px; overflow:hidden; text-align:left;}			 
#lin1_col2 { padding-right:9px; padding-top:7px; height:27px; text-align:right; overflow:hidden;   font-size:12px; font-weight:normal;}
</style>

<div style="width: 100%">
 <div class="scFilterHeader" style="height:11px; display: block; border-width:0px; "></div>
 <div style="height:37px; background-color:#FFFFFF; border-width:0px 0px 1px 0px;  border-style: dashed; border-color:#ddd; display: block">
 	<table style="width:100%; border-collapse:collapse; padding:0;">
    	<tr>
        	<td id="lin1_col1" class="scFilterHeaderFont"><span><?php echo $this->Ini->Nm_lang['lang_othr_srch_titl'] ?> - dbo.Temp_Merge_In_Out</span></td>
            <td id="lin1_col2" class="scFilterHeaderFont"><span><?php echo $nm_data_fixa; ?></span></td>
        </tr>
    </table>		 
 </div>
</div>
  </TD>
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
             $hours_cond, $hours,
             $count_in_cond, $count_in,
             $count_out_cond, $count_out,
             $dates_cond, $dates, $dates_dia, $dates_mes, $dates_ano, $dates_input_2_dia, $dates_input_2_mes, $dates_input_2_ano,
             $nm_url_saida, $nm_apl_dependente, $nmgp_parms, $bprocessa, $nmgp_save_name, $NM_operador, $NM_filters, $nmgp_save_option, $NM_filters_del, $Script_BI;
      $Script_BI = "";
      $this->nmgp_botoes['clear'] = "on";
      $this->nmgp_botoes['save'] = "on";
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_Temp_Merge_In_Out']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_Temp_Merge_In_Out']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_Temp_Merge_In_Out']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }
      $this->New_label['link'] = "" . $this->Ini->Nm_lang['lang_dbo_Temp_Merge_In_Out_fld_Link'] . "";
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("grid_Temp_Merge_In_Out", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $nmgp_tab_label = "";
      $delimitador = "##@@";
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']) && $bprocessa != "recarga" && $bprocessa != "save_form" && $bprocessa != "filter_save" && $bprocessa != "filter_delete")
      { 
          $hours = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['hours']; 
          $hours_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['hours_cond']; 
          $count_in = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['count_in']; 
          $count_in_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['count_in_cond']; 
          $count_out = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['count_out']; 
          $count_out_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['count_out_cond']; 
          $dates_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['dates_dia']; 
          $dates_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['dates_mes']; 
          $dates_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['dates_ano']; 
          $dates_input_2_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['dates_input_2_dia']; 
          $dates_input_2_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['dates_input_2_mes']; 
          $dates_input_2_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['dates_input_2_ano']; 
          $dates_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['dates_cond']; 
          $this->NM_operador = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['NM_operador']; 
          if (strtoupper($count_in_cond) != "II" && strtoupper($count_in_cond) != "QP" && strtoupper($count_in_cond) != "IN") 
          { 
              nmgp_Form_Num_Val($count_in, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          if (strtoupper($count_out_cond) != "II" && strtoupper($count_out_cond) != "QP" && strtoupper($count_out_cond) != "IN") 
          { 
              nmgp_Form_Num_Val($count_out, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
      } 
      if (isset($nmgp_save_name) && !empty($nmgp_save_name) && $bprocessa == "save_form")
      { 
          $this->salva_filtro();
      } 
      if (isset($NM_filters) && !empty($NM_filters) && $bprocessa == "filter_save")
      { 
          $this->recupera_filtro();
      } 
      if (isset($NM_filters_del) && !empty($NM_filters_del) && $bprocessa == "filter_delete")
      { 
          $this->apaga_filtro();
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
         $count_out_cond = "eq";
      }
      if (!isset($dates_cond) || empty($dates_cond))
      {
         $dates_cond = "TP";
      }
      if (!isset($link_cond) || empty($link_cond))
      {
         $link_cond = "eq";
      }
      if (!isset($dates_cond) || empty($dates_cond))
      {
         $dates_cond = "TP";
      }
      if (isset($dates_cond) && in_array($dates_cond, $this->dates_opc_bi))
      {
         $Temp_cond = $dates_cond;
         $this->process_cond_bi($Temp_cond, $BI_data1, $BI_data2);
         $dates_dia = substr($BI_data1, 0, 2);
         $dates_mes = substr($BI_data1, 2, 2);
         $dates_ano = substr($BI_data1, 4);
         $dates_input_2_dia = substr($BI_data2, 0, 2);
         $dates_input_2_mes = substr($BI_data2, 2, 2);
         $dates_input_2_ano = substr($BI_data2, 4);
         $Script_BI .= "  formata_bi_dates('" . $dates_cond . "');\r\n";
      }
      $browser_ok = $this->testa_browser();
      if ($browser_ok)
      {
         $display_aberto  = "style=display:";
         $display_fechado = "style=display:none";
      }
      else
      {
         $display_aberto  = "";
         $display_fechado = "";
      }

      $str_display_dates = ('bw' == $dates_cond) ? $display_aberto : $display_fechado;

      if (!isset($hours) || $hours == "")
      {
          $hours = "";
      }
      if (isset($hours) && !empty($hours))
      {
         $tmp_pos = strpos($hours, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $hours = substr($hours, 0, $tmp_pos);
         }
      }
      if (!isset($count_in) || $count_in == "")
      {
          $count_in = "";
      }
      if (isset($count_in) && !empty($count_in))
      {
         $tmp_pos = strpos($count_in, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $count_in = substr($count_in, 0, $tmp_pos);
         }
      }
      if (!isset($count_out) || $count_out == "")
      {
          $count_out = "";
      }
      if (isset($count_out) && !empty($count_out))
      {
         $tmp_pos = strpos($count_out, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $count_out = substr($count_out, 0, $tmp_pos);
         }
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
   if (is_file("grid_Temp_Merge_In_Out_help.txt"))
   {
      $Arq_WebHelp = file("grid_Temp_Merge_In_Out_help.txt"); 
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
<?php
   if ($this->nmgp_botoes['save'] == "on")
   {
?>
    </TD></TR><TR><TD>
    <DIV id="Salvar_filters_top" style="display:none">
     <TABLE align="center" class="scFilterTable">
      <TR>
       <TD class="scFilterBlock">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top" class="scFilterBlockFont"><?php echo $this->Ini->Nm_lang['lang_othr_srch_head'] ?></td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "document.getElementById('Salvar_filters_top').style.display = 'none'", "document.getElementById('Salvar_filters_top').style.display = 'none'", "Cancel_frm_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldOdd">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
           <input class="scFilterObjectOdd" type="text" name="nmgp_save_name_top" value="">
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bsalvar", "nm_save_form('top')", "nm_save_form('top')", "Save_frm_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldEven">
       <DIV id="Apaga_filters_top" style="display:''">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
          <div id="idAjaxSelect_NM_filters_del_top">
           <SELECT class="scFilterObjectOdd" id="sel_filters_del_top" name="NM_filters_del_top" size="1">
            <option value=""></option>
<?php
          $Nome_filter = "";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              $Select = "";
              if ($Cada_filter == $this->NM_curr_fil)
              {
                  $Select = "selected";
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "            <option value=\"\">" . NM_encode_input($Nome_filter) . "</option>\r\n";
              }
              if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Cada_filter    = mb_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
                  $Tipo_filter[0] = mb_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
              }
?>
            <option value="<?php echo NM_encode_input($Tipo_filter[0]) . "\" " . $Select . ">.." . $Cada_filter ?></option>
<?php
          }
?>
           </SELECT>
          </div>
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "nm_submit_filter_del('top')", "nm_submit_filter_del('top')", "Exc_filtro_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
          </td>
         </tr>
        </table>
       </DIV>
       </TD>
      </TR>
     </TABLE>
    </DIV> 
<?php
   }
?>
  </TD>
 </TR>
 <TR align="center">
  <TD class="scFilterTableTd">
   <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
   <TR valign="top" >
  <TD width="100%" height="">
   <TABLE class="scFilterTable" id="hidden_bloco_0" valign="top" width="100%" style="height: 100%;">
   <tr>





      <TD class="scFilterLabelOdd"><?php echo (isset($this->New_label['hours'])) ? $this->New_label['hours'] : "" . $this->Ini->Nm_lang['lang_dbo_Temp_Merge_In_Out_fld_Hours'] . ""; ?></TD>
     <TD class="scFilterFieldOdd"> 
      <SELECT class="scFilterObjectOdd" name="hours_cond">
       <OPTION value="eq" <?php if ("eq" == $hours_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ii" <?php if ("ii" == $hours_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_stts_with'] ?></OPTION>
       <OPTION value="qp" <?php if ("qp" == $hours_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="df" <?php if ("df" == $hours_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_dife'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['hours'])) ? $this->New_label['hours'] : "" . $this->Ini->Nm_lang['lang_dbo_Temp_Merge_In_Out_fld_Hours'] . "";
 $nmgp_tab_label .= "hours?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<INPUT  type="text" id="SC_hours" name="hours" value="<?php echo NM_encode_input($hours) ?>" size=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" class="sc-js-input scFilterObjectOdd">

        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD class="scFilterLabelEven"><?php echo (isset($this->New_label['count_in'])) ? $this->New_label['count_in'] : "" . $this->Ini->Nm_lang['lang_dbo_Temp_Merge_In_Out_fld_Count_In'] . ""; ?></TD>
     <TD class="scFilterFieldEven"> 
      <SELECT class="scFilterObjectEven" name="count_in_cond">
       <OPTION value="eq" <?php if ("eq" == $count_in_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ii" <?php if ("ii" == $count_in_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_stts_with'] ?></OPTION>
       <OPTION value="qp" <?php if ("qp" == $count_in_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="df" <?php if ("df" == $count_in_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_dife'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['count_in'])) ? $this->New_label['count_in'] : "" . $this->Ini->Nm_lang['lang_dbo_Temp_Merge_In_Out_fld_Count_In'] . "";
 $nmgp_tab_label .= "count_in?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<INPUT  type="text" id="SC_count_in" name="count_in" value="<?php echo NM_encode_input($count_in) ?>" size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" class="sc-js-input scFilterObjectEven">

        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD class="scFilterLabelOdd"><?php echo (isset($this->New_label['count_out'])) ? $this->New_label['count_out'] : "" . $this->Ini->Nm_lang['lang_dbo_Temp_Merge_In_Out_fld_Count_Out'] . ""; ?></TD>
     <TD class="scFilterFieldOdd"> 
      <SELECT class="scFilterObjectOdd" name="count_out_cond">
       <OPTION value="eq" <?php if ("eq" == $count_out_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ii" <?php if ("ii" == $count_out_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_stts_with'] ?></OPTION>
       <OPTION value="qp" <?php if ("qp" == $count_out_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="df" <?php if ("df" == $count_out_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_dife'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['count_out'])) ? $this->New_label['count_out'] : "" . $this->Ini->Nm_lang['lang_dbo_Temp_Merge_In_Out_fld_Count_Out'] . "";
 $nmgp_tab_label .= "count_out?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<INPUT  type="text" id="SC_count_out" name="count_out" value="<?php echo NM_encode_input($count_out) ?>" size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" class="sc-js-input scFilterObjectOdd">

        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD class="scFilterLabelEven"><?php echo (isset($this->New_label['dates'])) ? $this->New_label['dates'] : "" . $this->Ini->Nm_lang['lang_dbo_Temp_Merge_In_Out_fld_Dates'] . ""; ?></TD>
     <TD class="scFilterFieldEven"> 
      <SELECT class="scFilterObjectEven" name="dates_cond" onChange="nm_campos_between(document.getElementById('id_vis_dates'), this, 'dates')">
       <OPTION value="TP" <?php if ("TP" == $dates_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_ever'] ?></OPTION>
       <OPTION value="HJ" <?php if ("HJ" == $dates_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_tday'] ?></OPTION>
       <OPTION value="OT" <?php if ("OT" == $dates_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_yest'] ?></OPTION>
       <OPTION value="U7" <?php if ("U7" == $dates_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_lst7'] ?></OPTION>
       <OPTION value="SP" <?php if ("SP" == $dates_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_lstw'] ?></OPTION>
       <OPTION value="US" <?php if ("US" == $dates_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_lstw_bsnd'] ?></OPTION>
       <OPTION value="MM" <?php if ("MM" == $dates_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_this_mnth'] ?></OPTION>
       <OPTION value="UM" <?php if ("UM" == $dates_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_last_mnth'] ?></OPTION>
       <OPTION value="AM" <?php if ("AM" == $dates_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_tomw'] ?></OPTION>
       <OPTION value="PS" <?php if ("PS" == $dates_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_nxtw_mond_frid'] ?></OPTION>
       <OPTION value="SS" <?php if ("SS" == $dates_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_nxtw_mond_sund'] ?></OPTION>
       <OPTION value="P3" <?php if ("P3" == $dates_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_nx30'] ?></OPTION>
       <OPTION value="PM" <?php if ("PM" == $dates_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_next_mnth'] ?></OPTION>
       <OPTION value="P7" <?php if ("P7" == $dates_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_nxt7'] ?></OPTION>
       <OPTION value="CY" <?php if ("CY" == $dates_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_curr_year'] ?></OPTION>
       <OPTION value="LY" <?php if ("LY" == $dates_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_last_year'] ?></OPTION>
       <OPTION value="M24" <?php if ("M24" == $dates_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_last_24mo'] ?></OPTION>
       <OPTION value="M18" <?php if ("M18" == $dates_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_last_18mo'] ?></OPTION>
       <OPTION value="YY" <?php if ("YY" == $dates_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_last_12mo'] ?></OPTION>
       <OPTION value="M6" <?php if ("M6" == $dates_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_last_06mo'] ?></OPTION>
       <OPTION value="M3" <?php if ("M3" == $dates_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_last_03mo'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldEven"><SPAN id="Nm_bi_dados_dates" style="display:none"></SPAN>
      <TABLE  id="opc_bi_TP_dates"  style=display:  border="0" cellpadding="0" cellspacing="0">
       <TR valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['dates'])) ? $this->New_label['dates'] : "" . $this->Ini->Nm_lang['lang_dbo_Temp_Merge_In_Out_fld_Dates'] . "";
 $nmgp_tab_label .= "dates?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>

<?php
  $Form_base = "ddmmyyyy";
  $date_format_show = "";
  $Str_date = str_replace("a", "y", strtolower($_SESSION['scriptcase']['reg_conf']['date_format']));
  $Lim   = strlen($Str_date);
  $Str   = "";
  $Ult   = "";
  $Arr_D = array();
  for ($I = 0; $I < $Lim; $I++)
  {
      $Char = substr($Str_date, $I, 1);
      if ($Char != $Ult && "" != $Str)
      {
          $Arr_D[] = $Str;
          $Str     = $Char;
      }
      else
      {
          $Str    .= $Char;
      }
      $Ult = $Char;
  }
  $Arr_D[] = $Str;
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
  $Arr_format = $Arr_D;
  $date_format_show = str_replace("dd",   $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
  $date_format_show = str_replace("mm",   $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
  $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("hh",   $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
  $date_format_show = str_replace("ii",   $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
  $date_format_show = str_replace("ss",   $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
  $date_format_show = "(" . $date_format_show .  ")";

?>

         <?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "d")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_dates_dia" name="dates_dia" value="<?php echo NM_encode_input($dates_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.dates_cond.value)">

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_dates_mes" name="dates_mes" value="<?php echo NM_encode_input($dates_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.dates_cond.value)">

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_dates_ano" name="dates_ano" value="<?php echo NM_encode_input($dates_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 
<?php
  }
?>

<?php

}

?>
        <SPAN id="id_css_dates"  class="scFilterFieldFontEven">
 <?php echo $date_format_show ?>         </SPAN>
                 </TD>
       </TR>
       <TR valign="top">
        <TD id="id_vis_dates"  <?php echo $str_display_dates; ?> class="scFilterFieldFontEven">
         <?php echo $date_sep_bw ?>
         <BR>
         
         <?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "d")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_dates_input_2_dia" name="dates_input_2_dia" value="<?php echo NM_encode_input($dates_input_2_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.dates_cond.value)">

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_dates_input_2_mes" name="dates_input_2_mes" value="<?php echo NM_encode_input($dates_input_2_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.dates_cond.value)">

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_dates_input_2_ano" name="dates_input_2_ano" value="<?php echo NM_encode_input($dates_input_2_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 
<?php
  }
?>

<?php

}

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
   <?php echo nmButtonOutput($this->arr_buttons, "bpesquisa", "document.F1.bprocessa.value='pesq'; nm_submit_form()", "document.F1.bprocessa.value='pesq'; nm_submit_form()", "sc_b_pesq_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
<?php
   if ($this->nmgp_botoes['clear'] == "on")
   {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "blimpar", "limpa_form()", "limpa_form()", "limpa_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
<?php
   }
?>
<?php
   if (!isset($this->nmgp_botoes['save']) || $this->nmgp_botoes['save'] == "on")
   {
       $this->NM_fil_ant = $this->gera_array_filtros();
?>
     <span id="idAjaxSelect_NM_filters_bot">
       <SELECT class="scFilterToolbar_obj" id="sel_recup_filters_bot" name="NM_filters_bot" onChange="nm_submit_filter(this, 'bot')" size="1">
           <option value=""></option>
<?php
          $Nome_filter = "";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              $Select = "";
              if ($Cada_filter == $this->NM_curr_fil)
              {
                  $Select = "selected";
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "           <option value=\"\">" . NM_encode_input($Nome_filter) . "</option>\r\n";
              }
              if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Cada_filter    = mb_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
                  $Tipo_filter[0] = mb_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
              }
?>
           <option value="<?php echo NM_encode_input($Tipo_filter[0]) . "\" " . $Select . ">.." . $Cada_filter ?></option>
<?php
          }
?>
       </SELECT>
     </span>
<?php
   }
?>
<?php
   if ($this->nmgp_botoes['save'] == "on")
   {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bedit_filter", "document.getElementById('Salvar_filters_bot').style.display = ''; document.F1.nmgp_save_name_bot.focus()", "document.getElementById('Salvar_filters_bot').style.display = ''; document.F1.nmgp_save_name_bot.focus()", "Ativa_save_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
<?php
   }
?>
<?php
   if (is_file("grid_Temp_Merge_In_Out_help.txt"))
   {
      $Arq_WebHelp = file("grid_Temp_Merge_In_Out_help.txt"); 
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
<?php
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_Temp_Merge_In_Out']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_Temp_Merge_In_Out']['start'] == 'filter' && $nm_apl_dependente != 1)
   {
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.form_cancel.submit()", "document.form_cancel.submit()", "sc_b_cancel_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
<?php
   }
   else
   {
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.form_cancel.submit()", "document.form_cancel.submit()", "sc_b_cancel_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
<?php
   }
?>
    </td>
    <td class="scFilterToolbarPadding" align="right" width="33%" nowrap>
    </td>
   </tr></table>
<?php
   if ($this->nmgp_botoes['save'] == "on")
   {
?>
    </TD></TR><TR><TD>
    <DIV id="Salvar_filters_bot" style="display:none">
     <TABLE align="center" class="scFilterTable">
      <TR>
       <TD class="scFilterBlock">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top" class="scFilterBlockFont"><?php echo $this->Ini->Nm_lang['lang_othr_srch_head'] ?></td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "document.getElementById('Salvar_filters_bot').style.display = 'none'", "document.getElementById('Salvar_filters_bot').style.display = 'none'", "Cancel_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldOdd">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
           <input class="scFilterObjectOdd" type="text" name="nmgp_save_name_bot" value="">
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bsalvar", "nm_save_form('bot')", "nm_save_form('bot')", "Save_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldEven">
       <DIV id="Apaga_filters_bot" style="display:''">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
          <div id="idAjaxSelect_NM_filters_del_bot">
           <SELECT class="scFilterObjectOdd" id="sel_filters_del_bot" name="NM_filters_del_bot" size="1">
            <option value=""></option>
<?php
          $Nome_filter = "";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              $Select = "";
              if ($Cada_filter == $this->NM_curr_fil)
              {
                  $Select = "selected";
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "            <option value=\"\">" . NM_encode_input($Nome_filter) . "</option>\r\n";
              }
              if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Cada_filter    = mb_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
                  $Tipo_filter[0] = mb_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
              }
?>
            <option value="<?php echo NM_encode_input($Tipo_filter[0]) . "\" " . $Select . ">.." . $Cada_filter ?></option>
<?php
          }
?>
           </SELECT>
          </div>
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "nm_submit_filter_del('bot')", "nm_submit_filter_del('bot')", "Exc_filtro_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
          </td>
         </tr>
        </table>
       </DIV>
       </TD>
      </TR>
     </TABLE>
    </DIV> 
<?php
   }
?>
  </TD>
 </TR>
<?php
   }

   function monta_html_fim()
   {
       global $bprocessa, $nm_url_saida, $Script_BI;
?>

</TABLE>
   <INPUT type="hidden" name="form_condicao" value="3">
</FORM> 
<?php
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_Temp_Merge_In_Out']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_Temp_Merge_In_Out']['start'] == 'filter')
   {
?>
   <FORM style="display:none;" name="form_cancel"  method="POST" action="<?php echo $nm_url_saida; ?>" target="_self"> 
<?php
   }
   else
   {
?>
   <FORM style="display:none;" name="form_cancel"  method="POST" action="grid_Temp_Merge_In_Out.php" target="_self"> 
<?php
   }
?>
   <INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
   <INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<?php
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['orig_pesq'] == "grid")
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
<?php
   if (empty($this->NM_fil_ant))
   {
?>
      document.getElementById('Apaga_filters_bot').style.display = 'none';
      document.getElementById('sel_recup_filters_bot').style.display = 'none';
<?php
   }
?>
 function nm_submit_form()
 {
    document.F1.submit();
 }
 function limpa_form()
 {
   document.F1.reset();
   if (document.F1.NM_filters)
   {
       document.F1.NM_filters.selectedIndex = -1;
   }
   document.getElementById('Salvar_filters_bot').style.display = 'none';
   document.F1.hours.value = "";
   document.F1.count_in.value = "";
   document.F1.count_out.value = "";
   document.F1.dates_dia.value = "";
   document.F1.dates_mes.value = "";
   document.F1.dates_ano.value = "";
   document.F1.dates_input_2_dia.value = "";
   document.F1.dates_input_2_mes.value = "";
   document.F1.dates_input_2_ano.value = "";
   opc = document.F1.dates_cond.selectedIndex;
   opc = document.F1.dates_cond.options[opc].value;
   if (opc == "TP" || opc == "HJ" || opc == "OT" || opc == "U7" || opc == "SP" || opc == "US" || opc == "MM" || opc == "UM" || opc == "AM" || opc == "PS" || opc == "SS" || opc == "P3" || opc == "PM" || opc == "P7" || opc == "CY" || opc == "LY" || opc == "YY" || opc == "M6" || opc == "M3" || opc == "M18" || opc == "M24")
   {
       document.F1.dates_cond.selectedIndex = 0;
   }
   nm_campos_between(document.getElementById('id_vis_dates'), document.F1.dates_cond, 'dates');
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
    $('#SC_dates_dia').bind('change', function() {sc_grid_Temp_Merge_In_Out_valida_dia(this)});
    $('#SC_dates_input_2_dia').bind('change', function() {sc_grid_Temp_Merge_In_Out_valida_dia(this)});
    $('#SC_dates_input_2_mes').bind('change', function() {sc_grid_Temp_Merge_In_Out_valida_mes(this)});
    $('#SC_dates_mes').bind('change', function() {sc_grid_Temp_Merge_In_Out_valida_mes(this)});
 }
 function sc_grid_Temp_Merge_In_Out_valida_dia(obj)
 {
     if (obj.value < 1 || obj.value > 31)
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_iday'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_grid_Temp_Merge_In_Out_valida_mes(obj)
 {
     if (obj.value < 1 || obj.value > 12)
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_mnth'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_grid_Temp_Merge_In_Out_valida_hora(obj)
 {
     if (obj.value < 0 || obj.value > 23)
     {
         if (confirm (Nm_erro['lang_jscr_ivtm'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_grid_Temp_Merge_In_Out_valida_min(obj)
 {
     if (obj.value < 0 || obj.value > 59)
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_mint'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_grid_Temp_Merge_In_Out_valida_seg(obj)
 {
     if (obj.value < 0 || obj.value > 59)
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_secd'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_grid_Temp_Merge_In_Out_valida_cic(obj)
 {
     var x        = 0;
     var y        = 0;
     var soma     = 0;
     var resto    = 0;
     var CicIn    = obj.value;
     var Cic_calc = 0;
     CicIn = CicIn.replace(/[.]/g, '');
     CicIn = CicIn.replace(/[-]/g, '');
     if (CicIn.length == 0)
     {
         return true;
     }
     Cic_calc = CicIn.substring(0, 9);
     x = CicIn.substring(0, 1);
     for (y = 1; y < 11; y++)
     {
         if (CicIn.substr(y , 1) != x)
         {
             break;
         }
         else
         {
              soma++;
         }
     }
     if (soma == 10) 
     {
         Cic_calc = "1";
     }
     soma = 0;
     y = 10;
     for (x = 0 ; x < 9 ; x++)
     {
         soma = soma + (parseInt(Cic_calc.substr(x , 1)) * y );
         y--;
     }
     soma = soma * 10;
     resto = soma % 11;
     if (resto == 10)
     {
         resto = 0;
     }
     Cic_calc = Cic_calc + resto.toString();
     x = 0;
     y = 11;
     soma = 0;
     for (x = 0 ; x < 10 ; x++)
     {
         soma = soma + (parseInt(Cic_calc.substr(x , 1)) * y );
         y--;
     }
     soma = soma * 10;
     resto = soma % 11;
     if (resto == 10)
     {
          resto = 0;
     }
     Cic_calc = Cic_calc + resto.toString();
     if (Cic_calc != CicIn)
     {
         if (confirm ("CIC Inválido " +  Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
            return false;
         }
     }
     return true;
 }
 function sc_grid_Temp_Merge_In_Out_valida_cnpj(obj)
 {
     var x         = 0;
     var y         = 5;
     var soma      = 0;
     var resto     = 0;
     var Cnpj_calc = 0;
     var CnpjIn    = obj.value;
     CnpjIn = CnpjIn.replace(/[.]/g, '');
     CnpjIn = CnpjIn.replace(/[-]/g, '');
     CnpjIn = CnpjIn.replace(/[/]/g, '');
     if (CnpjIn.length == 0)
     {
         return true;
     }
     Cnpj_calc = CnpjIn.substring(0, 12);
     for (x = 0 ; x < 12 ; x++)
     {
         soma = soma + (parseInt(Cnpj_calc.substr(x , 1)) * y );
         y--;
         if (y == 1)
         {
             y = 9;
         }
     }
     soma = soma * 10;
     resto = soma % 11;
     if (resto == 10)
     {
         resto = 0;
     }
     Cnpj_calc = Cnpj_calc + resto.toString();
     x = 0;
     y = 6;
     soma = 0;
     for (x = 0 ; x < 13 ; x++)
     {
         soma = soma + (parseInt(Cnpj_calc.substr(x , 1)) * y );
         y--;
         if (y == 1)
         {
             y = 9;
         }
     }
     soma = soma * 10;
     resto = soma % 11;
     if (resto == 10)
     {
          resto = 0;
     }
     Cnpj_calc = Cnpj_calc + resto.toString();
     if (Cnpj_calc != CnpjIn || CnpjIn == "00000000000000")
     {
         if (confirm ("CNPJ Inválido " +  Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
            return false;
         }
     }
     return true;
 }
 function sc_grid_Temp_Merge_In_Out_valida_ciccnpj(obj)
 {
     var CnpjIn = obj.value;
     CnpjIn = CnpjIn.replace(/[.]/g, '');
     CnpjIn = CnpjIn.replace(/[-]/g, '');
     CnpjIn = CnpjIn.replace(/[/]/g, '');
     if (CnpjIn.length <= 11)
     {
         return sc_grid_Temp_Merge_In_Out_valida_cic(obj);
     }
     else
     {
         return sc_grid_Temp_Merge_In_Out_valida_cnpj(obj);
     }
 }
 function sc_grid_Temp_Merge_In_Out_valida_cep(obj)
 {
     var CepIn = obj.value;
     CepIn = CepIn.replace(/[-]/g, '');
     if (CepIn.length != 0 && (CepIn.length < 8 || CepIn == '00000000'))
     {
         if (confirm ("CEP Inválido " +  Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
            return false;
         }
     }
     return true;
 }
function formata_bi_dates(opc)
{
   if (opc != "TP" && opc != "HJ" && opc != "OT" && opc != "U7" && opc != "SP" && opc != "US" && opc != "MM" && opc != "UM" && opc != "AM" && opc != "PS" && opc != "SS" && opc != "P3" && opc != "PM" && opc != "P7" && opc != "CY" && opc != "LY" && opc != "YY" && opc != "M6" && opc != "M3" && opc != "M18" && opc != "M24")
   {
       document.getElementById('Nm_bi_dados_dates').style.display = 'none';
       document.getElementById('opc_bi_TP_dates').style.display = '';
       return;
   }
   if (opc == "TP")
   {
       document.getElementById('Nm_bi_dados_dates').style.display = 'none';
       document.getElementById('opc_bi_TP_dates').style.display = 'none';
       return;
   }
<?php
   $date_format_show = "";
   $Str_date = str_replace("a", "y", strtolower($_SESSION['scriptcase']['reg_conf']['date_format']));
   $Str_date = str_replace("y", "Y", $Str_date);
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
       $date_format_show .= (!$Prim) ? " + '" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . "' + ": "";
       $date_format_show .= ($Cada_d == "d") ? "document.F1.dates_dia.value" : "";
       $date_format_show .= ($Cada_d == "m") ? "document.F1.dates_mes.value" : "";
       $date_format_show .= ($Cada_d == "Y") ? "document.F1.dates_ano.value" : "";
       $Prim = false;
   }
?> 
   saida = <?php echo $date_format_show ?>;
   if (opc == "U7" || opc == "SP" || opc == "US" || opc == "MM" || opc == "UM" || opc == "PS" || opc == "SS" || opc == "P3" || opc == "PM" || opc == "P7" || opc == "CY" || opc == "LY" || opc == "YY" || opc == "M6" || opc == "M3" || opc == "M18" || opc == "M24")
   {
       saida += "  ";
<?php
   $date_format_show = "";
   $Prim = true;
   foreach ($Arr_D as $Cada_d)
   {
       $date_format_show .= (!$Prim) ? " + '" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . "' + ": "";
       $date_format_show .= ($Cada_d == "d") ? "document.F1.dates_input_2_dia.value" : "";
       $date_format_show .= ($Cada_d == "m") ? "document.F1.dates_input_2_mes.value" : "";
       $date_format_show .= ($Cada_d == "Y") ? "document.F1.dates_input_2_ano.value" : "";
       $Prim = false;
   }
?> 
   saida += <?php echo $date_format_show ?>;
   }
   document.getElementById('Nm_bi_dados_dates').innerHTML = saida;
   document.getElementById('opc_bi_TP_dates').style.display = 'none';
   document.getElementById('Nm_bi_dados_dates').style.display = '';
}
<?php
  echo $Script_BI;
?>
</SCRIPT>
</BODY>
</HTML>
<?php
   }

   function gera_array_filtros()
   {
       $this->NM_fil_ant = array();
       $NM_patch   = "Mottech/grid_Temp_Merge_In_Out";
       if (is_dir($this->NM_path_filter . $NM_patch))
       {
           $NM_dir = @opendir($this->NM_path_filter . $NM_patch);
           while (FALSE !== ($NM_arq = @readdir($NM_dir)))
           {
             if (@is_file($this->NM_path_filter . $NM_patch . "/" . $NM_arq))
             {
                 $Sc_v6 = false;
                 $NMcmp_filter = file($this->NM_path_filter . $NM_patch . "/" . $NM_arq);
                 $NMcmp_filter = explode("@NMF@", $NMcmp_filter[0]);
                 if (substr($NMcmp_filter[0], 0, 6) == "SC_V6_")
                 {
                     $Name_filter = substr($NMcmp_filter[0], 6);
                     if (!empty($Name_filter))
                     {
                         $nmgp_save_name = str_replace('/', ' ', $Name_filter);
                         $nmgp_save_name = str_replace('\\', ' ', $nmgp_save_name);
                         $nmgp_save_name = str_replace('.', ' ', $nmgp_save_name);
                         $this->NM_fil_ant[$Name_filter][0] = $NM_patch . "/" . $nmgp_save_name;
                         $this->NM_fil_ant[$Name_filter][1] = "Public";
                         $Sc_v6 = true;
                     }
                 }
                 if (!$Sc_v6)
                 {
                     $this->NM_fil_ant[$NM_arq][0] = $NM_patch . "/" . $NM_arq;
                     $this->NM_fil_ant[$NM_arq][1] = "Public";
                 }
             }
           }
       }
       return $this->NM_fil_ant;
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
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "grid_Temp_Merge_In_Out.php";
      $this->Campos_Mens_erro = ""; 
      $this->nm_data = new nm_data("en_us");
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['cond_pesq'] = "";
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
      $this->comando        = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['where_orig'];
      $this->comando_sum    = "";
      $this->comando_filtro = "";
      $this->comando_ini    = "ini";
      $this->comando_fim    = "";
      $this->NM_operador    = (isset($NM_operador) && ("and" == strtolower($NM_operador) || "or" == strtolower($NM_operador))) ? $NM_operador : "and";
   }

   function salva_filtro()
   {
      global 
             $hours_cond, $hours,
             $count_in_cond, $count_in,
             $count_out_cond, $count_out,
             $dates_cond, $dates, $dates_dia, $dates_mes, $dates_ano, $dates_input_2_dia, $dates_input_2_mes, $dates_input_2_ano,
             $nmgp_save_name, $NM_operador, $nmgp_save_option, $script_case_init;
      if (!function_exists("nm_limpa_valor"))
      {
          include_once($_SESSION['sc_session'][$script_case_init]['grid_Temp_Merge_In_Out']['path_libs_php'] . "/nm_gp_limpa.php");
      }
      if (isset($nmgp_save_name) && !empty($nmgp_save_name))
      { 
          if ($count_in_cond != "in")
          {
              nm_limpa_numero($count_in, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
          }
          else
          {
              $Nm_sc_valores = explode(",", $count_in);
              foreach ($Nm_sc_valores as $II => $Nm_sc_valor)
              {
                  $Nm_sc_valor = trim($Nm_sc_valor);
                  nm_limpa_numero($Nm_sc_valor, $_SESSION['scriptcase']['reg_conf']['grup_num']); 
                  $Nm_sc_valores[$II] = $Nm_sc_valor;
              }
              $count_in = implode(",", $Nm_sc_valores);
          }
          if ($count_out_cond != "in")
          {
              nm_limpa_numero($count_out, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
          }
          else
          {
              $Nm_sc_valores = explode(",", $count_out);
              foreach ($Nm_sc_valores as $II => $Nm_sc_valor)
              {
                  $Nm_sc_valor = trim($Nm_sc_valor);
                  nm_limpa_numero($Nm_sc_valor, $_SESSION['scriptcase']['reg_conf']['grup_num']); 
                  $Nm_sc_valores[$II] = $Nm_sc_valor;
              }
              $count_out = implode(",", $Nm_sc_valores);
          }
          $NM_str_filter  = "SC_V6_" . $nmgp_save_name . "@NMF@";
          $nmgp_save_name = str_replace('/', ' ', $nmgp_save_name);
          $nmgp_save_name = str_replace('\\', ' ', $nmgp_save_name);
          $nmgp_save_name = str_replace('.', ' ', $nmgp_save_name);
          $NM_temp  = (isset($hours_cond)) ? $hours_cond : ""; 
          $NM_str_filter .= "hours_cond#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($hours)) ? $hours : ""; 
          $NM_str_filter .= "hours#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($count_in_cond)) ? $count_in_cond : ""; 
          $NM_str_filter .= "count_in_cond#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($count_in)) ? $count_in : ""; 
          $NM_str_filter .= "count_in#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($count_out_cond)) ? $count_out_cond : ""; 
          $NM_str_filter .= "count_out_cond#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($count_out)) ? $count_out : ""; 
          $NM_str_filter .= "count_out#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($dates_cond)) ? $dates_cond : ""; 
          $NM_str_filter .= "dates_cond#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($dates_dia)) ? $dates_dia : ""; 
          $NM_str_filter .= "dates_dia#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($dates_mes)) ? $dates_mes : ""; 
          $NM_str_filter .= "dates_mes#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($dates_ano)) ? $dates_ano : ""; 
          $NM_str_filter .= "dates_ano#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($dates_input_2_dia)) ? $dates_input_2_dia : ""; 
          $NM_str_filter .= "dates_input_2_dia#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($dates_input_2_mes)) ? $dates_input_2_mes : ""; 
          $NM_str_filter .= "dates_input_2_mes#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($dates_input_2_ano)) ? $dates_input_2_ano : ""; 
          $NM_str_filter .= "dates_input_2_ano#NMF#" . $NM_temp . "@NMF@"; 
          $NM_str_filter .= "NM_operador#NMF#" . $NM_operador; 
          $NM_patch = $this->NM_path_filter;
          if (!is_dir($NM_patch))
          {
              $NMdir = mkdir($NM_patch, 0755);
          }
          $NM_patch .= "Mottech/";
          if (!is_dir($NM_patch))
          {
              $NMdir = mkdir($NM_patch, 0755);
          }
          $NM_patch .= "grid_Temp_Merge_In_Out/";
          if (!is_dir($NM_patch))
          {
              $NMdir = mkdir($NM_patch, 0755);
          }
          $Parms_usr  = "";
          $NM_filter = fopen ($NM_patch . $nmgp_save_name, 'w');
          fwrite($NM_filter, $NM_str_filter);
          fclose($NM_filter);
      } 
   }
   function recupera_filtro()
   {
      global 
      $hours_cond, $hours,
             $count_in_cond, $count_in,
             $count_out_cond, $count_out,
             $dates_cond, $dates, $dates_dia, $dates_mes, $dates_ano, $dates_input_2_dia, $dates_input_2_mes, $dates_input_2_ano,
      $NM_filters, $NM_operador, $script_case_init;
      if (!function_exists("nmgp_Form_Num_Val"))
      {
          include_once($_SESSION['sc_session'][$script_case_init]['grid_Temp_Merge_In_Out']['path_libs_php'] . "/nm_edit.php");
      }
      $Look_man = array();
      $tp_html['hours_cond'] = 'select';
      $tp_html['count_in_cond'] = 'select';
      $tp_html['count_out_cond'] = 'select';
      $tp_html['dates_cond'] = 'select';
      $tp_html['hours'] = 'text';
      $tp_html['count_in'] = 'text';
      $tp_html['count_out'] = 'text';
      $tp_html['dates_dia'] = 'text';
      $tp_html['dates_mes'] = 'text';
      $tp_html['dates_ano'] = 'text';
      $tp_html['dates_input_2_dia'] = 'text';
      $tp_html['dates_input_2_mes'] = 'text';
      $tp_html['dates_input_2_ano'] = 'text';
      $tp_html['NM_operador'] = 'text';
      $NM_patch = $this->NM_path_filter . "/" . $NM_filters;
      if (is_file($NM_patch))
      {
          $this->ajax_return_fields = array();
          $SC_V6    = false;
          $NMfilter = file($NM_patch);
          $NMcmp_filter = explode("@NMF@", $NMfilter[0]);
          if (substr($NMcmp_filter[0], 0, 5) == "SC_V6")
          {
              $SC_V6 = true;
              unset($NMcmp_filter[0]);
          }
          foreach ($NMcmp_filter as $Cada_cmp)
          {
              $Cada_cmp = explode("#NMF#", $Cada_cmp);
              if (isset($tp_html[$Cada_cmp[0]]))
              {
                  if ($SC_V6 && ($Cada_cmp[0] == "count_in_cond" || $Cada_cmp[0] == "count_out_cond"))
                  {
                      $$Cada_cmp[0] = trim($Cada_cmp[1]);
                  }
                  if ($SC_V6 && $Cada_cmp[0] == "count_in")
                  {
                      if (strtoupper($count_in_cond) != "II" && strtoupper($count_in_cond) != "QP" && strtoupper($count_in_cond) != "IN") 
                      { 
                          nmgp_Form_Num_Val($Cada_cmp[1], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
                      } 
                  }
                  if ($SC_V6 && $Cada_cmp[0] == "count_out")
                  {
                      if (strtoupper($count_out_cond) != "II" && strtoupper($count_out_cond) != "QP" && strtoupper($count_out_cond) != "IN") 
                      { 
                          nmgp_Form_Num_Val($Cada_cmp[1], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
                      } 
                  }
                  $this->ajax_return_fields[$Cada_cmp[0]]['obj'] = $tp_html[$Cada_cmp[0]];
                  if (substr($Cada_cmp[1], 0, 17) == "_NM_array_#NMARR#")
                  {
                      $Cada_val_sv  = array();
                      $Cada_val_sv1 = array();
                      $Sc_temp = explode("#NMARR#", substr($Cada_cmp[1], 17));
                      foreach ($Sc_temp as $Cada_val)
                      {
                         $v_fim = explode("##@@", $Cada_val);
                         $Cada_val_sv[] = grid_Temp_Merge_In_Out_pack_protect_string(trim($v_fim[0]));
                         if (isset($Look_man[$Cada_cmp[0]][$v_fim[0]]))
                         {
                             $v_fim[0] = $v_fim[0] . "##@@" . $Look_man[$Cada_cmp[0]][$v_fim[0]];
                         }
                         $Cada_val_sv1[] = grid_Temp_Merge_In_Out_pack_protect_string(trim($v_fim[0]));
                      }
                      $$Cada_cmp[0] = $Cada_val_sv;
                      $this->ajax_return_fields[$Cada_cmp[0]]['vallist'] = $Cada_val_sv1;
                  }
                  else
                  {
                      $$Cada_cmp[0] = trim($Cada_cmp[1]);
                      $this->ajax_return_fields[$Cada_cmp[0]]['vallist'] = array(grid_Temp_Merge_In_Out_pack_protect_string(trim($Cada_cmp[1])));
                  }
              }
          }
          if (isset($this->ajax_return_fields['dates_cond']) && in_array($this->ajax_return_fields['dates_cond']['vallist'][0], $this->dates_opc_bi))
          {
             $Temp_cond = $this->ajax_return_fields['dates_cond']['vallist'][0];
             $this->process_cond_bi($Temp_cond, $BI_data1, $BI_data2);
             $this->ajax_return_fields['dates_dia']['vallist'][0] = substr($BI_data1, 0, 2);
             $this->ajax_return_fields['dates_mes']['vallist'][0] = substr($BI_data1, 2, 2);
             $this->ajax_return_fields['dates_ano']['vallist'][0] = substr($BI_data1, 4);
             $this->ajax_return_fields['dates_input_2_dia']['vallist'][0] = substr($BI_data2, 0, 2);
             $this->ajax_return_fields['dates_input_2_mes']['vallist'][0] = substr($BI_data2, 2, 2);
             $this->ajax_return_fields['dates_input_2_ano']['vallist'][0] = substr($BI_data2, 4);
          }
          $this->NM_curr_fil = $NM_filters;
          $this->NM_operador = $NM_operador;
          unset($this->ajax_return_fields['NM_operador']);
      }
   }
   function apaga_filtro()
   {
      global $NM_filters_del;
      if (isset($NM_filters_del) && !empty($NM_filters_del))
      { 
          $NM_patch = $this->NM_path_filter . "/" . $NM_filters_del;
          if (is_file($NM_patch))
          {
              @unlink($NM_patch);
          }
          if ($NM_filters_del == $this->NM_curr_fil)
          {
              $this->NM_curr_fil = "";
          }
      }
   }
   /**
    * @access  public
    */
   function trata_campos()
   {
      global $hours_cond, $hours,
             $count_in_cond, $count_in,
             $count_out_cond, $count_out,
             $dates_cond, $dates, $dates_dia, $dates_mes, $dates_ano, $dates_input_2_dia, $dates_input_2_mes, $dates_input_2_ano, $nmgp_tab_label;

      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $hours_cond_salva = $hours_cond; 
      if (!isset($hours_input_2) || $hours_input_2 == "")
      {
          $hours_input_2 = $hours;
      }
      $count_in_cond_salva = $count_in_cond; 
      if (!isset($count_in_input_2) || $count_in_input_2 == "")
      {
          $count_in_input_2 = $count_in;
      }
      $count_out_cond_salva = $count_out_cond; 
      if (!isset($count_out_input_2) || $count_out_input_2 == "")
      {
          $count_out_input_2 = $count_out;
      }
      $dates_cond_salva = $dates_cond; 
      if (in_array($dates_cond, $this->dates_opc_bi))
      {
          $this->process_cond_bi($dates_cond, $NM_data1, $NM_data2);
          $dates_dia = substr($NM_data1, 0, 2);
          $dates_mes = substr($NM_data1, 2, 2);
          $dates_ano = substr($NM_data1, 4);
          $dates_input_2_dia = substr($NM_data2, 0, 2);
          $dates_input_2_mes = substr($NM_data2, 2, 2);
          $dates_input_2_ano = substr($NM_data2, 4);
      }
      if (!isset($dates_input_2_dia) || $dates_input_2_dia == "")
      {
          $dates_input_2_dia = $dates_dia;
      }
      if (!isset($dates_input_2_mes) || $dates_input_2_mes == "")
      {
          $dates_input_2_mes = $dates_mes;
      }
      if (!isset($dates_input_2_ano) || $dates_input_2_ano == "")
      {
          $dates_input_2_ano = $dates_ano;
      }
      if (!isset($dates_input_2) || $dates_input_2 == "")
      {
          $dates_input_2 = $dates;
      }
      if ($count_in_cond != "in")
      {
          nm_limpa_numero($count_in, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      else
      {
          $Nm_sc_valores = explode(",", $count_in);
          foreach ($Nm_sc_valores as $II => $Nm_sc_valor)
          {
              $Nm_sc_valor = trim($Nm_sc_valor);
              nm_limpa_numero($Nm_sc_valor, $_SESSION['scriptcase']['reg_conf']['grup_num']); 
              $Nm_sc_valores[$II] = $Nm_sc_valor;
          }
          $count_in = implode(",", $Nm_sc_valores);
      }
      if ($count_out_cond != "in")
      {
          nm_limpa_numero($count_out, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      else
      {
          $Nm_sc_valores = explode(",", $count_out);
          foreach ($Nm_sc_valores as $II => $Nm_sc_valor)
          {
              $Nm_sc_valor = trim($Nm_sc_valor);
              nm_limpa_numero($Nm_sc_valor, $_SESSION['scriptcase']['reg_conf']['grup_num']); 
              $Nm_sc_valores[$II] = $Nm_sc_valor;
          }
          $count_out = implode(",", $Nm_sc_valores);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['hours'] = $hours; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['hours_cond'] = $hours_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['count_in'] = $count_in; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['count_in_cond'] = $count_in_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['count_out'] = $count_out; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['count_out_cond'] = $count_out_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['dates_dia'] = $dates_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['dates_mes'] = $dates_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['dates_ano'] = $dates_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['dates_input_2_dia'] = $dates_input_2_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['dates_input_2_mes'] = $dates_input_2_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['dates_input_2_ano'] = $dates_input_2_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['dates_cond'] = $dates_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['NM_operador'] = $this->NM_operador; 
      $Conteudo = $hours;
      $this->cmp_formatado['hours'] = $Conteudo;
      $Conteudo = $count_in;
      if (strtoupper($count_in_cond) != "II" && strtoupper($count_in_cond) != "QP" && strtoupper($count_in_cond) != "IN") 
      { 
          nmgp_Form_Num_Val($Conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      } 
      $this->cmp_formatado['count_in'] = $Conteudo;
      $Conteudo = $count_out;
      if (strtoupper($count_out_cond) != "II" && strtoupper($count_out_cond) != "QP" && strtoupper($count_out_cond) != "IN") 
      { 
          nmgp_Form_Num_Val($Conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      } 
      $this->cmp_formatado['count_out'] = $Conteudo;
      $Conteudo  = "";
      $Formato   = "";
      if (!empty($dates_dia))
      {
          $Conteudo .= (strlen($dates_dia) == 2) ? $dates_dia : "0" . $dates_dia;
          $Formato  .= "DD";
      }
      if (!empty($dates_mes))
      {
          $Conteudo .= (strlen($dates_mes) == 2) ? $dates_mes : "0" . $dates_mes;
          $Formato  .= "MM";
      }
      $Conteudo .= $dates_ano;
      $Formato  .= "YYYY";
      if (!empty($Conteudo))
      {
          if (is_numeric($Conteudo) && $Conteudo > 0) 
          { 
              $this->nm_data->SetaData($Conteudo, $Formato);
              $Conteudo = $this->nm_data->FormataSaida($this->Nm_date_format("DT", "ddmmaaaa"));
          } 
      }
      $this->cmp_formatado['dates'] = $Conteudo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['dates'] = $Conteudo; 
      $Conteudo  = "";
      $Formato   = "";
      if (!empty($dates_input_2_dia))
      {
          $Conteudo .= (strlen($dates_input_2_dia) == 2) ? $dates_input_2_dia : "0" . $dates_input_2_dia;
          $Formato  .= "DD";
      }
      if (!empty($dates_input_2_mes))
      {
          $Conteudo .= (strlen($dates_input_2_mes) == 2) ? $dates_input_2_mes : "0" . $dates_input_2_mes;
          $Formato  .= "MM";
      }
      $Conteudo .= $dates_input_2_ano;
      $Formato  .= "YYYY";
      if (!empty($Conteudo))
      {
          if (is_numeric($Conteudo) && $Conteudo > 0) 
          { 
              $this->nm_data->SetaData($Conteudo, $Formato);
              $Conteudo = $this->nm_data->FormataSaida($this->Nm_date_format("DT", "ddmmaaaa"));
          } 
      }
      $this->cmp_formatado['dates_Input_2'] = $Conteudo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['dates_input_2'] = $Conteudo; 

      //----- $hours
      if (isset($hours) || $hours_cond == "nu" || $hours_cond == "nn")
      {
         $this->monta_condicao("Hours", $hours_cond, $hours, "", "hours");
      }

      //----- $count_in
      if (isset($count_in) || $count_in_cond == "nu" || $count_in_cond == "nn")
      {
         $this->monta_condicao("Count_In", $count_in_cond, $count_in, "", "count_in");
      }

      //----- $count_out
      if (isset($count_out) || $count_out_cond == "nu" || $count_out_cond == "nn")
      {
         $this->monta_condicao("Count_Out", $count_out_cond, $count_out, "", "count_out");
      }

      //----- $dates
      $nm_tp_dado = "DT";
      $nm_format_db = "";
      $condicao = strtoupper($dates_cond);
      $array_dates = array();
      $array_dates2 = array();
      $nm_psq_dt1 = $dates_dia . $dates_mes . $dates_ano . $dates_hor . $dates_min . $dates_seg;
      $nm_psq_dt_inf  = ("" == $dates_ano) ? "YYYY" : "$dates_ano";
      $nm_psq_dt_inf .= "-";
      $nm_psq_dt_inf .= ("" == $dates_mes) ? "MM" : "$dates_mes";
      $nm_psq_dt_inf .= "-";
      $nm_psq_dt_inf .= ("" == $dates_dia) ? "DD"   : "$dates_dia";
      $nm_psq_dt_inf .= " ";
      $nm_psq_dt_inf .= ("" == $dates_hor) ? "HH" : "$dates_hor";
      $nm_psq_dt_inf .= ":";
      $nm_psq_dt_inf .= ("" == $dates_min) ? "II" : "$dates_min";
      $nm_psq_dt_inf .= ":";
      $nm_psq_dt_inf .= ("" == $dates_seg) ? "SS" : "$dates_seg";
      nm_conv_form_data_hora($nm_psq_dt_inf, "AAAA-MM-DD HH:II:SS", $nm_format_db);
      $array_dates["dia"] = ("" == $dates_dia) ? "__"   : "$dates_dia";
      $array_dates["mes"] = ("" == $dates_mes) ? "__"   : "$dates_mes";
      $array_dates["ano"] = ("" == $dates_ano) ? "____" : "$dates_ano";
      $array_dates["hor"] = ("" == $dates_hor) ? "__" : "$dates_hor";
      $array_dates["min"] = ("" == $dates_min) ? "__" : "$dates_min";
      $array_dates["seg"] = ("" == $dates_seg) ? "__" : "$dates_seg";
      $this->NM_data_qp = $array_dates;
      $nm_dt_compl = $array_dates["ano"] . "-" . $array_dates["mes"] . "-" . $array_dates["dia"] . " " . $array_dates["hor"] . ":" . $array_dates["min"] . ":" . $array_dates["seg"];
      nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
//
      if ($condicao == "BW")
      {
          $array_dates2["dia"] = ("" == $dates_input_2_dia) ? "__"   : "$dates_input_2_dia";
          $array_dates2["mes"] = ("" == $dates_input_2_mes) ? "__"   : "$dates_input_2_mes";
          $array_dates2["ano"] = ("" == $dates_input_2_ano) ? "____" : "$dates_input_2_ano";
          $array_dates2["hor"] = ("" == $dates_input_2_hor) ? "__" : "$dates_input_2_hor";
          $array_dates2["min"] = ("" == $dates_input_2_min) ? "__" : "$dates_input_2_min";
          $array_dates2["seg"] = ("" == $dates_input_2_seg) ? "__" : "$dates_input_2_seg";
          $this->data_menor($array_dates);
          $nm_dt_compl = $array_dates["ano"] . "-" . $array_dates["mes"] . "-" . $array_dates["dia"] . " " . $array_dates["hor"] . ":" . $array_dates["min"] . ":" . $array_dates["seg"];
          nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
          $this->data_maior($array_dates2);
          $nm_dt_compl_2 = $array_dates2["ano"] . "-" . $array_dates2["mes"] . "-" . $array_dates2["dia"] . " " . $array_dates2["hor"] . ":" . $array_dates2["min"] . ":" . $array_dates2["seg"];
          nm_conv_form_data_hora($nm_dt_compl_2, "AAAA-MM-DD HH:II:SS", $nm_format_db);
      }
      else
      {
          $array_dates2 = $array_dates;
      }
      if (FALSE !== strpos($nm_dt_compl, "__"))
      {
         if ($condicao == "II")
         {
             $condicao = "QP";
         }
         elseif ($condicao == "DF")
         {
             $this->data_menor($array_dates);
             $this->data_maior($array_dates2);
             $nm_dt_compl = $array_dates["ano"] . "-" . $array_dates["mes"] . "-" . $array_dates["dia"] . " " . $array_dates["hor"] . ":" . $array_dates["min"] . ":" . $array_dates["seg"];
             nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
             $nm_dt_compl_2 = $array_dates2["ano"] . "-" . $array_dates2["mes"] . "-" . $array_dates2["dia"] . " " . $array_dates2["hor"] . ":" . $array_dates2["min"] . ":" . $array_dates2["seg"];
             nm_conv_form_data_hora($nm_dt_compl_2, "AAAA-MM-DD HH:II:SS", $nm_format_db);
             $condicao = "BW";
             $nm_tp_dado .= "DF";
         }
         elseif ($condicao == "EQ")
         {
             $this->data_menor($array_dates);
             $this->data_maior($array_dates2);
             $nm_dt_compl = $array_dates["ano"] . "-" . $array_dates["mes"] . "-" . $array_dates["dia"] . " " . $array_dates["hor"] . ":" . $array_dates["min"] . ":" . $array_dates["seg"];
             nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
             $nm_dt_compl_2 = $array_dates2["ano"] . "-" . $array_dates2["mes"] . "-" . $array_dates2["dia"] . " " . $array_dates2["hor"] . ":" . $array_dates2["min"] . ":" . $array_dates2["seg"];
             nm_conv_form_data_hora($nm_dt_compl_2, "AAAA-MM-DD HH:II:SS", $nm_format_db);
             $condicao = "BW";
             $nm_tp_dado .= "EQ";
         }
         elseif ($condicao == "GT")
         {
             $this->data_maior($array_dates);
             $nm_dt_compl = $array_dates["ano"] . "-" . $array_dates["mes"] . "-" . $array_dates["dia"] . " " . $array_dates["hor"] . ":" . $array_dates["min"] . ":" . $array_dates["seg"];
             nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
         }
         elseif ($condicao == "GE")
         {
             $this->data_menor($array_dates);
             $nm_dt_compl = $array_dates["ano"] . "-" . $array_dates["mes"] . "-" . $array_dates["dia"] . " " . $array_dates["hor"] . ":" . $array_dates["min"] . ":" . $array_dates["seg"];
             nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
         }
         elseif ($condicao == "LT")
         {
             $this->data_menor($array_dates);
             $nm_dt_compl = $array_dates["ano"] . "-" . $array_dates["mes"] . "-" . $array_dates["dia"] . " " . $array_dates["hor"] . ":" . $array_dates["min"] . ":" . $array_dates["seg"];
             nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
         }
         elseif ($condicao == "LE")
         {
             $this->data_maior($array_dates);
             $nm_dt_compl = $array_dates["ano"] . "-" . $array_dates["mes"] . "-" . $array_dates["dia"] . " " . $array_dates["hor"] . ":" . $array_dates["min"] . ":" . $array_dates["seg"];
             nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
         }
      }
      if ($condicao == "QP")
      {
          $nm_dt_compl = $nm_psq_dt_inf;
          $nm_dt_compl_2 = "";
      }
      if (!empty($nm_dt_compl))
      {
          $this->limpa_dt_hor_pesq($nm_dt_compl);
      }
      if (!empty($nm_dt_compl_2))
      {
          $this->limpa_dt_hor_pesq($nm_dt_compl_2);
      }
      if (!empty($nm_psq_dt1) || $condicao == "NU" || $condicao == "NN")
      {
          $this->monta_condicao("Dates", $condicao, trim($nm_dt_compl), trim($nm_dt_compl_2), "dates", $nm_tp_dado);
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['dates']   = trim($nm_dt_compl); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['campos_busca']['dates_input_2'] = trim($nm_dt_compl_2); 
      }
      $nm_tp_dado = "";
   }

   /**
    * @access  public
    */
   function finaliza_resultado()
   {

      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['where_pesq_lookup']  = $this->comando_sum . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['where_pesq']         = $this->comando . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['opcao']              = "pesq";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['prim_vez']           = "N";
      if ("" == $this->comando_filtro)
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['where_pesq_filtro'] = "";
      }
      else
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['where_pesq_filtro'] = " (" . $this->comando_filtro . ")";
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['where_pesq'] != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['where_pesq_ant'])
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['cond_pesq'] .= $this->NM_operador;
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['contr_array_resumo'] = "NAO";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['contr_total_geral']  = "NAO";
         unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['tot_geral']);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['where_pesq_ant'] = $this->comando . $this->comando_fim;
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_Temp_Merge_In_Out']['fast_search']);

      $this->retorna_pesq();
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
   function process_cond_bi(&$cond, &$data1, &$data2)
   {

      $data1 = "";
      $data2 = "";
      if ($cond == "TP")
      {
          return;
      }
      if ($cond == "HJ")
      {
          $data1  = date('d');
          $data1 .= date('m');
          $data1 .= date('Y');
          $data2  = date('d');
          $data2 .= date('m');
          $data2 .= date('Y');
          $cond   = "eq";
      }
      if ($cond == "OT")
      {
          $Temp = $this->nm_data->CalculaData(date('dmY') , "ddmmaaaa", "-", 1, 0, 0);
          $data1  = substr($Temp, 8, 2);
          $data1 .= substr($Temp, 5, 2);
          $data1 .= substr($Temp, 0, 4);
          $data2  = substr($Temp, 8, 2);
          $data2 .= substr($Temp, 5, 2);
          $data2 .= substr($Temp, 0, 4);
          $cond   = "eq";
      }
      if ($cond == "AM")
      {
          $Temp = $this->nm_data->CalculaData(date('dmY') , "ddmmaaaa", "+", 1, 0, 0);
          $data1  = substr($Temp, 8, 2);
          $data1 .= substr($Temp, 5, 2);
          $data1 .= substr($Temp, 0, 4);
          $data2  = substr($Temp, 8, 2);
          $data2 .= substr($Temp, 5, 2);
          $data2 .= substr($Temp, 0, 4);
          $cond   = "eq";
      }
      if ($cond == "U7")
      {
          $Temp   = $this->nm_data->CalculaData(date('dmY') , "ddmmaaaa", "-", 6, 0, 0);
          $data1  = substr($Temp, 8, 2);
          $data1 .= substr($Temp, 5, 2);
          $data1 .= substr($Temp, 0, 4);
          $data2  = date('d');
          $data2 .= date('m');
          $data2 .= date('Y');
          $cond   = "bw";
      }
      if ($cond == "P7" || $cond == "P3")
      {
          $incr   = ($cond == "P7") ? 6 : 29;
          $Temp   = $this->nm_data->CalculaData(date('dmY') , "ddmmaaaa", "+", $incr, 0, 0);
          $data1  = date('d');
          $data1 .= date('m');
          $data1 .= date('Y');
          $data2  = substr($Temp, 8, 2);
          $data2 .= substr($Temp, 5, 2);
          $data2 .= substr($Temp, 0, 4);
          $cond   = "bw";
      }
      if ($cond == "SP" || $cond == "US")
      {
          $incr   = ($cond == "SP") ? 6 : 4;
          $Temps  = date('w') + 6;
          $Temp   = $this->nm_data->CalculaData(date('dmY') , "ddmmaaaa", "-", $Temps, 0, 0);
          $data1  = substr($Temp, 8, 2);
          $data1 .= substr($Temp, 5, 2);
          $data1 .= substr($Temp, 0, 4);
          $Temp   = $this->nm_data->CalculaData($Temp , "aaaa-mm-dd", "+", $incr, 0, 0);
          $data2  = substr($Temp, 8, 2);
          $data2 .= substr($Temp, 5, 2);
          $data2 .= substr($Temp, 0, 4);
          $cond   = "bw";
      }
      if ($cond == "PS" || $cond == "SS")
      {
          $incr   = ($cond == "PS") ? 4 : 6;
          $Temps  = (date('w') == 0) ? 1 : 8 - date('w');
          $Temp   = $this->nm_data->CalculaData(date('dmY') , "ddmmaaaa", "+", $Temps, 0, 0);
          $data1  = substr($Temp, 8, 2);
          $data1 .= substr($Temp, 5, 2);
          $data1 .= substr($Temp, 0, 4);
          $Temp   = $this->nm_data->CalculaData($Temp , "aaaa-mm-dd", "+", $incr, 0, 0);
          $data2  = substr($Temp, 8, 2);
          $data2 .= substr($Temp, 5, 2);
          $data2 .= substr($Temp, 0, 4);
          $cond   = "bw";
      }
      if ($cond == "MM" || $cond == "UM")
      {
          $Temp_mes = date('m');
          $Temp_ano = date('Y');
          if ($cond == "UM")
          {
              $Temp_mes--;
              if ($Temp_mes == 0)
              {
                  $Temp_mes = 12;
                  $Temp_ano--;
              }
              $Temp_dia = 31;
              if ($Temp_mes == 4 || $Temp_mes == 6 || $Temp_mes == 9 || $Temp_mes == 11)
              {
                  $Temp_dia = 30;
              }
              if ($Temp_mes == 2)
              {
                  $Temp_dia = ($Temp_ano % 4 == 0) ? 29 : 28;
              }
          }
          else
          {
              $Temp_dia = date('d');
          }
          $Temp_dia = (strlen($Temp_dia) == 1) ? "0" . $Temp_dia : $Temp_dia;
          $Temp_mes = (strlen($Temp_mes) == 1) ? "0" . $Temp_mes : $Temp_mes;
          $data1  = "01";
          $data1 .= $Temp_mes;
          $data1 .= $Temp_ano;
          $data2  = $Temp_dia;
          $data2 .= $Temp_mes;
          $data2 .= $Temp_ano;
          $cond   = "bw";
      }
      if ($cond == "PM")
      {
          $Temp_mes = date('m');
          $Temp_ano = date('Y');
          $Temp_mes++;
          if ($Temp_mes == 13)
          {
              $Temp_mes = 1;
              $Temp_ano++;
          }
          $Temp_dia = 31;
          if ($Temp_mes == 4 || $Temp_mes == 6 || $Temp_mes == 9 || $Temp_mes == 11)
          {
              $Temp_dia = 30;
          }
          if ($Temp_mes == 2)
          {
              $Temp_dia = ($Temp_ano % 4 == 0) ? 29 : 28;
          }
          $Temp_dia = (strlen($Temp_dia) == 1) ? "0" . $Temp_dia : $Temp_dia;
          $Temp_mes = (strlen($Temp_mes) == 1) ? "0" . $Temp_mes : $Temp_mes;
          $data1  = "01";
          $data1 .= $Temp_mes;
          $data1 .= $Temp_ano;
          $data2  = $Temp_dia;
          $data2 .= $Temp_mes;
          $data2 .= $Temp_ano;
          $cond   = "bw";
      }
      if ($cond == "CY")
      {
          $data1  = "01";
          $data1 .= "01";
          $data1 .= date('Y');
          $data2  = date('d');
          $data2 .= date('m');
          $data2 .= date('Y');
          $cond   = "bw";
      }
      if ($cond == "LY")
      {
          $data1  = "01";
          $data1 .= "01";
          $data1 .= date('Y') - 1;
          $data2  = 31;
          $data2 .= 12;
          $data2 .= date('Y') - 1;
          $cond   = "bw";
      }
      if ($cond == "YY" || $cond == "M3" || $cond == "M6" || $cond == "M18" || $cond == "M24")
      {
          $Temp_mes = date('m') - 1;
          $Temp_ano = date('Y');
          if ($Temp_mes == 0)
          {
              $Temp_mes = 12;
              $Temp_ano--;
          }
          $Temp_dia = 31;
          if ($Temp_mes == 4 || $Temp_mes == 6 || $Temp_mes == 9 || $Temp_mes == 11)
          {
              $Temp_dia = 30;
          }
          if ($Temp_mes == 2)
          {
              $Temp_dia = ($Temp_ano % 4 == 0) ? 29 : 28;
          }
          $Temp_dia = (strlen($Temp_dia) == 1) ? "0" . $Temp_dia : $Temp_dia;
          $Temp_mes = (strlen($Temp_mes) == 1) ? "0" . $Temp_mes : $Temp_mes;
          $data2  = $Temp_dia;
          $data2 .= $Temp_mes;
          $data2 .= $Temp_ano;
          $incr   = ($cond == "YY") ? 12 : substr($cond, 1);
          $Temp   = $this->nm_data->CalculaData(date('dmY') , "ddmmaaaa", "-", 0, $incr, 0);
          $data1  = "01";
          $data1 .= substr($Temp, 5, 2);
          $data1 .= substr($Temp, 0, 4);
          $cond   = "bw";
      }
   }
}

?>
