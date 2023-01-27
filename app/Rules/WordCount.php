<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class WordCount implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    private $minExpected;
    private $attribute;

    public function __construct(int $minExpected)
    {
        $this->minExpected = $minExpected;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->attribute = $attribute;
        $trimmed = trim($value);
        $numWords = count(explode(' ',$trimmed));
    
        return $numWords >= $this->minExpected;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The '.$this->attribute.' field must have more than '.$this->minExpected.' words';        
    }
}
