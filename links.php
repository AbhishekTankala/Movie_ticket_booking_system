<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
    />
<?php  
  $pattern="~^/Project/seats\.php~";
if(preg_match($pattern,$_SERVER["REQUEST_URI"])){
    
    ?>

<link rel="stylesheet" href="assets/css/seats.css" />
<link rel="stylesheet" href="assets/css/ticket.css" />

<?php
   } else
   {
    ?>
    
    
    <link
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    rel="stylesheet"
    />
    
<link rel="stylesheet" href="assets/css/style.css" />
<link rel="stylesheet" href="./assets/css/footer.css" class="rel">
<link rel="stylesheet" href="assets/css/movie_style.css" />
<link rel="stylesheet" href="assets/css/seats.css" />
<link rel="stylesheet" href="assets/css/ticket.css" />
<link rel="stylesheet" href="assets/css/halls.css" />

    <?php
   }

?>


