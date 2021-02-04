<?php

namespace App\Service;

use GuzzleHttp\Client as HttpClient;
use Illuminate\Support\Facades\Cache;

class Slack
{
    private HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = new HttpClient(
            [
                'base_uri' => 'https://' . config('slack.url') . '/api/',
            ]
        );
    }

    public function getTeamLogo()
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

    /**
     * @return array
     * @throws \Exception
     */
    public function getMemberCount()
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

        if (config('slack.badge.presence', false)) {
            $members = $members->map(
                function ($member) {
                    $member->is_online = Cache::remember(
                        'member_is_online_' . $member->id,
                        30 + rand(0, 300),
                        function () use ($member) {
                            return $this->isOnline($member->id);
                        }
                    );

                    return $member;
                }
            );


            $online = $members->filter(
                function ($member) {
                    return $member->is_online;
                }
            )->count();

            return [
                "total" => $total,
                "online" => $online,
            ];
        } else {
            return [
                "total" => $total,
            ];
        }
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

    public function test()
    {
        $memberResponse = $this->client->request(
            'GET',
            'users.list',
            [
                'query' => [
                    'token' => config('slack.token'),
                ],
            ]
        );

        return json_decode($memberResponse->getBody()->getContents());
    }

    public function isOnline(string $userId): bool
    {
        $presenceResponse = $this->client->request(
            'GET',
            'users.getPresence',
            [
                'query' => [
                    'token' => config('slack.token'),
                    'user' => $userId,
                ],
            ]
        );

        $decoded = json_decode($presenceResponse->getBody()->getContents());
        return $decoded->presence === 'active';
    }
}
