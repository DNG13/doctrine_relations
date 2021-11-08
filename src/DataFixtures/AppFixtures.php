<?php

namespace App\DataFixtures;

use App\Entity\Answer;
use App\Entity\Question;
use App\Factory\QuestionFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        QuestionFactory::createMany(20);

        QuestionFactory::new()
            ->unpublished()
            ->many(5)
            ->create();
        $answer = new Answer();
        $answer->setContent('This question is the best! I with I knew th answer.');
        $answer->setUsername('someName');

        $question = new Question();
        $question->setName('One more very interesting question');
        $question->setQuestion('... I should knew how to do ...');

        $answer->setQuestion($question);

        $manager->persist($answer);
        $manager->persist($question);
        $manager->flush();
    }
}
