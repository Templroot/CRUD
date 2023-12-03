<html> 

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
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
         $sql = "SELECT 
        
        Accessories.id_A,
					   Accessories.T_A_name, 
                       Tip_Plit.Tip_Plit_name, 
                      Accessories.T_A_fun, 
                      Accessories.image,
                      Accessories.T_A_price
                      
                       
                FROM   Accessories,Tip_Plit  
                
                WHERE  Accessories.T_A_tip = Tip_Plit.Tip_Plit_id";
 
   if($result = mysqli_query($link, $sql))
        {   // если запрос выполнен, заполняем таблицу!!
          if(mysqli_num_rows($result) > 0)
        { 
            echo "<head>";
            echo "<link rel='stylesheet' href='CSS_FOR_READ.css'/>";
            echo "<link rel='stylesheet' href='https://unpkg.com/flexboxgrid2@7.2.1/flexboxgrid2.min.css'/>";
            echo "</head>";
             echo "<div class='zag_razdela'>";
        echo "<h1> Аксессуары  к плитам </h1>";
        echo "</div>";
 if (($role_id === "1") OR ($role_id === "2")){
                      echo "<button class ='btn btn-outline-success my-2 my-sm-0' type='button'><a href='Create_A_plit.php'>Добавить новую запись</a></button>";
                      
                    
}
        echo "<div class='CATEGORII'>";
            while($row = mysqli_fetch_array($result))
            {
                echo "<div class='col-sm-12 col-md-6 col-lg-6 '>";
                   echo "<div class='Tovar'>";
                   echo "<h3>".$row['T_A_name']."<h3>";
                 echo "<div class='Tovarin'>";

                  echo "<div class='Photo'>";
                    echo "<img src=".$row['image'].">";
                 echo "</div>"; 
                 echo "<div class='TextIN'>";

                    echo "<p>"."Описание: " . $row['T_A_fun'] . "</p>";
                    
                    echo "<p>" ."Тип: ". $row['Tip_Plit_name'] . "</p>";
                        echo "<p>" ."Тип: ". $row['T_A_price'] ."₽". "</p>";
  
               echo "</div>"; 
              
               echo "</div>"; 
                  if (($role_id === "1") OR ($role_id === "2")){
                      echo "<button class ='btn btn-outline-success my-2 my-sm-0' type='button'><a href='update_A_plit.php?id_A=".$row['id_A']."' style=''>Изменить</a></button>";
                      
                      if ($role_id === "2"){
                      echo "<td><button class ='btn btn-outline-success my-2 my-sm-0' type='button' style='margin-left: 5px;'><a href='delete_A_plit.php?id_A=".$row['id_A']."&name_A=".$row['T_A_name']."'>Удалить</a></button></td>";
                       }
                    }

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
        echo "<hr>";

    // Close connection (закрываем соединение с базой данных)
    mysqli_close($link);
?>