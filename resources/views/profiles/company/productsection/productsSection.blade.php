@extends('layouts.company')
@section('content')
        <!-- Main Content -->
        <div class="flex-1 lg:ml-0 p-10">

            @include('profiles.company.productsection.items.header')

            <!-- Navigation Tabs -->
            @include('profiles.company.productsection.items.navegationTabs')


            <!-- Product List Section -->
            <div id="product-list" class="section-content">
                <!-- Stats Cards -->
                @include('profiles.company.productsection.items.statsCards')


                <!-- Search and Filters -->
                @include('profiles.company.productsection.items.searchFilters')

                <!-- Products Table -->
                @include('profiles.company.productsection.items.productsTable')


                <!-- Pagination -->
                @include('profiles.company.productsection.items.pagination')


                <!-- Add Product Section -->
                @include('profiles.company.productsection.items.addProduct')


                <!-- Inventory Section -->
                @include('profiles.company.productsection.items.inventorySection')


                <!-- Modal para Ver Producto -->
                @include('profiles.company.productsection.items.viewProduct')

                <!-- Modal para Eliminar Producto -->
                @include('profiles.company.productsection.items.deleteProduct')

                <!-- Modal para Editar Producto -->
                @include('profiles.company.productsection.items.editProduct')

@endsection

@vite(['resources/js/productsSection.js'])