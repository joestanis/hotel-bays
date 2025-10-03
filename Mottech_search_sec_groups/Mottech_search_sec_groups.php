<?php
   include_once('Mottech_search_sec_groups_session.php');
   @session_start() ;
   $_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_perfil']          = "conn_mssql";
   $_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_path_prod']       = "";
   $_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_path_conf']       = "";
   $_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_path_imagens']    = "";
   $_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_path_imag_temp']  = "";
   $_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_path_doc']        = "";
//
class Mottech_search_sec_groups_ini
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
      $_SESSION['sc_session'][$this->sc_page]['Mottech_search_sec_groups']['decimal_db'] = "."; 

      $this->nm_cod_apl      = "Mottech_search_sec_groups"; 
      $this->nm_nome_apl     = "Search Groups"; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "Mottech"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "admin"; 
      $this->nm_versao_sc    = "v7"; 
      $this->nm_tp_lic_sc    = "ep_bronze"; 
      $this->nm_dt_criacao   = "20130118"; 
      $this->nm_hr_criacao   = "114537"; 
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
      if(empty($_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_path_prod']))
      {
              /*check prod*/$_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
      }
      //check img
      if(empty($_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_path_imagens']))
      {
              /*check img*/$_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
      }
      //check tmp
      if(empty($_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_path_imag_temp']))
      {
              /*check tmp*/$_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
      }
      //check doc
      if(empty($_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_path_doc']))
      {
              /*check doc*/$_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
      }
      //end check publication with the prod
      $this->sc_site_ssl     = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? true : false;
      $this->sc_protocolo    = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->sc_protocolo    = "";
      $this->path_prod       = $_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_path_prod'];
      $this->path_conf       = $_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_path_conf'];
      $this->path_imagens    = $_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_path_imag_temp'];
      $this->path_doc        = $_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_path_doc'];
      $this->str_lang        = (isset($_SESSION['sc_session'][$this->sc_page]['Mottech_search_sec_groups']['str_lang']) && !empty($_SESSION['sc_session'][$this->sc_page]['Mottech_search_sec_groups']['str_lang'])) ? $_SESSION['sc_session'][$this->sc_page]['Mottech_search_sec_groups']['str_lang'] : "en_us";
      $this->str_conf_reg    = (isset($_SESSION['sc_session'][$this->sc_page]['Mottech_search_sec_groups']['str_conf_reg']) && !empty($_SESSION['sc_session'][$this->sc_page]['Mottech_search_sec_groups']['str_conf_reg'])) ? $_SESSION['sc_session'][$this->sc_page]['Mottech_search_sec_groups']['str_conf_reg'] : "en_us";
      $this->str_schema_filter = (isset($_SESSION['sc_session'][$this->sc_page]['Mottech_search_sec_groups']['str_schema_all']) && !empty($_SESSION['sc_session'][$this->sc_page]['Mottech_search_sec_groups']['str_schema_all'])) ? $_SESSION['sc_session'][$this->sc_page]['Mottech_search_sec_groups']['str_schema_all'] : "ScriptCase6_Blue/ScriptCase6_Blue";
      $_SESSION['scriptcase']['erro']['str_schema'] = $this->str_schema_filter . "_error.css";
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
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/Mottech_search_sec_groups';
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
          include_once("Mottech_search_sec_groups_json.php");
      }
      $this->SC_Link_View = (isset($_SESSION['sc_session'][$this->sc_page]['Mottech_search_sec_groups']['SC_Link_View'])) ? $_SESSION['sc_session'][$this->sc_page]['Mottech_search_sec_groups']['SC_Link_View'] : false;
      if (isset($_GET['SC_Link_View']) && !empty($_GET['SC_Link_View']) && is_numeric($_GET['SC_Link_View']))
      {
          if ($_SESSION['sc_session'][$this->sc_page]['Mottech_search_sec_groups']['embutida'])
          {
              $this->SC_Link_View = true;
              $_SESSION['sc_session'][$this->sc_page]['Mottech_search_sec_groups']['SC_Link_View'] = true;
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
      if ($Tp_init == "Path_sub")
      {
          return;
      }
      $str_path = substr($this->path_prod, 0, strrpos($this->path_prod, '/') + 1);
      if (!is_file($this->root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
      {
          unset($_SESSION['scriptcase']['nm_sc_retorno']);
          unset($_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_conexao']);
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
      $_SESSION['sc_session'][$this->sc_page]['Mottech_search_sec_groups']['path_doc'] = $this->path_doc; 
      $_SESSION['scriptcase']['nm_path_prod'] = $this->root . $this->path_prod . "/"; 
      if (empty($this->path_imag_cab))
      {
          $this->path_imag_cab = $this->path_img_global;
      }
      if (!is_dir($this->root . $this->path_prod))
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_default { font-family: Arial, sans-serif; font-size: 11px; color: #555555; font-weight: bold; border-style: solid; border-width: 1px; padding: 3px 14px; background-image: url(../../img/scriptcase__NM__space_blue.jpg); }";
          echo ".scButton_disabled { font-family: Arial, sans-serif; font-size: 11px; color: #666666; font-weight: bold; border-style: solid; border-width: 1px; padding: 3px 14px; background-image: url(../../img/scriptcase__NM__btn_blueocean_off.png); }";
          echo ".scButton_onmousedown { font-family: Arial, sans-serif; font-size: 11px; color: #666666; font-weight: bold; border-style: solid; border-width: 1px; padding: 3px 14px; background-image: url(../../img/scriptcase__NM__space_blue.jpg); }";
          echo ".scButton_onmouseover { font-family: Arial, sans-serif; font-size: 11px; color: #555555; font-weight: bold; border-style: solid; border-width: 1px; padding: 3px 14px; background-image: url(../../img/scriptcase__NM__space_blue.jpg); }";
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
          if (!$_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['sc_outra_jan'])) 
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

// 
      include_once($this->path_aplicacao . "Mottech_search_sec_groups_erro.class.php"); 
      $this->Erro = new Mottech_search_sec_groups_erro();
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
      $_SESSION['sc_session'][$this->sc_page]['Mottech_search_sec_groups']['seq_dir'] = 0; 
      $_SESSION['sc_session'][$this->sc_page]['Mottech_search_sec_groups']['sub_dir'] = array(); 
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1DcBwZSFUDSN7D5XGDMzGVcB/DWF/HMJeHQNwZ1B/D1rwV5JsHgrKDkBsV5FqHIJsD9XsZ9JeD1BeD5F7DMvmVcBUDWJeHMBiD9BsVIraD1rwV5X7HgBeHEFiH5F/HMXGHQXsDQJwD1BeD5rqDMrYDkB/H5XCHIX7HQXGH9BqHIveHuBqHgBYHENiDuFaHINUDcBwH9FUHAveHuFaHuNOZSrCH5FqDoXGHQJmZ1F7HArYD5BqDMNKZSXeDWr/DoJeD9XsZSX7Z1N7VWFaHgrKV9FeDWXCDoJsDcBwH9B/Z1rYHQJwHgvCZSJ3V5FqDoB/D9NmDQJwD1veD5JwHgvsDkBODur/VoJwD9XOH9B/HArYD5NUDErKVkXeH5FYVoJeDcXOZSFGD1BeD5JwHgvsDkB/V5X7DoF7D9XOZSB/Z1BeZMFaDErKHEBUH5X/VoBiD9NwDQJsHIrKV5JeDMvmVcFKV5BmVoBqD9BsZkFGHArKHQXGHgveDkB/H5FYHINUHQNmZSFGHAN7D5JeHuzGDkB/HEF/DoJeHQBsZ1FaHArKHuXGDErKVkJ3DWF/VoBiDcJUZSX7Z1BYHuFaDMBYV9BUHEF/HIX7HQBiZSBqHANOHQX7HgBODkFeV5FqHIFUHQXOH9BiHArYHuJeDMzGZSJ3V5FYHMF7HQBsVINUD1zGZMBODMveHEFKV5B7ZuBOHQNwZ9F7D1veHQBODMvmZSrCH5FqDoJeD9JmZ1B/D1NaD5rqHgrKHErsHEB3ZuB/DcXGDQFaHIrKHuF7DMBYV9FiV5FYHIX7DcFYVIJsHIveHuX7DMvCHAFKV5B7ZuJeHQJeDQFaHArYHQB/DMBYVcFiV5X/VEX7HQBsZ1X7D1NaZMJeDMveHAFKH5FYVoX7D9JKDQX7D1BOV5FGDMzGV9BUHEF/HIFUHQNwH9BODSvOZMBqHgveDkFeV5FqHMJsHQNmDQB/HAvCV5BqDMBYZSrCV5FYHMFaHQNwZ1X7HANOD5JwHgNKHEFKV5B7ZuB/HQJKH9BiHANOHuNUDMvOZSJ3H5FqDoJeD9JmZ1B/D1NaD5rqDErKZSXeH5FYDoFUD9NwDQJsHArYVWJsHuvmVcXKV5X7HMXGHQBqVIraZ1BeHuJwDErKVkXeV5FaVoBqD9NwH9X7HArYD5F7HgNKVcFeDWF/DoFGD9BsZ1F7HArYD5JeHgvCZSJ3V5XCVoB/D9NmDQFaZ1BYV5FUHuvmDkBOH5XKVoraD9BiVINUHIBOV5FUHgveHAFKV5FaZuBqD9NmZSFGHIrwV5BOHuNODkBOV5X7VENUHQFYH9FaD1rwD5rqDErKVkXeHEFqDoBOD9NmDQJsD1BeV5FUHuzGDkBOH5XKVoraDcBwH9B/HIrwV5JeDMBYDkBsH5FYDoXGDcJeZSFUZ1rwD5BOHuNODkFCH5FqVENUDcNwH9BOHIBeHQrqHgvsDkFeV5FqHIBiDcXGDuBqD1BeHQBqDMrYVcXKDWFYHIF7DcFYZ1FGD1NaZMB/HgBYHArCDWF/VoBiDcJUZSX7Z1BYHuFaDMvOZSNiDWB3VoF7HQNwZ1BiHAvsZMB/HgveHErsDuJeHIJsD9XsZ9JeD1BeD5F7DMvmVcFKDur/DoBiHQNmH9BOHArKHQFaHgBYHArsDWXCDoJeHQJKH9X7HArYHQJwDMBYVcFeDuFqHMBiD9BsVIraD1rwV5X7HgBeHEFiDWFqVoFaD9NmZSX7HArYV5BOHgrKVcFiDWXCDoJsDcBqZ1FaHANOD5NUDErKVkJGDWr/DoB/HQJKDQJsZ1vCV5FGHuNOV9FeDWB3VEF7HQFYVINUHAvsZMNU";
      ob_start();
      $this->prep_conect();
      if (isset($_SESSION['sc_session'][$this->sc_page]['Mottech_search_sec_groups']['initialize']) && $_SESSION['sc_session'][$this->sc_page]['Mottech_search_sec_groups']['initialize'])  
      { 
          $_SESSION['sc_session'][$this->sc_page]['Mottech_search_sec_groups']['Gera_log_access'] = true;
          $_SESSION['sc_session'][$this->sc_page]['Mottech_search_sec_groups']['initialize']      = false;
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
          if (!$_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
                  echo "<a href='" . $_SESSION['scriptcase']['nm_sc_retorno'] . "' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_ScriptCase6_BlueOcean_bvoltar.gif' title='" . $this->Nm_lang['lang_btns_rtrn_scrp_hint'] . "' align=absmiddle></a> \n" ; 
              } 
              else 
              { 
                  echo "<a href='$nm_url_saida' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_ScriptCase6_BlueOcean_bsair.gif' title='" . $this->Nm_lang['lang_btns_exit_appl_hint'] . "' align=absmiddle></a> \n" ; 
              } 
          } 
          exit ;
      } 
      $this->Ajax_result_set = ob_get_contents();
      ob_end_clean();
      if (empty($this->nm_tabela))
      {
          $this->nm_tabela = "dbo.Motel_groups"; 
      }
   }
   function prep_conect()
   {
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_conexao']) && $_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_perfil']) && $_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      $con_devel             = (isset($_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_conexao']))
      {
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'Mottech', 2); 
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_perfil'];
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
      if (!isset($_SESSION['sc_session'][$this->sc_page]['Mottech_search_sec_groups']['embutida_init']) || !$_SESSION['sc_session'][$this->sc_page]['Mottech_search_sec_groups']['embutida_init']) 
      {
      }
// 
      if (isset($_SESSION['scriptcase']['glo_decimal_db']) && !empty($_SESSION['scriptcase']['glo_decimal_db']))
      {
         $_SESSION['sc_session'][$this->sc_page]['Mottech_search_sec_groups']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
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
          echo ".scButton_default { font-family: Arial, sans-serif; font-size: 11px; color: #555555; font-weight: bold; border-style: solid; border-width: 1px; padding: 3px 14px; background-image: url(../../img/scriptcase__NM__space_blue.jpg); }";
          echo ".scButton_disabled { font-family: Arial, sans-serif; font-size: 11px; color: #666666; font-weight: bold; border-style: solid; border-width: 1px; padding: 3px 14px; background-image: url(../../img/scriptcase__NM__btn_blueocean_off.png); }";
          echo ".scButton_onmousedown { font-family: Arial, sans-serif; font-size: 11px; color: #666666; font-weight: bold; border-style: solid; border-width: 1px; padding: 3px 14px; background-image: url(../../img/scriptcase__NM__space_blue.jpg); }";
          echo ".scButton_onmouseover { font-family: Arial, sans-serif; font-size: 11px; color: #555555; font-weight: bold; border-style: solid; border-width: 1px; padding: 3px 14px; background-image: url(../../img/scriptcase__NM__space_blue.jpg); }";
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
          if (!$_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['sc_outra_jan'])) 
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
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_conexao'], $this->root . $this->path_prod, 'Mottech'); 
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
          $_SESSION['sc_session'][$this->sc_page]['Mottech_search_sec_groups']['decimal_db'] = "."; 
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
           $comando = "INSERT INTO Motel_log (inserted_date, username, application, creator, ip_user, `action`, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'Mottech_search_sec_groups', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       elseif (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->nm_bases_sqlite))
       { 
           $comando = "INSERT INTO Motel_log (id, inserted_date, username, application, creator, ip_user, action, description) VALUES (NULL, $dt, " . $this->Db->qstr($usr) . ", 'Mottech_search_sec_groups', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       else
       { 
           $comando = "INSERT INTO Motel_log (inserted_date, username, application, creator, ip_user, action, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'Mottech_search_sec_groups', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
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
class Mottech_search_sec_groups_apl
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
//
//----- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini = $this->Ini;
      $this->$modulo->Db = $this->Db;
      $this->$modulo->Erro = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }
//
//----- 
   function controle()
   {
      global $nm_saida, $nm_url_saida, $script_case_init, $nm_apl_dependente, 
      $glo_senha_protect, $nmgp_opcao, $nm_call_php, $NM_run_iframe;

      $_SESSION['scriptcase']['sc_ctl_ajax'] = 'part';
      $this->Ini = new Mottech_search_sec_groups_ini(); 
      $this->Ini->init();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "Mottech_search_sec_groups.php"; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['Mottech_search_sec_groups']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['Mottech_search_sec_groups']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['Mottech_search_sec_groups']['exit'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";

      if (!class_exists("Services_JSON"))
      {
          include_once("Mottech_search_sec_groups_json.php");
      }
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      nm_gc($this->Ini->path_libs);
      $this->nm_data = new nm_data("en_us");
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
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['Mottech_search_sec_groups']['glo_nm_conexao'], $this->Ini->root . $this->Ini->path_prod, 'Mottech'); 
      } 
      else 
      { 
          $this->Db = db_conect($this->Ini->nm_tpbanco, $this->Ini->nm_servidor, $this->Ini->nm_usuario, $this->Ini->nm_senha, $this->Ini->nm_banco, $glo_senha_protect, "S", $this->Ini->nm_con_persistente, $this->Ini->nm_con_db2, $this->Ini->nm_database_encoding); 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      {
          if (function_exists('ibase_timefmt'))
          {
              ibase_timefmt('%Y-%m-%d %H:%M:%S');
          } 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $this->Db->Execute("set dateformat ymd");
          $this->Db->fetchMode = ADODB_FETCH_BOTH;
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      {
          $this->Db->Execute("set dateformat ymd");
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      {
          $this->Db->Execute("alter session set nls_date_format = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_numeric_characters = '.,'");
          $_SESSION['sc_session'][$this->Ini->sc_page]['Mottech_search_sec_groups']['decimal_db'] = "."; 
      } 
      include_once($this->Ini->path_aplicacao . "Mottech_search_sec_groups_erro.class.php"); 
      $this->Erro      = new Mottech_search_sec_groups_erro();
      $this->Erro->Ini = $this->Ini;
//
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['Mottech_search_sec_groups']['Gera_log_access'])
      {
          $this->Ini->NM_gera_log_insert("Scriptcase", "access");
          $_SESSION['sc_session'][$this->Ini->sc_page]['Mottech_search_sec_groups']['Gera_log_access'] = false;
      }
      require_once($this->Ini->path_aplicacao . "Mottech_search_sec_groups_pesq.class.php"); 
      $this->pesq  = new Mottech_search_sec_groups_pesq();
      $this->prep_modulos("pesq");
      $this->pesq->NM_ajax_flag    = $this->NM_ajax_flag;
      $this->pesq->NM_ajax_opcao   = $this->NM_ajax_opcao;
      $this->pesq->NM_ajax_retorno = $this->NM_ajax_retorno;
      $this->pesq->NM_ajax_info    = $this->NM_ajax_info;
      $this->pesq->monta_busca();
//--- 
       $this->Db->Close(); 
   } 
} 
// 
//======= =========================
   if (!function_exists("NM_is_utf8"))
   {
       include_once("Mottech_search_sec_groups_nmutf8.php");
   }
   if (!function_exists("SC_dir_app_ini"))
   {
       include_once("../_lib/lib/php/nm_ctrl_app_name.php");
   }
   SC_dir_app_ini('Mottech');
   $_SESSION['scriptcase']['Mottech_search_sec_groups']['contr_erro'] = 'off';
   if (!empty($_POST))
   {
       foreach ($_POST as $nmgp_var => $nmgp_val)
       {
            nm_limpa_str_Mottech_search_sec_groups($nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }
   if (!empty($_GET))
   {
       foreach ($_GET as $nmgp_var => $nmgp_val)
       {
            nm_limpa_str_Mottech_search_sec_groups($nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }
   if (isset($group)) 
   {
       $_SESSION['group'] = $group;
   }

    if (isset($_POST['rs']) && strpos($_POST['rs'], '_ajax_') !== false && isset($_POST['rsargs']) && !empty($_POST['rsargs']))
    {
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
   if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
   {
       $script_case_init = "";
   }
   if (!isset($script_case_init) || empty($script_case_init))
   {
       $script_case_init = rand(2, 1000);
   }
   $salva_iframe = false;
   if (isset($_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['iframe_menu']))
   {
       $salva_iframe = $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['iframe_menu'];
       unset($_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['iframe_menu']);
   }
   if (isset($nm_run_menu) && $nm_run_menu == 1)
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
            $_SESSION['scriptcase']['sc_apl_menu_atual'] = "Mottech_search_sec_groups";
        }
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'Mottech_search_sec_groups' || $achou)
                {
                    unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                    if (!empty($_SESSION['sc_session'][$script_case_init][$nome_apl]))
                    {
                        $achou = true;
                    }
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
        $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['iframe_menu'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['iframe_menu'] = $salva_iframe;
   }

   if (!isset($_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['initialize']))
   {
       $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['initialize'] = true;
   }
   elseif (!isset($_SERVER['HTTP_REFERER']))
   {
       $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['initialize'] = false;
   }
   elseif (false === strpos($_SERVER['HTTP_REFERER'], '.php'))
   {
       $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['initialize'] = true;
   }
   else
   {
       $sReferer = substr($_SERVER['HTTP_REFERER'], 0, strpos($_SERVER['HTTP_REFERER'], '.php'));
       $sReferer = substr($sReferer, strrpos($sReferer, '/') + 1);
       if ('Mottech_search_sec_groups' == $sReferer || 'Mottech_search_sec_groups_' == substr($sReferer, 0, 26))
       {
           $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['initialize'] = false;
       }
       else
       {
           $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['initialize'] = true;
       }
   }

   $_POST['script_case_init'] = $script_case_init;
   if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'Mottech_search_sec_groups')
   {
       $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['sc_outra_jan'] = true;
        unset($_SESSION['scriptcase']['sc_outra_jan']);
   }
   $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['menu_desenv'] = false;   
   if (!defined("SC_ERROR_HANDLER"))
   {
       define("SC_ERROR_HANDLER", 1);
       include_once(dirname(__FILE__) . "/Mottech_search_sec_groups_erro.php");
   }
   $salva_tp_saida  = (isset($_SESSION['scriptcase']['sc_tp_saida']))  ? $_SESSION['scriptcase']['sc_tp_saida'] : "";
   $salva_url_saida = (isset($_SESSION['scriptcase']['sc_url_saida'][$script_case_init])) ? $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] : "";
   if ($nmgp_opcao != "formphp")
   { 
       if (!empty($nmgp_opcao))  
       { 
           $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['opcao'] = $nmgp_opcao ;  
       }   
       if (!empty($nmgp_parms)) 
       { 
           $nmgp_parms = str_replace("@aspass@", "'", $nmgp_parms);
           $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
           $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
           $todo = explode("?@?", $nmgp_parms);
           $ix = 0;
           while (!empty($todo[$ix]))
           {
                $cadapar = explode("?#?", $todo[$ix]);
                if (1 < sizeof($cadapar))
                {
                    nm_limpa_str_Mottech_search_sec_groups($cadapar[1]);
                    $$cadapar[0] = $cadapar[1];
                }
                $ix++;
           }
           if (isset($group)) 
           {
               nm_limpa_str_Mottech_search_sec_groups($group);
               $_SESSION['group'] = $group;
           }
       } 
       if (isset($_POST["group"])) 
       {
           $_SESSION["group"] = $_POST["group"];
           nm_limpa_str_Mottech_search_sec_groups($_SESSION["group"]);
       }
       if (isset($_GET["group"])) 
       {
           $_SESSION["group"] = $_GET["group"];
           nm_limpa_str_Mottech_search_sec_groups($_SESSION["group"]);
       }
       if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
       {
           $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['sc_outra_jan'] = true;
       }
       if ($nmgp_opcao == "change_lang_fil")  
       { 
           $nmgp_opcao  = "busca";  
           $Temp_lang = explode(";" , $nmgp_idioma);  
           if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))  
           { 
               $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['str_lang'] = $Temp_lang[0];
           } 
           if (isset($Temp_lang[1]) && !empty($Temp_lang[1])) 
           { 
               $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['str_conf_reg'] = $Temp_lang[1];
           } 
       } 
       if ($nmgp_opcao == "change_schema_fil")  
       { 
           $nmgp_opcao  = "busca";  
           $nmgp_schema = $nmgp_schema . "/" . $nmgp_schema;  
           $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['str_schema_all'] = $nmgp_schema;
           $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['num_css'] = rand(0, 1000);
       } 
       $nm_saida = "";
       if (isset($_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['volta_redirect_apl']) && !empty($_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['volta_redirect_apl']))
       {
           $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['volta_redirect_apl']; 
           $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['volta_redirect_tp']; 
           $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['volta_redirect_apl'] = "";
           $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['volta_redirect_tp'] = "";
           $nm_url_saida = "Mottech_search_sec_groups_fim.php"; 
       
       }
       elseif (substr($_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['opcao'], 0, 7) != "grafico" && $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['opcao'] != "pdf" ) 
       {
           if (isset($_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['sc_outra_jan'] == 'true')
           {
               $nm_url_saida = "Mottech_search_sec_groups_fim.php"; 
           }
           else
           {
               $nm_url_saida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ""; 
               $nm_url_saida = str_replace("_fim.php", ".php", $nm_url_saida);
               if (!empty($nmgp_url_saida)) 
               { 
                   $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['retorno_cons'] = $nmgp_url_saida ; 
               } 
               if (!empty($_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['retorno_cons'])) 
               { 
                   $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['retorno_cons']  . "?script_case_init=" . NM_encode_input($script_case_init);  
                   $nm_apl_dependente = 1 ; 
               } 
               if (!empty($nm_url_saida)) 
               { 
                   $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida ; 
               } 
               $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida; 
               $nm_url_saida = "Mottech_search_sec_groups_fim.php"; 
               $_SESSION['scriptcase']['sc_tp_saida'] = "P"; 
               if ($nm_apl_dependente == 1) 
               { 
                   $_SESSION['scriptcase']['sc_tp_saida'] = "D"; 
               } 
           } 
       }
// 
       if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && substr($_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['opcao'], 0, 7) != "grafico" && $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['opcao'] != "pdf" ) 
       { 
            $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['menu_desenv'] = true;   
       } 
       if (isset($_GET["nmgp_parms_ret"])) 
       {
           $todo = explode(",", $nmgp_parms_ret);
           $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['form_psq_ret']  = $todo[0];
           $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['campo_psq_ret'] = $todo[1];
           $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['dado_psq_ret']  = $todo[2];
           $_SESSION['scriptcase']['sc_tp_saida']  = $salva_tp_saida;
           $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $salva_url_saida;
           $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['opc_psq'] = true ;   
       } 
       $GLOBALS["NM_ERRO_IBASE"] = 0;  
       if (isset($_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['Mottech_search_sec_groups']['sc_outra_jan'])
       {
           $nm_apl_dependente = 0;
       }
       $contr_Mottech_search_sec_groups = new Mottech_search_sec_groups_apl();

       include_once(dirname(__FILE__) . '/Mottech_search_sec_groups_sajax.php');
       $sajax_request_type = "POST";
       sajax_init();
    //$sajax_debug_mode = 1;
       sajax_handle_client_request();

       if ('ajax_autocomp' == $nmgp_opcao)
       {
           $nmgp_opcao = '';
           $contr_Mottech_search_sec_groups->NM_ajax_flag = true;
           $contr_Mottech_search_sec_groups->NM_ajax_opcao = $NM_ajax_opcao;
       }

       $contr_Mottech_search_sec_groups->controle();
   } 
   if ($nmgp_opcao == "formphp")
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 0;  
       $contr_Mottech_search_sec_groups = new Mottech_search_sec_groups_apl();
       $contr_Mottech_search_sec_groups->controle();
   } 
//
   function nm_limpa_str_Mottech_search_sec_groups(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               foreach ($str as $x => $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }

    function Mottech_search_sec_groups_nm_return_ajax()
    {
        global $contr_Mottech_search_sec_groups;
        $contr_Mottech_search_sec_groups->NM_ajax_flag    = $contr_Mottech_search_sec_groups->pesq->NM_ajax_flag;
        $contr_Mottech_search_sec_groups->NM_ajax_opcao   = $contr_Mottech_search_sec_groups->pesq->NM_ajax_opcao;
        $contr_Mottech_search_sec_groups->NM_ajax_retorno = $contr_Mottech_search_sec_groups->pesq->NM_ajax_retorno;
        $contr_Mottech_search_sec_groups->NM_ajax_info    = $contr_Mottech_search_sec_groups->pesq->NM_ajax_info;
        Mottech_search_sec_groups_pack_ajax_response();
    }

   function Mottech_search_sec_groups_pack_ajax_response()
   {
      global $contr_Mottech_search_sec_groups;
      $aResp = array();
      if ($contr_Mottech_search_sec_groups->NM_ajax_info['calendarReload'])
      {
         $aResp['result'] = 'CALENDARRELOAD';
      }
      elseif ('' != $contr_Mottech_search_sec_groups->NM_ajax_info['autoComp'])
      {
         $aResp['result'] = 'AUTOCOMP';
      }
//mestre_detalhe
      elseif (!empty($contr_Mottech_search_sec_groups->NM_ajax_info['newline']))
      {
         $aResp['result'] = 'NEWLINE';
         ob_end_clean();
      }
      elseif (!empty($contr_Mottech_search_sec_groups->NM_ajax_info['tableRefresh']))
      {
         $aResp['result'] = 'TABLEREFRESH';
      }
//-----
      elseif (!empty($contr_Mottech_search_sec_groups->NM_ajax_info['errList']))
      {
         $aResp['result'] = 'ERROR';
      }
      elseif (!empty($contr_Mottech_search_sec_groups->NM_ajax_info['fldList']))
      {
         $aResp['result'] = 'SET';
      }
      else
      {
         $aResp['result'] = 'OK';
      }
      if ('AUTOCOMP' == $aResp['result'])
      {
         $aResp = $contr_Mottech_search_sec_groups->NM_ajax_info['autoComp'];
      }
//mestre_detalhe
      elseif ('NEWLINE' == $aResp['result'])
      {
         $aResp = $contr_Mottech_search_sec_groups->NM_ajax_info['newline'];
      }
      else
//-----
      {
         $aResp['ajaxRequest'] = $contr_Mottech_search_sec_groups->NM_ajax_opcao;
         if ('CALENDARRELOAD' == $aResp['result'])
         {
            Mottech_search_sec_groups_pack_calendar_reload($aResp);
         }
         elseif ('ERROR' == $aResp['result'])
         {
            Mottech_search_sec_groups_pack_ajax_errors($aResp);
         }
         elseif ('SET' == $aResp['result'])
         {
            Mottech_search_sec_groups_pack_ajax_set_fields($aResp);
         }
         elseif ('TABLEREFRESH' == $aResp['result'])
         {
            Mottech_search_sec_groups_pack_ajax_set_fields($aResp);
            $aResp['tableRefresh'] = Mottech_search_sec_groups_pack_protect_string($contr_Mottech_search_sec_groups->NM_ajax_info['tableRefresh']);
         }
         if ('OK' == $aResp['result'] || 'SET' == $aResp['result'])
         {
            Mottech_search_sec_groups_pack_ajax_ok($aResp);
         }
         if (isset($contr_Mottech_search_sec_groups->NM_ajax_info['focus']) && '' != $contr_Mottech_search_sec_groups->NM_ajax_info['focus'])
         {
            $aResp['setFocus'] = $contr_Mottech_search_sec_groups->NM_ajax_info['focus'];
         }
         if (isset($contr_Mottech_search_sec_groups->NM_ajax_info['closeLine']) && '' != $contr_Mottech_search_sec_groups->NM_ajax_info['closeLine'])
         {
            $aResp['closeLine'] = $contr_Mottech_search_sec_groups->NM_ajax_info['closeLine'];
         }
         else
         {
            $aResp['closeLine'] = 'N';
         }
         if (isset($contr_Mottech_search_sec_groups->NM_ajax_info['clearUpload']) && '' != $contr_Mottech_search_sec_groups->NM_ajax_info['clearUpload'])
         {
            $aResp['clearUpload'] = $contr_Mottech_search_sec_groups->NM_ajax_info['clearUpload'];
         }
         else
         {
            $aResp['clearUpload'] = 'N';
         }
         if (isset($contr_Mottech_search_sec_groups->NM_ajax_info['masterValue']) && '' != $contr_Mottech_search_sec_groups->NM_ajax_info['masterValue'])
         {
            Mottech_search_sec_groups_pack_master_value($aResp);
         }
         if (isset($contr_Mottech_search_sec_groups->NM_ajax_info['ajaxAlert']) && '' != $contr_Mottech_search_sec_groups->NM_ajax_info['ajaxAlert'])
         {
            Mottech_search_sec_groups_pack_ajax_alert($aResp);
         }
         if (isset($contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']) && '' != $contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage'])
         {
            Mottech_search_sec_groups_pack_ajax_message($aResp);
         }
         if (isset($contr_Mottech_search_sec_groups->NM_ajax_info['ajaxJavascript']) && '' != $contr_Mottech_search_sec_groups->NM_ajax_info['ajaxJavascript'])
         {
            Mottech_search_sec_groups_pack_ajax_javascript($aResp);
         }
         if (isset($contr_Mottech_search_sec_groups->NM_ajax_info['redir']) && !empty($contr_Mottech_search_sec_groups->NM_ajax_info['redir']))
         {
            Mottech_search_sec_groups_pack_ajax_redir($aResp);
         }
         if (isset($contr_Mottech_search_sec_groups->NM_ajax_info['redirExit']) && !empty($contr_Mottech_search_sec_groups->NM_ajax_info['redirExit']))
         {
            Mottech_search_sec_groups_pack_ajax_redir_exit($aResp);
         }
         if (isset($contr_Mottech_search_sec_groups->NM_ajax_info['blockDisplay']) && !empty($contr_Mottech_search_sec_groups->NM_ajax_info['blockDisplay']))
         {
            Mottech_search_sec_groups_pack_ajax_block_display($aResp);
         }
         if (isset($contr_Mottech_search_sec_groups->NM_ajax_info['fieldDisplay']) && !empty($contr_Mottech_search_sec_groups->NM_ajax_info['fieldDisplay']))
         {
            Mottech_search_sec_groups_pack_ajax_field_display($aResp);
         }
         if (isset($contr_Mottech_search_sec_groups->NM_ajax_info['buttonDisplay']) && !empty($contr_Mottech_search_sec_groups->NM_ajax_info['buttonDisplay']))
         {
            $contr_Mottech_search_sec_groups->NM_ajax_info['buttonDisplay'] = $contr_Mottech_search_sec_groups->nmgp_botoes;
            Mottech_search_sec_groups_pack_ajax_button_display($aResp);
         }
         if (isset($contr_Mottech_search_sec_groups->NM_ajax_info['fieldLabel']) && !empty($contr_Mottech_search_sec_groups->NM_ajax_info['fieldLabel']))
         {
            Mottech_search_sec_groups_pack_ajax_field_label($aResp);
         }
         if (isset($contr_Mottech_search_sec_groups->NM_ajax_info['readOnly']) && !empty($contr_Mottech_search_sec_groups->NM_ajax_info['readOnly']))
         {
            Mottech_search_sec_groups_pack_ajax_readonly($aResp);
         }
         if (isset($contr_Mottech_search_sec_groups->NM_ajax_info['navStatus']) && !empty($contr_Mottech_search_sec_groups->NM_ajax_info['navStatus']))
         {
            Mottech_search_sec_groups_pack_ajax_nav_status($aResp);
         }
         if (isset($contr_Mottech_search_sec_groups->NM_ajax_info['navSummary']) && !empty($contr_Mottech_search_sec_groups->NM_ajax_info['navSummary']))
         {
            Mottech_search_sec_groups_pack_ajax_nav_Summary($aResp);
         }
         if (isset($contr_Mottech_search_sec_groups->NM_ajax_info['navPage']))
         {
            Mottech_search_sec_groups_pack_ajax_navPage($aResp);
         }
         if (isset($contr_Mottech_search_sec_groups->NM_ajax_info['btnVars']) && !empty($contr_Mottech_search_sec_groups->NM_ajax_info['btnVars']))
         {
            Mottech_search_sec_groups_pack_ajax_btn_vars($aResp);
         }
         if (isset($contr_Mottech_search_sec_groups->NM_ajax_info['quickSearchRes']) && $contr_Mottech_search_sec_groups->NM_ajax_info['quickSearchRes'])
         {
            $aResp['quickSearchRes'] = 'Y';
         }
         else
         {
            $aResp['quickSearchRes'] = 'N';
         }
         $aResp['htmOutput'] = '';
    
         if (isset($contr_Mottech_search_sec_groups->NM_ajax_info['param']['buffer_output']) && $contr_Mottech_search_sec_groups->NM_ajax_info['param']['buffer_output'])
         {
            $aResp['htmOutput'] = ob_get_contents();
            if (false === $aResp['htmOutput'])
            {
               $aResp['htmOutput'] = '';
            }
            else
            {
               $aResp['htmOutput'] = Mottech_search_sec_groups_pack_protect_string(NM_charset_to_utf8($aResp['htmOutput']));
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
   } // Mottech_search_sec_groups_pack_ajax_response

   function Mottech_search_sec_groups_pack_calendar_reload(&$aResp)
   {
      global $contr_Mottech_search_sec_groups;
      $aResp['calendarReload'] = 'OK';
   } // Mottech_search_sec_groups_pack_calendar_reload

   function Mottech_search_sec_groups_pack_ajax_errors(&$aResp)
   {
      global $contr_Mottech_search_sec_groups;
      $aResp['errList'] = array();
      foreach ($contr_Mottech_search_sec_groups->NM_ajax_info['errList'] as $sField => $aMsg)
      {
         if ('geral_Mottech_search_sec_groups' == $sField)
         {
             $aMsg = Mottech_search_sec_groups_pack_ajax_remove_erros($aMsg);
         }
         foreach ($aMsg as $sMsg)
         {
            $iNumLinha = (isset($contr_Mottech_search_sec_groups->NM_ajax_info['param']['nmgp_refresh_row']) && 'geral_Mottech_search_sec_groups' != $sField)
                       ? $contr_Mottech_search_sec_groups->NM_ajax_info['param']['nmgp_refresh_row'] : "";
            $aResp['errList'][] = array('fldName'  => $sField,
                                        'msgText'  => Mottech_search_sec_groups_pack_protect_string(NM_charset_to_utf8($sMsg)),
                                        'numLinha' => $iNumLinha);
         }
      }
   } // Mottech_search_sec_groups_pack_ajax_errors

   function Mottech_search_sec_groups_pack_ajax_remove_erros($aErrors)
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
   } // Mottech_search_sec_groups_pack_ajax_remove_erros

   function Mottech_search_sec_groups_pack_ajax_ok(&$aResp)
   {
      global $contr_Mottech_search_sec_groups;
      $iNumLinha = (isset($contr_Mottech_search_sec_groups->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $contr_Mottech_search_sec_groups->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      $aResp['msgDisplay'] = array('msgText'  => Mottech_search_sec_groups_pack_protect_string($contr_Mottech_search_sec_groups->NM_ajax_info['msgDisplay']),
                                   'numLinha' => $iNumLinha);
   } // Mottech_search_sec_groups_pack_ajax_ok

   function Mottech_search_sec_groups_pack_ajax_set_fields(&$aResp)
   {
      global $contr_Mottech_search_sec_groups;
      $iNumLinha = (isset($contr_Mottech_search_sec_groups->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $contr_Mottech_search_sec_groups->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      if ('' != $contr_Mottech_search_sec_groups->NM_ajax_info['rsSize'])
      {
         $aResp['rsSize'] = $contr_Mottech_search_sec_groups->NM_ajax_info['rsSize'];
      }
      $aResp['fldList'] = array();
      foreach ($contr_Mottech_search_sec_groups->NM_ajax_info['fldList'] as $sField => $aData)
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
            $aField['imgFile'] = Mottech_search_sec_groups_pack_protect_string($aData['imgFile']);
         }
         if (isset($aData['imgOrig']))
         {
            $aField['imgOrig'] = Mottech_search_sec_groups_pack_protect_string($aData['imgOrig']);
         }
         if (isset($aData['imgLink']))
         {
            $aField['imgLink'] = Mottech_search_sec_groups_pack_protect_string($aData['imgLink']);
         }
         if (isset($aData['keepImg']))
         {
            $aField['keepImg'] = $aData['keepImg'];
         }
         if (isset($aData['docLink']))
         {
            $aField['docLink'] = Mottech_search_sec_groups_pack_protect_string($aData['docLink']);
         }
         if (isset($aData['docIcon']))
         {
            $aField['docIcon'] = Mottech_search_sec_groups_pack_protect_string($aData['docIcon']);
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
            $aField['imgHtml'] = Mottech_search_sec_groups_pack_protect_string($aData['imgHtml']);
         }
         if (isset($aData['mulHtml']))
         {
            $aField['mulHtml'] = Mottech_search_sec_groups_pack_protect_string($aData['mulHtml']);
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
               $aValue['label'] = Mottech_search_sec_groups_pack_protect_string($aData['labList'][$iIndex]);
            }
            $aValue['value']     = ('_autocomp' != substr($sField, -9)) ? Mottech_search_sec_groups_pack_protect_string($sValue) : $sValue;
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
                     $aField['optList'][] = array('value' => Mottech_search_sec_groups_pack_protect_string($sOpt),
                                                  'label' => Mottech_search_sec_groups_pack_protect_string($sLabel));
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
   } // Mottech_search_sec_groups_pack_ajax_set_fields

   function Mottech_search_sec_groups_pack_ajax_redir(&$aResp)
   {
      global $contr_Mottech_search_sec_groups;
      $aInfo              = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session', 'h_modal', 'w_modal');
      $aResp['redirInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($contr_Mottech_search_sec_groups->NM_ajax_info['redir'][$sTag]))
         {
            $aResp['redirInfo'][$sTag] = $contr_Mottech_search_sec_groups->NM_ajax_info['redir'][$sTag];
         }
      }
   } // Mottech_search_sec_groups_pack_ajax_redir

   function Mottech_search_sec_groups_pack_ajax_redir_exit(&$aResp)
   {
      global $contr_Mottech_search_sec_groups;
      $aInfo                  = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session');
      $aResp['redirExitInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($contr_Mottech_search_sec_groups->NM_ajax_info['redirExit'][$sTag]))
         {
            $aResp['redirExitInfo'][$sTag] = $contr_Mottech_search_sec_groups->NM_ajax_info['redirExit'][$sTag];
         }
      }
   } // Mottech_search_sec_groups_pack_ajax_redir_exit

   function Mottech_search_sec_groups_pack_master_value(&$aResp)
   {
      global $contr_Mottech_search_sec_groups;
      foreach ($contr_Mottech_search_sec_groups->NM_ajax_info['masterValue'] as $sIndex => $sValue)
      {
         $aResp['masterValue'][] = array('index' => $sIndex,
                                         'value' => $sValue);
      }
   } // Mottech_search_sec_groups_pack_master_value

   function Mottech_search_sec_groups_pack_ajax_alert(&$aResp)
   {
      global $contr_Mottech_search_sec_groups;
      $aResp['ajaxAlert'] = array('message' => $contr_Mottech_search_sec_groups->NM_ajax_info['ajaxAlert']['message']);
   } // Mottech_search_sec_groups_pack_ajax_alert

   function Mottech_search_sec_groups_pack_ajax_message(&$aResp)
   {
      global $contr_Mottech_search_sec_groups;
      $aResp['ajaxMessage'] = array('message'      => Mottech_search_sec_groups_pack_protect_string($contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['message']),
                                    'title'        => Mottech_search_sec_groups_pack_protect_string($contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['title']),
                                    'modal'        => isset($contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['modal'])        ? $contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['modal']        : 'N',
                                    'timeout'      => isset($contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['timeout'])      ? $contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['timeout']      : '',
                                    'button'       => isset($contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['button'])       ? $contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['button']       : '',
                                    'button_label' => isset($contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['button_label']) ? $contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['button_label'] : 'Ok',
                                    'top'          => isset($contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['top'])          ? $contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['top']          : '',
                                    'left'         => isset($contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['left'])         ? $contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['left']         : '',
                                    'width'        => isset($contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['width'])        ? $contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['width']        : '',
                                    'height'       => isset($contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['height'])       ? $contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['height']       : '',
                                    'redir'        => isset($contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['redir'])        ? $contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['redir']        : '',
                                    'show_close'   => isset($contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['show_close'])   ? $contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['show_close']   : 'Y',
                                    'body_icon'    => isset($contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['body_icon'])    ? $contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['body_icon']    : 'Y',
                                    'redir_target' => isset($contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['redir_target']) ? $contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['redir_target'] : '',
                                    'redir_par'    => isset($contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['redir_par'])    ? $contr_Mottech_search_sec_groups->NM_ajax_info['ajaxMessage']['redir_par']    : '');
   } // Mottech_search_sec_groups_pack_ajax_message

   function Mottech_search_sec_groups_pack_ajax_javascript(&$aResp)
   {
      global $contr_Mottech_search_sec_groups;
      foreach ($contr_Mottech_search_sec_groups->NM_ajax_info['ajaxJavascript'] as $aJsFunc)
      {
         $aResp['ajaxJavascript'][] = $aJsFunc;
      }
   } // Mottech_search_sec_groups_pack_ajax_javascript

   function Mottech_search_sec_groups_pack_ajax_block_display(&$aResp)
   {
      global $contr_Mottech_search_sec_groups;
      $aResp['blockDisplay'] = array();
      foreach ($contr_Mottech_search_sec_groups->NM_ajax_info['blockDisplay'] as $sBlockName => $sBlockStatus)
      {
        $aResp['blockDisplay'][] = array($sBlockName, $sBlockStatus);
      }
   } // Mottech_search_sec_groups_pack_ajax_block_display

   function Mottech_search_sec_groups_pack_ajax_field_display(&$aResp)
   {
      global $contr_Mottech_search_sec_groups;
      $aResp['fieldDisplay'] = array();
      foreach ($contr_Mottech_search_sec_groups->NM_ajax_info['fieldDisplay'] as $sFieldName => $sFieldStatus)
      {
        $aResp['fieldDisplay'][] = array($sFieldName, $sFieldStatus);
      }
   } // Mottech_search_sec_groups_pack_ajax_field_display

   function Mottech_search_sec_groups_pack_ajax_button_display(&$aResp)
   {
      global $contr_Mottech_search_sec_groups;
      $aResp['buttonDisplay'] = array();
      foreach ($contr_Mottech_search_sec_groups->NM_ajax_info['buttonDisplay'] as $sButtonName => $sButtonStatus)
      {
        $aResp['buttonDisplay'][] = array($sButtonName, $sButtonStatus);
      }
   } // Mottech_search_sec_groups_pack_ajax_button_display

   function Mottech_search_sec_groups_pack_ajax_field_label(&$aResp)
   {
      global $contr_Mottech_search_sec_groups;
      $aResp['fieldLabel'] = array();
      foreach ($contr_Mottech_search_sec_groups->NM_ajax_info['fieldLabel'] as $sFieldName => $sFieldLabel)
      {
        $aResp['fieldLabel'][] = array($sFieldName, Mottech_search_sec_groups_pack_protect_string($sFieldLabel));
      }
   } // Mottech_search_sec_groups_pack_ajax_field_label

   function Mottech_search_sec_groups_pack_ajax_readonly(&$aResp)
   {
      global $contr_Mottech_search_sec_groups;
      $aResp['readOnly'] = array();
      foreach ($contr_Mottech_search_sec_groups->NM_ajax_info['readOnly'] as $sFieldName => $sFieldStatus)
      {
        $aResp['readOnly'][] = array($sFieldName, $sFieldStatus);
      }
   } // Mottech_search_sec_groups_pack_ajax_readonly

   function Mottech_search_sec_groups_pack_ajax_nav_status(&$aResp)
   {
      global $contr_Mottech_search_sec_groups;
      $aResp['navStatus'] = array();
      if (isset($contr_Mottech_search_sec_groups->NM_ajax_info['navStatus']['ret']) && '' != $contr_Mottech_search_sec_groups->NM_ajax_info['navStatus']['ret'])
      {
         $aResp['navStatus']['ret'] = $contr_Mottech_search_sec_groups->NM_ajax_info['navStatus']['ret'];
      }
      if (isset($contr_Mottech_search_sec_groups->NM_ajax_info['navStatus']['ava']) && '' != $contr_Mottech_search_sec_groups->NM_ajax_info['navStatus']['ava'])
      {
         $aResp['navStatus']['ava'] = $contr_Mottech_search_sec_groups->NM_ajax_info['navStatus']['ava'];
      }
   } // Mottech_search_sec_groups_pack_ajax_nav_status

   function Mottech_search_sec_groups_pack_ajax_nav_Summary(&$aResp)
   {
      global $contr_Mottech_search_sec_groups;
      $aResp['navSummary'] = array();
      $aResp['navSummary']['reg_ini'] = $contr_Mottech_search_sec_groups->NM_ajax_info['navSummary']['reg_ini'];
      $aResp['navSummary']['reg_qtd'] = $contr_Mottech_search_sec_groups->NM_ajax_info['navSummary']['reg_qtd'];
      $aResp['navSummary']['reg_tot'] = $contr_Mottech_search_sec_groups->NM_ajax_info['navSummary']['reg_tot'];
   } // Mottech_search_sec_groups_pack_ajax_nav_Summary

   function Mottech_search_sec_groups_pack_ajax_navPage(&$aResp)
   {
      global $contr_Mottech_search_sec_groups;
      $aResp['navPage'] = $contr_Mottech_search_sec_groups->NM_ajax_info['navPage'];
   } // Mottech_search_sec_groups_pack_ajax_navPage


   function Mottech_search_sec_groups_pack_ajax_btn_vars(&$aResp)
   {
      global $contr_Mottech_search_sec_groups;
      $aResp['btnVars'] = array();
      foreach ($contr_Mottech_search_sec_groups->NM_ajax_info['btnVars'] as $sBtnName => $sBtnValue)
      {
        $aResp['btnVars'][] = array($sBtnName, Mottech_search_sec_groups_pack_protect_string($sBtnValue));
      }
   } // Mottech_search_sec_groups_pack_ajax_btn_vars

   function Mottech_search_sec_groups_pack_protect_string($sString)
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
   } // Mottech_search_sec_groups_pack_protect_string
?>
