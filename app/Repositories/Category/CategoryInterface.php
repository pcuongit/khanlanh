<?php
namespace App\Repositories\Category;

interface CategoryInterface
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAll();
}