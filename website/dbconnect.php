<?php
$conn = new PDO('mysql:host = localhost; dbname = project_fifa', 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
?>