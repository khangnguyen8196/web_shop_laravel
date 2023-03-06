<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\User;
use App\Commons;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
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
        if($request->ajax()){
            $status = config('constants.USER_STATUS');
            $orderColumns = [
                'id',
                'name',
                'email',
                'role_id',
                'status',
                'created_at',
                'updated_at'
            ];
            $selectColumns = [
                'id',
                'name',
                'email',
                'role_id',
                'status',
                'created_at',
                'updated_at',
            ];
            $user = User::select(
                $selectColumns
            );

            // Search conditions
            $conditions = [];
            if (!empty($request->columns) && is_array($request->columns)) {
                foreach ($request->columns as $column) {
                    if ($column["searchable"] == true && !empty($column["search"]["value"])) {
                        $conditions[$column["data"]] = $column["search"]["value"];
                    }
                }
            }
            
            $user->where('status', '!=', $status['deleted']);
            $order = [];
            if (!empty($request->order)) {
                $order["column"] = $orderColumns[$request->order[0]["column"]];
                $order["dir"]    = $request->order[0]["dir"];
            }
            if (!empty($order)) {
                $user->orderBy($order["column"], $order["dir"]);
            }
            $datatables = Datatables::of($user)
                ->addIndexColumn()
                // ->addColumn('image',function($row){
                //     $image = '';
                //     if (!empty($row->image) && File::exists(public_path('backend/assets/images/user/' . $row->image))) {
                //             $image = asset('backend/assets/images/user/' . $row->image);
                //     }
                //     return $image;
                // })
                ->addColumn('status', function ($row) {
                    $statusTextList = config('constants.USER_STATUS_TEXT');
                    $statusText = $statusTextList[$row->status];
                    return $statusText;
                })
                ->addColumn('role_id', function ($row) {
                    $roleTextList = config('constants.ROLE_ID_TEXT');
                    $roleText = $roleTextList[$row->role_id];
                    return $roleText;
                })
                ->addColumn('payment_date_from', function ($row) {
                    return '';
                })
                ->addColumn('payment_date_to', function ($row) {
                    return '';
                })
                ->addColumn('action',function($row){
                    $statusList = config('constants.USER_STATUS');
                    $btn = '<a href="' . route('admin.user.edit', ['id' => $row->id]) . '" 
                    class="edit btn btn-warning">Edit</a>';
                    $btn .= '<a href="javascript:void(0)" 
                    class="delete btn btn-danger" row-id="' . $row->id . '" selected-status="' . $statusList['deleted'] . '">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['payment_date_from','payment_date_to','action']);

            if( !empty($conditions['payment_date_from'])){
                $datatables->filterColumn('payment_date_from', function ($query, $keyword) {
                    if(Commons::validateDate($keyword, 'Y/m/d') ){
                        $fromDate = Carbon::parse($keyword)->format('Y-m-d');
                        $query->whereDate('created_at', '>=', $fromDate .' 00:00:00');
                    }
                });
            }
            if( !empty($conditions['payment_date_to'])){
                $datatables->filterColumn('payment_date_to', function ($query, $keyword) {
                    if(Commons::validateDate($keyword, 'Y/m/d') ){
                        $toDate = Carbon::parse($keyword)->format('Y-m-d');
                        $query->whereDate('created_at', '<=', $toDate. ' 23:59:59');
                    }
                });
            }
            if( !empty($conditions['name'])){
                $datatables->filterColumn('name', function ($query, $keyword) {
                    $query->where('name', 'LIKE', '%' . $keyword . '%');
                });
            }
            if( !empty($conditions['email'])){
                $datatables->filterColumn('email', function ($query, $keyword) {
                    $query->where('email', 'LIKE', '%' . $keyword . '%');
                });
            }
                    
            return  $datatables ->make(true);
        }
    }

     /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUserInfo(Request $request)
    {
        if ($request->ajax()) {
            if ($request->has('type')) {
                if ($request->input('type') == 'status') {
                    if ($request->has('status') && $request->has('recordId')) {
                        $recordId = $request->input('recordId');
                        $info = User::find($recordId);
                        if (!empty($info)) {
                            $statusArray = array_values(config('constants.USER_STATUS'));
                            $updatedStatus = $request->input('status');
                            if (in_array($updatedStatus, $statusArray)) {
                                $info->status = $updatedStatus;
                                $info->save();
                                return response()->json(['Code' => config('constants.CODE_SUCCESS')], 200);
                            } else {
                                return response()->json(['Code' => config('constants.CODE_HAS_ERROR')], 200);
                            }
                        }
                        return response()->json(['Code' => config('constants.CODE_HAS_ERROR')], 200);
                    }
                }
                return response()->json(['Code' => config('constants.CODE_HAS_ERROR')], 200);
            }
        }
        return response()->json(['Code' => config('constants.CODE_HAS_ERROR')], 200);
    }
    
    // public function add()
    // {   
    //     $title ='Add user';
    //     return view('admin.user.add',compact('title'));
    // }
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
