<?php

$searchres = $_GET["s"];
include "connection.php";

$query_search = "SELECT h.location_id, m.movie_id, m.movie_name 
                FROM movies m 
                INNER JOIN Halls h ON m.hid=h.Hall_id 
                WHERE m.movie_name LIKE '%$searchres%';";

$result_search = mysqli_query($conn, $query_search);

$data = array(); // Initialize an empty array to store the data

while ($row_search = mysqli_fetch_assoc($result_search)) {
    $data[] = array(
        'location_id' => $row_search["location_id"],
        'movie_id' => $row_search["movie_id"],
        'movie_name' => $row_search["movie_name"]
    );
}

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($data);
