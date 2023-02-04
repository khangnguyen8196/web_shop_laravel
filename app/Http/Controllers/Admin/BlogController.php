<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Yajra\Datatables\Datatables;

class BlogController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        $data = Blog::get();
        if($request->ajax())
        {
            $allData = Datatables::of( $data)
            ->addIndexColumn()
            ->addColumn('action', function($row){

                   $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBlog">Edit</a>';

                   $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBlog">Delete</a>';

                    return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
            return $allData;

        }
        return view('admin.news.blog');
    }
}
