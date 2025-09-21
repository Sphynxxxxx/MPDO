<?php
session_start();

// MHO-specific health data for Iloilo Province municipalities
$municipalities = [
    'Iloilo City' => [
        'population' => 457803,
        'land_area' => 78.34, // sq km
        'health_facilities' => 45,
        'hospitals' => 8,
        'clinics' => 37,
        'health_workers' => 892,
        'doctors' => 156,
        'nurses' => 423,
        'midwives' => 89,
        'vaccination_rate' => 94.2,
        'maternal_mortality' => 2.1, // per 10,000 births
        'infant_mortality' => 7.8, // per 1,000 births
        'contraceptive_prevalence' => 68.4,
        'malnutrition_cases' => 234,
        'hypertension_cases' => 5467,
        'diabetes_cases' => 2890,
        'tuberculosis_cases' => 156,
        'dengue_cases' => 89
    ],
    'Santa Barbara' => [
        'population' => 61390,
        'land_area' => 34.25,
        'health_facilities' => 12,
        'hospitals' => 1,
        'clinics' => 11,
        'health_workers' => 145,
        'doctors' => 18,
        'nurses' => 67,
        'midwives' => 23,
        'vaccination_rate' => 91.7,
        'maternal_mortality' => 3.2,
        'infant_mortality' => 9.1,
        'contraceptive_prevalence' => 64.8,
        'malnutrition_cases' => 67,
        'hypertension_cases' => 1234,
        'diabetes_cases' => 567,
        'tuberculosis_cases' => 34,
        'dengue_cases' => 23
    ],
    'Cabatuan' => [
        'population' => 58107,
        'land_area' => 32.10,
        'health_facilities' => 10,
        'hospitals' => 1,
        'clinics' => 9,
        'health_workers' => 128,
        'doctors' => 15,
        'nurses' => 58,
        'midwives' => 19,
        'vaccination_rate' => 89.4,
        'maternal_mortality' => 4.1,
        'infant_mortality' => 10.3,
        'contraceptive_prevalence' => 61.2,
        'malnutrition_cases' => 89,
        'hypertension_cases' => 1089,
        'diabetes_cases' => 445,
        'tuberculosis_cases' => 28,
        'dengue_cases' => 18
    ]
];

// Health programs and initiatives
$health_programs = [
    [
        'name' => 'Maternal & Child Health Program',
        'target_beneficiaries' => 25000,
        'current_beneficiaries' => 22340,
        'status' => 'active',
        'budget' => 2850000,
        'municipalities' => ['Iloilo City', 'Santa Barbara', 'Cabatuan'],
        'start_date' => '2025-01-01',
        'end_date' => '2025-12-31'
    ],
    [
        'name' => 'Vaccination Drive 2025',
        'target_beneficiaries' => 45000,
        'current_beneficiaries' => 41250,
        'status' => 'active',
        'budget' => 1680000,
        'municipalities' => ['Iloilo City', 'Santa Barbara', 'Cabatuan'],
        'start_date' => '2025-02-01',
        'end_date' => '2025-11-30'
    ],
    [
        'name' => 'TB Control Program',
        'target_beneficiaries' => 500,
        'current_beneficiaries' => 378,
        'status' => 'active',
        'budget' => 890000,
        'municipalities' => ['Iloilo City', 'Santa Barbara', 'Cabatuan'],
        'start_date' => '2025-01-15',
        'end_date' => '2026-01-14'
    ],
    [
        'name' => 'Nutrition Program',
        'target_beneficiaries' => 8000,
        'current_beneficiaries' => 7456,
        'status' => 'active',
        'budget' => 1245000,
        'municipalities' => ['Santa Barbara', 'Cabatuan'],
        'start_date' => '2025-03-01',
        'end_date' => '2025-12-31'
    ]
];

