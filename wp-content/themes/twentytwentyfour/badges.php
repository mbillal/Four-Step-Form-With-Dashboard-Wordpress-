<?php

/* Template Name: Badges Assign */

get_header();

?>

<div class="step-container">
    <div class="form-wrapper">
      <div class="back"><a href="javascript:history.back()" class="back-button">← Back</a> </div>
    <div class="badge-head">
            <div>Awards</div>
        </div>

        <div class="inner-container badge-con">

        <div class="step-logo">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="Badge Logo">
        </div>

        <h2>Celebrate Your Achievements with Exclusive Awards</h2>
        <p class="sub-heading">Even without a membership package, you can still showcase your contributions with these distinguished digital assets.<p>

        <p class="description">
        Choose from our Badge, Trophy, or Medal to elevate your business’s recognition within the Global Wellness Industry. These high-quality digital assets are perfect for embedding on your website, sharing on social media, and displaying in your marketing materials.
        </p>

        <div class="members-sec">
        
        <!-- 1st card -->
       <div class="membership-card">
        <div class="membership-header b-card1"><p>$35</p> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/star.png" alt="Member Logo" > 
    </div>
    <h3><span>Badge</span></h3>
    <div class="membership-body">
    <div class="b-text">
       <p>Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Ipsum</p>
    </div>
    <div class="btn">
  <form method="POST" action="/payment-success/">
    <input type="hidden" name="amount" value="35">
    <input type="hidden" name="membership_plan" value="Level 1 - Member">
    <button type="submit" name="step-4">Badge</button>
  </form>
</div>
    </div>

    </div>

    <!-- 2nd card -->
    <div class="membership-card">
        <div class="membership-header b-card2"><p>$50</p> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/trophy.png" alt="Member Logo" > 
    </div>
    <h3><span>Trophy</span></h3>
    <div class="membership-body">
    <div class="b-text">
       <p>Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Ipsum</p>
    </div>
    <div class="btn">
  <form method="POST" action="/payment-success/">
    <input type="hidden" name="amount" value="50">
    <input type="hidden" name="membership_plan" value="Level 2 - Member">
    <button type="submit" name="step-4">Trophy</button>
  </form>
</div>
    </div>

    </div>

    <!-- 3rd card -->
    <div class="membership-card">
        <div class="membership-header b-card3"><p>$50</p> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/medal.png" alt="Member Logo" > 
    </div>
    <h3><span>Medal</span></h3>
    <div class="membership-body">
        <div class="b-text">
       <p>Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Ipsum</p>
    </div>
    <div class="btn">
  <form method="POST" action="/payment-success/">
    <input type="hidden" name="amount" value="50">
    <input type="hidden" name="membership_plan" value="Level 3 - Member">
    <button type="submit" name="step-4">Medal</button>
  </form>
</div>
    </div>

    </div>
   
            </div>

            <p class="badge-redirect"><a href="/badges">Continue with upgrade</a></p>

    </div>
</div>

</div>

<?php get_footer();?>






