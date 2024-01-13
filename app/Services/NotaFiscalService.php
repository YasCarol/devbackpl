<?php

namespace App\Services;

use App\DTOs\NotaFiscal\CreateNotaFiscalDTO;
use App\Repositories\NotaFiscal\NotaFiscalRepository;

class NotaFiscalService
{

    private $notaFiscalRepository;

    public function __construct()
    {
        $this->notaFiscalRepository = new NotaFiscalRepository;
    }

    public function newNotaFiscal(CreateNotaFiscalDTO $dto)
    {
        return $this->notaFiscalRepository->create($dto);
    }
}
