
function scJQGeneralAdd() {
  $('input:text.sc-js-input').listen();
  $('input:password.sc-js-input').listen();
  $('textarea.sc-js-input').listen();

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if (0 < $oField.length && 0 < $oField[0].offsetHeight && 0 < $oField[0].offsetWidth && !$oField[0].disabled) {
    $oField[0].focus();
  }
} // scFocusField

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_login' + iSeqRow).bind('blur', function() { sc_Mottech_form_edit_users_login_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_Mottech_form_edit_users_login_onfocus(this, iSeqRow) });
  $('#id_sc_field_pswd' + iSeqRow).bind('blur', function() { sc_Mottech_form_edit_users_pswd_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_Mottech_form_edit_users_pswd_onfocus(this, iSeqRow) });
  $('#id_sc_field_name' + iSeqRow).bind('blur', function() { sc_Mottech_form_edit_users_name_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_Mottech_form_edit_users_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_email' + iSeqRow).bind('blur', function() { sc_Mottech_form_edit_users_email_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_Mottech_form_edit_users_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_active' + iSeqRow).bind('blur', function() { sc_Mottech_form_edit_users_active_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_Mottech_form_edit_users_active_onfocus(this, iSeqRow) });
  $('#id_sc_field_groups' + iSeqRow).bind('blur', function() { sc_Mottech_form_edit_users_groups_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_Mottech_form_edit_users_groups_onfocus(this, iSeqRow) });
  $('#id_sc_field_confirm_pswd' + iSeqRow).bind('blur', function() { sc_Mottech_form_edit_users_confirm_pswd_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_Mottech_form_edit_users_confirm_pswd_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_Mottech_form_edit_users_login_onblur(oThis, iSeqRow) {
  do_ajax_Mottech_form_edit_users_validate_login();
  scCssBlur(oThis);
}

function sc_Mottech_form_edit_users_login_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_Mottech_form_edit_users_pswd_onblur(oThis, iSeqRow) {
  do_ajax_Mottech_form_edit_users_validate_pswd();
  scCssBlur(oThis);
}

function sc_Mottech_form_edit_users_pswd_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_Mottech_form_edit_users_name_onblur(oThis, iSeqRow) {
  do_ajax_Mottech_form_edit_users_validate_name();
  scCssBlur(oThis);
}

function sc_Mottech_form_edit_users_name_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_Mottech_form_edit_users_email_onblur(oThis, iSeqRow) {
  do_ajax_Mottech_form_edit_users_validate_email();
  scCssBlur(oThis);
}

function sc_Mottech_form_edit_users_email_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_Mottech_form_edit_users_active_onblur(oThis, iSeqRow) {
  do_ajax_Mottech_form_edit_users_validate_active();
  scCssBlur(oThis);
}

function sc_Mottech_form_edit_users_active_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_Mottech_form_edit_users_groups_onblur(oThis, iSeqRow) {
  do_ajax_Mottech_form_edit_users_validate_groups();
  scCssBlur(oThis);
}

function sc_Mottech_form_edit_users_groups_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_Mottech_form_edit_users_confirm_pswd_onblur(oThis, iSeqRow) {
  do_ajax_Mottech_form_edit_users_validate_confirm_pswd();
  scCssBlur(oThis);
}

function sc_Mottech_form_edit_users_confirm_pswd_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

