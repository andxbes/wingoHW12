<?php

function checkField($data) {

    $persons = new Person();
    $message = new Message();

    if (!isset($data["login"]) || (empty($data["login"]))) {
        $message->addMessage("Не заполнено поле \"Login\" ");
    }
    else {
        $pattern = "/^[a-zA-Z]+\w{3,}$/";
        if (!preg_match($pattern, $data["login"])) {
            $message->addMessage("Не верно заполнено поле \"login\"");
        }
        else if ($login = $persons->checkUser($data["login"])) {
            $message->addMessage(" Пользователь $login есть в базе данных ");
        }
    }

    if (!isset($data["email"]) || (empty($data["email"]))) {
        $message->addMessage("Не заполнено поле \"email\" ");
    }
    else {
        $pattern = "/^[a-zA-Z]+\w{3,}+\@+\w{3,}+\.+\w{2,4}$/";
        if (!preg_match($pattern, $data["email"])) {
            $message->addMessage("Не верно заполнено поле \"email\"");
        }
        else if ($login = $persons->checkEmail($data["email"])) {
            $message->addMessage(" Такой email уже закреплен за пользователем $login");
        }
    }

    if (!isset($data["pass"]) || (empty($data["pass"]))) {
        $message->addMessage("Не заполнено поле \"pass\"  ");
    }

    if (!isset($data["re_pass"]) || (empty($data["re_pass"]))) {
        $message->addMessage(" Не заполнено поле \"re_pass\"");
    }
    else {
        $pattern = "/^\w{6,}$/";
        if (!preg_match($pattern, $data["re_pass"]) || !preg_match($pattern, $data["pass"])) {
            $message->addMessage("недопустимые символы в pass/re_pass , или длинна пароля меньше 6 символов  ");
        }
        else if ($data["re_pass"] != $data["pass"]) {
            $message->addMessage("Пароли не совпадают");
        }
    }

    $message->printMessage();
}
