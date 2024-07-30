const close_search = document.getElementById("close-search");
const search_window = document.getElementById("search-window");
const mobile_search = document.getElementById("mobile-search");

function handleClick() {
  search_window.style.display = "none";
}
// Attach the event listener
close_search.addEventListener("click", handleClick);

const search = document.getElementById("search");
function handleClick1() {
  search_window.style.display = "block";
}
// Attach the event listener
search.addEventListener("click", handleClick1);
mobile_search.addEventListener("click", handleClick1);

const hidden_cities = document.getElementById("hidden-cities");
const view_cities = document.getElementById("hide-other");

function showOtherCities() {
  if (hidden_cities.style.display === "block") {
    hidden_cities.style.display = "none";
    view_cities.innerText = "View All Cities";
  } else {
    hidden_cities.style.display = "block";
    view_cities.innerText = "Hide All Cities";
  }
}

view_cities.addEventListener("click", showOtherCities);

const nav_location = document.getElementById("nav-location");
const nav_location1 = document.getElementById("nav-location-mobile");
const location_container = document.getElementById("location-container");
const close_location = document.getElementById("close-location");


function showCities() {
  if (location_container.style.display === "block") {
    location_container.style.display = "none";
  } else {
    location_container.style.display = "block";
  }
}

nav_location.addEventListener("click", showCities);
nav_location1.addEventListener("click", showCities);
close_location.addEventListener("click", ()=>{
  location_container.style.display = "none";

});

// document.addEventListener(
//   "click",
//   function (event) {
//     // If user either clicks X button OR clicks outside the modal window, then close modal by calling closeModal()
//     if (
//       // event.target.matches("#nav_location") ||
//       !event.target.closest(".location-window")
//     ) {
//       closeModal();
//     }
//   },
//   false
// );

// function closeModal() {
//   // document.querySelector(".location-container").style.display = "block";
//   // if(document.querySelector(".location-container").style.display === 'block'){
//     document.querySelector(".location-container").style.display = "none";

//   // }else{
//     // document.querySelector(".location-container").style.display = "block";
//   // }
// }
const close_signin = document.getElementById("close-signin");
const signin_window = document.getElementById("signin-window");
const signin_btn = document.getElementById("signin-btn");
const mobile_signin = document.getElementById("mobile-signin");



function openSignin() {
  signin_window.style.display = "block";
}
function closeSignin() {
  signin_window.style.display = "none";
}
signin_btn.addEventListener("click", openSignin);
close_signin.addEventListener("click", closeSignin);
mobile_signin.addEventListener("click",openSignin);

const nav_toggle = document.getElementById("nav-toggle-icon");
const sidebar = document.getElementById("side");
const overlay = document.getElementById("overlay");
const close_sidebar = document.getElementById("close-sidebar");


function showSidebar() {
  sidebar.classList.add("active");
  overlay.style.display = "block";
}
nav_toggle.addEventListener("click", showSidebar);
// const overlay=document.getElementById('overlay');
const side = document.getElementById("side");
function toggleMenu() {
  sidebar.classList.remove("active");
  overlay.style.display = "none";
  
}
const side_login=document.getElementById("side-login");
overlay.addEventListener('click',toggleMenu);
side_login.addEventListener("click", openSignin);
side_login.addEventListener("click",toggleMenu);

close_sidebar.addEventListener("click",toggleMenu);


const cities = [
  "Vijayawada",
  "Nuzvid",
  "Mumbai",
  "Delhi",
  "Bangalore",
  "Hyderabad",
  "Pune",
  "Jaipur",
  "Ahmedabad",
  "Amritsar",
  "Allahabad",
  "Agra",
  "Asansol",
  "Aurangabad",
  "Anand",
  "Aligarh",
  "Ambala",
  "Amravati"
];
const search_city = document.getElementById("location-search");

search_city.addEventListener('input', () => 
{ 
  var result = [];
  cities.forEach(city => {
    if(city.toLowerCase().includes(search_city.value.toLowerCase())){
      result.push(city);
    }
    
  });
  console.log(result);
  var cities_div = document.getElementById('cities');
  var temptxt = cities_div.innerHTML ;
  var result_content = "";
  result.forEach(rstr => {
    if(rstr==='Vijayawada'){
    result_content = result_content + `<p><a href="first.php?lid=2">${rstr}</a></p>`;

    }
    else if(rstr==='Nuzvid'){
      result_content = result_content + `<p><a href="first.php">${rstr}</a></p>`;
  
      }else{

        result_content = result_content + `<p>${rstr}</p>`;
      }
    
    
  });
  if(search_city.value!==""){
if(result_content ===""){
  cities_div.innerHTML = "No Results Found.";
}else{

  cities_div.innerHTML = result_content;
}
  }else{
    cities_div.innerHTML = temptxt;

  }


});
