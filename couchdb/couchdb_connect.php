<?php
### ANON DSN
$couch_dsn = "http://localhost:5984/";
### AUTHENTICATED DSN
### $couch_dsn = "http://user:password@localhost:5984/"
$couch_db = "fruit_db";


/**
* include the library
*/

require_once "/lib/couch.php";
require_once "/lib/couchClient.php";
require_once "/lib/couchDocument.php";


/*
Do stuff here
*/

?>