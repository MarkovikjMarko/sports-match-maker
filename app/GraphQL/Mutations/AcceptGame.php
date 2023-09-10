<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;
use App\Models\Game;
use Throwable;

final class AcceptGame
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $id = $args['id'];
        $teamId = array_key_exists("team_id",$args) ? $args['team_id'] : null;
        $userId = array_key_exists("user_id",$args) ? $args['user_id'] : null;
        try{
            $game = Game::where("id", 'like', $id)->update(
                [
                    "team2" => $teamId, 
                    "player2" => $userId, 
                    "isPending" => false
                ]);

            return "Game accepted successfully";
        }catch(Throwable $err){
            return $err->getMessage();
        }
    }
}
