<?php
$config = require_once "config.php";
require_once "connect.php";
require_once "userData.php";
$user = new userData(Connection:: MakeConnection($config));