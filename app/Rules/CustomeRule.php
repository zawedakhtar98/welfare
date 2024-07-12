<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CustomeRule implements Rule
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
    private $attribute;
    public function passes($attribute, $value)
    {
        $this->attribute = $attribute;
        //
        if(strlen($value)>10){
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The '.$this->attribute.' length should be greater than  10 character.';
    }
}
