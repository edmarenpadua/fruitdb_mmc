$(document).ready(function(){
    $(".editClass").click(function(){ 
        $("#editId").val($(this).data('id'));
        $("#hiddenId").val($(this).data('id'));
        $("#editQuantity").val($(this).data('quantity'));
        $("#editDistributor").val($(this).data('distributor'));
        $("#editPrice").val($(this).data('cprice'));
        $("#editDate").val($(this).data('cdate'));
        $('#myModal').modal('show');
    });

    
});
