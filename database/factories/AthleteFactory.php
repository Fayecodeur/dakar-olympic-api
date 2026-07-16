<?php

namespace Database\Factories;

use App\Models\Nation;
use App\Models\Discipline;
use Illuminate\Database\Eloquent\Factories\Factory;

class AthleteFactory extends Factory
{
    public function definition(): array
    {
        $athletes = [
            'Sénégal' => [
                ['Moussa', 'Diop'],
                ['Cheikh', 'Ndiaye'],
                ['Ibrahima', 'Fall'],
                ['Fatou', 'Sarr'],
                ['Awa', 'Diouf'],
                ['Mamadou', 'Ba'],
                ['Abdoulaye', 'Sow'],
                ['Ousmane', 'Diallo'],
                ['Khadija', 'Niane'],
                ['Mariama', 'Gueye'],
                ['Pape', 'Seck'],
                ['Alioune', 'Cissé'],
                ['Mame', 'Thiam'],
                ['Seynabou', 'Mbaye'],
                ['Boubacar', 'Sy'],
            ],

            'Mali' => [
                ['Mamadou', 'Traoré'],
                ['Oumar', 'Coulibaly'],
                ['Aïssata', 'Keita'],
                ['Fatoumata', 'Diarra'],
                ['Adama', 'Koné'],
                ['Boubacar', 'Sissoko'],
                ['Moussa', 'Diallo'],
                ['Hawa', 'Sangaré'],
                ['Issa', 'Maïga'],
                ['Aminata', 'Sidibé'],
            ],

            "Côte d'Ivoire" => [
                ['Jean', 'Koffi'],
                ['Yannick', 'Yao'],
                ['Aya', 'Koné'],
                ['Marie', 'Bamba'],
                ['Didier', 'Kouamé'],
                ['Wilfried', 'Zaha'],
                ['Ismaël', 'Traoré'],
                ['Aminata', 'Coulibaly'],
                ['Clarisse', 'Kouassi'],
                ['Serge', 'Aka'],
            ],

            'Maroc' => [
                ['Youssef', 'El Amrani'],
                ['Amine', 'Bennani'],
                ['Salma', 'Alaoui'],
                ['Omar', 'Idrissi'],
                ['Rachid', 'El Fassi'],
                ['Soufiane', 'Berrada'],
                ['Nadia', 'Tazi'],
                ['Sara', 'El Mansouri'],
                ['Mehdi', 'Lahlou'],
                ['Karim', 'Benjelloun'],
            ],

            'Algérie' => [
                ['Sofiane', 'Belaïd'],
                ['Yacine', 'Benali'],
                ['Riyad', 'Bouzid'],
                ['Nadia', 'Mansouri'],
                ['Amel', 'Khelifi'],
                ['Samir', 'Benkacem'],
                ['Lina', 'Saadi'],
                ['Karim', 'Boudiaf'],
                ['Imane', 'Aït Ahmed'],
                ['Walid', 'Meziane'],
            ],

            'Égypte' => [
                ['Ahmed', 'Hassan'],
                ['Mohamed', 'Ali'],
                ['Omar', 'Mahmoud'],
                ['Yasmine', 'Ibrahim'],
                ['Nour', 'Mostafa'],
                ['Salma', 'Fathy'],
                ['Karim', 'Farouk'],
                ['Aya', 'Samir'],
                ['Hossam', 'Gamal'],
                ['Mariam', 'Adel'],
            ],

            'Nigeria' => [
                ['Chinedu', 'Okafor'],
                ['Emeka', 'Nwosu'],
                ['David', 'Adebayo'],
                ['Blessing', 'Ojo'],
                ['Grace', 'Okoro'],
                ['Samuel', 'Balogun'],
                ['Daniel', 'Eze'],
                ['Esther', 'Adeyemi'],
                ['Victor', 'Uche'],
                ['Chioma', 'Nnamdi'],
            ],

            'France' => [
                ['Lucas', 'Martin'],
                ['Hugo', 'Bernard'],
                ['Emma', 'Dubois'],
                ['Louis', 'Petit'],
                ['Jules', 'Robert'],
                ['Léa', 'Moreau'],
                ['Camille', 'Laurent'],
                ['Nathan', 'Simon'],
                ['Manon', 'Garcia'],
                ['Arthur', 'Michel'],
            ],

            'États-Unis' => [
                ['Michael', 'Johnson'],
                ['James', 'Williams'],
                ['Emily', 'Brown'],
                ['Christopher', 'Smith'],
                ['Ashley', 'Davis'],
                ['Daniel', 'Miller'],
                ['Olivia', 'Wilson'],
                ['Sophia', 'Taylor'],
                ['Ethan', 'Anderson'],
                ['Noah', 'Thomas'],
            ],

            'Brésil' => [
                ['Lucas', 'Silva'],
                ['Gabriel', 'Santos'],
                ['Ana', 'Oliveira'],
                ['Pedro', 'Costa'],
                ['João', 'Souza'],
                ['Mariana', 'Ferreira'],
                ['Rafael', 'Lima'],
                ['Beatriz', 'Rocha'],
                ['Felipe', 'Almeida'],
                ['Julia', 'Barbosa'],
            ],

            'Japon' => [
                ['Haruto', 'Sato'],
                ['Yuki', 'Tanaka'],
                ['Aiko', 'Suzuki'],
                ['Ren', 'Yamamoto'],
                ['Daichi', 'Kobayashi'],
                ['Hina', 'Nakamura'],
                ['Sora', 'Ito'],
                ['Mio', 'Watanabe'],
                ['Takumi', 'Kato'],
                ['Yuna', 'Shimizu'],
            ],
        ];

        $nation = Nation::inRandomOrder()->first();

        // Si le pays n'est pas dans notre liste, on utilise Faker
        if (isset($athletes[$nation->name])) {
            $person = fake()->randomElement($athletes[$nation->name]);
        } else {
            $person = [
                fake()->firstName(),
                fake()->lastName()
            ];
        }


        return [
            'first_name' => $person[0],
            'last_name' => $person[1],
            'gender' => fake()->randomElement(['Homme', 'Femme']),
            'birth_date' => fake()->dateTimeBetween('-30 years', '-18 years')
                ->format('Y-m-d'),
            'height' => fake()->randomFloat(2, 1.60, 2.05),
            'weight' => fake()->randomFloat(2, 50, 110),
            'nation_id' => $nation->id,
            'discipline_id' => Discipline::inRandomOrder()->value('id'),
        ];
    }
}
