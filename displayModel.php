<?php 

include "../../config.php";




if(!empty($_POST['make_id'])){
    $query="SELECT * FROM vehicle_model WHERE make_id  =".$_POST['make_id']. "";
    $result = $link->query($query);
    
    if($result->num_rows>0){
        echo '<option value="">Select Model</option>'; 
        while($row = $result->fetch_assoc()){
            echo '<option value="'.$row['model_id'].'">'.$row['model'].'</option>'; 
        }
    }else{
        echo '<option value="">Model not available</option>'; 

    }
}


?>