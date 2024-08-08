<?php
function calculateTotalMonthsAndConvert($user_id) {
    $ci =& get_instance();
    // Initialize total months and total years
    $totalMonths = 0;
    $totalYears = 0;

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
    $totalMonths += $totalYears * 12;  // Convert years to months and add to totalMonths
    $totalYears = floor($totalMonths / 12);  // Calculate total years
    $monthsRemainder = $totalMonths % 12;  // Calculate remaining months

    // Build the result string
    if ($totalYears > 0) {
        if ($monthsRemainder > 0) {
            $decimalYears = $totalYears + ($monthsRemainder / 12);
            echo round($decimalYears, 1) ;
        } else {
            echo $totalYears ;
        }
    } else {
        echo ".". $monthsRemainder  . ($monthsRemainder > 1 ? "" : "");
    }
    
    echo "<br>";
}
if (!function_exists('generate_slug')) {
    function generate_slug($first_name, $last_name, $user_id) {
        $string = $first_name . ' ' . $last_name . ' ' . $user_id;
        $slug = strtolower($string);
        $slug = preg_replace('/[^a-z0-9]/', '', $slug);
        return $slug;
    }
}
function ensureHttps($url=null) {
    
    if (empty($url) || strpos($url, '#') !== false) {
        return null; // or handle it in a way that fits your needs
    }
   if (strpos($url, 'https://') === 0) {
        return $url; 
    }
    if (strpos($url, 'http://') === 0) {
        return 'https://' . substr($url, 7);
    }
    return 'https://' . $url;
}
// Example usage
// calculateTotalMonthsAndConvert(1);
?>
