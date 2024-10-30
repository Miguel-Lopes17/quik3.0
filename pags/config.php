<?php

$dbHost = 'br612.hostgator.com.br';
$dbUsername = 'hubsap45_usrvotation';
$dbPassword = 'pipoca2024';
$dbdatabase = 'hubsap45_bd_2cb_votation';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbdatabase);

if ($conexao->connect_error) {
//     echo "Erro";
// }else {
//     echo "Conectado ";
}

?>