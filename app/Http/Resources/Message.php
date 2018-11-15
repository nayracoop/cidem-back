<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
//use Carbon\Carbon;

class Message extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'institution' => $this->institution,
            'email' => $this->email,
            'description' => $this->description,
            'status' => $this->status,
            'display_date' => $this->created_at->format('d-m-Y'),
            'display_time' => $this->created_at->format('H:i'),

        ];
    }
}
