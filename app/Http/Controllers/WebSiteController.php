<?php

namespace App\Http\Controllers;

use Notification;
use Carbon\Carbon;
use App\Notifications\LeadCreated;
use App\Interfaces\User\UserInterface;
use App\Notifications\ContactScheduleMail;
use App\Notifications\ContactSimulatorMail;
use App\Http\Requests\Lead\SendLeadRequest;
use App\Interfaces\Helpers\StorageInterface;
use App\Http\Requests\Lead\SendContactScheduleMailRequest;
use App\Http\Requests\Lead\SendContactSimulatorMailRequest;

class WebSiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the main website page.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        return view('web.index');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function investment()
    {

        return view('web.investment.index');
    }

    public function sendLead(SendLeadRequest $request, UserInterface $userContract, StorageInterface $storage)
    {
        try {
            if (!auth()->check()) {
                Notification::route('mail', 'info@azellft.com')
                    ->notify(new LeadCreated($request['lastname'] . ' ' . $request['name'], $request['phone_number'], $request['email']));
            }
            $role = auth()->check() ? 'Investment' : 'Partner';
            $user = $userContract->register($request->all(), $role);

            $message = auth()->check() ? __('messages.register.success_investment') : __('messages.register.success_partner');
            return response()->json([
                'message'    => $message,
                'user'       => $user,
                'is_partner' => auth()->check()
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => __('messages.register.error_exception') . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function terms()
    {
        return view('web.legal.terms');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function policies()
    {
        return view('web.legal.policies');
    }

    /**
     * @param SendContactSimulatorMailRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendContactSimulatorMail(SendContactSimulatorMailRequest $request)
    {
        try {
            Notification::route('mail', config('mail.from')["address"])
                ->notify(new ContactSimulatorMail($request->all()));
            return response()->json(["message" => "Hemos recibido tu mensaje, en un momento nos comunicaremos contigo."], 200);
        } catch (\Exception $ex) {
            return response()->json(["message" => "Ocurrio un error intente mas tarde"], 422);
        }
    }

    /**
     * @param SendContactScheduleMailRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendContactScheduleMail(SendContactScheduleMailRequest $request)
    {
        try {
            Notification::route('mail', config('mail.from')["address"])
                ->notify(new ContactScheduleMail($request->all()));
            return response()->json(["message" => "Hemos recibido tu mensaje, en un momento nos comunicaremos contigo."], 200);
        } catch (\Exception $ex) {
            return response()->json(["message" => "Ocurrio un error intente mas tarde"], 422);
        }
    }

    public function changeLocale($locale)
    {

        session()->put('locale', $locale);
        return redirect()->back();

    }
}
