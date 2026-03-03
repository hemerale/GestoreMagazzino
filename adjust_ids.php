<?php
require_once "config.php";

try {
    if (!$conn->query("CREATE TEMPORARY TABLE oggetti_tmp (id INT AUTO_INCREMENT PRIMARY KEY, nome VARCHAR(255) NOT NULL, quantita INT NOT NULL)")) {
        throw new RuntimeException($conn->error);
    }
    if (!$conn->query("INSERT INTO oggetti_tmp (nome, quantita) SELECT nome, quantita FROM oggetti ORDER BY id")) {
        throw new RuntimeException($conn->error);
    }
    if (!$conn->query("TRUNCATE TABLE oggetti")) {
        throw new RuntimeException($conn->error);
    }
    if (!$conn->query("INSERT INTO oggetti (nome, quantita) SELECT nome, quantita FROM oggetti_tmp ORDER BY id")) {
        throw new RuntimeException($conn->error);
    }

    $maxResult = $conn->query("SELECT COALESCE(MAX(id), 0) + 1 AS next_id FROM oggetti");
    if (!$maxResult) {
        throw new RuntimeException($conn->error);
    }
    $nextId = (int) ($maxResult->fetch_assoc()["next_id"] ?? 1);
    $maxResult->free();

    if (!$conn->query("ALTER TABLE oggetti AUTO_INCREMENT = " . max(1, $nextId))) {
        throw new RuntimeException($conn->error);
    }

    header("Location: index.php?msg=adjust_ok");
} catch (Throwable $e) {
    header("Location: index.php?error=" . urlencode("ID adjustment fallito: " . $e->getMessage()));
}

exit;
