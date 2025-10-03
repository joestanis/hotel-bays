<?php
   include_once('Motel_Live_Data_session.php');
   @session_start() ;
   $_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_perfil']          = "conn_mssql";
   $_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_path_prod']       = "";
   $_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_path_conf']       = "";
   $_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_path_imagens']    = "";
   $_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_path_imag_temp']  = "";
   $_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_path_doc']        = "";
//
class Motel_Live_Data_ini
{
   var $nm_cod_apl;
   var $nm_nome_apl;
   var $nm_seguranca;
   var $nm_grupo;
   var $nm_autor;
   var $nm_versao_sc;
   var $nm_tp_lic_sc;
   var $nm_dt_criacao;
   var $nm_hr_criacao;
   var $nm_autor_alt;
   var $nm_dt_ult_alt;
   var $nm_hr_ult_alt;
   var $nm_timestamp;
   var $nm_app_version;
   var $cor_link_dados;
   var $root;
   var $server;
   var $java_protocol;
   var $server_pdf;
   var $sc_protocolo;
   var $path_prod;
   var $path_link;
   var $path_aplicacao;
   var $path_embutida;
   var $path_botoes;
   var $path_img_global;
   var $path_img_modelo;
   var $path_icones;
   var $path_imagens;
   var $path_imag_cab;
   var $path_imag_temp;
   var $path_libs;
   var $path_doc;
   var $str_lang;
   var $str_conf_reg;
   var $str_schema_all;
   var $Str_btn_grid;
   var $str_schema_filter;
   var $Str_btn_filter;
   var $path_cep;
   var $path_secure;
   var $path_js;
   var $path_help;
   var $path_adodb;
   var $path_grafico;
   var $path_atual;
   var $Gd_missing;
   var $sc_site_ssl;
   var $link_pos_check_header_cons_emb;
   var $nm_cont_lin;
   var $nm_limite_lin;
   var $nm_limite_lin_prt;
   var $nm_limite_lin_res;
   var $nm_limite_lin_res_prt;
   var $nm_falta_var;
   var $nm_falta_var_db;
   var $nm_tpbanco;
   var $nm_servidor;
   var $nm_usuario;
   var $nm_senha;
   var $nm_database_encoding;
   var $nm_con_db2 = array();
   var $nm_con_persistente;
   var $nm_con_use_schema;
   var $nm_tabela;
   var $nm_col_dinamica   = array();
   var $nm_order_dinamico = array();
   var $nm_hidden_blocos  = array();
   var $sc_tem_trans_banco;
   var $nm_bases_all;
   var $nm_bases_access;
   var $nm_bases_db2;
   var $nm_bases_ibase;
   var $nm_bases_informix;
   var $nm_bases_mssql;
   var $nm_bases_mysql;
   var $nm_bases_postgres;
   var $nm_bases_oracle;
   var $nm_bases_sqlite;
   var $nm_bases_sybase;
   var $nm_bases_vfp;
   var $nm_bases_odbc;
   var $sc_page;
//
   function init($Tp_init = "")
   {
       global
             $nm_url_saida, $nm_apl_dependente, $script_case_init, $nmgp_opcao;

      @ini_set('magic_quotes_runtime', 0);
      $this->sc_page = $script_case_init;
      $_SESSION['scriptcase']['sc_num_page'] = $script_case_init;
      $_SESSION['scriptcase']['sc_cnt_sql']  = 0;
      $this->sc_charset['UTF-8'] = 'utf-8';
      $this->sc_charset['ISO-8859-1'] = 'iso-8859-1';
      $this->sc_charset['SJIS'] = 'shift-jis';
      $this->sc_charset['ISO-8859-14'] = 'iso-8859-14';
      $this->sc_charset['ISO-8859-7'] = 'iso-8859-7';
      $this->sc_charset['ISO-8859-10'] = 'iso-8859-10';
      $this->sc_charset['ISO-8859-3'] = 'iso-8859-3';
      $this->sc_charset['ISO-8859-15'] = 'iso-8859-15';
      $this->sc_charset['WINDOWS-1252'] = 'windows-1252';
      $this->sc_charset['ISO-8859-13'] = 'iso-8859-13';
      $this->sc_charset['ISO-8859-4'] = 'iso-8859-4';
      $this->sc_charset['ISO-8859-2'] = 'iso-8859-2';
      $this->sc_charset['ISO-8859-5'] = 'iso-8859-5';
      $this->sc_charset['KOI8-R'] = 'koi8-r';
      $this->sc_charset['WINDOWS-1251'] = 'windows-1251';
      $this->sc_charset['BIG-5'] = 'big5';
      $this->sc_charset['EUC-CN'] = 'EUC-CN';
      $this->sc_charset['EUC-JP'] = 'euc-jp';
      $this->sc_charset['ISO-2022-JP'] = 'iso-2022-jp';
      $this->sc_charset['EUC-KR'] = 'euc-kr';
      $this->sc_charset['ISO-2022-KR'] = 'iso-2022-kr';
      $this->sc_charset['ISO-8859-9'] = 'iso-8859-9';
      $this->sc_charset['ISO-8859-6'] = 'iso-8859-6';
      $this->sc_charset['ISO-8859-8'] = 'iso-8859-8';
      $this->sc_charset['ISO-8859-8-I'] = 'iso-8859-8-i';
      $_SESSION['scriptcase']['trial_version'] = 'N';
      $_SESSION['sc_session'][$this->sc_page]['Motel_Live_Data']['decimal_db'] = "."; 

      $this->nm_cod_apl      = "Motel_Live_Data"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "Mottech"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "admin"; 
      $this->nm_versao_sc    = "v7"; 
      $this->nm_tp_lic_sc    = "ep_bronze"; 
      $this->nm_dt_criacao   = "20120804"; 
      $this->nm_hr_criacao   = "142038"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = ""; 
      $this->nm_hr_ult_alt   = ""; 
      $temp_bug_list         = explode(" ", microtime()); 
      list($NM_usec, $NM_sec) = $temp_bug_list; 
      $this->nm_timestamp    = (float) $NM_sec; 
      $this->nm_app_version  = "1.0.0";
// 
// 
      $NM_dir_atual = getcwd();
      if (empty($NM_dir_atual))
      {
          $str_path_sys          = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
          $str_path_sys          = str_replace("\\", '/', $str_path_sys);
          $str_path_sys          = str_replace('//', '/', $str_path_sys);
      }
      else
      {
          $sc_nm_arquivo         = explode("/", $_SERVER['PHP_SELF']);
          $str_path_sys          = str_replace("\\", "/", str_replace("\\\\", "\\", getcwd())) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
      }
      //check publication with the prod
      $str_path_apl_url = $_SERVER['PHP_SELF'];
      $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
      $str_path_apl_url = str_replace('//', '/', $str_path_apl_url);
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
      $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
      $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
      //check prod
      if(empty($_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_path_prod']))
      {
              /*check prod*/$_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
      }
      //check img
      if(empty($_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_path_imagens']))
      {
              /*check img*/$_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
      }
      //check tmp
      if(empty($_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_path_imag_temp']))
      {
              /*check tmp*/$_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
      }
      //check doc
      if(empty($_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_path_doc']))
      {
              /*check doc*/$_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
      }
      //end check publication with the prod
      $this->sc_site_ssl     = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? true : false;
      $this->sc_protocolo    = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->sc_protocolo    = "";
      $this->path_prod       = $_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_path_prod'];
      $this->path_conf       = $_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_path_conf'];
      $this->path_imagens    = $_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_path_imag_temp'];
      $this->path_doc        = $_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_path_doc'];
      if (!isset($_SESSION['scriptcase']['str_lang']) || empty($_SESSION['scriptcase']['str_lang']))
      {
          $_SESSION['scriptcase']['str_lang'] = "en_us";
      }
      if (!isset($_SESSION['scriptcase']['str_conf_reg']) || empty($_SESSION['scriptcase']['str_conf_reg']))
      {
          $_SESSION['scriptcase']['str_conf_reg'] = "en_us";
      }
      $this->str_lang        = $_SESSION['scriptcase']['str_lang'];
      $this->str_conf_reg    = $_SESSION['scriptcase']['str_conf_reg'];
      $this->str_schema_all    = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "ScriptCase6_Silver/ScriptCase6_Silver";
      $this->str_schema_filter = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "ScriptCase6_Silver/ScriptCase6_Silver";
      $_SESSION['scriptcase']['erro']['str_schema'] = $this->str_schema_all . "_error.css";
      $_SESSION['scriptcase']['erro']['str_lang']   = $this->str_lang;
      $this->server          = (!isset($_SERVER['HTTP_HOST'])) ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
      if (!isset($_SERVER['HTTP_HOST']) && isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != 80 && !$this->sc_site_ssl )
      {
          $this->server         .= ":" . $_SERVER['SERVER_PORT'];
      }
      $this->java_protocol   = "http://";
      $this->server_pdf      = $this->server;
      $this->server          = "";
      $str_path_web          = $_SERVER['PHP_SELF'];
      $str_path_web          = str_replace("\\", '/', $str_path_web);
      $str_path_web          = str_replace('//', '/', $str_path_web);
      $this->root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
      $this->path_aplicacao  = substr($str_path_sys, 0, strrpos($str_path_sys, '/'));
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/Motel_Live_Data';
      $this->path_embutida   = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/') + 1);
      $this->path_aplicacao .= '/';
      $this->path_link       = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $this->path_link       = substr($this->path_link, 0, strrpos($this->path_link, '/')) . '/';
      $this->path_botoes     = $this->path_link . "_lib/img";
      $this->path_img_global = $this->path_link . "_lib/img";
      $this->path_img_modelo = $this->path_link . "_lib/img";
      $this->path_icones     = $this->path_link . "_lib/img";
      $this->path_imag_cab   = $this->path_link . "_lib/img";
      $this->path_help       = $this->path_link . "_lib/webhelp/";
      $this->path_font       = $this->root . $this->path_link . "_lib/font/";
      $this->path_btn        = $this->root . $this->path_link . "_lib/buttons/";
      $this->path_css        = $this->root . $this->path_link . "_lib/css/";
      $this->path_lib_php    = $this->root . $this->path_link . "_lib/lib/php";
      $this->path_lib_js     = $this->root . $this->path_link . "_lib/lib/js";
      $this->path_lang       = "../_lib/lang/";
      $this->path_lang_js    = "../_lib/js/";
      $this->path_cep        = $this->path_prod . "/cep";
      $this->path_cor        = $this->path_prod . "/cor";
      $this->path_js         = $this->path_prod . "/lib/js";
      $this->path_libs       = $this->root . $this->path_prod . "/lib/php";
      $this->path_third      = $this->root . $this->path_prod . "/third";
      $this->path_secure     = $this->root . $this->path_prod . "/secure";
      $this->path_adodb      = $this->root . $this->path_prod . "/third/adodb";
      $_SESSION['scriptcase']['dir_temp'] = $this->root . $this->path_imag_temp;
      if (!class_exists('Services_JSON'))
      {
          include_once("Motel_Live_Data_json.php");
      }
      $this->SC_Link_View = (isset($_SESSION['sc_session'][$this->sc_page]['Motel_Live_Data']['SC_Link_View'])) ? $_SESSION['sc_session'][$this->sc_page]['Motel_Live_Data']['SC_Link_View'] : false;
      if (isset($_GET['SC_Link_View']) && !empty($_GET['SC_Link_View']) && is_numeric($_GET['SC_Link_View']))
      {
          if ($_SESSION['sc_session'][$this->sc_page]['Motel_Live_Data']['embutida'])
          {
              $this->SC_Link_View = true;
              $_SESSION['sc_session'][$this->sc_page]['Motel_Live_Data']['SC_Link_View'] = true;
          }
      }
      if (isset($_SESSION['scriptcase']['user_logout']))
      {
          foreach ($_SESSION['scriptcase']['user_logout'] as $ind => $parms)
          {
              if (isset($_SESSION[$parms['V']]) && $_SESSION[$parms['V']] == $parms['U'])
              {
                  unset($_SESSION['scriptcase']['user_logout'][$ind]);
                  $nm_apl_dest = $parms['R'];
                  $dir = explode("/", $nm_apl_dest);
                  if (count($dir) == 1)
                  {
                      $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
                      $nm_apl_dest = $this->path_link . SC_dir_app_name($nm_apl_dest) . "/" . $nm_apl_dest . ".php";
                  }
?>
                  <html>
                  <body>
                  <form name="FRedirect" method="POST" action="<?php echo $nm_apl_dest; ?>" target="<?php echo $parms['T']; ?>">
                  </form>
                  <script>
                   document.FRedirect.submit();
                  </script>
                  </body>
                  </html>
<?php
                  exit;
              }
          }
      }
      $this->link_pos_check_header_cons_emb =  $this->root . $this->path_link  . "" . SC_dir_app_name('pos_check_header') . "/pos_check_header.php" ; 
      if ($Tp_init == "Path_sub")
      {
          return;
      }
      $str_path = substr($this->path_prod, 0, strrpos($this->path_prod, '/') + 1);
      if (!is_file($this->root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
      {
          unset($_SESSION['scriptcase']['nm_sc_retorno']);
          unset($_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_conexao']);
      }
      include($this->path_lang . $this->str_lang . ".lang.php");
      include($this->path_lang . "config_region.php");
      include($this->path_lang . "lang_config_region.php");
      asort($this->Nm_lang_conf_region);
      $_SESSION['scriptcase']['charset']  = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "ISO-8859-1";
      $_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
      if (!function_exists("mb_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtmb'] . "</font></div>";exit;
      } 
      foreach ($this->Nm_lang_conf_region as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_lang_conf_region[$ind] = mb_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
      foreach ($this->Nm_conf_reg[$this->str_conf_reg] as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_conf_reg[$this->str_conf_reg][$ind] = mb_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
      foreach ($this->Nm_lang as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($ind))
         {
             $ind = mb_convert_encoding($ind, $_SESSION['scriptcase']['charset'], "UTF-8");
             $this->Nm_lang[$ind] = $dados;
         }
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_lang[$ind] = mb_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
      if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
      {
          $_SESSION['scriptcase']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
      }
      $PHP_ver = str_replace(".", "", phpversion()); 
      if (substr($PHP_ver, 0, 3) < 434)
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_phpv'] . "</font></div>";exit;
      } 
      if (file_exists($this->path_libs . "/ver.dat"))
      {
          $SC_ver = file($this->path_libs . "/ver.dat"); 
          $SC_ver = str_replace(".", "", $SC_ver[0]); 
          if (substr($SC_ver, 0, 5) < 40015)
          {
              echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_incp'] . "</font></div>";exit;
          } 
      } 
      $_SESSION['sc_session'][$this->sc_page]['Motel_Live_Data']['path_doc'] = $this->path_doc; 
      $_SESSION['scriptcase']['nm_path_prod'] = $this->root . $this->path_prod . "/"; 
      if (empty($this->path_imag_cab))
      {
          $this->path_imag_cab = $this->path_img_global;
      }
      if (!is_dir($this->root . $this->path_prod))
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_default { font-family: Arial, sans-serif; font-size: 11px; color: #fff; font-weight: bold; border-style: solid; border-width: 1px; padding: 5px 12px; background-image: url(../../img/scriptcase__NM__bg_btn_bluesoft.png); }";
          echo ".scButton_disabled { font-family: Arial, sans-serif; font-size: 11px; color: #92BBFF; font-weight: bold; background-color: #F1F6FF; border-style: solid; border-width: 1px; padding: 3px 14px;  }";
          echo ".scButton_onmousedown { font-family: Arial, sans-serif; font-size: 11px; color: #666666; font-weight: bold; background-color: #FFFFFF; border-style: solid; border-width: 1px; padding: 5px 12px;  }";
          echo ".scButton_onmouseover { font-family: Arial, sans-serif; font-size: 11px; color: #fff; font-weight: bold; background-color: #387cea; border-style: solid; border-width: 1px; padding: 5px 12px;  }";
          echo ".scLink_default { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:active { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:hover { text-decoration: none; font-size: 12px; color: #0000AA;  }";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_cmlb_nfnd'] . "</font>";
          echo "  " . $this->root . $this->path_prod;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_back'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = mb_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_back_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = mb_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
              else 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_exit'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = mb_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_exit_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = mb_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
          } 
          exit ;
      }

      $this->path_atual  = getcwd();
      $opsys = strtolower(php_uname());

      $this->nm_cont_lin           = 0;
      $this->nm_limite_lin         = 0;
      $this->nm_limite_lin_prt     = 0;
      $this->nm_limite_lin_res     = 0;
      $this->nm_limite_lin_res_prt = 0;
// 
      include_once($this->path_aplicacao . "Motel_Live_Data_erro.class.php"); 
      $this->Erro = new Motel_Live_Data_erro();
      include_once($this->path_adodb . "/adodb.inc.php"); 
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
      $this->sc_Include($this->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $this->sc_Include($this->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->sc_Include($this->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->nm_data = new nm_data("en_us");
      $_SESSION['scriptcase']['nmamd'] = array();
      perfil_lib($this->path_libs);
      if (!isset($_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil']))
      {
          if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($this->path_libs, $this->path_prod);
          $_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil'] = true;
      }
      if (function_exists("nm_check_pdf_server")) $this->server_pdf = nm_check_pdf_server($this->path_libs, $this->server_pdf);
      if (!isset($_SESSION['scriptcase']['sc_num_img']))
      { 
          $_SESSION['scriptcase']['sc_num_img'] = 1;
      } 
      $this->regionalDefault();
      $this->sc_tem_trans_banco = false;
      $this->nm_bases_access     = array("access", "ado_access");
      $this->nm_bases_db2        = array("db2", "db2_odbc", "odbc_db2", "odbc_db2v6");
      $this->nm_bases_ibase      = array("ibase", "firebird", "borland_ibase");
      $this->nm_bases_informix   = array("informix", "informix72", "pdo_informix");
      $this->nm_bases_mssql      = array("mssql", "ado_mssql", "odbc_mssql", "mssqlnative", "pdo_sqlsrv");
      $this->nm_bases_mysql      = array("mysql", "mysqlt", "maxsql", "pdo_mysql");
      $this->nm_bases_postgres   = array("postgres", "postgres64", "postgres7", "pdo_pgsql");
      $this->nm_bases_oracle     = array("oci8", "oci805", "oci8po", "odbc_oracle", "oracle");
      $this->nm_bases_sqlite     = array("sqlite", "pdosqlite");
      $this->nm_bases_sybase     = array("sybase");
      $this->nm_bases_vfp        = array("vfp");
      $this->nm_bases_odbc       = array("odbc");
      $this->nm_bases_all        = array_merge($this->nm_bases_access, $this->nm_bases_db2, $this->nm_bases_ibase, $this->nm_bases_informix, $this->nm_bases_mssql, $this->nm_bases_mysql, $this->nm_bases_postgres, $this->nm_bases_oracle, $this->nm_bases_sqlite, $this->nm_bases_sybase, $this->nm_bases_vfp, $this->nm_bases_odbc);
      $this->nm_font_ttf = array("ar", "ja", "pl", "ru", "sk", "thai", "zh_cn", "zh_hk", "cz", "el", "ko", "mk");
      $this->nm_ttf_arab = array("ar");
      $this->nm_ttf_jap  = array("ja");
      $this->nm_ttf_rus  = array("pl", "ru", "sk", "cz", "el", "mk");
      $this->nm_ttf_thai = array("thai");
      $this->nm_ttf_chi  = array("zh_cn", "zh_hk", "ko");
      $_SESSION['sc_session'][$this->sc_page]['Motel_Live_Data']['seq_dir'] = 0; 
      $_SESSION['sc_session'][$this->sc_page]['Motel_Live_Data']['sub_dir'] = array(); 
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1HQXOZSFUHAveVWXGHuzGVIBOH5B3VENUDcJUH9B/HIBeHuB/DEBeDkXKDuFaVoBOD9NmH9BiHAveD5NUHgNKDkBOV5FYHMBiHQNmZkFGZ1vOZMJwHgvsVkJ3V5XCHINUHQJKZSBiHAvCD5F7DMNOV9BUDWF/HMFUDcFYZSBqDSBOV5X7DMvCZSJ3DWB3ZuB/HQXOZSFUHIvsD5F7DMrYVIBsHEFGVENUHQBiZSBqHAvCD5rqDEBOHEFiHEFqDoF7DcJUZSBiHIvsVWFaDMrYVcB/H5XCHMBOHQJmH9BqZ1vOV5X7HgvsVkJqDuXKZuJeHQFYZSFUD1vOD5F7DMvsVcBUDur/HMFUHQXGZkFGHINaV5X7HgBYHErCH5F/HMFGHQJeDQFUDSzGV5FGHuNOVcFKHEFYVoBqDcBwH9BqDSvOZMJwHgNOHArsDuFaHIXGHQXOZ9XGHAvmD5F7DMBOVcFeDuFqHMrqHQNmH9BqZ1vmV5X7HgBODkXKH5F/HIBODcBiZ9XGD1NKD5F7DMrYV9FeDWJeHMJeHQBsZ1BiD1NaD5rqDEBOHEFiHEFqDoF7DcJUZSFGD1BeV5FGHgrYDkFCDWXCVoB/D9BiZ1F7HIveD5BiHgBeDkB/HEB3DoB/HQFYDQJwHANOV5JwHgrKDkFCDWJeVoB/D9BsZkFUHArKHQraDEBeHEXeDuFYVoB/D9NwZ9rqZ1rwHQBOHgrKVcFCH5XCHIF7DcBqZ1B/DSBeV5FaHgvCZSJGDWB3ZuBqHQXGZ9XGHAvOV5JwHuBYDkFCDuX7VEF7D9XOZSB/Z1BeD5FaDEvsHEFKV5FaDoXGDcJeZSFGHANOD5BqHuzGVcrsH5XCVoBqDcBqZ1FaD1rwV5FaHgvCDkBsH5FYVoX7D9JKDQX7D1BOV5FGHuzGDkBOH5FqVoJwD9JmZ1F7Z1BeD5JeDEvsHENiV5FaHIBqHQNwDuFaZ1vCD5F7DMNOVcXKH5XKVoFGHQBiVIJsD1rKHQFaHgvsHEJqH5F/HIFGHQXODQBqDSBYHuFaHuNOZSrCH5FqDoXGHQJmZ1F7D1rwD5BiHgNKHEXeH5FYDoF7D9XsZ9XGD1BeVWBqHgrwVcBODWFYHIrqHQBsVINUHIveHuB/HgBeHEFiV5B3DoF7D9XsDuFaHANKV5JwDMBYVcBOV5X7VENUDcJUZ1B/HIrwD5BiHgvsHEFiHEFqZuBODcBwDQFUZ1rwHuNUHgvsVcFCH5XCVoB/HQFYZSFaHArKV5XGDErKHErCDWF/VoBiDcJUZSX7Z1BYHuFaDMvmVcFKV5BmVoBqD9BsZkFGHAvsD5BqHgvCHArsDuFaHMBiD9NmDuBqD1BeHuFGDMzGVcFKDWBmVorqD9XOZSFaD1zGV5X7HgBeHEFiV5B3DoF7D9XsDuFaHAveD5JwHuzGVcXKV5X7VoBOD9XOZSB/Z1BeV5FUDENOVkXeDWFqHIJsD9XsZ9JeD1BeD5F7DMvmVcBUDWrmVorqHQNmZkBiD1vsD5BqHgNKHErsDWBmZuJeHQJKDQJsZ1vCV5FGHuNOV9FeDWXCVEFGD9BsZSB/DSBeD5XGHgrKHENiHEXCDoFUHQXOH9FUHABYD5JwHgrwVcrsDWXCDoJsHQJmZ1F7Z1vmD5rqDEBOHArCDWF/VoB/DcBwDQJwHIrwV5FUHuzGVIBOH5B3VoFaD9BsZSB/HABYZMBqDMBYHEJGDWr/DoJeD9XsZSBiHAveD5NUHgNKDkBOV5FYHMBiHQNwVIJwZ1vmD5Bq";
      ob_start();
      $this->prep_conect();
      if (isset($_SESSION['sc_session'][$this->sc_page]['Motel_Live_Data']['initialize']) && $_SESSION['sc_session'][$this->sc_page]['Motel_Live_Data']['initialize'])  
      { 
          $_SESSION['sc_session'][$this->sc_page]['Motel_Live_Data']['Gera_log_access'] = true;
          $_SESSION['sc_session'][$this->sc_page]['Motel_Live_Data']['initialize']      = false;
      } 
      $this->conectDB();
      if (!in_array(strtolower($this->nm_tpbanco), $this->nm_bases_all))
      {
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nspt'] . "</font>";
          echo "  " . $perfil_trab;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
                  echo "<a href='" . $_SESSION['scriptcase']['nm_sc_retorno'] . "' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_ScriptCase6_BlueSoft_bvoltar.gif' title='" . $this->Nm_lang['lang_btns_rtrn_scrp_hint'] . "' align=absmiddle></a> \n" ; 
              } 
              else 
              { 
                  echo "<a href='$nm_url_saida' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_ScriptCase6_BlueSoft_bsair.gif' title='" . $this->Nm_lang['lang_btns_exit_appl_hint'] . "' align=absmiddle></a> \n" ; 
              } 
          } 
          exit ;
      } 
      $this->Ajax_result_set = ob_get_contents();
      ob_end_clean();
      if (empty($this->nm_tabela))
      {
          $this->nm_tabela = "dbo.Motel_Live_Data_Qry"; 
      }
      $_SESSION['sc_session'][$script_case_init]['pos_check_header']['ind_tree'] = 0;
   }
   function prep_conect()
   {
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_conexao']) && $_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_perfil']) && $_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['Motel_Live_Data']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['Motel_Live_Data']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      $con_devel             = (isset($_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_conexao']))
      {
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'Mottech', 2); 
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_perfil'];
      }
      elseif (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['glo_perfil'];
      }
      if (!empty($perfil_trab))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = "";
          carrega_perfil($perfil_trab, $this->path_libs, "S", $this->path_conf);
          if (empty($_SESSION['scriptcase']['glo_senha_protect']))
          {
              $nm_crit_perfil = true;
          }
      }
      else
      {
          $perfil_trab = $con_devel;
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['Motel_Live_Data']['embutida_init']) || !$_SESSION['sc_session'][$this->sc_page]['Motel_Live_Data']['embutida_init']) 
      {
      }
// 
      if (isset($_SESSION['scriptcase']['glo_decimal_db']) && !empty($_SESSION['scriptcase']['glo_decimal_db']))
      {
         $_SESSION['sc_session'][$this->sc_page]['Motel_Live_Data']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_tpbanco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_tpbanco; ";
          }
      }
      else
      {
          $this->nm_tpbanco = $_SESSION['scriptcase']['glo_tpbanco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_servidor']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_servidor; ";
          }
      }
      else
      {
          $this->nm_servidor = $_SESSION['scriptcase']['glo_servidor']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_banco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_banco; ";
          }
      }
      else
      {
          $this->nm_banco = $_SESSION['scriptcase']['glo_banco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_usuario']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_usuario; ";
          }
      }
      else
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_usuario']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_senha']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_senha; ";
          }
      }
      else
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_senha']; 
      }
      if (isset($_SESSION['scriptcase']['glo_database_encoding']))
      {
          $this->nm_database_encoding = $_SESSION['scriptcase']['glo_database_encoding']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_autocommit']))
      {
          $this->nm_con_db2['db2_autocommit'] = $_SESSION['scriptcase']['glo_db2_autocommit']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_lib']))
      {
          $this->nm_con_db2['db2_i5_lib'] = $_SESSION['scriptcase']['glo_db2_i5_lib']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_naming']))
      {
          $this->nm_con_db2['db2_i5_naming'] = $_SESSION['scriptcase']['glo_db2_i5_naming']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_commit']))
      {
          $this->nm_con_db2['db2_i5_commit'] = $_SESSION['scriptcase']['glo_db2_i5_commit']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_query_optimize']))
      {
          $this->nm_con_db2['db2_i5_query_optimize'] = $_SESSION['scriptcase']['glo_db2_i5_query_optimize']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_persistent']))
      {
          $this->nm_con_persistente = $_SESSION['scriptcase']['glo_use_persistent']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_schema']))
      {
          $this->nm_con_use_schema = $_SESSION['scriptcase']['glo_use_schema']; 
      }
// 
      if (!empty($this->nm_falta_var) || !empty($this->nm_falta_var_db) || $nm_crit_perfil)
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_default { font-family: Arial, sans-serif; font-size: 11px; color: #fff; font-weight: bold; border-style: solid; border-width: 1px; padding: 5px 12px; background-image: url(../../img/scriptcase__NM__bg_btn_bluesoft.png); }";
          echo ".scButton_disabled { font-family: Arial, sans-serif; font-size: 11px; color: #92BBFF; font-weight: bold; background-color: #F1F6FF; border-style: solid; border-width: 1px; padding: 3px 14px;  }";
          echo ".scButton_onmousedown { font-family: Arial, sans-serif; font-size: 11px; color: #666666; font-weight: bold; background-color: #FFFFFF; border-style: solid; border-width: 1px; padding: 5px 12px;  }";
          echo ".scButton_onmouseover { font-family: Arial, sans-serif; font-size: 11px; color: #fff; font-weight: bold; background-color: #387cea; border-style: solid; border-width: 1px; padding: 5px 12px;  }";
          echo ".scLink_default { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:active { text-decoration: underline; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:hover { text-decoration: none; font-size: 12px; color: #0000AA;  }";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          if (empty($this->nm_falta_var_db))
          {
              if (!empty($this->nm_falta_var))
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_glob'] . "</font>";
                  echo "  " . $this->nm_falta_var;
                  echo "   </b></td>";
                  echo " </tr>";
              }
              if ($nm_crit_perfil)
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nfnd'] . "</font>";
                  echo "  " . $perfil_trab;
                  echo "   </b></td>";
                  echo " </tr>";
              }
          }
          else
          {
              echo "<tr>";
              echo "   <td bgcolor=\"\">";
              echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_data'] . "</font></b>";
              echo "   </td>";
              echo " </tr>";
          }
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_back'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = mb_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_back_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = mb_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
              else 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_exit'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = mb_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_exit_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = mb_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
          } 
          exit ;
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_usr']) && !empty($_SESSION['scriptcase']['glo_db_master_usr']))
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_db_master_usr']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_pass']) && !empty($_SESSION['scriptcase']['glo_db_master_pass']))
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_db_master_pass']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_cript']) && !empty($_SESSION['scriptcase']['glo_db_master_cript']))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = $_SESSION['scriptcase']['glo_db_master_cript']; 
      }
   }
   function conectDB()
   {
      global $glo_senha_protect;
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['Motel_Live_Data']['glo_nm_conexao'], $this->root . $this->path_prod, 'Mottech'); 
      } 
      else 
      { 
          $this->Db = db_conect($this->nm_tpbanco, $this->nm_servidor, $this->nm_usuario, $this->nm_senha, $this->nm_banco, $glo_senha_protect, "S", $this->nm_con_persistente, $this->nm_con_db2, $this->nm_database_encoding); 
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase))
      {
          if (function_exists('ibase_timefmt'))
          {
              ibase_timefmt('%Y-%m-%d %H:%M:%S');
          } 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sybase))
      {
          $this->Db->fetchMode = ADODB_FETCH_BOTH;
          $this->Db->Execute("set dateformat ymd");
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql))
      {
          $this->Db->Execute("set dateformat ymd");
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle))
      {
          $this->Db->Execute("alter session set nls_date_format = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_numeric_characters = '.,'");
          $_SESSION['sc_session'][$this->sc_page]['Motel_Live_Data']['decimal_db'] = "."; 
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres))
      {
          $this->Db->Execute("SET DATESTYLE TO ISO");
      } 
   }
   function regionalDefault()
   {
       $_SESSION['scriptcase']['reg_conf']['date_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_format'] : "mmddyyyy";
       $_SESSION['scriptcase']['reg_conf']['date_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_sep'] : "/";
       $_SESSION['scriptcase']['reg_conf']['date_week_ini'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema'] : "SU";
       $_SESSION['scriptcase']['reg_conf']['time_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_format'] : "hhiiss";
       $_SESSION['scriptcase']['reg_conf']['time_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_sep'] : ":";
       $_SESSION['scriptcase']['reg_conf']['time_pos_ampm'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm'] : "right_without_space";
       $_SESSION['scriptcase']['reg_conf']['time_simb_am']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am'] : "am";
       $_SESSION['scriptcase']['reg_conf']['time_simb_pm']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm'] : "pm";
       $_SESSION['scriptcase']['reg_conf']['simb_neg']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg'] : "-";
       $_SESSION['scriptcase']['reg_conf']['grup_num']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr'] : ",";
       $_SESSION['scriptcase']['reg_conf']['dec_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec'] : ".";
       $_SESSION['scriptcase']['reg_conf']['neg_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg'] : 2;
       $_SESSION['scriptcase']['reg_conf']['monet_simb']    = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo'] : "$";
       $_SESSION['scriptcase']['reg_conf']['monet_f_pos']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'] : 3;
       $_SESSION['scriptcase']['reg_conf']['monet_f_neg']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'] : 13;
       $_SESSION['scriptcase']['reg_conf']['grup_val']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr'] : ",";
       $_SESSION['scriptcase']['reg_conf']['dec_val']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec'] : ".";
       $_SESSION['scriptcase']['reg_conf']['html_dir']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  " DIR='" . $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] . "'" : "";
       $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit'] : "1";
       $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'] : "1";
   }
// 
   function sc_Include($path, $tp, $name)
   {
       if (($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
       {
           include_once($path);
       }
   } // sc_Include
   function sc_Sql_Protect($var, $tp, $conex="")
   {
       if (empty($conex) || $conex == "conn_mssql")
       {
           $TP_banco = $_SESSION['scriptcase']['glo_tpbanco'];
       }
       else
       {
           eval ("\$TP_banco = \$this->nm_con_" . $conex . "['tpbanco'];");
       }
       if ($tp == "date")
       {
           if (in_array(strtolower($TP_banco), $this->nm_bases_access))
           {
               return "#" . $var . "#";
           }
           else
           {
               return "'" . $var . "'";
           }
       }
       else
       {
           return $var;
       }
   } // sc_Sql_Protect
//
   function NM_gera_log_insert($orig="Scriptcase", $evento="", $texto="")
   {
       $dt  = "'" . date('Y-m-d H:i:s') . "'";
       $usr = isset($_SESSION['usr_login']) ? $_SESSION['usr_login'] : "";
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->nm_bases_access))
       { 
           $dt  = "#" . date('Y-m-d H:i:s') . "#";
       } 
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->nm_bases_informix))
       { 
           $dt  = "EXTEND(" . $dt . ", YEAR TO FRACTION)";
       } 
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->nm_bases_access))
       { 
           $comando = "INSERT INTO Motel_log (inserted_date, username, application, creator, ip_user, `action`, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'Motel_Live_Data', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       elseif (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->nm_bases_sqlite))
       { 
           $comando = "INSERT INTO Motel_log (id, inserted_date, username, application, creator, ip_user, action, description) VALUES (NULL, $dt, " . $this->Db->qstr($usr) . ", 'Motel_Live_Data', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       else
       { 
           $comando = "INSERT INTO Motel_log (inserted_date, username, application, creator, ip_user, action, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'Motel_Live_Data', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
       $rlog = $this->Db->Execute($comando); 
       if ($rlog === false)  
       { 
           $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
       }
   }
}
//===============================================================================
//
class Motel_Live_Data_sub_css
{
   function Motel_Live_Data_sub_css()
   {
      global $script_case_init;
      if (!$this->Ini) 
      { 
          $this->Ini = new Motel_Live_Data_ini(); 
          $this->Ini->init("Path_sub");
      } 
      $_SESSION['sc_session'][$script_case_init]['pos_check_header']['SC_herda_css'] = "S"; 
      $_SESSION['sc_session'][$script_case_init]['pos_check_header']['embutida'] = true;
      include_once ($this->Ini->link_pos_check_header_cons_emb);
      $this->pos_check_header = new pos_check_header_sub_css ;
      $_SESSION['sc_session'][$script_case_init]['pos_check_header']['embutida'] = false;
      $str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "ScriptCase6_Silver/ScriptCase6_Silver";
      if ($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['SC_herda_css'] == "N")
      {
          $_SESSION['sc_session'][$script_case_init]['SC_sub_css']['Motel_Live_Data']    = $str_schema_all . "_grid.css";
          $_SESSION['sc_session'][$script_case_init]['SC_sub_css_bw']['Motel_Live_Data'] = $str_schema_all . "_grid_bw.css";
      }
   }
}
//
class Motel_Live_Data_apl
{
   var $Ini;
   var $Erro;
   var $Db;
   var $Lookup;
   var $nm_location;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'     => '',
                                  'param'      => array(),
                                  'autoComp'   => '',
                                  'rsSize'     => '',
                                  'msgDisplay' => '',
                                  'errList'    => array(),
                                  'fldList'    => array());
   var $grid;
   var $pesq;
   var $pdf;
   var $xls;
   var $xml;
   var $csv;
   var $rtf;
//
//----- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini = $this->Ini;
      $this->$modulo->Db = $this->Db;
      $this->$modulo->Erro = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
      $this->$modulo->arr_buttons = $this->arr_buttons;
   }
