<?php

namespace App\Http\Requests\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Cambia esto si necesitas autorización adicional
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
            'phone' => 'nullable|numeric',
            'address.street' => 'nullable|string',
            'address.city' => 'nullable|string',
            'address.state' => 'nullable|string',
            'address.zip' => 'nullable|numeric',
            'date_of_birth' => 'nullable|date_format:d-m-Y',
            'profile_picture' => 'nullable|string|url',
            'bio' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección de correo válida.',
            'email.unique' => 'El correo electrónico ya está en uso.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'phone.nullable' => 'El campo teléfono es opcional.',
            'phone.numeric' => 'El campo telefono debe ser solo numérico',
            'address.street.nullable' => 'El campo calle es opcional.',
            'address.city.nullable' => 'El campo ciudad es opcional.',
            'address.state.nullable' => 'El campo estado es opcional.',
            'address.zip.nullable' => 'El campo código postal es opcional.',
            'date_of_birth.nullable' => 'La fecha de nacimiento es opcional.',
            'date_of_birth.date_format' => 'La fecha de nacimiento debe ser una fecha válida escrita con guiones.',
            'profile_picture.nullable' => 'El campo imagen de perfil es opcional.',
            'profile_picture.url' => 'La imagen de perfil debe ser una URL válida.',
            'bio.nullable' => 'El campo biografía es opcional.',
        ];
    }

    /**
     * Get the validated data from the request.
     *
     * @return array
     */
    public function validated(): array
    {
        return $this->validator->validated();
    }
}
