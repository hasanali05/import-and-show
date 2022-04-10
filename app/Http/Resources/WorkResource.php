<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'month' => $this->month,
            'day' => $this->day,
            'date' => $this->date->format('Y-m-d'),
            'employee_id' => $this->employee_id,
            'employee_name' => $this->employee_name,
            'department' => $this->department,
            'first_in_time_formatted' => $this->first_in_time->format('h:i A'),
            'first_in_time' => $this->first_in_time->format('H:i'),
            'last_out_time_formatted' => $this->last_out_time->format('h:i A'),
            'last_out_time' => $this->last_out_time->format('H:i'),
            'hour_of_work' => $this->hour_of_work,
        ];
    }
}
