<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SectionResource\Pages;
use App\Filament\Resources\SectionResource\RelationManagers;
use App\Models\Section;
use Filament\Forms;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use SevendaysDigital\FilamentNestedResources\Columns\ChildResourceLink;
use SevendaysDigital\FilamentNestedResources\NestedResource;

class SectionResource extends NestedResource
{
    use Translatable;

    public static function getTranslatableLocales(): array
    {
        return ['en', 'ar'];
    }
    protected static ?string $model = Section::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static bool $shouldRegisterNavigation = false;

    public static function getParent(): string
    {
        return CourseResource::class;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('parent_id')
                    ->columnSpan(2)
                    ->relationship('parent', 'name'),
                Forms\Components\TextInput::make('name')
                    ->columnSpan(2)
                    ->required(),
                Forms\Components\TextInput::make('description')
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('course.name')
                    ->toggleable(true, true),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('parent.name')
                    ->toggleable(true),
                Tables\Columns\TextColumn::make('description'),
                ChildResourceLink::make(LessonResource::class)
                    ->toggleable(true, false),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable(true, true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->toggleable(true, true),
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
            ])
            ->reorderable('order')
            ->defaultSort('order');
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
            'index' => Pages\ListSections::route('/'),
            'create' => Pages\CreateSection::route('/create'),
            'edit' => Pages\EditSection::route('/{record}/edit'),
        ];
    }
    public static function getEloquentQuery(string|int|null $parent = null): Builder
    {
        $query = static::getModel()::query(); // 👈 Change here
        $parentModel = static::getParent()::getModel();
        $key = (new $parentModel)->getKeyName();
        $query->whereHas(
            'course', // 👈 Change here
            fn(Builder $builder) => $builder->where($key, '=', $parent ?? static::getParentId())
        );

        return $query->withoutGlobalScopes([
            SoftDeletingScope::class,
        ]);
    }
}
