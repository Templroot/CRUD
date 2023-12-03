<!--session_start();-->
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleShopSecond.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>Бытовая техника</title>
</head>

<body>
    
<style>
    .Price_row{
     width: 20%;
    }
</style>
<div class="cards">
<?php
header('Content-Type: text/html; charset=utf-8');
// Include config file (подключаем файл)
require_once "login_config.php";
$homepage = file_get_contents('guest_menu.html');
echo $homepage;
if(isset($_POST['click'])&&!empty($_POST['click']))
{   // перенаправляем на создание записи
    header("location:CRUD_create.php");
}                    
        $sql = "SELECT * FROM VR_Base_fridge";
        if($result = mysqli_query($link, $sql))
        {   // если запрос выполнен, заполняем таблицу!!
        if(mysqli_num_rows($result) > 0)
        {
            echo "<table class='table table-bordered table-striped'>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th>Название холодильника</th>";
                        echo "<th class='Price_row'>Цена</th>";
                    echo "</tr>";
                echo "</thead>";
            echo "<tbody>";
            while($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
                    echo "<td>" . $row['VR_Base_F_name'] . "</td>";
                    echo "<td>" . $row['VR_Base_F_price'] . "</td>";
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
</body>
</html>