//
//----- 
   function controle($linhas = 0)
   {
      global $nm_saida, $nm_url_saida, $script_case_init, $nmgp_parms_pdf, $nmgp_graf_pdf, $nm_apl_dependente, $nmgp_navegator_print, $nmgp_tipo_print, $nmgp_cor_print, $nmgp_cor_word, $NMSC_conf_apl, $NM_contr_var_session, $NM_run_iframe,
             $glo_senha_protect, $nmgp_opcao, $nm_call_php;

      if ($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['embutida'])
      { 
          if (!empty($GLOBALS['nmgp_parms'])) 
          { 
              $GLOBALS['nmgp_parms'] = str_replace("@aspass@", "'", $GLOBALS['nmgp_parms']);
              $todo = explode("?@?", $GLOBALS["nmgp_parms"]);
              foreach ($todo as $param)
              {
                   $cadapar = explode("?#?", $param);
                   if (1 < sizeof($cadapar))
                   {
                       if (isset($GLOBALS['sc_conv_var'][$cadapar[0]]))
                       {
                           $cadapar[0] = $GLOBALS['sc_conv_var'][$cadapar[0]];
                       }
                       elseif (isset($GLOBALS['sc_conv_var'][strtolower($cadapar[0])]))
                       {
                           $cadapar[0] = $GLOBALS['sc_conv_var'][strtolower($cadapar[0])];
                       }
                       nm_limpa_str_Motel_Live_Data($cadapar[1]);
                       $$cadapar[0] = $cadapar[1];
                   }
              }
          } 
      } 
      $_SESSION['scriptcase']['sc_ctl_ajax'] = 'part';
      if (!$this->Ini) 
      { 
          $this->Ini = new Motel_Live_Data_ini(); 
          $this->Ini->init();
      } 
      $this->Db = $this->Ini->Db; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['nm_tpbanco'] = $this->Ini->nm_tpbanco;
      $this->nm_data = new nm_data("en_us");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['embutida'])
      { 
          include_once($this->Ini->path_embutida . "Motel_Live_Data/Motel_Live_Data_erro.class.php"); 
      } 
      else 
      { 
          include_once($this->Ini->path_aplicacao . "Motel_Live_Data_erro.class.php"); 
      } 
      $this->Erro      = new Motel_Live_Data_erro();
      $this->Erro->Ini = $this->Ini;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['embutida'])
      { 
          require_once($this->Ini->path_embutida . "Motel_Live_Data/Motel_Live_Data_lookup.class.php"); 
      } 
      else 
      { 
          require_once($this->Ini->path_aplicacao . "Motel_Live_Data_lookup.class.php"); 
      } 
      $this->Lookup       = new Motel_Live_Data_lookup();
      $this->Lookup->Db   = $this->Db;
      $this->Lookup->Ini  = $this->Ini;
      $this->Lookup->Erro = $this->Erro;
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['SC_All_Groupby'] = array('Shift' => 'all');
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['SC_Groupby_hide'])) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['SC_Groupby_hide'] = array();
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['SC_Ind_Groupby'])) 
      { 
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['SC_All_Groupby'] as $Ind => $Tp)
          {
              if (!in_array($Ind, $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['SC_Groupby_hide'])) 
              { 
                  break;
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['SC_Ind_Groupby'] = $Ind;
      } 
      $this->Ini->Apl_resumo  = "Motel_Live_Data_resumo_" . $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['SC_Ind_Groupby'] . ".class.php"; 
      $this->Ini->Apl_grafico = "Motel_Live_Data_grafico_" . $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['SC_Ind_Groupby'] . ".class.php"; 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['Gera_log_access'])
      {
          $this->Ini->NM_gera_log_insert("Scriptcase", "access");
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['Gera_log_access'] = false;
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "Motel_Live_Data.php" ; 
      $_SESSION['sc_session']['path_third'] = $this->Ini->path_prod . "/third";
      $_SESSION['sc_session']['path_img']   = $this->Ini->path_img_global;
      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['pdf_det'] = false;
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['pdf_res'] = false;
      if ($nmgp_opcao == 'pdf_res')
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['pdf_res'] = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'] = 'pdf';
          $nmgp_opcao = 'pdf';
          $rRFP = fopen(urldecode($_GET['pbfile']), "w");
          fwrite($rRFP, "PDF\n");
          fwrite($rRFP, "\n");
          fwrite($rRFP, "\n");
          fwrite($rRFP, "100\n");
          $lang_protect = $this->Ini->Nm_lang['lang_pdff_gnrt'];
          if (!NM_is_utf8($lang_protect))
          {
              $lang_protect = mb_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
          }
          fwrite($rRFP, 90 . "_#NM#_" . $lang_protect . "...\n");
          fclose($rRFP);
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['embutida']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['embutida']      = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['embutida_grid']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['embutida_grid'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['embutida_init']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['embutida_init'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['embutida_label']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['embutida_label'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['cab_embutida']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['cab_embutida'] = "";
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['embutida_pdf']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['embutida_pdf'] = "";
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['embutida_treeview']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['embutida_treeview'] = false;
      } 
      include("../_lib/css/" . $this->Ini->str_schema_all . "_grid.php");
      $this->Ini->Tree_img_col    = trim($str_tree_col);
      $this->Ini->Tree_img_exp    = trim($str_tree_exp);
      $this->Ini->Str_btn_grid    = trim($str_button) . "/" . trim($str_button) . ".php";
      $this->Ini->Str_btn_css     = trim($str_button) . "/" . trim($str_button) . ".css";
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['embutida']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['embutida'])
      { 
          $this->Ini->Img_sep_grid             = "/" . trim($str_toolbar_separator);
          $this->Ini->Label_sort_pos           = trim($str_label_sort_pos);
          $this->Ini->Label_sort               = trim($str_label_sort);
          $this->Ini->Label_sort_asc           = trim($str_label_sort_asc);
          $this->Ini->Label_sort_desc          = trim($str_label_sort_desc);
          $this->Ini->Sum_ico_line             = trim($sum_ico_line);
          $this->Ini->Sum_ico_column           = trim($sum_ico_column);
          $this->Ini->Str_toolbarnav_separator = '/' . trim($str_toolbarnav_separator);
          $this->Ini->Img_qs_search            = '' != trim($img_qs_search)        ? trim($img_qs_search)        : 'scriptcase__NM__qs_lupa.png';
          $this->Ini->Img_qs_clean             = '' != trim($img_qs_clean)         ? trim($img_qs_clean)         : 'scriptcase__NM__qs_close.png';
          $this->Ini->Str_qs_image_padding     = '' != trim($str_qs_image_padding) ? trim($str_qs_image_padding) : '0';
          $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_config_btn.php", "F", "nmButtonOutput") ; 
          $_SESSION['scriptcase']['css_popup']                 = $this->Ini->str_schema_all . "_grid.css";
          $_SESSION['scriptcase']['css_btn_popup']             = $this->Ini->Str_btn_css;
          $_SESSION['scriptcase']['bg_btn_popup']['bok']       = nmButtonOutput($this->arr_buttons, "bok", "processa()", "processa()", "bok", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
          $_SESSION['scriptcase']['bg_btn_popup']['bsair']     = nmButtonOutput($this->arr_buttons, "bsair", "window.close()", "window.close()", "bsair", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
          $_SESSION['scriptcase']['bg_btn_popup']['btbremove'] = nmButtonOutput($this->arr_buttons, "bsair", "self.parent.tb_remove()", "self.parent.tb_remove()", "bsair", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['field_order']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['field_order'][] = "room";
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['field_order'][] = "prices";
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['field_order'][] = "time_in";
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['field_order'][] = "time_out";
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['field_order'][] = "elapsed";
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['field_order'][] = "overtime";
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['field_order'][] = "flag";
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['field_order'][] = "plate";
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['field_order'][] = "grandtotal";
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['field_order'][] = "start_shift";
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['field_order_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['field_order'];
      } 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['Motel_Live_Data']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['Motel_Live_Data']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['Motel_Live_Data']['exit'];
      }

      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      nm_gc($this->Ini->path_libs);
      if (!$_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_page_process'] = $this->Ini->sc_page;
      } 
      $_SESSION['scriptcase']['sc_idioma_pivot']['en_us'] = array(
          'smry_ppup_titl'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_titl'],
          'smry_ppup_fild'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_fild'],
          'smry_ppup_posi'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_posi'],
          'smry_ppup_sort'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_sort'],
          'smry_ppup_posi_labl' => $this->Ini->Nm_lang['lang_othr_smry_ppup_posi_labl'],
          'smry_ppup_posi_data' => $this->Ini->Nm_lang['lang_othr_smry_ppup_posi_data'],
          'smry_ppup_sort_labl' => $this->Ini->Nm_lang['lang_othr_smry_ppup_sort_labl'],
          'smry_ppup_sort_vlue' => $this->Ini->Nm_lang['lang_othr_smry_ppup_sort_vlue'],
          'smry_ppup_chek_tabu' => $this->Ini->Nm_lang['lang_othr_smry_ppup_chek_tabu'],
      );
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
      if (!$_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_tp_pdf'] = "wkhtmltopdf";
          $_SESSION['scriptcase']['sc_idioma_pdf'] = array();
          $_SESSION['scriptcase']['sc_idioma_pdf']['en_us'] = array('titulo' => $this->Ini->Nm_lang['lang_pdff_titl'], 'tp_imp' => $this->Ini->Nm_lang['lang_pdff_type'], 'color' => $this->Ini->Nm_lang['lang_pdff_colr'], 'econm' => $this->Ini->Nm_lang['lang_pdff_bndw'], 'tp_pap' => $this->Ini->Nm_lang['lang_pdff_pper'], 'carta' => $this->Ini->Nm_lang['lang_pdff_letr'], 'oficio' => $this->Ini->Nm_lang['lang_pdff_legl'], 'customiz' => $this->Ini->Nm_lang['lang_pdff_cstm'], 'alt_papel' => $this->Ini->Nm_lang['lang_pdff_pper_hgth'], 'larg_papel' => $this->Ini->Nm_lang['lang_pdff_pper_wdth'], 'orient' => $this->Ini->Nm_lang['lang_pdff_pper_orie'], 'retrato' => $this->Ini->Nm_lang['lang_pdff_prtr'], 'paisag' => $this->Ini->Nm_lang['lang_pdff_lnds'], 'book' => $this->Ini->Nm_lang['lang_pdff_bkmk'], 'grafico' => $this->Ini->Nm_lang['lang_pdff_chrt'], 'largura' => $this->Ini->Nm_lang['lang_pdff_wdth'], 'fonte' => $this->Ini->Nm_lang['lang_pdff_font'], 'sim' => $this->Ini->Nm_lang['lang_pdff_chrt_yess'], 'nao' => $this->Ini->Nm_lang['lang_pdff_chrt_nooo'], 'cancela' => $this->Ini->Nm_lang['lang_pdff_cncl']);
      } 
      $_SESSION['scriptcase']['sc_idioma_graf_flash'] = array();
      $_SESSION['scriptcase']['sc_idioma_graf_flash']['en_us'] = array(
          'titulo' => $this->Ini->Nm_lang['lang_chrt_titl'],
          'tipo_g' => $this->Ini->Nm_lang['lang_chrt_type'],
          'tp_barra' => $this->Ini->Nm_lang['lang_flsh_chrt_bars'],
          'tp_pizza' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie'],
          'tp_linha' => $this->Ini->Nm_lang['lang_flsh_chrt_line'],
          'tp_area' => $this->Ini->Nm_lang['lang_flsh_chrt_area'],
          'tp_marcador' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks'],
          'tp_gauge' => $this->Ini->Nm_lang['lang_flsh_chrt_gaug'],
          'tp_radar' => $this->Ini->Nm_lang['lang_flsh_chrt_radr'],
          'tp_polar' => $this->Ini->Nm_lang['lang_flsh_chrt_polr'],
          'tp_funil' => $this->Ini->Nm_lang['lang_flsh_chrt_funl'],
          'tp_pyramid' => $this->Ini->Nm_lang['lang_flsh_chrt_pyrm'],
          'largura' => $this->Ini->Nm_lang['lang_chrt_wdth'],
          'altura' => $this->Ini->Nm_lang['lang_chrt_hgth'],
          'modo_gera' => $this->Ini->Nm_lang['lang_chrt_gtmd'],
          'sintetico' => $this->Ini->Nm_lang['lang_chrt_smzd'],
          'analitico' => $this->Ini->Nm_lang['lang_chrt_anlt'],
          'order' => $this->Ini->Nm_lang['lang_chrt_ordr'],
          'order_none' => $this->Ini->Nm_lang['lang_chrt_ordr_none'],
          'order_asc' => $this->Ini->Nm_lang['lang_chrt_ordr_asc'],
          'order_desc' => $this->Ini->Nm_lang['lang_chrt_ordr_desc'],
          'barra_orien' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_layo'],
          'barra_orien_horiz' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_horz'],
          'barra_orien_verti' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_vrtc'],
          'barra_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_shpe'],
          'barra_forma_barra' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_bars'],
          'barra_forma_cilin' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_cyld'],
          'barra_forma_cone' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_cone'],
          'barra_forma_piram' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_pyrm'],
          'barra_dimen' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_dmns'],
          'barra_dimen_2d' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_2ddm'],
          'barra_dimen_3d' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3ddm'],
          'barra_sobre' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3ovr'],
          'barra_sobre_nao' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3ont'],
          'barra_sobre_sim' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3oys'],
          'barra_empil' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stck'],
          'barra_empil_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stan'],
          'barra_empil_ativa' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stay'],
          'barra_empil_perce' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stap'],
          'barra_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_invr'],
          'barra_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_invn'],
          'barra_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_invi'],
          'barra_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_srgr'],
          'barra_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_srst'],
          'barra_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_srbs'],
          'barra_funil' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_funl'],
          'barra_funil_nao' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3ont'],
          'barra_funil_sim' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3oys'],
          'pizza_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_shpe'],
          'pizza_forma_pizza' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fpie'],
          'pizza_forma_donut' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dnts'],
          'pizza_dimen' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dmns'],
          'pizza_dimen_2d' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_2ddm'],
          'pizza_dimen_3d' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_3ddm'],
          'pizza_orden' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_srtn'],
          'pizza_orden_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_nsrt'],
          'pizza_orden_ascen' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_asrt'],
          'pizza_orden_desce' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dsrt'],
          'pizza_explo' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_expl'],
          'pizza_explo_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dxpl'],
          'pizza_explo_ativa' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_axpl'],
          'pizza_explo_click' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_cxpl'],
          'pizza_valor' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fval'],
          'pizza_valor_valor' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fvlv'],
          'pizza_valor_perce' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fvlp'],
          'linha_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_line_shpe'],
          'linha_forma_linha' => $this->Ini->Nm_lang['lang_flsh_chrt_line_line'],
          'linha_forma_splin' => $this->Ini->Nm_lang['lang_flsh_chrt_line_spln'],
          'linha_forma_degra' => $this->Ini->Nm_lang['lang_flsh_chrt_line_step'],
          'linha_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_line_invr'],
          'linha_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_line_invn'],
          'linha_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_line_invi'],
          'linha_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_line_srgr'],
          'linha_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_line_srst'],
          'linha_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_line_srbs'],
          'area_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_area_shpe'],
          'area_forma_area' => $this->Ini->Nm_lang['lang_flsh_chrt_area_area'],
          'area_forma_splin' => $this->Ini->Nm_lang['lang_flsh_chrt_area_spln'],
          'area_empil' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stak'],
          'area_empil_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stan'],
          'area_empil_ativa' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stay'],
          'area_empil_perce' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stap'],
          'area_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_area_invr'],
          'area_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_area_invn'],
          'area_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_area_invi'],
          'area_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_area_srgr'],
          'area_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_area_srst'],
          'area_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_area_srbs'],
          'marca_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_invr'],
          'marca_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_invn'],
          'marca_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_invi'],
          'marca_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_srgr'],
          'marca_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_srst'],
          'marca_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_srbs'],
          'gauge_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_gaug_shpe'],
          'gauge_forma_circular' => $this->Ini->Nm_lang['lang_flsh_chrt_gaug_circ'],
          'gauge_forma_semi' => $this->Ini->Nm_lang['lang_flsh_chrt_gaug_semi'],
          'pyram_slice' => $this->Ini->Nm_lang['lang_flsh_chrt_pyrm_slic'],
          'pyram_slice_s' => $this->Ini->Nm_lang['lang_flsh_chrt_pyrm_opcs'],
          'pyram_slice_n' => $this->Ini->Nm_lang['lang_flsh_chrt_pyrm_opcn'],
      );
      if (!$_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_idioma_prt'] = array();
          $_SESSION['scriptcase']['sc_idioma_prt']['en_us'] = array('titulo' => $this->Ini->Nm_lang['lang_btns_prtn_titl_hint'], 'modoimp' => $this->Ini->Nm_lang['lang_btns_mode_prnt_hint'], 'curr' => $this->Ini->Nm_lang['lang_othr_curr_page'], 'total' => $this->Ini->Nm_lang['lang_othr_full'], 'cor' => $this->Ini->Nm_lang['lang_othr_prtc'], 'pb' => $this->Ini->Nm_lang['lang_othr_bndw'], 'color' => $this->Ini->Nm_lang['lang_othr_colr'], 'cancela' => $this->Ini->Nm_lang['lang_btns_cncl_prnt_hint']);
      } 
      if (!$_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_idioma_word'] = array();
          $_SESSION['scriptcase']['sc_idioma_word']['en_us'] = array('titulo' => $this->Ini->Nm_lang['lang_btns_prtn_titl_hint'], 'cor' => $this->Ini->Nm_lang['lang_othr_prtc'], 'pb' => $this->Ini->Nm_lang['lang_othr_bndw'], 'color' => $this->Ini->Nm_lang['lang_othr_colr'], 'cancela' => $this->Ini->Nm_lang['lang_btns_cncl_prnt_hint']);
      } 
      $this->Ini->Gd_missing  = true;
      if (function_exists("getProdVersion"))
      {
          $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
      }
      if (function_exists("gd_info"))
      {
          $this->Ini->Gd_missing = false;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['SC_Ind_Groupby'] == "Shift") 
      {
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['ordem_select']))  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['ordem_select'] = array(); 
              $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['ordem_select']['Time_In'] = 'asc'; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['ordem_select']; 
          } 
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_orig']))  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'] = "busca" ;  
      }   
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['Motel_Live_Data']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['Motel_Live_Data']['start'] == 'filter')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'] == "inicio" || $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'] == "grid")  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'] = "busca";
          }   
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['embutida_form']) && $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['embutida_form'] && $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'] == "busca")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'] = "inicio";
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_orig']) || !empty($nmgp_parms) || !empty($GLOBALS["nmgp_parms"]))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opc_liga'] = array();  
          if (isset($NMSC_conf_apl) && !empty($NMSC_conf_apl))
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opc_liga'] = $NMSC_conf_apl;  
          }   
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opc_liga']['inicial']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'] = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opc_liga']['inicial'];
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'] == "busca")
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'] = "grid" ;  
      }   
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao_print']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao_print']))  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao_print'] = "inicio" ;  
      }   
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['print_all'] = false;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'] == "res_print")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao']     = "resumo";
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['print_all'] = true;
      } 
      if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'], 0, 7) == "grafico")  
      { 
          $_SESSION['scriptcase']['sc_ctl_ajax'] = 'part';
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'] == "pdf")
      { 
          $this->Ini->path_img_modelo = $this->Ini->path_img_modelo;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'] == "fast_search")  
      { 
          $this->SC_fast_search($GLOBALS["nmgp_fast_search"], $GLOBALS["nmgp_cond_fast_search"], $GLOBALS["nmgp_arg_fast_search"]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_pesq_ant'] == $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_pesq'])
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'] = 'igual';
          } 
          else 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_pesq'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['contr_array_resumo'] = "NAO";
              $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['contr_total_geral']  = "NAO";
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['tot_geral']);
              $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'] = 'pesq';
              $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['orig_pesq'] = 'grid';
          } 
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'] == 'pesq' && isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['orig_pesq']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['orig_pesq']))  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['orig_pesq'] == "res")  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'] = 'resumo';
          } 
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['orig_pesq'] == "grid") 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'] = 'inicio';
          } 
      } 
