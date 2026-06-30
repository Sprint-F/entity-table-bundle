<?php

namespace SprintF\Bundle\EntityTable\Component;

use SprintF\Metadata\Mapping\Attribute\MetadataAttribute;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent(name: 'Entity:Table')]
class EntityTableComponent
{
    use DefaultActionTrait;

    /**
     * Текущая страница постраничного отображения.
     */
    #[LiveProp(writable: true)]
    public int $page = 1;

    public function resetPage(): void
    {
        $this->page = 1;
    }

    /**
     * @todo: Возможно, удалить. Достаточно ли LiveProp $page?
     */
    #[LiveAction]
    public function changePage(#[LiveArg] int $page): void
    {
        $this->page = $page;
    }

    /**
     * Количество элементов на страницу для постраничного отображения.
     */
    #[LiveProp(writable: true)]
    public int $perPage = 25;

    /**
     * @todo: Возможно, удалить. Достаточно ли LiveProp $perPage?
     */
    #[LiveAction]
    public function changePerPage(#[LiveArg] int $perPage): void
    {
        $this->perPage = $perPage;
        $this->resetPage();
    }

    /**
     * Группа метаданных, по которым будет строиться таблица.
     */
    #[LiveProp(writable: false)]
    public string $group = MetadataAttribute::DEFAULT_GROUP;

    public function __construct(
    ) {
    }
}
