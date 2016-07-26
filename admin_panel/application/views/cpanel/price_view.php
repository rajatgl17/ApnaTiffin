<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Menu</h1>
            </div>            
        </div>  

        <div class="row">
            <?php echo form_open(BASE_URL . 'cpanel/change_price'); ?>
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group" >
                    <select class="form-control" id="tiffin_id" name="tiffin_id"/>
                    <?php foreach ($tiffins as $key => $value) { ?>
                        <option value="<?php echo $this->encrypt->encode($value->pk_tiffin_id); ?>" <?php if ($value->pk_tiffin_id == $selected_tiffin_id) echo'selected'; ?>>
                            <?php echo $value->name; ?>
                        </option>
                    <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group" >
                    <input type="number" class="form-control" name="price"/>
                </div>
            </div>


            <div class="col-xs-12 col-sm-6 col-lg-2">
                <div class="form-group marT25">
                    <input type="submit" value="Change Price" class="btn btn-primary btn-block"/>   
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tiffins as $key => $value) { ?>
                                        <tr>
                                            <td class="center"><?php echo $value->name; ?></td>
                                            <td class="center"><?php echo $value->price; ?></td>                                            
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