//
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['prim_cons'] = false;  
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_orig']) || !empty($nmgp_parms) || !empty($GLOBALS["nmgp_parms"]))  
      { 
         $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['prim_cons'] = true;  
         $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_orig'] = "";  
         $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_pesq']       = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_orig'];  
         $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_pesq_ant']   = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_orig'];  
         $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['cond_pesq'] = ""; 
         $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_pesq_filtro'] = "";
         $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['contr_total_geral'] = "NAO";
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['tot_geral']);
         $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['contr_array_resumo'] = "NAO";
      } 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_pesq_filtro'];
      $nm_flag_pdf   = true;
      $nm_vendo_pdf  = ("pdf" == $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao']);
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['graf_pdf'] = "S";
      if (isset($nmgp_graf_pdf) && !empty($nmgp_graf_pdf))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['graf_pdf'] = $nmgp_graf_pdf;
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['embutida'])
      {
         $this->Ini->sc_Include($this->Ini->path_libs . "/nm_trata_saida.php", "C", "nm_trata_saida") ; 
         $nm_saida = new nm_trata_saida();
         if ($nm_flag_pdf && $nm_vendo_pdf)
         {
            $nm_arquivo_htm_temp = $this->Ini->root . $this->Ini->path_imag_temp . "/sc_Motel_Live_Data_html_" . session_id() . "_2.html";
            if (isset($_GET['pdf_base']) && isset($_GET['pdf_url']))
            {
                $nm_arquivo_pdf_base = "/" . str_replace("_NMPLUS_", "+", $_GET['pdf_base']);
                $nm_arquivo_pdf_url  = $_GET['pdf_url'] . $nm_arquivo_pdf_base;
            }
            else
            {
                $nm_arquivo_pdf_base = "/sc_pdf_" . date("YmdHis") . "_" . rand(0, 1000) . "_Motel_Live_Data.pdf";
                $nm_arquivo_pdf_url  = $this->Ini->path_imag_temp . $nm_arquivo_pdf_base;
            }
            $nm_arquivo_pdf_serv = $this->Ini->root . $nm_arquivo_pdf_url;
            $nm_arquivo_de_saida = $this->Ini->root . $this->Ini->path_imag_temp . "/sc_Motel_Live_Data_html_" . session_id() . ".html";
            $nm_url_de_saida = $this->Ini->java_protocol . $this->Ini->server_pdf . $this->Ini->path_imag_temp . "/sc_Motel_Live_Data_html_" . session_id() . ".html";
            if (in_array(trim($this->Ini->str_lang), $this->Ini->nm_font_ttf) && strtolower($_SESSION['scriptcase']['charset']) != "utf-8")
            { 
                $nm_saida->seta_arquivo($nm_arquivo_de_saida, $_SESSION['scriptcase']['charset']);
                $_SESSION['scriptcase']['charset_html'] = "utf-8";
            }
            else
            { 
                $nm_saida->seta_arquivo($nm_arquivo_de_saida);
            }
         }
      }
