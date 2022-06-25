<?php

namespace App\Http\Controllers;

use App\Http\Services\Pages\Page;
use App\Http\Services\Pages\ProductPage;
use App\Http\Services\Pages\SimplePage;
use App\Http\Services\Product;
use App\Http\Services\Renders\HTMLRenderer;
use App\Http\Services\Renders\JsonRenderer;
use Illuminate\Routing\Controller as BaseController;

class PageController extends BaseController
{
    public function __invoke()
    {
        /**
         * The client code can be executed with any pre-configured combination of the
         * Abstraction+Implementation.
         */
        $HTMLRenderer = new HTMLRenderer();
        $JSONRenderer = new JsonRenderer();

        $page = new SimplePage($HTMLRenderer, "Home", "Welcome to our website!");
        echo "HTML view of a simple content page:\n";
        $this->clientCode($page);
        echo "\n\n";

        /**
         * The Abstraction can change the linked Implementation at runtime if needed.
         */
        $page->changeRenderer($JSONRenderer);
        echo "JSON view of a simple content page, rendered with the same client code:\n";
        $this->clientCode($page);
        echo "\n\n";


        $product = new Product(
            "123", "Star Wars, episode1",
            "A long time ago in a galaxy far, far away...",
            "/images/star-wars.jpeg", 39.95
        );

        $page = new ProductPage($HTMLRenderer, $product);
        echo "HTML view of a product page, same client code:\n";
        $this->clientCode($page);
        echo "\n\n";

        $page->changeRenderer($JSONRenderer);
        echo "JSON view of a simple content page, with the same client code:\n";
        $this->clientCode($page);
    }

    /**
     * The client code usually deals only with the Abstraction objects.
     */
    private function clientCode(Page $page): void
    {
        echo $page->view();
    }
}
