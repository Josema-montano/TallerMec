<?php

namespace App\Providers;

use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Mail\MailManager;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;
use Resend\Client;
use Resend\ValueObjects\Transporter\BaseUri;
use Resend\ValueObjects\Transporter\Headers;
use Resend\Transporters\HttpTransporter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Mail::extend('resend', function () {
            $config = $this->app['config']->get('services.resend', []);

            $guzzleClient = new GuzzleClient([
                'verify' => false, // Disable SSL verification
            ]);

            return new \Illuminate\Mail\Transport\ResendTransport(
                new Client(
                        new HttpTransporter(
                            $guzzleClient,
                            new BaseUri('https://api.resend.com'),
                            new Headers(['Authorization' => 'Bearer ' . ($config['key'] ?? null)])
                        )
                    )
            );
        });
    }
}
