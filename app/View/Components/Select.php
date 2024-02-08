<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Select extends Component
{
    public bool $valueIsCollection;

    /**
     * Crée une nouvelle instance du composant.
     */
    public function __construct(
        public string $name, // Nom du champ de sélection
        public string $label, // Libellé du champ de sélection
        public Collection $list, // Liste des options de sélection
        public ?string $id = null, // ID du champ de sélection
        public string $optionsValues = 'id', // Nom de la colonne utilisée pour les valeurs des options
        public string $optionsTexts = 'name', // Nom de la colonne utilisée pour les textes des options
        public mixed $value = null, // Valeur sélectionnée par défaut
        public bool $multiple = false, // Indique si la sélection multiple est autorisée
        public string $help = '', // Texte d'aide affiché sous le champ de sélection
    )
    {
        $this->id ??= $this->name;
        $this->handleValue();
    }

    /**
        * Met à jour la valeur du composant de sélection.
        *
        * Cette méthode met à jour la valeur du composant de sélection en utilisant la valeur précédemment soumise
        * ou la valeur par défaut si aucune valeur soumise n'est disponible. Si la valeur est un tableau, elle est
        * convertie en une collection. La méthode détermine également si la valeur est une instance de la classe Collection.
        *
        * @return void
     */
    protected function handleValue(): void
    {
        $this->value = old($this->name) ?? $this->value;
        if (is_array($this->value)) {
            $this->value = collect($this->value);
        }
        $this->valueIsCollection = $this->value instanceof Collection;
    }

    /**
     * Récupère la vue / le contenu qui représente le composant.
     */
    public function render(): View|Closure|string
    {
        return view('components.select');
    }
}