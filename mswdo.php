<?php
session_start();

// MSWDO-specific social welfare data for Iloilo Province municipalities
$municipalities = [
    'Iloilo City' => [
        'population' => 457803,
        'households' => 114451,
        'male' => 223902,
        'female' => 233901,
        'youth' => 137341,
        'senior_citizens' => 45780,
        'pwd_registered' => 3247,
        'indigenous_people' => 892,
        'solo_parents' => 8934,
        'fourps_beneficiaries' => 12450,
        'cctp_beneficiaries' => 3456,
        'sss_pensioners' => 8234,
        'gsis_pensioners' => 4567,
        'poverty_incidents' => 234,
        'dswd_assistance_cases' => 1456,
        'livelihood_program_beneficiaries' => 2890,
        'daycare_centers' => 89,
        'social_workers' => 45,
        'case_workers' => 23
    ],
    'Oton' => [
        'population' => 98509,
        'households' => 24627,
        'male' => 49254,
        'female' => 49255,
        'youth' => 29553,
        'senior_citizens' => 9851,
        'pwd_registered' => 756,
        'indigenous_people' => 234,
        'solo_parents' => 1567,
        'fourps_beneficiaries' => 3245,
        'cctp_beneficiaries' => 892,
        'sss_pensioners' => 1678,
        'gsis_pensioners' => 934,
        'poverty_incidents' => 89,
        'dswd_assistance_cases' => 345,
        'livelihood_program_beneficiaries' => 567,
        'daycare_centers' => 23,
        'social_workers' => 12,
        'case_workers' => 8
    ],
    'Pavia' => [
        'population' => 50815,
        'households' => 12704,
        'male' => 25407,
        'female' => 25408,
        'youth' => 15245,
        'senior_citizens' => 5082,
        'pwd_registered' => 423,
        'indigenous_people' => 156,
        'solo_parents' => 834,
        'fourps_beneficiaries' => 1789,
        'cctp_beneficiaries' => 456,
        'sss_pensioners' => 892,
        'gsis_pensioners' => 534,
        'poverty_incidents' => 45,
        'dswd_assistance_cases' => 189,
        'livelihood_program_beneficiaries' => 312,
        'daycare_centers' => 15,
        'social_workers' => 8,
        'case_workers' => 5
    ]
];

// Social welfare programs and initiatives
$welfare_programs = [
    [
        'name' => 'Pantawid Pamilyang Pilipino Program (4Ps)',
        'target_beneficiaries' => 20000,
        'current_beneficiaries' => 17484,
        'status' => 'active',
        'budget' => 45600000,
        'municipalities' => ['Iloilo City', 'Oton', 'Pavia'],
        'start_date' => '2025-01-01',
        'end_date' => '2025-12-31',
        'type' => 'cash_transfer'
    ],
    [
        'name' => 'Senior Citizens Assistance Program',
        'target_beneficiaries' => 65000,
        'current_beneficiaries' => 60713,
        'status' => 'active',
        'budget' => 12890000,
        'municipalities' => ['Iloilo City', 'Oton', 'Pavia'],
        'start_date' => '2025-01-01',
        'end_date' => '2025-12-31',
        'type' => 'assistance'
    ],
    [
        'name' => 'PWD Support Services',
        'target_beneficiaries' => 5000,
        'current_beneficiaries' => 4426,
        'status' => 'active',
        'budget' => 8450000,
        'municipalities' => ['Iloilo City', 'Oton', 'Pavia'],
        'start_date' => '2025-02-01',
        'end_date' => '2025-12-31',
        'type' => 'support_services'
    ],
    [
        'name' => 'Livelihood Development Program',
        'target_beneficiaries' => 4000,
        'current_beneficiaries' => 3769,
        'status' => 'active',
        'budget' => 15670000,
        'municipalities' => ['Iloilo City', 'Oton', 'Pavia'],
        'start_date' => '2025-03-01',
        'end_date' => '2026-02-28',
        'type' => 'livelihood'
    ],
    [
        'name' => 'Solo Parent Welfare Program',
        'target_beneficiaries' => 12000,
        'current_beneficiaries' => 11335,
        'status' => 'active',
        'budget' => 6780000,
        'municipalities' => ['Iloilo City', 'Oton', 'Pavia'],
        'start_date' => '2025-01-15',
        'end_date' => '2025-12-31',
        'type' => 'assistance'
    ]
];

// Social welfare cases and incidents
$welfare_cases = [
    [
        'type' => 'Child Abuse',
        'severity' => 'high',
        'municipality' => 'Iloilo City',
        'description' => 'Physical abuse case reported involving minor in Barangay Jaro',
        'cases_count' => 3,
        'date' => '2025-09-18',
        'status' => 'investigating',
        'case_worker' => 'Maria Santos'
    ],
    [
        'type' => 'Elder Abuse',
        'severity' => 'medium',
        'municipality' => 'Oton',
        'description' => 'Neglect case reported for senior citizen in Barangay Poblacion',
        'cases_count' => 1,
        'date' => '2025-09-15',
        'status' => 'under_intervention',
        'case_worker' => 'Juan dela Cruz'
    ],
    [
        'type' => 'Domestic Violence',
        'severity' => 'high',
        'municipality' => 'Pavia',
        'description' => 'Repeated domestic violence incidents requiring immediate intervention',
        'cases_count' => 2,
        'date' => '2025-09-20',
        'status' => 'emergency_response',
        'case_worker' => 'Ana Rodriguez'
    ],
    [
        'type' => 'Financial Assistance Request',
        'severity' => 'low',
        'municipality' => 'Oton',
        'description' => 'Multiple requests for emergency financial assistance due to medical expenses',
        'cases_count' => 15,
        'date' => '2025-09-19',
        'status' => 'processing',
        'case_worker' => 'Roberto Villanueva'
    ]
];

