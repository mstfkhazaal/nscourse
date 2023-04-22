<?php

namespace App\Filament\Resources\SectionResource\Pages;

use App\Filament\Resources\SectionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use SevendaysDigital\FilamentNestedResources\ResourcePages\NestedPage;

class ListSections extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    use NestedPage;
    protected static string $resource = SectionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
