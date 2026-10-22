<?php

namespace App\Models;

use Database\Factories\DetailTransaksiFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['id_transaksi', 'id_menu', 'jumlah', 'harga_saat_transaksi', 'subtotal'])]
class DetailTransaksi extends Model
{
    /** @use HasFactory<DetailTransaksiFactory> */
    use HasFactory;

    protected $table = 'detail_transaksi';

    protected $primaryKey = 'id_detail';

    /**
     * The legacy detail_transaksi table has no created_at / updated_at columns.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'harga_saat_transaksi' => 'decimal:2',
            'subtotal' => 'decimal:2',
        ];
    }

    /**
     * @return BelongsTo<Transaksi, $this>
     */
    public function transaksi(): BelongsTo
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }

    /**
     * @return BelongsTo<Menu, $this>
     */
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }
}
