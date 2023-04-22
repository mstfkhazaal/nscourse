<?php

namespace App\Filament\Resources\LessonResource\Pages;

use App\Filament\Resources\LessonResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLessons extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = LessonResource::class;

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
