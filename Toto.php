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

  for($i = 0; $i < $count; $i++) {
    if($i === ($count - 1)) {
      if($arr[$i] === $arr[0]) {
        $arr[$i] = rand(1, $n);
        return rec($arr, $n);
      }
    } elseif($arr[$i] === $arr[$i + 1]) {
      $arr[$i] = rand(1, $n);
      return rec($arr, $n);
    }
  }
  return $arr;
}

function gen($n, $k) {
  $rands = array();
  for($i = 1; $i <= $k; ++$i) {
    $rands[] = rand(1, $n);
  }
  $rands = rec($rands, $n);
  asort($rands);
  return implode(' ', $rands);
}

$result = array();

for($i = 0; $i < 4; ++$i) {
  $result['use35'][$i][] = gen(35, 5);
  $result['use35'][$i][] = gen(42, 6);
  $result['use35'][$i][] = gen(47, 6);
  $result['use35'][$i][] = gen(49, 6);
}

//$result['chance35'] = comb(35, 5); 
//$result['chance42'] = comb(42, 6); 
//$result['chance47'] = comb(47, 6); 
//$result['chance49'] = comb(49, 6); 

print json_encode($result);
