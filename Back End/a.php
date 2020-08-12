<?php
$all = [];
for ($i = 9; $i <= 18; $i++) {
    $all[] = $i . ':00';
}

$del = ['s' => '14:00', 'e' => '16:00'];

echo '<pre>';
$all = a($all, $del);
echo '</pre>';

$del = ['s' => '10:00', 'e' => '12:00'];

echo '<pre>';
print_r(a($all, $del));
echo '</pre>';
function a($all = [], $del = [])
{
    $del['s'] = explode(':', $del['s'])[0];
    $del['e'] = explode(':', $del['e'])[0];
    $sub = $del['e'] - $del['s']; //時間總長

    $left = [];
    for ($i = 0; $i < $sub; $i++) {
        $left[] = $del['s'] + $i . ':00';
        print_r( $left );
    }

    foreach ($all as $i => $hour) {
        if (in_array($hour, $left)) {
            unset($all[$i]);
        }
    }
    return $all;
}