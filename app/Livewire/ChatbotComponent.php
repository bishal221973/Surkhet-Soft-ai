<?php

namespace App\Livewire;

use App\Ai\Agents\DemoAgent;
use Livewire\Component;

class ChatbotComponent extends Component
{
    public $message = '';
    public $messages = []; // ✅ REQUIRED
    public $loading = false; // ✅ NEW
    public function sendMessage()
    {
        if (trim($this->message) === '') return;

        $this->messages[] = [
            'role' => 'user',
            'text' => $this->message,
        ];

        $response = (new DemoAgent())
            ->prompt($this->message);

        $this->messages[] = [
            'role' => 'bot',
            'text' => (string) $response,
        ];

        // 4. Clear input
        $this->message = '';
    }

    public function render()
    {
        return view('livewire.chatbot-component', [
            'messages' => $this->messages, // ✅ IMPORTANT FIX
        ]);
    }
}
