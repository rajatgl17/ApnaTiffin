$('#tiffin_id').change(function(){
    var id = $(this).val();
    window.location = BASE_URL+'cpanel/menu/'+id;
});


