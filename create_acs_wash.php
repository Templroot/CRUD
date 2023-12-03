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

// Define variables and initialize with empty values
// (определяем и очищаем переменные)
$Base_N_Brand = $Base_N_Type = $Base_N_Intend = $Base_N_Max_pressure = $Base_N_Max_t = $Base_N_Length = $Base_N_Price = $image = "";
$Base_N_Brand_err = $Base_N_Type_err = $Base_N_Intend_err = $Base_N_Max_pressure_err = $Base_N_Max_t_err = $Base_N_Length_err = $Base_N_Price_err = $image = "";


// Validate first_name (проверяем фамилию)
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $input_Base_N_Brand = trim($_POST["Base_N_Brand"]);
    if(empty($input_Base_N_Brand))
    {
        $Base_N_Brand_err = "Please enter a name.";
    }
    elseif(!filter_var($input_Base_N_Brand, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9\s]+$/"))))
    {
        $Base_N_Brand_err = "Please enter a valid name.";
    } 
    else
    {
        $Base_N_Brand = $input_Base_N_Brand;
    }
    
    // Validate Base_N_Type
    $input_Base_N_Type = trim($_POST['Base_N_Type'] );
    if(empty($input_Base_N_Type))
    {
        $Base_N_Type_err = "Please enter a Base_N_Type.";     
    }
    else
    {
        $Base_N_Type = $input_Base_N_Type;
    }
    
    // Validate Base_N_Intend
    $input_Base_N_Intend = trim($_POST['Base_N_Intend']);
    if(empty($input_Base_N_Intend))
    {
        $Base_N_Intend_err = "Please enter the Base_N_Intend.";     
    }
    else
    {
        $Base_N_Intend = $input_Base_N_Intend;
    }
        // Validate Base_N_Max_pressure
    $input_Base_N_Max_pressure = trim($_POST["Width_name"]);
    if(empty($input_Base_N_Max_pressure))
    {
        $Base_N_Max_pressure_err = "Please enter the Width_name.";     
    }
    else
    {
        $Base_N_Max_pressure = $input_Base_N_Max_pressure;
    }
        // Validate Base_N_Max_t
    $input_Base_N_Max_t = trim($_POST['Base_N_Max_t']);
    if(empty($input_Base_N_Max_t))
    {
        $Base_N_Max_t_err = "Please enter the Base_N_Max_t.";     
    }
    else
    {
        $Base_N_Max_t = $input_Base_N_Max_t;
    }
        // Validate Base_N_Length
    $input_Base_N_Length = trim($_POST['Base_N_Length']);
    if(empty($input_Base_N_Length))
    {
        $Base_N_Length_err = "Please enter the Base_N_Length.";     
    }
    else
    {
        $Base_N_Length = $input_Base_N_Length;
    }
            // Validate Base_N_Price
    $input_Base_N_Price = trim($_POST['Base_N_Price']);
    if(empty($input_Base_N_Price))
    {
        $Base_N_Price_err = "Please enter the Base_N_Price.";     
    }
    else
    {
        $Base_N_Price = $input_Base_N_Price;
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

    
    // Check input errors before inserting in database
    // (если исходные данные введены, добавляем запись в БД)
    if(empty($Base_N_Brand_err))
    {
        $s = "SELECT Base_N_Brand FROM DB_Hose WHERE Base_N_Brand ='$Base_N_Brand'";
        echo $s;
        $Ares = mysqli_query($link, $s);
        /*  $count= mysqli_num_rows($Gres);
         echo $count; */

        $Acount = $Ares->affected_rows;
        echo "<br/>" . $Base_N_Brand;
        //echo "<br/>".(isset($link) ?"1":"0");
        echo "<br/>" . $Ares->num_rows;
        if ($Ares->num_rows >= 1) {
            /*   if ($count>= 1) { */

            $name_if = "Такое название уже существует";
            echo $name_if;
        } else {
            //echo " ошибка до 151";

            // Prepare an insert statement (подготавливаем запрос: символы ? для подстановки параметров)
            $sql = "INSERT INTO DB_Hose (Base_N_Brand,Base_N_Type,Base_N_Intend,Base_N_Max_pressure,Base_N_Max_t,Base_N_Length,Base_N_Price,image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        }
        if($stmt = mysqli_prepare($link, $sql))
        {
            echo "<br/>" . $sql . "</br>";
            // Bind variables to the prepared statement as parameters
            // (связываем паременные в условии запроса: s - строка, i - целое число)
            mysqli_stmt_bind_param($stmt, "siiiiiss", $param_Base_N_Brand, $param_Base_N_Type, $param_Base_N_Intend, $param_Base_N_Max_pressure, $param_Base_N_Max_t, $param_Base_N_Length, $param_Base_N_Price, $param_image);
            
            // Set parameters (запоминаем параметры)
            $param_Base_N_Brand = $Base_N_Brand;
            $param_Base_N_Type = $Base_N_Type;
            $param_Base_N_Intend = $Base_N_Intend;
            $param_Base_N_Max_pressure = $Base_N_Max_pressure;
            $param_Base_N_Max_t = $Base_N_Max_t;
            $param_Base_N_Length = $Base_N_Length;
            $param_Base_N_Price = $Base_N_Price;
            $param_image = $image;
            
            echo "<br/>" . "param_Base_N_Brand=" . $param_Base_N_Brand . "<br/>" . "param_Base_N_Type=" . $param_Base_N_Type . "<br/>" . "param_Base_N_Intend=" . $param_Base_N_Intend . "<br/>" . "param_Base_N_Max_pressure=" . $param_Base_N_Max_pressure . "<br/>" . "param_Base_N_Max_t=" . $param_Base_N_Max_t . "<br/>" . "param_Base_N_Length=" . $param_Base_N_Length . "<br/>" . "param_Base_N_Price=" . $param_Base_N_Price . "<br/>";
            /* ------------------------------------------------------------------------------------- */

            
            // Attempt to execute the prepared statement (пытаемся выполнить запрос)
            if(mysqli_stmt_execute($stmt))
            {
                // данные записаны, переходим на страницу login_welcome.php
                header("location: Gallary_acs_wash.php");
                exit();
            }
            else
            {
                echo "(mysqli_stmt_gxecute) Аксессуар машина  не добавлен!!!";
            }
        }
        else
        {
            echo "Пользователь не зарегистрирован,запрос не выполнен!!(<br/>";
            $thread_id = mysqli_thread_id($link);
            echo "thread_id=" . $thread_id . "<br/>";
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
        }    
        </style>

</head>
<body>
    <div class="container_tovar">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="form-horizontal">
                    <div class="heading">
                        <h2>Создание новой записи</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        
                        <div class="form-group <?php echo (!empty($Base_N_Brand_err)) ? 'has-error' : ''; ?>">
                            <label>Название</label>
                            <input type="text" name="Base_N_Brand" class="form-control" value="<?php echo $Base_N_Brand; ?>">

                            <span class="help-block"><?php echo $Base_N_Brand_err; ?></span>
                            <span class="help-block" style="color: red;"><?php echo $name_if; ?></span>

                        </div>
                        <!-- ------------------------------------ -->
                        <div class="form-group">
                            <label>Тип</label>
                            <?php
                            $sql1 = "SELECT * FROM Type_hose";
                            $result_Type = mysqli_query($link, $sql1);
                            echo "<select class='form-control' name='Base_N_Type'><option selected >Выбор типа</option>";

                            while ($row_Type = mysqli_fetch_array($result_Type)) {
                                
                                echo '<option value="'.$row_Type['Type3_id'].'">'.$row_Type['Type3_name'].'</option>';
                                
                                
                            }
                            ?>
                            </select>

                        </div>
                        <!-- --------------------------------------- -->
                        <div class="form-group ">
                            <label>Предназначен: </label>
                            <?php
                            $sql2 = "SELECT * FROM Intend";
                            $result_Intend = mysqli_query($link, $sql2);
                            echo "<select class='form-control' name='Base_N_Intend'><option selected >Выбор предназначения </option>";
                            while ($row_Intend = mysqli_fetch_array($result_Intend)) {
                                echo '<option value="'.$row_Intend['Intend_id'].'">'.$row_Intend['Intend_name'] . '</option>';
                            }
                            ?>
                            </select>
                        </div>
                        <!-- ------------------------------- -->
                        <div class="form-group">
                            <label>Максимальная давление</label>
                            <?php
                            $sql4 = "SELECT * FROM Max_pressure";
                            $result_Max_Load = mysqli_query($link, $sql4);
                            echo "<select class='form-control' name='Base_N_Max_pressure'><option selected >Выбор максимального давления </option>";

                            while ($row_Max_Load = mysqli_fetch_array($result_Max_Load)) {
                                echo '<option value="'.$row_Max_Load['Max_pressure_id'].'">'.$row_Max_Load['Max_pressure_name'].'</option>';
                            }
                            ?>
                            </select>
                        </div>

                        <!-- ------------------------------------------- -->
                        <div class="form-group">
                            <label>Максимальная температура</label>
                            <?php
                            $sql4 = "SELECT * FROM Max_t";
                            $result_Max_Load = mysqli_query($link, $sql4);
                            echo "<select class='form-control' name='Base_N_Max_t'><option selected >Выбор максимальной температуры </option>";

                            while ($row_Max_Load = mysqli_fetch_array($result_Max_Load)) {
                                echo '<option value="'.$row_Max_Load['Max_t_id'].'">'.$row_Max_Load['Max_t_name'].'</option>';
                            }
                            ?>
                            </select>
                        </div>
                        <!-- -------------------------------- -->
                        <div class="form-group">
                            <label>Длина</label>
                            <?php
                            $sql5 = "SELECT * FROM Length";
                            $result_Speed = mysqli_query($link, $sql5);
                            echo "<select class='form-control' name='Base_N_Length'><option selected >Выбор скорости вращения  </option>";
                            while ($row_Speed = mysqli_fetch_array($result_Speed)) {
                                echo '<option value="'.$row_Speed['Length_id'].'">'.$row_Speed['Length_name'].'</option>';
                            }
                            ?>
                            </select>
                            <!-- -------------------------------------- -->
                        </div>
                        <div class="form-group <?php echo (!empty($Base_N_Price_err)) ? 'has-error' : ''; ?>">
                            <label>Цена</label>
                            <input type="text" name="Base_N_Price" class="form-control" value="<?php echo $Base_N_Price; ?>">
                            <span class="help-block"><?php echo $Base_N_Price_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
                            <label>Ссылка на картинку</label>
                            <input type="text" name="image" class="form-control" value="<?php echo $image; ?>">
                            <span class="help-block"><?php echo $image_err;?></span>
                        </div>
                        <!-- ------------------------------------- -->
                        <input type="submit" class="btn btn-default btn-lg btn-block" value="Добавить">
                        <a href="Gallary_acs_wash.php" class="btn btn-default btn-lg btn-block">Cancel</a>
                        </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
