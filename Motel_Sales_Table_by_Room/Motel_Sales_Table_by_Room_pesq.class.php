<?php

class Motel_Sales_Table_by_Room_pesq
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
   function Motel_Sales_Table_by_Room_pesq()
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['path_libs_php'] = $this->Ini->path_lib_php;
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['opcao'] = "igual";
   }

   function processa_ajax()
   {
      global 
      $room_cond, $room, $room_input_2,
             $time_in_cond, $time_in, $time_in_dia, $time_in_mes, $time_in_ano, $time_in_hor, $time_in_min, $time_in_seg, $time_in_input_2_dia, $time_in_input_2_mes, $time_in_input_2_ano, $time_in_input_2_min, $time_in_input_2_hor, $time_in_input_2_seg,
             $prices_cond, $prices, $prices_input_2,
      $NM_filters, $NM_filters_del, $nmgp_save_name, $NM_operador, $nmgp_save_option, $bprocessa, $Ajax_label, $Ajax_val, $Campo_bi, $Opc_bi;
      $this->init();
      if (isset($this->NM_ajax_info['param']['room_cond']))
      {
          $room_cond = $this->NM_ajax_info['param']['room_cond'];
      }
      if (isset($this->NM_ajax_info['param']['room']))
      {
          $room = $this->NM_ajax_info['param']['room'];
      }
      if (isset($this->NM_ajax_info['param']['room_input_2']))
      {
          $room_input_2 = $this->NM_ajax_info['param']['room_input_2'];
      }
      if (isset($this->NM_ajax_info['param']['time_in_cond']))
      {
          $time_in_cond = $this->NM_ajax_info['param']['time_in_cond'];
      }
      if (isset($this->NM_ajax_info['param']['time_in']))
      {
          $time_in = $this->NM_ajax_info['param']['time_in'];
      }
      if (isset($this->NM_ajax_info['param']['time_in_dia']))
      {
          $time_in_dia = $this->NM_ajax_info['param']['time_in_dia'];
      }
      if (isset($this->NM_ajax_info['param']['time_in_mes']))
      {
          $time_in_mes = $this->NM_ajax_info['param']['time_in_mes'];
      }
      if (isset($this->NM_ajax_info['param']['time_in_ano']))
      {
          $time_in_ano = $this->NM_ajax_info['param']['time_in_ano'];
      }
      if (isset($this->NM_ajax_info['param']['time_in_hor']))
      {
          $time_in_hor = $this->NM_ajax_info['param']['time_in_hor'];
      }
      if (isset($this->NM_ajax_info['param']['time_in_min']))
      {
          $time_in_min = $this->NM_ajax_info['param']['time_in_min'];
      }
      if (isset($this->NM_ajax_info['param']['time_in_seg']))
      {
          $time_in_seg = $this->NM_ajax_info['param']['time_in_seg'];
      }
      if (isset($this->NM_ajax_info['param']['time_in_input_2_dia']))
      {
          $time_in_input_2_dia = $this->NM_ajax_info['param']['time_in_input_2_dia'];
      }
      if (isset($this->NM_ajax_info['param']['time_in_input_2_mes']))
      {
          $time_in_input_2_mes = $this->NM_ajax_info['param']['time_in_input_2_mes'];
      }
      if (isset($this->NM_ajax_info['param']['time_in_input_2_ano']))
      {
          $time_in_input_2_ano = $this->NM_ajax_info['param']['time_in_input_2_ano'];
      }
      if (isset($this->NM_ajax_info['param']['time_in_input_2_min']))
      {
          $time_in_input_2_min = $this->NM_ajax_info['param']['time_in_input_2_min'];
      }
      if (isset($this->NM_ajax_info['param']['time_in_input_2_hor']))
      {
          $time_in_input_2_hor = $this->NM_ajax_info['param']['time_in_input_2_hor'];
      }
      if (isset($this->NM_ajax_info['param']['time_in_input_2_seg']))
      {
          $time_in_input_2_seg = $this->NM_ajax_info['param']['time_in_input_2_seg'];
      }
      if (isset($this->NM_ajax_info['param']['prices_cond']))
      {
          $prices_cond = $this->NM_ajax_info['param']['prices_cond'];
      }
      if (isset($this->NM_ajax_info['param']['prices']))
      {
          $prices = $this->NM_ajax_info['param']['prices'];
      }
      if (isset($this->NM_ajax_info['param']['prices_input_2']))
      {
          $prices_input_2 = $this->NM_ajax_info['param']['prices_input_2'];
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
              if ($_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Tipo_filter[1] = mb_convert_encoding($Tipo_filter[1], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  $Opt_filter .= "<option value=\"\">" . Motel_Sales_Table_by_Room_pack_protect_string($Nome_filter) . "</option>\r\n";
              }
              $Opt_filter .= "<option value=\"" . Motel_Sales_Table_by_Room_pack_protect_string($Tipo_filter[0]) . "\">.." . Motel_Sales_Table_by_Room_pack_protect_string($Cada_filter) .  "</option>\r\n";
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
              if ($_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Tipo_filter[1] = mb_convert_encoding($Tipo_filter[1], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter  = $Tipo_filter[1];
                  $Opt_filter .= "<option value=\"\">" .  Motel_Sales_Table_by_Room_pack_protect_string($Nome_filter) . "</option>\r\n";
              }
              $Opt_filter .= "<option value=\"" . Motel_Sales_Table_by_Room_pack_protect_string($Tipo_filter[0]) . "\">.." . Motel_Sales_Table_by_Room_pack_protect_string($Cada_filter) .  "</option>\r\n";
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
      $Nm_numeric[] = "id";$Nm_numeric[] = "room";$Nm_numeric[] = "prices";
      $campo_join = strtolower(str_replace(".", "_", $nome));
      if (in_array($campo_join, $Nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['decimal_db'] == ".")
         {
            $nm_aspas = "";
         }
         if ($condicao != "in")
         {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['decimal_db'] == ".")
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
      $Nm_datas[] = "time_in";
      $campo_join = strtolower(str_replace(".", "_", $nome));
      if (in_array($campo_join, $Nm_datas) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
         $nm_aspas = "#";
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
         $nome_sum = "dbo.Motel_Live_Data_Qry.$nome";
         if (in_array($campo_join, $Nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome     = "CAST ($nome AS TEXT)";
             $nome_sum = "CAST ($nome_sum AS TEXT)";
         }
         if (substr($tp_campo, 0, 8) == "DATETIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && strtoupper($condicao) != "QP" && strtoupper($condicao) != "NP")
         {
             $nome     = "to_char ($nome, 'YYYY-MM-DD hh24:mi:ss')";
             $nome_sum = "to_char ($nome_sum, 'YYYY-MM-DD hh24:mi:ss')";
         }
         elseif (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && strtoupper($condicao) != "QP" && strtoupper($condicao) != "NP")
         {
             $nome     = "to_char ($nome, 'YYYY-MM-DD')";
             $nome_sum = "to_char ($nome_sum, 'YYYY-MM-DD' )";
         }
         if (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase) && strtoupper($condicao) != "QP" && strtoupper($condicao) != "NP")
         {
             $nome     = "str_replace (convert(char(10),$nome,102), '.', '-') + ' ' + convert(char(8),$nome,20)";
             $nome_sum = "str_replace (convert(char(10),$nome_sum,102), '.', '-') + ' ' + convert(char(8),$nome_sum,20)";
         }
         if (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) && strtoupper($condicao) != "QP" && strtoupper($condicao) != "NP")
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
               $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "II":     // 
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " like '" . $campo . "%'";
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
               $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_strt'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
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
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%Y', $nome) = '" . $this->NM_data_qp['ano'] . "'";
                           $NM_cmd_sum .= "strftime('%Y', $nome_sum) = '" . $this->NM_data_qp['ano'] . "'";
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(year from $nome) = " . $this->NM_data_qp['ano'];
                           $NM_cmd_sum .= "extract(year from $nome_sum) = " . $this->NM_data_qp['ano'];
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           $NM_cmd     .= "extract('year' from $nome) = " . $this->NM_data_qp['ano'];
                           $NM_cmd_sum .= "extract('year' from $nome_sum) = " . $this->NM_data_qp['ano'];
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(year from $nome) = " . $this->NM_data_qp['ano'];
                           $NM_cmd_sum .= "extract(year from $nome_sum) = " . $this->NM_data_qp['ano'];
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'YYYY') = '" . $this->NM_data_qp['ano'] . "'";
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'YYYY') = '" . $this->NM_data_qp['ano'] . "'";
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "convert(char(4),year($nome),121) = '" . $this->NM_data_qp['ano'] . "'";
                           $NM_cmd_sum .= "convert(char(4),year($nome_sum),121) = '" . $this->NM_data_qp['ano'] . "'";
                       }
                       else
                       {
                           $NM_cmd     .= "year($nome) = " . $this->NM_data_qp['ano'];
                           $NM_cmd_sum .= "year($nome_sum) = " . $this->NM_data_qp['ano'];
                       }
                   }
                   if ($this->NM_data_qp['mes'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_andd'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_mnth'] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->NM_data_qp['mes'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : " and ";
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%m', $nome) = '" . $this->NM_data_qp['mes'] . "'";
                           $NM_cmd_sum .= "strftime('%m', $nome_sum) = '" . $this->NM_data_qp['mes'] . "'";
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(month from $nome) = " . $this->NM_data_qp['mes'];
                           $NM_cmd_sum .= "extract(month from $nome_sum) = " . $this->NM_data_qp['mes'];
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           $NM_cmd     .= "extract('month' from $nome) = " . $this->NM_data_qp['mes'];
                           $NM_cmd_sum .= "extract('month' from $nome_sum) = " . $this->NM_data_qp['mes'];
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(month from $nome) = " . $this->NM_data_qp['mes'];
                           $NM_cmd_sum .= "extract(month from $nome_sum) = " . $this->NM_data_qp['mes'];
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'MM') = '" . $this->NM_data_qp['mes'] . "'";
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'MM') = '" . $this->NM_data_qp['mes'] . "'";
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "convert(char(2),month($nome),121) = '" . $this->NM_data_qp['mes'] . "'";
                           $NM_cmd_sum .= "convert(char(2),month($nome_sum),121) = '" . $this->NM_data_qp['mes'] . "'";
                       }
                       else
                       {
                           $NM_cmd     .= "month($nome) = " . $this->NM_data_qp['mes'];
                           $NM_cmd_sum .= "month($nome_sum) = " . $this->NM_data_qp['mes'];
                       }
                   }
                   if ($this->NM_data_qp['dia'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_andd'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_days'] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->NM_data_qp['dia'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : " and ";
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%d', $nome) = '" . $this->NM_data_qp['dia'] . "'";
                           $NM_cmd_sum .= "strftime('%d', $nome_sum) = '" . $this->NM_data_qp['dia'] . "'";
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(day from $nome) = " . $this->NM_data_qp['dia'];
                           $NM_cmd_sum .= "extract(day from $nome_sum) = " . $this->NM_data_qp['dia'];
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           $NM_cmd     .= "extract('day' from $nome) = " . $this->NM_data_qp['dia'];
                           $NM_cmd_sum .= "extract('day' from $nome_sum) = " . $this->NM_data_qp['dia'];
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(day from $nome) = " . $this->NM_data_qp['dia'];
                           $NM_cmd_sum .= "extract(day from $nome_sum) = " . $this->NM_data_qp['dia'];
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'DD') = '" . $this->NM_data_qp['dia'] . "'";
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'DD') = '" . $this->NM_data_qp['dia'] . "'";
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "convert(char(2),day($nome),121) = '" . $this->NM_data_qp['dia'] . "'";
                           $NM_cmd_sum .= "convert(char(2),day($nome_sum),121) = '" . $this->NM_data_qp['dia'] . "'";
                       }
                       else
                       {
                           $NM_cmd     .= "day($nome) = " . $this->NM_data_qp['dia'];
                           $NM_cmd_sum .= "day($nome_sum) = " . $this->NM_data_qp['dia'];
                       }
                   }
                   if (!empty($NM_cmd))
                   {
                       $NM_cmd     = " (" . $NM_cmd . ")";
                       $NM_cmd_sum = " (" . $NM_cmd_sum . ")";
                       $this->comando        .= $NM_cmd;
                       $this->comando_sum    .= $NM_cmd_sum;
                       $this->comando_filtro .= $NM_cmd;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $NM_cond . "##*@@";
                   }
               }
               else
               {
                   $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." like '%" . $campo . "%'";
                   $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " like '%" . $campo . "%'";
                   $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " like '%" . $campo . "%'";
                   $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               }
            break;
            case "NP":     // 
               if (substr($tp_campo, 0, 4) == "DATE")
               {
                   $NM_cond    = "";
                   $NM_cmd     = "";
                   $NM_cmd_sum = "";
                   if ($this->NM_data_qp['ano'] != "____")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_andd'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_year'] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->NM_data_qp['ano'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " or ";
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : " or ";
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%Y', $nome) <> '" . $this->NM_data_qp['ano'] . "'";
                           $NM_cmd_sum .= "strftime('%Y', $nome_sum) <> '" . $this->NM_data_qp['ano'] . "'";
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(year from $nome) <> " . $this->NM_data_qp['ano'];
                           $NM_cmd_sum .= "extract(year from $nome_sum) <> " . $this->NM_data_qp['ano'];
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           $NM_cmd     .= "extract('year' from $nome) <> " . $this->NM_data_qp['ano'];
                           $NM_cmd_sum .= "extract('year' from $nome_sum) <> " . $this->NM_data_qp['ano'];
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(year from $nome) <> " . $this->NM_data_qp['ano'];
                           $NM_cmd_sum .= "extract(year from $nome_sum) <> " . $this->NM_data_qp['ano'];
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'YYYY') <> '" . $this->NM_data_qp['ano'] . "'";
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'YYYY') <> '" . $this->NM_data_qp['ano'] . "'";
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "convert(char(4),year($nome),121) <> '" . $this->NM_data_qp['ano'] . "'";
                           $NM_cmd_sum .= "convert(char(4),year($nome_sum),121) <> '" . $this->NM_data_qp['ano'] . "'";
                       }
                       else
                       {
                           $NM_cmd     .= "year($nome) <> " . $this->NM_data_qp['ano'];
                           $NM_cmd_sum .= "year($nome_sum) <> " . $this->NM_data_qp['ano'];
                       }
                   }
                   if ($this->NM_data_qp['mes'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_andd'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_mnth'] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->NM_data_qp['mes'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " or ";
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : " or ";
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%m', $nome) <> '" . $this->NM_data_qp['mes'] . "'";
                           $NM_cmd_sum .= "strftime('%m', $nome_sum) <> '" . $this->NM_data_qp['mes'] . "'";
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(month from $nome) <> " . $this->NM_data_qp['mes'];
                           $NM_cmd_sum .= "extract(month from $nome_sum) <> " . $this->NM_data_qp['mes'];
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           $NM_cmd     .= "extract('month' from $nome) <> " . $this->NM_data_qp['mes'];
                           $NM_cmd_sum .= "extract('month' from $nome_sum) <> " . $this->NM_data_qp['mes'];
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(month from $nome) <> " . $this->NM_data_qp['mes'];
                           $NM_cmd_sum .= "extract(month from $nome_sum) <> " . $this->NM_data_qp['mes'];
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'MM') <> '" . $this->NM_data_qp['mes'] . "'";
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'MM') <> '" . $this->NM_data_qp['mes'] . "'";
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "convert(char(2),month($nome),121) <> '" . $this->NM_data_qp['mes'] . "'";
                           $NM_cmd_sum .= "convert(char(2),month($nome_sum),121) <> '" . $this->NM_data_qp['mes'] . "'";
                       }
                       else
                       {
                           $NM_cmd     .= "month($nome) <> " . $this->NM_data_qp['mes'];
                           $NM_cmd_sum .= "month($nome_sum) <> " . $this->NM_data_qp['mes'];
                       }
                   }
                   if ($this->NM_data_qp['dia'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_andd'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_days'] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->NM_data_qp['dia'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " or ";
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : " or ";
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%d', $nome) <> '" . $this->NM_data_qp['dia'] . "'";
                           $NM_cmd_sum .= "strftime('%d', $nome_sum) <> '" . $this->NM_data_qp['dia'] . "'";
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(day from $nome) <> " . $this->NM_data_qp['dia'];
                           $NM_cmd_sum .= "extract(day from $nome_sum) <> " . $this->NM_data_qp['dia'];
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           $NM_cmd     .= "extract('day' from $nome) <> " . $this->NM_data_qp['dia'];
                           $NM_cmd_sum .= "extract('day' from $nome_sum) <> " . $this->NM_data_qp['dia'];
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(day from $nome) <> " . $this->NM_data_qp['dia'];
                           $NM_cmd_sum .= "extract(day from $nome_sum) <> " . $this->NM_data_qp['dia'];
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'DD') <> '" . $this->NM_data_qp['dia'] . "'";
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'DD') <> '" . $this->NM_data_qp['dia'] . "'";
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "convert(char(2),day($nome),121) <> '" . $this->NM_data_qp['dia'] . "'";
                           $NM_cmd_sum .= "convert(char(2),day($nome_sum),121) <> '" . $this->NM_data_qp['dia'] . "'";
                       }
                       else
                       {
                           $NM_cmd     .= "day($nome) <> " . $this->NM_data_qp['dia'];
                           $NM_cmd_sum .= "day($nome_sum) <> " . $this->NM_data_qp['dia'];
                       }
                   }
                   if (!empty($NM_cmd))
                   {
                       $NM_cmd     = " (" . $NM_cmd . ")";
                       $NM_cmd_sum = " (" . $NM_cmd_sum . ")";
                       $this->comando        .= $NM_cmd;
                       $this->comando_sum    .= $NM_cmd_sum;
                       $this->comando_filtro .= $NM_cmd;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_not_like'] . " " . $NM_cond . "##*@@";
                   }
               }
               else
               {
                   $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." not like '%" . $campo . "%'";
                   $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " not like '%" . $campo . "%'";
                   $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " not like '%" . $campo . "%'";
                   $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_not_like'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
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
               $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_diff'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "GT":     // 
               $this->comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_sum    .= " $nome_sum > " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_filtro .= " $nome > " . $nm_aspas . $campo . $nm_aspas;
               $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $nmgp_lang['pesq_cond_maior'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "GE":     // 
               $this->comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_sum    .= " $nome_sum >= " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_filtro .= " $nome >= " . $nm_aspas . $campo . $nm_aspas;
               $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_grtr_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "LT":     // 
               $this->comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_sum    .= " $nome_sum < " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_filtro .= " $nome < " . $nm_aspas . $campo . $nm_aspas;
               $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_less'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "LE":     // 
               $this->comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_sum    .= " $nome_sum <= " . $nm_aspas . $campo . $nm_aspas;
               $this->comando_filtro .= " $nome <= " . $nm_aspas . $campo . $nm_aspas;
               $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_less_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "BW":     // 
               if ($tp_campo == "DTDF" || $tp_campo == "DATEDF" || $tp_campo == "DATETIMEDF")
               {
                   $this->comando        .= " $nome not between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   $this->comando_sum    .= " $nome_sum not between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   $this->comando_filtro .= " $nome not between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_diff'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               }
               else
               {
                   $this->comando        .= " $nome between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   $this->comando_sum    .= " $nome_sum between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   $this->comando_filtro .= " $nome between " . $nm_aspas . $campo . $nm_aspas . " and " . $nm_aspas . $campo2 . $nm_aspas;
                   if ($tp_campo == "DTEQ" || $tp_campo == "DATEEQ" || $tp_campo == "DATETIMEEQ")
                   {
                       $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
                   }
                   else
                   {
                       $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_betw'] . " " . $this->cmp_formatado[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_andd'] . " " . $this->cmp_formatado[$nome_campo . "_Input_2"] . "##*@@";
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
               $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $nm_cond . "##*@@";
            break;
            case "NU":     // 
               $this->comando        .= " $nome IS NULL ";
               $this->comando_sum    .= " $nome_sum IS NULL ";
               $this->comando_filtro .= " $nome IS NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_null'] ." " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "NN":     // 
               $this->comando        .= " $nome IS NOT NULL ";
               $this->comando_sum    .= " $nome_sum IS NOT NULL ";
               $this->comando_filtro .= " $nome IS NOT NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_nnul'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
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
   $NM_retorno = "Motel_Sales_Table_by_Room.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML>
<HEAD>
 <TITLE>Sales Table by Room</TITLE>
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
 <TITLE>Sales Table by Room</TITLE>
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
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery/js/jquery.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></script>
 <script type="text/javascript" src="../_lib/lib/js/jquery.scInput.js"></script>
 <script type="text/javascript">var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';</script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
 <script type="text/javascript">
   var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax ?>';
   var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax ?>';
   var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax ?>';
   var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax ?>';
 </script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></script>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_calendar.css" />
<?php
$Cod_Btn = nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo $Cod_Btn ?>&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>
 <SCRIPT type="text/javascript">

<?php
if (is_file($this->Ini->root . $this->Ini->path_link . "_lib/js/tab_erro_" . $this->Ini->str_lang . ".js"))
{
    $Tb_err_js = file($this->Ini->root . $this->Ini->path_link . "_lib/js/tab_erro_" . $this->Ini->str_lang . ".js");
    foreach ($Tb_err_js as $Lines)
    {
        if (NM_is_utf8($Lines) && $_SESSION['scriptcase']['charset'] != "UTF-8")
        {
            $Lines = mb_convert_encoding($Lines, $_SESSION['scriptcase']['charset'], "UTF-8");
        }
        echo $Lines;
    }
}
$Msg_Inval = mb_convert_encoding("Inv�lido", $_SESSION['scriptcase']['charset']);
?>
var SC_crit_inv = "<?php echo $Msg_Inval ?>";
var nmdg_Form = "F1";

function scJQCalendarAdd() {
  $("#sc_time_in_jq").datepicker({
    beforeShow: function(input, inst) {
          var_dt_ini  = document.getElementById('SC_time_in_dia').value + '/';
          var_dt_ini += document.getElementById('SC_time_in_mes').value + '/';
          var_dt_ini += document.getElementById('SC_time_in_ano').value;
          document.getElementById('sc_time_in_jq').value = var_dt_ini;
    },
    onClose: function(dateText, inst) {
          aParts  = dateText.split("/");
          document.getElementById('SC_time_in_dia').value = aParts[0];
          document.getElementById('SC_time_in_mes').value = aParts[1];
          document.getElementById('SC_time_in_ano').value = aParts[2];
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ['<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd']); ?>'],
    dayNamesMin: ['<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd']); ?>'],
    monthNamesShort: ['<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece']); ?>'],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("ddmmyyyy", "/"); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->Ini->path_botoes . "/" . $this->arr_buttons['bcalendario']['image']; ?>",
    buttonImageOnly: true
  });

  $("#sc_time_in_jq2").datepicker({
    beforeShow: function(input, inst) {
          var_dt_ini  = document.getElementById('SC_time_in_input_2_dia').value + '/';
          var_dt_ini += document.getElementById('SC_time_in_input_2_mes').value + '/';
          var_dt_ini += document.getElementById('SC_time_in_input_2_ano').value;
          document.getElementById('sc_time_in_jq2').value = var_dt_ini;
    },
    onClose: function(dateText, inst) {
          aParts  = dateText.split("/");
          document.getElementById('SC_time_in_input_2_dia').value = aParts[0];
          document.getElementById('SC_time_in_input_2_mes').value = aParts[1];
          document.getElementById('SC_time_in_input_2_ano').value = aParts[2];
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ['<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd']); ?>'],
    dayNamesMin: ['<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd']); ?>'],
    monthNamesShort: ['<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove']); ?>','<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece']); ?>'],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("ddmmyyyy", "/"); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->Ini->path_botoes . "/" . $this->arr_buttons['bcalendario']['image']; ?>",
    buttonImageOnly: true
  });

} // scJQCalendarAdd


 $(function() {

   SC_carga_evt_jquery();
   $('input:text.sc-js-input').listen();
   scJQCalendarAdd('');
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
  Motel_Sales_Table_by_Room_do_ajax_save_filter(pos);
 }
 function nm_submit_filter(obj_sel, pos)
 {
  index   = obj_sel.selectedIndex;
  if (obj_sel.options[index].value == "") 
  {
      return false;
  }
  document.F1.bprocessa.value = "filter_save";
  Motel_Sales_Table_by_Room_do_ajax_change_filter(pos);
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
  Motel_Sales_Table_by_Room_do_ajax_delete_filter(pos);
 }
function nm_open_popup(parms)
{
    NovaJanela = window.open (parms, '', 'resizable, scrollbars');
}
 </SCRIPT>
<?php
include_once("Motel_Sales_Table_by_Room_sajax_js.php");
?>
<script type="text/javascript">
 $(function() {
 });
</script>
 <FORM name="F1" action="Motel_Sales_Table_by_Room.php" method="post" target="_self"> 
 <INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
 <INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
 <INPUT type="hidden" name="nmgp_opcao" value="busca"> 
 <div id="idJSSpecChar" style="display:none;"></div>
 <div id="id_div_process" style="display: none; position: absolute"><table class="scFilterTable"><tr><td class="scFilterLabelOdd"><?php echo $this->Ini->Nm_lang['lang_othr_prcs']; ?>...</td></tr></table></div>
 <div id="id_fatal_error" class="scFilterFieldOdd" style="display:none; position: absolute"></div>
<TABLE id="main_table" class="scFilterBorder" align="center" valign="top" >
  <div id="id_div_process_block" style="display: none; margin: 10px; whitespace: nowrap"><span class="scFormProcess"><img border="0" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" />&nbsp;<?php echo $this->Ini->Nm_lang['lang_othr_prcs'] ?>...</span></div>
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
        	<td id="lin1_col1" class="scFilterHeaderFont"><span>Sales Table by Room</span></td>
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
             $room_cond, $room, $room_input_2,
             $time_in_cond, $time_in, $time_in_dia, $time_in_mes, $time_in_ano, $time_in_hor, $time_in_min, $time_in_seg, $time_in_input_2_dia, $time_in_input_2_mes, $time_in_input_2_ano, $time_in_input_2_min, $time_in_input_2_hor, $time_in_input_2_seg,
             $prices_cond, $prices, $prices_input_2,
             $nm_url_saida, $nm_apl_dependente, $nmgp_parms, $bprocessa, $nmgp_save_name, $NM_operador, $NM_filters, $nmgp_save_option, $NM_filters_del, $Script_BI;
      $Script_BI = "";
      $this->nmgp_botoes['clear'] = "on";
      $this->nmgp_botoes['save'] = "on";
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['Motel_Sales_Table_by_Room']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['Motel_Sales_Table_by_Room']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['Motel_Sales_Table_by_Room']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("Motel_Sales_Table_by_Room", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $nmgp_tab_label = "";
      $delimitador = "##@@";
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']) && $bprocessa != "recarga" && $bprocessa != "save_form" && $bprocessa != "filter_save" && $bprocessa != "filter_delete")
      { 
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca'], $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $room = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['room']; 
          $room_input_2 = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['room_input_2']; 
          $room_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['room_cond']; 
          $time_in_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_dia']; 
          $time_in_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_mes']; 
          $time_in_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_ano']; 
          $time_in_input_2_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_input_2_dia']; 
          $time_in_input_2_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_input_2_mes']; 
          $time_in_input_2_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_input_2_ano']; 
          $time_in_hor = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_hor']; 
          $time_in_min = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_min']; 
          $time_in_seg = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_seg']; 
          $time_in_input_2_hor = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_input_2_hor']; 
          $time_in_input_2_min = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_input_2_min']; 
          $time_in_input_2_seg = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_input_2_seg']; 
          $time_in_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_cond']; 
          $prices = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['prices']; 
          $prices_input_2 = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['prices_input_2']; 
          $prices_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['prices_cond']; 
          $this->NM_operador = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['NM_operador']; 
          if (strtoupper($room_cond) != "II" && strtoupper($room_cond) != "QP" && strtoupper($room_cond) != "NP" && strtoupper($room_cond) != "IN") 
          { 
              nmgp_Form_Num_Val($room, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          if (strtoupper($room_cond) != "II" && strtoupper($room_cond) != "QP" && strtoupper($room_cond) != "NP" && strtoupper($room_cond) != "IN") 
          { 
              nmgp_Form_Num_Val($room_input_2, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          if (strtoupper($prices_cond) != "II" && strtoupper($prices_cond) != "QP" && strtoupper($prices_cond) != "NP" && strtoupper($prices_cond) != "IN") 
          { 
              nmgp_Form_Num_Val($prices, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          if (strtoupper($prices_cond) != "II" && strtoupper($prices_cond) != "QP" && strtoupper($prices_cond) != "NP" && strtoupper($prices_cond) != "IN") 
          { 
              nmgp_Form_Num_Val($prices_input_2, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
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
      if (!isset($this->NM_operador)) 
      { 
          $this->NM_operador  = "and";
      } 
      $Nm_oper_and  = ($this->NM_operador == "and") ? " checked" : "";
      $Nm_oper_or   = ($this->NM_operador == "or") ? " checked" : "";
      if (!isset($room_cond) || empty($room_cond))
      {
         $room_cond = "bw";
      }
      if (!isset($time_in_cond) || empty($time_in_cond))
      {
         $time_in_cond = "bw";
      }
      if (!isset($prices_cond) || empty($prices_cond))
      {
         $prices_cond = "eq";
      }
      if (!isset($id_cond) || empty($id_cond))
      {
         $id_cond = "eq";
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

      $str_display_room = ('bw' == $room_cond) ? $display_aberto : $display_fechado;
      $str_display_time_in = ('bw' == $time_in_cond) ? $display_aberto : $display_fechado;
      $str_display_prices = ('bw' == $prices_cond) ? $display_aberto : $display_fechado;

      if (!isset($room) || $room == "")
      {
          $room = "";
      }
      if (isset($room) && !empty($room))
      {
         $tmp_pos = strpos($room, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $room = substr($room, 0, $tmp_pos);
         }
      }
      if (!isset($time_in) || $time_in == "")
      {
          $time_in = "";
      }
      if (isset($time_in) && !empty($time_in))
      {
         $tmp_pos = strpos($time_in, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $time_in = substr($time_in, 0, $tmp_pos);
         }
      }
      if (!isset($prices) || $prices == "")
      {
          $prices = "";
      }
      if (isset($prices) && !empty($prices))
      {
         $tmp_pos = strpos($prices, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $prices = substr($prices, 0, $tmp_pos);
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
   if (is_file("Motel_Sales_Table_by_Room_help.txt"))
   {
      $Arq_WebHelp = file("Motel_Sales_Table_by_Room_help.txt"); 
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
              if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Cada_filter    = mb_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
                  $Tipo_filter[0] = mb_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
              }
              elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
              {
                  $Cada_filter    = mb_convert_encoding($Cada_filter, "UTF-8");
                  $Tipo_filter[0] = mb_convert_encoding($Tipo_filter[0], "UTF-8");
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "            <option value=\"\">" . NM_encode_input($Nome_filter) . "</option>\r\n";
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





      <TD class="scFilterLabelOdd"><?php echo (isset($this->New_label['room'])) ? $this->New_label['room'] : "Room"; ?></TD>
     <TD class="scFilterFieldOdd"> 
      <SELECT class="scFilterObjectOdd" name="room_cond" onChange="nm_campos_between(document.getElementById('id_vis_room'), this, 'room')">
       <OPTION value="bw" <?php if ("bw" == $room_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_betw'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $room_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ii" <?php if ("ii" == $room_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_stts_with'] ?></OPTION>
       <OPTION value="qp" <?php if ("qp" == $room_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="df" <?php if ("df" == $room_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_dife'] ?></OPTION>
       <OPTION value="gt" <?php if ("gt" == $room_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_grtr'] ?></OPTION>
       <OPTION value="lt" <?php if ("lt" == $room_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_less'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['room'])) ? $this->New_label['room'] : "Room";
 $nmgp_tab_label .= "room?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<INPUT  type="text" id="SC_room" name="room" value="<?php echo NM_encode_input($room) ?>" size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" class="sc-js-input scFilterObjectOdd">        </TD>
       </TR>
       <TR valign="top">
        <TD id="id_vis_room"  <?php echo $str_display_room; ?> class="scFilterFieldFontOdd">
         <?php echo $date_sep_bw ?>&nbsp;
         <BR>
         <INPUT type="text" id="SC_room_input_2" name="room_input_2" value="<?php echo NM_encode_input($room_input_2) ?>" size=10 alt="{datatype: 'integer', maxLength: 10, thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" class="sc-js-input sc-js-input scFilterObjectOdd">

        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD class="scFilterLabelEven"><?php echo (isset($this->New_label['time_in'])) ? $this->New_label['time_in'] : "Time In"; ?></TD>
     <TD class="scFilterFieldEven"> 
      <SELECT class="scFilterObjectEven" name="time_in_cond" onChange="nm_campos_between(document.getElementById('id_vis_time_in'), this, 'time_in')">
       <OPTION value="bw" <?php if ("bw" == $time_in_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_betw'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $time_in_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ii" <?php if ("ii" == $time_in_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_stts_with'] ?></OPTION>
       <OPTION value="qp" <?php if ("qp" == $time_in_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="df" <?php if ("df" == $time_in_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_dife'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['time_in'])) ? $this->New_label['time_in'] : "Time In";
 $nmgp_tab_label .= "time_in?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>

<?php
  $Form_base = "ddmmyyyyhhiiss";
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
  $date_format_show .= " ";
  $Str_time = strtolower($_SESSION['scriptcase']['reg_conf']['time_format']);
  $Lim   = strlen($Str_time);
  $Str   = "";
  $Ult   = "";
  $Arr_T = array();
  for ($I = 0; $I < $Lim; $I++)
  {
      $Char = substr($Str_time, $I, 1);
      if ($Char != $Ult && "" != $Str)
      {
          $Arr_T[] = $Str;
          $Str     = $Char;
      }
      else
      {
          $Str    .= $Char;
      }
      $Ult = $Char;
  }
  $Arr_T[] = $Str;
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
  $Arr_format = array_merge($Arr_D, $Arr_T);
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
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_time_in_dia" name="time_in_dia" value="<?php echo NM_encode_input($time_in_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.time_in_cond.value)">

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_time_in_mes" name="time_in_mes" value="<?php echo NM_encode_input($time_in_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.time_in_cond.value)">

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_time_in_ano" name="time_in_ano" value="<?php echo NM_encode_input($time_in_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 
<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "h")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_time_in_hor" name="time_in_hor" value="<?php echo NM_encode_input($time_in_hor); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.time_in_cond.value)">

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "i")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_time_in_min" name="time_in_min" value="<?php echo NM_encode_input($time_in_min); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.time_in_cond.value)">

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "s")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_time_in_seg" name="time_in_seg" value="<?php echo NM_encode_input($time_in_seg); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.time_in_cond.value)">

<?php
  }
?>

<?php

}

?>
<INPUT type="hidden" id="sc_time_in_jq">
        <SPAN id="id_css_time_in"  class="scFilterFieldFontEven">
 <?php echo $date_format_show ?>         </SPAN>
                 </TD>
       </TR>
       <TR valign="top">
        <TD id="id_vis_time_in"  <?php echo $str_display_time_in; ?> class="scFilterFieldFontEven">
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
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_time_in_input_2_dia" name="time_in_input_2_dia" value="<?php echo NM_encode_input($time_in_input_2_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.time_in_cond.value)">

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_time_in_input_2_mes" name="time_in_input_2_mes" value="<?php echo NM_encode_input($time_in_input_2_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.time_in_cond.value)">

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_time_in_input_2_ano" name="time_in_input_2_ano" value="<?php echo NM_encode_input($time_in_input_2_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 
<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "h")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_time_in_input_2_hor" name="time_in_input_2_hor" value="<?php echo NM_encode_input($time_in_input_2_hor); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.time_in_cond.value)">

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "i")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_time_in_input_2_min" name="time_in_input_2_min" value="<?php echo NM_encode_input($time_in_input_2_min); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.time_in_cond.value)">

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "s")
  {
?>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_time_in_input_2_seg" name="time_in_input_2_seg" value="<?php echo NM_encode_input($time_in_input_2_seg); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.time_in_cond.value)">

<?php
  }
?>

<?php

}

?>
         <INPUT type="hidden" id="sc_time_in_jq2">

        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD class="scFilterLabelOdd"><?php echo (isset($this->New_label['prices'])) ? $this->New_label['prices'] : "Prices"; ?></TD>
     <TD class="scFilterFieldOdd"> 
      <SELECT class="scFilterObjectOdd" name="prices_cond" onChange="nm_campos_between(document.getElementById('id_vis_prices'), this, 'prices')">
       <OPTION value="eq" <?php if ("eq" == $prices_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ii" <?php if ("ii" == $prices_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_stts_with'] ?></OPTION>
       <OPTION value="qp" <?php if ("qp" == $prices_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="df" <?php if ("df" == $prices_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_dife'] ?></OPTION>
       <OPTION value="bw" <?php if ("bw" == $prices_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_betw'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['prices'])) ? $this->New_label['prices'] : "Prices";
 $nmgp_tab_label .= "prices?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<INPUT  type="text" id="SC_prices" name="prices" value="<?php echo NM_encode_input($prices) ?>" size=18 alt="{datatype: 'decimal', maxLength: 18, precision: 0, decimalSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['dec_num'] ?>', thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" class="sc-js-input scFilterObjectOdd">        </TD>
       </TR>
       <TR valign="top">
        <TD id="id_vis_prices"  <?php echo $str_display_prices; ?> class="scFilterFieldFontOdd">
         <?php echo $date_sep_bw ?>&nbsp;
         <BR>
         <INPUT type="text" id="SC_prices_input_2" name="prices_input_2" value="<?php echo NM_encode_input($prices_input_2) ?>" size=18 alt="{datatype: 'decimal', maxLength: 18, precision: 0, decimalSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['dec_num'] ?>', thousandsSep: '<?php echo $_SESSION['scriptcase']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" class="sc-js-input sc-js-input scFilterObjectOdd">

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

   <TABLE width="100%" border="0" cellpadding="0" cellspacing="0" class="scFilterTable">
    <TR>
     <TD class="scFilterBlock">
       <?php echo $this->Ini->Nm_lang['lang_srch_cndt']; ?>
      <INPUT type="radio" name="NM_operador" value="and"<?php echo $Nm_oper_and; ?>><?php echo $this->Ini->Nm_lang['lang_srch_andd']; ?>
      <INPUT type="radio" name="NM_operador" value="or"<?php echo $Nm_oper_or; ?>><?php echo $this->Ini->Nm_lang['lang_srch_orrr']; ?>
     </TD>
    </TR>
   </TABLE>   <INPUT type="hidden" name="nmgp_tab_label" value="<?php echo NM_encode_input($nmgp_tab_label); ?>"> 
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
              if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Cada_filter    = mb_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
                  $Tipo_filter[0] = mb_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
              }
              elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
              {
                  $Cada_filter    = mb_convert_encoding($Cada_filter, "UTF-8");
                  $Tipo_filter[0] = mb_convert_encoding($Tipo_filter[0], "UTF-8");
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "           <option value=\"\">" . NM_encode_input($Nome_filter) . "</option>\r\n";
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
   if (is_file("Motel_Sales_Table_by_Room_help.txt"))
   {
      $Arq_WebHelp = file("Motel_Sales_Table_by_Room_help.txt"); 
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
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['opc_psq'] && !$this->aba_iframe)
   {
       if ($nm_apl_dependente == 1) 
       { 
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.form_cancel.submit()", "document.form_cancel.submit()", "sc_b_cancel_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
<?php
       } 
       else 
       { 
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.form_cancel.submit()", "document.form_cancel.submit()", "sc_b_cancel_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
<?php
       } 
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
              if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Cada_filter    = mb_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
                  $Tipo_filter[0] = mb_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
              }
              elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
              {
                  $Cada_filter    = mb_convert_encoding($Cada_filter, "UTF-8");
                  $Tipo_filter[0] = mb_convert_encoding($Tipo_filter[0], "UTF-8");
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "            <option value=\"\">" . NM_encode_input($Nome_filter) . "</option>\r\n";
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
 <TR align="center">
  <TD class="scFilterTableTd">
<style>
#rod_col1 { margin:0px; padding: 3px 0 0 5px; float:left; overflow:hidden;}
#rod_col2 { margin:0px; padding: 3px 5px 0 0; float:right; overflow:hidden; text-align:right;}

</style>

<table style="width: 100%; height:20px;" cellpadding="0px" cellspacing="0px" class="scFilterFooter">
    <tr>
        <td>
            <span class="scFilterFooterFont" id="rod_col1"></span>
        </td>
        <td>
            <span class="scFilterFooterFont" id="rod_col2"></span>
        </td>
    </tr>
</table>  </TD>
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
   <FORM style="display:none;" name="form_cancel"  method="POST" action="<?php echo $nm_url_saida; ?>" target="_self"> 
   <INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
   <INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<?php
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['orig_pesq'] == "grid")
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
   document.F1.room.value = "";
   document.F1.room_input_2.value = "";
   document.F1.time_in_dia.value = "";
   document.F1.time_in_mes.value = "";
   document.F1.time_in_ano.value = "";
   document.F1.time_in_input_2_dia.value = "";
   document.F1.time_in_input_2_mes.value = "";
   document.F1.time_in_input_2_ano.value = "";
   document.F1.time_in_hor.value = "";
   document.F1.time_in_min.value = "";
   document.F1.time_in_seg.value = "";
   document.F1.time_in_input_2_hor.value = "";
   document.F1.time_in_input_2_min.value = "";
   document.F1.time_in_input_2_seg.value = "";
   document.F1.prices.value = "";
   document.F1.prices_input_2.value = "";
   opc = document.F1.room_cond.selectedIndex;
   opc = document.F1.room_cond.options[opc].value;
   if (opc == "TP" || opc == "HJ" || opc == "OT" || opc == "U7" || opc == "SP" || opc == "US" || opc == "MM" || opc == "UM" || opc == "AM" || opc == "PS" || opc == "SS" || opc == "P3" || opc == "PM" || opc == "P7" || opc == "CY" || opc == "LY" || opc == "YY" || opc == "M6" || opc == "M3" || opc == "M18" || opc == "M24")
   {
       document.F1.room_cond.selectedIndex = 0;
   }
   nm_campos_between(document.getElementById('id_vis_room'), document.F1.room_cond, 'room');
   opc = document.F1.time_in_cond.selectedIndex;
   opc = document.F1.time_in_cond.options[opc].value;
   if (opc == "TP" || opc == "HJ" || opc == "OT" || opc == "U7" || opc == "SP" || opc == "US" || opc == "MM" || opc == "UM" || opc == "AM" || opc == "PS" || opc == "SS" || opc == "P3" || opc == "PM" || opc == "P7" || opc == "CY" || opc == "LY" || opc == "YY" || opc == "M6" || opc == "M3" || opc == "M18" || opc == "M24")
   {
       document.F1.time_in_cond.selectedIndex = 0;
   }
   nm_campos_between(document.getElementById('id_vis_time_in'), document.F1.time_in_cond, 'time_in');
   opc = document.F1.prices_cond.selectedIndex;
   opc = document.F1.prices_cond.options[opc].value;
   if (opc == "TP" || opc == "HJ" || opc == "OT" || opc == "U7" || opc == "SP" || opc == "US" || opc == "MM" || opc == "UM" || opc == "AM" || opc == "PS" || opc == "SS" || opc == "P3" || opc == "PM" || opc == "P7" || opc == "CY" || opc == "LY" || opc == "YY" || opc == "M6" || opc == "M3" || opc == "M18" || opc == "M24")
   {
       document.F1.prices_cond.selectedIndex = 0;
   }
   nm_campos_between(document.getElementById('id_vis_prices'), document.F1.prices_cond, 'prices');
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
    $('#SC_time_in_dia').bind('change', function() {sc_Motel_Sales_Table_by_Room_valida_dia(this)});
    $('#SC_time_in_hor').bind('change', function() {sc_Motel_Sales_Table_by_Room_valida_hora(this)});
    $('#SC_time_in_input_2_dia').bind('change', function() {sc_Motel_Sales_Table_by_Room_valida_dia(this)});
    $('#SC_time_in_input_2_hor').bind('change', function() {sc_Motel_Sales_Table_by_Room_valida_hora(this)});
    $('#SC_time_in_input_2_mes').bind('change', function() {sc_Motel_Sales_Table_by_Room_valida_mes(this)});
    $('#SC_time_in_input_2_min').bind('change', function() {sc_Motel_Sales_Table_by_Room_valida_min(this)});
    $('#SC_time_in_input_2_seg').bind('change', function() {sc_Motel_Sales_Table_by_Room_valida_seg(this)});
    $('#SC_time_in_mes').bind('change', function() {sc_Motel_Sales_Table_by_Room_valida_mes(this)});
    $('#SC_time_in_min').bind('change', function() {sc_Motel_Sales_Table_by_Room_valida_min(this)});
    $('#SC_time_in_seg').bind('change', function() {sc_Motel_Sales_Table_by_Room_valida_seg(this)});
 }
 function sc_Motel_Sales_Table_by_Room_valida_dia(obj)
 {
     if (obj.value < 1 || obj.value > 31)
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_iday'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_Motel_Sales_Table_by_Room_valida_mes(obj)
 {
     if (obj.value < 1 || obj.value > 12)
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_mnth'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_Motel_Sales_Table_by_Room_valida_hora(obj)
 {
     if (obj.value < 0 || obj.value > 23)
     {
         if (confirm (Nm_erro['lang_jscr_ivtm'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_Motel_Sales_Table_by_Room_valida_min(obj)
 {
     if (obj.value < 0 || obj.value > 59)
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_mint'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_Motel_Sales_Table_by_Room_valida_seg(obj)
 {
     if (obj.value < 0 || obj.value > 59)
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_secd'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_Motel_Sales_Table_by_Room_valida_cic(obj)
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
         if (confirm ("CIC " + SC_crit_inv + " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
            return false;
         }
     }
     return true;
 }
 function sc_Motel_Sales_Table_by_Room_valida_cnpj(obj)
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
         if (confirm ("CNPJ " + SC_crit_inv + " "  +  Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
            return false;
         }
     }
     return true;
 }
 function sc_Motel_Sales_Table_by_Room_valida_ciccnpj(obj)
 {
     var CnpjIn = obj.value;
     CnpjIn = CnpjIn.replace(/[.]/g, '');
     CnpjIn = CnpjIn.replace(/[-]/g, '');
     CnpjIn = CnpjIn.replace(/[/]/g, '');
     if (CnpjIn.length <= 11)
     {
         return sc_Motel_Sales_Table_by_Room_valida_cic(obj);
     }
     else
     {
         return sc_Motel_Sales_Table_by_Room_valida_cnpj(obj);
     }
 }
 function sc_Motel_Sales_Table_by_Room_valida_cep(obj)
 {
     var CepIn = obj.value;
     CepIn = CepIn.replace(/[-]/g, '');
     if (CepIn.length != 0 && (CepIn.length < 8 || CepIn == '00000000'))
     {
         if (confirm ("CEP " + SC_crit_inv + " "  +  Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
            return false;
         }
     }
     return true;
 }
</SCRIPT>
</BODY>
</HTML>
<?php
   }

   function gera_array_filtros()
   {
       $this->NM_fil_ant = array();
       $NM_patch   = "Mottech/Motel_Sales_Table_by_Room";
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
                         $this->NM_fil_ant[$Name_filter][1] = "" . $this->Ini->Nm_lang['lang_srch_public'] . "";
                         $Sc_v6 = true;
                     }
                 }
                 if (!$Sc_v6)
                 {
                     $this->NM_fil_ant[$NM_arq][0] = $NM_patch . "/" . $NM_arq;
                     $this->NM_fil_ant[$NM_arq][1] = "" . $this->Ini->Nm_lang['lang_srch_public'] . "";
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
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "Motel_Sales_Table_by_Room.php";
      $this->Campos_Mens_erro = ""; 
      $this->nm_data = new nm_data("en_us");
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['cond_pesq'] = "";
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
      $this->comando        = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['where_orig'];
      $this->comando_sum    = "";
      $this->comando_filtro = "";
      $this->comando_ini    = "ini";
      $this->comando_fim    = "";
      $this->NM_operador    = (isset($NM_operador) && ("and" == strtolower($NM_operador) || "or" == strtolower($NM_operador))) ? $NM_operador : "and";
   }

   function salva_filtro()
   {
      global 
             $room_cond, $room, $room_input_2,
             $time_in_cond, $time_in, $time_in_dia, $time_in_mes, $time_in_ano, $time_in_hor, $time_in_min, $time_in_seg, $time_in_input_2_dia, $time_in_input_2_mes, $time_in_input_2_ano, $time_in_input_2_min, $time_in_input_2_hor, $time_in_input_2_seg,
             $prices_cond, $prices, $prices_input_2,
             $nmgp_save_name, $NM_operador, $nmgp_save_option, $script_case_init;
      if (!function_exists("nm_limpa_valor"))
      {
          include_once($_SESSION['sc_session'][$script_case_init]['Motel_Sales_Table_by_Room']['path_libs_php'] . "/nm_gp_limpa.php");
      }
      if (isset($nmgp_save_name) && !empty($nmgp_save_name))
      { 
          if ($room_cond != "in")
          {
              nm_limpa_numero($room, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
          }
          else
          {
              $Nm_sc_valores = explode(",", $room);
              foreach ($Nm_sc_valores as $II => $Nm_sc_valor)
              {
                  $Nm_sc_valor = trim($Nm_sc_valor);
                  nm_limpa_numero($Nm_sc_valor, $_SESSION['scriptcase']['reg_conf']['grup_num']); 
                  $Nm_sc_valores[$II] = $Nm_sc_valor;
              }
              $room = implode(",", $Nm_sc_valores);
          }
          if ($room_cond != "in")
          {
              nm_limpa_numero($room_input_2, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
          }
          if ($prices_cond != "in")
          {
              nm_limpa_numero($prices, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
          }
          else
          {
              $Nm_sc_valores = explode(",", $prices);
              foreach ($Nm_sc_valores as $II => $Nm_sc_valor)
              {
                  $Nm_sc_valor = trim($Nm_sc_valor);
                  nm_limpa_numero($Nm_sc_valor, $_SESSION['scriptcase']['reg_conf']['grup_num']); 
                  $Nm_sc_valores[$II] = $Nm_sc_valor;
              }
              $prices = implode(",", $Nm_sc_valores);
          }
          if ($prices_cond != "in")
          {
              nm_limpa_numero($prices_input_2, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
          }
          $NM_str_filter  = "SC_V6_" . $nmgp_save_name . "@NMF@";
          $nmgp_save_name = str_replace('/', ' ', $nmgp_save_name);
          $nmgp_save_name = str_replace('\\', ' ', $nmgp_save_name);
          $nmgp_save_name = str_replace('.', ' ', $nmgp_save_name);
          if (!NM_is_utf8($nmgp_save_name))
          {
              $nmgp_save_name = mb_convert_encoding($nmgp_save_name, "UTF-8");
          }
          $NM_temp  = (isset($room_cond)) ? $room_cond : ""; 
          $NM_str_filter .= "room_cond#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($room)) ? $room : ""; 
          $NM_str_filter .= "room#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($room_input_2)) ? $room_input_2 : ""; 
          $NM_str_filter .= "room_input_2#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($time_in_cond)) ? $time_in_cond : ""; 
          $NM_str_filter .= "time_in_cond#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($time_in_dia)) ? $time_in_dia : ""; 
          $NM_str_filter .= "time_in_dia#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($time_in_mes)) ? $time_in_mes : ""; 
          $NM_str_filter .= "time_in_mes#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($time_in_ano)) ? $time_in_ano : ""; 
          $NM_str_filter .= "time_in_ano#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($time_in_input_2_dia)) ? $time_in_input_2_dia : ""; 
          $NM_str_filter .= "time_in_input_2_dia#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($time_in_input_2_mes)) ? $time_in_input_2_mes : ""; 
          $NM_str_filter .= "time_in_input_2_mes#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($time_in_input_2_ano)) ? $time_in_input_2_ano : ""; 
          $NM_str_filter .= "time_in_input_2_ano#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($time_in_hor)) ? $time_in_hor : ""; 
          $NM_str_filter .= "time_in_hor#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($time_in_min)) ? $time_in_min : ""; 
          $NM_str_filter .= "time_in_min#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($time_in_seg)) ? $time_in_seg : ""; 
          $NM_str_filter .= "time_in_seg#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($time_in_input_2_hor)) ? $time_in_input_2_hor : ""; 
          $NM_str_filter .= "time_in_input_2_hor#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($time_in_input_2_min)) ? $time_in_input_2_min : ""; 
          $NM_str_filter .= "time_in_input_2_min#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($time_in_input_2_seg)) ? $time_in_input_2_seg : ""; 
          $NM_str_filter .= "time_in_input_2_seg#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($prices_cond)) ? $prices_cond : ""; 
          $NM_str_filter .= "prices_cond#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($prices)) ? $prices : ""; 
          $NM_str_filter .= "prices#NMF#" . $NM_temp . "@NMF@"; 
          $NM_temp  = (isset($prices_input_2)) ? $prices_input_2 : ""; 
          $NM_str_filter .= "prices_input_2#NMF#" . $NM_temp . "@NMF@"; 
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
          $NM_patch .= "Motel_Sales_Table_by_Room/";
          if (!is_dir($NM_patch))
          {
              $NMdir = mkdir($NM_patch, 0755);
          }
          $Parms_usr  = "";
          $NM_filter = fopen ($NM_patch . $nmgp_save_name, 'w');
          if (!NM_is_utf8($NM_str_filter))
          {
              $NM_str_filter = mb_convert_encoding($NM_str_filter, "UTF-8");
          }
          fwrite($NM_filter, $NM_str_filter);
          fclose($NM_filter);
      } 
   }
   function recupera_filtro()
   {
      global 
      $room_cond, $room, $room_input_2,
             $time_in_cond, $time_in, $time_in_dia, $time_in_mes, $time_in_ano, $time_in_hor, $time_in_min, $time_in_seg, $time_in_input_2_dia, $time_in_input_2_mes, $time_in_input_2_ano, $time_in_input_2_min, $time_in_input_2_hor, $time_in_input_2_seg,
             $prices_cond, $prices, $prices_input_2,
      $NM_filters, $NM_operador, $script_case_init;
      if (!function_exists("nmgp_Form_Num_Val"))
      {
          include_once($_SESSION['sc_session'][$script_case_init]['Motel_Sales_Table_by_Room']['path_libs_php'] . "/nm_edit.php");
      }
      $Look_man = array();
      $tp_html['room_cond'] = 'select';
      $tp_html['time_in_cond'] = 'select';
      $tp_html['prices_cond'] = 'select';
      $tp_html['room'] = 'text';
      $tp_html['room_input_2'] = 'text';
      $tp_html['time_in_dia'] = 'text';
      $tp_html['time_in_mes'] = 'text';
      $tp_html['time_in_ano'] = 'text';
      $tp_html['time_in_input_2_dia'] = 'text';
      $tp_html['time_in_input_2_mes'] = 'text';
      $tp_html['time_in_input_2_ano'] = 'text';
      $tp_html['time_in_hor'] = 'text';
      $tp_html['time_in_min'] = 'text';
      $tp_html['time_in_seg'] = 'text';
      $tp_html['time_in_input_2_hor'] = 'text';
      $tp_html['time_in_input_2_min'] = 'text';
      $tp_html['time_in_input_2_seg'] = 'text';
      $tp_html['prices'] = 'text';
      $tp_html['prices_input_2'] = 'text';
      $tp_html['NM_operador'] = 'radio';
      $NM_patch = $this->NM_path_filter . "/" . $NM_filters;
      if (!is_file($NM_patch))
      {
          $NM_filters = mb_convert_encoding($NM_filters, "UTF-8");
          $NM_patch = $this->NM_path_filter . "/" . $NM_filters;
      }
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
                  if ($SC_V6 && ($Cada_cmp[0] == "room_cond" || $Cada_cmp[0] == "prices_cond"))
                  {
                      $$Cada_cmp[0] = trim($Cada_cmp[1]);
                  }
                  if ($SC_V6 && $Cada_cmp[0] == "room")
                  {
                      if (strtoupper($room_cond) != "II" && strtoupper($room_cond) != "QP" && strtoupper($room_cond) != "NP" && strtoupper($room_cond) != "IN") 
                      { 
                          nmgp_Form_Num_Val($Cada_cmp[1], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
                      } 
                  }
                  if ($SC_V6 && $Cada_cmp[0] == "room_input_2")
                  {
                      if (strtoupper($room_cond) != "II" && strtoupper($room_cond) != "QP" && strtoupper($room_cond) != "NP" && strtoupper($room_cond) != "IN") 
                      { 
                          nmgp_Form_Num_Val($Cada_cmp[1], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
                      } 
                  }
                  if ($SC_V6 && $Cada_cmp[0] == "prices")
                  {
                      if (strtoupper($prices_cond) != "II" && strtoupper($prices_cond) != "QP" && strtoupper($prices_cond) != "NP" && strtoupper($prices_cond) != "IN") 
                      { 
                          nmgp_Form_Num_Val($Cada_cmp[1], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
                      } 
                  }
                  if ($SC_V6 && $Cada_cmp[0] == "prices_input_2")
                  {
                      if (strtoupper($prices_cond) != "II" && strtoupper($prices_cond) != "QP" && strtoupper($prices_cond) != "NP" && strtoupper($prices_cond) != "IN") 
                      { 
                          nmgp_Form_Num_Val($Cada_cmp[1], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
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
                         $Cada_val_sv[] = trim($v_fim[0]);
                         if (isset($Look_man[$Cada_cmp[0]][$v_fim[0]]))
                         {
                             $v_fim[0] = $v_fim[0] . "##@@" . $Look_man[$Cada_cmp[0]][$v_fim[0]];
                         }
                         $Cada_val_sv1[] = Motel_Sales_Table_by_Room_pack_protect_string(trim($v_fim[0]));
                      }
                      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
                      {
                          $Cada_val_sv = NM_conv_charset($Cada_val_sv, $_SESSION['scriptcase']['charset'], "UTF-8");
                      }
                      $$Cada_cmp[0] = $Cada_val_sv;
                      $this->ajax_return_fields[$Cada_cmp[0]]['vallist'] = $Cada_val_sv1;
                  }
                  else
                  {
                      $Cada_val_sv = trim($Cada_cmp[1]);
                      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
                      {
                          $Cada_val_sv = NM_conv_charset($Cada_val_sv, $_SESSION['scriptcase']['charset'], "UTF-8");
                      }
                      $$Cada_cmp[0] = $Cada_val_sv;
                      $this->ajax_return_fields[$Cada_cmp[0]]['vallist'] = array(Motel_Sales_Table_by_Room_pack_protect_string(trim($Cada_cmp[1])));
                  }
              }
          }
          $this->NM_curr_fil = $NM_filters;
          $this->NM_operador = $NM_operador;
      }
   }
   function apaga_filtro()
   {
      global $NM_filters_del;
      if (isset($NM_filters_del) && !empty($NM_filters_del))
      { 
          $NM_patch = $this->NM_path_filter . "/" . $NM_filters_del;
          if (!is_file($NM_patch))
          {
              $NM_filters_del = mb_convert_encoding($NM_filters_del, "UTF-8");
              $NM_patch = $this->NM_path_filter . "/" . $NM_filters_del;
          }
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
      global $room_cond, $room, $room_input_2,
             $time_in_cond, $time_in, $time_in_dia, $time_in_mes, $time_in_ano, $time_in_hor, $time_in_min, $time_in_seg, $time_in_input_2_dia, $time_in_input_2_mes, $time_in_input_2_ano, $time_in_input_2_min, $time_in_input_2_hor, $time_in_input_2_seg,
             $prices_cond, $prices, $prices_input_2, $nmgp_tab_label;

      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $room_cond_salva = $room_cond; 
      if (!isset($room_input_2) || $room_input_2 == "")
      {
          $room_input_2 = $room;
      }
      $time_in_cond_salva = $time_in_cond; 
      if (!isset($time_in_input_2_dia) || $time_in_input_2_dia == "")
      {
          $time_in_input_2_dia = $time_in_dia;
      }
      if (!isset($time_in_input_2_mes) || $time_in_input_2_mes == "")
      {
          $time_in_input_2_mes = $time_in_mes;
      }
      if (!isset($time_in_input_2_ano) || $time_in_input_2_ano == "")
      {
          $time_in_input_2_ano = $time_in_ano;
      }
      if (!isset($time_in_input_2_hor) || $time_in_input_2_hor == "")
      {
          $time_in_input_2_hor = $time_in_hor;
      }
      if (!isset($time_in_input_2_min) || $time_in_input_2_min == "")
      {
          $time_in_input_2_min = $time_in_min;
      }
      if (!isset($time_in_input_2_seg) || $time_in_input_2_seg == "")
      {
          $time_in_input_2_seg = $time_in_seg;
      }
      $prices_cond_salva = $prices_cond; 
      if (!isset($prices_input_2) || $prices_input_2 == "")
      {
          $prices_input_2 = $prices;
      }
      if ($room_cond != "in")
      {
          nm_limpa_numero($room, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      else
      {
          $Nm_sc_valores = explode(",", $room);
          foreach ($Nm_sc_valores as $II => $Nm_sc_valor)
          {
              $Nm_sc_valor = trim($Nm_sc_valor);
              nm_limpa_numero($Nm_sc_valor, $_SESSION['scriptcase']['reg_conf']['grup_num']); 
              $Nm_sc_valores[$II] = $Nm_sc_valor;
          }
          $room = implode(",", $Nm_sc_valores);
      }
      if ($room_cond != "in")
      {
          nm_limpa_numero($room_input_2, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      if ($prices_cond != "in")
      {
          nm_limpa_numero($prices, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      else
      {
          $Nm_sc_valores = explode(",", $prices);
          foreach ($Nm_sc_valores as $II => $Nm_sc_valor)
          {
              $Nm_sc_valor = trim($Nm_sc_valor);
              nm_limpa_numero($Nm_sc_valor, $_SESSION['scriptcase']['reg_conf']['grup_num']); 
              $Nm_sc_valores[$II] = $Nm_sc_valor;
          }
          $prices = implode(",", $Nm_sc_valores);
      }
      if ($prices_cond != "in")
      {
          nm_limpa_numero($prices_input_2, $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['room'] = $room; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['room_input_2'] = $room_input_2; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['room_cond'] = $room_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_dia'] = $time_in_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_mes'] = $time_in_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_ano'] = $time_in_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_input_2_dia'] = $time_in_input_2_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_input_2_mes'] = $time_in_input_2_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_input_2_ano'] = $time_in_input_2_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_hor'] = $time_in_hor; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_min'] = $time_in_min; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_seg'] = $time_in_seg; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_input_2_hor'] = $time_in_input_2_hor; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_input_2_min'] = $time_in_input_2_min; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_input_2_seg'] = $time_in_input_2_seg; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_cond'] = $time_in_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['prices'] = $prices; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['prices_input_2'] = $prices_input_2; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['prices_cond'] = $prices_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['NM_operador'] = $this->NM_operador; 
      $Conteudo = $room;
      if (strtoupper($room_cond) != "II" && strtoupper($room_cond) != "QP" && strtoupper($room_cond) != "NP" && strtoupper($room_cond) != "IN") 
      { 
          nmgp_Form_Num_Val($Conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      } 
      $this->cmp_formatado['room'] = $Conteudo;
      $Conteudo = $room_input_2;
      if (strtoupper($room_cond) != "II" && strtoupper($room_cond) != "QP" && strtoupper($room_cond) != "NP" && strtoupper($room_cond) != "IN") 
      { 
          nmgp_Form_Num_Val($Conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      } 
      $this->cmp_formatado['room_Input_2'] = $Conteudo;
      $Conteudo  = "";
      $Formato   = "";
      if (!empty($time_in_dia))
      {
          $Conteudo .= (strlen($time_in_dia) == 2) ? $time_in_dia : "0" . $time_in_dia;
          $Formato  .= "DD";
      };
      if (!empty($time_in_mes))
      {
          $Conteudo .= (strlen($time_in_mes) == 2) ? $time_in_mes : "0" . $time_in_mes;
          $Formato  .= "MM";
      }
      $Conteudo .= $time_in_ano;
      $Formato  .= "YYYY";
      if (!empty($time_in_hor))
      {
          $Conteudo .= (strlen($time_in_hor) == 2) ? $time_in_hor : "0" . $time_in_hor;
          $Formato  .= "HH";
      }
      if (!empty($time_in_min))
      {
          $Conteudo .= (strlen($time_in_min) == 2) ? $time_in_min : "0" . $time_in_min;
          $Formato  .= "II";
      }
      if (!empty($time_in_seg))
      {
          $Conteudo .= (strlen($time_in_seg) == 2) ? $time_in_seg : "0" . $time_in_seg;
          $Formato  .= "SS";
      }
      if (strlen($Conteudo) == 14)
      {
          if (is_numeric($Conteudo) && $Conteudo > 0) 
          { 
              $this->nm_data->SetaData($Conteudo, $Formato);
              $Conteudo = $this->nm_data->FormataSaida($this->Nm_date_format("DH", "ddmmaaaa;hhiiss"));
          } 
      }
      $this->cmp_formatado['time_in'] = $Conteudo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in'] = $Conteudo; 
      $Conteudo  = "";
      $Formato   = "";
      if (!empty($time_in_input_2_dia))
      {
          $Conteudo .= (strlen($time_in_input_2_dia) == 2) ? $time_in_input_2_dia : "0" . $time_in_input_2_dia;
          $Formato  .= "DD";
      }
      if (!empty($time_in_input_2_mes))
      {
          $Conteudo .= (strlen($time_in_input_2_mes) == 2) ? $time_in_input_2_mes : "0" . $time_in_input_2_mes;
          $Formato  .= "MM";
      }
      $Conteudo .= $time_in_input_2_ano;
      $Formato  .= "YYYY";
      if (!empty($time_in_input_2_hor))
      {
          $Conteudo .= (strlen($time_in_input_2_hor) == 2) ? $time_in_input_2_hor : "0" . $time_in_input_2_hor;
          $Formato  .= "HH";
      }
      if (!empty($time_in_input_2_min))
      {
          $Conteudo .= (strlen($time_in_input_2_min) == 2) ? $time_in_input_2_min : "0" . $time_in_input_2_min;
          $Formato  .= "II";
      }
      if (!empty($time_in_input_2_seg))
      {
          $Conteudo .= (strlen($time_in_input_2_seg) == 2) ? $time_in_input_2_seg : "0" . $time_in_input_2_seg;
          $Formato  .= "SS";
      }
      if (strlen($Conteudo) == 14)
      {
          if (is_numeric($Conteudo) && $Conteudo > 0) 
          { 
              $this->nm_data->SetaData($Conteudo, $Formato);
              $Conteudo = $this->nm_data->FormataSaida($this->Nm_date_format("DH", "ddmmaaaa;hhiiss"));
          } 
      }
      $this->cmp_formatado['time_in_Input_2'] = $Conteudo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_input_2'] = $Conteudo; 
      $Conteudo = $prices;
      if (strtoupper($prices_cond) != "II" && strtoupper($prices_cond) != "QP" && strtoupper($prices_cond) != "NP" && strtoupper($prices_cond) != "IN") 
      { 
          nmgp_Form_Num_Val($Conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      } 
      $this->cmp_formatado['prices'] = $Conteudo;
      $Conteudo = $prices_input_2;
      if (strtoupper($prices_cond) != "II" && strtoupper($prices_cond) != "QP" && strtoupper($prices_cond) != "NP" && strtoupper($prices_cond) != "IN") 
      { 
          nmgp_Form_Num_Val($Conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      } 
      $this->cmp_formatado['prices_Input_2'] = $Conteudo;

      //----- $room
      if (isset($room) || $room_cond == "nu" || $room_cond == "nn")
      {
         $this->monta_condicao("Room", $room_cond, $room, $room_input_2, "room");
      }

      //----- $time_in
      $nm_tp_dado = "DATETIME";
      $nm_format_db = "YYYY-MM-DD HH:II:SS";
      $condicao = strtoupper($time_in_cond);
      $array_time_in = array();
      $array_time_in2 = array();
      $nm_psq_dt1 = $time_in_dia . $time_in_mes . $time_in_ano . $time_in_hor . $time_in_min . $time_in_seg;
      $nm_psq_dt_inf  = ("" == $time_in_ano) ? "YYYY" : "$time_in_ano";
      $nm_psq_dt_inf .= "-";
      $nm_psq_dt_inf .= ("" == $time_in_mes) ? "MM" : "$time_in_mes";
      $nm_psq_dt_inf .= "-";
      $nm_psq_dt_inf .= ("" == $time_in_dia) ? "DD"   : "$time_in_dia";
      $nm_psq_dt_inf .= " ";
      $nm_psq_dt_inf .= ("" == $time_in_hor) ? "HH" : "$time_in_hor";
      $nm_psq_dt_inf .= ":";
      $nm_psq_dt_inf .= ("" == $time_in_min) ? "II" : "$time_in_min";
      $nm_psq_dt_inf .= ":";
      $nm_psq_dt_inf .= ("" == $time_in_seg) ? "SS" : "$time_in_seg";
      nm_conv_form_data_hora($nm_psq_dt_inf, "AAAA-MM-DD HH:II:SS", $nm_format_db);
      $array_time_in["dia"] = ("" == $time_in_dia) ? "__"   : "$time_in_dia";
      $array_time_in["mes"] = ("" == $time_in_mes) ? "__"   : "$time_in_mes";
      $array_time_in["ano"] = ("" == $time_in_ano) ? "____" : "$time_in_ano";
      $array_time_in["hor"] = ("" == $time_in_hor) ? "__" : "$time_in_hor";
      $array_time_in["min"] = ("" == $time_in_min) ? "__" : "$time_in_min";
      $array_time_in["seg"] = ("" == $time_in_seg) ? "__" : "$time_in_seg";
      $this->NM_data_qp = $array_time_in;
      $nm_dt_compl = $array_time_in["ano"] . "-" . $array_time_in["mes"] . "-" . $array_time_in["dia"] . " " . $array_time_in["hor"] . ":" . $array_time_in["min"] . ":" . $array_time_in["seg"];
      nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
//
      if ($condicao == "BW")
      {
          $array_time_in2["dia"] = ("" == $time_in_input_2_dia) ? "__"   : "$time_in_input_2_dia";
          $array_time_in2["mes"] = ("" == $time_in_input_2_mes) ? "__"   : "$time_in_input_2_mes";
          $array_time_in2["ano"] = ("" == $time_in_input_2_ano) ? "____" : "$time_in_input_2_ano";
          $array_time_in2["hor"] = ("" == $time_in_input_2_hor) ? "__" : "$time_in_input_2_hor";
          $array_time_in2["min"] = ("" == $time_in_input_2_min) ? "__" : "$time_in_input_2_min";
          $array_time_in2["seg"] = ("" == $time_in_input_2_seg) ? "__" : "$time_in_input_2_seg";
          $this->data_menor($array_time_in);
          $nm_dt_compl = $array_time_in["ano"] . "-" . $array_time_in["mes"] . "-" . $array_time_in["dia"] . " " . $array_time_in["hor"] . ":" . $array_time_in["min"] . ":" . $array_time_in["seg"];
          nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
          $this->data_maior($array_time_in2);
          $nm_dt_compl_2 = $array_time_in2["ano"] . "-" . $array_time_in2["mes"] . "-" . $array_time_in2["dia"] . " " . $array_time_in2["hor"] . ":" . $array_time_in2["min"] . ":" . $array_time_in2["seg"];
          nm_conv_form_data_hora($nm_dt_compl_2, "AAAA-MM-DD HH:II:SS", $nm_format_db);
      }
      else
      {
          $array_time_in2 = $array_time_in;
      }
      if (FALSE !== strpos($nm_dt_compl, "__"))
      {
         if ($condicao == "II")
         {
             $condicao = "QP";
         }
         elseif ($condicao == "DF")
         {
             $this->data_menor($array_time_in);
             $this->data_maior($array_time_in2);
             $nm_dt_compl = $array_time_in["ano"] . "-" . $array_time_in["mes"] . "-" . $array_time_in["dia"] . " " . $array_time_in["hor"] . ":" . $array_time_in["min"] . ":" . $array_time_in["seg"];
             nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
             $nm_dt_compl_2 = $array_time_in2["ano"] . "-" . $array_time_in2["mes"] . "-" . $array_time_in2["dia"] . " " . $array_time_in2["hor"] . ":" . $array_time_in2["min"] . ":" . $array_time_in2["seg"];
             nm_conv_form_data_hora($nm_dt_compl_2, "AAAA-MM-DD HH:II:SS", $nm_format_db);
             $condicao = "BW";
             $nm_tp_dado .= "DF";
         }
         elseif ($condicao == "EQ")
         {
             $this->data_menor($array_time_in);
             $this->data_maior($array_time_in2);
             $nm_dt_compl = $array_time_in["ano"] . "-" . $array_time_in["mes"] . "-" . $array_time_in["dia"] . " " . $array_time_in["hor"] . ":" . $array_time_in["min"] . ":" . $array_time_in["seg"];
             nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
             $nm_dt_compl_2 = $array_time_in2["ano"] . "-" . $array_time_in2["mes"] . "-" . $array_time_in2["dia"] . " " . $array_time_in2["hor"] . ":" . $array_time_in2["min"] . ":" . $array_time_in2["seg"];
             nm_conv_form_data_hora($nm_dt_compl_2, "AAAA-MM-DD HH:II:SS", $nm_format_db);
             $condicao = "BW";
             $nm_tp_dado .= "EQ";
         }
         elseif ($condicao == "GT")
         {
             $this->data_maior($array_time_in);
             $nm_dt_compl = $array_time_in["ano"] . "-" . $array_time_in["mes"] . "-" . $array_time_in["dia"] . " " . $array_time_in["hor"] . ":" . $array_time_in["min"] . ":" . $array_time_in["seg"];
             nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
         }
         elseif ($condicao == "GE")
         {
             $this->data_menor($array_time_in);
             $nm_dt_compl = $array_time_in["ano"] . "-" . $array_time_in["mes"] . "-" . $array_time_in["dia"] . " " . $array_time_in["hor"] . ":" . $array_time_in["min"] . ":" . $array_time_in["seg"];
             nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
         }
         elseif ($condicao == "LT")
         {
             $this->data_menor($array_time_in);
             $nm_dt_compl = $array_time_in["ano"] . "-" . $array_time_in["mes"] . "-" . $array_time_in["dia"] . " " . $array_time_in["hor"] . ":" . $array_time_in["min"] . ":" . $array_time_in["seg"];
             nm_conv_form_data_hora($nm_dt_compl, "AAAA-MM-DD HH:II:SS", $nm_format_db);
         }
         elseif ($condicao == "LE")
         {
             $this->data_maior($array_time_in);
             $nm_dt_compl = $array_time_in["ano"] . "-" . $array_time_in["mes"] . "-" . $array_time_in["dia"] . " " . $array_time_in["hor"] . ":" . $array_time_in["min"] . ":" . $array_time_in["seg"];
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
          $this->monta_condicao("Time_In", $condicao, trim($nm_dt_compl), trim($nm_dt_compl_2), "time_in", $nm_tp_dado);
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in']   = trim($nm_dt_compl); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']['time_in_input_2'] = trim($nm_dt_compl_2); 
      }
      $nm_tp_dado = "";

      //----- $prices
      if (isset($prices) || $prices_cond == "nu" || $prices_cond == "nn")
      {
         $this->monta_condicao("Prices", $prices_cond, $prices, $prices_input_2, "prices");
      }
   }

   /**
    * @access  public
    */
   function finaliza_resultado()
   {
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca']) && $_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['campos_busca'], "UTF-8", $_SESSION['scriptcase']['charset']);
      }

      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['where_pesq_lookup']  = $this->comando_sum . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['where_pesq']         = $this->comando . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['opcao']              = "pesq";
      if ("" == $this->comando_filtro)
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['where_pesq_filtro'] = "";
      }
      else
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['where_pesq_filtro'] = " (" . $this->comando_filtro . ")";
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['where_pesq'] != $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['where_pesq_ant'])
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['cond_pesq'] .= $this->NM_operador;
         $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['contr_array_resumo'] = "NAO";
         $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['contr_total_geral']  = "NAO";
         unset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['tot_geral']);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['where_pesq_ant'] = $this->comando . $this->comando_fim;
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Sales_Table_by_Room']['fast_search']);

      $this->retorna_pesq();
   }
   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarWeekInit($sDay)
   {
       switch ($sDay) {
           case 'MO': return 1; break;
           case 'TU': return 2; break;
           case 'WE': return 3; break;
           case 'TH': return 4; break;
           case 'FR': return 5; break;
           case 'SA': return 6; break;
           default  : return 7; break;
       }
   } // jqueryCalendarWeekInit

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
}

?>
