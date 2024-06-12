<?php

namespace App\Controller;

use App\Entity\Achat;
use App\Entity\Authtoken;
use App\Entity\Detaila;
use App\Entity\Produit;
use App\Entity\Project;
use App\Entity\Task;
use App\Entity\User;
use App\Repository\AchatRepository;
use App\Repository\AuthtokenRepository;
use App\Repository\DetailaRepository;
use App\Repository\ProduitRepository;
use App\Repository\ProjectRepository;
use App\Repository\TaskRepository;
use App\Repository\TaskstateRepository;
use App\Repository\UserRepository;
use DateTime;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Security;

/**
 *  @Route("/api", name="Api")
 */

class ApiController extends AbstractController
{

    public function __construct(private Security $security)
    {
    }

    /**
     * @Route("/users/refresh/token", name="RefreshUserToken", methods={"GET"})
     */
    public function UserRefreshJwtToken(Request $request, AuthtokenRepository $authtokenRepository, JWTTokenManagerInterface $jwt)
    {
        $jetons = $request->headers->get("X-Auth-Token");
        $hash =  hash('sha256', $jetons);
        $user = $authtokenRepository->findOneByToken($hash)->getIduser();
        if ($user->isIssup()) {
            return $this->json(['data' => "error"]);
        }
        return $this->json(['data' => $jwt->create($user)]);
    }


    /**
     *@Route("/users/actual", name="ActualUser", methods={"GET"}) 
     */
    public function getActualUser(UserRepository $u)
    {
        $user = $this->security->getUser();
        return $this->json(['data' => $u->findOneByUsername($user->getUserIdentifier())], 200, [], ["groups" => "post:read"]);
    }

    /**
     * @Route("/users/refresh/first", name="CheckUserFirst", methods={"POST"})
     */
    public function checkUser(UserRepository $u, Request $request)
    {
        $donnes = json_decode($request->getContent());
        $utilisateur = $u->findOneByUsername($donnes->data);
        if ($utilisateur && !$utilisateur->isIssup()) {
            return $this->json(['data' => "ok"]);
        } else {
            return $this->json(['data' => 'error']);
        }
    }

    /**
     * @Route("/users/refresh/user/{iduser}", name="UserRefreshToken", methods={"GET"})
     */
    public function getUserRefreshToken(User $user)
    {
        if ($user->isIssup()) {
            return $this->json(['data' => "error"]);
        } else {
            $authToken = new Authtoken();
            $token = base64_encode(random_bytes(50));
            $hash = hash("sha256", $token);
            $authToken->setToken($hash);
            $authToken->setDateT(new \DateTime('now'));
            $authToken->setIduser($user);
            $sauv = $this->getDoctrine()->getManager();
            $sauv->persist($authToken);
            $sauv->flush();
            return $this->json(['data' => $token]);
        }
    }

    /**
     * @Route("/users/refresh/logout", name="LogoutUser", methods={"GET"})
     */
    public function Logout(Request $request, AuthtokenRepository $auth)
    {
        $jetons = $request->headers->get("X-Auth-Token");
        $hash =  hash('sha256', $jetons);
        $authToken = $auth->findOneByToken($hash);
        $sauv = $this->getDoctrine()->getManager();
        $sauv->remove($authToken);
        $sauv->flush();
        return $this->json(['data' => 'ok']);
    }

    /**
     * @Route("/user/list", name="ListeUser", methods={"GET"})
     */
    public function getListUser(UserRepository $u)
    {
        return $this->json(['data' => $u->findByIssup(0)]);
    }

    /**
     * @Route("/user/create", name="UserCreate", methods={"POST"})
     */
    public function createUser(Request $request, UserRepository $u, UserPasswordEncoderInterface $encoder)
    {
        $donnes = json_decode($request->getContent());
        $user = new User();
        $user->setUsername($donnes->data->username);
        if ($donnes->data->password) {
            $password = $encoder->encodePassword($user, $donnes->data->password);
            $user->setPassword($password);
        }
        $sauv = $this->getDoctrine()->getManager();
        $sauv->persist($user);
        $sauv->flush();
        return $this->json(['data' => $u->findOneByIduser($u->getLast())]);
    }

