<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class DepositType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('amount', MoneyType::class, [
            'label' => 'Amount to deposit',
            'currency' => 'USD',
        ])
        ->add('stripeToken', HiddenType::class, [
            'mapped' => false,
        ])
        ->add('deposit', SubmitType::class, [
            'label' => 'Deposit',
        ])
    ;
}

public function getBlockPrefix(): string
{
    return 'deposit';
}

public function getAmount(): int
{
    return (int) ($this->getForm()->get('amount')->getData() * 100);
}

public function getStripeToken(): string
{
    return $this->getForm()->get('stripeToken')->getData();
}

public function getClientSecret(): string
{
    Stripe::setApiKey('YOUR_STRIPE_SECRET_KEY');

    $paymentIntent = PaymentIntent::create([
        'amount' => $this->getAmount(),
        'currency' => 'usd',
    ]);

    return $paymentIntent->client_secret;
}

private function getForm()
{
    $request = $this->requestStack->getCurrentRequest();
    $formName = $this->getBlockPrefix();
    return $request->request->get($formName);
}

    }
