<?php

namespace App\Filament\Resources\SubMain\StudentResource\Pages;

use App\Filament\Resources\SubMain\StudentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Mstfkhazaal\FilamentNestedresources\ResourcePages\NestedPage;

class ListStudents extends ListRecords
{
    use NestedPage;

    protected static string $resource = StudentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
