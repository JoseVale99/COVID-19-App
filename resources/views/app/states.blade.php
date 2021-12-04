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
                            en la actualidad SARS-COVID 19, datos que corresponden a todos los estados de la republica Mexicana.
                            
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
                                        <th>ID de fecha actualizada</th>
                                        <th>Fecha actualizada</th>
                                        <th>ID del estado</th>
                                        <th>Estado</th>
                                        <th>Total de casos</th>
                                        
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID de fecha actualizada</th>
                                        <th>Fecha actualizada</th>
                                        <th>ID del estado</th>
                                        <th>Estado</th>
                                        <th>Total de casos</th>
                                        
                                    </tr>
                                </tfoot>
                                <tbody>
                                
                               @foreach($states_covid["data"] as $data)
                                   
                               <tr>
                                    
                                    <td>{{ $data["Updated Date ID"]}}</td>
                                    <td>{{ $data["Updated Date"]}}</td>
                                    <td>{{ $data["State ID"]}}</td>
                                    <td>{{ $data["State"]}}</td>
                                    <td>{{ $data["Cases"]}}</td>
                                    
                                   </tr>
                                   
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
