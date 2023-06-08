<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Query\Builder;
class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $users = Detail::orderByDesc('last_name')->take(5)->get();/
        // return 
       
        return view('userDetail.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

            return view('userDetail.userCreate');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
  
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|',
            'father_name' => 'required',
            'mobile_number' => 'required',
            'address' => 'required',
        ]);
    
        // Create a new user instance
       $user= Detail::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'father_name' => $validatedData['father_name'],
            'mobile_number' => $validatedData['mobile_number'],
            'address' => $validatedData['address'],
        ]);
                    return response()->json(['res'=>'User successfully created']);

    }
    /**
     * Display the specified resource.
     */
    public function show(Detail $detail)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {

     $user = Detail::find($id);
     return view('userDetail.update', compact('user'));
    

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Detail $detail)
    {
        //
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|',
            'father_name' => 'required',
            'mobile_number' => 'required',
            'address' => 'required',
        ]);
    
        // Create a new user instance
       $user= Detail::update([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'father_name' => $validatedData['father_name'],
            'mobile_number' => $validatedData['mobile_number'],
            'address' => $validatedData['address'],
        ]);
                    return response()->json(['res'=>'User successfully updated']);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Detail $detail)
    {
        //
    }
    public function testview()
    {
     $users =Detail::all();
    // $users ="hellow";
      return response()->json(['users'=>$users]);
    }
}
