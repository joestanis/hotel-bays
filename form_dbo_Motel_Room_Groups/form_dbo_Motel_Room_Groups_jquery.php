
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
  $('#id_sc_field_id_' + iSeqRow).bind('blur', function() { sc_form_dbo_Motel_Room_Groups_id__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_dbo_Motel_Room_Groups_id__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_dbo_Motel_Room_Groups_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_name_' + iSeqRow).bind('blur', function() { sc_form_dbo_Motel_Room_Groups_name__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_dbo_Motel_Room_Groups_name__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_dbo_Motel_Room_Groups_name__onfocus(this, iSeqRow) });
  $('#id_sc_field_price_' + iSeqRow).bind('blur', function() { sc_form_dbo_Motel_Room_Groups_price__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_dbo_Motel_Room_Groups_price__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_dbo_Motel_Room_Groups_price__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_dbo_Motel_Room_Groups_id__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_Motel_Room_Groups_validate_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_Motel_Room_Groups_id__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_Motel_Room_Groups_id__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_Motel_Room_Groups_name__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_Motel_Room_Groups_validate_name_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_Motel_Room_Groups_name__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_Motel_Room_Groups_name__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_form_dbo_Motel_Room_Groups_price__onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_Motel_Room_Groups_validate_price_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_dbo_Motel_Room_Groups_price__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_dbo_Motel_Room_Groups_price__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function scJQSpinAdd(iSeqRow) {
  var elHeight = parseInt($("#id_sc_field_price_" + iSeqRow).css("height")) || 0;
  var elWidth = parseInt($("#id_sc_field_price_" + iSeqRow).css("width")) || 0;
  var spinOpt;
  if (0 < elHeight && 0 < elWidth) {
    spinOpt = {stepInc:1,pageInc:5,min:0,max:9999999999,btnWidth:15,height:parseInt(elHeight),width:parseInt(elWidth)};
  }
  else if (0 < elHeight) {
    spinOpt = {stepInc:1,pageInc:5,min:0,max:9999999999,btnWidth:15,height:parseInt(elHeight)};
  }
  else if (0 < elWidth) {
    spinOpt = {stepInc:1,pageInc:5,min:0,max:9999999999,btnWidth:15,width:parseInt(elWidth)};
  }
  else {
    spinOpt = {stepInc:1,pageInc:5,min:0,max:9999999999,btnWidth:15};
  }
  $("#id_sc_field_price_" + iSeqRow).css("padding-right", "21px").addClass("smartspinner").spinit(spinOpt);
} // scJQSpinAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scJQSpinAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

