<?php

class Message {

    private $arr;

    function addMessage($message) {
        $this->arr[] = '<p class="error">' . $message . '</p>';
    }

    function printMessage() {
        if (count($this->arr) == 0) {
            echo '<p class="fine">OK</p>';
        }else {
            foreach ($this->arr as $key) {
                echo $key;
            }
        }
    }

}
