<?php
session_name('SISTEM');
session_start();
require_once("config/const.php");
header("Location:" . URL_APP);