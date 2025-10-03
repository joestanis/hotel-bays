<?php
include_once('app_menu_session.php');
session_start();
    $_SESSION['scriptcase']['app_menu']['glo_nm_path_prod'] = "";
    $_SESSION['scriptcase']['app_menu']['glo_nm_perfil']    = "conn_mssql";
    $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] = "";

ob_start();

class app_menu_class
{
  var $Db;

 function sc_Include($path, $tp, $name)
 {
     if (($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
     {
         include_once($path);
     }
 } // sc_Include

 function app_menu_menu()
 {
    global $app_menu_menuData;
     if (isset($_POST["nmgp_idioma"]))  
     { 
         $Temp_lang = explode(";" , $_POST["nmgp_idioma"]);  
         if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))  
          { 
             $_SESSION['scriptcase']['str_lang'] = $Temp_lang[0];
         } 
         if (isset($Temp_lang[1]) && !empty($Temp_lang[1])) 
         { 
             $_SESSION['scriptcase']['str_conf_reg'] = $Temp_lang[1];
         } 
     } 
   
     if (isset($_POST["nmgp_schema"]))  
     { 
         $_SESSION['scriptcase']['str_schema_all'] = $_POST["nmgp_schema"] . "/" . $_POST["nmgp_schema"];
     } 
   
           $nm_versao_sc  = "" ; 
           $_SESSION['scriptcase']['app_menu']['contr_erro'] = 'off';
           $Campos_Mens_erro = "";
           $sc_site_ssl   = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? true : false;
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
      if(empty($_SESSION['scriptcase']['app_menu']['glo_nm_path_prod']))
      {
              /*check prod*/$_SESSION['scriptcase']['app_menu']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
      }
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
$str_path_web   = $_SERVER['PHP_SELF'];
$str_path_web   = str_replace("\\", '/', $str_path_web);
$str_path_web   = str_replace('//', '/', $str_path_web);
$str_root       = substr($str_path_sys, 0, -1 * strlen($str_path_web));
$path_link      = substr($str_path_web, 0, strrpos($str_path_web, '/'));
$path_link      = substr($path_link, 0, strrpos($path_link, '/')) . '/';
$path_btn       = $str_root . $path_link . "_lib/buttons/";
$path_imag_cab  = $path_link . "_lib/img";
$this->force_mobile = false;
$this->path_botoes    = '../_lib/img';
$this->path_imag_apl  = $str_root . $path_link . "_lib/img";
$path_help      = $path_link . "_lib/webhelp/";
$path_libs      = $str_root . $_SESSION['scriptcase']['app_menu']['glo_nm_path_prod'] . "/lib/php";
$path_third     = $str_root . $_SESSION['scriptcase']['app_menu']['glo_nm_path_prod'] . "/third";
$path_adodb     = $str_root . $_SESSION['scriptcase']['app_menu']['glo_nm_path_prod'] . "/third/adodb";
$path_apls      = $str_root . substr($path_link, 0, strrpos($path_link, '/'));
$path_img_old   = $str_root . $path_link . "app_menu/img";
$this->path_css = $str_root . $path_link . "_lib/css/";
$this->url_css = "../_lib/css/";
$path_lib_php   = $str_root . $path_link . "_lib/lib/php";

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
                $nm_apl_dest = $path_link . SC_dir_app_name($nm_apl_dest) . "/" . $nm_apl_dest . ".php";
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
if (!defined("SC_ERROR_HANDLER"))
{
    define("SC_ERROR_HANDLER", 1);
    include_once(dirname(__FILE__) . "/app_menu_erro.php");
}
include_once(dirname(__FILE__) . "/app_menu_erro.class.php"); 
$this->Erro = new app_menu_erro();
$str_path = substr($_SESSION['scriptcase']['app_menu']['glo_nm_path_prod'], 0, strrpos($_SESSION['scriptcase']['app_menu']['glo_nm_path_prod'], '/') + 1);
if (!is_file($str_root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
{
    unset($_SESSION['scriptcase']['nm_sc_retorno']);
    unset($_SESSION['scriptcase']['app_menu']['glo_nm_conexao']);
}

/* Path definitions */
$app_menu_menuData         = array();
$app_menu_menuData['path'] = array();
$app_menu_menuData['url']  = array();
$NM_dir_atual = getcwd();
if (empty($NM_dir_atual))
{
    $app_menu_menuData['path']['sys'] = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
    $app_menu_menuData['path']['sys'] = str_replace("\\", '/', $str_path_sys);
    $app_menu_menuData['path']['sys'] = str_replace('//', '/', $str_path_sys);
}
else
{
    $sc_nm_arquivo                                   = explode("/", $_SERVER['PHP_SELF']);
    $app_menu_menuData['path']['sys'] = str_replace("\\", "/", str_replace("\\\\", "\\", getcwd())) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
}
$app_menu_menuData['url']['web']   = $_SERVER['PHP_SELF'];
$app_menu_menuData['url']['web']   = str_replace("\\", '/', $app_menu_menuData['url']['web']);
$app_menu_menuData['url']['web']   = str_replace('//', '/', $app_menu_menuData['url']['web']);
$app_menu_menuData['path']['root'] = substr($app_menu_menuData['path']['sys'],  0, -1 * strlen($app_menu_menuData['url']['web']));
$app_menu_menuData['path']['app']  = substr($app_menu_menuData['path']['sys'],  0, strrpos($app_menu_menuData['path']['sys'],  '/'));
$app_menu_menuData['path']['link'] = substr($app_menu_menuData['path']['app'],  0, strrpos($app_menu_menuData['path']['app'],  '/'));
$app_menu_menuData['path']['link'] = substr($app_menu_menuData['path']['link'], 0, strrpos($app_menu_menuData['path']['link'], '/')) . '/';
$app_menu_menuData['path']['app'] .= '/';
$app_menu_menuData['url']['app']   = substr($app_menu_menuData['url']['web'],  0, strrpos($app_menu_menuData['url']['web'],  '/'));
$app_menu_menuData['url']['link']  = substr($app_menu_menuData['url']['app'],  0, strrpos($app_menu_menuData['url']['app'],  '/'));
if ($_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] == "S")
{
    $app_menu_menuData['url']['link']  = substr($app_menu_menuData['url']['link'], 0, strrpos($app_menu_menuData['url']['link'], '/'));
}
$app_menu_menuData['url']['link']  .= '/';
$app_menu_menuData['url']['app']   .= '/';

$nm_img_fun_menu = ""; 
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
$this->str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "ScriptCase6_Blue/ScriptCase6_Blue";
$_SESSION['scriptcase']['erro']['str_schema'] = $this->str_schema_all . "_error.css";
$_SESSION['scriptcase']['erro']['str_lang']   = $this->str_lang;
if (!function_exists("NM_is_utf8"))
{
   include_once("app_menu_nmutf8.php");
}
if (!function_exists("SC_dir_app_ini"))
{
    include_once("../_lib/lib/php/nm_ctrl_app_name.php");
}
SC_dir_app_ini('Mottech');
if ($_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] == "S")
{
    $path_apls     = substr($path_apls, 0, strrpos($path_apls, '/'));
}
$path_apls     .= "/";
include("../_lib/lang/". $this->str_lang .".lang.php");
include("../_lib/css/" . $this->str_schema_all . "_menuH.php");
$this->img_sep_toolbar = trim($str_toolbar_separator);
include("../_lib/lang/config_region.php");
include("../_lib/lang/lang_config_region.php");
$Str_btn_menu = trim($str_button) . "/" . trim($str_button) . ".php";
$Str_btn_css  = trim($str_button) . "/" . trim($str_button) . ".css";
include($path_btn . $Str_btn_menu);
if (!function_exists("nmButtonOutput"))
{
   include_once("../_lib/lib/php/nm_gp_config_btn.php");
}
asort($this->Nm_lang_conf_region);
$this->sc_Include($path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
$this->nm_data = new nm_data("en_us");
include_once("app_menu_toolbar.php");

$this->tab_grupo[0] = "Mottech/";
if ($_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] != "S")
{
    $this->tab_grupo[0] = "";
}

     if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
     {
         foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
         {
             if (isset($_SESSION['scriptcase']['app_menu']['glo_nm_conexao']) && $_SESSION['scriptcase']['app_menu']['glo_nm_conexao'] == $NM_con_orig)
             {
/*NM*/           $_SESSION['scriptcase']['app_menu']['glo_nm_conexao'] = $NM_con_dest;
             }
             if (isset($_SESSION['scriptcase']['app_menu']['glo_nm_perfil']) && $_SESSION['scriptcase']['app_menu']['glo_nm_perfil'] == $NM_con_orig)
             {
/*NM*/           $_SESSION['scriptcase']['app_menu']['glo_nm_perfil'] = $NM_con_dest;
             }
             if (isset($_SESSION['scriptcase']['app_menu']['glo_con_' . $NM_con_orig]))
             {
                 $_SESSION['scriptcase']['app_menu']['glo_con_' . $NM_con_orig] = $NM_con_dest;
             }
         }
     }
$_SESSION['scriptcase']['charset'] = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "ISO-8859-1";
$_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
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
$this->regionalDefault();
if (is_dir($path_img_old))
{
    $Res_dir_img = @opendir($path_img_old);
    if ($Res_dir_img)
    {
        while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
        {
           $Str_arquivo = "/" . $Str_arquivo;
           if (@is_file($path_img_old . $Str_arquivo) && '.' != $Str_arquivo && '..' != $path_img_old . $Str_arquivo)
           {
               @unlink($path_img_old . $Str_arquivo);
           }
        }
    }
    @closedir($Res_dir_img);
    rmdir($path_img_old);
}
//
if (isset($_GET) && !empty($_GET))
{
    foreach ($_GET as $nmgp_var => $nmgp_val)
    {
         $$nmgp_var           = $nmgp_val;
    }
}
if (isset($_POST) && !empty($_POST))
{
    foreach ($_POST as $nmgp_var => $nmgp_val)
    {
         $$nmgp_var           = $nmgp_val;
    }
}
if (isset($script_case_init))
{
    $_SESSION['sc_session'][1]['app_menu']['init'] = $script_case_init;
}
else
if (!isset($_SESSION['sc_session'][1]['app_menu']['init']))
{
    $_SESSION['sc_session'][1]['app_menu']['init'] = "";
}
$script_case_init = $_SESSION['sc_session'][1]['app_menu']['init'];
if (isset($nmgp_parms) && !empty($nmgp_parms)) 
{ 
    $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
    $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
    $todo = explode("?@?", $nmgp_parms);
    $ix = 0;
    while (!empty($todo[$ix]))
    {
       $cadapar = explode("?#?", $todo[$ix]);
       $$cadapar[0] = $cadapar[1];
       $_SESSION[$cadapar[0]] = $cadapar[1];
       $ix++;
     }
} 
$nm_url_saida = "";
if (isset($nmgp_url_saida))
{
    $nm_url_saida = $nmgp_url_saida;
    if (isset($script_case_init))
    {
        $nm_url_saida .= "?script_case_init=" . NM_encode_input($script_case_init) . "&script_case_session=" . session_id();
    }
}
if (isset($_POST["nmgp_idioma"]) || isset($_POST["nmgp_schema"]))  
{ 
    $nm_url_saida = $_SESSION['scriptcase']['sc_saida_app_menu'];
}
elseif (!empty($nm_url_saida))
{
    $_SESSION['scriptcase']['sc_url_saida'][$script_case_init]  = $nm_url_saida;
    $_SESSION['scriptcase']['sc_saida_app_menu'] = $nm_url_saida;
}
else
{
    $_SESSION['scriptcase']['sc_saida_app_menu'] = (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : "javascript:window.close()";
}
$this->sc_Include($path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
include_once($path_adodb . "/adodb.inc.php"); 
$this->sc_Include($path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
perfil_lib($path_libs);
if (!isset($_SESSION['sc_session'][1]['SC_Check_Perfil']))
{
    if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($path_libs, $_SESSION['scriptcase']['app_menu']['glo_nm_path_prod']);
    $_SESSION['sc_session'][1]['SC_Check_Perfil'] = true;
}
$nm_falta_var    = ""; 
$nm_falta_var_db = ""; 
if (isset($_SESSION['scriptcase']['app_menu']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['app_menu']['glo_nm_conexao']))
{
    db_conect_devel($_SESSION['scriptcase']['app_menu']['glo_nm_conexao'], $str_root . $_SESSION['scriptcase']['app_menu']['glo_nm_path_prod'], 'Mottech', 2); 
}
if (isset($_SESSION['scriptcase']['app_menu']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['app_menu']['glo_nm_perfil']))
{
   $_SESSION['scriptcase']['glo_perfil'] = $_SESSION['scriptcase']['app_menu']['glo_nm_perfil'];
}
if (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
{
    $_SESSION['scriptcase']['glo_senha_protect'] = "";
    carrega_perfil($_SESSION['scriptcase']['glo_perfil'], $path_libs, "");
    if (empty($_SESSION['scriptcase']['glo_senha_protect']))
    {
        $nm_falta_var .= "Perfil=" . $_SESSION['scriptcase']['glo_perfil'] . "; ";
    }
}
if (!isset($_SESSION['scriptcase']['glo_tpbanco']))
{
    $nm_falta_var_db .= "glo_tpbanco; ";
}
else
{
    $nm_tpbanco = $_SESSION['scriptcase']['glo_tpbanco']; 
}
if (!isset($_SESSION['scriptcase']['glo_servidor']))
{
    $nm_falta_var_db .= "glo_servidor; ";
}
else
{
    $nm_servidor = $_SESSION['scriptcase']['glo_servidor']; 
}
if (!isset($_SESSION['scriptcase']['glo_banco']))
{
    $nm_falta_var_db .= "glo_banco; ";
}
else
{
    $nm_banco = $_SESSION['scriptcase']['glo_banco']; 
}
if (!isset($_SESSION['scriptcase']['glo_usuario']))
{
    $nm_falta_var_db .= "glo_usuario; ";
}
else
{
    $nm_usuario = $_SESSION['scriptcase']['glo_usuario']; 
}
if (!isset($_SESSION['scriptcase']['glo_senha']))
{
    $nm_falta_var_db .= "glo_senha; ";
}
else
{
    $nm_senha = $_SESSION['scriptcase']['glo_senha']; 
}
$nm_con_db2 = array();
$nm_database_encoding = "";
if (isset($_SESSION['scriptcase']['glo_database_encoding']))
{
    $nm_database_encoding = $_SESSION['scriptcase']['glo_database_encoding']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_autocommit']))
{
    $nm_con_db2['db2_autocommit'] = $_SESSION['scriptcase']['glo_db2_autocommit']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_lib']))
{
    $nm_con_db2['db2_i5_lib'] = $_SESSION['scriptcase']['glo_db2_i5_lib']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_naming']))
{
    $nm_con_db2['db2_i5_naming'] = $_SESSION['scriptcase']['glo_db2_i5_naming']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_commit']))
{
    $nm_con_db2['db2_i5_commit'] = $_SESSION['scriptcase']['glo_db2_i5_commit']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_query_optimize']))
{
    $nm_con_db2['db2_i5_query_optimize'] = $_SESSION['scriptcase']['glo_db2_i5_query_optimize']; 
}
$nm_con_persistente = "";
$nm_con_use_schema  = "";
if (isset($_SESSION['scriptcase']['glo_use_persistent']))
{
    $nm_con_persistente = $_SESSION['scriptcase']['glo_use_persistent']; 
}
if (isset($_SESSION['scriptcase']['glo_use_schema']))
{
    $nm_con_use_schema = $_SESSION['scriptcase']['glo_use_schema']; 
}
if (!empty($nm_falta_var) || !empty($nm_falta_var_db))
{
    if (empty($nm_falta_var_db))
    {
        echo "<table width=\"80%\"  border=\"1\" height=\"117\">";
        echo "<tr>";
        echo "   <td class=\"css_menu_sel\">";
        echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_glob'] . "</font>";
        echo "  " . $nm_falta_var;
        echo "   </b></td>";
        echo " </tr>";
        echo "</table>";
    }
    else
    {
        echo "<table width=\"80%\"  border=\"1\" height=\"117\">";
        echo "<tr>";
        echo "   <td class=\"css_menu_sel\">";
        echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_data'] . "</font>";
        echo "   </b></td>";
        echo " </tr>";
        echo "</table>";
    }
    if (isset($_SESSION['scriptcase']['nm_ret_exec']) && '' != $_SESSION['scriptcase']['nm_ret_exec'])
    { 
        if (isset($_SESSION['sc_session'][1]['app_menu']['sc_outra_jan']) && $_SESSION['sc_session'][1]['app_menu']['sc_outra_jan'])
        {
            echo "<a href='javascript:window.close()'><img border='0' src='" . $path_imag_cab . "/scriptcase__NM__exit.gif' title='" . $this->Nm_lang['lang_btns_menu_rtrn_hint'] . "' align=absmiddle></a> \n" ; 
        } 
        else 
        { 
            echo "<a href='" . $_SESSION['scriptcase']['nm_ret_exec'] . "><img border='0' src='" . $path_imag_cab . "/scriptcase__NM__exit.gif' title='" . $this->Nm_lang['lang_btns_menu_rtrn_hint'] . "' align=absmiddle></a> \n" ; 
        } 
    } 
    exit ;
} 
if (isset($_SESSION['scriptcase']['glo_db_master_usr']) && !empty($_SESSION['scriptcase']['glo_db_master_usr']))
{
    $nm_usuario = $_SESSION['scriptcase']['glo_db_master_usr']; 
}
if (isset($_SESSION['scriptcase']['glo_db_master_pass']) && !empty($_SESSION['scriptcase']['glo_db_master_pass']))
{
    $nm_senha = $_SESSION['scriptcase']['glo_db_master_pass']; 
}
if (isset($_SESSION['scriptcase']['glo_db_master_cript']) && !empty($_SESSION['scriptcase']['glo_db_master_cript']))
{
    $_SESSION['scriptcase']['glo_senha_protect'] = $_SESSION['scriptcase']['glo_db_master_cript']; 
}
$sc_tem_trans_banco = false;
$this->nm_bases_access    = array("access", "ado_access");
$this->nm_bases_db2       = array("db2", "db2_odbc", "odbc_db2", "odbc_db2v6");
$this->nm_bases_ibase     = array("ibase", "firebird", "borland_ibase");
$this->nm_bases_informix  = array("informix", "informix72", "pdo_informix");
$this->nm_bases_mssql     = array("mssql", "ado_mssql", "odbc_mssql", "mssqlnative", "pdo_sqlsrv");
$this->nm_bases_mysql     = array("mysql", "mysqlt", "maxsql", "pdo_mysql");
$this->nm_bases_postgres  = array("postgres", "postgres64", "postgres7", "pdo_pgsql");
$this->nm_bases_oracle    = array("oci8", "oci805", "oci8po", "odbc_oracle", "oracle");
$this->nm_bases_sqlite    = array("sqlite", "pdosqlite");
$this->nm_bases_sybase    = array("sybase");
$this->nm_bases_vfp       = array("vfp");
$this->nm_bases_odbc      = array("odbc");
$_SESSION['scriptcase']['sc_num_page'] = 1;
$_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1DcBwZSFUHAN7D5JwDMzGVIFCDWJeVoBqHQNwZSBOHABYHQBOHgveVkXeDuJeZuXGHQJKDQJsZ1vCV5FGHuNOV9FeDWB3VoF7HQBiZkBiDSNOHuXGHgvsVkJ3DWXCHIFGHQXsZ9JeZ1BYHuraDMrYVIBsDWFaHMrqHQXOVIJwZ1rYHQBOHgBODkXKH5FGZuBqDcBiDQBOZ1zGVWJeDMzGZSJqH5XCHIX7HQJmVIraD1rwV5FGDEBeHEXeH5X/DoF7HQNwDQBqDSvCVWJwHgrwVcFeDur/HMXGHQBiZkFUZ1rYHuXGDMvCDkB/DuJeHMFGDcXGDuBOZ1zGVWBODMvsVcFeDWFaHIFUHQBiZ1FUZ1vOZMXGHgBOHENiH5X/ZuXGDcBiDuBOD1BeD5rqHuvmVcBOH5B7VoBqHQXOZkBiDSNOHuJsHgNKZSJqHEB7ZuBOHQBiZ9JeZ1BYHQFaDMBYVcXKDWBmVoFGHQBiVIraZ1rYHQraHgNKHENiDWXCDoJsHQXODQBOZ1zGVWJwDMvmVIBsDWJeHMJsHQNmVIJwD1rwV5FGDEBeHEXeH5X/DoF7D9NwZSX7D1BeV5raHuzGVcFKDWFaVENUD9JmZ1X7Z1BeHQX7HgBYDkFeV5FaHMJsD9NwH9X7Z1rwD5XGHuzGVIBODWFaDoXGDcBwZ1FGHANOV5JeDEBOHEFiDWFqDoXGHQXGZSBiZ1N7D5JwHuBYVcFeV5FYVoB/D9JmH9B/D1zGD5FaDEvsDkXKDuXKVoBiHQBiDuBOZ1rwVWXGHuBYDkFCDuX7VoX7D9BsH9B/Z1BeZMB/HgvCZSJGH5FYDoF7D9NwH9X7DSBYV5JeHuBYVcFKH5FqVoB/D9XOH9B/D1zGD5FaDMrYZSXeDuFYVoXGDcJeZ9rqD1BeV5BqHgvsDkB/V5X7DoX7D9BsH9FaD1rwZMB/DMNKZSJqDuFaHIF7HQNmZ9JeZ1BYHuNUHgrwV9BUH5FqHIFGHQNwZ1X7HArYHuBODMvCHErCH5X/ZuFaHQJeDuFaHAveD5NUHgNKDkBOV5FYHMBiD9BiZ1F7DSBeHQBqHgNOHArCDuJeHMFaDcXGZ9F7HABYHuXGDMzGZSNiH5FqHMraHQJmZ1F7Z1vmD5rqDEBOHArCDWBmDoB/DcJeDQFGHAveV5JeHgrYDkBOV5FYDoraD9BsZSFaD1zGV5FUDErKHEFiDuJeDoBOHQJKDQJsZ1vCV5FGHuNOV9FeDWXCHMraHQNmZkBiHAzGD5BODMvCHArsDWFGDoBqHQBiDuFaHIBOV5XGDMvOV9BUDWJeHMJeDcFYZSBOHAvmZMFaHgBeHEFiV5B3DoF7D9XsDuFaHAveD5B/HgrKVIBsDWF/HIX7HQNwH9FaHABYHQraHgNODkB/HEB7ZuBqD9NwZSBiHAveD5NUHgNKDkBOV5FYHMBiDcJUZ1FaHArKD5BiDMBYVkJGDWr/DoB/D9XsH9FGDSN7D5JwDMvmVcFKV5BmVoBqD9BsZkFGHAvsD5XGHgveHErsDWFGZuFaHQBiDQBqD1NKV5XGDMvOVcFeDWXCDoJsDcBwH9B/Z1rYHQJwDENOHEBUH5FYHINUDcBwDQJwD1vOVWJeHuNODkB/HEFYHMBOHQXGH9FaD1rwHQBOHgrKHArsH5F/HIJsD9XsZ9JeD1BeD5F7DMvmVcFKDWFYDoNUD9BiH9B/HABYD5XGDMzGHEFKDWF/VoBiDcJeDQFGHAN7V5FUHuzGVIFCDWJeVoraHQJmZ1F7Z1vmD5rqDEBOHArCDWBmZuBqHQXGZ9XGHANKVWFU";
 $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['app_menu']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['app_menu']['glo_nm_conexao']))
{ 
   $this->Db = db_conect_devel($_SESSION['scriptcase']['app_menu']['glo_nm_conexao'], $str_root . $_SESSION['scriptcase']['app_menu']['glo_nm_path_prod'], 'Mottech'); 
} 
else 
{ 
   $this->Db = db_conect($nm_tpbanco, $nm_servidor, $nm_usuario, $nm_senha, $nm_banco, $glo_senha_protect, "S", $nm_con_persistente, $nm_con_db2, $nm_database_encoding); 
} 
$this->nm_tpbanco = $nm_tpbanco; 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_ibase) && function_exists('ibase_timefmt'))
{
    ibase_timefmt('%Y-%m-%d %H:%M:%S');
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_sybase))
{
   $this->Db->fetchMode = ADODB_FETCH_BOTH;
   $this->Db->Execute("set dateformat ymd");
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_mssql))
{
   $this->Db->Execute("set dateformat ymd");
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_oracle))
{
   $this->Db->Execute("alter session set nls_date_format = 'yyyy-mm-dd hh24:mi:ss'");
   $this->Db->Execute("alter session set nls_numeric_characters = '.,'");
} 
//
$this->NM_gera_log_insert("Scriptcase", "access");
/* Dados do menu em sessao */
$_SESSION['nm_menu'] = array('prod' => $str_root . $_SESSION['scriptcase']['app_menu']['glo_nm_path_prod'] . '/third/COOLjsMenu/',
                              'url' => $_SESSION['scriptcase']['app_menu']['glo_nm_path_prod'] . '/third/COOLjsMenu/');

if ((isset($nmgp_outra_jan) && $nmgp_outra_jan == "true") || (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'app_menu'))
{
    $_SESSION['sc_session'][1]['app_menu']['sc_outra_jan'] = true;
     unset($_SESSION['scriptcase']['sc_outra_jan']);
    $_SESSION['scriptcase']['sc_saida_app_menu'] = "javascript:window.close()";
}
/* Menu configuration variables */
$app_menu_menuData['iframe'] = TRUE;

if (!isset($_SESSION['scriptcase']['sc_apl_seg']))
{
    $_SESSION['scriptcase']['sc_apl_seg'] = array();
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("dashboard") . "/dashboard_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("dashboard") . "/dashboard_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['dashboard'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['dashboard'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Motel_Live_Data") . "/Motel_Live_Data_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Motel_Live_Data") . "/Motel_Live_Data_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['Motel_Live_Data']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['Motel_Live_Data'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['Motel_Live_Data'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Motel_Live_Data_Summary") . "/Motel_Live_Data_Summary_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Motel_Live_Data_Summary") . "/Motel_Live_Data_Summary_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['Motel_Live_Data_Summary']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['Motel_Live_Data_Summary'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['Motel_Live_Data_Summary'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Motel_InOut_Data") . "/Motel_InOut_Data_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Motel_InOut_Data") . "/Motel_InOut_Data_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['Motel_InOut_Data']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['Motel_InOut_Data'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['Motel_InOut_Data'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Room_Activity") . "/Room_Activity_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Room_Activity") . "/Room_Activity_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['Room_Activity']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['Room_Activity'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['Room_Activity'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Motel_Sales_Table_by_Room") . "/Motel_Sales_Table_by_Room_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Motel_Sales_Table_by_Room") . "/Motel_Sales_Table_by_Room_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['Motel_Sales_Table_by_Room']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['Motel_Sales_Table_by_Room'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['Motel_Sales_Table_by_Room'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Temp_Trash_Data") . "/Temp_Trash_Data_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Temp_Trash_Data") . "/Temp_Trash_Data_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['Temp_Trash_Data']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['Temp_Trash_Data'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['Temp_Trash_Data'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Acumulative_Cars_Counter_Chart_1_to_50") . "/Acumulative_Cars_Counter_Chart_1_to_50_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Acumulative_Cars_Counter_Chart_1_to_50") . "/Acumulative_Cars_Counter_Chart_1_to_50_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['Acumulative_Cars_Counter_Chart_1_to_50']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['Acumulative_Cars_Counter_Chart_1_to_50'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['Acumulative_Cars_Counter_Chart_1_to_50'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Acumulative_Cars_Counter_Chart_51_to_120") . "/Acumulative_Cars_Counter_Chart_51_to_120_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Acumulative_Cars_Counter_Chart_51_to_120") . "/Acumulative_Cars_Counter_Chart_51_to_120_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['Acumulative_Cars_Counter_Chart_51_to_120']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['Acumulative_Cars_Counter_Chart_51_to_120'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['Acumulative_Cars_Counter_Chart_51_to_120'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Year_Chart_Comparasion") . "/Year_Chart_Comparasion_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Year_Chart_Comparasion") . "/Year_Chart_Comparasion_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['Year_Chart_Comparasion']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['Year_Chart_Comparasion'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['Year_Chart_Comparasion'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("live_viewer") . "/live_viewer_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("live_viewer") . "/live_viewer_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['live_viewer']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['live_viewer'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['live_viewer'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Motel_Room_Configuration") . "/Motel_Room_Configuration_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Motel_Room_Configuration") . "/Motel_Room_Configuration_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['Motel_Room_Configuration']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['Motel_Room_Configuration'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['Motel_Room_Configuration'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("POS_Items_Class") . "/POS_Items_Class_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("POS_Items_Class") . "/POS_Items_Class_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['POS_Items_Class']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['POS_Items_Class'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['POS_Items_Class'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_Motel_Room_Comments") . "/grid_Motel_Room_Comments_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_Motel_Room_Comments") . "/grid_Motel_Room_Comments_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_Motel_Room_Comments']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['grid_Motel_Room_Comments'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['grid_Motel_Room_Comments'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Duplicate_Plate_Grid") . "/Duplicate_Plate_Grid_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Duplicate_Plate_Grid") . "/Duplicate_Plate_Grid_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['Duplicate_Plate_Grid']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['Duplicate_Plate_Grid'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['Duplicate_Plate_Grid'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Mottech_grid_sec_users") . "/Mottech_grid_sec_users_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Mottech_grid_sec_users") . "/Mottech_grid_sec_users_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['Mottech_grid_sec_users']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['Mottech_grid_sec_users'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['Mottech_grid_sec_users'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Mottech_grid_sec_apps") . "/Mottech_grid_sec_apps_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Mottech_grid_sec_apps") . "/Mottech_grid_sec_apps_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['Mottech_grid_sec_apps']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['Mottech_grid_sec_apps'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['Mottech_grid_sec_apps'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Mottech_grid_sec_groups") . "/Mottech_grid_sec_groups_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Mottech_grid_sec_groups") . "/Mottech_grid_sec_groups_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['Mottech_grid_sec_groups']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['Mottech_grid_sec_groups'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['Mottech_grid_sec_groups'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Mottech_search_sec_groups") . "/Mottech_search_sec_groups_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Mottech_search_sec_groups") . "/Mottech_search_sec_groups_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['Mottech_search_sec_groups']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['Mottech_search_sec_groups'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['Mottech_search_sec_groups'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Mottech_sync_apps") . "/Mottech_sync_apps_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Mottech_sync_apps") . "/Mottech_sync_apps_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['Mottech_sync_apps']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['Mottech_sync_apps'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['Mottech_sync_apps'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Mottech_change_pswd") . "/Mottech_change_pswd_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Mottech_change_pswd") . "/Mottech_change_pswd_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['Mottech_change_pswd']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['Mottech_change_pswd'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['Mottech_change_pswd'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("yesterday_sales_rpt") . "/yesterday_sales_rpt_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("yesterday_sales_rpt") . "/yesterday_sales_rpt_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['yesterday_sales_rpt']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['yesterday_sales_rpt'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['yesterday_sales_rpt'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("saturday_sales_rpt") . "/saturday_sales_rpt_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("saturday_sales_rpt") . "/saturday_sales_rpt_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['saturday_sales_rpt']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['saturday_sales_rpt'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['saturday_sales_rpt'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("sunday_sales_rpt") . "/sunday_sales_rpt_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("sunday_sales_rpt") . "/sunday_sales_rpt_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['sunday_sales_rpt']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['sunday_sales_rpt'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['sunday_sales_rpt'] = "on";
    } 
}
/* Menu items */

$sOutputBuffer = ob_get_contents();
ob_end_clean();

 $nm_var_lab[0] = "Dashboard";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[0]))
{
    $nm_var_lab[0] = mb_convert_encoding($nm_var_lab[0], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[1] = "Report's";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[1]))
{
    $nm_var_lab[1] = mb_convert_encoding($nm_var_lab[1], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[2] = "Mottech Live Data";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[2]))
{
    $nm_var_lab[2] = mb_convert_encoding($nm_var_lab[2], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[3] = "Summary Chart Report";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[3]))
{
    $nm_var_lab[3] = mb_convert_encoding($nm_var_lab[3], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[4] = "Time In & Out Counter";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[4]))
{
    $nm_var_lab[4] = mb_convert_encoding($nm_var_lab[4], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[5] = "Room Activity Report";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[5]))
{
    $nm_var_lab[5] = mb_convert_encoding($nm_var_lab[5], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[6] = "Sales by Room";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[6]))
{
    $nm_var_lab[6] = mb_convert_encoding($nm_var_lab[6], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[7] = "Trash Data Report";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[7]))
{
    $nm_var_lab[7] = mb_convert_encoding($nm_var_lab[7], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[8] = "Charts";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[8]))
{
    $nm_var_lab[8] = mb_convert_encoding($nm_var_lab[8], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[9] = "Chart from 1 to 50";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[9]))
{
    $nm_var_lab[9] = mb_convert_encoding($nm_var_lab[9], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[10] = "Chart from 51 to 120";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[10]))
{
    $nm_var_lab[10] = mb_convert_encoding($nm_var_lab[10], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[11] = "Sales by Month and Shift";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[11]))
{
    $nm_var_lab[11] = mb_convert_encoding($nm_var_lab[11], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[12] = "Mottech Live Viewer";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[12]))
{
    $nm_var_lab[12] = mb_convert_encoding($nm_var_lab[12], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[13] = "Prices";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[13]))
{
    $nm_var_lab[13] = mb_convert_encoding($nm_var_lab[13], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[14] = "Room Configuration";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[14]))
{
    $nm_var_lab[14] = mb_convert_encoding($nm_var_lab[14], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[15] = "POS Options";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[15]))
{
    $nm_var_lab[15] = mb_convert_encoding($nm_var_lab[15], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[16] = "Work with Prices";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[16]))
{
    $nm_var_lab[16] = mb_convert_encoding($nm_var_lab[16], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[17] = "Plate Options";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[17]))
{
    $nm_var_lab[17] = mb_convert_encoding($nm_var_lab[17], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[18] = "Plate Report";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[18]))
{
    $nm_var_lab[18] = mb_convert_encoding($nm_var_lab[18], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[19] = "Duplicate Plate";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[19]))
{
    $nm_var_lab[19] = mb_convert_encoding($nm_var_lab[19], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[20] = "Exit";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[20]))
{
    $nm_var_lab[20] = mb_convert_encoding($nm_var_lab[20], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[0] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[0]))
{
    $nm_var_hint[0] = mb_convert_encoding($nm_var_hint[0], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[1] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[1]))
{
    $nm_var_hint[1] = mb_convert_encoding($nm_var_hint[1], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[2] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[2]))
{
    $nm_var_hint[2] = mb_convert_encoding($nm_var_hint[2], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[3] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[3]))
{
    $nm_var_hint[3] = mb_convert_encoding($nm_var_hint[3], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[4] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[4]))
{
    $nm_var_hint[4] = mb_convert_encoding($nm_var_hint[4], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[5] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[5]))
{
    $nm_var_hint[5] = mb_convert_encoding($nm_var_hint[5], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[6] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[6]))
{
    $nm_var_hint[6] = mb_convert_encoding($nm_var_hint[6], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[7] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[7]))
{
    $nm_var_hint[7] = mb_convert_encoding($nm_var_hint[7], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[8] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[8]))
{
    $nm_var_hint[8] = mb_convert_encoding($nm_var_hint[8], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[9] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[9]))
{
    $nm_var_hint[9] = mb_convert_encoding($nm_var_hint[9], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[10] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[10]))
{
    $nm_var_hint[10] = mb_convert_encoding($nm_var_hint[10], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[11] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[11]))
{
    $nm_var_hint[11] = mb_convert_encoding($nm_var_hint[11], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[12] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[12]))
{
    $nm_var_hint[12] = mb_convert_encoding($nm_var_hint[12], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[13] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[13]))
{
    $nm_var_hint[13] = mb_convert_encoding($nm_var_hint[13], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[14] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[14]))
{
    $nm_var_hint[14] = mb_convert_encoding($nm_var_hint[14], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[15] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[15]))
{
    $nm_var_hint[15] = mb_convert_encoding($nm_var_hint[15], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[16] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[16]))
{
    $nm_var_hint[16] = mb_convert_encoding($nm_var_hint[16], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[17] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[17]))
{
    $nm_var_hint[17] = mb_convert_encoding($nm_var_hint[17], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[18] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[18]))
{
    $nm_var_hint[18] = mb_convert_encoding($nm_var_hint[18], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[19] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[19]))
{
    $nm_var_hint[19] = mb_convert_encoding($nm_var_hint[19], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[20] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[20]))
{
    $nm_var_hint[20] = mb_convert_encoding($nm_var_hint[20], $_SESSION['scriptcase']['charset'], "UTF-8");
}
$saida_apl = $_SESSION['scriptcase']['sc_saida_app_menu'];
$useragent=$_SERVER['HTTP_USER_AGENT'];
$_SESSION['scriptcase']['menu_mobile'] = "";
if($this->force_mobile || preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
{
    $_SESSION['scriptcase']['menu_mobile'] = "app_menu";
    include('app_menu_mobile.php');
    exit;
}
/* HTML header */
if ($app_menu_menuData['iframe'])
{
    $app_menu_menuData['height'] = '100%';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?> style="height: 100%">
<head>
 <title>Mottech Web Application</title>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_btngrp.css<?php if (@is_file($this->path_css . $this->str_schema_all . '_btngrp.css')) { echo '?scp=' . md5($this->path_css . $this->str_schema_all . '_btngrp.css'); } ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menuH.css<?php if (@is_file($this->path_css . $this->str_schema_all . '_menuH.css')) { echo '?scp=' . md5($this->path_css . $this->str_schema_all . '_menuH.css'); } ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $Str_btn_css ?>" /> 
<link rel="stylesheet" type="text/css" href="../_lib/css/_menuTheme/scriptcase_Mac_Black_hor.css<?php if (@is_file($this->path_css . '_menuTheme/' . scriptcase_Mac_Black . '_' . hor . '.css')) { echo '?scp=' . md5($this->path_css . '_menuTheme/' . scriptcase_Mac_Black . '_' . hor . '.css'); } ?>" />
</head>
<body style="margin: 0px; height: 100%" scroll="no">
<?php

if ('' != $sOutputBuffer)
{
    echo $sOutputBuffer;
}

?>
<?php 
        $NM_scr_iframe = (isset($_POST['hid_scr_iframe'])) ? $_POST['hid_scr_iframe'] : "";   
?> 
<?php
}
else
{
    $app_menu_menuData['height'] = '30px';
}

/* JS files */
?>
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['app_menu']['glo_nm_path_prod']; ?>/third/jquery/js/jquery.js"></script>
<script>
$(document).ready(function() {
});
</script>
<?php

$app_menu_menuData['data'] = array();
if (isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['dashboard']) == "on")
{
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[0] . "",
        'level'    => "0",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_23&sc_apl_menu=dashboard&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[0] . "",
        'id'       => "item_23",
        'icon'     => "monitor_test_card_24.png",
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_23",
        'disabled' => "N",
    );
}
$app_menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[1] . "",
    'level'    => "0",
    'link'     => "#",
    'hint'     => "" . $nm_var_hint[1] . "",
    'id'       => "item_36",
    'icon'     => "printer2_24.png",
    'target'   => "",
    'sc_id'    => "item_36",
    'disabled' => "N",
);
if (isset($_SESSION['scriptcase']['sc_apl_seg']['Motel_Live_Data']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Motel_Live_Data']) == "on")
{
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[2] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_8&sc_apl_menu=Motel_Live_Data&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[2] . "",
        'id'       => "item_8",
        'icon'     => "moneybag2_24.png",
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_8",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['Motel_Live_Data_Summary']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Motel_Live_Data_Summary']) == "on")
{
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[3] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_41&sc_apl_menu=Motel_Live_Data_Summary&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[3] . "",
        'id'       => "item_41",
        'icon'     => "document_chart_24.png",
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_41",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['Motel_InOut_Data']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Motel_InOut_Data']) == "on")
{
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[4] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_37&sc_apl_menu=Motel_InOut_Data&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[4] . "",
        'id'       => "item_37",
        'icon'     => "clock_preferences_24.png",
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_37",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['Room_Activity']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Room_Activity']) == "on")
{
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[5] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_42&sc_apl_menu=Room_Activity&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[5] . "",
        'id'       => "item_42",
        'icon'     => "document_attachment_24.png",
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_42",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['Motel_Sales_Table_by_Room']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Motel_Sales_Table_by_Room']) == "on")
{
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[6] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_48&sc_apl_menu=Motel_Sales_Table_by_Room&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[6] . "",
        'id'       => "item_48",
        'icon'     => "moneybag2_24.png",
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_48",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['Temp_Trash_Data']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Temp_Trash_Data']) == "on")
{
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[7] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_45&sc_apl_menu=Temp_Trash_Data&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[7] . "",
        'id'       => "item_45",
        'icon'     => "jar_bean_delete_24.png",
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_45",
        'disabled' => "N",
    );
}
$app_menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[8] . "",
    'level'    => "0",
    'link'     => "#",
    'hint'     => "" . $nm_var_hint[8] . "",
    'id'       => "item_38",
    'icon'     => "chart_pie2_24.png",
    'target'   => "",
    'sc_id'    => "item_38",
    'disabled' => "N",
);
if (isset($_SESSION['scriptcase']['sc_apl_seg']['Acumulative_Cars_Counter_Chart_1_to_50']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Acumulative_Cars_Counter_Chart_1_to_50']) == "on")
{
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[9] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_39&sc_apl_menu=Acumulative_Cars_Counter_Chart_1_to_50&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[9] . "",
        'id'       => "item_39",
        'icon'     => "check_24.png",
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_39",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['Acumulative_Cars_Counter_Chart_51_to_120']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Acumulative_Cars_Counter_Chart_51_to_120']) == "on")
{
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[10] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_40&sc_apl_menu=Acumulative_Cars_Counter_Chart_51_to_120&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[10] . "",
        'id'       => "item_40",
        'icon'     => "check_24.png",
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_40",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['Year_Chart_Comparasion']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Year_Chart_Comparasion']) == "on")
{
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[11] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_47&sc_apl_menu=Year_Chart_Comparasion&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[11] . "",
        'id'       => "item_47",
        'icon'     => "calendar_52_24.png",
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_47",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['live_viewer']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['live_viewer']) == "on")
{
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[12] . "",
        'level'    => "0",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_9&sc_apl_menu=live_viewer&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[12] . "",
        'id'       => "item_9",
        'icon'     => "eye_24.png",
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_9",
        'disabled' => "N",
    );
}
$app_menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[13] . "",
    'level'    => "0",
    'link'     => "#",
    'hint'     => "" . $nm_var_hint[13] . "",
    'id'       => "item_10",
    'icon'     => "symbol_dollar_24.png",
    'target'   => "",
    'sc_id'    => "item_10",
    'disabled' => "N",
);
if (isset($_SESSION['scriptcase']['sc_apl_seg']['Motel_Room_Configuration']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Motel_Room_Configuration']) == "on")
{
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[14] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_12&sc_apl_menu=Motel_Room_Configuration&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[14] . "",
        'id'       => "item_12",
        'icon'     => "",
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_12",
        'disabled' => "N",
    );
}
$app_menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[15] . "",
    'level'    => "0",
    'link'     => "#",
    'hint'     => "" . $nm_var_hint[15] . "",
    'id'       => "item_19",
    'icon'     => "monitor_preferences_24.png",
    'target'   => "",
    'sc_id'    => "item_19",
    'disabled' => "N",
);
if (isset($_SESSION['scriptcase']['sc_apl_seg']['POS_Items_Class']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['POS_Items_Class']) == "on")
{
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[16] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_21&sc_apl_menu=POS_Items_Class&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[16] . "",
        'id'       => "item_21",
        'icon'     => "",
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_21",
        'disabled' => "N",
    );
}
$app_menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[17] . "",
    'level'    => "0",
    'link'     => "#",
    'hint'     => "" . $nm_var_hint[17] . "",
    'id'       => "item_20",
    'icon'     => "barcode_24.png",
    'target'   => "",
    'sc_id'    => "item_20",
    'disabled' => "N",
);
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_Motel_Room_Comments']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_Motel_Room_Comments']) == "on")
{
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[18] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_22&sc_apl_menu=grid_Motel_Room_Comments&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[18] . "",
        'id'       => "item_22",
        'icon'     => "",
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_22",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['Duplicate_Plate_Grid']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Duplicate_Plate_Grid']) == "on")
{
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[19] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_43&sc_apl_menu=Duplicate_Plate_Grid&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $nm_var_hint[19] . "",
        'id'       => "item_43",
        'icon'     => "",
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_43",
        'disabled' => "N",
    );
}
$app_menu_menuData['data'][] = array(
    'label'    => "" . $this->Nm_lang['lang_menu_security'] . "",
    'level'    => "0",
    'link'     => "#",
    'hint'     => "" . $this->Nm_lang['lang_menu_security'] . "",
    'id'       => "item_27",
    'icon'     => "lock_24.png",
    'target'   => "",
    'sc_id'    => "item_27",
    'disabled' => "N",
);
if (isset($_SESSION['scriptcase']['sc_apl_seg']['Mottech_grid_sec_users']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Mottech_grid_sec_users']) == "on")
{
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_users'] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_28&sc_apl_menu=Mottech_grid_sec_users&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $this->Nm_lang['lang_list_users'] . "",
        'id'       => "item_28",
        'icon'     => "",
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_28",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['Mottech_grid_sec_apps']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Mottech_grid_sec_apps']) == "on")
{
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_apps'] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_29&sc_apl_menu=Mottech_grid_sec_apps&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $this->Nm_lang['lang_list_apps'] . "",
        'id'       => "item_29",
        'icon'     => "",
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_29",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['Mottech_grid_sec_groups']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Mottech_grid_sec_groups']) == "on")
{
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_groups'] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_30&sc_apl_menu=Mottech_grid_sec_groups&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $this->Nm_lang['lang_list_groups'] . "",
        'id'       => "item_30",
        'icon'     => "",
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_30",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['Mottech_search_sec_groups']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Mottech_search_sec_groups']) == "on")
{
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_apps_x_groups'] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_31&sc_apl_menu=Mottech_search_sec_groups&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $this->Nm_lang['lang_list_apps_x_groups'] . "",
        'id'       => "item_31",
        'icon'     => "",
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_31",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['Mottech_sync_apps']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Mottech_sync_apps']) == "on")
{
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_sync_apps'] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_32&sc_apl_menu=Mottech_sync_apps&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $this->Nm_lang['lang_list_sync_apps'] . "",
        'id'       => "item_32",
        'icon'     => "",
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_32",
        'disabled' => "N",
    );
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['Mottech_change_pswd']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Mottech_change_pswd']) == "on")
{
    $app_menu_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_change_pswd'] . "",
        'level'    => "1",
        'link'     => "app_menu_form_php.php?sc_item_menu=item_33&sc_apl_menu=Mottech_change_pswd&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "",
        'hint'     => "" . $this->Nm_lang['lang_change_pswd'] . "",
        'id'       => "item_33",
        'icon'     => "",
        'target'   => " target=\"" . $this->app_menu_target('_self') . "\"",
        'sc_id'    => "item_33",
        'disabled' => "N",
    );
}
$app_menu_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[20] . "",
    'level'    => "0",
    'link'     => "$saida_apl",
    'hint'     => "" . $nm_var_hint[20] . "",
    'id'       => "item_35",
    'icon'     => "door2_open_24.png",
    'target'   => "",
    'sc_id'    => "item_35",
    'disabled' => "N",
);

if (isset($_SESSION['scriptcase']['sc_def_menu']['app_menu']))
{
    $arr_menu_usu = $this->nm_arr_menu_recursiv($_SESSION['scriptcase']['sc_def_menu']['app_menu']);
    $this->nm_gera_menus($str_menu_usu, $arr_menu_usu, 1, 'app_menu');
    $app_menu_menuData['data'] = $str_menu_usu;
}
if (is_file("app_menu_help.txt"))
{
    $Arq_WebHelp = file("app_menu_help.txt"); 
    if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
    {
        $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
        $Tmp = explode(";", $Arq_WebHelp[0]); 
        foreach ($Tmp as $Cada_help)
        {
            $Tmp1 = explode(":", $Cada_help); 
            if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "menu" && is_file($str_root . $path_help . $Tmp1[1]))
            {
                $app_menu_menuData['data'][] = array(
                    'label'    => "" . $this->Nm_lang['lang_btns_help_hint'] . "",
                    'level'    => "0",
                    'link'     => "" . $path_help . $Tmp1[1] . "",
                    'hint'     => "" . $this->Nm_lang['lang_btns_help_hint'] . "",
                    'id'       => "item_Help",
                    'icon'     => "",
                    'target'   => "" . $this->app_menu_target('_blank') . "",
                    'sc_id'    => "item_Help",
                    'disabled' => "N",
                );
            }
        }
    }
}

if (isset($_SESSION['scriptcase']['sc_menu_del']['app_menu']) && !empty($_SESSION['scriptcase']['sc_menu_del']['app_menu']))
{
    $nivel = 0;
    $exclui_menu = false;
    foreach ($app_menu_menuData['data'] as $i_menu => $cada_menu)
    {
       if (in_array($cada_menu['id'], $_SESSION['scriptcase']['sc_menu_del']['app_menu']))
       {
          $nivel = $cada_menu['level'];
          $exclui_menu = true;
          unset($app_menu_menuData['data'][$i_menu]);
       }
       elseif ( empty($cada_menu) || ($exclui_menu && $nivel < $cada_menu['level']))
       {
          unset($app_menu_menuData['data'][$i_menu]);
       }
       else
       {
          $exclui_menu = false;
       }
    }
    $Temp_menu = array();
    foreach ($app_menu_menuData['data'] as $i_menu => $cada_menu)
    {
        $Temp_menu[] = $cada_menu;
    }
    $app_menu_menuData['data'] = $Temp_menu;
}

if (isset($_SESSION['scriptcase']['sc_menu_disable']['app_menu']) && !empty($_SESSION['scriptcase']['sc_menu_disable']['app_menu']))
{
    $disable_menu = false;
    foreach ($app_menu_menuData['data'] as $i_menu => $cada_menu)
    {
       if (in_array($cada_menu['id'], $_SESSION['scriptcase']['sc_menu_disable']['app_menu']))
       {
          $nivel = $cada_menu['level'];
          $disable_menu = true;
          $app_menu_menuData['data'][$i_menu]['disabled'] = 'Y';
       }
       elseif (!empty($cada_menu) && $disable_menu && $nivel < $cada_menu['level'])
       { 
          $app_menu_menuData['data'][$i_menu]['disabled'] = 'Y';
       }
       elseif (!empty($cada_menu))
       {
          $disable_menu = false;
       }
    }
}

$flag = 1;
while ($flag == 1)
{
    $flag = 0;
    foreach ($app_menu_menuData['data'] as $chave => $cada_menu)
    {
        if (!empty($cada_menu))
        {
            if (isset($app_menu_menuData['data'][$chave + 1]) && !empty($app_menu_menuData['data'][$chave + 1]))
            {
                if ($app_menu_menuData['data'][$chave]['link'] == "#")
                {
                    if ($app_menu_menuData['data'][$chave]['level'] >= $app_menu_menuData['data'][$chave + 1]['level'] )
                    {
                        unset($app_menu_menuData['data'][$chave]);
                        $flag = 1;
                    }
                }
            }
            elseif ($app_menu_menuData['data'][$chave]['link'] == "#")
            {
                unset($app_menu_menuData['data'][$chave]);
            }
        }
    }
    $Temp_menu = array();
    foreach ($app_menu_menuData['data'] as $i_menu => $cada_menu)
    {
        $Temp_menu[] = $cada_menu;
    }
    $app_menu_menuData['data'] = $Temp_menu;
}

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
<?php
$larg_table = "100%";
$col_span   = "";
?>
<table align="right" style="border-collapse: collapse; border-width: 0px; height: 100%; width: <?php echo $larg_table; ?>">
  <tr>
    <td style="padding: 0px" <?php echo $col_span; ?>>
<style>
#lin1_col1 { font-size:22px; width:500px; color: #FFFFFF; }
#lin1_col2 { font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:right; color: #FFFFFF;  }
#lin2_col1 { font-family:Arial, Helvetica, sans-serif; font-weight:bold; font-size:15px; }
#lin2_col2 { font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:right; color: #FFFFFF;  }

</style>

<table width="100%" height="67px" class="scMenuHHeader">
        <tr>
                <td width="5px"></td>
        <td width="67px" class="scMenuHHeaderFont">   <IMG SRC="<?php echo $path_imag_cab ?>/sys__NM__divrimini2.png" BORDER="0"/></td>
               <td class="scMenuHHeaderFont"><span id="lin1_col1"><?php echo "Mottech Web Application" ?></span><br /><span id="lin2_col1"></span></td>
               <td align="right" class="scMenuHHeaderFont"><span  id="lin1_col2"><?php echo "Welcome: " . $_SESSION['usr_login'] . "" ?></span><br /><span id="lin2_col2"></span></td>
        <td width="5px"></td>
    </tr>
</table>
    </td>
  </tr>
  <tr class="scMenuHTableCssAlt">
      <td align="left" valign="top" class="scMenuLine" style="width:100%; height:30;padding: 0px;">
<div id="scScrollFix" style="height: 1px"></div>
<script type="text/javascript">
function fnScrollFix() {
 var txt = document.getElementById("scScrollFix").innerHTML;
 if ("&nbsp;" == txt) { txt = "&nbsp;&nbsp;"; } else { txt = "&nbsp;"; }
 document.getElementById("scScrollFix").innerHTML = txt;
 setTimeout("fnScrollFix()", 500);
}
setTimeout("fnScrollFix()", 500);
</script>
<?php
echo $this->app_menu_escreveMenu($app_menu_menuData['data']);
?>
<?php
/* Iframe control */
if ($app_menu_menuData['iframe'])
{
?>
    </td>
  </tr>
<?php echo $this->nm_show_toolbarmenu('', $saida_apl, $app_menu_menuData); ?><?php echo $this->nm_gera_degrade(1, $bg_line_degrade, $path_imag_cab); ?>  <tr>
    <td style="border-width: 1px; height: 100%; padding: 0px">
      <iframe id="iframe_app_menu" name="app_menu_iframe" frameborder="0" class="scMenuIframe"  src="<?php echo ($NM_scr_iframe != "" ? $NM_scr_iframe : $app_menu_menuData['url']['link'] . $this->tab_grupo['0']); ?><?php echo ($NM_scr_iframe != "" ? "" :"" . SC_dir_app_name('dashboard') . "/dashboard.php?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=1&script_case_session=" . session_id() ); ?>" ></iframe>
<?php
}
?>
    </td>
  </tr>
  <tr>
    <td style="padding: 0px">
<style>
#rod_col1 { margin:0px; padding: 3px 0px 0px 5px; float:left; overflow:hidden;}
#rod_col2 { margin:0px; padding: 3px 5px 0px 0px; float:right; overflow:hidden; text-align:right;}

</style>

<div style="width: 100%; height:20px;" class="scMenuHFooter">
        <span class="scMenuHFooterFont" id="rod_col1"><?php echo "Version 1.0.0" ?></span>
        <span class="scMenuHFooterFont" id="rod_col2"></span>
</div>    </td>
  </tr>
</table>
</body>
</html>
<?php


}

/* Target control */
function app_menu_escreveMenu($arr_menu)
{
    $last      = '';
    $itemClass = ' topfirst';
    $subSize   = 2;
    $subCount  = array();
    $tabSpace  = 1;
    $intMult   = 2;
    $aMenuItemList = array();
    foreach ($arr_menu as $ind => $resto)
    {
        $aMenuItemList[] = $resto;
    }
?>
<ul id="css3menu1" class="topmenu">
<?php
    for ($i = 0; $i < sizeof($aMenuItemList); $i++) {
        if (0 == $aMenuItemList[$i]['level']) {
            $last = $aMenuItemList[$i]['id'];
        }
    }
    for ($i = 0; $i < sizeof($aMenuItemList); $i++) {
        if ($last == $aMenuItemList[$i]['id']) {
            $itemClass = ' toplast';
        }
        $htmlClass = '';
        if (0 == $aMenuItemList[$i]['level']) {
            $htmlClass = ' class="topmenu' . $itemClass;
            if ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] < $aMenuItemList[$i + 1]['level']) {
                $htmlClass .= ' toproot';
            }
            $htmlClass .= '"';
        }
?>
<?php echo str_repeat(' ', $tabSpace * $intMult); ?><li<?php echo $htmlClass; ?>>
<?php
        $tabSpace++;
        if ('' != $aMenuItemList[$i]['icon'] && file_exists($this->path_imag_apl . "/" . $aMenuItemList[$i]['icon'])) {
            $iconHtml = '<img src="../_lib/img/' . $aMenuItemList[$i]['icon'] . '" />';
        }
        else {
            $iconHtml = '';
        }
        $sDisabledClass = '';
        if ('Y' == $aMenuItemList[$i]['disabled']) {
            $aMenuItemList[$i]['link']   = '#';
            $aMenuItemList[$i]['target'] = '';
            $sDisabledClass               = 0 == $aMenuItemList[$i]['level'] ? ' class="scdisabledmain"' : ' class="scdisabledsub"';
        }
        if (empty($aMenuItemList[$i]['link'])) {
            $aMenuItemList[$i]['link']   = '#';
        }
        if ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] < $aMenuItemList[$i + 1]['level']) {
?>
<?php echo str_repeat(' ', $tabSpace * $intMult); ?><a href="<?php echo $aMenuItemList[$i]['link']; ?>" id="<?php echo $aMenuItemList[$i]['id']; ?>" title="<?php echo $aMenuItemList[$i]['hint']; ?>"<?php echo $aMenuItemList[$i]['target']; ?>><span<?php echo $sDisabledClass; ?>><?php echo $iconHtml . $aMenuItemList[$i]['label']; ?></span></a>
<?php
            if (0 != $subSize && 0 < $aMenuItemList[$i + 1]['level']) {
?>
<?php echo str_repeat(' ', $tabSpace * $intMult); ?><!--div class="submenu" abre-->
<?php
                $tabSpace++;
?>
<?php echo str_repeat(' ', $tabSpace * $intMult); ?><!--div class="column" abre-->
<?php
                $tabSpace++;
            }
?>
<?php echo str_repeat(' ', $tabSpace * $intMult); ?><ul>
<?php
            $tabSpace++;
        }
        else {
?>
<?php echo str_repeat(' ', $tabSpace * $intMult); ?><a href="<?php echo $aMenuItemList[$i]['link']; ?>" id="<?php echo $aMenuItemList[$i]['id']; ?>" title="<?php echo $aMenuItemList[$i]['hint']; ?>"<?php echo $aMenuItemList[$i]['target'] . $sDisabledClass; ?>><?php echo $iconHtml . $aMenuItemList[$i]['label']; ?></a>
<?php
        }
        if (($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] == $aMenuItemList[$i + 1]['level']) || 
            ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > $aMenuItemList[$i + 1]['level']) ||
            (!$aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > 0) ||
            (!$aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] == 0)) {
            $tabSpace--;
?>
<?php echo str_repeat(' ', $tabSpace * $intMult); ?></li>
<?php
            if (0 != $subSize && 0 < $aMenuItemList[$i]['level']) {
                if (!isset($subCount[ $aMenuItemList[$i]['level'] ])) {
                    $subCount[ $aMenuItemList[$i]['level'] ] = 0;
                }
                $subCount[ $aMenuItemList[$i]['level'] ]++;
            }
            if ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > $aMenuItemList[$i + 1]['level']) {
                for ($j = 0; $j < $aMenuItemList[$i]['level'] - $aMenuItemList[$i + 1]['level']; $j++) {
                    unset($subCount[ $aMenuItemList[$i]['level'] - $j]);
                    $tabSpace--;
?>
<?php echo str_repeat(' ', $tabSpace * $intMult); ?></ul>
<?php
                    if (0 != $subSize && 0 < $aMenuItemList[$i]['level']) {
                        $tabSpace--;
?>
<?php echo str_repeat(' ', $tabSpace * $intMult); ?><!--/div class="column" fecha-->
<?php
                        $tabSpace--;
?>
<?php echo str_repeat(' ', $tabSpace * $intMult); ?><!--/div class="submenu" fecha-->
<?php
                    }
                    $tabSpace--;
?>
<?php echo str_repeat(' ', $tabSpace * $intMult); ?></li>
<?php
                }
            }
            elseif (!$aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > 0) {
                for ($j = 0; $j < $aMenuItemList[$i]['level']; $j++) {
                    unset($subCount[ $aMenuItemList[$i]['level'] - $j]);
                    $tabSpace--;
?>
<?php echo str_repeat(' ', $tabSpace * $intMult); ?></ul>
<?php
                    if (0 != $subSize && 0 < $aMenuItemList[$i]['level']) {
                        $tabSpace--;
?>
<?php echo str_repeat(' ', $tabSpace * $intMult); ?><!--/div class="column" fecha-->
<?php
                        $tabSpace--;
?>
<?php echo str_repeat(' ', $tabSpace * $intMult); ?><!--/div class="submenu" fecha-->
<?php
                    }
                    $tabSpace--;
?>
<?php echo str_repeat(' ', $tabSpace * $intMult); ?></li>
<?php
                }
            }
            if ($subSize == $subCount[ $aMenuItemList[$i]['level'] ]) {
                $subCount[ $aMenuItemList[$i]['level'] ] = 0;
?>
<?php echo str_repeat(' ', $tabSpace * $intMult); ?><!--quebra-->
<?php
            }
        }
        $itemClass = '';
    }
?>
</ul>
<?php
}
function app_menu_target($str_target)
{
    global $app_menu_menuData;
    if ('_blank' == $str_target)
    {
        return '_blank';
    }
    elseif ('_parent' == $str_target)
    {
        return '';
    }
    elseif ($app_menu_menuData['iframe'])
    {
        return 'app_menu_iframe';
    }
    else
    {
        return $str_target;
    }
}

function nm_show_toolbarmenu($col_span, $saida_apl, $app_menu_menuData)
{
    ?>
    <tr id="id_toolbar">
        <td class="scMenuHTableCss" align="left" style="margin:0px; padding:0px;" <?php echo $col_span; ?>>
            <div class="scMenuToolbar">
            <?php
                //btn btn_1
                  if (isset($_SESSION['scriptcase']['sc_apl_seg']['yesterday_sales_rpt']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['yesterday_sales_rpt']) == "on")
                  {
                if ($this->nmgp_botoes['btn_1'] == "on")
                {
                    $has_children_on = false;
                    echo nmButtonOutput($this->arr_buttons, "btn_1", "app_menu_form_php.php?sc_item_menu=btn_1&sc_apl_menu=yesterday_sales_rpt&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "", "app_menu_form_php.php?sc_item_menu=btn_1&sc_apl_menu=yesterday_sales_rpt&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "", "btn_1", "", "Yesterday Rpt", "", "absmiddle", "", "0px", $this->path_botoes, "", "", "", "", "", "only_text", "text_right", "1", "" . $this->app_menu_target('_self') . "");
                }

                      echo "<img src='" . $path_imag_cab . "/transparent.png' border=\"0\" class=\"scMenuToolbarPadding\" style=\"width:1px; height:1px;\">";
                  }
                //btn btn_2
                  if (isset($_SESSION['scriptcase']['sc_apl_seg']['saturday_sales_rpt']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['saturday_sales_rpt']) == "on")
                  {
                if ($this->nmgp_botoes['btn_2'] == "on")
                {
                    $has_children_on = false;
                    echo nmButtonOutput($this->arr_buttons, "btn_2", "app_menu_form_php.php?sc_item_menu=btn_2&sc_apl_menu=saturday_sales_rpt&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "", "app_menu_form_php.php?sc_item_menu=btn_2&sc_apl_menu=saturday_sales_rpt&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "", "btn_2", "", "Saturday Rpt", "", "absmiddle", "", "0px", $this->path_botoes, "", "", "", "", "", "only_text", "text_right", "1", "" . $this->app_menu_target('_self') . "");
                }

                      echo "<img src='" . $path_imag_cab . "/transparent.png' border=\"0\" class=\"scMenuToolbarPadding\" style=\"width:1px; height:1px;\">";
                  }
                //btn btn_3
                  if (isset($_SESSION['scriptcase']['sc_apl_seg']['sunday_sales_rpt']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['sunday_sales_rpt']) == "on")
                  {
                if ($this->nmgp_botoes['btn_3'] == "on")
                {
                    $has_children_on = false;
                    echo nmButtonOutput($this->arr_buttons, "btn_3", "app_menu_form_php.php?sc_item_menu=btn_3&sc_apl_menu=sunday_sales_rpt&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "", "app_menu_form_php.php?sc_item_menu=btn_3&sc_apl_menu=sunday_sales_rpt&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . "", "btn_3", "", "Sunday Rpt", "", "absmiddle", "", "0px", $this->path_botoes, "", "", "", "", "", "only_text", "text_right", "1", "" . $this->app_menu_target('_self') . "");
                }

                      echo "<img src='" . $path_imag_cab . "/transparent.png' border=\"0\" class=\"scMenuToolbarPadding\" style=\"width:1px; height:1px;\">";
                  }
            ?>
            </div>
        </td>
    </tr>
    <?php
}

   function nm_prot_aspas($str_item)
   {
       return str_replace('"', '\"', $str_item);
   }

   function nm_gera_menus(&$str_line_ret, $arr_menu_usu, $int_level, $nome_aplicacao)
   {
       global $app_menu_menuData; 
       foreach ($arr_menu_usu as $arr_item)
       {
           $str_line   = array();
           $str_line['label']    = $this->nm_prot_aspas($arr_item['label']);
           $str_line['level']    = $int_level - 1;
           $str_line['link']     = "";
           $nome_apl = $arr_item['link'];
           $pos = strrpos($nome_apl, "/");
           if ($pos !== false)
           {
               $nome_apl = substr($nome_apl, $pos + 1);
           }
           if ('' != $arr_item['link'])
           {
               if ($arr_item['target'] == '_parent')
               {
                    $str_line['link'] = "app_menu_form_php.php?sc_item_menu=" . $arr_item['id'] . "&sc_apl_menu=" . $nome_apl . "&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . ""; 
               }
               else
               {
                    $str_line['link'] = "app_menu_form_php.php?sc_item_menu=" . $arr_item['id'] . "&sc_apl_menu=" . $nome_apl . "&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . ""; 
               }
           }
           elseif ($arr_item['target'] == '_parent')
           {
           }
           $str_line['hint']     = ('' != $arr_item['hint']) ? $this->nm_prot_aspas($arr_item['hint']) : '';
           $str_line['id']       = $arr_item['id'];
           $str_line['icon']     = ('' != $arr_item['icon_on']) ? $arr_item['icon_on'] : '';
           if ('' == $arr_item['link'] && $arr_item['target'] == '_parent')
           {
               $str_line['target'] = '_parent';
           }
           else
           {
                $str_line['target'] = ('' != $arr_item['target'] && '' != $arr_item['link']) ?  $this->app_menu_target( $arr_item['target']) : "_self"; 
           }
           $str_line['target']   = ' target="' . $str_line['target']  . '" ';
           $str_line['sc_id']    = $arr_item['id'];
           $str_line['disabled'] = "N";
           $str_line_ret[] = $str_line;
           if (!empty($arr_item['menu_itens']))
           {
               $this->nm_gera_menus($str_line_ret, $arr_item['menu_itens'], $int_level + 1, $nome_aplicacao);
           }
       }
   }

   function nm_arr_menu_recursiv($arr, $id_pai = '')
   {
         $arr_return = array();
         foreach ($arr as $id_menu => $arr_menu)
         {
             if ($id_pai == $arr_menu['pai']) 
             {
                 $arr_return[] = array('label'      => $arr_menu['label'],
                                        'link'       => $arr_menu['link'],
                                        'target'     => $arr_menu['target'],
                                        'icon_on'    => $arr_menu['icon'],
                                        'hint'       => $arr_menu['hint'],
                                        'id'         => $id_menu,
                                        'menu_itens' => $this->nm_arr_menu_recursiv($arr, $id_menu));
             }
         }
         return $arr_return;
   }
   //1 horizontal
   //2 vertical
   function nm_gera_degrade($menu_opc, $bg_line_degrade, $path_imag_cab)
   {
       $str_retorno = "";
       //have bg color degrade
       if(!empty($bg_line_degrade) && count($bg_line_degrade)>0)
       {
           if($menu_opc == 1)
           {
               foreach($bg_line_degrade as $bg_color)
               {
                   if(!empty($bg_color))
                   {
                       $str_retorno .= "<tr style=\"height:1px; padding: 0px;\">\r\n";
                       $str_retorno .= "  <td style=\"height:1px; padding: 0px;\" bgcolor=\"". $bg_color ."\"><img src='<?php echo $path_imag_cab; ?>/transparent.png' border=\"0\" style=\"height:1px;\"></td>\r\n";
                       $str_retorno .= "</tr>\r\n";
                   }
               }
           }
           elseif($menu_opc == 2)
           {
               foreach($bg_line_degrade as $bg_color)
               {
                   if(!empty($bg_color))
                   {
                       $str_retorno .= "<td style=\"width:1px; padding: 0px;\" bgcolor=\"". $bg_color ."\">\r\n";
                       $str_retorno .= "<img src='<?php echo $path_imag_cab; ?>/transparent.png' border=\"0\" style=\"width:1px;\">\r\n";
                       $str_retorno .= "</td>\r\n";
                   }
               }
           }
       }
       return $str_retorno;
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
       $_SESSION['scriptcase']['reg_conf']['html_dir_only'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] : "";
       $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit'] : "1";
       $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'] : "1";
   }
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
           $comando = "INSERT INTO Motel_log (inserted_date, username, application, creator, ip_user, `action`, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'app_menu', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       elseif (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->nm_bases_sqlite))
       { 
           $comando = "INSERT INTO Motel_log (id, inserted_date, username, application, creator, ip_user, action, description) VALUES (NULL, $dt, " . $this->Db->qstr($usr) . ", 'app_menu', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       else
       { 
           $comando = "INSERT INTO Motel_log (inserted_date, username, application, creator, ip_user, action, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'app_menu', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
       $rlog = $this->Db->Execute($comando); 
       if ($rlog === false)  
       { 
           $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
       }
   }

}
$contr_app_menu = new app_menu_class;
$contr_app_menu->app_menu_menu();

?>
