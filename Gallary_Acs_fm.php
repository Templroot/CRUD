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

.Tovar_fm{
margin-bottom: 4px;
margin-top: 4px;
padding:30px;
-webkit-box-shadow: 2px -12px 58px -2px rgba(0, 0, 0, 0.15);
-moz-box-shadow: 2px -12px 58px -2px rgba(0, 0, 0, 0.15);
box-shadow: 2px -12px 58px -2px rgba(0, 0, 0, 0.15);
}

.TextIN_fm{
  text-align:left;
     height:100%;
}

.Tovar_fm h1{
  font-family: 'Russo One', sans-serif; 
} 


 .Tovarin_fm{
    display: flex;
    flex-direction: row;
    align-items:stretch;
    text-align: center;
    padding-bottom: 20px; 
 }

.Tovarin_fm img{
   max-height:400px; 
   width:150px;
   margin: 5px;
   padding: 5px;
}

.Photo_fm{
  width:250px;
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
$homepage = file_get_contents('Menu.html');
echo $homepage;
header('Content-Type: text/html; charset=utf-8');
require_once "login_config.php";
//запрос на вывод данных из таблицы аксессуаров
        $sql = "SELECT MR_Base_Acs.id,
                           MR_Base_Acs.MR_Base_Acs_name, 
                           MR_Base_User.MR_Base_User_name, 
                           MR_Base_Acs.MR_Base_Acs_disc, 
                           MR_Base_Acs.MR_Base_Acs_price,
                           MR_Base_Acs.image
                    FROM MR_Base_Acs, MR_Base_User
                    WHERE MR_Base_Acs.MR_Base_Acs_userr = MR_Base_User.MR_Base_User_id";
 
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
                  echo "<button class ='btn btn-outline-info my-2 my-sm-0' type='button'><a href='create_acs_fm.php'>Добавить новый аксессуар</a></button>";
            echo "</div>";

        echo "<div class='CATEGORII'>";
            while($row = mysqli_fetch_array($result))//вывод данных из БД
            {
                echo "<div class='col-sm-12 col-md-6 col-lg-4'>";
                   echo "<div class='Tovar_fm'>";
                    echo "<h5>".$row['MR_Base_Acs_name']."</h5>";
                    echo "<div class='Tovarin_fm'>";
                      echo "<div class='Photo_fm'>";
                        echo "<img src=".$row['image'].">";
                      echo "</div>"; 
                      echo "<div class='TextIN_fm'>";
                        echo "<p>"."Совместимость: " . $row['MR_Base_User_name'] . "</p>";
                      echo "<p>" ."Описание: ". $row['MR_Base_Acs_disc'] . "</p>";
                      echo "<p>"."Цена: " . $row['MR_Base_Acs_price'] . "</p>";
                      //если модератор или админ,вывести кнопку для редактирования
                    if (($role_id === "1") OR ($role_id === "2")){
                      echo "<button class ='btn btn-outline-info my-2 my-sm-0' type='button'><a href='update_acs_fm.php?id=".$row['id']."' style=''>Изменить</a></button>";
                      //если админ,вывести кнопку для удаления
                      if ($role_id === "2") {
                       echo "<button class ='btn btn-outline-info my-2 my-sm-0' type='button' style='margin-left: 5px;'><a href='delete_acs_fm.php?MR_Base_Acs_name=".$row['MR_Base_Acs_name']."' style=''>Удалить</a></button>";
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
    //Закрываем соединение
    mysqli_close($link);
?>
</html>