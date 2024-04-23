<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use App\Models\Chitietdonhang;
use MongoDB\Driver\Session;

class StatisticsController extends Controller
{
    public function statisticsOverTime($startDate, $endDate) {
        $days = [];
    
        $currentDay = $startDate->copy();
        while ($currentDay->lte($endDate)) {
          $days[] = $currentDay->format('Y-m-d');
          $currentDay->addDay();
        }
    
    // Truy vấn và tính toán dữ liệu cho từng ngày trong mảng
        foreach ($days as $day) {
          $result = Chitietdonhang::join('donhang', 'chitietdonhang.DH_Ma', '=', 'donhang.DH_Ma')
            ->leftJoin('sach', 'chitietdonhang.S_Ma', '=', 'sach.S_Ma')
            ->whereDate('donhang.DH_NgayTao', $day)
            ->selectRaw(
                'DATE(donhang.DH_NgayTao) as order_date,
                SUM(chitietdonhang.CTDH_SoLuong) as total_quantity,
                SUM(chitietdonhang.CTDH_DonGia * chitietdonhang.CTDH_SoLuong) as total_price'
            )
            ->groupBy('order_date')
            ->get();
    
          $totalQuantity = $result->sum('total_quantity');
          $totalPrice = $result->sum('total_price');
    
          if ($totalQuantity > 0) {
            $dataFish[] = [
              'order_date' => $day,
              'total_quantity' => $totalQuantity,
              'total_price' => $totalPrice,
            ];
          } else {
            $dataFish[] = [
              'order_date' => $day,
              'total_quantity' => 0,
              'total_price' => 0,
            ];
          }
        }
    
    // Truy vấn và tính toán dữ liệu cho từng ngày trong mảng
       
    
        return [$dataFish];
      }
      public function dataLastWeek() {
        // $startOfWeek = now()->startOfWeek(Carbon::MONDAY)->subWeek();
        // $endOfWeek = now()->endOfWeek(Carbon::SUNDAY)->subWeek()->subDay();
        $startOfWeek = now()->subWeek()->startOfWeek(Carbon::MONDAY);
        $endOfWeek = now()->subWeek()->endOfWeek(Carbon::SUNDAY);
        // dd($startOfWeek, $endOfWeek);
        $data = $this->statisticsOverTime($startOfWeek, $endOfWeek);
    
        return response()->json($data);
      }
    
        public function dataLastSevenDays() {
          $startOfWeek = now()->subDays(7)->startOfDay();
          $endOfWeek = now()->subDay()->endOfDay();
    
          $data = $this->statisticsOverTime($startOfWeek, $endOfWeek);
          return response()->json($data);
        }
    
        // public function dataPeriod(Request $request) : JsonResponse {
        //   $startDate = $request->input('start_date');
        //   $endDate = $request->input('end_date');
    
        //   $startOfWeek = Carbon::parse($startDate);
        //   $endOfWeek = Carbon::parse($endDate);
    
        //   $data = $this->statisticsOverTime($startOfWeek, $endOfWeek);
    
        //   return response()->json($data);
        // }
        public function dataPeriod(Request $request) : JsonResponse {
          $startDate = $request->input('start_date');
          $endDate = $request->input('end_date');
      
          $startOfWeek = Carbon::parse($startDate);
          $endOfWeek = Carbon::parse($endDate);
      
          if ($startOfWeek->gt($endOfWeek)) {
              // Thông báo lỗi trên hệ thống
              \Log::error('Ngày bắt đầu phải nhỏ hơn hoặc bằng ngày kết thúc.');
      
              // Trả về JSON response chứa thông báo lỗi
              return response()->json(['error' => 'Ngày bắt đầu phải nhỏ hơn hoặc bằng ngày kết thúc.'], 422);
          }
      
          $data = $this->statisticsOverTime($startOfWeek, $endOfWeek);
      
          return response()->json($data);
      }
}
