<?php

namespace App;

use DB;
use Str;
use Arr;
use App\User;
use App\Form;
use App\Coding;
use App\Conflict;
use Zoha\MetableModel;
use App\DyadicConflict;
use App\Traits\Formable;
use App\JusticeRelationship;
use App\Traits\UsesPreciseDates;
use App\CustomCasts\EnglishBoolean;
use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\SoftDeletes;
use Vkovic\LaravelCustomCasts\HasCustomCasts;

class Justice extends MetableModel
{   
    use Formable, UsesPreciseDates, FormAccessible, 
        SoftDeletes, HasCustomCasts;

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'type',
        'start', 'end', 'implemented', 
        'civilian', 'rank_and_file', 'elite',
        'peace_initiated', 'implemented',
        "start_precision",
        "start_event",
        "end_precision",
        "end_event",
        "target",
        "scope",
        "scope_count",
        "sender",
        "wrong",
        "gender",
        "sexviolence"
    ];

    protected $casts = [
        'start' => 'date',
        'end' => 'date',

        'implemented' => EnglishBoolean::class,
        'civilian' => EnglishBoolean::class,
        'rank_and_file' => EnglishBoolean::class,
        'elite' => EnglishBoolean::class,

        'peace_initiated' => EnglishBoolean::class,

        'implemented' => EnglishBoolean::class        
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['conflict'];

    /**
     * A justice model can be associated with other justice models
     */
    /*public function relatedJustices()
    {
        return $this->belongsToMany(Justice::class, );
    }*/

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function justiceable()
    {
        return $this->morphTo();
    }

    public function conflict()
    {
        return $this->belongsTo(Conflict::class);
    }

    public function dyadicConflicts()
    {
        return $this->belongsToMany(DyadicConflict::class, 'dyadic_conflict_justice', 'justice_id', 'dyadic_conflict_id');
    }

    public function relatedJustices()
    {
        return $this->hasMany(JusticeRelationship::class, 'justice_a');
    }
    
    public function getPossibleRelatedAttribute()
    {
        if (! $this->conflict) {
            return; 
        }

        $justice = $this;

        return $this->conflict->justices->pluck('dcjid', 'dcjid')
            ->filter(function($value) use ($justice) {
                return $value !== $justice->dcjid;
            });
    }

    public function getDcjidTruncatedAttribute() 
    {
        $exploded = explode('_', $this->dcjid);

        return $exploded[1] . '_' . $exploded[2] . '_' . $exploded[3];
    }

    public function getCountAttribute()
    {
        $justice = $this;

        $justiceOfTypes = $this->conflict
            ->justices()->withTrashed()
            ->where('type', $this->type)
            ->get();
        
        $index = $justiceOfTypes
            ->search(function($item, $key) use ($justice) {
                return $item->id === $justice->id;
            });
        
        if (is_int($index)) {
            return $index + 1;
        }

        return null;
    }

    public function getPrecisionCodesAttribute()
    {
        return [
            'Low' => 'Low',
            'Medium' => 'Medium',
            'High' => 'High'
        ];

    }

    public function getTargetCodesAttribute()
    {
        return [
            'Side A' => 'Side A',
            'Side B' => 'Side B',
            'Both' => 'Both',
            'Other' => 'Other'
        ];  
    }

    public function getSenderCodesAttribute()
    {
        return [
            'Side A' => 'Side A',
            'Side B' => 'Side B',
            'Both' => 'Both',
            'Other' => 'Other',
            'International' => 'International'
        ];
    }

    public function getScopeCodesAttribute()
    {
        return [
            'Specific Individual' => 'Specific Individual',
            'Named Group' => 'Named Group',
            'General Group' => 'General Group'
        ];
    }

    public function getStartEventCodesAttribute()
    {
        $coding = Coding::where([
            ['group', $this->type],
            ['name', 'start_event']
        ])->first();

        $arr = json_decode($coding->codes);

        return collect($arr)->mapWithKeys(function($item) {
            return [
                $item => $item
            ];
        });
    }

    public function getEndEventCodesAttribute()
    {
        $coding = Coding::where([
            ['group', $this->type],
            ['name', 'end_event']
        ])->first();

        $arr = json_decode($coding->codes);

        return collect($arr)->mapWithKeys(function($item) {
            return [
                $item => $item
            ];
        });
    }

    public function getWrongCodesAttribute()
    {
        return [
            1 => 'Affiliation',
            2 => 'Specific event',
            3 => 'The conflict',
            4 => 'Other'
        ];
    }

    public function getGenderCodesAttribute()
    {
        return [
            0 => 'Men',
            1 => 'Women',
            9 => 'Missing'
        ];
    }

    public function getSexviolenceCodesAttribute()
    {
        return [
            0 => 'No sexual violence',
            1 => 'Sexual violence'
        ];
    }

    public function setOldConflictIdAttribute($value)
    {
        $translation = DB::table('translate_conflicts')
            ->where('old_id', $value)
            ->first();

        $this->attributes['conflict_id'] = $translation->new_id ?? null;
    }

    public function getNameAttribute()
    {
        $value = $this->form->schema['name'] ?? $this->form->name ?? 'Unnamed';
        return ucfirst($value); //. " #$this->count ";
    }


    /**
     *  Set Mutators
     */

    
}
