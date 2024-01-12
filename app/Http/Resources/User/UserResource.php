<?php

namespace App\Http\Resources\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "Nome usuario" => $this->resource['name'],
            "Email" => $this->resource['email'],
            "Cpf" => $this->resource['cpf'],
            "Data criação" => Carbon::make($this->resource['created_at'])->format("d-m-Y H:i:s")
        ];
    }
}
