<?php
class Session {
    public static function user($login) {
        return (!empty($_SESSION['login']) && ($_SESSION['login'] == $login));
    }
}
?>