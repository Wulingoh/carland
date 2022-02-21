<?php 
function breadcrumbs(){
  $bread = explode('/', $_SERVER['PHP_SELF']);
  $url = '/';
  $returnString = "<span class='bc0'><a href='$url'>home</a>";
  for($i=1;$i<count($bread)-1;$i++){
    $url.=$bread[$i].'/';
    $returnString .= " |</span> <span class='bc$i'><a href='$url'>$bread[$i]</a>";
  }
  echo $returnString.'</span>';
}
?>





<!-- <div class="row">
    <div class="pull-left col">
        <nav aria-label="breadcrumb">
             <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">BMW</li>
                <li class="breadcrumb-item active" aria-current="page">3 Series</li>
            </ol>
        </nav>
    </div>
</div> -->
