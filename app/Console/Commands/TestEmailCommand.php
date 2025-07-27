<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Exception;

class TestEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:test {email=taller.mecanico.pruebas@gmail.com}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test email sending with Resend';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        
        $this->info('Testing email sending with Resend...');
        $this->info('Email: ' . $email);
        $this->info('Resend Key: ' . (config('services.resend.key') ? 'Configured' : 'Not configured'));
        $this->info('Mail Mailer: ' . config('mail.default'));
        
        try {
            Mail::raw('This is a test email from Laravel using Resend API.', function ($message) use ($email) {
                $message->to($email)
                        ->subject('Test Email - Laravel Resend Integration')
                        ->from(config('mail.from.address'), config('mail.from.name'));
            });
            
            $this->info('✅ Email sent successfully!');
        } catch (Exception $e) {
            $this->error('❌ Error sending email: ' . $e->getMessage());
            $this->error('Full error: ' . $e->getTraceAsString());
        }
    }
}
