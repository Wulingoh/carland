<?php 
include "config.php";
include "library/image-creation.php";



//$result_count = mysqli_num_rows($query); define how many search results show  

//search make%price
if(isset($_GET['filterCar']) && $_GET['filterMin'] != '' && $_GET['filterMax'] != '' && $_GET['filterMake'] != '' ){
  $makeID = $_GET['filterMake'];
  $sqlMake = "SELECT * From carmake WHERE make_ID = '$makeID'";
  $resultMake = mysqli_query($link, $sqlMake);
  $rowMake = mysqli_fetch_array($resultMake);
  extract($rowMake);
  $make = $rowMake['car_Make'];

  $minPrice = $_GET['filterMin'];
  $maxPrice = $_GET['filterMax'];
  
  $sql = "SELECT cars.car_ID, cars.car_Year, cars.car_Price, cars.car_Detail, cars.car_Img, carmake.car_Make, carmodel.car_Model, cartype.car_Type, carcolor.car_Color, carfuel.car_Fuel, carsafe.car_Safe FROM ((((((cars INNER JOIN carmake ON cars.make_ID = carmake.make_ID) INNER JOIN carmodel ON cars.model_ID = carmodel.model_ID) INNER JOIN cartype ON cars.type_ID = cartype.type_ID) INNER JOIN carcolor ON cars.color_ID = carcolor.color_ID) INNER JOIN carfuel ON cars.fuel_ID = carfuel.fuel_ID) INNER JOIN carsafe ON cars.safe_ID = carsafe.safe_ID) WHERE  car_Price BETWEEN $minPrice AND $maxPrice && car_Make = '$make' ";
 
}

 //search make&model
