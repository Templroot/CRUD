<?php
session_start();

// Include config file
require_once "login_config.php";



$Base_N_Brand = $Base_N_Type = $Base_N_Intend  = $Base_N_Max_pressure = $Base_N_Max_t = $Base_N_Length = $Base_N_Price = $image = "";
$Base_N_Brand_err = $Base_N_Type_err = $Base_N_Intend_err  = $Base_N_Max_pressure_err = $Base_N_Max_t_err = $Base_N_Length_err  = $Base_N_Price_err = $image_err = "";

// Processing form data when form is submitted
if(isset($_POST["id_A"]) && !empty($_POST["id_A"]))
{
    // Get hidden input value
    //--------------------------------
    $id_A = $_POST["id_A"];
    //--------------------------------
    
    //Проверяем введенное название
    $input_Base_N_Brand = trim($_POST["Base_N_Brand"]);
    if(empty($input_Base_N_Brand))
    {
        $Base_N_Brand_err = "Please enter a Base_N_Brand.";
    }
    else
    {
        $Base_N_Brand = $input_Base_N_Brand;
    }


    //Проверяем название бренда
    $input_Base_N_Type = trim($_POST["Base_N_Type"]);
    if($input_Base_N_Type == "")
    {
        $Base_N_Type_err = "Please enter a Base_N_Type.";
    }
    else
    {
        $Base_N_Type = $input_Base_N_Type;
    }



    //Проверяем объем
    $input_Base_N_Intend = trim($_POST["Base_N_Intend"]);
    if(empty($input_Base_N_Intend))
    {
        $Base_N_Intend_err = "Please enter a Base_N_Intend.";
    }
    else
    {
        $Base_N_Intend = $input_Base_N_Intend;
    }



    //Проверяем тип разморозки
    $input_Base_N_Max_pressure = trim($_POST["Base_N_Max_pressure"]);
    if($input_Base_N_Max_pressure == "")
    {
        $Base_N_Max_pressure_err = "Please enter a Base_N_Max_pressure.";
    }
    else
    {
        $Base_N_Max_pressure = $input_Base_N_Max_pressure;
    }



    // Validate Base_N_Max_t (проверяем энергопотребление)
    $input_Base_N_Max_t = trim($_POST["Base_N_Max_t"]);
    if($input_Base_N_Max_t=="")
    {
        $Base_N_Max_t_err = "Please enter a Base_N_Max_t.";
    }

    else
    {
        $Base_N_Max_t = $input_Base_N_Max_t;
    }


    // Validate Base_N_Length (проверяем размеры)
    $input_Base_N_Length = trim($_POST["Base_N_Length"]);
    if($input_Base_N_Length=="")
    {
        $Base_N_Length_err = "Please enter a Base_N_Length.";
    }
    else
    {
        $Base_N_Length = $input_Base_N_Length;
    }
    

    // Validate Base_N_Price (проверяем цену)
    $input_Base_N_Price = trim($_POST["Base_N_Price"]);
    if(empty($input_Base_N_Price))
    {
        $Base_N_Price = "Please enter a Base_N_Price.";
    }
    elseif(!filter_var($input_Base_N_Price, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+\.?[0-9]*$/"))))
    {
        $Base_N_Price_err = "Please enter a valid Base_N_Price.";
    } 
    else
    {
        $Base_N_Price_err = $input_Base_N_Price;
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
    if(empty($Base_N_Brand_err) && empty($Base_N_Type_err)  && empty($Base_N_Max_pressure_err) && empty($Base_N_Max_t_err) && empty($Base_N_Length_err) && empty($Base_N_Price))
    {
        echo "Второе условие прошли";
        // Prepare an update statement
        $sql = "UPDATE DB_Hose SET  Base_N_Brand=?, Base_N_Type=?, Base_N_Intend=?, Base_N_Max_pressure=?, Base_N_Max_t=?, Base_N_Length=?, Base_N_Price=?, image=? WHERE id_A=?";
         
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters

            
// Set parameters (запоминаем параметры)
            $param_Base_N_Brand = $Base_N_Brand;
            $param_Base_N_Type = $Base_N_Type;
            $param_Base_N_Intend = $Base_N_Intend;
            $param_Base_N_Max_pressure = $Base_N_Max_pressure;
            $param_Base_N_Max_t = $Base_N_Max_t;
            $param_Base_N_Length = $Base_N_Length;
            $param_Base_N_Price= $Base_N_Price;
            $param_image = $image;


            mysqli_stmt_bind_param($stmt, "siiiiiisi", $param_Base_N_Brand, $param_Base_N_Type, $param_Base_N_Intend, $param_Base_N_Max_pressure, $param_Base_N_Max_t, $param_Base_N_Length, $param_Base_N_Price, $param_image, $id_A);
            
            
            // Attempt to execute the prepared statement
            $result = mysqli_stmt_execute($stmt);

         var_dump(mysqli_query($stmt));
            //mysqli_stmt_error_list($stmt);
            var_dump(mysqli_stmt_error_list($stmt));
            if($result)
            {   

                echo "Четвертое условие прошли(148)";
                // Records updated successfully. Redirect to landing page
                header("location: Gallary_acs_wash.php");
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
    // Check existence of id_A parameter before processing further
    if(isset($_GET["id_A"]) && !empty(trim($_GET["id_A"]))){
        // Get URL parameter
        $id_A =  trim($_GET["id_A"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM DB_Hose WHERE id_A=?";
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id_A;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1)
                {
                    // Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop 
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $Base_N_Brand = $row["Base_N_Brand"];
                    $Base_N_Type = $row["Base_N_Type"];
                    $Base_N_Intend = $row["Base_N_Intend"];
                    $Base_N_Max_pressure = $row["Base_N_Max_pressure"];
                    $Base_N_Max_t = $row["Base_N_Max_t"];
                    $Base_N_Length = $row["Base_N_Length"];
                    $Base_N_Price = $row["Base_N_Price"];
                    $image = $row["image"];
                } 
                else
                {
                    // URL doesn't contain valid id_A. Redirect to error page
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
        // URL doesn't contain id_A parameter. Redirect to error page
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
        }    </style>
</head>
<body>
    <div class="container_tovar">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <span class="heading">Редактирование аксессуаров</span>

                        <div class="form-group <?php echo (!empty($Base_N_Brand_err)) ? 'has-error' : ''; ?>">
                            <label>Название</label>
                            <input type="text" name="Base_N_Brand" class="form-control" value="<?php echo $Base_N_Brand; ?>">
                            <span class="help-block"><?php echo $Base_N_Brand_err;?></span>
                            <span class="help-block"><?php echo $user_err;?></span>
                        </div>



                        <div class="form-group <?php echo (!empty($Base_N_Type_err)) ? 'has-error' : ''; ?>">
                            <label>Тип</label>
                            <select class="form-control" name="Base_N_Type">;
                            <?php
                            $result_spisok = mysqli_query($link,"SELECT * FROM Type_hose");

                            while($row_brand = mysqli_fetch_array($result_spisok)){
                            echo '<option value="'.$row_brand['Type3_id'].'">' . $row_brand['Type3_name']. '</option>';                   
                            }
                            ?>
                            </select>
                        </div>


                        <div class="form-group <?php echo (!empty($Base_N_Intend_err)) ? 'has-error' : ''; ?>">
                        <label>Предназначен</label>
                            <select class="form-control" name="Base_N_Intend">;
                            <?php
                            $result_size = mysqli_query($link,"SELECT * FROM Intend");

                            while($row_size = mysqli_fetch_array($result_size)){
                            echo '<option value="'.$row_size['Intend_id'].'">' . $row_size['Intend_name']. '</option>';                   
                            }
                            ?>
                            </select>
                        </div>


                        <div class="form-group <?php echo (!empty($Base_N_Max_pressure_err)) ? 'has-error' : ''; ?>">
                            <label>Максимальное давление</label>
                            <select class="form-control" name="Base_N_Max_pressure">;
                            <?php
                            $result_color = mysqli_query($link,"SELECT * FROM Max_pressure");

                            while($row_color = mysqli_fetch_array($result_color)){
                            echo '<option value="'.$row_color['Max_pressure_id'].'">' . $row_color['Max_pressure_name']. '</option>';                   
                            }
                            ?>
                            </select>
                        </div>

                        <div class="form-group <?php echo (!empty($Base_N_Max_t_err)) ? 'has-error' : ''; ?>">
                            <label>Максимальная температура</label>
                            <select class="form-control" name="Base_N_Max_t">;
                            <?php
                            $result_color = mysqli_query($link,"SELECT * FROM Max_t");

                            while($row_color = mysqli_fetch_array($result_color)){
                            echo '<option value="'.$row_color['Max_t_id'].'">' . $row_color['Max_t_name']. '</option>';                   
                            }
                            ?>
                            </select>
                        </div>

                        <div class="form-group <?php echo (!empty($Base_N_Length_err)) ? 'has-error' : ''; ?>">
                            <label>Длина</label>
                            <select class="form-control" name="Base_N_Length">;

                            <?php
                            $result_KK = mysqli_query($link,"SELECT * FROM Length");

                            while($row_KK = mysqli_fetch_array($result_KK)){
                            echo '<option value="'.$row_KK['Length_id'].'">' . $row_KK['Length_name']. '</option>';                   
                            }
                            ?>
                            </select>
                        </div>

                        <div class="form-group <?php echo (!empty($Base_N_Price_err)) ? 'has-error' : ''; ?>">
                            <label>Цена</label>
                            <input type="text" name="Base_N_Price" class="form-control" value="<?php echo $Base_N_Price; ?>">
                            <span class="help-block"><?php echo $Base_N_Price_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
                            <label>Ссылка на картинку</label>
                            <input type="text" name="image" class="form-control" value="<?php echo $image; ?>">
                            <span class="help-block"><?php echo $image_err;?></span>
                        </div>
                        <input type="hidden" name="id_A" value="<?php echo $id_A; ?>"/>
                        <input type="submit" class="btn btn-default btn-lg btn-block" value="Изменить">
                        <a href="Gallary_acs_wash.php" class="btn btn-default btn-lg btn-block">Назад</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
                        
</body>
</html>

