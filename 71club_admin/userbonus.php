<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">

<?php
//////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////// MADE BY SPA4KY //////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////

require_once 'conn.php';
$pageTitle = "Bonus Management";
$curdate = date('Y-m-d h:i:s');
$sidebar = "Website Settings";

$bonusTypes = [
    3   => "Add New Bonus",
];

function addBonus($userId, $type, $amount, $remark, $conn, $bonusTypes) {
    $tableNames = [
        3   => "hodike_balakedara",
    ];

    if (!isset($tableNames[$type])) {
        return ["status" => "error", "message" => "Invalid bonus type."];
    }

    $tableName = $tableNames[$type];
    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d H:i:s");
    $serial = "Admin";

    try {
        $conn->begin_transaction();

        // 1. Get current balance first
        $getBalanceStmt = $conn->prepare("SELECT motta FROM shonu_kaichila WHERE balakedara = ?");
        if (!$getBalanceStmt) {
            throw new Exception("Error preparing balance statement: " . $conn->error);
        }
        $getBalanceStmt->bind_param("i", $userId);
        $getBalanceStmt->execute();
        $getBalanceStmt->bind_result($currentBalance);
        $getBalanceStmt->fetch();
        $getBalanceStmt->close();

        if ($currentBalance === null) {
            throw new Exception("User not found or has no balance record.");
        }

        // 2. Insert into the specific bonus table
        $stmt = $conn->prepare("INSERT INTO $tableName (userkani, price, serial, shonu, remark) VALUES (?, ?, ?, ?, ?)");
        if (!$stmt) {
            throw new Exception("Error preparing statement: " . $conn->error);
        }

        if (!$stmt->bind_param("idsss", $userId, $amount, $serial, $date, $remark)) {
            throw new Exception("Error binding parameters: " . $stmt->error);
        }

        if (!$stmt->execute()) {
            throw new Exception("Error executing statement: " . $stmt->error);
        }
        $stmt->close();

        // 3. Update user balance by ADDING to current balance
        $newBalance = $currentBalance + $amount;
        $updateStmt = $conn->prepare("UPDATE shonu_kaichila SET motta = ROUND(?, 2) WHERE balakedara = ?");
        if (!$updateStmt) {
            throw new Exception("Error preparing update statement: " . $conn->error);
        }

        if (!$updateStmt->bind_param("di", $newBalance, $userId)) {
            throw new Exception("Error binding parameters for update: " . $updateStmt->error);
        }

        if (!$updateStmt->execute()) {
            throw new Exception("Error updating balance: " . $updateStmt->error);
        }
        $updateStmt->close();

        $conn->commit();
        return ["status" => "success", "message" => "Bonus added successfully! New balance: " . number_format($newBalance, 2)];

    } catch (Exception $e) {
        $conn->rollback();
        return ["status" => "error", "message" => $e->getMessage()];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_bonus'])) {
    $userId = intval($_POST['user_id']);
    $type = intval($_POST['type']);
    $amount = floatval($_POST['amount']);
    $remark = htmlspecialchars($_POST['remark'] ?? '');

    if ($userId > 0 && $type > 0 && $amount > 0) {
        $result = addBonus($userId, $type, $amount, $remark, $conn, $bonusTypes);
        if ($result['status'] === 'success') {
            $success_message = $result['message'];
        } else {
            $error_message = $result['message'];
        }
    } else {
        $error_message = "Please provide valid inputs for all required fields.";
    }
}

include_once 'includes/header.php';
?>

<div class="container-fluid">
    <div class="row">
        <?php include 'includes/pages/side.php'; ?>
        
        <main class="col-md-9 ms-sm-auto px-md-4 py-3">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-3 mb-3 border-bottom">
                <h1 class="h2">Bonus Management</h1>
            </div>

            <?php if(isset($success_message)): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> <?php echo $success_message; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>

            <?php if(isset($error_message)): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> <?php echo $error_message; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title mb-0">Assign User Bonus</h5>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" autocomplete="off">
                                <div class="mb-3">
                                    <label for="user_id" class="form-label">User ID</label>
                                    <input type="number" class="form-control" id="user_id" name="user_id" required placeholder="Enter User ID">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="type" class="form-label">Bonus Type</label>
                                    <select class="form-select" id="type" name="type" required>
                                        <?php foreach ($bonusTypes as $typeId => $typeName): ?>
                                            <option value="<?= $typeId ?>"><?= htmlspecialchars($typeName) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Bonus Amount</label>
                                    <div class="input-group">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" step="0.01" class="form-control" id="amount" name="amount" required placeholder="Enter Amount">
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="remark" class="form-label">Remark (Optional)</label>
                                    <textarea class="form-control" id="remark" name="remark" rows="3" placeholder="Add any remarks..."></textarea>
                                </div>
                                
                                <div class="text-end">
                                    <button type="submit" name="add_bonus" class="btn btn-primary px-4">
                                        <i class="bi bi-plus-circle me-2"></i> Assign Bonus
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include('includes/footer.php'); ?>

<script>
// Auto-dismiss alerts after 5 seconds
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.5s ease-out';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }, 5000);
    });
    
    // Prevent form resubmission on page refresh
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
});
</script>