//----------------------------------->
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'] == "doc_word_res")
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['print_navigator'] = "Microsoft Internet Explorer";
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['print_all'] = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['doc_word']  = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao']     = "resumo";
          $_SESSION['scriptcase']['saida_word'] = true;
          $nm_arquivo_doc_word = "/sc_Motel_Live_Data_res_" . session_id() . ".doc";
          $nm_saida->seta_arquivo($this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_doc_word);
          $this->ret_word = "resumo";
          $this->Ini->nm_limite_lin_res_prt = 0;
          $GLOBALS['nmgp_cor_print']        = $nmgp_cor_word;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'] == "xls")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "Motel_Live_Data/Motel_Live_Data_xls.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "Motel_Live_Data_xls.class.php"); 
          } 
          $this->xls  = new Motel_Live_Data_xls();
          $this->prep_modulos("xls");
          $this->xls->monta_xls();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'] == "xml")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "Motel_Live_Data/Motel_Live_Data_xml.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "Motel_Live_Data_xml.class.php"); 
          } 
          $this->xml  = new Motel_Live_Data_xml();
          $this->prep_modulos("xml");
          $this->xml->monta_xml();
      }
      else
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'] == "csv")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "Motel_Live_Data/Motel_Live_Data_csv.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "Motel_Live_Data_csv.class.php"); 
          } 
          $this->csv  = new Motel_Live_Data_csv();
          $this->prep_modulos("csv");
          $this->csv->monta_csv();
      }
      else   
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'] == "rtf")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "Motel_Live_Data/Motel_Live_Data_rtf.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "Motel_Live_Data_rtf.class.php"); 
          } 
          $this->rtf  = new Motel_Live_Data_rtf();
          $this->prep_modulos("rtf");
          $this->rtf->monta_rtf();
      }
      else
      if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'], 0, 7) == "grafico")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['embutida'])
          { 
              require_once($this->Ini->path_embutida . " . Motel_Live_Data . /" . $this->Ini->Apl_grafico); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . $this->Ini->Apl_grafico); 
          } 
          $this->Graf  = new Motel_Live_Data_grafico();
          $this->prep_modulos("Graf");
          if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'], 7, 1) == "_")  
          { 
              $this->Graf->grafico_col(substr($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'], 8));
          }
          else
          { 
              $this->Graf->monta_grafico();
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'] = "grid";
      }
      else 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'] == "busca")  
      { 
          require_once($this->Ini->path_aplicacao . "Motel_Live_Data_pesq.class.php"); 
          $this->pesq  = new Motel_Live_Data_pesq();
          $this->prep_modulos("pesq");
          $this->pesq->NM_ajax_flag    = $this->NM_ajax_flag;
          $this->pesq->NM_ajax_opcao   = $this->NM_ajax_opcao;
          $this->pesq->NM_ajax_retorno = $this->NM_ajax_retorno;
          $this->pesq->NM_ajax_info    = $this->NM_ajax_info;
          $this->pesq->monta_busca();
      }
      else 
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'] == "print" && $nmgp_tipo_print == "RC")
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['print_navigator'] = $nmgp_navegator_print;
              $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['print_all'] = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao']     = "pdf";
              $GLOBALS['nmgp_tipo_pdf'] = strtolower($nmgp_cor_print);
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao'] == "doc_word")
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['print_navigator'] = "Microsoft Internet Explorer";
              $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['print_all'] = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['doc_word']  = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['opcao']     = "pdf";
              $_SESSION['scriptcase']['saida_word'] = true;
              $nm_arquivo_doc_word = "/sc_Motel_Live_Data_" . session_id() . ".doc";
              $nm_saida->seta_arquivo($this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_doc_word);
              $this->ret_word = "volta_grid";
              $this->Ini->nm_limite_lin_prt = 0;
              $GLOBALS['nmgp_tipo_pdf'] = $nmgp_cor_word;
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "Motel_Live_Data/Motel_Live_Data_grid.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "Motel_Live_Data_grid.class.php"); 
          } 
          $this->grid  = new Motel_Live_Data_grid();
          $this->prep_modulos("grid");
          $this->grid->monta_grid($linhas);
      }   
//--- 
      if (!$_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['embutida'])
      {
           $this->Db->Close(); 
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['embutida'])
      {
         $nm_saida->finaliza();
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['doc_word'])
         {
             $this->html_doc_word($nm_arquivo_doc_word);
         }
         if ($nm_flag_pdf && $nm_vendo_pdf)
         {
            if (isset($nmgp_parms_pdf) && !empty($nmgp_parms_pdf))
            {
                $str_pd4ml    = $nmgp_parms_pdf;
            }
            else
            {
                $str_pd4ml    = " --page-size Letter --orientation Portrait";
            }
            if (!$_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['pdf_det'])
            {
                if (-1 < $this->grid->progress_grid && $this->grid->progress_fp)
                {
                    $lang_protect = $this->Ini->Nm_lang['lang_pdff_gnrt'];
                    if (!NM_is_utf8($lang_protect))
                    {
                        $lang_protect = mb_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
                    }
                    fwrite($this->grid->progress_fp, ($this->grid->progress_tot) . "_#NM#_" . $lang_protect . "...\n");
                    fclose($this->grid->progress_fp);
                }
            }
            if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['pdf_name']))
            {
                $nm_arquivo_pdf_serv = $this->Ini->root .  $this->Ini->path_imag_temp . "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['pdf_name'];
                $nm_arquivo_pdf_url  = $this->Ini->path_imag_temp . "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['pdf_name'];
                $nm_arquivo_pdf_base = "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['pdf_name'];
                unset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['pdf_name']);
            }
            $arq_pdf_out  = (FALSE !== strpos($nm_arquivo_pdf_serv, ' ')) ? " \"" . $nm_arquivo_pdf_serv . "\"" :  $nm_arquivo_pdf_serv;
            $arq_pdf_in   = (FALSE !== strpos($nm_url_de_saida, ' '))     ? " \"" . $nm_url_de_saida . "\""     :  $nm_url_de_saida;
            if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
            {
                chdir($this->Ini->path_third . "/wkhtmltopdf/win");
                $Win_autentication = "";
                if (isset($_SESSION['sc_pdf_usr']) && !empty($_SESSION['sc_pdf_usr']))
                {
                    $_SESSION['sc_iis_usr'] = $_SESSION['sc_pdf_usr'];
                }
                if (isset($_SESSION['sc_iis_usr']) && !empty($_SESSION['sc_iis_usr']))
                {
                    $Win_autentication .= " --username " . $_SESSION['sc_iis_usr'];
                }
                if (isset($_SESSION['sc_pdf_pw']) && !empty($_SESSION['sc_pdf_pw']))
                {
                    $_SESSION['sc_iis_pw'] = $_SESSION['sc_pdf_pw'];
                }
                if (isset($_SESSION['sc_iis_pw']) && !empty($_SESSION['sc_iis_pw']))
                {
                    $Win_autentication .= " --password " . $_SESSION['sc_iis_pw'];
                }
                $str_execcmd2 = 'wkhtmltopdf ' . $str_pd4ml . $Win_autentication . ' --header-right "[page]" --javascript-delay 250 ' . $arq_pdf_in . ' ' . $arq_pdf_out;
            }
            elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
            {
                if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                {
                    chdir($this->Ini->path_third . "/wkhtmltopdf/linux-i386");
                    $str_execcmd2 = './wkhtmltopdf-i386 ' . $str_pd4ml . ' --header-right "[page]" --javascript-delay 250 ' . $arq_pdf_in . ' ' . $arq_pdf_out;
                }
                else
                {
                    chdir($this->Ini->path_third . "/wkhtmltopdf/linux-amd64");
                    $str_execcmd2 = './wkhtmltopdf-amd64 ' . $str_pd4ml . ' --header-right "[page]" --javascript-delay 250 ' . $arq_pdf_in . ' ' . $arq_pdf_out;
                }
            }
            elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
            {
                chdir($this->Ini->path_third . "/wkhtmltopdf/osx/Contents/MacOS");
                $str_execcmd2 = './wkhtmltopdf ' . $str_pd4ml . ' --header-right "[page]" --javascript-delay 250 ' . $arq_pdf_in . ' ' . $arq_pdf_out;
            }
            $arr_execcmd = array();
            $str_execcmd = $str_execcmd2;
            exec($str_execcmd2);
            // ----- PDF log
            $fp = @fopen($this->Ini->root . $this->Ini->path_imag_temp . str_replace(".pdf", "", $nm_arquivo_pdf_base) . '.log', 'w');
            if ($fp)
            {
                @fwrite($fp, $str_execcmd . "\r\n\r\n");
                @fwrite($fp, implode("\r\n", $arr_execcmd));
                @fclose($fp);
            }
            if (in_array(trim($this->Ini->str_lang), $this->Ini->nm_font_ttf) && strtolower($_SESSION['scriptcase']['charset']) != "utf-8")
            { 
               $_SESSION['scriptcase']['charset_html'] = (isset($this->Ini->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->Ini->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
            }
            if (!$_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['pdf_det'])
            {
                if (-1 < $this->grid->progress_grid && $this->grid->progress_fp)
                {
                    $this->grid->progress_fp = fopen($_GET['pbfile'], 'a');
                    if ($this->grid->progress_fp)
                    {
                         $lang_protect = $this->Ini->Nm_lang['lang_pdff_fnsh'];
                         if (!NM_is_utf8($lang_protect))
                         {
                             $lang_protect = mb_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
                          }
                        fwrite($this->grid->progress_fp, ($this->grid->progress_now + 1 + $this->grid->progress_pdf) . "_#NM#_" . $lang_protect . "...\n");
                        fwrite($this->grid->progress_fp, "off\n");
                        fclose($this->grid->progress_fp);
                    }
                }
            }
unset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['pdf_file']);
if (is_file($nm_arquivo_pdf_serv))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['pdf_file'] = $nm_arquivo_pdf_serv;
}
$NM_volta  = "volta_grid";
$NM_target = "_parent";
if ($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['pdf_res'])
{
  $NM_volta  = "resumo";
  $NM_target = "_self";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Motel Live Data :: PDF</TITLE>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?>" GMT">
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0">
 <META http-equiv="Pragma" content="no-cache">
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY>
<?php echo $this->Ini->Ajax_result_set ?>
<table class="scGridTabela" valign="top"><tr class="scGridFieldOddVert"><td>
<?php
}
                    $rRFP = fopen(urldecode($_GET['pbfile']), "w");
                    fwrite($rRFP, "PDF\n");
                    fwrite($rRFP, "\n");
                    fwrite($rRFP, "\n");
                    fwrite($rRFP, "100\n");
                    fwrite($rRFP, 1 . "_#NM#_" . $this->Ini->Nm_lang['lang_pdff_gnrt'] . "...\n");
                    fwrite($rRFP, 100 . "_#NM#_" . $this->Ini->Nm_lang['lang_pdff_fnsh'] . "...\n");
                    fwrite($rRFP, "off\n");
                    fclose($rRFP);
