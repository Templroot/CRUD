<html> 
<style>
@media only screen and (min-width: 768px) {
 .dropdown:hover .dropdown-menu {
 display: block;
 margin-top: 0;
 }
}
</style>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<?php
// Check existence of id parameter before processing further
session_start(); // начинаем новую сессию
// извлекаем переменные из сессии, если были установлены
$link = $_SESSION["link"];
$username = $_SESSION["username"];
$role_id = $_SESSION["role_id"];
$role_name = $_SESSION["role_name"];
echo $homepage;
$homepage = file_get_contents('Menu.html');
echo $homepage;
// Include config file (подключаем файлы)
// Include config file
header('Content-Type: text/html; charset=utf-8');
    // Include config file (подключаем файл)
                  require_once "login_config.php";
                    require_once "login_config.php";
        $sql = "SELECT DB_Washer.id_W,
					   DB_Washer.Base_D_Brand, 
                       Type_load.Type_name, 
                       Drying_Function.Drying_Function_name, 
                       Width.Width_name, 
                       Max_Load.Max_Load_name, 
                       Speed.Speed_name, 
                       DB_Washer.Base_D_price,
                       DB_Washer.image
                FROM   DB_Washer, Type_load, Drying_Function, Width, Max_Load,Speed  
                WHERE  DB_Washer.Base_D_Type = Type_load.Type_id 
                        AND DB_Washer.Base_D_Drying_Function = Drying_Function.Drying_Function_id 
                        AND DB_Washer.Base_D_Width = Width.Width_id 
                        AND DB_Washer.Base_D_Max_Load = Max_Load.Max_Load_id
                        AND DB_Washer.Base_D_Speed = Speed.Speed_id";
   if($result = mysqli_query($link, $sql))
        {   // если запрос выполнен, заполняем таблицу!!
          if(mysqli_num_rows($result) > 0)
        { 
            echo "<head>";
            echo "<link rel='stylesheet' href='CSS_FOR_READ.css'/>";
            echo "<link rel='stylesheet' href='https://unpkg.com/flexboxgrid2@7.2.1/flexboxgrid2.min.css'/>";
            echo "</head>";
            echo "<div>";
            if (($role_id === "1") OR ($role_id === "2")){
            echo "<button class ='btn btn-outline-success my-2 my-sm-0' type='button'><a href='create_Washer.php?id=".$row['id']."'>Добавить новую запись</a></button>";
}
        // Вывод машин на страницу
        echo "<div class='CATEGORII'>";
            while($row = mysqli_fetch_array($result))
            {
                // flexgrid Для адаптации 
                echo "<div class='col-sm-12 col-md-6 col-lg-6 '>";
                   echo "<div class='Tovar'>";
                   echo "<h3>".$row['Base_D_Brand']."<h3>";
                 echo "<div class='Tovarin'>";
                 //фото в блоке
                  echo "<div class='Photo'>";
                    echo "<img src=".$row['image'].">";
                 echo "</div>"; 
                 echo "<div class='TextIN'>";
                    echo "<p>"."Тип: " . $row['Type_name'] . "</p>";
                    echo "<p>" ."Функция сушки: ". $row['Drying_Function_name'] . "</p>";
                    echo "<p>"."Ширина (см): "  . $row['Width_name'] . "</p>";
                    echo "<p>"."Максимальная загрузка белья (кг): " . $row['Max_Load_name'] . "</p>";
                    echo "<p>"." Скорость вращения (об/мин): " . $row['Speed_name'] . "</p>";
                    echo "<p>"."Цена: " . $row['Base_D_price'] . "</p>";
                    echo "<br />";
                     //   кнопки для модератора и администратора
                    if (($role_id === "1") OR ($role_id === "2")){
                      echo "<button class ='btn btn-outline-success my-2 my-sm-0' type='button'><a href='update_Washer.php?id_W=".$row['id_W']."' style=''>Изменить</a></button>";
                    // кнопка только для администатора 
                    if ($role_id === "2"){
                      echo "<td><button class ='btn btn-outline-success my-2 my-sm-0' type='button' style='margin-left: 5px;'><a href='delete_Washer.php?id_W=".$row['id_W']."&name_W=".$row['Base_D_Brand']."'>Удалить</a></button></td>";
                      }
                    }
               echo "</div>"; 
               echo "</div>"; 
                 echo "</div>"; 
                  echo "</div>"; 
            }
            echo "</div>";                            
        }
// вывод ошибок
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
</html>