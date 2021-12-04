@extends('layouts.app')
@section('titulo', 'Datos Covid')
@section('contenido')
    {{-- adding nav bar horizontal --}}
    @include('layouts.nav')

    <div id="layoutSidenav">
        {{-- adding sidebar vertical --}}
        @include('layouts.sidebar')

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Datos COVID-19</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{route('data.index')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Datos COVID-19</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            Tabla de datos actualizados de la enfermedad que acontece 
                            en la actualidad SARS-COVID 19, datos que corresponden a 150 municipios localizados 
                            en el estado de Oaxaca, mismos que se obtuvieron de 
                            <a target="_blank"
                             href="https://datamexico.org/api/data.jsonrecords?cube=gobmx_covid_stats_mun&drilldowns=Municipality&measures=Accum+Cases,Daily+Cases,AVG+7+Days+Accum+Cases,AVG+7+Days+Daily+Cases,Rate+Daily+Cases,Rate+Accum+Cases,Days+from+50+Cases&s=Daily%20New%20Cases&r=rollingMeanOption&locale=es&time=time.latest&State=20">datos México.</a>
                            
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabla de datos
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Municipio</th>
                                        <th>Casos acumulados</th>
                                        <th>Casos diarios</th>
                                        <th>Total (ultimos 7 días)</th>
                                        <th>Casos de acumulación de tarifas</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Municipio</th>
                                        <th>Casos acumulados</th>
                                        <th>casos diarios</th>
                                        <th>Total (ultimos 7 días)</th>
                                        <th>Casos de acumulación de tarifas</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @php
                                     $i=0;   
                                    @endphp
                               @foreach($data_covid["data"] as $data)
                                   
                               <tr>
                                    
                                    <td>{{ $data["Municipality ID"]}}</td>
                                    <td>{{ $data["Municipality"]}}</td>
                                    <td>{{ $data["Accum Cases"]}}</td>
                                    <td>{{ $data["Daily Cases"]}}</td>
                                    <td>{{ $data["AVG 7 Days Accum Cases"]}}</td>
                                    <td>{{ $data["Rate Accum Cases"]}}</td>
                                   </tr>
                                   @php
                                   $i++;
                               @endphp
                                @endforeach
                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            {{-- adding footer --}}
            @include('layouts.footer')

        </div>
    </div>
@endsection
