<?php

class Magicien extends Role {
    public function __construct() {
        parent::__construct("Magicien", [
            'pv' => 5,
            'endurance' => 5,
            'mana' => 30,
            'force' => 5,
            'constitution' => 5,
            'agilite' => 10,
            'precision' => 10,
            'intelligence' => 25,
            'resistance' => 5
        ]);
    }
}