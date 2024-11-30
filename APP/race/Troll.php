<?php

class Troll extends Race {
    public function __construct() {
        parent::__construct("Troll", [
            'pv' => 40,
            'endurance' => 20,
            'mana' => 0,
            'force' => 25,
            'constitution' => 15,
            'agilite' => -5,
            'precision' => 5,
            'intelligence' => 5,
            'resistance' => 30
        ]);
    }
}