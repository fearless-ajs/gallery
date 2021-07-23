<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Models\Album;
use App\Models\Picture;
use App\Models\Setting;
use App\Models\SubAlbum;
use App\Models\SubPicture;
use App\Models\SubSubAlbum;
use App\Models\SubSubPicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;

class ImageController extends Controller
{
    public $settings;

    public function __construct()
    {
        $this->settings = Setting::latest()->first();
        Session::put('settings', $this->settings);
    }

    public function savePicture(ImageRequest $request, Album $album)
    {

        if ($request->hasFile('images')){
            foreach ($request->file('images') as $pic){
                $original_image     = $this->storeFile($pic);
                // create a compressed version of the image
                $compressed_version = $this->compressAndStoreFile($pic, 2);

                Picture::create([
                    'album_id'        => $album->id,
                    'caption'         => $request->caption,
                    'original_image'  => $original_image,
                    'optimized_image' => $compressed_version
                ]);
            }
        }

        return redirect()->back()->with('message', 'Pictures uploaded successfully');
    }

    public function saveSubPicture(ImageRequest $request, $album)
    {
        if ($request->hasFile('images')){
            foreach ($request->file('images') as $pic){
                $original_image     = $this->storeFile($pic);
                // create a compressed version of the image
                $compressed_version = $this->compressAndStoreFile($pic, 2);

                SubPicture::create([
                    'sub_album_id'    => $album,
                    'caption'         => $request->caption,
                    'original_image'  => $original_image,
                    'optimized_image' => $compressed_version
                ]);
            }
        }

        return redirect()->back()->with('message', 'Pictures uploaded successfully');
    }

    public function saveSubSubPicture(ImageRequest $request, $album)
    {

        if ($request->hasFile('images')){
            foreach ($request->file('images') as $pic){
                $original_image     = $this->storeFile($pic);
                // create a compressed version of the image
                $compressed_version = $this->compressAndStoreFile($pic, 2);

                SubSubPicture::create([
                    'sub_sub_album_id'  => $album,
                    'caption'           => $request->caption,
                    'original_image'    => $original_image,
                    'optimized_image'   => $compressed_version
                ]);
            }
        }

        return redirect()->back()->with('message', 'Pictures uploaded successfully');
    }

    public function storeFile($file)
    {
        $img = ImageManagerStatic::make($file)->encode('jpg');
        $original_filename = $file->getClientOriginalName();
        $name = time() .Str::random(50).'_'.$original_filename;
        Storage::disk('public')->put($name, $img);
        return $name;
    }

    public function compressAndStoreFile($file, $quality)
    {
        $img = ImageManagerStatic::make($file)->encode('jpg', $quality);
        $original_filename = $file->getClientOriginalName();
        $name = time() .Str::random(50).'_'.$original_filename;
        Storage::disk('thumbnail')->put($name, $img);
        return $name;
    }
}
