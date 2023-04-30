<?php

namespace App\Filament\Resources\Main\LessonResource\Pages;

use App\Filament\Resources\Main\LessonResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Mstfkhazaal\FilamentNestedresources\ResourcePages\HasTranslatableNestedPage;
use Mstfkhazaal\FilamentNestedresources\ResourcePages\NestedPage;

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
