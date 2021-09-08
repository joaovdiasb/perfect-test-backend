<?php

namespace App\Http\Requests\Dashboard;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Fluent;

class FilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $dates = explode(' - ', $this->sale_date_range);

        if ($this->sale_date_range)
            $this->merge([
                'initial_date' => Carbon::createFromFormat('d/m/Y', $dates[0])->format('Y-m-d'),
                'final_date'   => Carbon::createFromFormat('d/m/Y', $dates[1])->format('Y-m-d')
            ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'client'          => 'nullable|integer|exists:clients,id',
            'sale_date_range' => 'nullable|string',
            'initial_date'    => 'nullable|date|date_format:Y-m-d',
            'final_date'      => 'nullable|date|date_format:Y-m-d'
        ];
    }

    public function validated(): Fluent
    {        
        return new Fluent(parent::validated());
    }
}
