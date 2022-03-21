
$(document).ready(function() {
    $(".favourite-heart").on('click', function(evt) {
        var carId = $(this).data('carid');
        $.ajax({
            type: "POST",
            url: "toggleFavouriteVehicle.php",
            data: {carId: carId},
            success:function(data) {
                var counterNumber = $(".counterNumber")
                if(data == '1') {
                    $('a[data-carID="' + carId + '"] > i.bi-balloon-heart-fill').css({"color":"#DF4E3C"})
                    counterNumber.text(parseInt(counterNumber.text()) + 1);
                    
                } else {
                    $('a[data-carID="' + carId + '"] > i.bi-balloon-heart-fill').css({"color":"white"})
                    counterNumber.text(parseInt(counterNumber.text()) - 1);
                    
                }
            },
            error:function(jqxhr, status) {
                window.location = 'login.php';
            }
        });
    });
});

// remove favourite using btn on display favourite page 

$(document).ready(function() {
    $(".favouriteHeartBtn").on('click', function(evt) {
        var carId = $(this).data('carid');
        $.ajax({
            type: "POST",
            url: "toggleFavouriteVehicle.php",
            data: {carId: carId},
            success:function(data) {
                if(data == '0') {
                    location.reload();
                }
            },
            error:function(jqxhr, status) {
                window.location = 'login.php';
            }
        });
    });
});

// sorting in product listing page 

function submitSelectpicker() {
    document.getElementById('orderBy').submit();
}



  