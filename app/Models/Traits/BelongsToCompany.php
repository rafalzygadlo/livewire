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
        // WAŻNE: Nie stosujemy tego scope'a do samego modelu User, aby uniknąć nieskończonej pętli
        // podczas uwierzytelniania.
       
        static::addGlobalScope('company1', function (Builder $builder) {
             
            print "dupa";
            if(Auth::check()) 
            {
                print "dupa2<br>";
            }
            //dd(Auth::user() ? Auth::user()->id : null);
            //exit;
            /*
            if (Auth::check() && Auth::user()->company_id) {
                // Sprawdzamy, czy model, na którym działamy, to nie jest model User
                if (! $builder->getModel() instanceof \App\Models\User) {
                
                    $builder->where(static::tableName() . '.company_id', Auth::user()->company_id);
                }
            }
        }
            */});

        // Automatyczne przypisywanie company_id przy tworzeniu nowego rekordu
        static::creating(function ($model) {
            $user = Auth::user();
            if ($user && $user->company_id) {
                if (is_null($model->company_id)) {
                    $model->company_id = $user->company_id;
                }
            }
        });
    }

    

    public static function tableName(): string
    {
        return app()->make(static::class)->getTable();
    }
}