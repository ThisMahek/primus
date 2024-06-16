<?php
function calculateTotalMonthsAndConvert() {
    $ci =& get_instance();
    // Initialize total months and total years
    $totalMonths = 0;
    $totalYears = 0;
    $user_id = $ci->session->userdata('user_id');
    $data =  $ci->UM->get_data('tbl_experience', '1', $user_id);
    // Check if $data is empty
    if (empty($data)) {
        echo "0";
        return;
    }
    // Calculate total months and years
    foreach ($data as $row) {
        // Split the string to extract months and years
        list($monthsStr, $yearsStr) = explode(' : ', $row->total);
        // Extract months and years
        $months = (int) trim($monthsStr);
        $years = (int) trim($yearsStr);
        // Aggregate total months and total years
        $totalMonths += $months;
        $totalYears += $years;
    }

    // Convert total months into years and months
    $yearsFromMonths = floor($totalMonths / 12);
    $monthsRemainder = $totalMonths % 12;
    // Add the years calculated from total years
    $yearsFromMonths += $totalYears;
    if ($yearsFromMonths > 0) {
        echo $yearsFromMonths . " year" . ($yearsFromMonths > 1 ? "s" : "");
        if ($monthsRemainder > 0) {
            echo " and ";
        }
    }
    if ($monthsRemainder > 0) {
        echo $monthsRemainder . " month" . ($monthsRemainder > 1 ? "s" : "");
    }
    echo "<br>";
}

// Example usage
//calculateTotalMonthsAndConvert();
?>
