<?php

namespace App\Models;

use Database\Factories\TransaksiFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['nis', 'id_kantin', 'tanggal', 'metode_bayar', 'status'])]
class Transaksi extends Model
{
    /** @use HasFactory<TransaksiFactory> */
    use HasFactory;

    public const STATUS_MENUNGGU = 'Menunggu Konfirmasi';

    public const STATUS_SELESAI = 'Selesai';

    protected $table = 'transaksi';

    protected $primaryKey = 'id_transaksi';

    /**
     * The legacy transaksi table has no created_at / updated_at columns.
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
            'tanggal' => 'datetime',
        ];
    }

    /**
     * @return BelongsTo<Siswa, $this>
     */
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'nis');
    }

    /**
     * @return BelongsTo<Kantin, $this>
     */
    public function kantin(): BelongsTo
    {
        return $this->belongsTo(Kantin::class, 'id_kantin');
    }

    /**
     * @return HasMany<DetailTransaksi, $this>
     */
    public function detail(): HasMany
    {
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi');
    }

    public function total(): float
    {
        return (float) $this->detail->sum('subtotal');
    }
}
