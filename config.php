<?php
// Configurazione database gestione magazzino
$conn = new mysqli('localhost', 'root', '', 'LabChimica');

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
