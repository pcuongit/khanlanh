<?php
namespace App\Repositories\Banner;

use App\Repositories\EloquentRepository;
use App\Repositories\Banner\BannerInterface;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Config as Config;
use App\Models\Banner;
class BannerRepository extends EloquentRepository implements BannerInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Banner::class;
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
        $rq = $request->only(['priorty', 'image_url']);
        $pathImg = null;
        $save_path = public_path(Config::get('constant.save_path'));
        if($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image_resize = Image::make($image);              
            $image_resize->resize(980, 400);
            if (!file_exists($save_path)) {
                mkdir($save_path, 666, true);
            }
            $pathImg = Config::get('constant.save_path').$filename;
            $image_resize->save($save_path.$filename);
        }
        try {
            $this->_model::create(['priorty' => $rq['priorty'], 'image_url' => $pathImg]);
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
        $banner = $this->_model::where('id', $id)->first();
        if($banner) {
            $this->_model::where('id', $id)->delete();
            unlink($banner->image_url);
            return true;
        }
        return false;
    }

    public function update($request, $id)
    {
        $rq = $request->only(['priorty', 'image_url']);
        $pathImg = null;
        $save_path = public_path(Config::get('constant.save_path'));
        $cate = $this->_model::where('id', $id)->first();
        if($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image_resize = Image::make($image);              
            $image_resize->resize(980, 400);
            if (!file_exists($save_path)) {
                mkdir($save_path, 666, true);
            }
            $pathImg = Config::get('constant.save_path').$filename;
            $image_resize->save($save_path.$filename);
            unlink($cate->image_url);
        }
        try {
            $arrValue = ['priorty' => $rq['priorty']];
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

    public function getFirst() {
        return $this->_model->first();
    }

    public function findBanner($id) {
        return $this->_model->find($id);
    }
}