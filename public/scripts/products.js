function deleteProducts(elem){
    let id = $(elem).parent().parent().find('.sorting_1').html();
    $.ajax({
        url: `/deleteproducts/${id}`,
        type: "POST",
        data: {},
        dataType: "json",
        success: function (data){
            $('#products').DataTable().ajax.reload();
        }
    })
}