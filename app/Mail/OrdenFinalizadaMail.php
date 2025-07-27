<?php

namespace App\Mail;

use App\Models\OrdenTrabajo;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrdenFinalizadaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $orden;

    public function __construct(OrdenTrabajo $orden)
    {
        $this->orden = $orden;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Su vehículo está listo para recoger - Taller Mecánico',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.orden-finalizada',
            with: [
                'orden' => $this->orden,
                'cliente' => $this->orden->vehiculo->cliente,
                'vehiculo' => $this->orden->vehiculo
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}