<?php
session_start();
unset($_SESSION['regno']);
unset($_SESSION['admin']);
header('Location:../index.php');