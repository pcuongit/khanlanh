<?php
namespace App\Repositories\Product;
interface ProductInterface
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAll();
    public function insert($request);
    public function delete($request);
    public function update($request, $id);
    public function findProduct($id);
    public function getProductsByCategory_1($slug, $limit);
    public function getProductsByCategory($slug, $page);
    public function getProductsBySlug($slug_cate, $slug_product);
    public function searchProductsBySlug($slug_cate, $search_text);
    public function countAllBySlug($slug);
    public function getRamdomProduct();
}