<?php
session_start();

// Sample demographic data for Iloilo Province municipalities
$municipalities = [
    'Iloilo City' => [
        'population' => 457803,
        'households' => 114451,
        'male' => 223902,
        'female' => 233901,
        'youth' => 137341,
        'senior' => 45780,
        'employment_rate' => 94.2,
        'literacy_rate' => 98.1,
        'poverty_rate' => 8.9
    ],
    'Oton' => [
        'population' => 98509,
        'households' => 24627,
        'male' => 49254,
        'female' => 49255,
        'youth' => 29553,
        'senior' => 9851,
        'employment_rate' => 89.5,
        'literacy_rate' => 96.3,
        'poverty_rate' => 12.4
    ],
    'Pavia' => [
        'population' => 50815,
        'households' => 12704,
        'male' => 25407,
        'female' => 25408,
        'youth' => 15245,
        'senior' => 5082,
        'employment_rate' => 91.8,
        'literacy_rate' => 97.2,
        'poverty_rate' => 10.1
    ],
    'Santa Barbara' => [
        'population' => 61390,
        'households' => 15348,
        'male' => 30695,
        'female' => 30695,
        'youth' => 18417,
        'senior' => 6139,
        'employment_rate' => 88.7,
        'literacy_rate' => 95.8,
        'poverty_rate' => 14.2
    ],
    'Cabatuan' => [
        'population' => 58107,
        'households' => 14527,
        'male' => 29053,
        'female' => 29054,
        'youth' => 17432,
        'senior' => 5811,
        'employment_rate' => 87.3,
        'literacy_rate' => 94.9,
        'poverty_rate' => 16.8
    ]
];

$departments = [
    'mswdo' => [
        'name' => 'Municipal Social Welfare and Development Office (MSWDO)',
        'short_name' => 'MSWDO',
        'icon' => '🤝',
        'color' => 'bg-purple-500'
    ],
    'mho' => [
        'name' => 'Municipal Health Office (MHO)',
        'short_name' => 'MHO',
        'icon' => '🏥',
        'color' => 'bg-red-500'
    ],
    'menro' => [
        'name' => 'Municipal Environment & Natural Resources Office (MENRO)',
        'short_name' => 'MENRO',
        'icon' => '🌳',
        'color' => 'bg-emerald-500'
    ]
];

// Get current page
$current_page = $_GET['page'] ?? 'dashboard';
$current_dept = $_GET['dept'] ?? null;

// Dashboard sync data (simulated real-time data)
$dashboard_stats = [
    'total_departments' => 3,
    'active_users' => 5,
    'pending_reports' => 8,
    'system_health' => 98.5,
    'last_sync' => date('Y-m-d H:i:s'),
    'recent_activities' => [
        ['time' => '2 minutes ago', 'action' => 'MSWDO report updated', 'user' => 'Admin'],
        ['time' => '15 minutes ago', 'action' => 'New user registered', 'user' => 'System'],
        ['time' => '1 hour ago', 'action' => 'MHO data synchronized', 'user' => 'Auto-sync'],
        ['time' => '2 hours ago', 'action' => 'MENRO analysis completed', 'user' => 'Data Analyst'],
        ['time' => '3 hours ago', 'action' => 'Backup completed successfully', 'user' => 'System']
    ],
    'department_status' => [
        'mswdo' => ['status' => 'online', 'last_update' => '2 min ago', 'health' => 100],
        'mho' => ['status' => 'online', 'last_update' => '5 min ago', 'health' => 98],
        'menro' => ['status' => 'online', 'last_update' => '1 min ago', 'health' => 99]
    ]
];

// Department admin users
$department_admins = [
    [
        'id' => 1,
        'name' => 'System Administrator',
        'email' => 'admin@mpdo.gov.ph',
        'department' => 'System',
        'role' => 'Super Admin',
        'status' => 'active',
        'last_login' => '2 minutes ago',
        'initials' => 'SA',
        'color' => 'bg-blue-500',
        'municipalities' => array_keys($municipalities) // All municipalities
    ],
    [
        'id' => 2,
        'name' => 'Maria Santos',
        'email' => 'maria.santos@mswdo.gov.ph',
        'department' => 'MSWDO',
        'role' => 'Department Admin',
        'status' => 'active',
        'last_login' => '15 minutes ago',
        'initials' => 'MS',
        'color' => 'bg-purple-500',
        'municipalities' => ['Iloilo City', 'Oton', 'Pavia']
    ],
    [
        'id' => 3,
        'name' => 'Dr. Jose Rodriguez',
        'email' => 'jose.rodriguez@mho.gov.ph',
        'department' => 'MHO',
        'role' => 'Department Admin',
        'status' => 'active',
        'last_login' => '1 hour ago',
        'initials' => 'JR',
        'color' => 'bg-red-500',
        'municipalities' => ['Iloilo City', 'Santa Barbara', 'Cabatuan']
    ],
    [
        'id' => 4,
        'name' => 'Elena Cruz',
        'email' => 'elena.cruz@menro.gov.ph',
        'department' => 'MENRO',
        'role' => 'Department Admin',
        'status' => 'active',
        'last_login' => '30 minutes ago',
        'initials' => 'EC',
        'color' => 'bg-emerald-500',
        'municipalities' => ['Pavia', 'Santa Barbara', 'Cabatuan']
    ],
    [
        'id' => 5,
        'name' => 'Carlos Mendoza',
        'email' => 'carlos.mendoza@mswdo.gov.ph',
        'department' => 'MSWDO',
        'role' => 'Data Analyst',
        'status' => 'active',
        'last_login' => '2 hours ago',
        'initials' => 'CM',
        'color' => 'bg-purple-400',
        'municipalities' => ['Oton', 'Pavia']
    ],
    [
        'id' => 6,
        'name' => 'Dr. Ana Flores',
        'email' => 'ana.flores@mho.gov.ph',
        'department' => 'MHO',
        'role' => 'Health Data Manager',
        'status' => 'inactive',
        'last_login' => '2 days ago',
        'initials' => 'AF',
        'color' => 'bg-red-400',
        'municipalities' => ['Iloilo City', 'Oton']
    ]
];

