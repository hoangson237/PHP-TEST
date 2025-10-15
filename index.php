<?php
function countVietnameseTelex($input): int {
    // cac mau to hop tao chu co dau
    $patterns = ['aw', 'aa', 'dd', 'ee', 'oo', 'ow'];
    $count = 0;

    // dem so lan no xhien
    foreach ($patterns as $pattern) {
        $pos = 0;
        while (($pos = strpos($input, $pattern, $pos)) !== false) {
            $count++;
            $pos += strlen($pattern);
        }
    }

    // Cuoi cung, dem cac ky tu 'w' con lai (tuong ung voi 'u')
    $temp = $input;
    foreach ($patterns as $pattern) {
        $temp = str_replace($pattern, '', $temp);
    }

    // dem so w con lai
    $count += substr_count($temp, 'w');

    return $count;
}

// chay thu
$input = "hwfdawhwhcoomddfgwdc";
echo "Input: " . $input . PHP_EOL;
echo "Output: " . countVietnameseTelex($input);
?>
