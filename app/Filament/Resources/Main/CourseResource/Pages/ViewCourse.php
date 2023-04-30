<?php

namespace App\Filament\Resources\Main\CourseResource\Pages;

use App\Filament\Resources\Main\CourseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCourse extends ViewRecord
{
    use ViewRecord\Concerns\Translatable;

    protected static string $resource = CourseResource::class;

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            //Actions\EditAction::make(),
        ];
    }
}
