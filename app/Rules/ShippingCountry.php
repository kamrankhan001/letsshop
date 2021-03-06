<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ShippingCountry implements Rule
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
        $countries = ['pakistan', 'india', 'china', 'indonesia'];

        if (in_array($value, $countries)) {
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
        return "Sorry we can't shipping there right now";
    }
}
