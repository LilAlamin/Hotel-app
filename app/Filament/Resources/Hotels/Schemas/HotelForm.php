<?php

namespace App\Filament\Resources\Hotels\Schemas;

use Filament\Schemas\Schema;

use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
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
                Group::make()
                    ->schema([
                        Section::make('Informasi Hotel')
                            ->description('Detail umum mengenai hotel')
                            ->icon('heroicon-o-building-office')
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->label('Nama Hotel')
                                    ->maxLength(255),
                                Textarea::make('address')
                                    ->required()
                                    ->label('Alamat Lengkap')
                                    ->rows(3)
                                    ->columnSpanFull(),
                            ]),

                        Section::make('Kamar Tersedia')
                            ->description('Kelola tipe kamar dan harga')
                            ->icon('heroicon-o-key')
                            ->schema([
                                Repeater::make('roomTypes')
                                    ->relationship()
                                    ->schema([
                                        TextInput::make('name')
                                            ->required()
                                            ->label('Tipe Kamar (e.g. Deluxe, Suite)'),
                                        TextInput::make('total_rooms')
                                            ->numeric()
                                            ->required()
                                            ->label('Jumlah Kamar'),
                                        TextInput::make('price')
                                            ->mask(RawJs::make('$money($input)'))
                                            ->stripCharacters(',')
                                            ->numeric()
                                            ->required()
                                            ->prefix('Rp')
                                            ->label('Harga per Malam'),
                                    ])
                                    ->columns(3)
                                    ->columnSpanFull(),
                            ]),
                    ])->columnSpan(['lg' => 2]),

                Group::make()
                    ->schema([
                        Section::make('Gambar Sampul')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                FileUpload::make('image')
                                    ->image()
                                    ->directory('hotel-images')
                                    ->disk('public')
                                    ->columnSpanFull()
                                    ->label('Upload Gambar'),
                            ]),
                    ])->columnSpan(['lg' => 1]),
            ])->columns(3);
    }
}
