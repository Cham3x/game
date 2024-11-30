<?php
class Elfe extends Race {
    public function __construct() {
        parent::__construct("Elfe", [
            'pv' => 10,
            'endurance' => 10,
            'mana' => 20,
            'force' => 5,
            'constitution' => 5,
            'agilite' => 15,
            'precision' => 15
        ]);
    }
}