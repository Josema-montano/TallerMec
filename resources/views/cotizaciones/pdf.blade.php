<h1>Detalle de Cotización #{{ $data->id }}</h1>

<h2>Datos del Vehículo</h2>
<ul>
    <li><strong>Marca:</strong> {{ $data->orden->vehiculo->marca ?? 'N/D' }}</li>
    <li><strong>Modelo:</strong> {{ $data->orden->vehiculo->modelo ?? 'N/D' }}</li>
    <li><strong>Color:</strong> {{ $data->orden->vehiculo->color ?? 'N/D' }}</li>
</ul>

<h2>Datos de la Cotización</h2>
<ul>
    <li><strong>Fecha:</strong> {{ $data->fecha->format('d/m/Y') }}</li>
    <li><strong>Total Servicio:</strong> {{ number_format($data->total_servicio, 2) }} Bs</li>

    @php
        $totalRepuestos = $data->repuestos->sum(function($repuesto) {
            return $repuesto->pivot->precio_total;
        });
    @endphp

    <li><strong>Total Repuestos:</strong> {{ number_format($totalRepuestos, 2) }} Bs</li>
    <li><strong>Total General (Servicio + Repuestos):</strong> {{ number_format($data->total, 2) }} Bs</li>
    <li><strong>Aprobada:</strong> {{ $data->aprobada ? 'Sí' : 'No' }}</li>
</ul>

<h2>Repuestos usados</h2>
<table border="1" cellpadding="5" cellspacing="0" style="width:100%; border-collapse: collapse;">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data->repuestos as $repuesto)
        <tr>
            <td>{{ $repuesto->nombre }}</td>
            <td>{{ $repuesto->pivot->cantidad }}</td>
            <td>{{ number_format($repuesto->pivot->precio_total, 2) }} Bs</td>
        </tr>
        @endforeach
    </tbody>
</table>
