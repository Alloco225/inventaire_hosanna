@section("style")
    <link rel="stylesheet" href="{{ asset("/plugins/datatables/datatables.bundle.css") }}">
@endsection

<script src="{{ asset("/plugins/datatables/datatables.bundle.js") }}"></script>
<script>
    $(document).ready(function() {
        $('#kt_datatable').DataTable({});
    });
</script>


