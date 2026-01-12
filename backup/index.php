<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dynamic Control Demo 2 Pages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        /* Navigation Bar Styles */
        .navbar {
            background-color: #2c3e50;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1001;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 70px;
        }

        .nav-logo-link {
            color: #ecf0f1;
            text-decoration: none;
            font-size: 24px;
            font-weight: bold;
        }

        .nav-logo-link:hover {
            color: #3498db;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 30px;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            color: #ecf0f1;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            padding: 10px 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background-color: #34495e;
            color: #3498db;
            transform: translateY(-2px);
        }

        /* Hamburger Menu (Hidden on Desktop) */
        .nav-hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            padding: 5px;
        }

        .nav-hamburger span {
            width: 25px;
            height: 3px;
            background-color: #ecf0f1;
            margin: 3px 0;
            transition: 0.3s;
            border-radius: 2px;
        }

        /* Hamburger Animation */
        .nav-hamburger.active span:nth-child(1) {
            transform: rotate(-45deg) translate(-5px, 6px);
        }

        .nav-hamburger.active span:nth-child(2) {
            opacity: 0;
        }

        .nav-hamburger.active span:nth-child(3) {
            transform: rotate(45deg) translate(-5px, -6px);
        }

        /* Mobile Responsive Styles */
        @media screen and (max-width: 768px) {
            .nav-hamburger {
                display: flex;
            }

            .nav-menu {
                position: fixed;
                left: -100%;
                top: 70px;
                flex-direction: column;
                background-color: #2c3e50;
                width: 100%;
                text-align: center;
                transition: 0.3s;
                box-shadow: 0 10px 27px rgba(0,0,0,0.05);
                padding: 20px 0;
                gap: 0;
            }

            .nav-menu.active {
                left: 0;
            }

            .nav-item {
                margin: 10px 0;
            }

            .nav-link {
                padding: 15px 20px;
                display: block;
                font-size: 18px;
            }

            .nav-link:hover {
                background-color: #34495e;
                transform: none;
            }
        }

        .banner-section {
            position: relative;
            width: 100%;
            margin: 0;
            margin-top: 70px; /* Account for fixed navbar */
            background: #212529;
            border-radius: 0;
            overflow: hidden;
            box-shadow: none;
        }
        .banner-image {
            width: 100%;
            height: auto;
            min-height: 400px;
            object-fit: contain;
            object-position: center;
            transition: 0.2s;
            display: block;
            background: #212529;
        }
        .floating-btn-group {
            position: absolute;
            bottom: 35%;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            justify-content: center;
            max-width: 90%;
            z-index: 10;
        }
        .floating-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            transition: all 0.3s ease;
            min-width: auto;
            width: auto;
            height: auto;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            letter-spacing: 0.5px;
            border: 2px solid transparent;
        }
        .floating-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            border-color: rgba(255, 255, 255, 0.3);
        }

        .floating-btn:active {
            transform: translateY(0);
            box-shadow: 0 2px 10px rgba(102, 126, 234, 0.4);
        }

        /* Video container for mobile */
        .video-container {
            display: none;
            max-width: 900px;
            margin: 40px auto;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 2px 24px rgba(0,0,0,0.19);
        }
        .video-container video {
            width: 100%;
            height: auto;
            display: block;
        }

        /* Solar Calculator Styles */
        .solar-calculator-section {
            padding: 80px 0;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .calculator-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .calculator-header h2 {
            font-size: 42px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        .calculator-header p {
            font-size: 18px;
            color: #7f8c8d;
            margin: 0;
        }

        .calculator-content {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 40px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .calculator-form {
            padding: 40px;
        }

        .tab-navigation {
            display: flex;
            margin-bottom: 30px;
            background: #f8f9fa;
            border-radius: 12px;
            padding: 8px;
        }

        .tab-btn {
            flex: 1;
            padding: 15px 20px;
            border: none;
            background: transparent;
            color: #6c757d;
            font-size: 16px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .tab-btn.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .tab-btn:hover:not(.active) {
            background: #e9ecef;
            color: #495057;
        }

        .tab-content {
            position: relative;
        }

        .tab-pane {
            display: none;
        }

        .tab-pane.active {
            display: block;
        }

        .calculator-form-content {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .form-group {
            position: relative;
        }

        .form-group label {
            display: block;
            font-size: 16px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 15px;
        }

        .slider-container {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 20px;
            border: 2px solid #e9ecef;
            transition: border-color 0.3s ease;
        }

        .slider-container:hover {
            border-color: #667eea;
        }

        .slider {
            width: 100%;
            height: 8px;
            border-radius: 5px;
            background: #ddd;
            outline: none;
            margin: 15px 0;
            -webkit-appearance: none;
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .slider::-moz-range-thumb {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            cursor: pointer;
            border: none;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .slider-values {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: #6c757d;
            margin-top: 5px;
        }

        .current-value {
            text-align: center;
            margin-top: 15px;
            padding: 12px;
            background: white;
            border-radius: 8px;
            border: 1px solid #e9ecef;
        }

        .current-value span:nth-child(2) {
            font-size: 24px;
            font-weight: 700;
            color: #667eea;
            margin: 0 8px;
        }

        .calculate-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 18px 40px;
            border-radius: 12px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
            margin-top: 20px;
        }

        .calculate-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.6);
        }

        .calculate-btn:active {
            transform: translateY(0);
        }

        .calculator-results {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            padding: 40px;
            color: white;
        }

        .results-container h3 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
            color: #ecf0f1;
        }

        .results-content {
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .no-results {
            text-align: center;
            color: #bdc3c7;
            font-size: 16px;
        }

        .results-display {
            display: none;
        }

        .results-display.active {
            display: block;
        }

        .result-item {
            background: rgba(255,255,255,0.1);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            border-left: 4px solid #3498db;
        }

        .result-item h4 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #3498db;
        }

        .result-item .value {
            font-size: 28px;
            font-weight: 700;
            color: #ecf0f1;
        }

        .result-item .unit {
            font-size: 14px;
            color: #bdc3c7;
            margin-left: 8px;
        }

        /* Mobile Layout Container */
        body {
            display: flex;
            flex-direction: column;
        }

        .navbar {
            order: 1;
        }

        .banner-section {
            order: 2;
        }

        .solar-calculator-section {
            order: 3;
        }

        .video-container {
            order: 4;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .banner-section {
                display: none !important;
                order: 2;
            }
            .video-container {
                display: block;
                margin: 20px;
                border-radius: 12px;
                order: 2;
            }
            .solar-calculator-section {
                order: 3;
            }
            
            .floating-btn-group {
                position: fixed;
                gap: 10px;
                flex-wrap: wrap;
                justify-content: center;
                max-width: 95%;
                bottom: 15%;
                z-index: 1000;
                left: 50%;
                transform: translateX(-50%);
            }
            
            .floating-btn {
                font-size: 12px;
                padding: 10px 18px;
                border-radius: 6px;
                font-weight: 600;
            }

            /* Solar Calculator Mobile Styles */
            .solar-calculator-section {
                padding: 40px 0;
            }

            .calculator-header h2 {
                font-size: 28px;
            }

            .calculator-content {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .calculator-form {
                padding: 30px 20px;
            }

            .calculator-results {
                padding: 30px 20px;
            }

            .tab-btn {
                padding: 12px 15px;
                font-size: 14px;
            }

            .calculate-btn {
                padding: 15px 30px;
                font-size: 16px;
            }

            .current-value span:nth-child(2) {
                font-size: 20px;
            }

            .result-item .value {
                font-size: 24px;
            }
        }

        @media (max-width: 576px) {
            .video-container {
                margin: 15px;
                border-radius: 8px;
            }
        }

        /* Tablet adjustments */
        @media (max-width: 992px) and (min-width: 769px) {
            .banner-section {
                margin: 0;
                width: 100%;
            }
            .floating-btn-group {
                gap: 20px;
            }
            .floating-btn {
                width: 70px;
                height: 36px;
                font-size: 12px;
            }
        }

        /* Large mobile adjustments */
        @media (max-width: 768px) and (min-width: 577px) {
            .video-container {
                margin: 20px;
            }
        }
    </style>
    <script>
        // Solar Calculator JavaScript
        document.addEventListener('DOMContentLoaded', function() {
            // Tab functionality
            const tabBtns = document.querySelectorAll('.tab-btn');
            const tabPanes = document.querySelectorAll('.tab-pane');

            tabBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const targetTab = this.getAttribute('data-tab');
                    
                    // Remove active class from all tabs and panes
                    tabBtns.forEach(b => b.classList.remove('active'));
                    tabPanes.forEach(p => p.classList.remove('active'));
                    
                    // Add active class to clicked tab and corresponding pane
                    this.classList.add('active');
                    document.getElementById(targetTab).classList.add('active');
                });
            });

            // Slider functionality
            const sliders = document.querySelectorAll('.slider');
            sliders.forEach(slider => {
                const valueDisplay = slider.parentElement.querySelector('.current-value span:nth-child(2)');
                
                // Update display on input
                slider.addEventListener('input', function() {
                    let value = parseInt(this.value);
                    let formattedValue = value;
                    
                    // Format large numbers
                    if (value >= 100000) {
                        formattedValue = (value / 100000).toFixed(1) + 'L';
                    } else if (value >= 1000) {
                        formattedValue = (value / 1000).toFixed(0) + 'K';
                    }
                    
                    valueDisplay.textContent = formattedValue;
                });
                
                // Initialize display
                slider.dispatchEvent(new Event('input'));
            });

            // Calculate button functionality
            const calculateBtns = document.querySelectorAll('.calculate-btn');
            calculateBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const tabPane = this.closest('.tab-pane');
                    const tabType = tabPane.id;
                    
                    // Get form values
                    const electricityBill = parseInt(tabPane.querySelector('[data-field="electricity-bill"]').value);
                    const unitsConsumed = parseInt(tabPane.querySelector('[data-field="units-consumed"]').value);
                    const rooftopArea = parseInt(tabPane.querySelector('[data-field="rooftop-area"]').value);
                    const sanctionedCapacity = parseInt(tabPane.querySelector('[data-field="sanctioned-capacity"]').value);
                    
                    // Calculate solar system requirements
                    const results = calculateSolarSystem(electricityBill, unitsConsumed, rooftopArea, sanctionedCapacity, tabType);
                    
                    // Display results
                    displayResults(results);
                });
            });

            function calculateSolarSystem(bill, units, area, capacity, type) {
                // Basic solar calculation logic
                const avgSunHours = 5; // Average sun hours per day
                const systemEfficiency = 0.8; // System efficiency factor
                const panelWattage = 540; // Watts per panel
                const costPerWatt = type === 'residential' ? 65 : type === 'commercial' ? 60 : 55; // Rs per watt
                
                // Calculate required system size (kW)
                const requiredSystemSize = (units * 1000) / (avgSunHours * 30 * systemEfficiency);
                
                // Calculate number of panels needed
                const panelsNeeded = Math.ceil((requiredSystemSize * 1000) / panelWattage);
                
                // Calculate area required (assuming 20 sq ft per panel)
                const areaRequired = panelsNeeded * 20;
                
                // Calculate system cost
                const systemCost = requiredSystemSize * 1000 * costPerWatt;
                
                // Calculate monthly savings (assuming 90% bill reduction)
                const monthlySavings = bill * 0.9;
                
                // Calculate payback period (years)
                const paybackPeriod = systemCost / (monthlySavings * 12);
                
                // Calculate 25-year savings
                const totalSavings = (monthlySavings * 12 * 25) - systemCost;
                
                return {
                    systemSize: requiredSystemSize.toFixed(1),
                    panelsNeeded: panelsNeeded,
                    areaRequired: areaRequired,
                    systemCost: systemCost,
                    monthlySavings: monthlySavings,
                    paybackPeriod: paybackPeriod.toFixed(1),
                    totalSavings: totalSavings,
                    feasible: areaRequired <= area
                };
            }

            function displayResults(results) {
                const resultsContainer = document.querySelector('.results-content');
                const noResults = resultsContainer.querySelector('.no-results');
                let resultsDisplay = resultsContainer.querySelector('.results-display');
                
                // Hide no results message
                if (noResults) noResults.style.display = 'none';
                
                // Create or update results display
                if (!resultsDisplay) {
                    resultsDisplay = document.createElement('div');
                    resultsDisplay.className = 'results-display';
                    resultsContainer.appendChild(resultsDisplay);
                }
                
                resultsDisplay.classList.add('active');
                resultsDisplay.innerHTML = `
                    <div class="result-item">
                        <h4>Recommended System Size</h4>
                        <div class="value">${results.systemSize}<span class="unit">kW</span></div>
                    </div>
                    <div class="result-item">
                        <h4>Solar Panels Required</h4>
                        <div class="value">${results.panelsNeeded}<span class="unit">panels</span></div>
                    </div>
                    <div class="result-item">
                        <h4>Area Required</h4>
                        <div class="value">${results.areaRequired}<span class="unit">sq ft</span></div>
                    </div>
                    <div class="result-item">
                        <h4>System Cost</h4>
                        <div class="value">₹${(results.systemCost / 100000).toFixed(1)}<span class="unit">Lakh</span></div>
                    </div>
                    <div class="result-item">
                        <h4>Monthly Savings</h4>
                        <div class="value">₹${results.monthlySavings.toLocaleString()}<span class="unit">per month</span></div>
                    </div>
                    <div class="result-item">
                        <h4>Payback Period</h4>
                        <div class="value">${results.paybackPeriod}<span class="unit">years</span></div>
                    </div>
                    <div class="result-item">
                        <h4>25-Year Savings</h4>
                        <div class="value">₹${(results.totalSavings / 10000000).toFixed(1)}<span class="unit">Crore</span></div>
                    </div>
                    ${!results.feasible ? '<div class="result-item" style="border-left-color: #e74c3c;"><h4 style="color: #e74c3c;">Note</h4><div style="color: #e74c3c; font-size: 16px;">Insufficient rooftop area for optimal system size</div></div>' : ''}
                `;
            }
        });
    </script>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <a href="#" class="nav-logo-link">Logo</a>
            </div>
            
            <!-- Hamburger Menu Icon -->
            <div class="nav-hamburger" id="navHamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
            <!-- Navigation Menu -->
            <ul class="nav-menu" id="navMenu">
                <li class="nav-item">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">About us</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Service</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Career</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Power</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Weighing</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Process Automation</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Banner section for desktop/tablet -->
    <div class="banner-section" id="banner-section">
        <img id="banner-img" src="image_1.png" class="banner-image img-fluid" alt="Banner">
        <div class="floating-btn-group">
            <div class="floating-btn" id="btn1" title="Show Image 2">Weighing</div>
            <div class="floating-btn" id="btn2" title="Show Image 3">Process Automation</div>
            <div class="floating-btn" id="btn3" title="Show Image 4">Power</div>
        </div>
    </div>

    <!-- Solar Calculator Section -->
    <section class="solar-calculator-section">
        <div class="container">
            <div class="calculator-header">
                <h2>Solar Calculator</h2>
                <p>Calculate your solar energy requirements and savings</p>
            </div>
            
            <div class="calculator-content">
                <!-- Left Side - Form (8/12) -->
                <div class="calculator-form">
                    <!-- Tab Navigation -->
                    <div class="tab-navigation">
                        <button class="tab-btn active" data-tab="residential">Residential</button>
                        <button class="tab-btn" data-tab="commercial">Commercial</button>
                        <button class="tab-btn" data-tab="industrial">Industrial</button>
                    </div>
                    
                    <!-- Tab Content -->
                    <div class="tab-content">
                        <!-- Residential Tab -->
                        <div class="tab-pane active" id="residential">
                            <form class="calculator-form-content">
                                <div class="form-group">
                                    <label>Electricity Bill (Rs)</label>
                                    <div class="slider-container">
                                        <input type="range" class="slider" id="bill-residential" min="0" max="50000" value="18639" step="100">
                                        <div class="slider-values">
                                            <span>0</span>
                                            <span>50L</span>
                                        </div>
                                        <div class="current-value">
                                            <span>Rs</span>
                                            <span id="bill-value-residential">18639</span>
                                            <span>Per Month</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Avg No. of Units Consumed per Month</label>
                                    <div class="slider-container">
                                        <input type="range" class="slider" id="units-residential" min="0" max="4000" value="1439" step="10">
                                        <div class="slider-values">
                                            <span>0</span>
                                            <span>4L</span>
                                        </div>
                                        <div class="current-value">
                                            <span id="units-value-residential">1439</span>
                                            <span>Units Per Month</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Rooftop Area(Sq.Ft)</label>
                                    <div class="slider-container">
                                        <input type="range" class="slider" id="area-residential" min="0" max="300000" value="7230" step="100">
                                        <div class="slider-values">
                                            <span>0</span>
                                            <span>300000</span>
                                        </div>
                                        <div class="current-value">
                                            <span id="area-value-residential">7230</span>
                                            <span>Sq.Ft</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Sanctioned(KVA)</label>
                                    <div class="slider-container">
                                        <input type="range" class="slider" id="kva-residential" min="0" max="10000" value="261" step="10">
                                        <div class="slider-values">
                                            <span>0</span>
                                            <span>10000</span>
                                        </div>
                                        <div class="current-value">
                                            <span id="kva-value-residential">261</span>
                                            <span>kVA</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <button type="button" class="calculate-btn" onclick="calculateSolar('residential')">Calculate</button>
                            </form>
                        </div>
                        
                        <!-- Commercial Tab -->
                        <div class="tab-pane" id="commercial">
                            <form class="calculator-form-content">
                                <div class="form-group">
                                    <label>Electricity Bill (Rs)</label>
                                    <div class="slider-container">
                                        <input type="range" class="slider" id="bill-commercial" min="0" max="50000" value="18639" step="100">
                                        <div class="slider-values">
                                            <span>0</span>
                                            <span>50L</span>
                                        </div>
                                        <div class="current-value">
                                            <span>Rs</span>
                                            <span id="bill-value-commercial">18639</span>
                                            <span>Per Month</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Avg No. of Units Consumed per Month</label>
                                    <div class="slider-container">
                                        <input type="range" class="slider" id="units-commercial" min="0" max="4000" value="1439" step="10">
                                        <div class="slider-values">
                                            <span>0</span>
                                            <span>4L</span>
                                        </div>
                                        <div class="current-value">
                                            <span id="units-value-commercial">1439</span>
                                            <span>Units Per Month</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Rooftop Area(Sq.Ft)</label>
                                    <div class="slider-container">
                                        <input type="range" class="slider" id="area-commercial" min="0" max="300000" value="7230" step="100">
                                        <div class="slider-values">
                                            <span>0</span>
                                            <span>300000</span>
                                        </div>
                                        <div class="current-value">
                                            <span id="area-value-commercial">7230</span>
                                            <span>Sq.Ft</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Sanctioned(KVA)</label>
                                    <div class="slider-container">
                                        <input type="range" class="slider" id="kva-commercial" min="0" max="10000" value="261" step="10">
                                        <div class="slider-values">
                                            <span>0</span>
                                            <span>10000</span>
                                        </div>
                                        <div class="current-value">
                                            <span id="kva-value-commercial">261</span>
                                            <span>kVA</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <button type="button" class="calculate-btn" onclick="calculateSolar('commercial')">Calculate</button>
                            </form>
                        </div>
                        
                        <!-- Industrial Tab -->
                        <div class="tab-pane" id="industrial">
                            <form class="calculator-form-content">
                                <div class="form-group">
                                    <label>Electricity Bill (Rs)</label>
                                    <div class="slider-container">
                                        <input type="range" class="slider" id="bill-industrial" min="0" max="50000" value="18639" step="100">
                                        <div class="slider-values">
                                            <span>0</span>
                                            <span>50L</span>
                                        </div>
                                        <div class="current-value">
                                            <span>Rs</span>
                                            <span id="bill-value-industrial">18639</span>
                                            <span>Per Month</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Avg No. of Units Consumed per Month</label>
                                    <div class="slider-container">
                                        <input type="range" class="slider" id="units-industrial" min="0" max="4000" value="1439" step="10">
                                        <div class="slider-values">
                                            <span>0</span>
                                            <span>4L</span>
                                        </div>
                                        <div class="current-value">
                                            <span id="units-value-industrial">1439</span>
                                            <span>Units Per Month</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Rooftop Area(Sq.Ft)</label>
                                    <div class="slider-container">
                                        <input type="range" class="slider" id="area-industrial" min="0" max="300000" value="7230" step="100">
                                        <div class="slider-values">
                                            <span>0</span>
                                            <span>300000</span>
                                        </div>
                                        <div class="current-value">
                                            <span id="area-value-industrial">7230</span>
                                            <span>Sq.Ft</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Sanctioned(KVA)</label>
                                    <div class="slider-container">
                                        <input type="range" class="slider" id="kva-industrial" min="0" max="10000" value="261" step="10">
                                        <div class="slider-values">
                                            <span>0</span>
                                            <span>10000</span>
                                        </div>
                                        <div class="current-value">
                                            <span id="kva-value-industrial">261</span>
                                            <span>kVA</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <button type="button" class="calculate-btn" onclick="calculateSolar('industrial')">Calculate</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Right Side - Results (4/12) -->
                <div class="calculator-results">
                    <div class="results-container">
                        <h3>Solar Calculator Results</h3>
                        <div class="results-content" id="results-content">
                            <div class="no-results">
                                <p>Click "Calculate" to see your solar energy results</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Video container for mobile -->
    <div class="video-container" id="video-container">
        <video id="mobile-video" autoplay muted loop playsinline controls>
            <source src="file.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <!-- Add Bootstrap JS and jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Store image file names
        const images = {
            default: "image_1.png",
            img2: "image_2.png",
            img3: "image_3.png",
            img4: "image_4.png",
            img5: "image_5.png"
        };

        const $bannerImg = $("#banner-img");
        const $bannerSection = $("#banner-section");
        let currentHoveredButton = null;

        // Button hover events - each button shows its corresponding image
        $("#btn1").hover(
            function () { 
                currentHoveredButton = 'btn1';
                $bannerImg.attr("src", images.img2); 
            },
            function () { 
                currentHoveredButton = null;
                $bannerImg.attr("src", images.default); 
            }
        );

        $("#btn2").hover(
            function () { 
                currentHoveredButton = 'btn2';
                $bannerImg.attr("src", images.img3); 
            },
            function () { 
                currentHoveredButton = null;
                $bannerImg.attr("src", images.default); 
            }
        );

        $("#btn3").hover(
            function () { 
                currentHoveredButton = 'btn3';
                $bannerImg.attr("src", images.img4); 
            },
            function () { 
                currentHoveredButton = null;
                $bannerImg.attr("src", images.default); 
            }
        );

        // Banner section hover - show image_5 when hovering beside buttons
        $bannerSection.hover(
            function () {
                // On mouse enter banner section
                $bannerSection.on("mousemove.bannerHover", function(e) {
                    // Check if mouse is over any button
                    let isOverButton = false;
                    $(".floating-btn").each(function() {
                        const rect = this.getBoundingClientRect();
                        if (e.clientX >= rect.left && e.clientX <= rect.right && 
                            e.clientY >= rect.top && e.clientY <= rect.bottom) {
                            isOverButton = true;
                            return false; // break the loop
                        }
                    });

                    // If not over any button and no button is currently hovered, show image_5
                    if (!isOverButton && !currentHoveredButton) {
                        $bannerImg.attr("src", images.img5);
                    }
                });
            },
            function () {
                // On mouse leave banner section
                $bannerSection.off("mousemove.bannerHover");
                if (!currentHoveredButton) {
                    $bannerImg.attr("src", images.default);
                }
             }
         );

         // Mobile video handling
         function handleMobileVideo() {
             const video = document.getElementById('mobile-video');
             const isMobile = window.innerWidth <= 768;
             
             if (isMobile && video) {
                 // Ensure video plays on mobile
                 video.play().catch(function(error) {
                     console.log('Video autoplay failed:', error);
                 });
             }
         }

         // Handle window resize
         $(window).on('resize', function() {
             handleMobileVideo();
         });

         // Initialize on page load
         $(document).ready(function() {
             handleMobileVideo();
         });

         // Hamburger menu functionality
         $(document).ready(function() {
             const $hamburger = $('#navHamburger');
             const $navMenu = $('#navMenu');

             $hamburger.on('click', function() {
                 $hamburger.toggleClass('active');
                 $navMenu.toggleClass('active');
             });

             // Close menu when clicking on a nav link
             $('.nav-link').on('click', function() {
                 $hamburger.removeClass('active');
                 $navMenu.removeClass('active');
             });

             // Close menu when clicking outside
             $(document).on('click', function(e) {
                 if (!$(e.target).closest('.nav-container').length) {
                     $hamburger.removeClass('active');
                     $navMenu.removeClass('active');
                 }
             });
         });
    </script>
</body>
</html>
