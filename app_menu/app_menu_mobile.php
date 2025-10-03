<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
        <title>Mottech Web Application</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet"  href="<?php echo $_SESSION["scriptcase"]["app_menu"]["glo_nm_path_prod"]; ?>/third/jquery.mobile/jquery.mobile-1.2.0.min.css" />
        <link rel="stylesheet"  href="<?php echo $this->url_css; ?>ScriptCase6_Blue/ScriptCase6_Blue_menuMobile.css" />
        <script src="<?php echo $_SESSION["scriptcase"]["app_menu"]["glo_nm_path_prod"]; ?>/third/jquery/js/jquery.js"></script>
        <script type="text/javascript">
            $(document).bind("mobileinit", function() {
                $.mobile.page.prototype.options.backBtnText = "<?php echo $this->Nm_lang["lang_btns_prev"]; ?>";
                $.mobile.page.prototype.options.addBackBtn = true;
            });
        </script>
        <script src="<?php echo $_SESSION["scriptcase"]["app_menu"]["glo_nm_path_prod"]; ?>/third/jquery.mobile/jquery.mobile-1.2.0.min.js"></script>
    </head>
    <body>
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

        <ul data-role='listview' data-theme='a'>
          <?php
          if (isset($_SESSION['scriptcase']['sc_apl_seg']['dashboard']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['dashboard']) == "on")
          {
            ?>
            <li title="<?php echo "" . $nm_var_hint[0] . ""; ?>">
                <a href="<?php echo "app_menu_form_php.php?sc_item_menu=item_23&sc_apl_menu=dashboard&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><img src="<?php echo $this->path_botoes; ?>/monitor_test_card_24.png" alt="<?php echo "" . $nm_var_hint[0] . ""; ?>" class="ui-li-icon" /><?php echo "" . $nm_var_lab[0] . ""; ?></a>
            </li>
            <?php
          }
          ?>
            <li title="<?php echo "" . $nm_var_hint[1] . ""; ?>">
                <a href="<?php echo "#"?>" target="_self"><img src="<?php echo $this->path_botoes; ?>/printer2_24.png" alt="<?php echo "" . $nm_var_hint[1] . ""; ?>" class="ui-li-icon" /><?php echo "" . $nm_var_lab[1] . ""; ?></a>
                <ul>
                  <?php
                  if (isset($_SESSION['scriptcase']['sc_apl_seg']['Motel_Live_Data']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Motel_Live_Data']) == "on")
                  {
                    ?>
                    <li title="<?php echo "" . $nm_var_hint[2] . ""; ?>">
                        <a href="<?php echo "app_menu_form_php.php?sc_item_menu=item_8&sc_apl_menu=Motel_Live_Data&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><img src="<?php echo $this->path_botoes; ?>/moneybag2_24.png" alt="<?php echo "" . $nm_var_hint[2] . ""; ?>" class="ui-li-icon" /><?php echo "" . $nm_var_lab[2] . ""; ?></a>
                    </li>
                    <?php
                  }
                  ?>
                  <?php
                  if (isset($_SESSION['scriptcase']['sc_apl_seg']['Motel_Live_Data_Summary']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Motel_Live_Data_Summary']) == "on")
                  {
                    ?>
                    <li title="<?php echo "" . $nm_var_hint[3] . ""; ?>">
                        <a href="<?php echo "app_menu_form_php.php?sc_item_menu=item_41&sc_apl_menu=Motel_Live_Data_Summary&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><img src="<?php echo $this->path_botoes; ?>/document_chart_24.png" alt="<?php echo "" . $nm_var_hint[3] . ""; ?>" class="ui-li-icon" /><?php echo "" . $nm_var_lab[3] . ""; ?></a>
                    </li>
                    <?php
                  }
                  ?>
                  <?php
                  if (isset($_SESSION['scriptcase']['sc_apl_seg']['Motel_InOut_Data']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Motel_InOut_Data']) == "on")
                  {
                    ?>
                    <li title="<?php echo "" . $nm_var_hint[4] . ""; ?>">
                        <a href="<?php echo "app_menu_form_php.php?sc_item_menu=item_37&sc_apl_menu=Motel_InOut_Data&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><img src="<?php echo $this->path_botoes; ?>/clock_preferences_24.png" alt="<?php echo "" . $nm_var_hint[4] . ""; ?>" class="ui-li-icon" /><?php echo "" . $nm_var_lab[4] . ""; ?></a>
                    </li>
                    <?php
                  }
                  ?>
                  <?php
                  if (isset($_SESSION['scriptcase']['sc_apl_seg']['Room_Activity']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Room_Activity']) == "on")
                  {
                    ?>
                    <li title="<?php echo "" . $nm_var_hint[5] . ""; ?>">
                        <a href="<?php echo "app_menu_form_php.php?sc_item_menu=item_42&sc_apl_menu=Room_Activity&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><img src="<?php echo $this->path_botoes; ?>/document_attachment_24.png" alt="<?php echo "" . $nm_var_hint[5] . ""; ?>" class="ui-li-icon" /><?php echo "" . $nm_var_lab[5] . ""; ?></a>
                    </li>
                    <?php
                  }
                  ?>
                  <?php
                  if (isset($_SESSION['scriptcase']['sc_apl_seg']['Motel_Sales_Table_by_Room']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Motel_Sales_Table_by_Room']) == "on")
                  {
                    ?>
                    <li title="<?php echo "" . $nm_var_hint[6] . ""; ?>">
                        <a href="<?php echo "app_menu_form_php.php?sc_item_menu=item_48&sc_apl_menu=Motel_Sales_Table_by_Room&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><img src="<?php echo $this->path_botoes; ?>/moneybag2_24.png" alt="<?php echo "" . $nm_var_hint[6] . ""; ?>" class="ui-li-icon" /><?php echo "" . $nm_var_lab[6] . ""; ?></a>
                    </li>
                    <?php
                  }
                  ?>
                  <?php
                  if (isset($_SESSION['scriptcase']['sc_apl_seg']['Temp_Trash_Data']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Temp_Trash_Data']) == "on")
                  {
                    ?>
                    <li title="<?php echo "" . $nm_var_hint[7] . ""; ?>">
                        <a href="<?php echo "app_menu_form_php.php?sc_item_menu=item_45&sc_apl_menu=Temp_Trash_Data&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><img src="<?php echo $this->path_botoes; ?>/jar_bean_delete_24.png" alt="<?php echo "" . $nm_var_hint[7] . ""; ?>" class="ui-li-icon" /><?php echo "" . $nm_var_lab[7] . ""; ?></a>
                    </li>
                    <?php
                  }
                  ?>
                </ul>
            </li>
            <li title="<?php echo "" . $nm_var_hint[8] . ""; ?>">
                <a href="<?php echo "#"?>" target="_self"><img src="<?php echo $this->path_botoes; ?>/chart_pie2_24.png" alt="<?php echo "" . $nm_var_hint[8] . ""; ?>" class="ui-li-icon" /><?php echo "" . $nm_var_lab[8] . ""; ?></a>
                <ul>
                  <?php
                  if (isset($_SESSION['scriptcase']['sc_apl_seg']['Acumulative_Cars_Counter_Chart_1_to_50']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Acumulative_Cars_Counter_Chart_1_to_50']) == "on")
                  {
                    ?>
                    <li title="<?php echo "" . $nm_var_hint[9] . ""; ?>">
                        <a href="<?php echo "app_menu_form_php.php?sc_item_menu=item_39&sc_apl_menu=Acumulative_Cars_Counter_Chart_1_to_50&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><img src="<?php echo $this->path_botoes; ?>/check_24.png" alt="<?php echo "" . $nm_var_hint[9] . ""; ?>" class="ui-li-icon" /><?php echo "" . $nm_var_lab[9] . ""; ?></a>
                    </li>
                    <?php
                  }
                  ?>
                  <?php
                  if (isset($_SESSION['scriptcase']['sc_apl_seg']['Acumulative_Cars_Counter_Chart_51_to_120']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Acumulative_Cars_Counter_Chart_51_to_120']) == "on")
                  {
                    ?>
                    <li title="<?php echo "" . $nm_var_hint[10] . ""; ?>">
                        <a href="<?php echo "app_menu_form_php.php?sc_item_menu=item_40&sc_apl_menu=Acumulative_Cars_Counter_Chart_51_to_120&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><img src="<?php echo $this->path_botoes; ?>/check_24.png" alt="<?php echo "" . $nm_var_hint[10] . ""; ?>" class="ui-li-icon" /><?php echo "" . $nm_var_lab[10] . ""; ?></a>
                    </li>
                    <?php
                  }
                  ?>
                  <?php
                  if (isset($_SESSION['scriptcase']['sc_apl_seg']['Year_Chart_Comparasion']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Year_Chart_Comparasion']) == "on")
                  {
                    ?>
                    <li title="<?php echo "" . $nm_var_hint[11] . ""; ?>">
                        <a href="<?php echo "app_menu_form_php.php?sc_item_menu=item_47&sc_apl_menu=Year_Chart_Comparasion&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><img src="<?php echo $this->path_botoes; ?>/calendar_52_24.png" alt="<?php echo "" . $nm_var_hint[11] . ""; ?>" class="ui-li-icon" /><?php echo "" . $nm_var_lab[11] . ""; ?></a>
                    </li>
                    <?php
                  }
                  ?>
                </ul>
            </li>
          <?php
          if (isset($_SESSION['scriptcase']['sc_apl_seg']['live_viewer']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['live_viewer']) == "on")
          {
            ?>
            <li title="<?php echo "" . $nm_var_hint[12] . ""; ?>">
                <a href="<?php echo "app_menu_form_php.php?sc_item_menu=item_9&sc_apl_menu=live_viewer&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><img src="<?php echo $this->path_botoes; ?>/eye_24.png" alt="<?php echo "" . $nm_var_hint[12] . ""; ?>" class="ui-li-icon" /><?php echo "" . $nm_var_lab[12] . ""; ?></a>
            </li>
            <?php
          }
          ?>
            <li title="<?php echo "" . $nm_var_hint[13] . ""; ?>">
                <a href="<?php echo "#"?>" target="_self"><img src="<?php echo $this->path_botoes; ?>/symbol_dollar_24.png" alt="<?php echo "" . $nm_var_hint[13] . ""; ?>" class="ui-li-icon" /><?php echo "" . $nm_var_lab[13] . ""; ?></a>
                <ul>
                  <?php
                  if (isset($_SESSION['scriptcase']['sc_apl_seg']['Motel_Room_Configuration']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Motel_Room_Configuration']) == "on")
                  {
                    ?>
                    <li title="<?php echo "" . $nm_var_hint[14] . ""; ?>">
                        <a href="<?php echo "app_menu_form_php.php?sc_item_menu=item_12&sc_apl_menu=Motel_Room_Configuration&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><?php echo "" . $nm_var_lab[14] . ""; ?></a>
                    </li>
                    <?php
                  }
                  ?>
                </ul>
            </li>
            <li title="<?php echo "" . $nm_var_hint[15] . ""; ?>">
                <a href="<?php echo "#"?>" target="_self"><img src="<?php echo $this->path_botoes; ?>/monitor_preferences_24.png" alt="<?php echo "" . $nm_var_hint[15] . ""; ?>" class="ui-li-icon" /><?php echo "" . $nm_var_lab[15] . ""; ?></a>
                <ul>
                  <?php
                  if (isset($_SESSION['scriptcase']['sc_apl_seg']['POS_Items_Class']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['POS_Items_Class']) == "on")
                  {
                    ?>
                    <li title="<?php echo "" . $nm_var_hint[16] . ""; ?>">
                        <a href="<?php echo "app_menu_form_php.php?sc_item_menu=item_21&sc_apl_menu=POS_Items_Class&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><?php echo "" . $nm_var_lab[16] . ""; ?></a>
                    </li>
                    <?php
                  }
                  ?>
                </ul>
            </li>
            <li title="<?php echo "" . $nm_var_hint[17] . ""; ?>">
                <a href="<?php echo "#"?>" target="_self"><img src="<?php echo $this->path_botoes; ?>/barcode_24.png" alt="<?php echo "" . $nm_var_hint[17] . ""; ?>" class="ui-li-icon" /><?php echo "" . $nm_var_lab[17] . ""; ?></a>
                <ul>
                  <?php
                  if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_Motel_Room_Comments']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_Motel_Room_Comments']) == "on")
                  {
                    ?>
                    <li title="<?php echo "" . $nm_var_hint[18] . ""; ?>">
                        <a href="<?php echo "app_menu_form_php.php?sc_item_menu=item_22&sc_apl_menu=grid_Motel_Room_Comments&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><?php echo "" . $nm_var_lab[18] . ""; ?></a>
                    </li>
                    <?php
                  }
                  ?>
                  <?php
                  if (isset($_SESSION['scriptcase']['sc_apl_seg']['Duplicate_Plate_Grid']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Duplicate_Plate_Grid']) == "on")
                  {
                    ?>
                    <li title="<?php echo "" . $nm_var_hint[19] . ""; ?>">
                        <a href="<?php echo "app_menu_form_php.php?sc_item_menu=item_43&sc_apl_menu=Duplicate_Plate_Grid&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><?php echo "" . $nm_var_lab[19] . ""; ?></a>
                    </li>
                    <?php
                  }
                  ?>
                </ul>
            </li>
            <li title="<?php echo "" . $this->Nm_lang['lang_menu_security'] . ""; ?>">
                <a href="<?php echo "#"?>" target="_self"><img src="<?php echo $this->path_botoes; ?>/lock_24.png" alt="<?php echo "" . $this->Nm_lang['lang_menu_security'] . ""; ?>" class="ui-li-icon" /><?php echo "" . $this->Nm_lang['lang_menu_security'] . ""; ?></a>
                <ul>
                  <?php
                  if (isset($_SESSION['scriptcase']['sc_apl_seg']['Mottech_grid_sec_users']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Mottech_grid_sec_users']) == "on")
                  {
                    ?>
                    <li title="<?php echo "" . $this->Nm_lang['lang_list_users'] . ""; ?>">
                        <a href="<?php echo "app_menu_form_php.php?sc_item_menu=item_28&sc_apl_menu=Mottech_grid_sec_users&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><?php echo "" . $this->Nm_lang['lang_list_users'] . ""; ?></a>
                    </li>
                    <?php
                  }
                  ?>
                  <?php
                  if (isset($_SESSION['scriptcase']['sc_apl_seg']['Mottech_grid_sec_apps']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Mottech_grid_sec_apps']) == "on")
                  {
                    ?>
                    <li title="<?php echo "" . $this->Nm_lang['lang_list_apps'] . ""; ?>">
                        <a href="<?php echo "app_menu_form_php.php?sc_item_menu=item_29&sc_apl_menu=Mottech_grid_sec_apps&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><?php echo "" . $this->Nm_lang['lang_list_apps'] . ""; ?></a>
                    </li>
                    <?php
                  }
                  ?>
                  <?php
                  if (isset($_SESSION['scriptcase']['sc_apl_seg']['Mottech_grid_sec_groups']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Mottech_grid_sec_groups']) == "on")
                  {
                    ?>
                    <li title="<?php echo "" . $this->Nm_lang['lang_list_groups'] . ""; ?>">
                        <a href="<?php echo "app_menu_form_php.php?sc_item_menu=item_30&sc_apl_menu=Mottech_grid_sec_groups&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><?php echo "" . $this->Nm_lang['lang_list_groups'] . ""; ?></a>
                    </li>
                    <?php
                  }
                  ?>
                  <?php
                  if (isset($_SESSION['scriptcase']['sc_apl_seg']['Mottech_search_sec_groups']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Mottech_search_sec_groups']) == "on")
                  {
                    ?>
                    <li title="<?php echo "" . $this->Nm_lang['lang_list_apps_x_groups'] . ""; ?>">
                        <a href="<?php echo "app_menu_form_php.php?sc_item_menu=item_31&sc_apl_menu=Mottech_search_sec_groups&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><?php echo "" . $this->Nm_lang['lang_list_apps_x_groups'] . ""; ?></a>
                    </li>
                    <?php
                  }
                  ?>
                  <?php
                  if (isset($_SESSION['scriptcase']['sc_apl_seg']['Mottech_sync_apps']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Mottech_sync_apps']) == "on")
                  {
                    ?>
                    <li title="<?php echo "" . $this->Nm_lang['lang_list_sync_apps'] . ""; ?>">
                        <a href="<?php echo "app_menu_form_php.php?sc_item_menu=item_32&sc_apl_menu=Mottech_sync_apps&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><?php echo "" . $this->Nm_lang['lang_list_sync_apps'] . ""; ?></a>
                    </li>
                    <?php
                  }
                  ?>
                  <?php
                  if (isset($_SESSION['scriptcase']['sc_apl_seg']['Mottech_change_pswd']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Mottech_change_pswd']) == "on")
                  {
                    ?>
                    <li title="<?php echo "" . $this->Nm_lang['lang_change_pswd'] . ""; ?>">
                        <a href="<?php echo "app_menu_form_php.php?sc_item_menu=item_33&sc_apl_menu=Mottech_change_pswd&sc_apl_link=" . urlencode($app_menu_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['app_menu']['glo_nm_usa_grupo'] . ""?>" target="_self"><?php echo "" . $this->Nm_lang['lang_change_pswd'] . ""; ?></a>
                    </li>
                    <?php
                  }
                  ?>
                </ul>
            </li>
            <li title="<?php echo "" . $nm_var_hint[20] . ""; ?>">
                <a href="<?php echo "$saida_apl"?>" target="_parent"><img src="<?php echo $this->path_botoes; ?>/door2_open_24.png" alt="<?php echo "" . $nm_var_hint[20] . ""; ?>" class="ui-li-icon" /><?php echo "" . $nm_var_lab[20] . ""; ?></a>
            </li>
        </ul>

    </body>
</html>
