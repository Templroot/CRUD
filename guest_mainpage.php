<?php

$homepage = file_get_contents('guest_menu.html');
echo $homepage;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleShopSecond.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" href="https://unpkg.com/flexboxgrid2@7.2.1/flexboxgrid2.min.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">    
  <title>Бытовая техника</title>
</head>
<body>
<!-- ------------------- -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<style>
@media only screen and (min-width: 768px) {
 .dropdown:hover .dropdown-menu {
 display: block;
 margin-top: 0;
 }
}
</style>


<script>
$('.dropdown-toggle').click(function(e) {
 if ($(document).width() > 768) {
 e.preventDefault();
 var url = $(this).attr('href'); 
 if (url !== '#') { 
 window.location.href = url;
 }
 }
});
</script>
<div class="page-header">
<p><b>Guest</b></p><!--имя роли-->
</div>
  <div class="CATEGORII">
    <div class="col-sm-12 col-md-6 col-lg-4 ">
      <div class="Tovar">
          <!--Ссылки для перехода на страницу холодильников-->
        <a href="guest_fridge.php">
          <img
            src="https://tefida.com/t.tefida.com/2019/01/SmartFridge435x435.jpg.webp"
            alt="Холодильники">
          <br />
         <h3>Холодильники</h3> </a>
      </div>
    </div>
    
      <div class="col-sm-12 col-md-6 col-lg-4 ">
      <div class="Tovar">
          <!--Ссылки для перехода на страницу морозильников-->
          <a href="guest_moroz.php">
            <img src="https://l-rus.ru/upload/resize_cache/iblock/542/550_400_1/5420899d41a8304699b23532cf072a1b.jpg" alt="Морозильники">
            <br />
            <h3>Морозильники</h3>
          </a>
      </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-4  ">
      <div class="Tovar">
          <!--Ссылки для перехода на страницу плит-->
        <a href="guest_Plit.php">
          <img src="https://3dnews.ru/assets/external/illustrations/2013/12/09/785815/786265_u01_b.jpg" alt="Плиты">
          <br />
         <h3>Плиты</h3> </a>
      </div>
    </div>
    
    <div class="col-sm-12 col-md-6 col-lg-4 ">
      <div class="Tovar">
        <!--Ссылки для перехода на страницу стиральных машин-->
        <a href="guest_Washer.php">
          <img src="https://st32.stpulscen.ru/images/product/341/793/264_big.jpg" alt="Стиральные машины">
          <br />
         <h3>Стиральные машины</h3> </a>

      </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4 ">
      <div class="Tovar">
        <!--Ссылки для перехода на страницу посудомоечных машин-->
          <a href="guest_Dishwasher.php"> <img src="https://htstatic.imgsmail.ru/pic_image/10125c0fe91cd102927896137576d1d4/450/450/1733818/" alt="Посудомоечные машины">
            <br />
         <h3>Посудомоечные машины</h3> </a>
      </div>
    </div>
    
    <div class="col-sm-12 col-md-6 col-lg-4 ">
      <div class="Tovar">
        <!--Ссылки для перехода на страницу аксессуаров-->
          <a href="guest_Acs_all.php"> <img src="https://c.dns-shop.ru/thumb/st1/fit/wm/1608/1500/f5c1d88e2be2adbf538f73754b02cb0e/62ac47ec569fefd5582fab90ebf667bb3364664f542cd213a62bb60093f77f81.jpg" alt="Аксессуары">
            <br />
         <h3>Аксессуары</h3> </a>
      </div>
    </div>
  </div>
</body>
</html>