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

        $sql_plit = "SELECT Accessories.T_A_name, Accessories.T_A_price FROM Accessories";


        if(($result_plit = mysqli_query($link, $sql_plit)))
        {   // если запрос выполнен, заполняем таблицу!!
        if((mysqli_num_rows($result_plit) > 0))
        {
        echo "<h1> Аксессуары к плитам</h1>";
          echo "<table class='table table-bordered table-striped'>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th>Название аксессуара для плит</th>";
                      
                        echo "<th class='Price_row'>Цена</th>";
                        
                    echo "</tr>";
                echo "</thead>";
            echo "<tbody>";
            while($row_plit = mysqli_fetch_array($result_plit))
            {
                echo "<tr>";
                    echo "<td>" . $row_plit['T_A_name'] . "</td>";
                  
                    echo "<td>" . $row_plit['T_A_price'] . "</td>";
                  echo "</tr>";
            }
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