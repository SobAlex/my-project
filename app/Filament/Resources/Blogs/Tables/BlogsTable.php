<?php

namespace App\Filament\Resources\Blogs\Tables;

use App\Filament\Resources\Blogs\BlogResource;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BlogsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->url(fn ($record) => BlogResource::getUrl('edit', ['record' => $record]))
                    ->openUrlInNewTab(false),
                TextColumn::make('slug')
                    ->searchable(),
                ImageColumn::make('image'),
                TextColumn::make('category')
                    ->searchable(),
                TextColumn::make('meta_title')
                    ->searchable(),
                IconColumn::make('is_published')
                    ->boolean(),
                TextInputColumn::make('sort_order')
                    ->rules(['integer', 'min:0'])
                    ->sortable(),
                TextColumn::make('user.name')
                    ->searchable(),
                TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->reorderable('sort_order')
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
