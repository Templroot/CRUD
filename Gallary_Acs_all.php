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
$homepage = file_get_contents('Menu.html');
echo $homepage;
// Include config file (подключаем файлы)
// Include config file
header('Content-Type: text/html; charset=utf-8');
require_once "login_config.php";
//запрос на вывод всех аксессуаров для холодильников и морозильников
        $sql = "SELECT MR_Base_Acs.id,
                           MR_Base_Acs.MR_Base_Acs_name, 
                           MR_Base_User.MR_Base_User_name, 
                           MR_Base_Acs.MR_Base_Acs_disc, 
                           MR_Base_Acs.MR_Base_Acs_price,
                           MR_Base_Acs.image
                    FROM MR_Base_Acs, MR_Base_User
                    WHERE MR_Base_Acs.MR_Base_Acs_userr = MR_Base_User.MR_Base_User_id";
//запрос на вывод всех аксессуаров для плит
        $sql_plit = "SELECT 
        Accessories.id_A,
         Accessories.T_A_name,
                           Tip_Plit.Tip_Plit_name, 
                           Accessories.T_A_fun, 
                           Accessories.T_A_price, 
                           Accessories.image
                    FROM Accessories, Tip_Plit
                    WHERE Accessories.T_A_tip = Tip_Plit.Tip_Plit_id";
