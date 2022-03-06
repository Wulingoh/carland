
$(document).ready(function() {
    $(".favourite-heart").on('click', function(evt) {
        var carId = $(this).data('carid');
        $.ajax({
            type: "POST",
            url: "toggleFavouriteVehicle.php",
            data: {carId: carId},
            success:function(data) {
                if(data == '1') {
                    $('a[data-carID="' + carId + '"] > i.bi-balloon-heart-fill').css({"color":"#DF4E3C"})
                } else {
                    $('a[data-carID="' + carId + '"] > i.bi-balloon-heart-fill').css({"color":"white"})
                }
            },
            error:function(jqxhr, status) {
                window.location = 'login.php';
            }
        });
    });
});


  