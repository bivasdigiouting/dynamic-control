<style>
    .tp-process-section {
        padding: 100px 0;
        background: #f5f5f5;
        position: relative;
    }

    .container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Header */
    .tp-process-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .tp-process-main-title {
        font-size: 38px;
        font-weight: 400;
        color: #1a1a1a;
        margin-bottom: 10px;
        line-height: 1.2;
    }

    .tp-process-main-title .highlight {
        color: #8B0000;
        font-weight: 700;
    }

    .tp-process-subtitle {
        font-size: 28px;
        font-weight: 600;
        color: #1a1a1a;
        margin-bottom: 25px;
    }

    .tp-process-description {
        font-size: 15px;
        color: #666;
        max-width: 900px;
        margin: 0 auto;
        line-height: 1.8;
    }

    /* Workflow Container */
    .tp-workflow-row {
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        padding: 0 40px;
    }

    /* Process Step */
    .tp-process-step {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 180px;
    }

    /* Top Label */
    .tp-step-label-top {
        min-height: 50px;
        display: flex;
        align-items: flex-end;
        justify-content: center;
        text-align: center;
        margin-bottom: 20px;
        position: relative;
    }

    .tp-step-label-top span {
        font-size: 15px;
        font-weight: 600;
        color: #1a1a1a;
        line-height: 1.3;
        max-width: 160px;
    }

    /* Arrow Down from Top Label */
    .tp-arrow-down {
        position: absolute;
        bottom: -20px;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 0;
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-top: 10px solid #999;
    }

    .tp-arrow-down::before {
        content: '';
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
        width: 2px;
        height: 12px;
        background: repeating-linear-gradient(
            to bottom,
            #999 0,
            #999 4px,
            transparent 4px,
            transparent 8px
        );
    }

    /* Circle with Double Ring */
    .tp-circle-container {
        position: relative;
        margin-bottom: 20px;
    }

    .tp-circle-outer {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        border: 3px solid #ccc;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        background: transparent;
    }

    .tp-circle-inner {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: #f8f8f8;
        border: 3px solid #ccc;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .tp-process-step:hover .tp-circle-inner {
        background: linear-gradient(135deg, #ffb800 0%, #ff9500 100%);
        border-color: #ffb800;
        transform: scale(1.05);
        box-shadow: 0 10px 30px rgba(255, 184, 0, 0.3);
    }

    .tp-process-step:hover .tp-circle-outer {
        border-color: #ffb800;
    }

    .tp-circle-inner.active {
        background: linear-gradient(135deg, #ffb800 0%, #ff9500 100%);
        border-color: #ffb800;
    }

    .tp-circle-outer.active {
        border-color: #ffb800;
    }

    .tp-process-icon {
        font-size: 36px;
        color: #333;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .tp-process-step:hover .tp-process-icon {
        color: white;
        transform: scale(1.25);
    }

    .tp-circle-inner.active .tp-process-icon {
        color: white;
    }

    /* Curved Arrow Between Circles */
    .tp-curved-arrow {
        position: absolute;
        top: 50%;
        right: -45px;
        transform: translateY(-50%);
        width: 90px;
        height: 80px;
        z-index: 1;
    }

    .tp-curved-arrow svg {
        width: 100%;
        height: 100%;
        overflow: visible;
    }

    .tp-curved-arrow.down {
        top: 50%;
    }

    .tp-curved-arrow.up {
        top: 50%;
    }

    /* Arrow Up from Bottom Label */
    .tp-arrow-up {
        position: absolute;
        top: -32px;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 0;
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-bottom: 10px solid #999;
    }

    .tp-arrow-up::before {
        content: '';
        position: absolute;
        top: 10px;
        left: 50%;
        transform: translateX(-50%);
        width: 2px;
        height: 12px;
        background: repeating-linear-gradient(
            to bottom,
            #999 0,
            #999 4px,
            transparent 4px,
            transparent 8px
        );
    }

    /* Bottom Label */
    .tp-step-label-bottom {
        min-height: 50px;
        display: flex;
        align-items: flex-start;
        justify-content: center;
        text-align: center;
        margin-top: 20px;
        position: relative;
    }

    .tp-step-label-bottom span {
        font-size: 15px;
        font-weight: 600;
        color: #1a1a1a;
        line-height: 1.3;
        max-width: 160px;
    }

    /* Feature Box */
    .tp-feature-box {
        background: linear-gradient(135deg, #ffb800 0%, #ff9500 100%);
        color: white;
        padding: 20px 18px;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(255, 184, 0, 0.3);
        max-width: 240px;
        margin: 0 auto;
    }

    .tp-feature-box h4 {
        font-size: 14px;
        font-weight: 600;
        line-height: 1.5;
        margin: 0;
    }

    /* Special positioning for feature step */
    .tp-process-step.feature-step .tp-step-label-top {
        min-height: 130px;
        margin-bottom: 20px;
        align-items: center;
    }

    .tp-process-step.feature-step .tp-step-label-bottom {
        margin-top: 20px;
    }

    /* Responsive */
    @media (max-width: 1400px) {
        .tp-workflow-row {
            overflow-x: auto;
            justify-content: flex-start;
            padding-bottom: 20px;
        }
        
        .tp-process-step {
            flex-shrink: 0;
        }
    }

    @media (max-width: 768px) {
        .tp-process-section {
            padding: 60px 0;
        }

        .tp-process-main-title {
            font-size: 28px;
        }

        .tp-process-subtitle {
            font-size: 22px;
        }

        .tp-workflow-row {
            flex-direction: column;
            gap: 60px;
            padding: 0 20px;
        }

        .tp-process-step {
            width: 100%;
            max-width: 300px;
        }

        .tp-curved-arrow {
            display: none;
        }
    }
</style>

<section class="tp-process-section">
    <div class="container">
        <!-- Header -->
        <div class="tp-process-header">
            <h2 class="tp-process-main-title">
                From Vision to <span class="highlight">Reality</span>
            </h2>
            <h3 class="tp-process-subtitle">
                Seamless Processes, Exceptional Outcomes
            </h3>
            <p class="tp-process-description">
                At every step, we prioritize precision, transparency, and customer satisfaction. From enquiry to delivery, our meticulous process ensures reliable solutions tailored to your needs.
            </p>
        </div>

        <!-- Workflow -->
        <div class="tp-workflow-row">
            <!-- Step 1: Initial Enquiry -->
            <div class="tp-process-step">
                <div class="tp-step-label-top"></div>
                <div class="tp-circle-container">
                    <div class="tp-circle-outer">
                        <div class="tp-circle-inner">
                            <i class="fas fa-phone tp-process-icon"></i>
                        </div>
                    </div>
                    <div class="tp-curved-arrow down">
                        <svg viewBox="0 0 90 80" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <marker id="arrowhead1" markerWidth="10" markerHeight="10" refX="9" refY="3" orient="auto">
                                    <polygon points="0 0, 10 3, 0 6" fill="#999" />
                                </marker>
                            </defs>
                            <path d="M 5 25 Q 45 5, 85 40" stroke="#999" stroke-width="2" fill="none" 
                                  stroke-dasharray="5,5" marker-end="url(#arrowhead1)" />
                        </svg>
                    </div>
                </div>
                <div class="tp-step-label-bottom">
                    <div class="tp-arrow-up"></div>
                    <span>Initial Enquiry</span>
                </div>
            </div>

            <!-- Step 2: Order Confirmation -->
            <div class="tp-process-step">
                <div class="tp-step-label-top">
                    <div class="tp-arrow-down"></div>
                    <span>Order Confirmation</span>
                </div>
                <div class="tp-circle-container">
                    <div class="tp-circle-outer">
                        <div class="tp-circle-inner">
                            <i class="fas fa-users tp-process-icon"></i>
                        </div>
                    </div>
                    <div class="tp-curved-arrow up">
                        <svg viewBox="0 0 90 80" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <marker id="arrowhead2" markerWidth="10" markerHeight="10" refX="9" refY="3" orient="auto">
                                    <polygon points="0 0, 10 3, 0 6" fill="#999" />
                                </marker>
                            </defs>
                            <path d="M 5 55 Q 45 75, 85 40" stroke="#999" stroke-width="2" fill="none" 
                                  stroke-dasharray="5,5" marker-end="url(#arrowhead2)" />
                        </svg>
                    </div>
                </div>
                <div class="tp-step-label-bottom"></div>
            </div>

            <!-- Step 3: Technical Drawings -->
            <div class="tp-process-step">
                <div class="tp-step-label-top"></div>
                <div class="tp-circle-container">
                    <div class="tp-circle-outer">
                        <div class="tp-circle-inner">
                            <i class="fas fa-cube tp-process-icon"></i>
                        </div>
                    </div>
                    <div class="tp-curved-arrow down">
                        <svg viewBox="0 0 90 80" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <marker id="arrowhead3" markerWidth="10" markerHeight="10" refX="9" refY="3" orient="auto">
                                    <polygon points="0 0, 10 3, 0 6" fill="#999" />
                                </marker>
                            </defs>
                            <path d="M 5 25 Q 45 5, 85 40" stroke="#999" stroke-width="2" fill="none" 
                                  stroke-dasharray="5,5" marker-end="url(#arrowhead3)" />
                        </svg>
                    </div>
                </div>
                <div class="tp-step-label-bottom">
                    <div class="tp-arrow-up"></div>
                    <span>Technical Drawings</span>
                </div>
            </div>

            <!-- Step 4: Production Initiation -->
            <div class="tp-process-step">
                <div class="tp-step-label-top">
                    <div class="tp-arrow-down"></div>
                    <span>Production Initiation</span>
                </div>
                <div class="tp-circle-container">
                    <div class="tp-circle-outer">
                        <div class="tp-circle-inner">
                            <i class="fas fa-rocket tp-process-icon"></i>
                        </div>
                    </div>
                    <div class="tp-curved-arrow up">
                        <svg viewBox="0 0 90 80" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <marker id="arrowhead4" markerWidth="10" markerHeight="10" refX="9" refY="3" orient="auto">
                                    <polygon points="0 0, 10 3, 0 6" fill="#999" />
                                </marker>
                            </defs>
                            <path d="M 5 55 Q 45 75, 85 40" stroke="#999" stroke-width="2" fill="none" 
                                  stroke-dasharray="5,5" marker-end="url(#arrowhead4)" />
                        </svg>
                    </div>
                </div>
                <div class="tp-step-label-bottom"></div>
            </div>

            <!-- Step 5: Quality Check -->
            <div class="tp-process-step">
                <div class="tp-step-label-top"></div>
                <div class="tp-circle-container">
                    <div class="tp-circle-outer">
                        <div class="tp-circle-inner">
                            <i class="fas fa-check-circle tp-process-icon"></i>
                        </div>
                    </div>
                    <div class="tp-curved-arrow down">
                        <svg viewBox="0 0 90 80" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <marker id="arrowhead5" markerWidth="10" markerHeight="10" refX="9" refY="3" orient="auto">
                                    <polygon points="0 0, 10 3, 0 6" fill="#999" />
                                </marker>
                            </defs>
                            <path d="M 5 25 Q 45 5, 85 40" stroke="#999" stroke-width="2" fill="none" 
                                  stroke-dasharray="5,5" marker-end="url(#arrowhead5)" />
                        </svg>
                    </div>
                </div>
                <div class="tp-step-label-bottom">
                    <div class="tp-arrow-up"></div>
                    <span>Quality Check</span>
                </div>
            </div>

            <!-- Step 6: Customer Inspection -->
            <div class="tp-process-step">
                <div class="tp-step-label-top">
                    <div class="tp-arrow-down"></div>
                    <span>Customer Inspection</span>
                </div>
                <div class="tp-circle-container">
                    <div class="tp-circle-outer">
                        <div class="tp-circle-inner">
                            <i class="fas fa-eye tp-process-icon"></i>
                        </div>
                    </div>
                    <div class="tp-curved-arrow up">
                        <svg viewBox="0 0 90 80" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <marker id="arrowhead6" markerWidth="10" markerHeight="10" refX="9" refY="3" orient="auto">
                                    <polygon points="0 0, 10 3, 0 6" fill="#999" />
                                </marker>
                            </defs>
                            <path d="M 5 55 Q 45 75, 85 40" stroke="#999" stroke-width="2" fill="none" 
                                  stroke-dasharray="5,5" marker-end="url(#arrowhead6)" />
                        </svg>
                    </div>
                </div>
                <div class="tp-step-label-bottom"></div>
            </div>

            <!-- Step 7: Packaging & Shipment -->
            <div class="tp-process-step">
                <div class="tp-step-label-top"></div>
                <div class="tp-circle-container">
                    <div class="tp-circle-outer">
                        <div class="tp-circle-inner">
                            <i class="fas fa-truck tp-process-icon"></i>
                        </div>
                    </div>
                    <div class="tp-curved-arrow down">
                        <svg viewBox="0 0 90 80" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <marker id="arrowhead7" markerWidth="10" markerHeight="10" refX="9" refY="3" orient="auto">
                                    <polygon points="0 0, 10 3, 0 6" fill="#999" />
                                </marker>
                            </defs>
                            <path d="M 5 25 Q 45 5, 85 40" stroke="#999" stroke-width="2" fill="none" 
                                  stroke-dasharray="5,5" marker-end="url(#arrowhead7)" />
                        </svg>
                    </div>
                </div>
                <div class="tp-step-label-bottom">
                    <div class="tp-arrow-up"></div>
                    <span>Packaging & Shipment</span>
                </div>
            </div>

            <!-- Step 8: Post-Delivery Support (Active/Featured) -->
            <div class="tp-process-step feature-step">
                <div class="tp-step-label-top">
                    <div class="tp-feature-box">
                        <h4>Secure and meticulous packaging ensures products arrive in perfect condition.</h4>
                    </div>
                </div>
                <div class="tp-circle-container">
                    <div class="tp-circle-outer active">
                        <div class="tp-circle-inner active">
                            <i class="fas fa-headset tp-process-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="tp-step-label-bottom">
                    <div class="tp-arrow-up"></div>
                    <span>Post-Delivery Support</span>
                </div>
            </div>
        </div>
    </div>
</section>