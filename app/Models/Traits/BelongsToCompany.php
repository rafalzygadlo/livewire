<?php

namespace App\Models\Traits;

use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

trait BelongsToCompany
{
    protected static function booted(): void
    {
        // Globalny scope filtrujący dane po company_id zalogowanego użytkownika
        static::addGlobalScope('company', function (Builder $builder) {
            if (Auth::check() && Auth::user()->company_id) {
                $builder->where(static::tableName() . '.company_id', Auth::user()->company_id);
            }
        });

        // Automatyczne przypisywanie company_id przy tworzeniu nowego rekordu
        static::creating(function ($model) {
            if (Auth::check() && Auth::user()->company_id) {
                if (is_null($model->company_id)) {
                    $model->company_id = Auth::user()->company_id;
                }
            }
        });
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public static function tableName(): string
    {
        return with(new static)->getTable();
    }
}