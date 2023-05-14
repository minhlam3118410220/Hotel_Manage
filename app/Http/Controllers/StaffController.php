<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Staff;
use App\Models\StaffPayment;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $data=Staff::all();
        return view('staff.index',['data'=>$data]);
    }

    public function create()
    {
        $departs=Department::all();
        return view('staff.create',['departs'=>$departs]);
    }

    public function store(Request $request)
    {
        $data= new Staff();

 
        $fileName = $request->file('photo')->getClientOriginalName();
        $request->file('photo')->move(public_path('img'), $fileName);
        $imgPath = 'img/' . basename($fileName); 

        $data->full_name=$request->full_name;
        $data->department_id=$request->department_id;
        $data->photo=$imgPath;
        $data->bio=$request->bio;
        $data->salary_type=$request->salary_type;
        $data->salary_amt=$request->salary_amt;
        $data->save();

        return redirect('admin/staff/create')->with('success','Data has been added.');
    }

    public function show($id)
    {
        $data=Staff::find($id);
        return view('staff.show',['data'=>$data]);
    }

    public function edit($id)
    {   
        $departs=Department::all();
        $data=Staff::find($id);
        return view('staff.edit',['data'=>$data,'departs'=>$departs]);
    }

    public function update(Request $request, $id)
    {
        $data=Staff::find($id);

        if($request->hasFile('photo')){

            $fileName = $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('img'), $fileName);
            $imgPath = 'img/' . basename($fileName); 
        }else{
            $imgPath=$request->prev_photo;
        }
        
        $data->full_name=$request->full_name;
        $data->department_id=$request->department_id;
        $data->photo=$imgPath;
        $data->bio=$request->bio;
        $data->salary_type=$request->salary_type;
        $data->salary_amt=$request->salary_amt;
        $data->save();

        return redirect('admin/staff/'.$id.'/edit')->with('success','Data has been updated.');
    }

    public function destroy($id)
    {
       Staff::where('id',$id)->delete();
       return redirect('admin/staff')->with('success','Data has been deleted.');
    }

    // All Payments
    public function all_payments(Request $request,$staff_id){
        $data = StaffPayment::where('staff_id',$staff_id)->get();
        $staff = Staff::find($staff_id);
        return view('staffpayment.index',['staff_id'=>$staff_id,'data'=>$data,'staff'=>$staff]);
    }

    // Add Payment
    public function add_payment($staff_id){
        return view('staffpayment.create',['staff_id'=>$staff_id]);
    }


    public function save_payment(Request $request,$staff_id){

        $data=new StaffPayment();
        $data->staff_id=$staff_id;
        $data->amount=$request->amount;
        $data->payment_date=$request->amount_date;
        $data->save();

        return redirect('admin/staff/payment/'.$staff_id.'/add')->with('success','Data has been added.');
    }

    public function delete_payment($id,$staff_id)
    {
       StaffPayment::where('id',$id)->delete();
       return redirect('admin/staff/payments/'.$staff_id)->with('success','Data has been deleted.');
    }

}
