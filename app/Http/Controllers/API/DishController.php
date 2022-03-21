<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Dish;
use App\Http\Resources\Dish as DishResource;
   
class BlogController extends BaseController
{

    public function index()
    {
        $dishes = Dish::all();
        return $this->sendResponse(DishResource::collection($dishes), 'Posts fetched.');
    }

    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'category_id' => 'required',
            'image' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $dish = Dish::create($input);
        return $this->sendResponse(new DishResource($dish), 'Dish created.');
    }

   
    public function show($id)
    {
        $dish = Dish::find($id);
        if (is_null($dish)) {
            return $this->sendError('Dish does not exist.');
        }
        return $this->sendResponse(new DishResource($dish), 'Dish fetched.');
    }
    

    public function update(Request $request, Dish $dish)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'category_id' => 'required',
            'image' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $dish->name = $input['name'];
        $dish->category_id = $input['category_id'];
        $dish->image = $input['image'];
        $dish->save();
        
        return $this->sendResponse(new DishResource($dish), 'Dish updated.');
    }
   
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return $this->sendResponse([], 'Dish deleted.');
    }
}
