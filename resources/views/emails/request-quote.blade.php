<div style="font-family: Arial, Helvetica, sans-serif; color:#222;">
  <h2 style="margin-bottom:10px;">New Solar Quote Request</h2>
  <p style="margin-top:0;">A customer has submitted a quote request with the following details.</p>

  <h3 style="margin:20px 0 8px;">Customer Details</h3>
  <ul style="list-style:none; padding:0; margin:0 0 16px;">
    <li><strong>Name:</strong> {{ $name ?? '' }}</li>
    <li><strong>Email:</strong> {{ $email ?? '' }}</li>
    <li><strong>Location:</strong> {{ $location ?? '' }}</li>
    <li><strong>Address:</strong> {{ $address ?? '' }}</li>
  </ul>

  <h3 style="margin:20px 0 8px;">System Inputs</h3>
  <table cellpadding="6" cellspacing="0" style="border-collapse:collapse;border:1px solid #ddd; width:100%; margin-bottom:16px;">
    <tr><td style="border:1px solid #ddd;">Consumer Type</td><td style="border:1px solid #ddd;">{{ $consumer_type ?? '-' }}</td></tr>
    <tr><td style="border:1px solid #ddd;">Installation Type</td><td style="border:1px solid #ddd;">{{ $installation_type ?? '-' }}</td></tr>
    <tr><td style="border:1px solid #ddd;">Available Area (sq.ft)</td><td style="border:1px solid #ddd;">{{ $available_area ?? '-' }}</td></tr>
    <tr><td style="border:1px solid #ddd;">Unit Cost (₹/kWh)</td><td style="border:1px solid #ddd;">{{ $unit_cost ?? '-' }}</td></tr>
    <tr><td style="border:1px solid #ddd;">Monthly Bill (₹)</td><td style="border:1px solid #ddd;">{{ $monthly_bill ?? '-' }}</td></tr>
    <tr><td style="border:1px solid #ddd;">Monthly Units</td><td style="border:1px solid #ddd;">{{ $monthly_units ?? '-' }}</td></tr>
    <tr><td style="border:1px solid #ddd;">Sanction Load (kVA)</td><td style="border:1px solid #ddd;">{{ $sanction_load ?? '-' }}</td></tr>
  </table>

  <h3 style="margin:20px 0 8px;">Calculated Summary</h3>
  <table cellpadding="6" cellspacing="0" style="border-collapse:collapse;border:1px solid #ddd; width:100%; margin-bottom:16px;">
    <tr><td style="border:1px solid #ddd;">Feasible System Size (kWp)</td><td style="border:1px solid #ddd;">{{ $feasible_kwp ?? '-' }}</td></tr>
    <tr><td style="border:1px solid #ddd;">Monthly Generation (Units)</td><td style="border:1px solid #ddd;">{{ $monthly_generation ?? '-' }}</td></tr>
    <tr><td style="border:1px solid #ddd;">Monthly Savings (₹)</td><td style="border:1px solid #ddd;">{{ $monthly_savings ?? '-' }}</td></tr>
    <tr><td style="border:1px solid #ddd;">Total Savings (₹)</td><td style="border:1px solid #ddd;">{{ $total_savings ?? '-' }}</td></tr>
    <tr><td style="border:1px solid #ddd;">Selected Years</td><td style="border:1px solid #ddd;">{{ $selected_years ?? '-' }}</td></tr>
    <tr><td style="border:1px solid #ddd;">Load Advisory Required</td><td style="border:1px solid #ddd;">{{ (isset($advisory_required) && $advisory_required) ? 'Yes' : 'No' }}</td></tr>
    @if(!empty($advisory_kw))
    <tr><td style="border:1px solid #ddd;">Advisory kW</td><td style="border:1px solid #ddd;">{{ $advisory_kw }}</td></tr>
    @endif
  </table>

  <p style="margin-top:20px;">The customer's electric bill (if uploaded) is attached to this email.</p>
</div>
