<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = (int) ($_POST["id"] ?? 0);
    $action = $_POST["action"] ?? "";

    if ($id > 0 && ($action === "increment" || $action === "decrement")) {
        $query = $action === "increment"
            ? "UPDATE oggetti SET quantita = quantita + 1 WHERE id = ?"
            : "UPDATE oggetti SET quantita = GREATEST(quantita - 1, 0) WHERE id = ?";

        $stmt = $conn->prepare($query);
        if ($stmt) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
        }
    }
}

header("Location: index.php");
exit;
