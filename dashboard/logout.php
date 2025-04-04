<?php
session_start();
session_destroy();
header("Location: http://localhost/fud-Mindpal/public/");
exit();
?>