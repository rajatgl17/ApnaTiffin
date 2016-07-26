<div id="main-container">

    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL; ?>">Home</a></li>
        <li class="active">Order</li>
    </ol>

    <?php if (validation_errors() != '') { ?>
        <div class=" alert alert-danger">
            <p><?php echo validation_errors(); ?></p>
        </div>
    <?php } ?>

    <?php if ($success_message && $success_message != '') { ?>
        <div class=" alert alert-success">
            <p><?php echo $success_message; ?></p>
        </div>
    <?php } ?>

    <h2 class="main-heading text-center">
        Order Now
    </h2>

    <section class="registration-area">
        <div class="row">
            <div class="col-sm-12">

                <div class="panel panel-smart">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Order
                        </h3>
                    </div>
                    <div class="panel-body">

                        <?php //echo form_open(BASE_URL . 'order/error', array('class' => 'form-horizontal', 'role' => 'form')); ?>
                        <?php echo form_open(BASE_URL . 'order/confirm_your_order', array('class' => 'form-horizontal', 'role' => 'form')); ?>
                        <div class="col-xs-12">
                            <span>
                                <marquee style="font-size: medium; font-weight: 500;">Lunch Order for the same date should must be given before <?php echo LUNCH_BEFORE; ?> and for dinner <?php echo DINNER_BEFORE; ?></marquee>
                            </span>
                        </div>
                        <div class="form-group col-md-6 col-lg-6">
                            <label for="date_range" class="col-sm-3 control-label">Date :</label>
                            <div class="col-sm-9">
                                <div class="input-group" id="daterange-btn">
                                    <div class="input-group-addon pointer"><i class="fa fa-calendar"></i></div>
                                    <input type="text" class="form-control" disabled style="background-color:#ffffff; cursor:default;" />
                                    <input type="hidden" name="start_date" id="start_date">
                                    <input type="hidden" name="end_date" id="end_date">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-lg-6">
                            <label for="order_for" class="col-sm-3 control-label">Order For :</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="order_for" name="order_for">
                                    <option value="0">Both Lunch and Dinner</option>
                                    <option value="1">Lunch Only</option>
                                    <option value="2">Dinner Only</option>
                                </select>
                            </div>
                        </div>
                        <div id="lunch">
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="lunch_time" class="col-sm-3 control-label">Lunch Time :</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="lunch_time" name="lunch_time">
                                        <?php foreach ($lunch_timings as $key => $value) { ?>
                                            <option value="<?php echo $value->id; ?>"><?php echo $value->time; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="address_lunch" class="col-sm-3 control-label">Address for Lunch :</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="address_lunch" name="lunch_address">
                                        <?php foreach ($user_addresses as $key => $value) { ?>
                                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="dinner">
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="dinner_time" class="col-sm-3 control-label">Dinner Time :</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="dinner_time" name="dinner_time">
                                        <?php foreach ($dinner_timings as $key => $value) { ?>
                                            <option value="<?php echo $value->id; ?>"><?php echo $value->time; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="address_dinner" class="col-sm-3 control-label">Address for Dinner :</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="address_dinner" name="dinner_address">
                                        <?php foreach ($user_addresses as $key => $value) { ?>
                                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="form-group col-md-6 col-lg-6">
                            <label for="meal_type" class="col-sm-3 control-label">Meal Type :</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="meal_type" name="meal_type">
                                    <?php foreach ($meal_types as $key => $value) { ?>
                                        <option value="<?php echo $this->encrypt->encode($value->pk_tiffin_id); ?>"><?php echo $value->name . ' (Rs. ' . $value->price . ' per meal)'; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-lg-6">
                            <label for="meal_type" class="col-sm-3 control-label">Number of orders :</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" value="1" name="number_of_orders" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-danger col-sm-offset-2" value="Order Now">
                            </div>
                        </div>
                        <?php echo form_close(); ?>

                    </div>
                </div>
            </div>

            <div class="col-sm-12" id="address_panel">

                <div class="panel panel-smart">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Delivery Address
                        </h3>
                    </div>
                    <div class="panel-body">

                        <?php echo form_open(BASE_URL . 'order/save_address', array('class' => 'form-horizontal', 'role' => 'form')); ?>
                        <div class="form-group col-lg-6 col-md-6">
                            <label class="col-sm-3 control-label">Address :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Address Line 1" name="address_line_1">
                            </div>
                        </div>
                        <div class="form-group  col-lg-6 col-md-6">
                            <label class="col-sm-3 control-label">Address :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Address Line 2"  name="address_line_2">
                            </div>
                        </div>
                        <div class="form-group  col-lg-6 col-md-6">
                            <label class="col-sm-3 control-label">Region :</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="region">
                                    <?php foreach ($regions as $key => $value) { ?>
                                        <option value="<?php echo $value->id; ?>"><?php echo $value->region; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group  col-lg-6 col-md-6">
                            <label class="col-sm-3 control-label">Cty :</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="city">
                                    <?php foreach ($cities as $key => $value) { ?>
                                        <option value="<?php echo $value->id; ?>"><?php echo $value->city; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group  col-lg-6 col-md-6">
                            <label class="col-sm-3 control-label">Country :</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="country">
                                    <?php foreach ($countries as $key => $value) { ?>
                                        <option value="<?php echo $value->id; ?>"><?php echo $value->country; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-danger col-sm-offset-2" value="Save Address">
                            </div>
                        </div>
                        <?php echo form_close(); ?>

                    </div>
                </div>

            </div>
        </div>
    </section>
</div>