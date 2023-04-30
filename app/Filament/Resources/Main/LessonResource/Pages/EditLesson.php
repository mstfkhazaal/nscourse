<?php

namespace App\Filament\Resources\Main\LessonResource\Pages;

use App\Filament\Resources\Main\LessonResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Mstfkhazaal\FilamentNestedresources\ResourcePages\NestedPage;
use Mstfkhazaal\FilamentNestedresources\Resources\Pages\EditNestedRecords;

class EditLesson extends EditNestedRecords
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
