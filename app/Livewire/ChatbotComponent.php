<?php

namespace App\Livewire;

use App\Ai\Agents\DemoAgent;
use Livewire\Component;

class ChatbotComponent extends Component
{
    public $message = '';
    public $messages = []; // ✅ REQUIRED
    public $loading = false; // ✅ NEW
    // public function sendMessage()
    // {
    //     if (trim($this->message) === '') return;

    //     $this->messages[] = [
    //         'role' => 'user',
    //         'text' => $this->message,
    //     ];

    //     $userMessage = $this->message;
    //     $this->msg($userMessage);

    //     $this->loading = false;
    // }

    public function sendMessage()
    {
        if (trim($this->message) === '') return;

        $this->messages[] = [
            'role' => 'user',
            'text' => $this->message,
        ];

        $userMessage = $this->message;
        $this->message = '';
  $this->loading = true;
        // trigger bot separately
        $this->dispatch('generate-bot-response', message: $userMessage);
    }

    #[\Livewire\Attributes\On('generate-bot-response')]
    public function generateBotResponse($message)
    {
        // $this->loading = true;
        $response = (new DemoAgent())->prompt($message);

        $this->messages[] = [
            'role' => 'bot',
            'text' => (string) $response,
        ];
        $this->loading = false;
    }

    public function msg($userMessage)
    {
        // simulate async behavior (UI will show loading)
        $response = (new DemoAgent())->prompt($userMessage);

        $this->messages[] = [
            'role' => 'bot',
            'text' => (string) $response,
        ];
    }

    public function render()
    {
        return view('livewire.chatbot-component', [
            'messages' => $this->messages, // ✅ IMPORTANT FIX
        ]);
    }
}
