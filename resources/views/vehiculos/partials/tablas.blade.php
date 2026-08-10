{{-- resources/views/vehiculos/partials/tablas.blade.php --}}

{{-- Contenido de las pestañas --}}
@if($tab == 'tab1')
    <div class="tab-pane active" id="info-general">
        <div class="row">
            <!-- Datos del vehículo -->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-sm table-borderless">
                            <tr>
                                <td width="40%"><strong>Tipo:</strong></td>
                                <td>{{ $vehiculo->tipo->tipo ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Marca:</strong></td>
                                <td>{{ $vehiculo->marca }}</td>
                            </tr>
                            <tr>
                                <td><strong>Modelo:</strong></td>
                                <td>{{ $vehiculo->modelo }}</td>
                            </tr>
                            <tr>
                                <td><strong>Año:</strong></td>
                                <td>{{ $vehiculo->year ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Placa/Identificación:</strong></td>
                                <td><span class="badge bg-primary">{{ $vehiculo->identificacion }}</span></td>
                            </tr>
                            <tr>
                                <td><strong>Serial Motor:</strong></td>
                                <td>{{ $vehiculo->serialmotor ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Serial Chasis:</strong></td>
                                <td>{{ $vehiculo->serialchasis ?? 'N/A' }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="background: var(--pastel-pink);">
                            <div class="card-body">
                                <h6><i class="ri-user-line"></i> Datos del Cliente</h6>
                                <p class="mb-1"><strong>{{ $vehiculo->cliente->descrip ?? 'Sin cliente' }}</strong></p>
                                <p class="mb-1">Cédula/RIF: {{ $vehiculo->cliente->id3 ?? 'N/A' }}</p>
                                <p class="mb-0">Teléfono: {{ $vehiculo->cliente->movil ?? $vehiculo->cliente->telef ?? 'N/A' }}</p>
                                <a href="/clientes/{{ $vehiculo->codclie }}/tab1" target="_blank" class="btn btn-sm btn-primary mt-2">
                                    <i class="ri-eye-line"></i> Ver Cliente
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                @if($vehiculo->observaciones)
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="alert alert-info">
                                <strong>Observaciones:</strong><br>
                                {{ $vehiculo->observaciones }}
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Últimos mantenimientos con productos -->
                @if($mantenimientos->count() > 0)
                    <div class="row mt-4">
                        <div class="col-12">
                            <h6 class="mb-3">Últimos Mantenimientos</h6>
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered">
                                    <thead class="table-light">
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Kilometraje</th>
                                        <th>Productos/Servicios</th>
                                        <th>Próximo</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($mantenimientos->take(5) as $m)
                                        <tr>
                                            <td>{{ $m->fechaformat }}</td>
                                            <td>{{ number_format($m->kilometraje, 0, ',', '.') }} km</td>
                                            <td>
                                                @if($m->productos && $m->productos->count() > 0)
                                                    @foreach($m->productos->take(3) as $p)
                                                        <span class="badge bg-info me-1">{{ $p->descripcion }} (x{{ $p->cantidad }})</span>
                                                    @endforeach
                                                    @if($m->productos->count() > 3)
                                                        <span class="badge bg-secondary">+{{ $m->productos->count() - 3 }} más</span>
                                                    @endif
                                                @else
                                                    <span class="text-muted">Sin productos</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($m->proximo_mantenimiento)
                                                    {{ $m->proximo_mantenimiento->format('d/m/Y') }}
                                                @elseif($m->proximo_kilometraje)
                                                    {{ number_format($m->proximo_kilometraje, 0, ',', '.') }} km
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('clientes.vehiculos.mantenimientos.show', [$vehiculo->codclie, $vehiculo->id, $m->id]) }}"
                                                   class="btn btn-sm btn-info" title="Ver">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endif

@if($tab == 'tab2')
    <div class="tab-pane active" id="mantenimientos">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Kilometraje</th>
                    <th>Productos/Servicios</th>
                    <th>Cantidad</th>
                    <th>Próximo</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @forelse($mantenimientos as $m)
                    <tr>
                        <td>{{ $m->fechaformat }}</td>
                        <td>{{ $m->horaformated ?? $m->hora_mantenimiento }}</td>
                        <td>{{ number_format($m->kilometraje, 0, ',', '.') }} km</td>
                        <td>
                            @if($m->productos && $m->productos->count() > 0)
                                <ul class="list-unstyled mb-0">
                                    @foreach($m->productos as $p)
                                        <li><small>{{ $p->descripcion }}</small></li>
                                    @endforeach
                                </ul>
                            @else
                                <span class="text-muted">Sin productos</span>
                            @endif
                        </td>
                        <td>
                            @if($m->productos && $m->productos->count() > 0)
                                <ul class="list-unstyled mb-0">
                                    @foreach($m->productos as $p)
                                        <li><small>x{{ $p->cantidad }}</small></li>
                                    @endforeach
                                </ul>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            @if($m->proximo_mantenimiento)
                                {{ $m->proximo_mantenimiento->format('d/m/Y') }}
                            @elseif($m->proximo_kilometraje)
                                {{ number_format($m->proximo_kilometraje, 0, ',', '.') }} km
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('clientes.vehiculos.mantenimientos.show', [$vehiculo->codclie, $vehiculo->id, $m->id]) }}"
                                   class="btn btn-info" title="Ver">
                                    <i class="ri-eye-line"></i>
                                </a>
                                <a href="{{ route('clientes.vehiculos.mantenimientos.edit', [$vehiculo->codclie, $vehiculo->id, $m->id]) }}"
                                   class="btn btn-warning" title="Editar">
                                    <i class="ri-edit-line"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            <i class="ri-inbox-line" style="font-size: 2rem; color: #ccc;"></i>
                            <p class="mt-2">No hay mantenimientos registrados para este vehículo</p>
                            <a href="{{ route('mantenimiento.rapido') }}?placa={{ urlencode($vehiculo->identificacion) }}"
                               class="btn btn-success btn-sm">
                                <i class="ri-add-line"></i> Registrar Mantenimiento
                            </a>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endif

@if($tab == 'tab3')
    <div class="tab-pane active" id="historial">
        <div class="timeline">
            @forelse($mantenimientos as $m)
                <div class="card mb-3">
                    <div class="card-header" style="background: #f0f7ff;">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">
                                <i class="ri-calendar-line"></i>
                                {{ $m->fechaformat }} {{ $m->horaformated }}
                            </h6>
                            <div>
                                <span class="badge bg-info me-2">{{ number_format($m->kilometraje, 0, ',', '.') }} km</span>
                                <a href="{{ route('clientes.vehiculos.mantenimientos.show', [$vehiculo->codclie, $vehiculo->id, $m->id]) }}"
                                   class="btn btn-sm btn-primary">
                                    Ver detalles
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Tipos de Mantenimiento:</strong></p>
                                @if($m->tipos && $m->tipos->count() > 0)
                                    @foreach($m->tipos as $tipo)
                                        <span class="badge bg-secondary me-1">
                                            @switch($tipo->tipo)
                                                @case('cambio_aceite') Cambio Aceite @break
                                                @case('cambio_filtro_aceite') Filtro Aceite @break
                                                @case('cambio_filtro_gasolina') Filtro Gasolina @break
                                                @case('cambio_filtro_aire') Filtro Aire @break
                                                @case('mantenimiento_inyectores') Inyectores @break
                                                @case('bateria') Batería @break
                                                @default {{ $tipo->tipo }}
                                            @endswitch
                                            @if($tipo->descripcion) ({{ $tipo->descripcion }}) @endif
                                        </span>
                                    @endforeach
                                @elseif($m->tipo_mantenimiento)
                                    <span class="badge bg-secondary">
                                        @switch($m->tipo_mantenimiento)
                                            @case('cambio_aceite') Cambio Aceite @break
                                            @default {{ $m->tipo_mantenimiento }}
                                        @endswitch
                                    </span>
                                @else
                                    <span class="text-muted">No especificado</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                @if($m->vendedor)
                                    <p><strong>Vendedor:</strong> {{ $m->vendedor->descrip }}</p>
                                @endif
                                @if($m->proximo_mantenimiento || $m->proximo_kilometraje)
                                    <p>
                                        <strong>Próximo:</strong>
                                        @if($m->proximo_mantenimiento) {{ $m->proximo_mantenimiento->format('d/m/Y') }} @endif
                                        @if($m->proximo_kilometraje) {{ number_format($m->proximo_kilometraje, 0, ',', '.') }} km @endif
                                    </p>
                                @endif
                            </div>
                        </div>

                        <!-- Productos utilizados -->
                        @if($m->productos && $m->productos->count() > 0)
                            <div class="mt-3">
                                <p><strong>Productos/Servicios utilizados:</strong></p>
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Referencia</th>
                                            <th class="text-center">Cantidad</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($m->productos as $p)
                                            <tr>
                                                <td>{{ $p->descripcion }}</td>
                                                <td>{{ $p->referencia ?? 'N/A' }}</td>
                                                <td class="text-center">{{ $p->cantidad }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif

                        @if($m->observaciones)
                            <div class="mt-2">
                                <p><strong>Observaciones:</strong> {{ $m->observaciones }}</p>
                            </div>
                        @endif

                        @if($m->fotos && $m->fotos->count() > 0)
                            <div class="mt-2">
                                <small class="text-muted">
                                    <i class="ri-camera-line"></i> {{ $m->fotos->count() }} foto(s) de evidencia
                                </small>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <i class="ri-history-line" style="font-size: 3rem; color: #ccc;"></i>
                    <p class="mt-2">No hay mantenimientos registrados</p>
                    <a href="{{ route('mantenimiento.rapido') }}?placa={{ urlencode($vehiculo->identificacion) }}"
                       class="btn btn-success">
                        <i class="ri-add-line"></i> Registrar Mantenimiento
                    </a>
                </div>
            @endforelse
        </div>
    </div>
@endif
