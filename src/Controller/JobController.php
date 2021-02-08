<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class JobController extends Controller
{
    /**
     * @Route("/job", name="job")
     */
    public function index(): Response
    {
        return $this->render('job/index.html.twig', [
            'controller_name' => 'JobController',
        ]);
    }

    /**
     * @Route("/job/list", name="joblist")
     */

    public function list(EntityManagerInterface $em) : Response
    {
        $query = $em->createQuery(
            'SELECT j FROM App:Job j WHERE j.createdAt > :date'
        )->setParameter('date', new \DateTime('-30 days'));
        $jobs = $query->getResult();

        return $this->render('job/list.html.twig', [
            'jobs' => $jobs,
        ]);
    }

    /**
     * @Route("/job/caridata", name="latihanmencari")
     */

    public function caridata(EntityManagerInterface $em, int $cari) : Response
    {
        $query = $em->createQuery(
            'SELECT j FROM App:Job j WHERE j.id = :cari'
        )->setParameter('cari', $cari);
        $jobs = $query->getResult();

        return $this->render('job/list.html.twig', [
            'jobs' => $jobs,
        ]);
        
    }

    /**
     * Finds and displays a job entity.
     *
     * @Route("/job/{id}", name="job.show", methods="GET", requirements={"id" = "\d+"})
     *
     *
     * @return Response
     */
    public function show($id) : Response
    {
        $job = $id;
        return $this->render('job/show.html.twig', [
            'job' => $job,
        ]);
    }





#    /**
#     * Lists all job entities.
#     *
#     * @Route("/", name="job.list", methods="GET")
#     *
#     * @return Response
#     */
#    public function list() : Response
#    {
#        $jobs = $this->getDoctrine()->getRepository(Job::class)->findAll();
#
#        return $this->render('job/list.html.twig', [
#            'jobs' => $jobs,
#        ]);
#    }

    
}
