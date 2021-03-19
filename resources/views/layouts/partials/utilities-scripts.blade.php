<script>
    @if(session()->has("success"))
        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.success( '{{session("success")}}', 'Succès' );
        });
    @endif

    window.addEventListener("reload-page", function() {
        window.location.reload();
    });

    $(document).ready(function() {
        window.addEventListener("close-modal", function(){
            $(".x-modal").removeClass("show");
            $("#kt_body").removeClass("modal-open");
            $(".modal-backdrop").removeClass("show").removeClass("modal-backdrop");
        });
    })
</script>
