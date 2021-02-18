<?php
if(!session_id()) session_start();
require_once "../App/init.php";

//menjalanan aplikasi dari proses bootstraping
$app = new App();