else if (isset($_GET['filterCar']) && $_GET['filterMake'] != '' && $_GET['filterModel'] != '') {
  $makeID = $_GET['filterMake'];
  $sqlMake = "SELECT * From carmake WHERE make_ID = '$makeID'";
  $resultMake = mysqli_query($link, $sqlMake);
  $rowMake = mysqli_fetch_array($resultMake);
  extract($rowMake);
  $make = $rowMake['car_Make'];

  $modelID = $_GET['filterModel'];
  $sqlModel = "SELECT * From carmodel WHERE model_ID = '$modelID'";
  $resultModel = mysqli_query($link, $sqlModel);
  $rowModel = mysqli_fetch_array($resultModel);
  extract($rowModel);
  $model = $rowModel['car_Model'];

  $sql = "SELECT cars.car_ID, cars.car_Year, cars.car_Price, cars.car_Detail, cars.car_Img, carmake.car_Make, carmodel.car_Model, cartype.car_Type, carcolor.car_Color, carfuel.car_Fuel, carsafe.car_Safe FROM ((((((cars INNER JOIN carmake ON cars.make_ID = carmake.make_ID) INNER JOIN carmodel ON cars.model_ID = carmodel.model_ID) INNER JOIN cartype ON cars.type_ID = cartype.type_ID) INNER JOIN carcolor ON cars.color_ID = carcolor.color_ID) INNER JOIN carfuel ON cars.fuel_ID = carfuel.fuel_ID) INNER JOIN carsafe ON cars.safe_ID = carsafe.safe_ID) WHERE  car_Make = '$make' && car_Model = '$model'";
  


}
//search price range
else if(isset($_GET['filterCar']) && $_GET['filterMin'] != '' && $_GET['filterMax'] != ''){
  $minPrice = $_GET['filterMin'];
  $maxPrice = $_GET['filterMax'];
  $sql = "SELECT cars.car_ID, cars.car_Year, cars.car_Price, cars.car_Detail, cars.car_Img, carmake.car_Make, carmodel.car_Model, cartype.car_Type, carcolor.car_Color, carfuel.car_Fuel, carsafe.car_Safe FROM ((((((cars INNER JOIN carmake ON cars.make_ID = carmake.make_ID) INNER JOIN carmodel ON cars.model_ID = carmodel.model_ID) INNER JOIN cartype ON cars.type_ID = cartype.type_ID) INNER JOIN carcolor ON cars.color_ID = carcolor.color_ID) INNER JOIN carfuel ON cars.fuel_ID = carfuel.fuel_ID) INNER JOIN carsafe ON cars.safe_ID = carsafe.safe_ID) WHERE  car_Price BETWEEN $minPrice AND $maxPrice ";
 
}
//search min price
else if(isset($_GET['filterCar']) && $_GET['filterMin'] != ''){
  $minPrice = $_GET['filterMin'];
  
  $sql = "SELECT cars.car_ID, cars.car_Year, cars.car_Price, cars.car_Detail, cars.car_Img, carmake.car_Make, carmodel.car_Model, cartype.car_Type, carcolor.car_Color, carfuel.car_Fuel, carsafe.car_Safe FROM ((((((cars INNER JOIN carmake ON cars.make_ID = carmake.make_ID) INNER JOIN carmodel ON cars.model_ID = carmodel.model_ID) INNER JOIN cartype ON cars.type_ID = cartype.type_ID) INNER JOIN carcolor ON cars.color_ID = carcolor.color_ID) INNER JOIN carfuel ON cars.fuel_ID = carfuel.fuel_ID) INNER JOIN carsafe ON cars.safe_ID = carsafe.safe_ID) WHERE  car_Price > $minPrice ";
 
}
// search max price
else if(isset($_GET['filterCar']) && $_GET['filterMax'] != ''){
  
  $maxPrice = $_GET['filterMax'];
  $sql = "SELECT cars.car_ID, cars.car_Year, cars.car_Price, cars.car_Detail, cars.car_Img, carmake.car_Make, carmodel.car_Model, cartype.car_Type, carcolor.car_Color, carfuel.car_Fuel, carsafe.car_Safe FROM ((((((cars INNER JOIN carmake ON cars.make_ID = carmake.make_ID) INNER JOIN carmodel ON cars.model_ID = carmodel.model_ID) INNER JOIN cartype ON cars.type_ID = cartype.type_ID) INNER JOIN carcolor ON cars.color_ID = carcolor.color_ID) INNER JOIN carfuel ON cars.fuel_ID = carfuel.fuel_ID) INNER JOIN carsafe ON cars.safe_ID = carsafe.safe_ID) WHERE  car_Price < $maxPrice ";
 
}

