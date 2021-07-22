$(function () {
    $.fn.editableform.buttons = '<button id="btn-update" type="submit" class="btn btn-primary editable-submit btn-sm waves-effect waves-light"><i class="fa fa-check"></i></button><button type="button" class="btn btn-danger editable-cancel btn-sm waves-effect"><i class="fa fa-times"></i></button>',
     $("#inline-sex").editable({ prepend: $("#emty1").val(), mode: "inline", inputclass: "form-control-sm",
     source: [{ value: 1, text: "Đã xác thực" }, { value: 2, text: "Đã gửi" },{ value: 3, text: "Đã hủy" }],
     display: function (t, e) { var n = $.grep(e, function (e) { return e.value == t }); n.length ? $(this).text(n[0].text).css("color", { "": "gray", 1: "green", 2: "blue" }[t]) : $(this).empty() } }),

     $("#inline-sex2").editable({ prepend: $("#emty2").val(), mode: "inline", inputclass: "form-control-sm", source: [{ value: 1, text: "Gửi" }, { value: 2, text: "Vận chuyển xong" },{ value: 3, text: "Đã hủy" }], display: function (t, e) { var n = $.grep(e, function (e) { return e.value == t }); n.length ? $(this).text(n[0].text).css("color", { "": "gray", 1: "green", 2: "blue" }[t]) : $(this).empty() } }),
     $("#inline-sex3").editable({ prepend: $("#emty3").val(), mode: "inline", inputclass: "form-control-sm", source: [{ value: 1, text: "Đã thanh toán" }], display: function (t, e) { var n = $.grep(e, function (e) { return e.value == t }); n.length ? $(this).text(n[0].text).css("color", { "": "gray", 1: "green", 2: "blue" }[t]) : $(this).empty() } }) });


    //  $("#inline-group").editable({ showbuttons: !1, mode: "inline", inputclass: "form-control-sm" }), $("#inline-status").editable({ mode: "inline", inputclass: "form-control-sm" }),
    //  $("#inline-dob").editable({ mode: "inline", inputclass: "form-control-sm" }),
    //  $("#inline-event").editable({ placement: "right", mode: "inline", combodate: { firstItem: "name" }, inputclass: "form-control-sm" }),
    //  $("#inline-comments").editable({ showbuttons: "bottom", mode: "inline", inputclass: "form-control-sm" }), $("#inline-fruits").editable({ pk: 1, limit: 3, mode: "inline", inputclass: "form-control-sm", source: [{ value: 1, text: "Banana" }, { value: 2, text: "Peach" }, { value: 3, text: "Apple" }, { value: 4, text: "Watermelon" }, { value: 5, text: "Orange" }] }) });
