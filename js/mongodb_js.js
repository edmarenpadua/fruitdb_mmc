$(document).on("click", ".open-delete_fruit", function () {
     var myId = $(this).data('id');
     //alert(myId);
     $("#delete_this").val(myId);
});

$(document).on("click", ".open-edit_fruit", function () {
     var myId = $(this).data('id');
     $("#edit_this").val(myId);

     $("#name").val($(this).data('name'));
     $("#quantity").val($(this).data('quantity'));
     $("#distributor").val($(this).data('distributor'));
     $("#price").val($(this).data('price'));
});


/*$(document).ready(function () {
    $("#delete").click(function(){
        console.log("hello");
        id = $("#delete_this").val();
         $.ajax({
            type: "GET",
            url: "test.php", //process to mail
            data: ,
            success: function () {
                alert(id);
            },
            error: function(){
                alert("failure");
            }
        });
         console.log(id);
    });
});*/