<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportNilai extends FormRequest
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
        return [
            'data' => 'required|array',
            'data.*.nomor' => 'required|numeric',
            'data.*.kuliah' => 'required',
            'data.*.mahasiswa' => 'required|numeric',
            'data.*.quis1' => 'required|numeric',
            'data.*.quis2' => 'required|numeric',
            'data.*.tugas' => 'required|numeric',
            'data.*.ujian' => 'required|numeric',
            'data.*.na' => 'required|numeric',
            'data.*.her' => 'required|numeric',
            'data.*.nh' => 'required|string',
            'data.*.keterangan' => 'required|string',
            'data.*.nhu' => 'required|string',
            'data.*.nsp' => 'required|numeric',
            'data.*.kuis' => 'required|numeric',
            'data.*.praktikum' => 'required|numeric'

        ];
    }
}
