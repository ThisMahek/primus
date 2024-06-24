<!DOCTYPE html>
<html lang="en">
<!-- Begin Head -->
<head>
<?php include_once('includes/main-head.php') ?>
</head>
<body>
<?php include_once('includes/header.php') ?>
  <div class="cv_banner_wrapper">
    <div class="cv_container container">
      <div class="row">
        <div class="col-xl-12">
          <div class="cv_banner_text text-center">
            <?php
            if(!empty($about_data->designation))
            {
            ?>
            <h5><?=!empty($about_data->designation)?$about_data->designation:""?></h5>
            <?php }?>
            <h1>Hello! <span><img src="<?=base_url()?>assets/images/hand.svg" class="img-fluid"></span> I Am</h1>
            <h1 class="cv_profile_name"></h1>
          
            <a href="#contactUs" class="btn btn-primary w-10 text-center">Contact Us</a>
          </div>
          <?php
          if(!empty($about_data->carrier_objective))
          {
          ?>
          <div class="cv_banner_box text-left mb-4 ">
            <h2>Carrier Objective</h2>
            <p><?=!empty($about_data->carrier_objective)?$about_data->carrier_objective:""?></p>
          </div>
          <?php }?>

        </div>
      </div>
    </div>
  </div>
  <?php
  if($user_data->is_about_us==1 && !empty($about_data->image) && !empty($about_data->introduction) && !empty($about_data->cv))
  {
  ?>
  <!--========== About Section Start============= -->
  <div class="cv_about_wrapper">
    <div class="cv_container container  ">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">
          <div class="cv_about_content">
            <div class="cv_about_img text-center">
              <?php
              if(!empty($about_data->image)){
              ?>
              <img src="<?=base_url()?>assets/upload/User_Images/<?=$about_data->image?>" class="img-fluid w-100 about-img">
              <?php }else{?>
                <img src="<?=base_url()?>assets/upload/download.png" class="img-fluid w-100 about-img" style="width:100%;height:400px">
                <?php }?>

            </div>
          </div>
        </div>
        <div class="col-md-7 ">
          <div class="cv_about_content">
            <div class="cv_about_info">
              <h2>About Me</h2>
              <div class="cv_about_box">
                <h3>Who I’m</h3>
                <p><?=!empty($about_data->introduction)?$about_data->introduction:""?></p>
              </div>
              <div class="cv_about_btn">
                <a href="<?=base_url()?><?=!empty($about_data->cv)?$about_data->cv:""?>" class="cv_btn" download>Download Resume</a>
                <a href="<?=base_url()?><?=!empty($about_data->cv)?$about_data->cv:""?>" class="cv_btn" target="_blank">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--============= About Section End================== -->
<?php }?>

    <!--=========== Award Section Start======= -->
    <section class="cv_award_wrapper">
        <div class="container">
          <div class="row justify-content-center">
          
            <div class="col-md-4 col-sm-6">
              <div class="cv_award_box">
                <div class="cv_award_icon">
                  <img src="<?=base_url()?>assets/images/award-3.svg">
                </div>
                <div class="cv_award_text">
                  <h4> </h4>
                 
                  <h1>
                  <?php calculateTotalMonthsAndConvert($user_id)?>
                  </h1>
                  <h4>Total Experience </h4>

                 
                </div>
              </div>
            </div>
            
        
            <div class="col-md-4 col-sm-6">
              <div class="cv_award_box">
                <div class="cv_award_icon">
                  <img src="<?=base_url()?>assets/images/award-1.svg">
                </div>
                <div class="cv_award_text">
                  <h1><span class="timer" data-from="0" data-to="<?=$total_client?>" data-speed="2000"></span></h1>
                  <h4>Happy Clients</h4>
                </div>
              </div>
            </div>
=
        
            <div class="col-md-4 col-sm-6">
              <div class="cv_award_box">
                <div class="cv_award_icon">
                  <img src="<?=base_url()?>assets/images/award-2.svg">
                </div>
                <div class="cv_award_text">
                  <h1 class="timer" data-from="0" data-to="<?=$total_project?>" data-speed="2000"></h1>
                  <h4>Project Done</h4>
                </div>
              </div>
            </div>
       
          </div>
        </div>
      </section>
    
  <!--======== Award Section End========= -->
 
