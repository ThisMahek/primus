</div>
    <div class="cv_footer_wrapper">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="cv_footer_text">
                <p>Copyright © <span id="copyYear"></span> <a href="#">easyprofile.in</a> All Rights Reserved</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    
    <!--=== Optional JavaScript ===-->
    <script src="<?=base_url()?>assets/js/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/swiper-bundle.min.js"></script>
    <script src="<?=base_url()?>assets/js/SmoothScroll.min.js"></script>
    <script src="<?=base_url()?>assets/js/isotope.pkgd.min.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.appear.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.countTo.js"></script>
    <script src="<?=base_url()?>assets/js/ityped.min.js"></script>
    <script src="<?=base_url()?>assets/js/custom.js"></script>
    <!--=== Optional JavaScript ===-->

    <script>
      $(document).ready(function() {
      $("#toggle").click(function() {
      var elem = $("#toggle").text();
      if (elem == "View More") {
      //Stuff to do when btn is in the read more state
      $("#toggle").text("View Less");
      $("#viewMore").slideDown();
      } else {
      //Stuff to do when btn is in the read less state
      $("#toggle").text("View More");
      $("#viewMore").slideUp();
      }
      });
      });
    </script>