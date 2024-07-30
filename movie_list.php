<section id="movie-list" class="movie-list">
      <div class="movie-container4" id="movie-container4">
        <h5 class="heading1">Recommended Movies</h5>
        <div class="scrolling-wrapper">
        
            <?php
            include "connection.php";
            
            $lid=@$_GET["lid"];
            if(!$lid)
            {
               $lid="1";
            }
            $stmt="select m.* from shows s inner join Halls h on h.Hall_id = s.Hall_id inner join movies m on m.movie_id = s.movie_id where location_id=$lid;";
            $result=mysqli_query($conn,$stmt);

            while($row=mysqli_fetch_assoc($result))
            {
                ?>
    <a href="movie.php?mid=<?php echo $row["movie_id"];?>&lid=<?php echo $lid ?>"><div class="card"><img src="assets/images/<?php echo $row["movie_poster"];?>" alt="" id="image1"></div></a>
                <?php
            }
            mysqli_close($conn);
            ?>

          
        </div>
      </div>

    </section>