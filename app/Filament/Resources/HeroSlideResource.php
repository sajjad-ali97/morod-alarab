<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroSlideResource\Pages;
use App\Models\HeroSlide;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HeroSlideResource extends Resource
{
    protected static ?string $model = HeroSlide::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'صور الرئيسية';
    protected static ?string $modelLabel = 'صورة رئيسية';
    protected static ?string $pluralModelLabel = 'صور الرئيسية';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')->label('العنوان'),
            Forms\Components\TextInput::make('subtitle')->label('العنوان الفرعي'),
            Forms\Components\FileUpload::make('image')
                ->label('الصورة')
                ->image()
                ->directory('hero-slides')
                ->disk('public')
                ->required(),
            Forms\Components\TextInput::make('sort_order')->label('الترتيب')->numeric()->default(0),
            Forms\Components\Toggle::make('is_active')->label('نشط')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('الصورة')->disk('public'),
                Tables\Columns\TextColumn::make('title')->label('العنوان'),
                Tables\Columns\TextColumn::make('sort_order')->label('الترتيب'),
                Tables\Columns\IconColumn::make('is_active')->label('نشط')->boolean(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHeroSlides::route('/'),
            'create' => Pages\CreateHeroSlide::route('/create'),
            'edit' => Pages\EditHeroSlide::route('/{record}/edit'),
        ];
    }
}
