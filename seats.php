<?php session_start(); ?>

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
  $lid = @$_GET["lid"];
  $hid=@$_GET["hid"];
  $show=@$_GET["show"];
  // var_dump($show);
  // echo $show;
  if (empty($movie_id)) {
    $movie_id = 7;
  }

  $stmt= "select m.movie_name,h.Hall_name,s.show_date from Shows s inner join Halls h on s.Hall_id=h.Hall_id inner join movies m on m.hid=h.Hall_id where h.location_id=$lid and m.movie_id=$movie_id and h.Hall_id=$hid;";
  $result = mysqli_query($conn, $stmt);
  $row = mysqli_fetch_assoc($result);



  ?>
  <div class="container" id="container">
    <div class="movie-title" id="movie-title">
      <div class="icon-movie">
        <div class="to-seats" onclick="window.history.back();"><i class="fa-solid fa-chevron-left"></i></div>
        <div class="movie-name" id="movie-name">
          <p>
            <?php
            echo $row["movie_name"];

            ?>
          </p>
          <p> 
            <?php
            // $timestamp = $row["show_date"];

              // Create a DateTime object from the timestamp
              $date1 = date('h:i A', $show);
              // $date = new DateTime($date1);

              // Format the DateTime object to extract the time portion
              // $time = $date->format('h:i A');

              // Print the extracted time
              
            echo $row["Hall_name"]." ".$date1;


            ?>
          </p>
        </div>
      </div>
    </div>
    <?php
    $getseats="select s.seat_no from seats s inner join ticket t on s.tid=t.tid where location_id=$lid and movie_id=$movie_id and Hall_id=$hid and showtime=$show;";
    $queryseats=mysqli_query($conn,$getseats);
    $bookedseats=[];
    while($seatno=mysqli_fetch_assoc($queryseats))
    {
      array_push($bookedseats,$seatno["seat_no"]);
    }
    

//while (){booked seats}sql  A1
//for(A-Z){
  //for(1-8){
    //A1   == A1  echo disabled

 // }
//}
     ?>
      <div class="total-seats" id="total-seats">
        <!-- <p class="premium">Premium- Rs 148</p> -->
        <?php
        $g = "A";
        for ($i = 0; $i < 8; $i++) {
          if ($i == 0)
            echo "<p>Premium- Rs 200</p>";
          if ($i == 2)
            echo "<p>Gold- Rs 150</p>";
          if ($i == 6)
            echo "<p>Silver- Rs 100</p>";

          ?>
          <div class="seat-row">
            <?php
            echo "<span id='seat-row'>" . $g . "</span>";
            ?>
            <?php
            for ($j = 0; $j < 8; $j++) {
              if ($j == 4)
                echo "&nbsp&nbsp";
              ?>
              <input onclick="changeCost(this)" type="checkbox" name="seats[]" id="seat
            <?php
            echo $i . $j;
            ?>
            " class="seat-checkbox" <?php $currSeat = $g.$j+1;  if(in_array($currSeat ,$bookedseats )){echo 'disabled';}?>/>
              <label for="seat
            <?php
            echo $i . $j;
            ?>
            " class="seat-label <?php $currSeat = $g.$j+1;  if(in_array($currSeat ,$bookedseats )){echo 'seat-disable';}?>">
                <?php
                echo $j + 1;


                ?>

              </label>
            <?php }
            $g++;
            ?>
          </div>
          <?php
        }
        ?>
        <!-- <input type="checkbox" name="seats[]" id="seat2" class="seat-checkbox" />
        <label for="seat2" class="seat-label">1</label> -->

        <div class="screen-image" id="screen-image">
          <img src="./assets/images/download.jpg" alt="" class="image1" id="image1">
          <p class="screen-text" id="screen-text">
            Screen this way
          </p>
        </div>

     
      </div>
      <div class="payment" id="payment">
        <!--

           1. a==> button --
      2. onclick == > ajax req ==> {checkedseats , sum , mid , lid , sid , hid } 

      3. ticket table tid , userid , encode(checked seats )  , remaining  
      3a. sid ,mid , lid , hid  array ==> inludes seats  => if(seat) class .green else . grey{ disabled : true }

      4. windo.location => ticket.php?tid=2    {async await }

      5. tid {display data }
      -->

        <button class="pay1" onclick="<?php 
        if(isset($_SESSION['user_id']))
        {
            echo 'bookSeat()';
        }
        else
        {
          echo 'redirectSignin()';
        }
        ?>">Pay Rs. <span
            class="cost" id="cost"></span></button>
      </div>
