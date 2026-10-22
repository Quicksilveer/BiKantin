<?php

namespace App\Models;

use Database\Factories\KantinFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['nama_kantin', 'penanggung_jawab'])]
class Kantin extends Model
{
    /** @use HasFactory<KantinFactory> */
    use HasFactory;

    protected $table = 'kantin';

    protected $primaryKey = 'id_kantin';

    /**
     * The legacy kantin table has no created_at / updated_at columns.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return HasMany<Menu, $this>
     */
    public function menu(): HasMany
    {
        return $this->hasMany(Menu::class, 'id_kantin');
    }

    /**
     * @return HasMany<Transaksi, $this>
     */
    public function transaksi(): HasMany
    {
        return $this->hasMany(Transaksi::class, 'id_kantin');
    }
}
