<?php

namespace App\Http\Controllers;

use App\Http\Requests\validation;
use App\Http\Requests\validation2;
use App\Mail\MyTestMail;
use App\Models\ajax;
use App\Models\city;
use App\Models\State;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    function view(Request $request)
    {
        //Simple data show

        // $data['view']=ajax::all();
        // return response()->json($data);

        //Yajra Datatable

        if($request->ajax()){
            $data=ajax::all();
            $user = auth()->user();
            return datatables()::of($data)
                    ->addIndexColumn()
                    ->addColumn('countryData',function($row){
                        return $row->country->countryname;
                    })
                    ->addColumn('stateData',function($row){
                        return $row->state->statename;
                    })
                    ->addColumn('cityData',function($row){
                        return $row->city->cityname;
                    })
                    ->addColumn('checkbox',function($row){
                        return "<input type='checkbox' class='checkBoxClass' name='ids' value='".$row['id']."'/>";
                    })
                    ->addColumn('images',function($row){
                        $btn="<img src='".$row->image ."' width='100px' height='100px'>";
                        return $btn;
                    })
                    ->addcolumn('delete',function($row) use ($user){
                        $btn='';
                        if($user->can('delete'))
                        {
                            $btn="<button class='btn btn-danger deletebtn' data-id='". $row['id'] ."'  >Delete</button>";
                        }
                        return $btn;

                    })
                    ->addcolumn('edit',function($row) use ($user){
                        $btn='';
                        if($user->can('edit'))
                        {

                            $btn="<button class='btn btn-info editbtn' data-toggle='modal' data-target='#exampleModal' data-whatever='@mdo' data-eid='".$row['id']."' >edit</button>";
                        }
                        return $btn;

                    })
                    ->addcolumn('emailsend',function($row) use  ($user){
                        $btn='';
                        if($user->can('emailsend'))
                        {

                              $btn="<button class='btn btn-success emailbtn' data-emailid='". $row['id'] ."'  >Send Email</button>";
                         }
                        return $btn;

                    })
                    ->rawColumns(['images','checkbox','delete','edit','city','emailsend'])
                    ->make(true);

        }
        return view('ajaxview');
    }
    function country(Request $request)
    {
        $stateData=State::where('country_id',$request->id)->get();
        return response()->json(['state'=>$stateData]);
    }
    function state(Request $request)
    {
        $cityData=city::where('state_id',$request->id)->get();
        return response()->json(['city'=>$cityData]);
    }
    function insert()
    {
        return view('ajaxinsert');
    }
    function insertData(validation $request)
    {

        $data=new ajax;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->password=md5($request->password);
        $data->country_id=$request->country;
        $data->state_id=$request->state;
        $data->city_id=$request->city;
        $data->gender=$request->gender;
        $data->hobby=implode(',',$request->hobby);
        $data->address=$request->address;
        if($request->file('image'))
        {
            $image=$request->file('image');
            $fileName=rand(10000,99999).'.'.$image->extension();
            $image->move('upload',$fileName);
            $data->image=$fileName;
        }
        $data->save();
        $username=$data->name;
        return response()->json(['name'=>$username]);
    }
    function edit(Request $request)
    {
        $data['view']=ajax::find($request->id);
        return response()->json($data);
    }
    function updateData(validation2 $request)
    {
        $data=DB::table('ajaxes')->where('id',$request->id)->first();
        $oldimg=$data->image;
        $name=$request->name1;
        $email=$request->email1;
        $country_id=$request->country1;
        $state_id=$request->state1;
        $city_id=$request->city1;
        $gender=$request->gender1;
        $hobby=implode(',',$request->hobby1);
        $address=$request->address1;
        if($request->file('image1'))
        {
            $image=$request->file('image1');
            $fileName=rand(10000,99999).'.'.$image->extension();
            $image->move('upload',$fileName);
            if($oldimg!='')
            {
                unlink('upload/'.$oldimg);
            }
            $image=$fileName;
        }
        if(!$request->file('image1'))
        {
            $image=$oldimg;
        }
        $update_rec=array('name'=>$name,'email'=>$email,'country_id'=>$country_id,'state_id'=>$state_id,'city_id'=>$city_id,'gender'=>$gender,'hobby'=>$hobby,'image'=>$image,'address'=>$address);
        DB::table('ajaxes')->where('id',$request->id)->update($update_rec);
        return response()->json(['name'=>$data->name]);
    }
    function deleteAll(Request $request)
    {
        $allids=$request->id;
        foreach($allids as $totalids)
        {
            $data=DB::table('ajaxes')->where('id',$totalids)->first();
            if(isset($data->image))
            {
                unlink('upload/'.$data->image);
            }
            ajax::where('id',$totalids)->delete();
        }
        return response()->json('1');
    }
    function delete(Request $request)
    {
        $data=DB::table('ajaxes')->where('id',$request->id)->first();
        if(isset($data->image))
        {
            unlink('upload/'.$data->image);
        }
        ajax::where('id',$request->id)->delete();
        return response()->json(['name'=>$data->name]);
    }
    function checkEmail(Request $request)
    {
        $data=ajax::where('email',$request->email);
        if($data->count()==1)
        {
            echo  'true';
        }
        else
        {
            echo  'false';
        }
    }
    function emailSend(Request $request)
    {
        // dd($request->id);
        $emailData=ajax::findorFail($request->id);
        $emailinfo=DB::table('ajaxes')->where('id',$request->id)->first();
        $sendemail=$emailData->email;

         $country=$emailData->country->countryname;
         $state=$emailData->state->statename;
         $city=$emailData->city->cityname;

        Mail::to($sendemail)->send(new MyTestMail($emailinfo,$country,$state,$city));
        return response()->json(['name'=>$emailData->name]);
    }
}
