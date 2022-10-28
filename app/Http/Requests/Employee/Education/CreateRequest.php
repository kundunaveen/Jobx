<?php

namespace App\Http\Requests\Employee\Education;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'qualification' => ['required'],
            'institution_name' => ['required'],

            'country_id' => ['required', Rule::exists('countries', 'id')],
            'state_id' => ['nullable', Rule::exists('states', 'id')],
            'city_id' => ['nullable', Rule::exists('cities', 'id')],

            'from_month' => ['required'],
            'from_year' => ['required'],

            'is_pursuing_here' => ['nullable', 'boolean'],

            'to_month' => ['nullable', 'required_without:is_pursuing_here'],
            'to_year' => ['nullable', 'required_without:is_pursuing_here'],

            'describe' => ['nullable'],
        ];
    }
}
