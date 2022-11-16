<?php

use App\Models\MasterAttribute;
use App\Models\Vacancy;

if (!function_exists('get_experience_levels_model')) {

    function get_experience_levels_model()
    {
        return MasterAttribute::where('master_attribute_category_id', 5)->orderBy('value');
    }
}

if (!function_exists('get_min_max_salary')) {

    function get_min_max_salary() :?Vacancy
    {
        return Vacancy::selectRaw("MIN(cast(salary_offer as unsigned)) AS MinSalary, MAX(cast(salary_offer as unsigned)) AS MaxSalary")->first();
    }
}

if (!function_exists('get_industries')) {

    function get_industries()
    {
        return MasterAttribute::where('master_attribute_category_id', 4)->get();
    }
}