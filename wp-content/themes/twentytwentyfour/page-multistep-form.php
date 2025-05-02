<?php
/* Template Name: Multi-Step Form */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = get_current_user_id();

    if (isset($_POST['step1'])) {
        $email = sanitize_email($_POST['email']);
        $password = $_POST['password'];
        if (!email_exists($email)) {
            $user_id = wp_create_user($email, $password, $email);
            wp_set_auth_cookie($user_id);
        }
        wp_redirect(add_query_arg('step', 2, get_permalink()));
        exit;
    }

    if (isset($_POST['step2'])) {
        update_user_meta($user_id, 'field1', sanitize_text_field($_POST['field1']));
        update_user_meta($user_id, 'field2', sanitize_text_field($_POST['field2']));
        wp_redirect(add_query_arg('step', 3, get_permalink()));
        exit;
    }

    if (isset($_POST['step3'])) {
        update_user_meta($user_id, 'radio_option', sanitize_text_field($_POST['service']));
        wp_redirect(add_query_arg('step', 4, get_permalink()));
        exit;
    }

    if (isset($_POST['step-4'])) {
        if (isset($_POST['amount'])) {
            update_user_meta($user_id, 'membership_plan', sanitize_text_field($_POST['amount']));
        }
        // Redirect to Stripe checkout
        include_once get_template_directory() . '/stripe-checkout.php';
        exit;
    }
    
}

get_header();
$current_step = isset($_GET['step']) ? (int) $_GET['step'] : 1;
?>

<div class="multi-step-form">

    <?php if ($current_step === 1): ?>

        <div class="step-container">
    <div class="form-wrapper">
        <div class="step-indicator">
            <div class="active nmbr1"></div>
            <div></div>
            <div></div>
            <div></div>
        </div>

        <div class="inner-container">

        <div class="step-logo">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="Badge Logo">
        </div>

        <h2>Welcome to the Global<br>Wellness Industry!</h2>

        <p class="description">
            Create your account to access your Free Participation Badge and explore exclusive acknowledgments and awards for your business. By registering, you're joining a global community dedicated to wellness, balance, and quality of life.
        </p>

        <form method="post">
            <label for="email" >Email address</label>
            <input type="email" name="email" required />
            <label for="password">Password</label> 
            <input type="password" name="password" required />
            <button type="submit" name="step1">Start to Journey</button>
        </form>

        <p class="note">Start your journey to global wellness recognition immediately after signing up</p>
    </div>
    </div>
</div>
    <?php endif; ?>

    <?php if ($current_step === 2): ?>

        <div class="step-container">
    <div class="form-wrapper">
        <div class="step-indicator">
            <div></div>
            <div class="active nmbr2"></div>
            <div></div>
            <div></div>
        </div>

        <div class="inner-container">

        <div class="step-logo">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="Badge Logo">
        </div>

        <h2>Tell Us About Your <br>Business</h2>

        <p class="description">
        Help us personalize your Global Wellness Participation Badge and potential acknowledgments. The Global Wellness Industry acknowledges businesses making a positive impact on wellness and quality of life. Provide your information, and we’ll determine if your business qualifies for tailored acknowledgments and awards.
        </p>

        <form method="post">
            <label for="field1">Bussiness name</label>
            <input type="text" name="field1" required placeholder="" />
            <label for="field2">Bussiness Website or Listing</label>
            <input type="text" name="field2" required placeholder="" />
            <button type="submit" name="step2">Check My Eligibility</button>
        </form>
    </div>

    </div>
</div>
        
    <?php endif; ?>

    <?php if ($current_step === 3): ?>

        <div class="step-container step-3">
    <div class="form-wrapper">
        <div class="step-indicator">
            <div></div>
            <div></div>
            <div class="active nmbr3"></div>
            <div></div>
        </div>

        <div class="inner-container">

        <div class="step-logo">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="Badge Logo">
        </div>

        <h2>Congratulations! Your Business <br>Qualifies for Recognition</h2>

        <p class="description">
        Your business has been acknowledged as a contributor to the Global Wellness Industry and qualifies for additional awards and acknowledgments. As a qualified participant, you are eligible for the Global Wellness Participation Badge - an acknowledgment of your positive impact on wellness and quality of life. You’re also invited to explore exclusive awards tailored to your business.
        </p>

        <div class="step-3">
        <div class="step-logo1">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="Badge Logo">
        </div>
        <div>
        <p class="text">
        This badge is yours to display proudly on your website and in marketing collateral
        </p>
    </div>
        </div>

        <p class="aftr-txt">You qualify for <a href="#">additional awards and acknowledgments</a> in the following categories. Click ‘Next’ to explore your options and learn how to showcase them.</p>

        <form method="post">
            <div class="radio">
  <label>
    <input type="radio" name="service" value="Therapeutic Massage">
    Therapeutic Massage
  </label>

  <label>
    <input type="radio" name="service" value="Wellness Spa">
    Wellness Spa
  </label>

  <label>
    <input type="radio" name="service" value="Acupuncture">
    Acupuncture
  </label>

  <label>
    <input type="radio" name="service" value="Other">
    Other _________
  </label>
    </div>
  <button type="submit" name="step3">My Acknowledgements</button>
</form>

            </div>

    </div>
