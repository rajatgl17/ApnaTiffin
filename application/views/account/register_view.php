<div id="main-container">

    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL; ?>">Home</a></li>
        <li class="active">Register</li>
    </ol>

    <?php if (validation_errors() != '') { ?>
        <div class=" alert alert-danger">
            <p><?php echo validation_errors(); ?></p>
        </div>
    <?php } ?>
    
    <?php if ($msg != '') { ?>
        <div class=" alert alert-success">
            <p><?php echo $msg; ?></p>
        </div>
    <?php } ?>
    
    <h2 class="main-heading text-center">
        Register <br />
        <span>Create New Account</span>
    </h2>


    <section class="registration-area">
        <div class="row">
            <div class="col-sm-6">

                <div class="panel panel-smart">
                    <div class="panel-heading">
                        <h3 class="panel-title">Personal Information</h3>
                    </div>
                    <div class="panel-body">

                        <?php echo form_open(BASE_URL . 'register/register', array('class' => 'form-horizontal', 'role' => 'form')); ?>

                        <div class="form-group">
                            <label for=name" class="col-sm-3 control-label">Name :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?php echo $name_session; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email :</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $email_session; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mobile" class="col-sm-3 control-label">Mobile :</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" value="+91" disabled>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="mobile" placeholder="10 digit Mobile Number" name="mobile" value="<?php echo $mobile_session; ?>">
                            </div>
                        </div>


                        
                        <h3 class="panel-heading inner">
                            Password
                        </h3>

                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-3 control-label">Password :</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="inputPassword" placeholder="Password (Minimum 6 characters)" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputRePassword" class="col-sm-3 control-label">Re-Password :</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="inputRePassword" placeholder="Re-Password" name="repassword">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="accept" value="accept"> I've read and agreed on <a href="<?php echo BASE_URL; ?>terms_and_conditions" target="_blank">Terms and Conditions</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <input type="submit" class="btn btn-danger" value="Register">
                            </div>
                        </div>

                        <?php echo form_close(); ?>

                    </div>							
                </div>

            </div>
            <div class="col-sm-6">



                <!--div class="panel panel-smart">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Conditions
                        </h3>
                    </div>
                    <div class="panel-body">

                    </div>
                </div-->

            </div>
        </div>
    </section>

</div>