<?php

 class Role {
    protected int $pv;
    protected int $endurance;
    protected int $mana;
    protected int $force;
    protected int $constitution;
    protected int $agilite;
    protected int $precision;
    protected int $intelligence;
    protected int $resistance;
    protected array $roleStats;
    protected string $name;

    public function __construct(string $name, array $roleStats) {
        $this->name = $name;
        $this->roleStats = $roleStats;
        self::roleArray($name, $roleStats);
    }

    public function getRoleStats(): array {
        return $this->roleStats;
    }

    public function getName(): string {
        return $this->name;
    }
    public static function roleArray(string $name, array $roleStats) {
        // Lire le contenu existant du fichier JSON
        $jsonrole = file_get_contents('.\json\role.json');
        $dataArray = json_decode($jsonrole, true);
        if ($dataArray === null) {
            $dataArray = [];
        }
 
        // Ajouter ou mettre à jour l'entrée pour la role
        $dataArray[$name] = $roleStats;

        // Réencoder le tableau complet en JSON et l'écrire dans le fichier
        $newJsonrole = json_encode($dataArray, JSON_PRETTY_PRINT);
        file_put_contents('.\json\role.json', $newJsonrole);
    } 
}





