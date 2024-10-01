<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = new News();
        $news->title = 'BioSynth : Revue Indépendante de Biotechnologie';
        $news->description = 'Une nouvelle entreprise biotechnologique, ID, fait sensation dans le monde de la science avec sa technologie innovante de fabrication d\'implants sous-cutanés conçus pour "injecter" des idées directement dans le cerveau humain. Cette avancée révolutionnaire suscite à la fois l\'enthousiasme et la controverse, promettant de transformer la façon dont nous pensons et apprenons...';
        $news->date = date('2024-05-24');
        $news->save();

        $news = new News();
        $news->title = 'Cellular Nexus : Revue Indépendante sur les Frontières de la Biologie Cellulaire et de la Bio-ingénierie';
        $news->description = 'Dans un développement révolutionnaire, les entreprises de technologie annoncent un nouveau produit d\'implant sous-cutané qui promet de transformer notre perception de la réalité. En intégrant des algorithmes d\'intelligence artificielle directement dans le cerveau, cet implant permet aux utilisateurs de vivre une expérience de réalité augmentée immersive et personnalisée sans avoir besoin de dispositifs externes...';
        $news->date = date('2024-04-27');
        $news->save();

        $news = new News();
        $news->title = 'Genome Gazette : Explorations Avancées en Génomique et Manipulation Génétique';
        $news->description = 'Dans un mariage sans précédent de la biotechnologie et de l\'intelligence artificielle, les chercheurs ont développé un implant sous-cutané révolutionnaire capable d\'augmenter les capacités cognitives humaines en intégrant des algorithmes d\'IA directement dans le cerveau...';
        $news->date = date('2024-03-23');
        $news->save();

        $news = new News();
        $news->title = 'Cellular Nexus : Revue Indépendante sur les Frontières de la Biologie Cellulaire et de la Bio-ingénierie';
        $news->description = 'Dans un développement révolutionnaire, les entreprises de technologie annoncent un nouveau produit d\'implant sous-cutané qui promet de transformer notre perception de la réalité. En intégrant des algorithmes d\'intelligence artificielle directement dans le cerveau, cet implant permet aux utilisateurs de vivre une expérience de réalité augmentée immersive et personnalisée sans avoir besoin de dispositifs externes...';
        $news->date = date('2024-12-27');
        $news->save();
    }
}
