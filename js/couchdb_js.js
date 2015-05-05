$(document).on("click", ".open-delete_fruit", function () {
     var myId = $(this).data('id');
     //alert(myId);
//     document.getElementById(delete_this).value = myId;
     $("#record_id").val(myId);
});
/*
$(document).ready(function () {
    $("#delete").click(function(){
         $.ajax({
            type: "GET",
            url: "index.php", //process to mail
            data: "id = 10",
            success: function () {
                alert("karacute");
            },
            error: function(){
                alert("failure");
            }
        });
    });
});*/