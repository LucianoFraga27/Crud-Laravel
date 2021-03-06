<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePost extends FormRequest
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
        $id = $this->segment(2);
        
        $regras = [
            'title'=>"required|min:3|max:160|unique:posts,title,{$id},id", // obrigatorio | minimo caracteres | maximo caracteres
            'content' => ['nullable','min:5','max:1000'],//dois tipos de deixar claro as validaçoes
            'image' => ['required','image',],
        ];

        if($this->method() == 'PUT') {
                $regras ['image'] = ['nullable','image'];
        }

        return $regras;
    }
}
