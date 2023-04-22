<?php

namespace App\Filament\Resources\SectionResource\Pages;

use App\Filament\Resources\SectionResource;
use App\Traits\HasTranslatableNestedPage;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;
use SevendaysDigital\FilamentNestedResources\ResourcePages\NestedPage;

class CreateSection extends CreateRecord
{
    use HasTranslatableNestedPage, Translatable {
    HasTranslatableNestedPage::handleRecordCreation insteadof Translatable;
}
    use NestedPage {
        HasTranslatableNestedPage::handleRecordCreation insteadof NestedPage;
    }
    protected static string $resource = SectionResource::class;
    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
