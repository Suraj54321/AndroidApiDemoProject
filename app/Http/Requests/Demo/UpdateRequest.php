<?php

namespace App\Http\Requests\Demo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class UpdateRequest extends FormRequest
{
    public $id;


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
        $this->id=Request::segment(4);
        
     return [
            'name' => 'required|string|min:3|max:100',
            'contact' => 'required|digits:10|unique:demo_models,contact,'.$this->id,
            'city' => 'required|string|max:30'
        ];
        
    }
}
