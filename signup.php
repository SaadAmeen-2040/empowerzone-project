<?php
/**
 * SIGNUP PAGE - signup.php
 * Registers a new user account in the database.
 */

$page = 'signup';
require_once 'includes/config.php';

// ── Redirect if already logged in ─────────────────────────────────────────────
if (!empty($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

// ── SEO ───────────────────────────────────────────────────────────────────────
$pageTitle = 'Create Account – Empower Zone Consulting';
$pageDesc  = 'Sign up for an Empower Zone Consulting portal account to track your benefits application.';

// ── State ─────────────────────────────────────────────────────────────────────
$error      = '';
$errors     = [];   // field-level errors
$nameValue  = '';
$emailValue = '';

// DB unavailable
if ($pdo === null) {
    $error = $dbError ?? 'Database unavailable. Please run setup.php first.';
}

// ── Handle POST ───────────────────────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $pdo !== null) {
    // CSRF Validation
    validate_csrf($_POST['csrf_token'] ?? '');

    $nameValue  = htmlspecialchars(trim($_POST['full_name'] ?? ''), ENT_QUOTES, 'UTF-8');
    $emailValue = htmlspecialchars(trim($_POST['email']     ?? ''), ENT_QUOTES, 'UTF-8');
    $password   = $_POST['password']  ?? '';
    $password2  = $_POST['password2'] ?? '';

    // ── Validation ────────────────────────────────────────────────────────────
    if (empty($nameValue)) {
        $errors['full_name'] = 'Full name is required.';
    } elseif (strlen($nameValue) < 2) {
        $errors['full_name'] = 'Name must be at least 2 characters.';
    }

    if (empty($emailValue)) {
        $errors['email'] = 'Email address is required.';
    } elseif (!filter_var($emailValue, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address.';
    }

    if (empty($password)) {
        $errors['password'] = 'Password is required.';
    } elseif (strlen($password) < 8) {
        $errors['password'] = 'Password must be at least 8 characters.';
    } elseif (!preg_match('/[A-Z]/', $password)) {
        $errors['password'] = 'Password must contain at least one uppercase letter.';
    } elseif (!preg_match('/[0-9]/', $password)) {
        $errors['password'] = 'Password must contain at least one number.';
    }

    if (empty($password2)) {
        $errors['password2'] = 'Please confirm your password.';
    } elseif ($password !== $password2) {
        $errors['password2'] = 'Passwords do not match.';
    }

    // ── If no field errors — check DB uniqueness then insert ─────────────────
    if (empty($errors)) {
        $check = $pdo->prepare("SELECT id FROM users WHERE email = ? LIMIT 1");
        $check->execute([$emailValue]);

        if ($check->fetch()) {
            $errors['email'] = 'An account with this email already exists.';
        } else {
            $hash   = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
            $insert = $pdo->prepare(
                "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)"
            );
            $insert->execute([$nameValue, $emailValue, $hash]);

            // Redirect to login with success flag
            header('Location: login.php?registered=1');
            exit;
        }
    }

    // Summarise errors into one general message
    if (!empty($errors)) {
        $error = 'Please fix the errors below and try again.';
    }
}
?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<!-- ===== SIGNUP HERO ===== -->
<div class="page-hero page-hero--light">
    <div class="page-hero-content">
        <h1 data-aos="fade-up">Create Your <span class="teal-text">Account</span></h1>
        <p data-aos="fade-up" data-aos-delay="100">Join Empower Zone and start managing your benefits applications today.</p>
    </div>
</div>

<!-- ===== SIGNUP SECTION ===== -->
<section class="signup-section">
    <div class="container">
        <div class="signup-wrapper">
            <div class="signup-card" data-aos="fade-up" data-aos-delay="200">

                <div class="signup-icon-wrap">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                </div>
                <div class="signup-title">Create Account</div>
                <div class="signup-subtitle">Fill in your details to get started — it's free.</div>

                <!-- General error banner -->
                <?php if (!empty($error)): ?>
                <div class="form-alert form-alert--error" role="alert">
                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                    <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
                </div>
                <?php endif; ?>

                <form id="signupForm" action="signup.php" method="POST" novalidate>
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

                    <!-- Full Name -->
                    <div class="form-group <?php echo isset($errors['full_name']) ? 'has-error' : ''; ?>">
                        <label for="full_name">Full Name</label>
                        <div class="input-icon-wrap">
                            <i class="fa fa-user input-icon" aria-hidden="true"></i>
                            <input
                                type="text"
                                id="full_name"
                                name="full_name"
                                placeholder="John Doe"
                                value="<?php echo $nameValue; ?>"
                                required
                                autocomplete="name"
                            >
                        </div>
                        <?php if (isset($errors['full_name'])): ?>
                        <span class="field-error"><i class="fa fa-triangle-exclamation"></i> <?php echo htmlspecialchars($errors['full_name']); ?></span>
                        <?php endif; ?>
                    </div>

                    <!-- Email -->
                    <div class="form-group <?php echo isset($errors['email']) ? 'has-error' : ''; ?>">
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
                        <?php if (isset($errors['email'])): ?>
                        <span class="field-error"><i class="fa fa-triangle-exclamation"></i> <?php echo htmlspecialchars($errors['email']); ?></span>
                        <?php endif; ?>
                    </div>

                    <!-- Password -->
                    <div class="form-group <?php echo isset($errors['password']) ? 'has-error' : ''; ?>">
                        <label for="password">Password</label>
                        <div class="password-wrapper input-icon-wrap">
                            <i class="fa fa-lock input-icon" aria-hidden="true"></i>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Min. 8 chars, 1 uppercase, 1 number"
                                required
                                autocomplete="new-password"
                            >
                            <button type="button" class="toggle-password" id="togglePass1" aria-label="Show password">
                                <i class="fa fa-eye" id="eyeIcon1" aria-hidden="true"></i>
                            </button>
                        </div>
                        <?php if (isset($errors['password'])): ?>
                        <span class="field-error"><i class="fa fa-triangle-exclamation"></i> <?php echo htmlspecialchars($errors['password']); ?></span>
                        <?php endif; ?>
                        <!-- Password strength bar -->
                        <div class="strength-bar-wrap" id="strengthWrap">
                            <div class="strength-bar" id="strengthBar"></div>
                        </div>
                        <span class="strength-label" id="strengthLabel"></span>
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group <?php echo isset($errors['password2']) ? 'has-error' : ''; ?>">
                        <label for="password2">Confirm Password</label>
                        <div class="password-wrapper input-icon-wrap">
                            <i class="fa fa-lock input-icon" aria-hidden="true"></i>
                            <input
                                type="password"
                                id="password2"
                                name="password2"
                                placeholder="Re-enter your password"
                                required
                                autocomplete="new-password"
                            >
                            <button type="button" class="toggle-password" id="togglePass2" aria-label="Show confirm password">
                                <i class="fa fa-eye" id="eyeIcon2" aria-hidden="true"></i>
                            </button>
                        </div>
                        <?php if (isset($errors['password2'])): ?>
                        <span class="field-error"><i class="fa fa-triangle-exclamation"></i> <?php echo htmlspecialchars($errors['password2']); ?></span>
                        <?php endif; ?>
                    </div>

                    <!-- Terms -->
                    <label class="terms-label">
                        <input type="checkbox" name="terms" id="terms" required>
                        I agree to the <a href="#" target="_blank">Terms of Service</a> and <a href="#" target="_blank">Privacy Policy</a>.
                    </label>

                    <button type="submit" class="btn-submit" id="submitBtn">
                        <i class="fa fa-user-plus" aria-hidden="true"></i> Create Account
                    </button>

                </form>

                <div class="signup-divider"><span>or</span></div>

                <div class="signup-footer">
                    Already have an account? <a href="login.php">Log In</a>
                </div>

            </div><!-- /.signup-card -->
        </div><!-- /.signup-wrapper -->
    </div><!-- /.container -->
</section>

<script>
(function () {
    // ── Password toggle helper ─────────────────────────────────────────────────
    function setupToggle(btnId, inputId, iconId) {
        var btn   = document.getElementById(btnId);
        var input = document.getElementById(inputId);
        var icon  = document.getElementById(iconId);
        if (!btn || !input || !icon) return;
        btn.addEventListener('click', function () {
            var hidden = input.type === 'password';
            input.type = hidden ? 'text' : 'password';
            icon.classList.toggle('fa-eye',       !hidden);
            icon.classList.toggle('fa-eye-slash',  hidden);
            btn.setAttribute('aria-label', hidden ? 'Hide password' : 'Show password');
        });
    }
    setupToggle('togglePass1', 'password',  'eyeIcon1');
    setupToggle('togglePass2', 'password2', 'eyeIcon2');

    // ── Password strength meter ────────────────────────────────────────────────
    var passInput    = document.getElementById('password');
    var strengthBar  = document.getElementById('strengthBar');
    var strengthLbl  = document.getElementById('strengthLabel');
    var strengthWrap = document.getElementById('strengthWrap');

    if (passInput && strengthBar && strengthLbl) {
        passInput.addEventListener('input', function () {
            var val      = passInput.value;
            var score    = 0;
            if (val.length >= 8)                  score++;
            if (/[A-Z]/.test(val))                score++;
            if (/[0-9]/.test(val))                score++;
            if (/[^A-Za-z0-9]/.test(val))         score++;
            if (val.length >= 12)                 score++;

            var pct    = (score / 5) * 100;
            var labels = ['', 'Weak', 'Fair', 'Good', 'Strong', 'Very Strong'];
            var colors = ['', '#ef4444', '#f97316', '#eab308', '#22c55e', '#16a34a'];

            strengthWrap.style.display   = val.length ? 'block' : 'none';
            strengthBar.style.width      = pct + '%';
            strengthBar.style.background = colors[score] || '#ef4444';
            strengthLbl.textContent      = labels[score] || '';
            strengthLbl.style.color      = colors[score] || '#ef4444';
        });
    }

    // ── Terms checkbox must be checked ────────────────────────────────────────
    var form  = document.getElementById('signupForm');
    var terms = document.getElementById('terms');
    if (form && terms) {
        form.addEventListener('submit', function (e) {
            if (!terms.checked) {
                e.preventDefault();
                terms.closest('label').style.color = '#ef4444';
                terms.closest('label').style.fontWeight = '600';
            }
        });
    }
})();
</script>

<?php include 'includes/footer.php'; ?>
