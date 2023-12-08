<?php

session_start();
session_destroy();
?>

<form method="post" name="myForm" id="myForm" action="../login.php">
    <input type="hidden" name="msg" value="OP52">
</form>

<script>
    document.getElementById('myForm').submit();
</script>

