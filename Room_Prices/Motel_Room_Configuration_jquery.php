
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
  $('#id_sc_field_room_name_' + iSeqRow).bind('blur', function() { sc_Motel_Room_Configuration_room_name__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_Motel_Room_Configuration_room_name__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_Motel_Room_Configuration_room_name__onfocus(this, iSeqRow) });
  $('#id_sc_field_group_id_' + iSeqRow).bind('blur', function() { sc_Motel_Room_Configuration_group_id__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_Motel_Room_Configuration_group_id__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_Motel_Room_Configuration_group_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_disabled_' + iSeqRow).bind('blur', function() { sc_Motel_Room_Configuration_disabled__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_Motel_Room_Configuration_disabled__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_Motel_Room_Configuration_disabled__onfocus(this, iSeqRow) });
  $('#id_sc_field_comments_' + iSeqRow).bind('blur', function() { sc_Motel_Room_Configuration_comments__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_Motel_Room_Configuration_comments__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_Motel_Room_Configuration_comments__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_Motel_Room_Configuration_room_name__onblur(oThis, iSeqRow) {
  do_ajax_Motel_Room_Configuration_validate_room_name_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_Motel_Room_Configuration_room_name__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_Motel_Room_Configuration_room_name__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_Motel_Room_Configuration_group_id__onblur(oThis, iSeqRow) {
  do_ajax_Motel_Room_Configuration_validate_group_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_Motel_Room_Configuration_group_id__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_Motel_Room_Configuration_group_id__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_Motel_Room_Configuration_disabled__onblur(oThis, iSeqRow) {
  do_ajax_Motel_Room_Configuration_validate_disabled_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_Motel_Room_Configuration_disabled__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_Motel_Room_Configuration_disabled__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_Motel_Room_Configuration_comments__onblur(oThis, iSeqRow) {
  do_ajax_Motel_Room_Configuration_validate_comments_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_Motel_Room_Configuration_comments__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_Motel_Room_Configuration_comments__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function scJQDDCheckBoxAdd(iSeqRow) {
  $("#id_sc_field_group_id_" + iSeqRow).dropdownchecklist({
   bgiframe: true,
   closeRadioOnClick: true,
   maxDropHeight: 350,
   icon: { placement: 'right' }
  });
} // scJQDDCheckBoxAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scJQDDCheckBoxAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

