<?php declare(strict_types=1);

namespace App\GraphQL\Queries;
use App\Models\User;
use Throwable;

final class FindUser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        try{
            $email = $args['email'];
            $name = $args['name'];

            $users = User::where('email', "like", '%'.$email.'%')->orWhere('name', 'like', '%'.$name.'%')->get();
            
            return $users;
        }
        catch(Throwable $err){
            return [];
        }
    }
}
