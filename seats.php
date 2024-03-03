<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Seats</title>
  <?php
  include "links.php";
  ?>



</head>

<body>
  <?php
  include "connection.php";

  $movie_id = @$_GET["mid"];
  if (empty($movie_id)) {
    $movie_id = 7;
  }

  $stmt = "select * from movies where movie_id=$movie_id";
  $result = mysqli_query($conn, $stmt);
  $row = mysqli_fetch_assoc($result);



  ?>
  <div class="container" id="container">
    <div class="movie-title" id="movie-title">
      <div class="icon-movie">
        <a href="halls.php" class="to-seats"><i class="fa-solid fa-chevron-left"></i></a>
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
    <form action="ticket.php" method="post">
      <div class="total-seats" id="total-seats">
        <!-- <p class="premium">Premium- Rs 148</p> -->
        <?php
        $g = "A";
        for ($i = 0; $i < 8; $i++) {
          if ($i == 0)
            echo "<p>Premium- Rs 148</p>";
          if ($i == 2)
            echo "<p>Gold- Rs 148</p>";
          if ($i == 6)
            echo "<p>Silver- Rs 148</p>";

          ?>
          <div class="seat-row">
            <?php
            echo "<span id='seat-row'>" . $g++ . "</span>";
            ?>
            <?php
            for ($j = 0; $j < 8; $j++) {
              if ($j == 4)
                echo "&nbsp&nbsp";
              ?>
              <input onclick="changeCost()" type="checkbox" name="seats[]" id="seat
            <?php
            echo $i . $j;
            ?>
            " class="seat-checkbox" />
              <label for="seat
            <?php
            echo $i . $j;
            ?>
            " class="seat-label">
                <?php
                echo $j + 1;


                ?>

              </label>
            <?php }
            ?>
          </div>
          <?php
        }
        ?>
        <!-- <input type="checkbox" name="seats[]" id="seat2" class="seat-checkbox" />
        <label for="seat2" class="seat-label">1</label> -->

      </div>  
      <div class="payment" id="payment">
        <a href="ticket.php?mid=<?php echo $movie_id ?>" class="pay1">Pay Rs. <span class="cost" id="cost">200</span></a>
      </div>
    </form>
</body>
<script>
  function changeCost(){
  var checkboxes = document.querySelectorAll('input[name="seats[]"]');
  var checkedSeats = [];
  checkboxes.forEach(element => {
    if(element.checked){
      checkedSeats.push(element.parentElement.children[0].innerText+element.labels[0].innerText);
      
    }
  });    
console.log(checkedSeats);
  };
</script>
</html>
