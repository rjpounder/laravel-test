<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrder extends FormRequest
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
            'contact_id' => 'required|exists:App\Models\Contact,id',
            'orderitem.*.name' => 'required',
            'orderitem.*.price' => 'required|regex:/^\d+(\.\d{1,2})?$/'
        ];
    }
}
