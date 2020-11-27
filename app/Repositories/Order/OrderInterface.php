<?php
namespace App\Repositories\Order;
interface OrderInterface
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAll();
    public function insert($request);
    public function delete($request);
    public function update($request, $id);
}