<?php
require_once '../includes/admin_check.php';

$message = '';
$error = '';

// Handle Actions
if (isset($_GET['action']) && isset($_GET['id'])) {
    // CSRF Validation for GET actions
    validate_csrf($_GET['csrf_token'] ?? '');

    $id = (int)$_GET['id'];
    
    if ($id === (int)$_SESSION['user_id']) {
        $error = "You cannot modify your own account.";
    } else {
        if ($_GET['action'] === 'delete') {
            $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
            $stmt->execute([$id]);
            $message = "User deleted.";
        } elseif ($_GET['action'] === 'toggle_role') {
            $stmt = $pdo->prepare("SELECT role FROM users WHERE id = ?");
            $stmt->execute([$id]);
            $currentRole = $stmt->fetchColumn();
            $newRole = ($currentRole === 'admin') ? 'user' : 'admin';
            $stmt = $pdo->prepare("UPDATE users SET role = ? WHERE id = ?");
            $stmt->execute([$newRole, $id]);
            $message = "Role updated.";
        }
    }
}

// Fetch all users
$users = $pdo->query("SELECT id, full_name, email, role, created_at FROM users ORDER BY created_at DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - Empower Zone</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body class="admin-body">

    <!-- Mobile Header/Toggle -->
    <div style="position: fixed; top: 0; left: 0; right: 0; background: white; padding: 1rem; display: none; z-index: 1001; box-shadow: var(--shadow-sm);" class="mobile-top-bar">
        <button class="sidebar-toggle" id="sidebarToggle"><i class="fa fa-bars"></i></button>
        <strong>User Management</strong>
    </div>

    <aside class="admin-sidebar" id="sidebar">
        <div class="admin-logo">EMPOWER<span>ZONE</span></div>
        <nav class="admin-nav">
            <a href="dashboard.php" class="admin-nav-link">
                <i class="fa fa-chart-pie"></i>
                <span>Dashboard</span>
            </a>
            <a href="users.php" class="admin-nav-link active">
                <i class="fa fa-users"></i>
                <span>Users</span>
            </a>
            <a href="inquiries.php" class="admin-nav-link">
                <i class="fa fa-envelope-open-text"></i>
                <span>Inquiries</span>
            </a>
            <div style="height: 1px; background: rgba(255,255,255,0.05); margin: 1rem 0.75rem;"></div>
            <a href="../index.php" class="admin-nav-link">
                <i class="fa fa-external-link-alt"></i>
                <span>View Website</span>
            </a>
        </nav>
        <div class="admin-footer">
            <a href="../logout.php" class="admin-nav-link">
                <i class="fa fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <main class="admin-main">
        <header class="admin-header">
            <div>
                <h1>User Management</h1>
                <p style="color: var(--text-muted); margin-top: 0.5rem; font-weight: 500;">Control platform access and user permissions.</p>
            </div>
        </header>

        <?php if ($message): ?>
            <div style="background: #ecfeff; border: 1px solid var(--primary); color: var(--primary); padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem; font-weight: 600;">
                <i class="fa fa-check-circle"></i> <?php echo $message; ?>
            </div>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <div style="background: #fef2f2; border: 1px solid var(--danger); color: var(--danger); padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem; font-weight: 600;">
                <i class="fa fa-exclamation-circle"></i> <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <div class="search-container">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="userInput" class="search-input" placeholder="Search by name or email...">
        </div>

        <div class="admin-card">
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Status/Role</th>
                            <th>Joined</th>
                            <th style="text-align: right;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="userTable">
                        <?php foreach ($users as $user): ?>
                        <tr class="user-row">
                            <td>
                                <strong class="name-text"><?php echo htmlspecialchars($user['full_name']); ?></strong><br>
                                <small style="color: var(--text-muted);"><?php echo htmlspecialchars($user['email']); ?></small>
                            </td>
                            <td>
                                <span class="badge <?php echo $user['role'] === 'admin' ? 'badge-admin' : 'badge-user'; ?>">
                                    <?php echo ucfirst($user['role']); ?>
                                </span>
                            </td>
                            <td style="color: var(--text-muted); font-size: 0.8rem;"><?php echo date('M j, Y', strtotime($user['created_at'])); ?></td>
                            <td style="text-align: right;">
                                <a href="users.php?action=toggle_role&id=<?php echo $user['id']; ?>&csrf_token=<?php echo $_SESSION['csrf_token']; ?>" class="btn-action" style="color: var(--primary);" title="Change Role">
                                    <i class="fa fa-sync-alt"></i>
                                </a>
                                <a href="users.php?action=delete&id=<?php echo $user['id']; ?>&csrf_token=<?php echo $_SESSION['csrf_token']; ?>" class="btn-action btn-delete" title="Delete User" onclick="return confirm('Permanently delete this user?')">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        const toggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        if (toggle && sidebar) toggle.onclick = () => sidebar.classList.toggle('active');

        const userInput = document.getElementById('userInput');
        userInput.addEventListener('input', function() {
            const term = this.value.toLowerCase();
            const rows = document.querySelectorAll('.user-row');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(term) ? '' : 'none';
            });
        });
    </script>
</body>
</html>
