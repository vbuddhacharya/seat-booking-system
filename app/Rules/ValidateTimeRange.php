<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Carbon\Carbon;
use App\Models\TheatreSession;
use App\Services\TheatreSessionService;

class ValidateTimeRange implements DataAwareRule, ValidationRule
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
        $service = new TheatreSessionService();
        $isCorrectTime = $service->isCorrectTime($this->data['start_time'], $this->data['end_time']);
        if (!$isCorrectTime) {
            $fail('Timing is inaccurate');
        }
    }
}
