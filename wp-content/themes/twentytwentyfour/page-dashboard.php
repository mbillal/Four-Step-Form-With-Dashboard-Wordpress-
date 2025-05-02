<?php
/* Template Name: User Dashboard */

// Session must be started for $_SESSION to work
add_action('init', function () {
    if (!session_id()) {
        session_start();
    }
});

// Handle auto logout before template loads
add_action('template_redirect', function () {
    if (!empty($_SESSION['needs_relogin'])) {
        unset($_SESSION['needs_relogin']);
        wp_logout();
        wp_redirect('/login?updated=1');
        exit;
    }
});

get_header();

// Redirect non-logged-in users to login
if (!is_user_logged_in()) {
    wp_redirect('/login');
    exit;
}

// Get current user info
$user_id = get_current_user_id();
$user    = wp_get_current_user();
$email   = $user->user_email;

// Initialize logout trigger
$needs_relogin = false;

// Save form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['dashboard_update_nonce']) && wp_verify_nonce($_POST['dashboard_update_nonce'], 'dashboard_update')) {

    // Update Email
    if (isset($_POST['user_email']) && is_email($_POST['user_email'])) {
        if ($_POST['user_email'] !== $user->user_email) {
            wp_update_user([
                'ID'         => $user_id,
                'user_email' => sanitize_email($_POST['user_email']),
            ]);
            $needs_relogin = true;
        }
    }

    // Update Password (only if provided)
    if (!empty($_POST['user_password'])) {
        wp_update_user([
            'ID'        => $user_id,
            'user_pass' => sanitize_text_field($_POST['user_password']),
        ]);
        $needs_relogin = true;
    }

    // Update custom fields
    if (isset($_POST['field1'])) {
        update_user_meta($user_id, 'field1', sanitize_text_field($_POST['field1']));
    }
    if (isset($_POST['field2'])) {
        update_user_meta($user_id, 'field2', sanitize_text_field($_POST['field2']));
    }
    if (isset($_POST['service'])) {
        update_user_meta($user_id, 'service', sanitize_text_field($_POST['service']));
    }
    if (isset($_POST['membership_plan'])) {
        update_user_meta($user_id, 'membership_plan', sanitize_text_field($_POST['membership_plan']));
    }

    // Save needs_relogin in session
    if ($needs_relogin) {
        $_SESSION['needs_relogin'] = true;
    } else {
        echo '<div class="notice success" style="color: green; margin: 20px 0;">Profile updated successfully!</div>';
    }
}

// Fetch latest updated meta
$field1  = get_user_meta($user_id, 'field1', true);
$field2  = get_user_meta($user_id, 'field2', true);
$service = get_user_meta($user_id, 'service', true);
$plan    = get_user_meta($user_id, 'membership_plan', true);

// Refresh user email (in case it was updated)
$email   = $user->user_email;
?>

<div class="d-container">
    <div class="d-side-header">
        <div class="d-main">
        <h2>Dashboard</h2>
        <div class="d-logo">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="Badge Logo">
        </div>
</div>

<p>
            <label for="field1">Business Name:</label><br>
            <input type="text" id="field1" name="field1" value="<?= esc_attr($field1) ?>" />
        </p>

        <p>
            <label for="field2">Business Website:</label><br>
            <input type="text" id="field2" name="field2" value="<?= esc_attr($field2) ?>" />
        </p>

        <p>
            <label for="membership_plan">Membership Status:</label><br>
            <input type="text" id="membership_plan" name="membership_plan" value="<?= esc_attr($plan) ?>" />
        </p>

    </div>
    <div class="d-body">
    <h2>Welcome, <?= esc_html($user->display_name ?: $email) ?>!</h2>

    <form method="post">
        <?php wp_nonce_field('dashboard_update', 'dashboard_update_nonce'); ?>

        <p>
            <label for="user_email">Email Address:</label><br>
            <input type="email" id="user_email" name="user_email" value="<?= esc_attr($email) ?>" required />
        </p>

        <p>
            <label for="user_password">New Password (leave blank to keep current):</label><br>
            <input type="password" id="user_password" name="user_password" />
        </p>


        <p class="d-services">
            <label>Service Selected:</label><br>
            <label><input type="radio" name="service" value="Therapeutic Massage" <?= ($service === 'Therapeutic Massage') ? 'checked' : '' ?>> Therapeutic Massage</label><br>
            <label><input type="radio" name="service" value="Wellness Spa" <?= ($service === 'Wellness Spa') ? 'checked' : '' ?>> Wellness Spa</label><br>
            <label><input type="radio" name="service" value="Acupuncture" <?= ($service === 'Acupuncture') ? 'checked' : '' ?>> Acupuncture</label><br>
            <label><input type="radio" name="service" value="Other" <?= ($service === 'Other') ? 'checked' : '' ?>> Other _________</label>
        </p>


        <p class="d-btn">
            <button type="submit">Update Profile</button>
        </p>
    </form>

    </div>
</div>

<?php get_footer(); ?>
