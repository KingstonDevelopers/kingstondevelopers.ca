<?php

namespace App\Service;

use App\Contracts\SlackApiContract;
use GuzzleHttp\Client as HttpClient;

class SlackApiClient implements SlackApiContract
{
    private HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    public function getTeamLogo(): string
    {
        $teamResponse = $this->client->request(
            'GET',
            'team.info',
            [
                'query' => [
                    'token' => config('slack.token'),
                ],
            ]
        );

        $response = json_decode($teamResponse->getBody());
        if (!$response->ok) {
            throw new \Exception('Error communicating with Slack: ' . $response->error);
        }

        return $response->team->icon->image_88;
    }

    public function getMemberCount(): int
    {
        $memberResponse = $this->client->request(
            'GET',
            'users.list',
            [
                'query' => [
                    'presence' => true,
                    'token' => config('slack.token'),
                ],
            ]
        );

        $response = json_decode($memberResponse->getBody()->getContents());

        if (!$response->ok) {
            throw new \Exception('Error communicating with Slack: ' . $response->error);
        }

        $members = collect($response->members)->filter(
            function ($member) {
                return $member->is_bot === false && $member->name !== 'slackbot' && $member->deleted === false;
            }
        );

        $total = $members->count();

        return $total;
    }

    public function invite(string $email)
    {
        $inviteResponse = $this->client->request(
            'POST',
            'users.admin.invite',
            [
                'form_params' => [
                    'token' => config('slack.legacy_token'),
                    'email' => $email,
                    'resend' => true,
                ],
            ]
        );

        return json_decode($inviteResponse->getBody()->getContents());
    }
}
