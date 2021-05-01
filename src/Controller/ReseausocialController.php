<?php
namespace  App\Controller ;use App\Entity\Reseausocial;
use App\Form\ReseausocialType;
    use App\Repository\ReseausocialRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use DeepCopy\DeepCopy;
use DeepCopy\Filter\SetNullFilter;
use DeepCopy\Matcher\PropertyNameMatcher;

/**
 * @Route("admin/reseausocial")
 */class ReseausocialController extends AbstractController
{
    /**
    * @Route("/", name="reseausocial_index", methods={"GET"})
    */
    public function index(ReseausocialRepository $reseausocialRepository): Response
    {
    return $this->render('reseausocial/index.html.twig', [
    'reseausocials' => $reseausocialRepository->findAll(),
    ]);
    }

    /**
    * @Route("/new", name="reseausocial_new", methods={"GET","POST"})
    */
public function new(Request $request): Response
{
$reseausocial = new Reseausocial();
$form = $this->createForm(ReseausocialType::class, $reseausocial);
$form->handleRequest($request);

if ($form->isSubmitted() && $form->isValid()) {
$entityManager = $this->getDoctrine()->getManager();
$entityManager->persist($reseausocial);
$entityManager->flush();

return $this->redirectToRoute('reseausocial_index');
}

return $this->render('reseausocial/new.html.twig', [
'reseausocial' => $reseausocial,
'form' => $form->createView(),
]);
}

    /**
    * @Route("/{id}", name="reseausocial_show", methods={"GET"})
    */
public function show(Reseausocial $reseausocial): Response
{
return $this->render('reseausocial/show.html.twig', [
'reseausocial' => $reseausocial,
]);
}

    /**
    * @Route("/{id}/edit", name="reseausocial_edit", methods={"GET","POST"})
    */
public function edit(Request $request, Reseausocial $reseausocial): Response
{
$form = $this->createForm(ReseausocialType::class, $reseausocial);
$form->handleRequest($request);

if ($form->isSubmitted() && $form->isValid()) {
$this->getDoctrine()->getManager()->flush();

return $this->redirectToRoute('reseausocial_index');
}

return $this->render('reseausocial/edit.html.twig', [
'reseausocial' => $reseausocial,
'form' => $form->createView(),
]);
}

    /**
    * @Route("/{id}/copy", name="reseausocial_copy", methods={"GET","POST"})
    */
public function copy(Request $request, Reseausocial $reseausocialc): Response
{
$copier = new DeepCopy();
$copier->addFilter(new SetNullFilter(), new PropertyNameMatcher('id'));
$reseausocial = $copier->copy($reseausocialc);
$form = $this->createForm(ReseausocialType::class, $reseausocial);
$form->handleRequest($request);

if ($form->isSubmitted() && $form->isValid()) {
$entityManager = $this->getDoctrine()->getManager();
$entityManager->persist($reseausocial);
$entityManager->flush();

return $this->redirectToRoute('reseausocial_index');
}

return $this->render('reseausocial/new.html.twig', [
'reseausocial' => $reseausocial,
'form' => $form->createView(),
]);
}

    /**
    * @Route("/{id}", name="reseausocial_delete", methods={"POST"})
    */
public function delete(Request $request, Reseausocial $reseausocial): Response
{
if ($this->isCsrfTokenValid('delete'.$reseausocial->getId(), $request->request->get('_token'))) {
$entityManager = $this->getDoctrine()->getManager();
$entityManager->remove($reseausocial);
$entityManager->flush();
}

return $this->redirectToRoute('reseausocial_index');
}
}