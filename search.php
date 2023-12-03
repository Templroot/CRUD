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

<script>
$('.dropdown-toggle').click(function(e) {
 if ($(document).width() > 768) {
 e.preventDefault();
 var url = $(this).attr('href'); 
 if (url !== '#') { 
 window.location.href = url;
 }
 }
});
</script>
</html>
<?php
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
//текст запроса записываем в $search_get
$search_get=$_GET["search"];

//запрос для поиска введенного значения в таблице газовых плит
        $sql_gplit = "SELECT 
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
                        AND Gaz_Plit.T_Gaz_Tip = Tip_Podzig.Tip_id
                        AND Gaz_Plit.T_Gaz_Name LIKE '%$search_get%'";
                        
//запрос для поиска введенного значения в таблице электрических плит
          $sql_eplit = "SELECT 
          E_Plit.id_E,
             E_Plit.T_E_Name, 
                       Brand_V_Plit.Brand_name, 
                       Razmer.RazmerCM, 
                       Color.Color_name, 
                       E_Plit.T_E_Fun, 
                       Kol_Vo_Komforok.Komfork_name, 
                       EKlass.EKlass_name,
                       E_Plit.T_E_prise,
                       E_Plit.image
                FROM   E_Plit,Brand_V_Plit,Razmer,Color,Kol_Vo_Komforok,EKlass  
                WHERE  E_Plit.T_E_Proizvod = Brand_V_Plit.Brand_id 
                        AND E_Plit.T_E_size = Razmer.Razmer_id 
                        AND E_Plit.T_E_Color = Color.Color_id 
                        AND E_Plit.T_E_Kol_vo_Komf = Kol_Vo_Komforok.Komfork_id 
                        AND E_Plit.T_E_Klass = EKlass.EKlass_id
                        AND E_Plit.T_E_Name LIKE '%$search_get%' ";
//запрос для поиска введенного значения в таблице аксессуаров для плит
$sql_A_plit="SELECT 
                  Accessories.id_A,
                  Accessories.T_A_name,
                    Tip_Plit.Tip_Plit_name,
                    Accessories.T_A_fun,
                    Accessories.image
                 FROM  Accessories,Tip_Plit 
                WHERE Accessories.T_A_tip=Tip_Plit.Tip_Plit_id
                AND Accessories.T_A_name LIKE '%$search_get%'";
                
//запрос для поиска введенного значения в таблице холодильников
          $sql_fridge = "SELECT VR_Base_fridge.id, 
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
                            AND VR_Base_fridge.VR_Base_F_Color = VR_Base_Color.VR_Base_Color_id 
                            AND VR_Base_fridge.VR_Base_F_name LIKE '%$search_get%'";
//запрос для поиска введенного значения в таблице морозильников
          $sql_moroz = "SELECT 
                           MR_Base_Moroz.id,
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
                    WHERE MR_Base_Moroz.MR_Base_M_Brand = MR_Base_Brand.MR_Base_Brand_id AND MR_Base_Moroz.MR_Base_M_Type = MR_Base_Type.MR_Base_Type_id AND MR_Base_Moroz.MR_Base_M_Defrosting = MR_Base_Defrosting.MR_Base_Defrosting_id AND MR_Base_Moroz.MR_Base_M_name LIKE '$search_get%'"; 
//запрос для поиска введенного значения в таблице аксессуаров
          $sql_acs_fm = "SELECT 
                           MR_Base_Acs.id,
                           MR_Base_Acs.MR_Base_Acs_name, 
                           MR_Base_User.MR_Base_User_name, 
                           MR_Base_Acs.MR_Base_Acs_disc, 
                           MR_Base_Acs.MR_Base_Acs_price,
                           MR_Base_Acs.image 
                    FROM MR_Base_Acs, MR_Base_User
                    WHERE MR_Base_Acs.MR_Base_Acs_userr = MR_Base_User.MR_Base_User_id AND MR_Base_Acs.MR_Base_Acs_name LIKE '$search_get%'";  