if (!is_file($nm_arquivo_pdf_serv))
{
?>
  <br><b><?php echo $this->Ini->Nm_lang['lang_pdff_errg']; ?></b></td></tr></table>
<?php
}
else
{
?>
<?php echo $this->Ini->Nm_lang['lang_pdff_file_loct']; ?>
<BR>
<A href="<?php echo $nm_arquivo_pdf_url; ?>" target="_blank" class="scGridPageLink"><B><?php echo $nm_arquivo_pdf_url; ?></B></A>.
<BR>
<?php echo $this->Ini->Nm_lang['lang_pdff_clck_mesg']; ?>
</td></tr></table>
<?php
}
   echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "sc_b_sai", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "");
?>
<FORM name="F0" method=post action="Motel_Live_Data.php" target="<?php echo $NM_target; ?>"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($NM_volta); ?>"> 
</FORM>
</td></tr></table>
</BODY>
</HTML>
<?php
         }
      }
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
  function close_emb()
  {
      if ($this->Db)
      {
          $this->Db->Close(); 
      }
  }
   function SC_fast_search($field, $arg_search, $data_search)
   {
      if (empty($data_search)) 
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_pesq_filtro'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_pesq'] = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_orig'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['fast_search']);
          return;
      }
      $comando = "";
      $sv_data = $data_search;
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Room", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Prices", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Elapsed", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Overtime", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Start_Shift", $arg_search, $data_search);
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_pesq_filtro'] = "( " . $comando . " )";
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_orig'])) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_orig'] . " and ( " . $comando . " )"; 
      }
      else
      {
          $comando = " where (" . $comando . ")"; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['where_pesq'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['fast_search'][2] = $sv_data;
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_numeric = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $nm_numeric[] = "id";$nm_numeric[] = "prices";$nm_numeric[] = "total";$nm_numeric[] = "";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['Motel_Live_Data']['decimal_db'] == ".")
         {
             $nm_aspas = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
      $Nm_datas[] = "time_in";$Nm_datas[] = "time_out";
          if (in_array($campo_join, $Nm_datas) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
             $nm_aspas = "#";
          }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome     = "CAST ($nome AS TEXT)";
             $nm_aspas = "'";
         }
         if (in_array($campo_join, $Nm_datas) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
         {
             $nome     = "to_char ($nome, 'YYYY-MM-DD')";
         }
         if (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
         {
             $nome     = "str_replace (convert(char(10),$nome,102), '.', '-') + ' ' + convert(char(8),$nome,20)";
         }
         if (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
         {
             $nome     = "convert(char(23),$nome,121)";
         }
         if (substr($tp_campo, 0, 5) == "TIMES" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
         {
             $nome     = "TO_DATE(TO_CHAR($nome, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
             $tp_campo = "DATE" . substr($tp_campo, 4);
         }
         if (substr($tp_campo, 0, 8) == "DATETIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
         {
             $nome     = "EXTEND($nome, YEAR TO FRACTION)";
         }
         elseif (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
         {
             $nome     = "EXTEND($nome, YEAR TO DAY)";
         }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_aspas . $Cmp . $nm_aspas;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         switch (strtoupper($condicao))
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_aspas . $campo . $nm_aspas;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
            break;
            case "QP":     // 
               if (substr($tp_campo, 0, 4) == "DATE")
               {
                   $NM_cmd     = "";
                   if ($this->NM_data_qp['ano'] != "____")
                   {
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           $NM_cmd     .= "extract('year' from $nome) = " . $this->NM_data_qp['ano'];
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(year from $nome) = " . $this->NM_data_qp['ano'];
                       }
                       else
                       {
                           $NM_cmd     .= "year($nome) = " . $this->NM_data_qp['ano'];
                       }
                   }
                   if ($this->NM_data_qp['mes'] != "__")
                   {
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           $NM_cmd     .= "extract('month' from $nome) = " . $this->NM_data_qp['mes'];
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(month from $nome) = " . $this->NM_data_qp['mes'];
                       }
                       else
                       {
                           $NM_cmd     .= "month($nome) = " . $this->NM_data_qp['mes'];
                       }
                   }
                   if ($this->NM_data_qp['dia'] != "__")
                   {
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           $NM_cmd     .= "extract('day' from $nome) = " . $this->NM_data_qp['dia'];
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(day from $nome) = " . $this->NM_data_qp['dia'];
                       }
                       else
                       {
                           $NM_cmd     .= "day($nome) = " . $this->NM_data_qp['dia'];
                       }
                   }
                   if (!empty($NM_cmd))
                   {
                       $NM_cmd     = " (" . $NM_cmd . ")";
                       $comando        .= $NM_cmd;
                   }
               }
               else
               {
                   $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." like '%" . $campo . "%'";
               }
            break;
            case "NP":     // 
               if (substr($tp_campo, 0, 4) == "DATE")
               {
                   $NM_cmd     = "";
                   if ($this->NM_data_qp['ano'] != "____")
                   {
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           $NM_cmd     .= "extract('year' from $nome) <> " . $this->NM_data_qp['ano'];
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(year from $nome) <> " . $this->NM_data_qp['ano'];
                       }
                       else
                       {
                           $NM_cmd     .= "year($nome) <> " . $this->NM_data_qp['ano'];
                       }
                   }
                   if ($this->NM_data_qp['mes'] != "__")
                   {
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           $NM_cmd     .= "extract('month' from $nome) <> " . $this->NM_data_qp['mes'];
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(month from $nome) <> " . $this->NM_data_qp['mes'];
                       }
                       else
                       {
                           $NM_cmd     .= "month($nome) <> " . $this->NM_data_qp['mes'];
                       }
                   }
                   if ($this->NM_data_qp['dia'] != "__")
                   {
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           $NM_cmd     .= "extract('day' from $nome) <> " . $this->NM_data_qp['dia'];
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(day from $nome) <> " . $this->NM_data_qp['dia'];
                       }
                       else
                       {
                           $NM_cmd     .= "day($nome) <> " . $this->NM_data_qp['dia'];
                       }
                   }
                   if (!empty($NM_cmd))
                   {
                       $NM_cmd     = " (" . $NM_cmd . ")";
                       $comando        .= $NM_cmd;
                   }
               }
               else
               {
                   $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." not like '%" . $campo . "%'";
               }
            break;
            case "DF":     // 
               if ($tp_campo == "DTDF" || $tp_campo == "DATEDF")
               {
                   $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " not like '%" . $campo . "%'";
               }
               else
               {
                   $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas;
               }
            break;
            case "GT":     // 
               $comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas;
            break;
            case "GE":     // 
               $comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas;
            break;
            case "LT":     // 
               $comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas;
            break;
            case "LE":     // 
               $comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas;
            break;
         }
   }
   function SC_lookup_plate($condicao, $campo)
   {
       $result = array();
       $nm_comando = "SELECT Car_Plate, Trans_ID FROM dbo.Motel_Room_Comments WHERE (Car_Plate LIKE '%$campo%')" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "LIKE '$campo%'", $nm_comando);
       }
       if ($condicao == "df" || $condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "NOT LIKE '%$campo%'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "> '$campo'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", ">= '$campo'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "< '$campo'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "<= '$campo'", $nm_comando);
       }
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
   function SC_lookup_postotal($condicao, $campo)
   {
       $result = array();
       $nm_comando = "SELECT Total, Sensor_Trans_ID FROM dbo.Motel_Total_Sales WHERE (Total LIKE '%$campo%')" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "LIKE '$campo%'", $nm_comando);
       }
       if ($condicao == "df" || $condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "NOT LIKE '%$campo%'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "> '$campo'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", ">= '$campo'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "< '$campo'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "<= '$campo'", $nm_comando);
       }
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Ini->nm_db_conn_mssql->Execute($nm_comando)) 
       { 
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Ini->nm_db_conn_mssql->ErrorMsg()); 
           exit; 
       } 
   }
  function html_doc_word($nm_arquivo_doc_word)
  {
      global $nm_url_saida;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Motel Live Data :: Doc</TITLE>
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
   <td class="scExportTitle" style="height: 25px">WORD</td>
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
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . $nm_arquivo_doc_word ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="Motel_Live_Data_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="nm_tit_doc" value="Motel_Live_Data.doc"> 
<input type="hidden" name="nm_name_doc" value="<?php echo NM_encode_input($this->Ini->path_imag_temp . $nm_arquivo_doc_word) ?>"> 
</form>
<FORM name="F0" method=post action="Motel_Live_Data.php"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($this->ret_word) ?>"> 
</FORM> 
</BODY>
</HTML>
<?php
  }
} 
// 
//======= =========================
   if (!function_exists("NM_is_utf8"))
   {
       include_once("Motel_Live_Data_nmutf8.php");
   }
   if (!function_exists("SC_dir_app_ini"))
   {
       include_once("../_lib/lib/php/nm_ctrl_app_name.php");
   }
   SC_dir_app_ini('Mottech');
   $_SESSION['scriptcase']['Motel_Live_Data']['contr_erro'] = 'off';
   $sc_conv_var = array();
   if (!empty($_POST))
   {
       foreach ($_POST as $nmgp_var => $nmgp_val)
       {
            if (isset($sc_conv_var[$nmgp_var]))
            {
                $nmgp_var = $sc_conv_var[$nmgp_var];
            }
            elseif (isset($sc_conv_var[strtolower($nmgp_var)]))
            {
                $nmgp_var = $sc_conv_var[strtolower($nmgp_var)];
            }
            nm_limpa_str_Motel_Live_Data($nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }
   if (!empty($_GET))
   {
       foreach ($_GET as $nmgp_var => $nmgp_val)
       {
            if (isset($sc_conv_var[$nmgp_var]))
            {
                $nmgp_var = $sc_conv_var[$nmgp_var];
            }
            elseif (isset($sc_conv_var[strtolower($nmgp_var)]))
            {
                $nmgp_var = $sc_conv_var[strtolower($nmgp_var)];
            }
            nm_limpa_str_Motel_Live_Data($nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }

    if (isset($_POST['rs']) && strpos($_POST['rs'], '_ajax_') !== false && isset($_POST['rsargs']) && !empty($_POST['rsargs']))
    {
        if ('Motel_Live_Data_ajax_save_filter' == $_POST['rs'])
        {
            $room_cond = NM_utf8_urldecode($_POST['rsargs'][0]);
            $room = NM_utf8_urldecode($_POST['rsargs'][1]);
            $prices_cond = NM_utf8_urldecode($_POST['rsargs'][2]);
            $prices = NM_utf8_urldecode($_POST['rsargs'][3]);
            $time_in_cond = NM_utf8_urldecode($_POST['rsargs'][4]);
            $time_in_dia = NM_utf8_urldecode($_POST['rsargs'][5]);
            $time_in_mes = NM_utf8_urldecode($_POST['rsargs'][6]);
            $time_in_ano = NM_utf8_urldecode($_POST['rsargs'][7]);
            $time_in_input_2_dia = NM_utf8_urldecode($_POST['rsargs'][8]);
            $time_in_input_2_mes = NM_utf8_urldecode($_POST['rsargs'][9]);
            $time_in_input_2_ano = NM_utf8_urldecode($_POST['rsargs'][10]);
            $time_in_hor = NM_utf8_urldecode($_POST['rsargs'][11]);
            $time_in_min = NM_utf8_urldecode($_POST['rsargs'][12]);
            $time_in_seg = NM_utf8_urldecode($_POST['rsargs'][13]);
            $time_in_input_2_hor = NM_utf8_urldecode($_POST['rsargs'][14]);
            $time_in_input_2_min = NM_utf8_urldecode($_POST['rsargs'][15]);
            $time_in_input_2_seg = NM_utf8_urldecode($_POST['rsargs'][16]);
            $time_out_cond = NM_utf8_urldecode($_POST['rsargs'][17]);
            $time_out_dia = NM_utf8_urldecode($_POST['rsargs'][18]);
            $time_out_mes = NM_utf8_urldecode($_POST['rsargs'][19]);
            $time_out_ano = NM_utf8_urldecode($_POST['rsargs'][20]);
            $time_out_input_2_dia = NM_utf8_urldecode($_POST['rsargs'][21]);
            $time_out_input_2_mes = NM_utf8_urldecode($_POST['rsargs'][22]);
            $time_out_input_2_ano = NM_utf8_urldecode($_POST['rsargs'][23]);
            $time_out_hor = NM_utf8_urldecode($_POST['rsargs'][24]);
            $time_out_min = NM_utf8_urldecode($_POST['rsargs'][25]);
            $time_out_seg = NM_utf8_urldecode($_POST['rsargs'][26]);
            $time_out_input_2_hor = NM_utf8_urldecode($_POST['rsargs'][27]);
            $time_out_input_2_min = NM_utf8_urldecode($_POST['rsargs'][28]);
            $time_out_input_2_seg = NM_utf8_urldecode($_POST['rsargs'][29]);
            $start_shift_cond = NM_utf8_urldecode($_POST['rsargs'][30]);
            $start_shift = NM_utf8_urldecode($_POST['rsargs'][31]);
            $nmgp_save_name = NM_utf8_urldecode($_POST['rsargs'][32]);
            $NM_operador = NM_utf8_urldecode($_POST['rsargs'][33]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][34]);
            $bprocessa = NM_utf8_urldecode($_POST['rsargs'][35]);
        }
        if ('Motel_Live_Data_ajax_change_filter' == $_POST['rs'])
        {
            $NM_filters = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
            $bprocessa = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        if ('Motel_Live_Data_ajax_delete_filter' == $_POST['rs'])
        {
            $NM_filters_del = NM_utf8_urldecode($_POST['rsargs'][0]);
            $script_case_init = NM_utf8_urldecode($_POST['rsargs'][1]);
            $bprocessa = NM_utf8_urldecode($_POST['rsargs'][2]);
        }
        $nmgp_opcao = "busca";
    }

   if (!empty($glo_perfil))  
   { 
      $_SESSION['scriptcase']['glo_perfil'] = $glo_perfil;
   }   
   if (isset($glo_servidor)) 
   {
       $_SESSION['scriptcase']['glo_servidor'] = $glo_servidor;
   }
   if (isset($glo_banco)) 
   {
       $_SESSION['scriptcase']['glo_banco'] = $glo_banco;
   }
   if (isset($glo_tpbanco)) 
   {
       $_SESSION['scriptcase']['glo_tpbanco'] = $glo_tpbanco;
   }
   if (isset($glo_usuario)) 
   {
       $_SESSION['scriptcase']['glo_usuario'] = $glo_usuario;
   }
   if (isset($glo_senha)) 
   {
       $_SESSION['scriptcase']['glo_senha'] = $glo_senha;
   }
   if (isset($glo_senha_protect)) 
   {
       $_SESSION['scriptcase']['glo_senha_protect'] = $glo_senha_protect;
   }
   if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['embutida_form_parms'])) 
   {
       if (!empty($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['embutida_form_parms'])) 
       {
           $nmgp_parms = $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['embutida_form_parms'];
           $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['embutida_form_parms'] = "";
       }
   }
   elseif (isset($script_case_init))
   {
       unset($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['embutida_form']);
       unset($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['embutida_form_parms']);
   }
   if (!isset($nmgp_opcao) || !isset($script_case_init) || ((!isset($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['embutida']) || !$_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['embutida']) && $nmgp_opcao != "formphp"))
   { 
       if (!empty($nmgp_parms)) 
       { 
           $nmgp_parms = NM_decode_input($nmgp_parms);
           $nmgp_parms = str_replace("@aspass@", "'", $nmgp_parms);
           $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
           $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
           $todo = explode("?@?", $nmgp_parms);
           foreach ($todo as $param)
           {
                $cadapar = explode("?#?", $param);
                if (1 < sizeof($cadapar))
                {
                    if (isset($sc_conv_var[$cadapar[0]]))
                    {
                        $cadapar[0] = $sc_conv_var[$cadapar[0]];
                    }
                    elseif (isset($sc_conv_var[strtolower($cadapar[0])]))
                    {
                        $cadapar[0] = $sc_conv_var[strtolower($cadapar[0])];
                    }
                    nm_limpa_str_Motel_Live_Data($cadapar[1]);
                    $$cadapar[0] = $cadapar[1];
                }
           }
           $NMSC_conf_apl = array();
           if (isset($NMSC_inicial))
           {
               $NMSC_conf_apl['inicial'] = $NMSC_inicial;
           }
           if (isset($NMSC_rows))
           {
               $NMSC_conf_apl['rows'] = $NMSC_rows;
           }
           if (isset($NMSC_cols))
           {
               $NMSC_conf_apl['cols'] = $NMSC_cols;
           }
           if (isset($NMSC_paginacao))
           {
               $NMSC_conf_apl['paginacao'] = $NMSC_paginacao;
           }
           if (isset($NMSC_cab))
           {
               $NMSC_conf_apl['cab'] = $NMSC_cab;
           }
           if (isset($NMSC_nav))
           {
               $NMSC_conf_apl['nav'] = $NMSC_nav;
           }
           if (isset($NM_run_iframe) && $NM_run_iframe == 1) 
           { 
               unset($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']);
               $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['b_sair'] = false;
           }   
       } 
   } 
   $ini_embutida = "";
   if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['embutida']) && $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['embutida'])
   {
       $nmgp_outra_jan = "";
   }
   if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
   {
       $script_case_init = "";
   }
   if (isset($GLOBALS["script_case_init"]) && !empty($GLOBALS["script_case_init"]))
   {
       $ini_embutida = $GLOBALS["script_case_init"];
        if (!isset($_SESSION['sc_session'][$ini_embutida]['Motel_Live_Data']['embutida']))
        { 
           $_SESSION['sc_session'][$ini_embutida]['Motel_Live_Data']['embutida'] = false;
        }
        if (!$_SESSION['sc_session'][$ini_embutida]['Motel_Live_Data']['embutida'])
        { 
           $script_case_init = $ini_embutida;
        }
   }
   if (isset($_SESSION['scriptcase']['Motel_Live_Data']['protect_modal']) && !empty($_SESSION['scriptcase']['Motel_Live_Data']['protect_modal']))
   {
       $script_case_init = $_SESSION['scriptcase']['Motel_Live_Data']['protect_modal'];
   }
   if (!isset($script_case_init) || empty($script_case_init))
   {
       $script_case_init = rand(2, 1000);
   }
   $salva_emb    = false;
   $salva_iframe = false;
   $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['doc_word'] = false;
   $_SESSION['scriptcase']['saida_word'] = false;
   if (isset($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['iframe_menu']))
   {
       $salva_iframe = $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['iframe_menu'];
       unset($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['iframe_menu']);
   }
   if (isset($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['embutida']))
   {
       $salva_emb = $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['embutida'];
       unset($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['embutida']);
   }
   if (isset($nm_run_menu) && $nm_run_menu == 1 && !$salva_emb)
   {
        if (isset($_SESSION['scriptcase']['sc_aba_iframe']) && isset($_SESSION['scriptcase']['sc_apl_menu_atual']) && $script_case_init == 1)
        {
            foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
            {
                if ($aba == $_SESSION['scriptcase']['sc_apl_menu_atual'])
                {
                    unset($_SESSION['scriptcase']['sc_aba_iframe'][$aba]);
                    break;
                }
            }
        }
        if ($script_case_init == 1)
        {
            $_SESSION['scriptcase']['sc_apl_menu_atual'] = "Motel_Live_Data";
        }
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'Motel_Live_Data' || $achou)
                {
                    unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                }
            }
            if (!$achou && isset($nm_apl_menu))
            {
                foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
                {
                    if ($nome_apl == $nm_apl_menu || $achou)
                    {
                        $achou = true;
                        if ($nome_apl != $nm_apl_menu)
                        {
                            unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                        }
                    }
                }
            }
        }
        $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['iframe_menu'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['iframe_menu'] = $salva_iframe;
   }
   $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['embutida'] = $salva_emb;

   if (!isset($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['initialize']))
   {
       $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['initialize'] = true;
   }
   elseif (!isset($_SERVER['HTTP_REFERER']))
   {
       $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['initialize'] = false;
   }
   elseif (false === strpos($_SERVER['HTTP_REFERER'], '.php'))
   {
       $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['initialize'] = true;
   }
   else
   {
       $sReferer = substr($_SERVER['HTTP_REFERER'], 0, strpos($_SERVER['HTTP_REFERER'], '.php'));
       $sReferer = substr($sReferer, strrpos($sReferer, '/') + 1);
       if ('Motel_Live_Data' == $sReferer || 'Motel_Live_Data_' == substr($sReferer, 0, 16))
       {
           $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['initialize'] = false;
       }
       else
       {
           $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['initialize'] = true;
       }
   }
   if ($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['initialize'])
   {
       unset($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['tot_geral']);
   }

   $_POST['script_case_init'] = $script_case_init;
   if (isset($nmgp_opcao) && $nmgp_opcao == "busca" && isset($nmgp_orig_pesq))
   {
       $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['orig_pesq'] = $nmgp_orig_pesq;
   }
   if (!isset($nmgp_opcao) || empty($nmgp_opcao) || $nmgp_opcao == "grid" && (!isset($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['b_sair'])))
   {
       $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['b_sair'] = true;
   }
   $STR_lang    = (isset($_SESSION['scriptcase']['str_lang']) && !empty($_SESSION['scriptcase']['str_lang'])) ? $_SESSION['scriptcase']['str_lang'] : "en_us";
   $STR_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "ScriptCase6_Silver/ScriptCase6_Silver";
   $NM_arq_lang = "../_lib/lang/" . $STR_lang . ".lang.php";
   $Nm_lang = array();
   if (is_file($NM_arq_lang))
   {
       $Lixo = file($NM_arq_lang);
       foreach ($Lixo as $Cada_lin) 
       {
           if (strpos($Cada_lin, "array()") === false && (trim($Cada_lin) != "<?php")  && (trim($Cada_lin) != "?" . ">"))
           {
               eval (str_replace("\$this->", "\$", $Cada_lin));
           }
       }
   }
   $_SESSION['scriptcase']['charset'] = (isset($Nm_lang['Nm_charset']) && !empty($Nm_lang['Nm_charset'])) ? $Nm_lang['Nm_charset'] : "ISO-8859-1";
   foreach ($Nm_lang as $ind => $dados)
   {
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
      {
          $Nm_lang[$ind] = mb_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
   }
   if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'Motel_Live_Data')
   {
       $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['sc_outra_jan'] = true;
        unset($_SESSION['scriptcase']['sc_outra_jan']);
   }
   $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['menu_desenv'] = false;   
   if (!defined("SC_ERROR_HANDLER"))
   {
       define("SC_ERROR_HANDLER", 1);
       include_once(dirname(__FILE__) . "/Motel_Live_Data_erro.php");
   }
   $salva_tp_saida  = (isset($_SESSION['scriptcase']['sc_tp_saida']))  ? $_SESSION['scriptcase']['sc_tp_saida'] : "";
   $salva_url_saida  = (isset($_SESSION['scriptcase']['sc_url_saida'][$script_case_init])) ? $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] : "";
   if (!$_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['embutida'] && $nmgp_opcao != "formphp")
   { 
       if ($nmgp_opcao == "link_res")  
       { 
           $nmgp_opcao = "inicio";  
           $Temp_parms = "";  
           $todo = explode("?@?", $nmgp_parms_where);
           foreach ($todo as $param)
           {
                $delimit = "'";
                $cadapar = explode("?#?", $param);
                $cadapar[0] = str_replace("room", "Room", $cadapar[0]);
                $cadapar[0] = str_replace("prices", "Prices", $cadapar[0]);
                $cadapar[0] = str_replace("time_in", "Time_In", $cadapar[0]);
                $cadapar[0] = str_replace("time_out", "Time_Out", $cadapar[0]);
                $cadapar[0] = str_replace("elapsed", "Elapsed", $cadapar[0]);
                $cadapar[0] = str_replace("overtime", "Overtime", $cadapar[0]);
                $cadapar[0] = str_replace("plate", "SELECT Car_Plate 
FROM dbo.Motel_Room_Comments 
WHERE Trans_ID = '{ID}' 
ORDER BY Car_Plate", $cadapar[0]);
                $cadapar[0] = str_replace("start_shift", "Start_Shift", $cadapar[0]);
                $cadapar[0] = str_replace("id", "ID", $cadapar[0]);
                $cadapar[0] = str_replace("clean_duration", "Clean_Duration", $cadapar[0]);
                $cadapar[0] = str_replace("total", "Total", $cadapar[0]);
                $cadapar[0] = str_replace("postotal", "SELECT Total 
FROM dbo.Motel_Total_Sales 
WHERE Sensor_Trans_ID={id} 
ORDER BY Total", $cadapar[0]);
                if ($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['SC_Ind_Groupby'] == "Shift")
                { 
                    $Temp_parms .= (empty($Temp_parms)) ? "" : " and ";
                    $Temp_parms .= $cadapar[0] . " = " . str_replace("@aspass@", $delimit, $cadapar[1]) ;
                } 
           }
           $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['where_resumo'] = $Temp_parms;
       } 
       if ($nmgp_opcao == "change_lang" || $nmgp_opcao == "change_lang_res" || $nmgp_opcao == "change_lang_fil")  
       { 
           if ($nmgp_opcao == "change_lang_fil")  
           { 
               $nmgp_opcao  = "busca";  
           } 
           elseif ($nmgp_opcao == "change_lang_res")  
           { 
               $nmgp_opcao  = "resumo";  
           } 
           else 
           { 
               $nmgp_opcao  = "igual";  
           } 
           unset($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['tot_geral']);
           $Temp_lang = explode(";" , $nmgp_idioma);  
           if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))  
           { 
               $_SESSION['scriptcase']['str_lang'] = $Temp_lang[0];
           } 
           if (isset($Temp_lang[1]) && !empty($Temp_lang[1])) 
           { 
               $_SESSION['scriptcase']['str_conf_reg'] = $Temp_lang[1];
           } 
       } 
       if ($nmgp_opcao == "change_schema" || $nmgp_opcao == "change_schema_fil" || $nmgp_opcao == "change_schema_res")  
       { 
           if ($nmgp_opcao == "change_schema_fil")  
           { 
               $nmgp_opcao  = "busca";  
           } 
           elseif ($nmgp_opcao == "change_schema_res")  
           { 
               $nmgp_opcao  = "resumo";  
           } 
           else 
           { 
               $nmgp_opcao  = "igual";  
           } 
           $nmgp_schema = $nmgp_schema . "/" . $nmgp_schema;  
           $_SESSION['scriptcase']['str_schema_all'] = $nmgp_schema;
           $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['num_css'] = rand(0, 1000);
       } 
       if ($nmgp_opcao == "volta_grid")  
       { 
           $nmgp_opcao = "igual";  
       }   
       if (!empty($nmgp_opcao))  
       { 
           $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['opcao'] = $nmgp_opcao ;  
       }   
       if (isset($nmgp_lig_edit_lapis)) 
       {
          $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['mostra_edit'] = $nmgp_lig_edit_lapis;
           unset($GLOBALS["nmgp_lig_edit_lapis"]) ;  
           if (isset($_SESSION['nmgp_lig_edit_lapis'])) 
           {
               unset($_SESSION['nmgp_lig_edit_lapis']);
           }
       }
       if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
       {
           $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['sc_outra_jan'] = true;
       }
       if (isset($nmgp_rotaciona) && $nmgp_rotaciona == "S") 
       {
           $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['res_hrz'] = ($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['res_hrz']) ? false : true;
       }
       $nm_saida = "";
       if (isset($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['volta_redirect_apl']) && !empty($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['volta_redirect_apl']))
       {
           $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['volta_redirect_apl']; 
           $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['volta_redirect_tp']; 
           $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['volta_redirect_apl'] = "";
           $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['volta_redirect_tp'] = "";
           $nm_url_saida = "Motel_Live_Data_fim.php"; 
       
       }
       elseif (substr($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['opcao'], 0, 7) != "grafico" && $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['opcao'] != "pdf" ) 
       {
           if (isset($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['sc_outra_jan'])
           {
               if ($nmgp_url_saida == "modal")
               {
                   $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['sc_modal'] = true;
               }
               $nm_url_saida = "Motel_Live_Data_fim.php"; 
           }
           else
           {
               $nm_url_saida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ""; 
               $nm_url_saida = str_replace("_fim.php", ".php", $nm_url_saida);
               if (!empty($nmgp_url_saida)) 
               { 
                   $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['retorno_cons'] = $nmgp_url_saida ; 
               } 
               if (!empty($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['retorno_cons'])) 
               { 
                   $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['retorno_cons']  . "?script_case_init=" . NM_encode_input($script_case_init);  
                   $nm_apl_dependente = 1 ; 
               } 
               if (!empty($nm_url_saida)) 
               { 
                   $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida ; 
               } 
               $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida; 
               $nm_url_saida = "Motel_Live_Data_fim.php"; 
               $_SESSION['scriptcase']['sc_tp_saida'] = "P"; 
               if ($nm_apl_dependente == 1) 
               { 
                   $_SESSION['scriptcase']['sc_tp_saida'] = "D"; 
               } 
           } 
       }
// 
       if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && substr($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['opcao'], 0, 7) != "grafico" && $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['opcao'] != "pdf" ) 
       { 
            $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['menu_desenv'] = true;   
       } 
       if (isset($_GET["nmgp_parms_ret"])) 
       {
           $todo = explode(",", $nmgp_parms_ret);
           if (isset($sc_conv_var[$todo[2]]))
           {
               $todo[2] = $sc_conv_var[$todo[2]];
           }
           elseif (isset($sc_conv_var[strtolower($todo[2])]))
           {
               $todo[2] = $sc_conv_var[strtolower($todo[2])];
           }
           $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['form_psq_ret']  = $todo[0];
           $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['campo_psq_ret'] = $todo[1];
           $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['dado_psq_ret']  = $todo[2];
           $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['js_apos_busca'] = $nm_evt_ret_busca;
           $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['opc_psq'] = true ;   
       } 
       elseif (!isset($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['opc_psq']))
       {
           $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['opc_psq'] = false ;   
       } 
       if ($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['embutida_form'])
       {
           $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['mostra_edit'] = "N";   
           $_SESSION['scriptcase']['sc_tp_saida']  = $salva_tp_saida;
           $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $salva_url_saida;
       } 
       $GLOBALS["NM_ERRO_IBASE"] = 0;  
       if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
       { 
           $_SESSION['scriptcase']['sc_apl_seg']['Motel_Live_Data'] = "on";
       } 
       if (isset($_GET['SC_Link_View']) && !empty($_GET['SC_Link_View']) && is_numeric($_GET['SC_Link_View']))
       { 
           $_SESSION['scriptcase']['sc_apl_seg']['Motel_Live_Data'] = "on";
       } 
       if (!$_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['opc_psq']) 
       { 
          if (!isset($_SESSION['scriptcase']['sc_apl_seg']['Motel_Live_Data']) || $_SESSION['scriptcase']['sc_apl_seg']['Motel_Live_Data'] != "on")
          { 
              $NM_Mens_Erro = $Nm_lang['lang_errm_unth_user'];
              $nm_botao_ok = ($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['iframe_menu']) ? false : true;
              if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
              {
                  foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
                  {
                      if (in_array("Motel_Live_Data", $apls_aba))
                      {
                          $nm_botao_ok = false;
                           break;
                      }
                  }
              }
?>
             <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
              <HTML>
               <HEAD>
                <TITLE></TITLE>
               <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
                <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>                <META http-equiv="Pragma" content="no-cache"/>
                <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $STR_schema_all ?>_grid.css" /> 
               </HEAD>
               <body class="scGridPage">
                <table align="center" class="scGridBorder"><tr><td style="padding: 0">
                <table style="width: 100%" class="scGridTabela"><tr class="scGridFieldOdd"><td class="scGridFieldOddFont" style="padding: 15px 30px; text-align: center">
                 <?php echo $NM_Mens_Erro; ?>
<?php
              if ($nm_botao_ok)
              {
?>
                <br />
                <form name="Fseg" method="post" 
                                    action="<?php echo $nm_url_saida; ?>" 
                                    target="_self"> 
                 <input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($script_case_init) ?>"/> 
                 <input type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id());?>"/>
                 <input type="submit" name="sc_sai_seg" value="OK"> 
                </form> 
<?php
              }
?>
                </td></tr></table>
                </td></tr></table>
<?php
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']))
              {
?>
<br /><br /><br />
<table align="center" class="scGridBorder" style="width: 450px"><tr><td style="padding: 0">
 <table style="width: 100%" class="scGridTabela">
  <tr class="scGridFieldOdd">
   <td class="scGridFieldOddFont" style="padding: 15px 30px">
    <?php echo $Nm_lang['lang_errm_unth_hwto']; ?>
   </td>
  </tr>
 </table>
</td></tr></table>
<?php
              }
?>
               </body>
              </HTML>
<?php
              exit;
          } 
       } 
       if (isset($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['sc_outra_jan'])
       {
           $nm_apl_dependente = 0;
       }
       $contr_Motel_Live_Data = new Motel_Live_Data_apl();

      if (!isset($_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['embutida']) || !$_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['embutida'])
      { 
          if (!function_exists("sajax_init")) 
          { 
              include_once(dirname(__FILE__) . '/Motel_Live_Data_sajax.php');
          }
          $sajax_request_type = "POST";
          sajax_init();
      }
      //$sajax_debug_mode = 1;
      sajax_export("Motel_Live_Data_ajax_save_filter");
      sajax_export("Motel_Live_Data_ajax_change_filter");
      sajax_export("Motel_Live_Data_ajax_delete_filter");
      sajax_handle_client_request();

      if ('ajax_autocomp' == $nmgp_opcao)
      {
          $nmgp_opcao = 'busca';
          $_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['opcao'] = "busca";
          $contr_Motel_Live_Data->NM_ajax_flag = true;
          $contr_Motel_Live_Data->NM_ajax_opcao = $NM_ajax_opcao;
      }

       $contr_Motel_Live_Data->controle();
   } 
   if (!$_SESSION['sc_session'][$script_case_init]['Motel_Live_Data']['embutida'] && $nmgp_opcao == "formphp")
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 0;  
       $contr_Motel_Live_Data = new Motel_Live_Data_apl();
       $contr_Motel_Live_Data->controle();
   } 
