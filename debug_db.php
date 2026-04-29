<?php
require_once 'includes/config.php';

echo "<h1>Database Debug</h1>";

if ($pdo === null) {
    die("PDO connection is NULL. Error: " . ($dbError ?? 'Unknown'));
}

try {
    $stmt = $pdo->query("SELECT * FROM inquiries");
    $data = $stmt->fetchAll();
    
    echo "<h3>Total Inquiries: " . count($data) . "</h3>";
    
    if (count($data) > 0) {
        echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Email</th><th>Status</th></tr>";
        foreach ($data as $row) {
            echo "<tr><td>{$row['id']}</td><td>{$row['full_name']}</td><td>{$row['email']}</td><td>{$row['status']}</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Table 'inquiries' is EMPTY.</p>";
    }
} catch (PDOException $e) {
    echo "<p style='color:red;'>Error querying table 'inquiries': " . $e->getMessage() . "</p>";
}
?>
