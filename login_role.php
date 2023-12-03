<?php
function setrole_by_username($username, $link)
{
    //include_once "login_config.php";
    $ferror = ""; // очищаем переменную ошибок
    $role_id = ""; // очищаем переменную роли
    $user_id="";// очищаем переменную id
    $sql = "SELECT role_id,user_id FROM users WHERE username = '".$username."'";
$thread_id = mysqli_thread_id($link);
if(empty($thread_id)) // коннектим к БД, если не было установлено соединение
    {
        include('./login_config.php');
        echo "login_role.php: вызван файл login_config.php!!";
    }
    else
    {
        echo "login_role.php: соединение с БД было установлено thread_id=".$thread_id;
    }

    if($frows = mysqli_query($link, $sql))
    {
        //echo "login_role.php: query executed!!!";
        if( $frow = mysqli_fetch_row($frows))
        {
            //echo "login_role.php: found row!!!";
            $role_id = $frow[0];
            $user_id=$frow[1];
            if($role_id === "0") // 0 - Пользователь 
            {// запоминаем в текущей сессии имя роли
                $_SESSION["role_name"] = "User";
            }
            else if($role_id === "1") // 1 - Модератор
            {// запоминаем в текущей сессии имя роли
                $_SESSION["role_name"] = "Moderator";
            }
            else if($role_id === "2") // 2 - Админ 
            {// запоминаем в текущей сессии имя роли
                $_SESSION["role_name"] = "Admin";
            }
            $_SESSION["role_id"] = $role_id;
            $_SESSION["user_id"] = $user_id;

            mysqli_free_result($frows); // очищаем результаты запроса
        }
        else
        {
            //выводим сообщение об ошибке
            $ferror = "Ошибка чтения роли: считано 0 строк!(";
        }
    mysqli_close($link); // закрываем запрос
    return $ferror; // возвращаем ошибку, если произошла 
    }
}
?>
