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

// пытаемся добавить данные //////////////////////////////////
// (определяем и очищаем переменные)
$T_E_Name = $T_E_Proizvod = $T_E_size  = $T_E_Color = $T_E_Fun = $T_E_Kol_vo_Komf = $T_E_Klass = $T_E_prise = $image = "";
$T_E_Name_err = $T_E_Proizvod_err = $T_E_size_err  = $T_E_Color_err = $T_E_Fun_err = $T_E_Kol_vo_Komf_err = $T_E_Klass_err = $T_E_prise_err = $image_err = "";
 
// Processing form data when form is submitted
// (обрабатываем запрос после нажатия отправки пользователем) 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    //Проверяем введенное название
    $input_T_E_Name = trim($_POST["T_E_Name"]);
    if(empty($input_T_E_Name))
    {
        $T_E_Name_err = "Вы забыли написать название";
    }
    else
    {
        $T_E_Name = $input_T_E_Name;
    }
    //Проверяем название бренда
    $input_T_E_Proizvod = trim($_POST["T_E_Proizvod"]);
    if($input_T_E_Proizvod == "")
    {
        $T_E_Proizvod_err = "Вы забыли выбрать производителя";
    }
    else
    {
        $T_E_Proizvod = $input_T_E_Proizvod;
    }
    //Проверяем объем
    $input_T_E_size = trim($_POST["T_E_size"]);
    if(empty($input_T_E_size))
    {
        $T_E_size_err = "Вы забыли выбрать размер";
    }
   
    else
    {
        $T_E_size = $input_T_E_size;
    }



    //Проверяем тип разморозки
    $input_T_E_Color = trim($_POST["T_E_Color"]);
    if($input_T_E_Color == "")
    {
        $T_E_Color_err = "Вы забыли выбрать цвет";
    }
    else
    {
        $T_E_Color = $input_T_E_Color;
    }



    // Validate T_E_Fun (проверяем энергопотребление)
    $input_T_E_Fun = trim($_POST["T_E_Fun"]);
    if(empty($input_T_E_Fun))
    {
        $T_E_Fun_err = "Вы забыли написать особенности плиты";
    }
 
    else
    {
        $T_E_Fun = $input_T_E_Fun;
    }


    // Validate T_E_Kol_vo_Komf (проверяем размеры)
    $input_T_E_Kol_vo_Komf = trim($_POST["T_E_Kol_vo_Komf"]);
