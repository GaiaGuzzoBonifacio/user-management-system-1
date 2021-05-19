<pre>
<?php

use sarassoroberto\usm\service\UserSession;


require __DIR__."/../../__autoload.php";
require __DIR__."/../../vendor/testTools/testTool.php";

$us = new UserSession();

$user = $us->autenticate('luigi.russo@email.com','Luigi');

print_r($_SESSION);

// assertEquals($_SESSION['user_autenticated'],$user); 

?>
</pre>