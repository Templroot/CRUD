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
    // Include config file (подключаем файл)
                  require_once "login_config.php";
      //              if (!mysqli_set_charset($conn, "utf8")) {
 //   printf("\n Ошибка в кодировке utf8: %s\n", mysqli_error($conn));
 //   exit();
//}
            
                    require_once "login_config.php";

        $sql = "SELECT  DB_Hose.id_A,
                        DB_Hose.Base_N_Brand,
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



 
   if ($result = mysqli_query($link, $sql))
        {   // если запрос выполнен, заполняем таблицу!!
          if (mysqli_num_rows($result) > 0)
        { 
            echo "<head>";
            echo "<link rel='stylesheet' href='CSS_FOR_READ.css'/>";
            echo "<link rel='stylesheet' href='https://unpkg.com/flexboxgrid2@7.2.1/flexboxgrid2.min.css'/>";
            echo "</head>";
             if (($role_id === "1") OR ($role_id === "2")){
            echo "<button class ='btn btn-outline-success my-2 my-sm-0' type='button'><a href='create_acs_wash.php?id=".$row['id']."'>Добавить новую запись</a></button>";
}
            
 
            echo "<div class='CATEGORII'>";
            while($row = mysqli_fetch_array($result))
            {
                echo "<div class='col-sm-12 col-md-6 col-lg-6 '>";
                   echo "<div class='Tovar'>";
                   echo "<h3>".$row['Base_N_Brand']."<h3>";
                 echo "<div class='Tovarin'>";

                  echo "<div class='Photo'>";
                    echo "<img src=".$row['image'].">";
                 echo "</div>"; 
                 echo "<div class='TextIN'>";

                    echo "<p>"."Тип: " . $row['Type3_name'] . "</p>";
                    
                    echo "<p>"."Предназначен: " . $row['Intend_name'] . "</p>";
                    
                    echo "<p>" ."Максимальное давление: ". $row['Max_pressure_name'] . "</p>";
                    
                    echo "<p>"."Максимальная температура: " . $row['Max_t_name'] . "</p>";

                    echo "<p>"."Длина (м): " . $row['Length_name'] . "</p>";

                    echo "<p>"."Цена: " . $row['Base_N_Price'] . "</p>";
                if (($role_id === "1") OR ($role_id === "2")){
                      echo "<button class ='btn btn-outline-success my-2 my-sm-0' type='button'><a href='update_acs_wash.php?id_A=".$row['id_A']."' style=''>Изменить</a></button>";
                      //echo "<button class ='btn btn-outline-success my-2 my-sm-0' type='button' onclick='window.location.href='Shop.php''>Изменить</button>";
                      //echo "<button class ='btn btn-outline-success my-2 my-sm-0' type='button' style='margin-left: 5px;'>Удалить</button>";
                     if ($role_id === "2"){
                      echo "<td><button class ='btn btn-outline-success my-2 my-sm-0' type='button' style='margin-left: 5px;'><a href='delete_acs_wash.php?id_A=".$row['id_A']."&name_A=".$row['Base_N_Brand']."'>Удалить</a></button></td>";
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