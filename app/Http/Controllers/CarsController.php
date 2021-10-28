<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function index(){
        
        $cars = Car::latest('updated_at')->paginate(4);
        
        return view('cars.index', ['cars'=>$cars]);
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            '이미지' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            '제조회사' => 'required',
            '자동차명' => 'required',
            '제조년도' => 'required',
            '가격' => 'required',
            '차종' => 'required',
            '외형' => 'required',
        ]);

        //dd($request);

        $filename = null;
        if($request->hasFile('이미지')){
            $filename = time().'_'.$request->file('이미지')->getClientOriginalName();
            $path = $request->file('이미지')->storeAs('public/images',$filename);
        }
        Car::create([
            '이미지' => $filename,
            '제조회사' => $request->제조회사,
            '자동차명' => $request->자동차명,
            '제조년도' => $request->제조년도,
            '가격' => $request->가격,
            '차종' => $request->차종,
            '외형' => $request->외형,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('cars.index');
    }

    public function show($id)
    {
        $car = Car::find($id);
        $comments = Comment::where('car_id', '=', $id)->latest('updated_at')->paginate(5);
        return view('cars.show', ["car"=>$car, "comments"=>$comments]);
    }

    public function edit($id)
    {
        $car = Car::find($id);
        
        return view('cars.edit', ["car"=>$car]);
    }

    public function update(Request $request, $id)
    {
        $car = Car::find($id);

        if($car->이미지 == null){
            $request->validate([
                '이미지' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            ]);
        };

        $request->validate([
            '제조회사' => 'required',
            '자동차명' => 'required',
            '제조년도' => 'required',
            '가격' => 'required',
            '차종' => 'required',
            '외형' => 'required'
        ]);

        
        if($request->hasFile('이미지')){
            if($car->이미지){
                Storage::delete(['public/images/'.$car->이미지]);
            }
            $filename = time().'_'.$request->file('이미지')->getClientOriginalName();
            $path = $request->file('이미지')->storeAs('public/images',$filename);
            $car->이미지 = $filename;
        }
        $car->제조회사 =  $request->제조회사;
        $car->자동차명 =  $request->자동차명;
        $car->제조년도 =  $request->제조년도;
        $car->가격 =  $request->가격;
        $car->차종 =  $request->차종;
        $car->외형 =  $request->외형;
        $car->save();

        return redirect()->route('cars.show', ['id'=>$id]);
    }

    public function imageDelete($id){

        $car = Car::find($id);
        Storage::delete('public/images'.$car->이미지);
        $car->이미지 = null;
        $car->save();

        return redirect()->route('cars.edit', ["id"=>$id]);
    }

    public function destory($id){
        $car = Car::find($id);
        if($car->image){
            Storage::delete('public/images/'.$car->image);
        }
        $car->delete();

        return redirect()->route('cars.index');
    }


}

