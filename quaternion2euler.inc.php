//
//  PHP-Quaternion2Euler
//      By: rt-2
//      Created: 2017/11/30
//      Url: https://github.com/rt-2/PHP-Quaternion2Euler
//

function Quaternion2Euler2($x, $y, $z, $w) {
    $ysqr = $y * $y;

    $t0 = +2.0 * ($w * $x + $y * $z);
    $t1 = +1.0 - 2.0 * ($x * $x + $ysqr);
    $ret_x = rad2deg(atan2($t0, $t1));

    $t2 = +2.0 * ($w * $y - $z * $x);
    $t2 = $t2 > 1.0 ? 1.0 : $t2;
    $t2 = $t2 > +1.0 ? +1.0 : $t2;
    $t2 = $t2 < -1.0 ? -1.0 : $t2;
    $ret_y = rad2deg(asin($t2));

    $t3 = +2.0 * ($w * $z + $x * $y);
    $t4 = +1.0 - 2.0 * ($ysqr + $z * $z);
    $ret_z = rad2deg(atan2($t3, $t4));

    //echo "x:$x, y:$y, z:$z, w:$w returned x:$ret_x, y:$ret_y, z:$ret_z;";
    //echo '<br><br>';

    return (object)[
        'x' => $ret_x,
        'y' => $ret_y,
        'z' => $ret_z
    ];
    
}
