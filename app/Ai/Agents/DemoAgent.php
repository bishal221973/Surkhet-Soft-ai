<?php

namespace App\Ai\Agents;

use App\Ai\Tools\ServicesTool;
use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\Conversational;
use Laravel\Ai\Contracts\HasTools;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Messages\Message;
use Laravel\Ai\Promptable;
use Stringable;

class DemoAgent implements Agent, Conversational, HasTools
{
    use Promptable;

    /**
     * Get the instructions that the agent should follow.
     */
    public function instructions(): Stringable|string
    {
        return <<<TEXT
You are a tool-using assistant.

Rules:
- Use ServicesTool when user asks about services.
- If tool result is provided, return it directly without modification.
- Do not explain tool output.
- If has image or url, git it without any modifing it
TEXT;

// return <<<TEXT
// You are a strict API tool caller.

// MANDATORY RULES:

// 1. ALWAYS call ServicesTool for ANY service-related query.
// 2. NEVER answer using your own knowledge.
// 3. You can summarize tool output but if has image url then show proper url as it is without modifing url.
// 4. NEVER explain anything.
// 5. NEVER wrap response inside "result".
// 6. NEVER modify tool response.
// 7. NEVER add extra text.

// FINAL OUTPUT RULE:
// - If tool is called → RETURN EXACT TOOL RESPONSE ONLY
// - Output must be RAW JSON
// - No prefixes, no suffixes, no formatting

// If you cannot call the tool → return:
// {"status":"error","message":"Tool not used"}

// NO TEXT. ONLY JSON.
// TEXT;
    }

    /**
     * Get the list of messages comprising the conversation so far.
     *
     * @return Message[]
     */
    public function messages(): iterable
    {
        return [];
    }

    /**
     * Get the tools available to the agent.
     *
     * @return Tool[]
     */
    public function tools(): iterable
    {
        return [
            app(ServicesTool::class),
        ];
    }
}
