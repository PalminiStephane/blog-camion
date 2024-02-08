<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
    /**
     * Crée une nouvelle instance du composant.
     */
    public function __construct(
        public string $name, // Le nom de la textarea
        public string $label, // Le label de la textarea
        public ?string $id = null, // L'ID de la textarea (optionnel)
        public string $help = '', // Le texte d'aide de la textarea
    )
    {
        $this->id ??= $this->name;
    }

    /**
     * Récupère la vue / le contenu qui représente le composant.
     */
    public function render(): View|Closure|string
    {
        return view('components.textarea');
    }
}