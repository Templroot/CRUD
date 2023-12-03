<?php
session_start();

//конфигурационный файл
require_once "login_config.php";



$T_A_name = $T_A_tip = $T_A_fun = $T_A_price = $image = "";
$T_A_name_err = $T_A_tip_err = $T_A_fun_err  = $T_A_price_err = $image_err = "";
// Обработка данных формы при отправке формы
if(isset($_POST["id_A"]) && !empty($_POST["id_A"]))
{
    $id_A = $_POST["id_A"];
    //Проверяем введенное название
    $input_T_A_name = trim($_POST["T_A_name"]);
    if(empty($input_T_A_name))
    {
        $T_A_name_err = "Пожалуйста, введите название.";
    }
    else
    {
        $T_A_name = $input_T_A_name;
    }
    //Проверяем название бренда
    $input_T_A_tip = trim($_POST["T_A_tip"]);
    if($input_T_A_tip == "")
    {
        $T_A_tip_err = "Пожалуйста, выберите тип.";
    }
    else
    {
        $T_A_tip = $input_T_A_tip;
    }
    //Проверяем объем
    $input_T_A_fun = trim($_POST["T_A_fun"]);
    if(empty($input_T_A_fun))
    {
        $T_A_fun_err = "Пожалуйста, введите описание.";
    }
    else
    {
        $T_A_fun = $input_T_A_fun;
    }
    // проверяем цену
    $input_T_A_price = trim($_POST["T_A_price"]);
    if(empty($input_T_A_price))
    {
        $T_A_price_err = "Пожалуйста, введите цену";
    }
    elseif(!filter_var($input_T_A_price, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+\.?[0-9]*$/"))))
    {
        $T_A_price_err = "Пожалйста, введите верную цену.";
    } 
    else
    {
        $T_A_price = $input_T_A_price;
    }
    
    // проверяем изображение
    $input_image = trim($_POST["image"]);
    if(empty($input_image))
    {
        $image_err = "Пожалуйста, введите ссылку.";
    }
    else
    {
        $image = $input_image;
    }
    // Проверяем ошибки ввода перед вставкой в базу данных
    if(empty($T_A_name_err) && empty($T_A_tip_err) && empty($T_A_fun_err)  && empty($T_A_price_err) && empty($image_err))
    {
        $sql = "UPDATE Accessories SET  T_A_name=?, T_A_tip=?, T_A_fun=?, T_A_price=?, image=? WHERE id_A=?";
         
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Привязка переменных к подготовленному оператору в качестве параметров
           
// Set parameters (запоминаем параметры)
            $param_T_A_name = $T_A_name;
            $param_T_A_tip = $T_A_tip;
            $param_T_A_fun = $T_A_fun;
            $param_T_A_price= $T_A_price;
            $param_image = $image;
            mysqli_stmt_bind_param($stmt, "sisssi", $param_T_A_name, $param_T_A_tip, $param_T_A_fun, $param_T_A_price, $image, $id_A);
                // Попытка выполнить подготовленную инструкцию
            $result = mysqli_stmt_execute($stmt);

         var_dump(mysqli_query($stmt));
            var_dump(mysqli_stmt_error_list($stmt));
            if($result)
            {   
                // Записи успешно обновлены. Перенаправление на целевую страницу
                header("location: Gallary_A_Plit.php");
                exit();
            } 
            else
            {

                echo "Что-то пошло не так. Пожалуйста, повторите попытку позже.";
            }
        }
         
   }
    
} 
else
{
    if(isset($_GET["id_A"]) && !empty(trim($_GET["id_A"]))){
        $id_A =  trim($_GET["id_A"]);
        
        $sql = "SELECT * FROM Accessories WHERE id_A=?";
        if($stmt = mysqli_prepare($link, $sql))
        {
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            $param_id = $id_A;
            
            if(mysqli_stmt_execute($stmt))
            {
                $result = mysqli_stmt_GET_result($stmt);
    
                if(mysqli_num_rows($result) == 1)
                {
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    $T_A_name = $row["T_A_name"];
                    $T_A_tip = $row["T_A_tip"];
                    $T_A_fun = $row["T_A_fun"];
                    $T_A_price = $row["T_A_price"];
                    $image = $row["image"];
                } 
                else
                {
                    header("location: CRUD_error.php");
                    exit();
                }
                
            } 
            else
            {
                echo "Ошибка, попробуйте позже.";
            }
        }
        
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
    <title>Update Record</title>
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
    </style>
</head>
<body>
    <div class="container_tovar">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <span class="heading">Редактирование аксессура</span>
                        <div class="form-group <?php echo (!empty($T_A_name_err)) ? 'has-error' : ''; ?>">
                            <label>Название</label>
                            <input type="text" name="T_A_name" class="form-control" value="<?php echo $T_A_name; ?>">
                            <span class="help-block"><?php echo $T_A_name_err;?></span>
                            <span class="help-block"><?php echo $user_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($T_A_tip_err)) ? 'has-error' : ''; ?>">
                            <label>Тип</label>
                            <select class="form-control" name="T_A_tip">;
                            <?php
                            $result_spisok = mysqli_query($link,"SELECT * FROM Tip_Plit");

                            while($row_brand = mysqli_fetch_array($result_spisok)){
                            echo '<option value="'.$row_brand['Tip_Plit_id'].'">' . $row_brand['Tip_Plit_name']. '</option>';                   
                            }
                            ?>
                            </select>
                        </div>

                        <div class="form-group <?php echo (!empty($T_A_fun_err)) ? 'has-error' : ''; ?>">
                            <label>Информация</label>
                            <input type="text" name="T_A_fun" class="form-control" value="<?php echo $T_A_fun; ?>">
                            <span class="help-block"><?php echo $T_A_fun_err;?></span>
                        </div>

                        
                        <div class="form-group <?php echo (!empty($T_A_price_err)) ? 'has-error' : ''; ?>">
                            <label>Цена</label>
                            <input type="text" name="T_A_price" class="form-control" value="<?php echo $T_A_price; ?>">
                            <span class="help-block"><?php echo $T_A_price_err;?></span>
                        </div>


                        <div class="form-group <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
                            <label>Ссылка на картинку</label>
                            <input type="text" name="image" class="form-control" value="<?php echo $image; ?>">
                            <span class="help-block"><?php echo $image_err;?></span>
                        </div>
                        <input type="hidden" name="id_A" value="<?php echo $id_A; ?>"/>
                        <input type="submit" class="btn btn-default btn-lg btn-block" value="Изменить">
                        <a href="Gallary_A_Plit.php" class="btn btn-default btn-lg btn-block">Назад</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>