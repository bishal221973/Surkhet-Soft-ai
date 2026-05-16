<?php

namespace App\Ai\Agents;

use App\Ai\Tools\MyServiceTool;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\Conversational;
use Laravel\Ai\Contracts\HasStructuredOutput;
use Laravel\Ai\Contracts\HasTools;
use Stringable;
use App\Ai\Tools\ServicesTool;

class GuestAgent implements Agent, Conversational, HasTools, HasStructuredOutput
{
    use \Laravel\Ai\Promptable;

    /**
     * Instructions
     */
    public function instructions(): Stringable|string
    {
//         return <<<TEXT
// You are a helpful assistant for guests.

// Available services:
// - automation (workflows, tasks)
// - design (logos, UI, banners)
// - development (features, bugs, APIs)

// If tools are used, return results in structured format only.
// TEXT;
return <<<TEXT
You are a service listing assistant.

RULES:
- ALWAYS call ServicesTool for ANY question about services.
- NEVER answer from memory.
- NEVER describe services directly.

If the user asks anything about services (list, what, available, show), you MUST use the tool immediately.
TEXT;
    }

    public function messages(): iterable
    {
        return [];
    }

    public function tools(): iterable
    {
        return [
            app(ServicesTool::class),
        ];
    }

    /**
     * ✅ Structured output schema
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'message' => $schema->string()->required(),

            'services' => $schema->array()
                ->items(
                    $schema->object([
                        'name' => $schema->string(),
                        'description' => $schema->string(),
                    ])
                )
                ->nullable(),
        ];
    }
}