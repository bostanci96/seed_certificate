<script src="<?php echo TEMA_URL; ?>tema-assets/vendors/js/vendors.min.js"></script>
<script src="<?php echo TEMA_URL; ?>tema-assets/vendors/js/ui/jquery.sticky.js"></script>
<script src="<?php echo TEMA_URL; ?>tema-assets/vendors/js/charts/apexcharts.min.js"></script>
<script src="<?php echo TEMA_URL; ?>tema-assets/vendors/js/extensions/toastr.min.js"></script>
<script src="<?php echo TEMA_URL; ?>tema-assets/js/core/app-menu.js"></script>
<script src="<?php echo TEMA_URL; ?>tema-assets/js/core/app.js"></script>
<script src="<?php echo TEMA_URL; ?>tema-assets/vendors/js/forms/wizard/bs-stepper.min.js"></script>
<script src="<?php echo TEMA_URL; ?>tema-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="<?php echo TEMA_URL; ?>tema-assets/vendors/js/forms/validation/jquery.validate.min.js"></script><script src="<?php echo TEMA_URL; ?>tema-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
<script src="<?php echo TEMA_URL; ?>tema-assets/vendors/js/extensions/polyfill.min.js"></script>
<script src="<?php echo TEMA_URL; ?>tema-assets/tv2/ajaxFormData.js"></script>

<script type="text/javascript" charset="utf8" src="<?php echo TEMA_URL; ?>tema-assets/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>



<script>
$(window).on('load', function() {
if (feather) {
feather.replace({
width: 14,
height: 14
});
}
})
</script>
<script type="text/javascript">
	$("img").each(function() { // for each img found
    var src = $(this).attr("src"); // get the src
    var fileName = src.substring(src.lastIndexOf('.')); // and filename
    console.log(fileName)
    if(fileName=='.pdf' ){
         $(this).replaceWith( "<iframe style='width: 100%;height: 450px;'  src='"+src+"' />" );
          $(this).remove();
    }
  });
</script>