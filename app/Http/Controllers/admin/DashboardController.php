<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Messages;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $userId = auth()->id();
        Messages::where('receiver_id', $userId)
            ->where('status', 'sent')
            ->update(['status' => 'delivered']);
        $data['activeMenu'] = 'dashboard';
        $data['customer'] = Customers::all()->count();
        $data['order'] = Orders::all()->count();
        $data['completed']  = Orders::where('status','completed')->count();
        $data['cancelled']  =Orders::where('status','cancelled')->count();
        return view('admin.dashboard', $data);

    }







    public function filterReservation(Request $request)
    {
        ini_set('max_execution_time', 6000);

        $this->validate($request, [
            'service_type' => 'nullable|integer',
            'customer_id' => 'nullable|integer',
            'agent_id' => 'nullable|integer',
            'status' => 'nullable|integer',
            'minimum_amount' => 'nullable',
            'maximum_amount' => 'nullable',
            'start_date_pick_up' => 'nullable|date',
            'end_date_pick_up' => 'nullable|date|after_or_equal:start_date_pick_up'
        ]);

        $reservations = Reservation::orderByDesc('id');

        if ($request->minimum_amount != '' || $request->maximum_amount){
            $minimum_amount = $request->minimum_amount ? $request->minimum_amount : 0;
            $maximum_amount = $request->maximum_amount ? $request->maximum_amount : ReservationCost::select('total_amount')->where('status', 1)->max('total_amount');
            $reservation_cost = ReservationCost::select('reservation_id')
                ->where('status', 1)
                ->whereBetween('total_amount', array($minimum_amount, $maximum_amount))
                ->get();

            $reservations = Reservation::whereIn('id', $reservation_cost);
        }


        $start_date_pick_up = $request->start_date_pick_up ? Carbon::parse($request->start_date_pick_up)->toDateString() : Carbon::now()->subYear(1)->toDateString();
        $end_date_pick_up = $request->end_date_pick_up ? Carbon::parse($request->end_date_pick_up)->toDateString() : Carbon::now()->addYear(1)->toDateString();

        $reservation_details = ReservationDetails::whereBetween('pick_up_date', [$start_date_pick_up, $end_date_pick_up])
            ->where('status', 1)
            ->pluck('reservation_id')
            ->all();
        $reservations = $reservations->whereIn('id', $reservation_details);
        if($request->start_date_drop_off || $request->end_date_drop_off)
        {
            $start_date_drop_off = Carbon::parse($request->start_date_drop_off)->toDateString() ?? Carbon::now()->subYear(1)->toDateString();
            $end_date_drop_off   = Carbon::parse($request->end_date_drop_off)->toDateString() ?? Carbon::now()->addYear(1)->toDateString();
            $reservation_detail = ReservationDetails::whereBetween('drop_off_date', [$start_date_drop_off, $end_date_drop_off])
                ->where('status',1)
                ->pluck('reservation_id')
                ->all();
            $reservations->whereIn('id', $reservation_detail);
        }

        if ($request->vehicle_reg_no){
            $vehicle_reg_no = $request->vehicle_reg_no ? ReservationVehicle::select('reservation_id')->where('vehicle_id', $request->vehicle_reg_no)->where('status', 1)->get() : Reservation::select('id')->get();

            $reservations = $reservations->whereIn('id', $vehicle_reg_no);
        }


        if ($request->reservation_no) {
            $reservations->where('reservation_no', $request->reservation_no);
        }


        if ($request->status) {
            $reservations->where('status', $request->status);
        }

        if ($request->service_type) {
            $reservations->where('service_type', $request->service_type);
        }



        if ($request->vehicle_class) {
            $vehicle_id_by_class =  Vehicle::where('vehicle_class_id', $request->vehicle_class)->pluck('id')->all();

            $reservation_ids =  ReservationVehicle::whereIn('vehicle_id', $vehicle_id_by_class)
                ->where('status', 1)
                ->pluck('reservation_id')
                ->all();

            $reservations->whereIn('id', $reservation_ids);
        }


        if ($request->agent_id) {
            $reservations->where('agency_id', $request->agent_id);
        }

        if ($request->customer_id) {
            $reservations->where('customer_id', $request->customer_id);
        }

        if ($request->status === '0' or $request->status) {
            $reservations->where('status', $request->status);
        }

        if ($request->service_type) {
            $reservations->where('service_type', $request->service_type);
        }



        if ($request->vehicle_class) {
            $vehicle_id_by_class =  Vehicle::where('vehicle_class_id', $request->vehicle_class)->pluck('id')->all();

            $reservation_ids =  ReservationVehicle::whereIn('vehicle_id', $vehicle_id_by_class)
                ->where('status', 1)
                ->pluck('reservation_id')
                ->all();

            $reservations->whereIn('id', $reservation_ids);
        };


        if ($request->agent_id) {
            $reservations->where('agency_id', $request->agent_id);
        };

        if ($request->customer_id) {
            $reservations->where('customer_id', $request->customer_id);
        };
        if($request->start_date && $request->end_date)
        {
            $startDate = Carbon::parse($request->start_date)->toDateString();
            $endDate = Carbon::parse($request->end_date)->toDateString();
            $reservations->whereBetween('created_at', [$startDate, $endDate]);
        }


        if($request->pick_up_country_id)
        {
            $reservations->whereHas('reservationDetail', function ($query) use ($request) {
                $query->where('pick_up_country_id', $request->pick_up_country_id);
            });
        };

        if ($request->pick_up_city_id){
            $city= City::findOrFail($request->pick_up_city_id);
            $cityName = $city->name;
            $reservations->whereHas('reservationDetail', function ($query) use ($request,$cityName) {
                $query->where(function ($query) use ($request,$cityName) {
                    $query->where('pick_up_city_id', $request->pick_up_city_id)->orWhere('pick_up_location','like','%'.$cityName.'%');
                });
            });

        }
        if($request->has_invoice == 1)
        {
            $reservations->where('is_invoice',$request->has_invoice);
        }
        if($request->has_invoice == 2)
        {
            $reservations->where('is_invoice',0);
        }

        $headers = [
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0'
            , 'Content-type' => 'text/csv'
            , 'Content-Disposition' => 'attachment; filename=galleries.csv'
            , 'Expires' => '0'
            , 'Pragma' => 'public'
        ];

        $filename = 'download.csv';
        $handle = fopen($filename, 'w');
        fputcsv($handle, [
            'Reservation No',
            'Service Type',
            'Reservation office',
            'Customer',
            'Agent',
            'Provider',
            'Provider Cost',
            'Total Amount',
            'Reservation Invoice Amount',
            'Invoice',
            'Payment Method',
            'Pick up Date',
            'Pick up City',
            'Drop Off Date',
            'Drop Off City',
            'Booked Date',
            'Vehicle Name',
            'Car Registration No',
            'Vehicle Class',

            'Agent Commission',
            'Commission Status',

            'Status',
            'Pick up driver',
            'Pick up driver Cost',
            'Drop Off driver',
            'Drop Off driver Cost',
            'Other Cost'
        ]);


        $reservations = $reservations->with('officeLocation', 'customInvoices', 'customer')
            ->with('reservationDetails', function ($query) {
                $query->with('provider', 'reservationCost', 'agencyCommission');
                $query->with('reservationDriver', function ($query) {
                    $query->with('pickUpDriver', 'dropUpDriver');
                });
            })
            ->with('reservationVehicle', function ($query) {
                $query->with('vehicle', function ($query) {
                    $query->with('vehicleClass');
                });
            });

        //    $reservations = $reservations->limit(2)->get();

        Log::info('Total Reservatidson : '.$reservations->count());

        $startTime = microtime(true);
        $reservations->chunk(1000, function ($data) use ($handle) {
            $chunkStartTime = microtime(true);

            foreach ($data as $reservation) {
                $invoices = 'N/A';
                $reservationInvoiceAmount = 0;

                $customInvoiceIds = $reservation->customInvoices->pluck('id')->all();
                $customInvoiceIdsFromInvoiceDetails = $reservation->customInvoiceDetails->pluck('custom_invoice_id')->all();
                $customInvoiceIds = array_merge($customInvoiceIds, $customInvoiceIdsFromInvoiceDetails);

                $customInvoices = CustomInvoice::whereIn('id', $customInvoiceIds)->pluck('invoice_id')->all();
                $reservationInvoiceAmount = CustomInvoice::whereIn('id', $customInvoiceIds)->sum('grand_total_amount');

                if (count($customInvoices) == 1){
                    $invoices = json_encode($customInvoices);
                    $invoices = Str::replace('["', '', $invoices);
                    $invoices = Str::replace('"]', '', $invoices);
                    $invoices = Str::replace('"', '', $invoices);
                }elseif (count($customInvoices) > 1){
                    $invoices = json_encode($customInvoices);
                }

                $reservationInvoiceAmount = appNumberFormat($reservationInvoiceAmount);

                foreach ($reservation->reservationDetails as $detailsKey => $reservationDetail){
                    $detailStartTime = microtime(true);

                    if ($detailsKey > 0){
                        $reservationInvoiceAmount = 0;
                    }

                    $status = trans('var.reservation_status.'.$reservation->status);
                    $service_type = trans('var.service_type.'.$reservation->service_type);
                    $full_name = 'N/A';
                    $pick_up_driver = 'N/A';
                    $pick_up_driver_cost = $reservationDetail->reservationDriver->pick_up_driver_cost ?? 0;
                    $drop_off_driver = 'N/A';
                    $drop_off_driver_cost = $reservationDetail->reservationDriver->drop_off_driver_cost ?? 0;
                    $provider = $reservationDetail->provider->name ?? 'N/A';
                    $providerCost = $reservationDetail->provider_cost ?? 0;
                    $otherCost = $reservationDetail->other_cost ?? 0;
                    $commissionAmount = 0;
                    $commissionPaidStatus = 0;

                    if ($reservation->customer){
                        $full_name = $reservation->customer->title .' '. $reservation->customer->full_name .' '. $reservation->customer->last_name;
                    }

                    $created_at = Carbon::parse($reservation->created_at)->toDateString() ?? '';
                    $pick_up_date = Carbon::parse($reservationDetail->pick_up_date)->toDateString() ?? '';
                    $drop_off_date = Carbon::parse($reservationDetail->drop_off_date)->toDateString() ?? '';
                    $pick_up_city = $reservationDetail->pick_up_city ?? '--';
                    $drop_off_city = $reservationDetail->drop_off_city ?? '--';
                    $reservationTotalAmount = appNumberFormat($reservationDetail->reservationCost->total_amount ?? 0);


                    if($reservationDetail->reservationDriver && $reservationDetail->reservationDriver->pickUpDriver){
                        $pick_up_driver =   $reservationDetail->reservationDriver->pickUpDriver->full_name . ' ' .  $reservationDetail->reservationDriver->pickUpDriver->last_name;
                    }

                    if($reservationDetail->reservationDriver && $reservationDetail->reservationDriver->dropUpDriver){
                        $drop_off_driver = $reservationDetail->reservationDriver->dropUpDriver->full_name .' '. $reservationDetail->reservationDriver->dropUpDriver->last_name;
                    }


                    if ($reservationDetail->agencyCommission){
                        $commissionAmount = $reservationDetail->agencyCommission->commission_amount ?? 0;
                        $commissionPaidStatus = 'Paid';
                        if ($commissionAmount > 0){
                            if ($reservationDetail->agencyCommission->due_amount > 0){
                                $commissionPaidStatus = 'Due';
                            }
                        }
                    }


                    $paymentMethod = trans('var.reservation_payment_method.'.$reservation->payment_method);

                    fputcsv($handle, [
                        $reservation->reservation_no,
                        $service_type,
                        $reservation->officeLocation->title ?? '--',
                        $full_name,
                        $reservation->agency ? $reservation->agency->name : 'N/A',
                        $provider,
                        $providerCost,
                        $reservationTotalAmount,
                        $reservationInvoiceAmount,
                        $invoices,
                        $paymentMethod,
                        $pick_up_date,
                        $pick_up_city, // Pick Up Location
                        $reservation->service_type != 3 ? $drop_off_date : $pick_up_date,
                        $drop_off_city,
                        $created_at,
                        $reservation->reservationVehicle->vehicle->title ?? 'N/A',
                        $reservation->reservationVehicle->vehicle->reg_no ?? 'N/A',
                        $reservation->reservationVehicle->vehicle->vehicleClass->title ?? 'N/A',

                        appNumberFormat($commissionAmount),
                        $commissionPaidStatus,

                        $status,
                        $pick_up_driver,
                        $pick_up_driver_cost,
                        $drop_off_driver,
                        $drop_off_driver_cost,
                        $otherCost
                    ]);
                }
            }
        });

        $endTime = microtime(true);
        Log::info('Total Time: '. ($endTime - $startTime));

        fclose($handle);
        return response()->download($filename, config('app.name') . ' Reservation' . Carbon::now()->toDateString() . '.csv', $headers);
    }














}//last bracket of this controller don't remove it
