<?php

namespace App\Http\Requests;

use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
        $rules = Project::$rules;

        $rules['title'] = 'required|max:50|unique:projects,title,'.$this->route('projects');
        $rules['slug'] = 'required|max:50|unique:projects,slug,'.$this->route('projects');

        $rules['image'] = 'nullable';

        return $rules;
    }
}
