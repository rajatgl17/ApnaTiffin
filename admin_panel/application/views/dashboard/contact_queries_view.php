<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Contact Queries</h1>
            </div>            
        </div>  

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List of contact queries
                    </div>

                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>E-mail</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($contact_queries as $key => $value) { ?>
                                        <tr>
                                            <td class="center"><?php echo $value->name; ?></td>
                                            <td class="center"><?php echo $value->email; ?></td>
                                            <td class="center"><?php echo $value->subject; ?></td>
                                            <td class="center"><?php echo $value->message; ?></td>
                                            <td class="center"><?php echo date("F j, Y", $value->timestamp); ?></td>
                                            <td class="center"><a href="<?php echo BASE_URL.'dashboard/delete_contact_query/'.$this->encrypt->encode($value->pk_contact_id); ?>">Delete</a></td>
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