<?php
session_start();

// MENRO-specific environmental data for Iloilo Province municipalities
$municipalities = [
    'Pavia' => [
        'population' => 50815,
        'land_area' => 27.15, // sq km
        'forest_area' => 8.45,
        'water_sources' => 23,
        'waste_generated' => 45.2, // tons/month
        'waste_collected' => 42.1,
        'air_quality_index' => 38,
        'tree_planted_ytd' => 1250,
        'environmental_violations' => 3
    ],
    'Santa Barbara' => [
        'population' => 61390,
        'land_area' => 34.25,
        'forest_area' => 12.80,
        'water_sources' => 31,
        'waste_generated' => 58.7,
        'waste_collected' => 54.3,
        'air_quality_index' => 41,
        'tree_planted_ytd' => 1840,
        'environmental_violations' => 5
    ],
    'Cabatuan' => [
        'population' => 58107,
        'land_area' => 32.10,
        'forest_area' => 11.25,
        'water_sources' => 28,
        'waste_generated' => 52.4,
        'waste_collected' => 48.9,
        'air_quality_index' => 44,
        'tree_planted_ytd' => 1680,
        'environmental_violations' => 2
    ]
];

// Environmental programs and initiatives
$environmental_programs = [
    [
        'name' => 'Reforestation Initiative 2025',
        'target_trees' => 5000,
        'planted_trees' => 4770,
        'status' => 'active',
        'budget' => 850000,
        'municipalities' => ['Pavia', 'Santa Barbara', 'Cabatuan']
    ],
    [
        'name' => 'Waste Segregation Campaign',
        'target_households' => 15000,
        'covered_households' => 12400,
        'status' => 'active',
        'budget' => 420000,
        'municipalities' => ['Santa Barbara', 'Cabatuan']
    ],
    [
        'name' => 'Water Quality Monitoring',
        'monitoring_points' => 82,
        'tested_points' => 82,
        'status' => 'completed',
        'budget' => 320000,
        'municipalities' => ['Pavia', 'Santa Barbara', 'Cabatuan']
    ]
];

// Environmental alerts and violations
$environmental_alerts = [
    [
        'type' => 'Water Quality',
        'severity' => 'medium',
        'municipality' => 'Santa Barbara',
        'description' => 'Elevated nitrate levels detected in Barangay San Nicolas water source',
        'date' => '2025-09-18',
        'status' => 'investigating'
    ],
    [
        'type' => 'Air Quality',
        'severity' => 'low',
        'municipality' => 'Cabatuan',
        'description' => 'Temporary increase in particulate matter near industrial area',
        'date' => '2025-09-15',
        'status' => 'resolved'
    ],
    [
        'type' => 'Illegal Dumping',
        'severity' => 'high',
        'municipality' => 'Pavia',
        'description' => 'Unauthorized waste disposal site discovered in Barangay Tigbauan',
        'date' => '2025-09-20',
        'status' => 'pending_action'
    ]
];

// Calculate totals and averages
$total_land_area = array_sum(array_column($municipalities, 'land_area'));
$total_forest_area = array_sum(array_column($municipalities, 'forest_area'));
$total_water_sources = array_sum(array_column($municipalities, 'water_sources'));
$total_waste_generated = array_sum(array_column($municipalities, 'waste_generated'));
$total_waste_collected = array_sum(array_column($municipalities, 'waste_collected'));
$avg_air_quality = round(array_sum(array_column($municipalities, 'air_quality_index')) / count($municipalities), 1);
$total_trees_planted = array_sum(array_column($municipalities, 'tree_planted_ytd'));
$total_violations = array_sum(array_column($municipalities, 'environmental_violations'));

$forest_coverage_percent = round(($total_forest_area / $total_land_area) * 100, 1);
$waste_diversion_rate = round(($total_waste_collected / $total_waste_generated) * 100, 1);

