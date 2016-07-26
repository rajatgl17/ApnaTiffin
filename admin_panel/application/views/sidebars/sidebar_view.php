<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </li>
            <li>
                <a href="#"><i class="fa fa-user fa-fw"></i> Orders<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo BASE_URL; ?>dashboard/new_orders"><i class="fa fa-plus fa-fw"></i> New Orders</a>
                    </li>
                    <li>
                        <a href="<?php echo BASE_URL; ?>dashboard/all_orders"><i class="fa fa-plus fa-fw"></i> All Orders</a>
                    </li>
                </ul>
            </li>
            <?php if ($this->session->userdata('user_type') == 1) { ?>
                <li>
                    <a href="<?php echo BASE_URL; ?>dashboard/registered_users"><i class="fa fa-list fa-fw"></i> Registered Users List</a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL; ?>dashboard/contact_queries"><i class="fa fa-list fa-fw"></i> Contact Queries</a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i> Delivery Panel<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo BASE_URL; ?>cpanel/country"><i class="fa fa-plus fa-fw"></i> Add Country</a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>cpanel/city"><i class="fa fa-plus fa-fw"></i> Add City</a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>cpanel/region"><i class="fa fa-plus  fa-fw"></i> Add Region</a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>cpanel/lunch_time"><i class="fa fa-plus  fa-fw"></i> Add Lunch Time</a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>cpanel/dinner_time"><i class="fa fa-plus  fa-fw"></i> Add Dinner Time</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i> Tiffin Menu<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo BASE_URL; ?>cpanel/tiffin"><i class="fa fa-plus fa-fw"></i> Add Tiffin</a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>cpanel/menu"><i class="fa fa-plus fa-fw"></i> Change Menu</a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>cpanel/price"><i class="fa fa-plus fa-fw"></i> Change Price</a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>cpanel/menu_image"><i class="fa fa-plus fa-fw"></i> Change Menu Images</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i> UI Panel<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo BASE_URL; ?>cpanel/banners"><i class="fa fa-plus fa-fw"></i> Add Banners</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i> Dashboard Users<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo BASE_URL . 'users'; ?>"><i class="fa fa-list-ol fa-fw"></i> Users List</a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL . 'users/add_user'; ?>"><i class="fa fa-plus  fa-fw"></i> Add New User</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo BASE_URL; ?>cpanel/constants"><i class="fa fa-wrench  fa-fw"></i> Change Constants</a>
                </li>
            <?php } ?>


        </ul>
    </div>
</div>