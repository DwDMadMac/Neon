<?php
$sTimestamp = time();

// Global Settings
$sPanelTitle = Core::GetSetting('panel_title');
NewTemplater::SetGlobalVariable("PanelTitle", $sPanelTitle->sValue);
$sRegistrationEnabled = Core::GetSetting('registration_enabled');
NewTemplater::SetGlobalVariable("RegistrationEnabled", $sRegistrationEnabled->sValue);
$sForgotPasswordEnabled = Core::GetSetting('forgotpassword_enabled');
NewTemplater::SetGlobalVariable("ForgotPasswordEnabled", $sForgotPasswordEnabled->sValue);
$sIP = Core::GetSetting('default_ip');

if($sIP->sValue == localhost){
	$sDefaultIP = $_SERVER['SERVER_ADDR'];
	$sUpdate = Core::UpdateSetting("default_ip", $sDefaultIP);
	NewTemplater::SetGlobalVariable("DefaultIP", $sDefaultIP);
} else {
	$sDefaultIP = $sIP->sValue;
	NewTemplater::SetGlobalVariable("DefaultIP", $sIP->sValue);
}

$sMaxPanelUploadSize = Core::GetSetting('max_panel_upload_size');
NewTemplater::SetGlobalVariable("MaxPanelUploadSize", $sMaxPanelUploadSize->sValue);
$sVersion = Core::GetSetting('version');
NewTemplater::SetGlobalVariable("Version", $sVersion->sValue);

function remove_magic_quotes($array) {
    foreach ($array as $k => $v) {
        if (is_array($v)) {
            $array[$k] = remove_magic_quotes($v);
        } else {
            $array[$k] = stripslashes($v);
        }
    }
    return $array;
}
if (get_magic_quotes_gpc()) {
    $_GET    = remove_magic_quotes($_GET);
    $_POST   = remove_magic_quotes($_POST);
    $_COOKIE = remove_magic_quotes($_COOKIE);
}