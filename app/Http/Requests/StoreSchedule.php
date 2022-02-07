<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSchedule extends FormRequest
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
            'bus_operator_id'=>'required',
            'from_city_id'=>'required',
            'to_city_id'=>'required',
            'level_id'=>'required',
            'bus_type_id'=>'required',
            'day_id'=>'required',
            'local_price'=>'required',
            'foreign_price'=>'required'


        ];
    }
}
