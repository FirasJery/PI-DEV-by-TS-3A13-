<?php

namespace App\Controller;

use App\Entity\Wallet;
use App\Entity\Transaction;
use App\Form\WalletType;
use App\Repository\WalletRepository;
use App\Repository\TransactionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\AsciiSlugger;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Token;
use Stripe\Customer;

#[Route('/wallet')]
class WalletController extends AbstractController
{
    #[Route('/', name: 'app_wallet_index', methods: ['GET'])]
    public function index(WalletRepository $walletRepository): Response
    {
        return $this->render('wallet/index.html.twig', [
            'wallets' => $walletRepository->findbyUser(1),
        ]);
    }

    #[Route('/new', name: 'app_wallet_new', methods: ['GET', 'POST'])]
    public function new(Request $request, WalletRepository $walletRepository): Response
    {
        $wallet = new Wallet();
        $form = $this->createForm(WalletType::class, $wallet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $wallet->setIdUser(1);
            $randomString = bin2hex(random_bytes(5));
           $cle = substr($randomString, 0, 10);
        $wallet->setCle($cle);
            $wallet->setCle($cle);
            $wallet->setSolde(0);
            $wallet->setBonus(0);
            
            $walletRepository->save($wallet, true);

            return $this->redirectToRoute('app_wallet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('wallet/new.html.twig', [
            'wallet' => $wallet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_wallet_show', methods: ['GET'])]
    public function show(Wallet $wallet,WalletRepository $wallrepo): Response
    {
       
        return $this->render('wallet/show.html.twig', [
            'wallet' => $wallet,
        ]);
    }
    #[Route('/{id}/transfer', name: 'transfer_funds', methods: ['POST'])] 
    public function transferFunds(Request $request,WalletRepository $wallrepo,Wallet $wallet,TransactionRepository $transrepo) : Response
    {
        $trans = new Transaction();
        $now = new \DateTime();
        $nowString = $now->format('Y-m-d H:i:s');
        
        $cle = $request->request->get('cle');
    
        $wallr = new Wallet();
        $wallr= $wallrepo->findOneByCle($cle);
        $montant = $request->request->get('montant');
        $trans->setMontant($montant);
        $trans->setDate($nowString);
        $trans->setSendingWallet($wallet->getId());
        $trans->setRecWallet($wallr->getId());
        $trans->setEtat(1);
        $transrepo->save($trans,true);
        $wallet->setSolde($wallet->getSolde() - $montant);
        $wallr->setSolde($wallr->getSolde() + $montant);
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('app_succes', ['id' => $wallet->getId()]);


    }
    #[Route('/{id}/deposit', name: 'deposit_funds', methods: ['POST'])]
    public function depositFunds(Request $request, Wallet $wallet,TransactionRepository $transrepo): Response
    {
        $trans = new Transaction();
        
        // Retrieve the amount from the form data
        $amount = $request->request->get('amount');
        $now = new \DateTime();
        $nowString = $now->format('Y-m-d H:i:s');
        $trans->setMontant($amount);
        $trans->setDate($nowString);
        $trans->setSendingWallet(999);
        $trans->setRecWallet($wallet->getId());
        $trans->setEtat(1);
        $transrepo->save($trans,true);
        // Top up the wallet balance by the amount
        $wallet->setSolde($wallet->getSolde() + $amount);
        $wallet->setBonus($amount/50);
        $this->getDoctrine()->getManager()->flush();
  


Stripe::setApiKey('sk_test_51MwHMBHoR0up0WBewYneMBTX6z70JtsOppnjK1850yMmPMlw4R4NwbqnPgyYSpok6hmGSzhVJjGSo5H2WdIGYK4z00S1gldRip');
try {
    $token = Token::create([
        'card' => [
            'number' => '4242424242424242',
            'exp_month' => 12,
            'exp_year' => 2024,
            'cvc' => '123',
        ],
    ]);
} catch (\Stripe\Exception\InvalidRequestException $e) {
    echo 'Invalid token: ' . $e->getMessage();
    exit;
}

try {
    $customer = Customer::create([
        'name' => 'Ghassen Sahnoun',
        'email' => 'test@est.test',
        'source' => $token,
    ]);
} catch (\Stripe\Exception\CardException $e) {
    echo 'Card error: ' . $e->getMessage();
    exit;
} catch (\Stripe\Exception\InvalidRequestException $e) {
    echo 'Invalid request: ' . $e->getMessage();
    exit;
}

$source = $customer->default_source;

try {
    $charge = Charge::create([
        'amount' => $amount*100,
        'currency' => 'usd',
        'source' => $source,
        'customer' => $customer->id,
    ]);
} catch (\Stripe\Exception\CardException $e) {
    echo 'Charge failed: ' . $e->getMessage();
    exit;
}
    
        return $this->redirectToRoute('app_succes', ['id' => $wallet->getId()]);
    }
    #[Route('/{id}/succes' , name : 'app_succes' , methods : ['GET'])]
    public function succes(Request $request,WalletRepository $walletRepository,Wallet $wallet) : Response 
    {
        $amount = $request->request->get('amount');
        return $this->render('wallet/succes.html.twig', ['wallet' => $wallet]);
     
    }

    #[Route('/{id}/Mywallet' , name:'app_mywallet' , methods : ['GET'] )]
    public function showWallet(Wallet $w , WalletRepository $wallrepo) : Response
    {
        
        return $this->render('wallet/gestWallet.html.twig', [
            'wallet' => $w,
        ]);

    }

    #[Route('/{id}/edit', name: 'app_wallet_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Wallet $wallet, WalletRepository $walletRepository): Response
    {
        $form = $this->createForm(WalletType::class, $wallet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $walletRepository->save($wallet, true);

            return $this->redirectToRoute('app_wallet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('wallet/edit.html.twig', [
            'wallet' => $wallet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_wallet_delete', methods: ['POST'])]
    public function delete(Request $request, Wallet $wallet, WalletRepository $walletRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$wallet->getId(), $request->request->get('_token'))) {
            $walletRepository->remove($wallet, true);
        }

        return $this->redirectToRoute('app_wallet_index', [], Response::HTTP_SEE_OTHER);
    }
    #[Route('/{id}/transactions', name: 'transactions', methods: ['POST' , 'GET'])]
    public function showTransactions(Request $request, TransactionRepository $transactionRepository, Wallet $wallet): Response
    {
        $forwarded = $transactionRepository->findBy(['sendingWallet' => $wallet->getId()]);
        $received = $transactionRepository->findBy(['recWallet' => $wallet->getId()]);
        
        return $this->render('wallet/transactions.html.twig', [
            'forwarded' => $forwarded,
            'received' => $received,
        ]);
    }
    


    
}
