<?php

namespace App\Filament\Resources\Main\SectionResource\Pages;

use App\Filament\Resources\Main\SectionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Mstfkhazaal\FilamentNestedresources\ResourcePages\NestedPage;
use Mstfkhazaal\FilamentNestedresources\Resources\Pages\EditNestedRecords;

class EditSection extends EditNestedRecords
{
    use EditRecord\Concerns\Translatable, NestedPage;

    protected static string $resource = SectionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            //Actions\DeleteAction::make(),
            // Actions\ForceDeleteAction::make(),
            //Actions\RestoreAction::make(),
        ];
    }
}
