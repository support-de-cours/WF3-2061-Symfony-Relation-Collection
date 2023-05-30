<?php

namespace App\Form;

use App\Entity\Player;
use App\Entity\Team;
use App\Repository\TeamRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlayerType extends AbstractType
{
    /**
     * Team Repository
     *
     * @var TeamRepository
     */
    private TeamRepository $teamRepository;

    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname')
            ->add('lastname')

            ->add('team', EntityType::class, [
                // Definition de l'entité
                'class' => Team::class,
                // 'choice_label' => "name",
                'choice_label' => function (Team $team) {
                    return $team->getName() . ' - ' . $team->getCountry();
                },
                'choices' => $this->teamRepository->teamAlphabetical()
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Player::class,
        ]);
    }
}
