<?php
   define('DB_SERVER', '167.99.85.3');
   define('DB_USERNAME', 'obsimo2');
   define('DB_PASSWORD', '16oBSiMo16');
   define('DB_DATABASE', 'obsimoData');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   $db->query('SET CHARACTER SET utf8');
?>
