<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $title ='List user';
        return view('admin.user.index', compact('title'));
    }
    public function getList(Request $request)
    {
        
        $users=[];
        if($request->ajax()){
            return Datatables::of($users)
            ->addIndexColumn()
            ->addColumn('action',function($row){
                $btn='<a href="javascript:void(0)"  
                data-id="'.$row->id.'" class="btn btn-primary btn-sm editUser"
                >Edit</a> ';
                $btn.='<a href="javascript:void(0)" 
                data-id="'.$row->id.'" class="btn btn-danger btn-sm deleteUser"
                >Delete</a> ';
                return $btn;
            })
            ->rawColumns(['action'])
                    ->make(true);
            
        }
    }

    public function store(Request $request)
    {   
        $request->validate(
        [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        User::updateOrCreate(
            ['id'=>$request->id],
            [
                'name' => $request->name,
                'email' => $request->email,
                'password'=>Hash::make($request['password'])
            ]
        );
        return response()->json(['success' =>'User added successfully']);
    }

   
    public function edit(Request $request)
    {
        // $users =User::find($id);
        $where=[
            'id'=>$request->id
        ];
        $user = User::where($where)->first();
        return response()->json($user);
    }

    public function destroy(Request $request)
    {
        //  User::find($id)->delete();
        User::where('id', $request->id)->delete();
        return response()->json(['success' =>'User delete successfully']);

    }

}
