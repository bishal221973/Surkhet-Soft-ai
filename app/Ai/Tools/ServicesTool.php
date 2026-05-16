<?php

namespace App\Ai\Tools;

use App\Models\BrandingService;
use App\Models\BrandPortfolio;
use App\Models\PrintCategory;
use App\Models\PrintPortfolio;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;
use Exception;

class ServicesTool implements Tool
{
    /**
     * Tool description
     */
    public function description(): Stringable|string
    {
        return 'This tool is used to handle all service related queries. including list of all service, particular single service and many more related with services';
    }

    /**
     * Execute tool
     */
    public function handle(Request $request): Stringable|string
    {
        try {
            // ✅ Correct way to access data
            $service = $request['service'] ?? null;
            $payload = $request['payload'] ?? '{}';

            // ✅ Normalize bad values like "null", ""
            if ($service === 'null' || $service === '') {
                $service = null;
            }

            // ✅ Decode payload safely
            if (is_string($payload)) {
                $decoded = json_decode($payload, true);
                $payload = json_last_error() === JSON_ERROR_NONE ? $decoded : [];
            }

            if (!is_array($payload)) {
                $payload = [];
            }

            Log::info('ServicesTool executed', [
                'service' => $service,
                'payload' => $payload,
            ]);

            return match ($service) {

                'list' => $this->listServices(),

                // 'automation' => $this->automation($payload),

                // 'design' => $this->design($payload),

                'strategy' => $this->Strategy($payload),
                'branding' => $this->branding($payload),
                'print_design' => $this->printDesign($payload),
                // 'development' => $this->development($payload),
                // 'development' => $this->development($payload),
                // 'development' => $this->development($payload),
                // 'development' => $this->development($payload),
                // 'development' => $this->development($payload),
                // 'development' => $this->development($payload),
                // 'development' => $this->development($payload),

                // ✅ Smart fallback (important)
                null => $this->listServices(),

                default => $this->formatError(
                    "Unknown service: {$service}"
                ),
            };
        } catch (Exception $e) {

            Log::error('ServicesTool error', [
                'error' => $e->getMessage(),
            ]);

            return $this->formatError(
                'Service execution failed: ' . $e->getMessage()
            );
        }
    }

    /**
     * Tool schema
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'service' => $schema->string()
                ->enum(['list', 'strategy', 'branding','print_design', 'automation', 'design', 'development'])
                ->required(),

            'payload' => $schema->object()
                ->nullable(),
        ];
    }

    /**
     * List services
     */
    private function listServices(): string
    {
        return json_encode([
            // [
            //     'name' => 'automation',
            //     'description' => 'Emails, workflows, scheduling, SMS',
            // ],
            // [
            //     'name' => 'design',
            //     'description' => 'Logos, banners, UI/UX, graphics',
            // ],
            // [
            //     'name' => 'development',
            //     'description' => 'APIs, features, bug fixes, migrations',
            // ],
            [
                'name' => 'Strategy',
                'description' => 'Awareness, Lead Capture, Nurture, Conversion,Retention',
            ],
            [
                'name' => 'Branding',
                'description' => 'Graphics Design,Brand Identity,Brand Strategy,Packaging Design,Brand Guidelines,Rebranding',
            ],
            [
                'name' => 'Print and Design',
                'description' => 'Marketing Assets,Event Branding,2D,3D',
            ],
            [
                'name' => 'Production',
                'description' => 'Create an Idea,Production Execution,Delivery & Growth',
            ],
            [
                'name' => 'Marketing',
                'description' => 'Hotels & Hospatility,Restaurants & Cafe, Retail,Suppermarkets, Suppliers, Wholesale, Furniture, General Store, Beaty, Life Style, Advertising, Internet, Tech, Home, Leaving, other in this field we provide marketing service',
            ],
            [
                'name' => 'Development',
                'description' => 'Web Development,Android development,E-Commerce,Custom Software,ERP,Automation',
            ],
            [
                'name' => 'AI / Automation',
                'description' => 'AI Automation,Data Analytics,Fast Processing,Secure AI,Global AI',
            ],
            [
                'name' => 'Scaling and Analytics',
                'description' => 'Scaling and Analytics',
            ],
        ]);
    }

