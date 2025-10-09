<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BiomaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return[
            'nome_bioma' => $this->nome_bioma,
            'descricao_bioma' => $this->descricao_bioma,
            'imagem_bioma' => $this->imagem_bioma,
            'populacao_bioma' => $this->populacao_bioma,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'flora' => FloraResource::collection($this->whenLoaded('flora')),
            'fauna' => FaunaResource::collection($this->whenLoaded('fauna')),
            'relevo' => RelevoResource::collection($this->whenLoaded('relevo')),
            'clima' => new ClimaResource($this->whenLoaded('clima')),
            'caracteristica_se' => Caracteristica_SEResource::collection($this->whenLoaded('caracteristica_se')),
            'post' => PostResource::collection($this->whenLoaded('post')),
            'area_preservacao' => Area_PreservacaoResource::collection($this->whenLoaded('area_preservacao')),
            'hist_alteracao_bioma' => Hist_Alteracao_BiomaResource::collection($this->whenLoaded('hist_alteracao_bioma')),
        ];
    }
}
