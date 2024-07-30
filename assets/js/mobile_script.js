// const mobile_search = document.getElementById("mobile-search");

// function handleClick() {
//   search_window.style.display = "none";
// }
// // Attach the event listener
// close_search.addEventListener("click", handleClick);

// const search = document.getElementById("search");
// function handleClick1() {
//   search_window.style.display = "block";
// }
// // Attach the event listener
// mobile_search.addEventListener("click", handleClick1);


const nav_location1 = document.getElementById("nav-location-mobile");
const close_location = document.getElementById("close-location");


function showCities() {
  if (location_container.style.display === "block") {
    location_container.style.display = "none";
  } else {
    location_container.style.display = "block";
  }
}

nav_location1.addEventListener("click", showCities);
close_location.addEventListener("click", ()=>{
  location_container.style.display = "none";

});


// const mobile_signin = document.getElementById("mobile-signin");


// function openSignin() {
//   signin_window.style.display = "block";
// }
// function closeSignin() {
//   signin_window.style.display = "none";
// }

// // close_signin.addEventListener("click", closeSignin);
// mobile_signin.addEventListener("click",openSignin);