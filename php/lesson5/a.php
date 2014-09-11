<?php 
$username = 'http://localhost:8888' . $_SERVER['REQUEST_URI'];
setcookie('username',$username,time()+3600*24*7);

?>

<h1>This is A page! SPAAAARTA!!!</h1>
<p><a href="logout.php">Log out!</a></p> 
<p><a href="a.php">Page A</a></p> 
<p><a href="b.php">Page B</a></p>
<p><a href="cookie_clean.php">Clean my cookie!</a></p>
