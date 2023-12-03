<?php
// Initialize the session (создаем новую сессию)
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
// (проверяем, были ли установлены переменные входа в систему)
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
{
    // если да, перенаправляем на страницу приветствия
    header("location: Shop.php");
    exit;
}
 
// Include config file (подключаем файлы)
require_once "login_config.php";
require_once "login_role.php";
                        
// Define variables and initialize with empty values
// (очищаем переменные)
$username = $password = "";
$username_err = $password_err = "";

 
// Processing form data when form is submitted
// (выполняем обработку, когда пользователь отправил данные формы)
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Check if username is empty (проверка поля "username")
    if(empty(trim($_POST["username"])))
    {
        $username_err = "Пожалуйста,введите имя пользователя.";//записываем ошибку
    }
    else
    {
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty (проверка поля "пароль")
    if(empty(trim($_POST["password"])))
    {
        $password_err = "Пожалуйста, введите пароль.";//записываем ошибку
    }
    else
    {
        $password = trim($_POST["password"]);
    }
    
    
    // Validate credentials (проверка логин-пароля)
    if(empty($username_err) && empty($password_err))
    {
        // Prepare a select statement (формируем строку запроса пароля)
        $sql = "SELECT password FROM users WHERE username = '".$username."'";
        if($rows = mysqli_query($link, $sql)) // считываем строки ответа
        {
            if( $row = mysqli_fetch_row($rows)) // получаем 0ю строку ответа
            {   // 0й элемент 0й строки должен содержать пароль
                var_export($row);
                if($row[0] === $password) // если равен введенному, авторизуемся 
                {   // 1й строки быть не должно, т.к. другого пароля не полагается
                    if(empty(mysqli_fetch_row($rows)))
                    {
                        mysqli_free_result($rows); // очищаем результаты
                        
                        // Store data in session variables (запоминаем переменные сессии)
                        $_SESSION["loggedin"] = true;
                        $_SESSION["username"] = $username;
                        $_SESSION["link"] = $link;
                        
                        // считываем роль: возвращаемого значения нет, если ОК
                      echo setrole_by_username($username, $link);                     
                        session_start();
                        //перенаправляем на страницу приветствия
                        header("location: Shop.php"); 
                    }
                    else
                    {
                        // заполняем переменную ошибки, если пароль неправильно считан
                        $password_err = "Ошибка считывания пароля из базы данных!";
                    }
                }
                else
                {   // переменная ошибки для отображения на форме
                    $password_err = "Введен неправильный пароль!";
                }
            }
            else
            {
                // переменная ошибки для отображения на форме
                $username_err = "Введено несуществующее имя пользователя";
            }
        }
        else
        {
            echo "login.php: Запрос к базе данных не выполнен!";
        }
    }
    // Close connection (закрываем соединение к БД)
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

<style>

body{background:url(log.jpg) no-repeat center;
  background-size: 100%;
}

.container{
    padding-top:7%;
}
/* Form Style */
.form-horizontal{
 background: #fff;
 padding-bottom: 40px;
 border-radius: 15px;
 text-align: center;
}
.form-horizontal .heading{
 display: block;
 font-size: 35px;
 font-weight: 700;
 padding: 35px 0;
 border-bottom: 1px solid #f0f0f0;
 margin-bottom: 30px;
}
.form-horizontal .form-group{
 padding: 0 40px;
 margin: 0 0 25px 0;
 position: relative;
}
.form-horizontal .form-control{
 background: #f0f0f0;
 border: none;
 border-radius: 20px;
 box-shadow: none;
 padding: 0 20px 0 45px;
 height: 40px;
 transition: all 0.3s ease 0s;
}
.form-horizontal .form-control:focus{
 background: #e0e0e0;
 box-shadow: none;
 outline: 0 none;
}
.form-horizontal .form-group i{
 position: absolute;
 top: 12px;
 left: 60px;
 font-size: 17px;
 color: #c8c8c8;
 transition : all 0.5s ease 0s;
}
.form-horizontal .form-control:focus + i{
 color: #00b4ef;
}
.form-horizontal .fa-question-circle{
 display: inline-block;
 position: absolute;
 top: 12px;
 right: 60px;
 font-size: 20px;
 color: #808080;
 transition: all 0.5s ease 0s;
}
.form-horizontal .fa-question-circle:hover{
 color: #000;
}
.form-horizontal .main-checkbox{
 float: left;
 width: 20px;
 height: 20px;
 background: #11a3fc;
 border-radius: 50%;
 position: relative;
 margin: 5px 0 0 5px;
 border: 1px solid #11a3fc;
}
.form-horizontal .main-checkbox label{
 width: 20px;
 height: 20px;
 position: absolute;
 top: 0;
 left: 0;
 cursor: pointer;
}
.form-horizontal .main-checkbox label:after{
 content: "";
 width: 10px;
 height: 5px;
 position: absolute;
 top: 5px;
 left: 4px;
 border: 3px solid #fff;
 border-top: none;
 border-right: none;
 background: transparent;
 opacity: 0;
 -webkit-transform: rotate(-45deg);
 transform: rotate(-45deg);
}
.form-horizontal .main-checkbox input[type=checkbox]{
 visibility: hidden;
}
.form-horizontal .main-checkbox input[type=checkbox]:checked + label:after{
 opacity: 1;
}
.form-horizontal .text{
 float: left;
 margin-left: 7px;
 line-height: 20px;
 padding-top: 5px;
 text-transform: capitalize;
}
.form-horizontal .btn{
 float: right;
 font-size: 14px;
 color: #fff;
 background: #00b4ef;
 border-radius: 30px;
 padding: 10px 25px;
 border: none;
 text-transform: capitalize;
 transition: all 0.5s ease 0s;
}
@media only screen and (max-width: 479px){
 .form-horizontal .form-group{
 padding: 0 25px;
 }
 .form-horizontal .form-group i{
 left: 45px;
 }
 .form-horizontal .btn{
 padding: 10px 20px;
 }
 /*-------------*/
 #btn{
 position:absolute;
 top: 50vh;
 left: 50vw;
 z-index:1;
}
#content_window{
 position:absolute;
 height:100vh;
 width:100vw;
 z-index:10;
 background:lightgrey;
 display:none;
}
}

</style>

<div class="container">
 <div class="row">

 <div class="col-md-offset-3 col-md-6">
 <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
 <span class="heading">АВТОРИЗАЦИЯ</span>
 <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
 <input type="text"   name="username" class="form-control" id="inputEmail" placeholder="Login" value="<?php echo $username; ?>">
 <span class="help-block"><?php echo $username_err; ?></span>

 <i class="fa fa-user"></i>
 </div>
 <div class="form-group help">
 <input type="password" type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
 <span class="help-block"><?php echo $password_err; ?></span>

 <i class="fa fa-lock"></i>
 </div>
 <div class="form-group">
                <input type="submit" class="btn btn-default btn-lg btn-block" value="Вход">
                <input type="button" class="btn btn-default btn-lg btn-block"  value="Войти как гость" onclick="window.location.href = 'guest_mainpage.php';">
                <input type="button" class="btn btn-default btn-lg btn-block" value="Зарегистрироваться" onclick="window.location.href = 'CRUD_create_user.php';">
</div>
 </form>
 </div>

 </div><!-- /.row -->
</div><!-- /.container -->
</body>
</html>
 