//search type&make
  else if(isset($_GET['filterCar']) && $_GET['filterType'] != '' && $_GET['filterMake'] != ''){
    
    $typeID = $_GET['filterType'];
    $sqlType = "SELECT * From cartype WHERE type_ID = '$typeID'";
    $resultType = mysqli_query($link, $sqlType);
    $rowType = mysqli_fetch_array($resultType);
    extract($rowType);
    $type = $rowType['car_Type'];

    $makeID = $_GET['filterMake'];
    $sqlMake = "SELECT * From carmake WHERE make_ID = '$makeID'";
    $resultMake = mysqli_query($link, $sqlMake);
    $rowMake = mysqli_fetch_array($resultMake);
    extract($rowMake);
    $make = $rowMake['car_Make'];

    $sql = "SELECT cars.car_ID, cars.car_Year, cars.car_Price, cars.car_Detail, cars.car_Img, carmake.car_Make, carmodel.car_Model, cartype.car_Type, carcolor.car_Color, carfuel.car_Fuel, carsafe.car_Safe FROM ((((((cars INNER JOIN carmake ON cars.make_ID = carmake.make_ID) INNER JOIN carmodel ON cars.model_ID = carmodel.model_ID) INNER JOIN cartype ON cars.type_ID = cartype.type_ID) INNER JOIN carcolor ON cars.color_ID = carcolor.color_ID) INNER JOIN carfuel ON cars.fuel_ID = carfuel.fuel_ID) INNER JOIN carsafe ON cars.safe_ID = carsafe.safe_ID) WHERE car_Type = '$type' && car_Make = '$make'";

    }

  //search type
  else if(isset($_GET['filterCar']) && $_GET['filterType'] != ''){
  $typeID = $_GET['filterType'];
  $sqlType = "SELECT * From cartype WHERE type_ID = '$typeID'";
  $resultType = mysqli_query($link, $sqlType);
  $rowType = mysqli_fetch_array($resultType);
  extract($rowType);
  $type = $rowType['car_Type'];
  $sql = "SELECT cars.car_ID, cars.car_Year, cars.car_Price, cars.car_Detail, cars.car_Img, carmake.car_Make, carmodel.car_Model, cartype.car_Type, carcolor.car_Color, carfuel.car_Fuel, carsafe.car_Safe FROM ((((((cars INNER JOIN carmake ON cars.make_ID = carmake.make_ID) INNER JOIN carmodel ON cars.model_ID = carmodel.model_ID) INNER JOIN cartype ON cars.type_ID = cartype.type_ID) INNER JOIN carcolor ON cars.color_ID = carcolor.color_ID) INNER JOIN carfuel ON cars.fuel_ID = carfuel.fuel_ID) INNER JOIN carsafe ON cars.safe_ID = carsafe.safe_ID) WHERE car_Type = '$type'";

  }
 //  search make

 else if(isset($_GET['filterCar'])  && $_GET['filterMake'] != ''){
  

  $makeID = $_GET['filterMake'];
  $sqlMake = "SELECT * From carmake WHERE make_ID = '$makeID'";
  $resultMake = mysqli_query($link, $sqlMake);
  $rowMake = mysqli_fetch_array($resultMake);
  extract($rowMake);
  $make = $rowMake['car_Make'];
  $sql = "SELECT cars.car_ID, cars.car_Year, cars.car_Price, cars.car_Detail, cars.car_Img, carmake.car_Make, carmodel.car_Model, cartype.car_Type, carcolor.car_Color, carfuel.car_Fuel, carsafe.car_Safe FROM ((((((cars INNER JOIN carmake ON cars.make_ID = carmake.make_ID) INNER JOIN carmodel ON cars.model_ID = carmodel.model_ID) INNER JOIN cartype ON cars.type_ID = cartype.type_ID) INNER JOIN carcolor ON cars.color_ID = carcolor.color_ID) INNER JOIN carfuel ON cars.fuel_ID = carfuel.fuel_ID) INNER JOIN carsafe ON cars.safe_ID = carsafe.safe_ID) WHERE  car_Make = '$make'";
  }




  //search all
  else{  
  
  $sql = "SELECT cars.car_ID, cars.car_Year, cars.car_Price, cars.car_Detail, cars.car_Img, carmake.car_Make, carmodel.car_Model, cartype.car_Type, carcolor.car_Color, carfuel.car_Fuel, carsafe.car_Safe FROM ((((((cars INNER JOIN carmake ON cars.make_ID = carmake.make_ID) INNER JOIN carmodel ON cars.model_ID = carmodel.model_ID) INNER JOIN cartype ON cars.type_ID = cartype.type_ID) INNER JOIN carcolor ON cars.color_ID = carcolor.color_ID) INNER JOIN carfuel ON cars.fuel_ID = carfuel.fuel_ID) INNER JOIN carsafe ON cars.safe_ID = carsafe.safe_ID)";
 
}
  $result = mysqli_query($link, $sql);
  
  while($row = mysqli_fetch_array($result)){

    $id = $row['car_ID'];
    $year = $row['car_Year'];
    $price = $row['car_Price'];
    $detail = $row['car_Detail'];
    $img = $row['car_Img'];
    $make = $row['car_Make'];
    $model = $row['car_Model'];
    $type = $row['car_Type'];
    $color = $row['car_Color'];
    $fuel = $row['car_Fuel'];
    $safe = $row['car_Safe'];
  }
  
?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Vicky Kang">
  <meta name="keyword" content="cardealer, value car, used car">
  <title>View all the vehicles</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <link href="css/index.css" rel="stylesheet">
  

  
</head>
<body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>