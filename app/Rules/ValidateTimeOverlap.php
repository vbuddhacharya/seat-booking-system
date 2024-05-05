<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\TheatreSession;

class ValidateTimeOverlap implements DataAwareRule, ValidationRule
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
        $theatreSession = TheatreSession::where('date', $this->data['date'])->where('theatre_id', $this->data['theatre_id'])->where('start_time', '<=', $this->data['end_time'])->where('end_time', '>=', $this->data['start_time'])->count();
        if ($theatreSession > 0) {
            $fail('The time range is already taken.');
        }
    }
}
