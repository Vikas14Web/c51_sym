<?php 

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Omines\DataTablesBundle\Adapter\ArrayAdapter;
use Omines\DataTablesBundle\Column\TextColumn;
use Omines\DataTablesBundle\Controller\DataTablesTrait;
use Symfony\Component\HttpFoundation\Request;

final class IndexController extends Controller
{
    
    use DataTablesTrait;
    /**
     * @Route("/", name="index")
     * @return Response
     */
    public function indexAction(Request $request): Response
    {
        $offers = json_decode(file_get_contents("https://api.myjson.com/bins/lugxd"),true);
        $offers = $offers['offers'];

        error_log($offers); // log in files

        return $this->render('base.html.twig', [
            'offers' => $offers,
        ]);
    }
}
