
<?php

// Assuming you're receiving JSON data and need to process it
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, true); // decode JSON input into associative array
include "connection.php";

$lid = $input["lid"];
$mid = $input["mid"];
$showid = $input["show_id"];
$sum = $input["sum"];
$seats = $input["checkedSeats"];
$showtime=$input["show"];
$hid=$input["hid"];
$user_id=$input["user_id"];

$stmt = "insert into ticket(movie_id,show_id,location_id,sum,showtime,Hall_id,user_id)values($mid,$showid,$lid,$sum,$showtime,$hid,$user_id)";
$query = mysqli_query($conn, $stmt);
$lastInsertId = mysqli_insert_id($conn);


for ($i = 0; $i < count($seats); $i++) {
    
    $stmt2 = $conn->prepare("INSERT INTO seats (tid, seat_no) VALUES (?, ?)");
    $stmt2->bind_param("is", $lastInsertId, $seats[$i]);

    $success = $stmt2->execute();

    if (!$success) 
    {
        error_log("Error inserting seat number $seats[$i] for ticket ID $lastInsertId: " . $conn->error);
    }

    // Close the statement
    $stmt2->close();
}


if ($query) {
    $response = array(
        "status" => "success",
        "message" => "Ticket details received successfully",
        "seats" => $seats,
        "data" => $input,
        "tid" => $lastInsertId
    );
    echo json_encode($response);
}
 else {
    $response = array(
        "status" => "fail",
        "message" => "Ticket details failed successfully",
    );
    echo json_encode($response);
}

