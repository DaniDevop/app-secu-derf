<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceAgent extends Model
{
    //

    // Dans ServiceAgent.php
public function agent(): HasMany
{
    // Spécifiez la clé étrangère
    return $this->hasMany(AgentStagiare::class, 'service_agent_id');
}
}
