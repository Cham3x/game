<?php
class Orc extends Race {
    public function __construct() {
        parent::__construct("Orc", [
            'pv' => 3044,
            'endurance' => 15,
            'mana' => 0,
            'force' => 20,
            'constitution' => 10,
            'agilite' => 5,
            'precision' => 5,
            'intelligence' => 5,
            'resistance' => 25
        ]);
    }
}