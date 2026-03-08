<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteSettingResource\Pages;
use App\Models\SiteSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SiteSettingResource extends Resource
{
    protected static ?string $model = SiteSetting::class;
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'إعدادات الموقع';
    protected static ?string $modelLabel = 'إعداد';
    protected static ?string $pluralModelLabel = 'إعدادات الموقع';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('site_name')->label('اسم الموقع')->required(),
            Forms\Components\FileUpload::make('site_logo')->label('الشعار')->image()->directory('settings')->disk('public'),
            Forms\Components\Textarea::make('about_text')->label('نص حولنا')->rows(6),
            Forms\Components\TextInput::make('phone')->label('الهاتف'),
            Forms\Components\TextInput::make('email')->label('البريد الإلكتروني')->email(),
            Forms\Components\TextInput::make('whatsapp')->label('واتساب'),
            Forms\Components\TextInput::make('address')->label('العنوان'),
            Forms\Components\TextInput::make('facebook')->label('فيسبوك'),
            Forms\Components\TextInput::make('instagram')->label('إنستغرام'),
            Forms\Components\Textarea::make('map_iframe')->label('Google Map iframe')->rows(5),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('site_name')->label('اسم الموقع'),
                Tables\Columns\TextColumn::make('phone')->label('الهاتف'),
                Tables\Columns\TextColumn::make('email')->label('البريد'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function canCreate(): bool
    {
        return SiteSetting::count() === 0;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiteSettings::route('/'),
            'create' => Pages\CreateSiteSetting::route('/create'),
            'edit' => Pages\EditSiteSetting::route('/{record}/edit'),
        ];
    }
}
