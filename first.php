
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>bookurshow</title>
    <?php
    include "links.php";

    ?>
  </head>
  <body>
    <?php
    include "header.php";
    ?>
    <section id="carousel" class="carousel">
      <div class="container mt-5">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
          </ol>

          <div class="carousel-inner">
            <div class="carousel-item active">
              <img
                src="assets/images/boyapati-rapo-posters1.jpg"
                alt="Image 1"
                class="boot-image"
              />
              <div class="carousel-caption">
                <h3>Skanda</h3>
              </div>
            </div>

            <div class="carousel-item">
              <img
                src="assets/images/shyam-singha-roy-posters1.jpg"
                alt="Image 2"
                class="boot-image"
              />
              <div class="carousel-caption">
                <h3>Shyam singa roy</h3>
              </div>
            </div>
            <!-- <div class="carousel-item">
              <img
                src="assets/images/Hanuman2.jpg"
                alt="Image 3"
                class="boot-image"
              />
              <div class="carousel-caption">
                <h3>Hanuman</h3>
              </div>
            </div> -->
            <div class="carousel-item">
              <img
                src="assets/images/gunturkaaram-posters19.jpg"
                alt="Image 4"
                class="boot-image"
              />
              <div class="carousel-caption">
                <h3>Guntur Kaaram</h3>
              </div>
            </div>
          </div>

          <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>

          <a class="carousel-control-next" href="#myCarousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
        </div>
      </div>

      <!-- Include Bootstrap JS scripts -->
    </section>
    <?php 
    include "movie_list.php";
    include "footer.php";
    ?>
   

