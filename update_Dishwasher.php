<?php
session_start();

// Include config file
require_once "login_config.php";



$Base_M_Brand = $Base_M_Type = $Base_M_Drying_Type  = $Base_M_Width = $Base_M_Kolvo = $Base_M_Water = $Base_M_price = $image = "";
$Base_M_Brand_err = $Base_M_Type_err = $Base_M_Drying_Type_err  = $Base_M_Width_err = $Base_M_Kolvo_err = $Base_M_Water_err  = $Base_M_price_err = $image_err = "";

// Processing form data when form is submitted
if(isset($_POST["id_E"]) && !empty($_POST["id_E"]))
{
    // Get hidden input value
    //--------------------------------
    $id_E = $_POST["id_E"];
    //--------------------------------
    
    //Проверяем введенное название
    $input_Base_M_Brand = trim($_POST["Base_M_Brand"]);
    if(empty($input_Base_M_Brand))
    {
        $Base_M_Brand_err = "Please enter a Base_M_Brand.";
    }
    else
    {
        $Base_M_Brand = $input_Base_M_Brand;
    }


    //Проверяем название бренда
    $input_Base_M_Type = trim($_POST["Base_M_Type"]);
    if($input_Base_M_Type == "")
    {
        $Base_M_Type_err = "Please enter a Base_M_Type.";
    }
    else
    {
        $Base_M_Type = $input_Base_M_Type;
    }



    //Проверяем объем
    $input_Base_M_Drying_Type = trim($_POST["Base_M_Drying_Type"]);
    if(empty($input_Base_M_Drying_Type))
    {
        $Base_M_Drying_Type_err = "Please enter a Base_M_Drying_Type.";
    }
    else
    {
        $Base_M_Drying_Type = $input_Base_M_Drying_Type;
    }



    //Проверяем тип разморозки
    $input_Base_M_Width = trim($_POST["Base_M_Width"]);
    if($input_Base_M_Width == "")
    {
        $Base_M_Width_err = "Please enter a Base_M_Width.";
    }
    else
    {
        $Base_M_Width = $input_Base_M_Width;
    }



    // Validate Base_M_Kolvo (проверяем энергопотребление)
    $input_Base_M_Kolvo = trim($_POST["Base_M_Kolvo"]);
    if($input_Base_M_Kolvo=="")
    {
        $Base_M_Kolvo_err = "Please enter a Base_M_Kolvo.";
    }

    else
    {
        $Base_M_Kolvo = $input_Base_M_Kolvo;
    }


    // Validate Base_M_Water (проверяем размеры)
    $input_Base_M_Water = trim($_POST["Base_M_Water"]);
    if($input_Base_M_Water=="")
    {
        $Base_M_Water_err = "Please enter a Base_M_Water.";
    }
    else
    {
        $Base_M_Water = $input_Base_M_Water;
    }
    

    // Validate Base_M_price (проверяем цену)
    $input_Base_M_price = trim($_POST["Base_M_price"]);
    if(empty($input_Base_M_price))
    {
        $Base_M_price_err = "Please enter a Base_M_price.";
    }
    elseif(!filter_var($input_Base_M_price, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+\.?[0-9]*$/"))))
    {
        $Base_M_price_err = "Please enter a valid Base_M_price.";
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
    if(empty($Base_M_Brand_err) && empty($Base_M_Type_err) && empty($Base_M_Drying_Type_err)  && empty($Base_M_Width_err) && empty($Base_M_Kolvo_err) && empty($Base_M_Water_err) && empty($Base_M_price_err))
    {
        echo "Второе условие прошли";
        // Prepare an update statement
        $sql = "UPDATE DB_Dishwasher SET  Base_M_Brand=?, Base_M_Type=?, Base_M_Drying_Type=?, Base_M_Width=?, Base_M_Kolvo=?, Base_M_Water=?, Base_M_price=?, image=? WHERE id_E=?";
         
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters

            
// Set parameters (запоминаем параметры)
            $param_Base_M_Brand = $Base_M_Brand;
            $param_Base_M_Type = $Base_M_Type;
            $param_Base_M_Drying_Type = $Base_M_Drying_Type;
            $param_Base_M_Width = $Base_M_Width;
            $param_Base_M_Kolvo = $Base_M_Kolvo;
            $param_Base_M_Water = $Base_M_Water;
            $param_Base_M_price= $Base_M_price;
            $param_image = $image;


            mysqli_stmt_bind_param($stmt, "ssssiiisi", $param_Base_M_Brand, $param_Base_M_Type, $param_Base_M_Drying_Type, $param_Base_M_Width, $param_Base_M_Kolvo, $param_Base_M_Water, $param_Base_M_price, $param_image, $id_E);
            
            
            // Attempt to execute the prepared statement
            $result = mysqli_stmt_execute($stmt);

         var_dump(mysqli_query($stmt));
            //mysqli_stmt_error_list($stmt);
            var_dump(mysqli_stmt_error_list($stmt));
            if($result)
            {   

                echo "Четвертое условие прошли(148)";

                // Records updated successfully. Redirect to landing page
                header("location: Gallary_E_Machine.php");
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
    // Check existence of id_E parameter before processing further
    if(isset($_GET["id_E"]) && !empty(trim($_GET["id_E"]))){
        // Get URL parameter
        $id_E =  trim($_GET["id_E"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM DB_Dishwasher WHERE id_E=?";
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id_E;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1)
                {
                    // Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop 
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $Base_M_Brand = $row["Base_M_Brand"];
                    $Base_M_Type = $row["Base_M_Type"];
                    $Base_M_Drying_Type = $row["Base_M_Drying_Type"];
                    $Base_M_Width = $row["Base_M_Width"];
                    $Base_M_Kolvo = $row["Base_M_Kolvo"];
                    $Base_M_Water = $row["Base_M_Water"];
                    $Base_M_price = $row["Base_M_price"];
                    $image = $row["image"];
                } 
                else
                {
                    // URL doesn't contain valid id_E. Redirect to error page
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
        // URL doesn't contain id_E parameter. Redirect to error page
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
        }    
        </style>
</head>
<body>
    <div class="container_tovar">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="form-horizontal">
                    <div class="page-header">
                        <h2>Редактирование посудомоечной машины</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($Base_M_Brand_err)) ? 'has-error' : ''; ?>">
                            <label>Название</label>
                            <input type="text" name="Base_M_Brand" class="form-control" value="<?php echo $Base_M_Brand; ?>">
                            <span class="help-block"><?php echo $Base_M_Brand_err;?></span>
                            <span class="help-block"><?php echo $user_err;?></span>
                        </div>



                        <div class="form-group <?php echo (!empty($Base_M_Type_err)) ? 'has-error' : ''; ?>">
                            <label>Тип</label>
                            <select class="form-control" name="Base_M_Type">;
                            <?php
                            $result_spisok = mysqli_query($link,"SELECT * FROM Type_size");

                            while($row_brand = mysqli_fetch_array($result_spisok)){
                            echo '<option value="'.$row_brand['Type2_id'].'">' . $row_brand['Type2_name']. '</option>';                   
                            }
                            ?>
                            </select>
                        </div>


                        <div class="form-group <?php echo (!empty($Base_M_Drying_Type_err)) ? 'has-error' : ''; ?>">
                        <label>Тип сушки</label>
                            <select class="form-control" name="Base_M_Drying_Type">;
                            <?php
                            $result_size = mysqli_query($link,"SELECT * FROM Type_Drying");

                            while($row_size = mysqli_fetch_array($result_size)){
                            echo '<option value="'.$row_size['Type_Drying_id'].'">' . $row_size['Type_Drying_name']. '</option>';                   
                            }
                            ?>
                            </select>
                        </div>
                        
                        <div class="form-group <?php echo (!empty($Base_M_Width_err)) ? 'has-error' : ''; ?>">
                            <label>Ширина</label>
                            <select class="form-control" name="Base_M_Width">;

                            <?php
                            $result_KK = mysqli_query($link,"SELECT * FROM Width");

                            while($row_KK = mysqli_fetch_array($result_KK)){
                            echo '<option value="'.$row_KK['Width_id'].'">' . $row_KK['Width_name']. '</option>';                   
                            }
                            ?>
                            </select>
                        </div>

                        <div class="form-group <?php echo (!empty($Base_M_Kolvo_err)) ? 'has-error' : ''; ?>">
                            <label>Количество комплектов посуды</label>
                            <select class="form-control" name="Base_M_Kolvo">;
                            <?php
                            $result_klass = mysqli_query($link,"SELECT * FROM Kolvo");

                            while($row_klass = mysqli_fetch_array($result_klass)){
                            echo '<option value="'.$row_klass['Kolvo_id'].'">' . $row_klass['Kolvo_name']. '</option>';                   
                            }
                            ?>
                            </select>
                        </div>

                        <div class="form-group <?php echo (!empty($Base_M_Water_err)) ? 'has-error' : ''; ?>">
                            <label>Расход воды</label>
                            <select class="form-control" name="Base_M_Water">;
                            <?php
                            $result_klass = mysqli_query($link,"SELECT * FROM Water");

                            while($row_klass = mysqli_fetch_array($result_klass)){
                            echo '<option value="'.$row_klass['Water_id'].'">' . $row_klass['Water_name']. '</option>';                   
                            }
                            ?>
                            </select>
                        </div>

                        <div class="form-group <?php echo (!empty($Base_M_price_err)) ? 'has-error' : ''; ?>">
                            <label>Цена</label>
                            <input type="text" name="Base_M_price" class="form-control" value="<?php echo $Base_M_price; ?>">
                            <span class="help-block"><?php echo $Base_M_price_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
                            <label>Ссылка на картинку</label>
                            <input type="text" name="image" class="form-control" value="<?php echo $image; ?>">
                            <span class="help-block"><?php echo $image_err;?></span>
                        </div>
                        <input type="hidden" name="id_E" value="<?php echo $id_E; ?>"/>
                        <input type="submit" class="btn btn-default btn-lg btn-block" value="Submit">
                        <a href="Gallary_E_Machine.php" class="btn btn-default btn-lg btn-block">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>

