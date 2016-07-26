<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">New Orders</h1>
            </div>            
        </div>  

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List of Orders
                    </div>
                    <a class="btn btn-primary btn-block" style="color:white;" href="<?php echo BASE_URL;?>dashboard/download_new_orders" target="_blank">Download as Excel</a>
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Order For</th>
                                        <th>Lunch Address</th>
                                        <th>Dinner Address</th>
                                        <th>Lunch Time</th>
                                        <th>Dinner_time</th>
                                        
                                        <th>Total Amount to be paid</th>
                                        <th>Meals number</th>
                                        <th>Start date</th>
                                        <th>End Date</th>
                                        <th>Total Amount</th>
                                        <th>Meal Type</th>
                                        <th>Order Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orders as $key => $value) { ?>
                                        <tr>
                                            <td class="center"><?php echo $value->name; ?></td>
                                            <td class="center"><?php echo $value->mobile; ?></td>
                                            <td class="center"><?php echo $value->order_for; ?></td>
                                            <td class="center"><?php echo $value->lunch_address; ?></td>
                                            <td class="center"><?php echo $value->dinner_address; ?></td>
                                            <td class="center"><?php echo $value->lunch_time; ?></td>
                                            <td class="center"><?php echo $value->dinner_time; ?></td>
                                            
                                            <td class="center">Rs. <?php echo $value->amount; ?></td>
                                            <td class="center"><?php echo $value->meals; ?></td>
                                            <td class="center"><?php echo $value->start_date; ?></td>
                                            <td class="center"><?php echo $value->end_date; ?></td>
                                            <td class="center">Rs. <?php echo $value->total_amount; ?></td>
                                            <td class="center"><?php echo $value->meal_type; ?></td>
                                            <td class="center">Rs. <?php echo $value->create_time; ?></td>
                                        </tr> 
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>                            
                    </div>     
                    
                    <br>                    <br>
                    <a target="_blank" href="<?php echo BASE_URL; ?>cronjob/flush_lunch">Remove Lunch orders upto this point</a><br>
                    <a target="_blank" href="<?php echo BASE_URL; ?>cronjob/flush_dinner">Remove Dinner orders upto this point</a>
                </div>                    
            </div>                
        </div>
    </div>    
</div>