echo $input_T_E_Kol_vo_Komf;
    if(empty($input_T_E_Kol_vo_Komf))
    {
        $T_E_Kol_vo_Komf_err = "Вы забыли выбрать количество конфорок";
        
    }
    else
    {
        $T_E_Kol_vo_Komf = $input_T_E_Kol_vo_Komf;
    }
    
    // Validate T_E_Klass (проверяем цвет)
    $input_T_E_Klass = trim($_POST["T_E_Klass"]);
    if($input_T_E_Klass == "")
    {
        $T_E_Klass_err = "Вы забыли выбрать тип";
    }
    else
    {
        $T_E_Klass = $input_T_E_Klass;
    }
    // Validate T_E_prise (проверяем цену)
    $input_T_E_prise = trim($_POST["T_E_prise"]);
    if(empty($input_T_E_prise))
    {
        $T_E_prise_err = "Вы забыли написать цену";
    }
    elseif(!filter_var($input_T_E_prise, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+$/"))))
    {
        $T_E_prise_err = "Введите правильную цену";
    } 
    else
    {
        $T_E_prise = $input_T_E_prise;
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
    if(empty($T_E_Name_err) && empty($T_E_Proizvod_err)  && empty($T_E_Color_err) && empty($T_E_Klass_err) && empty($T_E_prise_err) && empty($image_err))
    {       
        $Gres=mysqli_query($link,"SELECT T_E_Name FROM E_Plit WHERE T_E_Name='$T_E_Name'");       // $count= mysqli_num_rows($Gres);
        $Gcount= $Gres->affected_rows;
              
         if($Gres->num_rows == '0')
         {
        //echo "до подключения";
        // Prepare an insert statement (подготавливаем запрос: символы ? для подстановки параметров)
        $sql = "INSERT INTO E_Plit (T_E_Name, T_E_Proizvod, T_E_size, T_E_Color, T_E_Fun, T_E_Kol_vo_Komf, T_E_Klass, T_E_prise, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
       echo "157";
        if($stmt = mysqli_prepare($link, $sql))
        {
            // (связываем паременные в условии запроса: s - строка, i - целое число)
            mysqli_stmt_bind_param($stmt, "siiisiiss", $param_T_E_Name, $param_T_E_Proizvod, $param_T_E_size, $param_T_E_Color, $param_T_E_Fun, $param_T_E_Kol_vo_Komf, $param_T_E_Klass, $param_T_E_prise, $image);
            
            // Set parameters (запоминаем параметры)
            $param_T_E_Name = $T_E_Name;
            $param_T_E_Proizvod = $T_E_Proizvod;
            $param_T_E_size = $T_E_size;
            $param_T_E_Color = $T_E_Color;
            $param_T_E_Fun = $T_E_Fun;
            $param_T_E_Kol_vo_Komf = $T_E_Kol_vo_Komf;
            $param_T_E_Klass= $T_E_Klass;
            $param_T_E_prise= $T_E_prise;
            $param_image = $image;
echo "<br/>" . "param_T_E_Name=" . $param_T_E_Name . "<br/>" . "param_T_E_Proizvod=" . $param_T_E_Proizvod . "<br/>" . "param_T_E_size=" . $param_T_E_size . "<br/>" . "param_T_E_Color=" . $param_T_E_Color . "<br/>" . "param_T_E_Fun=" . $param_T_E_Fun . "<br/>" . "param_T_E_Kol_vo_Komf=" . $param_T_E_Kol_vo_Komf . "<br/>" . "param_T_E_Klass=" . $param_T_E_Klass . "<br/>" . "param_image=" . $param_image . "<br/>";

            
            //Пытаемся выполнить запрос
            if(mysqli_stmt_execute($stmt))
            {
                // данные записаны, переходим на страницу login.php
                header("location: login.php");
                exit();
            }
            else
            {
                echo "данные не записаны!!(( Попробуйте повторить попытку снова!!";
            }
        }
        else
        {
            $thread_id = mysqli_thread_id($link);
        }
    }
    else{
        $user_err="Такая плита  уже существует";
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
                <span class="heading">Добавление новой электричекой плиты</span>>
                    <p>Заполните данные и отправьте на добавление в базу данных!!</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($T_E_Name_err)) ? 'has-error' : ''; ?>">
                            <label>Название</label>
                            <input type="text" name="T_E_Name" class="form-control" value="<?php echo $T_E_Name; ?>">
                            <span class="help-block"><?php echo $T_E_Name_err;?></span>
                            <span class="help-block"><?php echo $user_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($T_E_Proizvod_err)) ? 'has-error' : ''; ?>">
                            <label>Производитель</label>
                            <select class="form-control" name="T_E_Proizvod">;
                             <option>Выберите производителя</option>
                            <?php
                            $result_spisok = mysqli_query($link,"SELECT * FROM Brand_V_Plit");

                            while($row_brand = mysqli_fetch_array($result_spisok)){
                            echo '<option value="'.$row_brand['Brand_id'].'">' . $row_brand['Brand_name']. '</option>';                   
                            }
                            ?>
                            </select>
                        </div>


                        <div class="form-group <?php echo (!empty($T_E_size_err)) ? 'has-error' : ''; ?>">
                        <label>Рзмер</label>
                            <select class="form-control" name="T_E_size">;
                            <option>Выберите размер</option>
                            <?php
                            $result_size = mysqli_query($link,"SELECT * FROM Razmer");

                            while($row_size = mysqli_fetch_array($result_size)){
                            echo '<option value="'.$row_size['Razmer_id'].'">' . $row_size['RazmerCM']. '</option>';                   
                            }
                            ?>
                            </select>
                        </div>


                        <div class="form-group <?php echo (!empty($T_E_Color_err)) ? 'has-error' : ''; ?>">
                            <label>Цвет</label>
                            <select class="form-control" name="T_E_Color">;
                            <?php
                            $result_color = mysqli_query($link,"SELECT * FROM Color");

                            while($row_color = mysqli_fetch_array($result_color)){
                            echo '<option value="'.$row_color['Color_id'].'">' . $row_color['Color_name']. '</option>';                   
                            }
                            ?>
                            </select>
                        </div>

                        <div class="form-group <?php echo (!empty($T_E_Fun_err)) ? 'has-error' : ''; ?>">
                            <label>Информация</label>
                            <input type="text" name="T_E_Fun" class="form-control" value="<?php echo $T_E_Fun; ?>">
                            <span class="help-block"><?php echo $T_E_Fun_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($T_E_Kol_vo_Komf_err)) ? 'has-error' : ''; ?>">
                            <label>Количество конфорок</label>
                            <select class="form-control" name="T_E_Kol_vo_Komf">;
                                                         <option>Выберите количество конфорок</option>

                            <?php
                            $result_KK = mysqli_query($link,"SELECT * FROM Kol_Vo_Komforok");

                            while($row_KK = mysqli_fetch_array($result_KK)){
                            echo '<option value="'.$row_KK['Komfork_id'].'">' . $row_KK['Komfork_name']. '</option>';                   
                            }
                            ?>
                            </select>
                        </div>

                        <div class="form-group <?php echo (!empty($T_E_Klass_err)) ? 'has-error' : ''; ?>">
                            <label>Тип</label>
                            <select class="form-control" name="T_E_Klass">;
                          <option>Выберите тип</option>
                            <?php
                            $result_klass = mysqli_query($link,"SELECT * FROM EKlass");

                            while($row_klass = mysqli_fetch_array($result_klass)){
                            echo '<option value="'.$row_klass['EKlass_id'].'">' . $row_klass['EKlass_name']. '</option>';                   
                            }
                            ?>
                            </select>
                        </div>

                        <div class="form-group <?php echo (!empty($T_E_prise_err)) ? 'has-error' : ''; ?>">
                            <label>Цена</label>
                            <input type="text" name="T_E_prise" class="form-control" value="<?php echo $T_E_prise; ?>">
                            <span class="help-block"><?php echo $T_E_prise_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
                            <label>Ссылка на картинку</label>
                            <input type="text" name="image" class="form-control" value="<?php echo $image; ?>">
                            <span class="help-block"><?php echo $image_err;?></span>
                        </div>

                        <input type="submit" class="btn btn-default btn-lg btn-block" value="Добавит">
                        <a href="Gallary_E_Plit.php" class="btn btn-default btn-lg btn-block">Назад</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>