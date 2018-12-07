<?php

namespace App\Controller\Catalog;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    public function categories(CategoryRepository $repository)
    {
        $categories = $repository->findAll();
        return $this->render('catalog/category/categories.html.twig', [
            'categories' => $categories,
        ]);
    }
}
