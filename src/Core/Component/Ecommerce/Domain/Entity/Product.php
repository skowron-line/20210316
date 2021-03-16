<?php

namespace Cobiro\Core\Component\Ecommerce\Domain\Entity;

use Cobiro\Core\Component\Ecommerce\Domain\ValueObject\Category;

final class Product
{
    private int $id;
    private string $title;
    private int $price;
    private Category $category;

    public function __construct(
        int $id,
        string $title,
        int $price,
        Category $category
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->category = $category;
    }

    public function changeCategory(Category $category): void
    {
        $this->category = $category;
    }

    public function price(): int
    {
        return $this->price;
    }

    public function toArray(): array
    {
        return [
            $this->id,
            $this->title,
            $this->price,
            $this->category->name(),
        ];
    }
}
