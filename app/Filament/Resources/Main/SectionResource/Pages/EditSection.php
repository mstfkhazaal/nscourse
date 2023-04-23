<?php

namespace App\Filament\Resources\Main\SectionResource\Pages;

use App\Filament\Resources\Main\SectionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Mstfkhazaal\FilamentNestedresources\ResourcePages\NestedPage;
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
