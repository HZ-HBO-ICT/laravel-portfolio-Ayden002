<?php
namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
    public function show($slug)
    {
        // $post =  Post::where('slug', $slug)->firstOrFail()
        // $posts = [
        //     'my-first-post'=>'Hello,this is  my first blog',
        //     'my-second-post'=>'Now i am adwwdandaoiwd',

        // ];
        // if(!array_key_exists($post,$posts)){
        //     abort(404,'Sorry');
        // }
        return view('post', [
            'post' => Post::where('slug', $slug)->firstOrFail()
        ]);
    }
}
