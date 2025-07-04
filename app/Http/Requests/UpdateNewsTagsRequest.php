<?php

namespace App\Http\Requests;

use App\Models\NewsTags;
use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsTagsRequest extends FormRequest
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
        $rules = NewsTags::$rules;
        $rules['name'] = 'required|max:25|unique:news_tags,name,'.$this->id;

        return $rules;
    }
}
