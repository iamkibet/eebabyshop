<?php

namespace Database\Seeders;

use App\Models\{Category, ContactMessage, Currency, Discount, Order, OrderItem, Post, Product, ProductFeature, ProductImages, ProductRating, ProductReview, Tag, User};
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    private array $currencies = [
        ['name' => 'USD', 'rate' => 125.50, 'symbol' => '$'],
        ['name' => 'EUR', 'rate' => 132.79, 'symbol' => '€'],
        ['name' => 'GBP', 'rate' => 157.50, 'symbol' => '£'],
        ['name' => 'CNY', 'rate' => 14.60, 'symbol' => '¥']
    ];

    public function run(): void
    {
        $isProduction = app()->environment('production');
        $count = $isProduction ? 1 : 50;

        // Always create admin user
        $admin = tap(User::factory()->create([
            'name' => 'Admin',
            'email' => config('app.admin.email'),
            'password' => Hash::make(config('app.admin.password'))
        ]), function (User $user) {
            $user->role = 'A';
            $user->save();
        });

        // Seed users based on environment
        $users = User::factory()
            ->count($isProduction ? 0 : $count)
            ->create(['created_at' => now()->subMonths(rand(0, 5))]);

        // Core content seeding
        $this->seedContent($isProduction, $count);
        $this->seedEcommerceData($isProduction, $count, $admin);
        $this->seedCurrencies();
    }

    private function seedContent(bool $isProduction, int $count): void
    {
        if ($isProduction) return;

        Tag::factory(40)->create();
        Category::factory()
            ->has(Post::factory()->count(50))
            ->count(25)
            ->create();
    }

    private function seedEcommerceData(bool $isProduction, int $count, User $admin): void
    {
        $discount = Discount::updateOrCreate(
            ['code' => 'NEWCOMER10'],
            ['rate' => 0.10, 'expires_after' => 1000]
        );

        $products = Product::factory()
            ->count($count)
            ->has(ProductFeature::factory()->count($isProduction ? 1 : 3))
            ->create();

        // Seed orders with relationships
        collect(range(1, $isProduction ? 1 : 500))->each(function ($i) use ($isProduction, $admin, $products, $discount) {
            $order = Order::factory()->create([
                'user_id' => $isProduction ? $admin->id : User::inRandomOrder()->first()->id,
                'discount_id' => $discount->id,
                'created_at' => $this->generateOrderTimestamp($isProduction)
            ]);

            $this->seedOrderItems($order, $products, $isProduction);
        });

        // Seed additional product data
        $this->seedProductRelationships($products, $isProduction);
        $this->seedContactMessages($isProduction, $count);
    }

    private function generateOrderTimestamp(bool $isProduction): \DateTime
    {
        return $isProduction
            ? now()->subDay()
            : Arr::random([
                now()->subMonths(rand(0, 5)),
                now()->subYears(rand(2, 3))->addMonths(rand(1, 12)),
                now()->subYear()->addMonths(rand(0, 10))
            ]);
    }

    private function seedOrderItems(Order $order, $products, bool $isProduction): void
    {
        $itemCount = $isProduction ? 1 : rand(2, 5);
        $subtotal = 0;

        collect(range(1, $itemCount))->each(function () use ($order, $products, $isProduction, &$subtotal) {
            $product = $products->random();
            $quantity = $isProduction ? 1 : random_int(1, 3);

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'subtotal' => $product->price * $quantity
            ]);

            $subtotal += $product->price * $quantity;
        });

        // Calculate total with discount
        $discountRate = $order->discount->rate ?? 0;
        $total = $subtotal * (1 - $discountRate);

        $order->update([
            'subtotal' => $subtotal,
            'total' => $total
        ]);
    }

    private function seedProductRelationships($products, bool $isProduction): void
    {
        $products->each(function (Product $product) use ($isProduction) {
            ProductImages::factory()
                ->count($isProduction ? 1 : 2)
                ->create(['product_id' => $product->id]);

            ProductReview::factory()
                ->count($isProduction ? 1 : 3)
                ->create(['product_id' => $product->id]);

            ProductRating::factory()
                ->count($isProduction ? 1 : 5)
                ->create(['product_id' => $product->id]);
        });
    }

    private function seedContactMessages(bool $isProduction, int $count): void
    {
        ContactMessage::factory()
            ->count($isProduction ? 1 : 58)
            ->create(['user_id' => User::inRandomOrder()->first()->id]);
    }

    private function seedCurrencies(): void
    {
        foreach ($this->currencies as $currency) {
            Currency::firstOrCreate(
                ['name' => $currency['name']],
                Arr::except($currency, ['name'])
            );
        }
    }
}