// Department-specific data forms
$department_data_fields = [
    'mswdo' => [
        'form_title' => 'Social Welfare Data Entry',
        'fields' => [
            ['name' => '4ps_beneficiaries', 'label' => '4Ps Beneficiaries', 'type' => 'number', 'required' => true],
            ['name' => 'senior_citizens', 'label' => 'Senior Citizens Registered', 'type' => 'number', 'required' => true],
            ['name' => 'pwd_registered', 'label' => 'PWD Registered', 'type' => 'number', 'required' => true],
            ['name' => 'poverty_incidents', 'label' => 'Poverty Incidents', 'type' => 'number', 'required' => false],
            ['name' => 'assistance_programs', 'label' => 'Active Assistance Programs', 'type' => 'number', 'required' => false],
            ['name' => 'social_workers', 'label' => 'Social Workers Deployed', 'type' => 'number', 'required' => false]
        ]
    ],
    'mho' => [
        'form_title' => 'Health Data Entry',
        'fields' => [
            ['name' => 'health_facilities', 'label' => 'Health Facilities', 'type' => 'number', 'required' => true],
            ['name' => 'vaccination_count', 'label' => 'Vaccinations Administered', 'type' => 'number', 'required' => true],
            ['name' => 'maternal_consultations', 'label' => 'Maternal Consultations', 'type' => 'number', 'required' => true],
            ['name' => 'infant_births', 'label' => 'Infant Births Recorded', 'type' => 'number', 'required' => false],
            ['name' => 'health_workers', 'label' => 'Health Workers', 'type' => 'number', 'required' => false],
            ['name' => 'medical_equipment', 'label' => 'Medical Equipment Units', 'type' => 'number', 'required' => false]
        ]
    ],
    'menro' => [
        'form_title' => 'Environmental Data Entry',
        'fields' => [
            ['name' => 'forest_area', 'label' => 'Forest Area (Hectares)', 'type' => 'number', 'step' => '0.01', 'required' => true],
            ['name' => 'water_sources', 'label' => 'Water Sources Count', 'type' => 'number', 'required' => true],
            ['name' => 'waste_collected', 'label' => 'Waste Collected (Tons)', 'type' => 'number', 'step' => '0.01', 'required' => true],
            ['name' => 'air_quality_reading', 'label' => 'Air Quality Index', 'type' => 'number', 'required' => false],
            ['name' => 'tree_planted', 'label' => 'Trees Planted', 'type' => 'number', 'required' => false],
            ['name' => 'environmental_violations', 'label' => 'Environmental Violations', 'type' => 'number', 'required' => false]
        ]
    ]
];

