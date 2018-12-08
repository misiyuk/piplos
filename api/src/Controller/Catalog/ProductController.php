<?php

namespace App\Controller\Catalog;

use App\Entity\Product;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use FOS\RestBundle\Controller\FOSRestController;

class ProductController extends FOSRestController
{
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function category($slug, CategoryRepository $categoryRepository)
    {
        $category = $categoryRepository->findOneBy(['slug' => $slug]);
        if (!$category) {
            throw $this->createNotFoundException('Category not found');
        }
        $productsEntities = $this->repository->findBy(['category' => $category]);
        $products = array_map(function(Product $product) {
            return [
                'price' => $product->getPrice(),
                'name' => $product->getName(),
                'previewText' => $product->getPreviewText(),
                'slug' => $product->getSlug(),
            ];
        }, $productsEntities);

        return $this->json($products);
    }

    public function product($slug)
    {
        $productEntity = $this->repository->findOneBy(['slug' => $slug]);
        if (!$productEntity) {
            throw $this->createNotFoundException('Product not found');
        }
        $product = [
            'price' => $productEntity->getPrice(),
            'name' => $productEntity->getName(),
            'detailText' => $productEntity->getDetailText(),
        ];

        return $this->json($product);
    }
}
