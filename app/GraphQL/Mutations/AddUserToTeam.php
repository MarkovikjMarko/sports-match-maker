<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;
use App\Models\Team;
use App\Models\User;
use Throwable;

final class AddUserToTeam
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $userId = $args["user_id"];
        $teamId = $args["team_id"];


        try{
            User::all()->where("id", $userId)->firstOrFail();
            $team = Team::all()->where('id', $teamId)->firstOrFail();
            
            $team->users()->attach($userId);

            return "User added to team successfully!";
        }
        catch(Throwable $err){
            return $err->getMessage();
        }
    }
}
