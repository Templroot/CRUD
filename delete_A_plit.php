<?php
session_start();
$link = $_SESSION["link"];
$username = $_SESSION["username"];
$user_id = $_SESSION["user_id"];
$role_id = $_SESSION["role_id"];
$role_name = $_SESSION["role_name"];

//Подключение файлов
require_once "login_role.php";
include('./login_config.php');
$thread_id = mysqli_thread_id($link);

// Проверка роли: 2 - админ
if ($role_id !== '2') // если не админ
{
    //Сохранение ошибки для отображения в файле CRUD_error.php
    $_SESSION["crud_error"] = "Недостаточно прав для удаления данных!!!";
    header("location: CRUD_error.php");
    exit;
}

//Удаление товара
$del_id_A = trim($_GET["id_A"]);
if (!empty($del_id_A)) {
    if ($_GET['confirm_del'] == 'Y') {
        //Подключение файла конфигурации
        require_once "login_config.php";

        //Подготавка запроса
        $sql = "DELETE FROM Accessories WHERE id_A = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            //Привязка переменных к подготовленному запросу
            mysqli_stmt_bind_param($stmt, "s", $param_id_A);

            //Установка параметров
            $param_id_A= trim($del_id_A);

            //Попытка выполнить подготовленный statement
            if (mysqli_stmt_execute($stmt)) {
                //Запись успешно удалена. Перенаправление на страницу Gallary_Acs_all.php
                header("location: Gallary_Acs_all.php");
                exit();
            } else {
                echo "Что-то пошло не так. Пожалуйста,повторите попытку позже.";
            }
        }

        ////Закрытие statement
        mysqli_stmt_close($stmt);

        ////Закрытие соединения
        mysqli_close($link);
    }
} else {
    header("location: CRUD_error.php");
    //echo "Ошибка удаления морозильника: MR_Base_M_name пустое";
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Удаление записи</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper {
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                       <?php echo  "<h1>Удаление записи";
                    echo  "<h1>".$_GET["name_A"]."</h1>";?>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
                    <div class="alert alert-danger fade in">
                        <input type="hidden" name="id_A" value="<?php echo trim($_GET["id_A"]); ?>"/>
                        <input type="hidden" name="confirm_del" value="Y"/>
                        <p>Вы уверены, что хотите удалить запись?</p><br>
                        <p>
                            <input type="submit" value="Да" class="btn btn-danger">
                            <a href="Gallary_A_Plit.php" class="btn btn-default">Нет</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>