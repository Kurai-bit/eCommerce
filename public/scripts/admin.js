function deleteCategory(elem){
    let id = $(elem).parent().parent().find('.sorting_1').html();
    $.ajax({
        url: `/delete/${id}`,
        type: "POST",
        data: {},
        dataType: "json",
        success: function (data){
            $('#categoryTale').DataTable().ajax.reload();
        }
    })
}
