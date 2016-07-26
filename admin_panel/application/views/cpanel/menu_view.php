<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Menu</h1>
            </div>            
        </div>  

        <div class="row">
            <?php echo form_open(BASE_URL . 'cpanel/change_menu'); ?>
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group" >
                    <select class="form-control" id="tiffin_id" name="tiffin_id"/>
                    <?php foreach ($tiffins as $key => $value) { ?>
                        <option value="<?php echo $this->encrypt->encode($value->pk_tiffin_id); ?>" <?php if($value->pk_tiffin_id == $selected_tiffin_id) echo'selected'; ?>>
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
                                        <th>Time</th>
                                        <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="center" colspan="2"><center><b>LUNCH</b></center></td></td>                                            
                                    </tr>
                                    <tr>
                                        <td class="center">Monday</td>
                                        <td class="center"><input type="text" name="mon_l" value="<?php echo $food_menu->mon_l; ?>" class="form-control"></td>                                            
                                    </tr>
                                    <tr>
                                        <td class="center">Tuesday</td>
                                        <td class="center"><input type="text" name="tue_l" value="<?php echo $food_menu->tue_l; ?>" class="form-control"></td>                                            
                                    </tr> 
                                    <tr>
                                        <td class="center">Wednesday</td>
                                        <td class="center"><input type="text" name="wed_l" value="<?php echo $food_menu->wed_l; ?>" class="form-control"></td>                                            
                                    </tr> 
                                    <tr>
                                        <td class="center">Thursday</td>
                                        <td class="center"><input type="text" name="thu_l" value="<?php echo $food_menu->thu_l; ?>" class="form-control"></td>                                            
                                    </tr> 
                                    <tr>
                                        <td class="center">Friday</td>
                                        <td class="center"><input type="text" name="fri_l" value="<?php echo $food_menu->fri_l; ?>" class="form-control"></td>                                            
                                    </tr> 
                                    <tr>
                                        <td class="center">Satudrday</td>
                                        <td class="center"><input type="text" name="sat_l" value="<?php echo $food_menu->sat_l; ?>" class="form-control"></td>                                            
                                    </tr> 
                                    <tr>
                                        <td class="center">Sunday</td>
                                        <td class="center"><input type="text" name="sun_l" value="<?php echo $food_menu->sun_l; ?>" class="form-control"></td>                                            
                                    </tr>
                                    
                                    <tr>
                                        <td class="center" colspan="2"><center><b>Dinner</b></center></td></td>                                            
                                    </tr>
                                    <tr>
                                        <td class="center">Monday</td>
                                        <td class="center"><input type="text" name="mon_d" value="<?php echo $food_menu->mon_d; ?>" class="form-control"></td>                                            
                                    </tr>
                                    <tr>
                                        <td class="center">Tuesday</td>
                                        <td class="center"><input type="text" name="tue_d" value="<?php echo $food_menu->tue_d; ?>" class="form-control"></td>                                            
                                    </tr> 
                                    <tr>
                                        <td class="center">Wednesday</td>
                                        <td class="center"><input type="text" name="wed_d" value="<?php echo $food_menu->wed_d; ?>" class="form-control"></td>                                            
                                    </tr> 
                                    <tr>
                                        <td class="center">Thursday</td>
                                        <td class="center"><input type="text" name="thu_d" value="<?php echo $food_menu->thu_d; ?>" class="form-control"></td>                                            
                                    </tr> 
                                    <tr>
                                        <td class="center">Friday</td>
                                        <td class="center"><input type="text" name="fri_d" value="<?php echo $food_menu->fri_d; ?>" class="form-control"></td>                                            
                                    </tr> 
                                    <tr>
                                        <td class="center">Satudrday</td>
                                        <td class="center"><input type="text" name="sat_d" value="<?php echo $food_menu->sat_d; ?>" class="form-control"></td>                                            
                                    </tr> 
                                    <tr>
                                        <td class="center">Sunday</td>
                                        <td class="center"><input type="text" name="sun_d" value="<?php echo $food_menu->sun_d; ?>" class="form-control"></td>                                            
                                    </tr>
                                    
                                    
                                </tbody>
                            </table>
                        </div>                            
                    </div>                        
                </div>                    
            </div>   

            <div class="col-xs-12 col-sm-6 col-lg-2">
                <div class="form-group marT25">
                    <input type="submit" value="Change Menu" class="btn btn-primary btn-block"/>   
                </div>
            </div> 
            <?php echo form_close(); ?>
        </div>
    </div>    
</div>