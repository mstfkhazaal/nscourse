<?php

namespace App\Filament\Resources\Main\CourseResource\Pages;

use App\Filament\Resources\Main\CourseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCourse extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = CourseResource::class;

    protected function getActions(): array
    {
        return [
            //Actions\ViewAction::make(),
            Actions\LocaleSwitcher::make(),
            //Actions\DeleteAction::make(),
            //Actions\ForceDeleteAction::make(),
           // Actions\RestoreAction::make(),
        ];
    }
}
