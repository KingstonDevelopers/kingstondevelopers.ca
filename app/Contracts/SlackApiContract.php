<?php


namespace App\Contracts;


interface SlackApiContract
{
    public function getMemberCount(): int;

    public function getTeamLogo(): string;

    public function invite(string $email);

}
