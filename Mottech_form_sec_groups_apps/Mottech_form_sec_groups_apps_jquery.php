
function scJQGeneralAdd() {
  $('input:text.sc-js-input').listen();
  $('input:password.sc-js-input').listen();
  $('textarea.sc-js-input').listen();

  $('#sc-ui-checkbox-priv_access_-control').click(function() { scJQCheckboxControl('priv_access_', '__ALL__', this); });

  $('#sc-ui-checkbox-priv_insert_-control').click(function() { scJQCheckboxControl('priv_insert_', '__ALL__', this); });

  $('#sc-ui-checkbox-priv_delete_-control').click(function() { scJQCheckboxControl('priv_delete_', '__ALL__', this); });

  $('#sc-ui-checkbox-priv_update_-control').click(function() { scJQCheckboxControl('priv_update_', '__ALL__', this); });

  $('#sc-ui-checkbox-priv_export_-control').click(function() { scJQCheckboxControl('priv_export_', '__ALL__', this); });

  $('#sc-ui-checkbox-priv_print_-control').click(function() { scJQCheckboxControl('priv_print_', '__ALL__', this); });

  $('.sc-ui-checkbox-all-all').click(function() { scJQCheckboxControl('__ALL__', '__ALL__', this); });
  $('.sc-ui-checkbox-record-all').click(function() { scJQCheckboxControl('__ALL__', '__REC__', this); });

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
  $('#id_sc_field_app_name_' + iSeqRow).bind('blur', function() { sc_Mottech_form_sec_groups_apps_app_name__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_Mottech_form_sec_groups_apps_app_name__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_Mottech_form_sec_groups_apps_app_name__onfocus(this, iSeqRow) });
  $('#id_sc_field_priv_access_' + iSeqRow).bind('blur', function() { sc_Mottech_form_sec_groups_apps_priv_access__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_Mottech_form_sec_groups_apps_priv_access__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_Mottech_form_sec_groups_apps_priv_access__onfocus(this, iSeqRow) });
  $('#id_sc_field_priv_insert_' + iSeqRow).bind('blur', function() { sc_Mottech_form_sec_groups_apps_priv_insert__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_Mottech_form_sec_groups_apps_priv_insert__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_Mottech_form_sec_groups_apps_priv_insert__onfocus(this, iSeqRow) });
  $('#id_sc_field_priv_delete_' + iSeqRow).bind('blur', function() { sc_Mottech_form_sec_groups_apps_priv_delete__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_Mottech_form_sec_groups_apps_priv_delete__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_Mottech_form_sec_groups_apps_priv_delete__onfocus(this, iSeqRow) });
  $('#id_sc_field_priv_update_' + iSeqRow).bind('blur', function() { sc_Mottech_form_sec_groups_apps_priv_update__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_Mottech_form_sec_groups_apps_priv_update__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_Mottech_form_sec_groups_apps_priv_update__onfocus(this, iSeqRow) });
  $('#id_sc_field_priv_export_' + iSeqRow).bind('blur', function() { sc_Mottech_form_sec_groups_apps_priv_export__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_Mottech_form_sec_groups_apps_priv_export__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_Mottech_form_sec_groups_apps_priv_export__onfocus(this, iSeqRow) });
  $('#id_sc_field_priv_print_' + iSeqRow).bind('blur', function() { sc_Mottech_form_sec_groups_apps_priv_print__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_Mottech_form_sec_groups_apps_priv_print__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_Mottech_form_sec_groups_apps_priv_print__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_Mottech_form_sec_groups_apps_app_name__onblur(oThis, iSeqRow) {
  do_ajax_Mottech_form_sec_groups_apps_validate_app_name_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_Mottech_form_sec_groups_apps_app_name__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_Mottech_form_sec_groups_apps_app_name__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_Mottech_form_sec_groups_apps_priv_access__onblur(oThis, iSeqRow) {
  do_ajax_Mottech_form_sec_groups_apps_validate_priv_access_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_Mottech_form_sec_groups_apps_priv_access__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_Mottech_form_sec_groups_apps_priv_access__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_Mottech_form_sec_groups_apps_priv_insert__onblur(oThis, iSeqRow) {
  do_ajax_Mottech_form_sec_groups_apps_validate_priv_insert_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_Mottech_form_sec_groups_apps_priv_insert__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_Mottech_form_sec_groups_apps_priv_insert__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_Mottech_form_sec_groups_apps_priv_delete__onblur(oThis, iSeqRow) {
  do_ajax_Mottech_form_sec_groups_apps_validate_priv_delete_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_Mottech_form_sec_groups_apps_priv_delete__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_Mottech_form_sec_groups_apps_priv_delete__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_Mottech_form_sec_groups_apps_priv_update__onblur(oThis, iSeqRow) {
  do_ajax_Mottech_form_sec_groups_apps_validate_priv_update_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_Mottech_form_sec_groups_apps_priv_update__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_Mottech_form_sec_groups_apps_priv_update__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_Mottech_form_sec_groups_apps_priv_export__onblur(oThis, iSeqRow) {
  do_ajax_Mottech_form_sec_groups_apps_validate_priv_export_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_Mottech_form_sec_groups_apps_priv_export__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_Mottech_form_sec_groups_apps_priv_export__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function sc_Mottech_form_sec_groups_apps_priv_print__onblur(oThis, iSeqRow) {
  do_ajax_Mottech_form_sec_groups_apps_validate_priv_print_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_Mottech_form_sec_groups_apps_priv_print__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_Mottech_form_sec_groups_apps_priv_print__onfocus(oThis, iSeqRow) {
  scCssFocus(oThis, iSeqRow);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

function scJQCheckboxControl(sColumn, sSeqRow, oCheckbox) {
  var iSeqRow = '';

  if ('__ALL__' == sColumn || 'priv_access_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_priv_access_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'priv_access_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

  if ('__ALL__' == sColumn || 'priv_insert_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_priv_insert_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'priv_insert_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

  if ('__ALL__' == sColumn || 'priv_delete_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_priv_delete_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'priv_delete_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

  if ('__ALL__' == sColumn || 'priv_update_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_priv_update_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'priv_update_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

  if ('__ALL__' == sColumn || 'priv_export_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_priv_export_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'priv_export_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

  if ('__ALL__' == sColumn || 'priv_print_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_priv_print_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'priv_print_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

} // scJQCheckboxControl

function scJQCheckboxControl_priv_access_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-priv_access_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-priv_access_" + iSeqRow);
  }

  var bChanged = false;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      bChanged = true;
    }
  }
} // scJQCheckboxControl_priv_access_

function scJQCheckboxControl_priv_insert_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-priv_insert_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-priv_insert_" + iSeqRow);
  }

  var bChanged = false;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      bChanged = true;
    }
  }
} // scJQCheckboxControl_priv_insert_

function scJQCheckboxControl_priv_delete_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-priv_delete_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-priv_delete_" + iSeqRow);
  }

  var bChanged = false;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      bChanged = true;
    }
  }
} // scJQCheckboxControl_priv_delete_

function scJQCheckboxControl_priv_update_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-priv_update_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-priv_update_" + iSeqRow);
  }

  var bChanged = false;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      bChanged = true;
    }
  }
} // scJQCheckboxControl_priv_update_

function scJQCheckboxControl_priv_export_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-priv_export_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-priv_export_" + iSeqRow);
  }

  var bChanged = false;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      bChanged = true;
    }
  }
} // scJQCheckboxControl_priv_export_

function scJQCheckboxControl_priv_print_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-priv_print_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-priv_print_" + iSeqRow);
  }

  var bChanged = false;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      bChanged = true;
    }
  }
} // scJQCheckboxControl_priv_print_

