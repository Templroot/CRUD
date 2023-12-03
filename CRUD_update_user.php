<?php
// Include config file
require_once "login_config.php";
require_once "login_role.php";

session_start();
// извлекаем переменные из сессии, если были установлены
$role_id = $_SESSION["role_id"];
$user_id = $_SESSION["user_id"];


$first_name = $middle_name = $last_name = $email = $username = $pswd = $pswd1 = "";
$first_name_err = $middle_name_err = $last_name_err = $email_err = $username_err = $pswd_err =  $pswd1_err = "";

    if($role_id != '2')  // если не админ или другой пользователь 
{   if($role_id != '1'){
    if(isset($_GET["user_id"]))
    if($user_id!=$_GET["user_id"])
    {
    // запоминаем ошибку для отображения в файле CRUD_error.php
    $_SESSION["crud_error"] = "Недостаточно прав для изменения данных!!!";
    header("location: CRUD_error.php");
    echo $role_id;
    echo "<br/>";
    echo $user_id;
    echo "<br/>";
    echo $t_id;
    exit;
    }
}

}


// Processing form data when form is submitted
if(isset($_POST["user_id"]) && !empty($_POST["user_id"]))
{
    // Get hidden input value
    $id = $_POST["user_id"];

    // Validate first_name (проверяем имя)
    $input_first_name = trim($_POST["first_name"]);
    if(empty($input_first_name))
    {
        $first_name_err = "Пожалуйста, введите имя";//записываем ошибку
    }
    elseif(!filter_var($input_first_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\sа-яА-Я]+$/"))))//вводить можно только буквы
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
    elseif(!filter_var($input_middle_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Zа-яА-я\s]+$/"))))//вводить можно только буквы
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
    elseif(!filter_var($input_last_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Zа-яА-Я\s]+$/"))))//вводить можно только буквы
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
        $email_err = "Пожалуйста, введите адрес";//записываем ошибку
    }
    else
    {
        $email = $input_email;
    }


    // Validate username (проверяем username)
    $input_username = trim($_POST["username"]);
    if(empty($input_username))
    {
        $username_err = "Пожалуйста, введите имя пользователя";//записываем ошибку     
    }
    else
    {
        $username = $input_username;
    }


    $input_pswd = trim($_POST["pswd"]);
    if(empty($input_pswd))
    {
        $pswd_err = "Пожалуйста, введите пароль";//записываем ошибку     
    }
    else
    {
        $pswd = $input_pswd;
    }
  

    $input_pswd1 = trim($_POST["pswd1"]);
    if(empty($input_pswd1))
    {
        $pswd1_err = "Пожалуйста, повторите пароль";//записываем ошибку     
    }
    elseif($input_pswd != $input_pswd1)
        {
            $pswd1_err="Пароли не совпадают";//записываем ошибку
        }
    else
    {
        $pswd1 = $input_pswd1;
    }
    
    //Проверка на наличие ошибок
    if(empty($first_name_err) && empty($middle_name_err) && empty($last_name_err) && empty($email_err) && empty($username_err) && empty($pswd_err) && empty($pswd1_err))
    {
        $Gres=mysqli_query($link,"SELECT username FROM users WHERE username= '$username' && user_id != '$id'");//проверка существования такого username(кроме текущего пользователя)
        $Gcount= $Gres->affected_rows;
              
         if($Gres->num_rows == '0')//если такой username не занят
         {

        $sql = "UPDATE users SET  first_name=?, middle_name=?, last_name=?, email=?, username=?, password=?  WHERE user_id=?";//запрос на обновление полей в таблице users
         
        if($stmt = mysqli_prepare($link, $sql))
        {
            //подставляем параметры
            mysqli_stmt_bind_param($stmt, "sssssss", $param_first_name, $param_middle_name, $param_last_name, $param_email,$param_username, $param_password,$id);
            //Запоминаем параметры
            $param_first_name = $first_name;
            $param_middle_name = $middle_name;
            $param_last_name = $last_name;
            $param_email = $email;
            $param_username= $username;
            $param_password= $pswd;

            
            // Attempt to execute the prepared statement
            $result = mysqli_stmt_execute($stmt);
            //mysqli_stmt_error_list($stmt);
            //var_dump(mysqli_stmt_error_list($stmt));
            if($result)
            {      if(($role_id == '2') or ($role_id == '1')) {
                   header("location: read_users.php");
                exit();}
                else {
                   header("location: Shop.php");
                exit();  
                }
            } 
            else
            {
                echo "Что-то пошло не так. Повторите попытку позже";
            }
        }
    }
        else
        {
            //если username занят, вывод сообщения об ошибке
            $user_err="Такое имя пользователя уже существует";
        }
         
        // Закрытие statement
        mysqli_stmt_close($stmt);
    }
    
    //Закрытие соединения
    mysqli_close($link);
} 
else
{
    //Проверка id
    if(isset($_GET["user_id"]) && !empty(trim($_GET["user_id"]))){
        // Get URL parameter
        $id =  trim($_GET["user_id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM users WHERE user_id=?";
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
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $role_id = $row["role_id"];
                    $role_name = $row["role_name"];
                    $first_name = $row["first_name"];
                    $middle_name = $row["middle_name"];
                    $last_name = $row["last_name"];
                    $email = $row["email"];
                    $username = $row["username"];
                    $password = $row["password"];
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
                echo "Что-то пошло не так. Повторите попытку позже";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
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
                <span class="heading">Редактирование пользователя</span>

                        <div class="form-group <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">
                            <label>Имя</label>
                            <input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>">
                            <span class="help-block"><?php echo $first_name_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($middle_name_err)) ? 'has-error' : ''; ?>">
                            <label>Отчество</label>
                            <input type="text" name="middle_name" class="form-control" value="<?php echo $middle_name; ?>">
                            <span class="help-block"><?php echo $middle_name_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
                            <label>Фамилия</label>
                            <input type="text" name="last_name" class="form-control" value="<?php echo $last_name; ?>">
                            <span class="help-block"><?php echo $last_name_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>email</label>
                            <input type="email" name="email_address" class="form-control" value="<?php echo $email; ?>"></input>
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>Имя пользователя</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                            <span class="help-block"><?php echo $username_err;?></span>
                            <span class="help-block"><?php echo $user_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($pswd_err)) ? 'has-error' : ''; ?>">
                            <label>Пароль</label>
                            <input type="password" name="pswd" class="form-control" value="<?php echo $pswd; ?>">
                            <span class="help-block"><?php echo $pswd_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($pswd1_err)) ? 'has-error' : ''; ?>">
                            <label>Повторите пароль</label>
                            <input type="password" name="pswd1" class="form-control" value="<?php echo $pswd1; ?>">
                            <span class="help-block"><?php echo $pswd1_err;?></span>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="user_id" value="<?php echo $id; ?>"/>
                            <input type="submit" class="btn btn-default btn-lg btn-block" value="Изменить">
                            <?php  if(($role_id == '2') or ($role_id == '1')) {
                    echo" <button class='btn btn-default btn-lg btn-block' type='button' onclick=\"window.location.href='read_users.php'\" style=margin-left: 10px;>Назад</button>";  }?>                  
                      <?php  if($role_id == '0') { 
                   echo" <button class='btn btn-default btn-lg btn-block' type='button' onclick=\"window.location.href='Shop.php'\" style=margin-left: 10px;>Назад</button>";  }?>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
</body>
</html>