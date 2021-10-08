<?php

namespace App\Http\Controllers\SuqeStore;

use App\Http\Controllers\Controller;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Http\Traits\ResponsesTrait;

class ProductController extends Controller
{
    use ResponsesTrait;

    public function  __construct()
    {
        $this->middleware(['global:api'])
        ->except([
            'index',
            'select_fields'
        ]);
    }//end of constructor

    //this function to returen all products
    public function index(Request $request)
    {
        if (request()->all()){
            $obj=Products::whereHas('catigory',function($q) use($request){
                return $q->where('PRDName','like','%'.$request->search.'%');
            })->latest()->take(15)->get();//end of whereHas
        }else{
            $objj=Products::latest()->paginate(5);
            $obj=(array)$objj;
        }
        return $this->successData($obj);
    }//end of product

    //this function to create product
    public function create()
    {
        $user=Auth::guard('api')->user();
        // you can use laratrest library for permissions but i will use permissions only for this user

        if($user && ($user->username == 'ammar')){
            $vldat=Validator::make(request()->all(),[
                //in another time i will create validate for product
                'PRDName'=>['required','string'],
                'PRDDescribtion'=>['string'],
                'PRDPrice'=>['required','regex:/^\d+(\.\d{1,2})?$/'],
                'PRDDiscount'=>['regex:/^\d+(\.\d{1,2})?$/'],
                'image'=>['mime:jpg,jpeg,png'],
                'catigory_id'=>['required','numeric']

            ]);
            if($vldat->fails()){
                return response()->json([
                    'msg'=>$vldat->errors()->first(),
                    'state'=>'202',
                ]);
            };//end of validation
            //return response()->json(request()->all());
            $prod=Products::create([
                'PRDName'=>request()->PRDName,
                'PRDDescribtion'=>request()->PRDDescribtion,
                'PRDPrice'=>request()->PRDPrice,
                'PRDDiscount'=>request()->PRDDiscount,
                'catigory_id'=>request()->catigory_id
            ]);

            return $this->successData($prod);;
        }//end of if this function check the user is auth and user named ammar
        else{
            return $this->errAuthenticate;;
        }

    }//end of create


    public function select_fields(){

        $product=DB::table('products')
        ->select(DB::raw('sum(id) as sum_product,id'))
        ->groupBy('id')
        ->get();
        return response()->json($product);
    }//end of select_fields


    // public function store(Request $request)
    // {
    //     //
    // }



    // public function show(Products $products)
    // {
    //     //
    // }


    //this function to edit product
    public function edit(Products $products)
    {
        //
    }//end of edit


    //this function to update product
    public function update(Request $request, Products $products)
    {
        //
    }//end of update

    //this function to delete product
    public function destroy(Products $products)
    {
        //
    }//end of deltel function
}//end of ProductController
