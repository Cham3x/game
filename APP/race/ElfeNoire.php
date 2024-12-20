<?php
class ElfeNoire extends Race {
    public function __construct() {
        parent::__construct("ElfeNoire", [
            'pv' => 25,
            'endurance' => 10,
            'mana' => 20,
            'force' => 5,
            'constitution' => 5,
            'agilite' => 15,
            'precision' => 15,
            'intelligence' => 20,
            'resistance' => 5
        ]);
    }
}