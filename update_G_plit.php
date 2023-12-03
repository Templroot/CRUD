<?php
session_start();

// Include config file
require_once "login_config.php";



$T_Gaz_Name = $T_Gaz_Proizvod = $T_Gaz_Fun  = $T_Gaz_Kol_vo_Komf = $T_Gaz_Tip = $T_Gaz_size = $T_Gaz_Color = $T_Gaz_prise = $image = "";
$T_Gaz_Name_err = $T_Gaz_Proizvod_err = $T_Gaz_Fun_err  = $T_Gaz_Kol_vo_Komf_err = $T_Gaz_Tip_err = $T_Gaz_size_err = $T_Gaz_Color_err = $T_Gaz_prise_err = $image_err = "";

// Processing form data when form is submitted
if(isset($_POST["id_G"]) && !empty($_POST["id_G"]))
{
    // Get hidden input value
    //--------------------------------
    $id_G = $_POST["id_G"];
    //--------------------------------
    
    //Проверяем введенное название
    $input_T_Gaz_Name = trim($_POST["T_Gaz_Name"]);
    if(empty($input_T_Gaz_Name))
    {
        $T_Gaz_Name_err = "Вы забыли ввести название";
    }
    else
    {
        $T_Gaz_Name = $input_T_Gaz_Name;
    }


    //Проверяем название бренда
    $input_T_Gaz_Proizvod = trim($_POST["T_Gaz_Proizvod"]);
    if($input_T_Gaz_Proizvod == "")
    {
        $T_Gaz_Proizvod_err = "Вы забыли выбрать производителя";
    }
    else
    {
        $T_Gaz_Proizvod = $input_T_Gaz_Proizvod;
    }



    //Проверяем объем
    $input_T_Gaz_Fun = trim($_POST["T_Gaz_Fun"]);
    if(empty($input_T_Gaz_Fun))
    {
        $T_Gaz_Fun_err = "Вы забыли написать особенности";
    }
    else
    {
        $T_Gaz_Fun = $input_T_Gaz_Fun;
    }



    //Проверяем тип разморозки
    $input_T_Gaz_Kol_vo_Komf = trim($_POST["T_Gaz_Kol_vo_Komf"]);
    if($input_T_Gaz_Kol_vo_Komf == "")
    {
        $T_Gaz_Kol_vo_Komf_err = "Вы забыли выбрать количество конфорок";
    }
    else
    {
        $T_Gaz_Kol_vo_Komf = $input_T_Gaz_Kol_vo_Komf;
    }



    // Validate T_Gaz_Tip (проверяем энергопотребление)
    $input_T_Gaz_Tip = trim($_POST["T_Gaz_Tip"]);
    if($input_T_Gaz_Tip=="")
    {
        $T_Gaz_Tip_err = "Вы забыли выбрать тип";
    }

    else
    {
        $T_Gaz_Tip = $input_T_Gaz_Tip;
    }


    // Validate T_Gaz_size (проверяем размеры)
    $input_T_Gaz_size = trim($_POST["T_Gaz_size"]);
    if($input_T_Gaz_size=="")
    {
        $T_Gaz_size_err = "Вы забыли выбрать  размер";
    }
    else
    {
        $T_Gaz_size = $input_T_Gaz_size;
    }
    

    // Validate T_Gaz_Color (проверяем цвет)
    $input_T_Gaz_Color = trim($_POST["T_Gaz_Color"]);
    if($input_T_Gaz_Color == "")
    {
        $T_Gaz_Color_err = "Вы забыли выбрать цвет";
    }
    else
    {
        $T_Gaz_Color = $input_T_Gaz_Color;
    }


    // Validate T_Gaz_prise (проверяем цену)
    $input_T_Gaz_prise = trim($_POST["T_Gaz_prise"]);
    if(empty($input_T_Gaz_prise))
    {
        $T_Gaz_prise_err = "Вы забыли указат  цену";
    }
    elseif(!filter_var($input_T_Gaz_prise, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+\.?[0-9]*$/"))))
    {
        $T_Gaz_prise_err = "Цена сосотоит из цифр, введите правльное значение";
    } 
    else
    {
        $T_Gaz_prise = $input_T_Gaz_prise;
    }
    
    // Validate image (проверяем изображение)
    $input_image = trim($_POST["image"]);
    if(empty($input_image))
    {
        $image_err = "Please enter a link.";
    }
    else
    {
        $image = $input_image;
    }


// Проверьте ошибки ввода перед вставкой в базу данных
if(empty($T_Gaz_Name_err) && empty($T_Gaz_Proizvod_err) && empty($T_Gaz_Fun_err) && empty($T_Gaz_Kol_vo_Komf_err) && empty($T_Gaz_Tip_err) && empty($T_Gaz_size_err) && empty($T_Gaz_Color_err) && empty($T_Gaz_prise_err) && empty($image_err))
    {
        echo "Второе условие прошли";
        $sql = "UPDATE Gaz_Plit SET  T_Gaz_Name=?, T_Gaz_Proizvod=?, T_Gaz_Fun=?, T_Gaz_Kol_vo_Komf=?, T_Gaz_Tip=?, T_Gaz_size=?, T_Gaz_Color=?, T_Gaz_prise=?, image=? WHERE id_G=?";
         
        if($stmt = mysqli_prepare($link, $sql))
        {

            
// Set parameters (запоминаем параметры)
            $param_T_Gaz_Name = $T_Gaz_Name;
            $param_T_Gaz_Proizvod = $T_Gaz_Proizvod;
            $param_T_Gaz_Fun = $T_Gaz_Fun;
            $param_T_Gaz_Kol_vo_Komf = $T_Gaz_Kol_vo_Komf;
            $param_T_Gaz_Tip = $T_Gaz_Tip;
            $param_T_Gaz_size = $T_Gaz_size;
            $param_T_Gaz_Color= $T_Gaz_Color;
            $param_T_Gaz_prise= $T_Gaz_prise;
            $param_image = $image;


            mysqli_stmt_bind_param($stmt, "sisiiiiisi", $param_T_Gaz_Name, $param_T_Gaz_Proizvod, $param_T_Gaz_Fun, $param_T_Gaz_Kol_vo_Komf, $param_T_Gaz_Tip, $param_T_Gaz_size, $param_T_Gaz_Color, $param_T_Gaz_prise, $image, $id_G);
            
            
            // Attempt to execute the prepared statement
            $result = mysqli_stmt_execute($stmt);

         var_dump(mysqli_query($stmt));
            //mysqli_stmt_error_list($stmt);
            var_dump(mysqli_stmt_error_list($stmt));
            if($result)
            {   

                echo "Четвертое условие прошли(148)";

                // Records updated successfully. Redirect to landing page
                header("location: Gallary_G_Plit.php");
                exit();
            } 
            else
            {

                echo "Что-то пошло не так. Пожалуйста, повторите попытку позже";
            }
        }

    }

} 
else
{
// Проверьте наличие параметра id_G перед дальнейшей обработкой
if(isset($_GET["id_G"]) && !empty(trim($_GET["id_G"]))){
        $id_G =  trim($_GET["id_G"]);
        
// Подготовка инструкции select
$sql = "SELECT * FROM Gaz_Plit WHERE id_G=?";
        if($stmt = mysqli_prepare($link, $sql))
        {
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // установка параметра 
            $param_id = $id_G;
                        if(mysqli_stmt_execute($stmt))
            {
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1)
                {
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    $T_Gaz_Name = $row["T_Gaz_Name"];
                    $T_Gaz_Proizvod = $row["T_Gaz_Proizvod"];
                    $T_Gaz_Fun = $row["T_Gaz_Fun"];
                    $T_Gaz_Kol_vo_Komf = $row["T_Gaz_Kol_vo_Komf"];
                    $T_Gaz_Tip = $row["T_Gaz_Tip"];
                    $T_Gaz_size = $row["T_Gaz_size"];
                    $T_Gaz_Color = $row["T_Gaz_Color"];
                    $T_Gaz_prise = $row["T_Gaz_prise"];
                    $image = $row["image"];
                } 
                else
                {
                    header("location: CRUD_error.php");
                    exit();
                }
                
            } 
            else
            {
                echo "Ой! Что-то пошло не так. Пожалуйста, повторите попытку позже.";
            }
        }
        
        // Закрытие соединеня 
        mysqli_stmt_close($stmt);
        

    }  
    else
    {
     
        echo "Ошибка доступа";
        exit();
    }
}
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel='stylesheet' href='CSS_FOR_CREATE_AND_UPDATE.css'/>   
     <style type="text/css">
        body
        {
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        .form-horizontal{
            max-width: 800px;
            text-align: center;
        }    </style>
</head>
<body>
        <div class="container_tovar">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <span class="heading">Редактирование газовой плиты</span>

                        <div class="form-group <?php echo (!empty($T_Gaz_Name_err)) ? 'has-error' : ''; ?>">
                            <label>Название</label>
                            <input type="text" name="T_Gaz_Name" class="form-control" value="<?php echo $T_Gaz_Name; ?>">
                            <span class="help-block"><?php echo $T_Gaz_Name_err;?></span>
                            <span class="help-block"><?php echo $user_err;?></span>
                        </div>



                        <div class="form-group <?php echo (!empty($T_Gaz_Proizvod_err)) ? 'has-error' : ''; ?>">
                            <label>Производитель</label>
                            <select class="form-control" name="T_Gaz_Proizvod">;
                            <?php
                            $result_spisok = mysqli_query($link,"SELECT * FROM Brand_V_Plit");

                            while($row_brand = mysqli_fetch_array($result_spisok)){
                            echo '<option value="'.$row_brand['Brand_id'].'">' . $row_brand['Brand_name']. '</option>';                   
                            }
                            ?>
                            </select>
                        </div>


                        <div class="form-group <?php echo (!empty($T_Gaz_size_err)) ? 'has-error' : ''; ?>">
                        <label>Размер</label>
                            <select class="form-control" name="T_Gaz_size">;
                            <?php
                            $result_size = mysqli_query($link,"SELECT * FROM Razmer");

                            while($row_size = mysqli_fetch_array($result_size)){
                            echo '<option value="'.$row_size['Razmer_id'].'">' . $row_size['RazmerCM']. '</option>';                   
                            }
                            ?>
                            </select>
                        </div>


                        <div class="form-group <?php echo (!empty($T_Gaz_Color_err)) ? 'has-error' : ''; ?>">
                            <label>Цвет</label>
                            <select class="form-control" name="T_Gaz_Color">;
                            <?php
                            $result_color = mysqli_query($link,"SELECT * FROM Color");

                            while($row_color = mysqli_fetch_array($result_color)){
                            echo '<option value="'.$row_color['Color_id'].'">' . $row_color['Color_name']. '</option>';                   
                            }
                            ?>
                            </select>
                        </div>

                        <div class="form-group <?php echo (!empty($T_Gaz_Fun_err)) ? 'has-error' : ''; ?>">
                            <label>Информация</label>
                            <input type="text" name="T_Gaz_Fun" class="form-control" value="<?php echo $T_Gaz_Fun; ?>">
                            <span class="help-block"><?php echo $T_Gaz_Fun_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($T_Gaz_Kol_vo_Komf_err)) ? 'has-error' : ''; ?>">
                            <label>Количество конфорок</label>
                            <select class="form-control" name="T_Gaz_Kol_vo_Komf">;

                            <?php
                            $result_KK = mysqli_query($link,"SELECT * FROM Kol_Vo_Komforok");

                            while($row_KK = mysqli_fetch_array($result_KK)){
                            echo '<option value="'.$row_KK['Komfork_id'].'">' . $row_KK['Komfork_name']. '</option>';                   
                            }
                            ?>
                            </select>
                        </div>

                        <div class="form-group <?php echo (!empty($T_Gaz_Tip_err)) ? 'has-error' : ''; ?>">
                            <label>Тип</label>
                            <select class="form-control" name="T_Gaz_Tip">;
                            <?php
                            $result_klass = mysqli_query($link,"SELECT * FROM Tip_Podzig");

                            while($row_klass = mysqli_fetch_array($result_klass)){
                            echo '<option value="'.$row_klass['Tip_id'].'">' . $row_klass['Tip_name']. '</option>';                   
                            }
                            ?>
                            </select>
                        </div>

                        <div class="form-group <?php echo (!empty($T_Gaz_prise_err)) ? 'has-error' : ''; ?>">
                            <label>Цена</label>
                            <input type="text" name="T_Gaz_prise" class="form-control" value="<?php echo $T_Gaz_prise; ?>">
                            <span class="help-block"><?php echo $T_Gaz_prise_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
                            <label>Ссылка на картинку</label>
                            <input type="text" name="image" class="form-control" value="<?php echo $image; ?>">
                            <span class="help-block"><?php echo $image_err;?></span>
                        </div>
                        <input type="hidden" name="id_G" value="<?php echo $id_G; ?>"/>
                        <input type="submit" class="btn btn-default btn-lg btn-block" value="Изменить">
                        <a href="Gallary_Plit.php" class="btn btn-default btn-lg btn-block">Назад</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>