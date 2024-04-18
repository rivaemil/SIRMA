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
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
            <style>

            </style>
        </head>
        <body>
        <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Inventario') }}
                </h2>
            </x-slot>
            <div id="app" class="mx-auto">
                <v-app>
                    <v-main>
                    <!-- Botón CREAR -->
                        <v-card class="mx-auto mt-5" max-width="1280" elevation="">

                        <v-btn class="mx-2" fab dark color="" @click="formNuevo()"><v-icon dark>mdi-plus</v-icon></v-btn>

                        <!-- Tabla y formulario -->
                            <v-simple-table class="mt-5">
                                <template v-slot:default>
                                    <thead>
                                    <tr class="bg-dark">
                                    <th class="white--text">ID</th>
                                    <th class="white--text">nombre</th>
                                    <th class="white--text">cantidad</th>
                                    <th class="white--text">proveedor</th>
                                    <th class="white--text text-center">descripcion</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="material in materials" :key="material.id">
                                        <td>{{ 'material'.'id' }}</td>
                                        <td>{{ 'material'.'nombre' }}</td>
                                        <td>{{ 'material'.'cantidad' }}</td>
                                        <td>{{ 'material'.'proveedor' }}</td>
                                        <td>{{ 'material'.'descripcion' }}</td>
                                            <td>
                                            <v-btn class="pink" dark small fab
                                            @click="formEditar(material.id, material.nombre, material.cantidad,
                                            material.proveedor, material.descripcion)"><v-icon>mdi-pencil</v-icon></v-btn>

                                            <v-btn class="error" fab dark small @click="borrar(material.id)"><v-icon>mdi-delete</v-icon></v-btn>

                                            </td>
                                        </tr>
                                    </tbody>
                                </template>
                            </v-simple-table>
                        </v-card>
                    <!-- Componente de Diálogo para CREAR y EDITAR -->
                        <v-dialog v-model="dialog" max-width="500">
                            <v-card>
                            <v-card-title class="purple darken-4 white--text">material</v-card-title>
                                <v-card-text>
                                <v-form>
                                    <v-container>
                                        <v-row>
                                            <input v-model="material.id" hidden></input>
                                            <v-col cols="12" md="4">
                                                <v-text-field v-model="material.nombre" label="nombre" solo required>{{'material'.'nombre'}}</v-text-field>
                                            </v-col>
                                            <v-col cols="12" md="4">
                                                <v-text-field v-model="material.cantidad" label="cantidad" solo required>{{'material'.'cantidad'}}</v-text-field>
                                            </v-col>
                                            <v-col cols="12" md="4">
                                                <v-text-field v-model="material.proveedor" label="proveedor" solo required>{{'material'.'proveedor'}}</v-text-field>
                                            </v-col>
                                            <v-col cols="12" md="4">
                                                <v-text-field v-model="material.descripcion" label="Descripcion" solo required>{{'material'.'descripcion'}}</v-text-field>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.js"integrity="sha512-nqIFZC8560+CqHgXKez61MI0f9XSTKLkm0zFVm/99Wt0jSTZ7yeeYwbzyl0SGn/s8Mulbdw+ScCG41hmO2+FKw=="crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.0.2/dist/sweetalert2.all.min.js"></script>
            <script>
                let url = 'http://localhost:8000/api/materiales/';
                new Vue({
                    el: '#app',
                    vuetify: new Vuetify(),
                    data() {
                        return {
                            materials: [],
                            dialog: false,
                            operacion: '',
                            material: {
                                id: null,
                                nombre: '',
                                cantidad: '',
                                proveedor: '',
                                descripcion: ''
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
                                this.materials = response.data;
                            })
                        },
                        crear: function () {
                        let parametros = { nombre: this.material.nombre, cantidad: this.material.cantidad, proveedor: this.material.proveedor ,descripcion:this.material.descripcion};
                        axios.post(url, parametros)
                            .then(response => {
                                this.mostrar();
                            });
                            this.material.nombre = "";
                            this.material.cantidad = "";
                            this.material.proveedor = "";
                            this.material.descripcion = "";
                        },
                        editar: function () {
                        let parametros = { nombre: this.material.nombre, cantidad: this.material.cantidad, proveedor: this.material.proveedor ,descripcion:this.material.descripcion, id: this.material.id };
                        //console.log(parametros);
                        axios.put(url + this.material.id, parametros)
                            .then(response => {
                                this.mostrar();
                            })
                            .catch(error => {
                                console.log(error);
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
                                            this.mostrar();
                                    });
                                    Swal.fire('¡Eliminado!', '', 'success')
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
            this.material.nombre = "";
            this.material.cantidad = "";
            this.material.proveedor = "";
            this.material.descripcion = "";
            },
            formEditar: function (id, nombre, cantidad, proveedor, descripcion) {
            this.material.id = id;
            this.material.nombre = nombre;
            this.material.cantidad = cantidad;
            this.material.proveedor = proveedor;
            this.material.descripcion = descripcion;
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