//запрос для поиска введенного значения в таблице стиральных машин
          $sql_washer = "SELECT DB_Washer.Base_D_Brand, 
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
                        AND DB_Washer.Base_D_Speed = Speed.Speed_id AND DB_Washer.Base_D_Brand LIKE '$search_get%'";
                        
//запрос для поиска введенного значения в таблице посудомоечных машин
          $sql_dishwasher = "SELECT DB_Dishwasher.Base_M_Brand, 
                       Type_size.Type2_name, 
                       Type_Drying.Type_Drying_name, 
                       Width_Type.id_Type, 
                       Kolvo.Kolvo_name, 
                       Water.Water_name, 
                       DB_Dishwasher.Base_M_price,
                       DB_Dishwasher.image
                FROM   DB_Dishwasher, Type_size, Type_Drying, Width_Type, Kolvo,Water  
                WHERE  DB_Dishwasher.Base_M_Type = Type_size.Type2_id 
                        AND DB_Dishwasher.Base_M_Drying_Type = Type_Drying.Type_Drying_id 
                        AND DB_Dishwasher.Base_M_Width = Width_Type.id_Width 
                        AND DB_Dishwasher.Base_M_Kolvo = Kolvo.Kolvo_id
                        AND DB_Dishwasher.Base_M_Water = Water.Water_id AND DB_Dishwasher.Base_M_Brand LIKE '$search_get%'";
                       
 
   if(($result_gplit = mysqli_query($link, $sql_gplit)) && ($result_eplit = mysqli_query($link, $sql_eplit))&&($result_A_plit = mysqli_query($link, $sql_A_plit)) && ($result_fridge = mysqli_query($link, $sql_fridge)) && ($result_moroz = mysqli_query($link, $sql_moroz)) && ($result_acs_fm = mysqli_query($link, $sql_acs_fm))  && ($result_washer = mysqli_query($link, $sql_washer)) && ($result_dishwasher = mysqli_query($link, $sql_dishwasher)))
    //&& ($result_moroz = mysqli_query($link, $sql_acs_plit)) && ($result_moroz = mysqli_query($link, $sql_hose))
        {   // если запрос выполнен, заполняем таблицу!!
          //если запрос найден в таблице
          //газовых плит
          if(mysqli_num_rows($result_gplit) > 0)
        { 
            echo "<head>";
            echo "<link rel='stylesheet' href='CSS_FOR_READ.css'/>";//подключаем файл css
            echo "<link rel='stylesheet' href='https://unpkg.com/flexboxgrid2@7.2.1/flexboxgrid2.min.css'/>";
            echo "</head>";
             echo "<hr>";
        echo "<div class='zag_razdela'>";
        echo "<h1> Газовые плиты</h1>";
        echo "</div>";
          echo "<hr>";
        echo "<div class='CATEGORII'>";
            while($row = mysqli_fetch_array($result_gplit))//вывод данных из таблицы
            {
                echo "<div class='col-sm-12 col-md-6 col-lg-6 '>";
                   echo "<div class='Tovar'>";
                   echo "<h3>".$row['T_Gaz_Name']."<h3>";
                 echo "<div class='Tovarin'>";

                  echo "<div class='Photo'>";
                    echo "<img src=".$row['image'].">";
                 echo "</div>"; 
                 echo "<div class='TextIN'>";
                    echo "<p>"."Прозводитель: " . $row['Brand_name'] . "</p>";
                    echo "<p>" ."Размер: ". $row['RazmerCM'] . "</p>";
                    echo "<p>"."Цвет: "  . $row['Color_name'] . "</p>";
                    echo "<p>" . $row['T_Gaz_Fun'] . "</p>";
                    echo "<p>"."Количество комфорок: " . $row['Komfork_name'] . "</p>";
                    echo "<p>"."Электроподжиг: " . $row['Tip_name'] . "</p>";
               echo "</div>"; 
               echo "</div>"; 
                //если модератор или админ
                if (($role_id === "1") OR ($role_id === "2")){
                    //вывести кнопку Изменить
                      echo "<button class ='btn btn-outline-success my-2 my-sm-0' type='button'><a href='update_G_plit.php?id_G=".$row['id_G']."' style=''>Изменить</a></button>";
                      //если админ
                      if ($role_id === "2"){
                          //вывести кнопку удалить
                       echo "<td><button class ='btn btn-outline-success my-2 my-sm-0' type='button' style='margin-left: 5px;'><a href='delete_G_plit.php?id_G=".$row['id_G']."' style=''>Удалить</a></button></td>";
                       }
                    }
                 echo "</div>"; 
            echo "</div>"; 
            }
            echo "</div>";                            
        }
        //если запрос найден в таблице
          //электрических плит
        if (mysqli_num_rows($result_eplit) > 0) {
          echo "<head>";
            echo "<link rel='stylesheet' href='CSS_FOR_READ.css'/>";
            echo "<link rel='stylesheet' href='https://unpkg.com/flexboxgrid2@7.2.1/flexboxgrid2.min.css'/>";
            echo "</head>";
             echo "<hr>";
        echo "<div class='zag_razdela'>";
        echo "<h1> Электрические плиты</h1>";
        echo "</div>";
          echo "<hr>";
        echo "<div class='CATEGORII'>";
            while($row = mysqli_fetch_array($result_eplit))//вывод данных из таблицы
            {
                echo "<div class='col-sm-12 col-md-6 col-lg-6 '>";
                   echo "<div class='Tovar'>";
                   echo "<h3>".$row['T_E_Name']."<h3>";
                 echo "<div class='Tovarin'>";
                  echo "<div class='Photo'>";
                    echo "<img src=".$row['image'].">";
                 echo "</div>"; 
                 echo "<div class='TextIN'>";
                    echo "<p>"."Прозводитель: " . $row['Brand_name'] . "</p>";
                    echo "<p>" ."Размер: ". $row['RazmerCM'] . "</p>";
                    echo "<p>"."Цвет: "  . $row['Color_name'] . "</p>";
                    echo "<p>" . $row['T_Gaz_Fun'] . "</p>";
                    echo "<p>"."Количество комфорок: " . $row['Komfork_name'] . "</p>";
                    echo "<p>"."Класс электросбережения: " . $row['EKlass_name'] . "</p>";
               echo "</div>"; 
               echo "</div>"; 
                //если модератор или админ
                if (($role_id === "1") OR ($role_id === "2")){
                    //вывести кнопку изменить
                      echo "<button class ='btn btn-outline-success my-2 my-sm-0' type='button'><a href='update_E_plit.php?id_E=".$row['id_E']."' style=''>Изменить</a></button>";
                      //если админ
                      if ($role_id === "2"){
                          //вывести кнопку удалить
                       echo "<td><button class ='btn btn-outline-success my-2 my-sm-0' type='button' style='margin-left: 5px;'><a href='delete_E_plit.php?id_E=".$row['id_E']."' style=''>Удалить</a></button></td>";
                       }
                    }
                 echo "</div>"; 
                  echo "</div>"; 
            }
            echo "</div>"; 
        }
        //если запрос найден в таблице
          //аксессуаров для плит
         if (mysqli_num_rows($result_A_plit) > 0) {
          echo "<head>";
            echo "<link rel='stylesheet' href='CSS_FOR_READ.css'/>";
            echo "<link rel='stylesheet' href='https://unpkg.com/flexboxgrid2@7.2.1/flexboxgrid2.min.css'/>";
            echo "</head>";
             echo "<hr>";
        echo "<div class='zag_razdela'>";
        echo "<h1> Аксессуары к плитам</h1>";
        echo "</div>";
          echo "<hr>";
         echo "<div class='CATEGORII'>";
            while($row = mysqli_fetch_array($result_A_plit))//вывод данных из таблицы
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
               echo "</div>"; 
               echo "</div>"; 
               //если модератор или админ
                  if (($role_id === "1") OR ($role_id === "2")){
                      //вывести кнопку изменить
                      echo "<button class ='btn btn-outline-success my-2 my-sm-0' type='button'><a href='update_A_plit.php?id_A=".$row['id_A']."' style=''>Изменить</a></button>";
                      //если админ
                      if ($role_id === "2"){
                          //вывести кнопку удалить
                       echo "<td><button class ='btn btn-outline-success my-2 my-sm-0' type='button' style='margin-left: 5px;'><a href='delete_A_plit.php?id_A=".$row['id_A']."' style=''>Удалить</a></button></td>";
                       }
                    }
                 echo "</div>"; 
            echo "</div>"; 
            }
            echo "</div>";                            
          }
        //если запрос найден в таблице
          //холодильников
        if (mysqli_num_rows($result_fridge) > 0) {
          echo "<head>";
            echo "<link rel='stylesheet' href='CSS_FOR_READ.css'/>";
            echo "<link rel='stylesheet' href='https://unpkg.com/flexboxgrid2@7.2.1/flexboxgrid2.min.css'/>";
            echo "</head>";
             echo "<hr>";
        echo "<div class='zag_razdela'>";
        echo "<h1> Холодильники </h1>";
        echo "</div>";
          echo "<hr>";
        echo "<div class='CATEGORII'>";
            while($row = mysqli_fetch_array($result_fridge))//вывод данных из таблицы
            {
                echo "<div class='col-sm-12 col-md-6 col-lg-6 '>";
                   echo "<div class='Tovar'>";
                   echo "<h3>".$row['VR_Base_F_name']."</h3>";
                 echo "<div class='Tovarin'>";
                  echo "<div class='Photo'>";
                    echo "<img src=".$row['image'].">";
                 echo "</div>"; 
                 echo "<div class='TextIN'>";
                    echo "<p>"."Прозводитель: " . $row['VR_Base_Brand_name'] . "</p>";
                    echo "<p>" ."Объем(л): ". $row['VR_Base_F_Volume'] . "</p>";
                    echo "<p>"."Размер: ". $row['VR_Base_F_Size'] . "</p>";
                    echo "<p>"."Энергопотребление: ". $row['VR_Base_F_Energy'] . "</p>";
                    echo "<p>"."Тип разморозки: "  . $row['VR_Base_Defrosting_name'] . "</p>";
                    echo "<p>"."Цвет: " . $row['VR_Base_Color_name'] . "</p>";
                    echo "<p>"."Цена: " . $row['VR_Base_F_price'] . "</p>";
                    //если модератор или админ
                    if (($role_id === "1") OR ($role_id === "2")){
                        //вывести кнопку изменить
                      echo "<button class ='btn btn-outline-info my-2 my-sm-0' type='button'><a href='update_fridge.php?id=".$row['id']."' style=''>Изменить</a></button>";
                      //если админ
                    if ($role_id === "2")
                    //вывести кнопку удалить
                      echo "<td><button class ='btn btn-outline-info my-2 my-sm-0' type='button' style='margin-left: 5px;'><a href='delete_fridge.php?VR_Base_F_name=".$row['VR_Base_F_name']."' style=''>Удалить</a></button></td>"; 
                    } 
               echo "</div>"; 
               echo "</div>"; 
              echo "</div>"; 
            echo "</div>"; 
            }
            echo "</div>"; 
        }
        //если запрос найден в таблице
          //морозильников
        if (mysqli_num_rows($result_moroz) > 0) {
          echo "<head>";
            echo "<link rel='stylesheet' href='CSS_FOR_READ.css'/>";
            echo "<link rel='stylesheet' href='https://unpkg.com/flexboxgrid2@7.2.1/flexboxgrid2.min.css'/>";
            echo "</head>";
 echo "<hr>";
        echo "<div class='zag_razdela'>";
        echo "<h1> Морозильники</h1>";
        echo "</div>";
          echo "<hr>";
        echo "<div class='CATEGORII'>";
            while($row = mysqli_fetch_array($result_moroz))//вывод данных из таблицы
            {
                echo "<div class='col-sm-12 col-md-6 col-lg-6 '>";
                   echo "<div class='Tovar'>";
                   echo "<h3>".$row['MR_Base_M_name']."</h3>";
                 echo "<div class='Tovarin'>";
                  echo "<div class='Photo'>";
                    echo "<img src=".$row['image'].">";
                 echo "</div>"; 
                 echo "<div class='TextIN'>";
                    echo "<p>"."Прозводитель: " . $row['MR_Base_Brand_name'] . "</p>";
                    echo "<p>" ."Тип: ". $row['MR_Base_Type_name'] . "</p>";
                    echo "<p>"."Объем(л): ". $row['MR_Base_M_Volume'] . "</p>";
                    echo "<p>"."Тип разморозки: "  . $row['MR_Base_Defrosting_name'] . "</p>";
                    echo "<p>"."Энергопотребление: ". $row['MR_Base_M_Energy'] . "</p>";
                    echo "<p>"."Размер: " . $row['MR_Base_M_Size'] . "</p>";
                    echo "<p>"."Цена: " . $row['MR_Base_M_price'] . "</p>";
                    //если модератор или админ
                    if (($role_id === "1") OR ($role_id === "2")){
                        //вывести кнопку изменить
                      echo "<button class ='btn btn-outline-info my-2 my-sm-0' type='button'><a href='update_moroz.php?id=".$row['id']."' style=''>Изменить</a></button>";
                      //если админ
                      if ($role_id === "2"){
                          //вывести кнопку удалить
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
        //если запрос найден в таблице
          //аксессуаров для холодильников и морозилников
        if (mysqli_num_rows($result_acs_fm) > 0) {
          echo "<head>";
            echo "<link rel='stylesheet' href='CSS_FOR_READ.css'/>";
            echo "<link rel='stylesheet' href='https://unpkg.com/flexboxgrid2@7.2.1/flexboxgrid2.min.css'/>";
            echo "</head>";
             echo "<hr>";
        echo "<div class='zag_razdela'>";
        echo "<h1> Аксессуары к плитам и холодильникам</h1>";
        echo "</div>";
          echo "<hr>";
        echo "<div class='CATEGORII'>";
            while($row = mysqli_fetch_array($result_acs_fm))//вывод данных из таблицы
            {
                echo "<div class='col-sm-12 col-md-6 col-lg-6 '>";
                   echo "<div class='Tovar'>";
                   echo "<h3>".$row['MR_Base_Acs_name']."</h3>";
                 echo "<div class='Tovarin'>";
                  echo "<div class='Photo'>";
                    echo "<img src=".$row['image'].">";
                 echo "</div>"; 
                 echo "<div class='TextIN'>";
                    echo "<p>"."Совместимость: " . $row['MR_Base_User_name'] . "</p>";
                    echo "<p>" ."Описание: ". $row['MR_Base_Acs_disc'] . "</p>";
                    echo "<p>"."Цена: " . $row['MR_Base_Acs_price'] . "</p>";
                    //если модератор или админ
                    if (($role_id === "1") OR ($role_id === "2")){
                        //вывести кнопку изменить
                      echo "<button class ='btn btn-outline-info my-2 my-sm-0' type='button'><a href='update_acs_fm.php?id=".$row['id']."' style=''>Изменить</a></button>";
                      //если админ
                      if ($role_id === "2") {
                          //вывести кнопку удалить
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
        //если запрос найден в таблице
          //стиральных
        if (mysqli_num_rows($result_washer) > 0) {
          echo "<head>";
            echo "<link rel='stylesheet' href='CSS_FOR_READ.css'/>";
            echo "<link rel='stylesheet' href='https://unpkg.com/flexboxgrid2@7.2.1/flexboxgrid2.min.css'/>";
            echo "</head>";
 echo "<hr>";
        echo "<div class='zag_razdela'>";
        echo "<h1> Стиральные машины</h1>";
        echo "</div>";
          echo "<hr>";
        echo "<div class='CATEGORII'>";
            while($row = mysqli_fetch_array($result_washer))//вывод данных из таблицы
            {
                echo "<div class='col-sm-12 col-md-6 col-lg-6 '>";
                   echo "<div class='Tovar'>";
                   echo "<h3>".$row['Base_D_Brand']."<h3>";
                 echo "<div class='Tovarin'>";
                  echo "<div class='Photo'>";
                    echo "<img src=".$row['image'].">";
                 echo "</div>"; 
                 echo "<div class='TextIN'>";
                    echo "<p>"."Тип: " . $row['Type_name'] . "</p>";
                    echo "<p>" ."Функция сушки: ". $row['Drying_Function_name'] . "</p>";
                    echo "<p>"."Ширина: "  . $row['Width_name'] . "</p>";
                    echo "<p>"."Максимальная загрузка белья: " . $row['Max_Load_name'] . "</p>";
                    echo "<p>"." Скорость вращения (об/мин): " . $row['Speed_name'] . "</p>";
                    echo "<p>"."Цена: " . $row['Base_D_price'] . "</p>";
                echo "</div>"; 
               echo "</div>"; 
             echo "</div>"; 
            echo "</div>"; 
            }
            echo "</div>";        
        }
        //если запрос найден в таблице
          //посудомоечных
        if (mysqli_num_rows($result_dishwasher) > 0) {
          echo "<head>";
            echo "<link rel='stylesheet' href='CSS_FOR_READ.css'/>";
            echo "<link rel='stylesheet' href='https://unpkg.com/flexboxgrid2@7.2.1/flexboxgrid2.min.css'/>";
            echo "</head>";
             echo "<hr>";
        echo "<div class='zag_razdela'>";
        echo "<h1> Посудомоечные машины</h1>";
        echo "</div>";
          echo "<hr>";
        echo "<div class='CATEGORII'>";
            while($row = mysqli_fetch_array($result_dishwasher))//вывод данных из таблицы
            {
                echo "<div class='col-sm-12 col-md-6 col-lg-6 '>";
                   echo "<div class='Tovar'>";
                   echo "<h3>".$row['Base_M_Brand']."<h3>";
                 echo "<div class='Tovarin'>";
                  echo "<div class='Photo'>";
                    echo "<img src=".$row['image'].">";
                 echo "</div>"; 
                 echo "<div class='TextIN'>";
                    echo "<p>"."Тип: " . $row['Type2_name'] . "</p>";
                    echo "<p>" ."Тип сушки: ". $row['Type_Drying_name'] . "</p>";
                    echo "<p>"."Ширина: "  . $row['id_Type'] . "</p>";
                    echo "<p>"."Кол-во комплектов посуды: " . $row['Kolvo_name'] . "</p>";
                    echo "<p>"." Расход воды: " . $row['Water_name'] . "</p>";
                    echo "<p>"."Цена: " . $row['Base_M_price'] . "</p>";
                echo "</div>"; 
               echo "</div>";
                                   //если модератор или админ
                    if (($role_id === "1") OR ($role_id === "2")){
                        //вывести кнопку изменить
                      echo "<button class ='btn btn-outline-info my-2 my-sm-0' type='button'><a href='update_Dishwasher.php?id_E=".$row['id_E']."' style=''>Изменить</a></button>";
                      //если админ
                      if ($role_id === "2"){
                          //вывести кнопку удалить
                      echo "<td><button class ='btn btn-outline-info my-2 my-sm-0' type='button' style='margin-left: 5px;'><a href='delete_Dishwasher.php?id_W=".$row['id_W']."' style=''>Удалить</a></button></td>";
                       }
                    }
             echo "</div>"; 
            echo "</div>"; 
            }
            echo "</div>";          
        }
        if ((mysqli_num_rows($result_dishwasher) == 0 ) and(mysqli_num_rows($result_washer) == 0) and (mysqli_num_rows($result_acs_fm) == 0) and(mysqli_num_rows($result_moroz) == 0)and (mysqli_num_rows($result_fridge) == 0) and(mysqli_num_rows($result_A_plit) == 0) and (mysqli_num_rows($result_eplit) == 0) and (mysqli_num_rows($result_gplit) == 0))
         {
            echo "<p class='lead'><em>Не найдено ни одного товара с таким именем!</em></p>";
        }
    }
    // Close connection (закрываем соединение с базой данных)
    mysqli_close($link);?>