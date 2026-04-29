<?php
require_once '../includes/admin_check.php';

$message = '';
$error = '';

// Handle Actions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bulk_action'])) {
    // CSRF Validation
    validate_csrf($_POST['csrf_token'] ?? '');

    $ids = $_POST['inquiry_ids'] ?? [];
    if (!empty($ids)) {
        $placeholders = str_repeat('?,', count($ids) - 1) . '?';
        if ($_POST['bulk_action'] === 'delete') {
            $stmt = $pdo->prepare("DELETE FROM inquiries WHERE id IN ($placeholders)");
            $stmt->execute($ids);
            $message = count($ids) . " inquiries deleted successfully.";
        } elseif ($_POST['bulk_action'] === 'resolve') {
            $stmt = $pdo->prepare("UPDATE inquiries SET status = 'Resolved' WHERE id IN ($placeholders)");
            $stmt->execute($ids);
            $message = count($ids) . " inquiries marked as Resolved.";
        }
    } else {
        $error = "No inquiries selected.";
    }
}

if (isset($_GET['action']) && isset($_GET['id'])) {
    // CSRF Validation for GET actions
    validate_csrf($_GET['csrf_token'] ?? '');

    $id = (int)$_GET['id'];
    if ($_GET['action'] === 'delete') {
        $stmt = $pdo->prepare("DELETE FROM inquiries WHERE id = ?");
        $stmt->execute([$id]);
        $message = "Inquiry deleted.";
    } elseif ($_GET['action'] === 'status') {
        $status = $_GET['val'];
        $stmt = $pdo->prepare("UPDATE inquiries SET status = ? WHERE id = ?");
        $stmt->execute([$status, $id]);
        $message = "Status updated to $status.";
    }
}

// Fetch inquiries
$inquiries = $pdo->query("SELECT * FROM inquiries ORDER BY created_at DESC")->fetchAll();

