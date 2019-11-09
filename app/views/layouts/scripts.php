<?php extract($data);?>

<!-- Core JS files -->
<script src="<?=base_url()?>assets/js/plugins/loaders/pace.min.js"></script>
<script src="<?=base_url()?>assets/js/core/libraries/jquery.min.js"></script>
<script src="<?=base_url()?>assets/js/core/libraries/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/plugins/loaders/blockui.min.js"></script>
<!-- <script src="<?=base_url()?>assets/js/plugins/ui/moment/moment.min.js"></script> -->
<!-- /core JS files -->
<script src="<?=base_url()?>assets/js/app.js"></script>
<!-- <script src="<?=base_url()?>assets/js/demo_pages/dashboard.js"></script> -->
<script src="<?=base_url()?>assets/js/demo_pages/layout_fixed_native.js"></script>
<script src="<?=base_url()?>assets/parsley/parsley.min.js"></script>

<!-- Theme JS files -->
<script src="<?=base_url()?>assets/js/plugins/ui/moment/moment.min.js"></script>
<script src="<?=base_url()?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script src="<?=base_url()?>assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
<script src="<?=base_url()?>assets/js/plugins/forms/selects/select2.min.js"></script>
<script src="<?=base_url()?>assets/js/demo_pages/datatables_responsive.js"></script>
<script src="<?=base_url()?>assets/js/plugins/pickers/daterangepicker.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<!-- /theme JS files -->

<!-- custom -->

<script>


$('.reportTable').DataTable({
    dom: 'Bfrtip',
        buttons: [
            'print'
        ]
})

var date = new Date();
date.setDate(date.getDate());
$('.daterange-single').daterangepicker({ 
    singleDatePicker: true,    
    minDate: new Date(),
    showWeekNumbers : true
});


function showDeprecationModal() {
    var modal = $('#showDeprecationModal');
    modal.modal();   
}
computeDepreciationMethod();
function computeDepreciationMethod() {
    var purchase_price      = $('#cpurchase_price');
    var expected_life       = $('#cexpected_life');
    var scrap_value         = $('#cscrap_value');
    var salvage_value       = $('#csalvage_value');
    var depreciation_cost   = $('#cdepreciation_cost');

    var DateDiff = {
        inYears: function(d1, d2) {
            return d2.getFullYear()-d1.getFullYear();
        }
    }

    $('#btnComputeWithoutExit').click( e => {
        e.preventDefault();
        var expect_life = DateDiff.inYears(new Date(), new Date(expected_life.val()));
        var totalWithScrapValue    = (Number(purchase_price.val()) - Number(scrap_value.val())) / Number(expect_life);
        var totalWithoutScrapValue = Number(purchase_price.val()) / Number(expect_life);
        salvage_value.val(totalWithoutScrapValue);
        depreciation_cost.val(totalWithScrapValue);
        $('#purchase_price').val(purchase_price.val());
        $('#expected_life').val(expected_life.val());
        $('#scrap_value').val(scrap_value.val() == '' ? 0 : scrap_value.val());
        $('#salvage_value').val(salvage_value.val());
        $('#depreciation_cost').val(totalWithScrapValue);
        $('#showDeprecationModal').modal('hide');
    })
}
</script>
</body>
</html>
