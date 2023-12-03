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
    <div class="cards">
     <?php
     $link = $_SESSION["link"];
$username = $_SESSION["username"];
$role_id = $_SESSION["role_id"];
$role_name = $_SESSION["role_name"];
$homepage = file_get_contents('guest_menu.html');
echo $homepage;
     header('Content-Type: text/html; charset=utf-8');
    // Include config file (подключаем файл)
                  require_once "login_config.php";
                       if(isset($_POST['click'])&&!empty($_POST['click']))
                    {   // перенаправляем на создание записи
                        header("location:CRUD_create.php");
                    }
        echo "<h1> Газовые плиты</h1>";
        $sql = "SELECT * FROM Gaz_Plit";
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
                    echo "<td> Газовая плита  " . $row['T_Gaz_Name'] . "</td>";
                  
                    echo "<td>" . $row['T_Gaz_prise'] . "</td>";
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