<?php
if($user_data->is_education==1){
?>
  <!--============= Education Section Start============ -->
  <section class="cv_education_wrapper">
    <div class="cv_container container">
      <div class="row align-items-center">
        <div class="col-12">
          <div class="cv_sec_heading">
            <h2>Education</h2>
            <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit.</p>
          </div>
        </div>
        <div class="col-xl-12">
          <div class="row">
            <?php
            foreach ($education_data as $edu) {
            
            ?>
            <div class="col-md-6 cv_edu_box box-1">
              <div class="cv_edu_title">
                <h4><?=$edu->education_type?></h4>
                <h1><?=$edu->year?></h1>
              </div>
              <div class="cv_edu_detail">
                <span>- <?=$edu->institute?></span>
                <p><?=$edu->description?></p>
              </div>
            </div>
           <?php }?>
            
           
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--========== Education Section End ==============-->
<?php }?>
<?php
if($user_data->is_experience==1){
?>
  <!--========== Experience Section Start=========== -->
  <section class="cv_experience_wrapper">
    <div class="cv_container container">
      <div class="row align-items-center">
        <div class="col-12">
          <div class="cv_sec_heading">
            <h2>My Experience</h2>
            <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit.</p>
          </div>
        </div>
        <div class="col-xl-12">
        <?php
            foreach ($experience_data as $expre) {
            ?>
          <div class="cv_exp_box">
            <h2>01</h2>
            <div class="cv_exp_com">
              <span>
                <h3><?=$expre->work_type?></h3>
                <h5>- <a href="<?=$expre->website_url?>"><?=$expre->organisation_name?></a></h5>
              </span>
              <h5>(<?=date("M-Y", strtotime($expre->work_from))?> to <?=date("M-Y",strtotime($expre->work_to))?>)</h5>
            </div>
          </div>
          <?php }?>
        </div>
      </div>
    </div>
  </section>
  <!--======== Experience Section End=========== -->
  <?php }?>

  <!--======== Do Section Start================= -->
      <div class="cv_do_wrapper" style="display:none;">
        <div class="cv_container container">
          <div class="row align-items-center">
            <div class="col-xl-4">
              <div class="cv_do_heading">
                <h2>What I Do</h2>
                <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</p>
              </div>
              <div class="cv_do_img">
                <img src="<?=base_url()?>assets/images/do_img.webp" class="img-fluid">
              </div>
            </div>
            <div class="col-xl-8">
              <div class="row">
                <div class="col-sm-6">
                  <div class="cv_do_box">
                    <div class="cv_do_icon">
                      <img src="<?=base_url()?>assets/images/do-icon1.svg">
                    </div>
                    <div class="cv_do_text">
                      <h4>Website Design</h4>
                      <p>Embarrassing hidden in the middle of text. All the Ipsum generate on the are Internettend.</p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="cv_do_box">
                    <div class="cv_do_icon">
                      <img src="<?=base_url()?>assets/images/do-icon2.svg">
                    </div>
                    <div class="cv_do_text">
                      <h4>Graphic Design</h4>
                      <p>Embarrassing hidden in the middle of text. All the Ipsum generate on the are Internettend.</p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="cv_do_box">
                    <div class="cv_do_icon">
                      <img src="<?=base_url()?>assets/images/do-icon3.svg">
                    </div>
                    <div class="cv_do_text">
                      <h4>Logo Design</h4>
                      <p>Embarrassing hidden in the middle of text. All the Ipsum generate on the are Internettend.</p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="cv_do_box">
                    <div class="cv_do_icon">
                      <img src="<?=base_url()?>assets/images/do-icon4.svg">
                    </div>
                    <div class="cv_do_text">
                      <h4>Web Development</h4>
                      <p>Embarrassing hidden in the middle of text. All the Ipsum generate on the are Internettend.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  <!--=========== Do Section End============ -->
  <?php
if($user_data->is_skill==1){
?>
  <!--======== Skill Section Start======= -->
    <section class="cv_skill_wrapper">
      <div class="cv_container container">
        <div class="row align-items-center">
          <div class="col-12">
            <div class="cv_sec_heading">
              <h2>My Skills</h2>
              <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit.</p>
            </div>
          </div>
          <div class="col-xl-12">
          <div class="row">
          <?php
            foreach ($skills_data as $skill) {
            ?>
          <div class="col-md-6">
            <div class="cv_skill_box">
              <div class="cv_skill_progress">
                <div class="cv_skill_text">
                  <h4><?=$skill->skill?></h4>
                  <p><?=$skill->percantage?>%</p>
                </div>
                <div class="cv_skill_bar">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: <?=$skill->percantage?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php }?>
          </div>
          </div>
        </div>
      </div>
    </section>
    <!--======= Skill Section End ========-->
    <?php }?>
    <?php
