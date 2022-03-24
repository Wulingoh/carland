<?php
include_once "config.php";


function fetchVehicleImages($vehicleId) {
    global $link;

    $stmt = $link->prepare('SELECT img_id, vehicle_id, gallery_img, gallery_img_title FROM vehicle_gallery WHERE vehicle_id = ?');

    $stmt->bind_param('i',$vehicleId);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
    
}

function fetchModelList($makeId) {
    global $link;

    $stmt = $link->prepare('SELECT model_id, make_id, model FROM vehicle_model WHERE make_id = ?');

    $stmt->bind_param('i',$makeId);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
    
}

function fetchSimilarProductsList($userId, $bodytypeId, $vehicleId) {
    global $link;
    
    $stmt = $link->prepare('SELECT vehicles.*, location, favourite_id FROM vehicles
                            INNER JOIN vehicle_location ON vehicles.location_id = vehicle_location.location_id 
                            LEFT JOIN favourite ON favourite.vehicle_id = vehicles.vehicle_id AND favourite.user_id = ?
                            WHERE bodytype_id = ? AND vehicles.vehicle_id != ? LIMIT 3');

    $stmt->bind_param('iii', $userId, $bodytypeId, $vehicleId);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
    
}

function fetchVehicleBrandLogo() {
    global $link;
    
    $stmt = $link->prepare('SELECT make_id, brand_logo FROM vehicle_make;');

    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
    
}

function fetchRecentlyAddedGallery($userId) {
    global $link;
    
    $stmt = $link->prepare('SELECT vehicles.*, location, favourite_id FROM vehicles
                            INNER JOIN vehicle_location ON vehicles.location_id = vehicle_location.location_id 
                            LEFT JOIN favourite ON favourite.vehicle_id = vehicles.vehicle_id AND favourite.user_id = ? 
                            ORDER BY created_at DESC');

    $stmt->bind_param('i', $userId);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
    
}

function getPagingQuery($query, $itemPerPage = 10)
{
	if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
		$page = (int)$_GET['page'];
	} else {
		$page = 1;
	}

	// start fetching from this row number
	$offset = ($page - 1) * $itemPerPage;

	return $query . " LIMIT $offset, $itemPerPage";
}

function getPagingLink($query, $itemPerPage = 10, $strGet = '')
{
	global $link;
	$result        = mysqli_query($link, $query);
	$pagingLink    = '';
	$totalResults  = mysqli_num_rows($result);
	$totalPages    = ceil($totalResults / $itemPerPage);

	// how many link pages to show
	$numLinks      = 10;


	// create the paging links only if we have more than one page of results
	if ($totalPages > 1) {




		if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
			$pageNumber = (int)$_GET['page'];
		} else {
			$pageNumber = 1;
		}

		// print 'previous' link only if we're not
		// on page one
		if ($pageNumber > 1) {
			$page = $pageNumber - 1;
			if ($page > 1) {
				$prev = " <a href=\"productsListing.php?page=$page&$strGet\">prev</a> ";
			} else {
				$prev = " <a href=\"productsListing.php?$strGet\">prev</a> ";
			}

			$first = " <a href=\"productsListing.php?$strGet\"></a> ";
		} else {
			$prev  = ''; // we're on page one, don't show 'previous' link
			$first = ''; // nor 'first page' link
		}

		// print 'next' link only if we're not
		// on the last page
		if ($pageNumber < $totalPages) {
			$page = $pageNumber + 1;
			$next = " <a href=\"productsListing.php?page=$page$strGet\">next</a> ";
			$last = " <a href=\"productsListing.php?page=$totalPages$strGet\"></a> ";
		} else {
			$next = ''; // we're on the last page, don't show 'next' link
			$last = ''; // nor 'last page' link
		}

		$start = $pageNumber - ($pageNumber % $numLinks) + 1;
		$end   = $start + $numLinks - 1;

		$end   = min($totalPages, $end);

		$pagingLink = array();
		for($page = $start; $page <= $end; $page++)	{
			if ($page == $pageNumber) {
				$pagingLink[] = " $page ";   // no need to create a link to current page
			} else {
				if ($page == 1) {
					$pagingLink[] = " <a href=\"productsListing.php?$strGet\">$page</a> ";
				} else {
					$pagingLink[] = " <a href=\"productsListing.php?page=$page$strGet\">$page</a> ";
				}
			}

		}

		$pagingLink = implode(' ', $pagingLink);

		// return the page navigation link
		$pagingLink = $first . $prev . $pagingLink . $next . $last;
	}

	return $pagingLink;
}

?>