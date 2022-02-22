<?php
	// check if the member is sign in
	if (isset($_SESSION['email'])) {
        echo '<li class="nav-item me-3 me-lg-0">Welcome ' . $_SESSION['email'] . '!'. '</li> <li class="nav-item me-3 me-lg-0"><a class="nav-link px-3" href="logout.php">Logout<i class="bi bi-box-arrow-right"></i></a></li>'; 
        
    }
?>
