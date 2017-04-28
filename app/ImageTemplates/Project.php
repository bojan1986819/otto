<?php
namespace App\ImageTemplates;
use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;
class Project implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(800,500);
    }
}