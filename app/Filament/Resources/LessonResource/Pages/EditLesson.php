<?php

namespace App\Filament\Resources\LessonResource\Pages;

use App\Filament\Resources\LessonResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use SevendaysDigital\FilamentNestedResources\ResourcePages\NestedPage;

class EditLesson extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    use NestedPage;

    protected static string $resource = LessonResource::class;

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
