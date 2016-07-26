<div id="main-container">
    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL; ?>">Home</a></li>
        <li class="active">My Profile</li>
    </ol>
    
    <?php if (validation_errors() != '') { ?>
        <div class=" alert alert-danger">
            <p><?php echo validation_errors(); ?></p>
        </div>
    <?php } ?>
    
    <?php if ($error != '') { ?>
        <div class=" alert alert-danger">
            <p><?php echo $error; ?></p>
        </div>
    <?php } ?>
    
    <?php if ($success != '') { ?>
        <div class=" alert alert-success">
            <p><?php echo $success; ?></p>
        </div>
    <?php } ?>

    <section class="registration-area">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-smart">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Profile
                        </h3>
                    </div>
                    <div class="panel-body">
                        <dl class="dl-horizontal">
                            <dt>Name :</dt>
                            <dd><?php echo my_name(); ?></dd>
                            <dt>E-mail :</dt>
                            <dd><?php echo my_email(); ?></dd>
                            <dt>Mobile no. :</dt>
                            <dd><?php echo my_mobile(); ?></dd>
                            <dt>Wallet Amount :</dt>
                            <dd>Rs. <?php echo my_wallet(); ?></dd>
                        </dl>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="panel panel-smart">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Saved Addresses
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive shopping-cart-table">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td class="text-center">
                                            S. no.
                                        </td>
                                        <td class="text-center">
                                            Address
                                        </td>							
                                        <td class="text-center">
                                            Action
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($user_addresses as $key => $value) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo "$i."; ?></td>
                                            <td class="text-center"><?php echo $value; ?></td>
                                            <td class="text-center"><a href="<?php echo BASE_URL . 'profile/remove_address/' . $key; ?>">Remove</a></td>
                                        </tr>
                                    <?php $i++; } ?>
                                </tbody>
                            </table>				
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-12 col-md-6">
                <div class="panel panel-smart">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Change Password
                        </h3>
                    </div>
                    <div class="panel-body">
                    <?php echo form_open(BASE_URL.'profile/change_password'); ?>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="password" class="form-control" placeholder="Current Password" name="cpassword">
                            </div>
                        </div><br><br>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="password" class="form-control" placeholder="New Password (Minimum 6 characters)" name="npassword">
                            </div>
                        </div><br><br>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="password" class="form-control"  placeholder="Re-Password" name="rpassword">
                            </div>
                        </div><br><br>
                        <div class="form-group">
                            <div class="col-sm-offset-1">
                                <input type="submit" class="btn btn-danger" value="Change Password">
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>