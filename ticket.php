<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ticket</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="./assets/css/ticket.css" class="rel" />
  </head>
  <body>
    <?php
    include "connection.php";

    $movie_id=@$_GET["mid"];
    if(empty($movie_id))
    {
        $movie_id=7;
    }

    $stmt="select * from movies where movie_id=$movie_id";
    $result=mysqli_query($conn,$stmt);
    $row=mysqli_fetch_assoc($result);




?>
    <div class="container" id="container">
      <div class="movie-title" id="movie-title">
        <div class="icon-movie">
          <a href="seats.php" class="to-seats"><i class="fa-solid fa-chevron-left"></i></a>
          <div class="movie-name" id="movie-name">
            <p>
              <?php
              echo $row["movie_name"];
              ?>
            </p>
            <p>Dwaraka Cinemas 6:15PM</p>
          </div>
        </div>
      </div>

      <div class="ticket-summary" id="ticket-summary">
        <p class="booking">BOOKING SUMMARY</p>
        <div class="price1" id="price1">
          <p>PLATINUM- C12,C13(2 Tickets)</p>
          <p>Rs.296</p>
          <!-- <p>SCREEN1</p> -->
        </div>
        <div class="price1">
          <p>convenience fees</p>
          <p>Rs.40.12</p>
        </div>
        <div class="price1">
          <p>Sub total</p>
          <p>Rs.336.12</p>
        </div>
        <hr />
        <div class="price1">
          <p class="total-amount">Amount Payable</p>
          <p class="total-amount">Rs.338.12</p>
        </div>
      </div>
      <div class="download-ticket">
        <p class="terms">To download the ticket,Press Download</p>
        <button class="download-btn" id="download-btn">Download</button>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="assets/js/ticket.js"></script>
  </body>
</html>