</div>
        
    <?php endif; ?>

    <?php if ($current_step === 4): ?>
        
        <div class="step-container">
    <div class="form-wrapper">
        <div class="step-indicator">
            <div></div>
            <div></div>
            <div></div>
            <div class="active nmbr4"></div>
        </div>

        <div class="inner-container membrs-con">

        <div class="step-logo">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="Badge Logo">
        </div>

        <h2><?php echo esc_html(get_user_meta(get_current_user_id(), 'field1', true)); ?> Awards</h2>

        <p class="description">
        Choose from our exclusive awards and membership tiers to showcase your contributions to the Global Wellness Industry. As a qualified participant, you have access to a variety of awards and memberships designed to highlight your business’s unique impact. Select the option that best suits your goals and start showcasing your achievements today.
        </p>

        <div class="members-sec">
        
        <!-- 1st card -->
       <div class="membership-card">
        <div class="membership-header first-header"><p>$50</p> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/member-logo.png" alt="Member Logo" > 
    </div>
    <h3><span>LEVEL 1</span> | Member</h3>
    <div class="membership-body">
        <div class="list">
        <ul>
            <li>Participation Badge </li>
            <li>1 x Ack </li>
            <li>Badge </li>
            <li>Official Certification </li>
        </ul>
    </div>
   
    </div>
    <div class="btn">
  <form method="POST" action="/payment-success/">
    <input type="hidden" name="amount" value="50">
    <input type="hidden" name="membership_plan" value="Level 1 - Member">
    <button type="submit" name="step-4">Member</button>
  </form>
</div>

    </div>

    <!-- 2nd card -->
    <div class="membership-card">
        <div class="membership-header second-header"><p>$150</p> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/member-logo.png" alt="Member Logo" > 
    </div>
    <h3><span>LEVEL 2</span> | Gold Member</h3>
    <div class="membership-body">
        <div class="list">
        <ul>
            <li>Participation Badge </li>
            <li>1 x Ack </li>
            <li>Badge </li>
            <li>Official Certification </li>
        </ul>
    </div>
   
    </div>
    <div class="btn">
  <form method="POST" action="/payment-success/">
    <input type="hidden" name="amount" value="150">
    <input type="hidden" name="membership_plan" value="Level 2 - Member">
    <button type="submit" name="step-4">Gold Member</button>
  </form>
</div>

    </div>

    <!-- 3rd card -->
    <div class="membership-card">
        <div class="membership-header third-header"><p>$500</p> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/member-logo.png" alt="Member Logo" > 
    </div>
    <h3><span>LEVEL 3</span> | Platinum Member</h3>
    <div class="membership-body">
        <div class="list">
        <ul>
            <li>Participation Badge </li>
            <li>3 x Ack choice of </li>
            <li>Badge or Trophy or Medal PLUS 2 x Awards </li>
            <li>Official Certification </li>
        </ul>
    </div>
    
    </div>
    <div class="btn">
  <form method="POST" action="/payment-success/">
    <input type="hidden" name="amount" value="500">
    <input type="hidden" name="membership_plan" value="Level 3 - Member">
    <button type="submit" name="step-4">Platinum Member</button>
  </form>
</div>

    </div>

    <!-- 4th card -->
    <div class="membership-card">
        <div class="membership-header fourth-header"><p>$1500</p> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/member-logo.png" alt="Member Logo" > 
    </div>
    <h3><span>LEVEL 4</span> | Diamond Member</h3>
    <div class="membership-body">
        <div class="list">
        <ul>
            <li>Participation Badge </li>
            <li>3 x Ack choice of
Badge or Trophy or Medal PLUS 3 x Awards
Official Certification </li>
            <li>Online Awards recognition & Company  </li>
            <li>Profile Promotion </li>
            <li>Official Invitation to </li>
            <li>Gala Event</li>
        </ul>
    </div>
    
    </div>
    <div class="btn">
  <form method="POST" action="/payment-success/">
    <input type="hidden" name="amount" value="1500">
    <input type="hidden" name="membership_plan" value="Level 4 - Member">
    <button type="submit" name="step-4">Diamond Member</button>
  </form>
</div>

    </div>

    <!-- 5th card -->
    <div class="membership-card">
        <div class="membership-header fifthe-header"><p>$2500</p> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/member-logo.png" alt="Member Logo" > 
    </div>
    <h3><span>LEVEL 5</span> | Lifetime Member</h3>
    <div class="membership-body">
        <div class="list">
        <ul>
            <li>Lorem Ipsum Lorem  </li>
            <li>Lorem Ipsum Lorem Lorem Ipsum Lorem  </li>
            <li>Lorem Ipsum Lorem Lorem Ipsum Lorem  </li>
            <li>Lorem Ipsum Lorem  </li>
            <li>Lorem Ipsum Lorem  </li>
            <li>Lorem Ipsum Lorem  </li>
            <li>Lorem Ipsum Lorem  </li>
            <li>Lorem Ipsum Lorem  </li>
            <li>Lorem Ipsum Lorem  </li>
        </ul>
    </div>
    </div>
    <div class="btn">
  <form method="POST" action="/payment-success/">
    <input type="hidden" name="amount" value="2500">
    <input type="hidden" name="membership_plan" value="Level 5 - Member">
    <button type="submit" name="step-4">Lifetime Member</button>
  </form>
</div>

    </div>

    </div>

    <p class="badge-redirect"><a href="/badges">Continue with only the Participation Badge</a></p>

            </div>

    </div>
</div>
    <?php endif; ?>
</div>

<?php

get_footer();
