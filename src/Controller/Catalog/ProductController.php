<?php

namespace App\Controller\Catalog;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ProductController
 * @package App\Controller\Catalog
 *
 * @property ProductRepository $repository
 */
class ProductController extends AbstractController
{
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $slug
     * @return Response
     */
    public function product($slug)
    {
        $product = $this->repository->findOneBy(['slug' => $slug]);
        return $this->render('catalog/product/product.html.twig', [
            'product' => $product,
        ]);
    }

    /**
     * @param string $slug
     * @return Response
     */
    public function category($slug)
    {
        $products = $this->repository->getProductsByCategory($slug);
        return $this->render('catalog/product/category.html.twig', [
            'products' => $products,
        ]);
    }
}
