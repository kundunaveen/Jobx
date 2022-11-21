<a href="javascript:void(0);" class="favorite_vacancy" data-user_id={{ $user_id }} data-vacancy_id={{ $vacancy_id }} data-url="{{ $route }}" title="@if($add_favorite_vacancy) Add favorite @else Remove favorite @endif">
    @if ($add_favorite_vacancy)
    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
    @else
    <i class="fa fa-bookmark" aria-hidden="true"></i>
    @endif
</a>