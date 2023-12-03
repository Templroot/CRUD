<?php
session_start(); // начинаем новую сессию

// извлекаем переменные из сессии, если были установлены
$link = $_SESSION["link"];
$username = $_SESSION["username"];
$role_id = $_SESSION["role_id"];
$role_name = $_SESSION["role_name"];

// Include config file (подключаем файлы)
require_once "login_role.php";
include('./login_config.php');
$thread_id = mysqli_thread_id($link);


// (определяем и очищаем переменные)
$first_name = $middle_name = $last_name = $email = $username = $pswd = $pswd1 = "";
$first_name_err = $middle_name_err = $last_name_err = $email_err = $username_err = $pswd_err =  $pswd1_err = "";
    
// (обрабатываем запрос после нажатия отправки пользователем) 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Validate first_name (проверяем имя)
    $input_first_name = trim($_POST["first_name"]);
    if(empty($input_first_name))
    {
        $first_name_err = "Пожалуйста, введите имя"; //записываем ошибку
    }
    elseif(!filter_var($input_first_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\sа-яА-Я]+$/"))))
    {
        $first_name_err = "Пожалуйста, введите корректные данные";//записываем ошибку
    } 
    else
    {
        $first_name = $input_first_name;
    }

    // Validate middle_name (проверяем отчество)
    $input_middle_name = trim($_POST["middle_name"]);
    if(empty($input_middle_name))
    {
        $middle_name_err = "Пожалуйста, введите отчество";//записываем ошибку
    }
    elseif(!filter_var($input_middle_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\sа-яА-Я]+$/"))))
    {
        $middle_name_err = "Пожалуйста, введите корректные данные";//записываем ошибку
    } 
    else
    {
        $middle_name = $input_middle_name;
    }

    // Validate last_name (проверяем фамилию)
    $input_last_name = trim($_POST["last_name"]);
    if(empty($input_last_name))
    {
        $last_name_err = "Пожалуйста, введите фамилию";//записываем ошибку
    }
    elseif(!filter_var($input_last_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Zа-яА-Я\s]+$/"))))
    {
        $last_name_err = "Пожалуйста, введите корректные данные";//записываем ошибку
    } 
    else
    {
        $last_name = $input_last_name;
    }
    
    // Validate address (проверяем адрес)
    $input_email = trim($_POST["email_address"]);
    if(empty($input_email))
    {
        $email_err = "Пожалуйста, введите адрес";   //записываем ошибку  
    }
    else
    {
        $email = $input_email;
    }


    // Validate username (проверяем имя пользователя)
    $input_username = trim($_POST["username"]);
    if(empty($input_username))
    {
        $username_err = "Пожалуйста, введите имя пользователя";   //записываем ошибку  
    }
    else
    {
        $username = $input_username;
    }


    $input_pswd = trim($_POST["pswd"]);
    if(empty($input_pswd))
    {
        $pswd_err = "Пожалуйста, введите пароль";   //записываем ошибку  
    }
    else
    {
        $pswd = $input_pswd;
    }
  

    $input_pswd1 = trim($_POST["pswd1"]);
    if(empty($input_pswd1))
    {
        $pswd1_err = "Пожалуйста, повторите пароль";  //записываем ошибку   
    }
    elseif($input_pswd != $input_pswd1)
        {
            $pswd1_err="Пароли не совпадают";//записываем ошибку
        }
    else
    {
        $pswd1 = $input_pswd1;
    }

    // (если исходные данные введены, добавляем запись в БД)
    if(empty($first_name_err) && empty($middle_name_err) && empty($last_name_err) && empty($email_err) && empty($username_err) && empty($pswd_err) && empty($pswd1_err))
    {   
        $Gres=mysqli_query($link,"SELECT username FROM users WHERE username= '$username'");//Запрос для проверки на существование в БД указанного имени пользователя
        $Gcount= $Gres->affected_rows;
          
              
         if($Gres->num_rows == '0')//если пользователя с таким username нет, то регистрация
         {
            $role_id = 0;
            $role_name = "User";

        
        // Подготавливаем запрос: символы ? для подстановки параметров
        $sql = "INSERT INTO users (role_id, role_name, first_name, middle_name, last_name, email, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        if($stmt = mysqli_prepare($link, $sql))
        {
       
            // (связываем паременные в условии запроса: s - строка, i - целое число)
            mysqli_stmt_bind_param($stmt, "isssssss", $param_role_id, $param_role_name, $param_first_name, $param_middle_name, $param_last_name, $param_email,$param_username, $param_password);
            
            // (запоминаем параметры)
            $param_role_id = $role_id;
            $param_role_name = $role_name;
            $param_first_name = $first_name;
            $param_middle_name = $middle_name;
            $param_last_name = $last_name;
            $param_email = $email;
            $param_username= $username;
            $param_password= $pswd1;

            
            // (пытаемся выполнить запрос)
            if(mysqli_stmt_execute($stmt))
            {
                // данные записаны, переходим на страницу login.php
                header("location: login.php");
                exit();
            }
            else
            {
                // данные не записаны, вывод сообщения об ошибке
                echo "CRUD_create_user.php: данные не записаны!Попробуйте повторить попытку снова!!";
            }
        }
        else
        {
            // запрос не выполнен, вывод сообщения об ошибке
            echo "CRUD_create_user.php: запрос не выполнен<br/>";
            $thread_id = mysqli_thread_id($link);
            echo "CRUD_create_user.php: thread_id=".$thread_id. "<br/>";
        }
    }
    else 
    {
        //если пользователь с таким username уже есть, вывод сообщения об ошибке
        $user_err="Такое имя пользователя уже существует";
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
    <title>Создание</title>
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
                <span class="heading">РЕГИСТРАЦИЯ</span>
                        <div class="form-group <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">
                            <label>Имя</label>
                            <!--Форма заполнения-->
                            <input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>">
                            <span class="help-block"><?php echo $first_name_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($middle_name_err)) ? 'has-error' : ''; ?>">
                            <label>Отчество</label>
                            <!--Форма заполнения-->
                            <input type="text" name="middle_name" class="form-control" value="<?php echo $middle_name; ?>">
                            <span class="help-block"><?php echo $middle_name_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
                            <label>Фамилия</label>
                            <!--Форма заполнения-->
                            <input type="text" name="last_name" class="form-control" value="<?php echo $last_name; ?>">
                            <span class="help-block"><?php echo $last_name_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>email</label>
                            <!--Форма заполнения-->
                            <input type="email" name="email_address" class="form-control" value="<?php echo $email; ?>"></input>
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>Имя пользователя</label>
                            <!--Форма заполнения-->
                            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                            <span class="help-block"><?php echo $username_err;?></span>
                            <span class="help-block"><?php echo $user_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($pswd_err)) ? 'has-error' : ''; ?>">
                            <label>Пароль</label>
                            <!--Форма заполнения-->
                            <input type="password" name="pswd" class="form-control" value="<?php echo $pswd; ?>">
                            <span class="help-block"><?php echo $pswd_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($pswd1_err)) ? 'has-error' : ''; ?>">
                            <label>Повторите пароль</label>
                            <!--Форма заполнения-->
                            <input type="password" name="pswd1" class="form-control" value="<?php echo $pswd1; ?>">
                            <span class="help-block"><?php echo $pswd1_err;?></span>
                        </div>

                        <div class="form-group">
                         <input type="submit" class="btn btn-default btn-lg btn-block" value="Зарегистрироваться">
                         <input type="button" class="btn btn-default btn-lg btn-block"  value="Назад" onclick="window.location.href = 'login.php';">
                     
                      </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
