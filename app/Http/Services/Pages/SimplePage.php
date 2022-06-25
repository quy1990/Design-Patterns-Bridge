<?php

declare(strict_types=1);

namespace App\Http\Services\Pages;

use App\Http\Services\Renders\Renderer;

class SimplePage extends Page
{
    public function __construct(protected Renderer $renderer, protected string $title, protected string $content)
    {
        parent::__construct($renderer);
    }

    public function view(): string
    {
        return $this->renderer->renderParts([
            $this->renderer->renderHeader(),
            $this->renderer->renderTitle($this->title),
            $this->renderer->renderTextBlock($this->content),
            $this->renderer->renderFooter()
        ]);
    }
}
