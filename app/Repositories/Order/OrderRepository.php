<?php
namespace App\Repositories\Order;

use App\Repositories\EloquentRepository;
use App\Repositories\Order\OrderInterface;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Config as Config;
class OrderRepository extends EloquentRepository implements OrderInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Order::class;
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
    }

    public function delete($id) {
    }

    public function update($request, $id)
    {
    }
}