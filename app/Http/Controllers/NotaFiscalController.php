<?php

namespace App\Http\Controllers;

use App\DTOs\NotaFiscal\CreateNotaFiscalDTO;
use App\Http\Requests\NotaFiscal\CreateNotaFiscalRequest;
use App\Http\Requests\NotaFiscal\UpdateNotaFiscalRequest;
use App\Http\Resources\NotaFiscal\CreateNotaFiscalRequestResource;
use App\Services\NotaFiscalService;
use Illuminate\Http\Request;

class NotaFiscalController extends Controller
{
    private $notaFiscalService;

    public function __construct()
    {
        $this->notaFiscalService = new NotaFiscalService();
    }
    public function create(CreateNotaFiscalRequest $request) // Create -> Criar Notas Fiscais
    {
        $notaFiscal = $this->notaFiscalService->newNotaFiscal(CreateNotaFiscalDTO::makeFromRequest($request));
        return new CreateNotaFiscalRequestResource($notaFiscal);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotaFiscalRequest $request)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
