<?php
namespace App\Repositories\Category;
interface CategoryInterface
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAll();
    public function insert($request);
    public function delete($request);
    public function update($request, $id);
    public function getBySlug($slug);
    public function getFirst();
}