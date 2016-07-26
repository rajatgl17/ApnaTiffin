<div id="main-container">

    <div class="content-box text-center" style="min-height: 400px;">
        <?php if (isset($error) && $error != '') { ?>
            <div class=" alert alert-danger">
                <p><?php echo $error; ?></p>
            </div>
        <?php } ?>

        <?php if (isset($msg) && $msg != '') { ?>
            <div class=" alert alert-success">
                <p><?php echo $msg; ?></p>
            </div>
        <?php } ?>
        
        <?php if (isset($emsg) && $emsg != '') { ?>
            <div class=" alert alert-danger">
                <p><?php echo $emsg; ?></p>
            </div>
        <?php } ?>
        <br>
        <p>
            <a href="<?php echo BASE_URL; ?>" class="btn btn-danger text-uppercase">Back to Home</a>
        </p>
    </div>

</div>