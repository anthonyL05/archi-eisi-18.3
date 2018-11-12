<?php

declare(strict_types=1);

namespace App\UI\Action;

use App\Infrastructure\Repository\Invoice;
use App\UI\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class Home
{
    private $invoiceRepository;
    private $serializer;

    public function __construct(Invoice $invoiceRepository, Serializer $serializer)
    {
        $this->invoiceRepository = $invoiceRepository;
        $this->serializer = $serializer;
    }

    public function handle(): Response
    {
        return new JsonResponse([
            'success' => true,
            'invoices' => $this->serializer->serialize($this->invoiceRepository->findAll()),
        ]);
    }
}