<?php

namespace Database\Seeders;

use App\Models\BuyerProfile;
use App\Models\Category;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use App\Models\CommissionRule;
use App\Models\Invoice;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderEvent;
use App\Models\Payment;
use App\Models\Payout;
use App\Models\Plan;
use App\Models\Port;
use App\Models\Quotation;
use App\Models\Review;
use App\Models\ServiceRequest;
use App\Models\Subcategory;
use App\Models\Subscription;
use App\Models\User;
use App\Models\VendorProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedCatalog();
        $this->seedHeroSlides();
        $this->seedUsers();
        $this->seedDomain();
    }

    protected function seedCatalog(): void
    {
        // Ports — major Indian ports
        $ports = [
            ['name' => 'JNPT (Nhava Sheva)', 'code' => 'JNPT',  'region' => 'West'],
            ['name' => 'Mundra Port',        'code' => 'MUND',  'region' => 'West'],
            ['name' => 'Chennai Port',       'code' => 'MAA',   'region' => 'South'],
            ['name' => 'Visakhapatnam Port', 'code' => 'VTZ',   'region' => 'East'],
            ['name' => 'Cochin Port',        'code' => 'COK',   'region' => 'South'],
            ['name' => 'Kolkata Port',       'code' => 'CCU',   'region' => 'East'],
            ['name' => 'Paradip Port',       'code' => 'PRDP',  'region' => 'East'],
            ['name' => 'Tuticorin Port',     'code' => 'TUT',   'region' => 'South'],
            ['name' => 'Kandla Port',        'code' => 'KDL',   'region' => 'West'],
            ['name' => 'Mangalore Port',     'code' => 'NMP',   'region' => 'South'],
        ];
        foreach ($ports as $p) {
            Port::firstOrCreate(['code' => $p['code']], $p + ['country' => 'India', 'is_active' => true]);
        }

        // Categories with subcategories
        $cats = [
            ['name' => 'Pilotage', 'icon' => '⚓', 'subs' => ['Inbound Pilotage', 'Outbound Pilotage', 'Shifting']],
            ['name' => 'Towage',   'icon' => '🚢', 'subs' => ['Harbour Tug', 'Sea Tug', 'Anchor Handling']],
            ['name' => 'Berthing', 'icon' => '⚓', 'subs' => ['Mooring', 'Unmooring', 'Berth Allocation']],
            ['name' => 'Bunkering','icon' => '⛽', 'subs' => ['Marine Gas Oil', 'VLSFO', 'LNG Bunkering']],
            ['name' => 'Cargo Handling','icon' => '📦', 'subs' => ['Container Handling', 'Bulk Cargo', 'Project Cargo']],
            ['name' => 'Ship Chandling','icon' => '🥖', 'subs' => ['Provisions', 'Deck Stores', 'Cabin Stores']],
            ['name' => 'Ship Repair','icon' => '🔧', 'subs' => ['Hull Repair', 'Engine Repair', 'Electrical']],
            ['name' => 'Surveying','icon' => '📋', 'subs' => ['Pre-purchase', 'Damage Survey', 'Cargo Survey']],
            ['name' => 'Crew Services','icon' => '👥', 'subs' => ['Crew Change', 'Visa', 'Transportation']],
            ['name' => 'Customs & Clearance','icon' => '📑', 'subs' => ['Import', 'Export', 'Transit']],
        ];
        foreach ($cats as $i => $c) {
            $cat = Category::firstOrCreate(
                ['slug' => Str::slug($c['name'])],
                ['name' => $c['name'], 'icon' => $c['icon'], 'display_order' => $i, 'is_active' => true]
            );
            foreach ($c['subs'] as $j => $sub) {
                Subcategory::firstOrCreate(
                    ['category_id' => $cat->id, 'slug' => Str::slug($sub)],
                    ['name' => $sub, 'display_order' => $j, 'is_active' => true]
                );
            }
        }

        // Plans
        Plan::firstOrCreate(['slug' => 'vendor-basic'], [
            'name' => 'Vendor Basic', 'audience' => 'vendor',
            'price_monthly' => 999, 'price_yearly' => 9999, 'currency' => 'INR',
            'features' => ['10 leads / month','Standard listing','Email support'],
            'lead_credits' => 10, 'is_active' => true,
        ]);
        Plan::firstOrCreate(['slug' => 'vendor-pro'], [
            'name' => 'Vendor Pro', 'audience' => 'vendor',
            'price_monthly' => 2499, 'price_yearly' => 24999, 'currency' => 'INR',
            'features' => ['50 leads / month','Premium badge','Priority placement','Phone support'],
            'lead_credits' => 50, 'is_active' => true,
        ]);
        Plan::firstOrCreate(['slug' => 'vendor-enterprise'], [
            'name' => 'Vendor Enterprise', 'audience' => 'vendor',
            'price_monthly' => 7999, 'price_yearly' => 79999, 'currency' => 'INR',
            'features' => ['Unlimited leads','Premium badge','Dedicated account manager','API access'],
            'lead_credits' => 9999, 'is_active' => true,
        ]);

        // Commission rules — 10% default
        CommissionRule::firstOrCreate(
            ['category_id' => null, 'port_id' => null, 'type' => 'percentage'],
            ['value' => 10.0, 'is_active' => true]
        );
    }

    protected function seedHeroSlides(): void
    {
        $now = now();
        $slides = [
            ['title' => 'The first marketplace for marine services', 'subtitle' => 'Verified vendors across 14 global ports', 'cta_text' => 'Get started', 'cta_url' => '/signup', 'display_order' => 1],
            ['title' => 'Settle in hours, not weeks',                'subtitle' => 'INR & USD supported, instant invoicing',    'cta_text' => 'Learn more', 'cta_url' => '/how-it-works', 'display_order' => 2],
        ];
        foreach ($slides as $s) {
            $exists = DB::table('hero_slides')->where('title', $s['title'])->exists();
            if (! $exists) {
                DB::table('hero_slides')->insert($s + ['is_active' => true, 'created_at' => $now, 'updated_at' => $now]);
            }
        }
    }

    protected function seedUsers(): void
    {
        // Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@portda.test'],
            [
                'name' => 'Aanya Sharma', 'phone' => '+919900000001',
                'password' => Hash::make('password'),
                'role' => 'admin', 'status' => 'active',
            ]
        );

        // 5 buyers
        $buyerData = [
            ['name' => 'OceanLink Shipping', 'email' => 'buyer1@portda.test', 'phone' => '+919900001001', 'company' => 'OceanLink Shipping Pvt Ltd', 'port' => 'JNPT'],
            ['name' => 'Saffron Fleet Mgmt', 'email' => 'buyer2@portda.test', 'phone' => '+919900001002', 'company' => 'Saffron Fleet Management', 'port' => 'MUND'],
            ['name' => 'Bharat Shipping',    'email' => 'buyer3@portda.test', 'phone' => '+919900001003', 'company' => 'Bharat Shipping Ltd',     'port' => 'MAA'],
            ['name' => 'Indus Maritime',     'email' => 'buyer4@portda.test', 'phone' => '+919900001004', 'company' => 'Indus Maritime Inc',     'port' => 'VTZ'],
            ['name' => 'Coromandel Lines',   'email' => 'buyer5@portda.test', 'phone' => '+919900001005', 'company' => 'Coromandel Lines',       'port' => 'COK'],
        ];
        foreach ($buyerData as $b) {
            $port = Port::where('code', $b['port'])->first();
            $user = User::firstOrCreate(['email' => $b['email']], [
                'name' => $b['name'], 'phone' => $b['phone'],
                'password' => Hash::make('password'),
                'role' => 'buyer', 'status' => 'active',
            ]);
            BuyerProfile::firstOrCreate(['user_id' => $user->id], [
                'company_name' => $b['company'], 'default_port_id' => $port?->id,
                'city' => 'Mumbai', 'state' => 'Maharashtra', 'country' => 'India',
                'gst_number' => '27ABCDE'.rand(1000,9999).'F1Z'.rand(1,9),
            ]);
        }

        // 8 vendors with varying ports/categories
        $vendorData = [
            ['name' => 'Sagarmala Pilots',     'company' => 'Sagarmala Pilots Pvt Ltd',  'categories' => ['Pilotage','Berthing'],          'ports' => ['JNPT','MUND'],         'rating' => 4.8, 'jobs' => 124, 'premium' => true],
            ['name' => 'Konkan Tug Services',  'company' => 'Konkan Tug Services',       'categories' => ['Towage'],                       'ports' => ['JNPT','COK','MUND'],   'rating' => 4.6, 'jobs' => 98,  'premium' => false],
            ['name' => 'Marine Fuels India',   'company' => 'Marine Fuels India Ltd',    'categories' => ['Bunkering'],                    'ports' => ['MUND','KDL'],          'rating' => 4.7, 'jobs' => 156, 'premium' => true],
            ['name' => 'PortCo Cargo',         'company' => 'PortCo Cargo Solutions',    'categories' => ['Cargo Handling','Customs & Clearance'], 'ports' => ['MAA','VTZ'],   'rating' => 4.4, 'jobs' => 67,  'premium' => false],
            ['name' => 'Galaxy Ship Stores',   'company' => 'Galaxy Ship Stores',        'categories' => ['Ship Chandling'],               'ports' => ['JNPT','COK','MAA'],    'rating' => 4.5, 'jobs' => 88,  'premium' => false],
            ['name' => 'Indian Marine Repairs','company' => 'Indian Marine Repairs',     'categories' => ['Ship Repair'],                  'ports' => ['MUND','VTZ'],          'rating' => 4.3, 'jobs' => 45,  'premium' => false],
            ['name' => 'Surveyors Guild',      'company' => 'Surveyors Guild India',     'categories' => ['Surveying'],                    'ports' => ['JNPT','MAA','COK','VTZ'], 'rating' => 4.9, 'jobs' => 210, 'premium' => true],
            ['name' => 'CrewLink Services',    'company' => 'CrewLink Services Pvt Ltd', 'categories' => ['Crew Services'],                'ports' => ['JNPT','MUND','MAA'],   'rating' => 4.2, 'jobs' => 33,  'premium' => false],
        ];

        foreach ($vendorData as $i => $v) {
            $email = 'vendor'.($i+1).'@portda.test';
            $user = User::firstOrCreate(['email' => $email], [
                'name' => $v['name'], 'phone' => '+919900002'.str_pad($i+1, 3, '0', STR_PAD_LEFT),
                'password' => Hash::make('password'),
                'role' => 'vendor', 'status' => 'active',
            ]);
            $vp = VendorProfile::firstOrCreate(['user_id' => $user->id], [
                'company_name' => $v['company'],
                'bio' => "{$v['company']} — trusted port services partner.",
                'city' => 'Mumbai', 'state' => 'Maharashtra', 'country' => 'India',
                'rating' => $v['rating'], 'rating_count' => max(5, (int) ($v['jobs'] * 0.3)),
                'jobs_completed' => $v['jobs'],
                'verification_status' => 'verified',
                'is_premium' => $v['premium'],
                'gst_number' => '27ZXVDE'.rand(1000,9999).'F'.rand(1,9).'Z'.rand(1,9),
            ]);

            // Categories
            $catIds = Category::whereIn('name', $v['categories'])->pluck('id')->all();
            DB::table('vendor_categories')->where('vendor_profile_id', $vp->id)->delete();
            foreach ($catIds as $cid) {
                DB::table('vendor_categories')->insert([
                    'vendor_profile_id' => $vp->id, 'category_id' => $cid,
                    'created_at' => now(), 'updated_at' => now(),
                ]);
            }
            // Ports
            $portIds = Port::whereIn('code', $v['ports'])->pluck('id')->all();
            $vp->ports()->sync($portIds);
        }

        // Give vendor1 an active subscription
        $v1 = User::where('email', 'vendor1@portda.test')->first();
        $proPlan = Plan::where('slug', 'vendor-pro')->first();
        if ($v1 && $proPlan) {
            Subscription::firstOrCreate(['user_id' => $v1->id, 'status' => 'active'], [
                'plan_id' => $proPlan->id,
                'billing_cycle' => 'monthly',
                'amount' => $proPlan->price_monthly,
                'currency' => 'INR',
                'started_at' => now()->subDays(5),
                'current_period_end' => now()->addDays(25),
                'credits_remaining' => 42,
            ]);
        }
    }

    protected function seedDomain(): void
    {
        $buyers   = User::where('role','buyer')->get();
        $vendors  = User::where('role','vendor')->get();
        $catPilot = Category::where('name','Pilotage')->first();
        $catTow   = Category::where('name','Towage')->first();
        $catBunk  = Category::where('name','Bunkering')->first();
        $catChand = Category::where('name','Ship Chandling')->first();
        $portJNPT = Port::where('code','JNPT')->first();
        $portMUND = Port::where('code','MUND')->first();
        $portMAA  = Port::where('code','MAA')->first();

        if ($buyers->isEmpty() || $vendors->isEmpty()) return;

        // 1) Open request with multiple quotes (pilotage at JNPT)
        $sr1 = ServiceRequest::create([
            'buyer_id' => $buyers[0]->id,
            'port_id' => $portJNPT->id,
            'category_id' => $catPilot->id,
            'vessel_name' => 'MV Pacific Bridge',
            'imo_number' => '9456712',
            'title' => 'Pilotage required for MV Pacific Bridge',
            'description' => 'Vessel arriving 18 May, requires inbound pilotage at JNPT.',
            'service_date' => now()->addDays(2)->toDateString(),
            'budget_min' => 150000, 'budget_max' => 250000,
            'urgency' => 'urgent', 'status' => 'quoted',
        ]);

        $vp1 = $vendors->where('email','vendor1@portda.test')->first();
        $vp2 = $vendors->where('email','vendor2@portda.test')->first();
        if ($vp1) Quotation::create([
            'service_request_id' => $sr1->id, 'vendor_id' => $vp1->id,
            'amount' => 185000, 'notes' => 'All-inclusive pilotage with experienced pilot.',
            'status' => 'submitted', 'valid_until' => now()->addDays(3),
        ]);
        if ($vp2) Quotation::create([
            'service_request_id' => $sr1->id, 'vendor_id' => $vp2->id,
            'amount' => 220000, 'notes' => 'Premium service with tug standby.',
            'status' => 'submitted', 'valid_until' => now()->addDays(3),
        ]);

        // 2) Awarded request → Order (bunkering at Mundra)
        $sr2 = ServiceRequest::create([
            'buyer_id' => $buyers[1]->id,
            'port_id' => $portMUND->id,
            'category_id' => $catBunk->id,
            'vessel_name' => 'MV Star Voyager',
            'title' => 'VLSFO bunkering — 500 MT',
            'description' => '500 MT VLSFO delivery on 20 May at Mundra.',
            'budget_min' => 18000000, 'budget_max' => 22000000,
            'status' => 'awarded',
        ]);
        $vBunk = $vendors->where('email','vendor3@portda.test')->first();
        if ($vBunk) {
            $q = Quotation::create([
                'service_request_id' => $sr2->id, 'vendor_id' => $vBunk->id,
                'amount' => 19500000, 'status' => 'accepted',
                'notes' => 'Quality VLSFO, certificate provided.',
                'accepted_at' => now()->subDays(1),
            ]);
            $order = Order::create([
                'service_request_id' => $sr2->id,
                'quotation_id' => $q->id,
                'buyer_id' => $sr2->buyer_id,
                'vendor_id' => $vBunk->id,
                'subtotal' => 19500000, 'tax' => 0, 'commission' => 1950000, 'total' => 19500000,
                'currency' => 'INR',
                'status' => 'in_progress',
                'payment_status' => 'paid',
                'scheduled_at' => now()->addDays(1),
                'started_at' => now()->subHours(4),
            ]);
            OrderEvent::create(['order_id' => $order->id, 'actor_id' => $sr2->buyer_id, 'event' => 'order_placed']);
            OrderEvent::create(['order_id' => $order->id, 'actor_id' => $vBunk->id, 'event' => 'started']);

            $pay = Payment::create([
                'order_id' => $order->id, 'payer_id' => $order->buyer_id,
                'amount' => 19500000, 'method' => 'razorpay', 'type' => 'online',
                'status' => 'success', 'paid_at' => now()->subHours(6),
                'gateway_txn_id' => 'pay_'.uniqid(),
            ]);
            Invoice::create([
                'number' => 'INV-'.strtoupper(uniqid()),
                'order_id' => $order->id, 'buyer_id' => $order->buyer_id, 'vendor_id' => $order->vendor_id,
                'subtotal' => 19500000, 'total' => 19500000,
                'currency' => 'INR', 'status' => 'issued', 'issued_at' => now()->subHours(6)->toDateString(),
            ]);
            Payout::create([
                'vendor_id' => $order->vendor_id, 'order_id' => $order->id,
                'amount' => 19500000, 'commission' => 1950000, 'net_amount' => 17550000,
                'currency' => 'INR', 'status' => 'pending',
            ]);
            Notification::create([
                'user_id' => $vBunk->id, 'type' => 'payment.received',
                'title' => 'Payment received', 'body' => 'Order '.$order->reference.' paid.',
            ]);
        }

        // 3) Completed orders with reviews — for vendor1 (pilots)
        if ($vp1) {
            foreach (range(1, 4) as $i) {
                $buyer = $buyers[($i - 1) % $buyers->count()];
                $sr = ServiceRequest::create([
                    'buyer_id' => $buyer->id,
                    'port_id' => $portJNPT->id,
                    'category_id' => $catPilot->id,
                    'vessel_name' => 'MV Sample '.$i,
                    'title' => 'Pilotage #'.$i,
                    'status' => 'completed',
                ]);
                $q = Quotation::create([
                    'service_request_id' => $sr->id, 'vendor_id' => $vp1->id,
                    'amount' => 175000 + ($i * 5000), 'status' => 'accepted', 'accepted_at' => now()->subDays(10 + $i),
                ]);
                $order = Order::create([
                    'service_request_id' => $sr->id,
                    'quotation_id' => $q->id,
                    'buyer_id' => $buyer->id, 'vendor_id' => $vp1->id,
                    'subtotal' => $q->amount, 'commission' => round((float)$q->amount * 0.1, 2), 'total' => $q->amount,
                    'currency' => 'INR',
                    'status' => 'completed', 'payment_status' => 'paid',
                    'started_at' => now()->subDays(9 + $i),
                    'completed_at' => now()->subDays(7 + $i),
                ]);
                Payment::create([
                    'order_id' => $order->id, 'payer_id' => $buyer->id, 'amount' => $order->total,
                    'method' => 'upi', 'type' => 'online', 'status' => 'success', 'paid_at' => now()->subDays(7 + $i),
                ]);
                Invoice::create([
                    'number' => 'INV-'.strtoupper(uniqid()),
                    'order_id' => $order->id, 'buyer_id' => $buyer->id, 'vendor_id' => $vp1->id,
                    'subtotal' => $order->total, 'total' => $order->total,
                    'currency' => 'INR', 'status' => 'issued', 'issued_at' => now()->subDays(7 + $i)->toDateString(),
                ]);
                Review::create([
                    'order_id' => $order->id,
                    'buyer_id' => $buyer->id,
                    'vendor_id' => $vp1->id,
                    'rating' => 5,
                    'title' => 'Excellent pilotage service',
                    'body' => 'Smooth, professional, on time.',
                    'tags' => ['on-time','professional'],
                    'status' => 'published',
                ]);
            }
        }

        // 4) Pending offline payment (admin must verify)
        $srPending = ServiceRequest::create([
            'buyer_id' => $buyers[2]->id,
            'port_id' => $portMAA->id,
            'category_id' => $catChand->id,
            'vessel_name' => 'MV Coromandel',
            'title' => 'Provisions for 7-day voyage',
            'status' => 'awarded',
        ]);
        $vChand = $vendors->where('email','vendor5@portda.test')->first();
        if ($vChand) {
            $qP = Quotation::create([
                'service_request_id' => $srPending->id, 'vendor_id' => $vChand->id,
                'amount' => 240000, 'status' => 'accepted', 'accepted_at' => now()->subHours(8),
            ]);
            $orderP = Order::create([
                'service_request_id' => $srPending->id, 'quotation_id' => $qP->id,
                'buyer_id' => $srPending->buyer_id, 'vendor_id' => $vChand->id,
                'subtotal' => 240000, 'commission' => 24000, 'total' => 240000,
                'currency' => 'INR',
                'status' => 'placed', 'payment_status' => 'pending',
            ]);
            Payment::create([
                'order_id' => $orderP->id, 'payer_id' => $srPending->buyer_id,
                'amount' => 240000, 'method' => 'neft', 'type' => 'offline',
                'status' => 'pending', 'utr_number' => 'UTR'.rand(100000,999999).rand(1000,9999),
            ]);
        }

        // 5) Chat rooms + messages
        if ($vp1) {
            $room = ChatRoom::firstOrCreate(
                ['buyer_id' => $buyers[0]->id, 'vendor_id' => $vp1->id, 'service_request_id' => $sr1->id],
                ['last_message_at' => now()->subMinutes(5)]
            );
            ChatMessage::create(['chat_room_id'=>$room->id,'sender_id'=>$buyers[0]->id,'body'=>'When can the pilot board?','type'=>'text']);
            ChatMessage::create(['chat_room_id'=>$room->id,'sender_id'=>$vp1->id,'body'=>'Tomorrow 09:00 IST. Confirmed.','type'=>'text','read_at'=>now()]);
            $room->forceFill(['last_message_at' => now()->subMinutes(2)])->save();
        }

        // 6) Notifications
        Notification::create(['user_id'=>$buyers[0]->id, 'type'=>'quotation.received', 'title'=>'2 new quotes received', 'body'=>'On '.$sr1->reference]);
        Notification::create(['user_id'=>$buyers[0]->id, 'type'=>'system', 'title'=>'Welcome to PORTDA!', 'body'=>'Get started by posting your first request.']);
        if ($vp1) Notification::create(['user_id'=>$vp1->id, 'type'=>'lead.new', 'title'=>'New lead available', 'body'=>'Pilotage at JNPT — '.$sr1->reference]);
    }
}
