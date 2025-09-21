<?php

namespace App\Filament\Resources\ProjectCases\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProjectCasesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('case_id')
                    ->searchable(),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('client')
                    ->searchable(),
                TextColumn::make('industry')
                    ->searchable(),
                TextColumn::make('period')
                    ->searchable(),
                ImageColumn::make('image'),
                TextColumn::make('service_key')
                    ->searchable(),
                IconColumn::make('is_published')
                    ->boolean(),
                TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('user.name')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('result_1')
                    ->searchable(),
                TextColumn::make('result_2')
                    ->searchable(),
                TextColumn::make('result_3')
                    ->searchable(),
                TextColumn::make('result_4')
                    ->searchable(),
                TextColumn::make('result_5')
                    ->searchable(),
                TextColumn::make('result_6')
                    ->searchable(),
                TextColumn::make('meta_title')
                    ->searchable(),
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
