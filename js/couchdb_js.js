$(document).on("click", ".open-delete_fruit", function () {
     var myId = $(this).data('id');
     //alert(myId);
//     document.getElementById(delete_this).value = myId;
     $("#record_id").val(myId);
});


function getEditData(id, name, quantity, distributor, price){
     $("#record_id").val(id);
     $("#name").val(name);
     $("#name_display").val(name);
     $("#quantity").val(quantity);
     $("#distributor").val(distributor);
     $("#price").val(price);
}