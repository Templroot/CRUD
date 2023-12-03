<?php
session_start();

// Include config file
require_once "login_config.php";



$Base_D_Brand = $Base_D_Type = $Base_D_Drying_Function  = $Base_D_Width = $Base_D_Max_Load = $Base_D_Speed = $Base_D_price = $image = "";
$Base_D_Brand_err = $Base_D_Type_err = $Base_D_Drying_Function_err  = $Base_D_Width_err = $Base_D_Max_Load_err = $Base_D_Speed_err  = $Base_D_price_err = $image_err = "";

// Processing form data when form is submitted
if(isset($_POST["id_W"]) && !empty($_POST["id_W"]))
{
    // Get hidden input value
    //--------------------------------
    $id_W = $_POST["id_W"];
    //--------------------------------
    
    //Проверяем введенное название
    $input_Base_D_Brand = trim($_POST["Base_D_Brand"]);
    if(empty($input_Base_D_Brand))
    {
        $Base_D_Brand_err = "Please enter a Base_D_Brand.";
    }
    else
    {
        $Base_D_Brand = $input_Base_D_Brand;
    }


    //Проверяем название бренда
    $input_Base_D_Type = trim($_POST["Base_D_Type"]);
    if($input_Base_D_Type == "")
    {
        $Base_D_Type_err = "Please enter a Base_D_Type.";
    }
    else
    {
        $Base_D_Type = $input_Base_D_Type;
    }



    //Проверяем объем
    $input_Base_D_Drying_Function = trim($_POST["Base_D_Drying_Function"]);
    if(empty($input_Base_D_Drying_Function))
    {
        $Base_D_Drying_Function_err = "Please enter a Base_D_Drying_Function.";
    }
    else
    {
        $Base_D_Drying_Function = $input_Base_D_Drying_Function;
    }



    //Проверяем тип разморозки
    $input_Base_D_Width = trim($_POST["Base_D_Width"]);
    if($input_Base_D_Width == "")
    {
        $Base_D_Width_err = "Please enter a Base_D_Width.";
    }
    else
    {
        $Base_D_Width = $input_Base_D_Width;
    }



    // Validate Base_D_Max_Load (проверяем энергопотребление)
    $input_Base_D_Max_Load = trim($_POST["Base_D_Max_Load"]);
    if($input_Base_D_Max_Load=="")
    {
        $Base_D_Max_Load_err = "Please enter a Base_D_Max_Load.";
    }

    else
    {
        $Base_D_Max_Load = $input_Base_D_Max_Load;
    }


    // Validate Base_D_Speed (проверяем размеры)
    $input_Base_D_Speed = trim($_POST["Base_D_Speed"]);
    if($input_Base_D_Speed=="")
    {
        $Base_D_Speed_err = "Please enter a Base_D_Speed.";
    }
    else
    {
        $Base_D_Speed = $input_Base_D_Speed;
    }
    

    // Validate Base_D_price (проверяем цену)
    $input_Base_D_price = trim($_POST["Base_D_price"]);
    if(empty($input_Base_D_price))
    {
        $Base_D_price_err = "Please enter a Base_D_price.";
    }
    elseif(!filter_var($input_Base_D_price, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+\.?[0-9]*$/"))))
    {
        $Base_D_price_err = "Please enter a valid Base_D_price.";
    } 
    else
    {
        $Base_D_price = $input_Base_D_price;
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
    if(empty($Base_D_Brand_err) && empty($Base_D_Type_err)  && empty($Base_D_Width_err) && empty($Base_D_Max_Load_err) && empty($Base_D_Speed_err) && empty($Base_D_price_err))
    {
        echo "Второе условие прошли";
        // Prepare an update statement
        $sql = "UPDATE DB_Washer SET  Base_D_Brand=?, Base_D_Type=?, Base_D_Drying_Function=?, Base_D_Width=?, Base_D_Max_Load=?, Base_D_Speed=?, Base_D_price=?, image=? WHERE id_W=?";
         
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters

            
// Set parameters (запоминаем параметры)
            $param_Base_D_Brand = $Base_D_Brand;
            $param_Base_D_Type = $Base_D_Type;
            $param_Base_D_Drying_Function = $Base_D_Drying_Function;
            $param_Base_D_Width = $Base_D_Width;
            $param_Base_D_Max_Load = $Base_D_Max_Load;
            $param_Base_D_Speed = $Base_D_Speed;
            $param_Base_D_price= $Base_D_price;
            $param_image = $image;


            mysqli_stmt_bind_param($stmt, "siiiiiisi", $param_Base_D_Brand, $param_Base_D_Type, $param_Base_D_Drying_Function, $param_Base_D_Width, $param_Base_D_Max_Load, $param_Base_D_Speed, $param_Base_D_price, $param_image, $id_W);
            
            
            // Attempt to execute the prepared statement
            $result = mysqli_stmt_execute($stmt);

         var_dump(mysqli_query($stmt));
            //mysqli_stmt_error_list($stmt);
            var_dump(mysqli_stmt_error_list($stmt));
            if($result)
            {   

                echo "Четвертое условие прошли(148)";

                // Records updated successfully. Redirect to landing page
                header("location: Gallary_A_Machine.php");
                exit();
            } 
            else
            {

                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        //mysqli_stmt_close($stmt);
    }
    
    // Close connection
    //mysqli_close($link);
} 
else
{
    // Check existence of id_W parameter before processing further
    if(isset($_GET["id_W"]) && !empty(trim($_GET["id_W"]))){
        // Get URL parameter
        $id_W =  trim($_GET["id_W"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM DB_Washer WHERE id_W=?";
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id_W;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1)
                {
                    // Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop 
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $Base_D_Brand = $row["Base_D_Brand"];
                    $Base_D_Type = $row["Base_D_Type"];
                    $Base_D_Drying_Function = $row["Base_D_Drying_Function"];
                    $Base_D_Width = $row["Base_D_Width"];
                    $Base_D_Max_Load = $row["Base_D_Max_Load"];
                    $Base_D_Speed = $row["Base_D_Speed"];
                    $Base_D_price = $row["Base_D_price"];
                    $image = $row["image"];
                } 
                else
                {
                    // URL doesn't contain valid id_W. Redirect to error page
                    header("location: CRUD_error.php");
                    exit();
                }
                
            } 
            else
            {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        //mysqli_close($link);
    }  
    else
    {
        // URL doesn't contain id_W parameter. Redirect to error page
        //header("location: CRUD_error.php");
        echo "Ошибка доступа";
        exit();
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
        }    </style>
</head>
<body>
    <div class="container_tovar">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <span class="heading">Редактирование стиральной машины</span>

                        <div class="form-group <?php echo (!empty($Base_D_Brand_err)) ? 'has-error' : ''; ?>">
                            <label>Название</label>
                            <input type="text" name="Base_D_Brand" class="form-control" value="<?php echo $Base_D_Brand; ?>">
                            <span class="help-block"><?php echo $Base_D_Brand_err;?></span>
                            <span class="help-block"><?php echo $user_err;?></span>
                        </div>



                        <div class="form-group <?php echo (!empty($Base_D_Type_err)) ? 'has-error' : ''; ?>">
                            <label>Тип</label>
                            <select class="form-control" name="Base_D_Type">;
                            <?php
                            $result_spisok = mysqli_query($link,"SELECT * FROM Type_load");

                            while($row_brand = mysqli_fetch_array($result_spisok)){
                            echo '<option value="'.$row_brand['Type_id'].'">' . $row_brand['Type_name']. '</option>';                   
                            }
                            ?>
                            </select>
                        </div>


                        <div class="form-group <?php echo (!empty($Base_D_Drying_Function_err)) ? 'has-error' : ''; ?>">
                        <label>Функция сушки</label>
                            <select class="form-control" name="Base_D_Drying_Function">;
                            <?php
                            $result_size = mysqli_query($link,"SELECT * FROM Drying_Function");

                            while($row_size = mysqli_fetch_array($result_size)){
                            echo '<option value="'.$row_size['Drying_Function_id'].'">' . $row_size['Drying_Function_name']. '</option>';                   
                            }
                            ?>
                            </select>
                        </div>


                        <div class="form-group <?php echo (!empty($Base_D_Width_err)) ? 'has-error' : ''; ?>">
                            <label>Ширина</label>
                            <select class="form-control" name="Base_D_Width">;
                            <?php
                            $result_color = mysqli_query($link,"SELECT * FROM Width");

                            while($row_color = mysqli_fetch_array($result_color)){
                            echo '<option value="'.$row_color['Width_id'].'">' . $row_color['Width_name']. '</option>';                   
                            }
                            ?>
                            </select>
                        </div>

                        <div class="form-group <?php echo (!empty($Base_D_Max_Load_err)) ? 'has-error' : ''; ?>">
                            <label>Максимальная загрузка белья</label>
                            <select class="form-control" name="Base_D_Max_Load">;
                            <?php
                            $result_color = mysqli_query($link,"SELECT * FROM Max_Load");

                            while($row_color = mysqli_fetch_array($result_color)){
                            echo '<option value="'.$row_color['Max_Load_id'].'">' . $row_color['Max_Load_name']. '</option>';                   
                            }
                            ?>
                            </select>
                        </div>

                        <div class="form-group <?php echo (!empty($Base_D_Speed_err)) ? 'has-error' : ''; ?>">
                            <label>Скорость вращения</label>
                            <select class="form-control" name="Base_D_Speed">;

                            <?php
                            $result_KK = mysqli_query($link,"SELECT * FROM Speed");

                            while($row_KK = mysqli_fetch_array($result_KK)){
                            echo '<option value="'.$row_KK['Speed_id'].'">' . $row_KK['Speed_name']. '</option>';                   
                            }
                            ?>
                            </select>
                        </div>

                        <div class="form-group <?php echo (!empty($Base_D_price_err)) ? 'has-error' : ''; ?>">
                            <label>Цена</label>
                            <input type="text" name="Base_D_price" class="form-control" value="<?php echo $Base_D_price; ?>">
                            <span class="help-block"><?php echo $Base_D_price_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
                            <label>Ссылка на картинку</label>
                            <input type="text" name="image" class="form-control" value="<?php echo $image; ?>">
                            <span class="help-block"><?php echo $image_err;?></span>
                        </div>
                        <input type="hidden" name="id_W" value="<?php echo $id_W; ?>"/>
                        <input type="submit" class="btn btn-default btn-lg btn-block" value="Изменить">
                        <a href="Gallary_A_Machine.php" class="btn btn-default btn-lg btn-block">Назад</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
                        
</body>
</html>