    /**
     * Automation service
     */
    private function strategy(array $payload): string
    {
        $task = $payload['task'] ?? 'all';

        return json_encode([
            'status' => 'success',
            'service' => 'strategy',

            'strategy_process' => [
                [
                    'name' => 'Awareness',
                    'description' => 'Attracts qualified prospects',
                    'actions' => [
                        'Social Ads',
                        'Short form content',
                        'Creative hooks',
                        'Targeted traffic',
                    ],
                ],
                [
                    'name' => 'Lead Capture',
                    'description' => 'Capture contact details',
                    'actions' => [
                        ' High-converting Landing Page',
                        ' Leads Magnets',
                        ' Clear CTA Strategy',
                    ],
                ],
                [
                    'name' => 'Nurture',
                    'description' => 'Build authority & credibility',
                    'actions' => [
                        ' Email Automation',
                        ' Whatsnipg trons',
                        ' Retargeting Ads',
                        ' Case Study remarketing',
                    ],
                ],
                [
                    'name' => 'Conversion',
                    'description' => 'Turn leads into customers',
                    'actions' => [
                        ' Sales page optimization',
                        ' Checkout Ux',
                        ' Booking System Stracture',
                        ' Scarcity miagers',
                    ],
                ],
                [
                    'name' => 'Retention',
                    'description' => 'Keep your audience engaged',
                    'actions' => [
                        '  Regular Email and messaging marketting',
                        '  Personaliz Recomandations',
                        '  Loyalty Programs',
                    ],
                ],
            ],



            'message' => 'Strategy service information retrieved successfully',
        ]);
    }
    private function automation(array $payload): string
    {
        $task = $payload['task'] ?? 'all';

        return json_encode([
            'status' => 'success',
            'service' => 'automation',

            'services_offered' => [
                'Email Marketing Automation',
                'WhatsApp Notification System',
                'Scheduled Campaigns',
                'CRM Workflow Automation',
                'SMS Alert Systems',
            ],

            'recent_projects' => [
                [
                    'title' => 'E-commerce Order Notification System',
                    'type' => 'Automation',
                    'description' => 'Auto email + SMS on order placement',
                ],
                [
                    'title' => 'Hospital Reminder System',
                    'type' => 'Workflow Automation',
                    'description' => 'Appointment reminders via WhatsApp & SMS',
                ],
                [
                    'title' => 'Lead Nurturing Funnel',
                    'type' => 'Email Automation',
                    'description' => 'Drip campaign based on user activity',
                ],
            ],

            'requested_task' => $task,
            'message' => 'Automation service information retrieved successfully',
        ]);
    }
    private function branding(array $payload): string
    {
        $task = $payload['task'] ?? 'all';

        return json_encode([
            'status' => 'success',
            'service' => 'branding',

            'services_offered' => BrandingService::latest()->pluck('name')->toArray(),

            'recent_projects' => BrandPortfolio::latest()
                ->take(3)
                ->get()
                ->map(fn($item) => [
                    'title' => $item->title,
                    'image' => 'https://surkhetsoft.com/storage/'.$item->image, // ✅ FULL URL
                    'description' => $item->description,
                ])
                ->toArray(),

            'message' => 'Branding service information retrieved successfully',
        ]);
    }
    private function printDesign(array $payload): string
    {
        $task = $payload['task'] ?? 'all';

        return json_encode([
            'status' => 'success',
            'service' => 'print and design',

            'print_design_categories' => PrintCategory::latest()->pluck('title')->toArray(),

            'recent_projects' => PrintPortfolio::latest()
                ->take(5)
                ->get()
                ->map(fn($item) => [
                    'title' => $item->name,
                    'image' => 'https://surkhetsoft.com/storage/'.$item->image, // ✅ FULL URL
                    'description' => $item->description,
                ])
                ->toArray(),

            'message' => 'Branding service information retrieved successfully',
        ]);
    }
    /**
     * Design service
     */
    private function design(array $payload): string
    {
        $type = $payload['type'] ?? 'all';

        $designId = 'design_' . uniqid();

        Cache::put(
            "design:{$designId}",
            $payload,
            now()->addDay()
        );

        return json_encode([
            'status' => 'success',
            'service' => 'design',
            'design_id' => $designId,

            // 🔥 ADD THIS: what you actually offer
            'services_offered' => [
                'Logo Design',
                'Brand Identity',
                'UI/UX Design',
                'Social Media Posters',
                'Website Mockups',
                'Banner & Marketing Creatives',
            ],

            // 🔥 ADD THIS: sample projects / portfolio
            'recent_projects' => [
                [
                    'title' => 'Nepbyte Branding Kit',
                    'type' => 'Brand Identity',
                    'description' => 'Full logo, color system, typography setup',
                ],
                [
                    'title' => 'E-commerce UI Design',
                    'type' => 'UI/UX',
                    'description' => 'Modern shopping experience for mobile + web',
                ],
                [
                    'title' => 'Social Media Campaign Set',
                    'type' => 'Marketing Design',
                    'description' => '20+ promotional creatives for Instagram',
                ],
            ],

            // optional filtering
            'requested_type' => $type,

            'message' => 'Design information retrieved successfully',
        ]);
    }

    /**
     * Development service
     */
    private function development(array $payload): string
    {
        $name = $payload['name'] ?? 'all';

        $ticketId = 'DEV-' . strtoupper(uniqid());

        Log::info('Development task created', [
            'ticket_id' => $ticketId,
            'payload' => $payload,
        ]);

        return json_encode([
            'status' => 'success',
            'service' => 'development',
            'ticket_id' => $ticketId,

            'services_offered' => [
                'Laravel Web Applications',
                'REST API Development',
                'Vue.js Frontend Development',
                'Payment Gateway Integration',
                'System Optimization & Bug Fixing',
            ],

            'recent_projects' => [
                [
                    'title' => 'Movie Ticket POS System',
                    'type' => 'Full Stack App',
                    'description' => 'Cinema booking system with membership features',
                ],
                [
                    'title' => 'Live Streaming Backend',
                    'type' => 'Backend System',
                    'description' => 'Scalable streaming + event handling system',
                ],
                [
                    'title' => 'Visitor Management System',
                    'type' => 'Enterprise App',
                    'description' => 'Check-in/check-out system with reports',
                ],
            ],

            'requested_name' => $name,
            'message' => 'Development service information retrieved successfully',
        ]);
    }

    /**
     * Error formatter
     */
    private function formatError(string $message): string
    {
        return json_encode([
            'status' => 'error',
            'message' => $message,
        ]);
    }
}
