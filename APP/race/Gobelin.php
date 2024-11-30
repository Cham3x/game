<?php
class Gobelin extends Race {
    public function __construct() {
        parent::__construct("Gobelin", [
            'pv' => 15,
            'endurance' => 5,
            'mana' => 5,
            'force' => 5,
            'constitution' => 5,
            'agilite' => 20,
            'precision' => 15
        ]);
    }
}