@extends('conjunto')

@section('body')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="mt-16">
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8 bg-[images/inventario.jpg] rounded-2xl">

                        <a href="http://127.0.0.1:8000/clientes" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Clientes</h2>

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Gestión de clientes del taller.
                                </p>
                            </div>

                        </a>

                        <a href="http://127.0.0.1:8000/proveedor/index" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Proveedores</h2>

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Gestión de los proveedores del taller
                                </p>
                            </div>

                        </a>

                        <a href="http://127.0.0.1:8000/inventario" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Inventario</h2>

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Apartado de inventario en existencia del taller.
                                </p>
                            </div>

                        </a>

                        <a href="http://127.0.0.1:8000/ticket" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Tickets</h2>

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Apartado de control de finanzas de toda la empresa
                                </p>
                            </div>

                        </a>

                    </div>
                </div>
                </div>
            </div>
</x-app-layout>

@endsection