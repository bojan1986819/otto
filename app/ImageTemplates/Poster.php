<?php
namespace App\ImageTemplates;
use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;
class Poster implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(640,360);
    }
}