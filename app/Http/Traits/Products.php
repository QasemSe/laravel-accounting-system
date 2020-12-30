<?php

namespace App\Http\Traits;

trait Products {

    public function getCategoryName()
    {
        if ( !isset( $this->category->name ))
        {
            return __("Not Defined");
        }

        return $this->category->name;
    }

}
