<?php

if(isset($this->Ini->Nm_lang))
{
    $Nm_lang = $this->Ini->Nm_lang;
}
else
{
    $Nm_lang = $this->Nm_lang;
}

$this->nmgp_botoes = array();
$this->arr_buttons = array();

$this->nmgp_botoes['btn_1']  = 'on';
$this->arr_buttons['btn_1']['hint']             = "";
$this->arr_buttons['btn_1']['type']             = "button";
$this->arr_buttons['btn_1']['value']            = "Yesterday Rpt";
$this->arr_buttons['btn_1']['display']          = "text_img";
$this->arr_buttons['btn_1']['display_position'] = "text_right";
$this->arr_buttons['btn_1']['style']            = "default";
$this->arr_buttons['btn_1']['image']            = "sys__NM__sales-report-icon2.png";

$this->nmgp_botoes['btn_2']  = 'on';
$this->arr_buttons['btn_2']['hint']             = "";
$this->arr_buttons['btn_2']['type']             = "button";
$this->arr_buttons['btn_2']['value']            = "Saturday Rpt";
$this->arr_buttons['btn_2']['display']          = "text_img";
$this->arr_buttons['btn_2']['display_position'] = "img_right";
$this->arr_buttons['btn_2']['style']            = "default";
$this->arr_buttons['btn_2']['image']            = "sys__NM__sales-report-icon2.png";

$this->nmgp_botoes['btn_3']  = 'on';
$this->arr_buttons['btn_3']['hint']             = "";
$this->arr_buttons['btn_3']['type']             = "button";
$this->arr_buttons['btn_3']['value']            = "Sunday Rpt";
$this->arr_buttons['btn_3']['display']          = "text_img";
$this->arr_buttons['btn_3']['display_position'] = "img_right";
$this->arr_buttons['btn_3']['style']            = "default";
$this->arr_buttons['btn_3']['image']            = "sys__NM__sales-report-icon2.png";


?>