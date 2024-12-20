<?php

/*   class Race {
    protected int $pv;
    protected int $endurance;
    protected int $mana;
    protected int $force;
    protected int $constitution;
    protected int $agilite;
    protected int $precision;
    protected int $intelligence;
    protected int $resistance;
    protected array $raceStats;
    protected string $nameRace;

    public function __construct(string $name, array $raceStats) {
        $this->nameRace = $name;
        $this->raceStats = $raceStats;
    }

    public function getRaceStats(): array {
        return $this->raceStats;
    }

    public function getName(): string {
        return $this->nameRace;
    }
    public static function raceArray(string $name, array $raceStats) {
        // Lire le contenu existant du fichier JSON
        $jsonData = file_get_contents('data.json');
        $dataArray = json_decode($jsonData, true);
        if ($dataArray === null) {
            $dataArray = [];
        }

        // Ajouter ou mettre à jour l'entrée pour la race
        $dataArray[$name] = $raceStats;

        // Réencoder le tableau complet en JSON et l'écrire dans le fichier
        $newJsonData = json_encode($dataArray, JSON_PRETTY_PRINT);
        file_put_contents('data.json', $newJsonData);
    }
}  */ 
 class Race {
    protected int $pv;
    protected int $endurance;
    protected int $mana;
    protected int $force;
    protected int $constitution;
    protected int $agilite;
    protected int $precision;
    protected int $intelligence;
    protected int $resistance;
    protected array $raceStats;
    protected string $nameRace;

    public function __construct(string $name, array $raceStats) {
        $this->nameRace = $name;
        $this->raceStats = $raceStats;
        self::jsonArray($name, $raceStats);
    }

    public function getRaceStats(): array {
        return $this->raceStats;
    }

    public function getName(): string {
        return $this->nameRace;
    }

   public static function jsonArray(string $name, array $raceStats) {
        // Lire le contenu existant du fichier JSON
        $jsonRace = file_get_contents('.\json\Race.json');
        $dataArray = json_decode($jsonRace, true);
        if ($dataArray === null) {
            $dataArray = [];
        }
 
        // Ajouter ou mettre à jour l'entrée pour la race
        $dataArray[$name] = $raceStats;

        // Réencoder le tableau complet en JSON et l'écrire dans le fichier
        $newJsonRace = json_encode($dataArray, JSON_PRETTY_PRINT);
        file_put_contents('.\json\Race.json', $newJsonRace);
    } 
}