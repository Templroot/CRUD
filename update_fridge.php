<?php
session_start();
$role_id = $_SESSION["role_id"];
// Include config file
require_once "login_config.php";
if(($role_id != '1') && ($role_id != '2')){
    // запоминаем ошибку для отображения в файле CRUD_error.php
    $_SESSION["crud_error"] = "Недостаточно прав для изменения данных!!!";
    header("location: CRUD_error.php");
    exit;
}


$VR_Base_F_name = $VR_Base_F_Brand = $VR_Base_F_Volume  = $VR_Base_F_Defrosting = $VR_Base_F_Energy = $VR_Base_F_Size = $VR_Base_F_Color = $VR_Base_F_price = $image = "";
$VR_Base_F_name_err = $VR_Base_F_Brand_err = $VR_Base_F_Volume_err  = $VR_Base_F_Defrosting_err = $VR_Base_F_Energy_err = $VR_Base_F_Size_err = $VR_Base_F_Color_err = $VR_Base_F_price_err = $image_err = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"]))
{
    // Get hidden input value
    //--------------------------------
    $id = $_POST["id"];
    //--------------------------------
    
    //Проверяем введенное название
    $input_VR_Base_F_name = trim($_POST["VR_Base_F_name"]);
    if(empty($input_VR_Base_F_name))//если поле пустое
    {
        $VR_Base_F_name_err = "Пожалуйста, введите наименование товара";//записываем ошибку
    }
    else
    {
        $VR_Base_F_name = $input_VR_Base_F_name;
    }


    //Проверяем название бренда
    $input_VR_Base_F_Brand = trim($_POST["VR_Base_F_Brand"]);
    if($input_VR_Base_F_Brand == "")//если поле пустое
    {
        $VR_Base_F_Brand_err = "Пожалуйста, укажите бренд";//записываем ошибку
    }
    else
    {
        $VR_Base_F_Brand = $input_VR_Base_F_Brand;
    }



    //Проверяем объем
    $input_VR_Base_F_Volume = trim($_POST["VR_Base_F_Volume"]);
    if(empty($input_VR_Base_F_Volume))//если поле пустое
    {
        $VR_Base_F_Volume_err = "Пожалуйста, введите объем";//записываем ошибку
    }
    elseif(!filter_var($input_VR_Base_F_Volume, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+$/"))))//можно вводить только цифры
    {
        $VR_Base_F_Volume_err = "Введите корректные данные";//записываем ошибку
    }
    else
    {
        $VR_Base_F_Volume = $input_VR_Base_F_Volume;
    }



    //Проверяем тип разморозки
    $input_VR_Base_F_Defrosting = trim($_POST["VR_Base_F_Defrosting"]);
    if($input_VR_Base_F_Defrosting == "")//если поле пустое
    {
        $VR_Base_F_Defrosting_err = "Пожалуйста,введите тип разморозки";//записываем ошибку
    }
    else
    {
        $VR_Base_F_Defrosting = $input_VR_Base_F_Defrosting;
    }



    // Validate VR_Base_F_Energy (проверяем энергопотребление)
    $input_VR_Base_F_Energy = trim($_POST["VR_Base_F_Energy"]);
    if(empty($input_VR_Base_F_Energy))//если поле пустое
    {
        $VR_Base_F_Energy_err = "Пожалуйста, введите энергопотребление";//записываем ошибку
    }
    elseif(!filter_var($input_VR_Base_F_Energy, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+$/"))))//можно вводить только цифры
    {
        $VR_Base_F_Energy_err = "Введите корректные данные";//записываем ошибку
    } 
    else
    {
        $VR_Base_F_Energy = $input_VR_Base_F_Energy;
    }


    // Validate VR_Base_F_Size (проверяем размеры)
    $input_VR_Base_F_Size = trim($_POST["VR_Base_F_Size"]);
    if(empty($input_VR_Base_F_Size))//если поле пустое
    {
        $VR_Base_F_Size_err = "Пожалуйста, введите размеры";//записываем ошибку
    }
    else
    {
        $VR_Base_F_Size = $input_VR_Base_F_Size;
    }
    

    // Validate VR_Base_F_Color (проверяем цвет)
    $input_VR_Base_F_Color = trim($_POST["VR_Base_F_Color"]);
    if($input_VR_Base_F_Color == "")//если поле пустое
    {
        $VR_Base_F_Color_err = "Пожалуйста, укажите цвет";//записываем ошибку
    }
    else
    {
        $VR_Base_F_Color = $input_VR_Base_F_Color;
    }


    // Validate VR_Base_F_price (проверяем цену)
    $input_VR_Base_F_price = trim($_POST["VR_Base_F_price"]);
    if(empty($input_VR_Base_F_price))//если поле пустое
    {
        $VR_Base_F_price_err = "Пожалуйста, введите цену";//записываем ошибку
    }
    elseif(!filter_var($input_VR_Base_F_price, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+\.?[0-9]*$/"))))//указываем формат ввода цены
    {
        $VR_Base_F_price_err = "Введите корректные данные";//записываем ошибку
    } 
    else
    {
        $VR_Base_F_price = $input_VR_Base_F_price;
    }
    // Validate image (проверяем изображение)
    $input_image = trim($_POST["image"]);
    if(empty($input_image))//если поле пустое
    {
        $image_err = "Пожалуйста,введите ссылку на изображение";//записываем ошибку
    }
    else
    {
        $image = $input_image;
    }


    // Check input errors before inserting in database
    if(empty($VR_Base_F_name_err) && empty($VR_Base_F_Brand_err) && empty($VR_Base_F_Volume_err) && empty($VR_Base_F_Defrosting_err) && empty($VR_Base_F_Energy_err) && empty($VR_Base_F_Size_err) && empty($VR_Base_F_Color_err) && empty($VR_Base_F_price_err) && empty($image_err))
    {
        // Prepare an update statement
        $sql = "UPDATE VR_Base_fridge SET  VR_Base_F_name=?, VR_Base_F_Brand=?, VR_Base_F_Volume=?, VR_Base_F_Defrosting=?, VR_Base_F_Energy=?, VR_Base_F_Size=?, VR_Base_F_Color=?, VR_Base_F_price=?, image=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters

            
// Set parameters (запоминаем параметры)
            $param_VR_Base_F_name = $VR_Base_F_name;
            $param_VR_Base_F_Brand = $VR_Base_F_Brand;
            $param_VR_Base_F_Volume = $VR_Base_F_Volume;
            $param_VR_Base_F_Defrosting = $VR_Base_F_Defrosting;
            $param_VR_Base_F_Energy = $VR_Base_F_Energy;
            $param_VR_Base_F_Size = $VR_Base_F_Size;
            $param_VR_Base_F_Color= $VR_Base_F_Color;
            $param_VR_Base_F_price= $VR_Base_F_price;
            $param_image = $image;


            mysqli_stmt_bind_param($stmt, "ssssssssss", $param_VR_Base_F_name, $param_VR_Base_F_Brand, $param_VR_Base_F_Volume, $param_VR_Base_F_Defrosting, $param_VR_Base_F_Energy, $param_VR_Base_F_Size, $param_VR_Base_F_Color, $param_VR_Base_F_price, $image, $id);
            
            
            // Attempt to execute the prepared statement
            $result = mysqli_stmt_execute($stmt);

            //var_dump(mysqli_query($stmt));
            //mysqli_stmt_error_list($stmt);
            //var_dump(mysqli_stmt_error_list($stmt));
            if($result)
            {   
                // Records updated successfully. Redirect to landing page
                header("location: Gallary_Fridge.php");
                exit();
            } 
            else
            {

                echo "Что-то пошло не так. Повторите попытку позже.";
            }
        }
         
    }
    
} 
else
{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM VR_Base_fridge WHERE id=?";
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1)
                {
                    // Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop 
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $VR_Base_F_name = $row["VR_Base_F_name"];
                    $VR_Base_F_Brand = $row["VR_Base_Brand_name"];
                    $VR_Base_F_Volume = $row["VR_Base_F_Volume"];
                    $VR_Base_F_Defrosting = $row["VR_Base_F_Defrosting"];
                    $VR_Base_F_Energy = $row["VR_Base_F_Energy"];
                    $VR_Base_F_Size = $row["VR_Base_F_Size"];
                    $VR_Base_F_Color = $row["VR_Base_F_Color"];
                    $VR_Base_F_price = $row["VR_Base_F_price"];
                    $image = $row["image"];
                } 
                else
                {
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: CRUD_error.php");
                    exit();
                }
                
            } 
            else
            {
                echo "Что-то пошло не так. Повторите попытку позже.";
            }
        }
        
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
    <title>Редактирование записи</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel='stylesheet' href='CSS_FOR_CREATE_AND_UPDATE.css'/><!--Подключаем стили-->
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
                <span class="heading">Редактирование холодильника</span>

                    <div class="form-group <?php echo (!empty($VR_Base_F_name_err)) ? 'has-error' : ''; ?>">
                        <label>Название</label>
                        <input type="text" name="VR_Base_F_name" class="form-control" value="<?php echo $VR_Base_F_name; ?>">
                        <span class="help-block"><?php echo $VR_Base_F_name_err;?></span>
                        <span class="help-block"><?php echo $user_err;?></span>
                    </div>

                    <div class="form-group <?php echo (!empty($VR_Base_F_Brand_err)) ? 'has-error' : ''; ?>">
                        <label>Производитель</label>
                        <select class="form-control" name="VR_Base_F_Brand">;
                        <?php
                        $result_spisok = mysqli_query($link,"SELECT * FROM VR_Base_Brand");//выгружаем значения из таблицы 
                        while($row_spisok = mysqli_fetch_array($result_spisok)){
                        echo '<option value="'.$row_spisok['VR_Base_Brand_id'].'">' . $row_spisok['VR_Base_Brand_name']. '</option>';//заполняем значениями выпадающий список                       
                        }
                        ?>
                        </select>
                    </div>

                    <div class="form-group <?php echo (!empty($VR_Base_F_Volume_err)) ? 'has-error' : ''; ?>">
                        <label>Объем</label>
                        <input type="text" name="VR_Base_F_Volume" class="form-control" value="<?php echo $VR_Base_F_Volume; ?>">
                        <span class="help-block"><?php echo $VR_Base_F_Volume_err;?></span>
                    </div>


                    <div class="form-group <?php echo (!empty($VR_Base_F_Defrosting_err)) ? 'has-error' : ''; ?>">
                        <label>Тип разморозки</label>
                        <select class="form-control" name="VR_Base_F_Defrosting">;
                        <?php
                        $result_defrosting = mysqli_query($link,"SELECT * FROM VR_Base_Defrosting");//выгружаем значения из таблицы 
                        while($row_defrosting = mysqli_fetch_array($result_defrosting)){
                        echo '<option value="'.$row_defrosting['VR_Base_Defrosting_id'].'">' . $row_defrosting['VR_Base_Defrosting_name']. '</option>';//заполняем значениями выпадающий список                       
                        }
                        ?>
                        </select>
                    </div>

                    <div class="form-group <?php echo (!empty($VR_Base_F_Energy_err)) ? 'has-error' : ''; ?>">
                        <label>Энергопотребление</label>
                        <input type="text" name="VR_Base_F_Energy" class="form-control" value="<?php echo $VR_Base_F_Energy; ?>">
                        <span class="help-block"><?php echo $VR_Base_F_Energy_err;?></span>
                    </div>

                    <div class="form-group <?php echo (!empty($VR_Base_F_Size_err)) ? 'has-error' : ''; ?>">
                        <label>Размеры</label>
                        <input type="text" name="VR_Base_F_Size" class="form-control" value="<?php echo $VR_Base_F_Size; ?>">
                        <span class="help-block"><?php echo $VR_Base_F_Size_err;?></span>
                    </div>

                    <div class="form-group <?php echo (!empty($VR_Base_F_Color_err)) ? 'has-error' : ''; ?>">
                        <label>Цвет</label>
                        <select class="form-control" name="VR_Base_F_Color">;
                        <?php
                        $result_color = mysqli_query($link,"SELECT * FROM VR_Base_Color");//выгружаем значения из таблицы 
                        while($row_color = mysqli_fetch_array($result_color)){
                        echo '<option value="'.$row_color['VR_Base_Color_id'].'">' . $row_color['VR_Base_Color_name']. '</option>';//заполняем значениями выпадающий список                       
                        }
                        ?>
                        </select>
                    </div>

                    <div class="form-group <?php echo (!empty($VR_Base_F_price_err)) ? 'has-error' : ''; ?>">
                        <label>Цена</label>
                        <input type="text" name="VR_Base_F_price" class="form-control" value="<?php echo $VR_Base_F_price; ?>">
                        <span class="help-block"><?php echo $VR_Base_F_price_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
                        <label>Ссылка на картинку</label>
                        <input type="text" name="image" class="form-control" value="<?php echo $image; ?>">
                        <span class="help-block"><?php echo $image_err;?></span>
                    </div>

                    <div class="form-group">
                         <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                         <input type="submit" class="btn btn-default btn-lg btn-block" value="Изменить">
                         <input type="button" class="btn btn-default btn-lg btn-block"  value="Назад" onclick="window.location.href = 'Gallary_Fridge.php';">
                    </div>
                </form>
            </div>
        </div>        
    </div>
</body>
</html>