</body>
<script>

  function changeCost(e) {
    var checkboxes = document.querySelectorAll('input[name="seats[]"]');
    var checkedSeats = [];
    const premium = ['A', 'B'];
    const Gold = ['C', 'D', 'E', 'F'];
    const Silver = ['G', 'H'];
    var sum;
    checkboxes.forEach(element => {
      if (element.checked) {
        // var alpha=element.parentElement.children[0].innerText;

        //checked seats pop = x
        //if > 6
        //foreach element.checked = false 
      

        checkedSeats.push(element.parentElement.children[0].innerText + element.labels[0].innerText);
        // console.log(checkedSeats + " H");
        var temp = checkedSeats[0];

        var len=checkedSeats.length;
        // var k=premium.includes(checkedSeats[len-1][0]);
        // if(k)
        // {
        //    if(premium.includes(checkedSeats[len-2][0]))
        //    {
        //     console.log("Hii");
        //    }

        // }
        // console.log(checkedSeats);
        // console.log(checkedSeats[len-1]);
        // console.log(checkedSeats[len-2]);

        var sameclass=false;
        if(len > 1)
        {
          if(premium.includes(checkedSeats[len-1][0]))
          {
            var j=premium.includes(checkedSeats[len-1][0]);
            // console.log(j);
            if(j)
            {
               if(!premium.includes(checkedSeats[len-2][0]))
               {
                 sameclass=true;
                  
               }
              // console.log(premium.includes(checkedSeats[len-2][0]));
            }
          }
          else if(Gold.includes(checkedSeats[len-1][0]))
          {
            var j1=Gold.includes(checkedSeats[len-1][0]);
            // console.log(j1);
            if(j1)
            {
               if(!Gold.includes(checkedSeats[len-2][0]))
               {
                 sameclass=true;
                  
               }
              // console.log(premium.includes(checkedSeats[len-2][0]));
            }
          }
          else if(Silver.includes(checkedSeats[len-1][0]))
          {
            var j2=Silver.includes(checkedSeats[len-1][0]);
            // console.log(j2);
            if(j2)
            {
               if(!Silver.includes(checkedSeats[len-2][0]))
               {
                 sameclass=true;
                  
               }
              // console.log(premium.includes(checkedSeats[len-2][0]));
            }
          }


        }

        if ((checkedSeats.length > 6 || sameclass) ) 
        {
          // console.log((checkedSeats.length > 6)+" Hello");
          // console.log(sameclass+" Hi");
          checkedSeats = []

          checkedSeats.push(e.parentElement.children[0].innerText + e.labels[0].innerText);

          // checkedSeats.push(x);

          checkboxes.forEach(element1 => {
            if (element1.checked && element1 != e) {

              element1.checked = false;
              // checkedSeats.push(e.parentElement.children[0].innerText+e.labels[0].innerText);
            }

          });
          // element.checked = true;

        }
        // console.log(checkedSeats);
      }
      sum = 0;
      checkedSeats.forEach(seat => {
        var alpha = seat[0];
        if (premium.includes(alpha)) {
          sum = sum + 200;
        }
        else if (Gold.includes(alpha)) {
          sum = sum + 150;
        }
        else if (Silver.includes(alpha)) {
          sum = sum + 100;
        }
      });

    });
    if (checkedSeats.length > 0) {
      document.getElementById("payment").style.opacity = "1";

    }
    else {
      document.getElementById("payment").style.opacity = "0 ";

    }
    // console.log(checkedSeats);
    // console.log(sum);
    document.getElementById("cost").innerText = sum;
    var seat_details=
    {
      checkedSeats:checkedSeats,
      sum:sum
    }
    return seat_details;
  };

  //   function goBack()
  //   {
  //     window.history.back();
  //   }
  function bookSeat() 
  { var temp =document.getElementById('cost').innerHTML;
    document.getElementById('cost').innerHTML = "Loading...";
    var currentUrl = window.location.href;

    var url = new URL(currentUrl);

    var params = new URLSearchParams(url.search);

    var ticket=
    {
        
    }
    params.forEach(function (value, key) {
      ticket[key] = value;
      // console.log(key + ": " + value);
    });
    // console.log(ticket);
    var seatsum=changeCost();
    var user={
      user_id:<?php 

      
      $k=isset($_SESSION["user_id"]) ? $_SESSION["user_id"] :-2;
      echo $k;
      
      ?>
    }
    ticket = {...ticket,...seatsum,...user};
    console.log(ticket);

    var xhr=new XMLHttpRequest();
    xhr.open('POST','<?php echo $bookurshow_url;?>/Project/ticket_details.php',true);

    xhr.setRequestHeader('Content-Type','application/json');

    xhr.onload=function()
    {
      if (xhr.status >=200 && xhr.status < 300)
      {
        var response=JSON.parse(xhr.responseText);
        console.log(response.tid);
        document.getElementById('cost').innerHTML = temp;
        // Reload the window

        window.location.reload();
window.location.href = `<?php echo $bookurshow_url;?>/Project/ticket.php?tid=${response.tid}`;



      }
      else
      {
        console.error(xhr.status);
      }
    };

    xhr.onerror=function()
    {
      console.error("failed");
    }

    var payload=ticket;

    var jsonPayload=JSON.stringify(payload);

    xhr.send(jsonPayload);

  }


</script>
<script>
function redirectSignin() {
    // Redirecting to login.php
    window.location.href = "signin.php";
}
</script>

</html>