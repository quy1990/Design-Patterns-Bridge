<?php

declare(strict_types=1);

namespace App\Http\Services\Pages;

use App\Http\Services\Renders\Renderer;

abstract class Page
{
    /**
     * The Abstraction is usually initialized with one of the Implementation
     * objects.
     */
    public function __construct(protected Renderer $renderer)
    {

    }

    /**
     * The Bridge pattern allows replacing the attached Implementation object
     * dynamically.
     */
    public function changeRenderer(Renderer $renderer): void
    {
        $this->renderer = $renderer;
    }

    /**
     * The "view" behavior stays abstract since it can only be provided by
     * Concrete Abstraction classes.
     */
    abstract public function view(): string;
}
