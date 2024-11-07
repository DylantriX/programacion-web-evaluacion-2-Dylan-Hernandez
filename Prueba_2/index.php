<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Asistentes</title>
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #0000FF, #FFFFFF);
            color: #333;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: grid;
            grid-template-rows: 1fr;
            grid-template-columns: 1fr;
            min-height: 100vh;
            margin: 0;
        }
        
        .card {
            width: 100%;
            max-width: 500px;
            padding: 30px;
            border-radius: 20px;
            border: none;
            box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.2);
            background-color: #ffffff;
            text-align: center;
            margin: auto; 
        }
        
        .card-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: #1E3A5F;
            margin-bottom: 20px;
        }
        
        .card-title i {
            color: #FFD700;
            margin-right: 10px;
        }
        
        .form-control {
            border-radius: 10px;
            box-shadow: none;
            border: 1px solid #ddd;
            padding: 15px;
            font-size: 1rem;
            transition: 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #FFD700;
            box-shadow: 0px 0px 5px rgba(255, 215, 0, 0.5);
        }
        
        .btn-custom {
            background-color: #1E3A5F;
            color: white;
            font-weight: bold;
            border-radius: 12px;
            padding: 12px;
            font-size: 1.1rem;
            transition: background-color 0.3s;
        }
        
        .btn-custom:hover {
            background-color: #FFD700;
            color: #1E3A5F;
        }
        
        .form-control-file {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<div class="card">
    <h4 class="card-title"><i class="fas fa-user-plus"></i> Registro de Asistentes</h4>
    <form action="guardar_asistente.php" method="POST" enctype="multipart/form-data">
        
        <div class="form-group">
            <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Nombre Completo">
        </div>
        
        <div class="form-group">
            <input type="text" class="form-control" id="rut" name="rut" required placeholder="RUT">
        </div>
        
        <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" required placeholder="Email">
        </div>
        
        <div class="form-group">
            <input type="text" class="form-control" id="telefono" name="telefono" required placeholder="Teléfono">
        </div>
        
        <div class="form-group">
            <input type="file" class="form-control-file" id="imagen" name="imagen" required>
        </div>
        
        <button type="submit" class="btn btn-custom btn-block">Registrar Asistente</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>