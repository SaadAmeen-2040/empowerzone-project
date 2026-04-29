<?php
require_once '../includes/admin_check.php';

// Fetch stats
$totalUsers = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
$newToday   = $pdo->query("SELECT COUNT(*) FROM users WHERE DATE(created_at) = CURDATE()")->fetchColumn();
$totalInquiries = $pdo->query("SELECT COUNT(*) FROM inquiries")->fetchColumn();
$resolvedInquiries = $pdo->query("SELECT COUNT(*) FROM inquiries WHERE status = 'Resolved'")->fetchColumn();

// Fetch 5 most recent users
$recentUsers = $pdo->query("SELECT full_name, role, created_at FROM users ORDER BY created_at DESC LIMIT 5")->fetchAll();

// Fetch 5 most recent inquiries
$recentInquiries = $pdo->query("SELECT full_name, program, status FROM inquiries ORDER BY created_at DESC LIMIT 5")->fetchAll();

// Fetch data for chart (last 7 days)
$chartData = $pdo->query("
    SELECT DATE(created_at) as date, COUNT(*) as count 
    FROM inquiries 
    WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)
    GROUP BY DATE(created_at)
    ORDER BY DATE(created_at) ASC
")->fetchAll();

$dates = [];
$counts = [];
foreach($chartData as $row) {
    $dates[] = date('M j', strtotime($row['date']));
    $counts[] = $row['count'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Empower Zone</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="admin-body">

    <!-- Mobile Header/Toggle -->
    <div style="position: fixed; top: 0; left: 0; right: 0; background: white; padding: 1rem; display: none; z-index: 1001; box-shadow: var(--shadow-sm);" class="mobile-top-bar">
        <button class="sidebar-toggle" id="sidebarToggle">
            <i class="fa fa-bars"></i>
        </button>
        <strong style="font-size: 1.1rem;">Empower Zone</strong>
    </div>

    <!-- Sidebar -->
    <aside class="admin-sidebar" id="sidebar">
        <div class="admin-logo">EMPOWER<span>ZONE</span></div>
        <nav class="admin-nav">
            <a href="dashboard.php" class="admin-nav-link active">
                <i class="fa fa-chart-pie"></i>
                <span>Dashboard</span>
            </a>
            <a href="users.php" class="admin-nav-link">
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

    <!-- Main Content -->
    <main class="admin-main">
        <header class="admin-header">
            <div>
                <h1>Dashboard</h1>
                <p style="color: var(--text-muted); margin-top: 0.5rem; font-weight: 500;">
                    Welcome back, <span style="color: var(--primary); font-weight: 700;"><?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                </p>
            </div>
            <div class="header-actions">
                <button class="badge badge-admin" style="border:none; cursor:default;">
                    <i class="fa fa-calendar-alt" style="margin-right: 0.5rem;"></i> <?php echo date('M j, Y'); ?>
                </button>
            </div>
        </header>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon primary"><i class="fa fa-users"></i></div>
                <div class="stat-info">
                    <h3>Total Users</h3>
                    <p><?php echo $totalUsers; ?></p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon success"><i class="fa fa-user-plus"></i></div>
                <div class="stat-info">
                    <h3>New Today</h3>
                    <p><?php echo $newToday; ?></p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon warning"><i class="fa fa-envelope"></i></div>
                <div class="stat-info">
                    <h3>Inquiries</h3>
                    <p><?php echo $totalInquiries; ?></p>
                    <small style="color: var(--success); font-weight: 600;"><?php echo $resolvedInquiries; ?> Resolved</small>
                </div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="chart-card">
            <h3 style="margin-bottom: 1.5rem; font-size: 1rem; font-weight: 700;">Inquiry Trends (Last 7 Days)</h3>
            <canvas id="inquiryChart" style="width: 100%; height: 250px;"></canvas>
        </div>

        <div class="dashboard-tables" style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
            <!-- Recent Users -->
            <div class="admin-card">
                <div class="admin-card-header">
                    <h2 style="font-size: 1rem; font-weight: 700; margin: 0;">Recent Signups</h2>
                    <a href="users.php" style="color: var(--primary); text-decoration: none; font-size: 0.8125rem; font-weight: 700;">View All <i class="fa fa-arrow-right"></i></a>
                </div>
                <div class="admin-table-wrap">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recentUsers as $user): ?>
                            <tr>
                                <td><strong><?php echo htmlspecialchars($user['full_name']); ?></strong></td>
                                <td>
                                    <span class="badge <?php echo $user['role'] === 'admin' ? 'badge-admin' : 'badge-user'; ?>">
                                        <?php echo ucfirst($user['role']); ?>
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Recent Inquiries -->
            <div class="admin-card">
                <div class="admin-card-header">
                    <h2 style="font-size: 1rem; font-weight: 700; margin: 0;">Recent Inquiries</h2>
                    <a href="inquiries.php" style="color: var(--primary); text-decoration: none; font-size: 0.8125rem; font-weight: 700;">View All <i class="fa fa-arrow-right"></i></a>
                </div>
                <div class="admin-table-wrap">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recentInquiries as $iq): ?>
                            <tr>
                                <td><strong><?php echo htmlspecialchars($iq['full_name']); ?></strong><br><small><?php echo strtoupper($iq['program']); ?></small></td>
                                <td>
                                    <span class="badge <?php echo ($iq['status'] === 'New' ? 'badge-new' : ($iq['status'] === 'In Progress' ? 'badge-progress' : 'badge-resolved')); ?>">
                                        <?php echo $iq['status']; ?>
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script>
        // --- Sidebar Toggle ---
        const toggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        if (toggle && sidebar) {
            toggle.onclick = () => sidebar.classList.toggle('active');
        }

        // --- Chart ---
        const ctx = document.getElementById('inquiryChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($dates); ?>,
                datasets: [{
                    label: 'Inquiries',
                    data: <?php echo json_encode($counts); ?>,
                    borderColor: '#2c7d85',
                    backgroundColor: 'rgba(44, 125, 133, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 4,
                    pointBackgroundColor: '#2c7d85'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, grid: { borderDash: [5, 5] }, ticks: { stepSize: 1 } },
                    x: { grid: { display: false } }
                }
            }
        });
    </script>
</body>
</html>
