<?php
namespace  App\Controller ;use App\Entity\Createur;
use App\Form\CreateurType;
    use App\Repository\CreateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use DeepCopy\DeepCopy;
use DeepCopy\Filter\SetNullFilter;
use DeepCopy\Matcher\PropertyNameMatcher;

/**
 * @Route("admin/createur")
 */class CreateurController extends AbstractController
{
    /**
    * @Route("/", name="createur_index", methods={"GET"})
    */
    public function index(CreateurRepository $createurRepository): Response
    {
    return $this->render('createur/index.html.twig', [
    'createurs' => $createurRepository->findAll(),
    ]);
    }

    /**
    * @Route("/new", name="createur_new", methods={"GET","POST"})
    */
public function new(Request $request): Response
{
$createur = new Createur();
$form = $this->createForm(CreateurType::class, $createur);
$form->handleRequest($request);

if ($form->isSubmitted() && $form->isValid()) {
$entityManager = $this->getDoctrine()->getManager();
$entityManager->persist($createur);
$entityManager->flush();

return $this->redirectToRoute('createur_index');
}

return $this->render('createur/new.html.twig', [
'createur' => $createur,
'form' => $form->createView(),
]);
}

    /**
    * @Route("/{id}", name="createur_show", methods={"GET"})
    */
public function show(Createur $createur): Response
{
return $this->render('createur/show.html.twig', [
'createur' => $createur,
]);
}

    /**
    * @Route("/{id}/edit", name="createur_edit", methods={"GET","POST"})
    */
public function edit(Request $request, Createur $createur): Response
{
$form = $this->createForm(CreateurType::class, $createur);
$form->handleRequest($request);

if ($form->isSubmitted() && $form->isValid()) {
$this->getDoctrine()->getManager()->flush();

return $this->redirectToRoute('createur_index');
}

return $this->render('createur/edit.html.twig', [
'createur' => $createur,
'form' => $form->createView(),
]);
}

    /**
    * @Route("/{id}/copy", name="createur_copy", methods={"GET","POST"})
    */
public function copy(Request $request, Createur $createurc): Response
{
$copier = new DeepCopy();
$copier->addFilter(new SetNullFilter(), new PropertyNameMatcher('id'));
$createur = $copier->copy($createurc);
$form = $this->createForm(CreateurType::class, $createur);
$form->handleRequest($request);

if ($form->isSubmitted() && $form->isValid()) {
$entityManager = $this->getDoctrine()->getManager();
$entityManager->persist($createur);
$entityManager->flush();

return $this->redirectToRoute('createur_index');
}

return $this->render('createur/new.html.twig', [
'createur' => $createur,
'form' => $form->createView(),
]);
}

    /**
    * @Route("/{id}", name="createur_delete", methods={"POST"})
    */
public function delete(Request $request, Createur $createur): Response
{
if ($this->isCsrfTokenValid('delete'.$createur->getId(), $request->request->get('_token'))) {
$entityManager = $this->getDoctrine()->getManager();
$entityManager->remove($createur);
$entityManager->flush();
}

return $this->redirectToRoute('createur_index');
}
}