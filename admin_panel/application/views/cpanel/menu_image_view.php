<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Menu</h1>
            </div>            
        </div>  
        <div class=" alert alert-info">
            <p>Image must be of size less than 1 MB and should have dimensions 220 * 220 px.</p>
        </div>

        <div class="row">
            
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


            <div class="col-lg-12">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Day</th>
                                        <th>Image</th>
                                        <th>Change Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php echo form_open_multipart(BASE_URL . 'cpanel/change_menu_image'); ?>
                                        <td class="center">Monday</td>
                                        <td class="center"><img src="<?php echo BASE_URL2 . 'assets/images/food/' . $food_menu->mon; ?>" width="200"></td>
                                        <td class="center">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <input type="file" name="userfile" class="form-control">
                                                    <input type="hidden" name="field" value="mon" class="form-control">
                                                    <input type="hidden" name="tiffin_id" value="<?php echo $selected_tiffin_id; ?>" class="form-control">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="submit" value="Change Image" class="btn btn-primary btn-block"/> 
                                                </div>  
                                            </div>
                                        </td> 
                                        <?php echo form_close(); ?>
                                    </tr>
                                    
                                    <tr>
                                        <?php echo form_open_multipart(BASE_URL . 'cpanel/change_menu_image'); ?>
                                        <td class="center">Tuesday</td>
                                        <td class="center"><img src="<?php echo BASE_URL2 . 'assets/images/food/' . $food_menu->tue; ?>" width="200"></td>
                                        <td class="center">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <input type="file" name="userfile" class="form-control">
                                                    <input type="hidden" name="field" value="tue" class="form-control">
                                                    <input type="hidden" name="tiffin_id" value="<?php echo $selected_tiffin_id; ?>" class="form-control">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="submit" value="Change Image" class="btn btn-primary btn-block"/> 
                                                </div>  
                                            </div>
                                        </td> 
                                        <?php echo form_close(); ?>
                                    </tr>
                                    
                                    <tr>
                                        <?php echo form_open_multipart(BASE_URL . 'cpanel/change_menu_image'); ?>
                                        <td class="center">Wednesday</td>
                                        <td class="center"><img src="<?php echo BASE_URL2 . 'assets/images/food/' . $food_menu->wed; ?>" width="200"></td>
                                        <td class="center">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <input type="file" name="userfile" class="form-control">
                                                    <input type="hidden" name="field" value="wed" class="form-control">
                                                    <input type="hidden" name="tiffin_id" value="<?php echo $selected_tiffin_id; ?>" class="form-control">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="submit" value="Change Image" class="btn btn-primary btn-block"/> 
                                                </div>  
                                            </div>
                                        </td> 
                                        <?php echo form_close(); ?>
                                    </tr>
                                    
                                    <tr>
                                        <?php echo form_open_multipart(BASE_URL . 'cpanel/change_menu_image'); ?>
                                        <td class="center">Thursday</td>
                                        <td class="center"><img src="<?php echo BASE_URL2 . 'assets/images/food/' . $food_menu->thu; ?>" width="200"></td>
                                        <td class="center">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <input type="file" name="userfile" class="form-control">
                                                    <input type="hidden" name="field" value="thu" class="form-control">
                                                    <input type="hidden" name="tiffin_id" value="<?php echo $selected_tiffin_id; ?>" class="form-control">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="submit" value="Change Image" class="btn btn-primary btn-block"/> 
                                                </div>  
                                            </div>
                                        </td> 
                                        <?php echo form_close(); ?>
                                    </tr>
                                    
                                    <tr>
                                        <?php echo form_open_multipart(BASE_URL . 'cpanel/change_menu_image'); ?>
                                        <td class="center">Friday</td>
                                        <td class="center"><img src="<?php echo BASE_URL2 . 'assets/images/food/' . $food_menu->fri; ?>" width="200"></td>
                                        <td class="center">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <input type="file" name="userfile" class="form-control">
                                                    <input type="hidden" name="field" value="fri" class="form-control">
                                                    <input type="hidden" name="tiffin_id" value="<?php echo $selected_tiffin_id; ?>" class="form-control">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="submit" value="Change Image" class="btn btn-primary btn-block"/> 
                                                </div>  
                                            </div>
                                        </td> 
                                        <?php echo form_close(); ?>
                                    </tr>
                                    
                                    <tr>
                                        <?php echo form_open_multipart(BASE_URL . 'cpanel/change_menu_image'); ?>
                                        <td class="center">Saturday</td>
                                        <td class="center"><img src="<?php echo BASE_URL2 . 'assets/images/food/' . $food_menu->sat; ?>" width="200"></td>
                                        <td class="center">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <input type="file" name="userfile" class="form-control">
                                                    <input type="hidden" name="field" value="sat" class="form-control">
                                                    <input type="hidden" name="tiffin_id" value="<?php echo $selected_tiffin_id; ?>" class="form-control">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="submit" value="Change Image" class="btn btn-primary btn-block"/> 
                                                </div>  
                                            </div>
                                        </td> 
                                        <?php echo form_close(); ?>
                                    </tr>
                                    
                                    <tr>
                                        <?php echo form_open_multipart(BASE_URL . 'cpanel/change_menu_image'); ?>
                                        <td class="center">Sunday</td>
                                        <td class="center"><img src="<?php echo BASE_URL2 . 'assets/images/food/' . $food_menu->sun; ?>" width="200"></td>
                                        <td class="center">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <input type="file" name="userfile" class="form-control">
                                                    <input type="hidden" name="field" value="sun" class="form-control">
                                                    <input type="hidden" name="tiffin_id" value="<?php echo $selected_tiffin_id; ?>" class="form-control">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="submit" value="Change Image" class="btn btn-primary btn-block"/> 
                                                </div>  
                                            </div>
                                        </td> 
                                        <?php echo form_close(); ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>                            
                    </div>                        
                </div>                    
            </div>              
        </div>
    </div>    
</div>