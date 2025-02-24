<?php

namespace App\Controller;

use App\Entity\Players;
use App\Form\PlayersType;
use App\Interface\PlayersServiceInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/players')]
final class PlayersController extends AbstractController
{
    #[Route('/', name: 'app_players', methods: ['GET'])]
    public function index(
        PlayersServiceInterface $playersServiceInterface,
        #[MapQueryParameter] int $page = 1,
        #[MapQueryParameter] string $query = null
    ): Response
    {
        $pager = $playersServiceInterface->findActivePaginated(
            query: $query,
            page: $page,
            size: 15,
            filters: [
                'manager_name' => $query,
            ]
        );

        return $this->render('players/index.html.twig', [
            'players' => $pager,
        ]);
    }

    #[Route('/new', name: 'app_players_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        PlayersServiceInterface $playersService
    ): Response
    {
        $player = new Players();
        $form  = $this->createPlayerForm($player);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $playersService->create($player);
            $this->addFlash('success', 'Player Created');

            return $this->redirectToRoute('app_players', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('players/form.html.twig', [
            'player' => $player,
            'form' => $form,
            'mode' => 'create',
        ]);
    }

    #[Route('/{id}/edit', name: 'app_players_edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request,
        Players $player,
        PlayersServiceInterface $playersService
    ): Response
    {
        $form  = $this->createPlayerForm($player);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $playersService->update($player);
            $this->addFlash('success', 'Player ' . $player->getName() . ' updated');

            return $this->redirectToRoute('app_players', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('players/form.html.twig', [
            'player' => $player,
            'form' => $form,
            'mode' => 'edit',
        ]);
    }

    #[Route('/{id}/delete', name: 'app_players_delete', methods: ['GET'])]
    public function delete(Players $player, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($player);
        $entityManager->flush();

        return $this->redirectToRoute('app_players', [], Response::HTTP_SEE_OTHER);
    }

    private function createPlayerForm(Players $player = null): FormInterface
    {
        $player = $player ?? new Players();

        return $this->createForm(PlayersType::class, $player, [
            'action' => $player->getId() ? $this->generateUrl('app_players_edit', ['id' => $player->getId()]) : $this->generateUrl('app_players_new'),
        ]);
    }
}
