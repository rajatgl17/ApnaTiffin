<div id="main-container">

    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL; ?>">Home</a></li>
        <li class="active">Forgot Password</li>
    </ol>

    <?php if (validation_errors() != '') { ?>
        <div class=" alert alert-danger">
            <p><?php echo validation_errors(); ?></p>
        </div>
    <?php } ?>
    
    <?php if ($error_message && $error_message != '') { ?>
        <div class=" alert alert-danger">
            <p><?php echo $error_message; ?></p>
        </div>
    <?php } ?>
    
    <?php if ($success_message && $success_message != '') { ?>
        <div class=" alert alert-success">
            <p><?php echo $success_message; ?></p>
        </div>
    <?php } ?>
    
    <h2 class="main-heading text-center">
        <span>Forgot Password</span>
    </h2>


    <section class="registration-area">
        <div class="row">
            <div class="col-xs-12 col-sm-6">

                <div class="panel panel-smart">
                    <div class="panel-heading">
                        <h3 class="panel-title">Find your account</h3>
                    </div>
                    <div class="panel-body">

                        <?php echo form_open(BASE_URL . 'register/reset_password', array('class' => 'form-horizontal', 'role' => 'form')); ?>

                        <div class="form-group">
                            <label for=email" class="col-sm-3 control-label">Email :</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for=mobile" class="col-sm-3 control-label">Mobile :</label>
                            <div class="col-sm-9">
                                <input type="mobile" class="form-control" id="mobile" placeholder="Mobile Number" name="mobile">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <input type="submit" class="btn btn-danger" value="Reset Password">
                            </div>
                        </div>
                        <?php echo form_close(); ?>

                    </div>							
                </div>
            </div>
        </div>
    </section>

</div>