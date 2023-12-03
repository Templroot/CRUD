<html> 

<style>
@media only screen and (min-width: 768px) {
 .dropdown:hover .dropdown-menu {
 display: block;
 margin-top: 0;
 }
}

.page-header-f{
  margin: 10px;
  align-items: center;
}

.page-header-f button{
  margin-left: 5px;
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
$username = $_SESSION["username"];//извлекаем имя пользователя
$role_id = $_SESSION["role_id"];//извлекаем id роли
$role_name = $_SESSION["role_name"];//извлекаем имя роли
$homepage = file_get_contents('Menu.html');
echo $homepage;
//выводим меню из файла Menu.html
// Include config file (подключаем файлы)
header('Content-Type: text/html; charset=utf-8');
require_once "login_config.php";
//запрос на вывод данных из таблицы холодильников
//выбираем данные, которые нужно выводить
//выбираем таблицы, из которых будут выбраны данные
//прописываем условие для выбора
        $sql = "SELECT VR_Base_fridge.id, 
                       VR_Base_fridge.VR_Base_F_name, 
                           VR_Base_Brand.VR_Base_Brand_name, 
                           VR_Base_fridge.VR_Base_F_Volume, 
                           VR_Base_Defrosting.VR_Base_Defrosting_name, 
                           VR_Base_fridge.VR_Base_F_Energy, 
                           VR_Base_fridge.VR_Base_F_Size, 
                           VR_Base_Color.VR_Base_Color_name,
                           VR_Base_fridge.VR_Base_F_price,
                           VR_Base_fridge.image
                    FROM   VR_Base_fridge, VR_Base_Brand, 
                           VR_Base_Defrosting, VR_Base_Color 
                    WHERE  VR_Base_fridge.VR_Base_F_Brand = VR_Base_Brand.VR_Base_Brand_id 
                            AND VR_Base_fridge.VR_Base_F_Defrosting = VR_Base_Defrosting.VR_Base_Defrosting_id 
                            AND VR_Base_fridge.VR_Base_F_Color = VR_Base_Color.VR_Base_Color_id";
 
   if($result = mysqli_query($link, $sql))
        {   // если запрос выполнен, заполняем таблицу
          if(mysqli_num_rows($result) > 0)
        { 
            echo "<head>";
            echo "<link rel='stylesheet' href='CSS_FOR_READ.css'/>";
            echo "<link rel='stylesheet' href='https://unpkg.com/flexboxgrid2@7.2.1/flexboxgrid2.min.css'/>";
            echo "</head>";
            echo "<div class='page-header-f'>";
            echo htmlspecialchars($_SESSION["username"]); //вывод имени пользователя
            echo " (";
            echo htmlspecialchars($_SESSION["role_name"]);//вывод имени роли
            echo ") ";
            //если модератор или админ,вывести кнопку для добавления
            if (($role_id === "1") OR ($role_id === "2"))
                  echo "<button class ='btn btn-outline-info my-2 my-sm-0' type='button'><a href='create_fridge.php'>Добавить новый холодильник</a></button>";
            echo "</div>";
            
        echo "<div class='CATEGORII'>";
            while($row = mysqli_fetch_array($result))//вывод данных из БД
            {
                echo "<div class='col-sm-12 col-md-6 col-lg-6 '>";
                   echo "<div class='Tovar'>";
                   echo "<h3>".$row['VR_Base_F_name']."</h3>";//выводим наименование товара
                 echo "<div class='Tovarin'>";
                  echo "<div class='Photo'>";
                    echo "<img src=".$row['image'].">";//выводим изображение товара
                 echo "</div>"; 
                 echo "<div class='TextIN'>";
                    echo "<p>"."Прозводитель: " . $row['VR_Base_Brand_name'] . "</p>";
                    echo "<p>" ."Объем(л): ". $row['VR_Base_F_Volume'] . "</p>";
                    echo "<p>"."Размер: ". $row['VR_Base_F_Size'] . "</p>";
                    echo "<p>"."Энергопотребление: ". $row['VR_Base_F_Energy'] . "</p>";
                    echo "<p>"."Тип разморозки: "  . $row['VR_Base_Defrosting_name'] . "</p>";
                    echo "<p>"."Цвет: " . $row['VR_Base_Color_name'] . "</p>";
                    echo "<p>"."Цена: " . $row['VR_Base_F_price'] . "</p>";
                    //если модератор или админ,вывести кнопку для редактирования
                    if (($role_id === "1") OR ($role_id === "2")){
                      echo "<button class ='btn btn-outline-info my-2 my-sm-0' type='button'><a href='update_fridge.php?id=".$row['id']."' style=''>Изменить</a></button>";
                      //если админ,вывести кнопку для удаления
                    if ($role_id === "2")
                      echo "<td><button class ='btn btn-outline-info my-2 my-sm-0' type='button' style='margin-left: 5px;'><a href='delete_fridge.php?VR_Base_F_name=".$row['VR_Base_F_name']."' style=''>Удалить</a></button></td>"; 
                    } 
               echo "</div>"; 
              echo "</div>"; 
             echo "</div>"; 
            echo "</div>"; 
            }
            echo "</div>";                            
        }
        //если запрос не выполнен,выводим сообщение об ошибке
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