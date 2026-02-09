<?php

namespace App\Livewire\Components;

use Livewire\Component;
use NotificationChannels\Telegram\Telegram;

class ContactForm extends Component
{
    public $sent = false;
    public $name;
    public $email;
    public $message;
    public $telephone;
    public $company;
    public function render()
    {
        return view('livewire.components.contact-form');
    }

    public function send() {
        $text = "*Новая заявка!*\n\n" .
            "Имя: " . $this->name . "\n" .
            "Компания: " . $this->company . "\n" .
            "Телефон: " . $this->telephone . "\n" .
            "Email: " . $this->email . "\n" .
            "Комментарий: " . $this->message
        ;
        app(Telegram::class)->sendMessage([
            'chat_id' => '-5234170411',
            'text' => $text,
            'parse_mode' => 'Markdown',
        ]);

        $this->sent = true;
    }
}
