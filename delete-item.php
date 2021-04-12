<?php

session_start();
require "functions.php";

$id = $_POST['todo_id'];
delete_item($id);