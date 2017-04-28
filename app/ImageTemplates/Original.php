<?php
namespace App\ImageTemplates;
use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;
class Original implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image;
    }
}