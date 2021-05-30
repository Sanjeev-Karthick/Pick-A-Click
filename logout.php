<?php
session_start();
session_destroy();
header("Location: /pickaclick/index.php");

?>