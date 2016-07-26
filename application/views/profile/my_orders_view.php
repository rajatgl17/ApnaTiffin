<div id="main-container">
    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL; ?>">Home</a></li>
        <li class="active">My Orders</li>
    </ol>

    <?php if (isset($msg) && $msg != '') { ?>
        <div class=" alert alert-success">
            <p><?php echo $msg; ?></p>
        </div>
    <?php } ?>

    <h2 class="main-heading text-center">
        My Orders
    </h2>


    <div class="table-responsive shopping-cart-table">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td class="text-center">
                        S. no.
                    </td>
                    <td class="text-center">
                        Meal Type
                    </td>							
                    <td class="text-center">
                        Order For
                    </td>
                    <td class="text-center">
                        Date Range
                    </td>
                    <td class="text-center">
                        No. of meals
                    </td>
                    <td class="text-center">
                        Payment Status
                    </td>
                    <td class="text-center">
                        Action
                    </td>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($orders as $key => $value) {
                    ?>
                    <tr>
                        <td><?php echo "$i."; ?></td>
                        <td><?php echo $value->name; ?></td>
                        <td><?php echo $value->order_for; ?></td>
                        <td><?php echo $value->sd . " - " . $value->ed; ?></td>
                        <td><?php echo $value->meals; ?></td>
                        <td><?php echo $value->status; ?></td>
                        <td>
                            <?php
                            if ($value->cancellable == 1) {

                                echo '<a href="' . BASE_URL . 'profile/cancel_order/' . $value->order_id . '">Cancel Order</a>';
                            } else {
                                echo 'Call to cancel..';
                            }
                            ?>
                        </td>
                    </tr>
    <?php $i++;
}
?>
            </tbody>
        </table>				
    </div>

</div>