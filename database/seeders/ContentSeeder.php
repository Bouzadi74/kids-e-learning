<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Content;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Alphabet Learning
        $alphabet = Category::where('name', 'Alphabet')->first();
        if ($alphabet) {
            $this->createAlphabetContent($alphabet);
        }

        // Numbers
        $numbers = Category::where('name', 'Numbers')->first();
        if ($numbers) {
            $this->createNumbersContent($numbers);
        }

        // Colors
        $colors = Category::where('name', 'Colors')->first();
        if ($colors) {
            $this->createColorsContent($colors);
        }

        // Animals
        $animals = Category::where('name', 'Animals')->first();
        if ($animals) {
            $this->createAnimalsContent($animals);
        }

        // Shapes
        $shapes = Category::where('name', 'Shapes')->first();
        if ($shapes) {
            $this->createShapesContent($shapes);
        }
    }

    private function createAlphabetContent($category)
    {
        $letters = range('A', 'Z');
        foreach ($letters as $letter) {
            $words = $this->getWordsStartingWith($letter);
            Content::create([
                'category_id' => $category->id,
                'title' => "Learn Letter {$letter}",
                'slug' => Str::slug("learn-letter-{$letter}"),
                'description' => "Apprenez la lettre {$letter} à travers des activités interactives :
                - Prononciation et son de la lettre
                - Mots commençant par {$letter} : " . implode(', ', $words) . "
                - Exercices d'écriture avec tracé guidé
                - Jeux de reconnaissance de la lettre
                - Activités de coloriage et d'art
                - Chansons et comptines incluant la lettre {$letter}",
                'is_featured' => in_array($letter, ['A', 'B', 'C']),
            ]);
        }
    }

    private function createNumbersContent($category)
    {
        for ($i = 1; $i <= 20; $i++) {
            Content::create([
                'category_id' => $category->id,
                'title' => "Number {$i}",
                'slug' => Str::slug("number-{$i}"),
                'description' => "Apprenez le nombre {$i} à travers des activités éducatives :
                - Reconnaissance visuelle du nombre
                - Comptage d'objets jusqu'à {$i}
                - Exercices d'écriture du chiffre
                - Problèmes mathématiques simples
                - Jeux de correspondance nombre-quantité
                - Activités de manipulation avec des objets
                - Chansons et comptines pour mémoriser",
                'is_featured' => in_array($i, [1, 2, 3]),
            ]);
        }
    }

    private function createColorsContent($category)
    {
        $colors = [
            'Red' => [
                'description' => 'La couleur des pommes et des fraises',
                'activities' => 'Mélange de couleurs, peinture, collage, jeux de tri'
            ],
            'Blue' => [
                'description' => 'La couleur du ciel et de l\'océan',
                'activities' => 'Expériences avec l\'eau, peinture, collage, jeux de mémoire'
            ],
            'Yellow' => [
                'description' => 'La couleur du soleil et des bananes',
                'activities' => 'Mélange avec le rouge, peinture, collage, jeux de reconnaissance'
            ],
            'Green' => [
                'description' => 'La couleur de l\'herbe et des feuilles',
                'activities' => 'Mélange bleu-jaune, peinture, collage, jeux de tri'
            ],
            'Orange' => [
                'description' => 'La couleur des oranges et des carottes',
                'activities' => 'Mélange rouge-jaune, peinture, collage, jeux de mémoire'
            ],
            'Purple' => [
                'description' => 'La couleur des raisins et des aubergines',
                'activities' => 'Mélange rouge-bleu, peinture, collage, jeux de tri'
            ],
            'Pink' => [
                'description' => 'La couleur des fleurs et des bonbons',
                'activities' => 'Mélange rouge-blanc, peinture, collage, jeux de reconnaissance'
            ],
            'Brown' => [
                'description' => 'La couleur du chocolat et des troncs d\'arbres',
                'activities' => 'Mélange de couleurs primaires, peinture, collage, jeux de tri'
            ],
            'Black' => [
                'description' => 'La couleur de la nuit et du charbon',
                'activities' => 'Contraste avec le blanc, peinture, collage, jeux de mémoire'
            ],
            'White' => [
                'description' => 'La couleur de la neige et des nuages',
                'activities' => 'Mélange avec d\'autres couleurs, peinture, collage, jeux de tri'
            ],
        ];

        foreach ($colors as $color => $data) {
            Content::create([
                'category_id' => $category->id,
                'title' => "Color {$color}",
                'slug' => Str::slug("color-{$color}"),
                'description' => "Apprenez la couleur {$color} :
                - Description : {$data['description']}
                - Activités d'apprentissage :
                  {$data['activities']}
                - Jeux de reconnaissance
                - Activités de tri et de classement
                - Expériences de mélange de couleurs
                - Projets artistiques
                - Chansons et comptines sur les couleurs",
                'is_featured' => in_array($color, ['Red', 'Blue', 'Yellow']),
            ]);
        }
    }

    private function createAnimalsContent($category)
    {
        $animals = [
            'Lion' => [
                'description' => 'Le roi de la jungle',
                'habitat' => 'Savane africaine',
                'facts' => 'Vit en groupe appelé "troupeau", le mâle a une crinière'
            ],
            'Elephant' => [
                'description' => 'Le plus grand animal terrestre',
                'habitat' => 'Savane et forêt',
                'facts' => 'Utilise sa trompe pour boire et manger, vit en famille'
            ],
            'Giraffe' => [
                'description' => 'L\'animal le plus grand avec un long cou',
                'habitat' => 'Savane africaine',
                'facts' => 'Peut atteindre les feuilles hautes des arbres'
            ],
            'Monkey' => [
                'description' => 'Un animal joueur qui aime les bananes',
                'habitat' => 'Forêt tropicale',
                'facts' => 'Très intelligent, utilise des outils'
            ],
            'Penguin' => [
                'description' => 'Un oiseau qui ne peut pas voler mais nage très bien',
                'habitat' => 'Antarctique',
                'facts' => 'Vit en colonies, excellent nageur'
            ],
            'Dolphin' => [
                'description' => 'Une créature marine intelligente et amicale',
                'habitat' => 'Océans',
                'facts' => 'Communique avec des sons, très social'
            ],
            'Tiger' => [
                'description' => 'Un grand chat avec des rayures',
                'habitat' => 'Forêt et jungle',
                'facts' => 'Chasseur solitaire, excellent nageur'
            ],
            'Kangaroo' => [
                'description' => 'Un animal australien qui porte son bébé dans une poche',
                'habitat' => 'Désert et prairie',
                'facts' => 'Se déplace en sautant, herbivore'
            ],
            'Panda' => [
                'description' => 'Un ours noir et blanc qui aime le bambou',
                'habitat' => 'Forêt de bambou',
                'facts' => 'Mange principalement du bambou, en danger'
            ],
            'Zebra' => [
                'description' => 'Un animal semblable à un cheval avec des rayures',
                'habitat' => 'Savane africaine',
                'facts' => 'Les rayures sont uniques comme des empreintes digitales'
            ],
        ];

        foreach ($animals as $animal => $data) {
            Content::create([
                'category_id' => $category->id,
                'title' => "Animal: {$animal}",
                'slug' => Str::slug("animal-{$animal}"),
                'description' => "Apprenez sur l'animal {$animal} :
                - Description : {$data['description']}
                - Habitat : {$data['habitat']}
                - Faits intéressants : {$data['facts']}
                - Activités d'apprentissage :
                  - Coloriage et dessin
                  - Jeux de mémoire
                  - Puzzles
                  - Activités de tri
                  - Chansons et comptines
                  - Projets artistiques
                  - Jeux de rôle
                - Vidéos éducatives
                - Livres et histoires",
                'is_featured' => in_array($animal, ['Lion', 'Elephant', 'Giraffe']),
            ]);
        }
    }

    private function createShapesContent($category)
    {
        $shapes = [
            'Circle' => [
                'description' => 'Une forme ronde sans coins',
                'examples' => 'Soleil, ballon, roue'
            ],
            'Square' => [
                'description' => 'Une forme avec quatre côtés égaux et quatre coins',
                'examples' => 'Fenêtre, boîte, carreau'
            ],
            'Triangle' => [
                'description' => 'Une forme avec trois côtés et trois coins',
                'examples' => 'Pizza, panneau de signalisation, toit'
            ],
            'Rectangle' => [
                'description' => 'Une forme avec quatre côtés et quatre coins',
                'examples' => 'Porte, livre, télévision'
            ],
            'Star' => [
                'description' => 'Une forme avec cinq pointes',
                'examples' => 'Étoile, médaille, décoration'
            ],
            'Heart' => [
                'description' => 'Une forme qui représente l\'amour',
                'examples' => 'Carte de Saint-Valentin, bijou, dessin'
            ],
            'Diamond' => [
                'description' => 'Une forme avec quatre côtés égaux mais sans angles droits',
                'examples' => 'Losange, diamant, cerf-volant'
            ],
            'Oval' => [
                'description' => 'Un cercle allongé',
                'examples' => 'Œuf, visage, ballon de rugby'
            ],
            'Pentagon' => [
                'description' => 'Une forme avec cinq côtés',
                'examples' => 'Maison, panneau routier, ballon de football'
            ],
            'Hexagon' => [
                'description' => 'Une forme avec six côtés',
                'examples' => 'Nid d\'abeille, flocon de neige, panneau routier'
            ],
        ];

        foreach ($shapes as $shape => $data) {
            Content::create([
                'category_id' => $category->id,
                'title' => "Shape: {$shape}",
                'slug' => Str::slug("shape-{$shape}"),
                'description' => "Apprenez la forme {$shape} :
                - Description : {$data['description']}
                - Exemples dans la vie réelle : {$data['examples']}
                - Activités d'apprentissage :
                  - Reconnaissance visuelle
                  - Tracé et dessin
                  - Puzzles et jeux
                  - Activités de tri
                  - Projets artistiques
                  - Jeux de construction
                  - Chansons et comptines
                - Exercices pratiques
                - Projets créatifs",
                'is_featured' => in_array($shape, ['Circle', 'Square', 'Triangle']),
            ]);
        }
    }

    private function getWordsStartingWith($letter)
    {
        $words = [
            'A' => ['Avion', 'Arbre', 'Ananas', 'Abeille', 'Arc-en-ciel'],
            'B' => ['Ballon', 'Banane', 'Bateau', 'Bébé', 'Biscuit'],
            'C' => ['Chat', 'Crayon', 'Cœur', 'Cadeau', 'Camion'],
            'D' => ['Dauphin', 'Dent', 'Drapeau', 'Dinosaure', 'Doigt'],
            'E' => ['Éléphant', 'Étoile', 'École', 'Escargot', 'Enfant'],
            'F' => ['Fleur', 'Fraise', 'Fourmi', 'Fusée', 'Fille'],
            'G' => ['Girafe', 'Gâteau', 'Grenouille', 'Glace', 'Garçon'],
            'H' => ['Hippopotame', 'Hibou', 'Hélicoptère', 'Hôtel', 'Hiver'],
            'I' => ['Iguane', 'Île', 'Igloo', 'Insecte', 'Image'],
            'J' => ['Jouet', 'Jardin', 'Jus', 'Jambon', 'Joueur'],
            'K' => ['Kangourou', 'Kiwi', 'Koala', 'Kaki', 'Kilt'],
            'L' => ['Lion', 'Lune', 'Livre', 'Légume', 'Lapin'],
            'M' => ['Maman', 'Maison', 'Mouton', 'Miel', 'Montagne'],
            'N' => ['Nuage', 'Nid', 'Noix', 'Nez', 'Nuit'],
            'O' => ['Oiseau', 'Orange', 'Ours', 'Œuf', 'Océan'],
            'P' => ['Papa', 'Pomme', 'Panda', 'Poule', 'Piscine'],
            'Q' => ['Quatre', 'Quille', 'Quiche', 'Quenelle', 'Quartier'],
            'R' => ['Roi', 'Rose', 'Rouge', 'Robot', 'Râteau'],
            'S' => ['Soleil', 'Souris', 'Serpent', 'Sapin', 'Sable'],
            'T' => ['Tigre', 'Train', 'Tortue', 'Tomate', 'Table'],
            'U' => ['Univers', 'Unité', 'Usine', 'Utile', 'Unique'],
            'V' => ['Voiture', 'Vache', 'Vélo', 'Violet', 'Vent'],
            'W' => ['Wagon', 'Wapiti', 'Watt', 'Wok', 'Wagonnet'],
            'X' => ['Xylophone', 'Xénon', 'Xérès', 'Xylème', 'Xylocope'],
            'Y' => ['Yacht', 'Yak', 'Yoga', 'Yaourt', 'Yéti'],
            'Z' => ['Zèbre', 'Zoo', 'Zéro', 'Zigzag', 'Zeste']
        ];

        return $words[$letter] ?? [];
    }
}
