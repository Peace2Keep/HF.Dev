<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Price;
use App\Category;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = Price::all();

        return view('prices.index', compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('prices.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'price'=>'required',
            'tax'=>'required',
            'category_id'=>'required'
        ]);

        $price = new Price([
            'price' => $request->{'price'},
            'tax' => $request->{'tax'},
            'category_id' => $request->{'category_id'}
        ]);

        $price->save();
        return redirect('prices')->with('success', 'Price model saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('prices.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $price = Price::findOrFail($id);

        return view('prices.edit', compact('price', 'categories'));
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
        $request->validate([
            'price'=>'required',
            'tax'=>'required',
            'category_id'=>'required'
        ]);

        $price = Price::findOrFail($id);
        $price->price = $request->get('price');
        $price->tax = $request->get('tax');
        $price->category_id = $request->get('category_id');
        $price->save();

        return redirect('prices')->with('success', 'Price updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price = Price::find($id);
        $price->delete();

        return redirect('prices')->with('success', 'Price deleted!');
    }
}
