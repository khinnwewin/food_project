<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\DishController;
use App\Models\Dish;
use App\Models\Category;
use App\Http\Requests\DishRequest;
class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $dishes=Dish::all();
        return view('kitchen.dish.index',compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('kitchen.dish.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DishRequest $request)
     {
        $dish = new Dish();
        $dish->name =$request->name;
        $dish->category_id =$request->category_id;
        $imageName = date('YmdHis').".". request()->dish_image->getClientOriginalExtension(); 
        $request->dish_image->move(public_path('images'), $imageName);
        $dish->image =$imageName;
        $dish->save();
        return redirect('dish')->with('message','Dish Created Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        $categories=Category::all();
        return view('kitchen.dish.edit',compact('dish','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Dish $dish)
    {
        request()->validate([
            'name' => 'required',
            'category_id' => 'required',
        ]);
        $dish->name =$request->name;
        $dish->category_id =$request->category_id;

        if($request->dish_image){
            $imageName = date('YmdHis').".". request()->dish_image->getClientOriginalExtension(); 
            $request->dish_image->move(public_path('images'), $imageName); 
            $dish->image =$imageName;
        }
        $dish->save();
        return redirect('dish')->with('message','Dish Updated Succesfully');
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dish::findOrFail($id)->delete();
        return redirect('dish')->with('message','Dish Deleted Succesfully');
    }
}
