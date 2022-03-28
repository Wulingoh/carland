  function arrowChange1() {
      if (document.getElementById("arrowDown1").className == "bi bi-caret-down-fill") {
        document.getElementById("arrowDown1").className = "bi bi-caret-up-fill";


      } else {
        document.getElementById("arrowDown1").className = "bi bi-caret-down-fill";


      }

    }

    function arrowChange2() {
      if (document.getElementById("arrowDown2").className == "bi bi-caret-down-fill") {
        document.getElementById("arrowDown2").className = "bi bi-caret-up-fill";


      } else {
        document.getElementById("arrowDown2").className = "bi bi-caret-down-fill";


      }

    }

  function deleteUser(user_id) {
    if (confirm("Are you sure you want to delete this User?")) {
      window.location.href = "../users/deleteUser.php?userId=" + user_id;
    }

  }

  function deleteVehicle(vehicleId) {
    if (confirm("Are you sure you want to delete this Vehicle?")) {
       window.location.href = "../vehicles/deleteVehicle.php?vehicleId=" + vehicleId;
    }

 }
// display car model from different make
 $(document).ready(function(){
    $('#make').on('change',function(){
      var makeID = $(this).val();
      if (makeID){
        $.ajax({
          type: 'POST',
          url: 'displayModel.php',
          data: 'make_id='+makeID,
          success:function(html){
            $('#model').html(html);
  
          }
  
        });
      }else{
        $('#model').html('<option value="">Select make first</option>');
      }
    
    });
  });


  function deleteImg(car_id, img_id) {
    if (confirm("Are you sure you want to delete this image?")) {
      window.location.href = "deleteGallery.php?vehicleId=" + car_id + "&imgID=" + img_id;
    }
  }

  $(document).ready(function() {
    $('#make').on('change', function() {
      var makeID = $(this).val();
      if (makeID) {
        $.ajax({
          type: 'POST',
          url: 'displayModel.php',
          data: 'make_id=' + makeID,
          success: function(html) {
            $('#model').html(html);

          }

        });
      } else {
        $('#model').html('<option value="">Select make first</option>');
      }

    });

    $('#openModel').on('click', function(e) {
      var make = $('#make').val();
      if(make != '') {
        $('#makeModel').val(make)
      } else {
        e.stopImmediatePropagation();
        $('.openModelWrapper').append("<p>Please Select Make First!</p>");
      }
    })
  });

  if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
  }