// Current page state
$current_page = $_GET['page'] ?? 'overview';
$current_municipality = $_GET['municipality'] ?? null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MENRO - Municipal Environment & Natural Resources Office</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .sidebar-link:hover { background-color: rgba(16, 185, 129, 0.1); }
        .card-hover:hover { transform: translateY(-2px); box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); }
        .transition-all { transition: all 0.3s ease; }
        .alert-high { border-left: 4px solid #ef4444; background: #fef2f2; }
        .alert-medium { border-left: 4px solid #f59e0b; background: #fffbeb; }
        .alert-low { border-left: 4px solid #10b981; background: #f0fdf4; }
        .progress-ring {
            transform: rotate(-90deg);
        }
        .progress-ring-circle {
            transition: stroke-dasharray 0.35s;
            transform-origin: 50% 50%;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-emerald-800 text-white flex flex-col">
            <div class="p-6 border-b border-emerald-700">
                <h1 class="text-2xl font-bold flex items-center">
                    <span class="text-3xl mr-3">🌳</span>
                    MENRO
                </h1>
                <p class="text-emerald-200 text-sm mt-2">Municipal Environment & Natural Resources Office</p>
            </div>
            
            <nav class="flex-1 p-4 space-y-2">
                <a href="?page=overview" class="sidebar-link flex items-center p-3 rounded-lg <?= $current_page === 'overview' ? 'bg-emerald-700' : '' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                    </svg>
                    Overview
                </a>
                
                <a href="?page=municipalities" class="sidebar-link flex items-center p-3 rounded-lg <?= $current_page === 'municipalities' ? 'bg-emerald-700' : '' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Municipalities
                </a>
                
                <a href="?page=programs" class="sidebar-link flex items-center p-3 rounded-lg <?= $current_page === 'programs' ? 'bg-emerald-700' : '' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    Programs
                </a>
                
                <a href="?page=alerts" class="sidebar-link flex items-center p-3 rounded-lg <?= $current_page === 'alerts' ? 'bg-emerald-700' : '' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                    Alerts
                    <?php if (count(array_filter($environmental_alerts, function($a) { return $a['status'] !== 'resolved'; })) > 0): ?>
                        <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">
                            <?= count(array_filter($environmental_alerts, function($a) { return $a['status'] !== 'resolved'; })) ?>
                        </span>
                    <?php endif; ?>
                </a>
                
                <a href="?page=data_entry" class="sidebar-link flex items-center p-3 rounded-lg <?= $current_page === 'data_entry' ? 'bg-emerald-700' : '' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Data Entry
                </a>
                
                <a href="?page=reports" class="sidebar-link flex items-center p-3 rounded-lg <?= $current_page === 'reports' ? 'bg-emerald-700' : '' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    Reports
                </a>
            </nav>
            
            <div class="p-4 border-t border-emerald-700">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-emerald-600 rounded-full flex items-center justify-center">
                        <span class="text-sm font-bold">EC</span>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium">Elena Cruz</p>
                        <p class="text-xs text-emerald-200">MENRO Administrator</p>
                    </div>
                </div>
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
                            switch($current_page) {
                                case 'overview':
                                    echo 'Environmental Overview';
                                    break;
                                case 'municipalities':
                                    echo 'Municipality Data';
                                    break;
                                case 'programs':
                                    echo 'Environmental Programs';
                                    break;
                                case 'alerts':
                                    echo 'Environmental Alerts';
                                    break;
                                case 'data_entry':
                                    echo 'Data Entry';
                                    break;
                                case 'reports':
                                    echo 'Environmental Reports';
                                    break;
                                default:
                                    echo 'MENRO Dashboard';
                            }
                            ?>
                        </h2>
                        <p class="text-gray-600 mt-1">Environmental monitoring and resource management</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="text" placeholder="Search environmental data..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent w-80">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <button class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg transition-colors">
                            Export Data
                        </button>
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <main class="flex-1 overflow-y-auto p-8 bg-gray-50">
                <?php if ($current_page === 'overview'): ?>
                    <!-- Overview Dashboard -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <!-- Key Environmental Metrics -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Stats Cards -->
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 card-hover transition-all">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-green-100 rounded-lg">
                                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-gray-600">Forest Coverage</p>
                                            <p class="text-2xl font-bold text-gray-900"><?= $forest_coverage_percent ?>%</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 card-hover transition-all">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-blue-100 rounded-lg">
                                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-gray-600">Water Sources</p>
                                            <p class="text-2xl font-bold text-gray-900"><?= $total_water_sources ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 card-hover transition-all">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-yellow-100 rounded-lg">
                                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-gray-600">Air Quality</p>
                                            <p class="text-2xl font-bold text-gray-900"><?= $avg_air_quality ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 card-hover transition-all">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-purple-100 rounded-lg">
                                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-gray-600">Waste Diversion</p>
                                            <p class="text-2xl font-bold text-gray-900"><?= $waste_diversion_rate ?>%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Charts Section -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                    <h4 class="text-lg font-semibold mb-4">Forest Area by Municipality</h4>
                                    <div style="height: 300px;">
                                        <canvas id="forestChart"></canvas>
                                    </div>
                                </div>
                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                    <h4 class="text-lg font-semibold mb-4">Waste Management Performance</h4>
                                    <div style="height: 300px;">
                                        <canvas id="wasteChart"></canvas>
                                    </div>
                                </div>
                            </div>

                            <!-- Municipality Quick View -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                                <div class="p-6 border-b border-gray-200">
                                    <h4 class="text-lg font-semibold">Municipality Environmental Status</h4>
                                </div>
                                <div class="p-6">
                                    <div class="space-y-4">
                                        <?php foreach ($municipalities as $name => $data): ?>
                                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                                <div class="flex items-center">
                                                    <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                                                        <span class="text-emerald-600 font-bold text-lg"><?= substr($name, 0, 1) ?></span>
                                                    </div>
                                                    <div class="ml-4">
                                                        <h5 class="font-medium text-gray-900"><?= $name ?></h5>
                                                        <p class="text-sm text-gray-500">
                                                            Forest: <?= $data['forest_area'] ?>km² | 
                                                            Water sources: <?= $data['water_sources'] ?> | 
                                                            AQI: <?= $data['air_quality_index'] ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="flex items-center space-x-3">
                                                    <div class="text-right">
                                                        <p class="text-sm font-medium text-emerald-600">
                                                            <?= round(($data['forest_area'] / ($data['land_area'] ?? 30)) * 100, 1) ?>% Forest Coverage
                                                        </p>
                                                        <div class="w-24 bg-gray-200 rounded-full h-2">
                                                            <div class="bg-emerald-500 h-2 rounded-full" style="width: <?= round(($data['forest_area'] / ($data['land_area'] ?? 30)) * 100, 1) ?>%"></div>
                                                        </div>
                                                    </div>
                                                    <button class="text-emerald-600 hover:text-emerald-800 p-2 rounded-lg hover:bg-emerald-50 transition-colors" onclick="window.location.href='?page=municipalities&municipality=<?= strtolower(str_replace(' ', '_', $name)) ?>'">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Sidebar -->
                        <div class="space-y-6">
                            <!-- Active Programs -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                                <div class="p-6 border-b border-gray-200">
                                    <h4 class="text-lg font-semibold">Active Programs</h4>
                                </div>
                                <div class="p-6">
                                    <div class="space-y-4">
                                        <?php foreach (array_filter($environmental_programs, function($p) { return $p['status'] === 'active'; }) as $program): ?>
                                            <div class="border border-emerald-200 rounded-lg p-4">
                                                <h5 class="font-medium text-emerald-900"><?= $program['name'] ?></h5>
                                                <div class="mt-2">
                                                    <?php if (isset($program['target_trees'])): ?>
                                                        <p class="text-sm text-gray-600">
                                                            Trees: <?= number_format($program['planted_trees']) ?> / <?= number_format($program['target_trees']) ?>
                                                        </p>
                                                        <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                                                            <div class="bg-emerald-500 h-2 rounded-full" style="width: <?= ($program['planted_trees'] / $program['target_trees']) * 100 ?>%"></div>
                                                        </div>
                                                    <?php elseif (isset($program['target_households'])): ?>
                                                        <p class="text-sm text-gray-600">
                                                            Households: <?= number_format($program['covered_households']) ?> / <?= number_format($program['target_households']) ?>
                                                        </p>
                                                        <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                                                            <div class="bg-emerald-500 h-2 rounded-full" style="width: <?= ($program['covered_households'] / $program['target_households']) * 100 ?>%"></div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Recent Alerts -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                                <div class="p-6 border-b border-gray-200">
                                    <div class="flex justify-between items-center">
                                        <h4 class="text-lg font-semibold">Recent Alerts</h4>
                                        <a href="?page=alerts" class="text-emerald-600 hover:text-emerald-800 text-sm">View All</a>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <div class="space-y-3">
                                        <?php foreach (array_slice($environmental_alerts, 0, 3) as $alert): ?>
                                            <div class="alert-<?= $alert['severity'] ?> p-3 rounded-lg">
                                                <div class="flex justify-between items-start">
                                                    <div>
                                                        <p class="font-medium text-gray-900"><?= $alert['type'] ?></p>
                                                        <p class="text-sm text-gray-600"><?= $alert['municipality'] ?></p>
                                                    </div>
                                                    <span class="text-xs text-gray-500"><?= date('M j', strtotime($alert['date'])) ?></span>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Trees Planted This Year -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                                <div class="p-6">
                                    <div class="text-center">
                                        <h4 class="text-lg font-semibold mb-4">Trees Planted YTD</h4>
                                        <div class="relative inline-flex items-center justify-center">
                                            <svg class="w-32 h-32 progress-ring">
                                                <circle cx="64" cy="64" r="56" stroke="currentColor" stroke-width="8" fill="transparent" class="text-gray-200"></circle>
                                                <circle cx="64" cy="64" r="56" stroke="currentColor" stroke-width="8" fill="transparent" 
                                                        class="text-emerald-500 progress-ring-circle" 
                                                        stroke-dasharray="<?= 2 * pi() * 56 * ($total_trees_planted / 5000) ?> <?= 2 * pi() * 56 ?>"></circle>
                                            </svg>
                                            <div class="absolute">
                                                <div class="text-2xl font-bold text-emerald-600"><?= number_format($total_trees_planted) ?></div>
                                                <div class="text-xs text-gray-500">of 5,000 target</div>
                                            </div>
                                        </div>
                                        <p class="text-sm text-gray-600 mt-4">
                                            <?= round(($total_trees_planted / 5000) * 100, 1) ?>% of annual target achieved
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php elseif ($current_page === 'municipalities'): ?>
                    <!-- Municipalities Data Page -->
                    <div class="space-y-6">
                        <!-- Municipality Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <?php foreach ($municipalities as $name => $data): ?>
                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 card-hover transition-all cursor-pointer" onclick="toggleMunicipalityDetails('<?= strtolower(str_replace(' ', '_', $name)) ?>')">
                                    <div class="flex items-center justify-between mb-4">
                                        <h3 class="text-lg font-semibold text-gray-900"><?= $name ?></h3>
                                        <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center">
                                            <span class="text-emerald-600 font-bold"><?= substr($name, 0, 1) ?></span>
                                        </div>
                                    </div>
                                    <div class="space-y-3">
                                        <div class="flex justify-between">
                                            <span class="text-sm text-gray-600">Population:</span>
                                            <span class="text-sm font-medium"><?= number_format($data['population']) ?></span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-sm text-gray-600">Forest Area:</span>
                                            <span class="text-sm font-medium"><?= $data['forest_area'] ?> km²</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-sm text-gray-600">Water Sources:</span>
                                            <span class="text-sm font-medium"><?= $data['water_sources'] ?></span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-sm text-gray-600">Air Quality:</span>
                                            <span class="text-sm font-medium <?= $data['air_quality_index'] <= 50 ? 'text-green-600' : ($data['air_quality_index'] <= 100 ? 'text-yellow-600' : 'text-red-600') ?>">
                                                <?= $data['air_quality_index'] ?> AQI
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Detailed Municipality Data (Hidden by default) -->
                        <?php foreach ($municipalities as $name => $data): ?>
                            <div id="details_<?= strtolower(str_replace(' ', '_', $name)) ?>" class="hidden bg-white rounded-xl shadow-sm border border-gray-200">
                                <div class="p-6 border-b border-gray-200 bg-emerald-50">
                                    <div class="flex justify-between items-center">
                                        <h3 class="text-xl font-semibold text-emerald-900"><?= $name ?> Environmental Data</h3>
                                        <button onclick="toggleMunicipalityDetails('<?= strtolower(str_replace(' ', '_', $name)) ?>')" class="text-emerald-600 hover:text-emerald-800">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                        <div class="text-center p-4 bg-green-50 rounded-lg">
                                            <div class="text-2xl font-bold text-green-600"><?= $data['forest_area'] ?> km²</div>
                                            <div class="text-sm text-gray-600">Forest Area</div>
                                        </div>
                                        <div class="text-center p-4 bg-blue-50 rounded-lg">
                                            <div class="text-2xl font-bold text-blue-600"><?= $data['water_sources'] ?></div>
                                            <div class="text-sm text-gray-600">Water Sources</div>
                                        </div>
                                        <div class="text-center p-4 bg-yellow-50 rounded-lg">
                                            <div class="text-2xl font-bold text-yellow-600"><?= $data['air_quality_index'] ?></div>
                                            <div class="text-sm text-gray-600">Air Quality Index</div>
                                        </div>
                                        <div class="text-center p-4 bg-purple-50 rounded-lg">
                                            <div class="text-2xl font-bold text-purple-600"><?= number_format($data['tree_planted_ytd']) ?></div>
                                            <div class="text-sm text-gray-600">Trees Planted YTD</div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
                                        <div>
                                            <h4 class="text-lg font-semibold mb-4">Waste Management</h4>
                                            <div class="space-y-3">
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Generated:</span>
                                                    <span class="font-medium"><?= $data['waste_generated'] ?> tons/month</span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Collected:</span>
                                                    <span class="font-medium"><?= $data['waste_collected'] ?> tons/month</span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Diversion Rate:</span>
                                                    <span class="font-medium text-emerald-600"><?= round(($data['waste_collected'] / $data['waste_generated']) * 100, 1) ?>%</span>
                                                </div>
                                                <div class="w-full bg-gray-200 rounded-full h-3">
                                                    <div class="bg-emerald-500 h-3 rounded-full" style="width: <?= round(($data['waste_collected'] / $data['waste_generated']) * 100, 1) ?>%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <h4 class="text-lg font-semibold mb-4">Environmental Status</h4>
                                            <div class="space-y-3">
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Forest Coverage:</span>
                                                    <span class="font-medium"><?= round(($data['forest_area'] / ($data['land_area'] ?? 30)) * 100, 1) ?>%</span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Environmental Violations:</span>
                                                    <span class="font-medium <?= $data['environmental_violations'] == 0 ? 'text-green-600' : 'text-red-600' ?>">
                                                        <?= $data['environmental_violations'] ?>
                                                    </span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Status:</span>
                                                    <span class="font-medium text-green-600">
                                                        <?= $data['air_quality_index'] <= 50 ? 'Good' : ($data['air_quality_index'] <= 100 ? 'Moderate' : 'Unhealthy') ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                <?php elseif ($current_page === 'programs'): ?>
                    <!-- Environmental Programs Page -->
                    <div class="space-y-6">
                        <!-- Program Stats -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-emerald-600"><?= count($environmental_programs) ?></div>
                                    <div class="text-gray-600">Total Programs</div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-blue-600"><?= count(array_filter($environmental_programs, function($p) { return $p['status'] === 'active'; })) ?></div>
                                    <div class="text-gray-600">Active Programs</div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-green-600">₱<?= number_format(array_sum(array_column($environmental_programs, 'budget'))) ?></div>
                                    <div class="text-gray-600">Total Budget</div>
                                </div>
                            </div>
                        </div>

                        <!-- Programs List -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                            <div class="p-6 border-b border-gray-200">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-lg font-semibold">Environmental Programs</h3>
                                    <button class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg transition-colors">
                                        Add New Program
                                    </button>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="space-y-6">
                                    <?php foreach ($environmental_programs as $program): ?>
                                        <div class="border border-gray-200 rounded-lg p-6">
                                            <div class="flex justify-between items-start mb-4">
                                                <div>
                                                    <h4 class="text-lg font-semibold text-gray-900"><?= $program['name'] ?></h4>
                                                    <p class="text-gray-600">Budget: ₱<?= number_format($program['budget']) ?></p>
                                                </div>
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                                                    <?= $program['status'] === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' ?>">
                                                    <?= ucfirst($program['status']) ?>
                                                </span>
                                            </div>
                                            
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                <div>
                                                    <h5 class="font-medium text-gray-700 mb-2">Progress</h5>
                                                    <?php if (isset($program['target_trees'])): ?>
                                                        <div class="space-y-2">
                                                            <div class="flex justify-between text-sm">
                                                                <span>Trees Planted:</span>
                                                                <span><?= number_format($program['planted_trees']) ?> / <?= number_format($program['target_trees']) ?></span>
                                                            </div>
                                                            <div class="w-full bg-gray-200 rounded-full h-2">
                                                                <div class="bg-emerald-500 h-2 rounded-full" style="width: <?= ($program['planted_trees'] / $program['target_trees']) * 100 ?>%"></div>
                                                            </div>
                                                            <div class="text-sm text-gray-600">
                                                                <?= round(($program['planted_trees'] / $program['target_trees']) * 100, 1) ?>% Complete
                                                            </div>
                                                        </div>
                                                    <?php elseif (isset($program['target_households'])): ?>
                                                        <div class="space-y-2">
                                                            <div class="flex justify-between text-sm">
                                                                <span>Households Covered:</span>
                                                                <span><?= number_format($program['covered_households']) ?> / <?= number_format($program['target_households']) ?></span>
                                                            </div>
                                                            <div class="w-full bg-gray-200 rounded-full h-2">
                                                                <div class="bg-emerald-500 h-2 rounded-full" style="width: <?= ($program['covered_households'] / $program['target_households']) * 100 ?>%"></div>
                                                            </div>
                                                            <div class="text-sm text-gray-600">
                                                                <?= round(($program['covered_households'] / $program['target_households']) * 100, 1) ?>% Complete
                                                            </div>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="text-sm text-emerald-600 font-medium">Program Completed</div>
                                                    <?php endif; ?>
                                                </div>
                                                
                                                <div>
                                                    <h5 class="font-medium text-gray-700 mb-2">Participating Municipalities</h5>
                                                    <div class="flex flex-wrap gap-2">
                                                        <?php foreach ($program['municipalities'] as $municipality): ?>
                                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                                                                <?= $municipality ?>
                                                            </span>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php elseif ($current_page === 'alerts'): ?>
                    <!-- Environmental Alerts Page -->
                    <div class="space-y-6">
                        <!-- Alert Stats -->
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-red-600"><?= count(array_filter($environmental_alerts, function($a) { return $a['severity'] === 'high'; })) ?></div>
                                    <div class="text-gray-600">High Priority</div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-yellow-600"><?= count(array_filter($environmental_alerts, function($a) { return $a['severity'] === 'medium'; })) ?></div>
                                    <div class="text-gray-600">Medium Priority</div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-green-600"><?= count(array_filter($environmental_alerts, function($a) { return $a['severity'] === 'low'; })) ?></div>
                                    <div class="text-gray-600">Low Priority</div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-gray-600"><?= count(array_filter($environmental_alerts, function($a) { return $a['status'] === 'resolved'; })) ?></div>
                                    <div class="text-gray-600">Resolved</div>
                                </div>
                            </div>
                        </div>

                        <!-- Alerts List -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                            <div class="p-6 border-b border-gray-200">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-lg font-semibold">Environmental Alerts & Violations</h3>
                                    <div class="flex space-x-2">
                                        <select class="border border-gray-300 rounded-lg px-3 py-2">
                                            <option>All Severities</option>
                                            <option>High</option>
                                            <option>Medium</option>
                                            <option>Low</option>
                                        </select>
                                        <select class="border border-gray-300 rounded-lg px-3 py-2">
                                            <option>All Status</option>
                                            <option>Pending Action</option>
                                            <option>Investigating</option>
                                            <option>Resolved</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="space-y-4">
                                    <?php foreach ($environmental_alerts as $alert): ?>
                                        <div class="alert-<?= $alert['severity'] ?> p-4 rounded-lg">
                                            <div class="flex justify-between items-start">
                                                <div class="flex-1">
                                                    <div class="flex items-center space-x-3 mb-2">
                                                        <h4 class="font-semibold text-gray-900"><?= $alert['type'] ?></h4>
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                                            <?= $alert['severity'] === 'high' ? 'bg-red-100 text-red-800' : 
                                                                ($alert['severity'] === 'medium' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800') ?>">
                                                            <?= ucfirst($alert['severity']) ?> Priority
                                                        </span>
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                            <?= $alert['municipality'] ?>
                                                        </span>
                                                    </div>
                                                    <p class="text-gray-700 mb-2"><?= $alert['description'] ?></p>
                                                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                                                        <span>Date: <?= date('M j, Y', strtotime($alert['date'])) ?></span>
                                                        <span>Status: <?= ucfirst(str_replace('_', ' ', $alert['status'])) ?></span>
                                                    </div>
                                                </div>
                                                <div class="flex space-x-2">
                                                    <button class="text-blue-600 hover:text-blue-800 p-2 rounded-lg hover:bg-blue-50 transition-colors">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                        </svg>
                                                    </button>
                                                    <?php if ($alert['status'] !== 'resolved'): ?>
                                                        <button class="text-green-600 hover:text-green-800 p-2 rounded-lg hover:bg-green-50 transition-colors">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
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

                <?php elseif ($current_page === 'data_entry'): ?>
                    <!-- Data Entry Page -->
                    <div class="max-w-4xl mx-auto">
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                            <div class="p-6 border-b border-gray-200">
                                <h3 class="text-lg font-semibold">Environmental Data Entry</h3>
                                <p class="text-gray-600 mt-1">Enter monthly environmental data for municipalities</p>
                            </div>
                            <div class="p-6">
                                <form class="space-y-6">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Municipality</label>
                                            <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-emerald-500 focus:border-transparent" required>
                                                <option value="">Select Municipality</option>
                                                <?php foreach (array_keys($municipalities) as $municipality): ?>
                                                    <option value="<?= strtolower(str_replace(' ', '_', $municipality)) ?>"><?= $municipality ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Data Period</label>
                                            <input type="month" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-emerald-500 focus:border-transparent" value="<?= date('Y-m') ?>" required>
                                        </div>
                                    </div>
                                    
                                    <div class="border-t border-gray-200 pt-6">
                                        <h4 class="text-lg font-medium text-gray-900 mb-4">Environmental Metrics</h4>
                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Forest Area (Hectares) <span class="text-red-500">*</span></label>
                                                <input type="number" step="0.01" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-emerald-500 focus:border-transparent" placeholder="Enter forest area" required>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Water Sources Count <span class="text-red-500">*</span></label>
                                                <input type="number" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-emerald-500 focus:border-transparent" placeholder="Enter water sources count" required>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Waste Collected (Tons) <span class="text-red-500">*</span></label>
                                                <input type="number" step="0.01" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-emerald-500 focus:border-transparent" placeholder="Enter waste collected" required>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Air Quality Index</label>
                                                <input type="number" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-emerald-500 focus:border-transparent" placeholder="Enter air quality index">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Trees Planted</label>
                                                <input type="number" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-emerald-500 focus:border-transparent" placeholder="Enter trees planted">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Environmental Violations</label>
                                                <input type="number" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-emerald-500 focus:border-transparent" placeholder="Enter violations count">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="border-t border-gray-200 pt-6">
                                        <h4 class="text-lg font-medium text-gray-900 mb-4">Additional Information</h4>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Notes/Remarks</label>
                                            <textarea rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-emerald-500 focus:border-transparent" placeholder="Enter any additional notes or remarks about the environmental data..."></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="flex justify-end space-x-3">
                                        <button type="button" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
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

                <?php elseif ($current_page === 'reports'): ?>
                    <!-- Reports Page -->
                    <div class="space-y-6">
                        <!-- Report Generation -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                            <div class="p-6 border-b border-gray-200">
                                <h3 class="text-lg font-semibold">Generate Environmental Reports</h3>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                    <button class="p-4 border border-emerald-200 rounded-lg hover:bg-emerald-50 transition-colors text-left">
                                        <div class="text-emerald-600 mb-2">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                            </svg>
                                        </div>
                                        <h4 class="font-medium text-gray-900">Monthly Summary</h4>
                                        <p class="text-sm text-gray-600">Environmental data overview</p>
                                    </button>
                                    <button class="p-4 border border-emerald-200 rounded-lg hover:bg-emerald-50 transition-colors text-left">
                                        <div class="text-emerald-600 mb-2">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                                            </svg>
                                        </div>
                                        <h4 class="font-medium text-gray-900">Forest Assessment</h4>
                                        <p class="text-sm text-gray-600">Tree coverage analysis</p>
                                    </button>
                                    <button class="p-4 border border-emerald-200 rounded-lg hover:bg-emerald-50 transition-colors text-left">
                                        <div class="text-emerald-600 mb-2">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                            </svg>
                                        </div>
                                        <h4 class="font-medium text-gray-900">Waste Management</h4>
                                        <p class="text-sm text-gray-600">Collection and diversion rates</p>
                                    </button>
                                    <button class="p-4 border border-emerald-200 rounded-lg hover:bg-emerald-50 transition-colors text-left">
                                        <div class="text-emerald-600 mb-2">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                            </svg>
                                        </div>
                                        <h4 class="font-medium text-gray-900">Violations Report</h4>
                                        <p class="text-sm text-gray-600">Environmental incidents</p>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Reports -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                            <div class="p-6 border-b border-gray-200">
                                <h3 class="text-lg font-semibold">Recent Reports</h3>
                            </div>
                            <div class="p-6">
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                            </div>
                                            <div class="ml-4">
                                                <h4 class="font-medium text-gray-900">September 2025 Environmental Summary</h4>
                                                <p class="text-sm text-gray-500">Generated on Sep 21, 2025</p>
                                            </div>
                                        </div>
                                        <div class="flex space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800 p-2 rounded-lg hover:bg-blue-50 transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </button>
                                            <button class="text-emerald-600 hover:text-emerald-800 p-2 rounded-lg hover:bg-emerald-50 transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4-4m0 0l-4 4m4-4v12"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                                                </svg>
                                            </div>
                                            <div class="ml-4">
                                                <h4 class="font-medium text-gray-900">Q3 2025 Reforestation Progress</h4>
                                                <p class="text-sm text-gray-500">Generated on Sep 15, 2025</p>
                                            </div>
                                        </div>
                                        <div class="flex space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800 p-2 rounded-lg hover:bg-blue-50 transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </button>
                                            <button class="text-emerald-600 hover:text-emerald-800 p-2 rounded-lg hover:bg-emerald-50 transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4-4m0 0l-4 4m4-4v12"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                                </svg>
                                            </div>
                                            <div class="ml-4">
                                                <h4 class="font-medium text-gray-900">Air Quality Assessment August 2025</h4>
                                                <p class="text-sm text-gray-500">Generated on Sep 1, 2025</p>
                                            </div>
                                        </div>
                                        <div class="flex space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800 p-2 rounded-lg hover:bg-blue-50 transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </button>
                                            <button class="text-emerald-600 hover:text-emerald-800 p-2 rounded-lg hover:bg-emerald-50 transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4-4m0 0l-4 4m4-4v12"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </main>
        </div>
    </div>

    <!-- Charts and Interactivity JavaScript -->
    <script>
        // Forest Area Chart
        const forestCtx = document.getElementById('forestChart');
        if (forestCtx) {
            new Chart(forestCtx, {
                type: 'bar',
                data: {
                    labels: <?= json_encode(array_keys($municipalities)) ?>,
                    datasets: [{
                        label: 'Forest Area (km²)',
                        data: <?= json_encode(array_column($municipalities, 'forest_area')) ?>,
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
                            title: {
                                display: true,
                                text: 'Area (km²)'
                            }
                        }
                    }
                }
            });
        }

        // Waste Management Chart
        const wasteCtx = document.getElementById('wasteChart');
        if (wasteCtx) {
            new Chart(wasteCtx, {
                type: 'line',
                data: {
                    labels: <?= json_encode(array_keys($municipalities)) ?>,
                    datasets: [
                        {
                            label: 'Waste Generated',
                            data: <?= json_encode(array_column($municipalities, 'waste_generated')) ?>,
                            backgroundColor: 'rgba(239, 68, 68, 0.1)',
                            borderColor: 'rgba(239, 68, 68, 1)',
                            borderWidth: 3,
                            fill: false,
                            tension: 0.4,
                            pointBackgroundColor: 'rgba(239, 68, 68, 1)',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointRadius: 6
                        },
                        {
                            label: 'Waste Collected',
                            data: <?= json_encode(array_column($municipalities, 'waste_collected')) ?>,
                            backgroundColor: 'rgba(16, 185, 129, 0.1)',
                            borderColor: 'rgba(16, 185, 129, 1)',
                            borderWidth: 3,
                            fill: false,
                            tension: 0.4,
                            pointBackgroundColor: 'rgba(16, 185, 129, 1)',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointRadius: 6
                        }
                    ]
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
                            title: {
                                display: true,
                                text: 'Tons/Month'
                            }
                        }
                    }
                }
            });
        }

        // Municipality details toggle
        function toggleMunicipalityDetails(municipalityId) {
            const detailsDiv = document.getElementById('details_' + municipalityId);
            if (detailsDiv) {
                detailsDiv.classList.toggle('hidden');
                
                // Hide other open details
                const allDetails = document.querySelectorAll('[id^="details_"]');
                allDetails.forEach(div => {
                    if (div.id !== 'details_' + municipalityId) {
                        div.classList.add('hidden');
                    }
                });
            }
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
                    console.log('Environmental data submitted:', data);
                    
                    // Show success message
                    const submitBtn = form.querySelector('button[type="submit"]');
                    if (submitBtn) {
                        const originalText = submitBtn.textContent;
                        submitBtn.textContent = 'Data Saved Successfully!';
                        submitBtn.classList.remove('bg-emerald-600');
                        submitBtn.classList.add('bg-green-600');
                        
                        setTimeout(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.classList.remove('bg-green-600');
                            submitBtn.classList.add('bg-emerald-600');
                            form.reset();
                        }, 3000);
                    }
                });
            });
        });

        // Smooth hover animations
        document.querySelectorAll('.card-hover').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-4px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Real-time updates simulation
        setInterval(() => {
            const aqi_elements = document.querySelectorAll('[data-aqi]');
            aqi_elements.forEach(el => {
                const currentAqi = parseInt(el.textContent);
                const newAqi = Math.max(25, Math.min(65, currentAqi + (Math.random() - 0.5) * 4));
                el.textContent = Math.round(newAqi);
                
                // Update color based on AQI
                el.className = el.className.replace(/text-(green|yellow|red)-600/g, '');
                if (newAqi <= 50) {
                    el.classList.add('text-green-600');
                } else if (newAqi <= 100) {
                    el.classList.add('text-yellow-600');
                } else {
                    el.classList.add('text-red-600');
                }
            });
        }, 30000);

        // Environmental alert notifications
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 max-w-sm p-4 rounded-lg shadow-lg z-50 ${
                type === 'success' ? 'bg-green-100 border border-green-400 text-green-700' :
                type === 'warning' ? 'bg-yellow-100 border border-yellow-400 text-yellow-700' :
                type === 'error' ? 'bg-red-100 border border-red-400 text-red-700' :
                'bg-blue-100 border border-blue-400 text-blue-700'
            }`;
            notification.innerHTML = `
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium">${message}</p>
                    </div>
                    <div class="ml-auto pl-3">
                        <div class="-mx-1.5 -my-1.5">
                            <button onclick="this.parentElement.parentElement.parentElement.parentElement.remove()" class="inline-flex rounded-md p-1.5 focus:outline-none">
                                <span class="sr-only">Dismiss</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            `;
            document.body.appendChild(notification);
            
            // Auto-remove after 5 seconds
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.parentNode.removeChild(notification);
                }
            }, 5000);
        }

        // Simulate periodic environmental alerts
        setInterval(() => {
            const alertTypes = ['Air quality update', 'Water quality check', 'Waste collection reminder'];
            const randomAlert = alertTypes[Math.floor(Math.random() * alertTypes.length)];
            
            if (Math.random() < 0.1) { // 10% chance every interval
                showNotification(`${randomAlert} - All systems normal`, 'success');
            }
        }, 120000); // Every 2 minutes

        // Print functionality for reports
        function printReport(reportType) {
            window.print();
        }

        // Export functionality
        function exportData(format) {
            showNotification(`Exporting environmental data in ${format.toUpperCase()} format...`, 'info');
            
            // Simulate export process
            setTimeout(() => {
                showNotification(`Environmental data exported successfully in ${format.toUpperCase()}!`, 'success');
            }, 2000);
        }

        // Search functionality
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('input[placeholder*="Search"]');
            if (searchInput) {
                searchInput.addEventListener('input', function(e) {
                    const searchTerm = e.target.value.toLowerCase();
                    
                    // Simple search simulation - would typically send AJAX request
                    if (searchTerm.length > 2) {
                        console.log('Searching for:', searchTerm);
                        // Highlight matching elements or filter results
                    }
                });
            }
        });

        // Initialize tooltips for charts
        Chart.defaults.plugins.tooltip.backgroundColor = 'rgba(0, 0, 0, 0.8)';
        Chart.defaults.plugins.tooltip.titleColor = '#fff';
        Chart.defaults.plugins.tooltip.bodyColor = '#fff';
        Chart.defaults.plugins.tooltip.cornerRadius = 8;
    </script>
</body>
</html>