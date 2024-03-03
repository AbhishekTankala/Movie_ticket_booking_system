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
    <title>Dasara</title>
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
            600k are interested
            </p>
            <div class="movie-release">
               <p id="p1"> Releasing on 30 Mar,2023</p>
               <p id="p2"> Are you interested in watching this movie?</p>
            </div>
            <div class="movie-details">
                <div class="movie-type"><a href="#">2D</a>,<a href="#">3D</a></div>
                <div class="movie-lang"><a href="#">Hindi</a>,<a href="#">Telugu</a>,<a href="#">Tamil</a></div>
            </div>
            <div class="movie-runtime">
                2h 36m Action,Drama UA
            </div>
            <div class="movie-book">
                <a href="halls.php?mid=<?php echo $movie_id?>" class="movie-button" id="movie-button">Book Tickets</a>
            </div>

        </div>
        
    </div>
    <div class="movie-about" id="movie-about">
        <h2 id="movie-about-h">About The Movie</h2>
        <p id="movie-about-content">It is an emotional movie which revolves around the silk bar in the village</p>
    </div>
    <?php
    include "movie_list.php";
    include "footer.php";

    ?>
    
</body>
</html>