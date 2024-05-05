<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Carbon\Carbon;
use App\Models\TheatreSession;


class ValidateTime implements DataAwareRule, ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    protected $data = [];

    public function setData(array $data): static
    {
        $this->data = $data;

        return $this;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $startTime = Carbon::parse($this->data['start_time']);
        $endTime = Carbon::parse($value);
        if ($startTime->diffInMinutes($endTime) < 0) {
            $fail('Timing is inaccurate') ;
        }

        // $theatreSession = TheatreSession::where('date', $this->data['date'])->andWhere('movie_id',$this->data['movie_id'])->get();

    }
}
