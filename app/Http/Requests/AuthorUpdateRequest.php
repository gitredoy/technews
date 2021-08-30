<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorUpdateRequest extends FormRequest
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
            $this->validate([
                'name' => 'required|string',

                'roles' => 'required|array'
            ],[
                'name.required' =>'Author Name Field Is Required',
                'roles.required' => 'Roles Field Is Required',
            ])
        ];
    }
}
