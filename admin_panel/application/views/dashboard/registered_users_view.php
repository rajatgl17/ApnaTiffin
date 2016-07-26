<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Registered Users</h1>
            </div>            
        </div>  

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List of Registered Users
                    </div>

                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>E-mail</th>
                                        <th>Mobile</th>
                                        <th>Date</th>
                                        <th>Verified Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($registered_users as $key => $value) { ?>
                                        <tr>
                                            <td class="center"><?php echo $value->name; ?></td>
                                            <td class="center"><?php echo $value->email; ?></td>
                                            <td class="center"><?php echo $value->mobile; ?></td>
                                            <td class="center"><?php echo date("F j, Y",$value->create_time); ?></td>
                                            <td class="center">
                                                <?php
                                                if ($value->is_activated)
                                                    echo '<span class="text-success"><i class="fa fa-check"></i></span>';
                                                else
                                                    echo '<span class="text-danger"><i class="fa fa-remove"></i></span>';
                                                ?>
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
</div>