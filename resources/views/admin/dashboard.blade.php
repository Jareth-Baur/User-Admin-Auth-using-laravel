<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>
        <style>
            body {
                font-family: sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
            }

            .container {
                display: flex;
                width: 100%;
                min-height: 100vh;
                background-color: #fff;
            }

            .sidebar {
                width: 250px;
                background-color: #333;
                color: #fff;
                padding: 20px;
            }

            .sidebar h2 {
                margin-top: 0;
                margin-bottom: 20px;
            }

            .sidebar ul {
                list-style: none;
                padding: 0;
            }

            .sidebar li {
                margin-bottom: 10px;
            }

            .sidebar a {
                display: block;
                padding: 10px;
                text-decoration: none;
                color: #fff;
                border-radius: 5px;
            }

            .sidebar a:hover {
                background-color: #555;
            }

            .content {
                flex: 1;
                padding: 20px;
            }

            .content h1 {
                margin-top: 0;
            }

            .card {
                background-color: #fff;
                border-radius: 5px;
                padding: 20px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                margin-bottom: 20px;
            }

            .card h2 {
                margin-top: 0;
                margin-bottom: 10px;
            }

            .card-body {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .card-value {
                font-size: 24px;
                font-weight: bold;
            }

            .card-icon {
                font-size: 36px;
                color: #007bff;
            }

            .chart-grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr); /* Two columns */
                grid-gap: 20px;
            }

            .chart-container {
                width: 100%;
                height: 250px; /* Adjust height as needed */
                margin-bottom: 20px;
            }

            .chart {
                width: 100%;
                height: 100%;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <div class="sidebar">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><a href="#">Users</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </div>
        <div class="content">
            <h1>Admin Dashboard</h1>
            <div class="card">
                <h2>Chart Grid</h2>
                <div class="chart-grid">
                    <div class="chart-container">
                        <canvas id="salesChart" class="chart"></canvas>
                    </div>
                    <div class="chart-container">
                        <canvas id="ordersChart" class="chart"></canvas>
                    </div>
                    <div class="chart-container">
                        <canvas id="usersChart" class="chart"></canvas>
                    </div>
                    <div class="chart-container">
                        <canvas id="productsChart" class="chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div>
                        <h2>Total Products</h2>
                        <span class="card-value">50</span>
                    </div>
                    <i class="card-icon fas fa-shopping-cart"></i>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div>
                        <h2>Total Orders</h2>
                        <span class="card-value">20</span>
                    </div>
                    <i class="card-icon fas fa-money-bill-wave"></i>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const salesChartCanvas = document.getElementById('salesChart');
        const salesChartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: 'Sales',
                data: [120, 150, 180, 200, 170, 220],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };
        const salesChart = new Chart(salesChartCanvas, {
            type: 'bar',
            data: salesChartData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        // Orders Chart
        const ordersChartCanvas = document.getElementById('ordersChart');
        const ordersChartData = {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
            datasets: [{
                label: 'Orders',
                data: [50, 70, 60, 80],
                backgroundColor: 'rgba(255, 159, 64, 0.2)',
                borderColor: 'rgba(255, 159, 64, 1)',
                borderWidth: 1
            }]
        };
        const ordersChart = new Chart(ordersChartCanvas, {
            type: 'line',
            data: ordersChartData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Users Chart
        const usersChartCanvas = document.getElementById('usersChart');
        const usersChartData = {
            labels: ['New', 'Active', 'Inactive'],
            datasets: [{
                label: 'Users',
                data: [30, 50, 20],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        };
        const usersChart = new Chart(usersChartCanvas, {
            type: 'pie',
            data: usersChartData,
            options: {
                // ... (optional pie chart options) ...
            }
        });

        // Products Chart
        const productsChartCanvas = document.getElementById('productsChart');
        const productsChartData = {
            labels: ['Category A', 'Category B', 'Category C'],
            datasets: [{
                label: 'Products',
                data: [15, 25, 10],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 201, 201, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(201, 201, 201, 1)'
                ],
                borderWidth: 1
            }]
        };
        const productsChart = new Chart(productsChartCanvas, {
            type: 'doughnut',
            data: productsChartData,
            options: {
                // ... (optional doughnut chart options) ...
            }
        });
    </script>
    </body>
    </html>
</x-app-layout>
