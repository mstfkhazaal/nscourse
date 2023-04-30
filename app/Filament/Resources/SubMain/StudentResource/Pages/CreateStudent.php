<?php

namespace App\Filament\Resources\SubMain\StudentResource\Pages;

use App\Filament\Resources\SubMain\StudentResource;
use Filament\Resources\Pages\CreateRecord;
use Mstfkhazaal\FilamentNestedresources\ResourcePages\NestedPage;

class CreateStudent extends CreateRecord
{
    use NestedPage;

    protected static string $resource = StudentResource::class;
}
