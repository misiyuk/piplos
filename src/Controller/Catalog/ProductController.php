<?php

namespace App\Controller\Catalog;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{
    /**
     * @param string $slug
     * @Route("/{slug}.html", name="product")
     * @return Response
     */
    public function product($slug)
    {
        return $this->render('shop/product.html.twig', [
            'product' => $slug,
        ]);
    }

    /**
     * @param string $slug
     * @Route("/{slug}", name="category")
     * @return Response
     */
    public function category($slug)
    {
        return $this->render('shop/category.html.twig', [
            'category' => $slug,
        ]);
    }
}
