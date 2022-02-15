<?php 

include('../../config.php');



if(!empty($_POST['make_ID'])){
    $query="SELECT * FROM carmodel WHERE make_ID  =".$_POST['make_ID']. "";
    $result = $link->query($query);
    
    if($result->num_rows>0){
        echo '<option value="">Select Model</option>'; 
        while($row = $result->fetch_assoc()){
            echo '<option value="'.$row['model_ID'].'">'.$row['car_Model'].'</option>'; 
        }
    }else{
        echo '<option value="">Model not available</option>'; 

    }
}


?>