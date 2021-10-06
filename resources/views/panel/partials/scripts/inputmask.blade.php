{{-- InputMask --}}
<script src="{{ asset('AdminLTE/js/plugins/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>
<script src="{{ asset('AdminLTE/js/plugins/input-mask/jquery.inputmask.date.extensions.js') }}" type="text/javascript"></script>

<script>
    $(function(){$("[data-mask]").inputmask({mask:["(9999) 999-999","(9999) 999-999 (999)","(9999) (15)-999999"],keepStatic:!0}),$("[date-mask]").inputmask("yyyy/mm/dd",{placeholder:"yyyy/mm/dd"})});
</script>