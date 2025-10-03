
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
  $('#id_sc_field_id_' + iSeqRow).bind('blur', function() { sc_form_dbo_Motel_Groups_Rates_id__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_dbo_Motel_Groups_Rates_id__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_dbo_Motel_Groups_Rates_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_group_id_' + iSeqRow).bind('blur', function() { sc_form_dbo_Motel_Groups_Rates_group_id__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_dbo_Motel_Groups_Rates_group_id__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_dbo_Motel_Groups_Rates_group_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_dayofweek_' + iSeqRow).bind('blur', function() { sc_form_dbo_Motel_Groups_Rates_dayofweek__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_dbo_Motel_Groups_Rates_dayofweek__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_dbo_Motel_Groups_Rates_dayofweek__onfocus(this, iSeqRow) });
  $('#id_sc_field_rate_' + iSeqRow).bind('blur', function() { sc_form_dbo_Motel_Groups_Rates_rate__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_dbo_Motel_Groups_Rates_rate__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_dbo_Motel_Groups_Rates_rate__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_dbo_Motel_Groups_Rates_id__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_Motel_Groups_Rates_validate_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_Motel_Groups_Rates_id__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_Motel_Groups_Rates_id__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_Motel_Groups_Rates_group_id__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_Motel_Groups_Rates_validate_group_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_Motel_Groups_Rates_group_id__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_Motel_Groups_Rates_group_id__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_Motel_Groups_Rates_dayofweek__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_Motel_Groups_Rates_validate_dayofweek_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_Motel_Groups_Rates_dayofweek__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_Motel_Groups_Rates_dayofweek__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_Motel_Groups_Rates_rate__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_Motel_Groups_Rates_validate_rate_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_Motel_Groups_Rates_rate__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_Motel_Groups_Rates_rate__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

