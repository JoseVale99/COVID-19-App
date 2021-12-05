@extends('layouts.app')
@section('titulo', 'Dashboard')
@section('contenido')

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.min.js"> </script>


    {{-- adding nav bar horizontal --}}
    @include('layouts.nav')

    <div id="layoutSidenav">
        {{-- adding sidebar vertical --}}
        @include('layouts.sidebar')

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    {{-- <form action="{{route('')}}" method="POST---"> --}}

                    {{-- </form> --}}


                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active text-dark">Fecha de actualización de datos : {{$result_covid["data"][0]["Updated Date"]}} </li>
                        
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body text-center">Casos positivos a nivel nacional</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    
                                     </div>
                                        <h5 class="text-center"> {{$result_covid["data"][0]["Cases"]}}</h5>
                                        
                               
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body text-center">Casos positivos en el estado de Oaxaca</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    
                                     </div>
                                        <h5 class="text-center"> {{$covid_oaxaca_cases["Cases"]}}</h5>
                                        
                               
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Success Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Danger Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card mb-12">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                   Casos positivos por estado
                                </div>
                                <div class="card-body"><canvas id="myChart" width="100%" height="40"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card mb-12">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar me-1"></i>
                                    Bar Chart Example
                                </div>
                                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                    </div>

                </div>
            </main>
            {{-- adding footer --}}
            @include('layouts.footer')

        </div>
    </div>
    <script>
        var dias = <?php echo $states; ?>;
        var total = <?php echo $cases; ?>;
       
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dias,
                
                datasets: [{
                    label: ' • Ingresos por días',
                    data: total,
                    backgroundColor: [
                        'rgb(57,101, 202)',
                        '#299BC2',
                         "#F16F1B",
                         "#DE0909",
                        '#208A73',
                        "#E29A1C",
                        "#7C8081"
                    ],
                    borderColor: [
                        'rgba(255, 255, 255, 255)'  
                    ],
                    borderWidth: 2
                }]
                
                 
                
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                       
                        beginAtZero: true
                    }
                }
            }
        });
    </script>


    
@endsection
