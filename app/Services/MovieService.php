<?php

namespace App\Services;

class MovieService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function getPosterName($image){
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->storeAs('public/images', $imageName);
        return $imageName;
    }
}
