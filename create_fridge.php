<?php
session_start(); // начинаем новую сессию

// извлекаем переменные из сессии, если были установлены
$link = $_SESSION["link"];
$username = $_SESSION["username"];  
$role_id = $_SESSION["role_id"];
$role_name = $_SESSION["role_name"];
if(($role_id != '1') && ($role_id != '2')){
    // запоминаем ошибку для отображения в файле CRUD_error.php
    $_SESSION["crud_error"] = "Недостаточно прав для изменения данных!!!";
    header("location: CRUD_error.php");
    exit;
}
// Include config file (подключаем файлы)
require_once "login_role.php";
include('./login_config.php');
header('Content-Type: text/html; charset=utf-8');
$thread_id = mysqli_thread_id($link);

$VR_Base_F_name = $VR_Base_F_Brand = $VR_Base_F_Volume  = $VR_Base_F_Defrosting = $VR_Base_F_Energy = $VR_Base_F_Size = $VR_Base_F_Color = $VR_Base_F_price = $image = "";
$VR_Base_F_name_err = $VR_Base_F_Brand_err = $VR_Base_F_Volume_err  = $VR_Base_F_Defrosting_err = $VR_Base_F_Energy_err = $VR_Base_F_Size_err = $VR_Base_F_Color_err = $VR_Base_F_price_err = $image_err = "";
    

