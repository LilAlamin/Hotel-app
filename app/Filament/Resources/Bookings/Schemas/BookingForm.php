<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->schema([
                        Section::make('Informasi Pesanan')
                            ->description('Detail tamu dan akomodasi yang dipilih')
                            ->icon('heroicon-o-user')
                            ->schema([
                                Select::make('user_id')
                                    ->relationship('user', 'name')
                                    ->required()
                                    ->searchable()
                                    ->preload()
                                    ->label('Nama Tamu')
                                    ->columnSpanFull(),
                                Select::make('hotel_id')
                                    ->relationship('hotel', 'name')
                                    ->required()
                                    ->label('Hotel'),
                                Select::make('room_type_id')
                                    ->relationship('roomType', 'name')
                                    ->required()
                                    ->label('Tipe Kamar'),
                            ])->columns(2),

                        Section::make('Detail Inap')
                            ->icon('heroicon-o-clock')
                            ->schema([
                                Grid::make(3)
                                    ->schema([
                                        DatePicker::make('check_in')
                                            ->required()
                                            ->label('Check In'),
                                        DatePicker::make('check_out')
                                            ->required()
                                            ->label('Check Out'),
                                        TextInput::make('total_price')
                                            ->numeric()
                                            ->prefix('Rp')
                                            ->required()
                                            ->label('Total Tagihan')
                                            ->columnSpan(3),
                                    ]),
                            ]),
                    ])->columnSpan(['lg' => 2]),

                Group::make()
                    ->schema([
                        Section::make('Status Pesanan')
                            ->icon('heroicon-o-flag')
                            ->schema([
                                Select::make('status')
                                    ->options([
                                        'pending' => 'Pending',
                                        'success' => 'Success',
                                        'cancelled' => 'Cancelled',
                                    ])
                                    ->required()
                                    ->default('pending')
                                    ->native(false)
                            ]),
                    ])->columnSpan(['lg' => 1]),
            ])->columns(3);
    }
}
