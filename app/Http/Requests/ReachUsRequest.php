<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReachUsRequest extends FormRequest
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
            'first_name'  => ['required', 'string', 'max:100'],
            'middle_name' => ['nullable', 'string', 'max:100'],
            'last_name'   => ['required', 'string', 'max:100'],
            'email'       => ['required', 'email', 'max:255'],
            'phone'       => ['required', 'regex:/^(\+63|0)9\d{9}$/'],
            'message'     => ['required', 'string', 'max:2000'],
        ];
    }
}
