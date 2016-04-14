<?php

namespace WorkShop\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response as Response;

use WorkShop\ApplicationBundle\Entity\Worker;

/**
 * @Route(
 *      "/admin"
 * )
 * @return html object 
 */
class adminController extends Controller
{
    /**
    * @Route(
    *       "/",
    *       name="workshop_application_admin_index"
    * )
    */     
    public function index()
    {
        return $this->render('WorkShopApplicationBundle:admin:parts/dashboard-overview-content.html.twig');
    }
    
    /**
    * @Route(
    *       "/workers",
    *       name="workshop_application_admin_workers"
    * )
    */     
    public function workersAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('WorkShopApplicationBundle:Worker');
        $workers = $repository->findAll();
        $worker_added = $request->query->get('worker_added');
        return $this->render('WorkShopApplicationBundle:admin:parts/dashboard-workers-content.html.twig', array(
            'workers' => $workers,
            'worker_added' => $worker_added
        ));
    }
    
    /**
    * @Route(
    *       "/statistics",
    *       name="workshop_application_admin_statistics"
    * )
    */     
    public function statisticsAction()
    {
        return $this->render('WorkShopApplicationBundle:admin:parts/dashboard-statistics-content.html.twig');
    }
    
    /**
    * @Route(
    *       "/workers/add",
    *       name="workshop_application_admin_workers_add"
    * )
    */     
    public function workersAddAction(Request $request)
    {
        $worker_name = $request->request->get('worker_name');
        $worker_salary = $request->request->get('worker_salary');
        $worker_info = $request->request->get('worker_info');
        
        $worker = new Worker();
        $worker->setWorkerName($worker_name)
                ->setSalary($worker_salary)
                ->setCreationTime(null)
                ->setNotes($worker_info);
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($worker);
        $em->flush();
        
        return $this->redirectToRoute('workshop_application_admin_workers',array(
            'worker_added' => true
        ));
    }
}
