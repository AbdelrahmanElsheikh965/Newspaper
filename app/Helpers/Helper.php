<?php

namespace App\Helpers;
use Illuminate\Support\Facades\File;

class Helper
{

  public static function saveImage($image, $path = '/images')  // 'app/public/images' => is the default path.
  {
      if (! is_null($image) )
      {
          if (!File::isDirectory(public_path($path)))
          {
              File::makeDirectory(public_path($path), 0777, true);
              $image->move(public_path($path), $image->getClientOriginalName());
          }else
          {
              $image->move(public_path($path), $image->getClientOriginalName());
          }
      }
  }

}