<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransferRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'bank' => 'required|string',
            'nama' => 'required|string',
            'nomor_rekening' => 'required|string',
            'jumlah' => 'required|numeric',
            'nama_penerima' => 'required|string',
            'nomor_rekening_penerima' => 'required|string',
        ];
    }
}
