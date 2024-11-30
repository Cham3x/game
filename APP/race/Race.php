<?php

 class Race {
    protected int $pv;
    protected int $endurance;
    protected int $mana;
    protected int $force;
    protected int $constitution;
    protected int $agilite;
    protected int $precision;
    protected array $raceStats;
    protected string $name;

    public function __construct(string $name, array $raceStats) {
        $this->name = $name;
        $this->raceStats = $raceStats;
    }

    public function getRaceStats(): array {
        return $this->raceStats;
    }

    public function getName(): string {
        return $this->name;
    }
}