// Health alerts and incidents
$health_alerts = [
    [
        'type' => 'Disease Outbreak',
        'disease' => 'Dengue',
        'severity' => 'high',
        'municipality' => 'Iloilo City',
        'description' => 'Spike in dengue cases reported in Barangay Jaro',
        'cases' => 45,
        'date' => '2025-09-18',
        'status' => 'monitoring'
    ],
    [
        'type' => 'Vaccine Shortage',
        'disease' => 'Measles',
        'severity' => 'medium',
        'municipality' => 'Santa Barbara',
        'description' => 'Low stock of measles vaccines affecting immunization schedule',
        'cases' => 0,
        'date' => '2025-09-15',
        'status' => 'addressing'
    ],
    [
        'type' => 'Water Contamination',
        'disease' => 'Diarrhea',
        'severity' => 'medium',
        'municipality' => 'Cabatuan',
        'description' => 'Increased diarrheal cases linked to contaminated water source',
        'cases' => 23,
        'date' => '2025-09-20',
        'status' => 'investigating'
    ],
    [
        'type' => 'Food Poisoning',
        'disease' => 'Gastroenteritis',
        'severity' => 'low',
        'municipality' => 'Santa Barbara',
        'description' => 'Mild food poisoning cases from local food vendor',
        'cases' => 8,
        'date' => '2025-09-19',
        'status' => 'resolved'
    ]
];

// Health data fields for data entry
$health_data_fields = [
    ['name' => 'health_facilities', 'label' => 'Health Facilities Count', 'type' => 'number', 'required' => true],
    ['name' => 'health_workers', 'label' => 'Total Health Workers', 'type' => 'number', 'required' => true],
    ['name' => 'vaccination_count', 'label' => 'Vaccinations Administered', 'type' => 'number', 'required' => true],
    ['name' => 'maternal_consultations', 'label' => 'Maternal Consultations', 'type' => 'number', 'required' => true],
    ['name' => 'infant_births', 'label' => 'Recorded Births', 'type' => 'number', 'required' => false],
    ['name' => 'malnutrition_cases', 'label' => 'Malnutrition Cases', 'type' => 'number', 'required' => false],
    ['name' => 'hypertension_cases', 'label' => 'Hypertension Cases', 'type' => 'number', 'required' => false],
    ['name' => 'diabetes_cases', 'label' => 'Diabetes Cases', 'type' => 'number', 'required' => false],
    ['name' => 'tuberculosis_cases', 'label' => 'Tuberculosis Cases', 'type' => 'number', 'required' => false],
    ['name' => 'dengue_cases', 'label' => 'Dengue Cases', 'type' => 'number', 'required' => false]
];

// Calculate totals and averages
$total_population = array_sum(array_column($municipalities, 'population'));
$total_health_facilities = array_sum(array_column($municipalities, 'health_facilities'));
$total_health_workers = array_sum(array_column($municipalities, 'health_workers'));
$avg_vaccination_rate = round(array_sum(array_column($municipalities, 'vaccination_rate')) / count($municipalities), 1);
$avg_maternal_mortality = round(array_sum(array_column($municipalities, 'maternal_mortality')) / count($municipalities), 1);
$avg_infant_mortality = round(array_sum(array_column($municipalities, 'infant_mortality')) / count($municipalities), 1);
$total_malnutrition = array_sum(array_column($municipalities, 'malnutrition_cases'));
$total_hypertension = array_sum(array_column($municipalities, 'hypertension_cases'));
$total_diabetes = array_sum(array_column($municipalities, 'diabetes_cases'));
$total_tuberculosis = array_sum(array_column($municipalities, 'tuberculosis_cases'));
$total_dengue = array_sum(array_column($municipalities, 'dengue_cases'));

