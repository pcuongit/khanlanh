<?php
namespace App\Repositories\Banner;
interface BannerInterface
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAll();
    public function findBanner($id);
    public function insert($request);
    public function delete($request);
    public function update($request, $id);
    public function getFirst();
}