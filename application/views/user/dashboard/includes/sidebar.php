<?php $user_name=$this->session->userdata('user_name')?>
<div class="wrapper">
    <div class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div>
                <img src="<?=base_url()?>logo/logo-black.png" class="logo-icon w-100" alt="logo icon">
            </div>
        <div>
    </div>
</div>
    <ul class="metismenu" id="menu">
        <li>
            <a class="<?= ($this->uri->segment(2) == 'dashboard') ? 'active' : '' ?>"href="<?=base_url()?>UserDashboard/dashboard">
                <div class="parent-icon"><i class='bx bx-home-alt'></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a class="<?= ($this->uri->segment(2) == 'about-us') ? 'active' : '' ?>" href="<?= base_url($user_name . '/about-us') ?>">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">About us</div>
            </a>
        </li>
        <li>
            <a  class="<?= ($this->uri->segment(2) == 'education') ? 'active' : '' ?>" href="<?=base_url()?>UserDashboard/education">
                <div class="parent-icon"><i class="bx bx-book-add"></i></div>
                <div class="menu-title">Education</div>
            </a>
        </li>
        <li>
            <a class="<?= ($this->uri->segment(2) == 'experience') ? 'active' : '' ?>" href="<?=base_url()?>UserDashboard/experience">
                <div class="parent-icon"><i class="bx bx-tachometer"></i></div>
                <div class="menu-title">Experience</div>
            </a>
        </li>
        <li>
            <a  class="<?= ($this->uri->segment(2) == 'skills') ? 'active' : '' ?>" href="<?=base_url()?>UserDashboard/skills">
                <div class="parent-icon"><i class="bx bx-book-open"></i></div>
                <div class="menu-title">Skills</div>
            </a>
        </li>
        <li>
            <a class="<?= ($this->uri->segment(2) == 'projects') ? 'active' : '' ?>" href="<?=base_url()?>UserDashboard/projects">
                <div class="parent-icon"><i class="bx bx-magnet"></i></div>
                <div class="menu-title">Projects</div>
            </a>
        </li>
        <li>
            <a class="<?= ($this->uri->segment(2) == 'clients') ? 'active' : '' ?>" href="<?=base_url()?>UserDashboard/clients">
                <div class="parent-icon"><i class="bx bx-group"></i></div>
                <div class="menu-title">Clients</div>
            </a>
        </li>
    </ul>
</div>