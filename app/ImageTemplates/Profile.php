<?php
namespace App\ImageTemplates;
use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;
class Profile implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(200);
    }
}