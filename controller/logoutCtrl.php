<?php
session_start();
//La session se détruit, on est déconnecté
session_destroy();

header('location: /login.php');
exit;
