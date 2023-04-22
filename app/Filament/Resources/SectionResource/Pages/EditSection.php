<?php

namespace App\Filament\Resources\SectionResource\Pages;

use App\Filament\Resources\SectionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use SevendaysDigital\FilamentNestedResources\ResourcePages\NestedPage;

class EditSection extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    use NestedPage;

    protected static string $resource = SectionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
