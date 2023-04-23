<?php

namespace App\Filament\Resources\Main;

use App\Filament\Resources\Main\CourseResource\Pages;
use App\Filament\Resources\Main\CourseResource\RelationManagers;
use App\Filament\Resources\Main;
use App\Models\Course;
use Filament\Forms;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mstfkhazaal\FilamentNestedresources\BaseNestedResource;
use Mstfkhazaal\FilamentNestedresources\Columns\ChildResourceLink;
use Archilex\ToggleIconColumn\Columns\ToggleIconColumn;


class CourseResource extends BaseNestedResource
{
    use Translatable;

    public static function getTranslatableLocales(): array
    {
        return [app()->getLocale(),'en', 'ar'];
    }
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function getLabel(): ?string
    {
        return __('course.title');
    }

    public static function getPluralLabel(): ?string
    {
        return __('course.plural');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->columnSpan(2)
                    ->label('course.name')
                    ->translateLabel()
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->label('course.description')
                    ->translateLabel()
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('course.name')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('description')
                    ->label('course.description')
                    ->getStateUsing(function ($livewire, $record) {
                        $in =$record->getTranslation('description',
                            $livewire->getActiveTableLocale());
                        return mb_strimwidth($in, 0, 50, "...");
                    })
                    ->translateLabel()
                    ->toggleable(true,true),
                ChildResourceLink::make(SectionResource::class),
                Tables\Columns\IconColumn::make('active')
                    ->action(Action::make('active')
                        ->label(__('table.active_confirmation'))
                        ->requiresConfirmation()
                        ->action(function ($record) {
                            $record->active = !$record->active;
                            $record->save();
                        }))
                    ->boolean()
                    ->toggleable()
                    ->label('table.active')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('table.created_at')
                    ->toggleable(true, true)
                    ->translateLabel()
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('table.updated_at')
                    ->translateLabel()
                    ->toggleable(true, true)
                    ->dateTime(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->label('table.deleted_at')
                    ->translateLabel()
                    ->toggleable(true, true)
                    ->dateTime(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'view' => Pages\ViewCourse::route('/{record}'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
