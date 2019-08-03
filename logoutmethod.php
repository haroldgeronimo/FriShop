<html>
<body>
<?php
session_start();
session_destroy();
echo '<h1>Log Out Success!</h1>';
echo '<h2>You will be missed...</h2>';
header("Location:index.php");
?>

</body>
</html>