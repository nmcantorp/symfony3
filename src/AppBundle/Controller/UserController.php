<?php

namespace AppBundle\Controller;

use AppBundle\Model\Dao\UserDao;
use AppBundle\Model\Entity\User;
use ArrayObject;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller implements ITimeAccessClientController
{
    private $userList;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->userList = new ArrayObject();
        $this->userList->append(new User(1, "Andres", "Guzman"));
        $this->userList->append(new User(2, "Linus", "Torvalds"));
        $this->userList->append(new User(3, "Steve", "Jobs"));
        $this->userList->append(new User(4, "Rasmus", "Lerdorf"));
    }

    /**
     * @Route("/user_list", name="userList")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->redirectToRoute("userListPrincipal");
    }

    /**
     * @Route("/user/list", name="userListPrincipal")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction()
    {
        return $this->render(':user:list.html.twig',
            [
                'userList' => $this->userList,
                'title' => 'Listado de usuarios',
                'currentDate'=>new \DateTime()
            ]
        );
    }

    /**
     * @Route("user_details/{id}", name="user_view_detail")
     */
    public function viewDetailUserAction($id)
    {
        $user = new ArrayCollection($this->userList->getArrayCopy());

        return $this->render(':user:user_details.html.twig', [
            'title' => 'Detalle del Usuaro',
            'currentDate' => new \DateTime(),
            'users' => $user->filter(function ($record) use ($id) {
                return $record->getId() == $id;
            })
        ]);
    }

    /**
     * @Route("/user_list_general", name="user_list_master")
     */
    public function userListWithSearchAction()
    {
        $users = new UserDao();
        return $this->render(':user:list.html.twig', [
            'userList' => $users->findAllUser(),
            'title' => 'Listado de usuarios',
            'currentDate'=>new \DateTime()
        ]);
    }

    /**
     * @Route("/find_user/{parameter}", name="find_user", defaults={"parameter":null})
     * @param Request $request
     */
    public function findUserByIdOrName(Request $request)
    {
        $users = new UserDao();
        $parameter = $request->query->get('parameter');
        if(is_numeric($parameter))
        {
            $user[] = $users->findUserById($parameter);
        }else{
            $user[] = $users->findByName($parameter);
        }

        if(count($user[0])<=0)
        {
            return $this->redirectToRoute('user_list_master');
        }

        return $this->render(':user:user_details.html.twig', [
            'title' => 'Detalle del Usuaro',
            'currentDate' => new \DateTime(),
            'users' => $user
        ]);
    }
}
