<?php


namespace App\Controller;


use App\Entity\User;
use App\Form\UserRegistrationFormType;
use App\Entity\AuPair;
use App\Form\AuPairFormType;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Klant;
use App\Form\KlantFormType;
use App\Entity\Room;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Security\LoginFormAuthenticator;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * class AdminController
 * @package App\Controller
 * @IsGranted("ROLE_ADMIN")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function home(){
        return $this->render('home.html.twig');
    }

    /**
     * @Route("admin/KlantenLijst", name="KlantenLijst")
     */
    public function Klantenlijst(){
        $em = $this->getDoctrine()->getManager();
        $klanten = $em->getRepository(Klant::class)->getAllKlanten();
        $rooms = $em->getRepository(Room::class)->getAll();
        if($klanten == NULL){
            throw $this->createNotFoundException("er zijn geen klanten");
        }else{
            return $this->render('admin/KlantenLijst.html.twig', ["klanten" => $klanten, "rooms"=>$rooms]);
        }
    }

    /**
    * @param $id
    * @Route("/admin/KlantInfo/{id}", name="KlantInfo")
    * @param Request $request
    * @return Response
    */
    public function KlantInfo($id, Request $request){
        $em = $this->getDoctrine()->getManager();
        $klant = $em->getRepository(Klant::class)->find($id);
        $room = $em->getRepository(Room::class)->findByKlant($klant);

        if($room == NULL){
            $room = new Room();
            $room->setKlant($klant);
            $room->setStatus("zoekopdracht");

            $em = $this->getDoctrine()->getManager();
            $em->persist($room);
            $em->flush();
        }
        $form=$this->createForm(KlantFormType::class, $klant);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $klant = $form->getData();
            $em=$this->getDoctrine()->getManager();
            $em->persist($klant);
            $em->flush();
            return $this->redirectToRoute('home', [
                'id' => $klant->getId(),
            ]);
        }
        return $this->render('admin/klantInfo.html.twig',["klant" => $klant, "room"=>$room, 'klantForm'=>$form->createView()]);
    }

    public function newKlant(Request $request)
    {
        // creates a task object and initializes some data for this example
        $klant = new Klant();
        $form = $this->createForm(KlantFormType::class, $klant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($klant);
            $entityManager->flush();

            // do anything else you need here, like send an email

            return $this->redirectToRoute('Klantenlijst');
        }

        return $this->render('security/registerNew.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("admin/delete_klant/{id}")
     */
    public function deleteKlant($id){
        $em = $this->getDoctrine()->getManager();
        $Klant = $this->getDoctrine()->getRepository(Klant::class)->find($id);
        if (!$Klant){
            throw $this->createNotFoundException("error: Kan de klant niet vinden");
        }
        $em->remove($Klant);
        $em->flush();
        return $this->edit_Klant();

        //moet zo nodig de bijbehorende user ook verwijderen
    }
/** ----------------------------------------------------------------------------------------Au Pair------------------------------------------------------------------------------------------------------- */
    /**
     * @Route("admin/AuPairlijst", name="AuPairlijst")
     */
    public function AuPairlijst(){
        $em = $this->getDoctrine()->getManager();
        $AuPair = $em->getRepository(AuPair::class)->getAllAuPairs();
        $room = $em->getRepository(Room::class)->findAll();
        if($AuPair == NULL){
            throw $this->createNotFoundException("er zijn geen Au Pairs");
        }else{
            return $this->render('admin/auPairLijst.html.twig', ["AuPair" => $AuPair, "room" => $room]);
        }
    }

    /**
    * @param $id
    * @Route("/admin/auPairInfo/{id}", name="AuPairInfo")
    * @param Request $request
    * @return Response
    */
    public function AuPairInfo($id, Request $request){
        $em = $this->getDoctrine()->getManager();
        $AuPair = $em->getRepository(AuPair::class)->find($id);
        $room = $em->getRepository(Room::class)->findByAuPair($AuPair);

        
        $form=$this->createForm(AuPairFormType::class, $AuPair);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $AuPair = $form->getData();
            $em=$this->getDoctrine()->getManager();
            $em->persist($AuPair);
            $em->flush();
            return $this->redirectToRoute('home', [
                'id' => $AuPair->getId(),
            ]);
        }
        return $this->render('admin/auPairInfo.html.twig',["AuPair" => $AuPair, "room"=>$room, 'auPairForm'=>$form->createView()]);
    }

    public function newAuPair(Request $request)
    {
        // creates a task object and initializes some data for this example
        $AuPair = new AuPair();
        $form = $this->createForm(AuPairFormType::class, $AuPair);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($AuPair);
            $entityManager->flush();

            // do anything else you need here, like send an email

            return $this->redirectToRoute('AuPairlijst');
        }

        return $this->render('security/registerNew.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete_auPair/{id}")
     */
    public function deleteAuPair($id){
        $em = $this->getDoctrine()->getManager();
        $AuPair = $this->getDoctrine()->getRepository(AuPair::class)->find($id);
        if (!$AuPair){
            throw $this->createNotFoundException("error: Kan de klant niet vinden");
        }
        $em->remove($AuPair);
        $em->flush();
        return $this->edit_AuPair();

        //moet zo nodig de bijbehorende user ook verwijderen
    }
}