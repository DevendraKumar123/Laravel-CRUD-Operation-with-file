<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use File;
use Illuminate\Http\Request;
use App\Models\Employee;

use Validator;

class EmployeeController extends Controller
{
    //show data
    public function index()
    {
        $employee = Employee::orderBy('created_at','ASC')->get();
        return view('list',[
            'employees'=> $employee]);

    }

    public function create()
    {
        return view('insert');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:50',
            'dob' => 'required',
            'email' => 'required|email|max:50',
            'mobile' => 'required|max:10',
            'pancard' => 'required|max:20',

        ];

        if ($request->image != "") {
            $rules['image'] = 'image';
        }
        $vaValidator = Validator::make($request->all(), $rules);
        if ($vaValidator->fails()) {
            return redirect()->route('insert')->withInput()->withErrors($vaValidator);
        }
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->dob = $request->dob;
        $employee->email = $request->email;
        $employee->mobile = $request->mobile;
        $employee->pancard = $request->pancard;
        $employee->save();

        if ($request->image != "") {
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;

            $image->move(public_path('upload/img'), $imageName);
            $employee->image = $imageName;
            $employee->save();

        }
        return redirect()->route('index')->with('message', 'Employee added Successfully..');

    }
    public function modify($id)
    {
        $employee = Employee::findOrFail($id);
        return view('modify',[
    'employee' => $employee]);
    }

    public function update($id,Request $request)
    {
        $employee = Employee::findOrFail($id);
        $rules = [
            'name' => 'required|max:50',
            'dob' => 'required',
            'email' => 'required|max:50',
            'mobile' => 'required|max:10',
            'pancard' => 'required|max:20',


        ];

        if ($request->image != "") {
            $rules['image'] = 'image';
        }
        $vaValidator = Validator::make($request->all(), $rules);
        if ($vaValidator->fails()) {
            return redirect()->route('modify',$employee->id)->withInput()->withErrors($vaValidator,'error');
        }
        $employee->name = $request->name;
        $employee->dob = $request->dob;
        $employee->email = $request->email;
        $employee->mobile = $request->mobile;
        $employee->pancard = $request->pancard;
        $employee->save();

        if ($request->image != "") {
            File::delete(public_path('upload/img/'.$employee->image));
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;

            $image->move(public_path('upload/img'), $imageName);
            $employee->image = $imageName;
            $employee->save();

        }
        return redirect()->route('index')->with('warning', 'Employee Updated Successfully..');
        // return redirect()->route('table')->with('warning','Data Delete successfully');

    }
    public function status($id)
    {
        $employee = Employee::find($id);
        if($employee){
            if($employee->status){
                $employee->status = 0;
            }
            else{
                $employee->status = 1;
            }
            $employee ->save();
        }
        return back();

    }
}
