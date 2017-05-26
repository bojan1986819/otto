<?php
namespace App\ImageTemplates;
use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;
class Social implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->resize(35,35);
    }
}