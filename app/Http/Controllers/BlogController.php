<?php

namespace App\Http\Controllers;

use App\Models\Blog;

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
}
