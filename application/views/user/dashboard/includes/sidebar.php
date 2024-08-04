<?php $user_name=$this->session->userdata('user_name').$this->session->userdata('user_id')?>
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
            <a class="<?= ($this->uri->segment(2) == 'dashboard') ? 'active' : '' ?>"href="<?= base_url($user_name . '/dashboard') ?>">
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
            <a  class="<?= ($this->uri->segment(2) == 'education') ? 'active' : '' ?>" href="<?= base_url($user_name . '/education') ?>">
                <div class="parent-icon"><i class="bx bx-book-add"></i></div>
                <div class="menu-title">Education</div>
            </a>
        </li>
        <li>
            <a class="<?= ($this->uri->segment(2) == 'experience') ? 'active' : '' ?>" href="<?= base_url($user_name . '/experience') ?>">
                <div class="parent-icon"><i class="bx bx-tachometer"></i></div>
                <div class="menu-title">Experience</div>
            </a>
        </li>
        <li>
            <a  class="<?= ($this->uri->segment(2) == 'skills') ? 'active' : '' ?>" href="<?= base_url($user_name . '/skills') ?>">
                <div class="parent-icon"><i class="bx bx-book-open"></i></div>
                <div class="menu-title">Skills</div>
            </a>
        </li>
        <li>
            <a class="<?= ($this->uri->segment(2) == 'projects') ? 'active' : '' ?>" href="<?= base_url($user_name . '/projects') ?>">
                <div class="parent-icon"><i class="bx bx-magnet"></i></div>
                <div class="menu-title">Projects</div>
            </a>
        </li>
        <li>
            <a class="<?= ($this->uri->segment(2) == 'clients') ? 'active' : '' ?>" href="<?= base_url($user_name . '/clients') ?>">
                <div class="parent-icon"><i class="bx bx-group"></i></div>
                <div class="menu-title">Clients</div>
            </a>
        </li>
        <li>
            <a class="<?= ($this->uri->segment(2) == 'social_media') ? 'active' : '' ?>" href="<?= base_url($user_name . '/social_media') ?>">
                <div class="parent-icon"><i class="bx bx-group"></i></div>
                <div class="menu-title">Social Media</div>
            </a>
        </li>
        <li>
            <a class="<?= ($this->uri->segment(2) == 'award_archiments') ? 'active' : '' ?>" href="<?= base_url($user_name . '/award_archiments') ?>">
                <div class="parent-icon"><i class="bx bx-group"></i></div>
                <div class="menu-title">Awards Achievements</div>
            </a>
        </li>
        
    </ul>
</div>