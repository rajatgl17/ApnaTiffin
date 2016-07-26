<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            
            
            <?php if(isset($error_message) && $error_message != '') { ?>
            <div class="alert alert-danger" role="alert">
                <span class="fa fa-ban" aria-hidden="true"></span>
                <?php echo $error_message; ?>
            </div>
            <?php } ?>
            
            <?php if(validation_errors()) { ?>
            <div class="alert alert-danger" role="alert">
                <span class="fa fa-ban" aria-hidden="true"></span>
                <?php echo validation_errors(); ?>
            </div>
            <?php } ?>
            
            <div class="panel-heading">
                <h3 class="panel-title">Please Log In</h3>
            </div>
            <div class="panel-body">
                 <?php echo form_open(BASE_URL . 'auth/login', array('role' => 'form')); ?>
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" value="">
                        </div>
                        <input type="submit" class="btn btn-lg btn-success btn-block" value="Login">
                    </fieldset>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>