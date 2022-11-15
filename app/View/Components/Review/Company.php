<?php

namespace App\View\Components\Review;

use App\Models\CompanyRating;
use Illuminate\View\Component;

class Company extends Component
{
    public $company_id, $avg_rating;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($companyId)
    {
        $this->avg_rating = CompanyRating::where('company_id', $companyId)
        ->avg('rating');
        $this->company_id = $companyId;
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
