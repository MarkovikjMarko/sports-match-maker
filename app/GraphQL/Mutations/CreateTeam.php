<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;
use App\Models\Sport;
use App\Models\Team;
use App\Models\User;
use Throwable;

final class CreateTeam
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {   

        $userIds = $args["user_ids"];

        $sportId = $args["sport_id"];

        try{
            $sport = Sport::all()->where("id", $sportId)->firstOrFail();
            $teamPlayers = User::all()->whereIn("id", $userIds)->all();
            
            Team::factory()->for($sport)->hasAttached($teamPlayers, [])->create();

            return "Team created successfully";
        }
        catch(Throwable $err){
            return $err->getMessage();
        }
    }
}
