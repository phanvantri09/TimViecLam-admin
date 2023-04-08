<?php

namespace App\Http\Requests\Job;

use Illuminate\Foundation\Http\FormRequest;

class CreateJob extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
            'id_category_job' => 'required',
            'amount' => 'required',
            'price_start' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'price_end' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Không để trống',
            'content.required' => 'Không để trống',
            'id_category_job.required' => 'Không để trống',
            'amount.required' => 'Không để trống',
            'price_start.required' => 'Không để trống',
            'time_start.required' => 'Không để trống',
            'time_end.required' => 'Không để trống',
            'price_end.required' => 'Không để trống',
        ];
    }
}
