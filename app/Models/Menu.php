<?php

namespace App\Models;

use Database\Factories\MenuFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['id_kantin', 'nama_menu', 'kategori', 'harga', 'stok'])]
class Menu extends Model
{
    /** @use HasFactory<MenuFactory> */
    use HasFactory;

    protected $table = 'menu';

    protected $primaryKey = 'id_menu';

    /**
     * The legacy menu table has no created_at / updated_at columns.
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
            'harga' => 'decimal:2',
        ];
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
    public function detailTransaksi(): HasMany
    {
        return $this->hasMany(DetailTransaksi::class, 'id_menu');
    }
}
