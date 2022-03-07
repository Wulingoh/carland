<?php
// check if the member is sign in
if (isset($_SESSION['email'])) {

    $userId = $_SESSION['id'];
    $query = "SELECT COUNT(*) AS totalFavouriteCount FROM favourite WHERE favourite.user_id = $userId;";

    $resultCounter = mysqli_query($link, $query) or die(mysqli_error($link));
    $row = mysqli_fetch_assoc($resultCounter);
    $favouriteCount = $row['totalFavouriteCount'];

?>
    <li class="nav-item mt-2">Welcome <?php echo $_SESSION['email'] ?>! </li>
    <li class="nav-item me-3 me-lg-0">
        <a class="nav-link px-3 favouriteHeartCounter position-relative" href="displayFavouritePage.php">Favourite
            <i class="bi bi-balloon-heart-fill favourite-heart-icon">
                <span class ="counterNumber position-absolute z-index: 300"><?php echo $favouriteCount ?></span>
            </i>
        </a>
    </li>
    <li class="nav-item me-3 me-lg-0">
        <a class="nav-link px-3" href="logout.php">Logout
            <i class="bi bi-box-arrow-right">
            </i>
        </a>
    </li>
<?php
}
?>