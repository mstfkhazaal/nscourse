<?php


namespace App\Filament\Resources\Main;

use App\Filament\Resources\Main;
use App\Filament\Resources\SectionResource\Pages;
use App\Filament\Resources\SectionResource\RelationManagers;
use App\Models\Section;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\TemporaryUploadedFile;
use Mstfkhazaal\FilamentNestedresources\Columns\ChildResourceLink;
use Mstfkhazaal\FilamentNestedresources\NestedResource;
use Filament\Tables\Actions\Action;

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

    protected static ?int $navigationSort =1;
    public static function getParent(): string
    {
        return CourseResource::class;
    }
    public static function getLabel(): ?string
    {
        return __('section.title');
    }

    public static function getPluralLabel(): ?string
    {
        return __('section.plural');
    }
    protected static function getNavigationGroup(): ?string
    {
        return __('table.main');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('parent_id')
                    ->label('section.parent')
                    ->translateLabel()
                    ->columnSpan(2)
                    ->relationship('parent', 'name'),
                Forms\Components\TextInput::make('name')
                    ->columnSpan(2)
                    ->label('section.name')
                    ->translateLabel()
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->label('section.description')
                    ->translateLabel()
                    ->columnSpan(2),
                SpatieMediaLibraryFileUpload::make('trailer')
                    ->collection('lessons')
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
                Tables\Columns\TextColumn::make('course.name')
                    ->label('section.course')
                    ->translateLabel()
                    ->toggleable(true, true),
                Tables\Columns\TextColumn::make('name')
                    ->label('section.name')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('parent.name')
                    ->label('section.parent')
                    ->translateLabel()
                    ->toggleable(true),
                Tables\Columns\TextColumn::make('description')
                    ->getStateUsing(function ($livewire, $record) {
                        $in =$record->getTranslation('description',
                            $livewire->getActiveTableLocale());
                        return mb_strimwidth($in, 0, 50, "...");
                    })
                    ->label('section.description')
                    ->translateLabel(),
                ChildResourceLink::make(LessonResource::class)
                    ->toggleable(true, false),
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
                //Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                //Tables\Actions\ForceDeleteBulkAction::make(),
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
    public static function getParentAccessor(): string
    {
        return 'course';
    }
    public static function getPages(): array
    {
        return [
            'index' => Main\SectionResource\Pages\ListSections::route('/'),
            'view' => Main\SectionResource\Pages\ViewSection::route('/view/{record}'),
            'create' => Main\SectionResource\Pages\CreateSection::route('/create'),
            'edit' => Main\SectionResource\Pages\EditSection::route('/{record}/edit'),
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
