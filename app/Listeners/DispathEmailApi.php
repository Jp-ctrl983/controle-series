<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\ApiSetEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mailtrap\MailtrapClient;
use Mailtrap\Mime\MailtrapEmail;
use Symfony\Component\Mime\Address;

class DispathEmailApi
{
    public function __construct()
    {
        //
    }

    public function handle(ApiSetEmail $event)
    {
        $email = (new MailtrapEmail())
            ->from(new Address('hello@demomailtrap.co', 'Sistema de series'))
            ->to(new Address($event->email))

            ->subject('Serie enviada foi: ' . $event->seriesName)
            ->category('Serie')
            ->html($event->html);

        MailtrapClient::initSendingEmails(
            apiKey: 'a1d1f209adae9f170a7db302112271ee'
        )->send($email);
    }
}
