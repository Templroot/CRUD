<html> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
<?php
session_start(); // начинаем новую сессию

// извлекаем переменные из сессии, если были установлены
$link = $_SESSION["link"];
$username = $_SESSION["username"];
$role_id = $_SESSION["role_id"];
$role_name = $_SESSION["role_name"];
$homepage = file_get_contents('Menu.html');
echo $homepage;
// Include config file (подключаем файлы)
header('Content-Type: text/html; charset=utf-8');
                    require_once "login_config.php";
                    //sql запрос в бд
        $sql = "SELECT 
                       Gaz_Plit.id_G,
					   Gaz_Plit.T_Gaz_Name, 
                       Brand_V_Plit.Brand_name, 
                       Razmer.RazmerCM, 
                       Color.Color_name, 
                       Gaz_Plit.T_Gaz_Fun, 
                       Kol_Vo_Komforok.Komfork_name, 
                       Tip_Podzig.Tip_name,
                       Gaz_Plit.T_Gaz_prise,
                       Gaz_Plit.image
                       
                FROM   Gaz_Plit,Brand_V_Plit, Razmer, Color, Kol_Vo_Komforok,Tip_Podzig  
                
                WHERE  Gaz_Plit.T_Gaz_Proizvod = Brand_V_Plit.Brand_id 
                        AND Gaz_Plit.T_Gaz_size = Razmer.Razmer_id 
                        AND Gaz_Plit.T_Gaz_Color = Color.Color_id 
                        AND Gaz_Plit.T_Gaz_Kol_vo_Komf = Kol_Vo_Komforok.Komfork_id 
                        AND Gaz_Plit.T_Gaz_Tip = Tip_Podzig.Tip_id";
 
   if($result = mysqli_query($link, $sql))
        {   // если запрос выполнен, заполняем таблицу!!
          if(mysqli_num_rows($result) > 0)
        { 
            echo "<head>";
            echo "<link rel='stylesheet' href='CSS_FOR_READ.css'/>";
            echo "<link rel='stylesheet' href='https://unpkg.com/flexboxgrid2@7.2.1/flexboxgrid2.min.css'/>";
            echo "</head>";
              echo "<div class='zag_razdela'>";
        echo "<h1> Газовые плиты </h1>";
        echo "</div>";
        // вывод кнопки для модератора и администратора 
             if (($role_id === "1") OR ($role_id === "2")){
                      echo "<button class ='btn btn-outline-success my-2 my-sm-0' type='button'><a href='Create_G_plit.php'>Добавить новую запись</a></button>";
                    
                    
}
// Вывод плит на страницу
echo "<div class='CATEGORII'>";
            while($row = mysqli_fetch_array($result))
            {
                // flexgrid Для адаптации 
                echo "<div class='col-sm-12 col-md-6 col-lg-6 '>";
                
                   echo "<div class='Tovar'>";
                   echo "<h3>".$row['T_Gaz_Name']."<h3>";
                 echo "<div class='Tovarin'>";
              // фото в блоке
                  echo "<div class='Photo'>";
                    echo "<img src=".$row['image'].">";
                 echo "</div>"; 
                //  текст в блоке
                 echo "<div class='TextIN'>";

                    echo "<p>"."Прозводитель: " . $row['Brand_name'] . "</p>";
                    
                    echo "<p>" ."Размер: ". $row['RazmerCM'] . "</p>";
                    
                    echo "<p>"."Цвет: "  . $row['Color_name'] . "</p>";
                    
                    echo "<p>" . $row['T_Gaz_Fun'] . "</p>";
                    
                    echo "<p>"."Количество комфорок: " . $row['Komfork_name'] . "</p>";

                    echo "<p>"."Электро поджог: " . $row['Tip_name'] . "</p>";
                    echo "<p>"."Цена: " . $row['T_Gaz_prise'] ."₽"."</p>";
               echo "</div>"; 
               echo "</div>"; 
            //   кнопки для модератора и администратора 
if (($role_id === "1") OR ($role_id === "2")){
                      echo "<button class ='btn btn-outline-success my-2 my-sm-0' type='button'><a href='update_G_plit.php?id_G=".$row['id_G']."'>Изменить</a></button>";
// кнопка только для администатора 
                      if ($role_id === "2"){
                      echo "<td><button class ='btn btn-outline-success my-2 my-sm-0' type='button' style='margin-left: 5px;'><a href='delete_G_plit.php?id_G=".$row['id_G']."&name_G=".$row['T_Gaz_Name']."'>Удалить</a></button></td>";
                      }
              }
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