<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidatoRequest extends FormRequest
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
        return [
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|string|email:rfc,dns|max:255|unique:candidatos,email',
            'telefone' => 'nullable|string|max:30|regex:/^\(?\d{2}\)?[\s-]?\d{4,5}-?\d{4}$/',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O nome deve ser um texto.',
            'name.min' => 'O nome deve ter no mínimo :min caracteres.',
            'name.max' => 'O nome deve ter no máximo :max caracteres.',

            'email.required' => 'O campo e-mail é obrigatório.',
            'email.string' => 'O e-mail deve ser um texto.',
            'email.email' => 'Por favor, insira um e-mail válido.',
            'email.max' => 'O e-mail não pode exceder :max caracteres.',
            'email.unique' => 'Este e-mail já está cadastrado.',

            'telefone.string' => 'O telefone deve ser um texto.',
            'telefone.max' => 'O telefone não pode exceder :max caracteres.',
            'telefone.regex' => 'O formato do telefone é inválido. Utilize (XX) XXXX-XXXX ou (XX) XXXXX-XXXX.',
        ];
    }
}
