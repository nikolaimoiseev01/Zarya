<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->schema([
                    TextInput::make('title')
                        ->required(),
                    TextInput::make('summary')
                        ->required(),
                    Textarea::make('description')
                        ->required(),
                    Repeater::make('services')
                        ->simple(
                            TextInput::make('service')->required(),
                        )->grid(4),
                    SpatieMediaLibraryFileUpload::make('cover')
                        ->required()
                        ->disk('public')
                        ->collection('cover'),
                ])->columnSpanFull()

            ]);
    }
}
