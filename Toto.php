<?php

/*
  function fact($n) {
  $fact = 1;
  for($i = 1; $i <= $n; ++$i) {
  $fact *= $i;
  }
  return $fact;
  }
 */

function fact($n) {
  if($n < 0) {
    throw new InvalidArgumentException('Number cannot be less than zero (0)');
  }
  if($n === 0) {
    return 1;
  }
  return $n * fact($n - 1);
}

function comb($n, $k) {
  $comb = fact($n) / (fact($k) * fact(($n - $k)));
  return $comb;
}

function rec($arr, $n) {
  $count = count($arr);
  $j = 0;
  while($j < $count - 1) {
    for($i = 0; $i < $count - 1; $i++) {
      if($arr[$i] > $arr[$i + 1]) {
        $temp = $arr[$i];
        $arr[$i] = $arr[$i + 1];
        $arr[$i + 1] = $temp;
      }
    }
    $j++;
  }
//  var_dump($arr);
  for($i = 0; $i < $count; $i++) {
    if($i === ($count - 1)) {
      if($arr[$i] === $arr[0]) {
//        var_dump($n);
        $arr[$i] += rand(1, $n);
        return rec($arr, $n);
      }
    } elseif($arr[$i] === $arr[$i + 1]) {
//      var_dump($n);
      $arr[$i] += rand(1, $n);
      return rec($arr, $n);
    }
  }
  return $arr;
}

function gen($n, $k) {
  $rands = array();
  for($i = 1; $i <= $k; ++$i) {
//    var_dump($n);
    $rands[] = rand(1, $n);
  }
  $rands = rec($rands, $n);
  asort($rands);
  return implode(' ', $rands);
//  return $rands;
}

//$use = comb(35, 5);
//print 'Chance to win of 5/35 is 1 to ' . $use . ' (1/' . $use . ') !<br>';
//
//$use = comb(42, 6);
//print 'Chance to win of 6/42 is 1 to ' . $use . ' (1/' . $use . ') !<br>';
//
//$use = comb(47, 6);
//print 'Chance to win of 6/47 is 1 to ' . $use . ' (1/' . $use . ') !<br>';
//
//$use = comb(49, 6);
//print 'Chance to win of 6/49 is 1 to ' . $use . ' (1/' . $use . ') !<br>';
//
//$random = gen(35, 5);
//print 'Random generate numbers for 5/35: <b>' . $random . '</b> !<br>';
//
//$random = gen(42, 6);
//print 'Random generate numbers for 6/42: <b>' . $random . '</b> !<br>';
//
//$random = gen(47, 6);
//print 'Random generate numbers for 6/47: <b>' . $random . '</b> !<br>';
//$random = gen(49, 6);
//print 'Random generate numbers for 6/49: <b>' . $random . '</b> !<br>';

$result = array();

for($i = 0; $i < 4; ++$i) {
  $result['use35'][$i][] = gen(35, 5);
  $result['use35'][$i][] = gen(42, 6);
  $result['use35'][$i][] = gen(47, 6);
  $result['use35'][$i][] = gen(49, 6);
}

$result['chance35'] = comb(35, 5); 
$result['chance42'] = comb(42, 6); 
$result['chance47'] = comb(47, 6); 
$result['chance49'] = comb(49, 6); 

//print json_encode($random);
print json_encode($result);
