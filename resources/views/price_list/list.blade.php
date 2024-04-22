<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla para exportar a PDF</title>
    <!-- Estilos adicionales según sea necesario -->
</head>
<body>
    <table border="1" style="width:100%;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price list</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{ $row['name'] }}</td>
                <td>{{ $row['description'] }}</td>
                <td>{{ $row['price_sale'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
