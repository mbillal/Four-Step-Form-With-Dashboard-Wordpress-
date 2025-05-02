<?php
/* Template Name: Payment Success */

// Start PHP first
// Save membership info if POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
    $user_id = get_current_user_id();
    if ($user_id) {
        if (!empty($_POST['amount'])) {
            update_user_meta($user_id, 'membership_amount', sanitize_text_field($_POST['amount']));
        }
        if (!empty($_POST['membership_plan'])) {
            update_user_meta($user_id, 'membership_plan', sanitize_text_field($_POST['membership_plan']));
        }
    }
}

get_header();

// Redirect non-logged-in users to login
if (!is_user_logged_in()) {
    wp_redirect('/login');
    exit;
}

// Check if the amount was posted
$amount = isset($_POST['amount']) ? (float) $_POST['amount'] : 0;

// If no amount is posted, redirect to membership page
if ($amount <= 0) {
    wp_redirect('/membership');
    exit;
}

// (Optional) Here you could normally validate payment through Stripe/PayPal API
?>

<div class="step-container">
    <div class="form-wrapper">
    <div class="back"><a href="javascript:history.back()" class="back-button">← Back</a> </div>
        <div class="pamnt-head">
            <div>Payment</div>
        </div>

        <div class="inner-container pameny-con">

        <div class="step-logo">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="Badge Logo">
        </div>

        <h2>Secure Your Membership</h2>
        <p class="sub-heading">Complete your payment to unlock your badges, certificates, and exclusive benefits.</p>

        <p class="description">
        Your payment is 100% secure, and you’ll gain immediate access to your Global Wellness Industry assets once it’s complete.
        </p>


<div class="payment-success-page" style="text-align: center; padding: 50px;">
    <h2>Payment Successful!</h2>
    <p>Thank you for your payment of <strong>$<?php echo number_format($amount, 2); ?></strong>.</p>
    <p>Redirecting to your dashboard...</p>
</div>

</div>
</div>
</div>

 <script>
// Redirect with JavaScript after 3 seconds
setTimeout(function() {
    window.location.href = '/user-dashboard/'; // updated to your correct slug
}, 3000);
</script>

<noscript>
<!-- If JavaScript is disabled, redirect with PHP after 5 seconds -->
<meta http-equiv="refresh" content="5;url=/user-dashboard/">
</noscript> 

<?php
get_footer();
?>
