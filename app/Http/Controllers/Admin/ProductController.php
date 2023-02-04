<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Commons;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class ProductController extends Controller
{
    public function index()
    {   
        return view('admin.product.index');
    }

    public function getList(Request $request)
    {
        if($request->ajax()){
            $status = config('constants.PRODUCT_STATUS');
            $orderColumns = [
                'id',
                'name',
                'cate_id',
                'description',
                'status',
                'image',
                'created_at',
                'updated_at'
            ];
            $selectColumns = [
                'id',
                'name',
                'cate_id',
                'description',
                'image',
                'status',
                'created_at',
                'updated_at',
            ];
            $product = Product::select(
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
            if (!empty($conditions)) {
                foreach ($conditions as $field => $value) {
                    if ($field == 'from_date' || $field == 'to_date') {
                        if ($field == 'from_date' && Commons::validateDate($value, 'd/m/Y')) {
                            $createdAt = Carbon::createFromFormat('d/m/Y', $value)->getTimestamp();
                            $createdAt = date('Y-m-d 00:00:00', $createdAt);
                            $product->where($field, '>=', $createdAt);
                        }
                        if ($field == 'to_date' && Commons::validateDate($value, 'd/m/Y')) {
                            $createdAt = Carbon::createFromFormat('d/m/Y', $value)->getTimestamp();
                            $createdAt = date('Y-m-d 23:59:59', $createdAt);
                            $product->where($field, '<=', $createdAt);
                        }
                    } 
                    else if ($field =='name') {
                        $product->where('name', 'LIKE', '%' . $value . '%');
                    }
                    else {
                        $product->where($field, '=', $value);
                    }
                }
            }
            $product->where('status', '!=', $status['deleted']);
            $order = [];
            if (!empty($request->order)) {
                $order["column"] = $orderColumns[$request->order[0]["column"]];
                $order["dir"]    = $request->order[0]["dir"];
            }
            if (!empty($order)) {
                $product->orderBy($order["column"], $order["dir"]);
            }
            $datatables = Datatables::of($product)
            ->addIndexColumn()
            ->addColumn('image',function($row){

                $image = '';
                if (!empty($row->image) && File::exists(public_path('backend/assets/images/product/' . $row->image))) {
                        $image = asset('backend/assets/images/product/' . $row->image);
                }
                return $image;
                // $url=asset("backend/assets/images/product/$row->image");
                // return '<img src='.$url.' width="80" height="80" />';
            })
            ->addColumn('status', function ($row) {
                $statusTextList = config('constants.PRODUCT_STATUS_TEXT');
                $statusText = $statusTextList[$row->status];
                return $statusText;
            })
            ->addColumn('cate_id', function ($row) {
                $cateTextList = config('constants.CATEGORY_NAME_TEXT');
                $cateText = $cateTextList[$row->cate_id];
                return $cateText;
            })
            ->addColumn('action',function($row){
                $statusList = config('constants.PRODUCT_STATUS');
                $btn = '<a href="' . route('admin.product.edit', ['id' => $row->id]) . '" 
                class="edit btn btn-warning">Edit</a>';
                $btn .= '<a href="javascript:void(0)" 
                class="delete btn btn-danger" row-id="' . $row->id . '" selected-status="' . $statusList['deleted'] . '">Delete</a>';
                return $btn;
            })
            ->rawColumns(['image','cate_id','status','action'])
                    ->make(true);
            return  $datatables;
        }
    }

    
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProductInfo(Request $request)
    {
        if ($request->ajax()) {
            if ($request->has('type')) {
                if ($request->input('type') == 'status') {
                    if ($request->has('status') && $request->has('recordId')) {
                        $recordId = $request->input('recordId');
                        $info = Product::find($recordId);
                        if (!empty($info)) {
                            $statusArray = array_values(config('constants.PRODUCT_STATUS'));
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
    
    public function add()
    {   
        $statusList = config('constants.PRODUCT_STATUS');
        $statusTextList = config('constants.PRODUCT_STATUS_TEXT');
        $category = Category::all();
        return view('admin.product.add',compact('category','statusList','statusTextList'));
    }

    public function insert(Request $request)
    {
        $products = new Product();
        if($request->hasFile('image'))
        {
            $file =$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('backend/assets/images/product/',$filename);
            $products->image=$filename;
        }

        $products->cate_id = $request->input('cate_id');
        $products->name = $request->input('name');
        $products->small_description = $request->input('small_description');
        $products->description = $request->input('description');
        $products->original_price = $request->input('original_price');
        $products->selling_price = $request->input('selling_price');
        $products->quantity = $request->input('quantity');
        // $products->status = $request->input('status')== TRUE ? '1' : '2';
        $products->status = $request->input('status');
        $products->save();
     

        return redirect ('/products')->with('status','Product Added Successfully');
    }

    public function edit($id)
    {   
        $statusList = config('constants.PRODUCT_STATUS');
        $statusTextList = config('constants.PRODUCT_STATUS_TEXT');
        $category = Category::all();
        $product = Product::find($id);
        return view('admin.product.edit',compact('product','category','statusList','statusTextList'));
    }

    public function update(Request $request,$id)
    {
        $product = Product::find($id);
        if($request->hasFile('image'))
        {
            $path='backend/assets/images/product/'.$product->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file =$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('backend/assets/images/product/',$filename);
            $product->image=$filename;
        }
        $product->cate_id = $request->input('cate_id');
        $product->name = $request->input('name');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->quantity = $request->input('quantity');
        $product->status = $request->input('status')== TRUE ? '1' : '2';
        $product->update();
        return redirect ('/dashboard')->with('status','Product Updated Successfully');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if($product->image)
        {
            $path='backend/assets/images/product/'.$product->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $product->delete();
        return redirect ('/products')->with('status','Product Delete Successfully');
    }

    
    
}
