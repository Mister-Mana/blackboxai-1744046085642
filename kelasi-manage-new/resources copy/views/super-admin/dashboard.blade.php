<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelasi Manage - Super Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-blue-800 text-white min-h-screen">
            <div class="p-4">
                <h1 class="text-2xl font-bold">Kelasi Manage</h1>
                <p class="text-sm">Super Admin Panel</p>
            </div>
            <nav class="mt-6">
                <a href="{{ route('super-admin.dashboard') }}" class="block py-2 px-4 hover:bg-blue-700">
                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                </a>
                <a href="{{ route('schools.index') }}" class="block py-2 px-4 hover:bg-blue-700">
                    <i class="fas fa-school mr-2"></i> Écoles
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <h2 class="text-2xl font-semibold mb-6">Tableau de Bord</h2>
            
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-medium">Écoles Actives</h3>
                    <p class="text-3xl font-bold text-blue-600">0</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-medium">Utilisateurs</h3>
                    <p class="text-3xl font-bold text-green-600">0</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-medium">Revenus</h3>
                    <p class="text-3xl font-bold text-purple-600">0 FCFA</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>