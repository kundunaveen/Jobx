<?php

use App\Models\Cms;
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

if (!function_exists('get_min_max_experience')) {

    function get_min_max_experience() :?Vacancy
    {
        return Vacancy::selectRaw("MIN(cast(min_exp as unsigned)) AS MinExperience, MAX(cast(min_exp as unsigned)) AS MaxExperience")->first();
    }
}

if (!function_exists('get_industries')) {

    function get_industries()
    {
        return MasterAttribute::where('master_attribute_category_id', 4)->get();
    }
}

if (!function_exists('total_vacancies')) {

    function total_vacancies()
    {
        return Vacancy::count() ?? 0;
    }
}

if (!function_exists('total_industries')) {

    function total_industries()
    {
        return MasterAttribute::where('master_attribute_category_id', '4')->count();
    }
}

if (!function_exists('get_cms_setting_data')) {

    function get_cms_setting_data() :Cms
    {
        return Cms::where('slug', Cms::CMS_SLUG_SETTING)->first();
    }
}