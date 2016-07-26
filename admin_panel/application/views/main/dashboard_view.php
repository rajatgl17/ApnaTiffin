<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>            
        </div>  

        <div class="row">
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group" >
                    <div class="input-group" id="daterange-btn">
                        <div class="input-group-addon pointer"><i class="fa fa-calendar"></i></div>
                        <input type="text" class="form-control"  value="<?php echo date('Y-m-d', strtotime("-1 months")) . ' - ' . date('Y-m-d', time()); ?>" id="selected_date_range" disabled />
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-2">
                <div class="form-group marT25">
                    <input type="button" value="Search" class="btn btn-primary btn-block" id="filter_analytics"/>   
                </div>
            </div>            
        </div>
    </div>    
</div>