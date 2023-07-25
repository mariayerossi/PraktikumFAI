<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Cookie;

class CekOldPassword implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    public $old;
    public function __construct($o)
    {
        $this->old = $o;
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
        $db2 = [];
        if(Cookie::has("login")) $db2 = json_decode(Cookie::get("login"),true);
        foreach ($db2 as $key => $value) {
            $nama2 = $value["nama"];
        }
        $db = [];
        if(Cookie::has("user")) $db = json_decode(Cookie::get("user"),true);
        $cek = -1;
        foreach ($db as $key => $value) {
            if ($value["nama"] == $nama2) {
                $cek = $value;
            }
        }
        if ($cek != -1) {
            if ($cek["pass"] == $this->old) {
                return true;
            }
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
        return 'Old password wrong!';
    }
}
