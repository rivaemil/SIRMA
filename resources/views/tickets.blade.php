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
                    {{ __('Tickets') }}
                </h2>
            </x-slot>
            <div id="app" class="mx-auto">
                <v-app>
                    <v-main>
                    <!-- Botón CREAR -->
                        <v-card class="mx-auto mt-5" color="" max-width="1280" elevation="">

                        <v-btn class="mx-2" fab dark color="" @click="formNuevo()"><v-icon dark>mdi-plus</v-icon></v-btn>

                        <!-- Tabla y formulario -->
                            <v-simple-table class="mt-5">
                                <template v-slot:default>
                                    <thead>
                                    <tr class="bg-dark">
                                    <th class="white--text">ID</th>
                                    <th class="white--text">CLIENTE</th>
                                    <th class="white--text">VEHICULO</th>
                                    <th class="white--text">CONCEPTO</th>
                                    <th class="white--text text-center">DESCRIPCION</th>
                                    <th class="white--text text-center">TOTAL</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <tr v-for="ticket in tickets" :key="ticket.id">
                                        <td>{{ '$item'.'id' }}</td>
                                        <td>{{ 'ticket'.'cliente' }}</td>
                                        <td>{{ 'ticket'.'vehiculo' }}</td>
                                        <td>{{ 'ticket'.'concepto' }}</td>
                                        <td>{{ 'ticket'.'descripcion' }}</td>
                                        <td>{{ 'ticket'.'total' }}</td>
                                            <td>
                                            <v-btn class="pink" dark small fab
                                            @click="formEditar(ticket.id, ticket.cliente, ticket.vehiculo,
                                            ticket.concepto, ticket.descripcion, ticket.total)"><v-icon>mdi-pencil</v-icon></v-btn>

                                            <v-btn class="error" fab dark small @click="borrar(ticket.id)"><v-icon>mdi-delete</v-icon></v-btn>

                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </template>
                            </v-simple-table>
                        </v-card>
                    <!-- Componente de Diálogo para CREAR y EDITAR -->
                        <v-dialog v-model="dialog" max-width="500">
                            <v-card>
                            <v-card-title class="purple darken-4 white--text">Ticket</v-card-title>
                                <v-card-text>
                                <v-form>
                                    <v-container>
                                        <v-row>
                                            <input v-model="ticket.id" hidden></input>
                                            <v-col cols="12" md="4">
                                                <v-text-field v-model="ticket.cliente" label="Cliente" solo required>{{'ticket'.'cliente'}}</v-text-field>
                                            </v-col>
                                            <v-col cols="12" md="4">
                                                <v-text-field v-model="ticket.vehiculo" label="Vehiculo" solo required>{{'ticket'.'vehiculo'}}</v-text-field>
                                            </v-col>
                                            <v-col cols="12" md="4">
                                                <v-text-field v-model="ticket.concepto" label="Concepto" solo required>{{'ticket'.'concepto'}}</v-text-field>
                                            </v-col>
                                            <v-col cols="12" md="4">
                                                <v-text-field v-model="ticket.descripcion" label="Descripcion" solo required>{{'ticket'.'descripcion'}}</v-text-field>
                                            </v-col>
                                            <v-col cols="12" md="4">
                                                <v-text-field v-model="ticket.total" label="Total" type="number" prefix="$" solo required></v-text-field>
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
                let url = 'http://localhost:8000/api/tickets/';
                new Vue({
                    el: '#app',
                    vuetify: new Vuetify(),
                    data() {
                        return {
                            tickets: [],
                            dialog: false,
                            operacion: '',
                            ticket: {
                                id: null,
                                cliente: '',
                                vehiculo: '',
                                concepto: '',
                                descripcion: '',
                                total:''
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
                                this.tickets = response.data;
                            })
                        },
                        crear: function () {
                        let parametros = { cliente: this.ticket.cliente, vehiculo: this.ticket.vehiculo, concepto: this.ticket.concepto ,descripcion:this.ticket.descripcion, total: this.ticket.total };
                        axios.post(url, parametros)
                            .then(response => {
                                this.mostrar();
                            });
                            this.ticket.cliente = "";
                            this.ticket.vehiculo = "";
                            this.ticket.concepto = "";
                            this.ticket.descripcion = "";
                            this.ticket.total = "";
                        },
                        editar: function () {
                        let parametros = { cliente: this.ticket.cliente, vehiculo: this.ticket.vehiculo, concepto: this.ticket.concepto ,descripcion:this.ticket.descripcion, total: this.ticket.total, id: this.ticket.id };
                        //console.log(parametros);
                        axios.put(url + this.ticket.id, parametros)
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
            this.ticket.cliente = "";
            this.ticket.vehiculo = "";
            this.ticket.concepto = "";
            this.ticket.descripcion = "";
            this.ticket.total = "";
            },
            formEditar: function (id, cliente, vehiculo, concepto, descripcion, total) {
            this.ticket.id = id;
            this.ticket.cliente = cliente;
            this.ticket.vehiculo = vehiculo;
            this.ticket.concepto = concepto;
            this.ticket.descripcion = descripcion;
            this.ticket.total = total;
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