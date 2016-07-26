<div id="main-container">

    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL; ?>">Home</a></li>
        <li class="active">Contact Us</li>
    </ol>

    <?php if (validation_errors() != '') { ?>
        <div class=" alert alert-danger">
            <p><?php echo validation_errors(); ?></p>
        </div>
    <?php } ?>
    
    <?php if ($success_message != '') { ?>
        <div class=" alert alert-success">
            <p><?php echo $success_message; ?></p>
        </div>
    <?php } ?>

    <h2 class="main-heading text-center">
        Contact Us
    </h2>


    <div id="map-wrapper">
        <div id="map-block"></div>
    </div>


    <div class="row">

        <div class="col-sm-4">
            <div class="panel panel-smart">
                <div class="panel-heading">
                    <h3 class="panel-title">Contact Details</h3>
                </div>
                <div class="panel-body">
                    <ul class="list-unstyled contact-details">
                        <li class="clearfix">
                            <i class="fa fa-home pull-left"></i>
                            <span class="pull-left">
                                Apna Tiffin <br />
                                Jagatpura, Jaipur, Rajasthan, <br />
                                India - 302 017
                            </span>
                        </li>
                        <li class="clearfix">
                            <i class="fa fa-phone pull-left"></i>
                            <span class="pull-left">
                                +91-82393-38333
                            </span>
                        </li>
                        <li class="clearfix">
                            <i class="fa fa-envelope-o pull-left"></i>
                            <span class="pull-left">
                                info@apnatiffin.in
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="col-sm-8">
            <div class="panel panel-smart">
                <div class="panel-heading">
                    <h3 class="panel-title">Send us a mail</h3>
                </div>
                <div class="panel-body">
                    <?php echo form_open(BASE_URL . 'contact_us', array('class' => 'form-horizontal', 'role' => 'form')); ?>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">
                                Name
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">
                                Email
                            </label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject" class="col-sm-2 control-label">
                                Subject 
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message" class="col-sm-2 control-label">
                                Message
                            </label>
                            <div class="col-sm-10">
                                <textarea name="message" id="message" class="form-control" rows="5" placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="btn btn-danger text-uppercase" value="submit">
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>

    </div>

</div>
<script src="https://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false"></script>