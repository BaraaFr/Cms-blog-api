<?php

namespace App\Http\Resources;

use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user=User::where('id',$this->user_id)->first();
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'body'=>$this->details,
            'post_type'=>$this->post_type,
            'author'=>[
                'id'=>$this->id,
                'name'=>$user->name]
        ];
    }
}
