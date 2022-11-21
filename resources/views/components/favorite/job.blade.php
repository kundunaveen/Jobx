<div class="favorite_job" id="vacancy-id-{{ $vacancy_id }}">
    <!-- Order your soul. Reduce your wants. - Augustine -->
    @if ($favorite_vacancy > 0)
    <a href="javascript:void(0);" class="favorite_vacancy" data-user_id={{ $user_id }} data-vacancy_id={{ $vacancy_id }} data-url="{{ route('favorite-vacancy.destroy') }}" title="Remove favorite">
        <i class="fa fa-bookmark" aria-hidden="true"></i>
    </a>        
    @else
    <a href="javascript:void(0);" class="favorite_vacancy" data-user_id={{ $user_id }} data-vacancy_id={{ $vacancy_id }} data-url="{{ route('favorite-vacancy.add') }}" title="Add favorite">
        <i class="fa fa-bookmark-o" aria-hidden="true"></i>
    </a>
    @endif
</div>