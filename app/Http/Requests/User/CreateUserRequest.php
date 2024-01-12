<?php

namespace App\Http\Requests\User;

use App\Http\Resources\User\CreateUserRequestResource;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|regex:/^(?=.*[A-Z])(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/',
            'cpf' => 'nullable|numeric|digits:11|unique:users'
        ];
    }

    public function messages()
    {
        return [
            'password.regex' => 'A senha deve conter pelo menos um caractere maiúsculo e um caractere especial.',
            'email.email' => 'Endereço de email invalido',
            'email.unique' => 'O endereço de email informado ja está cadastrado, por gentileza informe outro',
            'cpf.numeric' => 'O cpf deve conter apenas números.',
            'cpf.digits' => 'O cpf deve ter exatamente 11 dígitos.',
            'cpf.unique' => 'O cpf informado ja está cadastrado, por gentileza informe outro',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        // Retornar uma resposta JSON de erro
        throw new HttpResponseException(response()->json(new CreateUserRequestResource($validator->errors()), 422));
    }
    protected function prepareForValidation()
    {
        // Realize transformações nos dados após a validação ter ocorrido a validacao
        $this->merge([
            'name' => ucwords($this->name),
            'email' => strtolower($this->email),
            'cpf' => !empty($this->cpf) ? $this->cpf :  ""
        ]);
    }
    protected function passedValidation()
    {
        // Realize transformações nos dados após a validação ter ocorrido a validacao
        $this->merge([
            'password' => bcrypt($this->password)
        ]);
    }
}
