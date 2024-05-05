<?php

namespace App\Http\Requests;

use App\Rules\ValidateTimeRange;
use App\Rules\ValidateTimeOverlap;
use Illuminate\Foundation\Http\FormRequest;

class StoreTheatreSessionRequest extends FormRequest
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
            'movie_id' => ['required', 'exists:movies,id'],
            'theatre_id' => ['required', 'exists:theatres,id'],
            'date' => ['required', 'date'],
            'start_time' => ['required'],
            'end_time' => ['required', new ValidateTimeRange, new ValidateTimeOverlap],
        ];
    }
}
