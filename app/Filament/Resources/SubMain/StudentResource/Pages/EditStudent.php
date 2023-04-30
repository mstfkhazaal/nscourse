<?php

namespace App\Filament\Resources\SubMain\StudentResource\Pages;

use App\Filament\Resources\SubMain\StudentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Mstfkhazaal\FilamentNestedresources\ResourcePages\NestedPage;

class EditStudent extends EditRecord
{
    use NestedPage;

    protected static string $resource = StudentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            //Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
