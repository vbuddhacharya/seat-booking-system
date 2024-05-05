<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\TheatreSession;
use App\Services\TheatreSessionService;

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
        $service = new TheatreSessionService();
        $isValidRange = $service->isValidRange($this->data);
        if (!$isValidRange) {
            $fail('The time range is already taken.');
        }
    }
}
