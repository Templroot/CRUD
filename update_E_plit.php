<?php
session_start();
require_once "login_config.php";
$T_E_Name = $T_E_Proizvod = $T_E_Fun  = $T_E_Kol_vo_Komf = $T_E_Klass = $T_E_size = $T_E_Color = $T_E_prise = $image = "";
$T_E_Name_err = $T_E_Proizvod_err = $T_E_Fun_err  = $T_E_Kol_vo_Komf_err = $T_E_Klass_err = $T_E_size_err = $T_E_Color_err = $T_E_prise_err = $image_err = "";
// Обработка данных формы при отправке формы
if(isset($_POST["id_E"]) && !empty($_POST["id_E"]))
{
// Получить скрытое входное значение
$id_E = $_POST["id_E"];
    //Проверяем введенное название
    $input_T_E_Name = trim($_POST["T_E_Name"]);
    if(empty($input_T_E_Name))
    {
        $T_E_Name_err = "Пожалуйста, введите название.";
    }
    else
    {
        $T_E_Name = $input_T_E_Name;
    }


    //Проверяем название бренда
    $input_T_E_Proizvod = trim($_POST["T_E_Proizvod"]);
    if($input_T_E_Proizvod == "")
    {
        $T_E_Proizvod_err = "Пожалуйста, выберите производителя";
    }
    else
    {
        $T_E_Proizvod = $input_T_E_Proizvod;
    }



    //Проверяем объем
    $input_T_E_Fun = trim($_POST["T_E_Fun"]);
    if(empty($input_T_E_Fun))
    {
        $T_E_Fun_err = "Пожалуйста, введите описание";
    }
    else
    {
        $T_E_Fun = $input_T_E_Fun;
    }



    //Проверяем тип разморозки
    $input_T_E_Kol_vo_Komf = trim($_POST["T_E_Kol_vo_Komf"]);
    if($input_T_E_Kol_vo_Komf == "")
    {
        $T_E_Kol_vo_Komf_err = "Пожалуйста, выберите количество конфорок";
    }
    else
    {
        $T_E_Kol_vo_Komf = $input_T_E_Kol_vo_Komf;
    }



    // Validate T_E_Klass (проверяем энергопотребление)
    $input_T_E_Klass = trim($_POST["T_E_Klass"]);
    if($input_T_E_Klass=="")
    {
        $T_E_Klass_err = "Пожалуйста, выберите классэнергопотребления ";
    }

    else
    {
        $T_E_Klass = $input_T_E_Klass;
    }


    // Validate T_E_size (проверяем размеры)
    $input_T_E_size = trim($_POST["T_E_size"]);
    if($input_T_E_size=="")
    {
        $T_E_size_err = "Пожалуйста, выберите размер";
    }
    else
    {
        $T_E_size = $input_T_E_size;
    }
    

    // Validate T_E_Color (проверяем цвет)
    $input_T_E_Color = trim($_POST["T_E_Color"]);
    if($input_T_E_Color == "")
    {
        $T_E_Color_err = "Пожалуйста, выберите цвет";
    }
    else
    {
        $T_E_Color = $input_T_E_Color;
    }


    // Validate T_E_prise (проверяем цену)
    $input_T_E_prise = trim($_POST["T_E_prise"]);
    if(empty($input_T_E_prise))
    {
        $T_E_prise_err = "Пожалуйста, введите цену";
    }
    elseif(!filter_var($input_T_E_prise, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+\.?[0-9]*$/"))))
    {
        $T_E_prise_err = "Пожалуйста, введите верную цену ";
    } 
    else
    {
        $T_E_prise = $input_T_E_prise;
    }
    
    // Validate image (проверяем изображение)
    $input_image = trim($_POST["image"]);
    if(empty($input_image))
    {
        $image_err = "Пожалуйста, вставьте ссылку на картинку";
    }
    else
    {
        $image = $input_image;
    }


// Проверьте ошибки ввода перед вставкой в базу данных
if(empty($T_E_Name_err) && empty($T_E_Proizvod_err) && empty($T_E_Fun_err) && empty($T_E_Kol_vo_Komf_err) && empty($T_E_Klass_err) && empty($T_E_size_err) && empty($T_E_Color_err) && empty($T_E_prise_err) && empty($image_err))
    {
        echo "Второе условие прошли";
// Подготовка заявления об обновлении
$sql = "UPDATE E_Plit SET  T_E_Name=?, T_E_Proizvod=?, T_E_Fun=?, T_E_Kol_vo_Komf=?, T_E_Klass=?, T_E_size=?, T_E_Color=?, T_E_prise=?, image=? WHERE id_E=?";
                 if($stmt = mysqli_prepare($link, $sql))
        {
// Set parameters (запоминаем параметры)
            $param_T_E_Name = $T_E_Name;
            $param_T_E_Proizvod = $T_E_Proizvod;
            $param_T_E_Fun = $T_E_Fun;
            $param_T_E_Kol_vo_Komf = $T_E_Kol_vo_Komf;
            $param_T_E_Klass = $T_E_Klass;
            $param_T_E_size = $T_E_size;
            $param_T_E_Color= $T_E_Color;
            $param_T_E_prise= $T_E_prise;
            $param_image = $image;

            mysqli_stmt_bind_param($stmt, "sisiiiiisi", $param_T_E_Name, $param_T_E_Proizvod, $param_T_E_Fun, $param_T_E_Kol_vo_Komf, $param_T_E_Klass, $param_T_E_size, $param_T_E_Color, $param_T_E_prise, $image, $id_E);
            
// Попытка выполнить подготовленное заявление
      $result = mysqli_stmt_execute($stmt);

         var_dump(mysqli_query($stmt));
            //mysqli_stmt_error_list($stmt);
            var_dump(mysqli_stmt_error_list($stmt));
            if($result)
            {   


// Записи успешно обновлены. Перенаправление на целевую страницу
header("location: Gallary_E_Plit.php");
                exit();
            } 
            else
            {

                echo "Something went wrong. Please try again later.";
            }
        }
         
    }

} 
else
{
// Проверьте наличие параметра id_E перед дальнейшей обработкой
if(isset($_GET["id_E"]) && !empty(trim($_GET["id_E"]))){
        // Get URL parameter
        $id_E =  trim($_GET["id_E"]);
        
// Подготовка инструкции select
        $sql = "SELECT * FROM E_Plit WHERE id_E=?";
        if($stmt = mysqli_prepare($link, $sql))
        {
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // установка параметра
            $param_id = $id_E;
            
            if(mysqli_stmt_execute($stmt))
            {
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1)
                {
// Выборка результирующей строки в виде ассоциативного массива. Поскольку результирующий набор содержит только одну строку, нам не нужно использовать цикл while
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    $T_E_Name = $row["T_E_Name"];
                    $T_E_Proizvod = $row["T_E_Proizvod"];
                    $T_E_Fun = $row["T_E_Fun"];
                    $T_E_Kol_vo_Komf = $row["T_E_Kol_vo_Komf"];
                    $T_E_Klass = $row["T_E_Klass"];
                    $T_E_size = $row["T_E_size"];
                    $T_E_Color = $row["T_E_Color"];
                    $T_E_prise = $row["T_E_prise"];
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
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // закрытие соединения
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
                <span class="heading">Редактирование электрической плиты</span>

                        <div class="form-group <?php echo (!empty($T_E_Name_err)) ? 'has-error' : ''; ?>">
                            <label>Название</label>
                            <input type="text" name="T_E_Name" class="form-control" value="<?php echo $T_E_Name; ?>">
                            <span class="help-block"><?php echo $T_E_Name_err;?></span>
                            <span class="help-block"><?php echo $user_err;?></span>
                        </div>



                        <div class="form-group <?php echo (!empty($T_E_Proizvod_err)) ? 'has-error' : ''; ?>">
                            <label>Производитель</label>
                            <select class="form-control" name="T_E_Proizvod">;
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
                        <input type="hidden" name="id_E" value="<?php echo $id_E; ?>"/>
                        <input type="submit" class="btn btn-default btn-lg btn-block" value="Изменить">
                        <a href="Gallary_E_Plit.php" class="btn btn-default btn-lg btn-block">Назад</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>