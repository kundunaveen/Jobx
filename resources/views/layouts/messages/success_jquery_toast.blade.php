@if($message = Session::get('success'))
@push('footer_script')
    <script>
        successToastAlert("{{ $message }}");
    </script>
@endpush
@endif