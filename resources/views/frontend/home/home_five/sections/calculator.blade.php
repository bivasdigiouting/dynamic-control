<section class="tp-calculator-area pt-80 pb-80 p-relative fix" style="background-color: #f9f9f9;">
    <div class="container">
        <style>
            /* Consumer Type Cards */
            .consumer-type-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 10px;
                margin-bottom: 25px;
            }

            .consumer-card {
                background: #ffffff;
                border: 2px solid #e9ecef;
                border-radius: 10px;
                padding: 10px 10px;
                text-align: center;
                cursor: pointer;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                position: relative;
                overflow: hidden;
            }

            .consumer-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(135deg, #ffb800 0%, #ff9500 100%);
                opacity: 0;
                transition: opacity 0.3s ease;
                z-index: 0;
            }

            .consumer-card:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            }

            .consumer-card.active {
                border-color: #ffb800;
                /* background: linear-gradient(135deg, #ffb800 0%, #ff9500 100%); */
                background: white
            }

            .consumer-card.active .consumer-icon,
            .consumer-card.active .consumer-label {
                color: #ffb800;
            }

            .consumer-icon {
                font-size: 25px;
                color: #495057;
                margin-bottom: 8px;
                transition: all 0.3s ease;
                position: relative;
                z-index: 1;
            }

            .consumer-label {
                font-size: 15px;
                font-weight: 600;
                color: #495057;
                transition: all 0.3s ease;
                position: relative;
                z-index: 1;
            }

            /* Custom Range Slider */
            .custom-range {
                -webkit-appearance: none;
                width: 100%;
                height: 6px;
                border-radius: 5px;
                background: linear-gradient(to right, #ffb800 0%, #ffb800 0%, #e9ecef 0%, #e9ecef 100%);
                outline: none;
                transition: all 0.2s ease;
            }

            .custom-range::-webkit-slider-thumb {
                -webkit-appearance: none;
                appearance: none;
                width: 18px;
                height: 18px;
                border-radius: 50%;
                background: linear-gradient(135deg, #ffb800 0%, #ff9500 100%);
                cursor: grab;
                border: 3px solid #fff;
                box-shadow: 0 2px 8px rgba(255, 184, 0, 0.4);
                transition: all 0.15s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .custom-range:active::-webkit-slider-thumb {
                cursor: grabbing;
                transform: scale(1.2);
                box-shadow: 0 4px 16px rgba(255, 184, 0, 0.6);
            }

            .custom-range::-webkit-slider-thumb:hover {
                transform: scale(1.1);
                box-shadow: 0 3px 12px rgba(255, 184, 0, 0.5);
            }

            .custom-range::-moz-range-thumb {
                width: 18px;
                height: 18px;
                border-radius: 50%;
                background: linear-gradient(135deg, #ffb800 0%, #ff9500 100%);
                cursor: grab;
                border: 3px solid #fff;
                box-shadow: 0 2px 8px rgba(255, 184, 0, 0.4);
                transition: all 0.15s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .custom-range:active::-moz-range-thumb {
                cursor: grabbing;
                transform: scale(1.2);
            }

            .custom-range::-moz-range-track {
                background: #e9ecef;
                height: 6px;
                border-radius: 5px;
            }

            .custom-range::-moz-range-progress {
                background: linear-gradient(to right, #ffb800, #ff9500);
                height: 6px;
                border-radius: 5px;
            }

            /* Enhanced Input Styling */
            .input-slider-group .form-label {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 12px;
                font-size: 14px;
                font-weight: 600;
                color: #333;
            }

            .label-with-icon {
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .label-icon {
                color: #ffb800;
                font-size: 16px;
            }

            .value-badge {
                background: #f8f9fa;
                border: 2px solid #e9ecef;
                border-radius: 8px;
                padding: 6px 14px;
                font-size: 15px;
                font-weight: 700;
                color: #333;
                min-width: 90px;
                text-align: right;
                transition: all 0.2s ease;
            }

            .value-badge:hover {
                border-color: #ffb800;
                background: #fff;
            }

            .input-slider-group .form-control {
                display: none; /* Hide original number inputs */
            }

            /* Section Divider */
            .section-divider {
                font-size: 12px;
                font-weight: 700;
                color: #999;
                text-transform: uppercase;
                letter-spacing: 1.5px;
                margin: 30px 0 20px;
                padding-bottom: 8px;
                border-bottom: 2px solid #e9ecef;
            }

            /* Enhanced Select Dropdown */
            .select-wrapper {
                position: relative;
            }

            .select-wrapper::after {
                content: '\f078';
                font-family: 'Font Awesome 6 Free';
                font-weight: 900;
                position: absolute;
                right: 16px;
                top: 50%;
                transform: translateY(-50%);
                color: #666;
                pointer-events: none;
                transition: all 0.3s ease;
            }

            .form-select {
                appearance: none;
                -webkit-appearance: none;
                -moz-appearance: none;
                background-color: #ffffff !important;
                border: 2px solid #e9ecef !important;
                border-radius: 10px !important;
                height: 50px !important;
                padding: 0 40px 0 16px !important;
                font-size: 14px;
                font-weight: 500;
                color: #333;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .form-select:focus {
                border-color: #ffb800 !important;
                box-shadow: 0 0 0 3px rgba(255, 184, 0, 0.1) !important;
                outline: none;
            }

            .form-select:hover {
                border-color: #ffb800;
            }

            /* Calculate Button */
            .calculate-btn-modern {
                background: linear-gradient(135deg, #ffb800 0%, #ff9500 100%);
                color: white;
                border: none;
                padding: 16px 30px;
                border-radius: 12px;
                font-weight: 700;
                letter-spacing: 0.5px;
                box-shadow: 0 10px 25px rgba(255, 149, 0, 0.3);
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                width: 100%;
                text-transform: uppercase;
                font-size: 15px;
                position: relative;
                overflow: hidden;
            }

            .calculate-btn-modern::before {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                width: 0;
                height: 0;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.2);
                transform: translate(-50%, -50%);
                transition: width 0.6s, height 0.6s;
            }

            .calculate-btn-modern:hover::before {
                width: 300px;
                height: 300px;
            }

            .calculate-btn-modern:hover {
                transform: translateY(-3px);
                box-shadow: 0 15px 35px rgba(255, 149, 0, 0.5);
            }

            .calculate-btn-modern:active {
                transform: translateY(-1px);
                box-shadow: 0 8px 20px rgba(255, 149, 0, 0.4);
            }

            /* Enhanced Form Box */
            .tp-calculator-form {
                background: #ffffff;
                padding: 30px;
                border-radius: 16px;
                /* box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06); */
            }

            .tp-calculator-title {
                font-size: 24px !important;
                font-weight: 700 !important;
                color: #1a1a1a;
                margin-bottom: 25px !important;
                position: relative;
                padding-left: 12px;
            }

            .tp-calculator-title::before {
                content: '';
                position: absolute;
                left: 0;
                top: 0;
                bottom: 0;
                width: 4px;
                background: linear-gradient(135deg, #ffb800 0%, #ff9500 100%);
                border-radius: 2px;
            }

            /* Responsive Design */
            @media (max-width: 768px) {
                .consumer-type-grid {
                    grid-template-columns: 1fr;
                    gap: 12px;
                }

                .tp-calculator-box {
                    padding: 30px 20px !important;
                }

                .tp-calculator-result {
                    padding: 30px 20px !important;
                    margin-top: 30px;
                }

                .tp-section-title {
                    font-size: 28px !important;
                }

                .value-badge {
                    min-width: 80px;
                    font-size: 14px;
                }
            }

            /* Animation for value changes */
            @keyframes valueChange {
                0% { transform: scale(1); }
                50% { transform: scale(1.05); }
                100% { transform: scale(1); }
            }

            .value-badge.updated {
                animation: valueChange 0.3s ease;
            }
        </style>

        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="tp-calculator-box white-bg" style="box-shadow: 0px 30px 60px 0px rgba(0, 0, 0, 0.1); padding: 50px; border-radius: 20px;">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="tp-section-title-wrapper text-center mb-50">
                                <span class="tp-section-subtitle">Solar Calculator</span>
                                <h3 class="tp-section-title">Calculate Your Solar Savings</h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Input Section -->
                        <div class="col-xl-6 col-lg-6 mb-40">
                            <div class="tp-calculator-form">
                                <h4 class="tp-calculator-title">System Inputs</h4>
                                <form id="solar-calculator-form" onsubmit="return false;">
                                    <div class="row">
                                        <!-- Consumer Type -->
                                        <div class="col-xl-12 mb-25">
                                            <div class="section-divider">Consumer Type</div>
                                            <div class="consumer-type-grid">
                                                <div class="consumer-card active" onclick="selectConsumer(this, 'Residential')">
                                                    <div class="consumer-icon"><i class="fas fa-home"></i></div>
                                                    <div class="consumer-label">Residential</div>
                                                </div>
                                                <div class="consumer-card" onclick="selectConsumer(this, 'Commercial')">
                                                    <div class="consumer-icon"><i class="fas fa-building"></i></div>
                                                    <div class="consumer-label">Commercial</div>
                                                </div>
                                                <div class="consumer-card" onclick="selectConsumer(this, 'Industrial')">
                                                    <div class="consumer-icon"><i class="fas fa-industry"></i></div>
                                                    <div class="consumer-label">Industrial</div>
                                                </div>
                                            </div>
                                            <input type="hidden" id="consumer_type" value="Residential">
                                        </div>

                                        <!-- Billing Information -->
                                        <div class="col-xl-12 mb-4">
                                            <div class="section-divider">Billing Information</div>
                                        </div>

                                        <div class="col-xl-12 mb-25">
                                            <div class="input-slider-group">
                                                <div class="form-label">
                                                    <span class="label-with-icon">
                                                        <i class="fas fa-file-invoice-dollar label-icon"></i>
                                                        Average Monthly Bill
                                                    </span>
                                                    <span class="value-badge" id="monthly_bill_display">₹0</span>
                                                </div>
                                                <input type="number" id="monthly_bill" class="form-control" value="0">
                                                <input type="range" id="monthly_bill_slider" class="custom-range" min="0" max="100000" step="100" value="0">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 mb-25">
                                            <div class="input-slider-group">
                                                <div class="form-label">
                                                    <span class="label-with-icon">
                                                        <i class="fas fa-rupee-sign label-icon"></i>
                                                        Unit Cost
                                                    </span>
                                                    <span class="value-badge" id="unit_cost_display">₹6.0</span>
                                                </div>
                                                <input type="number" id="unit_cost" class="form-control" value="6" step="0.1">
                                                <input type="range" id="unit_cost_slider" class="custom-range" min="1" max="20" step="0.1" value="6">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 mb-25">
                                            <div class="input-slider-group">
                                                <div class="form-label">
                                                    <span class="label-with-icon">
                                                        <i class="fas fa-bolt label-icon"></i>
                                                        Units (Optional)
                                                    </span>
                                                    <span class="value-badge" id="monthly_units_display">0</span>
                                                </div>
                                                <input type="number" id="monthly_units" class="form-control" value="0">
                                                <input type="range" id="monthly_units_slider" class="custom-range" min="0" max="5000" step="10" value="0">
                                            </div>
                                        </div>

                                        <!-- Installation Details -->
                                        <div class="col-xl-12 mb-4 mt-3">
                                            <div class="section-divider">Installation Details</div>
                                        </div>

                                        <div class="col-xl-12 mb-25">
                                            <label class="form-label" style="font-weight: 600; color: #333; margin-bottom: 10px;">
                                                <i class="fas fa-warehouse label-icon"></i> Installation Type
                                            </label>
                                            <div class="select-wrapper">
                                                <select id="installation_type" class="form-select">
                                                    <option value="RCC">RCC Roof</option>
                                                    <option value="Sheet">Sheet Roof</option>
                                                    <option value="Elevated">Elevated</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 mb-25">
                                            <div class="input-slider-group">
                                                <div class="form-label">
                                                    <span class="label-with-icon">
                                                        <i class="fas fa-ruler-combined label-icon"></i>
                                                        Area
                                                    </span>
                                                    <span class="value-badge" id="available_area_display">0 Sq.Ft</span>
                                                </div>
                                                <input type="number" id="available_area" class="form-control" value="0">
                                                <input type="range" id="available_area_slider" class="custom-range" min="0" max="10000" step="50" value="0">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 mb-25">
                                            <div class="input-slider-group">
                                                <div class="form-label">
                                                    <span class="label-with-icon">
                                                        <i class="fas fa-plug label-icon"></i>
                                                        Load
                                                    </span>
                                                    <span class="value-badge" id="sanction_load_display">0 kVA</span>
                                                </div>
                                                <input type="number" id="sanction_load" class="form-control" value="0">
                                                <input type="range" id="sanction_load_slider" class="custom-range" min="0" max="100" step="1" value="0">
                                            </div>
                                        </div>

                                        <div class="col-xl-12 mt-20">
                                            <button type="button" onclick="calculateSolar()" class="calculate-btn-modern">
                                                <i class="fas fa-calculator"></i> Calculate Savings
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Result Section -->
                        <div class="col-xl-6 col-lg-6">
                            <div class="tp-calculator-result p-relative h-100" style="background: #1a1a1a; border-radius: 20px; padding: 40px; color: #fff;">
                                <h4 class="tp-calculator-title mb-30 text-white" style="font-size: 22px; font-weight: 600;">Your Solar Potential</h4>
                                
                                <div id="results-container" style="display: none;">
                                    <div class="result-item mb-25" style="border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 15px;">
                                        <span style="display: block; font-size: 14px; opacity: 0.7; margin-bottom: 5px;">Recommended System Size</span>
                                        <span class="value" id="res_system_size" style="font-size: 30px; font-weight: 700; color: #ffb800;">0 kWp</span>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="result-item mb-25">
                                                <span style="display: block; font-size: 13px; opacity: 0.7; margin-bottom: 5px;">Monthly Generation</span>
                                                <span class="value" id="res_monthly_gen" style="font-size: 24px; font-weight: 600;">0 Units</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="result-item mb-25">
                                                <span style="display: block; font-size: 13px; opacity: 0.7; margin-bottom: 5px;">Monthly Savings</span>
                                                <span class="value" id="res_monthly_savings" style="font-size: 24px; font-weight: 600;">₹0</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="slider-section mt-20 mb-30">
                                        <label class="form-label text-white mb-10" style="display: flex; justify-content: space-between;">
                                            <span>Savings Period</span>
                                            <span id="period_val" style="color: #ffb800; font-weight: 600;">10 Years</span>
                                        </label>
                                        <input type="range" class="custom-range" id="savings_period" min="1" max="25" value="10" oninput="updateTotalSavings()" style="width: 100%; background: #444;">
                                    </div>

                                    <div class="total-savings-box p-3 text-center" style="background: rgba(255, 184, 0, 0.1); border: 1px solid #ffb800; border-radius: 12px; margin-bottom: 20px;">
                                        <span style="display: block; font-size: 14px; color: #ffb800; margin-bottom: 5px;">Total Savings</span>
                                        <span id="res_total_savings" style="font-size: 32px; font-weight: 700; color: #fff;">₹0</span>
                                    </div>

                                    <div id="load_advisory" class="alert alert-warning" style="display: none; font-size: 13px; background: rgba(255, 193, 7, 0.2); border-color: #ffc107; color: #ffc107;">
                                        <i class="fas fa-exclamation-triangle me-2"></i> Warning: Feasible kWp exceeds Sanction Load. Load extension required up to <span id="advisory_load"></span> kW.
                                    </div>

                                    <div class="mt-30 text-center">
                                        <button type="button" class="tp-btn-white" style="background: #fff; color: #1a1a1a; padding: 10px 25px; border-radius: 8px; font-weight: 600;" onclick="window.openSolarQuoteModal()">Request Quote</button>
                                    </div>
                                </div>

                                <div id="initial-state" class="text-center" style="padding-top: 40px; opacity: 0.5;">
                                    <i class="fas fa-solar-panel" style="font-size: 48px; margin-bottom: 20px;"></i>
                                    <p>Enter your details and click calculate to see your potential savings.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Consumer Type Selection
    function selectConsumer(element, type) {
        document.querySelectorAll('.consumer-card').forEach(card => {
            card.classList.remove('active');
        });
        element.classList.add('active');
        document.getElementById('consumer_type').value = type;
    }

    // Initialize all sliders with progress on page load
    document.addEventListener('DOMContentLoaded', function() {
        // Attach event listeners to all sliders for real-time updates
        const sliderConfigs = [
            { id: 'monthly_bill', suffix: '₹', prefixSuffix: true },
            { id: 'unit_cost', suffix: '₹', prefixSuffix: true },
            { id: 'monthly_units', suffix: '' },
            { id: 'available_area', suffix: ' Sq.Ft' },
            { id: 'sanction_load', suffix: ' kVA' }
        ];

        sliderConfigs.forEach(config => {
            const slider = document.getElementById(config.id + '_slider');
            if (slider) {
                // Add input event for real-time sliding
                slider.addEventListener('input', function(e) {
                    syncSliderToInput(config.id, e.target.value, config.suffix, config.prefixSuffix);
                });
                
                // Initialize with current value
                syncSliderToInput(config.id, slider.value, config.suffix, config.prefixSuffix);
            }
        });
        
        // Set initial value for unit_cost
        syncSliderToInput('unit_cost', 6, '₹', true);
    });

    // Sync Slider to Input with Animation and Progress Bar
    function syncSliderToInput(inputId, value, suffix = '', isPrefixSuffix = false) {
        const input = document.getElementById(inputId);
        const display = document.getElementById(inputId + '_display');
        const slider = document.getElementById(inputId + '_slider');
        
        input.value = value;
        
        // Format value based on field
        let displayValue = value;
        if (inputId === 'unit_cost') {
            displayValue = parseFloat(value).toFixed(1);
        }
        
        // Apply prefix or suffix
        if (isPrefixSuffix || suffix.startsWith('₹')) {
            display.textContent = suffix + displayValue;
        } else {
            display.textContent = displayValue + suffix;
        }
        
        // Update slider progress bar (for webkit browsers)
        if (slider) {
            const min = parseFloat(slider.min) || 0;
            const max = parseFloat(slider.max) || 100;
            const percentage = ((value - min) / (max - min)) * 100;
            slider.style.background = `linear-gradient(to right, #ffb800 0%, #ff9500 ${percentage}%, #e9ecef ${percentage}%, #e9ecef 100%)`;
        }
        
        // Add animation class
        display.classList.add('updated');
        setTimeout(() => display.classList.remove('updated'), 300);
    }

    // Make functions global
    window.selectConsumer = selectConsumer;
    window.syncSliderToInput = syncSliderToInput;

    // Sync Input to Slider (for manual input)
    function syncInput(sliderId, inputId) {
        const slider = document.getElementById(sliderId);
        const input = document.getElementById(inputId);
        input.value = slider.value;
    }

    function syncSlider(inputId, sliderId) {
        const input = document.getElementById(inputId);
        const slider = document.getElementById(sliderId);
        slider.value = input.value;
    }

    window.syncInput = syncInput;
    window.syncSlider = syncSlider;

    window.calculateSolar = function() {
        // Inputs
        const consumerType = document.getElementById('consumer_type').value;
        const monthlyBill = parseFloat(document.getElementById('monthly_bill').value) || 0;
        const unitCost = parseFloat(document.getElementById('unit_cost').value) || 6;
        let monthlyUnits = parseFloat(document.getElementById('monthly_units').value) || 0;
        const installType = document.getElementById('installation_type').value;
        const availableArea = parseFloat(document.getElementById('available_area').value) || 0;
        const sanctionLoadKVA = parseFloat(document.getElementById('sanction_load').value) || 0;
        const years = parseInt(document.getElementById('savings_period').value) || 10;

        // Validation
        if (availableArea <= 0) {
            alert("Please enter a valid available area.");
            return;
        }

        // 1. Determine Monthly Units
        if (monthlyUnits === 0 && monthlyBill > 0) {
            monthlyUnits = monthlyBill / unitCost;
        }
        
        if (monthlyUnits <= 0) {
             alert("Please enter Monthly Bill or Monthly Units.");
             return;
        }

        // 2. Generation Factor
        let genFactor = 3.7; // RCC & Elevated
        if (installType === 'Sheet') {
            genFactor = 3.5;
        }

        // 3. Required kWp
        const requiredKWp = monthlyUnits / (genFactor * 30);

        // 4. Area Requirement & Max kWp
        let areaPerKWp = 100; // RCC
        if (installType === 'Sheet' || installType === 'Elevated') {
            areaPerKWp = 80;
        }
        const maxKWp = availableArea / areaPerKWp;

        // 6. Feasible kWp
        const feasibleKWp = Math.min(requiredKWp, maxKWp);

        // 7. Sanction Load Logic
        const sanctionLoadKW = sanctionLoadKVA * 0.85;
        
        // Update UI
        document.getElementById('initial-state').style.display = 'none';
        document.getElementById('results-container').style.display = 'block';

        // Display System Size
        document.getElementById('res_system_size').innerText = feasibleKWp.toFixed(2) + " kWp";

        // Savings Calculation logic stored for slider update
        window.currentFeasibleKWp = feasibleKWp;
        window.currentGenFactor = genFactor;
        window.currentUnitCost = unitCost;

        updateTotalSavings();

        // Advisory
        const advisory = document.getElementById('load_advisory');
        if (sanctionLoadKVA > 0 && feasibleKWp > sanctionLoadKW) {
            advisory.style.display = 'block';
            document.getElementById('advisory_load').innerText = feasibleKWp.toFixed(1);
        } else {
            advisory.style.display = 'none';
        }
    }

    window.updateTotalSavings = function() {
        if (!window.currentFeasibleKWp) return;

        const years = parseInt(document.getElementById('savings_period').value);
        document.getElementById('period_val').innerText = years + " Years";

        // Monthly Generation
        const monthlyGen = window.currentFeasibleKWp * window.currentGenFactor * 30;
        document.getElementById('res_monthly_gen').innerText = Math.round(monthlyGen) + " Units";

        // Monthly Savings
        const monthlySavings = monthlyGen * window.currentUnitCost;
        document.getElementById('res_monthly_savings').innerText = new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR', maximumFractionDigits: 0 }).format(monthlySavings);

        // Total Savings
        const totalSavings = monthlySavings * 12 * years;
        document.getElementById('res_total_savings').innerText = new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR', maximumFractionDigits: 0 }).format(totalSavings);
    }

    window.openSolarQuoteModal = function() {
        console.log('Opening Solar Quote Modal...');
        
        try {
            const getVal = (id) => {
                const el = document.getElementById(id);
                return el ? el.value : '';
            };
            
            const setVal = (id, val) => {
                const el = document.getElementById(id);
                if (el) el.value = val;
            };

            setVal('h_consumer_type', getVal('consumer_type'));
            setVal('h_installation_type', getVal('installation_type'));
            setVal('h_available_area', getVal('available_area'));
            setVal('h_unit_cost', getVal('unit_cost'));
            setVal('h_monthly_bill', getVal('monthly_bill'));
            
            let mUnits = getVal('monthly_units');
            if (!mUnits || mUnits == 0) {
                 const bill = parseFloat(getVal('monthly_bill')) || 0;
                 const cost = parseFloat(getVal('unit_cost')) || 6;
                 mUnits = cost > 0 ? Math.round(bill / cost) : 0;
            }
            setVal('h_monthly_units', mUnits);
            
            setVal('h_sanction_load', getVal('sanction_load'));
            setVal('h_selected_years', getVal('savings_period'));
            setVal('h_feasible_kwp', (window.currentFeasibleKWp || 0).toFixed(2));

            const monthlyGen = (window.currentFeasibleKWp || 0) * (window.currentGenFactor || 0) * 30;
            const monthlySavings = monthlyGen * (window.currentUnitCost || 0);
            const years = parseInt(getVal('savings_period') || '0');
            const totalSavings = monthlySavings * 12 * years;

            setVal('h_monthly_gen', Math.round(monthlyGen));
            setVal('h_monthly_savings', Math.round(monthlySavings));
            setVal('h_total_savings', Math.round(totalSavings));

            const sanctionLoadKVA = parseFloat(getVal('sanction_load')) || 0;
            const sanctionLoadKW = sanctionLoadKVA * 0.85;
            const advisoryNeeded = sanctionLoadKVA > 0 && (window.currentFeasibleKWp || 0) > sanctionLoadKW;
            setVal('h_advisory_required', advisoryNeeded ? 1 : 0);
            setVal('h_advisory_kw', (window.currentFeasibleKWp || 0).toFixed(1));
        } catch (err) {
            console.error('Error preparing modal data:', err);
        }

        const modalEl = document.getElementById('solarQuoteModal');
        if (!modalEl) {
            console.error('Modal element #solarQuoteModal not found');
            return;
        }

        modalEl.style.zIndex = '10000';
        
        try {
            if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                console.log('Using Bootstrap 5');
                const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
                modal.show();
            } 
            else if (typeof jQuery !== 'undefined' && jQuery(modalEl).modal) {
                 console.log('Using jQuery');
                 jQuery(modalEl).modal('show');
            } 
            else {
                 throw new Error('No framework found');
            }
        } catch (e) {
             console.log('Using Fallback', e);
             modalEl.classList.add('show');
             modalEl.style.display = 'block';
             modalEl.style.opacity = '1';
             document.body.classList.add('modal-open');
             
             let backdrop = document.querySelector('.custom-modal-backdrop');
             if (!backdrop) {
                 backdrop = document.createElement('div');
                 backdrop.className = 'modal-backdrop fade show custom-modal-backdrop';
                 backdrop.style.zIndex = '9999';
                 document.body.appendChild(backdrop);
                 
                 backdrop.addEventListener('click', function() {
                     window.closeSolarQuoteModal();
                 });
             }
        }
    }
    
    window.closeSolarQuoteModal = function() {
        const modalEl = document.getElementById('solarQuoteModal');
        if (!modalEl) return;

        try {
            if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                const modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();
            } else if (typeof jQuery !== 'undefined' && jQuery(modalEl).modal) {
                 jQuery(modalEl).modal('hide');
            }
        } catch (e) {
            console.warn('Error closing via framework:', e);
        }

        modalEl.classList.remove('show');
        modalEl.style.display = 'none';
        modalEl.style.opacity = '0';
        document.body.classList.remove('modal-open');
        const backdrop = document.querySelector('.custom-modal-backdrop');
        if (backdrop) backdrop.remove();
        
        const stdBackdrop = document.querySelector('.modal-backdrop:not(.custom-modal-backdrop)');
        if (stdBackdrop) stdBackdrop.remove();
    }
</script>

<!-- Modal Section (paste this at the end of your blade file) -->
<style>
    #solarQuoteModal .form-control {
        border: 1px solid #ced4da !important;
        background-color: #fff !important;
        padding: 10px 15px;
        font-size: 14px;
        color: #212529;
        border-radius: 6px;
    }
    #solarQuoteModal .form-control:focus {
        border-color: #667eea !important;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15) !important;
        outline: none;
    }
    #solarQuoteModal .form-control::placeholder {
        color: #adb5bd !important;
        opacity: 1;
    }
    #solarQuoteModal label {
        font-weight: 500;
        margin-bottom: 6px;
        color: #495057;
        font-size: 14px;
    }
</style>

<div class="modal fade" id="solarQuoteModal" tabindex="-1" aria-hidden="true" style="z-index: 1055;">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content" style="border-radius: 16px; overflow: hidden;">
      <div class="modal-header" style="border-bottom: none; padding: 24px 24px 0;">
        <h5 class="modal-title" style="font-weight: 700;">Request a Quote</h5>
        <button type="button" class="btn-close" onclick="window.closeSolarQuoteModal()" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="padding: 24px;">
        <form id="quote-form" action="{{ route('request.quote') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Name</label>
              <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" placeholder="Enter your email address" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Location</label>
              <input type="text" name="location" class="form-control" placeholder="City or Area" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Electric Bill (PDF/JPG/PNG)</label>
              <input type="file" name="bill" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
            </div>
            <div class="col-12 mb-3">
              <label class="form-label">Complete Address</label>
              <textarea name="address" class="form-control" rows="3" placeholder="Enter your complete installation address" required></textarea>
            </div>
          </div>

          <!-- Hidden calculation fields -->
          <input type="hidden" name="consumer_type" id="h_consumer_type">
          <input type="hidden" name="installation_type" id="h_installation_type">
          <input type="hidden" name="available_area" id="h_available_area">
          <input type="hidden" name="unit_cost" id="h_unit_cost">
          <input type="hidden" name="monthly_bill" id="h_monthly_bill">
          <input type="hidden" name="monthly_units" id="h_monthly_units">
          <input type="hidden" name="sanction_load" id="h_sanction_load">
          <input type="hidden" name="feasible_kwp" id="h_feasible_kwp">
          <input type="hidden" name="monthly_generation" id="h_monthly_gen">
          <input type="hidden" name="monthly_savings" id="h_monthly_savings">
          <input type="hidden" name="total_savings" id="h_total_savings">
          <input type="hidden" name="selected_years" id="h_selected_years">
          <input type="hidden" name="advisory_required" id="h_advisory_required">
          <input type="hidden" name="advisory_kw" id="h_advisory_kw">

          <div class="d-flex justify-content-end gap-2 mt-2">
            <button type="button" class="btn btn-light" onclick="window.closeSolarQuoteModal()">Cancel</button>
            <button type="submit" class="btn btn-primary" style="background: linear-gradient(135deg,#667eea,#764ba2); border: none;">Submit Request</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>