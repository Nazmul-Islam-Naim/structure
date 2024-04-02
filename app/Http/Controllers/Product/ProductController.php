<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Services\ThirdPartyApi\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * initialization service
     */
    public function __construct(){
        $this->service = new ProductService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['products'] = $this->service->index();

        return view('product.index', $data);
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

        return $this->service->store($request->all);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->service->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = $this->service->show($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $method = $request->except($data, '_method');
        $methotokend = $request->except($data, '_token');
        $this->service->update($id, $data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->destory($id);
    }
}
