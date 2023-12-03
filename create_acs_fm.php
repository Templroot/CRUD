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

// пытаемся добавить данные
//Определяем и очищаем переменные
$MR_Base_Acs_name = $MR_Base_Acs_userr = $MR_Base_Acs_disc = $MR_Base_Acs_price = $image = "";
$MR_Base_Acs_name_err = $MR_Base_Acs_userr_err = $MR_Base_Acs_disc_err = $MR_Base_Acs_price_err = $image_err = "";
    
//Обрабатываем запрос после нажатия отправки пользователем
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Validate MR_Base_Acs_name (проверяем наименование)
    $input_MR_Base_Acs_name = trim($_POST["MR_Base_Acs_name"]);
    if(empty($input_MR_Base_Acs_name))//если поле пустое
    {
        $MR_Base_Acs_name_err = "Пожалуйста,введите название аксессуара";//записываем ошибку
    }
    else
    {
        $MR_Base_Acs_name = $input_MR_Base_Acs_name;
    }


    // Validate MR_Base_Acs_userr (проверяем совместимость)
    $input_MR_Base_Acs_userr = trim($_POST["MR_Base_Acs_userr"]);
    if($input_MR_Base_Acs_userr == " ")//если поле пустое
    {
        $MR_Base_Acs_userr_err = "Пожалуйста, укажите совместимость";//записываем ошибку
    }
    else
    {
        $MR_Base_Acs_userr = $input_MR_Base_Acs_userr;
    }


    // Validate MR_Base_Acs_disc (проверяем описание)
    $input_MR_Base_Acs_disc = trim($_POST["MR_Base_Acs_disc"]);
    if(empty($input_MR_Base_Acs_disc))//если поле пустое
    {
        $MR_Base_Acs_disc_err = "Пожалуйста, введите описание";//записываем ошибку
    }
    else
    {
        $MR_Base_Acs_disc = $input_MR_Base_Acs_disc;
    }

    // Validate MR_Base_Acs_price (проверяем цену)
    $input_MR_Base_Acs_price = trim($_POST["MR_Base_Acs_price"]);
    if(empty($input_MR_Base_Acs_price))//если поле пустое
    {
        $MR_Base_Acs_price_err = "Пожалуйста, введите цену";//записываем ошибку
    }
    elseif(!filter_var($input_MR_Base_Acs_price, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+\.?[0-9]*$/"))))//указываем формат ввода цены
    {
        $MR_Base_Acs_price_err = "Введите корректные данные";//записываем ошибку
    } 
    else
    {
        $MR_Base_Acs_price = $input_MR_Base_Acs_price;
    }

    // Validate image (проверяем изображение)
    $input_image = trim($_POST["image"]);
    if(empty($input_image))//если поле пустое
    {
        $image_err = "Пожалуйста, введите ссылку на изображение";//записываем ошибку
    }
    else
    {
        $image = $input_image;
    }


    // (если исходные данные введены, добавляем запись в БД)
    if(empty($MR_Base_Acs_name_err) && empty($MR_Base_Acs_userr_err) && empty($MR_Base_Acs_disc_err) && empty($MR_Base_Acs_price_err) && empty($image_err))
    {       
        //Проверяем,есть ли товары с таким именем
        $Gres=mysqli_query($link,"SELECT MR_Base_Acs_name FROM MR_Base_Acs WHERE MR_Base_Acs_name= '$MR_Base_Acs_name'");       // $count= mysqli_num_rows($Gres);
        $Gcount= $Gres->affected_rows;
              
        //если имя свободно
         if($Gres->num_rows == '0')
         {

        // Prepare an insert statement (подготавливаем запрос: символы ? для подстановки параметров)
        $sql = "INSERT INTO MR_Base_Acs (MR_Base_Acs_name, MR_Base_Acs_userr, MR_Base_Acs_disc, MR_Base_Acs_price, image) VALUES (?, ?, ?, ?, ?)";//запрос на добавление данных в таблицу MR_Base_Acs
        if($stmt = mysqli_prepare($link, $sql))
        {
            // (связываем паременные в условии запроса: s - строка, i - целое число)
            mysqli_stmt_bind_param($stmt, "sisis", $param_MR_Base_Acs_name, $param_MR_Base_Acs_userr, $param_MR_Base_Acs_disc, $param_MR_Base_Acs_price, $param_image);
            
            // Set parameters (запоминаем параметры)
            $param_MR_Base_Acs_name = $MR_Base_Acs_name;
            $param_MR_Base_Acs_userr = $MR_Base_Acs_userr;
            $param_MR_Base_Acs_disc = $MR_Base_Acs_disc;
            $param_MR_Base_Acs_price = $MR_Base_Acs_price;
            $param_image = $image;
            

            
            //пытаемся выполнить запрос
            if(mysqli_stmt_execute($stmt))
            {
                // данные записаны, переходим на страницу Gallary_Acs_fm.php
                header("location: Gallary_Acs_fm.php");
                exit();
            }
            else
            {
                //вывод сообщения об ошибке
                echo "Данные не записаны!Попробуйте повторить попытку снова!";
            }
        }
        else
        {
            //вывод сообщения об ошибке
            echo "CRUD_create_user.php: запрос не выполнен!<br/>";
            $thread_id = mysqli_thread_id($link);
            echo "CRUD_create_user.php: thread_id=".$thread_id. "<br/>";
        }
    }
    else
    {
        $user_err="Такой аксессуар уже существует";
    }
        // Close statement (закрываем условие запроса)
        mysqli_stmt_close($stmt); 
}
    // Close connection (закрываем соединение)
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Создание записи</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel='stylesheet' href='CSS_FOR_CREATE_AND_UPDATE.css'/>
    <style type="text/css">
        {
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        .form-horizontal{
            max-width: 800px;
        }
        textarea{
            resize: vertical;
            min-height: 40px;
        }
    </style>
</head>
<body>
    <div class="container_tovar">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <span class="heading">Добавление аксессуара</span>

                        <div class="form-group <?php echo (!empty($MR_Base_Acs_name_err)) ? 'has-error' : ''; ?>">
                            <label>Название</label>
                            <input type="text" name="MR_Base_Acs_name" class="form-control" value="<?php echo $MR_Base_Acs_name; ?>">
                            <span class="help-block"><?php echo $MR_Base_Acs_name_err;?></span>
                            <span class="help-block"><?php echo $user_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($MR_Base_Acs_userr_err)) ? 'has-error' : ''; ?>">
                            <label>Совместимость</label>

                            <select class="form-control" name="MR_Base_Acs_userr">;

                            <?php
                            $result_spisok = mysqli_query($link,"SELECT * FROM MR_Base_User");//Выгрузка данных из таблицы
                            while($row_spisok = mysqli_fetch_array($result_spisok)){
                            echo '<option value="'.$row_spisok['MR_Base_User_id'].'">' . $row_spisok['MR_Base_User_name']. '</option>';//заполнение данными выпадающего списка                   
                            }
                            ?>
                            </select>
                        </div>

                        <div class="form-group <?php echo (!empty($MR_Base_Acs_disc_err)) ? 'has-error' : ''; ?>">
                            <label>Описание</label>
                            <textarea name="MR_Base_Acs_disc" class="form-control" value="<?php echo $MR_Base_Acs_disc; ?>"></textarea>
                            <span class="help-block"><?php echo $MR_Base_Acs_disc_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($MR_Base_Acs_price_err)) ? 'has-error' : ''; ?>">
                            <label>Цена</label>
                            <input name="MR_Base_Acs_price" class="form-control" value="<?php echo $MR_Base_Acs_price; ?>">
                            <span class="help-block"><?php echo $MR_Base_Acs_price_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
                            <label>Ссылка на картинку</label>
                            <input type="text" name="image" class="form-control" value="<?php echo $image; ?>">
                            <span class="help-block"><?php echo $image_err;?></span>
                        </div>

                        <div class="form-group">
                         <input type="submit" class="btn btn-default btn-lg btn-block" value="Добавить">
                         <input type="button" class="btn btn-default btn-lg btn-block"  value="Назад" onclick="window.location.href = 'Gallary_Acs_fm.php';">
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>