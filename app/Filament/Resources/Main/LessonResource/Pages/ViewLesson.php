<?php

namespace App\Filament\Resources\Main\LessonResource\Pages;

use App\Filament\Resources\Main\LessonResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;
use Mstfkhazaal\FilamentNestedresources\ResourcePages\NestedPage;

class ViewLesson extends ViewRecord
{
    use ViewRecord\Concerns\Translatable;

    use NestedPage;

    protected static string $resource = LessonResource::class;

    protected function getActions(): array
    {
        return [
            //Actions\LocaleSwitcher::make(),
            //Actions\EditAction::make(),
        ];
    }
}
