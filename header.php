<div id="nav1" class="nav1">
  <div id="logo1" class="logo1">
    <a href="first.php">
      <img src="assets/images/bookurshow-19-08-2023.png" alt="" />
    </a>
  </div>
    <?php
    $lid=@$_GET["lid"];
    


    ?>
  <div id="nav-search" class="nav-search">
    <span><i class="fa-solid fa-magnifying-glass"></i></span>
    <input type="text" name="search" id="search" placeholder="Search for Movies,Events,Plays,Sports and Activities" />
  </div>
  <div id="nav-location" class="nav-location">
    <span id="location" class="location">
      <?php
      $text=$lid == 2 ? "Vijayawada" : "Nuzvid";
      echo $text;
      ?>
    </span>
    <i class="fa-solid fa-caret-down"></i>
  </div>

  <div id="nav-signin" class="nav-signin">
    <button class="signin-btn" id="signin-btn">sign in</button>
  </div>
  <div class="nav-toggle" id="nav-toggle">
    <div class="mobile-location">
      <i class="fa-solid fa-location-dot" id="nav-location-mobile"></i>
    <?php
      $text=$lid == 2 ? "Vijayawada" : "Nuzvid";
      echo $text;
      ?>
    </div>
    <i class="fa-solid fa-bars" id="nav-toggle-icon"></i>
  </div>

  <!-- <div class="mobile-nav" id="mobile-nav">

  <i class="fa-solid fa-bars" id="nav-toggle-icon">

  

</div> -->
</div>
<div class="mobile-footer mobile-footer-halls" id="mobile-footer">
  <div class="mobile-icon">

    
    <a href="first.php">
    <i class="fa-solid fa-house">
      </i>
    </a>
      Home
  </div>
  <div class="mobile-icon">

    <i class="fa-solid fa-magnifying-glass" id="mobile-search"></i>
    Search
  </div>
  <div class="mobile-icon">

    <i class="fa-solid fa-circle-user" id="mobile-signin"></i>
    Account

  </div>
</div>


<div id="location-container" class="location-container">
  <div id="location-window" class="location-window">
  <i class="fa-solid fa-xmark" id="close-location"></i>
  <!-- <i class="fa-regular fa-circle-xmark" id="close-search"></i>/\ -->
    <input type="text" name="location-search" id="location-search" placeholder="Search for your city" />


    <p class="city-heading">Popular cities</p>
    <div class="cities" id="cities">
      <p><a href="first.php?lid=2">Vijayawada</a></p>
      <p><a href="first.php">Nuzvid</a></p>
      <p>Mumbai</p>
      <p>Delhi</p>
      <p>Bangalore</p>
      <p>Hyderabad</p>
      <p>Pune</p>
      <p>Jaipur</p>
    </div>
    <div id="hidden-cities" class="hidden-cities">
      <p class="city-heading">Other cities</p>
      <div id="city-names">
        <p>Ahmedabad</p>
        <p>Amritsar</p>
        <p>Allahabad</p>
        <p>Agra</p>
        <p>Asansol</p>
        <p>Aurangabad</p>
        <p>Anand</p>
        <p>Aligarh</p>
        <p>Ambala</p>
        <p>Amravati</p>
      </div>
    </div>
    <button id="hide-other" class="hide-other">View All cities</button>
  </div>
</div>
<div id="search-window" class="search-window">
  <div id="search-window1" class="search-window1">
    <input type="text" name="search-bar" id="search-bar" oninput="getSearch()"
      placeholder="Search for Movies,Events,Plays,Sports and Activities" />
    <div class="search-suggestion" id="search-suggestion">
     
    </div>
    <i class="fa-regular fa-circle-xmark" id="close-search"></i>
  </div>
  <div id="movies" class="movies">
    <div id="movie-btn" class="movie-btn">
      <div id="btn1" class="btn1">
        <button id="btn2">MOVIES</button>
        <button id="btn3">CINEMAS</button>
      </div>
      <div id="filter1" class="filter1">
        <span> Filter </span>
        <label for="hindi">HINDI</label>
        <input type="checkbox" name="hindi" id="hindi" />
        <label for="telugu">TELUGU</label>

        <input type="checkbox" name="telugu" id="telugu" />
        <label for="tamil">TAMIL</label>
        <input type="checkbox" name="tamil" id="tamil" />
      </div>
    </div>
    <div id="movie-content" class="movie-content">
      <h6 id="lang" class="lang">TELUGU</h6>
      <?php

      include "connection.php";
      $query_header = "select h.location_id,m.movie_id,m.movie_name from movies m inner join Halls h on m.hid=h.Hall_id;";
      $result_header = mysqli_query($conn, $query_header);
      while ($row_header = mysqli_fetch_assoc($result_header)) {
        ?>
        <a href="movie.php?mid=<?php echo $row_header["movie_id"]; ?>&lid=<?php echo $row_header["location_id"] ?>">

          <p id="movie-name-searchbar" class="movie-name-searchbar">
            <?php
            echo $row_header["movie_name"]; ?> <span id="span1" class="span1">NEW</span><i
              class="fa-solid fa-heart"></i><span id="like" class="like">
              <?php
              $randomNumber = rand(80, 100);
              echo $randomNumber . "%";

              ?>
            </span>
          </p>
        </a>

        <?php

      }


      ?>


    </div>
  </div>
