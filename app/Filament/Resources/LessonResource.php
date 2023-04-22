<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LessonResource\Pages;
use App\Filament\Resources\LessonResource\RelationManagers;
use App\Models\Lesson;
use Filament\Forms;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use SevendaysDigital\FilamentNestedResources\NestedResource;

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

    public static function getParent(): string
    {
        return SectionResource::class;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->columnSpan(2)
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->columnSpan(2),
                Forms\Components\TimePicker::make('duration'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('section.name')
                ->toggleable(),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('duration'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable(true,true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->toggleable(true,true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->toggleable(true,true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
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
            'index' => Pages\ListLessons::route('/'),
            'create' => Pages\CreateLesson::route('/create'),
            'edit' => Pages\EditLesson::route('/{record}/edit'),
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
