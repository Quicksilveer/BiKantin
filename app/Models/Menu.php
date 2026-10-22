<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['id_kantin', 'nama_menu', 'kategori', 'harga', 'stok'])]
class Menu extends Model
{
    protected $table = 'menu';

    protected $primaryKey = 'id_menu';

    /**
     * The legacy menu table has no created_at / updated_at columns.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return HasMany<Pesanan, $this>
     */
    public function pesanan(): HasMany
    {
        return $this->hasMany(Pesanan::class, 'menu_id', 'id_menu');
    }
}
