<?php

namespace App\View\Components\Favorite;

use App\Models\FavoriteJob;
use Illuminate\View\Component;

class Job extends Component
{
    public $favorite_vacancy, $vacancy_id, $user_id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(int $vacancyId, int $userId)
    {
        if(blank($vacancyId) || blank($userId)){
            return false;
        }
        $this->favorite_vacancy = FavoriteJob::where([
            ['vacancy_id', '=', $vacancyId],
            ['user_id', '=', $userId],
            ])->count();

        $this->vacancy_id = $vacancyId;
        $this->user_id = $userId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.favorite.job');
    }
}
