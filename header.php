<div id="nav1" class="nav1">
      <div id="logo1" class="logo1">
        <a href="first.php">
          <img src="assets/images/bookurshow-19-08-2023.png" alt="" />
        </a>
      </div>
      <div id="nav-search" class="nav-search">
        <span><i class="fa-solid fa-magnifying-glass"></i></span>
        <input
          type="text"
          name="search"
          id="search"
          placeholder="Search for Movies,Events,Plays,Sports and Activities"
        />
      </div>
      <div id="nav-location" class="nav-location">
        <span id="location" class="location">Nuzvid</span>
        <i class="fa-solid fa-caret-down"></i>
      </div>

      <div id="nav-signin" class="nav-signin">
        <button class="signin-btn" id="signin-btn">sign in</button>
      </div>
      <div class="nav-toggle" id="nav-toggle">
        <i class="fa-solid fa-bars" id="nav-toggle-icon"></i>
      </div>
    </div>
    <div id="location-container" class="location-container">
      <div id="location-window" class="location-window">
        <input
          type="text"
          name="location-search"
          id="location-search"
          placeholder="Search for your city"
        />
        
        <p>Popular cities</p>
        <div class="cities" id="cities">
          <p><a href="first.php?lid=2">Vijayawada</a></p>
          <p>Mumbai</p>
          <p>Delhi</p>
          <p>Bangalore</p>
          <p>Hyderabad</p>
          <p>Chennai</p>
          <p>Kolkata</p>
          <p>Ahmedabad</p>
          <p>Pune</p>
          <p>Jaipur</p>
        </div>
        <div id="hidden-cities" class="hidden-cities">
          <p>Other cities</p>
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
        <input
          type="text"
          name="search-bar"
          id="search-bar"
          placeholder="Search for Movies,Events,Plays,Sports and Activities"
        />
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
          <p id="movie-name" class="movie-name">
            Jailer <span id="span1" class="span1">NEW</span
            ><i class="fa-solid fa-heart"></i
            ><span id="like" class="like">79%</span>
          </p>
          <p id="movie-name" class="movie-name">
            Jailer8 <span id="span1" class="span1">NEW</span
            ><i class="fa-solid fa-heart"></i
            ><span id="like" class="like">79%</span>
          </p>
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
          <button><i class="fa-brands fa-google"></i>continue with google</button>
          <button><i class="fa-solid fa-envelope"></i>continue with Email</button>
        </div>
        <span>or</span>
        <div class="signin-phone">
          <img src="assets/images/flag.png" class="india" alt="">+91<input type="number" placeholder="continue with phone number" id="signin-input" class="phone-window">
        </div>
        <span>I agree to the <a href="#">terms & conditions</a>and
          <a href="#">Privacy policy</a></span>
          <button class="phone-button" id="phone-button">
            Continue
          </button>
      </div>
    </div>
    <div id="side" class="side">
      <div class="overlay"  id="overlay"></div>
      <div class="sidebar" id="sidebar">
        <div class="sidebar-head">
          <h2>Hey!</h2>
        </div>
        <div class="sidebar-login">
        <i class="fas fa-sign-in-alt" id="login-icon"></i>
          <button class="side-login" id="side-login">Login/Register</button>
        </div>
         <div class="order" id="order"><i class="fas fa-shopping-cart" id="order-icon"></i>Your Orders</div>
          <div class="account" id="account"><i class="fas fa-cog" id="settings-icon"></i>Accounts & Settings</div>
      </div>
    </div>