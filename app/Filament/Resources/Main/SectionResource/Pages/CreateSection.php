<?php

namespace App\Filament\Resources\Main\SectionResource\Pages;

use App\Filament\Resources\Main\SectionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;
use Mstfkhazaal\FilamentNestedresources\ResourcePages\HasTranslatableNestedPage;
use Mstfkhazaal\FilamentNestedresources\ResourcePages\NestedPage;

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
