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
header('Content-Type: text/html; charset=utf-8');
$thread_id = mysqli_thread_id($link);

// пытаемся добавить данные /
// (определяем и очищаем переменные)
$T_A_Name  =  $T_A_Fun = $T_A_Tip = $T_A_prise = $image = "";
$T_A_Name_err = $T_A_Fun_err  = $T_A_Tip_err = $T_A_prise_err = $image_err = "";
 
// Processing form data when form is submitted
// (обрабатываем запрос после нажатия отправки пользователем) 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    //Проверяем введенное название
    $input_T_A_Name = trim($_POST["T_A_Name"]);
    if(empty($input_T_A_Name))
    {
        $T_A_Name_err = "Вы забыли написать название";
    }
    else
    {
        $T_A_Name = $input_T_A_Name;
    }

    // Validate T_A_Fun (проверяем )
    $input_T_A_Fun = trim($_POST["T_A_Fun"]);
    if(empty($input_T_A_Fun))
    {
        $T_A_Fun_err = "Вы забыли написать особенности плиты";
    }
     else
    {
        $T_A_Fun = $input_T_A_Fun;
    }
    // Validate T_A_Tip (проверяем)
    $input_T_A_Tip = trim($_POST["T_A_Tip"]);
    if($input_T_A_Tip == "")
    {
        $T_A_Tip_err = "Вы забыли выбрать тип";
    }
    else
    {
        $T_A_Tip = $input_T_A_Tip;
    }
    // Validate T_A_prise (проверяем цену)
    $input_T_A_prise = trim($_POST["T_A_prise"]);
    if(empty($input_T_A_prise))
    {
        $T_A_prise_err = "Вы забыли написать цену";
    }
    elseif(!filter_var($input_T_A_prise, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+$/"))))
    {
        $T_A_prise_err = "Введите правильную цену";
    } 
    else
    {
        $T_A_prise = $input_T_A_prise;
    }
    // Validate image (проверяем изображение)
    $input_image = trim($_POST["image"]);
    if(empty($input_image))
    {
        $image_err = "Вставьте ссылку на картинку";
    }
    else
    {
        $image = $input_image;
    }
    // (если исходные данные введены, добавляем запись в БД)
    if(empty($T_A_Name_err))
    {       
        $Gres=mysqli_query($link,"SELECT T_A_Name FROM Accessories WHERE T_A_Name='$T_A_Name'");       // $count= mysqli_num_rows($Gres);
        $Gcount= $Gres->affected_rows;
              
         if($Gres->num_rows == '0')
         {
        //echo "до подключения";
        // Prepare an insert statement (подготавливаем запрос: символы ? для подстановки параметров)
        $sql = "INSERT INTO Accessories (T_A_Name, T_A_Tip, T_A_Fun, T_A_price, image) VALUES (?, ?, ?, ?, ?)";
       echo  $sql;
        if($stmt = mysqli_prepare($link, $sql))
        {echo "157";
            // (связываем паременные в условии запроса: s - строка, i - целое число)
            mysqli_stmt_bind_param($stmt, "sisss", $param_T_A_Name,$param_T_A_Tip, $param_T_A_Fun,  $param_T_A_prise, $param_image);   
            // Set parameters (запоминаем параметры)
            $param_T_A_Name = $T_A_Name;
            $param_T_A_Tip= $T_A_Tip;
            $param_T_A_Fun = $T_A_Fun;
            $param_T_A_prise= $T_A_prise;
            $param_image = $image;
echo  $param_T_A_Name. $param_T_A_Tip.$param_T_A_Fun. $param_T_A_prise.$param_image;
            
            //Пытаемся выполнить запрос
            if(mysqli_stmt_execute($stmt))
            {
                // данные записаны, переходим на страницу login.php
                header("location: login.php");
                exit();
            }
            else
            {
                echo "CRUD_create_fridge.php: данные не записаны!!(( Попробуйте повторить попытку снова!!";
            }
        }
        else
        {
            $thread_id = mysqli_thread_id($link);
        }
    }
    else{
        $user_err="Такая плита уже существует";
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
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel='stylesheet' href='CSS_FOR_CREATE_AND_UPDATE.css'/>   
     <style type="text/css">
    .body
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
                <span class="heading">Добавление нового аксессуара для плиты</span>
                    <p>Заполните данные и отправьте на добавление в базу данных!!</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($T_A_Name_err)) ? 'has-error' : ''; ?>">
                            <label>Название</label>
                            <input type="text" name="T_A_Name" class="form-control" value="<?php echo $T_A_Name; ?>">
                            <span class="help-block"><?php echo $T_A_Name_err;?></span>
                            <span class="help-block"><?php echo $user_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($T_A_Tip_err)) ? 'has-error' : ''; ?>">
                            <label>Тип</label>
                            <select class="form-control" name="T_A_Tip">;
                          <option>Выберите тип</option>
                            <?php
                            $result_klass = mysqli_query($link,"SELECT * FROM Tip_Plit");

                            while($row_klass = mysqli_fetch_array($result_klass)){
                            echo '<option value="'.$row_klass['Tip_Plit_id'].'">' . $row_klass['Tip_Plit_name']. '</option>';                   
                            }
                            ?>
                            </select>
                        </div>
                                              

                        <div class="form-group <?php echo (!empty($T_A_Fun_err)) ? 'has-error' : ''; ?>">
                            <label>Информация</label>
                            <input type="text" name="T_A_Fun" class="form-control" value="<?php echo $T_A_Fun; ?>">
                            <span class="help-block"><?php echo $T_A_Fun_err;?></span>
                        </div>
                                       <div class="form-group <?php echo (!empty($T_A_prise_err)) ? 'has-error' : ''; ?>">
                            <label>Цена</label>
                            <input type="text" name="T_A_prise" class="form-control" value="<?php echo $T_A_prise; ?>">
                            <span class="help-block"><?php echo $T_A_prise_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
                            <label>Ссылка на картинку</label>
                            <input type="text" name="image" class="form-control" value="<?php echo $image; ?>">
                            <span class="help-block"><?php echo $image_err;?></span>
                        </div>

                        <input type="submit" class="btn btn-default btn-lg btn-block" value="Добавить">
                        <a href="Gallary_A_Plit.php" class="btn btn-default btn-lg btn-block">Назад</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>