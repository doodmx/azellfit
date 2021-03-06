<?php

namespace App\Http\Requests\Blog;

use App\Models\Blog\Tag;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTagRequest extends FormRequest
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
            'tag' => 'required|unique_translation:tag,tag,' . $this->id . ',id'
        ];
    }
}
