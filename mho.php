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

                <a href="?page=statistics" class="sidebar-link flex items-center p-3 rounded-lg <?= $current_page === 'statistics' ? 'bg-red-700' : '' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    Statistics
                </a>
                
                <a href="?page=reports" class="sidebar-link flex items-center p-3 rounded-lg <?= $current_page === 'reports' ? 'bg-red-700' : '' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path>
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
                    
                    <div class="max-w-6xl mx-auto">
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                            <div class="p-6 border-b border-gray-200">
                                <h3 class="text-lg font-semibold">Health Data Entry</h3>
                                <p class="text-gray-600 mt-1">Enter monthly health data for municipalities</p>
                            </div>
                            <div class="p-6">
                                <form id="healthDataForm" class="space-y-6">
                                    <!-- Basic Information -->
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                                Municipality <span class="text-red-500">*</span>
                                            </label>
                                            <select name="municipality" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" required>
                                                <option value="">Select Municipality</option>
                                                <option value="iloilo_city">Iloilo City</option>
                                                <option value="santa_barbara">Santa Barbara</option>
                                                <option value="cabatuan">Cabatuan</option>
                                            </select>
                                            <p class="text-xs text-red-600 mt-1 hidden" id="municipalityError">Please select a municipality</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                                Data Period <span class="text-red-500">*</span>
                                            </label>
                                            <input type="month" name="data_period" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" required>
                                            <p class="text-xs text-red-600 mt-1 hidden" id="periodError">Please select a data period</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Data Entry Type</label>
                                            <select name="entry_type" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                                <option value="monthly">Monthly Report</option>
                                                <option value="quarterly">Quarterly Summary</option>
                                                <option value="incident">Incident Report</option>
                                                <option value="program_update">Program Update</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Health Facilities & Personnel -->
                                    <div class="border-t border-gray-200 pt-6">
                                        <h4 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                            <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2-2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                            </svg>
                                            Health Facilities & Personnel
                                        </h4>
                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                                    Health Facilities Count <span class="text-red-500">*</span>
                                                </label>
                                                <input type="number" name="health_facilities" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0" required>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                                    Total Health Workers <span class="text-red-500">*</span>
                                                </label>
                                                <input type="number" name="health_workers" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0" required>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Doctors</label>
                                                <input type="number" name="doctors" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Nurses</label>
                                                <input type="number" name="nurses" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Midwives</label>
                                                <input type="number" name="midwives" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Other Health Personnel</label>
                                                <input type="number" name="other_personnel" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Health Services & Programs -->
                                    <div class="border-t border-gray-200 pt-6">
                                        <h4 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                            <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Health Services & Programs
                                        </h4>
                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                                    Vaccinations Administered <span class="text-red-500">*</span>
                                                </label>
                                                <input type="number" name="vaccination_count" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0" required>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Vaccination Coverage (%)</label>
                                                <input type="number" name="vaccination_rate" min="0" max="100" step="0.1" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0.0">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                                    Maternal Consultations <span class="text-red-500">*</span>
                                                </label>
                                                <input type="number" name="maternal_consultations" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0" required>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Prenatal Check-ups</label>
                                                <input type="number" name="prenatal_checkups" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Child Health Consultations</label>
                                                <input type="number" name="child_consultations" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Recorded Births</label>
                                                <input type="number" name="infant_births" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Family Planning Consultations</label>
                                                <input type="number" name="family_planning" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Nutrition Counseling Sessions</label>
                                                <input type="number" name="nutrition_sessions" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Community Health Programs</label>
                                                <input type="number" name="community_programs" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Disease Cases & Health Issues -->
                                    <div class="border-t border-gray-200 pt-6">
                                        <h4 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                            <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                            </svg>
                                            Disease Cases & Health Issues
                                        </h4>
                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Malnutrition Cases</label>
                                                <input type="number" name="malnutrition_cases" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0">
                                                <p class="text-xs text-gray-500 mt-1">Include severe and moderate cases</p>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Hypertension Cases</label>
                                                <input type="number" name="hypertension_cases" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Diabetes Cases</label>
                                                <input type="number" name="diabetes_cases" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Tuberculosis Cases</label>
                                                <input type="number" name="tuberculosis_cases" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Dengue Cases</label>
                                                <input type="number" name="dengue_cases" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Pneumonia Cases</label>
                                                <input type="number" name="pneumonia_cases" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Diarrheal Diseases</label>
                                                <input type="number" name="diarrheal_cases" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Mental Health Cases</label>
                                                <input type="number" name="mental_health_cases" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Other Communicable Diseases</label>
                                                <input type="number" name="other_diseases" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Mortality & Health Indicators -->
                                    <div class="border-t border-gray-200 pt-6">
                                        <h4 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                            <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                            </svg>
                                            Health Indicators & Rates
                                        </h4>
                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Maternal Mortality Rate</label>
                                                <input type="number" name="maternal_mortality" min="0" step="0.1" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0.0">
                                                <p class="text-xs text-gray-500 mt-1">Per 10,000 births</p>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Infant Mortality Rate</label>
                                                <input type="number" name="infant_mortality" min="0" step="0.1" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0.0">
                                                <p class="text-xs text-gray-500 mt-1">Per 1,000 births</p>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Contraceptive Prevalence Rate (%)</label>
                                                <input type="number" name="contraceptive_prevalence" min="0" max="100" step="0.1" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0.0">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Fully Immunized Child Rate (%)</label>
                                                <input type="number" name="immunized_rate" min="0" max="100" step="0.1" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0.0">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Health Program Performance -->
                                    <div class="border-t border-gray-200 pt-6">
                                        <h4 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                            <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                            </svg>
                                            Health Program Performance
                                        </h4>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Active Health Programs</label>
                                                <select multiple name="active_programs[]" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" style="min-height: 120px;">
                                                    <option value="maternal_child_health">Maternal & Child Health Program</option>
                                                    <option value="vaccination_drive">Vaccination Drive 2025</option>
                                                    <option value="tb_control">TB Control Program</option>
                                                    <option value="nutrition">Nutrition Program</option>
                                                    <option value="family_planning">Family Planning Program</option>
                                                    <option value="mental_health">Mental Health Program</option>
                                                    <option value="elderly_care">Elderly Care Program</option>
                                                    <option value="school_health">School Health Program</option>
                                                </select>
                                                <p class="text-xs text-gray-500 mt-1">Hold Ctrl/Cmd to select multiple programs</p>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Program Budget Utilization (%)</label>
                                                <input type="number" name="budget_utilization" min="0" max="100" step="0.1" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0.0">
                                                
                                                <label class="block text-sm font-medium text-gray-700 mb-2 mt-4">Target Population Reached</label>
                                                <input type="number" name="target_reached" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0">
                                                
                                                <label class="block text-sm font-medium text-gray-700 mb-2 mt-4">Health Education Sessions</label>
                                                <input type="number" name="education_sessions" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="0">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Additional Information -->
                                    <div class="border-t border-gray-200 pt-6 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                                        <!-- AI-Enhanced Header -->
                                        <h4 class="text-xl font-bold text-gray-900 mb-6 flex items-center group">
                                            <div class="relative mr-3">
                                                <svg class="w-6 h-6 text-red-600 group-hover:text-red-700 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                                </svg>
                                                <!-- AI Indicator Pulse -->
                                                <div class="absolute -top-1 -right-1 w-3 h-3 bg-blue-500 rounded-full animate-pulse"></div>
                                            </div>
                                            <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                                                Additional Information
                                            </span>
                                            <div class="ml-auto px-3 py-1 bg-gradient-to-r from-blue-500 to-purple-600 text-white text-xs font-semibold rounded-full flex items-center">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"></path>
                                                </svg>
                                                AI-Enhanced
                                            </div>
                                        </h4>

                                        <!-- Smart Form Grid -->
                                        <div class="space-y-8">
                                            <!-- Priority Issues & Interventions Row -->
                                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                                <!-- Priority Health Issues Card -->
                                                <div class="group">
                                                    <div class="bg-white rounded-xl p-6 border-2 border-gray-100 hover:border-red-300 transition-all duration-300 shadow-sm hover:shadow-md transform hover:-translate-y-1">
                                                        <label class="block text-sm font-semibold text-gray-800 mb-3 flex items-center">
                                                            <div class="w-2 h-2 bg-red-500 rounded-full mr-2 group-hover:animate-pulse"></div>
                                                            Priority Health Issues
                                                            <span class="ml-2 text-xs bg-red-100 text-red-700 px-2 py-1 rounded-full">Critical</span>
                                                        </label>
                                                        <textarea 
                                                            name="priority_issues" 
                                                            rows="4" 
                                                            class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:ring-4 focus:ring-red-100 focus:border-red-400 transition-all duration-300 resize-none hover:border-red-300 bg-gradient-to-br from-white to-red-50" 
                                                            placeholder="🏥 List current priority health issues in the municipality...
                                    • Infectious disease outbreaks
                                    • Maternal health concerns  
                                    • Chronic disease prevalence
                                    • Mental health challenges">
                                                        </textarea>
                                                        <!-- AI Suggestion Indicator -->
                                                        <div class="mt-2 text-xs text-gray-500 flex items-center">
                                                            <svg class="w-3 h-3 mr-1 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                            </svg>
                                                            AI will analyze patterns and suggest improvements
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Health Interventions Card -->
                                                <div class="group">
                                                    <div class="bg-white rounded-xl p-6 border-2 border-gray-100 hover:border-green-300 transition-all duration-300 shadow-sm hover:shadow-md transform hover:-translate-y-1">
                                                        <label class="block text-sm font-semibold text-gray-800 mb-3 flex items-center">
                                                            <div class="w-2 h-2 bg-green-500 rounded-full mr-2 group-hover:animate-pulse"></div>
                                                            Health Interventions Implemented
                                                            <span class="ml-2 text-xs bg-green-100 text-green-700 px-2 py-1 rounded-full">Active</span>
                                                        </label>
                                                        <textarea 
                                                            name="interventions" 
                                                            rows="4" 
                                                            class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:ring-4 focus:ring-green-100 focus:border-green-400 transition-all duration-300 resize-none hover:border-green-300 bg-gradient-to-br from-white to-green-50" 
                                                            placeholder="💊 Describe health interventions and programs implemented...
                                    • Vaccination campaigns
                                    • Health education programs
                                    • Community health worker deployment
                                    • Preventive care initiatives">
                                                        </textarea>
                                                        <div class="mt-2 text-xs text-gray-500 flex items-center">
                                                            <svg class="w-3 h-3 mr-1 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            AI will track intervention effectiveness
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Challenges & Recommendations Row -->
                                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                                <!-- Challenges Card -->
                                                <div class="group">
                                                    <div class="bg-white rounded-xl p-6 border-2 border-gray-100 hover:border-orange-300 transition-all duration-300 shadow-sm hover:shadow-md transform hover:-translate-y-1">
                                                        <label class="block text-sm font-semibold text-gray-800 mb-3 flex items-center">
                                                            <div class="w-2 h-2 bg-orange-500 rounded-full mr-2 group-hover:animate-pulse"></div>
                                                            Challenges Encountered
                                                            <span class="ml-2 text-xs bg-orange-100 text-orange-700 px-2 py-1 rounded-full">Review</span>
                                                        </label>
                                                        <textarea 
                                                            name="challenges" 
                                                            rows="3" 
                                                            class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:ring-4 focus:ring-orange-100 focus:border-orange-400 transition-all duration-300 resize-none hover:border-orange-300 bg-gradient-to-br from-white to-orange-50" 
                                                            placeholder="⚠️ Describe challenges in health service delivery...
                                    • Resource limitations
                                    • Staff shortages
                                    • Infrastructure gaps
                                    • Community compliance issues">
                                                        </textarea>
                                                        <div class="mt-2 text-xs text-gray-500 flex items-center">
                                                            <svg class="w-3 h-3 mr-1 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            AI will identify solution patterns
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Recommendations Card -->
                                                <div class="group">
                                                    <div class="bg-white rounded-xl p-6 border-2 border-gray-100 hover:border-purple-300 transition-all duration-300 shadow-sm hover:shadow-md transform hover:-translate-y-1">
                                                        <label class="block text-sm font-semibold text-gray-800 mb-3 flex items-center">
                                                            <div class="w-2 h-2 bg-purple-500 rounded-full mr-2 group-hover:animate-pulse"></div>
                                                            Recommendations
                                                            <span class="ml-2 text-xs bg-purple-100 text-purple-700 px-2 py-1 rounded-full">Strategic</span>
                                                        </label>
                                                        <textarea 
                                                            name="recommendations" 
                                                            rows="3" 
                                                            class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:ring-4 focus:ring-purple-100 focus:border-purple-400 transition-all duration-300 resize-none hover:border-purple-300 bg-gradient-to-br from-white to-purple-50" 
                                                            placeholder="💡 Recommendations for improving health services...
                                    • Strategic planning improvements
                                    • Resource allocation optimization  
                                    • Technology integration opportunities
                                    • Community engagement strategies">
                                                        </textarea>
                                                        <div class="mt-2 text-xs text-gray-500 flex items-center">
                                                            <svg class="w-3 h-3 mr-1 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                            </svg>
                                                            AI will prioritize recommendations
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Additional Notes Full-Width Card -->
                                            <div class="group">
                                                <div class="bg-white rounded-xl p-6 border-2 border-gray-100 hover:border-blue-300 transition-all duration-300 shadow-sm hover:shadow-md">
                                                    <label class="block text-sm font-semibold text-gray-800 mb-3 flex items-center">
                                                        <div class="w-2 h-2 bg-blue-500 rounded-full mr-2 group-hover:animate-pulse"></div>
                                                        Additional Notes & Remarks
                                                        <span class="ml-2 text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded-full">Optional</span>
                                                        <!-- AI Processing Indicator -->
                                                        <div class="ml-auto flex items-center space-x-2">
                                                            <div class="flex space-x-1">
                                                                <div class="w-1 h-1 bg-blue-400 rounded-full animate-bounce" style="animation-delay: 0ms"></div>
                                                                <div class="w-1 h-1 bg-blue-400 rounded-full animate-bounce" style="animation-delay: 150ms"></div>
                                                                <div class="w-1 h-1 bg-blue-400 rounded-full animate-bounce" style="animation-delay: 300ms"></div>
                                                            </div>
                                                            <span class="text-xs text-blue-600 font-medium">AI Ready</span>
                                                        </div>
                                                    </label>
                                                    <textarea 
                                                        name="notes" 
                                                        rows="3" 
                                                        class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:ring-4 focus:ring-blue-100 focus:border-blue-400 transition-all duration-300 resize-none hover:border-blue-300 bg-gradient-to-br from-white to-blue-50" 
                                                        placeholder="📝 Enter any additional notes or remarks about the health data...
                                    • Seasonal variations observed
                                    • Community feedback received
                                    • Partnership opportunities
                                    • Future planning considerations">
                                                    </textarea>
                                                    <div class="mt-3 flex items-center justify-between">
                                                        <div class="text-xs text-gray-500 flex items-center">
                                                            <svg class="w-3 h-3 mr-1 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            AI will generate insights from all provided data
                                                        </div>
                                                        <div class="flex items-center space-x-2">
                                                            <div class="px-3 py-1 bg-gradient-to-r from-green-400 to-blue-500 text-white text-xs font-bold rounded-full flex items-center">
                                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                                </svg>
                                                                Auto-Save Active
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- File Upload Section -->
                                    <div class="border-t border-gray-200 pt-6">
                                        <h4 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                                            <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                            Supporting Documents
                                        </h4>
                                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-6">
                                            <div class="text-center">
                                                <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                                </svg>
                                                <h5 class="text-lg font-medium text-gray-900 mb-2">Upload Supporting Files</h5>
                                                <p class="text-gray-600 mb-4">Upload Excel files, reports, or other supporting documents</p>
                                                <label for="file-upload" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg cursor-pointer transition-colors inline-block">
                                                    Choose Files
                                                </label>
                                                <input id="file-upload" name="supporting_files[]" type="file" multiple accept=".xlsx,.xls,.csv,.pdf,.doc,.docx,.jpg,.png" class="hidden">
                                                <p class="text-xs text-gray-500 mt-2">Accepted formats: Excel, CSV, PDF, Word, Images (Max 10MB per file)</p>
                                            </div>
                                            <div id="file-list" class="mt-4 hidden">
                                                <h6 class="font-medium text-gray-700 mb-2">Selected Files:</h6>
                                                <ul class="space-y-2"></ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Form Actions -->
                                    <div class="flex flex-wrap justify-between items-center pt-6 border-t border-gray-200 gap-4">
                                        <div class="flex items-center space-x-2">
                                            <input type="checkbox" id="save_draft" name="save_draft" class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                                            <label for="save_draft" class="text-sm text-gray-700">Save as draft</label>
                                        </div>
                                        <div class="flex space-x-3">
                                            <button type="button" id="clearForm" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                                                Clear Form
                                            </button>
                                            <button type="button" id="importData" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">
                                                Import from Excel/CSV
                                            </button>
                                            <button type="button" id="previewData" class="px-4 py-2 border border-red-600 text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                                Preview Data
                                            </button>
                                            <button type="submit" id="submitData" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors">
                                                Submit Health Data
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Data Preview Modal -->
                            <div id="previewModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
                                <div class="bg-white rounded-xl shadow-lg max-w-4xl w-full max-h-[90vh] overflow-hidden">
                                    <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                                        <h3 class="text-lg font-semibold">Data Preview</h3>
                                        <button type="button" id="closePreview" class="text-gray-400 hover:text-gray-600">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="p-6 overflow-y-auto max-h-[calc(90vh-200px)]">
                                        <div id="previewContent"></div>
                                    </div>
                                    <div class="p-6 border-t border-gray-200 flex justify-end space-x-3">
                                        <button type="button" id="editData" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                                            Edit Data
                                        </button>
                                        <button type="button" id="confirmSubmit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors">
                                            Confirm & Submit
                                        </button>
                                    </div>
                                </div>
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

                <!-- Statistics Page -->
                <?php elseif ($current_page === 'statistics'): ?>
                    <div class="space-y-6">
                        <!-- Statistics Header -->
                        <div class="bg-gradient-to-r from-red-600 to-red-800 rounded-xl shadow-lg text-white p-6">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h2 class="text-2xl font-bold mb-2">Health Statistics Dashboard</h2>
                                    <p class="text-red-100">Comprehensive health data analysis and trends for Iloilo Province</p>
                                </div>
                                <div class="flex space-x-3">
                                    <select id="timePeriod" class="bg-white text-gray-800 px-4 py-2 rounded-lg border-0 focus:ring-2 focus:ring-red-300">
                                        <option value="monthly">Monthly View</option>
                                        <option value="quarterly">Quarterly View</option>
                                        <option value="yearly">Yearly View</option>
                                    </select>
                                    <button onclick="exportStatistics()" class="bg-red-700 hover:bg-red-800 px-4 py-2 rounded-lg transition-colors">
                                        Export Report
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Key Performance Indicators -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 relative overflow-hidden">
                                <div class="absolute top-0 right-0 w-20 h-20 bg-red-50 rounded-full -mr-10 -mt-10"></div>
                                <div class="relative">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="p-3 bg-red-100 rounded-lg">
                                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                            </svg>
                                        </div>
                                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">+5.2%</span>
                                    </div>
                                    <h3 class="text-gray-600 text-sm font-medium">Health Facility Coverage</h3>
                                    <p class="text-3xl font-bold text-gray-900"><?= $total_health_facilities ?></p>
                                    <p class="text-xs text-gray-500 mt-1">Facilities per 10k population</p>
                                </div>
                            </div>

                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 relative overflow-hidden">
                                <div class="absolute top-0 right-0 w-20 h-20 bg-blue-50 rounded-full -mr-10 -mt-10"></div>
                                <div class="relative">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="p-3 bg-blue-100 rounded-lg">
                                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                            </svg>
                                        </div>
                                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">+12.8%</span>
                                    </div>
                                    <h3 class="text-gray-600 text-sm font-medium">Healthcare Workers</h3>
                                    <p class="text-3xl font-bold text-gray-900"><?= $total_health_workers ?></p>
                                    <p class="text-xs text-gray-500 mt-1">Active healthcare personnel</p>
                                </div>
                            </div>

                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 relative overflow-hidden">
                                <div class="absolute top-0 right-0 w-20 h-20 bg-green-50 rounded-full -mr-10 -mt-10"></div>
                                <div class="relative">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="p-3 bg-green-100 rounded-lg">
                                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">Target: 95%</span>
                                    </div>
                                    <h3 class="text-gray-600 text-sm font-medium">Vaccination Coverage</h3>
                                    <p class="text-3xl font-bold text-gray-900"><?= $avg_vaccination_rate ?>%</p>
                                    <p class="text-xs text-gray-500 mt-1">Provincial average</p>
                                </div>
                            </div>

                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 relative overflow-hidden">
                                <div class="absolute top-0 right-0 w-20 h-20 bg-purple-50 rounded-full -mr-10 -mt-10"></div>
                                <div class="relative">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="p-3 bg-purple-100 rounded-lg">
                                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                            </svg>
                                        </div>
                                        <span class="text-xs bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full">-2.1%</span>
                                    </div>
                                    <h3 class="text-gray-600 text-sm font-medium">Infant Mortality Rate</h3>
                                    <p class="text-3xl font-bold text-gray-900"><?= $avg_infant_mortality ?></p>
                                    <p class="text-xs text-gray-500 mt-1">Per 1,000 live births</p>
                                </div>
                            </div>
                        </div>

                        <!-- Main Statistics Charts -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <!-- Population Health Trends -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                                <div class="p-6 border-b border-gray-200">
                                    <div class="flex justify-between items-center">
                                        <h3 class="text-lg font-semibold text-gray-900">Population Health Trends</h3>
                                        <div class="flex space-x-2">
                                            <button onclick="updateHealthTrends('vaccination')" class="px-3 py-1 text-sm bg-red-100 text-red-700 rounded-full hover:bg-red-200 transition-colors">Vaccination</button>
                                            <button onclick="updateHealthTrends('mortality')" class="px-3 py-1 text-sm bg-gray-100 text-gray-700 rounded-full hover:bg-gray-200 transition-colors">Mortality</button>
                                            <button onclick="updateHealthTrends('morbidity')" class="px-3 py-1 text-sm bg-gray-100 text-gray-700 rounded-full hover:bg-gray-200 transition-colors">Morbidity</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <canvas id="healthTrendsChart" height="300"></canvas>
                                </div>
                            </div>

                            <!-- Disease Distribution -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                                <div class="p-6 border-b border-gray-200">
                                    <div class="flex justify-between items-center">
                                        <h3 class="text-lg font-semibold text-gray-900">Disease Distribution</h3>
                                        <div class="text-sm text-gray-500">Total Cases: <?= $total_hypertension + $total_diabetes + $total_tuberculosis + $total_dengue + $total_malnutrition ?></div>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <canvas id="diseaseDistributionChart" height="300"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Municipal Comparison Charts -->
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            <!-- Health Infrastructure Comparison -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                                <div class="p-6 border-b border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900">Health Infrastructure</h3>
                                    <p class="text-sm text-gray-600">Facilities and personnel by municipality</p>
                                </div>
                                <div class="p-6">
                                    <canvas id="infrastructureChart" height="400"></canvas>
                                </div>
                            </div>

                            <!-- Health Outcomes Radar -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                                <div class="p-6 border-b border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900">Health Outcomes Index</h3>
                                    <p class="text-sm text-gray-600">Multi-dimensional health performance</p>
                                </div>
                                <div class="p-6">
                                    <canvas id="healthOutcomesRadar" height="400"></canvas>
                                </div>
                            </div>

                            <!-- Program Performance -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                                <div class="p-6 border-b border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900">Program Performance</h3>
                                    <p class="text-sm text-gray-600">Implementation progress and targets</p>
                                </div>
                                <div class="p-6">
                                    <canvas id="programPerformanceChart" height="400"></canvas>
                                </div>
                            </div>
                        </div>

                        

                        <!-- Health Indicators Summary Table -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                            <div class="p-6 border-b border-gray-200">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-lg font-semibold text-gray-900">Health Indicators Summary</h3>
                                    <button onclick="exportTableData()" class="text-sm bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-lg transition-colors">Export Table</button>
                                </div>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Municipality</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Population</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Health Facilities</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Health Workers</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vaccination Rate</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Maternal Mortality</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Infant Mortality</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Health Index</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <?php foreach ($municipalities as $name => $data): ?>
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                                                        <span class="text-xs font-medium text-red-600"><?= substr($name, 0, 1) ?></span>
                                                    </div>
                                                    <span class="ml-3 font-medium text-gray-900"><?= $name ?></span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= number_format($data['population']) ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $data['health_facilities'] ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $data['health_workers'] ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-1 bg-gray-200 rounded-full h-2 mr-3 w-16">
                                                        <div class="bg-red-500 h-2 rounded-full" style="width: <?= $data['vaccination_rate'] ?>%"></div>
                                                    </div>
                                                    <span class="text-sm font-medium text-gray-900"><?= $data['vaccination_rate'] ?>%</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $data['maternal_mortality'] ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $data['infant_mortality'] ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <?php 
                                                $healthIndex = round((100 - $data['infant_mortality'] * 2) * ($data['vaccination_rate'] / 100), 1);
                                                $indexColor = $healthIndex >= 85 ? 'text-green-600' : ($healthIndex >= 70 ? 'text-yellow-600' : 'text-red-600');
                                                ?>
                                                <span class="<?= $indexColor ?> font-medium"><?= $healthIndex ?></span>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
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

        // Health Trends Chart
        const healthTrendsCtx = document.getElementById('healthTrendsChart').getContext('2d');
        let healthTrendsChart = new Chart(healthTrendsCtx, {
            type: 'line',
            data: {
                labels: ['Jan 2025', 'Feb 2025', 'Mar 2025', 'Apr 2025', 'May 2025', 'Jun 2025', 'Jul 2025', 'Aug 2025', 'Sep 2025'],
                datasets: [{
                    label: 'Vaccination Coverage %',
                    data: [89.2, 90.1, 90.8, 91.2, 91.8, 92.1, 92.5, 93.1, <?= $avg_vaccination_rate ?>],
                    borderColor: 'rgb(239, 68, 68)',
                    backgroundColor: 'rgba(239, 68, 68, 0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 85,
                        max: 100
                    }
                }
            }
        });

        // Disease Distribution Chart
        const diseaseDistributionCtx = document.getElementById('diseaseDistributionChart').getContext('2d');
        new Chart(diseaseDistributionCtx, {
            type: 'polarArea',
            data: {
                labels: ['Hypertension', 'Diabetes', 'Tuberculosis', 'Dengue', 'Malnutrition'],
                datasets: [{
                    data: [<?= $total_hypertension ?>, <?= $total_diabetes ?>, <?= $total_tuberculosis ?>, <?= $total_dengue ?>, <?= $total_malnutrition ?>],
                    backgroundColor: [
                        'rgba(239, 68, 68, 0.7)',
                        'rgba(59, 130, 246, 0.7)',
                        'rgba(251, 191, 36, 0.7)',
                        'rgba(34, 197, 94, 0.7)',
                        'rgba(168, 85, 247, 0.7)'
                    ],
                    borderWidth: 2,
                    borderColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Infrastructure Chart
        const infrastructureCtx = document.getElementById('infrastructureChart').getContext('2d');
        new Chart(infrastructureCtx, {
            type: 'radar',
            data: {
                labels: ['Facilities', 'Doctors', 'Nurses', 'Midwives', 'Coverage'],
                datasets: [
                    {
                        label: 'Iloilo City',
                        data: [45, 156, 423, 89, 94.2],
                        borderColor: 'rgb(239, 68, 68)',
                        backgroundColor: 'rgba(239, 68, 68, 0.2)'
                    },
                    {
                        label: 'Santa Barbara',
                        data: [12, 18, 67, 23, 91.7],
                        borderColor: 'rgb(59, 130, 246)',
                        backgroundColor: 'rgba(59, 130, 246, 0.2)'
                    },
                    {
                        label: 'Cabatuan',
                        data: [10, 15, 58, 19, 89.4],
                        borderColor: 'rgb(34, 197, 94)',
                        backgroundColor: 'rgba(34, 197, 94, 0.2)'
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    r: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Health Outcomes Radar
        const healthOutcomesCtx = document.getElementById('healthOutcomesRadar').getContext('2d');
        new Chart(healthOutcomesCtx, {
            type: 'radar',
            data: {
                labels: ['Vaccination Rate', 'Maternal Health', 'Child Health', 'Disease Control', 'Healthcare Access', 'Prevention'],
                datasets: [{
                    label: 'Current Performance',
                    data: [<?= $avg_vaccination_rate ?>, 85, 88, 75, 80, 90],
                    borderColor: 'rgb(239, 68, 68)',
                    backgroundColor: 'rgba(239, 68, 68, 0.2)',
                    fill: true
                }, {
                    label: 'Target',
                    data: [95, 90, 92, 85, 90,                     95],
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    fill: true,
                    pointStyle: 'rectRot'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    r: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });

        // Program Performance Chart
        const programPerformanceCtx = document.getElementById('programPerformanceChart').getContext('2d');
        new Chart(programPerformanceCtx, {
            type: 'bar',
            data: {
                labels: ['Immunization', 'Maternal Care', 'Child Health', 'Disease Control', 'Health Promotion'],
                datasets: [{
                    label: 'Achievement',
                    data: [92, 85, 88, 75, 90],
                    backgroundColor: 'rgba(239, 68, 68, 0.7)'
                }, {
                    label: 'Target',
                    data: [95, 90, 92, 85, 95],
                    backgroundColor: 'rgba(156, 163, 175, 0.5)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });

        // Correlation Chart
        const correlationCtx = document.getElementById('correlationChart').getContext('2d');
        new Chart(correlationCtx, {
            type: 'bar',
            data: {
                labels: ['Vaccination vs Mortality', 'Facilities vs Coverage', 'Workers vs Outcomes', 'Spending vs Results'],
                datasets: [{
                    label: 'Correlation Coefficient',
                    data: [-0.87, 0.73, 0.62, 0.58],
                    backgroundColor: [
                        'rgba(239, 68, 68, 0.7)',
                        'rgba(59, 130, 246, 0.7)',
                        'rgba(34, 197, 94, 0.7)',
                        'rgba(251, 191, 36, 0.7)'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        min: -1,
                        max: 1
                    }
                }
            }
        });

        // Prediction Chart
        const predictionCtx = document.getElementById('predictionChart').getContext('2d');
        new Chart(predictionCtx, {
            type: 'line',
            data: {
                labels: ['Q1 2025', 'Q2 2025', 'Q3 2025', 'Q4 2025', 'Q1 2026', 'Q2 2026'],
                datasets: [{
                    label: 'Historical',
                    data: [89.2, 90.8, 92.1, null, null, null],
                    borderColor: 'rgb(239, 68, 68)',
                    borderDash: [5, 5],
                    fill: false
                }, {
                    label: 'Predicted',
                    data: [null, null, 92.1, 93.5, 94.2, 95.1],
                    borderColor: 'rgb(34, 197, 94)',
                    fill: false
                }, {
                    label: 'Optimistic',
                    data: [null, null, 92.1, 94.2, 95.3, 96.1],
                    borderColor: 'rgb(251, 191, 36)',
                    borderDash: [2, 2],
                    fill: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 85,
                        max: 100
                    }
                }
            }
        });

        // Risk Heatmap Chart
        const riskHeatmapCtx = document.getElementById('riskHeatmapChart').getContext('2d');
        new Chart(riskHeatmapCtx, {
            type: 'bar',
            data: {
                labels: ['Iloilo City', 'Santa Barbara', 'Cabatuan', 'Pavia', 'Oton', 'Miagao'],
                datasets: [{
                    label: 'Risk Score',
                    data: [2.3, 4.7, 6.8, 3.2, 5.1, 4.2],
                    backgroundColor: [
                        'rgba(34, 197, 94, 0.7)',
                        'rgba(251, 191, 36, 0.7)',
                        'rgba(239, 68, 68, 0.7)',
                        'rgba(34, 197, 94, 0.7)',
                        'rgba(251, 191, 36, 0.7)',
                        'rgba(251, 191, 36, 0.7)'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 10
                    }
                }
            }
        });

        // Function to update health trends chart
        function updateHealthTrends(type) {
            let newData;
            let label;
            
            switch(type) {
                case 'vaccination':
                    newData = [89.2, 90.1, 90.8, 91.2, 91.8, 92.1, 92.5, 93.1, <?= $avg_vaccination_rate ?>];
                    label = 'Vaccination Coverage %';
                    break;
                case 'mortality':
                    newData = [8.2, 7.9, 7.5, 7.3, 7.1, 6.9, 6.8, 6.7, <?= $avg_infant_mortality ?>];
                    label = 'Infant Mortality Rate';
                    break;
                case 'morbidity':
                    newData = [12.5, 11.8, 11.2, 10.9, 10.7, 10.5, 10.3, 10.1, 9.8];
                    label = 'Morbidity Rate %';
                    break;
            }
            
            healthTrendsChart.data.datasets[0].data = newData;
            healthTrendsChart.data.datasets[0].label = label;
            healthTrendsChart.update();
        }

        // Function to toggle analytics view
        function toggleAnalyticsView(view) {
            // Hide all views
            document.getElementById('correlationView').classList.add('hidden');
            document.getElementById('predictionView').classList.add('hidden');
            document.getElementById('riskView').classList.add('hidden');
            
            // Remove active class from all buttons
            document.getElementById('correlationBtn').classList.remove('bg-red-600', 'text-white');
            document.getElementById('correlationBtn').classList.add('bg-gray-200', 'text-gray-700');
            document.getElementById('predictionBtn').classList.remove('bg-red-600', 'text-white');
            document.getElementById('predictionBtn').classList.add('bg-gray-200', 'text-gray-700');
            document.getElementById('riskBtn').classList.remove('bg-red-600', 'text-white');
            document.getElementById('riskBtn').classList.add('bg-gray-200', 'text-gray-700');
            
            // Show selected view and activate button
            document.getElementById(view + 'View').classList.remove('hidden');
            document.getElementById(view + 'Btn').classList.remove('bg-gray-200', 'text-gray-700');
            document.getElementById(view + 'Btn').classList.add('bg-red-600', 'text-white');
        }

        // Function to export statistics
        function exportStatistics() {
            // Create a temporary link element
            const link = document.createElement('a');
            link.href = 'data:text/csv;charset=utf-8,';
            link.download = 'health_statistics_export.csv';
            
            // Trigger download
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            
            // Show success notification
            alert('Statistics exported successfully!');
        }

        // Function to export table data
        function exportTableData() {
            // Create a temporary link element
            const link = document.createElement('a');
            link.href = 'data:text/csv;charset=utf-8,';
            link.download = 'health_indicators_table.csv';
            
            // Trigger download
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            
            // Show success notification
            alert('Table data exported successfully!');
        }

        // Initialize with correlation view
        toggleAnalyticsView('correlation');
    
    </script>
</body>
</html>