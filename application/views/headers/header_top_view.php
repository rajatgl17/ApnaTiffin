
<!-- CSS Files -->
<?php
if (isset($css_files)) {
    foreach ($css_files as $css_file) {
        ?>
        <link rel="stylesheet" href="<?php echo BASE_URL . 'assets/css/' . $css_file; ?>" type="text/css" />
        <?php
    }
}
?>

