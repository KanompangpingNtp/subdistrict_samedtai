<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use Carbon\Carbon;

class VisitorsController extends Controller
{
    public function getVisitorStats()
    {
        $now = Carbon::now('Asia/Bangkok'); // ตั้งค่าโซนเวลาเป็นไทย

        // นับผู้เข้าชมออนไลน์ (ภายใน 5 นาที)
        $five_minutes_ago = $now->copy()->subMinutes(5);
        $online_users = Visitor::where('last_activity', '>=', $five_minutes_ago)->count();

        // จำนวนผู้เข้าชมวันนี้
        $today_users = Visitor::whereDate('last_activity', $now->toDateString())->count();

        // จำนวนผู้เข้าชมเดือนนี้
        $month_users = Visitor::whereMonth('last_activity', $now->month)
            ->whereYear('last_activity', $now->year)
            ->count();

        // จำนวนผู้เข้าชมสัปดาห์นี้
        $week_start = $now->copy()->startOfWeek();
        $week_end = $now->copy()->endOfWeek();
        $week_users = Visitor::whereBetween('last_activity', [$week_start, $week_end])->count();

        // จำนวนผู้เข้าชมปีนี้
        $year_users = Visitor::whereYear('last_activity', $now->year)->count();

        // จำนวนผู้เข้าชมทั้งหมด
        $all_users = Visitor::count();

        return response()->json([
            'online_users' => $online_users,
            'today_users' => $today_users,
            'month_users' => $month_users,
            'week_users' => $week_users,
            'year_users' => $year_users,
            'all_users' => $all_users,
        ]);
    }
}
