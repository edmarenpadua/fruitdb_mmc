$(document).on("click", ".open-delete_fruit", function () {
     var myId = $(this).data('id');
     //alert(myId);
     $("#delete_this").val(myId);
});

$(document).ready(function () {
    $("#delete").click(function(){
         $.ajax({
            type: "GET",
            url: "index.php", //process to mail
            data: "id = 10",
            success: function () {
            },
            error: function(){
                alert("failure");
            }
        });
    });
});