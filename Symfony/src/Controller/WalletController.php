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
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\JsonResponse;

#[Route('/wallet')]
class WalletController extends AbstractController
{
    #[Route('/', name: 'app_wallet_index', methods: ['GET'])]
    public function index(WalletRepository $walletRepository): Response
    {
        $idwallet = $walletRepository->findOneByIdUser($this->getUser()->getId());
        return $this->redirectToRoute('app_mywallet', ['id' => $idwallet->getId()]);
        
    }
    #[Route('/backindex', name: 'wallet_back', methods: ['GET'])]
    public function indexB(WalletRepository $walletRepository): Response
    {
        $wallets = $walletRepository->findAll();
        return $this->render('wallet/back.html.twig', ['wallets' => $wallets]);
        
    }
    #[Route('/AllMobile', name: 'app_wallet_index_mobile', methods: ['GET'])]
    public function indexMobile(WalletRepository $walletRepository): Response
    {
        $wallets=$walletRepository->findAll();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted= $serializer->normalize($wallets);
        return new JsonResponse($formatted);
       
    }

    #[Route('/newMobile', name: 'app_wallet_new_mobile', methods: ['GET', 'POST'])]
    public function newMobiile(Request $request,WalletRepository $walletRepository):Response
    {
        $wallet = new Wallet();
        $nom = $request->query->get("nomWallet");
        $tel = $request->query->get("tel");
        $wallet->setBonus(0);
        $wallet->setSolde(0);
        $wallet->setIdUser(1);
        $randomString = bin2hex(random_bytes(5));
           $cle = substr($randomString, 0, 10);
        $wallet->setCle($cle);
        $walletRepository->save($wallet);
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted= $serializer->normalize($wallet);
        return new JsonResponse($formatted);
    }

    #[Route('/deleteMobile', name: 'app_mobile_delete', methods: ['GET', 'POST'])]
    public function deleteMobile(Request $request,WalletRepository $walletRepository):Response
    {
        $id=$request->get("id");
        $wallet=$walletRepository->findOneById($id);
        if($wallet){
        $walletRepository->remove($wallet);
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted= $serializer->normalize("WalletSupprimé");
        return new JsonResponse($formatted);
        }
        
        $formatted= $serializer->normalize("Wallet non trouvé");
        return new JsonResponse($formatted);
    }


    #[Route('/MyStat', name: 'wallet_stat', methods: ['GET'])]
    public function dashboard(WalletRepository $walletRepository, TransactionRepository $transactionRepository)
    {
        $user = $this->getUser();
        $wallet = $walletRepository->findOneByIdUser($user->getId());
        $transactions = $transactionRepository->Recent($wallet->getId());
        $transactionsR = $transactionRepository->Recieved($wallet->getId());
        $transactionsS = $transactionRepository->Sent($wallet->getId());
        $numSentTransactions = count($transactionsS);
        $numReceivedTransactions = count($transactionsR);
    
        return $this->render('wallet/dashboard.html.twig', [
            'wallet' => $wallet,
            'transactions'=>$transactions,
            'transactionsR' => $transactionsR,
            'transactionsS' => $transactionsS,
            'numSentTransactions'=>$numSentTransactions,
            'numReceivedTransactions'=>$numReceivedTransactions

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
        $nowString = $now->format('Y-m-d');
        
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
        $nowString = $now->format('Y-m-d');
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
        'name' => $this->getUser()->getName().$this->getUser()->getLastName(),
        'email' => $this->getUser()->getEmail(),
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
        $startDate = $request->query->get('start_date');
    
 if($startDate){
    $forwarded = $transactionRepository->findBy(
        [
            'sendingWallet' => $wallet->getId(),
            'date' =>$startDate// replace 'date' with the name of the attribute that stores the transaction date
        ]
      
    );

    $received = $transactionRepository->findBy(
        [
            'recWallet' => $wallet->getId(),
            'date' => $startDate // replace 'date' with the name of the attribute that stores the transaction date
        ]
    );

    return $this->render('wallet/transactions.html.twig', [
        'forwarded' => $forwarded,
        'received' => $received,
        'wallet'=>$wallet,
    ]);
}else {
        $forwarded = $transactionRepository->findBy(['sendingWallet' => $wallet->getId()]);
        $received = $transactionRepository->findBy(['recWallet' => $wallet->getId()]);
        
        return $this->render('wallet/transactions.html.twig', [
            'forwarded' => $forwarded,
            'received' => $received,
            'wallet'=>$wallet,
        ]);
    }
    }

    #[Route('/{id}/transactionsBack', name: 'transactions_back', methods: ['POST' , 'GET'])]
    public function showTransactionsB(Request $request, TransactionRepository $transactionRepository, Wallet $wallet): Response
    {
       
        $forwarded = $transactionRepository->findBy(['sendingWallet' => $wallet->getId()]);
        $received = $transactionRepository->findBy(['recWallet' => $wallet->getId()]);
        
        return $this->render('wallet/transactionBack.html.twig', [
            'forwarded' => $forwarded,
            'received' => $received,
            'wallet'=>$wallet,
        ]);
    }

    #[Route('/{id}/export-excel', name: 'wallet_exel')]
public function export(TransactionRepository $transactionRepository, Wallet $wallet ): Response
{
    // Get the data from the repository
    $forwarded = $transactionRepository->findBy(['sendingWallet' => $wallet->getId()]);
    $received = $transactionRepository->findBy(['recWallet' => $wallet->getId()]);
    
    // Create a new Spreadsheet object
    $spreadsheet = new Spreadsheet();
    
    // Set the title of the worksheet
    $spreadsheet->getActiveSheet()->setTitle('My Transactions Forwarded');
    
    // Set the header row
    $spreadsheet->getActiveSheet()
        ->setCellValue('A1', 'ID')
        ->setCellValue('B1', 'montant')
        ->setCellValue('C1', 'date');
       
       
    
    // Add the data rows
    $row = 2;
    foreach ($forwarded as $key) {
        $spreadsheet->getActiveSheet()
            ->setCellValue('A' . $row, $key->getId())
            ->setCellValue('B' . $row, $key->getMontant())
            ->setCellValue('C' . $row, $key->getDate());
      
            
        $row++;
    }
    
    // Create a new Xlsx writer and write the data to a file
    $writer = new Xlsx($spreadsheet);
    $filePath = 'Transactions.xlsx';
    $writer->save($filePath);
    
    // Return the file as a response
    $response = new BinaryFileResponse($filePath);
    $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT, 'Transactions.xlsx');
    return $response;
}
   



    }

    
    


    

