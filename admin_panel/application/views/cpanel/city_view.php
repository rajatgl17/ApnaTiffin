<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cities</h1>
            </div>            
        </div>  

        <div class="row">
            <?php echo form_open(BASE_URL.'cpanel/add_city'); ?>
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group" >
                    <input type="text" class="form-control" placeholder="City name" name="city"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-2">
                <div class="form-group marT25">
                    <input type="submit" value="Add City" class="btn btn-primary btn-block"/>   
                </div>
            </div> 
            <?php echo form_close(); ?>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List of cities
                    </div>

                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>City Name</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cities as $key => $value) { ?>
                                        <tr>
                                            <td class="center"><?php echo $value->city; ?></td>
                                            <td class="center"><a href="<?php echo BASE_URL . 'cpanel/delete_city/' . $this->encrypt->encode($value->pk_city_id); ?>"> Delete</a></td>
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