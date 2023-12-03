<?php
session_start();
$role_id = $_SESSION["role_id"];
// Include config file
require_once "login_config.php";
if($role_id != '2' )  // если не админ
{   if($role_id != '1' ){  // если не модератор
    // запоминаем ошибку для отображения в файле CRUD_error.php
    $_SESSION["crud_error"] = "Недостаточно прав для изменения данных!!!";
    header("location: CRUD_error.php");
    exit;
}
}

$MR_Base_M_name = $MR_Base_M_Brand = $MR_Base_M_Type = $MR_Base_M_Volume = $MR_Base_M_Defrosting = $MR_Base_M_Energy = $MR_Base_M_Size = $MR_Base_M_price = $image = "";
$MR_Base_M_name_err = $MR_Base_M_Brand_err = $MR_Base_M_Type_err = $MR_Base_M_Volume_err = $MR_Base_M_Defrosting_err = $MR_Base_M_Energy_err = $MR_Base_M_Size_err = $MR_Base_M_price_err = $image_err =  "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"]))
{
    // Get hidden input value
    $id = $_POST["id"];

    // Validate MR_Base_M_name (проверяем наименование)
    $input_MR_Base_M_name = trim($_POST["MR_Base_M_name"]);
    if(empty($input_MR_Base_M_name))//если поле пустое
    {
        $MR_Base_M_name_err = "Пожалуйста, введите наименование морозильника";//записываем ошибку
    }
    else
    {
        $MR_Base_M_name = $input_MR_Base_M_name;//в переменную $MR_Base_M_name записываем данные из поля формы MR_Base_M_name
    }


    // Validate MR_Base_M_Brand (проверяем бренд)
    $input_MR_Base_M_Brand = trim($_POST["MR_Base_M_Brand"]);
    if($input_MR_Base_M_Brand == "")//если поле пустое
    {
        $MR_Base_M_Brand_err = "Пожалуйста, укажите бренд ";//записываем ошибку
    }
    else
    {
        $MR_Base_M_Brand = $input_MR_Base_M_Brand;//в переменную $MR_Base_M_Brand записываем данные из поля формы MR_Base_M_Brand
    }


    // Validate MR_Base_M_Type (проверяем тип)
    $input_MR_Base_M_Type = trim($_POST["MR_Base_M_Type"]);
    if($input_MR_Base_M_Type == "")//если поле пустое
    {
        $MR_Base_M_Type_err = "Пожалуйста, укажите тип ";//записываем ошибку
    }
    else
    {
        $MR_Base_M_Type = $input_MR_Base_M_Type;//в переменную $MR_Base_M_Type записываем данные из поля формы MR_Base_M_Type
    }

    // Validate MR_Base_M_Volume (проверяем объем)
    $input_MR_Base_M_Volume = trim($_POST["MR_Base_M_Volume"]);
    if(empty($input_MR_Base_M_Volume))//если поле пустое
    {
        $MR_Base_M_Volume_err = "Пожалуйста, введите объем";//записываем ошибку
    }
    elseif(!filter_var($input_MR_Base_M_Volume, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+\.?[0-9]*$/"))))//указываем формат ввода числа
    {
        $MR_Base_M_Volume_err = "Введите корректные данные";//записываем ошибку
    }
    else
    {
        $MR_Base_M_Volume = $input_MR_Base_M_Volume;//в переменную $MR_Base_M_Volume записываем данные из поля формы MR_Base_M_Volume
    }



    // Validate MR_Base_M_Defrosting (проверяем тип разморозки)
    $input_MR_Base_M_Defrosting = trim($_POST["MR_Base_M_Defrosting"]);
    if($input_MR_Base_M_Defrosting == "")//если поле пустое
    {
        $MR_Base_M_Defrosting_err = "Пожалуйста, введите тип разморозки";//записываем ошибку
    }
    else
    {
        $MR_Base_M_Defrosting = $input_MR_Base_M_Defrosting;//в переменную $MR_Base_M_Defrosting записываем данные из поля формы MR_Base_M_Defrosting
    }



    // Validate MR_Base_M_Energy (проверяем энергопотребление)
    $input_MR_Base_M_Energy = trim($_POST["MR_Base_M_Energy"]);
    if(empty($input_MR_Base_M_Energy))//если поле пустое
    {
        $MR_Base_M_Energy_err = "Пожалуйста, введите энергопотребление";//записываем ошибку
    }
    elseif(!filter_var($input_MR_Base_M_Energy, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+$/"))))//можно вводить только цифры
    {
        $MR_Base_M_Energy_err = "Введите корректные данные";//записываем ошибку
    } 
    else
    {
        $MR_Base_M_Energy = $input_MR_Base_M_Energy;//в переменную $MR_Base_M_Energy записываем данные из поля формы MR_Base_M_Energy
    }


    // Validate MR_Base_M_Size (проверяем размеры)
    $input_MR_Base_M_Size = trim($_POST["MR_Base_M_Size"]);
    if(empty($input_MR_Base_M_Size))//если поле пустое
    {
        $MR_Base_M_Size_err = "Пожалуйста, введите размеры";//записываем ошибку
    }
    else
    {
        $MR_Base_M_Size = $input_MR_Base_M_Size;//в переменную $MR_Base_M_Size записываем данные из поля формы MR_Base_M_Energy
    }
    

    // Validate MR_Base_M_price (проверяем цену)
    $input_MR_Base_M_price = trim($_POST["MR_Base_M_price"]);
    if(empty($input_MR_Base_M_price))//если поле пустое
    {
        $MR_Base_M_price_err = "Пожалуйста, введите цену";//записываем ошибку
    }
    elseif(!filter_var($input_MR_Base_M_price, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+\.?[0-9]*$/"))))//указываем формат ввода числа
    {
        $MR_Base_M_price_err = "Введите корректные данные";//записываем ошибку
    } 
    else
    {
        $MR_Base_M_price = $input_MR_Base_M_price;//в переменную $MR_Base_M_price записываем данные из поля формы MR_Base_M_price
    }
    
    // Validate image (проверяем изображение)
    $input_image = trim($_POST["image"]);
    if(empty($input_image))//если поле пустое
    {
        $image_err = "Пожалуйста, введите ссылку на изображение";//записываем ошибку
    }
    else
    {
        $image = $input_image;//в переменную $image записываем данные из поля формы image
    }

    // Проверка на наличие ошибок
    if(empty($MR_Base_M_name_err) && empty($MR_Base_M_Brand_err) && empty($MR_Base_M_Type_err) && empty($MR_Base_M_Volume_err) && empty($MR_Base_M_Defrosting_err) && empty($MR_Base_M_Energy_err) && empty($MR_Base_M_Size_err) && empty($MR_Base_M_price_err) && empty($image_err))
    {
        $sql = "UPDATE MR_Base_Moroz SET  MR_Base_M_name=?, MR_Base_M_Brand=?, MR_Base_M_Type=?, MR_Base_M_Volume=?, MR_Base_M_Defrosting=?, MR_Base_M_Energy=?, MR_Base_M_Size=?, MR_Base_M_price=?, image=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql))
        {
            //запоминаем параметры
            $param_MR_Base_M_name = $MR_Base_M_name;
            $param_MR_Base_M_Brand = $MR_Base_M_Brand;
            $param_MR_Base_M_Type = $MR_Base_M_Type;
            $param_MR_Base_M_Volume = $MR_Base_M_Volume;
            $param_MR_Base_M_Defrosting = $MR_Base_M_Defrosting;
            $param_MR_Base_M_Energy = $MR_Base_M_Energy;
            $param_MR_Base_M_Size= $MR_Base_M_Size;
            $param_MR_Base_M_price= $MR_Base_M_price;
            $param_image = $image;

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssss",
             $param_MR_Base_M_name,
             $param_MR_Base_M_Brand,
             $param_MR_Base_M_Type,
             $param_MR_Base_M_Volume,
             $param_MR_Base_M_Defrosting,
             $param_MR_Base_M_Energy,
             $param_MR_Base_M_Size,
             $param_MR_Base_M_price,
             $image,
             $id
             );

            $result = mysqli_stmt_execute($stmt);
            if($result)
            {   
                //Успешно. перенаправление на страницу Gallary_Moroz.php
                header("location: /881_20/Gallary_Moroz.php");
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
    //Проверка id
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        //Получение id
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM MR_Base_Moroz WHERE id=?";
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
                    $MR_Base_M_name = $row["MR_Base_M_name"];
                    $MR_Base_M_Brand = $row["MR_Base_M_Brand"];
                    $MR_Base_M_Type = $row["MR_Base_M_Type"];
                    $MR_Base_M_Volume = $row["MR_Base_M_Volume"];
                    $MR_Base_M_Defrosting = $row["MR_Base_M_Defrosting"];
                    $MR_Base_M_Energy = $row["MR_Base_M_Energy"];
                    $MR_Base_M_Size = $row["MR_Base_M_Size"];
                    $MR_Base_M_price = $row["MR_Base_M_price"];
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
        }    
    </style>
</head>
<body>
    <div class="container_tovar">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <span class="heading">Редактирование морозильника</span>

                        <div class="form-group <?php echo (!empty($MR_Base_M_name_err)) ? 'has-error' : ''; ?>">
                            <label>Название</label>
                            <input type="text" name="MR_Base_M_name" class="form-control" value="<?php echo $MR_Base_M_name; ?>">
                            <span class="help-block"><?php echo $MR_Base_M_name_err;?></span>
                            <span class="help-block"><?php echo $user_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($MR_Base_M_Brand_err)) ? 'has-error' : ''; ?>">
                            <label>Производитель</label>
                            <select class="form-control" name="MR_Base_M_Brand">;
                            <?php
                            $result_spisok = mysqli_query($link,"SELECT * FROM MR_Base_Brand");//выгружаем значения из таблицы Брендов
                            while($row_spisok = mysqli_fetch_array($result_spisok)){
                            echo '<option value="'.$row_spisok['MR_Base_Brand_id'].'">'.$row_spisok['MR_Base_Brand_name'].'</option>';//заполняем значениями выпадающий список                   
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-group <?php echo (!empty($MR_Base_M_Type_err)) ? 'has-error' : ''; ?>">
                            <label>Идентификатор типа морозильника</label>
                            <select class="form-control" name="MR_Base_M_Type">;
                            <?php
                            $result_type = mysqli_query($link,"SELECT * FROM MR_Base_Type");//выгружаем значения из таблицы типов
                            while($row_type = mysqli_fetch_array($result_type)){
                            echo '<option value="'.$row_type['MR_Base_Type_id'].'">'.$row_type['MR_Base_Type_name'].'</option>'; //заполняем значениями выпадающий список                
                            }
                            ?>
                            </select>
                        </div>


                        <div class="form-group <?php echo (!empty($MR_Base_M_Volume_err)) ? 'has-error' : ''; ?>">
                            <label>Объем</label>
                            <input type="text" name="MR_Base_M_Volume" class="form-control" value="<?php echo $MR_Base_M_Volume; ?>"></input>
                            <span class="help-block"><?php echo $MR_Base_M_Volume_err;?></span>
                        </div>


                        <div class="form-group <?php echo (!empty($MR_Base_M_Defrosting_err)) ? 'has-error' : ''; ?>">
                            <label>Идентификатор типа разморозки</label>
                            <select class="form-control" name="MR_Base_M_Defrosting">;
                            <?php
                            $result_defrosting = mysqli_query($link,"SELECT * FROM MR_Base_Defrosting");//выгружаем значения из таблицы типов разморозки
                            while($row_defrosting = mysqli_fetch_array($result_defrosting)){
                            echo '<option value="'.$row_defrosting['MR_Base_Defrosting_id'].'">' . $row_defrosting['MR_Base_Defrosting_name']. '</option>'; //заполняем значениями выпадающий список                     
                            }
                            ?>
                            </select>
                        </div>


                        <div class="form-group <?php echo (!empty($MR_Base_M_Energy_err)) ? 'has-error' : ''; ?>">
                            <label>Энергопотребление</label>
                            <input type="text" name="MR_Base_M_Energy" class="form-control" value="<?php echo $MR_Base_M_Energy; ?>">
                            <span class="help-block"><?php echo $MR_Base_M_Energy_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($MR_Base_M_Size_err)) ? 'has-error' : ''; ?>">
                            <label>Размеры</label>
                            <input type="text" name="MR_Base_M_Size" class="form-control" value="<?php echo $MR_Base_M_Size; ?>">
                            <span class="help-block"><?php echo $MR_Base_M_Size_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($MR_Base_M_price_err)) ? 'has-error' : ''; ?>">
                            <label>Цена</label>
                            <input type="text" name="MR_Base_M_price" class="form-control" value="<?php echo $MR_Base_M_price; ?>">
                            <span class="help-block"><?php echo $MR_Base_M_price_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
                            <label>Ссылка на картинку</label>
                            <input type="text" name="image" class="form-control" value="<?php echo $image; ?>">
                            <span class="help-block"><?php echo $image_err;?></span>
                        </div>


                        <div class="form-group">
                         <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                         <input type="submit" class="btn btn-default btn-lg btn-block" value="Изменить">
                         <input type="button" class="btn btn-default btn-lg btn-block"  value="Назад" onclick="window.location.href = 'Gallary_Moroz.php';">
                        </div>
                </form>
            </div>
        </div>        
    </div>
</body>
</html>