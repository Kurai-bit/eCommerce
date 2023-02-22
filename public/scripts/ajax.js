function call(id){
    $.ajax({
        type: "POST",
        url: "add-product.php",
        data: {
            id
        }
    });
}