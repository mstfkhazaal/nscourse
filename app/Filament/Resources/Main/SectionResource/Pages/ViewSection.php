<?php

namespace App\Filament\Resources\Main\SectionResource\Pages;

use App\Filament\Resources\Main\SectionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;
use Mstfkhazaal\FilamentNestedresources\ResourcePages\NestedPage;

class ViewSection extends ViewRecord
{
    use ViewRecord\Concerns\Translatable;

    use NestedPage;

    protected static string $resource = SectionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\EditAction::make(),
        ];
    }
}
