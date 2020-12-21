<?php
namespace App\Repositories\Product;

use App\Repositories\EloquentRepository;
use App\Repositories\Product\ProductInterface;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Config as Config;
use Illuminate\Support\Facades\DB;
class ProductRepository extends EloquentRepository implements ProductInterface

{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Product::class;
    }

    /**
     * note here
     * @return mixed
     */
    public function getAll()
    {
        return $this->_model::get();
    }

    public function insert($request)
    {
        $rq = $request->only(['name', 'price', 'discount', 'description', 'image_url', 'id_category']);
        $pathImg = null;
        $save_path = public_path(Config::get('constant.save_path'));
        if($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image_resize = Image::make($image);              
            $image_resize->resize(650, 400);
            if (!file_exists($save_path)) {
                mkdir($save_path, 666, true);
            }
            $pathImg = Config::get('constant.save_path').$filename;
            $image_resize->save($save_path.$filename);
        }
        $final_amount = $rq['price'] - round(($rq['price'] * $rq['discount'])/100);
        try {
            $this->_model::create([
                'name' => $rq['name'],
                'image_url' => $pathImg,
                'price' => $rq['price'],
                'discount_percent' => $rq['discount'],
                'final_amount' => $final_amount,
                'description' => $rq['description'],
                'id_category' => $rq['id_category']
                ]);
            return [
                "status" => true,
                "messages" => 'tạo mới thành công',
            ];
        } catch (Exception $e) {
            unlink($pathImg);
            return [
                "status" => false,
                "messages" => $e->getMessages
            ];
        };
    }

    public function delete($id) {
        $cate = $this->_model::where('id', $id)->first();
        if($cate) {
            $this->_model::where('id', $id)->delete();
            unlink($cate->image_url);
            return true;
        }
        return false;
    }

    public function update($request, $id)
    {
        $rq = $request->only(['name', 'price', 'discount', 'description', 'image_url', 'id_category']);
        $pathImg = null;
        $save_path = public_path(Config::get('constant.save_path'));
        $cate = $this->_model::where('id', $id)->first();
        if($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image_resize = Image::make($image);              
            $image_resize->resize(650, 400);
            if (!file_exists($save_path)) {
                mkdir($save_path, 666, true);
            }
            $pathImg = Config::get('constant.save_path').$filename;
            $image_resize->save($save_path.$filename);
            unlink($cate->image_url);
        }
        try {
            $final_amount = $rq['price'] - round(($rq['price'] * $rq['discount'])/100);
            $arrValue = [
                'name' => $rq['name'],
                'price' => $rq['price'],
                'discount_percent' => $rq['discount'],
                'final_amount' => $final_amount,
                'description' => $rq['description'],
                'id_category' => $rq['id_category']
                ];
            if($pathImg) $arrValue += ['image_url' => $pathImg];
            $this->_model::where('id', $id)->update($arrValue);
            return [
                "status" => true,
                "messages" => 'cập nhật thành công',
            ];
        } catch (Exception $e) {
            unlink($pathImg);
            return [
                "status" => false,
                "messages" => $e->getMessages
            ];
        };
    }

    public function findProduct($id) {
        return $this->_model::find($id);
    }
    public function getProductsByCategory_1($slug, $limit) {
        return $this->_model::select('product.*', 'category.slug as slug_cate')->join('category', 'category.id', '=', 'product.id_category')->where('category.slug', $slug)->take($limit)->get();
    }
    public function getProductsByCategory($slug, $page) {
        $limit = \Config::get('constant.limit_product');
        return $this->_model::select('product.*', 'category.slug as slug_cate')->join('category', 'category.id', '=', 'product.id_category')->where('category.slug', $slug)->skip($page * $limit)->limit($limit)->get();
    }

    public function getProductsBySlug($slug_cate, $slug_product) {
        return $this->_model::select('product.*')->join('category', 'category.id', '=', 'product.id_category')->where('category.slug', $slug_cate)->where('product.slug', $slug_product)->first();
    }

    public function searchProductsBySlug($slug_cate, $search_text) {
        if($slug_cate == null) 
        return $this->_model::select('product.*', 'category.slug as slug_cate')->join('category', 'category.id', '=', 'product.id_category')->where('product.name','LIKE', '%'.$search_text.'%')->get();
        else 
        return $this->_model::select('product.*', 'category.slug as slug_cate')->join('category', 'category.id', '=', 'product.id_category')->where('category.slug', $slug_cate)->where('product.name','LIKE', '%'.$search_text.'%')->get();
    }

    public function countAllBySlug($slug) {
        return $this->_model::select('product.*', 'category.slug as slug_cate')->join('category', 'category.id', '=', 'product.id_category')->where('category.slug', $slug)->get()->count();
    }

    public function getRamdomProduct() {
        return $this->_model::select('product.*', 'category.slug as slug_cate')->join('category', 'category.id', '=', 'product.id_category')->orderBy(DB::raw('RAND()'))->limit(8)->get();
    }

    public function getRamdomProductByCate($slug_cate) {
        return $this->_model::select('product.*', 'category.slug as slug_cate')
        ->where('category.slug', $slug_cate)
        ->join('category', 'category.id', '=', 'product.id_category')->orderBy(DB::raw('RAND()'))->limit(4)->get();
    }
}