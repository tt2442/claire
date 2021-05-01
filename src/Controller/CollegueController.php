<?php
namespace  App\Controller ;use App\Entity\Collegue;
use App\Form\CollegueType;
    use App\Repository\CollegueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use DeepCopy\DeepCopy;
use DeepCopy\Filter\SetNullFilter;
use DeepCopy\Matcher\PropertyNameMatcher;

/**
 * @Route("admin/collegue")
 */class CollegueController extends AbstractController
{
    /**
    * @Route("/", name="collegue_index", methods={"GET"})
    */
    public function index(CollegueRepository $collegueRepository): Response
    {
    return $this->render('collegue/index.html.twig', [
    'collegues' => $collegueRepository->findAll(),
    ]);
    }

    /**
    * @Route("/new", name="collegue_new", methods={"GET","POST"})
    */
public function new(Request $request): Response
{
$collegue = new Collegue();
$form = $this->createForm(CollegueType::class, $collegue);
$form->handleRequest($request);

if ($form->isSubmitted() && $form->isValid()) {
$entityManager = $this->getDoctrine()->getManager();
$entityManager->persist($collegue);
$entityManager->flush();

return $this->redirectToRoute('collegue_index');
}

return $this->render('collegue/new.html.twig', [
'collegue' => $collegue,
'form' => $form->createView(),
]);
}

    /**
    * @Route("/{id}", name="collegue_show", methods={"GET"})
    */
public function show(Collegue $collegue): Response
{
return $this->render('collegue/show.html.twig', [
'collegue' => $collegue,
]);
}

    /**
    * @Route("/{id}/edit", name="collegue_edit", methods={"GET","POST"})
    */
public function edit(Request $request, Collegue $collegue): Response
{
$form = $this->createForm(CollegueType::class, $collegue);
$form->handleRequest($request);

if ($form->isSubmitted() && $form->isValid()) {
$this->getDoctrine()->getManager()->flush();

return $this->redirectToRoute('collegue_index');
}

return $this->render('collegue/edit.html.twig', [
'collegue' => $collegue,
'form' => $form->createView(),
]);
}

    /**
    * @Route("/{id}/copy", name="collegue_copy", methods={"GET","POST"})
    */
public function copy(Request $request, Collegue $colleguec): Response
{
$copier = new DeepCopy();
$copier->addFilter(new SetNullFilter(), new PropertyNameMatcher('id'));
$collegue = $copier->copy($colleguec);
$form = $this->createForm(CollegueType::class, $collegue);
$form->handleRequest($request);

if ($form->isSubmitted() && $form->isValid()) {
$entityManager = $this->getDoctrine()->getManager();
$entityManager->persist($collegue);
$entityManager->flush();

return $this->redirectToRoute('collegue_index');
}

return $this->render('collegue/new.html.twig', [
'collegue' => $collegue,
'form' => $form->createView(),
]);
}

    /**
    * @Route("/{id}", name="collegue_delete", methods={"POST"})
    */
public function delete(Request $request, Collegue $collegue): Response
{
if ($this->isCsrfTokenValid('delete'.$collegue->getId(), $request->request->get('_token'))) {
$entityManager = $this->getDoctrine()->getManager();
$entityManager->remove($collegue);
$entityManager->flush();
}

return $this->redirectToRoute('collegue_index');
}
}