<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ShopController extends AbstractController
{
    /**
     * @param string $slug
     * @Route("/{slug}.html", name="product")
     * @return string
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
     * @return string
     */
    public function category($slug)
    {
        return $this->render('shop/category.html.twig', [
            'category' => $slug,
        ]);
    }
}
