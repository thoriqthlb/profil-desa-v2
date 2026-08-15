<?php

namespace App\Filament\Resources\PerangkatDesas\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class PerangkatDesaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                TextInput::make('jabatan')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('foto')
                    ->image()
                    ->disk('public')
                    ->directory('uploads')
                    ->visibility('public'),
            ]);
    }
}