// Calculate totals
$total_population = array_sum(array_column($municipalities, 'population'));
$total_households = array_sum(array_column($municipalities, 'households'));
$total_male = array_sum(array_column($municipalities, 'male'));
$total_female = array_sum(array_column($municipalities, 'female'));
$avg_employment = round(array_sum(array_column($municipalities, 'employment_rate')) / count($municipalities), 1);
$avg_literacy = round(array_sum(array_column($municipalities, 'literacy_rate')) / count($municipalities), 1);
$avg_poverty = round(array_sum(array_column($municipalities, 'poverty_rate')) / count($municipalities), 1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MPDO - Municipal Planning and Development Office</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .sidebar-link:hover { background-color: rgba(255, 255, 255, 0.1); }
        .card-hover:hover { transform: translateY(-4px); box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); }
        .transition-all { transition: all 0.3s ease; }
        .department-card { 
            height: 400px; 
            border-radius: 20px;
            border: 2px solid #e5e7eb;
            position: relative;
            overflow: hidden;
        }
        .department-card:hover {
            border-color: #6366f1;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        .active-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: #10b981;
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
        }
        .check-department-btn {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            border: 2px solid #e5e7eb;
            padding: 16px 32px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 16px;
            color: #374151;
            transition: all 0.3s ease;
        }
        .check-department-btn:hover {
            background: #6366f1;
            color: white;
            border-color: #6366f1;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white border-r border-gray-200 flex flex-col">
            <div class="p-6 border-b border-gray-200">
                <h1 class="text-3xl font-bold text-gray-900">MPDO</h1>
                <div class="flex items-center mt-4">
                    <div class="w-12 h-12 bg-gray-800 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900">System Administrator</p>
                    </div>
                </div>
            </div>
            
            <nav class="flex-1 p-4 space-y-2">
                <a href="?page=dashboard" class="flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100 <?= $current_page === 'dashboard' ? 'bg-gray-100 font-medium' : '' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h2a2 2 0 012 2v0M8 5a2 2 0 000 4h8a2 2 0 000-4M8 5v0"></path>
                    </svg>
                    Dashboard
                </a>
                
                <a href="?page=departments" class="flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100 <?= $current_page === 'departments' || $current_page === 'department' ? 'bg-gray-100 font-medium' : '' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                    Departments
                </a>
                
                <a href="?page=analysis" class="flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100 <?= $current_page === 'analysis' ? 'bg-gray-100 font-medium' : '' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    Analysis
                </a>
                
                <a href="?page=users" class="flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100 <?= $current_page === 'users' ? 'bg-gray-100 font-medium' : '' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                    Manage Users
                </a>
            </nav>
            
            <div class="p-4 border-t border-gray-200">
                <a href="?page=logout" class="flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Logout
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white border-b border-gray-200 p-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">
                            <?php
                            if ($current_page === 'dashboard') {
                                echo 'Dashboard';
                            } elseif ($current_page === 'departments') {
                                echo 'Departments';
                            } elseif ($current_page === 'department' && $current_dept) {
                                echo $departments[$current_dept]['name'];
                            } elseif ($current_page === 'analysis') {
                                echo 'Data Analysis';
                            } elseif ($current_page === 'users') {
                                echo 'User Management';
                            }
                            ?>
                        </h2>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="text" placeholder="Search..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent w-80">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <div class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <main class="flex-1 overflow-y-auto p-8 bg-gray-50">
                <?php if ($current_page === 'dashboard'): ?>
                    <!-- Dashboard Overview -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <!-- Left Column - Stats -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- System Overview Cards -->
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-blue-100 rounded-lg">
                                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-gray-600">Departments</p>
                                            <p class="text-2xl font-bold text-gray-900"><?= $dashboard_stats['total_departments'] ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-green-100 rounded-lg">
                                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-gray-600">Active Users</p>
                                            <p class="text-2xl font-bold text-gray-900"><?= $dashboard_stats['active_users'] ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-yellow-100 rounded-lg">
                                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-gray-600">Pending Reports</p>
                                            <p class="text-2xl font-bold text-gray-900"><?= $dashboard_stats['pending_reports'] ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-purple-100 rounded-lg">
                                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-gray-600">System Health</p>
                                            <p class="text-2xl font-bold text-gray-900"><?= $dashboard_stats['system_health'] ?>%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Department Status -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                                <h3 class="text-lg font-semibold mb-4">Department Status</h3>
                                <div class="space-y-4">
                                    <?php foreach ($departments as $dept_key => $dept): ?>
                                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                            <div class="flex items-center">
                                                <span class="text-2xl mr-3"><?= $dept['icon'] ?></span>
                                                <div>
                                                    <h4 class="font-medium"><?= $dept['short_name'] ?></h4>
                                                    <p class="text-sm text-gray-500">Last update: <?= $dashboard_stats['department_status'][$dept_key]['last_update'] ?></p>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <div class="text-right">
                                                    <p class="text-sm font-medium"><?= $dashboard_stats['department_status'][$dept_key]['health'] ?>%</p>
                                                    <div class="w-20 bg-gray-200 rounded-full h-2">
                                                        <div class="bg-green-500 h-2 rounded-full" style="width: <?= $dashboard_stats['department_status'][$dept_key]['health'] ?>%"></div>
                                                    </div>
                                                </div>
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    Online
                                                </span>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- Population Summary Chart -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                                <h3 class="text-lg font-semibold mb-4">Population Overview</h3>
                                <div style="height: 300px;">
                                    <canvas id="dashboardPopChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column - Activity & Sync -->
                        <div class="space-y-6">
                            <!-- Sync Status -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="text-lg font-semibold">System Sync</h3>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <span class="w-2 h-2 bg-green-500 rounded-full mr-1 animate-pulse"></span>
                                        Live
                                    </span>
                                </div>
                                <div class="space-y-3">
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Last Sync:</span>
                                        <span class="font-medium"><?= $dashboard_stats['last_sync'] ?></span>
                                    </div>
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Status:</span>
                                        <span class="text-green-600 font-medium">Connected</span>
                                    </div>
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Next Sync:</span>
                                        <span class="font-medium">Auto (5 min)</span>
                                    </div>
                                </div>
                                <button class="w-full mt-4 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors text-sm">
                                    Force Sync Now
                                </button>
                            </div>

                            <!-- Recent Activity -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                                <h3 class="text-lg font-semibold mb-4">Recent Activity</h3>
                                <div class="space-y-3">
                                    <?php foreach ($dashboard_stats['recent_activities'] as $activity): ?>
                                        <div class="flex items-start space-x-3">
                                            <div class="w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm text-gray-900"><?= $activity['action'] ?></p>
                                                <p class="text-xs text-gray-500"><?= $activity['time'] ?> • <?= $activity['user'] ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- Quick Actions -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                                <h3 class="text-lg font-semibold mb-4">Quick Actions</h3>
                                <div class="space-y-2">
                                    <button class="w-full text-left p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            Generate Report
                                        </div>
                                    </button>
                                    <button class="w-full text-left p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                            </svg>
                                            Export Data
                                        </div>
                                    </button>
                                    <button class="w-full text-left p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            System Settings
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php elseif ($current_page === 'departments'): ?>
                    <!-- Department Cards Grid -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-7xl mx-auto">
                        <!-- MSWDO Card -->
                        <div class="department-card bg-white card-hover transition-all cursor-pointer" onclick="window.location.href='?page=department&dept=mswdo'">
                            <div class="active-badge">Active</div>
                            <div class="p-10 h-full flex flex-col justify-center items-center text-center">
                                <div class="mb-8">
                                    <span class="text-8xl">🤝</span>
                                </div>
                                <h3 class="text-3xl font-bold text-gray-900 mb-6">Municipal Social Welfare<br>and Development Office (MSWDO)</h3>
                            </div>
                            <button class="check-department-btn">Check Department</button>
                        </div>

                        <!-- MHO Card -->
                        <div class="department-card bg-white card-hover transition-all cursor-pointer" onclick="window.location.href='?page=department&dept=mho'">
                            <div class="active-badge">Active</div>
                            <div class="p-10 h-full flex flex-col justify-center items-center text-center">
                                <div class="mb-8">
                                    <span class="text-8xl">🏥</span>
                                </div>
                                <h3 class="text-3xl font-bold text-gray-900 mb-6">Municipal Health Office<br>(MHO)</h3>
                            </div>
                            <button class="check-department-btn">Check Department</button>
                        </div>

                        <!-- MENRO Card -->
                        <div class="department-card bg-white card-hover transition-all cursor-pointer col-span-1 lg:col-start-1 lg:col-end-3 lg:justify-self-center lg:max-w-md" onclick="window.location.href='?page=department&dept=menro'">
                            <div class="active-badge">Active</div>
                            <div class="p-10 h-full flex flex-col justify-center items-center text-center">
                                <div class="mb-8">
                                    <span class="text-8xl">🌳</span>
                                </div>
                                <h3 class="text-3xl font-bold text-gray-900 mb-6">Municipal Environment &<br>Natural Resources Office (MENRO)</h3>
                            </div>
                            <button class="check-department-btn">Check Department</button>
                        </div>
                    </div>

                <?php elseif ($current_page === 'department' && $current_dept): ?>
                    <!-- Department Specific Dashboard -->
                    <?php $dept_info = $departments[$current_dept]; ?>
                    
                    <!-- Back Button -->
                    <div class="mb-6">
                        <button onclick="window.location.href='?page=departments'" class="flex items-center text-gray-600 hover:text-gray-900 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Back to Departments
                        </button>
                    </div>

                    <div class="mb-8">
                        <div class="<?= $dept_info['color'] ?> text-white p-8 rounded-xl">
                            <div class="flex items-center">
                                <span class="text-5xl mr-6"><?= $dept_info['icon'] ?></span>
                                <div>
                                    <h2 class="text-3xl font-bold"><?= $dept_info['name'] ?></h2>
                                    <p class="text-xl opacity-90 mt-2">Demographic data monitoring and analysis</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if ($current_dept === 'mswdo'): ?>
                        <!-- MSWDO Department Dashboard -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <h4 class="font-semibold text-gray-700 mb-2">4Ps Beneficiaries</h4>
                                <p class="text-3xl font-bold text-purple-600">18,429</p>
                                <p class="text-sm text-gray-500 mt-1">Households covered</p>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <h4 class="font-semibold text-gray-700 mb-2">Senior Citizens</h4>
                                <p class="text-3xl font-bold text-blue-600"><?= number_format(array_sum(array_column($municipalities, 'senior'))) ?></p>
                                <p class="text-sm text-gray-500 mt-1">Registered seniors</p>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <h4 class="font-semibold text-gray-700 mb-2">PWD Registered</h4>
                                <p class="text-3xl font-bold text-green-600">3,247</p>
                                <p class="text-sm text-gray-500 mt-1">Persons with disability</p>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <h4 class="font-semibold text-gray-700 mb-2">Poverty Rate</h4>
                                <p class="text-3xl font-bold text-red-600"><?= $avg_poverty ?>%</p>
                                <p class="text-sm text-gray-500 mt-1">Provincial average</p>
                            </div>
                        </div>

                        <!-- Charts Section -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <h4 class="text-lg font-semibold mb-4">Population by Municipality</h4>
                                <div style="height: 300px;">
                                    <canvas id="populationChart"></canvas>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <h4 class="text-lg font-semibold mb-4">Gender Distribution</h4>
                                <div style="height: 300px;">
                                    <canvas id="genderChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Municipality Data Management -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-8">
                            <div class="p-6 border-b border-gray-200">
                                <div class="flex justify-between items-center">
                                    <h4 class="text-lg font-semibold">Municipality Data Management</h4>
                                    <button class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition-colors flex items-center" onclick="toggleDataForm('mswdo')">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        Add MSWDO Data
                                    </button>
                                </div>
                            </div>
                            <div class="p-6">
                                <!-- Accessible Municipalities -->
                                <div class="mb-6">
                                    <h5 class="font-medium text-gray-900 mb-3">Accessible Municipalities</h5>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <?php 
                                        $mswdo_municipalities = ['Iloilo City', 'Oton', 'Pavia'];
                                        foreach ($mswdo_municipalities as $municipality): 
                                        ?>
                                            <div class="border border-purple-200 rounded-lg p-4 bg-purple-50">
                                                <div class="flex items-center justify-between">
                                                    <div>
                                                        <h6 class="font-medium text-purple-900"><?= $municipality ?></h6>
                                                        <p class="text-sm text-purple-600">Population: <?= number_format($municipalities[$municipality]['population']) ?></p>
                                                    </div>
                                                    <button class="text-purple-600 hover:text-purple-800 p-2 rounded-lg hover:bg-purple-100 transition-colors" onclick="viewMunicipalityData('<?= strtolower(str_replace(' ', '_', $municipality)) ?>', 'mswdo')">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                                <!-- Data Entry Form (Hidden by default) -->
                                <div id="mswdo-data-form" class="hidden">
                                    <div class="border-t border-gray-200 pt-6">
                                        <form class="space-y-6">
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-2">Municipality</label>
                                                    <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                                        <option>Select Municipality</option>
                                                        <?php foreach ($mswdo_municipalities as $municipality): ?>
                                                            <option value="<?= strtolower(str_replace(' ', '_', $municipality)) ?>"><?= $municipality ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-2">Data Period</label>
                                                    <input type="month" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-purple-500 focus:border-transparent" value="<?= date('Y-m') ?>">
                                                </div>
                                            </div>
                                            
                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                                <?php foreach ($department_data_fields['mswdo']['fields'] as $field): ?>
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                                            <?= $field['label'] ?>
                                                            <?php if ($field['required']): ?>
                                                                <span class="text-red-500">*</span>
                                                            <?php endif; ?>
                                                        </label>
                                                        <input 
                                                            type="<?= $field['type'] ?>" 
                                                            name="<?= $field['name'] ?>"
                                                            <?= isset($field['step']) ? 'step="' . $field['step'] . '"' : '' ?>
                                                            <?= $field['required'] ? 'required' : '' ?>
                                                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                                            placeholder="Enter <?= strtolower($field['label']) ?>"
                                                        >
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            
                                            <div class="flex justify-end space-x-3">
                                                <button type="button" onclick="toggleDataForm('mswdo')" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                                                    Cancel
                                                </button>
                                                <button type="submit" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-colors">
                                                    Save Data
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php elseif ($current_dept === 'mho'): ?>
                        <!-- MHO Department Dashboard -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <h4 class="font-semibold text-gray-700 mb-2">Health Facilities</h4>
                                <p class="text-3xl font-bold text-red-600">89</p>
                                <p class="text-sm text-gray-500 mt-1">Active clinics & hospitals</p>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <h4 class="font-semibold text-gray-700 mb-2">Vaccination Rate</h4>
                                <p class="text-3xl font-bold text-blue-600">92.3%</p>
                                <p class="text-sm text-gray-500 mt-1">Fully vaccinated</p>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <h4 class="font-semibold text-gray-700 mb-2">Maternal Health</h4>
                                <p class="text-3xl font-bold text-purple-600">98.7%</p>
                                <p class="text-sm text-gray-500 mt-1">Skilled birth attendance</p>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <h4 class="font-semibold text-gray-700 mb-2">Infant Mortality</h4>
                                <p class="text-3xl font-bold text-green-600">8.2</p>
                                <p class="text-sm text-gray-500 mt-1">per 1000 live births</p>
                            </div>
                        </div>

                        <!-- Charts Section -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <h4 class="text-lg font-semibold mb-4">Population by Municipality</h4>
                                <div style="height: 300px;">
                                    <canvas id="populationChartMHO"></canvas>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <h4 class="text-lg font-semibold mb-4">Gender Distribution</h4>
                                <div style="height: 300px;">
                                    <canvas id="genderChartMHO"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Municipality Data Management -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-8">
                            <div class="p-6 border-b border-gray-200">
                                <div class="flex justify-between items-center">
                                    <h4 class="text-lg font-semibold">Municipality Health Data Management</h4>
                                    <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition-colors flex items-center" onclick="toggleDataForm('mho')">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        Add Health Data
                                    </button>
                                </div>
                            </div>
                            <div class="p-6">
                                <!-- Accessible Municipalities -->
                                <div class="mb-6">
                                    <h5 class="font-medium text-gray-900 mb-3">Accessible Municipalities</h5>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <?php 
                                        $mho_municipalities = ['Iloilo City', 'Santa Barbara', 'Cabatuan'];
                                        foreach ($mho_municipalities as $municipality): 
                                        ?>
                                            <div class="border border-red-200 rounded-lg p-4 bg-red-50">
                                                <div class="flex items-center justify-between">
                                                    <div>
                                                        <h6 class="font-medium text-red-900"><?= $municipality ?></h6>
                                                        <p class="text-sm text-red-600">Population: <?= number_format($municipalities[$municipality]['population']) ?></p>
                                                    </div>
                                                    <button class="text-red-600 hover:text-red-800 p-2 rounded-lg hover:bg-red-100 transition-colors" onclick="viewMunicipalityData('<?= strtolower(str_replace(' ', '_', $municipality)) ?>', 'mho')">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                                <!-- Data Entry Form (Hidden by default) -->
                                <div id="mho-data-form" class="hidden">
                                    <div class="border-t border-gray-200 pt-6">
                                        <form class="space-y-6">
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-2">Municipality</label>
                                                    <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                                        <option>Select Municipality</option>
                                                        <?php foreach ($mho_municipalities as $municipality): ?>
                                                            <option value="<?= strtolower(str_replace(' ', '_', $municipality)) ?>"><?= $municipality ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-2">Data Period</label>
                                                    <input type="month" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" value="<?= date('Y-m') ?>">
                                                </div>
                                            </div>
                                            
                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                                <?php foreach ($department_data_fields['mho']['fields'] as $field): ?>
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                                            <?= $field['label'] ?>
                                                            <?php if ($field['required']): ?>
                                                                <span class="text-red-500">*</span>
                                                            <?php endif; ?>
                                                        </label>
                                                        <input 
                                                            type="<?= $field['type'] ?>" 
                                                            name="<?= $field['name'] ?>"
                                                            <?= isset($field['step']) ? 'step="' . $field['step'] . '"' : '' ?>
                                                            <?= $field['required'] ? 'required' : '' ?>
                                                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                                            placeholder="Enter <?= strtolower($field['label']) ?>"
                                                        >
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            
                                            <div class="flex justify-end space-x-3">
                                                <button type="button" onclick="toggleDataForm('mho')" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                                                    Cancel
                                                </button>
                                                <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors">
                                                    Save Health Data
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php elseif ($current_dept === 'menro'): ?>
                            <!-- MENRO Department Dashboard -->
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                    <h4 class="font-semibold text-gray-700 mb-2">Forest Coverage</h4>
                                    <p class="text-3xl font-bold text-emerald-600">34.7%</p>
                                    <p class="text-sm text-gray-500 mt-1">Total land area</p>
                                </div>
                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                    <h4 class="font-semibold text-gray-700 mb-2">Water Sources</h4>
                                    <p class="text-3xl font-bold text-blue-600">127</p>
                                    <p class="text-sm text-gray-500 mt-1">Springs and wells</p>
                                </div>
                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                    <h4 class="font-semibold text-gray-700 mb-2">Waste Management</h4>
                                    <p class="text-3xl font-bold text-green-600">78.4%</p>
                                    <p class="text-sm text-gray-500 mt-1">Waste diversion rate</p>
                                </div>
                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                    <h4 class="font-semibold text-gray-700 mb-2">Air Quality Index</h4>
                                    <p class="text-3xl font-bold text-yellow-600">42</p>
                                    <p class="text-sm text-gray-500 mt-1">Good quality</p>
                                </div>
                            </div>

                            <!-- Charts Section -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                    <h4 class="text-lg font-semibold mb-4">Population by Municipality</h4>
                                    <div style="height: 300px;">
                                        <canvas id="populationChartMENRO"></canvas>
                                    </div>
                                </div>
                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                    <h4 class="text-lg font-semibold mb-4">Gender Distribution</h4>
                                    <div style="height: 300px;">
                                        <canvas id="genderChartMENRO"></canvas>
                                    </div>
                                </div>
                            </div>

                            <!-- Municipality Environmental Data Management -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-8">
                                <div class="p-6 border-b border-gray-200">
                                    <div class="flex justify-between items-center">
                                        <h4 class="text-lg font-semibold">Municipality Environmental Data Management</h4>
                                        <button class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg transition-colors flex items-center" onclick="toggleDataForm('menro')">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            Add Environmental Data
                                        </button>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <!-- Accessible Municipalities -->
                                    <div class="mb-6">
                                        <h5 class="font-medium text-gray-900 mb-3">Accessible Municipalities</h5>
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                            <?php 
                                            $menro_municipalities = ['Pavia', 'Santa Barbara', 'Cabatuan'];
                                            foreach ($menro_municipalities as $municipality): 
                                            ?>
                                                <div class="border border-emerald-200 rounded-lg p-4 bg-emerald-50">
                                                    <div class="flex items-center justify-between">
                                                        <div>
                                                            <h6 class="font-medium text-emerald-900"><?= $municipality ?></h6>
                                                            <p class="text-sm text-emerald-600">Population: <?= number_format($municipalities[$municipality]['population']) ?></p>
                                                        </div>
                                                        <button class="text-emerald-600 hover:text-emerald-800 p-2 rounded-lg hover:bg-emerald-100 transition-colors" onclick="viewMunicipalityData('<?= strtolower(str_replace(' ', '_', $municipality)) ?>', 'menro')">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                    <!-- Data Entry Form (Hidden by default) -->
                                    <div id="menro-data-form" class="hidden">
                                        <div class="border-t border-gray-200 pt-6">
                                            <form class="space-y-6">
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700 mb-2">Municipality</label>
                                                        <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                                                            <option>Select Municipality</option>
                                                            <?php foreach ($menro_municipalities as $municipality): ?>
                                                                <option value="<?= strtolower(str_replace(' ', '_', $municipality)) ?>"><?= $municipality ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700 mb-2">Data Period</label>
                                                        <input type="month" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-emerald-500 focus:border-transparent" value="<?= date('Y-m') ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                                    <?php foreach ($department_data_fields['menro']['fields'] as $field): ?>
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                                                <?= $field['label'] ?>
                                                                <?php if ($field['required']): ?>
                                                                    <span class="text-red-500">*</span>
                                                                <?php endif; ?>
                                                            </label>
                                                            <input 
                                                                type="<?= $field['type'] ?>" 
                                                                name="<?= $field['name'] ?>"
                                                                <?= isset($field['step']) ? 'step="' . $field['step'] . '"' : '' ?>
                                                                <?= $field['required'] ? 'required' : '' ?>
                                                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                                                                placeholder="Enter <?= strtolower($field['label']) ?>"
                                                            >
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                                
                                                <div class="flex justify-end space-x-3">
                                                    <button type="button" onclick="toggleDataForm('menro')" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                                                        Cancel
                                                    </button>
                                                    <button type="submit" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg transition-colors">
                                                        Save Environmental Data
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endif; ?>

                <?php elseif ($current_page === 'analysis'): ?>
                    <!-- Analysis Page -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
                        <h3 class="text-2xl font-bold mb-6">Provincial Statistics Overview</h3>
                        
                        <!-- Key Metrics -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                            <div class="text-center p-6 bg-blue-50 rounded-xl">
                                <div class="text-3xl font-bold text-blue-600"><?= number_format($total_population) ?></div>
                                <div class="text-gray-600 mt-1">Total Population</div>
                            </div>
                            <div class="text-center p-6 bg-green-50 rounded-xl">
                                <div class="text-3xl font-bold text-green-600"><?= number_format($total_households) ?></div>
                                <div class="text-gray-600 mt-1">Total Households</div>
                            </div>
                            <div class="text-center p-6 bg-yellow-50 rounded-xl">
                                <div class="text-3xl font-bold text-yellow-600"><?= $avg_employment ?>%</div>
                                <div class="text-gray-600 mt-1">Avg Employment</div>
                            </div>
                            <div class="text-center p-6 bg-purple-50 rounded-xl">
                                <div class="text-3xl font-bold text-purple-600"><?= $avg_literacy ?>%</div>
                                <div class="text-gray-600 mt-1">Avg Literacy</div>
                            </div>
                        </div>

                        <!-- Charts -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <div>
                                <h4 class="text-lg font-semibold mb-4">Population Distribution</h4>
                                <div style="height: 300px;">
                                    <canvas id="analysisPopChart"></canvas>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold mb-4">Employment vs Literacy Rates</h4>
                                <div style="height: 300px;">
                                    <canvas id="analysisRatesChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php elseif ($current_page === 'users'): ?>
                    <!-- User Management Page -->
                    <div class="max-w-6xl mx-auto">
                        <!-- Header Section -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6">
                            <div class="p-6 border-b border-gray-200">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h3 class="text-xl font-semibold">User Management</h3>
                                        <p class="text-gray-600 mt-1">Manage department administrators and system users</p>
                                    </div>
                                    <div class="flex space-x-3">
                                        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition-colors flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            Add New User
                                        </button>
                                        <button class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition-colors flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                            </svg>
                                            Export Users
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- User Statistics -->
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                                    <div class="text-center p-4 bg-blue-50 rounded-lg">
                                        <div class="text-2xl font-bold text-blue-600"><?= count($department_admins) ?></div>
                                        <div class="text-sm text-gray-600">Total Users</div>
                                    </div>
                                    <div class="text-center p-4 bg-green-50 rounded-lg">
                                        <div class="text-2xl font-bold text-green-600"><?= count(array_filter($department_admins, function($u) { return $u['status'] === 'active'; })) ?></div>
                                        <div class="text-sm text-gray-600">Active Users</div>
                                    </div>
                                    <div class="text-center p-4 bg-purple-50 rounded-lg">
                                        <div class="text-2xl font-bold text-purple-600"><?= count(array_filter($department_admins, function($u) { return $u['role'] === 'Department Admin'; })) ?></div>
                                        <div class="text-sm text-gray-600">Department Admins</div>
                                    </div>
                                    <div class="text-center p-4 bg-orange-50 rounded-lg">
                                        <div class="text-2xl font-bold text-orange-600"><?= count(array_filter($department_admins, function($u) { return $u['status'] === 'inactive'; })) ?></div>
                                        <div class="text-sm text-gray-600">Inactive Users</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Filters and Search -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6 p-6">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                                <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                                    <div class="relative">
                                        <input type="text" placeholder="Search users..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent w-full md:w-64">
                                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </div>
                                    <select class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                        <option>All Departments</option>
                                        <option>System</option>
                                        <option>MSWDO</option>
                                        <option>MHO</option>
                                        <option>MENRO</option>
                                    </select>
                                    <select class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                        <option>All Status</option>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Users List -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                            <div class="p-6">
                                <div class="space-y-4">
                                    <?php foreach ($department_admins as $user): ?>
                                        <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                                            <div class="flex items-center space-x-4">
                                                <div class="w-12 h-12 <?= $user['color'] ?> rounded-full flex items-center justify-center text-white font-semibold">
                                                    <?= $user['initials'] ?>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="flex items-center space-x-3">
                                                        <h4 class="font-medium text-gray-900"><?= $user['name'] ?></h4>
                                                        <?php if ($user['role'] === 'Super Admin'): ?>
                                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h4a1 1 0 010 2H6.414l2.293 2.293a1 1 0 01-1.414 1.414L5 6.414V8a1 1 0 01-2 0V4zm9 1a1 1 0 010-2h4a1 1 0 011 1v4a1 1 0 01-2 0V6.414l-2.293 2.293a1 1 0 11-1.414-1.414L13.586 5H12zm-9 7a1 1 0 012 0v1.586l2.293-2.293a1 1 0 111.414 1.414L6.414 15H8a1 1 0 010 2H4a1 1 0 01-1-1v-4zm13-1a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 010-2h1.586l-2.293-2.293a1 1 0 111.414-1.414L15 13.586V12a1 1 0 011-1z" clip-rule="evenodd"></path>
                                                                </svg>
                                                                Super Admin
                                                            </span>
                                                        <?php elseif ($user['role'] === 'Department Admin'): ?>
                                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                                                                </svg>
                                                                Admin
                                                            </span>
                                                        <?php else: ?>
                                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                                <?= $user['role'] ?>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="flex items-center space-x-4 mt-1">
                                                        <p class="text-sm text-gray-500"><?= $user['email'] ?></p>
                                                        <span class="text-sm text-gray-400">•</span>
                                                        <p class="text-sm text-gray-600 font-medium"><?= $user['department'] ?></p>
                                                        <span class="text-sm text-gray-400">•</span>
                                                        <p class="text-sm text-gray-500">Last login: <?= $user['last_login'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <?php if ($user['status'] === 'active'): ?>
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                        <span class="w-2 h-2 bg-green-500 rounded-full mr-1"></span>
                                                        Active
                                                    </span>
                                                <?php else: ?>
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                        <span class="w-2 h-2 bg-red-500 rounded-full mr-1"></span>
                                                        Inactive
                                                    </span>
                                                <?php endif; ?>
                                                
                                                <div class="flex items-center space-x-2">
                                                    <button class="text-blue-600 hover:text-blue-800 p-2 rounded-lg hover:bg-blue-50 transition-colors" title="Edit User">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                        </svg>
                                                    </button>
                                                    <button class="text-gray-600 hover:text-gray-800 p-2 rounded-lg hover:bg-gray-50 transition-colors" title="View Details">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                        </svg>
                                                    </button>
                                                    <?php if ($user['role'] !== 'Super Admin'): ?>
                                                        <button class="text-red-600 hover:text-red-800 p-2 rounded-lg hover:bg-red-50 transition-colors" title="Delete User">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                            </svg>
                                                        </button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>
            </main>
        </div>
    </div>

    <!-- Charts JavaScript -->
    <script>
        // Dashboard Population Chart
        const dashCtx = document.getElementById('dashboardPopChart');
        if (dashCtx) {
            new Chart(dashCtx, {
                type: 'line',
                data: {
                    labels: <?= json_encode(array_keys($municipalities)) ?>,
                    datasets: [{
                        label: 'Population',
                        data: <?= json_encode(array_column($municipalities, 'population')) ?>,
                        backgroundColor: 'rgba(99, 102, 241, 0.1)',
                        borderColor: 'rgba(99, 102, 241, 1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: 'rgba(99, 102, 241, 1)',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { 
                            display: true,
                            position: 'top'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return value.toLocaleString();
                                }
                            },
                            grid: {
                                color: 'rgba(0, 0, 0, 0.1)'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(0, 0, 0, 0.1)'
                            }
                        }
                    }
                }
            });
        }

        // MSWDO Population Chart
        const ctx1 = document.getElementById('populationChart');
        if (ctx1) {
            new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: <?= json_encode(array_keys($municipalities)) ?>,
                    datasets: [{
                        label: 'Population',
                        data: <?= json_encode(array_column($municipalities, 'population')) ?>,
                        backgroundColor: 'rgba(147, 51, 234, 0.6)',
                        borderColor: 'rgba(147, 51, 234, 1)',
                        borderWidth: 2,
                        borderRadius: 6,
                        borderSkipped: false,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return value.toLocaleString();
                                }
                            }
                        }
                    }
                }
            });
        }

        // MSWDO Gender Chart
        const ctx2 = document.getElementById('genderChart');
        if (ctx2) {
            new Chart(ctx2, {
                type: 'doughnut',
                data: {
                    labels: ['Male', 'Female'],
                    datasets: [{
                        data: [<?= $total_male ?>, <?= $total_female ?>],
                        backgroundColor: [
                            'rgba(59, 130, 246, 0.8)',
                            'rgba(236, 72, 153, 0.8)'
                        ],
                        borderWidth: 0,
                        cutout: '60%'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { 
                            position: 'bottom',
                            labels: {
                                padding: 20
                            }
                        }
                    }
                }
            });
        }

        // MHO Population Chart
        const ctxMHO1 = document.getElementById('populationChartMHO');
        if (ctxMHO1) {
            new Chart(ctxMHO1, {
                type: 'bar',
                data: {
                    labels: <?= json_encode(array_keys($municipalities)) ?>,
                    datasets: [{
                        label: 'Population',
                        data: <?= json_encode(array_column($municipalities, 'population')) ?>,
                        backgroundColor: 'rgba(239, 68, 68, 0.6)',
                        borderColor: 'rgba(239, 68, 68, 1)',
                        borderWidth: 2,
                        borderRadius: 6,
                        borderSkipped: false,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return value.toLocaleString();
                                }
                            }
                        }
                    }
                }
            });
        }

        // MHO Gender Chart
        const ctxMHO2 = document.getElementById('genderChartMHO');
        if (ctxMHO2) {
            new Chart(ctxMHO2, {
                type: 'doughnut',
                data: {
                    labels: ['Male', 'Female'],
                    datasets: [{
                        data: [<?= $total_male ?>, <?= $total_female ?>],
                        backgroundColor: [
                            'rgba(59, 130, 246, 0.8)',
                            'rgba(236, 72, 153, 0.8)'
                        ],
                        borderWidth: 0,
                        cutout: '60%'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { 
                            position: 'bottom',
                            labels: {
                                padding: 20
                            }
                        }
                    }
                }
            });
        }

        // MENRO Population Chart
        const ctxMENRO1 = document.getElementById('populationChartMENRO');
        if (ctxMENRO1) {
            new Chart(ctxMENRO1, {
                type: 'bar',
                data: {
                    labels: <?= json_encode(array_keys($municipalities)) ?>,
                    datasets: [{
                        label: 'Population',
                        data: <?= json_encode(array_column($municipalities, 'population')) ?>,
                        backgroundColor: 'rgba(16, 185, 129, 0.6)',
                        borderColor: 'rgba(16, 185, 129, 1)',
                        borderWidth: 2,
                        borderRadius: 6,
                        borderSkipped: false,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return value.toLocaleString();
                                }
                            }
                        }
                    }
                }
            });
        }

        // MENRO Gender Chart
        const ctxMENRO2 = document.getElementById('genderChartMENRO');
        if (ctxMENRO2) {
            new Chart(ctxMENRO2, {
                type: 'doughnut',
                data: {
                    labels: ['Male', 'Female'],
                    datasets: [{
                        data: [<?= $total_male ?>, <?= $total_female ?>],
                        backgroundColor: [
                            'rgba(59, 130, 246, 0.8)',
                            'rgba(236, 72, 153, 0.8)'
                        ],
                        borderWidth: 0,
                        cutout: '60%'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { 
                            position: 'bottom',
                            labels: {
                                padding: 20
                            }
                        }
                    }
                }
            });
        }

        // Analysis Charts
        const ctx3 = document.getElementById('analysisPopChart');
        if (ctx3) {
            new Chart(ctx3, {
                type: 'pie',
                data: {
                    labels: <?= json_encode(array_keys($municipalities)) ?>,
                    datasets: [{
                        data: <?= json_encode(array_column($municipalities, 'population')) ?>,
                        backgroundColor: [
                            'rgba(99, 102, 241, 0.8)',
                            'rgba(34, 197, 94, 0.8)',
                            'rgba(251, 191, 36, 0.8)',
                            'rgba(239, 68, 68, 0.8)',
                            'rgba(168, 85, 247, 0.8)'
                        ],
                        borderWidth: 3,
                        borderColor: '#fff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { 
                            position: 'bottom',
                            labels: {
                                padding: 20
                            }
                        }
                    }
                }
            });
        }

        const ctx4 = document.getElementById('analysisRatesChart');
        if (ctx4) {
            new Chart(ctx4, {
                type: 'scatter',
                data: {
                    datasets: [{
                        label: 'Employment vs Literacy',
                        data: [
                            <?php foreach ($municipalities as $name => $data): ?>
                                { x: <?= $data['employment_rate'] ?>, y: <?= $data['literacy_rate'] ?> },
                            <?php endforeach; ?>
                        ],
                        backgroundColor: 'rgba(99, 102, 241, 0.6)',
                        borderColor: 'rgba(99, 102, 241, 1)',
                        borderWidth: 2,
                        pointRadius: 8,
                        pointHoverRadius: 10
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { 
                            display: true,
                            position: 'top'
                        }
                    },
                    scales: {
                        x: {
                            title: { 
                                display: true, 
                                text: 'Employment Rate (%)',
                                font: {
                                    size: 14,
                                    weight: 'bold'
                                }
                            },
                            grid: {
                                color: 'rgba(0, 0, 0, 0.1)'
                            }
                        },
                        y: {
                            title: { 
                                display: true, 
                                text: 'Literacy Rate (%)',
                                font: {
                                    size: 14,
                                    weight: 'bold'
                                }
                            },
                            grid: {
                                color: 'rgba(0, 0, 0, 0.1)'
                            }
                        }
                    }
                }
            });
        }

        // Add smooth animations for card hover effects
        document.querySelectorAll('.department-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Auto-refresh indicator and live sync simulation
        setInterval(() => {
            const activeElements = document.querySelectorAll('.active-badge');
            activeElements.forEach(el => {
                el.style.opacity = '0.7';
                setTimeout(() => el.style.opacity = '1', 300);
            });

            // Update last sync time
            const syncElement = document.querySelector('.sync-time');
            if (syncElement) {
                const now = new Date();
                syncElement.textContent = now.toLocaleString();
            }
        }, 60000);

        // Real-time dashboard updates simulation
        setInterval(() => {
            // Simulate real-time data updates for dashboard
            const healthBars = document.querySelectorAll('.health-bar');
            healthBars.forEach(bar => {
                const randomHealth = Math.floor(Math.random() * 5) + 95; // 95-100%
                bar.style.width = randomHealth + '%';
            });
        }, 30000);

        // Data form toggle functionality
        function toggleDataForm(department) {
            const form = document.getElementById(department + '-data-form');
            if (form) {
                form.classList.toggle('hidden');
            }
        }

        // View municipality data functionality
        function viewMunicipalityData(municipality, department) {
            alert(`Viewing ${municipality.replace('_', ' ')} data for ${department.toUpperCase()}`);
            // This would typically open a modal or navigate to a detailed view
        }

        // Form submission handling
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const formData = new FormData(form);
                    const data = {};
                    for (let [key, value] of formData.entries()) {
                        data[key] = value;
                    }
                    console.log('Form data submitted:', data);
                    
                    // Show success message
                    const submitBtn = form.querySelector('button[type="submit"]');
                    const originalText = submitBtn.textContent;
                    submitBtn.textContent = 'Saved!';
                    submitBtn.classList.add('bg-green-600');
                    
                    setTimeout(() => {
                        submitBtn.textContent = originalText;
                        submitBtn.classList.remove('bg-green-600');
                        form.reset();
                        
                        // Hide form after successful submission
                        const formContainer = form.closest('[id$="-data-form"]');
                        if (formContainer) {
                            formContainer.classList.add('hidden');
                        }
                    }, 2000);
                });
            });
        });
    </script>
</body>
</html>