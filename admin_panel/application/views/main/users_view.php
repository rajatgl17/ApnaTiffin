<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
        </div>        
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    User List
                </div>

                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="user_table">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Email address</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($user_list as $key => $value) { ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $value->username; ?></td>
                                        <td><?php echo $value->email; ?></td>
                                        <td><?php echo $value->alias; ?></td>
                                        <td>
                                            <?php if ($value->user_type == 1) { ?>
                                             Superadmin Account
                                            <?php }else if ($value->status == 1) { ?>
                                                <a href="<?php echo BASE_URL . "users/deactivate_user/$value->user_id"; ?>">Deactivate account</a>
                                            <?php } else { ?>
                                                <a href="<?php echo BASE_URL . "users/activate_user/$value->user_id"; ?>">Activate account</a>
                                            <?php } ?>                                     
                                        </td>
                                    </tr> 
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>