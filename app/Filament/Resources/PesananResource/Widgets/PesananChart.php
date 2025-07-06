<?php

namespace App\Filament\Resources\PesananResource\Widgets;

use App\Models\Pesanan;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PesananChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Penjualan';

    protected int|string|array $columnSpan = 'full';
    
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        // Untuk data bulanan dalam 6 bulan terakhir
        $monthlyData = $this->getMonthlyData();
        
        return [
            'datasets' => [
                [
                    'label' => 'Total Penjualan (Rp)',
                    'data' => $monthlyData['totals'],
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#36A2EB',
                ],
                [
                    'label' => 'Jumlah Pesanan',
                    'data' => $monthlyData['counts'],
                    'backgroundColor' => '#FF6384',
                    'borderColor' => '#FF6384',
                ]
            ],
            'labels' => $monthlyData['labels'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
    
    private function getMonthlyData(): array
    {
        // Ambil data 6 bulan terakhir
        $startDate = Carbon::now()->subMonths(5)->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();
        
        // Query untuk mendapatkan total penjualan per bulan
        $monthlyTotals = Pesanan::select(
                DB::raw('SUM(total_harga) as total'),
                DB::raw('COUNT(*) as count'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('YEAR(created_at) as year')
            )
            ->where('status', 'paid')
            ->where('created_at', '>=', $startDate)
            ->where('created_at', '<=', $endDate)
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();
        
        // Siapkan data untuk 6 bulan terakhir
        $labels = [];
        $totals = [];
        $counts = [];
        
        // Isi dengan 0 untuk bulan yang tidak memiliki data
        for ($i = 0; $i < 6; $i++) {
            $currentDate = Carbon::now()->subMonths(5 - $i);
            $monthKey = $currentDate->format('n'); // Bulan tanpa leading zero
            $yearKey = $currentDate->format('Y');
            $monthName = $currentDate->locale('id')->monthName;
            
            $labels[] = $monthName . ' ' . $yearKey;
            
            // Cari data bulan ini dalam hasil query
            $monthData = $monthlyTotals->first(function ($item) use ($monthKey, $yearKey) {
                return $item->month == $monthKey && $item->year == $yearKey;
            });
            
            // Tambahkan data atau 0 jika tidak ada
            $totals[] = $monthData ? $monthData->total : 0;
            $counts[] = $monthData ? $monthData->count : 0;
        }
        
        return [
            'labels' => $labels,
            'totals' => $totals,
            'counts' => $counts,
        ];
    }
    
    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'title' => [
                        'display' => true,
                        'text' => 'Nilai (Rp)'
                    ]
                ],
            ],
            'plugins' => [
                'legend' => [
                    'position' => 'top',
                ],
                'title' => [
                    'display' => true,
                    'text' => 'Pendapatan & Jumlah Pesanan per Bulan'
                ]
            ],
        ];
    }
}