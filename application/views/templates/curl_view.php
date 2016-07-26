<html>
    <head>
        <script>
            var hash = '<?php echo $hash ?>';
            function submitPayuForm() {
                if (hash == '') {
                    return;
                }
                var payuForm = document.forms.payuForm;
                payuForm.submit();
            }
        </script>
    </head>
    <body onload="submitPayuForm()">
        Please wait ...
        <form action="<?php echo PAYU_BASE_URL . '_payment'; ?>" method="post" name="payuForm">
            <input type="hidden" name="key" value="<?php echo $key; ?>" />
            <input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
            <input type="hidden" name="txnid" value="<?php echo $txnid; ?>" />
            <input type="hidden" name="amount" value="<?php echo $amount; ?>" />
            <input type="hidden" name="firstname" value="<?php echo $firstname; ?>" />
            <input type="hidden" name="email" value="<?php echo $email; ?>" />
            <input type="hidden" name="phone" value="<?php echo $phone; ?>" />
            <input type="hidden" name="productinfo" value="<?php echo $productinfo; ?>">
            <input type="hidden" name="surl" value="<?php echo $surl; ?>order/success" />
            <input type="hidden" name="furl" value="<?php echo $furl; ?>order/failure" />
            <input type="hidden" type="hidden" name="service_provider" value="payu_paisa"/>
            <?php if (!$hash) { ?>
                <input type="submit" value="Submit" />
            <?php } ?>
        </form>
    </body>
</html>