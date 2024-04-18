<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .form-container {
    max-width: 400px;
    margin: 0 auto;
}

.form {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 5px;
}

.form-group {
    margin-bottom: 20px;
}

.form-label {
    display: block;
    margin-bottom: 5px;
}

.form-input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.btn {
    display: inline-block;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s;
    cursor: pointer;
}

.btn:hover {
    background-color: #0056b3;
}

</style>
<body>
    <div class="form-container">
        <h1>Actualizar Proveedor</h1>
        <form action="{{route('prov_update')}}" class="form" method="post">
            @csrf
            <input type="text" hidden name="id" value="{{$prov->id_proveedores}}">
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" value="{{$prov->nombre}}" name="nombre" id="nombre" class="form-input">
            </div>
            <div class="form-group">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" value="{{$prov->correo}}" name="correo" id="correo" class="form-input">
            </div>
            <div class="form-group">
                <label for="domicilio" class="form-label">Direccion</label>
                <input type="text" value="{{$prov->direccion}}" name="direccion" id="domicilio" class="form-input">
            </div>
            <div class="form-group">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="tel" value="{{$prov->telefono}}" name="telefono" id="telefono" class="form-input">
            </div>
            <input type="submit" value="Guardar" class="btn btn-primary">
        </form>
    </div>
    
</body>
</html>