function Motel_Sales_Table_by_Room_room_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_room" + seqRow).html();
}

function Motel_Sales_Table_by_Room_room_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_room" + seqRow).html(newValue);
}

function Motel_Sales_Table_by_Room_prices_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_prices" + seqRow).html();
}

function Motel_Sales_Table_by_Room_prices_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_prices" + seqRow).html(newValue);
}

function Motel_Sales_Table_by_Room_getValue(field, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  if ("room" == field) {
    return Motel_Sales_Table_by_Room_room_getValue(seqRow);
  }
  if ("prices" == field) {
    return Motel_Sales_Table_by_Room_prices_getValue(seqRow);
  }
}

function Motel_Sales_Table_by_Room_setValue(field, newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  if ("room" == field) {
    Motel_Sales_Table_by_Room_room_setValue(newValue, seqRow);
  }
  if ("prices" == field) {
    Motel_Sales_Table_by_Room_prices_setValue(newValue, seqRow);
  }
}

function scJQAddEvents(seqRow) {
  seqRow = scSeqNormalize(seqRow);
}

function scSeqNormalize(seqRow) {
  var newSeqRow = seqRow.toString();
  if ("" == newSeqRow) {
    return "";
  }
  if ("_" != newSeqRow.substr(0, 1)) {
    return "_" + newSeqRow;
  }
  return newSeqRow;
}
function ajax_navigate(opc, parm)
{
    scAjaxProcOn();
    $.ajax({
      type: "POST",
      url: "Motel_Sales_Table_by_Room.php",
      data: "nmgp_opcao=ajax_navigate&script_case_init=" + document.F4.script_case_init.value + "&script_case_session=" + document.F4.script_case_session.value + "&opc=" + opc  + "&parm=" + parm,
      success: function(jsonNavigate) {
        var i, oResp;
        eval("oResp = " + jsonNavigate);
        if (oResp["redirInfo"]) {
           scAjaxRedir(oResp);
        }
        if (oResp["setValue"]) {
          for (i = 0; i < oResp["setValue"].length; i++) {
               $("#" + oResp["setValue"][i]["field"]).html(oResp["setValue"][i]["value"]);
          }
        }
        if (oResp["setVar"]) {
          for (i = 0; i < oResp["setVar"].length; i++) {
               eval (oResp["setVar"][i]["var"] + ' = \"' + oResp["setVar"][i]["value"] + '\"');
          }
        }
        if (oResp["setDisplay"]) {
          for (i = 0; i < oResp["setDisplay"].length; i++) {
               document.getElementById(oResp["setDisplay"][i]["field"]).style.display = oResp["setDisplay"][i]["value"];
          }
        }
        if (oResp["setDisabled"]) {
          for (i = 0; i < oResp["setDisabled"].length; i++) {
               document.getElementById(oResp["setDisabled"][i]["field"]).disabled = oResp["setDisabled"][i]["value"];
          }
        }
        if (oResp["setClass"]) {
          for (i = 0; i < oResp["setClass"].length; i++) {
               document.getElementById(oResp["setClass"][i]["field"]).className = oResp["setClass"][i]["value"];
          }
        }
        if (oResp["setSrc"]) {
          for (i = 0; i < oResp["setSrc"].length; i++) {
               document.getElementById(oResp["setSrc"][i]["field"]).src = oResp["setSrc"][i]["value"];
          }
        }
        if (oResp["redirInfo"]) {
           scAjaxRedir(oResp);
        }
        if (oResp["htmOutput"]) {
           scAjaxShowDebug(oResp);
        }
        if (!SC_Link_View)
        {
            if (Qsearch_ok)
            {
                scQSInitVal = $("#SC_fast_search_top").val();
                scQSInit = true;
                scQuickSearchInit(false, '');
                $('#SC_fast_search_top').listen();
                scQuickSearchKeyUp('top', null);
                scQSInit = false;
            }
            SC_init_jquery();
            tb_init('a.thickbox, area.thickbox, input.thickbox');
        }
        scAjaxProcOff();
      }
    });
}
