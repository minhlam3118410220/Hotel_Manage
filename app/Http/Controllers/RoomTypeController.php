<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use App\Models\RoomTypeImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomTypeController extends Controller
{

    public function index()
    {
        $data = RoomType::all();
        return view('roomtype.index',['data'=>$data]);
    }


    public function create()
    {
        return view('roomtype.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'price'=>'required',
            'detail'=>'required',
        ]);

        $data=new RoomType();
        $data->title=$request->title;
        $data->price=$request->price;
        $data->detail=$request->detail;
        $data->save();

            foreach($request->file('imgs') as $img){
                $imgPath=$img->store('public/imgs');
                $imgData= new RoomTypeImage();
                $imgData->room_type_id = $data->id;
                $imgData->img_src = $imgPath;
                $imgData->img_alt = $request->title;
                $imgData->save();
            }

        return redirect('admin/roomtype/create')->with('success','Data has been added.');
        
    }

  
    public function show($id)
    {
        $data=RoomType::find($id);
        return view('roomtype.show',['data'=>$data]);
    }

   
    public function edit($id)
    {
        $data=RoomType::find($id);
        return view('roomtype.edit',['data'=>$data]);
    }

  
    public function update(Request $request, $id)
    {
        $data=RoomType::find($id);
        $data->title=$request->title;
        $data->price=$request->price;
        $data->detail=$request->detail;
        $data->save();
    
        if($request->hasFile('imgs')){
            foreach($request->file('imgs') as $img){
                $imgPath=$img->store('public/imgs');
                $imgData=new RoomTypeImage();
                $imgData->room_type_id=$data->id;
                $imgData->img_src=$imgPath;
                $imgData->img_alt=$request->title;
                $imgData->save();
            }
        }

        return redirect('admin/roomtype/'.$id.'/edit')->with('success','Data has been updated.');
    }

  
    public function destroy($id)
    {
        RoomType::where('id',$id)->delete();
        return redirect('admin/roomtype')->with('success','Data has been deleted.');
    }

    public function destroy_image($img_id)
    {
        $data=RoomTypeImage::where('id',$img_id)->first();

        Storage::delete($data->img_src);
        RoomTypeImage::where('id',$img_id)->delete();

        return response()->json(['bool'=>true]);
    }
}
