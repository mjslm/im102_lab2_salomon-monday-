<?php
require_once 'config.php';

$sql = " SELECT p.id, p.name, p.description, p.price, p.stock, p.created_at,
        c.name AS category, s.name AS supplier
        FROM products p
        JOIN categories c ON p.category_id = c.id
        JOIN suppliers s ON p.supplier_id = s.id
        ORDER BY p.id ASC
        ";

$result = $conn->query($sql);
?>

<!DOCTYPE html>

<html>
<head>
    <title>Inventory System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Inventory System</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Product</th>
        <th>Description</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Category</th>
        <th>Supplier</th>
        <th>Created At</th>
        
    </tr>

    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['description']) ?></td>
        <td><?= $row['price'] ?></td>
        <td><?= $row['stock'] ?></td>
        <td><?= htmlspecialchars($row['category']) ?></td>
        <td><?= htmlspecialchars($row['supplier']) ?></td>
        <td><?= $row['created_at'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<p class="count">
    Total: <?= $result->num_rows ?> product(s)
</p>

</div>

</body>
</html>
