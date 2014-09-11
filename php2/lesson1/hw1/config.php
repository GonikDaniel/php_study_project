<?php

require_once ('constants.php');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or trigger_error(mysql_error());

mysqli_query($dbc, "SET NAMES utf8");
mysqli_query($dbc, "SET character_set_client = utf8");
mysqli_query($dbc, "SET character_set_connection = utf8");
mysqli_query($dbc, "SET character_set_results = utf8");

