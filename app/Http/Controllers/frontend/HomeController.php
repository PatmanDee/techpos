<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home/landing page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // You could add any data needed for the homepage here
        $pricingPlans = [
            [
                'name' => 'Starter',
                'price' => 29,
                'description' => 'Perfect for small businesses just getting started.',
                'features' => [
                    '1 register',
                    'Unlimited products',
                    'Basic reporting',
                    '24/7 support'
                ]
            ],
            [
                'name' => 'Professional',
                'price' => 79,
                'description' => 'For growing businesses with multiple locations.',
                'popular' => true,
                'features' => [
                    '5 registers',
                    'Unlimited products',
                    'Advanced reporting',
                    'Customer management',
                    'Inventory management',
                    '24/7 priority support'
                ]
            ],
            [
                'name' => 'Enterprise',
                'price' => 199,
                'description' => 'For large businesses with complex needs.',
                'features' => [
                    'Unlimited registers',
                    'Custom reporting',
                    'API access',
                    'Dedicated account manager',
                    '24/7 VIP support'
                ]
            ]
        ];

        $testimonials = [
            [
                'quote' => 'TechPOS has transformed how we run our food truck business. We can now process payments anywhere, even with spotty internet connections.',
                'author' => 'Sarah Johnson',
                'position' => 'Food Truck Owner'
            ],
            [
                'quote' => 'The analytics features have given us insights we never had before. We\'ve increased our sales by 30% since switching to TechPOS.',
                'author' => 'Michael Chen',
                'position' => 'Retail Store Manager'
            ],
            [
                'quote' => 'Customer support is outstanding. Any time we\'ve had an issue, the team has been quick to respond and resolve it.',
                'author' => 'Jessica Williams',
                'position' => 'Boutique Owner'
            ]
        ];

        return view('frontend.home', compact('pricingPlans', 'testimonials'));
    }
}
