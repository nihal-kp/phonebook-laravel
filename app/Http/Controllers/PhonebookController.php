<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Phonebook;
use Session;
use Illuminate\Support\Facades\DB; 

class PhonebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId=Session::get('user')['id'];
        $phonebook = phonebook::where('user_id',$userId)
         ->get();
        // $phonebook = Phonebook::all();
        return view('home',['phonebook'=>$phonebook]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $userId=Session::get('user')['id'];
        {
            $this->validate($req, [
                'name' => 'required|min:4',
                'email' => 'required|min:5',
                'phone' => 'required|numeric'
            ]);
            $customer = new Phonebook;
            $customer->name = $req->name;
            $customer->email = $req->email;
            $customer->phone = $req->phone;                   // Hash is used to encrypt password. To decrypt password, '$req->password;'
            $customer->user_id = $req->user_id;
            $customer->save();
            return '<script>
                        alert("New contact added!"); 
                        window.location.href="/home";
                    </script>';
        }  
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
    public function edit($id)
    {
        $customer = Phonebook::find($id);
        return view('edit',['customer'=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        {
            $this->validate($req, [
                'name' => 'required|min:4',
                'email' => 'required|min:5',
                'phone' => 'required|numeric'
            ]);
            $customer = Phonebook::find($id);
            $customer->name = $req->name;
            $customer->email = $req->email;
            $customer->phone = $req->phone;                   // Hash is used to encrypt password. To decrypt password, '$req->password;'
            $customer->user_id = $req->user_id;
            $customer->save();
            return '<script>
                    alert("Details updated!"); 
                    window.location.href="/home";
                </script>';;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Phonebook::destroy($id);
        return redirect('/home');
    }
}
