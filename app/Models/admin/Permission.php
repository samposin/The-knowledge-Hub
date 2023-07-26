<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatiePermission;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Contracts\Activity;

use Spatie\Activitylog\LogOptions;

class Permission extends SpatiePermission
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
        ->useLogName('permissions');

    }

    public function tapActivity(Activity $activity, string $eventName)
    {
        $activity->description = "This model has been {$eventName} by {$activity->causer->name} of id = {$activity->causer->id}";
    }
}