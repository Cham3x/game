<?php

 class Arme {
    protected int $pv;
    protected int $endurance;
    protected int $mana;
    protected int $force;
    protected int $constitution;
    protected int $agilite;
    protected int $precision;
    protected int $intelligence;
    protected int $resistance;
    protected array $armeStats;
    protected string $name;

    public function __construct(string $name, array $armeStats) {
        $this->name = $name;
        $this->armeStats = $armeStats;
        self::jsonArray($name, $armeStats);
    }

    public function getArmeStats(): array {
        return $this->armeStats;
    }

    public function getName(): string {
        return $this->name;
    }
    public static function jsonArray(string $name, array $armeStats) {
        // Lire le contenu existant du fichier JSON
        $jsonarme = file_get_contents('.\json\arme.json');
        $dataArray = json_decode($jsonarme, true);
        if ($dataArray === null) {
            $dataArray = [];
        }
 
        // Ajouter ou mettre à jour l'entrée pour la arme
        $dataArray[$name] = $armeStats;

        // Réencoder le tableau complet en JSON et l'écrire dans le fichier
        $newJsonarme = json_encode($dataArray, JSON_PRETTY_PRINT);
        file_put_contents('.\json\arme.json', $newJsonarme);
    } 
}

