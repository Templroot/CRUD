<!--session_start();-->
<!DOCTYPE html>
<html lang="ru">
 
<!--<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <link rel="stylesheet" href="gost.css" />
</head>-->
<head>
    <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleShopSecond.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" href="https://unpkg.com/flexboxgrid2@7.2.1/flexboxgrid2.min.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">    <title>Бытовая техника</title>
</head>

<body>
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

<nav class="navbar navbar-expand-lg navbar-light bg-light">
 <a class="navbar-brand" href="Shop.php">Справочник</a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
 <span class="navbar-toggler-icon"></span>
 </button>
 <!-- ---------------------------------------- -->

 <div class="collapse navbar-collapse" id="navbarSupportedContent">
 <ul class="navbar-nav mr-auto">
 <li class="nav-item active">
 <a class="nav-link" href="guest_mainpage.php">Вернуться<span class="sr-only">(current)</span></a>
 </li>
 <li class="nav-item dropdown">
 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 Холодильники
 </a>
 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
 <a class="dropdown-item" href="guest_moroz.php"> Морозильные камеры</a>
 <a class="dropdown-item" href="guest_fridge.php">Холодильники</a>
 <div class="dropdown-divider"></div>
 <a class="dropdown-item" href="guest_acs_fm.php">Аксессуары</a>
 </div>
 </li>
 
 <!-- ---------------------------------------- -->
 
 <li class="nav-item dropdown">
 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 Плиты
 </a>
 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
 <a class="dropdown-item" href="guest_E_plit.php">Электрические плиты</a>
 <a class="dropdown-item" href="guest_G_plit.php">Газовые плиты</a>
 <div class="dropdown-divider"></div>
 <a class="dropdown-item" href="guest_A_plit.php">Аксессуары</a>
 </div>
 </li>
 
  <!-- ---------------------------------------- -->
  
   <li class="nav-item dropdown">
 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 Стиральные,Посудомоечные машины
 </a>
 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
 <a class="dropdown-item" href="guest_Washer.php">Стиральные машины</a>
 <a class="dropdown-item" href="guest_Dishwasher.php">Посудомоечные машины</a>
 <div class="dropdown-divider"></div>
 <a class="dropdown-item" href="guest_acs_wash.php">Аксессуары</a>
 </div>
 </li>
 
   <!-- ---------------------------------------- -->
 
 </ul>
 </div>
</nav>
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

    <div class="cards">
        
     <?php
     header('Content-Type: text/html; charset=utf-8');
    // Include config file (подключаем файл)
                  require_once "login_config.php";
      //              if (!mysqli_set_charset($conn, "utf8")) {
 //   printf("\n Ошибка в кодировке utf8: %s\n", mysqli_error($conn));
 //   exit();
//}
                    if(isset($_POST['click'])&&!empty($_POST['click']))
                    {   // перенаправляем на создание записи
                        header("location:CRUD_create.php");
                    }
        $sql = "SELECT * FROM DB_Dishwasher";
        if($result = mysqli_query($link, $sql))
        {   // если запрос выполнен, заполняем таблицу!!
        if(mysqli_num_rows($result) > 0)
        {
            echo "<table class='table table-bordered table-striped'>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th>Название</th>";
                      
                        echo "<th>Цена</th>";
                        
                    echo "</tr>";
                echo "</thead>";
            echo "<tbody>";
            while($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
                    echo "<td>" . $row['Base_M_Brand'] . "</td>";
                  
                    echo "<td>" . $row['Base_M_price'] . "</td>";
                  echo "</tr>";
            }
            echo "</tbody>";                            
            echo "</table>";
        }


        else
        {
            echo "<p class='lead'><em>Ошибка! Записи не найдены!</em></p>";
        }
    }
    else
        {
        echo "Ошибка! Не выполнен запрос: " .$sql. " " .mysqli_error($link);
        }
    // Close connection (закрываем соединение с базой данных)
    mysqli_close($link);
    ?>
    </div>
    <footer>
        
        <hr width="80%" style="color: #FFFFFF;" />
        
    </footer>
</body>
</html>
