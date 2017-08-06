<?php
$dsn = sprintf('mysql:host=%s;dbname=%s', SAE_MYSQL_HOST_M, SAE_MYSQL_DB);

return [
    'class' => 'yii\db\Connection',
    'dsn' => $dsn,
    'username' => SAE_MYSQL_USER,
    'password' => SAE_MYSQL_PASS,
    'charset' => 'utf8',
];
