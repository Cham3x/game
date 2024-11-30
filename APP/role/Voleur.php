<?php

class Voleur extends Role {
    public function __construct() {
        parent::__construct("Voleur", [
            'pv' => 10,
            'endurance' => 10,
            'mana' => 5,
            'force' => 10,
            'constitution' => 5,
            'agilite' => 20,
            'precision' => 15,
            'intelligence' => 10,
            'resistance' => 5
        ]);
    }
}