@extends('layouts.admin')
@section('css')
   <link rel="stylesheet" type="text/css" href="{{asset('admin/plugin/appexchart/dist/apexcharts.css')}}">

@endsection

@section('content')
    <main class="main-content">

        <!--========== Wiz Card ==============-->
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="ratio ratio-21x9">
                    <div class="wiz-card p-3 d-flex justify-content-center flex-column h-100">
                        <div class="d-flex">
                            <div class="me-3">
                                <div class="icon-box box-40 rounded-circle">
                                    <i class="fa fa-user-o text-muted"></i>
                                </div>
                            </div>
                            <div>
                                <span class="d-block text-center font-weight-strong text-muted m-0">{{number_format($customer, 2)}}</span>
                                <small class="d-block text-center text-muted">{{__('app.customer')}}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="ratio ratio-21x9">
                    <div class="wiz-card p-3 d-flex justify-content-center flex-column h-100">
                        <div class="d-flex">
                            <div class="me-3">
                                <div class="icon-box box-40 rounded-circle">
                                    <i class="fa fa-shopping-basket text-muted"></i>
                                </div>
                            </div>
                            <div>
                                <span class="d-block text-center font-weight-strong text-muted m-0">{{number_format($order, 2)}}</span>
                                <small class="d-block text-center text-muted">{{__('total').' '.__('app.orders')}}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="ratio ratio-21x9">
                    <div class="wiz-card p-3 d-flex justify-content-center flex-column h-100">
                        <div class="d-flex">
                            <div class="me-3">
                                <div class="icon-box box-40 rounded-circle">
                                    <i class="fa fa-line-chart text-muted"></i>
                                </div>
                            </div>
                            <div>
                                <span class="d-block text-center font-weight-strong text-muted m-0">{{number_format($completed, 2)}}</span>
                                <small class="d-block text-center text-muted">{{__('app.complete').' '.__('app.orders')}}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="ratio ratio-21x9">
                    <div class="wiz-card p-3 d-flex justify-content-center flex-column h-100">
                        <div class="d-flex">
                            <div class="me-3">
                                <div class="icon-box box-40 rounded-circle">
                                    <i class="fa fa-line-chart text-muted"></i>
                                </div>
                            </div>
                            <div>
                                <span class="d-block text-center font-weight-strong text-muted m-0">{{number_format($cancelled, 2)}}</span>
                                <small class="d-block text-center text-muted">{{__('app.cancelled').' '.__('app.orders')}}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <!--=========== Chart =============-->
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="theme-card px-0 h-100">
                    <h5 class="text-muted text-center px-3">Sales Overview</h5>
                    <small class="d-block text-center text-muted">July 2021</small>
                    <div class="ratio ratio-16x9">
                        <div id="reviewChart"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="theme-card h-100">
                    <h5 class="text-muted mb-4">Total Sales</h5>
                    <div id="chartRadial" class="legend-vertical"></div>
                </div>
            </div>
        </div>







    </main>
@endsection


@section('js')
    <script>

        // ========== Appex Chart / General =================
        var options = {
            chart: {
                height: 100+'%',
                type: "bar",
                toolbar: {
                    show: false,
                },
            },

            series: [
                {
                    name: "Total Earning",
                    type: "column",
                    data: [40, 50, 41, 71, 27, 41, 20, 52, 75, 32, 57, 16]
                },
                {
                    name: "Total Sales Item",
                    type: "column",
                    data: [23, 42, 35, 27, 43, 22, 17, 31, 22, 22, 12, 16]
                }
            ],

            plotOptions: {
                bar: {
                    columnWidth: '50%',
                },
            },


            stroke: {
                width: [0, 4],
                curve: 'rounded'
            },


            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            // labels: [
            //     "01 Jan 2001",
            //     "02 Jan 2001",
            //     "03 Jan 2001",
            //     "04 Jan 2001",
            //     "05 Jan 2001",
            //     "06 Jan 2001",
            //     "07 Jan 2001",
            //     "08 Jan 2001",
            //     "09 Jan 2001",
            //     "10 Jan 2001",
            //     "11 Jan 2001",
            //     "12 Jan 2001"
            // ],

            xaxis: {
                // type: "datetime"
                type: "month"
            },
            yaxis: [
                {
                    title: {
                        text: "Total Earning"
                    }
                },
                {
                    opposite: true,
                    title: {
                        text: "Total Sales Item"
                    }
                }
            ],

            theme: {
                mode: 'light',
                palette: 'palette1',
            },

        };
        var chart = new ApexCharts(document.querySelector("#reviewChart"), options);
        chart.render();

        // ========== Appex Chart Radial / Pie =================
        var optionsRadial = {
            chart: {
                height: 468,
                type: "pie",

            },
            series: [44, 55, 41, 17, 15],
            colors: ["#2EA2FA", "#44ABF9", "#5DB8FD", "#70BEFA","#8ACCFD"],
            labels: ["Direct","Affiliate", "Sponsored", "Hole Sale", "Over Phone" ],

            plotOptions: {
                radialBar: {
                    hollow: {
                        margin: 0,
                        size: "70%",
                        background: "#ffffff"
                    },
                    dataLabels: {
                        name: {
                            color: "#ffffff",
                        },
                        value: {
                            color: "#ffffff",
                        },
                        offsetY: -16,

                    }
                }
            },

            legend: {
                show: true,
                position: 'bottom',
                offsetY: 5,
            },
            stroke: {
                width: 1,
                dashArray: 0,
            }

        };
        var chartRadial = new ApexCharts(document.querySelector("#chartRadial"), optionsRadial);
        chartRadial.render();

        $.fn.modeSelectChart = function() {
            if ($(this).is(':checked')){
                chart.updateOptions({
                    theme: {
                        mode: 'dark',
                        palette: 'darkmode',
                    },

                });

                chartRadial.updateOptions({
                    colors: ["#0573c7", "#0781df", "#0390fc", "#229af7","#36a6fc"],
                    legend: {
                        labels: {
                            colors: '#f0f0f0',
                            useSeriesColors: false
                        },
                    },
                });

            } else {
                chart.updateOptions({
                    theme: {
                        mode: 'light',
                        palette: 'palette1',
                    },
                    legend: {
                        labels: {
                            colors: '#333333',
                            useSeriesColors: false
                        },
                    },

                });


                chartRadial.updateOptions({
                    colors: ["#2EA2FA", "#44ABF9", "#5DB8FD", "#70BEFA","#8ACCFD"],
                    legend: {
                        labels: {
                            colors: '#333333',
                            useSeriesColors: false
                        },
                    },
                });
            }
        };

        $(document).ready(function () {
            $('#darkMode').modeSelectChart();
        });

        $(document).on('change', '#darkMode', function () {
            $(this).modeSelectChart();
        });
    </script>
@endsection
