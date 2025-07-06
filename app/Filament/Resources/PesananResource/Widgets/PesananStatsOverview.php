<?php

namespace App\Filament\Resources\PesananResource\Widgets;

use App\Models\Pesanan;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;

class PesananStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        // Total pesanan dengan status 'paid'
        $totalPaidOrders = Pesanan::where('status', 'paid')->count();
        
        // Total pemasukan dari pesanan dengan status 'paid'
        $totalIncome = Pesanan::where('status', 'paid')->sum('total_harga');
        
        // Total pesanan dalam bulan ini dengan status 'paid'
        $totalPaidOrdersThisMonth = Pesanan::where('status', 'paid')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
            
        // Total pemasukan dalam bulan ini dari pesanan dengan status 'paid'
        $totalIncomeThisMonth = Pesanan::where('status', 'paid')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('total_harga');
        
        return [
            Stat::make('Total Pesanan Dibayar', $totalPaidOrders)
                ->description('Jumlah pesanan yang sudah dibayar')
                ->descriptionIcon('heroicon-o-shopping-cart')
                ->color('success'),
                
            Stat::make('Total Pemasukan', 'Rp ' . number_format($totalIncome, 0, ',', '.'))
                ->description('Total pendapatan dari pesanan dibayar')
                ->descriptionIcon('heroicon-o-currency-dollar')
                ->color('success'),
                
            Stat::make('Pesanan Bulan Ini', $totalPaidOrdersThisMonth)
                ->description('Jumlah pesanan dibayar bulan ini')
                ->descriptionIcon('heroicon-o-calendar')
                ->color('primary'),
                
            Stat::make('Pemasukan Bulan Ini', 'Rp ' . number_format($totalIncomeThisMonth, 0, ',', '.'))
                ->description('Pendapatan bulan ini')
                ->descriptionIcon('heroicon-o-chart-bar')
                ->color('primary'),
        ];
    }
}