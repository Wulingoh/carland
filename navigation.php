<!-- navbar -->
<div class="">
    <nav class="navbar navbar-expand-lg navbar-fixed-top navbar-scroll shadow-0" style="background-color: #ffffff;">
        <div class="container">
            <!-- begin left side elements -->
            <a class="navbar-brand" href="#"><img src="images/Logo.png" /></a>
            <button class="navbar-toggler ps-0" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="d-flex justify-content-start align-items-center">
                    <i class="fas fa-bars"></i>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarExample01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link px-3" href="#!">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link px-3 dropdown-toggle" href="#!" data-bs-toggle="dropdown">Buy car</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"> Buy Used Car</a></li>
                            <li><a class="dropdown-item" href="#"> Buy New Car</a></li>
                            <li><a class="dropdown-item" href="#"> Submenu item 3 </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link px-3 dropdown-toggle" href="#!" data-bs-toggle="dropdown">Sell Car</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"> Trade-In</a></li>
                            <li><a class="dropdown-item" href="#"> Trade-Part</a></li>
                            <li><a class="dropdown-item" href="#"> Submenu item 3 </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link px-3 dropdown-toggle" href="#!" data-bs-toggle="dropdown">Why Carland</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"> Our Story</a></li>
                            <li><a class="dropdown-item" href="#"> Our Mission</a></li>
                            <li><a class="dropdown-item" href="#"> Our Values</a></li>
                            <li><a class="dropdown-item" href="#"> Our Team</a></li>
                            <li><a class="dropdown-item" href="#"> Submenu item 3 </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link px-3 dropdown-toggle" href="#!" data-bs-toggle="dropdown">Carland
                            Care</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"> Our Story</a></li>
                            <li><a class="dropdown-item" href="#"> Our Mission</a></li>
                            <li><a class="dropdown-item" href="#"> Our Values</a></li>
                            <li><a class="dropdown-item" href="#"> Our Team</a></li>
                            <li><a class="dropdown-item" href="#"> Submenu item 3 </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link px-3 dropdown-toggle" href="#!" data-bs-toggle="dropdown">Carland
                            Advice</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"> Our Story</a></li>
                            <li><a class="dropdown-item" href="#"> Our Mission</a></li>
                            <li><a class="dropdown-item" href="#"> Our Values</a></li>
                            <li><a class="dropdown-item" href="#"> Our Team</a></li>
                            <li><a class="dropdown-item" href="#"> Submenu item 3 </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- end of left side elements -->
            <!--begin of right side elements -->
            <ul class="navbar-nav d-flex flex-row ms-auto me-3 ml-2">
                <!-- Icon -->
                <?php
                if (isset($_SESSION['email'])) {
                    include "checkLogin.php";
                } else {    
                ?>
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link px-3" href="register.php">
                        Sign Up
                        <img class="sign-up" src="images/registered-solid.svg">
                    </a>
                </li>
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link px-3" href="login.php">
                        Login
                        <i class="bi bi-box-arrow-in-right"></i>
                    </a>
                </li>
                <?php 
                    } 
                ?>
            </ul>
            <!-- end of right side elements -->
        </div>
    </nav>
</div>

