<?php

require_once "DB.php";
require_once "../include/pear-database.php";

PEAR::setErrorHandling(PEAR_ERROR_CALLBACK, "error_handler");
list($progname, $type, $user, $pass, $db) = $argv;
$dbh = DB::connect("$type://$user:$pass@localhost/$db");

include "./addusers.php";
include "./addcategories.php";
include "./addpackages.php";

function error_handler($obj) {
	print "Error when adding users: ";
	print $obj->getMessage();
	print "\nMore info: ";
	print $obj->getUserInfo();
	print "\n";
	exit;
}

?>
