<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\FilterRequest;
use App\Models\{Client, Product, Sale, SaleSituation};
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Dashboard index
     *
     * @return View
     */
    public function __invoke(FilterRequest $request): View
    {
        return view('dashboard', $this->filterData($request));
    }

    /**
     * Filter dashboard data
     *
     * @param FilterRequest $request
     * @return View
     */
    public function filterData(FilterRequest $request): array
    {
        $validated = $request->validated();

        $sales = Sale::query()
            ->when($validated->sale_date_range, fn ($q) =>
                $q->whereBetween('dh_sold', [$validated->initial_date, $validated->final_date])
            )->when($validated->client, fn ($q) => 
                $q->where('client_id', $validated->client))
            ->with(['product'])
            ->paginate(10);

        $saleResults = SaleSituation::query()
            ->select(DB::raw('COUNT(sales.id) as sales_count, SUM(sales.total) as sales_total'), 'name')
            ->join('sales', 'sales.sale_situation_id', 'sale_situations.id')
            ->groupBy('name')
            ->get();

        return [
            'saleResults'          => $saleResults,
            'currentClient'        => $validated->client,
            'currentSaleDateRange' => $validated->sale_date_range,
            'sales'                => $sales,
            'clients'              => Client::all(),
            'products'             => Product::paginate(10)
        ];
    }
}
