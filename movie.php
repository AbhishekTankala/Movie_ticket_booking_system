<?php session_start(); ?>
<?php 

include "connection.php";
    
$movie_id=@$_GET["mid"];
$lid=@$_GET["lid"];
if(empty($movie_id))
{
    $movie_id=7;
}

$stmt="select m.* from shows s inner join Halls h on h.Hall_id = s.Hall_id inner join movies m on m.movie_id = s.movie_id where location_id=$lid and m.movie_id=$movie_id;";
$result=mysqli_query($conn,$stmt);
$row=mysqli_fetch_assoc($result);
$movie_info = json_decode($row['movies_info'],true);
if($row == null)
{
    header("Location: first.php?lid=$lid");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bookurshow</title>
    <?php
    include "links.php";

    ?>

</head>
<body>
    <?php
    include "header.php";

    ?>
    <div class="movie-container" id="movie-container" 
    style="background: linear-gradient(to right, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0)),url('assets\\images\\<?php echo $row["movie_poster"]; ?>');background-size:cover;background-position: center;">
        <div class="movie-picture" id="movie-picture">

            <img src="assets/images/<?php echo $row["movie_poster"];  ?>" alt="" id="img1">
           
        </div>
        <div class="movie-content1" id="movie-content1">
            <h1 id="movie-title">
                <?php 
                echo $row["movie_name"];
                ?>
            </h1>
            <p id="para1">
                <?php 
            if($movie_info["imdbRating"] != "N/A")
            {?>
            
            <i class="fas fa-star"></i>
            <?php

                echo $movie_info["imdbRating"]."/10 ";
                 echo "(".$movie_info["imdbVotes"]." votes)";
            }
            ?>
            </p>

            <div class="movie-release">
               <p id="p1"> Released on 
                <?php echo $movie_info["Released"];?>
               </p>
               <p id="p2"> Are you interested in watching this movie?</p>
            </div>
            <div class="movie-details">
                <div class="movie-type"><a href="#">2D</a>,<a href="#">3D</a></div>
                <div class="movie-lang">
                    Telugu
                    <!--  </a>,<a href="#">Telugu</a>,<a href="#">Tamil</a> -->
               </div>
            </div>
            <div class="movie-runtime">
             <?php 
             if($movie_info["Runtime"] != "N/A")
             {

                 $durationInMinutes = (int)$movie_info["Runtime"];
                 
                 
             // Calculate hours and minutes
             $hours = floor($durationInMinutes / 60); // Get the whole number of hours
             $minutes = $durationInMinutes % 60; // Get the remaining minutes
             
             // Output the result
             echo $hours . "h " . $minutes . "min ";
            }
             echo $movie_info["Genre"];?>
            </div>
            <div class="movie-book">
                <a href="halls.php?mid=<?php echo $movie_id?>&lid=<?php echo $lid?>&day=<?php 
                $date_str=date("D d M");
                $currTime5=date("H:i");
                if($currTime5 > strtotime("21:30"))
                {
                    $nextday=date("D d M",strtotime($date_str . " +1 day"));
                    echo strtotime($nextday);
                    
                }
                else
                {
                    echo strtotime($date_str);

                }
                    ?>" class="movie-button" id="movie-button">Book Tickets</a>
            </div>

        </div>
        
    </div>
    <div class="movie-about" id="movie-about">
        <h2 id="movie-about-h">About The Movie</h2>
        <p id="movie-about-content"><?php echo $movie_info["Plot"];?></p>
    </div>

    <div class="movie-about" id="movie-about">
        <h2 id="movie-about-h">Cast</h2>
        <div class="cast">
              <?php
                $string = $movie_info["Actors"];
                $delimiter = ",";
                $array = explode($delimiter, $string);
                foreach($array as $ele)
                {
                    ?>
                    <div class="cast-member">
                        <img src="./assets/images/user.png" alt="">
                        <p>
                            <?php
                            echo $ele;
                            ?>
                        </p>
                    

                    </div>
                    <?php
                }
                ?>
                <!-- <p>Kamal Hasan</p> -->
                
        </div>
    </div>

    <div class="movie-about" id="movie-about">
        <h2 id="movie-about-h">Crew</h2>
        <div class="cast">
        <div class="cast-member">
                        <img src="./assets/images/user.png" alt="">
                        <p>
                            <?php
                            echo $movie_info["Director"];
                            ?>
                        </p>
                        <!-- <br> -->
                        <p class="crew-member">Director</p>
                    

                    </div>
              <?php
                $string = $movie_info["Writer"];
                $delimiter = ",";
                $array = explode($delimiter, $string);
                foreach($array as $ele)
                {
                    ?>
                    <div class="cast-member">
                        <img src="./assets/images/user.png" alt="">
                        <p>
                            <?php
                            echo $ele;
                            ?>
                        </p>
                        <p class="crew-member">Writer</p>


                    </div>
                    <?php
                }
                ?>
                <!-- <p>Kamal Hasan</p> -->
                
        </div>
    </div>

    



    <?php
    include "movie_list.php";
    include "footer.php";

    ?>
    
</body>
</html>