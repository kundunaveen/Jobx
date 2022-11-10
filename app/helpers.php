<?php

use App\Models\MasterAttribute;

if (!function_exists('get_experience_levels_model')) {

    function get_experience_levels_model()
    {
        return MasterAttribute::where('master_attribute_category_id', 5)->orderBy('value');
    }
}