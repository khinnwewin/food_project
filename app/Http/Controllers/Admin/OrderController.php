<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Order;
use App\Models\Table;
class OrderController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $dishes=Dish::orderby('id','desc')->get();
        $tables=Table::orderby('id','desc')->get();
        $rawstatus=config('res.order_status');
        $status=array_flip($rawstatus);
        $orders=Order::where('status',4)->get();
        return view('order.order_form',compact('dishes','tables','status','orders'));
    }

    public function submit(Request $request)
    {
        $data = array_filter($request->except('_token','table'));
        // $request->table = int($request->table);
        $orderId = rand();
        foreach($data as $key =>$value){
           if($value >1){
            for ($i=0; $i <$value; $i++){
                $this->saveOrder($orderId,$key,$request);
            }
           }else{
               $this->saveOrder($orderId,$key,$request);
           }
        }
        return redirect('/')->with('message','Order Submitted');
    }
    public function saveOrder($orderId,$dish_id,$request)
    {
        $order =new Order();
        $order->order_id =$orderId;
        $order->dish_id =$dish_id;
        $order->table_id =$request->table;
        $order->status =config('res.order_status.new');
        $order->save();
    }
     public function serve(Order $order)
    {
        $order->status=config('res.order_status.done');
        $order->save();
        return redirect('/')->with('message','Order serve to customer');
    }
     
}
