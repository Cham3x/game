<?php
class Berserker extends Role {
    public function __construct() {
        parent::__construct("Berserker", [
            'pv' => 25,
            'endurance' => 15,
            'mana' => 0,
            'force' => 20,
            'constitution' => 15,
            'agilite' => 5,
            'precision' => 5,
            'intelligence' => 5,
            'resistance' => 10
        ]);
    }
}