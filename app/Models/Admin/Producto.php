<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Producto
 * @package App\Models\Admin
 * @version April 29, 2022, 10:30 am UTC
 *
 * @property string $name
 * @property string $descripcion
 * @property string $codigo
 * @property double $costo
 * @property double $precio
 * @property integer $id_categoria
 * @property string $imagen
 * @property integer $stock
 */
class Producto extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'productos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'descripcion',
        'codigo',
        'costo',
        'precio',
        'imagen',
        'id_categoria',
        'stock'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'descripcion' => 'string',
        'codigo' => 'string',
        'costo' => 'integer',
        'precio' => 'integer',
        'imagen' => 'string',
        'id_categoria' => 'integer',
        'stock' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'descripcion' => 'required',
        'costo' => 'required',
        'precio' => 'required',
        'id_categoria' => 'required',
        'stock' => 'required'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    
}
