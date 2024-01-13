<?php

namespace App\Repositories\NotaFiscal;

use App\DTOs\NotaFiscal\CreateNotaFiscalDTO;
use App\Models\NotaFiscal;

class NotaFiscalRepository
{
    private $notaFiscalModel;

    public function __construct()
    {
        $this->notaFiscalModel = new NotaFiscal();
    }
    public function create(CreateNotaFiscalDTO $dto)
    {
        $user = $this->notaFiscalModel->create([
            'numero' => $dto->numero,
            'valor' => $dto->valor,
            'dt_emis' => $dto->data_emissao,
            'cnpj_remetente' => $dto->cnpj_remetente,
            'nome_remetente' => $dto->nome_remetente,
            'cnpj_transportador' => $dto->cnpj_transportador,
            'nome_transportador' => $dto->nome_transportador,
            'criador' => $dto->usuario
        ]);
        return $user;
    }
}
