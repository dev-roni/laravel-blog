<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carosel;

class CaroselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carosels=Carosel::with('category')->paginate(8);
        $title = 'carosel';
        return view('admin.carosel',compact('carosels','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $carosels_exist=Carosel::where('categories_id',$request->category_id)->exists();
        if(!$carosels_exist){
            $carosel= new Carosel();
            $carosel->categories_id =$request->category_id;
            $carosel->carosel_select='no';
            $carosel->save();
        }

        return redirect()->back()->with('success','carosel add successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $carosel=Carosel::find($id);
        $carosel->delete();
        return redirect()->back();
    }

    //custom method
    public function carosel1($id,$status)
    {
        Carosel::where('carosel_select', 'first')->update(['carosel_select' => $status]);

        $set_carosel = Carosel::findOrFail($id);
        $set_carosel->carosel_select = 'first';
        $set_carosel->update();

        return redirect()->back()->with('success','first carosel set up successfully');
    }
    public function carosel2( $id,$status)
    {
        Carosel::where('carosel_select', 'second')->update(['carosel_select' => $status]);

        $set_carosel=Carosel::find($id);
        $set_carosel->carosel_select='second';
        $set_carosel->update();

        return redirect()->back()->with('success','second carosel set up successfully');
    }
    public function carosel3( $id,$status)
    {
        Carosel::where('carosel_select', 'third')->update(['carosel_select' => $status]);

        $set_carosel=Carosel::find($id);
        $set_carosel->carosel_select='third';
        $set_carosel->update();

        return redirect()->back()->with('success','third carosel set up successfully');
    }
}
