<?php

function redirect($path = '/') {
    header(sprintf('Location: %s', $path));
    exit;
}

function setSession($key, $value) {
    $_SESSION[$key] = $value;
}

function initSession() {
    if (!array_key_exists('stack', $_SESSION)) {
        setSession('stack', []);
    }

    if (!array_key_exists('queue', $_SESSION)) {
        setSession('queue', []);
    }

    if (!array_key_exists('binTree', $_SESSION)) {
        setSession('binTree', []);
    }
}

function addElementToStack($value) {
    $stack = $_SESSION['stack'];

    if (empty($stack)) {
        $stack = [
            'value' => $value,
            'down' => null,
        ];
    } else {
        $newStack = [
            'value' => $value,
            'down' => $stack,
        ];

        $stack = $newStack;
    }

    setSession('stack', $stack);
}

function getElementFromStack()
{
    $stack = $_SESSION['stack'];

    if (empty($stack)) {
        return null;
    }

    $value = $stack['value'];
    $newStack = $stack['down'];

    setSession('stack', $newStack);

    return $value;
}



function addElementToBinTree($value) {
    $binTree = $_SESSION['binTree'];

    if (empty($binTree)) {
        $binTree = [
            'value' => $value,
            'left' => null,
            'right' => null,
        ];
    } else {
        addToPoint($binTree, $value);
    }
    setSession('binTree', $binTree);
}


function addToPoint(&$binTree, $value) {
    if ($binTree['value'] > $value){
        if (empty($binTree['left'])){
            $binTree['left'] = [
                'value' => $value,
                'left' => null,
                'right' => null,
            ];
        } else {
            addToPoint($binTree['left'], $value);
        }
    }

    if ($binTree['value'] < $value){
        if (empty($binTree['right'])) {
            $binTree['right'] = [
                'value' => $value,
                'left' => null,
                'right' => null,
            ];
        } else {
             addToPoint($binTree['right'], $value);
        }
    }

}