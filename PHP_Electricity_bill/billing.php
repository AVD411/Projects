<?php
include 'config.php';
$consumers = $pdo->query("SELECT * FROM consumers")->fetchAll(PDO::FETCH_ASSOC);
$billing = $pdo->query("SELECT b.*, c.name FROM billing b JOIN consumers c ON b.consumer_id = c.id")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Billing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php">Electricity Billing</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="consumer.php">Manage Consumers</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h2>Manage Billing</h2>
        <form id="billingForm" class="mb-4">
            <div class="mb-3">
                <label for="consumer_id" class="form-label">Consumer</label>
                <select class="form-control" id="consumer_id" name="consumer_id" required>
                    <option value="">Select Consumer</option>
                    <?php foreach ($consumers as $consumer): ?>
                    <option value="<?php echo $consumer['id']; ?>"><?php echo $consumer['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="units" class="form-label">Units Consumed</label>
                <input type="number" class="form-control" id="units" name="units" required>
            </div>
            <div class="mb-3">
                <label for="billing_date" class="form-label">Billing Date</label>
                <input type="date" class="form-control" id="billing_date" name="billing_date" required>
            </div>
            <button type="submit" class="btn btn-primary">Calculate & Save Bill</button>
        </form>
        <div id="billResult" class="alert alert-info" style="display: none;"></div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Consumer</th>
                    <th>Units</th>
                    <th>Bill Amount (₹)</th>
                    <th>Billing Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($billing as $bill): ?>
                <tr>
                    <td><?php echo $bill['id']; ?></td>
                    <td><?php echo $bill['name']; ?></td>
                    <td><?php echo $bill['units']; ?></td>
                    <td><?php echo number_format($bill['bill_amount'], 2); ?></td>
                    <td><?php echo $bill['billing_date']; ?></td>
                    <td>
                        <a href="api/update_billing.php?id=<?php echo $bill['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="api/delete_billing.php?id=<?php echo $bill['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
