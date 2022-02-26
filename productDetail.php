<?php 
include "config.php";
include "returnPage.php";
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
    <link href="icon/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <?php include "navigation.php"?>
    <!-- sidebar filter -->
    <section class="container-fluid">
        <div class="row">
            <div class="col-3">
                <!-- Sidebar -->
                <?php include "sidebarFilter.php" ?>
                <!-- Sidebar -->
            </div>
            <!-- main content -->
            <div class="col-sm-9">
                <!-- breadcrumbs -->
                <div class="row">
                    <div class="pull-left col">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">BMW</li>
                                <li class="breadcrumb-item active" aria-current="page">3 Series</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end of breadcrumbs -->
                <!-- main-header -->
                <div class="row">
                    <div class="col main-header ml-3">
                        <h4 class="main-title">BMW 3 Series</h4>
                        <h4 class="model-title">2L M Sport 320i</h6>
                    </div>
                    <div class="price-tag align-items-center  mr-5">
                        <h4>$55,125</h4>
                        <a href="#" class="btn btn-outline-success btn-bookTest" role="button">Book Test Drive Now</a>
                    </div>
                </div>
                <!-- end of main header -->
                <!-- sort style page element -->
                <!--Carousel Wrapper-->
                <div class="container-carousel-wrapper">
                    <div class="carousel-container position-relative">
                        <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-slide-number="0">
                                    <img src="images/BMW3Series/image1.jpeg" class="d-block w-100" alt="..." data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                </div>
                                <div class="carousel-item" data-slide-number="1">
                                    <img src="images/BMW3Series/image2.jpeg" class="d-block w-100" alt="..." data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                </div>
                                <div class="carousel-item" data-slide-number="2">
                                    <img src="images/BMW3Series/image3.jpeg" class="d-block w-100" alt="..." data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                </div>
                                <div class="carousel-item" data-slide-number="3">
                                    <img src="images/BMW3Series/image4.jpeg" class="d-block w-100" alt="..." data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                </div>
                                <div class="carousel-item" data-slide-number="4">
                                    <img src="images/BMW3Series/image5.jpeg" class="d-block w-100" alt="..." data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                </div>
                                <div class="carousel-item" data-slide-number="5">
                                    <img src="images/BMW3Series/image6.jpeg" class="d-block w-100" alt="..." data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                </div>
                                <div class="carousel-item" data-slide-number="6">
                                    <img src="images/BMW3Series/image7.jpeg" class="d-block w-100" alt="..." data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                </div>
                                <div class="carousel-item" data-slide-number="7">
                                    <img src="images/BMW3Series/image8.jpeg" class="d-block w-100" alt="..." data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                </div>
                                <div class="carousel-item" data-slide-number="8">
                                    <img src="images/BMW3Series/image9.jpeg" class="d-block w-100" alt="..." data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                </div>
                                <div class="carousel-item" data-slide-number="9">
                                    <img src="images/BMW3Series/image10.jpeg" class="d-block w-100" alt="..." data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                                </div>
                            </div>
                        </div>
                        <!-- Carousel Navigation -->
                        <div id="carousel-thumbs" class="carousel slide carousel-thumbnails" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row mx-0">
                                        <div id="carousel-selector-0" class="thumb col-4 col-sm-2 px-1 py-2 selected" data-target="#myCarousel" data-slide-to="0">
                                            <img src="images/BMW3Series/image1.jpeg" class="img-fluid" alt="...">
                                        </div>
                                        <div id="carousel-selector-1" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="1">
                                            <img src="images/BMW3Series/image2.jpeg" class="img-fluid" alt="...">
                                        </div>
                                        <div id="carousel-selector-2" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="2">
                                            <img src="images/BMW3Series/image3.jpeg" class="img-fluid" alt="...">
                                        </div>
                                        <div id="carousel-selector-3" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="3">
                                            <img src="images/BMW3Series/image4.jpeg" class="img-fluid" alt="...">
                                        </div>
                                        <div id="carousel-selector-4" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="4">
                                            <img src="images/BMW3Series/image5.jpeg" class="img-fluid" alt="...">
                                        </div>
                                        <div id="carousel-selector-5" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="5">
                                            <img src="images/BMW3Series/image6.jpeg" class="img-fluid" alt="...">
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row mx-0">
                                        <div id="carousel-selector-6" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="6">
                                            <img src="images/BMW3Series/image7.jpeg" class="img-fluid" alt="...">
                                        </div>
                                        <div id="carousel-selector-7" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="7">
                                            <img src="images/BMW3Series/image8.jpeg" class="img-fluid" alt="...">
                                        </div>
                                        <div id="carousel-selector-8" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="8">
                                            <img src="images/BMW3Series/image9.jpeg" class="img-fluid" alt="...">
                                        </div>
                                        <div id="carousel-selector-9" class="thumb col-4 col-sm-2 px-1 py-2" data-target="#myCarousel" data-slide-to="9">
                                            <img src="images/BMW3Series/image10.jpeg" class="img-fluid" alt="...">
                                        </div>
                                        <div class="col-2 px-1 py-2">
                                        </div>
                                        <div class="col-2 px-1 py-2"></div>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div> <!-- /container -->
                    <!--/.Carousel Wrapper-->
                </div>
                <!-- end of sort style page element -->
                <div class="row justify-content-between">
                    <li class="list-unstyled w-25">
                        <div class="icon-style">
                            <i class="bi bi-calendar4-event"></i>
                            <span class="icon-text-bi">Reg date</span>
                        </div>
                        <p class="icon-text">Apr 2017</p>
                    </li>
                    <li class="list-unstyled w-25">
                        <div class="icon-style">
                            <i class="bi bi-speedometer"></i>
                            <span class="icon-text-bi">Mileage</span>
                        </div>
                        <p class="icon-text">41,187 miles</p>
                    </li>
                    <li class="list-unstyled w-25">
                        <div class="icon-style">
                            <svg width="50" height="50" viewBox="0 0 24 24" class="sc-1tndrw2-0 hGYlvQ">
                                <path d="M19.77 7.23l.01-.01-3.72-3.72L15 4.56l2.11 2.11c-.94.36-1.61 1.26-1.61 2.33a2.5 2.5 0 002.5 2.5c.36 0 .69-.08 1-.21v7.21c0 .55-.45 1-1 1s-1-.45-1-1V14c0-1.1-.9-2-2-2h-1V5c0-1.1-.9-2-2-2H6c-1.1 0-2 .9-2 2v16h10v-7.5h1.5v5a2.5 2.5 0 005 0V9c0-.69-.28-1.32-.73-1.77zM12 10H6V5h6v5zm6 0c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1z" fill="#FFF" fill-rule="evenodd">
                                </path>
                            </svg>
                            <span class="icon-text-bi">Fuel type</span>
                        </div>
                        <p class="icon-text">Petrol</p>
                    </li>
                </div>
                <!-- end of first key features row -->
                <div class="row justify-content-between mt-3">
                    <li class="list-unstyled w-25">
                        <div class="icon-style">
                            <svg width="50" height="50" viewBox="0 0 24 24" fill="none" class="sc-1tndrw2-0 hGYlvQ">
                                <path d="M11.843 2C10.1 2 8.685 3.37 8.685 5.061V18.94c0 1.69 1.414 3.061 3.158 3.061s3.158-1.37 3.158-3.061V5.06c0-1.64-1.332-2.98-3.005-3.057L11.843 2zm0 1.429c.93 0 1.684.73 1.684 1.632V18.94c0 .901-.754 1.632-1.684 1.632-.93 0-1.684-.73-1.684-1.632V5.06c0-.901.754-1.632 1.684-1.632z" fill="#000"></path>
                                <path d="M17.145 12.526H7.486c-.82 0-1.486.562-1.486 1.255v1.702c0 .692.665 1.254 1.486 1.254h9.66c.82 0 1.486-.562 1.486-1.254V13.78c0-.693-.666-1.255-1.487-1.255zM17.579 4.105a1.053 1.053 0 100-2.105 1.053 1.053 0 000 2.105zM17.579 9.368a1.053 1.053 0 100-2.105 1.053 1.053 0 000 2.105zM17.579 22a1.053 1.053 0 100-2.105 1.053 1.053 0 000 2.105z" fill="#000"></path>
                            </svg>
                            <span class="icon-text-bi">Transmission</span>
                        </div>
                        <p class="icon-text">Automatic </p>
                        <p class="icon-text">Rear Wheels</p>
                    </li>
                    <li class="list-unstyled w-25">
                        <div class="icon-style">
                            <svg width="50" height="50" viewBox="0 0 24 24" fill="none" class="sc-1tndrw2-0 hGYlvQ">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.113 18.487c.695-.118 1.378.258 1.62.893a4.02 4.02 0 01.225 2.02.718.718 0 01-.72.6H6.762a.718.718 0 01-.72-.601c-.1-.68-.023-1.373.223-2.02.244-.634.926-1.01 1.62-.892a24.7 24.7 0 008.227 0zM14.378 7.489c1.092 0 1.992.784 2.053 1.787l.366 6.103c.059.983-.71 1.842-1.77 1.98a23.9 23.9 0 01-6.055 0c-1.059-.138-1.828-.997-1.769-1.98l.366-6.103c.06-1.003.962-1.787 2.053-1.787h4.756zM14.362 2.101a27.699 27.699 0 00-4.725 0 2.755 2.755 0 00-.418.986C9.082 3.752 9.009 4.424 9 5.1c-.01.753.64 1.382 1.478 1.431 1.014.058 2.03.058 3.044 0 .838-.048 1.487-.677 1.478-1.43a10.665 10.665 0 00-.219-2.013 2.795 2.795 0 00-.42-.986z" fill="#000"></path>
                            </svg>
                            <span class="icon-text-bi">Seats</span>
                        </div>
                        <p class="icon-text">Leather, 5 Seats</p>
                    </li>
                    <li class="list-unstyled w-25">
                        <div class="icon-style">
                            <svg width="50" height="50" viewBox="0 0 24 24" fill="none" class="sc-1tndrw2-0 hGYlvQ">
                                <path d="M14.735 5v1.503l-1.503-.001v.752h2.321c.433 0 .784.375.784.839v.366c.007.563.09 1.14.8 1.156l1.094.021v1.363h1.087V9.636h2.08l.59 2.214.009.05.003.052v4.197l-.003.049-.008.048-.57 2.238h-2.06v-1.489h-1.128v1.782c0 .636-.892.653-1.173.643l-.084-.005H9.49a.42.42 0 01-.261-.09l-.052-.05-1.38-1.54a.838.838 0 00-.524-.272l-.101-.006H6.017c-.543 0-.99-.413-1.043-.942l-.005-.107v-1.642H3.501v1.503H2v-6.01h1.503l-.001 1.502h1.466v-1.097c0-.542.413-.989.942-1.042l.107-.006h1.217a.21.21 0 00.204-.161l.005-.049V8.093c0-.43.303-.785.693-.833l.091-.006h2v-.752H8.725V5h6.01zm.14 3.724H8.912v.682a1.68 1.68 0 01-1.554 1.675l-.125.005h-.796v4.9h.734c.601 0 1.176.235 1.606.65l.113.118 1.067 1.191h6.803v-2.42h3.769v-3.057h-3.769v-1.41l-.142-.02c-1.154-.209-1.646-1.078-1.737-2.208l-.008-.106z" fill="#000"></path>
                            </svg>
                            <span class="icon-text-bi">Engine</span>
                        </div>
                        <p class="icon-text">2L</p>
                    </li>
                </div>
                <!-- end of key features second row -->
                <div class="row justify-content-between mt-3">
                    <li class="list-unstyled w-25">
                        <div class="icon-style">
                            <svg width="50" height="50" viewBox="0 0 25 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M25 14.625V16.9688C25 17.833 24.4414 18.5312 23.75 18.5312H22.4492C22.1523 20.748 20.6094 22.4375 18.75 22.4375C16.8906 22.4375 15.3477 20.748 15.0508 18.5312H9.94922C9.65234 20.748 8.10938 22.4375 6.25 22.4375C4.39062 22.4375 2.84922 20.748 2.55195 18.5312H1.25C0.559766 18.5312 0 17.833 0 16.9688V11.5C0 10.1768 0.656641 9.04883 1.58438 8.58984L3.21094 3.50928C3.78047 1.72949 5.16016 0.5625 6.69141 0.5625H13.7969C14.9375 0.5625 15.9805 1.20996 16.7266 2.32178L20.6328 8.42383C23.0938 8.77051 25 11.4414 25 14.5811V14.625ZM6.69141 3.6875C6.17969 3.6875 5.72266 4.03418 5.53125 4.66895L4.34766 8.375H8.75V3.6875H6.69141ZM10.625 8.375H17.3984L14.7734 4.27344C14.5391 3.90234 14.1445 3.6875 13.7969 3.6875H10.625V8.375ZM20.5195 18.5312C20.5859 18.2432 20.625 18.0234 20.625 17.75C20.625 16.4561 19.7852 15.4062 18.75 15.4062C17.7148 15.4062 16.875 16.4561 16.875 17.75C16.875 18.0234 16.8789 18.2432 16.9805 18.5312C17.2383 19.4395 17.9336 20.0938 18.75 20.0938C19.5664 20.0938 20.2617 19.4395 20.5195 18.5312ZM8.01953 18.5312C8.08594 18.2432 8.125 18.0234 8.125 17.75C8.125 16.4561 7.28516 15.4062 6.25 15.4062C5.21484 15.4062 4.375 16.4561 4.375 17.75C4.375 18.0234 4.37891 18.2432 4.48047 18.5312C4.73828 19.4395 5.43359 20.0938 6.25 20.0938C7.06641 20.0938 7.76172 19.4395 8.01953 18.5312Z" fill="#D64F3F" />
                            </svg>
                            <span class="icon-text-bi">Body Type</span>
                        </div>
                        <p class="icon-text">4 doors, Sedan</p>
                    </li>
                    <li class="list-unstyled w-25">
                        <div class="icon-style">
                            <i class="bi bi-person-bounding-box"></i>
                            <span class="icon-text-bi">NZ Owner</span>
                        </div>
                        <p class="icon-text"></p>
                    </li>
                    <li class="list-unstyled w-25">
                        <div class="icon-style">
                            <svg width="50" height="56" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                <path d="M512 64 128 192v384c0 212.1 171.9 384 384 384s384-171.9 384-384V192L512 64zm312 512c0 172.3-139.7 312-312 312S200 748.3 200 576V246l312-110 312 110v330z" />
                                <path d="M378.4 475.1a35.91 35.91 0 0 0-50.9 0 35.91 35.91 0 0 0 0 50.9l129.4 129.4 2.1 2.1a33.98 33.98 0 0 0 48.1 0L730.6 434a33.98 33.98 0 0 0 0-48.1l-2.8-2.8a33.98 33.98 0 0 0-48.1 0L483 579.7 378.4 475.1z" />
                            </svg>
                            <span class="icon-text-bi">Safety Rating</span>
                        </div>
                        <p class="icon-text">
                            <i class="bi bi-emoji-smile"></i>
                            <i class="bi bi-emoji-smile"></i>
                            <i class="bi bi-emoji-smile"></i>
                            <i class="bi bi-emoji-smile"></i>
                            <i class="bi bi-emoji-smile"></i>
                        </p>
                    </li>
                </div>
                <!-- end of key features third row -->
                <div class="row justify-content-start mt-2">
                    <li class="list-unstyled">
                        <div class="icon-style">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="35px" height="35px" viewBox="0 0 436.844 436.844" style="enable-background:new 0 0 436.844 436.844;" xml:space="preserve">
                                <path d="M0,112.738c0,14.768,11.971,26.737,26.741,26.737c14.766,0,26.735-11.97,26.735-26.737S26.741,67.152,26.741,67.152
                                           S0,97.971,0,112.738z" />
                                <path d="M433.4,168.984c-4.48-12.273-12.781-22.217-22.069-30.094l2.8-4.878l-27.377-15.716l3.425-6.339l-114.077-61.62
                                           l-0.003,0.007l-29.593-15.978l-99.853-8.488l-4.177,7.732L97.753,9.454l-66.829,6.595l2.455,24.88L92.6,35.083l37.994,20.522
                                           l-4.854,8.985l77.802,42.024l13.542,52.983l30.265,16.345l42.795-5.333l58.063,19.044l16.22-30.029l0.003,0.003l4.258-7.886
                                           l26.524,15.227l1.848-3.219c4.761,4.756,8.188,9.768,10.041,14.841c2.987,8.177,2.056,16.837-2.89,26.548
                                           c-11.484,22.909-46.961,40.323-105.441,51.761c-9.396,1.838-19.121,2.926-29.418,4.076c-31.361,3.504-66.909,7.477-90.902,36.436
                                           l-0.108,0.131c-19.171,23.721-22.8,52.629-9.955,79.312c14.652,30.442,48.06,50.753,83.13,50.534l-0.172-27.999
                                           c-24.474,0.15-47.672-13.786-57.729-34.679c-4.672-9.708-10.042-29.039,6.447-49.499c16.78-20.191,42.558-23.075,72.399-26.409
                                           c10.403-1.163,21.162-2.364,31.684-4.424c68.384-13.374,109.305-35.188,125.059-66.613
                                           C437.708,201.058,439.121,184.646,433.4,168.984z M338.556,165.44l-44.354-14.547l-31.7-2.83l4.016-7.431l14.172-26.237
                                           l66.142,35.727L338.556,165.44z" />
                            </svg>
                            <span class="icon-text-bi">Fuelsaver</span>
                        </div>
                        <p class="icon-text">
                            <img src="images/fuelEconomyRating 1.svg" alt="Fuel Economy Rating" />
                        </p>
                        <p class="icon-text-bi">Fuel costs of $7,030 per year</p>
                        <p class="icon-text-bi">Fuel economy is 7.0 litres per 100km</p>
                        <p class="icon-text-bi">Cost per year based on price per litre of diesel $1.45 and an average
                            distance of 40000 km</p>
                    </li>
                </div>
            </div>
        </div>
        <!-- Product Description -->
        </div>
        <!-- end of key feature description -->
        <!-- end of Product Description -->
        <!-- divider -->
        <div class="clearfix"></div>
        <!-- divider block -->
        <div class="row finance-row mt-2">
            <div class="container finance-block-wrapper mb-3">
                <h4 class="text-center font-weight-bolder">Complete car confidence</h4>
                <div class="row borderless-card-row">
                    <div class="borderless mb-3 mr-2 card-icon" style="max-width: 18rem;">
                        <div class="card-header border-bottom-0 text-center card-header-dividerIcon"><img class="divider-icon" src="images/meritIcon.png" alt="" />
                        </div>
                        <div class="card-body border-top-0">
                            <h6 class="card-title text-center font-weight-bold card-title-dividerTitle">Carland Quality
                                Assured</h6>
                            <p class="card-text text-center font-weight-lighter card-text-dividerText">All used Carland
                                cars have passed through 300 point inspection, been fully reconditioned and have a
                                recent service and VTNZ, if required.</p>
                        </div>
                    </div>
                    <div class="borderless mb-3 mr-2 card-icon" style="max-width: 18rem;">
                        <div class="card-header border-bottom-0 text-center card-header-dividerIcon"><img class="divider-icon" src="images/moneyMeritIcon.png" alt="" /></div>
                        <div class="card-body">
                            <h5 class="card-title text-center font-weight-bold ard-title-dividerTitle">Money Back
                                Guarantee</h5>
                            <p class="card-text text-center font-weight-lighter card-text-dividerText">Enjoy your car
                                for up to 7 days to make
                                sure it fits in with your lifestyle. If you
                                change your mind, you can return it for a full refund, no questions asked
                            </p>
                        </div>
                    </div>
                    <div class="borderless mb-3 mr-2 card-icon" style="max-width: 18rem;">
                        <div class="card-header border-bottom-0 text-center card-header-dividerIcon"><img class="divider-icon" src="images/car-care.png" alt="" /></div>
                        <div class="card-body">
                            <h5 class="card-title text-center font-weight-bold ard-title-dividerTitle">Carland Car Care
                            </h5>
                            <p class="card-text text-center font-weight-lighter card-text-dividerText">You’ll get at
                                least 90 days of warranty and RAC roadside assistance. We also offer paint and fabric
                                protection, extended warranty and car servicing.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of divider block -->
        <div class="clearfix mt-5"></div>
        <!-- browsing similar cars -->
        <div class="container-fluid mb-5">
            <div class="browsing-title text-center">
                <h4>Other cars you might like</h4>
            </div>
            <div class="d-flex flew-row justify-content-around">
                <div class="card ml-3 card-style">
                    <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                        <img src="images/BMW3Series/image1.jpeg" class="card-img" />
                        <div class="card-img-overlay d-flex justify-content-end h-25">
                            <a href="#" class="card-link text-danger like">
                                <i class="bi bi-heart"></i>
                            </a>
                        </div>
                        <div class="mask">
                            <div class="d-flex justify-content-end">
                                <a href="#">
                                    <span class="product-location">Christchurch</span>
                                </a>
                            </div>
                        </div>
                        <div class="hover-overlay">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="" class="text-reset">
                            <h5 class="card-title mb-3">BMW 3 Series</h5>
                        </a>
                        <a href="" class="text-reset">
                            <p class="product-description">2L M Sport Shadow Edition 320d</p>
                            <span class="product-text-mileage">28,650km</span>
                            <span class="product-text-reg">2017 reg</span>
                        </a>
                        <h6 class="mt-3 mb-3"><b>$55,125</b></h6>
                    </div>
                    <a href="#" class="btn btn-outline-success mb-3 w-90 ml-3 mr-3" role="button"><i class="bi bi-eye pr-2"></i> View This Car</a>
                </div>
                <div class="card ml-3 card-style">
                    <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                        <img src="images/BMW3Series/image1.jpeg" class="card-img" />
                        <div class="card-img-overlay d-flex justify-content-end h-25">
                            <a href="#" class="card-link text-danger like">
                                <i class="bi bi-heart"></i>
                            </a>
                        </div>
                        <div class="mask">
                            <div class="d-flex justify-content-end">
                                <a href="#">
                                    <span class="product-location">Christchurch</span>
                                </a>
                            </div>
                        </div>
                        <div class="hover-overlay">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="" class="text-reset">
                            <h5 class="card-title mb-3">BMW 3 Series</h5>
                        </a>
                        <a href="" class="text-reset">
                            <p class="product-description">2L M Sport Shadow Edition 320d</p>
                            <span class="product-text-mileage">28,650km</span>
                            <span class="product-text-reg">2017 reg</span>
                        </a>
                        <h6 class="mt-3 mb-3"><b>$55,125</b></h6>
                    </div>
                    <a href="#" class="btn btn-outline-success mb-3 w-90 ml-3 mr-3"><i class="bi bi-eye pr-2"></i> View
                        This Car</a>
                </div>
                <div class="card ml-3 card-style">
                    <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                        <img src="images/BMW3Series/image1.jpeg" class="card-img" />
                        <div class="card-img-overlay d-flex justify-content-end h-25">
                            <a href="#" class="card-link text-danger like">
                                <i class="bi bi-heart"></i>
                            </a>
                        </div>
                        <div class="mask">
                            <div class="d-flex justify-content-end">
                                <a href="#">
                                    <span class="product-location">Christchurch</span>
                                </a>
                            </div>
                        </div>
                        <div class="hover-overlay">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="" class="text-reset">
                            <h5 class="card-title mb-3">BMW 3 Series</h5>
                        </a>
                        <a href="" class="text-reset">
                            <p class="product-description">2L M Sport Shadow Edition 320d</p>
                            <span class="product-text-mileage">28,650km</span>
                            <span class="product-text-reg">2017 reg</span>
                        </a>
                        <h6 class="mt-3 mb-3"><b>$55,125</b></h6>
                    </div>
                    <a href="#" class="btn btn-outline-success mb-3 w-90 ml-3 mr-3"><i class="bi bi-eye pr-2"></i> View
                        This Car</a>
                </div>
                <div class="card ml-3 card-style">
                    <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                        <img src="images/BMW3Series/image1.jpeg" class="card-img" />
                        <div class="card-img-overlay d-flex justify-content-end h-25">
                            <a href="#" class="card-link text-danger like">
                                <i class="bi bi-heart"></i>
                            </a>
                        </div>
                        <div class="mask">
                            <div class="d-flex justify-content-end">
                                <a href="#">
                                    <span class="product-location">Christchurch</span>
                                </a>
                            </div>
                        </div>
                        <div class="hover-overlay">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="" class="text-reset">
                            <h5 class="card-title mb-3">BMW 3 Series</h5>
                        </a>
                        <a href="" class="text-reset">
                            <p class="product-description">2L M Sport Shadow Edition 320d</p>
                            <span class="product-text-mileage">28,650km</span>
                            <span class="product-text-reg">2017 reg</span>
                        </a>
                        <h6 class="mt-3 mb-3"><b>$55,125</b></h6>
                    </div>
                    <a href="#" class="btn btn-outline-success mb-3 w-90 ml-3 mr-3"><i class="bi bi-eye pr-2"></i> View
                        This Car</a>
                </div>
            </div>
            <div class="row justify-content-center ml-3 mt-4 container-fluid">
                <a class="btn btn-outline-success" href="#" role="button">Explore Similar Cars</a>
            </div>
        </div>
        <!-- car financing block -->
        <div class="row finance-row mt-2">
            <div class="container finance-block-wrapper mb-5">
                <a href="#" class="finance-block-link">
                    <h4 class="finance-block-header">Car Financing</h4>
                </a>
                <div class="row borderless-card-row">
                    <div class="borderless mb-3 mr-2 card-icon" style="max-width: 18rem;">
                        <div class="card-header border-bottom-0 text-center card-header-icon"><img class="circle-icon" src="images/iconCircleOne.png" alt="" />
                        </div>
                        <div class="card-body border-top-0">
                            <h6 class="card-title text-center font-weight-bold card-title-iconTitle">Find your perfect
                                car</h6>
                            <p class="card-text text-center card-text-iconText">Browse our wide range of high-quality
                                used Carland cars that are available to buy or finance.</p>
                        </div>
                    </div>
                    <div class="borderless mb-3 mr-2 card-icon" style="max-width: 18rem;">
                        <div class="card-header border-bottom-0 text-center card-header-icon"><img class="circle-icon" src="images/iconCircleTwo.png" alt="" /></div>
                        <div class="card-body">
                            <h5 class="card-title text-center font-weight-bold card-title-iconTitle">Choose your deal
                            </h5>
                            <p class="card-text text-center card-text-iconText">Apply for finance online. You can also
                                part exchange your old car and lower your finance costs.
                            </p>
                        </div>
                    </div>
                    <div class="borderless mb-3 mr-2 card-icon" style="max-width: 18rem;">
                        <div class="card-header border-bottom-0 text-center card-header-icon"><img class="circle-icon" src="images/iconCircleThree.png" alt="" /></div>
                        <div class="card-body">
                            <h5 class="card-title text-center font-weight-bold card-title-iconTitle">Get approved</h5>
                            <p class="card-text text-center card-text-iconText">Pay no deposit and sign all documents
                                online. Then choose to collect your car or have it delivered.
                            </p>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-success info-btn" href="#">More info <i class="bi bi-plus-square"></i></button>
            </div>
        </div>
        <!-- end of car financing block -->
    </section>
    <?php include "footer.php" ?>
    <div class="clearfix"></div>
    <script src="js/carousel-slider.js" type="text/javascript"></script>
</body>

</html>