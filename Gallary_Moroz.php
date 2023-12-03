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
$username = $_SESSION["username"];
$role_id = $_SESSION["role_id"];
$role_name = $_SESSION["role_name"];
//подгружаем меню
$homepage = file_get_contents('Menu.html');
echo $homepage;
// Include config file (подключаем файлы)
header('Content-Type: text/html; charset=utf-8');
require_once "login_config.php";
//запрос для вывода данных из таблицы морозильников
        $sql = "SELECT MR_Base_Moroz.id,
                           MR_Base_Moroz.MR_Base_M_name, 
                           MR_Base_Brand.MR_Base_Brand_name, 
                           MR_Base_Type.MR_Base_Type_name, 
                           MR_Base_Moroz.MR_Base_M_Volume,
                           MR_Base_Defrosting.MR_Base_Defrosting_name,
                           MR_Base_Moroz.MR_Base_M_Energy,
                           MR_Base_Moroz.MR_Base_M_Size,
                           MR_Base_Moroz.MR_Base_M_price,
                           MR_Base_Moroz.image 
                    FROM MR_Base_Moroz, 
                         MR_Base_Brand, 
                         MR_Base_Type,
                         MR_Base_Defrosting 
                    WHERE MR_Base_Moroz.MR_Base_M_Brand = MR_Base_Brand.MR_Base_Brand_id AND MR_Base_Moroz.MR_Base_M_Type = MR_Base_Type.MR_Base_Type_id AND MR_Base_Moroz.MR_Base_M_Defrosting = MR_Base_Defrosting.MR_Base_Defrosting_id";
 
   if($result = mysqli_query($link, $sql))
        {   // если запрос выполнен, заполняем таблицу!!
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
                  echo "<button class ='btn btn-outline-info my-2 my-sm-0' type='button'><a href='create_moroz.php'>Добавить новый морозильник</a></button>";
            echo "</div>";

        echo "<div class='CATEGORII'>";
            while($row = mysqli_fetch_array($result))//вывод данных из БД
            {
                echo "<div class='col-sm-12 col-md-6 col-lg-6 '>";
                   echo "<div class='Tovar'>";
                   echo "<h3>".$row['MR_Base_M_name']."</h3>";
                 echo "<div class='Tovarin'>";

                  echo "<div class='Photo'>";
                    echo "<img class = 'img_m' src=".$row['image'].">";
                 echo "</div>"; 
                 echo "<div class='TextIN'>";
                    echo "<p>"."Прозводитель: " . $row['MR_Base_Brand_name'] . "</p>";
                    echo "<p>" ."Тип: ". $row['MR_Base_Type_name'] . "</p>";
                    echo "<p>"."Объем(л): ". $row['MR_Base_M_Volume'] . "</p>";
                    echo "<p>"."Тип разморозки: "  . $row['MR_Base_Defrosting_name'] . "</p>";
                    echo "<p>"."Энергопотребление: ". $row['MR_Base_M_Energy'] . "</p>";
                    echo "<p>"."Размер: " . $row['MR_Base_M_Size'] . "</p>";
                    echo "<p>"."Цена: " . $row['MR_Base_M_price'] . "</p>";
                    //если модератор или админ,вывести кнопку для редактирования
                    if (($role_id === "1") OR ($role_id === "2")){
                      echo "<button class ='btn btn-outline-info my-2 my-sm-0' type='button'><a href='update_moroz.php?id=".$row['id']."' style=''>Изменить</a></button>";
                      //если админ,вывести кнопку для удаления
                      if ($role_id === "2"){
                      echo "<td><button class ='btn btn-outline-info my-2 my-sm-0' type='button' style='margin-left: 5px;'><a href='delete_moroz.php?MR_Base_M_name=".$row['MR_Base_M_name']."' style=''>Удалить</a></button></td>";
                       }
                    }
                echo "</div>"; 
               echo "</div>"; 
              echo "</div>"; 
            echo "</div>"; 
            }
            echo "</div>";                            
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
</html>