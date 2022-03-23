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
    <title>Contact</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="popover-hover"]').popover({
                html: true,
                content: function() {
                    var elementId = $(this).attr("data-popover-content");
                    return $(elementId).html();
                },
                container: 'body',
                modifiers: [
                    {
                        name:'offset',
                        options: {
                            offset: [0, 200],
                        },
                    },
                ]
            });
        });
    </script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <link href="css/style.css" rel="stylesheet">
    <link href="icon/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <?php include "navigation.php" ?>
    <div class="container-fluid jumbotron-about-wrapper p-0">
        <div class="row m-0">
            <div class="col-md-6 jumbotron-title">
                <h3 class="pl-4">WHY CARLAND</h3>
            </div>
            <div class="col-md-6 jumbotron-img-about-wrapper">
                <img class="jumbotron-img" src="images/about.svg" alt="" />
            </div>
        </div>
    </div>
    <div class="container-fluid p-0">
        <!-- breadcrumbs -->
        <div class="row m-0">
            <div class="pull-left col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- end of breadcrumbs -->
        <div class="container container-about-title-wrapper mb-4">
            <h3 class="text-center font-weight-bolder mb-4">About Us</h3>
            <p class="text-center font-weight-lighter about-title-paragraph ml-5">We are Carland and we are transforming the car buying experience across New Zealand</p>
        </div>
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col mt-5">
                    <img class="about-mission-img" src="images/aboutMission.svg" alt="" />
                </div>
                <div class="col about-texts-right-wrapper">
                    <h5 class="text-right font-weight-bolder">Our Mission</h5>
                    <p class="text-right text-justify font-weight-lighter about-title-paragraph ml-5">We want to make buying car no different to ordering any other product today. Where consumers can simple and seamlessly buy or finance to a car entirely online</p>
                </div>
            </div>
        </div>
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col about-texts-left-wrapper">
                    <h5 class="text-left font-weight-bolder">Our Value</h5>
                    <p class="text-left text-justify font-weight-lighter about-title-paragraph">To give our customers the best car buying experiences, we stand by our key values. We are:</p>
                    <ul class="list-about-value text-justify text-decoration-none ml-5 mr-5">
                        <li><strong>Customer obsessed</strong> - we put the customer first in everything we do. We want to be famous for delivering the best experiences and wowing our customers</li>
                        <li><strong>Data driven - data</strong> is part of our DNA and drives all decision making. We're informed, results-driven and seek insights to help us improve and grow.</li>
                        <li><strong>Fast drivers</strong> - we have an entrepreneurial passion for working at speed. We move fast and drive fast towards our goals.</li>
                        <li><strong>Team players</strong> - we're better as a team than as individuals. Everyone counts. We’re here to have fun and win together on this exciting journey.</li>
                    </ul>
                </div>
                <div class="col mt-5">
                    <img class="about-mission-img" src="images/aboutValue.svg" alt="" />
                </div>
            </div>
        </div>
        <div class="col-12 p-0 sales-wrapper mt-5 mb-5">
            <div class="row m-0">
                <div class="col">
                    <h5 class="text-center font-weight-bolder sales-title mt-5 mb-4">Our Sales Team</h5>
                </div>
            </div>
            <div class="row mr-0 ml-0 mb-5">
                <div class="col">
                    <img class="" src="images/salesTeam.svg" alt="" />
                </div>
                <div class="col-8 mb-5">
                    <p class="text-center text-justify m-auto sales-texts">We have a great sales team of over 250 people across the New Zealand who are passionate about delivering great customer experiences and whose mission is to ensure that you love both the Carland car buying experience and the car.</p>
                </div>
                <div class="col">
                    <img class="" src="images/salesTeam1.svg" alt="" />
                </div>
            </div>
        </div>
        <?php include "footer.php" ?>
</body>

</html>