</div>
<div class="signin-window" id="signin-window">
  <div class="signin" id="signin">
    <div id="signin-head">
      <h4>Get started</h4>
      <i class="fa-regular fa-circle-xmark" id="close-signin"></i>
    </div>
    <div class="signin-btns" id="signin-btns">
      <button onclick="redirectSignin()" class="email-btn"><i class="fa-solid fa-envelope"></i>continue with Email</button>
      <button><i class="fa-brands fa-google"></i>continue with google</button>
      <div class="phone-div">
      <span>or</span>
      <div class="signin-phone">
        <img src="assets/images/flag.png" class="india" alt="">+91<input type="text"
          placeholder="continue with phone number" id="signin-input" class="phone-window">
      </div>
    </div>
    </div>
    
    <span class="signin-policy">I agree to the <a href="#">terms & conditions </a>and
      <a href="#">Privacy policy</a></span>
    <button class="phone-button" id="phone-button">
      Continue
    </button>
  </div>
</div>


<div id="side" class="side">
  <div class="overlay" id="overlay"></div>
  <div class="sidebar" id="sidebar">
    <div class="sidebar-head">
      <h5>Hey!
        <?php 
if(isset($_SESSION['Email'])){

  $string = $_SESSION["Email"];
  $trimmedString = strstr($string, '@', true);

  echo $trimmedString;
}

        ?>



      </h5>
      <i class="fa-regular fa-circle-xmark" id="close-sidebar"></i>
    </div>
    <div class="sidebar-login">
       
      
      
      
      <i class="fas fa-sign-in-alt" id="login-icon" style="display:<?php if(isset($_SESSION['user_id'])){

        echo 'none;';
      }else{

        echo 'inline;';
      }?>"></i>
      <button class="side-login" id="side-login"  style="display:<?php if(isset($_SESSION['user_id'])){

echo 'none;';
}else{

echo 'inline;';
}?>"
    >
    Login/Register</button>
    <a class="side-login side-logout" style="display:<?php if(isset($_SESSION['user_id'])){

echo 'inline;';
}else{

echo 'none;';
}?>"
href="logout.php">
      logout
    </a>
   
    </div>
    <a href="orders.php" class="order" id="order"><i class="fas fa-shopping-cart" id="order-icon"></i>Your Orders</a>
    <div class="account" id="account"><i class="fas fa-cog" id="settings-icon"></i><a href="user.php">Accounts & Settings</a></div>
  </div>
</div>
<script>
function redirectSignin() {
    // Redirecting to login.php
    window.location.href = "signin.php";
}
</script>



<script>
  function getSearch() {
    const searchTerm = document.getElementById('search-bar').value;
    if(searchTerm!==""){
      var xhr = new XMLHttpRequest();
    xhr.open('GET', `<?php echo $bookurshow_url;?>/Project/searchresult.php?s=${searchTerm}`, true);

    xhr.onload = function () {
      if (xhr.status >= 200 && xhr.status < 300) {
        var suggestionContainer = document.getElementById('search-suggestion');

        

        // Request was successful

        var tempstr = "";
        JSON.parse(xhr.responseText).forEach(search => {
          tempstr = tempstr + `<div class="suggestion">
        <a href="movie.php?mid=${search.movie_id}&lid=${search.location_id}">

          <p id="search-result" class="search-result"><i class="fa-solid fa-clapperboard"></i>
            ${search.movie_name}
          </p>

        </a>
      </div>`
        });
        suggestionContainer.innerHTML = tempstr;
      } else {
        // Request failed
        console.error('Request failed with status', xhr.status);
      }
    };

    xhr.onerror = function () {
      // Request failed
      console.error('Request failed');
    };

    xhr.send();
    }else{
      var suggestionContainer = document.getElementById('search-suggestion');
suggestionContainer.innerHTML = "";
    }
    // console.log(document.getElementById('search-bar'));

   
  }

</script>