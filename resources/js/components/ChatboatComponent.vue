<template>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-lg chat-card">

                    <!-- Header -->
                    <div class="card-header bg-dark text-white">
                        💬 AI Chatbot
                    </div>

                    <!-- Chat Body -->
                    <div class="card-body chat-box" ref="chatBox">
                        <div
                            v-for="(msg, index) in messages"
                            :key="index"
                            :class="['message', msg.role]"
                        >
                            <div class="bubble">
                                {{ msg.text }}
                            </div>
                        </div>

                        <!-- Typing indicator -->
                        <div v-if="loading" class="message bot">
                            <div class="bubble typing">
                                <span></span><span></span><span></span>
                            </div>
                        </div>
                    </div>

                    <!-- Input -->
                    <div class="card-footer d-flex gap-2">
                        <input
                            v-model="message"
                            @keyup.enter="sendMessage"
                            type="text"
                            class="form-control"
                            placeholder="Type your message..."
                        />

                        <button
                            class="btn btn-success"
                            @click="sendMessage"
                        >
                            Send
                        </button>
                    </div>

                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            message: '',
            messages: [],
            loading: false
        }
    },

    methods: {
        async sendMessage() {
            if (!this.message.trim()) return

            // user message
            this.messages.push({
                role: 'user',
                text: this.message
            })

            const userMessage = this.message
            this.message = ''

            this.scrollToBottom()

            // show typing
            this.loading = true

            // 🔥 simulate API call (replace with Laravel API later)
            setTimeout(() => {
                this.messages.push({
                    role: 'bot',
                    text: 'You said: ' + userMessage
                })

                this.loading = false
                this.scrollToBottom()
            }, 1200)
        },

        scrollToBottom() {
            this.$nextTick(() => {
                const box = this.$refs.chatBox
                box.scrollTop = box.scrollHeight
            })
        }
    }
}
</script>

<style scoped>
.chat-box {
    height: 450px;
    overflow-y: auto;
    background: #f8f9fa;
    padding: 10px;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.message {
    display: flex;
}

.message.user {
    justify-content: flex-end;
}

.message.bot {
    justify-content: flex-start;
}

.bubble {
    max-width: 70%;
    padding: 10px 14px;
    border-radius: 12px;
    font-size: 14px;
}

.message.user .bubble {
    background: #0d6efd;
    color: white;
    border-bottom-right-radius: 4px;
}

.message.bot .bubble {
    background: #e9ecef;
    color: #000;
    border-bottom-left-radius: 4px;
}

/* typing animation */
.typing {
    display: flex;
    gap: 4px;
}

.typing span {
    width: 8px;
    height: 8px;
    background: #666;
    border-radius: 50%;
    animation: bounce 1.4s infinite ease-in-out both;
}

.typing span:nth-child(2) {
    animation-delay: 0.2s;
}

.typing span:nth-child(3) {
    animation-delay: 0.4s;
}

@keyframes bounce {
    0%, 80%, 100% {
        transform: scale(0);
    }
    40% {
        transform: scale(1);
    }
}
</style>