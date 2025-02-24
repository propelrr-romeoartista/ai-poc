<?php

namespace App\Form;

use App\Entity\Players;
use App\Entity\Teams;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlayersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('age')
            ->add('position')
            ->add('gamesPlayed')
            ->add('gamesStarted')
            ->add('minutesPlayed')
            ->add('fieldGoals')
            ->add('fieldGoalAttempts')
            ->add('fieldGoalPercent')
            ->add('threePointGoals')
            ->add('threePointAttempts')
            ->add('threePointPercent')
            ->add('twoPointGoals')
            ->add('twoPointAttempts')
            ->add('twoPointPercent')
            ->add('effectiveFieldGoalPercent')
            ->add('freeThrowGoals')
            ->add('freeThrowAttempts')
            ->add('freeThrowPercent')
            ->add('offensiveRebounds')
            ->add('defensiveRebounds')
            ->add('totalRebounds')
            ->add('assists')
            ->add('steals')
            ->add('blocks')
            ->add('turnovers')
            ->add('personalFouls')
            ->add('points')
            ->add('team', EntityType::class, [
                'class' => Teams::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Players::class,
        ]);
    }
}
