<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\VisitorLog;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LogVisitorInfo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $agent = new Agent();
        $ip = $request->ip();
        $location = Location::get($ip);
        $startTime = Carbon::now();

        $log = VisitorLog::create([
            'ip' => $ip,
            'browser' => $agent->browser(),
            'platform' => $agent->platform(),
            'device' => $agent->device(),
            'country' => $location->countryName ?? null,
            'city' => $location->cityName ?? null,
            'url' => $request->fullUrl(),
            'visit_start' => $startTime,
        ]);

        Session::put('visitor_log_id', $log->id);
        Session::put('visit_start', $startTime);

        return $next($request);
    }

    public function terminate($request, $response)
    {
        $start = Session::get('visit_start');
        $logId = Session::get('visitor_log_id');

        if ($start && $logId) {
            $end = Carbon::now();
            $duration = $start->diffInSeconds($end);

            $log = VisitorLog::find($logId);
            if ($log) {
                $log->visit_end = $end;
                $log->duration = $duration;
                $log->save();
            }
        }
    }

    
}
