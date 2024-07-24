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
                    <li><a class="dropdown-item d-flex align-items-center" href="<?=base_url()?><?=$this->session->userdata('user_name').$this->session->userdata('user_id')?>/my-profile"><i class="bx bx-user fs-5"></i><span>My Profile</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center" href="<?=base_url()?><?=$this->session->userdata('user_name').$this->session->userdata('user_id')?>/change-password"><i class="bx bx-lock fs-5"></i><span>Change Password</span></a>
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
    <!--edit project modal---->
      <!-- Modal HTML -->
<div class="modal fade dynamic-modal" id="editProject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="editProjectForm" id="editProjectForm" enctype="multipart/form-data">
                    <div class="items">
                        <input type="hidden" name="operation" value="edit">
                        <input type="hidden" name="add_project_id" id="add_project_id" >
                        <input type="hidden" name="operation" value="edit">
                        <div class="row item-content">
                            <div class="col-md-12 mb-3">
                                <label for="project_name" class="form-label">Project Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter Project Name" id="project_name" name="project_name">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="project_url" class="form-label">Project URL</label>
                                <input type="url" name="project_url" class="form-control" id="project_url" placeholder="Enter Project URL">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="working_role" class="form-label">Your Working Role <span class="text-danger">*</span></label>
                                <input type="text" name="working_role" class="form-control" id="working_role" placeholder="Example: Project Manager" >
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="faeture_image" class="form-label">Upload Feature Image<span class="text-danger">*</span> (Image must be in 330 × 192 px)</label>
                                <input class="form-control" type="file" id="faeture_image" name="feature_image" accept="image/*" onchange="add_preview(this, 'imagePreview', 'sp_img_edit_project','editButton','330','192')">
                                <img id="project_image" src="" alt="Project Image">
                              
                                <br />
                                <span id="sp_img_edit_project" style="color:red"></span>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="description" class="form-label">Project Description<span class="text-danger">*</span> (Max 40 words Accepted)</label>
                                <textarea class="form-control" name="description"  id="project_description"aria-label="With textarea" style="height: 110px;" ></textarea>
                            </div>
                            <div class="col-md-12 text-end">
                                <button type="submit" class="btn btn-outline-secondary w-25" id="editButton">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

                                            <!-- ==================== -->
    <!---edit project modal-->
</header>