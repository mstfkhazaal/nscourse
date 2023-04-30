<?php

namespace App\Filament\Resources\SubMain\SectionClassResource\Pages;

use App\Filament\Resources\SubMain\SectionClassResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Mstfkhazaal\FilamentNestedresources\ResourcePages\NestedPage;

class ListSectionClasses extends ListRecords
{
    use NestedPage;

    protected static string $resource = SectionClassResource::class;
    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
