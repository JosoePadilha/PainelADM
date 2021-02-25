<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImage;
use App\Models\Image as ModelImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        return view('marketing.formCreate');
    }


    public function store(StoreImage $request)
    {
        $data = $this->request->only('name');
        $data['path'] = $this->resizeAvatar($this->request);
        $data['user_id'] = Auth::user()->id;

        if (ModelImage::create($data)) {
            $st = "success";
            $message = "Imagem cadastrada com sucesso!!";
        } else {
            $st = "error";
            $message = "Não foi possível cadastrar!!";
        }

        return redirect()->back()->with($st, $message);
    }

    public function showImages(){
        return view('marketing.showImages', [
            'images' => DB::table('images')->orderby('name')->paginate(9)
        ]);
    }

    public function destroy($id){
        $image = ModelImage::find($id);

        if ($image == null) {
            $st = "error";
            $message = "Não foi possível excluir a imagem!!";
        } else {
            if ($image->path) {
                Storage::delete($image->path);
            }

            $image->delete();
            $st = "success";
            $message = "Imagem excluída com sucesso!!";
        }
        return redirect()->back()->with($st, $message);

    }

    public function resizeAvatar(Request $request)
    {
        if ($this->request->hasFile('avatar') && $this->request->avatar->isValid()) {
            $nameAvatar = md5(uniqid()) . '-' . time() . '.jpg';
            $destinationPath = storage_path('app/public/marketing');
            $img = Image::make($this->request->avatar->getRealPath());

            $img->resize(900, 484, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $nameAvatar);

            $destinationPath = storage_path('app/public/marketing');

            $dirAvatar = 'marketing/' . $nameAvatar;
        } else {
            $dirAvatar = '';
        }
        return $dirAvatar;
    }
}
