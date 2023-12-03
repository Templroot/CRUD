<?php
//начинаем новую сессию
session_start();

// проверяем, был ли выполнен вход; если нет, отправляем на страницу входа
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
    header("location: login.php"); // перенаправляем на страницу входа
    exit;
}
// извлекаем переменные сессии имя пользователя, Id роли и имя роли...
$link = $_SESSION["link"];
$username = $_SESSION["username"];
$role_id = $_SESSION["role_id"];
$user_id=$_SESSION["user_id"];
$role_name = $_SESSION["role_name"];

$homepage = file_get_contents('Menu.html'); //Вывод меню на верху страницы
echo $homepage;
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleShopSecond.css"/>
  <link rel="stylesheet" href="https://unpkg.com/flexboxgrid2@7.2.1/flexboxgrid2.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
</head>
<body>
<div class="page-header">
<b><?php echo htmlspecialchars($_SESSION["username"]); ?>
</b>(<?php echo htmlspecialchars($_SESSION["role_name"]); ?>)
<?php if (($role_id === "1") OR ($role_id === "2"))
echo "<button class ='btn btn-outline-primary my-2 my-sm-0' type='button' style='margin:10px;'><a href='read_users.php'>Пользователи</a></button>";
echo "<button class ='btn btn-outline-primary my-2 my-sm-0' type='button' style='margin-left: 5px;'><a href='CRUD_update_user.php?user_id=".$_SESSION["user_id"]."' style=''>Редактировать свой аккаунт</a></button>";?>

</div>
  <!-- ------------------- -->
  <div class="CATEGORII">
    <!-- --- -->
    <div class="col-sm-12 col-md-6 col-lg-4 ">
      <div class="Tovar">

        <a href="Gallary_Fridge.php">
          <img
            src="https://tefida.com/t.tefida.com/2019/01/SmartFridge435x435.jpg.webp"
            alt="Холодильники">
          <br/>
         <h3>Холодильники</h3> </a>

      </div>
    </div>
    
    
      <div class="col-sm-12 col-md-6 col-lg-4 ">
      <div class="Tovar">
      
          <a href="Gallary_Moroz.php">
            <img src="https://l-rus.ru/upload/resize_cache/iblock/542/550_400_1/5420899d41a8304699b23532cf072a1b.jpg" alt="Морозильники">
            <br />
            <h3>Морозильники</h3>
          </a>
        

      </div>
    </div>
    <!-- ----- -->
    <div class="col-sm-12 col-md-6 col-lg-4  ">
      <div class="Tovar">
        <a href="Gallary_Plit.php">
          <img src="https://3dnews.ru/assets/external/illustrations/2013/12/09/785815/786265_u01_b.jpg" alt="Плиты">
          <br />
         <h3>Плиты</h3> </a>


      </div>
    </div>
    <!-- --- -->
    <div class="col-sm-12 col-md-6 col-lg-4 ">
      <div class="Tovar">

        <a href="Gallary_A_Machine.php">
          <img src="https://st32.stpulscen.ru/images/product/341/793/264_big.jpg" alt="Стиральные машины">
          <br />
         <h3>Стиральные машины</h3> </a>


      </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4 ">
      <div class="Tovar">
        
          <a href="Gallary_E_Machine.php"> <img src="https://htstatic.imgsmail.ru/pic_image/10125c0fe91cd102927896137576d1d4/450/450/1733818/" alt="Посудомоечные машины">
            <br />
         <h3>Посудомоечные машины</h3> </a>
      </div>
    </div>
    
    <div class="col-sm-12 col-md-6 col-lg-4 ">
      <div class="Tovar">
        
          <a href="Gallary_Acs_all.php"> <img src="https://c.dns-shop.ru/thumb/st1/fit/wm/1608/1500/f5c1d88e2be2adbf538f73754b02cb0e/62ac47ec569fefd5582fab90ebf667bb3364664f542cd213a62bb60093f77f81.jpg" alt="Аксессуары">
            <br />
         <h3>Аксессуары</h3> </a>
      </div>
    </div>
  

  </div>
</body>
<?php
echo  file_get_contents('footer.html');
?>
</html>