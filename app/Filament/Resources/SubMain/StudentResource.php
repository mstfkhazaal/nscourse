<?php

namespace App\Filament\Resources\SubMain;

use App\Filament\Resources\SubMain\StudentResource\Pages;
use App\Filament\Resources\SubMain\StudentResource\RelationManagers;
use App\Filament\Resources\SubMain;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\TemporaryUploadedFile;
use Mstfkhazaal\FilamentNestedresources\NestedResource;

class StudentResource extends NestedResource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function getParent(): string
    {
        return SectionClassResource::class;
    }
    protected static function getNavigationGroup(): ?string
    {
        return __('table.sub_main');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('section_class_id')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('active')
                    ->required(),
                SpatieMediaLibraryFileUpload::make('trailer')
                    ->collection('sectionClass')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file, $record, callable $set): string {
                        return $record->getTranslation('title', 'en') . '.' . $file->extension();
                    })
                    ->reactive()
                    ->acceptedFileTypes(['video/*'])
                    ->hint('The Video crop to 16:9')
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('section_class_id'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => SubMain\StudentResource\Pages\ListStudents::route('/'),
            'create' => SubMain\StudentResource\Pages\CreateStudent::route('/create'),
            'edit' => SubMain\StudentResource\Pages\EditStudent::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(string|int|null $parent = null): Builder
    {
        $query = static::getModel()::query(); // 👈 Change here
        $parentModel = static::getParent()::getModel();
        $key = (new $parentModel)->getKeyName();
        $query->whereHas(
            'sectionClass', // 👈 Change here
            fn(Builder $builder) => $builder->where($key, '=', $parent ?? static::getParentId())
        );

        return $query->withoutGlobalScopes([
            SoftDeletingScope::class,
        ]);
    }


}
