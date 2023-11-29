<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    /**
     * show all blogs
     *
     * @return view
     */
    public function showList(){
        $blogs = Blog::all();

        return view('blog.list', ['blogs' => $blogs]);
    }

    /**
     * show blog detail
     * @param int $id
     * @return view
     */
    public function showDetail($id){
        $blog = Blog::find($id);

        if (is_null($blog)) {
            Session::flash('err_msg', 'No data found');
            return redirect(route('blogs'));
        }

        return view('blog.detail', ['blog' => $blog]);
    }
}
