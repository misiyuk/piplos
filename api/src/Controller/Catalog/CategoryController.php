<?php

namespace App\Controller\Catalog;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use FOS\RestBundle\Controller\FOSRestController;

class CategoryController extends FOSRestController
{
    public function categories(CategoryRepository $repository)
    {
        $categories = array_map(function(Category $category) {
            return [
                'name' => $category->getName(),
                'slug' => $category->getSlug(),
            ];
        }, $repository->findAll());
        return $this->json($categories);
    }
}