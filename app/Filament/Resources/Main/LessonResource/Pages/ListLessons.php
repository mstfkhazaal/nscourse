<?php

namespace App\Filament\Resources\Main\LessonResource\Pages;

use App\Filament\Resources\Main\LessonResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;
use Mstfkhazaal\FilamentNestedresources\ResourcePages\ListNestedPage;
use Mstfkhazaal\FilamentNestedresources\ResourcePages\NestedPage;
class ListLessons extends ListRecords
{
    use ListNestedPage, Translatable {
        ListNestedPage::configureDeleteAction insteadof Translatable;
    }
    use NestedPage {
        ListNestedPage::configureDeleteAction insteadof NestedPage;
    }

    protected static string $resource = LessonResource::class;

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
