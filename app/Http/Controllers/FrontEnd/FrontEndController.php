<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Gallery;
use App\Models\Post;
use App\Repositories\PostRepository;
use App\Traits\DateHandler;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    use DateHandler;

    protected $post_repo;

    public function __construct()
    {
        $this->post_repo = app(PostRepository::class);
    }


    public function index(){
        $akademik_article = Post::whereHas('categories' , fn($q) => $q->whereIN('category_id' , [1,2]))->orderByDesc('created_at')->limit(6)->get();
        $fasilitas = Post::whereHas('categories' , fn($q) => $q->whereIN('category_id' , [3]))->orderByDesc('created_at')->limit(3)->get();
        $galery = Gallery::where('pinned',true)->orderByDesc('created_at')->limit(9)->get();
        return view('pages.home', compact('akademik_article' , 'fasilitas','galery'));
    }
    public function akademik(){
        $articles = Post::whereHas('categories', fn ($q) => $q->whereIN('category_id', [1]))->orderByDesc('created_at')->paginate(9);
        return view('pages.kegiatan-akademik' , compact('articles'));
    }
    public function prestasi(){
        $articles = Post::whereHas('categories', fn ($q) => $q->whereIN('category_id', [2]))->orderByDesc('created_at')->paginate(9);
        return view('pages.prestasi' , compact('articles'));
    }
    public function fasilitas(){
        $articles = Post::whereHas('categories', fn ($q) => $q->whereIN('category_id', [3]))->orderByDesc('created_at')->paginate(9);
        return view('pages.fasilitas' , compact('articles'));
    }
    public function pengumuman(){
        $articles = Post::whereHas('categories', fn ($q) => $q->whereIN('category_id', [4]))->orderByDesc('created_at')->paginate(9);
        return view('pages.pengumuman' , compact('articles'));
    }
    public function pendaftaran(){
        return view('pages.pendaftaran');
    }
    public function profile(){
        $company  = Company::first();
        return view('pages.profile' , compact('company'));
    }
    public function article($slug){

        $post = $this->post_repo->findSlug($slug);
        $tanggal = $this->formatTanggal($post->created_at);

        $category = $post->categories()->first();
        $another_posts = Post::whereHas('categories' , fn($q) => $q->where('category_id' , $category->id ))->whereNotIn('id' , [$post->id])->orderByDesc('created_at')->limit(4)->get();

        return view('pages.article' , compact('post' , 'tanggal' , 'another_posts'));
    }

    public function allImageGalery(){
        $gallery = Gallery::all();
        return view('pages.gallery',compact('gallery'));
    }
}
