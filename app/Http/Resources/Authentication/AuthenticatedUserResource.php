<?php 

namespace App\Http\Resources\Authentication;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthenticatedUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'user' => new UserResource($this->resource['user']),
            'token' => $this->token,
            //Aca podriamos definir roles.
        ];
    }
}