//запрос на вывод всех аксессуаров для стиральных и посудомоечных машин
        $sql_hose = "SELECT DB_Hose.Base_N_Brand,
                           Type_hose.Type3_name, 
                           Intend.Intend_name,
                           Max_pressure.Max_pressure_name,
                           Max_t.Max_t_name,
                           Length.Length_name, 
                           DB_Hose.Base_N_Price, 
                           DB_Hose.image
                    FROM DB_Hose, Type_hose, Intend, Max_pressure, Max_t, Length
                    WHERE DB_Hose.Base_N_Type = Type_hose.Type3_id && 
                          DB_Hose.Base_N_Intend = Intend.Intend_id &&
                          DB_Hose.Base_N_Max_pressure = Max_pressure.Max_pressure_id &&
                          DB_Hose.Base_N_Max_t = Max_t.Max_t_id &&
                          DB_Hose.Base_N_Length = Length.Length_id";

   if(($result = mysqli_query($link, $sql)) && ($result_plit = mysqli_query($link, $sql_plit)) && ($result_hose = mysqli_query($link, $sql_hose)))
        {   // если запрос выполнен, заполняем таблицу!!
          if((mysqli_num_rows($result) > 0) && (mysqli_num_rows($result_plit) > 0) && (mysqli_num_rows($result_hose) > 0))
        { 
            echo "<head>";
            echo "<link rel='stylesheet' href='CSS_FOR_READ.css'/>";//подключаем файл css
            echo "<link rel='stylesheet' href='https://unpkg.com/flexboxgrid2@7.2.1/flexboxgrid2.min.css'/>";
            echo "</head>";
            echo "<hr>";
            echo "<div class='zag_razdela'>";
            echo "<h1>Аксессуары для холодильников и морозильников</h1>";
            echo "</div>";
            echo "<hr>";

            echo "<div class='CATEGORII'>";
            while($row = mysqli_fetch_array($result))//вывод аксессуаров для холодильников и морозильников
            {
                echo "<div class='col-sm-12 col-md-6 col-lg-6 '>";
                   echo "<div class='Tovar'>";
                   echo "<h3>".$row['MR_Base_Acs_name']."<h3>";
                 echo "<div class='Tovarin'>";
                  echo "<div class='Photo'>";
                    echo "<img src=".$row['image'].">";
                 echo "</div>"; 
                 echo "<div class='TextIN'>";
                    echo "<p>"."Совместимость: " . $row['MR_Base_User_name'] . "</p>";
                    echo "<p>" ."Описание: ". $row['MR_Base_Acs_disc'] . "</p>";
                    echo "<p>"."Цена: " . $row['MR_Base_Acs_price'] . "</p>";
                    //если админ или модератор, вывести кнопку Изменить
                    if (($role_id === "1") OR ($role_id === "2")){
                      echo "<button class ='btn btn-outline-info my-2 my-sm-0' type='button'><a href='update_acs_fm.php?id=".$row['id']."' style=''>Изменить</a></button>";
                      //если админ,вывести кнопку Удалить
                      if ($role_id === "2"){
                       echo "<td><button class ='btn btn-outline-info my-2 my-sm-0' type='button' style='margin-left: 5px;'><a href='delete_acs_fm.php?MR_Base_Acs_name=".$row['MR_Base_Acs_name']."' style=''>Удалить</a></button></td>";
                       }
                    }
               echo "</div>"; 
              echo "</div>"; 
             echo "</div>"; 
            echo "</div>"; 
            }

            echo "</div>";  
            echo "<hr>";
            echo "<div class='zag_razdela'>";
            echo "<h1>Аксессуары для плит</h1>";
            echo "</div>";
            echo "<hr>";
            echo "<div class='CATEGORII'>";

            while($row_plit = mysqli_fetch_array($result_plit))//вывод аксессуаров для плит
            {
                echo "<div class='col-sm-12 col-md-6 col-lg-6 '>";
                   echo "<div class='Tovar'>";
                   echo "<h3>".$row_plit['T_A_name']."<h3>";
                 echo "<div class='Tovarin'>";
                  echo "<div class='Photo'>";
                    echo "<img src=".$row_plit['image'].">";
                 echo "</div>"; 
                 echo "<div class='TextIN'>";
                    echo "<p>"."Тип плиты: " . $row_plit['Tip_Plit_name'] . "</p>";
                    echo "<p>" ."Описание: ". $row_plit['T_A_fun'] . "</p>";
                    echo "<p>"."Цена: " . $row_plit['T_A_price'] . "</p>";
                    //если админ или модератор, вывести кнопку Изменить
                    if (($role_id === "1") OR ($role_id === "2")){
                      echo "<button class ='btn btn-outline-info my-2 my-sm-0' type='button'><a href='update_A_plit.php?id_A=".$row_plit['id_A']."' style=''>Изменить</a></button>";
                      //если админ,вывести кнопку Удалить
                      if ($role_id === "2"){
                       echo "<td><button class ='btn btn-outline-info my-2 my-sm-0' type='button' style='margin-left: 5px;'><a href='delete_A_plit.php?id_A=".$row_plit['id_A']."' style=''>Удалить</a></button></td>";
                       }
                    }
                echo "</div>"; 
               echo "</div>"; 
              echo "</div>"; 
            echo "</div>"; 
            }
            echo "</div>";  
            echo "<hr>";
            echo "<div class='zag_razdela'>";
            echo "<h1>Шланги для стиральных и посудомоечных машин</h1>";
            echo "</div>";
            echo "<hr>";
            echo "<div class='CATEGORII'>";
            while($row_hose = mysqli_fetch_array($result_hose))
            {
                echo "<div class='col-sm-12 col-md-6 col-lg-6 '>";
                   echo "<div class='Tovar'>";
                   echo "<h3>".$row_hose['Base_N_Brand']."<h3>";
                 echo "<div class='Tovarin'>";
                  echo "<div class='Photo_fm'>";
                    echo "<img src=".$row_hose['image'].">";
                 echo "</div>"; 
                 echo "<div class='TextIN'>";
                    echo "<p>"."Тип: " . $row_hose['Type3_name'] . "</p>";
                    echo "<p>" ."Максимальное давление: ". $row_hose['Max_pressure_name'] . "</p>";
                    echo "<p>"."Максимальная температура: " . $row_hose['Max_t_name'] . "</p>";
                    echo "<p>"."Длина (м): " . $row_hose['Length_name'] . "</p>";
                    echo "<p>"."Цена: " . $row_hose['Base_N_Price'] . "</p>";
                    if (($role_id === "1") OR ($role_id === "2")){
                        //если админ или модератор, вывести кнопку Изменить
                      echo "<button class ='btn btn-outline-info my-2 my-sm-0' type='button'><a href='update_acs_fm.php?id=".$row_plit['id']."' style=''>Изменить</a></button>";
                      //если админ,вывести кнопку Удалить
                      if ($role_id === "2"){
                       echo "<td><button class ='btn btn-outline-info my-2 my-sm-0' type='button' style='margin-left: 5px;'><a href='delete_acs_fm.php?MR_Base_Acs_name=".$row['MR_Base_Acs_name']."' style=''>Удалить</a></button></td>";
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
        echo "Ошибка! Не выполнен запрос!  ".mysqli_error($link);
        }
    // Close connection (закрываем соединение с базой данных)
    mysqli_close($link);
?>
</html>