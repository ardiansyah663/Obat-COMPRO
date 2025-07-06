<?php

namespace App\Filament\Resources\PesananResource\Pages;

use App\Filament\Resources\PesananResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\PesananResource\Widgets\PesananStatsOverview;
use App\Filament\Resources\PesananResource\Widgets\PesananChart;

class ListPesanans extends ListRecords
{
    protected static string $resource = PesananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

     
    protected function getHeaderWidgets(): array
    {
        return [
            PesananStatsOverview::class,
            PesananChart::class,
        ];
    }
}
