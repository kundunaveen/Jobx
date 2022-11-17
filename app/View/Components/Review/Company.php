<?php

namespace App\View\Components\Review;

use App\Models\CompanyRating;
use Illuminate\View\Component;

class Company extends Component
{
    public $company_id, $avg_rating, $writeonly;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($companyId, $writeonly = false)
    {
        $avg_rating_fraction = CompanyRating::where('company_id', $companyId)
        ->avg('rating') ?? 0;
        $this->avg_rating = (int)$avg_rating_fraction;
        $this->company_id = $companyId;
        $this->writeonly = $writeonly;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.review.company');
    }
}
