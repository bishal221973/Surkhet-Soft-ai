<div style="position: relative">
    <button style="position: fixed;bottom:30px;right:150px">
    <i class="fab fa-facebook-f"></i>
</button>
<div class="chat-wrapper">
    <div class="chat-header">
        <img src="{{ asset('logo1.jpg') }}" style="height: 50px" alt="Logo">
        <span>Surkhet Soft</span>
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

        {{-- @foreach ($messages as $msg)
            <div class="msg {{ $msg['role'] }}">
                @if ($msg['role'] == 'user')
                    <i class="fa fa-user" style="color: #789EC3;position: relative;top:12px"></i>
                @else
                    <img src="{{ asset('logo1.jpg') }}" style="height: 30px;width:30px;object-fit:cover;border-radius:15px" alt="Logo"> 
                @endif
                <div class="bubble">
                    {{ $msg['text'] }}
                </div>
            </div>
        @endforeach --}}
        @forelse ($messages as $msg)
            <div class="msg {{ $msg['role'] }}">
                @if ($msg['role'] == 'user')
                    <i class="fa fa-user" style="color: #789EC3; position: relative; top:12px"></i>
                @else
                    <img src="{{ asset('logo1.jpg') }}"
                        style="height: 30px;width:30px;object-fit:cover;border-radius:15px" alt="Logo">
                @endif

                <div class="bubble">
                    {{ $msg['text'] }}
                </div>
            </div>
        @empty
            <div class="text-center text-muted p-3" style="opacity: 0.5">
                 <img src="{{ asset('logo1.jpg') }}" style="height: 70px;width: 70px;object-fit:cover;border-radius:50%" alt="Logo">
                 <h5 class="p-0 m-0">Surkhet Soft</h5>
                 <h5 class="p-0 m-0" style="font-size: 12px">Digital Assistant</h5>
                 {{-- <h5 class="p-0 m-0" style="font-size: 12px"></h5> --}}
            </div>
        @endforelse

        {{-- 🔥 Loading bubble --}}
        @if ($loading)
            <div class="msg bot">
                <img src="{{ asset('logo1.jpg') }}" style="height: 30px;width:30px;object-fit:cover;border-radius:15px"
                    alt="Logo">
                <div class="bubble typing">
                    <span></span><span></span><span></span>
                </div>
            </div>
        @endif
        <div wire:loading wire:target="sendMessage">
            <div class="msg bot">
                <div class="bubble typing">
                    <span></span><span></span><span></span>
                </div>
            </div>
        </div>
    </div>

    <div class="chat-input">
        <input class="input" type="text" wire:model="message" wire:keydown.enter="sendMessage"
            placeholder="Type your message..." />

        <button wire:click="sendMessage">
            Send <i class="fa-solid fa-paper-plane"></i>
        </button>
    </div>
</div>
</div>

<style>
    .chat-wrapper {
        max-width: 350px;
        min-width: 350px;
        margin: 30px auto;
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid #e5e5e5;
        font-family: Arial, sans-serif;
        background: #fff;
        display: flex;
        flex-direction: column;
        height: 450px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        position: absolute;
        right: 10px;
    }

    /* Header */
    .chat-header {
        padding: 3px 15px;
        background: #789EC3;
        color: white;
        font-weight: bold;
        text-align: center;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Chat box */
    .chat-box {
        flex: 1;
        padding: 15px 5px;
        overflow-y: auto;
        background: #f9fafb;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    /* Messages */
    .msg {
        display: flex;
        gap: 5px
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
        padding: 5px 15px;
        gap: 10px
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
        background: #789EC3;
        color: white;
        cursor: pointer;
        font-weight: bold;
        border-radius: 30px
    }

    .chat-input button:hover {
        background: #16a34a;
    }

    .chat-input i {
        transform: rotate(40deg)
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

        0%,
        80%,
        100% {
            transform: scale(0);
        }

        40% {
            transform: scale(1);
        }
    }

    .input {
        border-radius: 30px;
        border: 1px solid #ccc !important;
    }
</style>
