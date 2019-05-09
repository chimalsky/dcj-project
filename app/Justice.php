<?php

namespace App;

use DB;
use Str;
use Arr;
use App\Coding;
use App\Conflict;
use App\CustomCasts\Enum;
use App\Enums\JusticeTarget;
use App\Enums\JusticeSender;
use App\Enums\JusticePrecision;
use App\CustomCasts\EnglishBoolean;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;
use Vkovic\LaravelCustomCasts\HasCustomCasts;

class Justice extends Model
{   
    use FormAccessible, HasCustomCasts;

    protected $guarded = [
        'id'
    ];

    protected $casts = [
        'start' => 'date',
        'end' => 'date',

        'implemented' => EnglishBoolean::class,
        'civilian' => EnglishBoolean::class,
        'rank_and_file' => EnglishBoolean::class,
        'elite' => EnglishBoolean::class,

        //'sender' => Enum::class,
        //'scope' => Enum::class,

        'peace_initiated' => EnglishBoolean::class,

        //'start_code' => Enum::class,
        //'start_precision' => Enum::class,

        //'end_code' => Enum::class,
        //'end_precision' => Enum::class,


        'implemented' => EnglishBoolean::class,
        //'target' => Enum::class
        
    ];

    /**
     * A justice model can be associated with other justice models
     */
    /*public function relatedJustices()
    {
        return $this->belongsToMany(Justice::class, );
    }*/

    public function justiceable()
    {
        return $this->morphTo();
    }

    public function conflict()
    {
        return $this->belongsTo(Conflict::class);
    }

    public function getTypeAttribute()
    {
        return $this->attributes['type'] ??
            class_basename($this->justiceable_type);
    }

    public function getCountAttribute()
    {
        $justice = $this;

        $justiceOfTypes = $this->conflict
            ->justices()
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

    public function getTargetAttribute($value) 
    {
        $attrKey = Str::snake($value);
        
        return $this->conflict->$attrKey ?? $value;
    }

    public function getSenderAttribute($value) 
    {
        $attrKey = Str::snake($value);
        
        return $this->conflict->$attrKey ?? $value;
    }

    public function getPrecisionCodesAttribute()
    {
        return [
            'Low' => 'Low',
            'Medium' => 'Medium',
            'High' => 'High'
        ];

        //return JusticePrecision::toSelectArray();
    }

    public function getTargetCodesAttribute()
    {
        return [
            'Side A' => 'Side A',
            'Side B' => 'Side B',
            'Both' => 'Both',
            'Other' => 'Other'
        ];  
        //return JusticeTarget::toSelectArray();
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
       // return JusticeSender::toSelectArray();
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
            'Affiliation' => 'Affiliation',
            'Specific event' => 'Specific event',
            'The conflict' => 'The conflict',
            'Other' => 'Other'
        ];
    }

    public function getGenderCodesAttribute()
    {
        return [
            'Men' => 'Men',
            'Women' => 'Women',
            'Missing' => 'Missing'
        ];
    }

    public function getSexviolenceCodesAttribute()
    {
        return [
            'No sexual violence' => 'No sexual violence',
            'Sexual violence' => 'Sexual violence'
        ];
    }

    public function getCreatedAtHumanAttribute()
    {
        $value = $this->created_at;

        return $value->diffForHumans();
    }

    public function getUpdatedAtHumanAttribute()
    {
        $value = $this->updated_at;

        return $value->diffForHumans();
    }

    public function formStartPrecisionAttribute($value)
    {
        return $value;
    }

    public function formEndPrecisionAttribute($value)
    {
        return $value;
    }

    public function formTargetAttribute($value)
    {
        return $value;
    }

    public function formSenderAttribute($value)
    {
        return $value;
    }

    public function setOldConflictIdAttribute($value)
    {
        $translation = DB::table('translate_conflicts')
            ->where('old_id', $value)
            ->first();

        $this->attributes['conflict_id'] = $translation->new_id ?? null;
    }
}
