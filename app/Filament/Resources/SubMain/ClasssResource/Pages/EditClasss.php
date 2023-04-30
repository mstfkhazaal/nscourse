<?php

namespace App\Filament\Resources\SubMain\ClasssResource\Pages;

use App\Filament\Resources\SubMain\ClasssResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClasss extends EditRecord
{
    protected static string $resource = ClasssResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
