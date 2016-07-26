<div class="copyright container">
    <div class="clearfix">
        <p class="pull-right">
            <a href="<?php echo BASE_URL; ?>terms_and_conditions" style="color:white;">Terms and Conditions</a> | &copy; 2015 Apna Tiffin
        </p>
    </div>
</div>

<script src="<?php echo BASE_URL; ?>assets/js/jquery.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>

<?php
if (isset($js_files)) {
    foreach ($js_files as $js_file) {
        ?>
        <script src="<?php echo BASE_URL . 'assets/js/' . $js_file; ?>"></script>
        <?php
    }
}
?>