// обрабатываем запрос после нажатия отправки пользователем
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    //Проверяем введенное название
    $input_VR_Base_F_name = trim($_POST["VR_Base_F_name"]);
    if(empty($input_VR_Base_F_name))
    {
        $VR_Base_F_name_err = "Пожалуйста, введите наименование товара";
    }
    else
    {
        $VR_Base_F_name = $input_VR_Base_F_name;
    }


    //Проверяем название бренда
    $input_VR_Base_F_Brand = trim($_POST["VR_Base_F_Brand"]);
    if($input_VR_Base_F_Brand == "")
    {
        $VR_Base_F_Brand_err = "Пожалуйста, укажите бренд";
    }
    else
    {
        $VR_Base_F_Brand = $input_VR_Base_F_Brand;
    }



    //Проверяем объем
    $input_VR_Base_F_Volume = trim($_POST["VR_Base_F_Volume"]);
    if(empty($input_VR_Base_F_Volume))
    {
        $VR_Base_F_Volume_err = "Пожалуйста, введите объем";
    }
    elseif(!filter_var($input_VR_Base_F_Volume, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+$/"))))
    {
        $VR_Base_F_Volume_err = "Введите корректные данные";
    }
    else
    {
        $VR_Base_F_Volume = $input_VR_Base_F_Volume;
    }



    //Проверяем тип разморозки
    $input_VR_Base_F_Defrosting = trim($_POST["VR_Base_F_Defrosting"]);
    if($input_VR_Base_F_Defrosting == "")
    {
        $VR_Base_F_Defrosting_err = "Пожалуйста,введите тип разморозки";
    }
    else
    {
        $VR_Base_F_Defrosting = $input_VR_Base_F_Defrosting;
    }



    // Validate VR_Base_F_Energy (проверяем энергопотребление)
    $input_VR_Base_F_Energy = trim($_POST["VR_Base_F_Energy"]);
    if(empty($input_VR_Base_F_Energy))
    {
        $VR_Base_F_Energy_err = "Пожалуйста, введите энергопотребление";
    }
    elseif(!filter_var($input_VR_Base_F_Energy, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+$/"))))
    {
        $VR_Base_F_Energy_err = "Введите корректные данные";
    } 
    else
    {
        $VR_Base_F_Energy = $input_VR_Base_F_Energy;
    }


    // Validate VR_Base_F_Size (проверяем размеры)
    $input_VR_Base_F_Size = trim($_POST["VR_Base_F_Size"]);
    if(empty($input_VR_Base_F_Size))
    {
        $VR_Base_F_Size_err = "Пожалуйста, введите размеры";
    }
    else
    {
        $VR_Base_F_Size = $input_VR_Base_F_Size;
    }
    

    // Validate VR_Base_F_Color (проверяем цвет)
    $input_VR_Base_F_Color = trim($_POST["VR_Base_F_Color"]);
    if($input_VR_Base_F_Color == "")
    {
        $VR_Base_F_Color_err = "Пожалуйста, укажите цвет";
    }
    else
    {
        $VR_Base_F_Color = $input_VR_Base_F_Color;
    }


    // Validate VR_Base_F_price (проверяем цену)
    $input_VR_Base_F_price = trim($_POST["VR_Base_F_price"]);
    if(empty($input_VR_Base_F_price))
    {
        $VR_Base_F_price_err = "Пожалуйста, введите цену";
    }
    elseif(!filter_var($input_VR_Base_F_price, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+\.?[0-9]*$/"))))
    {
        $VR_Base_F_price_err = "Введите корректные данные";
    } 
    else
    {
        $VR_Base_F_price = $input_VR_Base_F_price;
    }
    // Validate image (проверяем изображение)
    $input_image = trim($_POST["image"]);
    if(empty($input_image))
    {
        $image_err = "Пожалуйста,введите ссылку на изображение";
    }
    else
    {
        $image = $input_image;
    }

    // (если исходные данные введены, добавляем запись в БД)
    if(empty($VR_Base_F_name_err) && empty($VR_Base_F_Brand_err) && empty($VR_Base_F_Volume_err) && empty($VR_Base_F_Defrosting_err) && empty($VR_Base_F_Energy_err) && empty($VR_Base_F_Size_err) && empty($VR_Base_F_Color_err) && empty($VR_Base_F_price_err) && empty($image_err))
    {       
        $Gres=mysqli_query($link,"SELECT VR_Base_F_name FROM VR_Base_fridge WHERE VR_Base_F_name='$VR_Base_F_name'");       // $count= mysqli_num_rows($Gres);
        $Gcount= $Gres->affected_rows;
              
         if($Gres->num_rows == '0')
         {
        // Prepare an insert statement (подготавливаем запрос: символы ? для подстановки параметров)
        $sql = "INSERT INTO VR_Base_fridge (VR_Base_F_name, VR_Base_F_Brand, VR_Base_F_Volume, VR_Base_F_Defrosting, VR_Base_F_Energy, VR_Base_F_Size, VR_Base_F_Color, VR_Base_F_price, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        if($stmt = mysqli_prepare($link, $sql))
        {
            //связываем паременные в условии запроса
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_VR_Base_F_name, $param_VR_Base_F_Brand, $param_VR_Base_F_Volume, $param_VR_Base_F_Defrosting, $param_VR_Base_F_Energy, $param_VR_Base_F_Size, $param_VR_Base_F_Color, $param_VR_Base_F_price, $image);
            
            //запоминаем параметры
            $param_VR_Base_F_name = $VR_Base_F_name;
            $param_VR_Base_F_Brand = $VR_Base_F_Brand;
            $param_VR_Base_F_Volume = $VR_Base_F_Volume;
            $param_VR_Base_F_Defrosting = $VR_Base_F_Defrosting;
            $param_VR_Base_F_Energy = $VR_Base_F_Energy;
            $param_VR_Base_F_Size = $VR_Base_F_Size;
            $param_VR_Base_F_Color= $VR_Base_F_Color;
            $param_VR_Base_F_price= $VR_Base_F_price;
            $param_image = $image;

            
            //Пытаемся выполнить запрос
            if(mysqli_stmt_execute($stmt))
            {
                // данные записаны, переходим на страницу Gallary_Fridge.php
                header("location: Gallary_Fridge.php");
                exit();
            }
            else
            {
                //данные не записаны, вывод сообщения об ошибке
                echo "create_fridge.php: данные не записаны!Попробуйте повторить попытку снова!";
            }
        }
        else
        {
            echo "create_fridge.php: запрос не выполнен!!((<br/>";
            $thread_id = mysqli_thread_id($link);
            echo "create_fridge.php: thread_id=".$thread_id. "<br/>";
        }
    }
    else
    {
        $user_err="Такой холодильник уже существует";
    }
 }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Создание записи</title>
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
        }
    </style>
</head>
<body>
    <div class="container_tovar">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <span class="heading">Добавление холодильника</span>

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
                        $result_spisok = mysqli_query($link,"SELECT * FROM VR_Base_Brand");//выгрузка данных из таблицы

                        while($row_spisok = mysqli_fetch_array($result_spisok)){
                        echo '<option value="'.$row_spisok['VR_Base_Brand_id'].'">' . $row_spisok['VR_Base_Brand_name']. '</option>';//заполнение данными выпадающего списка                   
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
                        $result_defrosting = mysqli_query($link,"SELECT * FROM VR_Base_Defrosting");//выгрузка данных из таблицы
                        while($row_defrosting = mysqli_fetch_array($result_defrosting)){
                        echo '<option value="'.$row_defrosting['VR_Base_Defrosting_id'].'">' . $row_defrosting['VR_Base_Defrosting_name']. '</option>';//заполнение данными выпадающего списка                   
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
                        $result_color = mysqli_query($link,"SELECT * FROM VR_Base_Color");//выгрузка данных из таблицы
                        while($row_color = mysqli_fetch_array($result_color)){
                        echo '<option value="'.$row_color['VR_Base_Color_id'].'">' . $row_color['VR_Base_Color_name']. '</option>';//заполнение данными выпадающего списка                    
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
                         <input type="submit" class="btn btn-default btn-lg btn-block" value="Добавить">
                         <input type="button" class="btn btn-default btn-lg btn-block"  value="Назад" onclick="window.location.href = 'Gallary_Fridge.php';">
                    </div>
                </form>
            </div>
        </div>        
    </div>
</body>
</html>