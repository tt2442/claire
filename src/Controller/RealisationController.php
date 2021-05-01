<?php
namespace  App\Controller ;use App\Entity\Realisation;
use App\Form\RealisationType;
    use App\Repository\RealisationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use DeepCopy\DeepCopy;
use DeepCopy\Filter\SetNullFilter;
use DeepCopy\Matcher\PropertyNameMatcher;

/**
 * @Route("admin/realisation")
 */class RealisationController extends AbstractController
{
    /**
    * @Route("/", name="realisation_index", methods={"GET"})
    */
    public function index(RealisationRepository $realisationRepository): Response
    {
    return $this->render('realisation/index.html.twig', [
    'realisations' => $realisationRepository->findAll(),
    ]);
    }

    /**
    * @Route("/new", name="realisation_new", methods={"GET","POST"})
    */
public function new(Request $request): Response
{
$realisation = new Realisation();
$form = $this->createForm(RealisationType::class, $realisation);
$form->handleRequest($request);

if ($form->isSubmitted() && $form->isValid()) {
$entityManager = $this->getDoctrine()->getManager();
$entityManager->persist($realisation);
$entityManager->flush();

return $this->redirectToRoute('realisation_index');
}

return $this->render('realisation/new.html.twig', [
'realisation' => $realisation,
'form' => $form->createView(),
]);
}

    /**
    * @Route("/{id}", name="realisation_show", methods={"GET"})
    */
public function show(Realisation $realisation): Response
{
return $this->render('realisation/show.html.twig', [
'realisation' => $realisation,
]);
}

    /**
    * @Route("/{id}/edit", name="realisation_edit", methods={"GET","POST"})
    */
public function edit(Request $request, Realisation $realisation): Response
{
$form = $this->createForm(RealisationType::class, $realisation);
$form->handleRequest($request);

if ($form->isSubmitted() && $form->isValid()) {
$this->getDoctrine()->getManager()->flush();

return $this->redirectToRoute('realisation_index');
}

return $this->render('realisation/edit.html.twig', [
'realisation' => $realisation,
'form' => $form->createView(),
]);
}

    /**
    * @Route("/{id}/copy", name="realisation_copy", methods={"GET","POST"})
    */
public function copy(Request $request, Realisation $realisationc): Response
{
$copier = new DeepCopy();
$copier->addFilter(new SetNullFilter(), new PropertyNameMatcher('id'));
$realisation = $copier->copy($realisationc);
$form = $this->createForm(RealisationType::class, $realisation);
$form->handleRequest($request);

if ($form->isSubmitted() && $form->isValid()) {
$entityManager = $this->getDoctrine()->getManager();
$entityManager->persist($realisation);
$entityManager->flush();

return $this->redirectToRoute('realisation_index');
}

return $this->render('realisation/new.html.twig', [
'realisation' => $realisation,
'form' => $form->createView(),
]);
}

    /**
    * @Route("/{id}", name="realisation_delete", methods={"POST"})
    */
public function delete(Request $request, Realisation $realisation): Response
{
if ($this->isCsrfTokenValid('delete'.$realisation->getId(), $request->request->get('_token'))) {
$entityManager = $this->getDoctrine()->getManager();
$entityManager->remove($realisation);
$entityManager->flush();
}

return $this->redirectToRoute('realisation_index');
}
}