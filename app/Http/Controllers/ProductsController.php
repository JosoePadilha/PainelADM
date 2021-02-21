<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProducts;
use App\Models\FamilyProducts;
use App\Models\Products;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $familysProducts = FamilyProducts::orderBy('name', 'asc')->get();
        return view('adm.products.formStoreProduct', compact('familysProducts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProducts $request)
    {
        $data = $this->request->only('name', 'price', 'family_id', 'avatar');

        $product = $this->checkProductExistence($data);

        if ($product == null) {
            $data['avatar'] = $this->resizeAvatar($this->request);
            Products::create($data);
            $st = "success";
            $message = "Cadastro efetuado com sucesso!!";
        } else {
            $st = "error";
            $message = "Não foi possível cadastrar, e-mail já cadastrados!!";
        }
        return redirect()->back()->with($st, $message);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }

    protected function checkProductExistence($data)
    {
        $check = DB::table('products')->orWhere('name', '=', $data['name'])->first();

        return $check;
    }

    public function resizeAvatar(Request $request)
    {
        if ($this->request->hasFile('avatar') && $this->request->avatar->isValid()) {
            $nameAvatar = md5(uniqid()) . '-' . time() . '.jpg';
            $destinationPath = storage_path('app/public/products');
            $img = Image::make($this->request->avatar->getRealPath());

            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $nameAvatar);

            $destinationPath = storage_path('app/public/products');

            $dirAvatar = 'products/' . $nameAvatar;
        } else {
            $dirAvatar = '';
        }
        return $dirAvatar;
    }

    public function showProductsFamily($filter = null)
    {
        $products = DB::table('products')
            ->join('familys', 'familys.id', '=', 'products.family_id')
            ->orderBy('products.name', 'asc')->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('product.name', '=', $filter);
                }
            })->paginate();

            dd($products);

        return view('adm.products.showProducts', [
            'products' => $products,
        ]);
    }
}
