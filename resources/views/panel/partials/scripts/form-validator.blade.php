{{-- Scripts necesarios para form validation --}}
<script	src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

{{-- Scripts necesarios para form validation --}}
<script>
    $.validate({lang:"es",modules:"location, date, security, file",onModulesLoaded:function(){$("#country").suggestCountry()}}),$("#presentation").restrictLength($("#pres-max-length"));
</script>