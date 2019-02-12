<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class LevelToProgram implements Rule
{
    private $program;
    private $level_id;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($program_id)
    {
        $this->program = \App\Program::find($program_id);
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
        $level = \App\Level::find($value);

        if( strcasecmp($level->category,$this->program->accronym)==0 ) {
            return true;
        }else {
            return strcasecmp($level->category,'college')==0;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The level is not compatible with the program.';
    }
}
