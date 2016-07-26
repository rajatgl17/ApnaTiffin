<header id="header-area">
    <div class="row">

        <div class="col-md-6 col-xs-12">
            <div id="logo">
                <a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>assets/images/logo.png" class="img-responsive" /></a>
            </div>
        </div>


        <div class="col-md-6 col-xs-12">
            <div class="row header-top">

                <div class="col-xs-12">
                    <div class="header-links">
                        <ul class="list-unstyled list-inline pull-right">
                            <li><a>Call <?php echo CONTACT_NUMBER; ?> to order now</a></li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="row">                
                <div class="col-xs-12">
                    <div class="header-links">
                        <ul class="list-unstyled list-inline pull-right">
                            <?php if (is_logged_in()) { ?>
                                <li><a href="<?php echo BASE_URL; ?>profile">Hi ! <?php echo my_name(); ?></a></li>
                                <li><a href="<?php echo BASE_URL; ?>profile/my_orders">My Orders</a></li>
                                <li><a href="<?php echo BASE_URL; ?>logout">Logout</a></li>
                            <?php } else { ?>
                                <li><a href="<?php echo BASE_URL; ?>register">Register</a></li>
                                <li><a href="<?php echo BASE_URL; ?>login">Login</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

</header>


<nav id="main-menu" class="navbar" role="navigation">

    <div class="navbar-header">
        <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-cat-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <i class="fa fa-bars"></i>
        </button>
    </div>


    <div class="collapse navbar-collapse navbar-cat-collapse">
        <ul class="nav navbar-nav">
            <li><a href="<?php echo BASE_URL; ?>">Home</a></li>
            <li><a href="<?php echo BASE_URL; ?>order">Order Now</a></li>
            <li><a href="<?php echo BASE_URL; ?>about_us">About Us</a></li>
            <li><a href="<?php echo BASE_URL; ?>contact_us">Contact Us</a></li>
        </ul>
    </div>

</nav>