<div id="page-wrapper">
    <div class="container-fluid">
        <?php echo form_open(BASE_URL . 'cpanel/change_constants'); ?>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Constants</h1>
            </div>            
        </div>  
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="dataTable_wrapper">

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($constants as $key => $value) { ?>
                                <tr>
                                    <td><?php echo $value->name; ?></td>
                                    <td><input type="text" class="form-control" name="<?php echo $value->pk_id; ?>" value="<?php echo $value->value; ?>"></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>                            
                </div>                        
            </div>                    
        </div>   

        <div class="col-xs-12 col-sm-6 col-lg-2">
            <div class="form-group marT25">
                <input type="submit" value="Change constants" class="btn btn-primary btn-block"/>   
            </div>
        </div> 
        <?php echo form_close(); ?>
    </div>
</div>    
</div>