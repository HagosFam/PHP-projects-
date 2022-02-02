<?php

# list of cridentals needed to connect to the data base

define('DBUSERNAME','root');
define('DBPASSWORD','');
define('DBHOST','localhost');
define('DBNAME','stock');

# creating the connection String

$con = mysqli_connect(DBHOST,DBUSERNAME,DBPASSWORD) or die(mysqli_error());
mysqli_select_db($con,DBNAME)


?>