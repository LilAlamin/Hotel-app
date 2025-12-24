<?php

namespace App\Filament\Resources\Bookings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class BookingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('user.name')
                    ->label('Pemesan')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('hotel.name')
                    ->label('Hotel')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('roomType.name')
                    ->label('Tipe Kamar'),
                \Filament\Tables\Columns\TextColumn::make('check_in')
                    ->date()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('check_out')
                    ->date()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('total_price')
                    ->money('IDR')
                    ->label('Total Harga')
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'success' => 'success',
                        'cancelled' => 'danger',
                    }),
                \Filament\Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
