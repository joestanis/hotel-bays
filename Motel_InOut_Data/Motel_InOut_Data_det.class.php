<?php
//--- 
class Motel_InOut_Data_det
{
   var $Ini;
   var $Erro;
   var $Db;
   var $nm_data;
   var $NM_raiz_img; 
   var $nmgp_botoes; 
   var $date;
   var $sc_field_0;
   var $sc_field_1;
   var $sc_field_2;
   var $sc_field_3;
   var $sc_field_4;
   var $sc_field_5;
   var $sc_field_6;
   var $sc_field_7;
   var $sc_field_8;
   var $sc_field_9;
   var $sc_field_10;
   var $sc_field_11;
   var $sc_field_12;
   var $sc_field_13;
   var $sc_field_14;
   var $sc_field_15;
   var $sc_field_16;
   var $sc_field_17;
   var $sc_field_18;
   var $sc_field_19;
   var $sc_field_20;
   var $sc_field_21;
   var $sc_field_22;
   var $sc_field_23;
 function monta_det()
 {
    global 
           $nm_saida, $nm_lang, $nmgp_cor_print, $nmgp_tipo_pdf;
    $this->nmgp_botoes['det_pdf'] = "on";
    $this->nmgp_botoes['det_print'] = "on";
    if (isset($_SESSION['scriptcase']['sc_apl_conf']['Motel_InOut_Data']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['Motel_InOut_Data']['btn_display']))
    {
        foreach ($_SESSION['scriptcase']['sc_apl_conf']['Motel_InOut_Data']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
        {
            $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
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
    else 
    { 
        $this->date_2 = ""; 
    } 
    $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['where_orig'];
    $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['where_pesq'];
    $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['where_pesq_filtro'];
    $this->nm_field_dinamico = array();
    $this->nm_order_dinamico = array();
    $this->nm_data = new nm_data("en_us");
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
    $this->NM_raiz_img  = ""; 
    $this->sc_proc_grid = false; 
    include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
    $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['seq_dir'] = 0; 
    $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['sub_dir'] = array(); 
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
   $this->nm_data->SetaData(date("Y/m/d H:i:s"), "YYYY/MM/DD HH:II:SS"); 
   $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
   { 
       $nmgp_select = "SELECT date, [1] + N' - ' + [2], [3] + N' - ' + [4], [5] + N' - ' + [6], [6] + N' - ' + [7], [7] + N' - ' + [8], [9] + N' - ' + [10], [10] + N' - ' + [11], [11] + N' - ' + [12], [13] + N' - ' + [14], [15] + N' - ' + [16], [16] + N' - ' + [17], [18] + N' - ' + [19], [20] + N' - ' + [21], [22] + N' - ' + [23], [24] + N' - ' + [25], [26] + N' - ' + [27], [28] + N' - ' + [29], [30] + N' - ' + [31], [31] + N' - ' + [32], [33] + N' - ' + [34], [35] + N' - ' + [36], [37] + N' - ' + [38], [38] + N' - ' + [39], [40] + N' - ' + [41] from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
   { 
       $nmgp_select = "SELECT date, [1] + N' - ' + [2], [3] + N' - ' + [4], [5] + N' - ' + [6], [6] + N' - ' + [7], [7] + N' - ' + [8], [9] + N' - ' + [10], [10] + N' - ' + [11], [11] + N' - ' + [12], [13] + N' - ' + [14], [15] + N' - ' + [16], [16] + N' - ' + [17], [18] + N' - ' + [19], [20] + N' - ' + [21], [22] + N' - ' + [23], [24] + N' - ' + [25], [26] + N' - ' + [27], [28] + N' - ' + [29], [30] + N' - ' + [31], [31] + N' - ' + [32], [33] + N' - ' + [34], [35] + N' - ' + [36], [37] + N' - ' + [38], [38] + N' - ' + [39], [40] + N' - ' + [41] from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle)) 
   { 
       $nmgp_select = "SELECT date, [1] + N' - ' + [2], [3] + N' - ' + [4], [5] + N' - ' + [6], [6] + N' - ' + [7], [7] + N' - ' + [8], [9] + N' - ' + [10], [10] + N' - ' + [11], [11] + N' - ' + [12], [13] + N' - ' + [14], [15] + N' - ' + [16], [16] + N' - ' + [17], [18] + N' - ' + [19], [20] + N' - ' + [21], [22] + N' - ' + [23], [24] + N' - ' + [25], [26] + N' - ' + [27], [28] + N' - ' + [29], [30] + N' - ' + [31], [31] + N' - ' + [32], [33] + N' - ' + [34], [35] + N' - ' + [36], [37] + N' - ' + [38], [38] + N' - ' + [39], [40] + N' - ' + [41] from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
   { 
       $nmgp_select = "SELECT date, [1] + N' - ' + [2], [3] + N' - ' + [4], [5] + N' - ' + [6], [6] + N' - ' + [7], [7] + N' - ' + [8], [9] + N' - ' + [10], [10] + N' - ' + [11], [11] + N' - ' + [12], [13] + N' - ' + [14], [15] + N' - ' + [16], [16] + N' - ' + [17], [18] + N' - ' + [19], [20] + N' - ' + [21], [22] + N' - ' + [23], [24] + N' - ' + [25], [26] + N' - ' + [27], [28] + N' - ' + [29], [30] + N' - ' + [31], [31] + N' - ' + [32], [33] + N' - ' + [34], [35] + N' - ' + [36], [37] + N' - ' + [38], [38] + N' - ' + [39], [40] + N' - ' + [41] from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT date, [1] + N' - ' + [2], [3] + N' - ' + [4], [5] + N' - ' + [6], [6] + N' - ' + [7], [7] + N' - ' + [8], [9] + N' - ' + [10], [10] + N' - ' + [11], [11] + N' - ' + [12], [13] + N' - ' + [14], [15] + N' - ' + [16], [16] + N' - ' + [17], [18] + N' - ' + [19], [20] + N' - ' + [21], [22] + N' - ' + [23], [24] + N' - ' + [25], [26] + N' - ' + [27], [28] + N' - ' + [29], [30] + N' - ' + [31], [31] + N' - ' + [32], [33] + N' - ' + [34], [35] + N' - ' + [36], [37] + N' - ' + [38], [38] + N' - ' + [39], [40] + N' - ' + [41] from " . $this->Ini->nm_tabela; 
   } 
   $parms_det = explode(";", $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['chave_det']) ; 
   foreach ($parms_det as $key => $cada_par)
   {
       $parms_det[$key] = stripslashes($parms_det[$key]);
       $parms_det[$key] = $this->Db->qstr($parms_det[$key]);
       $parms_det[$key] = substr($parms_det[$key], 1, strlen($parms_det[$key]) - 2);
   } 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nmgp_select .= " where  date = '$parms_det[0]' and [1] + N' - ' + [2] = '$parms_det[1]' and [3] + N' - ' + [4] = '$parms_det[2]' and [5] + N' - ' + [6] = '$parms_det[3]' and [6] + N' - ' + [7] = '$parms_det[4]' and [7] + N' - ' + [8] = '$parms_det[5]' and [9] + N' - ' + [10] = '$parms_det[6]' and [10] + N' - ' + [11] = '$parms_det[7]' and [11] + N' - ' + [12] = '$parms_det[8]' and [13] + N' - ' + [14] = '$parms_det[9]' and [15] + N' - ' + [16] = '$parms_det[10]' and [16] + N' - ' + [17] = '$parms_det[11]' and [18] + N' - ' + [19] = '$parms_det[12]' and [20] + N' - ' + [21] = '$parms_det[13]' and [22] + N' - ' + [23] = '$parms_det[14]' and [24] + N' - ' + [25] = '$parms_det[15]' and [26] + N' - ' + [27] = '$parms_det[16]' and [28] + N' - ' + [29] = '$parms_det[17]' and [30] + N' - ' + [31] = '$parms_det[18]' and [31] + N' - ' + [32] = '$parms_det[19]' and [33] + N' - ' + [34] = '$parms_det[20]' and [35] + N' - ' + [36] = '$parms_det[21]' and [37] + N' - ' + [38] = '$parms_det[22]' and [38] + N' - ' + [39] = '$parms_det[23]' and [40] + N' - ' + [41] = '$parms_det[24]'" ;  
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nmgp_select .= " where  date = '$parms_det[0]' and [1] + N' - ' + [2] = '$parms_det[1]' and [3] + N' - ' + [4] = '$parms_det[2]' and [5] + N' - ' + [6] = '$parms_det[3]' and [6] + N' - ' + [7] = '$parms_det[4]' and [7] + N' - ' + [8] = '$parms_det[5]' and [9] + N' - ' + [10] = '$parms_det[6]' and [10] + N' - ' + [11] = '$parms_det[7]' and [11] + N' - ' + [12] = '$parms_det[8]' and [13] + N' - ' + [14] = '$parms_det[9]' and [15] + N' - ' + [16] = '$parms_det[10]' and [16] + N' - ' + [17] = '$parms_det[11]' and [18] + N' - ' + [19] = '$parms_det[12]' and [20] + N' - ' + [21] = '$parms_det[13]' and [22] + N' - ' + [23] = '$parms_det[14]' and [24] + N' - ' + [25] = '$parms_det[15]' and [26] + N' - ' + [27] = '$parms_det[16]' and [28] + N' - ' + [29] = '$parms_det[17]' and [30] + N' - ' + [31] = '$parms_det[18]' and [31] + N' - ' + [32] = '$parms_det[19]' and [33] + N' - ' + [34] = '$parms_det[20]' and [35] + N' - ' + [36] = '$parms_det[21]' and [37] + N' - ' + [38] = '$parms_det[22]' and [38] + N' - ' + [39] = '$parms_det[23]' and [40] + N' - ' + [41] = '$parms_det[24]'" ;  
   } 
   else 
   { 
       $nmgp_select .= " where  date = '$parms_det[0]' and [1] + N' - ' + [2] = '$parms_det[1]' and [3] + N' - ' + [4] = '$parms_det[2]' and [5] + N' - ' + [6] = '$parms_det[3]' and [6] + N' - ' + [7] = '$parms_det[4]' and [7] + N' - ' + [8] = '$parms_det[5]' and [9] + N' - ' + [10] = '$parms_det[6]' and [10] + N' - ' + [11] = '$parms_det[7]' and [11] + N' - ' + [12] = '$parms_det[8]' and [13] + N' - ' + [14] = '$parms_det[9]' and [15] + N' - ' + [16] = '$parms_det[10]' and [16] + N' - ' + [17] = '$parms_det[11]' and [18] + N' - ' + [19] = '$parms_det[12]' and [20] + N' - ' + [21] = '$parms_det[13]' and [22] + N' - ' + [23] = '$parms_det[14]' and [24] + N' - ' + [25] = '$parms_det[15]' and [26] + N' - ' + [27] = '$parms_det[16]' and [28] + N' - ' + [29] = '$parms_det[17]' and [30] + N' - ' + [31] = '$parms_det[18]' and [31] + N' - ' + [32] = '$parms_det[19]' and [33] + N' - ' + [34] = '$parms_det[20]' and [35] + N' - ' + [36] = '$parms_det[21]' and [37] + N' - ' + [38] = '$parms_det[22]' and [38] + N' - ' + [39] = '$parms_det[23]' and [40] + N' - ' + [41] = '$parms_det[24]'" ;  
   } 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
   $rs = $this->Db->Execute($nmgp_select) ; 
   if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
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
   $_SESSION['scriptcase']['Motel_InOut_Data']['contr_erro'] = 'on';
 $this->date  = $this->nm_conv_data_db($this->date , "db_format", "mm/dd/aaaa");
$_SESSION['scriptcase']['Motel_InOut_Data']['contr_erro'] = 'off'; 
//--- 
   $nm_saida->saida("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\r\n");
   $nm_saida->saida("            \"http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd\">\r\n");
   $nm_saida->saida("<html" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\r\n");
   $nm_saida->saida("<HEAD>\r\n");
   $nm_saida->saida("   <TITLE>Motel In Out Data</TITLE>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\" />\r\n");
   $nm_saida->saida(" <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Last-Modified\" content=\"" . gmdate("D, d M Y H:i:s") . " GMT\"/>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Cache-Control\" content=\"no-store, no-cache, must-revalidate\"/>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Cache-Control\" content=\"post-check=0, pre-check=0\"/>\r\n");
   $nm_saida->saida(" <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n");
   $nm_saida->saida(" <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery/js/jquery.js\"></script>\r\n");
   $nm_saida->saida(" <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/malsup-blockui/jquery.blockUI.js\"></script>\r\n");
   $nm_saida->saida(" <script type=\"text/javascript\">var sc_pathToTB = '" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/';</script>\r\n");
   $nm_saida->saida(" <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox-compressed.js\"></script>\r\n");
   $nm_saida->saida(" <script type=\"text/javascript\" src=\"../_lib/lib/js/jquery.scInput.js\"></script>\r\n");
   $nm_saida->saida(" <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox.css\" type=\"text/css\" media=\"screen\" />\r\n");
   if (($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['det_print'] == "print" && strtoupper($nmgp_cor_print) == "PB") || $nmgp_tipo_pdf == "pb")
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid_bw.css\" /> \r\n");
   }
   else
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid.css\" /> \r\n");
   }
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['pdf_det'] && $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['det_print'] != "print")
   {
       $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $this->Ini->Str_btn_css . "\" /> \r\n");
       $nm_saida->saida(" <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
   }
   $nm_saida->saida("</HEAD>\r\n");
   $nm_saida->saida("  <body class=\"scGridPage\">\r\n");
   $nm_saida->saida("  " . $this->Ini->Ajax_result_set . "\r\n");
   $nm_saida->saida("<table class=\"scGridBorder\" border=0 align=\"center\" valign=\"top\" ><tr><td style=\"padding: 0px\">\r\n");
   $nm_saida->saida("<tr><td class=\"scGridTabelaTd\">\r\n");
   $nm_saida->saida("<style>\r\n");
   $nm_saida->saida("#lin1_col1 { padding-left:9px; padding-top:7px;  height:27px; overflow:hidden; text-align:left;}			 \r\n");
   $nm_saida->saida("#lin1_col2 { padding-right:9px; padding-top:7px; height:27px; text-align:right; overflow:hidden;   font-size:12px; font-weight:normal;}\r\n");
   $nm_saida->saida("</style>\r\n");
   $nm_saida->saida("<div style=\"width: 100%\">\r\n");
   $nm_saida->saida(" <div class=\"scGridHeader\" style=\"height:11px; display: block; border-width:0px; \"></div>\r\n");
   $nm_saida->saida(" <div style=\"height:37px; background-color:#FFFFFF; border-width:0px 0px 1px 0px;  border-style: dashed; border-color:#ddd; display: block\">\r\n");
   $nm_saida->saida(" 	<table style=\"width:100%; border-collapse:collapse; padding:0;\">\r\n");
   $nm_saida->saida("    	<tr>\r\n");
   $nm_saida->saida("        	<td id=\"lin1_col1\" class=\"scGridHeaderFont\"><span>Motel In Out Data</span></td>\r\n");
   $nm_saida->saida("            <td id=\"lin1_col2\" class=\"scGridHeaderFont\"><span></span></td>\r\n");
   $nm_saida->saida("        </tr>\r\n");
   $nm_saida->saida("    </table>		 \r\n");
   $nm_saida->saida(" </div>\r\n");
   $nm_saida->saida("</div>\r\n");
   $nm_saida->saida("  </TD>\r\n");
   $nm_saida->saida(" </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['det_print'] != "print" && !$_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['pdf_det']) 
   { 
       $nm_saida->saida("   <tr><td class=\"scGridTabelaTd\">\r\n");
       $nm_saida->saida("    <table width=\"100%\"><tr>\r\n");
       $nm_saida->saida("     <td class=\"scGridToolbar\">\r\n");
       $nm_saida->saida("         </td> \r\n");
       $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
       if ($this->nmgp_botoes['det_pdf'] == "on")
       {
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "Dpdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "Motel_InOut_Data/Motel_InOut_Data_config_pdf.php?nm_opc=pdf_det&nm_target=0&nm_cor=cor&papel=1&orientacao=1&largura=1200&conf_larg=S&conf_fonte=10&language=en_us&conf_socor=S&KeepThis=true&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
       }
       if ($this->nmgp_botoes['det_print'] == "on")
       {
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "Dprint_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "Motel_InOut_Data/Motel_InOut_Data_config_print.php?nm_opc=detalhe&nm_cor=AM&language=en_us&KeepThis=true&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
       }
       $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "document.F3.submit()", "document.F3.submit()", "sc_b_sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
       $nm_saida->saida("           $Cod_Btn \r\n");
       $nm_saida->saida("         </td> \r\n");
       $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
       $nm_saida->saida("     </td>\r\n");
       $nm_saida->saida("    </tr></table>\r\n");
       $nm_saida->saida("   </td></tr>\r\n");
   } 
   $nm_saida->saida("<tr><td class=\"scGridTabelaTd\">\r\n");
   $nm_saida->saida("<TABLE style=\"padding: 0px; spacing: 0px; border-width: 0px;\"  align=\"center\" valign=\"top\" width=\"100%\">\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['date'])) ? $this->New_label['date'] : "Date"; 
          $conteudo = trim($this->date); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
          else    
          { 
               $conteudo_x =  $conteudo;
               nm_conv_limpa_dado($conteudo_x, "");
               if (is_numeric($conteudo_x) && $conteudo_x > 0) 
               { 
                   $this->nm_data->SetaData($conteudo, "");
                   $conteudo = $this->nm_data->FormataSaida("");
               } 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont\"  ALIGN=\"left\" VALIGN=\"middle\">" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert\"   ALIGN=\"left\" VALIGN=\"top\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['sc_field_0'])) ? $this->New_label['sc_field_0'] : "07-08 Am"; 
          $conteudo = trim($this->sc_field_0); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont\"  ALIGN=\"left\" VALIGN=\"middle\">" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert\"  NOWRAP ALIGN=\"left\" VALIGN=\"top\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['sc_field_1'])) ? $this->New_label['sc_field_1'] : "08-09 Am"; 
          $conteudo = trim($this->sc_field_1); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont\"  ALIGN=\"left\" VALIGN=\"middle\">" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert\"  NOWRAP ALIGN=\"left\" VALIGN=\"top\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['sc_field_2'])) ? $this->New_label['sc_field_2'] : "09-10 Am"; 
          $conteudo = trim($this->sc_field_2); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont\"  ALIGN=\"left\" VALIGN=\"middle\">" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert\"  NOWRAP ALIGN=\"left\" VALIGN=\"top\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['sc_field_3'])) ? $this->New_label['sc_field_3'] : "10-11 Am"; 
          $conteudo = trim($this->sc_field_3); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont\"  ALIGN=\"left\" VALIGN=\"middle\">" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert\"  NOWRAP ALIGN=\"left\" VALIGN=\"top\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['sc_field_4'])) ? $this->New_label['sc_field_4'] : "11-12 Am"; 
          $conteudo = trim($this->sc_field_4); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont\"  ALIGN=\"left\" VALIGN=\"middle\">" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert\"  NOWRAP ALIGN=\"left\" VALIGN=\"top\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['sc_field_5'])) ? $this->New_label['sc_field_5'] : "12-01 Pm"; 
          $conteudo = trim($this->sc_field_5); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont\"  ALIGN=\"left\" VALIGN=\"middle\">" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert\"  NOWRAP ALIGN=\"left\" VALIGN=\"top\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['sc_field_6'])) ? $this->New_label['sc_field_6'] : "01-02 Pm"; 
          $conteudo = trim($this->sc_field_6); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont\"  ALIGN=\"left\" VALIGN=\"middle\">" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert\"  NOWRAP ALIGN=\"left\" VALIGN=\"top\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['sc_field_7'])) ? $this->New_label['sc_field_7'] : "02-03 Pm"; 
          $conteudo = trim($this->sc_field_7); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont\"  ALIGN=\"left\" VALIGN=\"middle\">" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert\"  NOWRAP ALIGN=\"left\" VALIGN=\"top\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['sc_field_8'])) ? $this->New_label['sc_field_8'] : "03-04 Pm"; 
          $conteudo = trim($this->sc_field_8); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont\"  ALIGN=\"left\" VALIGN=\"middle\">" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert\"  NOWRAP ALIGN=\"left\" VALIGN=\"top\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['sc_field_9'])) ? $this->New_label['sc_field_9'] : "04-05 Pm"; 
          $conteudo = trim($this->sc_field_9); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont\"  ALIGN=\"left\" VALIGN=\"middle\">" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert\"  NOWRAP ALIGN=\"left\" VALIGN=\"top\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['sc_field_10'])) ? $this->New_label['sc_field_10'] : "05-06 Pm"; 
          $conteudo = trim($this->sc_field_10); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont\"  ALIGN=\"left\" VALIGN=\"middle\">" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert\"  NOWRAP ALIGN=\"left\" VALIGN=\"top\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['sc_field_11'])) ? $this->New_label['sc_field_11'] : "06-07 Pm"; 
          $conteudo = trim($this->sc_field_11); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont\"  ALIGN=\"left\" VALIGN=\"middle\">" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert\"  NOWRAP ALIGN=\"left\" VALIGN=\"top\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['sc_field_12'])) ? $this->New_label['sc_field_12'] : "07-08 Pm"; 
          $conteudo = trim($this->sc_field_12); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont\"  ALIGN=\"left\" VALIGN=\"middle\">" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert\"  NOWRAP ALIGN=\"left\" VALIGN=\"top\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['sc_field_13'])) ? $this->New_label['sc_field_13'] : "08-09 Pm"; 
          $conteudo = trim($this->sc_field_13); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont\"  ALIGN=\"left\" VALIGN=\"middle\">" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert\"  NOWRAP ALIGN=\"left\" VALIGN=\"top\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['sc_field_14'])) ? $this->New_label['sc_field_14'] : "09-10 Pm"; 
          $conteudo = trim($this->sc_field_14); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont\"  ALIGN=\"left\" VALIGN=\"middle\">" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert\"  NOWRAP ALIGN=\"left\" VALIGN=\"top\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['sc_field_15'])) ? $this->New_label['sc_field_15'] : "10-11 Pm"; 
          $conteudo = trim($this->sc_field_15); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont\"  ALIGN=\"left\" VALIGN=\"middle\">" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert\"  NOWRAP ALIGN=\"left\" VALIGN=\"top\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['sc_field_16'])) ? $this->New_label['sc_field_16'] : "11-12 Pm"; 
          $conteudo = trim($this->sc_field_16); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont\"  ALIGN=\"left\" VALIGN=\"middle\">" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert\"  NOWRAP ALIGN=\"left\" VALIGN=\"top\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['sc_field_17'])) ? $this->New_label['sc_field_17'] : "12-01 Am"; 
          $conteudo = trim($this->sc_field_17); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont\"  ALIGN=\"left\" VALIGN=\"middle\">" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert\"  NOWRAP ALIGN=\"left\" VALIGN=\"top\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['sc_field_18'])) ? $this->New_label['sc_field_18'] : "01-02 Am"; 
          $conteudo = trim($this->sc_field_18); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont\"  ALIGN=\"left\" VALIGN=\"middle\">" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert\"  NOWRAP ALIGN=\"left\" VALIGN=\"top\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['sc_field_19'])) ? $this->New_label['sc_field_19'] : "02-03 Am"; 
          $conteudo = trim($this->sc_field_19); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont\"  ALIGN=\"left\" VALIGN=\"middle\">" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert\"  NOWRAP ALIGN=\"left\" VALIGN=\"top\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['sc_field_20'])) ? $this->New_label['sc_field_20'] : "03-04 Am"; 
          $conteudo = trim($this->sc_field_20); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont\"  ALIGN=\"left\" VALIGN=\"middle\">" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert\"  NOWRAP ALIGN=\"left\" VALIGN=\"top\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['sc_field_21'])) ? $this->New_label['sc_field_21'] : "04-05 Am"; 
          $conteudo = trim($this->sc_field_21); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont\"  ALIGN=\"left\" VALIGN=\"middle\">" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert\"  NOWRAP ALIGN=\"left\" VALIGN=\"top\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['sc_field_22'])) ? $this->New_label['sc_field_22'] : "05-06 Am"; 
          $conteudo = trim($this->sc_field_22); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont\"  ALIGN=\"left\" VALIGN=\"middle\">" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldEvenVert\"  NOWRAP ALIGN=\"left\" VALIGN=\"top\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("  <TR class=\"scGridLabel\">\r\n");
          $SC_Label = (isset($this->New_label['sc_field_23'])) ? $this->New_label['sc_field_23'] : "06-07 Am"; 
          $conteudo = trim($this->sc_field_23); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ; 
          } 
   $nm_saida->saida("    <TD class=\"scGridLabelFont\"  ALIGN=\"left\" VALIGN=\"middle\">" . nl2br($SC_Label) . "</TD>\r\n");
   $nm_saida->saida("    <TD class=\"scGridFieldOddVert\"  NOWRAP ALIGN=\"left\" VALIGN=\"top\">" . $conteudo . "</TD>\r\n");
   $nm_saida->saida("   \r\n");
   $nm_saida->saida("  </TR>\r\n");
   $nm_saida->saida("</TABLE>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['det_print'] != "print" && !$_SESSION['sc_session'][$this->Ini->sc_page]['Motel_InOut_Data']['pdf_det']) 
   { 
       $nm_saida->saida("   <tr><td class=\"scGridTabelaTd\">\r\n");
       $nm_saida->saida("    <table width=\"100%\"><tr>\r\n");
       $nm_saida->saida("     <td class=\"scGridToolbar\">\r\n");
       $nm_saida->saida("         </td> \r\n");
       $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
       $nm_saida->saida("         </td> \r\n");
       $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
       $nm_saida->saida("     </td>\r\n");
       $nm_saida->saida("    </tr></table>\r\n");
       $nm_saida->saida("   </td></tr>\r\n");
   } 
   $rs->Close(); 
   $nm_saida->saida("  </td>\r\n");
   $nm_saida->saida(" </tr>\r\n");
   $nm_saida->saida(" </table>\r\n");
   $nm_saida->saida("  </td>\r\n");
   $nm_saida->saida(" </tr>\r\n");
   $nm_saida->saida(" </table>\r\n");
//--- 
//--- 
   $nm_saida->saida("<form name=\"F3\" method=post\r\n");
   $nm_saida->saida("                  target=\"_self\"\r\n");
   $nm_saida->saida("                  action=\"Motel_InOut_Data.php\">\r\n");
   $nm_saida->saida("<input type=hidden name=\"nmgp_opcao\" value=\"igual\"/>\r\n");
   $nm_saida->saida("<input type=hidden name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/>\r\n");
   $nm_saida->saida("<input type=hidden name=\"script_case_session\" value=\"" . NM_encode_input(session_id()) . "\"/>\r\n");
   $nm_saida->saida("</form>\r\n");
   $nm_saida->saida("<script language=JavaScript>\r\n");
   $nm_saida->saida("   function nm_mostra_doc(campo1, campo2, campo3)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       NovaJanela = window.open (\"Motel_InOut_Data_doc.php?script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&nm_cod_doc=\" + campo1 + \"&nm_nome_doc=\" + campo2 + \"&nm_cod_apl=\" + campo3, \"ScriptCase\", \"resizable\");\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_move(x, y, z, p, g) \r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      window.location = \"" . $this->Ini->path_link . "Motel_InOut_Data/Motel_InOut_Data.php?nmgp_opcao=pdf_det&nmgp_tipo_pdf=\" + z + \"&nmgp_parms_pdf=\" + p +  \"&nmgp_graf_pdf=\" + g + \"&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "\";\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_print_conf(tp, cor)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       window.open('" . $this->Ini->path_link . "Motel_InOut_Data/Motel_InOut_Data_iframe_prt.php?path_botoes=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&script_case_session=" . session_id() . "&opcao=det_print&cor_print=' + cor,'','location=no,menubar,resizable,scrollbars,status=no,toolbar');\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("</script>\r\n");
   $nm_saida->saida("</body>\r\n");
   $nm_saida->saida("</html>\r\n");
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
