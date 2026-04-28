<?php
/**
 * LOGIN PAGE - login.php
 * Authenticates users against the MySQL database.
 */

$page = 'login';
require_once 'includes/config.php';

// ── Redirect if already logged in ─────────────────────────────────────────────
if (!empty($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

// ── SEO ───────────────────────────────────────────────────────────────────────
$pageTitle = 'Login – Empower Zone Consulting';
$pageDesc  = 'Log in to your Empower Zone Consulting portal to track your benefits application.';

// ── Messages ──────────────────────────────────────────────────────────────────
$error      = '';
$successMsg = '';
$emailValue = '';

// Success message passed from signup redirect
if (isset($_GET['registered']) && $_GET['registered'] === '1') {
    $successMsg = 'Account created successfully! You can now log in.';
}

// ── DB unavailable notice ─────────────────────────────────────────────────────
if ($pdo === null) {
    $error = $dbError ?? 'Database unavailable. Please run setup.php first.';
}

// ── Handle POST ───────────────────────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $pdo !== null) {

    $emailValue = htmlspecialchars(trim($_POST['email'] ?? ''), ENT_QUOTES, 'UTF-8');
    $password   = $_POST['password'] ?? '';

    // Basic validation
    if (empty($emailValue) || empty($password)) {
        $error = 'Please fill in all fields.';
    } elseif (!filter_var($emailValue, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } else {
        // Look up user by email
        $stmt = $pdo->prepare("SELECT id, full_name, email, password FROM users WHERE email = ? LIMIT 1");
        $stmt->execute([$emailValue]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // ✅ Credentials valid — start session
            session_regenerate_id(true);
            $_SESSION['user_id']    = $user['id'];
            $_SESSION['user_name']  = $user['full_name'];
            $_SESSION['user_email'] = $user['email'];

            header('Location: index.php');
            exit;
        } else {
            $error = 'Invalid email or password. Please try again.';
        }
    }
}
?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<!-- ===== LOGIN HERO ===== -->
<div class="page-hero page-hero--light">
    <div class="page-hero-content">
        <h1 data-aos="fade-up">Welcome <span class="teal-text">Back</span></h1>
        <p data-aos="fade-up" data-aos-delay="100">Log in to your account to manage your applications and check your status.</p>
    </div>
</div>

<!-- ===== LOGIN SECTION ===== -->
<section class="login-section">
    <div class="container">
        <div class="login-wrapper">
            <div class="login-card" data-aos="fade-up" data-aos-delay="200">

                <div class="login-icon-wrap">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </div>
                <div class="login-title">Account Login</div>
                <div class="login-subtitle">Enter your credentials to access your portal.</div>

                <!-- Success Alert -->
                <?php if (!empty($successMsg)): ?>
                <div class="form-alert form-alert--success" role="alert">
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                    <?php echo htmlspecialchars($successMsg, ENT_QUOTES, 'UTF-8'); ?>
                </div>
                <?php endif; ?>

                <!-- Error Alert -->
                <?php if (!empty($error)): ?>
                <div class="form-alert form-alert--error" role="alert">
                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                    <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
                </div>
                <?php endif; ?>

                <form id="loginForm" action="login.php" method="POST" novalidate>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-icon-wrap">
                            <i class="fa fa-envelope input-icon" aria-hidden="true"></i>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                placeholder="you@example.com"
                                value="<?php echo $emailValue; ?>"
                                required
                                autocomplete="email"
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="password-wrapper input-icon-wrap">
                            <i class="fa fa-key input-icon" aria-hidden="true"></i>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="••••••••"
                                required
                                autocomplete="current-password"
                            >
                            <button type="button" class="toggle-password" id="togglePassword" aria-label="Show password">
                                <i class="fa fa-eye" id="eyeIcon" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>

                    <div class="login-options">
                        <label class="remember-label">
                            <input type="checkbox" name="remember" id="rememberMe"> Remember me
                        </label>
                        <a href="#">Forgot Password?</a>
                    </div>

                    <button type="submit" class="btn-submit" id="submitBtn">
                        <i class="fa fa-sign-in-alt" aria-hidden="true"></i> Log In
                    </button>

                </form>

                <div class="login-divider"><span>or</span></div>

                <div class="login-footer">
                    Don't have an account? <a href="signup.php">Create Account</a>
                </div>

            </div><!-- /.login-card -->
        </div><!-- /.login-wrapper -->
    </div><!-- /.container -->
</section>

<script>
(function () {
    // Show / hide password
    const btn   = document.getElementById('togglePassword');
    const input = document.getElementById('password');
    const icon  = document.getElementById('eyeIcon');

    if (btn && input && icon) {
        btn.addEventListener('click', function () {
            const hidden   = input.type === 'password';
            input.type     = hidden ? 'text' : 'password';
            icon.classList.toggle('fa-eye',      !hidden);
            icon.classList.toggle('fa-eye-slash', hidden);
            btn.setAttribute('aria-label', hidden ? 'Hide password' : 'Show password');
        });
    }
})();
</script>

<?php include 'includes/footer.php'; ?>
