<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProducts;
use App\Models\FamilyProducts;
use App\Models\Products;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
    public function edit($id)
    {
        $product = Products::find($id);

        $productFamily = FamilyProducts::find($product->family_id);
        $product['familyName'] = $productFamily['name'];
        $familysProducts = FamilyProducts::orderBy('name', 'asc')->get();

        return view('adm.products.formEditProduct', [
            'product' => $product,
            'familysProducts' => $familysProducts,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProducts $request, $id)
    {
        if ($products = Products::find($id)) {

            $data = $this->request->only('name', 'price', 'avatar', 'family_id');

            if (isset($this->request->avatar)) {
                if ($products->avatar != null) {
                    Storage::delete($products->avatar);
                }
                $data['avatar'] = $this->resizeAvatar($this->request);
            } else if (($this->request->avatar == null && $products->avatar != null)) {
                $data['avatar'] = $products->avatar;
            } else {
                $data['avatar'] = "";
            }

            $products->update($data);
            $st = "success";
            $message = "Dados alterados com sucesso!!";
        } else {
            $st = "error";
            $message = "Não foi possível alterar!!";
        }
        return redirect()->back()->with($st, $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);

        if ($product == null) {
            $st = "error";
            $message = "Não foi possível excluir o produto!!";
        } else {
            if($product->avatar){
                Storage::delete($product->avatar);
            }

            $product->delete();
            $st = "success";
            $message = "Produto excluído com sucesso!!";
        }

        return redirect()->back()->with($st, $message);
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
            ->join('familys', 'products.family_id', '=', 'familys.id')
            ->select(
                'products.id',
                'products.name',
                'products.avatar',
                'products.price',
                'familys.name as family'
            )
            ->orderBy('products.name', 'asc')->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('products.name', "LIKE", "%$filter%");
                }
            })->paginate();

        return view('adm.products.showProducts', [
            'products' => $products,
        ]);
    }

    public function searchProduct(Request $request)
    {
        if (isset($request->filter)) {
            $filters = $request->only('name');
            $data = $request['filter'];
            $product = $this->searchProductFilter($data);
            if (!$product) {
                $st = "error";
                $message = "Não há registros!!";
                return redirect()->route('showProducts');
            } else {
                $st = "success";
                $message = "Dados encontrados!!";

                return view('adm.products.showProducts', [
                    'products' => $product,
                    'filters' => $filters,
                    'st' => $st,
                    'message' => $message,
                ]);
            }
        } else {
            return redirect()->route('showProducts');
        }
    }

    protected function searchProductFilter($filter = null)
    {
        $products = DB::table('products')
            ->join('familys', 'products.family_id', '=', 'familys.id')
            ->select(
                'products.id',
                'products.name',
                'products.avatar',
                'products.price',
                'familys.name as family'
            )
            ->orderBy('products.name', 'asc')->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('products.name', "LIKE", "%$filter%");
                }
            })->paginate();

        return $products;
    }

}
