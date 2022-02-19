<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carland</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/jquery-1.10.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carland</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <script src="js/jquery-1.10.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <link href="css/style.css" rel="stylesheet">
        <link href="icon/bootstrap-icons.css" rel="stylesheet">
    </head>

    <body>
       
        <?php include "navigation.php"?>

        <section class="container-fluid">
            <div class="container">
                <div class="row">
                    <!-- landing image -->
                    <div class="col-7">
                        <img src="images/landingImage.png" />
                    </div>
                    <!-- landing select form -->
                    <div class="col-5 landing-forms">
                        <!-- Tabs navs -->
                        <ul class="nav nav-tabs landing-nav" id="ex1" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="ex1-tab-1" data-mdb-toggle="tab" href="#ex1-tabs-1" role="tab" aria-controls="ex1-tabs-1" aria-selected="true">Buy</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="ex1-tab-2" data-mdb-toggle="tab" href="#ex1-tabs-2" role="tab" aria-controls="ex1-tabs-2" aria-selected="false">Sell</a>
                            </li>
                        </ul>
                        <!-- Tabs navs -->

                        <!-- Tabs content -->
                        <div class="tab-content landing-content" id="ex1-content">
                            <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01">
                                        <option selected>Select Make</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                        <option value="4">Four</option>
                                    </select>
                                    <select class="custom-select" id="inputGroupSelect01">
                                        <option selected>Select Make</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                        <option value="4">Four</option>
                                    </select>
                                    <select class="custom-select" id="inputGroupSelect01">
                                        <option selected>Select Make</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                        <option value="4">Four</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01">
                                        <option selected>Value</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                        <option value="4">Four</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Tabs content -->
                    </div>
                </div>
            </div>
        </section>
        <section class="container-fluid mt-5 pt-2">
            <div class="row">
                <h4>Latest Vehicle News</h4>
                <div class="col-7 mt-5">
                    <img src="images/tesla.svg" alt="Tesla" />
                </div>
                <div class="pl-2 mt-5 d-flex">
                    <img src="images/tesla-logo.svg" alt="Tesla Logo" width="100px" height="124px">
                    <img src="images/tesla-logo.svg" alt="Tesla Logo" width="100px" height="124px">
                    <img src="images/tesla-logo.svg" alt="Tesla Logo" width="100px" height="124px">
                </div>
            </div>
        </section>
        <section class="brands-block mt-5 border border-primary">
            <h4>Search by Popular Brands</h4>
            <div class="container">
                <div class="row d-flex">
                    <div class="col">
                        <a class="brand" href="#"><img src="images/ford-logo.svg" /></a>
                    </div>
                    <div class="col">
                        <a class="brand" href="#"><img src="images/toyota-logo.svg" /></a>
                    </div>
                    <div class="col">
                        <a class="brand" href="#"><img src="images/hondalogo.svg" /></a>
                    </div>
                    <div class="col">
                        <a class="brand" href="#"><img src="images/mazdalogo.svg" /></a>
                    </div>
                    <div class="col">
                        <a class="brand" href="#"><img src="images/mitsubishilogo.svg" /></a>
                    </div>
                    <div class="col">
                        <a class="brand" href="#"><img src="images/toyota-logo.svg" /></a>
                    </div>
                    <div class="col">
                        <a class="brand" href="#"><img src="images/toyota-logo.svg" /></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of brands search -->
        <!-- products carousel -->
        <section class="container-xl mt-5">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="carousel-title">Featured <b>Products</b></h2>
                    <div id="productsCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                        <ol class="carousel-indicators">
                            <li data-target="#productsCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#productsCarousel" data-slide-to="1" class="active"></li>
                            <li data-target="#productsCarousel" data-slide-to="2" class="active"></li>
                        </ol>
                        <!-- wrapper for carousel items -->
                        <div class="carousel-inner">
                            <div class="item carousel-item active">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon">
                                                <i class="bi bi-heart"></i>
                                            </span>
                                            <div class="img-box">
                                                <img src="images/BMW3Series/image1.jpeg" class="img-fluid" alt="BMW 3 Series White">
                                                <div class="thumb-content">
                                                    <h4>BMW 3 Series</h4>
                                                    <div class="star-rating"></div>
                                                    <p class="item-price"><strike>$400.00</strike> <b>$369.00</b>
                                                    </p>
                                                    <a href="#" class="btn btn-primary-outline">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon">
                                                <i class="bi bi-heart"></i>
                                            </span>
                                            <div class="img-box">
                                                <img src="images/BMW3Series/image1.jpeg" class="img-fluid" alt="BMW 3 Series White">
                                                <div class="thumb-content">
                                                    <h4>BMW 3 Series</h4>
                                                    <div class="star-rating"></div>
                                                    <p class="item-price"><strike>$400.00</strike> <b>$369.00</b>
                                                    </p>
                                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon">
                                                <i class="bi bi-heart"></i>
                                            </span>
                                            <div class="img-box">
                                                <img src="images/BMW3Series/image1.jpeg" class="img-fluid" alt="BMW 3 Series White">
                                                <div class="thumb-content">
                                                    <h4>BMW 3 Series</h4>
                                                    <div class="star-rating"></div>
                                                    <p class="item-price"><strike>$400.00</strike> <b>$369.00</b>
                                                    </p>
                                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon">
                                                <i class="bi bi-heart"></i>
                                            </span>
                                            <div class="img-box">
                                                <img src="images/BMW3Series/image1.jpeg" class="img-fluid" alt="BMW 3 Series White">
                                                <div class="thumb-content">
                                                    <h4>BMW 3 Series</h4>
                                                    <div class="star-rating"></div>
                                                    <p class="item-price"><strike>$400.00</strike> <b>$369.00</b>
                                                    </p>
                                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item carousel-item">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon">
                                                <i class="bi bi-heart"></i>
                                            </span>
                                            <div class="img-box">
                                                <img src="images/BMW3Series/image1.jpeg" class="img-fluid" alt="BMW 3 Series White">
                                                <div class="thumb-content">
                                                    <h4>BMW 3 Series</h4>
                                                    <div class="star-rating"></div>
                                                    <p class="item-price"><strike>$400.00</strike> <b>$369.00</b>
                                                    </p>
                                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon">
                                                <i class="bi bi-heart"></i>
                                            </span>
                                            <div class="img-box">
                                                <img src="images/BMW3Series/image1.jpeg" class="img-fluid" alt="BMW 3 Series White">
                                                <div class="thumb-content">
                                                    <h4>BMW 3 Series</h4>
                                                    <div class="star-rating"></div>
                                                    <p class="item-price"><strike>$400.00</strike> <b>$369.00</b>
                                                    </p>
                                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon">
                                                <i class="bi bi-heart"></i>
                                            </span>
                                            <div class="img-box">
                                                <img src="images/BMW3Series/image1.jpeg" class="img-fluid" alt="BMW 3 Series White">
                                                <div class="thumb-content">
                                                    <h4>BMW 3 Series</h4>
                                                    <div class="star-rating"></div>
                                                    <p class="item-price"><strike>$400.00</strike> <b>$369.00</b>
                                                    </p>
                                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon">
                                                <i class="bi bi-heart"></i>
                                            </span>
                                            <div class="img-box">
                                                <img src="images/BMW3Series/image1.jpeg" class="img-fluid" alt="BMW 3 Series White">
                                                <div class="thumb-content">
                                                    <h4>BMW 3 Series</h4>
                                                    <div class="star-rating"></div>
                                                    <p class="item-price"><strike>$400.00</strike> <b>$369.00</b>
                                                    </p>
                                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item carousel-item">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon">
                                                <i class="bi bi-heart"></i>
                                            </span>
                                            <div class="img-box">
                                                <img src="images/BMW3Series/image1.jpeg" class="img-fluid" alt="BMW 3 Series White">
                                                <div class="thumb-content">
                                                    <h4>BMW 3 Series</h4>
                                                    <div class="star-rating"></div>
                                                    <p class="item-price"><strike>$400.00</strike> <b>$369.00</b>
                                                    </p>
                                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon">
                                                <i class="bi bi-heart"></i>
                                            </span>
                                            <div class="img-box">
                                                <img src="images/BMW3Series/image1.jpeg" class="img-fluid" alt="BMW 3 Series White">
                                                <div class="thumb-content">
                                                    <h4>BMW 3 Series</h4>
                                                    <div class="star-rating"></div>
                                                    <p class="item-price"><strike>$400.00</strike> <b>$369.00</b>
                                                    </p>
                                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon">
                                                <i class="bi bi-heart"></i>
                                            </span>
                                            <div class="img-box">
                                                <img src="images/BMW3Series/image1.jpeg" class="img-fluid" alt="BMW 3 Series White">
                                                <div class="thumb-content">
                                                    <h4>BMW 3 Series</h4>
                                                    <div class="star-rating"></div>
                                                    <p class="item-price"><strike>$400.00</strike> <b>$369.00</b>
                                                    </p>
                                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon">
                                                <i class="bi bi-heart"></i>
                                            </span>
                                            <div class="img-box">
                                                <img src="images/BMW3Series/image1.jpeg" class="img-fluid" alt="BMW 3 Series White">
                                                <div class="thumb-content">
                                                    <h4>BMW 3 Series</h4>
                                                    <div class="star-rating"></div>
                                                    <p class="item-price"><strike>$400.00</strike> <b>$369.00</b>
                                                    </p>
                                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <a class="carousel-control-prev" href="#productsCarousel" data-slide="prev">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    <a class="carousel-control-next" href="#productsCarousel" data-slide="next">
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>
        <?php include "footer.php" ?>
    </body>

    </html>