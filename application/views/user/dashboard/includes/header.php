<?php
$user_id=$this->session->userdata('user_id');
$user_data= $this->db->where(['id'=>$user_id,'status'=>1])->get('tbl_users')->row();
$name_id = $user_data->first_name . $user_data->last_name .  $user_data->id;
$image_data=$this->db->select('image')->where(['user_id'=>$user_id,'status'=>1])->get('tbl_user_image')->row();
$about_data=$this->db->select('designation')->where(['user_id'=>$user_id,'status'=>1])->get('tbl_about')->row();
?>

<header>

    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand gap-3">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
                <div class="search-bar d-lg-block ">
                    <input type="text" class="form-control" value="<?=base_url()?><?=$name_id?>" id="copytoClipboard" title="Your Profile URL">
                </div>
                <div class="search-bar d-lg-block">
                    <a href="#" onclick="copytoClipboard()" title="Copy URL" class="btn btn-outline-secondary"><i class="bx bx-copy"></i></a>
                    <a href="<?=base_url()?><?=$name_id?>" class="btn btn-outline-secondary" title="Run URL" target="_blank"><i class="bx bx-play"></i></a>
                </div>
                <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center gap-1">
                    <li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
                        <a class="nav-link" href=""><i class='bx bx-search'></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown dropdown-laungauge d-none d-sm-flex"></li>
                    <li class="nav-item dropdown dropdown-app">
                        <div class="dropdown-menu dropdown-menu-end p-0">
                            <div class="app-container p-2 my-2"></div>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="header-notifications-list"></div>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="header-message-list"></div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="user-box dropdown px-3">
                <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php
                    if(empty($image_data)){
                    ?>
                   <img src="<?=base_url()?>admin-assets/images/pro-pic.jpg" class="user-img" alt="user avatar">
                    <?php }else{?>
                    <img src="<?=base_url()?>assets/upload/user_Images/<?=$image_data->image?>" class="user-img" alt="user avatar">
                    <?php }?>
                    <div class="user-info">
                        <p class="user-name mb-0"><?=$this->session->userdata('user_name')?></p>
                        <p class="designattion mb-0"><?=!empty($about_data->designation)?$about_data->designation:""?></p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item d-flex align-items-center" href="<?=base_url()?>UserDashboard/myProfile"><i class="bx bx-user fs-5"></i><span>My Profile</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center" href="<?=base_url()?>UserDashboard/changePassword"><i class="bx bx-lock fs-5"></i><span>Change Password</span></a>
                    </li>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center text-danger" onclick="logoutuser('<?= base_url() ?>logoutuser')"><i class="bx bx-log-out-circle"></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>