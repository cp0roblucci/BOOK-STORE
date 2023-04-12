<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    $dataFish = [];
    foreach ($days as $day) {
      $result = OrderDetail::join('orders', 'order_details.order_id', '=', 'orders.order_id')
        ->leftJoin('fish', 'order_details.product_id', '=', 'fish.fish_id')
        ->leftJoin('accessories', 'order_details.product_id', '=', 'accessories.accessories_id')
        ->where('order_details.category_id', 1)
        ->whereDate('orders.order_date', $day)
        ->selectRaw(
          'order_details.category_id as category_id,
            DATE(orders.order_date) as order_date,
            SUM(order_details.quantity) as total_quantity,
            SUM(order_details.price * order_details.quantity) as total_price'
        )
        ->groupBy('category_id', 'order_date')
        ->first();

      if ($result) {
        $dataFish[] = $result;
      } else {
        $dataFish[] = [
          'category_id' => 1,
          'order_date' => $day,
          'total_quantity' => 0,
          'total_price' => 0,
        ];
      }
    }

// Truy vấn và tính toán dữ liệu cho từng ngày trong mảng
    $dataAccessories = [];
    foreach ($days as $day) {
      $result = OrderDetail::join('orders', 'order_details.order_id', '=', 'orders.order_id')
        ->leftJoin('fish', 'order_details.product_id', '=', 'fish.fish_id')
        ->leftJoin('accessories', 'order_details.product_id', '=', 'accessories.accessories_id')
        ->where('order_details.category_id', 2)
        ->whereDate('orders.order_date', $day)
        ->selectRaw(
          'order_details.category_id as category_id,
            DATE(orders.order_date) as order_date,
            SUM(order_details.quantity) as total_quantity,
            SUM(order_details.price * order_details.quantity) as total_price'
        )
        ->groupBy('category_id', 'order_date')
        ->first();

      if ($result) {
        $dataAccessories[] = $result;
      } else {
        $dataAccessories[] = [
          'category_id' => 2,
          'order_date' => $day,
          'total_quantity' => 0,
          'total_price' => 0,
        ];
      }
    }

    return [$dataFish, $dataAccessories];
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

    public function dataPeriod(Request $request) : JsonResponse {
      $startDate = $request->input('start_date');
      $endDate = $request->input('end_date');

      $startOfWeek = Carbon::parse($startDate);
      $endOfWeek = Carbon::parse($endDate);

      $data = $this->statisticsOverTime($startOfWeek, $endOfWeek);

      return response()->json($data);
    }
}
