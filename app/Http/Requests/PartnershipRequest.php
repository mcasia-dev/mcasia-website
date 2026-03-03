<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnershipRequest extends FormRequest
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
            'name'             => 'required|string|max:255',
            'blk_no'           => 'nullable|string|max:255',
            'street'           => 'required|string|max:255',
            'barangay'         => 'required|string|max:255',
            'subdivision'      => 'nullable|string|max:255',
            'country'          => 'required|string|max:255',
            'zip_code'         => 'required|string|max:20',
            'mobile_number'    => ['required', 'regex:/^(\+63|0)9\d{9}$/'],
            'landline_number'  => 'nullable|string|max:50',
            'business_name'    => 'required|string|max:255',
            'business_address' => 'required|string|max:255',
            'business_number'  => 'nullable|string|max:50',
            'business_website' => 'nullable|string|max:255',
            'business_email'   => 'required|email|max:255',
        ];
    }
}
