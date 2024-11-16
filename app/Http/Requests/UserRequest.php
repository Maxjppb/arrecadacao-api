<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route()->parameter('id');
       
        switch ($this->method())
        {
            case 'GET':
            case 'POST': {
                return [
                    'name'     => ['required','min:3','max:255'],
                    'email'    => ['required','email','max:255','unique:users'],
                    'password' => ['required','min:6','max:20'],
                    'role'     => ['required'],
                    'status'   => ['required']
                ];
            }
            case 'PUT': {
                return [
                    'name'     => ['required','min:3','max:255'],
                    'email'    => 'required|email|unique:users,email,' . $id . ',id',
                    'password' => 'required',
                    'role'     => 'required',
                    'status'   => ['required']
                ];
            }
            case 'PATH':
            case 'DELETE':
            default:
                break;
        }

		if ($this->method() === 'PUT' || $this->method() === 'PATCH') {
			$rules['email'] = [
				'required','min:3','max:255',
				Rule::unique('users')->ignore($id)
			];
		}
    }

    public function messages()
    {
        return [
            'required'  => 'Digite o :attribute',
            'email'     => 'Insira um Email Válido',
            'unique'    => 'O :attribute já existe.',
            'confirmed' => 'Por Favaor Confirmar :attribute',
            'min'       => 'O :attribute tem que ter no minimo :min caracteres',
            'max'       => 'O :attribute tem que ter no maximo :max caracteres'
        ];        
    }
}