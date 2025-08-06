<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'city',
        'country',
        'avatar',
        'is_seller',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_seller' => 'boolean',
        ];
    }

    /**
     * Get the user's full name.
     */
    public function getFullNameAttribute(): string
    {
        return $this->name;
    }

    /**
     * Get the user's avatar URL.
     */
    public function getAvatarUrlAttribute(): string
    {
        if ($this->avatar) {
            return asset('storage/avatars/' . $this->avatar);
        }
        
        // Generar avatar por defecto usando iniciales
        $initials = strtoupper(substr($this->name, 0, 1));
        return "https://ui-avatars.com/api/?name={$initials}&background=3B82F6&color=ffffff&size=150";
    }

    /**
     * Determinar si el usuario es vendedor.
     */
    public function isSeller(): bool
    {
        return $this->is_seller;
    }

    /**
     * Obtener los productos del usuario (si es vendedor).
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'seller_id');
    }

    /**
     * Obtener las órdenes del usuario.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Obtener el carrito del usuario.
     */

    /**
     * Obtener las reseñas del usuario.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Obtener los productos favoritos del usuario.
     */
    public function favorites()
    {
        return $this->belongsToMany(Product::class, 'user_favorites')->withTimestamps();
    }

    /**
     * Scope para obtener solo vendedores.
     */
    public function scopeSellers($query)
    {
        return $query->where('is_seller', true);
    }

    /**
     * Scope para obtener solo compradores.
     */
    public function scopeBuyers($query)
    {
        return $query->where('is_seller', false);
    }
}