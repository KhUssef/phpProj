<?php
$filters =
    $query = "select * from jobs where 1 and ";
$addid = false;
$poss_exp = array();
$filters = array_slice($_GET, 1, count($_GET));
foreach ($filters as $filter) {
    $temp = strtolower(trim(substr($filter, strpos($filter, ':') + 1, strlen($filter))));
    $exp = strtolower(trim(substr($filter, 0, strpos($filter, ':'))));
    if ($exp != 'description' && $exp != 'price') {
        $addid = true;
        $exps = new expRep();
        $exp = " name = '" . $exp . "' and ";
        if (strpos($temp, 'and')) {
            $exp = $exp . "(years " . substr($temp, 0, strpos($temp, 'and') + 3) . " years " . substr($temp, strpos($temp, 'and') + 3, strlen($temp)) . ')';
        } else if (strpos($temp, 'or')) {
            $exp = $exp . '(years ' . substr($temp, 0, strpos($temp, 'or') + 2) . ' years ' . substr($temp, strpos($temp, 'or') + 3, strlen($temp)) . ')';
        } else {
            $exp = $exp . 'years ' . ' ' . $temp;
        }
        $getids = $exps->getids($exp);
        foreach ($getids as $id) {
            array_push($poss_exp, $id->id);
        }
    } else if ($exp == 'description') {
        $query = $query . " description like '%{$temp}%' and ";
    } else {
        if (strpos($temp, 'and')) {
            $exp = "(price " . substr($temp, 0, strpos($temp, 'and')) . ' and ' . " price " . substr($temp, strpos($temp, 'and') + 3, strlen($temp)) . ')';
        } else if (strpos($temp, 'or')) {
            $exp = '(price ' . substr($temp, 0, strpos($temp, 'or')) . ' and ' . ' price ' . substr($temp, strpos($temp, 'or') + 3, strlen($temp)) . ')';
        } else {
            $exp = 'price ' . ' ' . $temp;
        }
        $query = $query . $exp . " and ";
    }
}
if ($addid) {
    if (count($poss_exp) == 0) {
        return null;
    } else {
        $temp2 = "(";
        foreach ($poss_exp as $id) {
            $temp2 = $temp2 . $id . ', ';
        }
        $temp2 = substr($temp2, 0, strlen($temp2) - 2) . ')';
        $query = $query . "req1 in " . $temp2 . " and req2 in " . $temp2 . " and ";
    }
}
$query = $query . ' 1 limit 15;';
$query = strtolower($query);
var_dump($query);