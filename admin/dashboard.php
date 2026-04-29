<?php
require_once '../includes/admin_check.php';

// --- AJAX Handler ---
if (isset($_GET['ajax'])) {
    header('Content-Type: application/json');
    $action = $_GET['action'] ?? '';
    
    if ($action === 'getTrendData') {
        $days = intval($_GET['days'] ?? 7);
        $stmt = $pdo->prepare("
            SELECT DATE(created_at) as date, COUNT(*) as count 
            FROM inquiries 
            WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL ? DAY)
            GROUP BY DATE(created_at)
            ORDER BY DATE(created_at) ASC
        ");
        $stmt->execute([$days]);
        $data = $stmt->fetchAll();
        
        $labels = []; $counts = [];
        foreach($data as $row) {
            $labels[] = date('M j', strtotime($row['date']));
            $counts[] = (int)$row['count'];
        }
        
        $total = array_sum($counts);
        $avg = count($counts) > 0 ? round($total / count($counts), 1) : 0;
        
        echo json_encode([
            'labels' => $labels,
            'counts' => $counts,
            'stats' => ['total' => $total, 'avg' => $avg]
        ]);
        exit;
    }
    
    if ($action === 'getProgramData') {
        $mode = $_GET['mode'] ?? 'Volume';
        
        if ($mode === 'Growth') {
            // Calculate growth: Current 30 days vs Previous 30 days
            $stmt = $pdo->query("
                SELECT program, 
                       SUM(CASE WHEN created_at >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) THEN 1 ELSE 0 END) as current_count,
                       SUM(CASE WHEN created_at >= DATE_SUB(CURDATE(), INTERVAL 60 DAY) AND created_at < DATE_SUB(CURDATE(), INTERVAL 30 DAY) THEN 1 ELSE 0 END) as prev_count
                FROM inquiries 
                GROUP BY program
            ");
            $data = $stmt->fetchAll();
            $labels = []; $counts = [];
            foreach($data as $row) {
                $labels[] = strtoupper($row['program']);
                $current = (int)$row['current_count'];
                $prev = (int)$row['prev_count'];
                $growth = $prev > 0 ? round((($current - $prev) / $prev) * 100, 1) : ($current > 0 ? 100 : 0);
                $counts[] = $growth;
            }
        } else {
            $stmt = $pdo->query("SELECT program, COUNT(*) as count FROM inquiries GROUP BY program ORDER BY count DESC");
            $data = $stmt->fetchAll();
            $labels = []; $counts = [];
            foreach($data as $row) {
                $labels[] = strtoupper($row['program']);
                $counts[] = (int)$row['count'];
            }
        }
        
        $totalAll = array_sum($counts);
        $topPct = $totalAll > 0 ? round(($counts[0] / $totalAll) * 100, 1) : 0;
        
        echo json_encode([
            'labels' => $labels,
            'counts' => $counts,
            'stats' => [
                'top' => $labels[0] ?? 'None', 
                'count' => count($labels),
                'pct' => $topPct
            ]
        ]);
        exit;
    }
}

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

