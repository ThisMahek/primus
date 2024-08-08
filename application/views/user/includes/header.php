<div class="cv_main_wrapper">

  <!-- Loader Start -->
  <div class="loader">
    <div class="spinner">
      <img src="<?= base_url() ?>logo/logo-white.png" alt="loader" class="img-fluid w-100">
    </div>
  </div>
  <!-- Loader End -->
  <!-- Bottom To Top Start -->
  <div class="cv_top_icon">
    <a id="button">
      <img src="<?= base_url() ?>assets/images/gototop.svg" class="img-fluid white-logo">
    </a>
  </div>
  <!-- Bottom To Top End -->

  <!-- Header Section Start -->
  <div class="cv_header_wrapper">
    <div class="cv_container container">
      <div class="row">
        <div class="col-12">
          <div class="cv_navbar">
            <div class="cv_logo">
              <a href="index.php">
                <img src="<?= base_url() ?>logo/logo-white.png" class="img-fluid white-logo">
              </a>
            </div>
            <a href="javascript:void(0);" class="cv_toggle_btn">
              <svg class="ham hamRotate ham7" viewBox="0 0 100 100">
                <path class="line top"
                  d="m 70,33 h -40 c 0,0 -6,1.368796 -6,8.5 0,7.131204 6,8.5013 6,8.5013 l 20,-0.0013">
                </path>
                <path class="line middle" d="m 70,50 h -40">
                </path>
                <path class="line bottom"
                  d="m 69.575405,67.073826 h -40 c -5.592752,0 -6.873604,-9.348582 1.371031,-9.348582 8.244634,0 19.053564,21.797129 19.053564,12.274756 l 0,-40">
                </path>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Navbar Start -->
  <div class="cv_header_menu">
    <div class="cv_container container">
      <div class="row">
        <div class="col-12 text-center">
          <div class="">

            <div class="cv_header_social">
              <h4>Follow Me</h4>
              <?php
              if (!empty($social_media)) {
                $social_media_links = [
                  'facebook_id' => 'fb.svg',
                  'linkdin_id' => 'in.svg',
                  'twitter_id' => 'tw.svg',
                  'pinterest_id' => 'pi.svg',
                  'instragram_id' => 'pi.svg', // Ensure this is included if you intend to use it
                ];
                ?>
                <ul>
                  <?php
                  $hasValidLink = false; // Flag to check if there are valid links
                  foreach ($social_media_links as $id => $image) {
                    $url = ensureHttps($social_media->$id);
                    if (!empty($social_media->$id) && $social_media->$id != '#' && $url != null) {
                      $hasValidLink = true; // Set flag to true if there is a valid link
                      ?>
                      <li>
                        <a href="<?php echo $url; ?>">
                          <img src="<?= base_url() ?>assets/images/<?= $image; ?>">
                        </a>
                      </li>
                      <?php
                    }
                  }

                  // Check if any valid link was found
                  if (!$hasValidLink) {
                    echo '<h1>No Social Media Found</h1>';
                  }
                  ?>
                </ul>
              <?php } else { ?>
                <h1>No Social Media Found</h1>
              <?php } ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Navbar Start -->