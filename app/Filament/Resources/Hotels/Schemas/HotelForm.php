<?php

namespace App\Filament\Resources\Hotels\Schemas;

use Filament\Schemas\Schema;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Support\RawJs;

class HotelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Textarea::make('address')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->directory('hotel-images')
                    ->disk('public')
                    ->columnSpanFull(),
                Repeater::make('roomTypes')
                    ->relationship()
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->label('Room Type (Single, Double, etc.)'),
                        TextInput::make('total_rooms')
                            ->numeric()
                            ->required()
                            ->label('Number of Rooms'),
                        TextInput::make('price')
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->numeric()
                            ->required()
                            ->prefix('Rp')
                            ->label('Harga per Malam'),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
