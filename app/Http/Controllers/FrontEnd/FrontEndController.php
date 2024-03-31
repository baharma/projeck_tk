<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
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
        return view('pages.home', compact('akademik_article' , 'fasilitas'));
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
        return view('pages.profile');
    }
    public function article($slug){
        
        $post = $this->post_repo->findSlug($slug);
        $tanggal = $this->formatTanggal($post->created_at);

        $category = $post->categories()->first();
        $another_posts = Post::whereHas('categories' , fn($q) => $q->where('category_id' , $category->id ))->whereNotIn('id' , [$post->id])->orderByDesc('created_at')->limit(4)->get();

        return view('pages.article' , compact('post' , 'tanggal' , 'another_posts'));
    }
    
}