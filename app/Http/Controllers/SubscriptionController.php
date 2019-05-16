<?php

namespace App\Http\Controllers;

use App\Plan;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//        $this->middleware('permission:plans.index');
//        $this->middleware('permission:plans.create');
//        $this->middleware('permission:plans.show');
//        $this->middleware('permission:plans.edit');
//        $this->middleware('permission:plans.destroy');
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::all();
        return view('index', compact('plans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $token = $request->get('stripeToken');
        $subscription = $request->get('plan_type');

        Auth()->user()->newSubscription('main', $subscription)->create($token);

        Auth()->user()->assignRole('SUBS');
        return back()->with('info', ['success', 'Suscripcion completada']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plan = Plan::find($id);
        return view('admin.subscriptions.show', compact('plan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plan = Plan::find($id);
        return view('admin.subscriptions.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $plan = Plan::find($id);
        $plan->update($request->all());
        return back()->with('info', ['success', 'Plan actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan = Plan::find($id)->delete();
        return back()->with('info', ['success', 'Plan eliminado correctamente']);
    }
}
