<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\EditArticleRequest;
use App\Models\Article;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;

class ArticleController extends Controller
{
    public $settings;

    public function __construct()
    {
        $this->settings = Setting::latest()->first();
        Session::put('settings', $this->settings);
    }

    public function newArticlePage()
    {
        return view('admin.new_article_page', ['settings' => $this->settings]);
    }

    public function articleListPage()
    {
        return view('admin.article_list_page', ['settings' => $this->settings]);
    }

    public function editArticlePage($id)
    {
        return view('admin.edit_article_page', ['settings' => $this->settings, 'id' => $id]);
    }


    public function save(ArticleRequest $request)
    {
        $image_1 = $this->storeFile($request->image_1);

        Article::create([
            'title'     => $request->title,
            'category'  => $request->category,
            'author'    => $request->author,
            'image_1'   => $image_1,
            'content_1' => $request->content_1,
        ]);

        return redirect()->back()->with('message', 'Article uploaded successfully');

    }

    public function update(EditArticleRequest $request, Article $article)
    {
        if ($request->image_1){
            $this->deleteOldFile($article->image_1);
            $image_1 = $this->storeFile($request->image_1);
        }else{
            $image_1 = $article->image_1;
        }

        Article::where('id', $article->id)->update([
            'title'     => $request->title,
            'category'  => $request->category,
            'author'    => $request->author,
            'image_1'   => $image_1,
            'content_1' => $request->content_1,
        ]);

        return redirect()->back()->with('message', 'Article updated successfully');
    }

    public function storeFile($file)
    {
        $img = ImageManagerStatic::make($file)->encode('jpg');
        $original_filename = $file->getClientOriginalName();
        $name = time() .Str::random(50).'_'.$original_filename;
        Storage::disk('public')->put($name, $img);
        return $name;
    }

    protected function deleteOldFile($filename)
    {
        Storage::delete('/public/'.$filename);
    }
}
