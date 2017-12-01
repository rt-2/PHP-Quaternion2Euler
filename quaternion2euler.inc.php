//
//  PHP-Quaternion2Euler
//      By: rt-2
//      Created: 2017/11/30
//      Url: https://github.com/rt-2/PHP-Quaternion2Euler
//
function Quaternion2Euler($x, $y, $z, $w) {

    $heading = 0;
    $attitude = 0;
    $bank = 0;

    $qw = (float)$w;
    $qx = (float)$x;
    $qy = (float)$y;
    $qz = (float)$z;

    $test= $qx*$qy + $qz*$qw;

    $qw2 = $qw*$qw;
    $qx2 = $qx*$qx;
    $qy2 = $qy*$qy;
    $qz2 = $qz*$qz;

    if ($test > 0.499) {
      $heading = 360 / pi() * atan2($qx,$qw);
      $attitude = 90;
      $bank = 0;
    }
    elseif ($test < -0.499) {
      $heading = -360 / pi() * atan2($qx,$qw);
      $attitude = -90;
      $bank = 0;
    }
    else{
        $h = atan2( 2*$qy*$qw-2*$qx*$qz , 1 - 2 * $qy2-2*$qz2 );
        $a = asin( 2*$qx*$qy + 2*$qz*$qw );
        $b = atan2( 2*$qx*$qw-2*$qy*$qz , 1-2*$qx2-2*$qz2 );
        $heading = $h * 180 / pi();
        $attitude = $a * 180 / pi();
        $bank = $b * 180 / pi();
    }

    return (object)[
      'x' => $bank,
      'y' => $attitude,
      'z' => $heading
    ];

}
