$(document).ready(function () {
    $("#add-item").click(function () {
        $("#details").toggle();
        $("#add-item-button-save").toggle();
    })
})

function selectProduct() {

    $.ajax({
        url: '/ShopLaptop/trang-quan-tri/don-hang/profile/' + $("#elementId :selected").val(),
        method: 'GET',
        success: function (respon) {
            $("#prd_id").val(respon.prd_id);
            $("#prd_price").val(respon.prd_price)
            $("#prd_number").val(1)
            $("#total3").val(respon.prd_price)
        }
    });
}
function change55() {
    // var gt = document.getElementById("inline-sex").textContent;
    // // console.log(gt);
    // $("#emty1").val(1);
    // console.log($(this).text())
    alert('test');
}
function Setnumber() {
    var num = $("#prd_number").val();
    var qty = $("#prd_price").val();
    $("#total3").val(num * qty)
}
