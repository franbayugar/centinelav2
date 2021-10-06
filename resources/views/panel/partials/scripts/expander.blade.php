{{-- Jquery para chosen (Plugin para los tags) --}}
<script src="{{ asset('AdminLTE/plugins/expander/jquery.expander.min.js') }}"></script>
<!--codigo javascript para su configuración o efecto de un solo llamado por defecto-->
<script type="text/javascript">
    $(document).ready(function(){$("div.expandable").expander({slicePoint:50,expandText:"[Leer más]",collapseTimer:5e4,userCollapseText:"[contraer]"})});
</script>