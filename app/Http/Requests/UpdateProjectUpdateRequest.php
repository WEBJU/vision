<?php

namespace App\Http\Requests;

use App\Models\ProjectUpdate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectUpdateRequest extends FormRequest
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
        $rules = ProjectUpdate::$rules;

        $rules['title'] = 'required|max:255|unique:project_updates,title,'.$this->route('project_update');

        return $rules;
    }
}
 