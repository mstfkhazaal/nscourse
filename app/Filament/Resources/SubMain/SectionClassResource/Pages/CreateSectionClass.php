<?php

namespace App\Filament\Resources\SubMain\SectionClassResource\Pages;

use App\Filament\Resources\SubMain\SectionClassResource;
use Filament\Resources\Pages\CreateRecord;
use Mstfkhazaal\FilamentNestedresources\ResourcePages\NestedPage;

class CreateSectionClass extends CreateRecord
{
    use NestedPage;

    protected static string $resource = SectionClassResource::class;
}
