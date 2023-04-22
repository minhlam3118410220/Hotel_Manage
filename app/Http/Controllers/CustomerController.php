<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        $data=Customer::all();
        return view('customer.index',['data'=>$data]);
    }

    public function create()
    {
        return view('customer.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'full_name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'mobile'=>'required',
        ]);

        if($request->hasFile('photo')){
            $imgPath=$request->file('photo')->store('public/imgs');
        }else{
            $imgPath=null;
        }
        
        $data=new Customer;
        $data->full_name=$request->full_name;
        $data->email=$request->email;
        $data->password=sha1($request->password);
        $data->mobile=$request->mobile;
        $data->photo=$imgPath;
        $data->save();

        $ref=$request->ref;
        if($ref=='front'){
            return redirect('register')->with('success','Register successful.');
        }

        return redirect('admin/customer/create')->with('success','Data has been added.');
    }


    public function show($id)
    {
        $data=Customer::find($id);
        return view('customer.show',['data'=>$data]);
    }

 
    public function edit($id)
    {   
        $data=Customer::find($id);
        return view('customer.edit',['data'=>$data]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name'=>'required',
            'email'=>'required|email',
            'mobile'=>'required',
        ]);

        if($request->hasFile('photo')){
            $imgPath=$request->file('photo')->store('public/imgs');
        }else{
            $imgPath=$request->prev_photo;
        }
        
        $data=Customer::find($id);
        $data->full_name=$request->full_name;
        $data->email=$request->email;
        $data->mobile=$request->mobile;
        $data->photo=$imgPath;
        $data->save();

        return redirect('admin/customer/'.$id.'/edit')->with('success','Data has been updated.');
    }

    public function destroy($id)
    {
       Customer::where('id',$id)->delete();
       return redirect('admin/customer')->with('success','Data has been deleted.');
    }

    // Register
    function register(){
        return view('register');
    }

    // Login
    function login(){
        return view('frontlogin');
    }

    // Check Login
    function customer_login(Request $request){
        $email=$request->email;
        $pwd=sha1($request->password);

        $detail=Customer::where(['email'=>$email,'password'=>$pwd])->count();

        if($detail>0){
            $detail=Customer::where(['email'=>$email,'password'=>$pwd])->get();
          
            session(['customerlogin'=>true,'data'=>$detail]);
            return redirect('/');
        }else{
            return redirect('login')->with('error','Invalid Email/Password!!');
        }
    }

    // Logout
    function logout(){
        session()->forget(['customerlogin','data']);
        return redirect('login');
    }
}
