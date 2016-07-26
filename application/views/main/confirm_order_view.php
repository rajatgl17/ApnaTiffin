<div id="main-container">
    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL; ?>">Home</a></li>
        <li class="active">Confirm Order</li>
    </ol>

    <h2 class="main-heading text-center">
        My Order
    </h2>

    <section class="registration-area">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-smart">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Profile
                        </h3>
                    </div>
                    <div class="panel-body">
                        <dl class="dl-horizontal">
                            <dt>Order for dates :</dt>
                            <dd><?php echo date_format(date_create_from_format('Ymd', $start_date), 'd F, Y') . " - " . date_format(date_create_from_format('Ymd', $end_date), 'd F, Y'); ?></dd>
                            <dt>Order for :</dt>
                            <dd><?php
                                if ($order_for == 0)
                                    echo 'Both Lunch and Dinner';
                                else if ($order_for == 1)
                                    echo 'Lunch only';
                                else if ($order_for == 2)
                                    echo 'Dinner only';
                                ?></dd>

                            <?php if ($order_for != 2) { ?>
                                <dt>Lunch Address :</dt>
                                <dd><?php echo $lunch_address_text; ?></dd>
                            <?php } ?>

                            <?php if ($order_for != 1) { ?>
                                <dt>Dinner Address</dt>
                                <dd><?php echo $dinner_address_text; ?></dd>
                            <?php } ?>

                            <hr>

                            <dt>Number of meals :</dt>
                            <dd><?php echo $meals; ?></dd>

                            <dt>Cost of one meal :</dt>
                            <dd><?php echo 'Rs. ' . $cost_one_meal; ?></dd>

                            <dt>Total amount:</dt>
                            <dd><?php echo 'Rs. ' . ($totalamount); ?></dd>

                            <dt>Amount in wallet:</dt>
                            <dd><?php echo '- Rs. ' . my_wallet(); ?></dd>

                            <hr>
                            <dl class="dl-horizontal total">
                                <dt>Total :</dt>
                                <dd><?php echo 'Rs. ' . $total_amount; ?></dd>
                            </dl>
                            <hr>
                            <?php if (IS_DISCOUNT_AVAILABLE == 1) { ?>
                                <span><?php echo "You will get <b>" . DISCOUNT . "% cashback</b> in your wallet on <b>online payment</b> i.e. <b>Rs." . floor(DISCOUNT * $total_amount / 100)."</b>"; ?></span>
                            <?php } ?>
                        </dl>

                        <a href="<?php echo BASE_URL."order/cod/$uniqid"; ?>"><button class="btn btn-danger">Order (Cash on Delivery)</button></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="<?php echo BASE_URL."order/online_payment/$uniqid"; ?>"><button class="btn btn-danger">Order (Online Payment)</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>