//
   function nm_limpa_str_Motel_Live_Data(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               foreach ($str as $x => $cada_str)
               {
                   $str[$x] = str_replace("@aspasd@", '"', $str[$x]);
                   $str[$x] = stripslashes($str[$x]);
               }
           }
           else
           {
               $str = str_replace("@aspasd@", '"', $str);
               $str = stripslashes($str);
           }
       }
   }

    function Motel_Live_Data_ajax_save_filter($room_cond, $room, $prices_cond, $prices, $time_in_cond, $time_in_dia, $time_in_mes, $time_in_ano, $time_in_input_2_dia, $time_in_input_2_mes, $time_in_input_2_ano, $time_in_hor, $time_in_min, $time_in_seg, $time_in_input_2_hor, $time_in_input_2_min, $time_in_input_2_seg, $time_out_cond, $time_out_dia, $time_out_mes, $time_out_ano, $time_out_input_2_dia, $time_out_input_2_mes, $time_out_input_2_ano, $time_out_hor, $time_out_min, $time_out_seg, $time_out_input_2_hor, $time_out_input_2_min, $time_out_input_2_seg, $start_shift_cond, $start_shift, $nmgp_save_name, $NM_operador, $script_case_init, $bprocessa)
    {
        global $contr_Motel_Live_Data;
        register_shutdown_function("Motel_Live_Data_nm_return_ajax");
        $contr_Motel_Live_Data->NM_ajax_flag          = true;
        $contr_Motel_Live_Data->NM_ajax_opcao         = 'save_filter';
        $contr_Motel_Live_Data->NM_ajax_info['param'] = array(
                  'room_cond' => NM_utf8_urldecode($room_cond),
                  'room' => NM_utf8_urldecode($room),
                  'prices_cond' => NM_utf8_urldecode($prices_cond),
                  'prices' => NM_utf8_urldecode($prices),
                  'time_in_cond' => NM_utf8_urldecode($time_in_cond),
                  'time_in_dia' => NM_utf8_urldecode($time_in_dia),
                  'time_in_mes' => NM_utf8_urldecode($time_in_mes),
                  'time_in_ano' => NM_utf8_urldecode($time_in_ano),
                  'time_in_input_2_dia' => NM_utf8_urldecode($time_in_input_2_dia),
                  'time_in_input_2_mes' => NM_utf8_urldecode($time_in_input_2_mes),
                  'time_in_input_2_ano' => NM_utf8_urldecode($time_in_input_2_ano),
                  'time_in_hor' => NM_utf8_urldecode($time_in_hor),
                  'time_in_min' => NM_utf8_urldecode($time_in_min),
                  'time_in_seg' => NM_utf8_urldecode($time_in_seg),
                  'time_in_input_2_hor' => NM_utf8_urldecode($time_in_input_2_hor),
                  'time_in_input_2_min' => NM_utf8_urldecode($time_in_input_2_min),
                  'time_in_input_2_seg' => NM_utf8_urldecode($time_in_input_2_seg),
                  'time_out_cond' => NM_utf8_urldecode($time_out_cond),
                  'time_out_dia' => NM_utf8_urldecode($time_out_dia),
                  'time_out_mes' => NM_utf8_urldecode($time_out_mes),
                  'time_out_ano' => NM_utf8_urldecode($time_out_ano),
                  'time_out_input_2_dia' => NM_utf8_urldecode($time_out_input_2_dia),
                  'time_out_input_2_mes' => NM_utf8_urldecode($time_out_input_2_mes),
                  'time_out_input_2_ano' => NM_utf8_urldecode($time_out_input_2_ano),
                  'time_out_hor' => NM_utf8_urldecode($time_out_hor),
                  'time_out_min' => NM_utf8_urldecode($time_out_min),
                  'time_out_seg' => NM_utf8_urldecode($time_out_seg),
                  'time_out_input_2_hor' => NM_utf8_urldecode($time_out_input_2_hor),
                  'time_out_input_2_min' => NM_utf8_urldecode($time_out_input_2_min),
                  'time_out_input_2_seg' => NM_utf8_urldecode($time_out_input_2_seg),
                  'start_shift_cond' => NM_utf8_urldecode($start_shift_cond),
                  'start_shift' => NM_utf8_urldecode($start_shift),
                  'nmgp_save_name' => NM_utf8_urldecode($nmgp_save_name),
                  'NM_operador' => NM_utf8_urldecode($NM_operador),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'bprocessa' => NM_utf8_urldecode($bprocessa),
                 );
        $contr_Motel_Live_Data->controle();
        exit;
    } // ajax_save_filter

    function Motel_Live_Data_ajax_change_filter($NM_filters, $script_case_init, $bprocessa)
    {
        global $contr_Motel_Live_Data;
        register_shutdown_function("Motel_Live_Data_nm_return_ajax");
        $contr_Motel_Live_Data->NM_ajax_flag          = true;
        $contr_Motel_Live_Data->NM_ajax_opcao         = 'change_filter';
        $contr_Motel_Live_Data->NM_ajax_info['param'] = array(
                  'NM_filters' => NM_utf8_urldecode($NM_filters),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'bprocessa' => NM_utf8_urldecode($bprocessa),
                 );
        $contr_Motel_Live_Data->controle();
        exit;
    } // ajax_change_filter

    function Motel_Live_Data_ajax_delete_filter($NM_filters_del, $script_case_init, $bprocessa)
    {
        global $contr_Motel_Live_Data;
        register_shutdown_function("Motel_Live_Data_nm_return_ajax");
        $contr_Motel_Live_Data->NM_ajax_flag          = true;
        $contr_Motel_Live_Data->NM_ajax_opcao         = 'delete_filter';
        $contr_Motel_Live_Data->NM_ajax_info['param'] = array(
                  'NM_filters_del' => NM_utf8_urldecode($NM_filters_del),
                  'script_case_init' => NM_utf8_urldecode($script_case_init),
                  'bprocessa' => NM_utf8_urldecode($bprocessa),
                 );
        $contr_Motel_Live_Data->controle();
        exit;
    } // ajax_delete_filter

    function Motel_Live_Data_nm_return_ajax()
    {
        global $contr_Motel_Live_Data;
        $contr_Motel_Live_Data->NM_ajax_flag    = $contr_Motel_Live_Data->pesq->NM_ajax_flag;
        $contr_Motel_Live_Data->NM_ajax_opcao   = $contr_Motel_Live_Data->pesq->NM_ajax_opcao;
        $contr_Motel_Live_Data->NM_ajax_retorno = $contr_Motel_Live_Data->pesq->NM_ajax_retorno;
        $contr_Motel_Live_Data->NM_ajax_info    = $contr_Motel_Live_Data->pesq->NM_ajax_info;
        Motel_Live_Data_pack_ajax_response();
    }

   function Motel_Live_Data_pack_ajax_response()
   {
      global $contr_Motel_Live_Data;
      $aResp = array();
      if ($contr_Motel_Live_Data->NM_ajax_info['calendarReload'])
      {
         $aResp['result'] = 'CALENDARRELOAD';
      }
      elseif ('' != $contr_Motel_Live_Data->NM_ajax_info['autoComp'])
      {
         $aResp['result'] = 'AUTOCOMP';
      }
//mestre_detalhe
      elseif (!empty($contr_Motel_Live_Data->NM_ajax_info['newline']))
      {
         $aResp['result'] = 'NEWLINE';
         ob_end_clean();
      }
      elseif (!empty($contr_Motel_Live_Data->NM_ajax_info['tableRefresh']))
      {
         $aResp['result'] = 'TABLEREFRESH';
      }
//-----
      elseif (!empty($contr_Motel_Live_Data->NM_ajax_info['errList']))
      {
         $aResp['result'] = 'ERROR';
      }
      elseif (!empty($contr_Motel_Live_Data->NM_ajax_info['fldList']))
      {
         $aResp['result'] = 'SET';
      }
      else
      {
         $aResp['result'] = 'OK';
      }
      if ('AUTOCOMP' == $aResp['result'])
      {
         $aResp = $contr_Motel_Live_Data->NM_ajax_info['autoComp'];
      }
//mestre_detalhe
      elseif ('NEWLINE' == $aResp['result'])
      {
         $aResp = $contr_Motel_Live_Data->NM_ajax_info['newline'];
      }
      else
//-----
      {
         $aResp['ajaxRequest'] = $contr_Motel_Live_Data->NM_ajax_opcao;
         if ('CALENDARRELOAD' == $aResp['result'])
         {
            Motel_Live_Data_pack_calendar_reload($aResp);
         }
         elseif ('ERROR' == $aResp['result'])
         {
            Motel_Live_Data_pack_ajax_errors($aResp);
         }
         elseif ('SET' == $aResp['result'])
         {
            Motel_Live_Data_pack_ajax_set_fields($aResp);
         }
         elseif ('TABLEREFRESH' == $aResp['result'])
         {
            Motel_Live_Data_pack_ajax_set_fields($aResp);
            $aResp['tableRefresh'] = Motel_Live_Data_pack_protect_string($contr_Motel_Live_Data->NM_ajax_info['tableRefresh']);
         }
         if ('OK' == $aResp['result'] || 'SET' == $aResp['result'])
         {
            Motel_Live_Data_pack_ajax_ok($aResp);
         }
         if (isset($contr_Motel_Live_Data->NM_ajax_info['focus']) && '' != $contr_Motel_Live_Data->NM_ajax_info['focus'])
         {
            $aResp['setFocus'] = $contr_Motel_Live_Data->NM_ajax_info['focus'];
         }
         if (isset($contr_Motel_Live_Data->NM_ajax_info['closeLine']) && '' != $contr_Motel_Live_Data->NM_ajax_info['closeLine'])
         {
            $aResp['closeLine'] = $contr_Motel_Live_Data->NM_ajax_info['closeLine'];
         }
         else
         {
            $aResp['closeLine'] = 'N';
         }
         if (isset($contr_Motel_Live_Data->NM_ajax_info['clearUpload']) && '' != $contr_Motel_Live_Data->NM_ajax_info['clearUpload'])
         {
            $aResp['clearUpload'] = $contr_Motel_Live_Data->NM_ajax_info['clearUpload'];
         }
         else
         {
            $aResp['clearUpload'] = 'N';
         }
         if (isset($contr_Motel_Live_Data->NM_ajax_info['masterValue']) && '' != $contr_Motel_Live_Data->NM_ajax_info['masterValue'])
         {
            Motel_Live_Data_pack_master_value($aResp);
         }
         if (isset($contr_Motel_Live_Data->NM_ajax_info['ajaxAlert']) && '' != $contr_Motel_Live_Data->NM_ajax_info['ajaxAlert'])
         {
            Motel_Live_Data_pack_ajax_alert($aResp);
         }
         if (isset($contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']) && '' != $contr_Motel_Live_Data->NM_ajax_info['ajaxMessage'])
         {
            Motel_Live_Data_pack_ajax_message($aResp);
         }
         if (isset($contr_Motel_Live_Data->NM_ajax_info['ajaxJavascript']) && '' != $contr_Motel_Live_Data->NM_ajax_info['ajaxJavascript'])
         {
            Motel_Live_Data_pack_ajax_javascript($aResp);
         }
         if (isset($contr_Motel_Live_Data->NM_ajax_info['redir']) && !empty($contr_Motel_Live_Data->NM_ajax_info['redir']))
         {
            Motel_Live_Data_pack_ajax_redir($aResp);
         }
         if (isset($contr_Motel_Live_Data->NM_ajax_info['redirExit']) && !empty($contr_Motel_Live_Data->NM_ajax_info['redirExit']))
         {
            Motel_Live_Data_pack_ajax_redir_exit($aResp);
         }
         if (isset($contr_Motel_Live_Data->NM_ajax_info['blockDisplay']) && !empty($contr_Motel_Live_Data->NM_ajax_info['blockDisplay']))
         {
            Motel_Live_Data_pack_ajax_block_display($aResp);
         }
         if (isset($contr_Motel_Live_Data->NM_ajax_info['fieldDisplay']) && !empty($contr_Motel_Live_Data->NM_ajax_info['fieldDisplay']))
         {
            Motel_Live_Data_pack_ajax_field_display($aResp);
         }
         if (isset($contr_Motel_Live_Data->NM_ajax_info['buttonDisplay']) && !empty($contr_Motel_Live_Data->NM_ajax_info['buttonDisplay']))
         {
            $contr_Motel_Live_Data->NM_ajax_info['buttonDisplay'] = $contr_Motel_Live_Data->nmgp_botoes;
            Motel_Live_Data_pack_ajax_button_display($aResp);
         }
         if (isset($contr_Motel_Live_Data->NM_ajax_info['fieldLabel']) && !empty($contr_Motel_Live_Data->NM_ajax_info['fieldLabel']))
         {
            Motel_Live_Data_pack_ajax_field_label($aResp);
         }
         if (isset($contr_Motel_Live_Data->NM_ajax_info['readOnly']) && !empty($contr_Motel_Live_Data->NM_ajax_info['readOnly']))
         {
            Motel_Live_Data_pack_ajax_readonly($aResp);
         }
         if (isset($contr_Motel_Live_Data->NM_ajax_info['navStatus']) && !empty($contr_Motel_Live_Data->NM_ajax_info['navStatus']))
         {
            Motel_Live_Data_pack_ajax_nav_status($aResp);
         }
         if (isset($contr_Motel_Live_Data->NM_ajax_info['navSummary']) && !empty($contr_Motel_Live_Data->NM_ajax_info['navSummary']))
         {
            Motel_Live_Data_pack_ajax_nav_Summary($aResp);
         }
         if (isset($contr_Motel_Live_Data->NM_ajax_info['navPage']))
         {
            Motel_Live_Data_pack_ajax_navPage($aResp);
         }
         if (isset($contr_Motel_Live_Data->NM_ajax_info['btnVars']) && !empty($contr_Motel_Live_Data->NM_ajax_info['btnVars']))
         {
            Motel_Live_Data_pack_ajax_btn_vars($aResp);
         }
         if (isset($contr_Motel_Live_Data->NM_ajax_info['quickSearchRes']) && $contr_Motel_Live_Data->NM_ajax_info['quickSearchRes'])
         {
            $aResp['quickSearchRes'] = 'Y';
         }
         else
         {
            $aResp['quickSearchRes'] = 'N';
         }
         $aResp['htmOutput'] = '';
    
         if (isset($contr_Motel_Live_Data->NM_ajax_info['param']['buffer_output']) && $contr_Motel_Live_Data->NM_ajax_info['param']['buffer_output'])
         {
            $aResp['htmOutput'] = ob_get_contents();
            if (false === $aResp['htmOutput'])
            {
               $aResp['htmOutput'] = '';
            }
            else
            {
               $aResp['htmOutput'] = Motel_Live_Data_pack_protect_string(NM_charset_to_utf8($aResp['htmOutput']));
               ob_end_clean();
            }
         }
      }
      if (is_array($aResp))
      {
          $oJson = new Services_JSON();
          echo "var res = " . trim(sajax_get_js_repr($oJson->encode($aResp))) . "; res;";
      }
      else
      {
          echo "var res = " . trim(sajax_get_js_repr($aResp)) . "; res;";
      }
      exit;
   } // Motel_Live_Data_pack_ajax_response

   function Motel_Live_Data_pack_calendar_reload(&$aResp)
   {
      global $contr_Motel_Live_Data;
      $aResp['calendarReload'] = 'OK';
   } // Motel_Live_Data_pack_calendar_reload

   function Motel_Live_Data_pack_ajax_errors(&$aResp)
   {
      global $contr_Motel_Live_Data;
      $aResp['errList'] = array();
      foreach ($contr_Motel_Live_Data->NM_ajax_info['errList'] as $sField => $aMsg)
      {
         if ('geral_Motel_Live_Data' == $sField)
         {
             $aMsg = Motel_Live_Data_pack_ajax_remove_erros($aMsg);
         }
         foreach ($aMsg as $sMsg)
         {
            $iNumLinha = (isset($contr_Motel_Live_Data->NM_ajax_info['param']['nmgp_refresh_row']) && 'geral_Motel_Live_Data' != $sField)
                       ? $contr_Motel_Live_Data->NM_ajax_info['param']['nmgp_refresh_row'] : "";
            $aResp['errList'][] = array('fldName'  => $sField,
                                        'msgText'  => Motel_Live_Data_pack_protect_string(NM_charset_to_utf8($sMsg)),
                                        'numLinha' => $iNumLinha);
         }
      }
   } // Motel_Live_Data_pack_ajax_errors

   function Motel_Live_Data_pack_ajax_remove_erros($aErrors)
   {
       $aNewErrors = array();
       if (!empty($aErrors))
       {
           $sErrorMsgs = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), implode('<br />', $aErrors));
           $aErrorMsgs = explode('<BR>', $sErrorMsgs);
           foreach ($aErrorMsgs as $sErrorMsg)
           {
               $sErrorMsg = trim($sErrorMsg);
               if ('' != $sErrorMsg && !in_array($sErrorMsg, $aNewErrors))
               {
                   $aNewErrors[] = $sErrorMsg;
               }
           }
       }
       return $aNewErrors;
   } // Motel_Live_Data_pack_ajax_remove_erros

   function Motel_Live_Data_pack_ajax_ok(&$aResp)
   {
      global $contr_Motel_Live_Data;
      $iNumLinha = (isset($contr_Motel_Live_Data->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $contr_Motel_Live_Data->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      $aResp['msgDisplay'] = array('msgText'  => Motel_Live_Data_pack_protect_string($contr_Motel_Live_Data->NM_ajax_info['msgDisplay']),
                                   'numLinha' => $iNumLinha);
   } // Motel_Live_Data_pack_ajax_ok

   function Motel_Live_Data_pack_ajax_set_fields(&$aResp)
   {
      global $contr_Motel_Live_Data;
      $iNumLinha = (isset($contr_Motel_Live_Data->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $contr_Motel_Live_Data->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      if ('' != $contr_Motel_Live_Data->NM_ajax_info['rsSize'])
      {
         $aResp['rsSize'] = $contr_Motel_Live_Data->NM_ajax_info['rsSize'];
      }
      $aResp['fldList'] = array();
      foreach ($contr_Motel_Live_Data->NM_ajax_info['fldList'] as $sField => $aData)
      {
         $aField = array();
         if (isset($aData['colNum']))
         {
            $aField['colNum'] = $aData['colNum'];
         }
         if (isset($aData['row']))
         {
            $aField['row'] = $aData['row'];
         }
         if (isset($aData['imgFile']))
         {
            $aField['imgFile'] = Motel_Live_Data_pack_protect_string($aData['imgFile']);
         }
         if (isset($aData['imgOrig']))
         {
            $aField['imgOrig'] = Motel_Live_Data_pack_protect_string($aData['imgOrig']);
         }
         if (isset($aData['imgLink']))
         {
            $aField['imgLink'] = Motel_Live_Data_pack_protect_string($aData['imgLink']);
         }
         if (isset($aData['keepImg']))
         {
            $aField['keepImg'] = $aData['keepImg'];
         }
         if (isset($aData['docLink']))
         {
            $aField['docLink'] = Motel_Live_Data_pack_protect_string($aData['docLink']);
         }
         if (isset($aData['docIcon']))
         {
            $aField['docIcon'] = Motel_Live_Data_pack_protect_string($aData['docIcon']);
         }
         if (isset($aData['keyVal']))
         {
            $aField['keyVal'] = $aData['keyVal'];
         }
         if (isset($aData['optComp']))
         {
            $aField['optComp'] = $aData['optComp'];
         }
         if (isset($aData['optClass']))
         {
            $aField['optClass'] = $aData['optClass'];
         }
         if (isset($aData['optMulti']))
         {
            $aField['optMulti'] = $aData['optMulti'];
         }
         if (isset($aData['lookupCons']))
         {
            $aField['lookupCons'] = $aData['lookupCons'];
         }
         if (isset($aData['imgHtml']))
         {
            $aField['imgHtml'] = Motel_Live_Data_pack_protect_string($aData['imgHtml']);
         }
         if (isset($aData['mulHtml']))
         {
            $aField['mulHtml'] = Motel_Live_Data_pack_protect_string($aData['mulHtml']);
         }
         if (isset($aData['updInnerHtml']))
         {
            $aField['updInnerHtml'] = $aData['updInnerHtml'];
         }
         if (isset($aData['htmComp']))
         {
            $aField['htmComp'] = str_replace("'", '__AS__', str_replace('"', '__AD__', $aData['htmComp']));
         }
         $aField['fldName']  = $sField;
         $aField['fldType']  = $aData['type'];
         $aField['numLinha'] = $iNumLinha;
         $aField['valList']  = array();
         foreach ($aData['valList'] as $iIndex => $sValue)
         {
            $aValue = array();
            if (isset($aData['labList'][$iIndex]))
            {
               $aValue['label'] = Motel_Live_Data_pack_protect_string($aData['labList'][$iIndex]);
            }
            $aValue['value']     = ('_autocomp' != substr($sField, -9)) ? Motel_Live_Data_pack_protect_string($sValue) : $sValue;
            $aField['valList'][] = $aValue;
         }
         foreach ($aField['valList'] as $iIndex => $aFieldData)
         {
             if ("null" == $aFieldData['value'])
             {
                 $aField['valList'][$iIndex]['value'] = '';
             }
         }
         if (isset($aData['optList']) && false !== $aData['optList'])
         {
            if (is_array($aData['optList']))
            {
               $aField['optList'] = array();
               foreach ($aData['optList'] as $aOptList)
               {
                  foreach ($aOptList as $sValue => $sLabel)
                  {
                     $sOpt = ($sValue !== $sLabel) ? $sValue : $sLabel;
                     $aField['optList'][] = array('value' => Motel_Live_Data_pack_protect_string($sOpt),
                                                  'label' => Motel_Live_Data_pack_protect_string($sLabel));
                  }
               }
            }
            else
            {
               $aField['optList'] = $aData['optList'];
            }
         }
         $aResp['fldList'][] = $aField;
      }
   } // Motel_Live_Data_pack_ajax_set_fields

   function Motel_Live_Data_pack_ajax_redir(&$aResp)
   {
      global $contr_Motel_Live_Data;
      $aInfo              = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session', 'h_modal', 'w_modal');
      $aResp['redirInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($contr_Motel_Live_Data->NM_ajax_info['redir'][$sTag]))
         {
            $aResp['redirInfo'][$sTag] = $contr_Motel_Live_Data->NM_ajax_info['redir'][$sTag];
         }
      }
   } // Motel_Live_Data_pack_ajax_redir

   function Motel_Live_Data_pack_ajax_redir_exit(&$aResp)
   {
      global $contr_Motel_Live_Data;
      $aInfo                  = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session');
      $aResp['redirExitInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($contr_Motel_Live_Data->NM_ajax_info['redirExit'][$sTag]))
         {
            $aResp['redirExitInfo'][$sTag] = $contr_Motel_Live_Data->NM_ajax_info['redirExit'][$sTag];
         }
      }
   } // Motel_Live_Data_pack_ajax_redir_exit

   function Motel_Live_Data_pack_master_value(&$aResp)
   {
      global $contr_Motel_Live_Data;
      foreach ($contr_Motel_Live_Data->NM_ajax_info['masterValue'] as $sIndex => $sValue)
      {
         $aResp['masterValue'][] = array('index' => $sIndex,
                                         'value' => $sValue);
      }
   } // Motel_Live_Data_pack_master_value

   function Motel_Live_Data_pack_ajax_alert(&$aResp)
   {
      global $contr_Motel_Live_Data;
      $aResp['ajaxAlert'] = array('message' => $contr_Motel_Live_Data->NM_ajax_info['ajaxAlert']['message']);
   } // Motel_Live_Data_pack_ajax_alert

   function Motel_Live_Data_pack_ajax_message(&$aResp)
   {
      global $contr_Motel_Live_Data;
      $aResp['ajaxMessage'] = array('message'      => Motel_Live_Data_pack_protect_string($contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['message']),
                                    'title'        => Motel_Live_Data_pack_protect_string($contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['title']),
                                    'modal'        => isset($contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['modal'])        ? $contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['modal']        : 'N',
                                    'timeout'      => isset($contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['timeout'])      ? $contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['timeout']      : '',
                                    'button'       => isset($contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['button'])       ? $contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['button']       : '',
                                    'button_label' => isset($contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['button_label']) ? $contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['button_label'] : 'Ok',
                                    'top'          => isset($contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['top'])          ? $contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['top']          : '',
                                    'left'         => isset($contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['left'])         ? $contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['left']         : '',
                                    'width'        => isset($contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['width'])        ? $contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['width']        : '',
                                    'height'       => isset($contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['height'])       ? $contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['height']       : '',
                                    'redir'        => isset($contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['redir'])        ? $contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['redir']        : '',
                                    'show_close'   => isset($contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['show_close'])   ? $contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['show_close']   : 'Y',
                                    'body_icon'    => isset($contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['body_icon'])    ? $contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['body_icon']    : 'Y',
                                    'redir_target' => isset($contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['redir_target']) ? $contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['redir_target'] : '',
                                    'redir_par'    => isset($contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['redir_par'])    ? $contr_Motel_Live_Data->NM_ajax_info['ajaxMessage']['redir_par']    : '');
   } // Motel_Live_Data_pack_ajax_message

   function Motel_Live_Data_pack_ajax_javascript(&$aResp)
   {
      global $contr_Motel_Live_Data;
      foreach ($contr_Motel_Live_Data->NM_ajax_info['ajaxJavascript'] as $aJsFunc)
      {
         $aResp['ajaxJavascript'][] = $aJsFunc;
      }
   } // Motel_Live_Data_pack_ajax_javascript

   function Motel_Live_Data_pack_ajax_block_display(&$aResp)
   {
      global $contr_Motel_Live_Data;
      $aResp['blockDisplay'] = array();
      foreach ($contr_Motel_Live_Data->NM_ajax_info['blockDisplay'] as $sBlockName => $sBlockStatus)
      {
        $aResp['blockDisplay'][] = array($sBlockName, $sBlockStatus);
      }
   } // Motel_Live_Data_pack_ajax_block_display

   function Motel_Live_Data_pack_ajax_field_display(&$aResp)
   {
      global $contr_Motel_Live_Data;
      $aResp['fieldDisplay'] = array();
      foreach ($contr_Motel_Live_Data->NM_ajax_info['fieldDisplay'] as $sFieldName => $sFieldStatus)
      {
        $aResp['fieldDisplay'][] = array($sFieldName, $sFieldStatus);
      }
   } // Motel_Live_Data_pack_ajax_field_display

   function Motel_Live_Data_pack_ajax_button_display(&$aResp)
   {
      global $contr_Motel_Live_Data;
      $aResp['buttonDisplay'] = array();
      foreach ($contr_Motel_Live_Data->NM_ajax_info['buttonDisplay'] as $sButtonName => $sButtonStatus)
      {
        $aResp['buttonDisplay'][] = array($sButtonName, $sButtonStatus);
      }
   } // Motel_Live_Data_pack_ajax_button_display

   function Motel_Live_Data_pack_ajax_field_label(&$aResp)
   {
      global $contr_Motel_Live_Data;
      $aResp['fieldLabel'] = array();
      foreach ($contr_Motel_Live_Data->NM_ajax_info['fieldLabel'] as $sFieldName => $sFieldLabel)
      {
        $aResp['fieldLabel'][] = array($sFieldName, Motel_Live_Data_pack_protect_string($sFieldLabel));
      }
   } // Motel_Live_Data_pack_ajax_field_label

   function Motel_Live_Data_pack_ajax_readonly(&$aResp)
   {
      global $contr_Motel_Live_Data;
      $aResp['readOnly'] = array();
      foreach ($contr_Motel_Live_Data->NM_ajax_info['readOnly'] as $sFieldName => $sFieldStatus)
      {
        $aResp['readOnly'][] = array($sFieldName, $sFieldStatus);
      }
   } // Motel_Live_Data_pack_ajax_readonly

   function Motel_Live_Data_pack_ajax_nav_status(&$aResp)
   {
      global $contr_Motel_Live_Data;
      $aResp['navStatus'] = array();
      if (isset($contr_Motel_Live_Data->NM_ajax_info['navStatus']['ret']) && '' != $contr_Motel_Live_Data->NM_ajax_info['navStatus']['ret'])
      {
         $aResp['navStatus']['ret'] = $contr_Motel_Live_Data->NM_ajax_info['navStatus']['ret'];
      }
      if (isset($contr_Motel_Live_Data->NM_ajax_info['navStatus']['ava']) && '' != $contr_Motel_Live_Data->NM_ajax_info['navStatus']['ava'])
      {
         $aResp['navStatus']['ava'] = $contr_Motel_Live_Data->NM_ajax_info['navStatus']['ava'];
      }
   } // Motel_Live_Data_pack_ajax_nav_status

   function Motel_Live_Data_pack_ajax_nav_Summary(&$aResp)
   {
      global $contr_Motel_Live_Data;
      $aResp['navSummary'] = array();
      $aResp['navSummary']['reg_ini'] = $contr_Motel_Live_Data->NM_ajax_info['navSummary']['reg_ini'];
      $aResp['navSummary']['reg_qtd'] = $contr_Motel_Live_Data->NM_ajax_info['navSummary']['reg_qtd'];
      $aResp['navSummary']['reg_tot'] = $contr_Motel_Live_Data->NM_ajax_info['navSummary']['reg_tot'];
   } // Motel_Live_Data_pack_ajax_nav_Summary

   function Motel_Live_Data_pack_ajax_navPage(&$aResp)
   {
      global $contr_Motel_Live_Data;
      $aResp['navPage'] = $contr_Motel_Live_Data->NM_ajax_info['navPage'];
   } // Motel_Live_Data_pack_ajax_navPage


   function Motel_Live_Data_pack_ajax_btn_vars(&$aResp)
   {
      global $contr_Motel_Live_Data;
      $aResp['btnVars'] = array();
      foreach ($contr_Motel_Live_Data->NM_ajax_info['btnVars'] as $sBtnName => $sBtnValue)
      {
        $aResp['btnVars'][] = array($sBtnName, Motel_Live_Data_pack_protect_string($sBtnValue));
      }
   } // Motel_Live_Data_pack_ajax_btn_vars

   function Motel_Live_Data_pack_protect_string($sString)
   {
      $sString = (string) $sString;

      if (!empty($sString))
      {
         if (function_exists('NM_is_utf8') && NM_is_utf8($sString))
         {
             return $sString;
         }
         else
         {
             return htmlentities($sString);
         }
      }
      elseif ('0' === $sString || 0 === $sString)
      {
         return '0';
      }
      else
      {
         return '';
      }
   } // Motel_Live_Data_pack_protect_string
?>
