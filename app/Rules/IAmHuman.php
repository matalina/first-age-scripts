<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IAmHuman implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        switch(strtolower($value)) {
            case 'rj':
            case 'robert jordan':
            case 'jordan':  
                return true;
            default: 
                return false;
        }
        
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This is not an accepted answer.';
    }
}
