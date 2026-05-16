<div class="chat-wrapper">
    <div class="chat-header">
        💬 AI Chatbot
    </div>

    {{-- <div class="chat-box">
        @foreach ($messages as $msg)
            <div class="msg {{ $msg['role'] }}">
                <div class="bubble">
                    {{ $msg['text'] }}
                </div>
            </div>
        @endforeach
    </div> --}}
    <div class="chat-box">
        @foreach ($messages as $msg)
            <div class="msg {{ $msg['role'] }}">
                <div class="bubble">
                    {{ $msg['text'] }}
                </div>
            </div>
        @endforeach

        {{-- 🔥 Loading bubble --}}
        @if ($loading)
            <div class="msg bot">
                <div class="bubble typing">
                    <span></span><span></span><span></span>
                </div>
            </div>
        @endif
    </div>

    <div class="chat-input">
        <input type="text" wire:model="message" wire:keydown.enter="sendMessage" placeholder="Type your message..." />

        <button wire:click="sendMessage">
            Send
        </button>
    </div>
</div>

<style>
    .chat-wrapper {
        max-width: 650px;
        margin: 30px auto;
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid #e5e5e5;
        font-family: Arial, sans-serif;
        background: #fff;
        display: flex;
        flex-direction: column;
        height: 600px;
    }

    /* Header */
    .chat-header {
        padding: 15px;
        background: #111827;
        color: white;
        font-weight: bold;
        text-align: center;
    }

    /* Chat box */
    .chat-box {
        flex: 1;
        padding: 15px;
        overflow-y: auto;
        background: #f9fafb;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    /* Messages */
    .msg {
        display: flex;
    }

    .msg.user {
        justify-content: flex-end;
    }

    .msg.bot {
        justify-content: flex-start;
    }

    .bubble {
        max-width: 75%;
        padding: 10px 14px;
        border-radius: 12px;
        font-size: 14px;
        line-height: 1.4;
    }

    /* User bubble */
    .msg.user .bubble {
        background: #3b82f6;
        color: white;
        border-bottom-right-radius: 4px;
    }

    /* Bot bubble */
    .msg.bot .bubble {
        background: #e5e7eb;
        color: #111827;
        border-bottom-left-radius: 4px;
    }

    /* Input */
    .chat-input {
        display: flex;
        border-top: 1px solid #e5e5e5;
        background: white;
    }

    .chat-input input {
        flex: 1;
        padding: 12px;
        border: none;
        outline: none;
        font-size: 14px;
    }

    .chat-input button {
        padding: 12px 18px;
        border: none;
        background: #22c55e;
        color: white;
        cursor: pointer;
        font-weight: bold;
    }

    .chat-input button:hover {
        background: #16a34a;
    }
    .typing {
    display: flex;
    gap: 4px;
    align-items: center;
}

.typing span {
    width: 8px;
    height: 8px;
    background: #999;
    border-radius: 50%;
    display: inline-block;
    animation: bounce 1.4s infinite ease-in-out both;
}

.typing span:nth-child(2) {
    animation-delay: 0.2s;
}

.typing span:nth-child(3) {
    animation-delay: 0.4s;
}

@keyframes bounce {
    0%, 80%, 100% { transform: scale(0); }
    40% { transform: scale(1); }
}
</style>
