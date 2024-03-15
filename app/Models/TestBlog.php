<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

use function PHPUnit\Framework\fileExists;

class Blog
{
    public $title;
    public $slug;
    public $body;
    public $created_at;

    public function __construct($title, $slug, $body, $created_at) {
        $this->title = $title;
        $this->slug = $slug;
        $this->body = $body;
        $this->created_at = $created_at;

    }
    public static function all()
    {
        $files = collect(File::files(resource_path('blogs'))); //obj
        $blogs = $files->map(function($file) { //collection
            $yamlObj= YamlFrontMatter::parse($file->getContents()); //string
            $b = new Blog($yamlObj->title, $yamlObj->slug, $yamlObj->body(), $yamlObj->created_at);
            return $b;
        });
        return $blogs->sortByDesc('created_at');
    }
    
    public static function find($slug) {
        return static::all()->firstWhere('slug','=', $slug);
    }

    public static function findOrFail($slug)
    {
        if(!$blogObj = static::find($slug)) {
            abort(404);
        }
        return $blogObj;

    }
}
