<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;
use App\Models\Game;
use Throwable;

final class CreateGame
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $location = $args['location'];
        $time = $args['time'];
        $date = $args['date'];
        $description = $args['description'];
        $isTeamGame = $args['isTeamGame'];
        $teamId = $isTeamGame ? $args['team_id'] : null;
        $userId = !$isTeamGame ? $args['user_id'] : null;
        $sportId = $args['sport_id'];
        try{
            Game::factory()->create(
                [
                    'location' => $location,
                    'time' => $time,
                    'date' => $date,
                    'description' => $description,
                    'isTeamGame' => $isTeamGame,
                    'isPending' => true,
                    'team1' => $teamId,
                    'player1' => $userId,
                    'sport_id' => $sportId,                    
                ]);

            return "Game created successfully";
        }catch(Throwable $err){
            return $err->getMessage();
        }
    }
}
