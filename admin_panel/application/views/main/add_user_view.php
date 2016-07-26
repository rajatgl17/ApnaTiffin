<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
        </div>        
    </div>

    <div class="row">
        <div class="col-lg-12">
            <?php if(isset($success_message) && $success_message != '') { ?>
            <div class="alert alert-success" role="alert">
                <span class="fa fa-check" aria-hidden="true"></span>
                <?php echo $success_message; ?>
            </div>
            <?php } ?>
            
            <?php if(isset($error_message) && $error_message != '') { ?>
            <div class="alert alert-danger" role="alert">
                <span class="fa fa-ban" aria-hidden="true"></span>
                <?php echo $error_message; ?>
            </div>
            <?php } ?>
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add new user
                </div>

                <div class="panel-body">
                    <?php echo form_open(BASE_URL . 'users/add_new_user', array('role' => 'form')); ?>
                    <div class="form-group col-md-6">
                        <label>User Name</label>
                        <input type="text" class="form-control" placeholder="User Name" name="name">
                        <p> <?php echo form_error('name', '<p class="text-danger">', '</p>'); ?></p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>E-mail address</label>
                        <input type="email" class="form-control" placeholder="E-mail address" name="email">
                        <p> <?php echo form_error('email', '<p class="text-danger">', '</p>'); ?></p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password (minimum 6 characters)" name="password">
                        <p> <?php echo form_error('password', '<p class="text-danger">', '</p>'); ?></p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Re-Password</label>
                        <input type="password" class="form-control" placeholder="Re-type Password" name="rpassword">
                        <p> <?php echo form_error('rpassword', '<p class="text-danger">', '</p>'); ?></p>
                    </div>
                    <div class="form-group col-md-6">
                        <label>User Role</label>
                        <select class="form-control" name="user_role">
                            <?php foreach($user_roles as $key=>$value){ ?>
                            <option value="<?php echo $value->id; ?>"><?php echo $value->alias; ?></option>
                            <?php } ?>
                        </select>
                        <p> <?php echo form_error('user_role', '<p class="text-danger">', '</p>'); ?></p>
                    </div>
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-default">Add User</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>