<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Cookie;

class UsernameTerdaftar implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $user;
    public function __construct($value)
    {
        $this->user = $value;
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
        $db = [];
        if(Cookie::has("user")) $db = json_decode(Cookie::get("user"),true);
        $cek = -1;
        foreach ($db as $key => $value) {
            if ($value["username"] == $this->user) {
                $cek = $value;
            }
        }
        if ($cek != -1) {
            return true;
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
        return 'Account does not exist!';
    }
}
