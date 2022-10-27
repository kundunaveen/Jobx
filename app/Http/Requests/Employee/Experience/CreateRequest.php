<?php

namespace App\Http\Requests\Employee\Experience;

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
            'job_title' => ['required'],
            'company' => ['required'],
            'country_id' => ['required', Rule::exists('countries', 'id')],
            'state_id' => ['nullable', Rule::exists('states', 'id')],
            'city_id' => ['nullable', Rule::exists('cities', 'id')],
            'from_month' => ['required'],
            'from_year' => ['required'],
            'is_work_here' => ['nullable', 'boolean'],
            'to_month' => ['nullable', 'required_without:is_work_here'],
            'to_year' => ['nullable', 'required_without:is_work_here'],
            'describe' => ['nullable'],
        ];
    }
}
