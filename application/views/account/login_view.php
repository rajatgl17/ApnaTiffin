<div id="main-container">

    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL; ?>">Home</a></li>
        <li class="active">Log In</li>
    </ol>

    <?php if (validation_errors() != '' || $error != '') { ?>
        <div class=" alert alert-danger">
            <p><?php echo validation_errors(); ?></p>
            <p><?php echo $error; ?></p>
        </div>
    <?php } ?>


    <h2 class="main-heading text-center">
        Login or create new account
    </h2>


    <section class="login-area">
        <div class="row">
            <div class="col-sm-6">

                <div class="panel panel-smart">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            Please login using your existing account
                        </p>

                        <?php echo form_open(BASE_URL . 'login/login', array('class' => 'form-inline', 'role' => 'form')); ?>
                            <div class="form-group">
                                <label class="sr-only" for="email">E-mail or Mobile Number</label>
                                <input type="text" class="form-control" id="email" placeholder="E-mail or Mobile Number" name="email">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                            </div>
                            <input type="submit" class="btn btn-danger" value="Log in">
                            <br><a href="<?php echo BASE_URL; ?>register/forgot_password">Forgotten your password?</a>
                        <?php echo form_close(); ?>

                    </div>
                </div>

            </div>
            <div class="col-sm-6">

                <div class="panel panel-smart">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Create new account
                        </h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            Not already registered? Please create an account to checkout.
                        </p>
                        <a href="<?php echo BASE_URL; ?>register" class="btn btn-danger">
                            Register
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>