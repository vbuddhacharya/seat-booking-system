<?php

namespace App\Services;

class MovieService
{
    public function getPosterName($image): string
    {
        if ($image) {

            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);

            return $imageName;
        }

        return "noimg.png";
    }
}
