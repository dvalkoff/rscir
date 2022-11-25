<?php
if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once('../theme.php');

echo 'Поздравляю, Вы - администратор!';