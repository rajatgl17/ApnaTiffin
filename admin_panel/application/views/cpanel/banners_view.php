<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Country</h1>
            </div>            
        </div>  
        <div class=" alert alert-info">
            <p>Image must be of size less than 1MB and should have dimensions 1190 * 470 px.</p>
        </div>

        <div class="row">
            <?php echo form_open_multipart(BASE_URL.'cpanel/add_banner'); ?>
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group" >
                    <input type="file" class="form-control" name="userfile"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-2">
                <div class="form-group marT25">
                    <input type="submit" value="Add Banner" class="btn btn-primary btn-block"/>   
                </div>
            </div> 
            <?php echo form_close(); ?>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List of Banners
                    </div>

                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Banner</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($banners as $key => $value) { ?>
                                        <tr>
                                            <td class="center"><img src="<?php echo BASE_URL2.'assets/images/banners/'.$value->path; ?>" width="200"></td>
                                            <td class="center"><a href="<?php echo BASE_URL . 'cpanel/delete_banner/' . $this->encrypt->encode($value->pk_banner_id); ?>"> Delete</a></td>
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
</div>