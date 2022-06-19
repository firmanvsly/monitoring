<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMonitoringRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'meteran_bulan_ini' => 'required|regex:/^[\d\s,]*$/',
            'meteran_bulan_lalu' => 'required|regex:/^[\d\s,]*$/',
        ];
    }
}
