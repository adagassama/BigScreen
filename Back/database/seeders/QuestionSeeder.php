<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
class QuestionSeeder extends Seeder
{
    private const Questions = [
        [
            'title'             => 'Question 1/20',
            'content'           => 'Votre adresse mail',
            'type'              => 'B',
            'possible_answer'   => ''
        ],
        [
            'title'             => 'Question 2/20',
            'content'           => 'Votre age',
            'type'              => 'B',
            'possible_answer'   => ''
        ],
        [
            'title'             => 'Question 3/20',
            'content'           => 'Votre sexe',
            'type'              => 'A',
            'possible_answer'   => 'Homme, Femme, Préfère ne pas répondre'
        ],
        [
            'title'             => 'Question 4/20',
            'content'           => 'Nombre de personne dans votre foyer (adulte & enfants)',
            'type'              => 'C',
            'possible_answer'   => ''
        ],
        [
            'title'             => 'Question 5/20',
            'content'           => 'Votre profession',
            'type'              => 'B',
            'possible_answer'   => ''
        ],
        [
            'title'             => 'Question 6/20',
            'content'           => 'Quel marque de casque VR utilisez-vous ?',
            'type'              => 'A',
            'possible_answer'   => 'Oculus Quest, Oculus Rift/s, HTC Vive, Windows Mixed Reality, Valve index'
        ],
        [
            'title'             => 'Question 7/20',
            'content'           => 'Sur quel magasin dappplication achetez vous des contenus VR ?',
            'type'              => 'A',
            'possible_answer'   => 'SteamVR, Occulus store, Viveport, Windows store'
        ],
        [
            'title'             => 'Question 8/20',
            'content'           => 'Quel casque envisagez-vous d’acheter dans un futur proche ?',
            'type'              => 'A',
            'possible_answer'   => 'Occulus Quest, Occulus Go, HTC Vive Pro, PSVR, Autre, Aucun'
        ],
        [
            'title'             => 'Question 9/20',
            'content'           => 'Au sein de votre foyer, combien de personnes utilisent votre casque VR pour regarder Bigscreen ?',
            'type'              => 'C',
            'possible_answer'   => ''
        ],
        [
            'title'             => 'Question 10/20',
            'content'           => 'Vous utilisez principalement Bigscreen pour :',
            'type'              => 'A',
            'possible_answer'   => 'regarder la TV en direct, regarder des films, travailler, jouer en solo, jouer en équipe'
        ],
        [
            'title'             => 'Question 11/20',
            'content'           => 'Combien donnez-vous de point pour la qualité de l’image sur Bigscreen ?',
            'type'              => 'C',
            'possible_answer'   => ''
        ],
        [
            'title'             => 'Question 12/20',
            'content'           => 'Combien donnez-vous de point pour le confort d’utilisation de l’interface Bigscreen ?',
            'type'              => 'C',
            'possible_answer'   => ''
        ],
        [
            'title'             => 'Question 13/20',
            'content'           => 'Combien donnez-vous de point pour la connexion réseau de Bigscreen ?',
            'type'              => 'C',
            'possible_answer'   => ''
        ],
        [
            'title'             => 'Question 14/20',
            'content'           => 'Combien donnez-vous de point pour la qualité des graphismes 3D dans Bigscreen ?',
            'type'              => 'C',
            'possible_answer'   => ''
        ],
        [
            'title'             => 'Question 15/20',
            'content'           => 'Combien donnez-vous de point pour la qualité audio dans Bigscreen ?',
            'type'              => 'C',
            'possible_answer'   => ''
        ],
        [
            'title'             => 'Question 16/20',
            'content'           => 'Aimeriez vous avoir des notifications plus précises au cours de vos sessions Bigscreen ?',
            'type'              => 'A',
            'possible_answer'   => 'Oui, Non'
        ],
        [
            'title'             => 'Question 17/20',
            'content'           => 'Aimeriez vous pouvoir inviter un ami à rejoindre votre session via son smartphone ?',
            'type'              => 'A',
            'possible_answer'   => 'Oui, Non'
        ],
        [
            'title'             => 'Question 18/20',
            'content'           => 'Aimeriez vous pouvoir enregistrer des émissions TV pour pouvoir les regarder ultérieurement ?',
            'type'              => 'A',
            'possible_answer'   => 'Oui, Non'
        ],
        [
            'title'             => 'Question 19/20',
            'content'           => 'Aimeriez-vous jouer à des jeux exclusifs sur votre Bigscreen ?',
            'type'              => 'A',
            'possible_answer'   => 'Oui, Non'
        ],
        [
            'title'             => 'Question 20/20',
            'content'           => 'Quelle nouvelle fonctionnalité devrait exister sur Bigscreen ?',
            'type'              => 'B',
            'possible_answer'   => ''
        ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new Collection(self::Questions))
        ->when(fn ($questions) => $questions
            ->each(fn ($question) => Question::create($question)));
    }
}
