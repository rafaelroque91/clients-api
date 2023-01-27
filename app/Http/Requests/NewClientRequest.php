<?php

namespace App\Http\Requests;

use App\Rules\ValidCPF;
use App\Rules\WordCount;
use Illuminate\Foundation\Http\FormRequest;

class NewClientRequest extends FormRequest
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
            'name' => ['required','string','max:100',new WordCount(2)],
            'cpf' => ['required','numeric','unique:clients','digits:11',new ValidCPF()],            
            'birth_date' => 'required|date',         
            'phone' => 'nullable|numeric|digits_between:10,11',         
        ];
    }
}