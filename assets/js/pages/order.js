$(function () {

    function cb(start, end) {
        $('#daterange-btn input').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        $('#start_date').val(start.format('YYYYMMDD'));
        $('#end_date').val(end.format('YYYYMMDD'));
    }
    cb(moment(), moment());

    $('#daterange-btn').daterangepicker({
        minDate: moment(),
        maxDate: moment().add(90, 'days'),
        ranges: {
            'Today': [moment(), moment()],
            'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
            'One Week': [moment(), moment().add(6, 'days')],
            'One Month': [moment(), moment().add(29, 'days')]
        }
    }, cb);

    $('#order_for').change(function () {
        var value = $(this).val();
        switch (value) {
            case "0":
                $('#lunch').show();
                $('#dinner').show();
                break;
            case "1":
                $('#lunch').show();
                $('#dinner').hide();
                break;
            case "2":
                $('#lunch').hide();
                $('#dinner').show();
                break;
        }
    });

    $('#address_lunch').click(function () {
        if ($('#address_lunch option').length < 1) {
            $('html, body').animate({
                scrollTop: $("#address_panel").offset().top
            }, 500);
        }
    });
    
    $('#address_dinner').click(function () {
        if ($('#address_dinner option').length < 1) {
            $('html, body').animate({
                scrollTop: $("#address_panel").offset().top
            }, 500);
        }
    });
});