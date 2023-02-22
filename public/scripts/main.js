console.log('loading this script');


function addToCart(id){
    $.ajax({
        type: "POST",
        url: "/add",
        data: {
            id: id
        },
        dataType:"json",
        success: function (data) {
            console.log(data);
        }
    });
}


function changeAmount(id,amountControl,price){
    $.ajax({
        type: "POST",
        url: "/control",
        data:{
            id: id,
            control: amountControl,
            price: price
        },
        dataType: "json",
        success: function (data){
            document.getElementById(`${id}`).setAttribute("value",data[0]);
            document.getElementById(`sum`).innerText = data[1];
            document.getElementById(`finalSum`).innerText = data[1];
            document.getElementById(`totalProd`).innerText = data[2];
            if (data[0] == 0){
                document.getElementById(`${id}`).parentNode.parentNode.remove();
            }
            if (amountControl === "del"){
                document.getElementById(`${id}`).parentNode.parentNode.remove();
            }
            console.log(data);
        }
    })
}

$(document).ready(function() {
    console.log("ready!");
});