if($user_data->is_project==1){
?>
    <!--======= Project Section Start==== -->
      <section class="cv_project_wrapper">
        <div class="cv_container container">
          <div class="row">
            <div class="col-12">
              <div class="cv_sec_heading">
                <h2>Latest Projects</h2>
                <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit.</p>
              </div>
            </div>
            <div class="col-12">
              <div class="cv_project_content">
                <?php
                foreach($project_data as $p_data){
                ?>
                <div class="cv_project_box">
                  <div class="cv_project_img">
                  <a href="<?=$p_data->project_url?>">  <img src="<?=base_url()?>assets/upload/Project_Image/<?=$p_data->faeture_image?>" class="img-fluid"></a>
                  </div>
                  <div class="cv_project_text">
                    <div class="cv_project_heading">
                      <p><?=$p_data->working_role?></p>
                      <span>
                        <img src="<?=base_url()?>assets/images/time.svg">
                        1 Month Ago
                      </span>
                    </div>
                    <div class="cv_project_title">
                      <p><?=$p_data->description?></p>
                    </div>
                  </div>
                </div>
               
              <?php }?>
                <span id="viewMore">
                  <div class="cv_project_box">
                    <div class="cv_project_img">
                      <img src="<?=base_url()?>assets/images/proj-3.webp" class="img-fluid">
                    </div>
                    <div class="cv_project_text">
                      <div class="cv_project_heading">
                        <p>Development</p>
                        <span>
                          <img src="<?=base_url()?>assets/images/time.svg">
                          1 Month Ago
                        </span>
                      </div>
                      <div class="cv_project_title">
                        <p>Best Wireframe Tools For Web Designers.</p>
                      </div>
                    </div>
                  </div>
                </span>
              </div>
            </div>
            <div class="col-12">
              <div class="cv_bottom_btn">
                <a href="javascript:void(0)" class="cv_btn" id="toggle">View More</a>
              </div>
            </div>
          </div>
        </div>
      </section>
  <!--====== Project Section End ======-->
  <?php }?>
  <!--====== Client Section Start===== -->
  <?php
if($user_data->is_client==1){
?>
        <section class="cv_client_wrapper">
        <div class="cv_container container">
          <div class="row align-items-center">
          <div class="col-12">
              <div class="cv_sec_heading">
                <h2>Our Clients</h2>
                <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit.</p>
              </div>
            </div>
            <div class="col-xl-12">
            <div class="cv_client_box">
                <?php
                foreach($client_data as $client){
                ?>
                 
                <div class="cv_client_img">
                 <a href="<?=$client->url?>" target="_blank"> <img src="<?=base_url()?>assets/upload/logo/<?=$client->logo?>" height="100px" width="60px"></a>
                </div>
<?php }?>
</div>
            </div>
          </div>
        </div>
      </section>
      <?php }?>
  <!--==== Client Section End ======-->
  <!--==== Contact Section Start=== -->
    <section class="cv_address_wrapper">
        <div class="container">
          <div class="row justify-content-center">
          <div class="col-12">
              <div class="cv_sec_heading">
                <h2>Contact Us</h2>
                <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit.</p>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="cv_address_box">
                <div class="cv_address_icon">
                  <img src="<?=base_url()?>assets/images/add-1.svg">
                </div>
                <div class="cv_address_text">
                  <h5>Phone</h5>
                  <a href="javascript:void(0);"><?=isset($contact_data->mobile)?$contact_data->mobile:""?></a>
                 
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="cv_address_box">
                <div class="cv_address_icon">
                  <img src="<?=base_url()?>assets/images/add-2.svg">
                </div>
                <div class="cv_address_text">
                  <h5>Email</h5>
                  <a href="javascript:void(0);"><?=isset($contact_data->email_id)?$contact_data->email_id:""?></a>        
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12">
              <div class="cv_address_box">
                <div class="cv_address_icon">
                  <img src="<?=base_url()?>assets/images/add-3.svg">
                </div>
                <div class="cv_address_text">
                  <h5>Address</h5>
                  <a href="javascript:void(0);"><?=isset($contact_data->address)?$contact_data->address:""?></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
  <!--==== Address Section End===== -->
<?php include_once('includes/footer.php') ?>

</body>
</html>