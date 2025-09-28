<?php

namespace App\Filament\Resources\WhyUs;

use App\Filament\Resources\WhyUs\Pages\CreateWhyUs;
use App\Filament\Resources\WhyUs\Pages\EditWhyUs;
use App\Filament\Resources\WhyUs\Pages\ListWhyUs;
use App\Filament\Resources\WhyUs\Schemas\WhyUsForm;
use App\Filament\Resources\WhyUs\Tables\WhyUsTable;
use App\Models\WhyUs;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class WhyUsResource extends Resource
{
    protected static ?string $model = WhyUs::class;

    protected static ?string $navigationLabel = 'Почему мы';

    protected static ?string $pluralModelLabel = 'Почему мы';

    protected static ?string $modelLabel = 'блок';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return WhyUsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WhyUsTable::configure($table);
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
            'index' => ListWhyUs::route('/'),
            'create' => CreateWhyUs::route('/create'),
            'edit' => EditWhyUs::route('/{record}/edit'),
        ];
    }
}
