<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tiifins</h1>
            </div>            
        </div>  

        <div class="row">
            <?php echo form_open(BASE_URL . 'cpanel/add_tiffin'); ?>
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group" >
                    <input type="text" class="form-control" placeholder="Tiffin Name" name="name"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="form-group" >
                    <input type="number" class="form-control" placeholder="Tiffin Price" name="price"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="form-group" >
                    <select class="form-control" name="is_menu_available">
                        <option value="1">Menu is available</option>
                        <option value="0">Menu not available</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-2">
                <div class="form-group marT25">
                    <input type="submit" value="Add Tiffin" class="btn btn-primary btn-block"/>   
                </div>
            </div> 
            <?php echo form_close(); ?>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List of Tiffins
                    </div>

                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Tiffin Name</th>
                                        <th>Price (Rs.)</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tiffins as $key => $value) { ?>
                                        <tr>
                                            <td class="center"><?php echo $value->name; ?></td>
                                            <td class="center"><?php echo $value->price; ?></td>
                                            <td class="center"><a href="<?php echo BASE_URL . 'cpanel/delete_tiffin/' . $this->encrypt->encode($value->pk_tiffin_id); ?>"> Delete</a></td>
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