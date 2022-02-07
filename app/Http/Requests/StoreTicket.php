<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicket extends FormRequest
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
            "from_city_id"=>'required',
            "to_city_id"=>'required',
            "day"=>'required'

        ];
    }

    public function messages(){
        return [
            "from_city_id.required"=>'From City Name is required',
            "to_city_id.required"=>'To City Name is required',
            "day.required"=>'Date is required'


        ];
    }

}
