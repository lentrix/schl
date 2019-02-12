<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidClassEnrol implements Rule
{
    private $enrol;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($enrol_id)
    {
        $this->enrol = \App\Enrol::find($enrol_id);
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
        //
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
