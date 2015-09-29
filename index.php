<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="./resources/css/style.css">
    </head>
    <body>

    
        <form method="POST">
            <input name="login" id="login" type="text" placeholder="login">
            <input name="pass" id="pass" type="password" placeholder="pass">
            <input name="re_pass" id="re_pass" type="password" placeholder="re_pass">
            <input name="email" id="email" type="email" placeholder="email">
            <input type="submit" name="submit" >
        </form>
        
        <?php
        include './config/conf.php';
        include './util/messager.php';
        include './dao/person.php';
        include './util/formsChecker.php';
        
        if (isset($_POST["submit"])) {
                checkFields($_POST);
        }

        
        ?>



        <div class="info">
            <span>Осуществить на стороне сервера валидацию полей формы (правила валидации берем из предыдущего домашнего задания). 
                Проверить, есть ли пользователь с введенным логином и почтой в базе данных, если есть - вывести его имя.</span>
        </div>
    </body>
</html>
