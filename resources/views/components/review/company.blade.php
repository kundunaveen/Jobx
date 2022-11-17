
<div>
    @if($writeonly)
    <div class="company_rating" data-company_id="{{ $company_id }}" data-score="{{ $avg_rating }}"></div>
    <input type="text" name="rating_value" value="{{ $avg_rating }}" id="text-{{ $company_id }}" class="d-none">
    @else
    <div class="company_rating_readonly" data-score="{{ $avg_rating }}"></div>
    @endif
</div>
@push('footer_script')
<script>
    var company_rating_store_update_route = "{{ route('company-rating-store-update') }}";
    var auth_user_id = "{{ optional(auth()->user())->id }}";
</script>
@endpush