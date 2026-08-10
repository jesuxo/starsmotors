@extends('layouts.master')
@section('title')
    Vehículos - Total: {{ $totalVehiculos ?? 0 }}
@endsection
@section('css')
    <style>
        :root {
            --pastel-blue: #e6f3ff;
            --pastel-green: #e1f7e6;
            --pastel-yellow: #fff9e6;
            --pastel-pink: #ffe6f0;
            --pastel-purple: #f0e6ff;
        }

        .btn-soft-light:hover, .vehiculoselected {
            background-color: #e0f2ff !important;
        }

        .nav-pills .nav-link {
            background: #eee !important;
            border-bottom-right-radius: 0 !important;
            border-bottom-left-radius: 0 !important;
        }
        .nav-pills .nav-link.active  {
            background: #0072c5 !important;
            border-bottom-right-radius: 0 !important;
            border-bottom-left-radius: 0 !important;
        }
        .nav-pills {
            border-bottom: 1px solid #0072c5;
        }

        .tdline{
            border:1px solid #0072c5 !important;
            font-size: 12px;
        }
        .tdlineff{
            border-left:1px solid #fff !important;
            font-size: 12px;
            color: white !important;
            background-color: #0072c5 !important;
        }

        .error {
            border: 2px solid red !important;
            background-color: #ffe6e6;
        }

        .error:focus {
            outline: none;
            border-color: #ff0000;
            box-shadow: 0 0 5px rgba(255, 0, 0, 0.5);
        }

        .vehiculo-item {
            transition: all 0.2s;
            border-left: 4px solid transparent;
            cursor: pointer;
        }
        .vehiculo-item:hover {
            background-color: #e0f2ff !important;
            transform: translateX(5px);
        }
        .vehiculo-item.seleccionado {
            border-left-color: #0072c5;
            background-color: #e0f2ff !important;
        }

        .badge-tipo {
            background: #e6f3ff;
            color: #2c3e50;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 0.75rem;
        }

        .search-box {
            position: relative;
        }

        .search-box .search-icon {
            position: absolute;
            top: 50%;
            right: 15px;
            top: 21px !important;
            transform: translateY(-50%);
            color: #9ca3af;
        }

        .resultados-busqueda {
            max-height: 500px;
            width: 100%!important;
            overflow-y: auto;
        }


        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255,255,255,0.7);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .stat-card {
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .foto-thumb {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid #ddd;
        }

        .foto-thumb:hover {
            border-color: #0072c5;
            transform: scale(1.05);
            transition: all 0.2s;
        }

        /* Estilos para la tarjeta de cliente */
        .cliente-info-card {
            background: var(--pastel-blue);
            border-left: 4px solid #0072c5;
            animation: slideDown 0.3s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .cliente-info-card .btn-limpiar {
            transition: all 0.2s;
        }
        .cliente-info-card .btn-limpiar:hover {
            transform: scale(1.05);
        }
    </style>
@endsection

@section('content')

    <div class="loading-overlay" id="loadingOverlay">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Cargando...</span>
        </div>
    </div>

    <div class="row">
        @if(Auth::user() and auth()->user()->type == 'admin')
            <div class="col-xxl-3">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title mb-0">
                            <i class="ri-search-line"></i> Buscar Vehículos
                            <span class="badge bg-primary float-end">Total: {{ $totalVehiculos ?? 0 }}</span>
                        </h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('vehiculos.index') }}" method="GET"
                              autocomplete="off" class="needs-validation" id="vehiculoForm">
                            <input type="hidden" id="vehiculo_id" name="vehiculo_id" value="{{ $vehiculo_id ?? '' }}">
                            <div class="row">
                                <div class="col-xxl-12">
                                    <div class="search-box mb-3">
                                        <input type="text" class="form-control search" id="busqueda" name="busqueda"
                                               value="{{ $busqueda }}" required
                                               placeholder="Buscar por placa, cédula, nombre, marca o modelo...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                    <div class="invalid-feedback">Ingrese un criterio de búsqueda</div>
                                    <small class="text-muted">
                                        <i class="ri-information-line"></i>
                                        Ej: "ABC123", "V-12345678", "Juan Pérez", "Toyota"
                                    </small>
                                </div>

                                @if($busqueda != '')
                                    <div class="col-xxl-12 col-lg-6 mt-3">
                                        <div class="accordion accordion-flush filter-accordion">
                                            <div class="card-body border-bottom p-0">
                                                <div>
                                                    <p class="text-muted fs-13 mb-3">
                                                        Resultados para: <strong>{{ $busqueda }}</strong>
                                                        <span class="badge bg-info float-end">{{ $vehiculos->count() }} encontrado(s)</span>
                                                    </p>
                                                    <div class="resultados-busqueda">
                                                        @forelse($vehiculos as $v)
                                                            <a href="javascript:;"
                                                               onclick="seleccionarVehiculo({{ $v->id }})"
                                                               class="card btn btn-soft-light card-animate d-flex p-2 vehiculo-item
                                                               {{ isset($vehiculo) && $vehiculo->id == $v->id ? 'seleccionado' : '' }}
                                                               border-bottom border-bottom-dashed cursor-pointer"
                                                               style="text-align: left">
                                                                <div class="flex-grow-1">
                                                                    <h5 class="mb-1">{{ $v->marca }} {{ $v->modelo }}</h5>
                                                                    <p class="text-muted mb-1 small">
                                                                        <i class="ri-road-map-line"></i>
                                                                        <span class="badge bg-primary">{{ $v->identificacion }}</span>
                                                                        @if($v->year)
                                                                            | <i class="ri-calendar-line"></i> {{ $v->year }}
                                                                        @endif
                                                                    </p>
                                                                    <p class="text-muted mb-0 small">
                                                                        <i class="ri-user-line"></i>
                                                                        <strong>{{ $v->cliente->descrip ?? 'Sin cliente' }}</strong>
                                                                        @if($v->cliente)
                                                                            ({{ $v->cliente->id3 ?? 'N/A' }})
                                                                        @endif
                                                                        <span class="badge-tipo ms-2">{{ $v->tipo->tipo ?? 'N/A' }}</span>
                                                                    </p>
                                                                    <div class="mt-1">
                                                                        <small class="text-muted">
                                                                            <i class="ri-tools-line"></i>
                                                                            {{ $v->mantenimientos_count ?? 0 }} mantenimientos
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                                @if($v->foto_vehiculo)
                                                                    <div class="flex-shrink-0 ms-2">
                                                                        <img src="/vehiculos/{{ $v->foto_vehiculo }}"
                                                                             class="foto-thumb" alt="Vehículo"
                                                                             onerror="this.style.display='none'">
                                                                    </div>
                                                                @endif
                                                            </a>
                                                        @empty
                                                            <div class="text-center p-4">
                                                                <i class="ri-emotion-sad-line" style="font-size: 3rem; color: #ccc;"></i>
                                                                <p class="mt-2">No se encontraron vehículos</p>
                                                                <small class="text-muted">Intenta con otro criterio de búsqueda</small>
                                                            </div>
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif

        <div class="col-xxl-{{ Auth::user() && auth()->user()->type == 'admin' ? '9' : '12' }}">
            @if(empty($busqueda) && !isset($vehiculo))
                {{-- Mostrar estadísticas cuando no hay búsqueda --}}
                @include('vehiculos.partials.estadisticas')
            @endif

            {{-- NUEVO: Mostrar información del cliente cuando se busca por código de cliente --}}
            @if(isset($cliente) && !isset($vehiculo))
                <div class="col-12 mb-3">
                    <div class="card cliente-info-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                <div>
                                    <h5 class="mb-1">
                                        <i class="ri-user-line"></i>
                                        Vehículos de: <strong>{{ $cliente->descrip }}</strong>
                                    </h5>
                                    <p class="mb-0 text-muted">
                                        <i class="ri-barcode-line"></i> Código: {{ $cliente->codclie }} |
                                        <i class="ri-id-card-line"></i> Cédula/RIF: {{ $cliente->id3 }} |
                                        <i class="ri-phone-line"></i> Teléfono: {{ $cliente->movil ?? $cliente->telef ?? 'N/A' }}
                                    </p>
                                </div>
                                <div class="mt-2 mt-sm-0">
                                    <span class="badge bg-primary me-2">{{ $vehiculos->count() }} vehículo(s)</span>
                                    <a href="{{ route('vehiculos.index') }}" class="btn btn-sm btn-secondary btn-limpiar">
                                        <i class="ri-close-line"></i> Limpiar filtro
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if(isset($vehiculo))
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center flex-wrap gap-2">
                            <h5 class="card-title mb-0 flex-grow-1">
                                {{ $vehiculo->marca }} {{ $vehiculo->modelo }}
                                <small class="text-muted fs-6">({{ $vehiculo->identificacion }})</small>
                            </h5>
                            <div class="flex-shrink-0">
                                <p class="mb-0">
                                    <i class="ri-user-line"></i>
                                    <b>{{ $vehiculo->cliente->descrip ?? 'Sin cliente' }}</b>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Pestañas de navegación -->
                        <div class="d-flex align-items-center flex-wrap gap-3 mb-4">
                            <ul class="nav nav-pills flex-grow-1 mb-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link {{ $tab == 'tab1' ? 'active' : '' }}"
                                       href="{{ route('vehiculos.index', ['vehiculo_id' => $vehiculo->id, 'tab' => 'tab1', 'busqueda' => $busqueda]) }}"
                                       role="tab">
                                        <i class="ri-information-line"></i> Información General
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ $tab == 'tab2' ? 'active' : '' }}"
                                       href="{{ route('vehiculos.index', ['vehiculo_id' => $vehiculo->id, 'tab' => 'tab2', 'busqueda' => $busqueda]) }}"
                                       role="tab">
                                        <i class="ri-list-check"></i> Mantenimientos
                                        <span class="badge bg-light text-dark ms-1">{{ $mantenimientos->count() }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ $tab == 'tab3' ? 'active' : '' }}"
                                       href="{{ route('vehiculos.index', ['vehiculo_id' => $vehiculo->id, 'tab' => 'tab3', 'busqueda' => $busqueda]) }}"
                                       role="tab">
                                        <i class="ri-history-line"></i> Historial Completo
                                    </a>
                                </li>
                            </ul>
                            <div class="flex-shrink-0">
                                <a href="javascript:;" class="btn btn-warning btn-sm me-2" onclick="editarVehiculo({{ $vehiculo->id }})">
                                    <i class="ri-edit-line"></i> Editar
                                </a>
                                <a href="{{ route('mantenimiento.rapido') }}?placa={{ urlencode($vehiculo->identificacion) }}"
                                   class="btn btn-success btn-sm">
                                    <i class="ri-add-line"></i> Nuevo Mantenimiento
                                </a>
                            </div>
                        </div>

                        <!-- Contenido de las pestañas -->
                        <div class="tab-content">
                            @include('vehiculos.partials.tablas')
                        </div>
                    </div>
                </div>
            @elseif($busqueda && $vehiculos->isEmpty())
                <div class="card">
                    <div class="card-body text-center py-5">
                        <i class="ri-car-line" style="font-size: 4rem; color: #ccc;"></i>
                        <h5 class="mt-3">No se encontraron vehículos</h5>
                        <p class="text-muted">Intenta con otro criterio de búsqueda</p>
                        <button class="btn btn-primary" onclick="$('#busqueda').focus()">
                            <i class="ri-search-line"></i> Nueva Búsqueda
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal para editar vehículo -->
    @include('vehiculos.partials.modal-editar')

