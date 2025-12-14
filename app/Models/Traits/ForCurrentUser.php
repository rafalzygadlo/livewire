<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait ForCurrentUser
{
    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        // Zastosuj globalny zasięg, aby pokazywać tylko dane zalogowanego użytkownika
        static::addGlobalScope('user', function (Builder $builder) {
            if (Auth::check()) {
                $builder->where(static::tableName() . '.user_id', Auth::id());
            }
        });

        // Automatycznie przypisz ID zalogowanego użytkownika podczas tworzenia nowego rekordu
        static::creating(function ($model) {
            if (Auth::check() && is_null($model->user_id)) {
                $model->user_id = Auth::id();
            }
        });
    }

    /**
     * Get the table name for the model.
     *
     * @return string
     */
    public static function tableName(): string
    {
        return with(new static)->getTable();
    }
}
