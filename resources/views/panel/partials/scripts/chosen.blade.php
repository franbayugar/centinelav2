{{-- Jquery para chosen (Plugin para los tags) --}}
<script src="{{ asset('AdminLTE/plugins/chosen/chosen.jquery.min.js') }}"></script>

<script>
    $(".select-simple").chosen({no_results_text:"No se encuentra la categoria",width:"100%"});
</script>