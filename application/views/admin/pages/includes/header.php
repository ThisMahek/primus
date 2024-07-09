<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand gap-3">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
                <!-- <div class="search-bar d-lg-block ">
                    <input type="text" class="form-control" value="www.easyprofile.com" id="copytoClipboard" title="Your Profile URL">
                </div>
                <div class="search-bar d-lg-block">
                    <a href="#" onclick="copytoClipboard()" title="Copy URL" class="btn btn-outline-secondary"><i class="bx bx-copy"></i></a>
                    <a href="" class="btn btn-outline-secondary" title="Run URL" target="_blank"><i class="bx bx-play"></i></a>
                </div> -->
                <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center gap-1">
                    <li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
                        <a class="nav-link" href="javascript:;"><i class='bx bx-search'></i>
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
                    <img src="<?=base_url()?>admin-assets/images/avatars/avatar-1.png" class="user-img" alt="user avatar">
                    <div class="user-info">
                        <p class="user-name mb-0">Yash Pratap</p>
                        <p class="designattion mb-0">Super Admin</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item d-flex align-items-center" href="<?=base_url()?>admin/changePassword"><i class="bx bx-lock fs-5"></i><span>Change Password</span></a>
                    </li>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center text-danger" href="javascript:;"><i class="bx bx-log-out-circle"></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>