@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        $(document).ready(function() {
            $('#busqueda').focus();

            // Enviar formulario al presionar Enter
            $('#busqueda').keypress(function(e) {
                if (e.which == 13) {
                    e.preventDefault();
                    $('#vehiculoForm').submit();
                }
            });

            // Inicializar gráfico si existe el canvas
            if ($('#vehiculosChart').length) {
                const ctx = document.getElementById('vehiculosChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode($estadisticas['meses']) !!},
                        datasets: [{
                            label: 'Vehículos Registrados',
                            data: {!! json_encode($estadisticas['datos']) !!},
                            backgroundColor: 'rgba(0, 114, 197, 0.2)',
                            borderColor: 'rgba(0, 114, 197, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1
                                }
                            }
                        }
                    }
                });
            }
        });

        function seleccionarVehiculo(id) {
            $('#loadingOverlay').fadeIn();
            $('#vehiculo_id').val(id);
            $('#vehiculoForm').submit();
        }

        function editarVehiculo(id) {
            $('#loadingOverlay').fadeIn();

            $.ajax({
                url: '{{ route("vehiculos.detalles", "") }}/' + id,
                method: 'GET',
                success: function(response) {
                    $('#loadingOverlay').fadeOut();

                    if (response.success) {
                        let v = response.vehiculo;
                        $('#edit_fk_tipo').val(v.fk_tipo);
                        $('#edit_marca').val(v.marca);
                        $('#edit_modelo').val(v.modelo);
                        $('#edit_year').val(v.year);
                        $('#edit_identificacion').val(v.identificacion);
                        $('#edit_serialmotor').val(v.serialmotor);
                        $('#edit_serialchasis').val(v.serialchasis);
                        $('#edit_observaciones').val(v.observaciones);

                        $('#formEditarVehiculo').attr('action', '{{ route("vehiculos.update", "") }}/' + id);
                        $('#editarVehiculoModal').modal('show');
                    }
                },
                error: function() {
                    $('#loadingOverlay').fadeOut();
                    alert('Error al cargar los datos del vehículo');
                }
            });
        }

        function validarFormVehiculo() {
            var campos = ['#edit_marca', '#edit_modelo', '#edit_identificacion'];
            var vacios = [];

            $(campos.join(',')).each(function() {
                if (!$(this).val().trim()) {
                    vacios.push($(this).attr('name') || 'campo');
                    $(this).addClass('error');
                } else {
                    $(this).removeClass('error');
                }
            });

            if (!$('#edit_fk_tipo').val()) {
                vacios.push('tipo');
                $('#edit_fk_tipo').addClass('error');
            }

            if (vacios.length > 0) {
                alert('Complete los campos obligatorios');
                return false;
            }

            return true;
        }
    </script>
@endsection
