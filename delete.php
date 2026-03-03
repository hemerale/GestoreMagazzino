<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = (int) ($_POST["id"] ?? 0);

    if ($id > 0) {
        $stmt = $conn->prepare("DELETE FROM oggetti WHERE id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
        }
    }
}

header("Location: index.php");
exit;
