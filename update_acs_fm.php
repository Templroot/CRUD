<?php
session_start();
$role_id = $_SESSION["role_id"];
// Include config file
require_once "login_config.php";
if(($role_id != '1') && ($role_id != '2')){
    // запоминаем ошибку для отображения в файле CRUD_error.php
    $_SESSION["crud_error"] = "Недостаточно прав для изменения данных!!!";
    header("location: CRUD_error.php");
    exit;
}


$MR_Base_Acs_name = $MR_Base_Acs_userr = $MR_Base_Acs_disc = $MR_Base_Acs_price = $image = "";
$MR_Base_Acs_name_err = $MR_Base_Acs_userr_err = $MR_Base_Acs_disc_err = $MR_Base_Acs_price_err = $image_err = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"]))
{
    // Get hidden input value
    //--------------------------------
    $id = $_POST["id"];
    //--------------------------------
    
    // Validate MR_Base_Acs_name (проверяем наименование)
    $input_MR_Base_Acs_name = trim($_POST["MR_Base_Acs_name"]);
    if(empty($input_MR_Base_Acs_name))
    {
        $MR_Base_Acs_name_err = "Пожалуйста,введите название аксессуара";
    }
    else
    {
        $MR_Base_Acs_name = $input_MR_Base_Acs_name;
    }


    // Validate MR_Base_Acs_userr (проверяем совместимость)
    $input_MR_Base_Acs_userr = trim($_POST["MR_Base_Acs_userr"]);
    if($input_MR_Base_Acs_userr == " ")
    {
        $MR_Base_Acs_userr_err = "Пожалуйста, укажите совместимость";
    }
    else
    {
        $MR_Base_Acs_userr = $input_MR_Base_Acs_userr;
    }


    // Validate MR_Base_Acs_disc (проверяем описание)
    $input_MR_Base_Acs_disc = trim($_POST["MR_Base_Acs_disc"]);
    if(empty($input_MR_Base_Acs_disc))
    {
        $MR_Base_Acs_disc_err = "Пожалуйста, введите описание";
    }
    else
    {
        $MR_Base_Acs_disc = $input_MR_Base_Acs_disc;
    }

    // Validate MR_Base_Acs_price (проверяем цену)
    $input_MR_Base_Acs_price = trim($_POST["MR_Base_Acs_price"]);
    if(empty($input_MR_Base_Acs_price))
    {
        $MR_Base_Acs_price_err = "Пожалуйста, введите цену";
    }
    elseif(!filter_var($input_MR_Base_Acs_price, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+\.?[0-9]*$/"))))
    {
        $MR_Base_Acs_price_err = "Введите корректные данные";
    } 
    else
    {
        $MR_Base_Acs_price = $input_MR_Base_Acs_price;
    }

    // Validate image (проверяем изображение)
    $input_image = trim($_POST["image"]);
    if(empty($input_image))
    {
        $image_err = "Пожалуйста, введите ссылку на изображение";
    }
    else
    {
        $image = $input_image;
    }


    // Check input errors before inserting in database
    if(empty($MR_Base_Acs_name_err) && empty($MR_Base_Acs_userr_err) && empty($MR_Base_Acs_disc_err) && empty($MR_Base_Acs_price_err) && empty($image_err))
    {
        // Prepare an update statement
        $sql = "UPDATE MR_Base_Acs SET  MR_Base_Acs_name=?, MR_Base_Acs_userr=?, MR_Base_Acs_disc=?, MR_Base_Acs_price=?, image=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Set parameters (запоминаем параметры)
            $param_MR_Base_Acs_name = $MR_Base_Acs_name;
            $param_MR_Base_Acs_userr = $MR_Base_Acs_userr;
            $param_MR_Base_Acs_disc = $MR_Base_Acs_disc;
            $param_MR_Base_Acs_price = $MR_Base_Acs_price;
            $param_image = $image;

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sisiss", $param_MR_Base_Acs_name, $param_MR_Base_Acs_userr, $param_MR_Base_Acs_disc, $param_MR_Base_Acs_price, $param_image,$id);
            
            
            // Attempt to execute the prepared statement
            $result = mysqli_stmt_execute($stmt);

            if($result)
            {   
                header("location: Gallary_Acs_fm.php");
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
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM MR_Base_Acs WHERE id=?";
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
                    $MR_Base_Acs_name = $row["MR_Base_Acs_name"];
                    $MR_Base_Acs_userr = $row["MR_Base_Acs_userr"];
                    $MR_Base_Acs_disc = $row["MR_Base_Acs_disc"];
                    $MR_Base_Acs_price = $row["MR_Base_Acs_price"];
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
        
        // Close statement
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
                <span class="heading">Редактирование аксессуара</span>

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
                            $result_spisok = mysqli_query($link,"SELECT * FROM MR_Base_User");//выгружаем данные из таблицы
                            while($row_spisok = mysqli_fetch_array($result_spisok)){
                            echo '<option value="'.$row_spisok['MR_Base_User_id'].'">' . $row_spisok['MR_Base_User_name']. '</option>';//заполняем значениями выпадающий список                       
                            }
                            ?>
                            </select>
                        </div>

                        <div class="form-group <?php echo (!empty($MR_Base_Acs_disc_err)) ? 'has-error' : ''; ?>">
                            <label>Описание</label>
                            <textarea name="MR_Base_Acs_disc" class="form-control" value="<?php echo $MR_Base_Acs_disc; ?>"></textarea>
                            <!--<input type="text" name="MR_Base_Acs_disc" class="form-control" value="<?php echo $MR_Base_Acs_disc; ?>">-->
                            <span class="help-block"><?php echo $MR_Base_Acs_disc_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($MR_Base_Acs_price_err)) ? 'has-error' : ''; ?>">
                            <label>Цена</label>
                            <input type="text" name="MR_Base_Acs_price" class="form-control" value="<?php echo $MR_Base_Acs_price; ?>">
                            <span class="help-block"><?php echo $MR_Base_Acs_price_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
                            <label>Ссылка на картинку</label>
                            <input type="text" name="image" class="form-control" value="<?php echo $image; ?>">
                            <span class="help-block"><?php echo $image_err;?></span>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                            <input type="submit" class="btn btn-default btn-lg btn-block" value="Изменить">
                            <input type="button" class="btn btn-default btn-lg btn-block"  value="Назад" onclick="window.location.href = 'Gallary_Acs_fm.php';">
                        </div>
                    </form>
                </div>
            </div>        
        </div>
</body>
</html>