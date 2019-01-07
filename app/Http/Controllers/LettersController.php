<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Letters;

class LettersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $letters = Letters::all();

        return view('letters.index',compact('letters',$letters));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $letters_cnt = Letters::count();
        return view('letters.create',compact('letters_cnt',$letters_cnt));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request != null){
            $this->validate($request,[
                'letter_id' => 'required',
                'from_office' => 'required',
                'date' => 'required',
                'subject' => 'required',
                'type' => 'required',
            ]);
            
            if($request->hasFile('file_path')){
                //get file name with extension
                $filenameWithExt = $request -> file('file_path') -> getClientOriginalName();
                // get just file name
                $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                // get just extension
                $extension = $request -> file('file_path') -> getClientOriginalExtension();
                //filename to store 
                $filenameToStore = $filename . '_' . time() . '.' . $extension;
                //upload image
                $path =$request -> file('file_path') ->storeAs('public/letters/',$filenameToStore);

            }else{
                $filenameToStore = 'noimage.jpg';
            }
            $letters = new Letters;
            $letters -> letter_id = $request -> input('letter_id');
            $letters -> from_office = $request -> input('from_office');
            $letters -> date = $request -> input('date');
            $letters -> subject = $request -> input('subject');
            $letters -> type = $request -> input('type');
            $letters -> file_path = $filenameToStore;
            $letters -> save();
            return 'success';
        }else{
            return 'error';
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