    /**
     * @Route("/user/update/{iduser}", name="UserUpdate", methods={"PUT"})
     */
    public function UpdateUser(Request $request, User $user, UserRepository $u, UserPasswordEncoderInterface $encoder)
    {
        $donnes = json_decode($request->getContent());
        $user->setUsername($donnes->data->username);
        if ($donnes->data->password) {
            $password = $encoder->encodePassword($user, $donnes->data->password);
            $user->setPassword($password);
        }
        $sauv = $this->getDoctrine()->getManager();
        $sauv->persist($user);
        $sauv->flush();
        return $this->json(['data' => $u->findByIssup(0)]);
    }

    /**
     * @Route("/project/list/{iduser}", name="ListProject", methods={"GET"})
     */
    public function getProjectList(ProjectRepository $p, User $u)
    {
        return $this->json(['data' => $p->findBy(["iduser" => $u, "issup" => 0])], 200, [], ["groups" => "post:read"]);
    }

    /**
     * @Route("/project/create", name="ProjectCreate", methods={"POST"})
     */
    public function createProject(ProjectRepository $p, Request $request, UserRepository $u)
    {
        $user = $this->security->getUser();
        $user = $u->findOneByUsername($user->getUserIdentifier());
        $donnes = json_decode($request->getContent());
        $project  = new Project();
        $project->setTitle($donnes->data->title);
        $project->setIduser($user);
        $project->setDescription($donnes->data->description);
        $project->setRepeats($donnes->data->repeats);
        $sauv = $this->getDoctrine()->getManager();
        $sauv->persist($project);
        $sauv->flush();
        return $this->json(['data' => $p->findOneByIdproject($p->getLast())], 200, [], ["groups" => "post:read"]);
    }

    /**
     * @Route("/project/update/{idproject}", name="ProjectUpdate", methods={"PUT"})
     */
    public function UpdateProject(ProjectRepository $p, Request $request, Project $project, UserRepository $u)
    {
        $user = $this->security->getUser();
        $user = $u->findOneByUsername($user->getUserIdentifier());
        $donnes = json_decode($request->getContent());
        $project->setTitle($donnes->data->title);
        $project->setDescription($donnes->data->description);
        $project->setRepeats($donnes->data->repeats);
        $sauv = $this->getDoctrine()->getManager();
        $sauv->persist($project);
        $sauv->flush();
        return $this->json(['data' => $p->findBy(["iduser" => $user, "issup" => 0])], 200, [], ["groups" => "post:read"]);
    }

    /**
     * @Route("/project/delete/{idproject}", name="ProjectDelete", methods={"DELETE"})
     */
    public function DeleteProject(ProjectRepository $p, Project $project, UserRepository $u)
    {
        $user = $this->security->getUser();
        $user = $u->findOneByUsername($user->getUserIdentifier());
        $sauv = $this->getDoctrine()->getManager();
        $sauv->remove($project);
        $sauv->flush();
        return $this->json(['data' => $p->findBy(["iduser" => $user, "issup" => 0])], 200, [], ["groups" => "post:read"]);
    }

    /**
     * @Route("/task/create/{idproject}", name="TaskCreate", methods={"POST"})
     */
    public function CreateTask(Request $request, TaskRepository $t, Project $project)
    {
        $donnes = json_decode($request->getContent());
        $task = new Task();
        $task->setIdproject($project);
        $task->setTasks($donnes->data->tasks);
        if ($donnes->data->datef != null) {
            $task->setDatef(new DateTime($donnes->data->datef));
        }
        if ($donnes->data->dates != null) {
            $task->setDatef($donnes->data->dates);
        }
        $sauv = $this->getDoctrine()->getManager();
        $sauv->persist($task);
        $sauv->flush();
        return $this->json(['data' => $t->findOneByIdtask($t->getLast())], 200, [], ["groups" => "post:read"]);
    }