// Fetch inquiries by program for bar chart
$programData = $pdo->query("
    SELECT program, COUNT(*) as count 
    FROM inquiries 
    GROUP BY program 
    ORDER BY count DESC
")->fetchAll();

$programs = [];
$programCounts = [];
foreach($programData as $row) {
    $programs[] = strtoupper($row['program']);
    $programCounts[] = $row['count'];
}

// Summary Stats for Charts
$totalInquiries7D = array_sum($counts);
$avgDailyInquiries = count($counts) > 0 ? round($totalInquiries7D / count($counts), 1) : 0;

$totalInquiriesAll = array_sum($programCounts);
$mostPopularProgram = !empty($programs) ? $programs[0] : 'None';
$topProgramCount = !empty($programCounts) ? $programCounts[0] : 0;
$topProgramPercentage = $totalInquiriesAll > 0 ? round(($topProgramCount / $totalInquiriesAll) * 100, 1) : 0;
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

        <!-- Charts Section -->
        <div class="charts-grid">
            <!-- Line Chart: Trends -->
            <div class="chart-card">
                <div class="chart-header">
                    <div class="chart-header-info">
                        <h3>Inquiry Trends</h3>
                        <p>Total submissions over time</p>
                    </div>
                    <div class="chart-controls">
                        <button class="control-btn active">7D</button>
                        <button class="control-btn">30D</button>
                        <button class="control-btn">90D</button>
                    </div>
                </div>

                <div class="chart-summary">
                    <div class="summary-item">
                        <span class="summary-label">Total Inquiries</span>
                        <span class="summary-value"><?php echo $totalInquiries7D; ?></span>
                        <span class="summary-trend trend-up"><i class="fa fa-caret-up"></i> 12.5%</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Daily Average</span>
                        <span class="summary-value"><?php echo $avgDailyInquiries; ?></span>
                        <span class="summary-trend" style="color: var(--text-muted);">Stable</span>
                    </div>
                </div>

                <div style="height: 250px; position: relative;">
                    <canvas id="inquiryChart"></canvas>
                </div>
            </div>

            <!-- Bar Chart: Programs -->
            <div class="chart-card">
                <div class="chart-header">
                    <div class="chart-header-info">
                        <h3>Program Analytics</h3>
                        <p>Distribution by category</p>
                    </div>
                    <div class="chart-controls">
                        <button class="control-btn active">Volume</button>
                        <button class="control-btn">Growth</button>
                    </div>
                </div>

                <div class="chart-summary">
                    <div class="summary-item">
                        <span class="summary-label">Top Program</span>
                        <span class="summary-value" style="font-size: 1rem;"><?php echo $mostPopularProgram; ?></span>
                        <span class="summary-trend trend-up"><i class="fa fa-chart-pie"></i> <?php echo $topProgramPercentage; ?>% Share</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Categories</span>
                        <span class="summary-value"><?php echo count($programs); ?></span>
                        <span class="summary-trend" style="color: var(--text-muted);">Active</span>
                    </div>
                </div>

                <div style="height: 250px; position: relative;">
                    <canvas id="programChart"></canvas>
                </div>
            </div>
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
        
        // Create Gradient for fill
        const gradient = ctx.createLinearGradient(0, 0, 0, 300);
        gradient.addColorStop(0, 'rgba(44, 125, 133, 0.3)');
        gradient.addColorStop(1, 'rgba(44, 125, 133, 0.02)');

        // Shadow Plugin
        const shadowPlugin = {
            id: 'shadow',
            beforeDraw: (chart) => {
                const { ctx } = chart;
                ctx.save();
                ctx.shadowColor = 'rgba(44, 125, 133, 0.3)';
                ctx.shadowBlur = 10;
                ctx.shadowOffsetX = 0;
                ctx.shadowOffsetY = 4;
            },
            afterDraw: (chart) => {
                chart.ctx.restore();
            }
        };

        const inquiryChart = new Chart(ctx, {
            type: 'line',
            plugins: [shadowPlugin],
            data: {
                labels: <?php echo json_encode($dates); ?>,
                datasets: [{
                    label: 'Inquiries',
                    data: <?php echo json_encode($counts); ?>,
                    borderColor: '#2c7d85',
                    backgroundColor: gradient,
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 6,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#2c7d85',
                    pointBorderWidth: 2,
                    pointHoverRadius: 8,
                    pointHoverBackgroundColor: '#2c7d85',
                    pointHoverBorderColor: '#fff',
                    pointHoverBorderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { 
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#0f172a',
                        titleFont: { size: 13, weight: '700', family: 'Inter' },
                        bodyFont: { size: 13, family: 'Inter' },
                        padding: 12,
                        cornerRadius: 8,
                        displayColors: false,
                        callbacks: {
                            label: function(context) {
                                return ` ${context.parsed.y} Inquiries`;
                            }
                        }
                    }
                },
                scales: {
                    y: { 
                        beginAtZero: true, 
                        grid: { color: 'rgba(0,0,0,0.05)', borderDash: [5, 5] }, 
                        ticks: { 
                            stepSize: 1,
                            font: { family: 'Inter', size: 11, weight: '600' },
                            color: '#94a3b8'
                        },
                        border: { display: false }
                    },
                    x: { 
                        grid: { display: false },
                        ticks: {
                            font: { family: 'Inter', size: 11, weight: '600' },
                            color: '#94a3b8'
                        },
                        border: { display: false }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                animation: {
                    duration: 1000,
                    easing: 'easeOutQuart'
                }
            }
        });

        // --- Chart: Programs ---
        const barCtx = document.getElementById('programChart').getContext('2d');
        const palette = ['#2c7d85', '#3a9fa8', '#10b981', '#f59e0b', '#6366f1', '#ec4899', '#8b5cf6'];
        let programChart;

        function renderProgramChart(labels, counts, isGrowth = false) {
            if (programChart) programChart.destroy();

            const chartType = isGrowth ? 'bar' : 'pie';
            const colors = isGrowth ? counts.map(v => v >= 0 ? '#10b981' : '#ef4444') : palette;

            programChart = new Chart(barCtx, {
                type: chartType,
                data: {
                    labels: labels,
                    datasets: [{
                        data: counts,
                        backgroundColor: colors,
                        borderColor: isGrowth ? 'transparent' : '#fff',
                        borderWidth: isGrowth ? 0 : 2,
                        borderRadius: isGrowth ? 4 : 0,
                        hoverOffset: isGrowth ? 0 : 15,
                        barThickness: isGrowth ? 20 : 'flex'
                    }]
                },
                options: {
                    indexAxis: isGrowth ? 'y' : 'x',
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { 
                            display: !isGrowth, 
                            position: 'right',
                            labels: {
                                boxWidth: 12, padding: 15, font: { family: 'Inter', size: 11, weight: '600' }, color: '#64748b'
                            }
                        },
                        tooltip: {
                            backgroundColor: '#0f172a',
                            padding: 12,
                            cornerRadius: 8,
                            titleFont: { family: 'Inter', weight: '700' },
                            bodyFont: { family: 'Inter' },
                            callbacks: {
                                label: (c) => {
                                    const value = c.parsed.x !== undefined ? c.parsed.x : (c.parsed.y !== undefined ? c.parsed.y : c.parsed);
                                    if (isGrowth) return ` ${c.label}: ${value}% Growth Rate`;
                                    
                                    const total = c.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = total > 0 ? ((value / total) * 100).toFixed(1) : 0;
                                    return ` ${c.label}: ${percentage}% (${value} Inquiries)`;
                                }
                            }
                        }
                    },
                    scales: isGrowth ? {
                        x: { 
                            grid: { color: 'rgba(0,0,0,0.05)', borderDash: [5, 5] },
                            ticks: { callback: (v) => v + '%', font: { family: 'Inter', size: 10 } },
                            border: { display: false }
                        },
                        y: { 
                            grid: { display: false },
                            ticks: { font: { family: 'Inter', size: 10, weight: '700' }, color: '#64748b' },
                            border: { display: false }
                        }
                    } : {},
                    layout: {
                        padding: { left: 10, right: 20, top: 10, bottom: 10 }
                    },
                    animation: { duration: 1000, easing: 'easeOutQuart' }
                }
            });
        }



        renderProgramChart(<?php echo json_encode($programs); ?>, <?php echo json_encode($programCounts); ?>);

        // --- Functional Buttons ---
        document.querySelectorAll('.control-btn').forEach(btn => {
            btn.addEventListener('click', async (e) => {
                const group = e.target.closest('.chart-card');
                const isTrend = group.querySelector('#inquiryChart');
                const siblings = e.target.parentElement.querySelectorAll('.control-btn');
                siblings.forEach(s => s.classList.remove('active'));
                e.target.classList.add('active');

                const value = e.target.innerText;
                group.style.opacity = '0.6';
                group.style.pointerEvents = 'none';

                try {
                    if (isTrend) {
                        const days = value === '7D' ? 7 : (value === '30D' ? 30 : 90);
                        const res = await fetch(`dashboard.php?ajax=1&action=getTrendData&days=${days}`);
                        const data = await res.json();
                        
                        inquiryChart.data.labels = data.labels;
                        inquiryChart.data.datasets[0].data = data.counts;
                        inquiryChart.update();
                        
                        group.querySelector('.summary-value').innerText = data.stats.total;
                        group.querySelectorAll('.summary-value')[1].innerText = data.stats.avg;
                    } else {
                        const res = await fetch(`dashboard.php?ajax=1&action=getProgramData&mode=${value}`);
                        const data = await res.json();
                        renderProgramChart(data.labels, data.counts, value === 'Growth');
                        
                        group.querySelector('.summary-value').innerText = data.stats.top;
                        group.querySelectorAll('.summary-value')[1].innerText = data.stats.count;
                        group.querySelector('.summary-trend').innerHTML = `<i class="fa fa-chart-pie"></i> ${data.stats.pct}% Share`;
                    }
                } catch (err) { console.error(err); }
                
                group.style.opacity = '1';
                group.style.pointerEvents = 'all';
            });
        });

        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                renderProgramChart(programChart.data.labels, programChart.data.datasets[0].data, programChart.data.datasets[0].label === 'Growth %');
            }, 250);
        });
    </script>
</body>
</html>
