<?php

namespace App\Filament\Resources\SubMain\ClasssResource\Pages;

use App\Filament\Resources\SubMain\ClasssResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClassses extends ListRecords
{
    protected static string $resource = ClasssResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
