<?php

$dbhost = 'Localhost';
$dbusername = 'pedrok';
$dbpassword = 'root';
$dbname = 'db_clinware';

$conexao = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);

if ($conexao->connect_errno)
{
    echo "Erro";
}
else 
{
 echo "Conexão efetuada";
}

?>