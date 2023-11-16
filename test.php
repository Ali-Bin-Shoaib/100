<?php
// $arr = ['X', 'O', 'X', 'X', 'O', 'O', 'X', '', ''];
$arr = [['X', 'O', 'X'], ['X', 'X', 'O'], ['', '', 'X']];

for ($i = 0; $i < count($arr); $i++) {
    echo '//&nbsp;';
    for ($j = 0; $j < count($arr[$i]); $j++) {
        echo  '&nbsp;' . ($arr[$i][$j] == "X" || $arr[$i][$j] == "O" ? $arr[$i][$j] : '&nbsp&nbsp&nbsp') . '&nbsp;';
    }
    echo '<br>';
}
$x = 'x';
$y = 'y';
echo str_replace(['a', 'b'], [$x, $y], 'aabb');
?>
<table>
    <tr>
        <th>name</th>
        <th>level</th>
    </tr>
    <?php $students = ['ali' => '1st', 'ahmed' => '1st', 'hamza' => '2st'];

    foreach ($students as $key => $value) {

    ?>
        <tr>
            <td><?php echo $key ?></td>
            <td><?php echo $value ?></td>
        </tr>
    <?php } ?>
</table>