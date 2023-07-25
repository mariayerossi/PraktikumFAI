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
    public $add;
    public function __construct($tanggal)
    {
        $this->add = $tanggal;
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
        $potong = explode(",", $this->add);
        // if ($potong.length > 0 ) {
        //     # code...
        // }
        $tahun = explode("/",$potong[1]);
        if (2022 - intval($tahun[2]) >= 17) {
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
        return 'Umur minimal usia harus 17 tahun';
    }
}
