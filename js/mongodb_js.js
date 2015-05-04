$(document).on("click", ".open-delete_fruit", function () {
     var myId = $(this).data('id');
     $(".modal-footer #delete_fruit").val( myId );
     // As pointed out in comments, 
     // it is superfluous to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});