<?php

namespace App\Filament\Resources\Main;

use App\Filament\Resources\LessonResource\Pages;
use App\Filament\Resources\LessonResource\RelationManagers;
use App\Filament\Resources\Main;
use App\Models\Lesson;
use Filament\Forms;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mstfkhazaal\FilamentNestedresources\NestedResource;

class LessonResource extends NestedResource
{
    use Translatable;

    public static function getTranslatableLocales(): array
    {
        return ['en', 'ar'];
    }
    protected static ?string $model = Lesson::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static bool $shouldRegisterNavigation = false;


    public static function getLabel(): ?string
    {
        return __('lesson.title');
    }

    public static function getPluralLabel(): ?string
    {
        return __('lesson.plural');
    }
    public static function getParent(): string
    {
        return SectionResource::class;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('lesson.name')
                    ->translateLabel()
                    ->columnSpan(2)
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->label('lesson.description')
                    ->translateLabel()
                    ->columnSpan(2),
                Forms\Components\TimePicker::make('duration')
                    ->label('lesson.duration')
                    ->translateLabel(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('section.name')
                    ->label('lesson.section')
                    ->translateLabel()
                ->toggleable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('lesson.title')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('description')
                    ->label('lesson.description')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('duration')
                    ->label('lesson.duration')
                    ->translateLabel(),
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
            'index' => Main\LessonResource\Pages\ListLessons::route('/'),
            'view' => Main\LessonResource\Pages\ViewLesson::route('/{record}'),
            'create' => Main\LessonResource\Pages\CreateLesson::route('/create'),
            'edit' => Main\LessonResource\Pages\EditLesson::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(string|int|null $parent = null): Builder
    {
        $query = static::getModel()::query(); // 👈 Change here
        $parentModel = static::getParent()::getModel();
        $key = (new $parentModel)->getKeyName();
        $query->whereHas(
            'section',
            fn(Builder $builder) => $builder->where($key, '=', $parent ?? static::getParentId())
        );

        return $query->withoutGlobalScopes([
            SoftDeletingScope::class,
        ]);
    }
}
