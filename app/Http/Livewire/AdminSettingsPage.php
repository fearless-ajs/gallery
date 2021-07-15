<?php

namespace App\Http\Livewire;

use App\Models\HomePage;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminSettingsPage extends Component
{
    use WithFileUploads;

    public $domain;
    public $app_name;
    public $email;
    public $facebook;
    public $instagram;

    public $favicon;
    public $icon;
    public $old_favicon;
    public $old_icon;



    public $setting;
    public function mount()
    {
      $this->refresh();
    }
    public function updated($field)
    {
        $this->validateOnly($field, [
           'domain'    => 'nullable|max:255',
           'favicon'   => 'nullable|file|mimes:png|max:255',
           'icon'      => 'nullable|image|mimes:png|max:255',
           'app_name'  => 'required|max:255',
           'email'     => 'nullable|email|max:255',
           'facebook'  => 'nullable|max:255',
           'instagram' => 'nullable|max:255'
        ]);
    }

    public function save()
    {
        $this->validate([
            'domain'    => 'nullable|max:255',
            'app_name'  => 'required|max:255',
            'favicon'   => 'nullable|file|mimes:png|max:255',
            'icon'      => 'nullable|image|mimes:png|max:255',
            'email'     => 'nullable|email|max:255',
            'facebook'  => 'nullable|max:255',
            'instagram' => 'nullable|max:255'
        ]);


        $page =  Setting::latest()->first();
        if ($this->favicon){
            //Check if there's is an existing image
            if ($page->favicon){
                $this->deleteOldFile($page->favicon);
                $favicon= $this->storeIcoFile($this->favicon);
            }else{
                $favicon = $this->storeIcoFile($this->favicon);
            }

        }else{
            if ($page->favicon){
                $favicon = $page->favicon;
            }else{
                $favicon = '';
            }
        }


        if ($this->icon){
            //Check if there's is an existing image
            if ($page->icon){
                $this->deleteOldFile($page->icon);
                $icon= $this->storePngFile($this->icon);
            }else{
                $icon = $this->storePngFile($this->icon);
            }

        }else{
            if ($page->icon){
                $icon = $page->icon;
            }else{
                $icon = '';
            }
        }

        if (Setting::latest()->first()){
          Setting::latest()->update([
              'domain'    => $this->domain,
              'app_name'  => $this->app_name,
              'email'     => $this->email,
              'logo'      => $icon,
              'favicon'   => $favicon,
              'facebook'  => $this->facebook,
              'instagram' => $this->instagram
          ]);

          return $this->emit('alert', ['type' => 'success', 'message' => 'Settings Updated']);
        }

        Setting::create([
            'user_id'   => Auth::user()->id,
            'domain'    => $this->domain,
            'app_name'  => $this->app_name,
            'email'     => $this->email,
            'logo'      => $icon,
            'favicon'   => $favicon,
            'facebook'  => $this->facebook,
            'instagram' => $this->instagram
        ]);
        return $this->emit('alert', ['type' => 'success', 'message' => 'Settings Updated']);

    }

    public function refresh()
    {
        $setting          = Setting::latest()->first();
        $this->setting    = $setting;
        $this->domain     = $setting->domain;
        $this->app_name   = $setting->app_name;
        $this->email      = $setting->email;
        $this->facebook   = $setting->facebook;
        $this->instagram   = $setting->instagram;
        $this->old_favicon = $setting->FaviconPath;
        $this->old_icon    = $setting->IconPath;
    }


    protected function deleteOldFile($filename){
        Storage::delete('/public/'.$filename);
    }

    public function storePngFile($image)
    {
        $img = ImageManagerStatic::make($image)->encode('png');
        $original_filename = $image->getClientOriginalName();
        $name = time() .Str::random(50).'_'.$original_filename;
        Storage::disk('public')->put($name, $img);
        return $name;
    }

    public function storeIcoFile($image)
    {
        $img = ImageManagerStatic::make($image)->encode('png');
        $original_filename = $image->getClientOriginalName();
        $name = time() .Str::random(50).'_'.$original_filename;
        Storage::disk('public')->put($name, $img);
        return $name;
    }

    public function removeImage()
    {
        $this->deleteOldFile($this->homepage->image);
        HomePage::latest()->update([
            'image'   => '',
        ]);
        $this->refresh();
        return $this->emit('alert', ['type' => 'success', 'message' => 'Background image removed']);

    }


    public function render()
    {
        return view('livewire.admin.pages.admin-settings-page');
    }
}
