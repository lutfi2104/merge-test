<?php

namespace App\Livewire\Produk;

use App\Models\User;
use App\Models\Produk;
use App\Models\Pengujian;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class ListPengujian extends DataTableComponent
{
    // protected $model = Pengujian::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }


    public function columns(): array
    {
        return [
            // Column::make("Id", "id")
            //     ->sortable(),
            Column::make("Tanggal Produksi", "tanggal_produksi")
                ->searchable()
                ->sortable(),
            Column::make("Tanggal Expired", "tanggal_expired")
                ->searchable()
                ->sortable(),
            Column::make("Shift", "shift.shift")
                ->sortable(),
            Column::make("Nama Produk", "produk.name")
                ->searchable()
                ->sortable(),
            Column::make("Kode Batch", "no_batch")
                ->searchable()
                ->sortable(),
            Column::make("Sak", "id")
                ->format(
                    function ($value) {
                        $get = Pengujian::find($value);
                        return  $get->sak_awal . '-' . $get->sak_akhir;
                    }
                )->html(),
            Column::make("Created By", "qc")
                ->hideIf(!Auth::user()->hasRole('Super Admin'))
                ->searchable()
                ->sortable(),
            Column::make("Created By", "qc")
                ->hideIf(!Auth::user()->hasRole('Admin QC'))
                ->searchable()
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make('Actions', "id")
                ->label(
                    function ($row, Column $column) {
                        return view('livewire.produk.action', compact('row'));
                    }
                ),


        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Nama Produk')
                ->setFilterPillTitle('Nama Produk')
                ->options(Produk::pluck('name', 'id')->toArray()) // Mengambil langsung array hasil pluck
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('produk_id', $value);
                }),
            SelectFilter::make('SHIFT')
                ->setFilterPillTitle('SHIFT')
                ->options([
                    ''    => 'Semua',
                    '1' => 'Satu (1)',
                    '2'  => 'Dua (2)',
                    '3'  => 'Tiga (3)',
                ])
                ->filter(function (Builder $builder, string $value) {
                    if ($value === '1') {
                        $builder->where('shift.shift', '1');
                    } elseif ($value === '2') {
                        $builder->where('shift.shift', '2');
                    } elseif ($value === '3') {
                        $builder->where('shift.shift', '3');
                    }
                }),
            DateFilter::make('Tanggal Produksi')
                ->filter(function (Builder $builder, string $value) {
                    // Pastikan $value sudah dalam format 'yyyy-mm-dd'
                    $builder->where('tanggal_produksi', '=', $value);
                }),

            DateFilter::make('Tanggal Expired')
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('tanggal_expired', '=', $value);
                }),
            SelectFilter::make('Created By')
                ->setFilterPillTitle('Created By')
                ->options(Pengujian::distinct()->pluck('qc', 'qc')->toArray())
                ->filter(function (Builder $builder, $value) {
                    $builder->where('qc', $value); // Sesuaikan dengan nama kolom yang tepat di tabel Pengujian
                }),

        ];
    }


    public function builder(): EloquentBuilder
    {
        return Pengujian::query()
            ->orderBy('id', 'DESC');
    }
}
