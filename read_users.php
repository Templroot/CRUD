<!DOCTYPE html>
<html lang="ru">
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

<?php
session_start(); // начинаем новую сессию

//извлекаем переменные из сессии, если были установлены
$link = $_SESSION["link"];
$username = $_SESSION["username"];
$role_id = $_SESSION["role_id"];
$role_name = $_SESSION["role_name"];

header('Content-Type: text/html; charset=utf-8');
// Include config file (подключаем файл)
require_once "login_config.php";
if($role_id != '2' )  // если не админ или модератор
{   if($role_id != '1' ){  // если не админ или модератор
    // запоминаем ошибку для отображения в файле CRUD_error.php
    $_SESSION["crud_error"] = "Недостаточно прав для изменения данных!!!";
    header("location: CRUD_error.php");
    exit;
}
}

$homepage = file_get_contents('Menu.html');
echo $homepage;


 if(isset($_POST['user_id'])&&!empty($_POST['user_id']))
 {   // перенаправляем на создание записи
    header("location:CRUD_create.php");
 }                                       
        $sql = "SELECT user_id, role_name, last_name, first_name, middle_name, email, username, password FROM users";//запрос для вывода данных из таблицы пользователей
        if($result = mysqli_query($link, $sql))
        {   // если запрос выполнен, заполняем таблицу
        if(mysqli_num_rows($result) > 0)
        {
            echo "<table class='table table-bordered table-striped'>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th>id</th>";
                        echo "<th>Роль</th>";
                        echo "<th>Фамилия</th>";
                        echo "<th>Имя</th>";
                        echo "<th>Отчество</th>";
                        echo "<th>email</th>";
                        echo "<th>Логин</th>";
                        //пароль видит только администратор
                        if ($role_id == "2"){
                          echo "<th>Пароль</th>";
                        }
                        
                    echo "</tr>";
                echo "</thead>";
            echo "<tbody>";
            //заполнение ячеек таблицы данными из БД
            while($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
                    echo "<td>" . $row['user_id'] . "</td>";
                    echo "<td>" . $row['role_name'] . "</td>";
                    echo "<td>" . $row['last_name'] . "</td>";
                    echo "<td>" . $row['first_name'] . "</td>";
                    echo "<td>" . $row['middle_name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    //если это админ, то показать пароль
                    if ($role_id == "2"){
                    echo "<td>" . $row['password'] . "</td>";
                    }
                    //если модератор или админ, показать кнопку Изменить
                    echo "<td><button class ='btn btn-outline-info my-2 my-sm-0' type='button'><a href='CRUD_update_user.php?user_id=". $row['user_id'] ."'>Изменить</a></button>
                      </td>";
                      //если админ, показать кнопку Удалить
                        if ($role_id == "2"){
                    echo "<td><button class ='btn btn-outline-info my-2 my-sm-0' type='button' style='margin-left: 5px;'><a href='delete_user.php?user_id=".$row['user_id']."&name_P=".$row['username']."' style=''>Удалить</a></button></td>";
                        }
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
