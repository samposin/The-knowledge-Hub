<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use Spatie\Permission\Models\Role as SpatieRole;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Contracts\Activity;

use Spatie\Activitylog\LogOptions;

class Role extends SpatieRole
{
    use LogsActivity;
    use HasFactory;

    protected $guarded = [];

    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logUnguarded()
        // ->dontLogIfAttributesChangedOnly(['slug', 'updated_at'])
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs()
        ->useLogName('roles');

    }

    public function tapActivity(Activity $activity, string $eventName)
    {
        $activity->description = "This model has been {$eventName} by {$activity->causer->name} of id = {$activity->causer->id}";
    }

    // public function users(){
    //     return $this->belongsTo(User::class);
    // }
}
