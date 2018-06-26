<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Post;

class PostController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::all();

//echo "<pre>";
        //print_r($posts);
        //echo $post->category->name; exit;
        return view('Post.index', compact('posts'));
    }   

    public function create()
    {
        return view('Post.post');
    }

    public function store(Request $request)
    {
        // store code
        $post =  new Post;
        $post->title = $request->get('title');
        $post->body = $request->get('body');

        $post->save();

        return redirect('posts');
    }

    public function pdf()
    {        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
        $posts = Post::all(); 
       // dd($posts);
        $pdf = PDF::loadView('Post.postspdf', compact('posts'));
        return $pdf->download('post_list.pdf');
    }

    public function excel()
    {        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
        Excel::create('Laravel Excel', function($excel) {
            $excel->sheet('Excel sheet', function($sheet) {
                //otra opción -> $posts = Product::select('name')->get();
                $posts = Post::all();                
                $sheet->fromArray($posts);
                $sheet->setOrientation('landscape');
            });
        })->export('xls');
    }

}
