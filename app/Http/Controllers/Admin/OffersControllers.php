<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Offers;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OffersControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.offers.index', ['offers' => Offers::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate(
            [
                'product_id' => ['numeric', 'exists:products,id']
            ],
            [
                'numeric' => 'Произошла ошибка при добавлении ТП. ID товара не я вляется числом!',
                'exists' => 'Такого товара не существует!'
            ]
        );

        $productID = $request->get('product_id');

        return view('admin.offers.create', [
            'sizes' => Offers::SIZES,
            'products' => Product::all(),
            'productID' => $productID
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->check($request);

        Offers::create($result);
        return redirect()->route('admin');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('admin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer = Offers::find($id);
        return view('admin.offers.edit',
            [
                'offer' => $offer,
                'sizes' => Offers::SIZES,
                'products' => Product::all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offers $offer)
    {
        $result = $this->check($request);

        $offer->update($result);
        return redirect()->route('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Offers::destroy($id);
        return redirect()->route('admin');
    }

    private function check($request)
    {
        return $request->validate(
            [
                'price' => ['numeric', 'nullable'],
                'size' => ['numeric'],
                'product_id' => ['exists:products,id']
            ],
            [
                'price.numeric' => 'Цена должна быть числом!',
                'size.numeric' => 'Размер должен быть числом!',
                'product_id.exists' => 'Такого товара не существует!'
            ]
        );
    }
}
