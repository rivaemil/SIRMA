@extends('conjunto')

@section('body')
<x-app-layout>
<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.0.2/dist/sweetalert2.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no,
minimal-ui">
<style>
#app {
background-color: #CFD8DC;
}
</style>
</head>
<body>
<div id="app">
<v-app>
<v-main>
<h2 class="text-center">CRUD de Clientes usando API REST con Laravel</h2>
<!-- Botón CREAR -->
<v-card class="mx-auto mt-5" color="transparent" max-width="1280" elevation="0">

<v-btn class="mx-2" fab dark color="#E040FB" @click="formNuevo()"><v-icon dark>mdi-plus</v-icon></v-btn>

<!-- Tabla y formulario -->
<v-simple-table class="mt-5">
<template v-slot:default>
<thead>
<tr class="purple darken-2">
<th class="white--text">ID</th>
<th class="white--text">Nombre</th>
<th class="white--text">Correo</th>
<th class="white--text">Teléfono</th>
<th class="white--text text-center">ACCIONES</th>
</tr>
</thead>
<tbody>
<tr v-for="cliente in clientes" :key="cliente.id">
<td>{{ cliente.id }}</td>
<td>{{ cliente.Nombre }}</td>
<td>{{ cliente.Correo }}</td>
<td>{{ cliente.Telefono }}</td>
<td>
<v-btn class="pink" dark small fab @click="formEditar(cliente.id, cliente.Nombre, cliente.Correo, cliente.Telefono)"><v-icon>mdi-pencil</v-icon></v-btn>

<v-btn class="error" fab dark small @click="borrar(cliente.id)"><v-icon>mdi-delete</v-icon></v-btn>

</td>
</tr>
</tbody>
</template>
</v-simple-table>

</v-card>
<!-- Componente de Diálogo para CREAR y EDITAR -->
<v-dialog v-model="dialog" max-width="500">
<v-card>
<v-card-title class="purple darken-4 white--text">Cliente</v-card-title>
<v-card-text>
<v-form>
<v-container>
<v-row>
<input v-model="cliente.id" hidden></input>
<v-col cols="12" md="6">
<v-text-field v-model="cliente.Nombre" label="Nombre" solo required></v-text-field>
</v-col>
<v-col cols="12" md="6">
<v-text-field v-model="cliente.Correo" label="Correo" type="email" solo required></v-text-field>
</v-col>
<v-col cols="12" md="6">
<v-text-field v-model="cliente.Telefono" label="Teléfono" solo required></v-text-field>
</v-col>
</v-row>
</v-container>
</v-card-text>
<v-card-actions>
<v-spacer></v-spacer>
<v-btn @click="dialog=false" color="blue-grey" dark>Cancelar</v-btn>
<v-btn @click="guardar()" type="submit" color="purple accent-3" dark>Guardar</v-btn>
</v-card-actions>
</v-form>
</v-card>
</v-dialog>
</v-main>
</v-app>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.js" integrity="sha512-nqIFZC8560+CqHgXKez61MI0f9XSTKLkm0zFVm/99Wt0jSTZ7yeeYwbzyl0SGn/s8Mulbdw+ScCG41hmO2+FKw==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.0.2/dist/sweetalert2.all.min.js"></script>
<script>
let url = 'http://localhost:8000/api/clientes/';
new Vue({
el: '#app',
vuetify: new Vuetify(),
data() {
return {
clientes: [],
dialog: false,
operacion: '',
cliente: {
id: null,
Nombre: '',
Correo: '',
Telefono: ''
}
}
},
created() {
this.mostrar()
},
methods: {
//MÉTODOS PARA EL CRUD
mostrar: function () {
axios.get(url)
.then(response => {
this.clientes = response.data;
})
.catch(error => {
console.error('Error al obtener clientes:', error);
});
},
crear: function () {
let parametros = { Nombre: this.cliente.Nombre, Correo: this.cliente.Correo, Telefono: this.cliente.Telefono };
axios.post(url, parametros)
.then(response => {
console.log('Cliente creado:', response.data);
this.mostrar();
})
.catch(error => {
console.error('Error al crear cliente:', error);
});
this.cliente.Nombre = "";
this.cliente.Correo = "";
this.cliente.Telefono = "";
},
editar: function () {
let parametros = { Nombre: this.cliente.Nombre, Correo: this.cliente.Correo, Telefono: this.cliente.Telefono, id: this.cliente.id };
axios.put(url + this.cliente.id, parametros)
.then(response => {
console.log('Cliente actualizado:', response.data);
this.mostrar();
})
.catch(error => {
console.error('Error al actualizar cliente:', error);
});
},
borrar: function (id) {
Swal.fire({
title: '¿Confirma eliminar el registro?',
confirmButtonText: `Confirmar`,
showCancelButton: true,
}).then((result) => {
if (result.isConfirmed) {
//procedimiento borrar
axios.delete(url + id)
.then(response => {
console.log('Cliente eliminado:', response.data);
this.mostrar();
Swal.fire('¡Eliminado!', '', 'success');
})
.catch(error => {
console.error('Error al eliminar cliente:', error);
});
} else if (result.isDenied) {
}
});
},
//Botones y formularios
guardar: function () {
if (this.operacion == 'crear') {
this.crear();
}
if (this.operacion == 'editar') {
this.editar();
}
this.dialog = false;
},
formNuevo: function () {
this.dialog = true;
this.operacion = 'crear';
this.cliente.Nombre = '';
this.cliente.Correo = '';
this.cliente.Telefono = '';
},
formEditar: function (id, nombre, correo, telefono) {
this.cliente.id = id;
this.cliente.Nombre = nombre;
this.cliente.Correo = correo;
this.cliente.Telefono = telefono;
this.dialog = true;
this.operacion = 'editar';
}
}
});
</script>
</body>
</html>
</x-app-layout>
@endsection