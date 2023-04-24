<?php

namespace App\Filament\Resources\Main\SectionResource\Pages;

use App\Filament\Resources\ListRecordsN;
use App\Filament\Resources\Main\SectionResource;
use Filament\Pages\Actions;

use Filament\Resources\Pages\ListRecords\Concerns\Translatable;
use Mstfkhazaal\FilamentNestedresources\ResourcePages\ListNestedPage;
use Mstfkhazaal\FilamentNestedresources\ResourcePages\NestedPage;
use Mstfkhazaal\FilamentNestedresources\Resources\Pages\ListNestedRecords;

class ListSections extends ListNestedRecords {

    use ListNestedPage, Translatable {
        ListNestedPage::configureDeleteAction insteadof Translatable;
    }
    use NestedPage {
        ListNestedPage::configureDeleteAction insteadof NestedPage;
    }
    protected static string $resource = SectionResource::class;


    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
