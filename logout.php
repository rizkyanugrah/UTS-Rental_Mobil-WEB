<?php

require 'session.php';

session_destroy();
header('Location: login/login.php');
die;
