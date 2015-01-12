<?php
ini_set('session.cookie_lifetime', '36000');
ini_set("session.gc_maxlifetime", '36000');
ini_set('session.cache_expire', '600');
session_start();
date_default_timezone_set('Europe/Paris');
error_reporting(E_ALL);
?>