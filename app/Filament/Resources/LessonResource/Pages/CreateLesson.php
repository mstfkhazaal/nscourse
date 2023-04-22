<?php

namespace App\Filament\Resources\LessonResource\Pages;

use App\Filament\Resources\LessonResource;
use SevendaysDigital\FilamentNestedResources\ResourcePages\HasTranslatableNestedPage;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;
use SevendaysDigital\FilamentNestedResources\ResourcePages\NestedPage;

class CreateLesson extends CreateRecord
{

    use HasTranslatableNestedPage, Translatable {
        HasTranslatableNestedPage::handleRecordCreation insteadof Translatable;
    }
    use NestedPage {
        HasTranslatableNestedPage::handleRecordCreation insteadof NestedPage;
    }

    protected static string $resource = LessonResource::class;
    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
