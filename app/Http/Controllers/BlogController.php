<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\DB;

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

    /**
     * show blog create form
     * @return view
     */
    public function showCreate(){
        return view('blog.form');
    }

    /**
     * sotre blog
     * @return view
     */
    public function exeStore(BlogRequest $request){
        $inputs = $request->all();
        DB::beginTransaction();
        try {
            Blog::create($inputs);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            abort(500);
        }
        Session::flash('err_msg', 'Stored a blog');
        return redirect(route('blogs'));
    }
}
