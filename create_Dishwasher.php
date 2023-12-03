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
$Base_M_Brand = $Base_M_Type = $Base_M_Drying_Type = $Base_M_Width = $Base_M_Kolvo = $Base_M_Water = $Base_M_price = $image = "";
$Base_M_Brand_err = $Base_M_Type_err = $Base_M_Drying_Type_err = $Base_M_Width_err = $Base_M_Kolvo_err = $Base_M_Water_err = $Base_M_price_err = $image = "";


// Validate first_name (проверяем фамилию)
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $input_Base_M_Brand = trim($_POST["Base_M_Brand"]);
    if(empty($input_Base_M_Brand))
    {
        $Base_M_Brand_err = "Please enter a name.";
    }
    elseif(!filter_var($input_Base_M_Brand, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9\s]+$/"))))
    {
        $Base_M_Brand_err = "Please enter a valid name.";
    } 
    else
    {
        $Base_M_Brand = $input_Base_M_Brand;
    }
    
    // Validate Base_M_Type
    $input_Base_M_Type = trim($_POST['Base_M_Type'] );
    if(empty($input_Base_M_Type))
    {
        $Base_M_Type_err = "Please enter a Base_M_Type.";     
    }
    else
    {
        $Base_M_Type = $input_Base_M_Type;
    }
    
    // Validate Base_M_Drying_Type
    $input_Base_M_Drying_Type = trim($_POST['Base_M_Drying_Type']);
    if(empty($input_Base_M_Drying_Type))
    {
        $Base_M_Drying_Type_err = "Please enter the Base_M_Drying_Type.";     
    }
    else
    {
        $Base_M_Drying_Type = $input_Base_M_Drying_Type;
    }
        // Validate Base_M_Width
    $input_Base_M_Width = trim($_POST["Width_name"]);
    if(empty($input_Base_M_Width))
    {
        $Base_M_Width_err = "Please enter the Width_name.";     
    }
    else
    {
        $Base_M_Width = $input_Base_M_Width;
    }
        // Validate Base_M_Kolvo
    $input_Base_M_Kolvo = trim($_POST['Base_M_Kolvo']);
    if(empty($input_Base_M_Kolvo))
    {
        $Base_M_Kolvo_err = "Please enter the Base_M_Kolvo.";     
    }
    else
    {
        $Base_M_Kolvo = $input_Base_M_Kolvo;
    }
        // Validate Base_M_Water
    $input_Base_M_Water = trim($_POST['Base_M_Water']);
    if(empty($input_Base_M_Water))
    {
        $Base_M_Water_err = "Please enter the Base_M_Water.";     
    }
    else
    {
        $Base_M_Water = $input_Base_M_Water;
    }
            // Validate Base_M_price
    $input_Base_M_price = trim($_POST['Base_M_price']);
    if(empty($input_Base_M_price))
    {
        $Base_M_price_err = "Please enter the Base_M_price.";     
    }
    else
    {
        $Base_M_price = $input_Base_M_price;
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
    if(empty($Base_M_Brand_err))
    {
        $s = "SELECT Base_M_Brand FROM DB_Dishwasher WHERE Base_M_Brand ='$Base_M_Brand'";
        echo $s;
        $Ares = mysqli_query($link, $s);
        /*  $count= mysqli_num_rows($Gres);
         echo $count; */

        $Acount = $Ares->affected_rows;
        echo "<br/>" . $Base_M_Brand;
        //echo "<br/>".(isset($link) ?"1":"0");
        echo "<br/>" . $Ares->num_rows;
        if ($Ares->num_rows >= 1) {
            /*   if ($count>= 1) { */

            $name_if = "Такое название уже существует";
            echo $name_if;
        } else {
            //echo " ошибка до 151";

            // Prepare an insert statement (подготавливаем запрос: символы ? для подстановки параметров)
            $sql = "INSERT INTO DB_Dishwasher (Base_M_Brand,Base_M_Type,Base_M_Drying_Type,Base_M_Width,Base_M_Kolvo,Base_M_Water,Base_M_price,image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        }
        if($stmt = mysqli_prepare($link, $sql))
        {
            echo "<br/>" . $sql . "</br>";
            // Bind variables to the prepared statement as parameters
            // (связываем паременные в условии запроса: s - строка, i - целое число)
            mysqli_stmt_bind_param($stmt, "siiiiiss", $param_Base_M_Brand, $param_Base_M_Type, $param_Base_M_Drying_Type, $param_Base_M_Width, $param_Base_M_Kolvo, $param_Base_M_Water, $param_Base_M_price, $param_image);
            
            // Set parameters (запоминаем параметры)
            $param_Base_M_Brand = $Base_M_Brand;
            $param_Base_M_Type = $Base_M_Type;
            $param_Base_M_Drying_Type = $Base_M_Drying_Type;
            $param_Base_M_Width = $Base_M_Width;
            $param_Base_M_Kolvo = $Base_M_Kolvo;
            $param_Base_M_Water = $Base_M_Water;
            $param_Base_M_price = $Base_M_price;
            $param_image = $image;
            
            echo "<br/>" . "param_Base_M_Brand=" . $param_Base_M_Brand . "<br/>" . "param_Base_M_Type=" . $param_Base_M_Type . "<br/>" . "param_Base_M_Drying_Type=" . $param_Base_M_Drying_Type . "<br/>" . "param_Base_M_Width=" . $param_Base_M_Width . "<br/>" . "param_Base_M_Kolvo=" . $param_Base_M_Kolvo . "<br/>" . "param_Base_M_Water=" . $param_Base_M_Water . "<br/>" . "param_Base_M_price=" . $param_Base_M_price . "<br/>";
            /* ------------------------------------------------------------------------------------- */

            
            // Attempt to execute the prepared statement (пытаемся выполнить запрос)
            if(mysqli_stmt_execute($stmt))
            {
                // данные записаны, переходим на страницу login_welcome.php
                header("location: Gallary_E_Machine.php");
                exit();
            }
            else
            {
                echo "(mysqli_stmt_gxecute) Стиральная машина  не добавлена!!!";
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

 if(isset($_FILES['image'])){
     $errors= array();
     $file_name = $_FILES['image']['name'];
     $file_size =$_FILES['image']['size'];
     $file_tmp =$_FILES['image']['tmp_name'];
     $file_type=$_FILES['image']['type'];
     $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
     
     $expensions= array("jpeg","jpg","png");
     
     if(in_array($file_ext,$expensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
     }
     
     if($file_size > 2097152){
        $errors[]='File size must be excately 2 MB';
     }
     
     if(empty($errors)==true){
        move_uploaded_file($file_tmp,"images/".$file_name);
        echo "Success";
     }else{
        print_r($errors);
     }
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
                        
                        <div class="form-group <?php echo (!empty($Base_M_Brand_err)) ? 'has-error' : ''; ?>">
                            <label>Название</label>
                            <input type="text" name="Base_M_Brand" class="form-control" value="<?php echo $Base_M_Brand; ?>">

                            <span class="help-block"><?php echo $Base_M_Brand_err; ?></span>
                            <span class="help-block" style="color: red;"><?php echo $name_if; ?></span>

                        </div>
                        <!-- ------------------------------------ -->
                        <div class="form-group">
                            <label>Тип</label>
                            <?php
                            $sql1 = "SELECT * FROM Type_size";
                            $result_Type = mysqli_query($link, $sql1);
                            echo "<select class='form-control' name='Base_M_Type'><option selected >Выбор типа</option>";

                            while ($row_Type = mysqli_fetch_array($result_Type)) {
                                
                                echo '<option value="'.$row_Type['Type2_id'].'">'.$row_Type['Type2_name'].'</option>';
                                
                                
                            }
                            ?>
                            </select>

                        </div>
                        <!-- --------------------------------------- -->
                        <div class="form-group ">
                            <label>Тип сушки</label>
                            <?php
                            $sql2 = "SELECT * FROM Type_Drying";
                            $result_Type_Drying = mysqli_query($link, $sql2);
                            echo "<select class='form-control' name='Base_M_Drying_Type'><option selected >Функция сушки</option>";
                            while ($row_Type_Drying = mysqli_fetch_array($result_Type_Drying)) {
                                echo '<option value="'.$row_Type_Drying['Type_Drying_id'].'">'.$row_Type_Drying['Type_Drying_name'] . '</option>';
                            }
                            ?>
                            </select>
                        </div>
                        <!-- ------------------------------- -->
                        <div class="form-group ">
                            <label>Ширина</label>
                            <?php
                            $sql3 = "SELECT * FROM Width";
                            $result_Width = mysqli_query($link, $sql3);
                            echo "<select class='form-control' name='Width_name'><option selected >Выбор ширины </option>";
                            while ($row_Width = mysqli_fetch_array($result_Width)) {
                                echo '<option value="'.$row_Width[0].'">'.$row_Width[1].'</option>';
                            }
                            ?>
                            </select>
                        </div>

                        <!-- ------------------------------------------- -->
                        <div class="form-group">
                            <label>Количество комплектов посуды</label>
                            <?php
                            $sql4 = "SELECT * FROM Kolvo";
                            $result_Kolvo = mysqli_query($link, $sql4);
                            echo "<select class='form-control' name='Base_M_Kolvo'><option selected >Выбор количества комплектов посуды </option>";

                            while ($row_Kolvo = mysqli_fetch_array($result_Kolvo)) {
                                echo '<option value="'.$row_Kolvo['Kolvo_id'].'">'.$row_Kolvo['Kolvo_name'].'</option>';
                            }
                            ?>
                            </select>
                        </div>
                        <!-- -------------------------------- -->
                        <div class="form-group">
                            <label>Расход воды</label>
                            <?php
                            $sql5 = "SELECT * FROM Water";
                            $result_Water = mysqli_query($link, $sql5);
                            echo "<select class='form-control' name='Base_M_Water'><option selected >Расход воды </option>";
                            while ($row_Water = mysqli_fetch_array($result_Water)) {
                                echo '<option value="'.$row_Water['Water_id'].'">'.$row_Water['Water_name'].'</option>';
                            }
                            ?>
                            </select>
                            <!-- -------------------------------------- -->
                        </div>
                        <div class="form-group <?php echo (!empty($Base_M_price_err)) ? 'has-error' : ''; ?>">
                            <label>Цена</label>
                            <input type="text" name="Base_M_price" class="form-control" value="<?php echo $Base_M_price; ?>">
                            <span class="help-block"><?php echo $Base_M_price_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
                            <label>Ссылка на картинку</label>
                            <input type="text" name="image" class="form-control" value="<?php echo $image; ?>">
                            <span class="help-block"><?php echo $image_err;?></span>
                        </div>
                        <!-- ------------------------------------- -->
                        <input type="submit" class="btn btn-default btn-lg btn-block" value="Добавить">
                        <a href="Gallary_E_Machine.php" class="btn btn-default btn-lg btn-block">Cancel</a>
                        </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
