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
      a
      {
        text-decoration: none;
      }
    </style>  
  </head>
  <body>
    <?php
    include "header.php";
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
    <div class="container3" id="movie-name">
      <div class="movie-name" id="movie-name">
        <h1><?php
        echo $row["movie_name"];
        
        ?></h1>
        <div class="genre" id="genre">
          <div class="sub-genre">COMEDY</div>
          <div class="sub-genre">DRAMA</div>
          <div class="sub-genre">ROMANTIC</div>
        </div>
      </div>
      <div class="dates" id="dates">
        <div class="d1">
          <a href="" class="b1">FRI 01 MAR</a>
          <a href="" class="b1">SAT 02 MAR</a>
          
        </div>
        <div class="d2">Telugu-2D</div>
      </div>
      <div class="theatres" id="theatres">
        <div class="fast-filling">
          <div></div><span>AVAILABLE</span>
          <div></div><span>FAST FILLING</span>
        </div>
        <hr />
        <div class="hall-detail">
          <div class="name"><i class="fa-regular fa-heart"></i>Dwaraka Cinemas 4k Dolby Atmos:Nuzvid</div>
          <div class="show-timings" id="show-timings">
            <a href="seats.php?mid=<?php echo $movie_id ?>&show_id=<?php echo "1"?>" class="show" style="text-decoration:none">
              11:00 AM <br />
              DOLBY ATMOS
            </a>
            <a href="seats.php?mid=<?php echo $movie_id ?>&show_id=<?php echo "2"?>" class="show" style="text-decoration:none">
              02:00 PM <br />
              DOLBY ATMOS
            </a>
            <a href="seats.php?mid=<?php echo $movie_id ?>&show_id=<?php echo "3"?>" class="show" style="text-decoration:none">
              06:00 PM <br />
              DOLBY ATMOS
            </a>
            <a href="seats.php?mid=<?php echo $movie_id ?>&show_id=<?php echo "4"?>" class="show" style="text-decoration:none">
              09:00 PM <br />
              DOLBY ATMOS
            </a>
          </div>

          <!-- <div class="info">Cancellation Available</div> -->
        </div>
      </div>
    </div>
    <?php
    include "footer.php";
    ?>
