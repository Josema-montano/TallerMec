<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Su vehículo está listo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #dc2626;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 0 0 8px 8px;
        }
        .vehicle-info {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #dc2626;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            color: #666;
            font-size: 14px;
        }
        .btn {
            display: inline-block;
            background-color: #dc2626;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 6px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🔧 TALLER MECÁNICO</h1>
        <h2>Su vehículo está listo para recoger</h2>
    </div>
    
    <div class="content">
        <p>Estimado/a <strong>{{ $cliente->nombre }}</strong>,</p>
        
        <p>Nos complace informarle que el servicio de su vehículo ha sido completado exitosamente.</p>
        
        <div class="vehicle-info">
            <h3>📋 Detalles del Servicio</h3>
            <p><strong>Vehículo:</strong> {{ $vehiculo->marca }} {{ $vehiculo->modelo }} ({{ $vehiculo->anio }})</p>
            <p><strong>Patente:</strong> {{ $vehiculo->patente }}</p>
            <p><strong>Fecha de ingreso:</strong> {{ $orden->fecha_ingreso->format('d/m/Y') }}</p>
            <p><strong>Fecha de finalización:</strong> {{ $orden->fecha_entrega ? $orden->fecha_entrega->format('d/m/Y') : now()->format('d/m/Y') }}</p>
            @if($orden->descripcion_problema)
                <p><strong>Problema reportado:</strong> {{ $orden->descripcion_problema }}</p>
            @endif
        </div>
        
        <p><strong>🎉 ¡Su vehículo está listo!</strong></p>
        
        <p>Puede pasar a recoger su vehículo en nuestro taller durante nuestros horarios de atención:</p>
        <ul>
            <li><strong>Lunes a Viernes:</strong> 8:00 AM - 6:00 PM</li>
            <li><strong>Sábados:</strong> 8:00 AM - 2:00 PM</li>
        </ul>
        
        <p>📍 <strong>Dirección:</strong> 123 Calle Principal, Ciudad</p>
        <p>📞 <strong>Teléfono:</strong> +1 234 567 8900</p>
        
        <p>Por favor, traiga consigo:</p>
        <ul>
            <li>Documento de identidad</li>
            <li>Llaves del vehículo (si las dejó)</li>
            <li>Este email como comprobante</li>
        </ul>
        
        <p><strong>¿Cómo fue nuestro servicio?</strong></p>
        <p>Nos encantaría conocer su opinión sobre el servicio recibido. Puede dejar sus comentarios y calificación visitando nuestro portal de clientes.</p>
        
        <a href="{{ route('cliente.mis-ordenes') }}?email={{ $cliente->email }}" class="btn">Ver mis órdenes y comentar</a>
    </div>
    
    <div class="footer">
        <p>Gracias por confiar en nosotros para el cuidado de su vehículo.</p>
        <p><strong>TALLER MECÁNICO</strong> - Su taller de confianza</p>
        <p>Este es un email automático, por favor no responda a este mensaje.</p>
    </div>
</body>
</html>