// Social welfare data fields for data entry
$welfare_data_fields = [
    ['name' => 'senior_citizens', 'label' => 'Senior Citizens Registered', 'type' => 'number', 'required' => true],
    ['name' => 'pwd_registered', 'label' => 'PWD Registered', 'type' => 'number', 'required' => true],
    ['name' => 'fourps_beneficiaries', 'label' => '4Ps Beneficiaries', 'type' => 'number', 'required' => true],
    ['name' => 'solo_parents', 'label' => 'Solo Parents', 'type' => 'number', 'required' => true],
    ['name' => 'poverty_incidents', 'label' => 'Poverty Incidents', 'type' => 'number', 'required' => false],
    ['name' => 'dswd_assistance_cases', 'label' => 'DSWD Assistance Cases', 'type' => 'number', 'required' => false],
    ['name' => 'livelihood_program_beneficiaries', 'label' => 'Livelihood Program Beneficiaries', 'type' => 'number', 'required' => false],
    ['name' => 'daycare_centers', 'label' => 'Daycare Centers', 'type' => 'number', 'required' => false],
    ['name' => 'social_workers', 'label' => 'Social Workers Deployed', 'type' => 'number', 'required' => false],
    ['name' => 'case_workers', 'label' => 'Case Workers Available', 'type' => 'number', 'required' => false]
];

// Calculate totals and averages
$total_population = array_sum(array_column($municipalities, 'population'));
$total_households = array_sum(array_column($municipalities, 'households'));
$total_senior_citizens = array_sum(array_column($municipalities, 'senior_citizens'));
$total_pwd = array_sum(array_column($municipalities, 'pwd_registered'));
$total_fourps = array_sum(array_column($municipalities, 'fourps_beneficiaries'));
$total_solo_parents = array_sum(array_column($municipalities, 'solo_parents'));
$total_social_workers = array_sum(array_column($municipalities, 'social_workers'));
$total_daycare_centers = array_sum(array_column($municipalities, 'daycare_centers'));
$total_poverty_incidents = array_sum(array_column($municipalities, 'poverty_incidents'));