// Count for tabs
$counts = [
    'all'      => count($inquiries),
    'new'      => 0,
    'progress' => 0,
    'resolved' => 0
];
foreach ($inquiries as $iq) {
    if ($iq['status'] === 'New') $counts['new']++;
    elseif ($iq['status'] === 'In Progress') $counts['progress']++;
    elseif ($iq['status'] === 'Resolved') $counts['resolved']++;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiries Manager - Empower Zone</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <style>
        .filter-tabs { display: flex; gap: 0.5rem; margin-bottom: 2rem; border-bottom: 1px solid #e2e8f0; padding-bottom: 1rem; overflow-x: auto; }
        .filter-tab { padding: 0.625rem 1.25rem; border-radius: 0.5rem; font-size: 0.875rem; font-weight: 600; cursor: pointer; color: var(--text-muted); transition: all 0.2s; border: 1px solid transparent; white-space: nowrap; }
        .filter-tab:hover { background: #f1f5f9; color: var(--text-main); }
        .filter-tab.active { background: white; color: var(--primary); border-color: #e2e8f0; box-shadow: var(--shadow-sm); }
        .filter-tab span { margin-left: 0.5rem; padding: 0.125rem 0.5rem; background: #f1f5f9; border-radius: 999px; font-size: 0.75rem; }
        .filter-tab.active span { background: #ecfeff; color: var(--primary); }

        .bulk-actions { display: none; align-items: center; gap: 1rem; padding: 1rem 1.5rem; background: #0f172a; color: white; border-radius: var(--radius); margin-bottom: 1.5rem; animation: slideIn 0.3s ease; }
        @keyframes slideIn { from { transform: translateY(-10px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        
        .btn-bulk { padding: 0.5rem 1rem; border-radius: 0.375rem; border: none; font-weight: 600; cursor: pointer; font-size: 0.8125rem; transition: opacity 0.2s; }
        .btn-bulk-delete { background: var(--danger); color: white; }
        .btn-bulk-resolve { background: var(--success); color: white; }

        .table-checkbox { width: 1.125rem; height: 1.125rem; border-radius: 0.25rem; cursor: pointer; }
        .row-selected { background-color: #f0f9ff !important; }
        
        .status-dot { width: 8px; height: 8px; border-radius: 50%; display: inline-block; margin-right: 6px; }
        .dot-new { background: var(--success); }
        .dot-progress { background: var(--warning); }
        .dot-resolved { background: var(--secondary); }
    </style>
</head>
<body class="admin-body">

    <div style="position: fixed; top: 0; left: 0; right: 0; background: white; padding: 1rem; display: none; z-index: 1001; box-shadow: var(--shadow-sm);" class="mobile-top-bar">
        <button class="sidebar-toggle" id="sidebarToggle"><i class="fa fa-bars"></i></button>
        <strong>Inquiries Manager</strong>
    </div>

    <aside class="admin-sidebar" id="sidebar">
        <div class="admin-logo">EMPOWER<span>ZONE</span></div>
        <nav class="admin-nav">
            <a href="dashboard.php" class="admin-nav-link"><i class="fa fa-chart-pie"></i><span>Dashboard</span></a>
            <a href="users.php" class="admin-nav-link"><i class="fa fa-users"></i><span>Users</span></a>
            <a href="inquiries.php" class="admin-nav-link active"><i class="fa fa-envelope-open-text"></i><span>Inquiries</span></a>
            <div style="height: 1px; background: rgba(255,255,255,0.05); margin: 1rem 0.75rem;"></div>
            <a href="../index.php" class="admin-nav-link"><i class="fa fa-external-link-alt"></i><span>View Website</span></a>
        </nav>
        <div class="admin-footer"><a href="../logout.php" class="admin-nav-link"><i class="fa fa-sign-out-alt"></i><span>Logout</span></a></div>
    </aside>

    <main class="admin-main">
        <header class="admin-header">
            <div>
                <h1>Contact Inquiries</h1>
                <p style="color: var(--text-muted); margin-top: 0.5rem; font-weight: 500;">Efficiently manage and track all client interactions.</p>
            </div>
        </header>

        <?php if ($message): ?>
            <div style="background: #ecfeff; border: 1px solid var(--primary); color: var(--primary); padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem; font-weight: 600;">
                <i class="fa fa-check-circle"></i> <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <!-- Filter Tabs -->
        <div class="filter-tabs">
            <div class="filter-tab active" onclick="filterByStatus('all', this)">All Inquiries <span><?php echo $counts['all']; ?></span></div>
            <div class="filter-tab" onclick="filterByStatus('New', this)">New <span><?php echo $counts['new']; ?></span></div>
            <div class="filter-tab" onclick="filterByStatus('In Progress', this)">In Progress <span><?php echo $counts['progress']; ?></span></div>
            <div class="filter-tab" onclick="filterByStatus('Resolved', this)">Resolved <span><?php echo $counts['resolved']; ?></span></div>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; gap: 1rem; flex-wrap: wrap;">
            <div class="search-container" style="margin-bottom: 0; flex: 1;">
                <i class="fa fa-search search-icon"></i>
                <input type="text" id="searchInput" class="search-input" placeholder="Search name, email, program or message...">
            </div>
        </div>

        <!-- Bulk Actions Bar -->
        <form id="bulkForm" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <div class="bulk-actions" id="bulkBar">
                <span id="selectedCount" style="font-weight: 700; margin-right: 1rem;">0 items selected</span>
                <button type="submit" name="bulk_action" value="resolve" class="btn-bulk btn-bulk-resolve"><i class="fa fa-check"></i> Mark Resolved</button>
                <button type="submit" name="bulk_action" value="delete" class="btn-bulk btn-bulk-delete" onclick="return confirm('Delete selected inquiries?')"><i class="fa fa-trash"></i> Delete</button>
                <input type="hidden" name="inquiry_ids[]" id="bulkIds">
            </div>

            <div class="admin-card">
                <div class="admin-table-wrap">
                    <table class="admin-table" id="inquiryTable">
                        <thead>
                            <tr>
                                <th style="width: 40px;"><input type="checkbox" id="selectAll" class="table-checkbox"></th>
                                <th>Client</th>
                                <th>Program & Date</th>
                                <th>Status</th>
                                <th style="text-align: right;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($inquiries)): ?>
                            <tr><td colspan="5" style="text-align: center; padding: 4rem; color: var(--text-muted);"><i class="fa fa-envelope-open" style="font-size: 2.5rem; opacity: 0.2; display: block; margin-bottom: 1rem;"></i>No inquiries found.</td></tr>
                            <?php else: ?>
                                <?php foreach ($inquiries as $iq): ?>
                                <tr class="inquiry-row" data-status="<?php echo $iq['status']; ?>">
                                    <td><input type="checkbox" name="inquiry_ids[]" value="<?php echo $iq['id']; ?>" class="table-checkbox row-checkbox"></td>
                                    <td>
                                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                                            <div style="width: 36px; height: 36px; background: #f1f5f9; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; color: var(--primary);"><?php echo strtoupper(substr($iq['full_name'], 0, 1)); ?></div>
                                            <div>
                                                <strong class="client-name"><?php echo htmlspecialchars($iq['full_name']); ?></strong><br>
                                                <small style="color: var(--text-muted);"><?php echo htmlspecialchars($iq['email']); ?></small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-user"><?php echo strtoupper($iq['program']); ?></span><br>
                                        <small style="color: var(--text-muted); font-size: 0.75rem;"><?php echo date('M j, Y • H:i', strtotime($iq['created_at'])); ?></small>
                                    </td>
                                    <td>
                                        <div class="dropdown" style="position: relative;">
                                            <span class="badge <?php echo ($iq['status'] === 'New' ? 'badge-new' : ($iq['status'] === 'In Progress' ? 'badge-progress' : 'badge-resolved')); ?>" style="cursor:pointer" onclick="toggleDropdown(this)">
                                                <span class="status-dot <?php echo ($iq['status'] === 'New' ? 'dot-new' : ($iq['status'] === 'In Progress' ? 'dot-progress' : 'dot-resolved')); ?>"></span>
                                                <?php echo $iq['status']; ?> <i class="fa fa-chevron-down" style="font-size: 0.6rem; margin-left: 4px; opacity: 0.5;"></i>
                                            </span>
                                            <div class="dropdown-menu" style="display:none; position: absolute; background: white; border: 1px solid #e2e8f0; border-radius: 0.5rem; box-shadow: var(--shadow-md); z-index: 10; margin-top: 4px; padding: 0.5rem; min-width: 140px;">
                                                <a href="inquiries.php?action=status&id=<?php echo $iq['id']; ?>&val=New&csrf_token=<?php echo $_SESSION['csrf_token']; ?>" style="display:block; padding: 0.5rem 0.75rem; color: var(--text-main); text-decoration:none; font-size: 0.8125rem; border-radius: 4px;">Mark as New</a>
                                                <a href="inquiries.php?action=status&id=<?php echo $iq['id']; ?>&val=In Progress&csrf_token=<?php echo $_SESSION['csrf_token']; ?>" style="display:block; padding: 0.5rem 0.75rem; color: var(--text-main); text-decoration:none; font-size: 0.8125rem; border-radius: 4px;">In Progress</a>
                                                <a href="inquiries.php?action=status&id=<?php echo $iq['id']; ?>&val=Resolved&csrf_token=<?php echo $_SESSION['csrf_token']; ?>" style="display:block; padding: 0.5rem 0.75rem; color: var(--text-main); text-decoration:none; font-size: 0.8125rem; border-radius: 4px;">Mark Resolved</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="text-align: right;">
                                        <button type="button" class="btn-action" style="color: var(--primary);" onclick='viewDetails(<?php echo json_encode($iq); ?>)'><i class="fa fa-expand-alt"></i></button>
                                        <a href="inquiries.php?action=delete&id=<?php echo $iq['id']; ?>&csrf_token=<?php echo $_SESSION['csrf_token']; ?>" class="btn-action btn-delete" onclick="return confirm('Delete this inquiry?')"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </main>

    <!-- Details Modal -->
    <div class="modal-overlay" id="detailModal">
        <div class="modal-content" style="max-width: 700px;">
            <div class="modal-header" style="background: #f8fafc;">
                <h3 style="margin:0; font-size: 1.125rem; font-weight: 800;">Inquiry Details</h3>
                <button class="modal-close" onclick="closeModal()"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body" id="modalBody" style="padding: 2rem;"></div>
        </div>
    </div>

    <script>
        const toggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        if (toggle && sidebar) toggle.onclick = () => sidebar.classList.toggle('active');

        // Search functionality
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', function() {
            const term = this.value.toLowerCase();
            document.querySelectorAll('.inquiry-row').forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(term) ? '' : 'none';
            });
        });

        // Filter by status
        function filterByStatus(status, tab) {
            document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            document.querySelectorAll('.inquiry-row').forEach(row => {
                row.style.display = (status === 'all' || row.dataset.status === status) ? '' : 'none';
            });
        }

        // Bulk selection logic
        const selectAll = document.getElementById('selectAll');
        const rowCheckboxes = document.querySelectorAll('.row-checkbox');
        const bulkBar = document.getElementById('bulkBar');
        const selectedCountLabel = document.getElementById('selectedCount');

        function updateBulkBar() {
            const selected = document.querySelectorAll('.row-checkbox:checked');
            bulkBar.style.display = selected.length > 0 ? 'flex' : 'none';
            selectedCountLabel.textContent = `${selected.length} inquiry${selected.length > 1 ? 'ies' : ''} selected`;
            
            rowCheckboxes.forEach(cb => {
                cb.closest('tr').classList.toggle('row-selected', cb.checked);
            });
        }

        if (selectAll) {
            selectAll.addEventListener('change', function() {
                rowCheckboxes.forEach(cb => {
                    if (cb.closest('tr').style.display !== 'none') {
                        cb.checked = this.checked;
                    }
                });
                updateBulkBar();
            });
        }

        rowCheckboxes.forEach(cb => {
            cb.addEventListener('change', updateBulkBar);
        });

        // Dropdown toggle
        function toggleDropdown(el) {
            const menu = el.nextElementSibling;
            document.querySelectorAll('.dropdown-menu').forEach(m => { if(m !== menu) m.style.display = 'none'; });
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        }

        window.onclick = function(e) {
            if (!e.target.closest('.dropdown')) {
                document.querySelectorAll('.dropdown-menu').forEach(m => m.style.display = 'none');
            }
        };

        // Modal View
        function viewDetails(data) {
            const body = document.getElementById('modalBody');
            const statusClass = data.status === 'New' ? 'badge-new' : (data.status === 'In Progress' ? 'badge-progress' : 'badge-resolved');
            
            body.innerHTML = `
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 2.5rem; padding-bottom: 1.5rem; border-bottom: 1px solid #f1f5f9;">
                    <div style="display: flex; gap: 1.25rem; align-items: center;">
                        <div style="width: 56px; height: 56px; background: var(--primary); color: white; border-radius: 1rem; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: 800;">${data.full_name.charAt(0)}</div>
                        <div>
                            <h2 style="margin:0; font-size: 1.5rem; letter-spacing: -0.02em;">${data.full_name}</h2>
                            <p style="margin: 0.25rem 0; color: var(--text-muted); font-weight: 500;">Submitted on ${new Date(data.created_at).toLocaleString('en-US', { dateStyle: 'full', timeStyle: 'short' })}</p>
                        </div>
                    </div>
                    <span class="badge ${statusClass}" style="padding: 0.5rem 1rem;">${data.status}</span>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2.5rem;">
                    <div>
                        <label style="display:block; font-size: 0.7rem; font-weight: 800; color: var(--text-muted); text-transform: uppercase; margin-bottom: 0.5rem; letter-spacing: 0.05em;">Contact Information</label>
                        <p style="margin: 0.25rem 0; font-weight: 600;"><i class="fa fa-envelope" style="width: 20px; color: var(--primary);"></i> <a href="mailto:${data.email}" style="color: var(--primary);">${data.email}</a></p>
                        <p style="margin: 0.25rem 0; font-weight: 600;"><i class="fa fa-phone" style="width: 20px; color: var(--primary);"></i> ${data.phone || 'No phone provided'}</p>
                    </div>
                    <div>
                        <label style="display:block; font-size: 0.7rem; font-weight: 800; color: var(--text-muted); text-transform: uppercase; margin-bottom: 0.5rem; letter-spacing: 0.05em;">Interest & Tracking</label>
                        <p style="margin: 0.25rem 0; font-weight: 600;"><i class="fa fa-folder-open" style="width: 20px; color: var(--primary);"></i> <span class="badge badge-user">${data.program.toUpperCase()}</span></p>
                        <p style="margin: 0.25rem 0; font-weight: 600;"><i class="fa fa-hashtag" style="width: 20px; color: var(--primary);"></i> Inquiry ID: #${data.id}</p>
                    </div>
                </div>

                <div style="background: #f8fafc; padding: 2rem; border-radius: 1rem; border: 1px solid #e2e8f0;">
                    <label style="display:block; font-size: 0.7rem; font-weight: 800; color: var(--text-muted); text-transform: uppercase; margin-bottom: 1rem; letter-spacing: 0.05em;">Client Message</label>
                    <div style="line-height: 1.8; color: #334155; font-size: 1rem;">
                        ${data.message.replace(/\n/g, '<br>')}
                    </div>
                </div>

                <div style="margin-top: 2.5rem; display: flex; gap: 1rem; justify-content: flex-end;">
                    <button onclick="closeModal()" style="padding: 0.75rem 1.5rem; border-radius: 0.5rem; border: 1px solid #e2e8f0; background: white; font-weight: 600; cursor:pointer;">Close</button>
                    <a href="mailto:${data.email}?subject=Response regarding your ${data.program.toUpperCase()} inquiry" style="padding: 0.75rem 2rem; border-radius: 0.5rem; background: var(--primary); color: white; text-decoration: none; font-weight: 700; box-shadow: 0 4px 6px rgba(44, 125, 133, 0.2);"><i class="fa fa-paper-plane" style="margin-right: 0.5rem;"></i> Send Reply</a>
                </div>
            `;
            document.getElementById('detailModal').style.display = 'flex';
        }

        function closeModal() { document.getElementById('detailModal').style.display = 'none'; }
    </script>
</body>
</html>
