<?php

declare(strict_types=1);

namespace App\Http\Services\Pages;

use App\Http\Services\Product;
use App\Http\Services\Renders\Renderer;

class ProductPage extends Page
{
    public function __construct(protected Renderer $renderer, protected Product $product)
    {
        parent::__construct($renderer);
    }

    public function view(): string
    {
        return $this->renderer->renderParts([
            $this->renderer->renderHeader(),
            $this->renderer->renderTitle($this->product->getTitle()),
            $this->renderer->renderTextBlock($this->product->getDescription()),
            $this->renderer->renderImage($this->product->getImage()),
            $this->renderer->renderLink("/cart/add/" . $this->product->getId(), "Add to cart"),
            $this->renderer->renderFooter()
        ]);
    }
}
