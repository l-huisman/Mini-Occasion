<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BrandResource\Pages;
use App\Models\Brand;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BrandResource extends Resource
{
    protected static ?string $model = Brand::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->placeholder('Tesla')
                    ->unique(ignoreRecord: true)
                    ->required(),
                Forms\Components\TextInput::make('description')
                    ->placeholder('Tesla is an American electric vehicle and clean energy company.')
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->placeholder('http://mini-occasions.test')
                    ->url()
                    ->maxLength(255)
                    ->required(),
                Forms\Components\FileUpload::make('url')
                    ->label('Image')
                    ->disk('public')
                    ->directory('brand-images')
                    ->nullable()
                    ->image()
                    ->imagePreviewHeight('250')
                    ->dehydrated(fn($state) => filled($state)),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('url')
                    ->height(100)
                    ->width(100)
                    ->label('Image')
                    ->extraAttributes(fn($record): array => [
                        'alt' => $record->name,
                        'class' => 'rounded-lg',
                    ])
                    ->getStateUsing(fn($record): string => asset($record->url)),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListBrands::route('/'),
            'create' => Pages\CreateBrand::route('/create'),
            'edit' => Pages\EditBrand::route('/{record}/edit'),
        ];
    }
}
