<?php session_start(); ?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Halls</title>
  <?php
  include "links.php";

  ?>
  <style>
    a {
      text-decoration: none;
    }
  </style>
</head>

<body>
  <?php
  include "header.php";
  include "connection.php";

  $lid = @$_GET["lid"];
  $movie_id = @$_GET["mid"];
  $date_str1=date("D d M");
  $currentTimestamp = strtotime($date_str1);
  $oneDayLaterTimestamp = strtotime('+1 day', $currentTimestamp);
  $day=@$_GET["day"];
  $date = date('Y-m-d', $day);
  // echo$oneDayLaterTimestamp;
  // $hid=@$_GET[""]
  if (empty($movie_id)) {
    $movie_id = 7;
  }

  $stmt = "select * from movies where movie_id=$movie_id";
  $result = mysqli_query($conn, $stmt);
  $row = mysqli_fetch_assoc($result);

  $stmt2 = "select m.*,h.Hall_id,h.Hall_name from Halls h inner join location l on l.location_id=h.location_id inner join movies m on m.hid=h.Hall_id where m.movie_id=$movie_id and l.location_id=$lid";
  $result2 = mysqli_query($conn, $stmt2);
  $row2 = mysqli_fetch_assoc($result2);
  $hid = $row2["Hall_id"];
  $movie_info = json_decode($row['movies_info'],true);


  // $stmt3 = "select s.show_id,s.show_date from Shows s inner join Halls h on s.Hall_id=h.Hall_id inner join movies m on m.hid=h.Hall_id where h.location_id=$lid and m.movie_id=$movie_id and h.Hall_id=$hid;";
  // $result3 = mysqli_query($conn, $stmt3);

  // echo $row2["Hall_name"];
  

  ?>
  <div class="container3" id="movie-name">
    <div class="movie-name" id="movie-name">
      <h1 class="movie-name-h1">
        <?php
        echo $row["movie_name"];

        ?>
      </h1>
      <div class="genre" id="genre">
        <div class="sub-genre">
          <?php 
          $string = $movie_info["Genre"];
          $modifiedString = str_replace(',', '&nbsp &nbsp', $string); // Replace comma with 3 spaces
          // $uppercaseString = strtoupper($modifiedString); 
          echo $modifiedString;
        
        ?> </div>
        <!-- <div class="sub-genre">DRAMA</div> -->
        <!-- <div class="sub-genre">ROMANTIC</div> -->
      </div>
    </div>
    <div class="dates" id="dates">
      <div class="d1">
        <?php
        $currentDateTime = date("Y-m-d H:i:s");
        $currentDay = date("D d M");
        // echo $currentDateTime;
        // echo $currentDay;
        for($i=0;$i<=5;$i++)
        {
          $currTime  = date("H:i");
          if($currTime > strtotime('21:30') && ($i ==0))
          {
             continue;
          }
          // if($i == 0 && )
          $currentDay1 = date("D d M",strtotime($currentDay . " +$i day"));
          ?>
        <a href="halls.php?mid=<?php echo $movie_id?>&lid=<?php echo $lid?>&day=<?php echo strtotime('+'.$i.' day', $currentTimestamp)?>" class="b1 <?php if($day == strtotime('+'.$i.' day', $currentTimestamp)) {echo "active";}?>">
          <?php
          echo $currentDay1;
          
          ?>
        </a>
          <?php
        }
        // echo $currentDay1;

        // echo strtotime($currentDay . " +1 day");

        ?>
        <!-- <a href="" class="b1">SAT 02 MAR</a> -->

      </div>
      <div class="d2">Telugu-2D</div>
    </div>
    <div class="theatres" id="theatres">
      <div class="fast-filling">
        <div></div><span>AVAILABLE</span>
        <div class="fast-fill"></div><span>FAST FILLING</span>
      </div>
      <hr />
      <div class="hall-detail">
        <div class="name"><i class="fa-regular fa-heart"></i>
          <?php echo $row2["Hall_name"]; ?> 4k Dolby Atmos
        </div>
        <div class="show-timings" id="show-timings">
          <?php
          // while ($row3 = mysqli_fetch_assoc($result3)) 
          {

            ?>

          
              <?php
            
              // $timestamp = $row3["show_date"];
              // $time1=array("11:00 AM";
              $timestamp = $currentDateTime;


              // Create a DateTime object from the timestamp
              // $date = new DateTime($timestamp);

              // Format the DateTime object to extract the time portion
              // $time = $date->format('h:i A');
              $showtimes = array("11:00","14:00","18:30","21:30");
for($i=0;$i<count($showtimes);$i++){
  $time1 = $date." ".$showtimes[$i];
  // $time1 = date("h:i A", strtotime($showtimes[$i]));
  $currTime  = date("Y-m-d H:i");
  if($currTime<=$time1){
    
    ?>
  <a href="seats.php?lid=<?php echo $lid ?>&mid=<?php echo $movie_id ?>&show_id=<?php echo $i;//echo $row3["show_id"] ?>&hid=<?php echo $row2["Hall_id"] ?>&show=<?php echo strtotime($time1)?>"
              class="show" style="text-decoration:none">
  <?php
    echo date("h:i A", strtotime($time1));?>  <br />
    DOLBY ATMOS
  </a><?php
  // echo strtotime($time1);
  }
  // $
}
// $time2 = date("h:i A", strtotime("09:00"));
// $time1 = date("h:i A", strtotime("11:00"));
// $time1 = date("h:i A", strtotime("11:00"));



// echo $time2 < $time1."<br>";

// Set time to 3:30 PM using DateTime
// $time2 = new DateTime("15:30");
// Print the extracted time
// echo $time1;
// echo $time2;
?>
            <?php
           
            
          }
          ?>
        </div>

        <!-- <div class="info">Cancellation Available</div> -->
      </div>
    </div>
  </div>
  <?php
  include "footer.php";
  ?>