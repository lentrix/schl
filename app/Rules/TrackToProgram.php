<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TrackToProgram implements Rule
{
    private $program_id;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($program_id)
    {
        $this->program_id = $program_id;
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
        $program = \App\Program::find($this->program_id);

        if($value!=null && strcasecmp($program->accronym, "SHS")!=0) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Only Senior High School Program can have a track/strand.';
    }
}
