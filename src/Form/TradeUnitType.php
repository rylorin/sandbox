<?php

declare(strict_types=1);

namespace App\Form;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use App\Entity\TradeUnit;
use App\Entity\Stock;

class TradeUnitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('symbol', EntityType::class, [
            // looks for choices from this entity
            'class' => Stock::class,

            // uses the User.username property as the visible option string
            //'choice_label' => 'username',

            // used to render a select box, check boxes or radios
            // 'multiple' => true,
            // 'expanded' => true,
            ])
          ->add('strategy', ChoiceType::class, [ 'choices' => [
            'long stock' => TradeUnit::LONG_STOCK,
            'short stock' => TradeUnit::SHORT_STOCK,
            'long call' => TradeUnit::LONG_CALL,
            'naked short call' => TradeUnit::SHORT_CALL,
            'covered short call' => TradeUnit::COVERED_CALL,
            'long put' => TradeUnit::LONG_PUT,
            'short put' => TradeUnit::SHORT_PUT,
            'the wheel' => TradeUnit::THE_WHEEL,
            'risk reversal' => TradeUnit::RISK_REVERSAL,
            'bull spread' => TradeUnit::BULL_SPREAD,
            ]])
          ->add('openingDate', DateTimeType::class, [
                'html5' => true,
                'date_widget' => 'single_text',
                'time_widget' => 'single_text', 'with_seconds' => true
                ])
          ->add('closingDate', DateTimeType::class, [
              'required' => false,
              'html5' => true,
              'date_widget' => 'single_text',
              'time_widget' => 'single_text', 'with_seconds' => true
              ])
          ->add('status', ChoiceType::class, [ 'choices' => [
            'Open' => TradeUnit::OPEN_STATUS, 'Closed' => TradeUnit::CLOSE_STATUS ]])
          ->add('PnL')
          ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TradeUnit::class,
        ]);
    }
}