    /**
     * @Route("/task/update/{idtask}", name="TaskUpdate", methods={"PUT"})
     */
    public function UpdateTask(Request $request, TaskRepository $t, Task $task)
    {
        $donnes = json_decode($request->getContent());
        $task->setTasks($donnes->data->tasks);
        if ($donnes->data->datef) {
            $task->setDatef(new DateTime($donnes->data->datef));
        } else {
            $task->setDatef(null);
        }
        if ($donnes->data->dates) {
            $task->setDatef($donnes->data->dates);
        } else {
            $task->setDates(null);
        }
        $sauv = $this->getDoctrine()->getManager();
        $sauv->persist($task);
        $sauv->flush();
        return $this->json(['data' => $t->findOneByIdtask($t->getLast())], 200, [], ["groups" => "post:read"]);
    }

    /**
     * @Route("/task/done/{idtask}", name="TaskDone", methods={"GET"})
     */
    public function setTaskDone(TaskRepository $t, Task $task)
    {
        $task->setIsdone(!$task->isIsdone());
        $sauv = $this->getDoctrine()->getManager();
        $project = $task->getIdproject();
        $sauv->persist($task);
        $sauv->flush();
        return $this->json(['data' => $t->findOneByIdproject($project)], 200, [], ["groups" => "post:read"]);
    }
    /**
     * @Route("/task/delete/{idtask}", name="TaskDelete", methods={"DELETE"})
     */
    public function DeleteTask(Task $task, TaskRepository $t, ProjectRepository $p)
    {
        // $project = $p->findOneByIdproject($task->getIdproject()->getIdproject());
        $sauv = $this->getDoctrine()->getManager();
        $sauv->remove($task);
        $sauv->flush();
        return $this->json(['data' => $t->findAll()], 200, [], ["groups" => "post:read"]);
    }

    /**
     * @Route("/task/list", name="TaskList", methods={"GET"})
     */
    public function getTaskList(TaskRepository $taskRepository)
    {
        return $this->json(['data' => $taskRepository->findAll()], 200, [], ["groups" => "post:read"]);
    }


    /**
     * @Route("/produit/list", name="ProduitList", methods={"GET"})
     */
    public function getProduitList(ProduitRepository $produitRepository)
    {
        return $this->json(['data' => $produitRepository->findAll()], 200);
    }

    /**
     * @Route("/detaila/list", name="DetailaList", methods={"GET"})
     */
    public function getDetailaList(DetailaRepository $detailaRepository)
    {
        return $this->json(['data' => $detailaRepository->findAll()], 200);
    }


    /**
     * @Route("/produit/new", name="AddProduit", methods={"POST"})
     */
    public function NewProduit(Request $request, ProduitRepository $taskRepository)
    {
        $donnes = json_decode($request->getContent());
        $p = new Produit();
        $p->setName($donnes->data->name);
        $p->setPrix($donnes->data->prix);
        $sauv = $this->getDoctrine()->getManager();
        $sauv->persist($p);
        $sauv->flush();
        return $this->json(['data' => $taskRepository->findAll()], 200);
    }

    /**
     * @Route("/detaila/new", name="AddDetaila", methods={"POST"})
     */
    public function NewDetaila(Request $request, AchatRepository $a, ProduitRepository $taskRepository, DetailaRepository $detailaRepository)
    {
        $donnes = json_decode($request->getContent());
        $d = new Detaila();
        $achat = $a->findOneByDatea(new DateTime($donnes->data->idachat->datea));
        $sauv = $this->getDoctrine()->getManager();
        if (!$achat) {
            $ac = new Achat();
            $ac->setDatea(new DateTime($donnes->data->idachat->datea));
            $sauv->persist($ac);
            $sauv->flush();
            $d->setIdachat($ac);
        } else {
            $d->setIdachat($achat);
        }
        $d->setIdproduit($taskRepository->findOneById($donnes->data->idproduit->id));
        $d->setNombre($donnes->data->nombre);
        $sauv->persist($d);
        $sauv->flush();
        return $this->json(['data' => $detailaRepository->findAll()], 200);
    }
}
