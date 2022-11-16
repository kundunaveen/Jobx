
<div>
    <div class="company_rating" data-company_id="{{ $company_id }}" data-score="{{ $avg_rating }}"></div>
    <input type="text" name="rating_value" value="{{ $avg_rating }}" id="text-{{ $company_id }}" class="d-none">
</div>
@push('footer_script')
<script>
    var company_rating_store_update_route = "{{ route('company-rating-store-update') }}";
    var auth_user_id = "{{ optional(auth()->user())->id }}";
</script>
@endpush