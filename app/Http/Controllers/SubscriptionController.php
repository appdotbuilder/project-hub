<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Models\ClientSubscription;
use App\Models\SubscriptionType;
use App\Models\User;
use Inertia\Inertia;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscriptions = ClientSubscription::with(['client', 'subscriptionType'])
            ->latest()
            ->paginate(10);
        
        return Inertia::render('subscriptions/index', [
            'subscriptions' => $subscriptions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = User::clients()->where('is_active', true)->get(['id', 'name']);
        $subscriptionTypes = SubscriptionType::active()->get();

        return Inertia::render('subscriptions/create', [
            'clients' => $clients,
            'subscription_types' => $subscriptionTypes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubscriptionRequest $request)
    {
        $subscription = ClientSubscription::create($request->validated());

        return redirect()->route('subscriptions.show', $subscription)
            ->with('success', 'Subscription created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ClientSubscription $subscription)
    {
        $subscription->load(['client', 'subscriptionType', 'transactions']);

        return Inertia::render('subscriptions/show', [
            'subscription' => $subscription
        ]);
    }
}