<?php session_start(); 

if(!isset($_SESSION["user_id"]))
{
    header('Location:first.php');
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Ticket</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./assets/css/ticket.css" class="rel" />
</head>

<body>
  <?php
  date_default_timezone_set('Asia/Kolkata');

  include "connection.php";

//   $tid = @$_GET["tid"];
  $user_id=$_SESSION["user_id"];

  // if(empty($tid))
  // {
  //     $tid=7;
  // }
  
  $stmt = "
    select t.tid,m.movie_name,m.movie_poster,t.sum,t.showtime,h.Hall_name from ticket t inner join movies m on t.movie_id=m.movie_id inner join Halls h on h.Hall_id = m.hid where t.user_id=$user_id;";
  $result = mysqli_query($conn, $stmt);
  


  // $stmt2=""
  


  ?>
  <div class="container" id="container">
    <div class="movie-title" id="movie-title">
      <div class="icon-movie">
        <div class="to-seats" onclick="window.history.back();"><i class="fa-solid fa-chevron-left"></i></div>
        <div class="movie-name" id="movie-name">
          <p>
            Hi,
            <?php 
            if(isset($_SESSION['Email'])){

                $string = $_SESSION["Email"];
                $trimmedString = strstr($string, '@', true);
              
                echo $trimmedString;
            }


            ?>
          
          </p>
          <p>
           Your Bookings
            
          </p>
        </div>
      </div>
    </div>

    <?php

    while($row = mysqli_fetch_assoc($result))
    {


    ?>
    <div class="ticket-summary" id="ticket-summary">
      <p class="booking">BOOKING SUMMARY</p>
      <div class="price1 tic-image1" id="price1">
        <div class="img-col">

          <p class="movie-ticket-details">
            <?php
            echo $row["movie_name"]." (Telugu)";
            ?>
            
        </p>
        <p class="t1">Telugu,2D
        <br>
        <br>
        <?php
          echo $row["Hall_name"]." 4k Dolby Atmos";
          ?>
      </p>
    </div>

        <img src="assets/images/<?php echo $row["movie_poster"];?>" alt="" class="ticket-image">
      </div>
      <!-- <div class="price1 t2" id="price1">
      
      </div> -->
      <div class="price1" id="price1">

        <p>
          <?php
          $tid=$row["tid"];
          $stmt2 = "select seat_no from seats where tid=$tid;";
          $query = mysqli_query($conn, $stmt2);
          $a = "";
          $n = mysqli_num_rows($query);
          $c = 0;
          // $row2 = mysqli_fetch_assoc($query);
 
          while ($row1 = mysqli_fetch_assoc($query)) {
            // var_dump($row1);
            $premium = ['A', 'B'];
            $Gold = ['C', 'D', 'E', 'F'];
           $Silver = ['G', 'H'];
           $letterToCheck = $row1["seat_no"][0];
           if($c==0){
            if (in_array($letterToCheck, $premium)) {
              echo "Premium-";
            } elseif (in_array($letterToCheck, $Gold)) {
              echo "Gold-";
            } elseif (in_array($letterToCheck, $Silver)) {
              echo "Silver-";
            } else {
              echo "$letterToCheck does not exist in any array.";
            }
           }

              
            if ($c != $n - 1) {
              $a .= $row1["seat_no"] . ",";
            } else {
              $a .= $row1["seat_no"];

            }
            $c++;
            // echo $row1["seat_no"]; 
          }
          if($n == 1)
          {
            echo $a . " (" . $n . " Ticket)";
          }
          else
          {
            echo $a . " (" . $n . " Tickets)";
          }
          ?>
        </p>
        <p>Rs.
          <?php
          echo $row["sum"];
          // $show3=1710777600;
          // $date3= date('H:i A', $show3);
          // echo $date3;
          ?>
        </p>
        <!-- <p>SCREEN1</p> -->
      </div>
      <div class="price1 order-date">
        <p>
        <?php

      $date1 = date('d M Y', $row["showtime"]);
            echo $date1;
            ?>
        
        </p>
      </div>
      <div class="price1 order-date">
        <p>
        <?php

      $date1 = date('h:i A', $row["showtime"]);
            echo $date1;
            ?>
        
        </p>
      </div>
      <div class="price1">
        <p>convenience fees</p>
        <p>Rs.40.12</p>
      </div>
      <!-- <div class="price1">
          <p>Sub total</p>
          <p><?php //echo $row["sum"] + 40.12  ?></p>
        </div> -->
      <hr />
      <div class="price1">
        <p class="total-amount">Amount Payable</p>
        <p class="total-amount">Rs.
          <?php echo $row["sum"] + 40.12 ?>
        </p>
      </div>
    </div> <?php
    }
    ?>

    <!-- <div class="download-ticket" id="download-ticket">
      <p class="terms">To download the ticket,Press Download</p>
      <button class="download-btn" id="download-btn">Download</button>
    </div> -->
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="assets/js/ticket.js"></script>

</body>

</html>