// Current page state
$current_page = $_GET['page'] ?? 'overview';
$current_municipality = $_GET['municipality'] ?? null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSWDO - Municipal Social Welfare and Development Office</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .sidebar-link:hover { background-color: rgba(147, 51, 234, 0.1); }
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
        <div class="w-64 bg-purple-800 text-white flex flex-col">
            <div class="p-6 border-b border-purple-700">
                <h1 class="text-2xl font-bold flex items-center">
                    <span class="text-3xl mr-3">🤝</span>
                    MSWDO
                </h1>
                <p class="text-purple-200 text-sm mt-2">Municipal Social Welfare and Development Office</p>
            </div>
            
            <nav class="flex-1 p-4 space-y-2">
                <a href="?page=overview" class="sidebar-link flex items-center p-3 rounded-lg <?= $current_page === 'overview' ? 'bg-purple-700' : '' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                    </svg>
                    Overview
                </a>
                
                <a href="?page=municipalities" class="sidebar-link flex items-center p-3 rounded-lg <?= $current_page === 'municipalities' ? 'bg-purple-700' : '' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Municipalities
                </a>
                
                <a href="?page=programs" class="sidebar-link flex items-center p-3 rounded-lg <?= $current_page === 'programs' ? 'bg-purple-700' : '' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    Welfare Programs
                </a>
                
                <a href="?page=cases" class="sidebar-link flex items-center p-3 rounded-lg <?= $current_page === 'cases' ? 'bg-purple-700' : '' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Case Management
                    <?php if (count(array_filter($welfare_cases, function($c) { return $c['status'] !== 'resolved'; })) > 0): ?>
                        <span class="ml-auto bg-yellow-500 text-white text-xs px-2 py-1 rounded-full">
                            <?= count(array_filter($welfare_cases, function($c) { return $c['status'] !== 'resolved'; })) ?>
                        </span>
                    <?php endif; ?>
                </a>
                
                <a href="?page=beneficiaries" class="sidebar-link flex items-center p-3 rounded-lg <?= $current_page === 'beneficiaries' ? 'bg-purple-700' : '' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    Beneficiaries
                </a>
                
                <a href="?page=data_entry" class="sidebar-link flex items-center p-3 rounded-lg <?= $current_page === 'data_entry' ? 'bg-purple-700' : '' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Data Entry
                </a>
                
                <a href="?page=reports" class="sidebar-link flex items-center p-3 rounded-lg <?= $current_page === 'reports' ? 'bg-purple-700' : '' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    Reports
                </a>
            </nav>
            
            <div class="p-4 border-t border-purple-700">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center">
                        <span class="text-sm font-bold">MS</span>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium">Maria Santos</p>
                        <p class="text-xs text-purple-200">MSWDO Administrator</p>
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
                                    echo 'Social Welfare Overview';
                                    break;
                                case 'municipalities':
                                    echo 'Municipality Welfare Data';
                                    break;
                                case 'programs':
                                    echo 'Social Welfare Programs';
                                    break;
                                case 'cases':
                                    echo 'Case Management & Incidents';
                                    break;
                                case 'beneficiaries':
                                    echo 'Beneficiary Management';
                                    break;
                                case 'data_entry':
                                    echo 'Welfare Data Entry';
                                    break;
                                case 'reports':
                                    echo 'Social Welfare Reports';
                                    break;
                                default:
                                    echo 'MSWDO Dashboard';
                            }
                            ?>
                        </h2>
                        <p class="text-gray-600 mt-1">Social welfare monitoring and development services</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="text" placeholder="Search welfare data..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent w-80">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <button class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition-colors">
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
                        <!-- Key Social Welfare Metrics -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Stats Cards -->
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 card-hover transition-all">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-purple-100 rounded-lg">
                                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-gray-600">Senior Citizens</p>
                                            <p class="text-2xl font-bold text-gray-900"><?= number_format($total_senior_citizens) ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 card-hover transition-all">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-blue-100 rounded-lg">
                                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-gray-600">PWD Registered</p>
                                            <p class="text-2xl font-bold text-gray-900"><?= number_format($total_pwd) ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 card-hover transition-all">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-green-100 rounded-lg">
                                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-gray-600">4Ps Beneficiaries</p>
                                            <p class="text-2xl font-bold text-gray-900"><?= number_format($total_fourps) ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 card-hover transition-all">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-yellow-100 rounded-lg">
                                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-gray-600">Social Workers</p>
                                            <p class="text-2xl font-bold text-gray-900"><?= $total_social_workers ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Charts Section -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                    <h4 class="text-lg font-semibold mb-4">Beneficiaries by Municipality</h4>
                                    <div style="height: 300px;">
                                        <canvas id="beneficiariesChart"></canvas>
                                    </div>
                                </div>
                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                    <h4 class="text-lg font-semibold mb-4">Social Welfare Programs Distribution</h4>
                                    <div style="height: 300px;">
                                        <canvas id="programsChart"></canvas>
                                    </div>
                                </div>
                            </div>

                            <!-- Municipality Social Welfare Status -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                                <div class="p-6 border-b border-gray-200">
                                    <h4 class="text-lg font-semibold">Municipality Social Welfare Status</h4>
                                </div>
                                <div class="p-6">
                                    <div class="space-y-4">
                                        <?php foreach ($municipalities as $name => $data): ?>
                                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                                <div class="flex items-center">
                                                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                                        <span class="text-purple-600 font-bold text-lg"><?= substr($name, 0, 1) ?></span>
                                                    </div>
                                                    <div class="ml-4">
                                                        <h5 class="font-medium text-gray-900"><?= $name ?></h5>
                                                        <p class="text-sm text-gray-500">
                                                            4Ps: <?= number_format($data['fourps_beneficiaries']) ?> | 
                                                            Seniors: <?= number_format($data['senior_citizens']) ?> | 
                                                            PWD: <?= number_format($data['pwd_registered']) ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="flex items-center space-x-3">
                                                    <div class="text-right">
                                                        <p class="text-sm font-medium text-purple-600">
                                                            <?= round(($data['social_workers'] / $data['population']) * 10000, 1) ?> Workers per 10K
                                                        </p>
                                                        <div class="w-24 bg-gray-200 rounded-full h-2">
                                                            <div class="bg-purple-500 h-2 rounded-full" style="width: <?= min(100, ($data['social_workers'] / $data['population']) * 10000 * 5) ?>%"></div>
                                                        </div>
                                                    </div>
                                                    <button class="text-purple-600 hover:text-purple-800 p-2 rounded-lg hover:bg-purple-50 transition-colors" onclick="window.location.href='?page=municipalities&municipality=<?= strtolower(str_replace(' ', '_', $name)) ?>'">
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
                                    <h4 class="text-lg font-semibold">Active Welfare Programs</h4>
                                </div>
                                <div class="p-6">
                                    <div class="space-y-4">
                                        <?php foreach (array_filter($welfare_programs, function($p) { return $p['status'] === 'active'; }) as $program): ?>
                                            <div class="border border-purple-200 rounded-lg p-4">
                                                <h5 class="font-medium text-purple-900"><?= $program['name'] ?></h5>
                                                <div class="mt-2">
                                                    <p class="text-sm text-gray-600">
                                                        Beneficiaries: <?= number_format($program['current_beneficiaries']) ?> / <?= number_format($program['target_beneficiaries']) ?>
                                                    </p>
                                                    <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                                                        <div class="bg-purple-500 h-2 rounded-full" style="width: <?= ($program['current_beneficiaries'] / $program['target_beneficiaries']) * 100 ?>%"></div>
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

                            <!-- Recent Cases -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                                <div class="p-6 border-b border-gray-200">
                                    <div class="flex justify-between items-center">
                                        <h4 class="text-lg font-semibold">Recent Cases</h4>
                                        <a href="?page=cases" class="text-purple-600 hover:text-purple-800 text-sm">View All</a>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <div class="space-y-3">
                                        <?php foreach (array_slice($welfare_cases, 0, 3) as $case): ?>
                                            <div class="alert-<?= $case['severity'] ?> p-3 rounded-lg">
                                                <div class="flex justify-between items-start">
                                                    <div>
                                                        <p class="font-medium text-gray-900"><?= $case['type'] ?></p>
                                                        <p class="text-sm text-gray-600"><?= $case['municipality'] ?></p>
                                                        <?php if ($case['cases_count'] > 1): ?>
                                                            <p class="text-xs text-gray-500"><?= $case['cases_count'] ?> cases</p>
                                                        <?php endif; ?>
                                                    </div>
                                                    <span class="text-xs text-gray-500"><?= date('M j', strtotime($case['date'])) ?></span>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Program Budget Allocation -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                                <div class="p-6">
                                    <div class="text-center">
                                        <h4 class="text-lg font-semibold mb-4">Total Program Budget</h4>
                                        <div class="relative inline-flex items-center justify-center">
                                            <svg class="w-32 h-32 progress-ring">
                                                <circle cx="64" cy="64" r="56" stroke="currentColor" stroke-width="8" fill="transparent" class="text-gray-200"></circle>
                                                <circle cx="64" cy="64" r="56" stroke="currentColor" stroke-width="8" fill="transparent" 
                                                        class="text-purple-500 progress-ring-circle" 
                                                        stroke-dasharray="<?= 2 * pi() * 56 * 0.85 ?> <?= 2 * pi() * 56 ?>"></circle>
                                            </svg>
                                            <div class="absolute">
                                                <div class="text-xl font-bold text-purple-600">₱<?= number_format(array_sum(array_column($welfare_programs, 'budget')) / 1000000, 1) ?>M</div>
                                                <div class="text-xs text-gray-500">Allocated</div>
                                            </div>
                                        </div>
                                        <p class="text-sm text-gray-600 mt-4">
                                            85% budget utilization
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php elseif ($current_page === 'municipalities'): ?>
                    <!-- Municipalities Social Welfare Data Page -->
                    <div class="space-y-6">
                        <!-- Municipality Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <?php foreach ($municipalities as $name => $data): ?>
                                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 card-hover transition-all cursor-pointer" onclick="toggleMunicipalityDetails('<?= strtolower(str_replace(' ', '_', $name)) ?>')">
                                    <div class="flex items-center justify-between mb-4">
                                        <h3 class="text-lg font-semibold text-gray-900"><?= $name ?></h3>
                                        <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                                            <span class="text-purple-600 font-bold"><?= substr($name, 0, 1) ?></span>
                                        </div>
                                    </div>
                                    <div class="space-y-3">
                                        <div class="flex justify-between">
                                            <span class="text-sm text-gray-600">Population:</span>
                                            <span class="text-sm font-medium"><?= number_format($data['population']) ?></span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-sm text-gray-600">4Ps Beneficiaries:</span>
                                            <span class="text-sm font-medium"><?= number_format($data['fourps_beneficiaries']) ?></span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-sm text-gray-600">Senior Citizens:</span>
                                            <span class="text-sm font-medium"><?= number_format($data['senior_citizens']) ?></span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-sm text-gray-600">PWD Registered:</span>
                                            <span class="text-sm font-medium"><?= number_format($data['pwd_registered']) ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Detailed Municipality Data (Hidden by default) -->
                        <?php foreach ($municipalities as $name => $data): ?>
                            <div id="details_<?= strtolower(str_replace(' ', '_', $name)) ?>" class="hidden bg-white rounded-xl shadow-sm border border-gray-200">
                                <div class="p-6 border-b border-gray-200 bg-purple-50">
                                    <div class="flex justify-between items-center">
                                        <h3 class="text-xl font-semibold text-purple-900"><?= $name ?> Social Welfare Data</h3>
                                        <button onclick="toggleMunicipalityDetails('<?= strtolower(str_replace(' ', '_', $name)) ?>')" class="text-purple-600 hover:text-purple-800">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                                        <div class="text-center p-4 bg-purple-50 rounded-lg">
                                            <div class="text-2xl font-bold text-purple-600"><?= number_format($data['fourps_beneficiaries']) ?></div>
                                            <div class="text-sm text-gray-600">4Ps Beneficiaries</div>
                                        </div>
                                        <div class="text-center p-4 bg-blue-50 rounded-lg">
                                            <div class="text-2xl font-bold text-blue-600"><?= number_format($data['senior_citizens']) ?></div>
                                            <div class="text-sm text-gray-600">Senior Citizens</div>
                                        </div>
                                        <div class="text-center p-4 bg-green-50 rounded-lg">
                                            <div class="text-2xl font-bold text-green-600"><?= number_format($data['pwd_registered']) ?></div>
                                            <div class="text-sm text-gray-600">PWD Registered</div>
                                        </div>
                                        <div class="text-center p-4 bg-yellow-50 rounded-lg">
                                            <div class="text-2xl font-bold text-yellow-600"><?= number_format($data['solo_parents']) ?></div>
                                            <div class="text-sm text-gray-600">Solo Parents</div>
                                        </div>
                                    </div>
                                    
                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                        <div>
                                            <h4 class="text-lg font-semibold mb-4">Social Services</h4>
                                            <div class="space-y-3">
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Daycare Centers:</span>
                                                    <span class="font-medium"><?= $data['daycare_centers'] ?></span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Social Workers:</span>
                                                    <span class="font-medium"><?= $data['social_workers'] ?></span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Case Workers:</span>
                                                    <span class="font-medium"><?= $data['case_workers'] ?></span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">DSWD Assistance Cases:</span>
                                                    <span class="font-medium"><?= number_format($data['dswd_assistance_cases']) ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <h4 class="text-lg font-semibold mb-4">Program Beneficiaries</h4>
                                            <div class="space-y-3">
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">CCTP Beneficiaries:</span>
                                                    <span class="font-medium"><?= number_format($data['cctp_beneficiaries']) ?></span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">SSS Pensioners:</span>
                                                    <span class="font-medium"><?= number_format($data['sss_pensioners']) ?></span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">GSIS Pensioners:</span>
                                                    <span class="font-medium"><?= number_format($data['gsis_pensioners']) ?></span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">Livelihood Program:</span>
                                                    <span class="font-medium"><?= number_format($data['livelihood_program_beneficiaries']) ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                <?php elseif ($current_page === 'programs'): ?>
                    <!-- Social Welfare Programs Page -->
                    <div class="space-y-6">
                        <!-- Program Stats -->
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-purple-600"><?= count($welfare_programs) ?></div>
                                    <div class="text-gray-600">Total Programs</div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-blue-600"><?= count(array_filter($welfare_programs, function($p) { return $p['status'] === 'active'; })) ?></div>
                                    <div class="text-gray-600">Active Programs</div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-green-600">₱<?= number_format(array_sum(array_column($welfare_programs, 'budget'))) ?></div>
                                    <div class="text-gray-600">Total Budget</div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-yellow-600"><?= number_format(array_sum(array_column($welfare_programs, 'current_beneficiaries'))) ?></div>
                                    <div class="text-gray-600">Total Beneficiaries</div>
                                </div>
                            </div>
                        </div>

                        <!-- Programs List -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                            <div class="p-6 border-b border-gray-200">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-lg font-semibold">Social Welfare Programs</h3>
                                    <button class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition-colors">
                                        Add New Program
                                    </button>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="space-y-6">
                                    <?php foreach ($welfare_programs as $program): ?>
                                        <div class="border border-gray-200 rounded-lg p-6">
                                            <div class="flex justify-between items-start mb-4">
                                                <div>
                                                    <h4 class="text-lg font-semibold text-gray-900"><?= $program['name'] ?></h4>
                                                    <p class="text-gray-600">Budget: ₱<?= number_format($program['budget']) ?></p>
                                                    <p class="text-sm text-gray-500">
                                                        Duration: <?= date('M j, Y', strtotime($program['start_date'])) ?> - <?= date('M j, Y', strtotime($program['end_date'])) ?>
                                                    </p>
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 mt-2">
                                                        <?= ucfirst(str_replace('_', ' ', $program['type'])) ?>
                                                    </span>
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
                                                            <div class="bg-purple-500 h-2 rounded-full" style="width: <?= ($program['current_beneficiaries'] / $program['target_beneficiaries']) * 100 ?>%"></div>
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
                                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
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

                <?php elseif ($current_page === 'cases'): ?>
                    <!-- Case Management Page -->
                    <div class="space-y-6">
                        <!-- Case Stats -->
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-red-600"><?= count(array_filter($welfare_cases, function($c) { return $c['severity'] === 'high'; })) ?></div>
                                    <div class="text-gray-600">High Priority</div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-yellow-600"><?= count(array_filter($welfare_cases, function($c) { return $c['severity'] === 'medium'; })) ?></div>
                                    <div class="text-gray-600">Medium Priority</div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-green-600"><?= count(array_filter($welfare_cases, function($c) { return $c['severity'] === 'low'; })) ?></div>
                                    <div class="text-gray-600">Low Priority</div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-purple-600"><?= array_sum(array_column($welfare_cases, 'cases_count')) ?></div>
                                    <div class="text-gray-600">Total Cases</div>
                                </div>
                            </div>
                        </div>

                        <!-- Cases List -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                            <div class="p-6 border-b border-gray-200">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-lg font-semibold">Case Management & Social Incidents</h3>
                                    <div class="flex space-x-2">
                                        <select class="border border-gray-300 rounded-lg px-3 py-2">
                                            <option>All Severities</option>
                                            <option>High</option>
                                            <option>Medium</option>
                                            <option>Low</option>
                                        </select>
                                        <select class="border border-gray-300 rounded-lg px-3 py-2">
                                            <option>All Status</option>
                                            <option>Emergency Response</option>
                                            <option>Investigating</option>
                                            <option>Under Intervention</option>
                                            <option>Processing</option>
                                            <option>Resolved</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="space-y-4">
                                    <?php foreach ($welfare_cases as $case): ?>
                                        <div class="alert-<?= $case['severity'] ?> p-4 rounded-lg">
                                            <div class="flex justify-between items-start">
                                                <div class="flex-1">
                                                    <div class="flex items-center space-x-3 mb-2">
                                                        <h4 class="font-semibold text-gray-900"><?= $case['type'] ?></h4>
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                                            <?= $case['severity'] === 'high' ? 'bg-red-100 text-red-800' : 
                                                                ($case['severity'] === 'medium' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800') ?>">
                                                            <?= ucfirst($case['severity']) ?> Priority
                                                        </span>
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                            <?= $case['municipality'] ?>
                                                        </span>
                                                        <?php if ($case['cases_count'] > 1): ?>
                                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                                <?= $case['cases_count'] ?> Cases
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <p class="text-gray-700 mb-2"><?= $case['description'] ?></p>
                                                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                                                        <span>Date: <?= date('M j, Y', strtotime($case['date'])) ?></span>
                                                        <span>Case Worker: <?= $case['case_worker'] ?></span>
                                                        <span>Status: <?= ucfirst(str_replace('_', ' ', $case['status'])) ?></span>
                                                    </div>
                                                </div>
                                                <div class="flex space-x-2">
                                                    <button class="text-blue-600 hover:text-blue-800 p-2 rounded-lg hover:bg-blue-50 transition-colors">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                        </svg>
                                                    </button>
                                                    <?php if ($case['status'] !== 'resolved'): ?>
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
                <?php elseif ($current_page === 'beneficiaries'): ?>
                    <!-- Beneficiary Management Page -->
                    <div class="space-y-6">
                        <!-- Beneficiary Stats -->
                        <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-purple-600"><?= number_format($total_fourps) ?></div>
                                    <div class="text-gray-600">4Ps Beneficiaries</div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-blue-600"><?= number_format($total_senior_citizens) ?></div>
                                    <div class="text-gray-600">Senior Citizens</div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-green-600"><?= number_format($total_pwd) ?></div>
                                    <div class="text-gray-600">PWD Registered</div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-yellow-600"><?= number_format($total_solo_parents) ?></div>
                                    <div class="text-gray-600">Solo Parents</div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-red-600"><?= $total_daycare_centers ?></div>
                                    <div class="text-gray-600">Daycare Centers</div>
                                </div>
                            </div>
                        </div>

                        <!-- Beneficiary Categories -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                            <div class="p-6 border-b border-gray-200">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-lg font-semibold">Beneficiary Categories</h3>
                                    <button class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition-colors">
                                        Add New Beneficiary
                                    </button>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    <div class="border border-purple-200 rounded-lg p-4">
                                        <h4 class="font-semibold text-purple-900 mb-3">4Ps Program</h4>
                                        <div class="space-y-2">
                                            <?php foreach ($municipalities as $municipality => $data): ?>
                                                <div class="flex justify-between text-sm">
                                                    <span class="text-gray-600"><?= $municipality ?>:</span>
                                                    <span class="font-medium"><?= number_format($data['fourps_beneficiaries']) ?></span>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="border border-blue-200 rounded-lg p-4">
                                        <h4 class="font-semibold text-blue-900 mb-3">Senior Citizens</h4>
                                        <div class="space-y-2">
                                            <?php foreach ($municipalities as $municipality => $data): ?>
                                                <div class="flex justify-between text-sm">
                                                    <span class="text-gray-600"><?= $municipality ?>:</span>
                                                    <span class="font-medium"><?= number_format($data['senior_citizens']) ?></span>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="border border-green-200 rounded-lg p-4">
                                        <h4 class="font-semibold text-green-900 mb-3">PWD Registry</h4>
                                        <div class="space-y-2">
                                            <?php foreach ($municipalities as $municipality => $data): ?>
                                                <div class="flex justify-between text-sm">
                                                    <span class="text-gray-600"><?= $municipality ?>:</span>
                                                    <span class="font-medium"><?= number_format($data['pwd_registered']) ?></span>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php elseif ($current_page === 'data_entry'): ?>
                    <!-- Data Entry Page -->
                    <div class="max-w-4xl mx-auto">
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                            <div class="p-6 border-b border-gray-200">
                                <h3 class="text-lg font-semibold">Social Welfare Data Entry</h3>
                                <p class="text-gray-600 mt-1">Enter monthly social welfare data for municipalities</p>
                            </div>
                            <div class="p-6">
                                <form class="space-y-6">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Municipality</label>
                                            <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-purple-500 focus:border-transparent" required>
                                                <option value="">Select Municipality</option>
                                                <?php foreach (array_keys($municipalities) as $municipality): ?>
                                                    <option value="<?= strtolower(str_replace(' ', '_', $municipality)) ?>"><?= $municipality ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Data Period</label>
                                            <input type="month" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-purple-500 focus:border-transparent" value="<?= date('Y-m') ?>" required>
                                        </div>
                                    </div>
                                    
                                    <div class="border-t border-gray-200 pt-6">
                                        <h4 class="text-lg font-medium text-gray-900 mb-4">Social Welfare Metrics</h4>
                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                            <?php foreach ($welfare_data_fields as $field): ?>
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
                                                        <?= $field['required'] ? 'required' : '' ?>
                                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                                        placeholder="Enter <?= strtolower($field['label']) ?>"
                                                    >
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="border-t border-gray-200 pt-6">
                                        <h4 class="text-lg font-medium text-gray-900 mb-4">Additional Information</h4>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Notes/Remarks</label>
                                            <textarea rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="Enter any additional notes or remarks about the social welfare data..."></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="flex justify-end space-x-3">
                                        <button type="button" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                                            Cancel
                                        </button>
                                        <button type="submit" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-colors">
                                            Save Social Welfare Data
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
                                <h3 class="text-lg font-semibold">Generate Social Welfare Reports</h3>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                    <button class="p-4 border border-purple-200 rounded-lg hover:bg-purple-50 transition-colors text-left">
                                        <div class="text-purple-600 mb-2">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                            </svg>
                                        </div>
                                        <h4 class="font-medium text-gray-900">Monthly Welfare Summary</h4>
                                        <p class="text-sm text-gray-600">Social welfare data overview</p>
                                    </button>
                                    <button class="p-4 border border-purple-200 rounded-lg hover:bg-purple-50 transition-colors text-left">
                                        <div class="text-purple-600 mb-2">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                            </svg>
                                        </div>
                                        <h4 class="font-medium text-gray-900">4Ps Program Report</h4>
                                        <p class="text-sm text-gray-600">Beneficiary analysis and compliance</p>
                                    </button>
                                    <button class="p-4 border border-purple-200 rounded-lg hover:bg-purple-50 transition-colors text-left">
                                        <div class="text-purple-600 mb-2">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                        </div>
                                        <h4 class="font-medium text-gray-900">Case Management Report</h4>
                                        <p class="text-sm text-gray-600">Incident tracking and outcomes</p>
                                    </button>
                                    <button class="p-4 border border-purple-200 rounded-lg hover:bg-purple-50 transition-colors text-left">
                                        <div class="text-purple-600 mb-2">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                        </div>
                                        <h4 class="font-medium text-gray-900">Beneficiary Statistics</h4>
                                        <p class="text-sm text-gray-600">Demographics and distribution</p>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Reports -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                            <div class="p-6 border-b border-gray-200">
                                <h3 class="text-lg font-semibold">Recent Social Welfare Reports</h3>
                            </div>
                            <div class="p-6">
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                            </div>
                                            <div class="ml-4">
                                                <h4 class="font-medium text-gray-900">September 2025 Social Welfare Summary</h4>
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
                                            <button class="text-purple-600 hover:text-purple-800 p-2 rounded-lg hover:bg-purple-50 transition-colors">
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
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                                </svg>
                                            </div>
                                            <div class="ml-4">
                                                <h4 class="font-medium text-gray-900">Q3 2025 4Ps Program Performance</h4>
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
                                            <button class="text-purple-600 hover:text-purple-800 p-2 rounded-lg hover:bg-purple-50 transition-colors">
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
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                                </svg>
                                            </div>
                                            <div class="ml-4">
                                                <h4 class="font-medium text-gray-900">Senior Citizens Assistance Report August 2025</h4>
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
                                            <button class="text-purple-600 hover:text-purple-800 p-2 rounded-lg hover:bg-purple-50 transition-colors">
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
        // Beneficiaries Chart
        const beneficiariesCtx = document.getElementById('beneficiariesChart');
        if (beneficiariesCtx) {
            new Chart(beneficiariesCtx, {
                type: 'bar',
                data: {
                    labels: <?= json_encode(array_keys($municipalities)) ?>,
                    datasets: [{
                        label: '4Ps Beneficiaries',
                        data: <?= json_encode(array_column($municipalities, 'fourps_beneficiaries')) ?>,
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
                            title: {
                                display: true,
                                text: 'Number of Beneficiaries'
                            }
                        }
                    }
                }
            });
        }

        // Programs Distribution Chart
        const programsCtx = document.getElementById('programsChart');
        if (programsCtx) {
            new Chart(programsCtx, {
                type: 'doughnut',
                data: {
                    labels: ['4Ps Program', 'Senior Citizens', 'PWD Support', 'Livelihood', 'Solo Parents'],
                    datasets: [{
                        data: [
                            <?= $total_fourps ?>,
                            <?= $total_senior_citizens ?>,
                            <?= $total_pwd ?>,
                            <?= array_sum(array_column($municipalities, 'livelihood_program_beneficiaries')) ?>,
                            <?= $total_solo_parents ?>
                        ],
                        backgroundColor: [
                            'rgba(147, 51, 234, 0.8)',
                            'rgba(59, 130, 246, 0.8)',
                            'rgba(34, 197, 94, 0.8)',
                            'rgba(251, 191, 36, 0.8)',
                            'rgba(239, 68, 68, 0.8)'
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
                    console.log('Social welfare data submitted:', data);
                    
                    // Show success message
                    const submitBtn = form.querySelector('button[type="submit"]');
                    if (submitBtn) {
                        const originalText = submitBtn.textContent;
                        submitBtn.textContent = 'Social Welfare Data Saved Successfully!';
                        submitBtn.classList.remove('bg-purple-600');
                        submitBtn.classList.add('bg-green-600');
                        
                        setTimeout(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.classList.remove('bg-green-600');
                            submitBtn.classList.add('bg-purple-600');
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

        // Social welfare notifications
        function showWelfareNotification(message, type = 'info') {
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

        // Simulate periodic social welfare monitoring alerts
        setInterval(() => {
            const welfareAlerts = ['4Ps compliance check completed', 'Senior citizen assistance distributed', 'Case management update available'];
            const randomAlert = welfareAlerts[Math.floor(Math.random() * welfareAlerts.length)];
            
            if (Math.random() < 0.07) { // 7% chance every interval
                showWelfareNotification(`${randomAlert} - Systems operational`, 'success');
            }
        }, 180000); // Every 3 minutes

        // Print functionality for reports
        function printWelfareReport(reportType) {
            window.print();
        }

        // Export functionality
        function exportWelfareData(format) {
            showWelfareNotification(`Exporting social welfare data in ${format.toUpperCase()} format...`, 'info');
            
            // Simulate export process
            setTimeout(() => {
                showWelfareNotification(`Social welfare data exported successfully in ${format.toUpperCase()}!`, 'success');
            }, 2000);
        }

        // Real-time beneficiary updates simulation
        setInterval(() => {
            const beneficiaryElements = document.querySelectorAll('[data-beneficiaries]');
            beneficiaryElements.forEach(el => {
                const currentCount = parseInt(el.textContent.replace(/,/g, ''));
                const newCount = Math.max(currentCount - 5, Math.min(currentCount + 15, currentCount + Math.floor(Math.random() * 10)));
                el.textContent = newCount.toLocaleString();
            });
        }, 60000);

        // Case management status updates
        function updateCaseStatus(caseId, newStatus) {
            console.log(`Updating case ${caseId} to status: ${newStatus}`);
            showWelfareNotification(`Case ${caseId} status updated to ${newStatus.replace('_', ' ')}`, 'info');
        }

        // Beneficiary search functionality
        function searchBeneficiaries(searchTerm) {
            console.log('Searching beneficiaries for:', searchTerm);
            // In a real application, this would filter the beneficiary list
        }

        // Social worker assignment
        function assignSocialWorker(caseId, workerId) {
            console.log(`Assigning social worker ${workerId} to case ${caseId}`);
            showWelfareNotification('Social worker assigned successfully', 'success');
        }

        // Initialize tooltips for social welfare charts
        Chart.defaults.plugins.tooltip.backgroundColor = 'rgba(0, 0, 0, 0.8)';
        Chart.defaults.plugins.tooltip.titleColor = '#fff';
        Chart.defaults.plugins.tooltip.bodyColor = '#fff';
        Chart.defaults.plugins.tooltip.cornerRadius = 8;

        // Search functionality for the header search bar
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('input[placeholder*="Search welfare data"]');
            if (searchInput) {
                searchInput.addEventListener('input', function(e) {
                    const searchTerm = e.target.value.toLowerCase();
                    
                    if (searchTerm.length > 2) {
                        console.log('Searching welfare data for:', searchTerm);
                        // Simulate search highlighting or filtering
                        searchBeneficiaries(searchTerm);
                    }
                });
            }
        });

        // Auto-save functionality for forms
        function autoSaveFormData() {
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                const formData = new FormData(form);
                const data = {};
                for (let [key, value] of formData.entries()) {
                    if (value.trim() !== '') {
                        data[key] = value;
                    }
                }
                
                if (Object.keys(data).length > 2) { // More than just municipality and date
                    localStorage.setItem('mswdo_draft_data', JSON.stringify(data));
                    console.log('Auto-saved form data');
                }
            });
        }

        // Auto-save every 30 seconds
        setInterval(autoSaveFormData, 30000);

        // Load draft data on page load
        document.addEventListener('DOMContentLoaded', function() {
            const draftData = localStorage.getItem('mswdo_draft_data');
            if (draftData) {
                try {
                    const data = JSON.parse(draftData);
                    // Populate form fields with draft data
                    Object.keys(data).forEach(key => {
                        const field = document.querySelector(`[name="${key}"]`);
                        if (field) {
                            field.value = data[key];
                        }
                    });
                    showWelfareNotification('Draft data loaded', 'info');
                } catch (e) {
                    console.error('Error loading draft data:', e);
                }
            }
        });

        // Additional social welfare specific functions
        function generateBeneficiaryReport(programType) {
            showWelfareNotification(`Generating ${programType} beneficiary report...`, 'info');
            setTimeout(() => {
                showWelfareNotification(`${programType} report generated successfully`, 'success');
            }, 1500);
        }

        function scheduleCaseVisit(caseId, date) {
            console.log(`Scheduling visit for case ${caseId} on ${date}`);
            showWelfareNotification('Case visit scheduled successfully', 'success');
        }

        function validateBeneficiaryData(data) {
            const errors = [];
            if (!data.municipality) errors.push('Municipality is required');
            if (!data.fourps_beneficiaries || data.fourps_beneficiaries < 0) errors.push('4Ps beneficiaries must be a valid number');
            if (!data.senior_citizens || data.senior_citizens < 0) errors.push('Senior citizens count must be valid');
            
            return errors;
        }

        // Emergency case alert system
        function triggerEmergencyAlert(caseType, municipality) {
            const alertDiv = document.createElement('div');
            alertDiv.className = 'fixed top-20 right-4 bg-red-600 text-white p-4 rounded-lg shadow-lg z-50 animate-pulse';
            alertDiv.innerHTML = `
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <h4 class="font-bold">EMERGENCY ALERT</h4>
                        <p class="text-sm">${caseType} in ${municipality}</p>
                        <p class="text-xs">Immediate response required</p>
                    </div>
                </div>
            `;
            document.body.appendChild(alertDiv);
            
            // Auto-remove after 10 seconds
            setTimeout(() => {
                if (alertDiv.parentNode) {
                    alertDiv.parentNode.removeChild(alertDiv);
                }
            }, 10000);
        }
    </script>
</body>
</html>