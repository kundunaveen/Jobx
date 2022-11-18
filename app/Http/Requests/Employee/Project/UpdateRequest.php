<?php

namespace App\Http\Requests\Employee\Project;

use App\Models\ProjectImage;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => ['required'],
            'role' => ['required'],
            'team_size' => ['required', 'numeric'],
            'description' => ['nullable'],
            'images' => ['nullable', 'array'],
            'old_images' => ['nullable', 'array'],
            'images.*' => ['max:2000', 'image', 'mimes:' . implode(',', ProjectImage::SUPPORTED_IMAGE_MIME_TYPE)],
        ];
    }

    public function attributes()
    {
        return [
            'images.*' => 'image',
        ];
    }
}
