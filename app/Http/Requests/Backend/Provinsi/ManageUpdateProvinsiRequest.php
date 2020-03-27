<?php

namespace App\Http\Requests\Backend\Provinsi;

use Illuminate\Foundation\Http\FormRequest;

class ManageUpdateProvinsiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'odp' => ['required', 'numeric'],
            'odr' => ['required', 'numeric'],
            'pdp' => ['required', 'numeric'],
            'probable' => ['required', 'numeric'],
            'positif' => ['required', 'numeric'],
            'meninggal' => ['required', 'numeric'],
            'sembuh' => ['required', 'numeric'],
        ];
    }
}
