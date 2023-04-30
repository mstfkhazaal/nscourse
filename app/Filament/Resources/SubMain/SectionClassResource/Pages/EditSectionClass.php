<?php

namespace App\Filament\Resources\SubMain\SectionClassResource\Pages;

use App\Filament\Resources\SubMain\SectionClassResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Mstfkhazaal\FilamentNestedresources\ResourcePages\NestedPage;

class EditSectionClass extends EditRecord
{
    use NestedPage;

    protected static string $resource = SectionClassResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            //Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