// Current page state
$current_page = $_GET['page'] ?? 'overview';
$current_municipality = $_GET['municipality'] ?? null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MHO - Municipal Health Office</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .sidebar-link:hover { background-color: rgba(239, 68, 68, 0.1); }
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
        <div class="w-64 bg-red-800 text-white flex flex-col">
            <div class="p-6 border-b border-red-700">
                <h1 class="text-2xl font-bold flex items-center">
                    <span class="text-3xl mr-3">🏥</span>
                    MHO
                </h1>
                <p class="text-red-200 text-sm mt-2">Municipal Health Office</p>
            </div>
            
            <nav class="flex-1 p-4 space-y-2">
                <a href="?page=overview" class="sidebar-link flex items-center p-3 rounded-lg <?= $current_page === 'overview' ? 'bg-red-700' : '' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                    </svg>
                    Overview
                </a>
                
                <a href="?page=municipalities" class="sidebar-link flex items-center p-3 rounded-lg <?= $current_page === 'municipalities' ? 'bg-red-700' : '' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Municipalities
                </a>
                
                <a href="?page=programs" class="sidebar-link flex items-center p-3 rounded-lg <?= $current_page === 'programs' ? 'bg-red-700' : '' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    Health Programs
                </a>
                
                <a href="?page=alerts" class="sidebar-link flex items-center p-3 rounded-lg <?= $current_page === 'alerts' ? 'bg-red-700' : '' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                    Health Alerts
                    <?php if (count(array_filter($health_alerts, function($a) { return $a['status'] !== 'resolved'; })) > 0): ?>
                        <span class="ml-auto bg-yellow-500 text-white text-xs px-2 py-1 rounded-full">
                            <?= count(array_filter($health_alerts, function($a) { return $a['status'] !== 'resolved'; })) ?>
                        </span>
                    <?php endif; ?>
                </a>
                
                <a href="?page=data_entry" class="sidebar-link flex items-center p-3 rounded-lg <?= $current_page === 'data_entry' ? 'bg-red-700' : '' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Data Entry
                </a>
                
                <a href="?page=reports" class="sidebar-link flex items-center p-3 rounded-lg <?= $current_page === 'reports' ? 'bg-red-700' : '' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    Reports
                </a>
            </nav>
            
            <div class="p-4 border-t border-red-700">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center">
                        <span class="text-sm font-bold">JR</span>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium">Dr. Jose Rodriguez</p>
                        <p class="text-xs text-red-200">MHO Administrator</p>
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
                                    echo 'Health Overview';
                                    break;
                                case 'municipalities':
                                    echo 'Municipality Health Data';
                                    break;
                                case 'programs':
                                    echo 'Health Programs';
                                    break;
                                case 'alerts':
                                    echo 'Health Alerts & Incidents';
                                    break;
                                case 'data_entry':
                                    echo 'Health Data Entry';
                                    break;
                                case 'reports':
                                    echo 'Health Reports';
                                    break;
                                default:
                                    echo 'MHO Dashboard';
                            }
                            ?>
                        </h2>
                        <p class="text-gray-600 mt-1">Municipal health monitoring and healthcare management</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="text" placeholder="Search health data..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent w-80">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition-colors">
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
                        <!-- Key Health Metrics -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Stats Cards -->
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 card-hover transition-all">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-red-100 rounded-lg">
                                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-gray-600">Health Facilities</p>
                                            <p class="text-2xl font-bold text-gray-900"><?= $total_health_facilities ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 card-hover transition-all">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-blue-100 rounded-lg">
                                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-gray-600">Health Workers</p>
                                            <p class="text-2xl font-bold text-gray-900"><?= $total_health_workers ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 card-hover transition-all">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-green-100 rounded-lg">
                                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-gray-600">Vaccination Rate</p>
                                            <p class="text-2xl font-bold text-gray-900"><?= $avg_vaccination_rate ?>%</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 card-hover transition-all">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-purple-100 rounded-lg">
                                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-gray-600">Infant Mortality</p>
                                            <p class="text-2xl font-bold text-gray-900"><?= $avg_infant_mortality ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Charts Section -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                    <h4 class="text-lg font-semibold mb-4">Health Facilities by Municipality</h4>
                                    <div style="height: 300px;">
                                        <canvas id="facilitiesChart"></canvas>
                                    </div>
                                </div>
                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                    <h4 class="text-lg font-semibold mb-4">Disease Cases Distribution</h4>
                                    <div style="height: 300px;">
                                        <canvas id="diseasesChart"></canvas>
                                    </div>
                                </div>
                            </div>

                            <!-- Municipality Health Status -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                                <div class="p-6 border-b border-gray-200">
                                    <h4 class="text-lg font-semibold">Municipality Health Status</h4>
                                </div>
                                <div class="p-6">
                                    <div class="space-y-4">
                                        <?php foreach ($municipalities as $name => $data): ?>
                                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                                <div class="flex items-center">
                                                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                                        <span class="text-red-600 font-bold text-lg"><?= substr($name, 0, 1) ?></span>
                                                    </div>
                                                    <div class="ml-4">
                                                        <h5 class="font-medium text-gray-900"><?= $name ?></h5>
                                                        <p class="text-sm text-gray-500">
                                                            Facilities: <?= $data['health_facilities'] ?> | 
                                                            Workers: <?= $data['health_workers'] ?> | 
                                                            Vaccination: <?= $data['vaccination_rate'] ?>%
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="flex items-center space-x-3">
                                                    <div class="text-right">
                                                        <p class="text-sm font-medium text-red-600">
                                                            <?= round(($data['health_workers'] / $data['population']) * 1000, 1) ?> Workers per 1K
                                                        </p>
                                                        <div class="w-24 bg-gray-200 rounded-full h-2">
                                                            <div class="bg-red-500 h-2 rounded-full" style="width: <?= min(100, ($data['health_workers'] / $data['population']) * 1000 * 10) ?>%"></div>
                                                        </div>
                                                    </div>
                                                    <button class="text-red-600 hover:text-red-800 p-2 rounded-lg hover:bg-red-50 transition-colors" onclick="window.location.href='?page=municipalities&municipality=<?= strtolower(str_replace(' ', '_', $name)) ?>'">
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
                                    <h4 class="text-lg font-semibold">Active Health Programs</h4>
                                </div>
                                <div class="p-6">
                                    <div class="space-y-4">
                                        <?php foreach (array_filter($health_programs, function($p) { return $p['status'] === 'active'; }) as $program): ?>
                                            <div class="border border-red-200 rounded-lg p-4">
                                                <h5 class="font-medium text-red-900"><?= $program['name'] ?></h5>
                                                <div class="mt-2">
                                                    <p class="text-sm text-gray-600">
                                                        Beneficiaries: <?= number_format($program['current_beneficiaries']) ?> / <?= number_format($program['target_beneficiaries']) ?>
                                                    </p>
                                                    <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                                                        <div class="bg-red-500 h-2 rounded-full" style="width: <?= ($program['current_beneficiaries'] / $program['target_beneficiaries']) * 100 ?>%"></div>
                                                    </div>
                                                    <p class="text-xs text-gray-500 mt-1">
                                                        <?= round(($program['current_beneficiaries'] / $program['target_beneficiaries']) * 100, 1) ?>% Complete
                                                    </p>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Recent Health Alerts -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                                <div class="p-6 border-b border-gray-200">
                                    <div class="flex justify-between items-center">
                                        <h4 class="text-lg font-semibold">Recent Health Alerts</h4>
                                        <a href="?page=alerts" class="text-red-600 hover:text-red-800 text-sm">View All</a>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <div class="space-y-3">
                                        <?php foreach (array_slice($health_alerts, 0, 3) as $alert): ?>
                                            <div class="alert-<?= $alert['severity'] ?> p-3 rounded-lg">
                                                <div class="flex justify-between items-start">
                                                    <div>
                                                        <p class="font-medium text-gray-900"><?= $alert['type'] ?></p>
                                                        <p class="text-sm text-gray-600"><?= $alert['municipality'] ?></p>
                                                        <?php if ($alert['cases'] > 0): ?>
                                                            <p class="text-xs text-gray-500"><?= $alert['cases'] ?> cases</p>
                                                        <?php endif; ?>
                                                    </div>
                                                    <span class="text-xs text-gray-500"><?= date('M j', strtotime($alert['date'])) ?></span>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Vaccination Progress -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                                <div class="p-6">
                                    <div class="text-center">
                                        <h4 class="text-lg font-semibold mb-4">Vaccination Progress</h4>
                                        <div class="relative inline-flex items-center justify-center">
                                            <svg class="w-32 h-32 progress-ring">
                                                <circle cx="64" cy="64" r="56" stroke="currentColor" stroke-width="8" fill="transparent" class="text-gray-200"></circle>
                                                <circle cx="64" cy="64" r="56" stroke="currentColor" stroke-width="8" fill="transparent" 
                                                        class="text-red-500 progress-ring-circle" 
                                                        stroke-dasharray="<?= 2 * pi() * 56 * ($avg_vaccination_rate / 100) ?> <?= 2 * pi() * 56 ?>"></circle>
                                            </svg>
                                            <div class="absolute">
                                                <div class="text-2xl font-bold text-red-600"><?= $avg_vaccination_rate ?>%</div>
                                                <div class="text-xs text-gray-500">Coverage Rate</div>
                                            </div>
                                        </div>
                                        <p class="text-sm text-gray-600 mt-4">
                                            Provincial vaccination coverage
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php elseif ($current_page === 'municipalities'): ?>
                    <!-- Municipalities Health Data Page -->
                    <div class="space-y-6">
                        <!-- Municipality Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <?php foreach ($municipalities as $name => $data): ?>
                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 card-hover transition-all cursor-pointer" onclick="toggleMunicipalityDetails('<?= strtolower(str_replace(' ', '_', $name)) ?>')">
                                    <div class="flex items-center justify-between mb-4">
                                        <h3 class="text-lg font-semibold text-gray-900"><?= $name ?></h3>
                                        <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                                            <span class="text-red-600 font-bold"><?= substr($name, 0, 1) ?></span>
                                        </div>
                                    </div>
                                    <div class="space-y-3">
                                        <div class="flex justify-between">
                                            <span class="text-sm text-gray-600">Population:</span>
                                            <span class="text-sm font-medium"><?= number_format($data['population']) ?></span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-sm text-gray-600">Health Facilities:</span>
                                            <span class="text-sm font-medium"><?= $data['health_facilities'] ?></span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-sm text-gray-600">Health Workers:</span>
                                            <span class="text-sm font-medium"><?= $data['health_workers'] ?></span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-sm text-gray-600">Vaccination Rate:</span>
                                            <span class="text-sm font-medium <?= $data['vaccination_rate'] >= 90 ? 'text-green-600' : ($data['vaccination_rate'] >= 80 ? 'text-yellow-600' : 'text-red-600') ?>">
                                                <?= $data['vaccination_rate'] ?>%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Detailed Municipality Data (Hidden by default) -->
                        <?php foreach ($municipalities as $name => $data): ?>
                            <div id="details_<?= strtolower(str_replace(' ', '_', $name)) ?>" class="hidden bg-white rounded-xl shadow-sm border border-gray-200">
                                <div class="p-6 border-b border-gray-200 bg-red-50">
                                    <div class="flex justify-between items-center">
                                        <h3 class="text-xl font-semibold text-red-900"><?= $name ?> Health Data</h3>
                                        <button onclick="toggleMunicipalityDetails('<?= strtolower(str_replace(' ', '_', $name)) ?>')" class="text-red-600 hover:text-red-800">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                                        <div class="text-center p-4 bg-red-50 rounded-lg">
                                            <div class="text-2xl font-bold text-red-600"><?= $data['health_facilities'] ?></div>
                                            <div class="text-sm text-gray-600">Health Facilities</div>
                                        </div>
                                        <div class="text-center p-4 bg-blue-50 rounded-lg">
                                            <div class="text-2xl font-bold text-blue-600"><?= $data['health_workers'] ?></div>
                                            <div class="text-sm text-gray-600">Health Workers</div>
                                        </div>
                                        <div class="text-center p-4 bg-green-50 rounded-lg">
                                            <div class="text-2xl font-bold text-green-600"><?= $data['vaccination_rate'] ?>%</div>
                                            <div class="text-sm text-gray-600">Vaccination Rate</div>
                                        </div>
                                        <div class="text-center p-4 bg-purple-50 rounded-lg">
                                            <div class="text-2xl font-bold text-purple-600"><?= $data['infant_mortality'] ?></div>
                                            <div class="text-sm text-gray-600">Infant Mortality Rate</div>
                                        </div>
                                    </div>
                                    
                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                        <div>
                                            <h4 class="text-lg font-semibold mb-4">Health Personnel</h4>
                                            <div class="space-y-3">
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Doctors:</span>
                                                    <span class="font-medium"><?= $data['doctors'] ?></span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Nurses:</span>
                                                    <span class="font-medium"><?= $data['nurses'] ?></span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Midwives:</span>
                                                    <span class="font-medium"><?= $data['midwives'] ?></span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Doctor-Patient Ratio:</span>
                                                    <span class="font-medium text-red-600">1:<?= number_format(round($data['population'] / $data['doctors'])) ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <h4 class="text-lg font-semibold mb-4">Disease Cases</h4>
                                            <div class="space-y-3">
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Hypertension:</span>
                                                    <span class="font-medium"><?= number_format($data['hypertension_cases']) ?></span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Diabetes:</span>
                                                    <span class="font-medium"><?= number_format($data['diabetes_cases']) ?></span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Tuberculosis:</span>
                                                    <span class="font-medium"><?= $data['tuberculosis_cases'] ?></span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Dengue:</span>
                                                    <span class="font-medium"><?= $data['dengue_cases'] ?></span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Malnutrition:</span>
                                                    <span class="font-medium"><?= $data['malnutrition_cases'] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                <?php elseif ($current_page === 'programs'): ?>
                    <!-- Health Programs Page -->
                    <div class="space-y-6">
                        <!-- Program Stats -->
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-red-600"><?= count($health_programs) ?></div>
                                    <div class="text-gray-600">Total Programs</div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-blue-600"><?= count(array_filter($health_programs, function($p) { return $p['status'] === 'active'; })) ?></div>
                                    <div class="text-gray-600">Active Programs</div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-green-600">₱<?= number_format(array_sum(array_column($health_programs, 'budget'))) ?></div>
                                    <div class="text-gray-600">Total Budget</div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-purple-600"><?= number_format(array_sum(array_column($health_programs, 'current_beneficiaries'))) ?></div>
                                    <div class="text-gray-600">Total Beneficiaries</div>
                                </div>
                            </div>
                        </div>

                        <!-- Programs List -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                            <div class="p-6 border-b border-gray-200">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-lg font-semibold">Health Programs</h3>
                                    <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition-colors">
                                        Add New Program
                                    </button>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="space-y-6">
                                    <?php foreach ($health_programs as $program): ?>
                                        <div class="border border-gray-200 rounded-lg p-6">
                                            <div class="flex justify-between items-start mb-4">
                                                <div>
                                                    <h4 class="text-lg font-semibold text-gray-900"><?= $program['name'] ?></h4>
                                                    <p class="text-gray-600">Budget: ₱<?= number_format($program['budget']) ?></p>
                                                    <p class="text-sm text-gray-500">
                                                        Duration: <?= date('M j, Y', strtotime($program['start_date'])) ?> - <?= date('M j, Y', strtotime($program['end_date'])) ?>
                                                    </p>
                                                </div>
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                                                    <?= $program['status'] === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' ?>">
                                                    <?= ucfirst($program['status']) ?>
                                                </span>
                                            </div>
                                            
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                <div>
                                                    <h5 class="font-medium text-gray-700 mb-2">Progress</h5>
                                                    <div class="space-y-2">
                                                        <div class="flex justify-between text-sm">
                                                            <span>Beneficiaries:</span>
                                                            <span><?= number_format($program['current_beneficiaries']) ?> / <?= number_format($program['target_beneficiaries']) ?></span>
                                                        </div>
                                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                                            <div class="bg-red-500 h-2 rounded-full" style="width: <?= ($program['current_beneficiaries'] / $program['target_beneficiaries']) * 100 ?>%"></div>
                                                        </div>
                                                        <div class="text-sm text-gray-600">
                                                            <?= round(($program['current_beneficiaries'] / $program['target_beneficiaries']) * 100, 1) ?>% Complete
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div>
                                                    <h5 class="font-medium text-gray-700 mb-2">Participating Municipalities</h5>
                                                    <div class="flex flex-wrap gap-2">
                                                        <?php foreach ($program['municipalities'] as $municipality): ?>
                                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
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
                    <!-- Health Alerts Page -->
                    <div class="space-y-6">
                        <!-- Alert Stats -->
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-red-600"><?= count(array_filter($health_alerts, function($a) { return $a['severity'] === 'high'; })) ?></div>
                                    <div class="text-gray-600">High Priority</div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-yellow-600"><?= count(array_filter($health_alerts, function($a) { return $a['severity'] === 'medium'; })) ?></div>
                                    <div class="text-gray-600">Medium Priority</div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-green-600"><?= count(array_filter($health_alerts, function($a) { return $a['severity'] === 'low'; })) ?></div>
                                    <div class="text-gray-600">Low Priority</div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-gray-600"><?= count(array_filter($health_alerts, function($a) { return $a['status'] === 'resolved'; })) ?></div>
                                    <div class="text-gray-600">Resolved</div>
                                </div>
                            </div>
                        </div>

                        <!-- Alerts List -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                            <div class="p-6 border-b border-gray-200">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-lg font-semibold">Health Alerts & Disease Surveillance</h3>
                                    <div class="flex space-x-2">
                                        <select class="border border-gray-300 rounded-lg px-3 py-2">
                                            <option>All Severities</option>
                                            <option>High</option>
                                            <option>Medium</option>
                                            <option>Low</option>
                                        </select>
                                        <select class="border border-gray-300 rounded-lg px-3 py-2">
                                            <option>All Status</option>
                                            <option>Monitoring</option>
                                            <option>Addressing</option>
                                            <option>Investigating</option>
                                            <option>Resolved</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="space-y-4">
                                    <?php foreach ($health_alerts as $alert): ?>
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
                                                        <?php if (!empty($alert['disease'])): ?>
                                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                                <?= $alert['disease'] ?>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <p class="text-gray-700 mb-2"><?= $alert['description'] ?></p>
                                                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                                                        <span>Date: <?= date('M j, Y', strtotime($alert['date'])) ?></span>
                                                        <?php if ($alert['cases'] > 0): ?>
                                                            <span>Cases: <?= $alert['cases'] ?></span>
                                                        <?php endif; ?>
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
                                <h3 class="text-lg font-semibold">Health Data Entry</h3>
                                <p class="text-gray-600 mt-1">Enter monthly health data for municipalities</p>
                            </div>
                            <div class="p-6">
                                <form class="space-y-6">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Municipality</label>
                                            <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" required>
                                                <option value="">Select Municipality</option>
                                                <?php foreach (array_keys($municipalities) as $municipality): ?>
                                                    <option value="<?= strtolower(str_replace(' ', '_', $municipality)) ?>"><?= $municipality ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Data Period</label>
                                            <input type="month" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" value="<?= date('Y-m') ?>" required>
                                        </div>
                                    </div>
                                    
                                    <div class="border-t border-gray-200 pt-6">
                                        <h4 class="text-lg font-medium text-gray-900 mb-4">Additional Information</h4>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Notes/Remarks</label>
                                            <textarea rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="Enter any additional notes or remarks about the health data..."></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="flex justify-end space-x-3">
                                        <button type="button" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
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

                <?php elseif ($current_page === 'reports'): ?>
                    <!-- Reports Page -->
                    <div class="space-y-6">
                        <!-- Report Generation -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                            <div class="p-6 border-b border-gray-200">
                                <h3 class="text-lg font-semibold">Generate Health Reports</h3>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                    <button class="p-4 border border-red-200 rounded-lg hover:bg-red-50 transition-colors text-left">
                                        <div class="text-red-600 mb-2">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                            </svg>
                                        </div>
                                        <h4 class="font-medium text-gray-900">Monthly Health Summary</h4>
                                        <p class="text-sm text-gray-600">Health data overview and trends</p>
                                    </button>
                                    <button class="p-4 border border-red-200 rounded-lg hover:bg-red-50 transition-colors text-left">
                                        <div class="text-red-600 mb-2">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <h4 class="font-medium text-gray-900">Vaccination Report</h4>
                                        <p class="text-sm text-gray-600">Immunization coverage analysis</p>
                                    </button>
                                    <button class="p-4 border border-red-200 rounded-lg hover:bg-red-50 transition-colors text-left">
                                        <div class="text-red-600 mb-2">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                            </svg>
                                        </div>
                                        <h4 class="font-medium text-gray-900">Disease Surveillance</h4>
                                        <p class="text-sm text-gray-600">Outbreak monitoring and alerts</p>
                                    </button>
                                    <button class="p-4 border border-red-200 rounded-lg hover:bg-red-50 transition-colors text-left">
                                        <div class="text-red-600 mb-2">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                            </svg>
                                        </div>
                                        <h4 class="font-medium text-gray-900">Maternal & Child Health</h4>
                                        <p class="text-sm text-gray-600">MCH program outcomes</p>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Reports -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                            <div class="p-6 border-b border-gray-200">
                                <h3 class="text-lg font-semibold">Recent Health Reports</h3>
                            </div>
                            <div class="p-6">
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                            </div>
                                            <div class="ml-4">
                                                <h4 class="font-medium text-gray-900">September 2025 Health Summary</h4>
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
                                            <button class="text-red-600 hover:text-red-800 p-2 rounded-lg hover:bg-red-50 transition-colors">
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
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </div>
                                            <div class="ml-4">
                                                <h4 class="font-medium text-gray-900">Q3 2025 Vaccination Coverage</h4>
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
                                            <button class="text-red-600 hover:text-red-800 p-2 rounded-lg hover:bg-red-50 transition-colors">
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
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                                </svg>
                                            </div>
                                            <div class="ml-4">
                                                <h4 class="font-medium text-gray-900">Disease Surveillance August 2025</h4>
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
                                            <button class="text-red-600 hover:text-red-800 p-2 rounded-lg hover:bg-red-50 transition-colors">
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
        // Health Facilities Chart
        const facilitiesCtx = document.getElementById('facilitiesChart');
        if (facilitiesCtx) {
            new Chart(facilitiesCtx, {
                type: 'bar',
                data: {
                    labels: <?= json_encode(array_keys($municipalities)) ?>,
                    datasets: [{
                        label: 'Health Facilities',
                        data: <?= json_encode(array_column($municipalities, 'health_facilities')) ?>,
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
                            title: {
                                display: true,
                                text: 'Number of Facilities'
                            }
                        }
                    }
                }
            });
        }

        // Disease Cases Chart
        const diseasesCtx = document.getElementById('diseasesChart');
        if (diseasesCtx) {
            new Chart(diseasesCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Hypertension', 'Diabetes', 'Tuberculosis', 'Dengue', 'Malnutrition'],
                    datasets: [{
                        data: [
                            <?= $total_hypertension ?>,
                            <?= $total_diabetes ?>,
                            <?= $total_tuberculosis ?>,
                            <?= $total_dengue ?>,
                            <?= $total_malnutrition ?>
                        ],
                        backgroundColor: [
                            'rgba(239, 68, 68, 0.8)',
                            'rgba(59, 130, 246, 0.8)',
                            'rgba(251, 191, 36, 0.8)',
                            'rgba(34, 197, 94, 0.8)',
                            'rgba(168, 85, 247, 0.8)'
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
                    console.log('Health data submitted:', data);
                    
                    // Show success message
                    const submitBtn = form.querySelector('button[type="submit"]');
                    if (submitBtn) {
                        const originalText = submitBtn.textContent;
                        submitBtn.textContent = 'Health Data Saved Successfully!';
                        submitBtn.classList.remove('bg-red-600');
                        submitBtn.classList.add('bg-green-600');
                        
                        setTimeout(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.classList.remove('bg-green-600');
                            submitBtn.classList.add('bg-red-600');
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

        // Health alert notifications
        function showHealthNotification(message, type = 'info') {
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

        // Simulate periodic health monitoring alerts
        setInterval(() => {
            const healthAlerts = ['Vaccination reminder scheduled', 'Health screening completed', 'Disease surveillance update'];
            const randomAlert = healthAlerts[Math.floor(Math.random() * healthAlerts.length)];
            
            if (Math.random() < 0.08) { // 8% chance every interval
                showHealthNotification(`${randomAlert} - Systems operational`, 'success');
            }
        }, 150000); // Every 2.5 minutes

        // Print functionality for reports
        function printHealthReport(reportType) {
            window.print();
        }

        // Export functionality
        function exportHealthData(format) {
            showHealthNotification(`Exporting health data in ${format.toUpperCase()} format...`, 'info');
            
            // Simulate export process
            setTimeout(() => {
                showHealthNotification(`Health data exported successfully in ${format.toUpperCase()}!`, 'success');
            }, 2000);
        }

        // Real-time health data updates simulation
        setInterval(() => {
            const vaccinationElements = document.querySelectorAll('[data-vaccination]');
            vaccinationElements.forEach(el => {
                const currentRate = parseFloat(el.textContent);
                const newRate = Math.max(85, Math.min(98, currentRate + (Math.random() - 0.5) * 0.5));
                el.textContent = newRate.toFixed(1) + '%';
                
                // Update color based on vaccination rate
                el.className = el.className.replace(/text-(green|yellow|red)-600/g, '');
                if (newRate >= 90) {
                    el.classList.add('text-green-600');
                } else if (newRate >= 80) {
                    el.classList.add('text-yellow-600');
                } else {
                    el.classList.add('text-red-600');
                }
            });
        }, 45000);

        // Initialize tooltips for health charts
        Chart.defaults.plugins.tooltip.backgroundColor = 'rgba(0, 0, 0, 0.8)';
        Chart.defaults.plugins.tooltip.titleColor = '#fff';
        Chart.defaults.plugins.tooltip.bodyColor = '#fff';
        Chart.defaults.plugins.tooltip.cornerRadius = 8;
    </script>
</body>
</html>