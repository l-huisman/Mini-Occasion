<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VehicleResource\Pages;
use App\Models\Vehicle;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class VehicleResource extends Resource
{
    protected static ?string $model = Vehicle::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('license_plate')
                    ->placeholder('A-111-AA')
                    ->regex('/([A-Z]-\d{3}-[A-Z]{2})|([A-Z]{2}-\d{3}-[A-Z])|(\d{2}-[A-Z]{3}-\d)|(\d-[A-Z]{3}-\d{2})|([A-Z]{3}-\d{2}-[A-Z])|([A-Z]-\d{2}-[A-Z]{3})|(\d-[A-Z]{2}-\d{3})/u')
                    ->required()
                    ->validationMessages([
                        'regex' => 'The license plate format is invalid.',
                        'required' => 'The license plate is required.'
                    ]),
                Forms\Components\Select::make('brand')
                    ->options([
                        'Tesla' => 'Tesla',
                        'Mercedes' => 'Mercedes',
                        'BMW' => 'BMW',
                        'Ford' => 'Ford',
                        'Toyota' => 'Toyota',
                        'Volkswagen' => 'Volkswagen',
                        'NIO' => 'NIO',
                        'Hyundai' => 'Hyundai'
                    ]) //TODO make this load from the db
                    ->required(),
                Forms\Components\Select::make('type')
                    ->options([
                        'Sedan' => 'Sedan',
                        'Truck' => 'Truck',
                        'Minivan' => 'Minivan',
                        'Coupe' => 'Coupe',
                        'Hatchback' => 'Hatchback',
                        'Convertible' => 'Convertible',
                        'Wagon' => 'Wagon'
                    ]) //TODO make this load from the db
                    ->required(),
                Forms\Components\DatePicker::make('build_date')
                    ->beforeOrEqual(today())
                    ->required()
                    ->validationMessages([
                        'before_or_equal' => 'The build date must be before or equal to today.',
                        'required' => 'The build date is required.',
                    ]),

                Forms\Components\TextInput::make('bought_at')
                    ->rule(['gt:0'])
                    ->minValue(0)
                    ->placeholder('12800')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('available_at')
                    ->rule(['gt:0'])
                    ->placeholder('19200')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('categories')
                    ->relationship('categories', 'name') // Use relationship name and display column
                    ->multiple()
                    ->preload()
                    ->required(),
                Forms\Components\FileUpload::make('url')
                    ->label('Image')
                    ->disk('public')
                    ->directory('vehicle-images')
                    ->nullable()
                    ->image()
                    ->imagePreviewHeight('250'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('license_plate')
                    ->searchable(),
                Tables\Columns\TextColumn::make('brand')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('build_date')
                    ->Date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bought_at')
                    ->prefix('€ ')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('available_at')
                    ->prefix('€ ')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\ImageColumn::make('url')
                    ->height(100)
                    ->width(100)
                    ->label('Image')
                    ->getStateUsing(fn($record): string => asset($record->url)),

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
            'index' => Pages\ListVehicles::route('/'),
            'create' => Pages\CreateVehicle::route('/create'),
            'edit' => Pages\EditVehicle::route('/{record}/edit'),
        ];
    }
}
