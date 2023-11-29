<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * show all blogs
     *
     * @return view
     */
    public function showList(){
        return view('blog.list');
    }
}
